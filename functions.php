<?php
/**
 * Phenix WP functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Phenix_WP
 * @since Phenix WP 1.0
 * 
 * ========> Reference by Comments <=======
 ** 01 - Theme Support
 ** 02 - Phenix Assets
 ** 03 - Setup Templates Meta
 ** 04 - ACF Fallback
 ** 05 - Add Dynamic Options to CF7 Dropdowns
*/

//===> make sure Plugins are loaded <===//
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

//=====> Theme Support <=====//
if (!function_exists('phenix_support')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 * @since Phenix WP 1.0
	 * @return void
	 ** 01 - Support Block Styles
	 ** 02 - Editor Styles
	 ** 03 - Translation Support
	 ** 04 - Support Thumbnails
	*/

	function phenix_support() {
        //====> Translation Support <====//
		load_theme_textdomain('phenix', get_template_directory().'/languages');

		//====> Support Block Styles <====//
        add_theme_support('editor-styles');
		add_theme_support('wp-block-styles');
        add_theme_support('disable-layout-styles');
		remove_theme_support('core-block-patterns');
        add_theme_support('block-templates');
        add_theme_support('align-wide');

		//====> Editor Styles <====//
        if (is_rtl()) {
            add_editor_style('style-rtl.css');
        } else {
            add_editor_style('style.css');
        }

		//====> Support Thumbnails <====//
		add_theme_support('post-thumbnails');
	}
endif;

add_action('after_setup_theme', 'phenix_support');

//=====> Phenix Assets CSS <=====//
if (!function_exists('theme_style')) :
	/**
	 * Setup Phenix Design Fonts and Third-Party
	 * @since Phenix WP 1.0
	 * @return void
	*/

    function theme_style () {
        //====> Theme Style.css <====//
        if (!is_rtl()) :
        wp_enqueue_style('theme-style', get_template_directory_uri() . '/style.css', array('phenix'), false, 'screen and (min-width: 2500px)');
        else :
        wp_enqueue_style('theme-style', get_template_directory_uri() . '/style-rtl.css', array('phenix'), false, 'screen and (min-width: 2500px)');
        endif;
    }

    add_action('wp_enqueue_scripts', 'theme_style');
    add_action('admin_enqueue_scripts', 'theme_style');
    add_action('login_enqueue_scripts', 'theme_style');
    add_action('enqueue_block_editor_assets', 'theme_style');
    add_action('enqueue_block_assets', 'theme_style');
endif;

//=====> Phenix Assets Scripts <=====//
if (!function_exists('pds_theme_script')) :
    function pds_theme_script() {
        wp_enqueue_script('pds-script', get_template_directory_uri().'/style.js', 'phenix' , NULL , true);
    }

    //===> Include Phenix Core in the Plugin Page <===//
    add_action('wp_enqueue_scripts', 'pds_theme_script');
endif;

//====> Setup Templates Parts <====//
if (!function_exists('pds_templates_meta_register') && function_exists("pds_get_theme_parts")) :
    function pds_templates_parts_register() {
        //===> Set Templates Parts <===//
        $current_theme_parts = pds_get_theme_parts(new DirectoryIterator(get_template_directory()."/template-parts"));
        update_option('theme_parts', $current_theme_parts);
    };

    add_action('init', 'pds_templates_parts_register');
endif;

//===> Add Dynamic Options to CF7 Dropdowns <===//
if (!function_exists('pds_cf7_dd_options')):
    function pds_cf7_dd_options($form_control, $unused ) {
        //===> Add a Post Type Options <===//
        if (str_contains($form_control['name'], "cpt-")) {
            //===> Get the Current Post Type Within a Post <===//
            $post_type = str_replace("cpt-", "", $form_control['name']);

            //===> Get Current Post Type <===//
            if ($form_control['name'] === "cpt-current") {
                if (isset($post) && $post->ID) {
                    $post_type = get_post_type($post->ID);
                } else {
                    $post_type = get_post_type();
                }
            }

            /*==== Query Data =====*/
            $the_query = new WP_Query(array('post_type' => $post_type, 'posts_per_page' => -1));
            //==== Start Query =====//
            if ($the_query->have_posts()) :
                //===> Get the First Post <===//
                while ($the_query->have_posts()): $the_query->the_post();
                    $form_control['raw_values'][] = get_the_title();
                    $form_control['labels'][] = get_the_title();
                endwhile;
                //==== RESET Query =====//
                wp_reset_postdata();
            endif;
        }

        //===> Add the Options to the "pickup-location" <===//
        else if (str_contains($form_control['name'], "taxonomy-")) {
            //===> Add the Locations to the Options <===//
            $taxonomies_terms = get_categories(array('taxonomy' => str_replace("taxonomy-", "", $form_control['name']), 'hide_empty' => false));

            if (!empty($taxonomies_terms)) {
                //===> Loop Through Categories <===//
                foreach ($taxonomies_terms as $term) :
                    $form_control['labels'][] = $term->label;
                    $form_control['raw_values'][] = $term->name;
                endforeach;
            }
        }

        //===> Pass the Options to CF7 <===//
        if (str_contains($form_control['name'], "cpt-") || str_contains($form_control['name'], "taxonomy-")) {
            $pipes = new WPCF7_Pipes($form_control['raw_values']);
            $form_control['values'] = $pipes->collect_befores();
            $form_control['pipes'] = $pipes;
        }

        //===> Return the Field <===//
        return $form_control;
    }

    add_filter('wpcf7_form_tag', 'pds_cf7_dd_options', 10, 2);
endif;
