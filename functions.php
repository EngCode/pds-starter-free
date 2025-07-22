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

//=====> Theme Installer Configuration <=====//
function pds_theme_installer_config() {
    //====> Required Plugins <====//
    return array(
        //====> Contact Form 7 <====//
        'contact-form-7' => array(
            'required' => false,
            'name' => 'Contact Form 7',
            'slug' => 'contact-form-7',
            'file' => 'contact-form-7/wp-contact-form-7.php',
            'description' => __('إضافة نماذج الاتصال المطلوبة للموقع', 'phenix'),
        ),
        //====> YOAST SEO <====//
        'yoast-seo' => array(
            'required' => false,
            'name' => 'Yoast SEO',
            'slug' => 'wordpress-seo',
            'file' => 'wordpress-seo/wp-seo.php',
            'description' => __('إضافة تحسين محركات البحث', 'phenix'),
        )
    );
}

//=====> Theme Installer <=====//
include_once(dirname(__FILE__) . '/inc/installer.php');

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
