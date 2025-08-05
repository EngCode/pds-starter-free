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
*/

//===> make sure Plugins are loaded <===//
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

//=====> Theme Installer Configuration <=====//
function pds_theme_installer_config() {
    //====> Required Plugins <====//
    return array(
        //====> Contact Form 7 <====//
        'contact-form-7' => array(
            'required' => true,
            'name' => 'Contact Form 7',
            'slug' => 'contact-form-7',
            'file' => 'contact-form-7/wp-contact-form-7.php',
            'description' => __('Required contact form plugin for the site', 'phenix'),
        ),
        //====> LiteSpeed <====//
        'litespeed-cache' => array(
            'required' => false,
            'name' => 'LiteSpeed Cache',
            'slug' => 'litespeed-cache',
            'file' => 'litespeed-cache/litespeed-cache.php',
            'description' => __('Site performance optimization plugin', 'phenix'),
        ),
        //====> Performance Lab <====//
        'performance-lab' => array(
            'required' => false,
            'name' => 'Performance Lab',
            'slug' => 'performance-lab',
            'file' => 'performance-lab/performance-lab.php',
            'description' => __('A set of tools to improve site performance', 'phenix'),
        ),
        //====> Embed Optimizer <====//
        'embed-optimizer' => array(
            'required' => false,
            'name' => 'Embed Optimizer',
            'slug' => 'embed-optimizer',
            'file' => 'embed-optimizer/load.php',
            'description' => __('Optimize embedded media performance.', 'phenix'),
        ),
        //====> Modern Image Formats <====//
        'webp-uploads' => array(
            'required' => false,
            'name' => 'Modern Image Formats',
            'slug' => 'webp-uploads',
            'file' => 'webp-uploads/load.php',
            'description' => __('Adds support for modern image formats WebP and AVIF.', 'phenix'),
        ),
        //====> Speculative Loading <====//
        'speculation-rules' => array(
            'required' => false,
            'name' => 'Speculative Loading',
            'slug' => 'speculation-rules',
            'file' => 'speculation-rules/load.php',
            'description' => __('Improve page loading through preloading.', 'phenix'),
        ),
        //====> Optimization Detective <====//
        'optimization-detective' => array(
            'required' => false,
            'name' => 'Optimization Detective',
            'slug' => 'optimization-detective',
            'file' => 'optimization-detective/load.php',
            'description' => __('Analyze site performance and provide optimization recommendations.', 'phenix'),
        ),
        //====> Performant Translations <====//
        'performant-translations' => array(
            'required' => false,
            'name' => 'Performant Translations',
            'slug' => 'performant-translations',
            'file' => 'performant-translations/performant-translations.php',
            'description' => __('Improve translation performance on the site.', 'phenix'),
        ),
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

//====> Setup Templates Parts and its Meta Options <====//
if (!function_exists('pds_templates_meta_register') && function_exists("pds_get_theme_parts")) :
    function pds_templates_meta_register() {
        //===> Define Meta Data & Get the Json Files <===//
        $template_meta = array();
        $templates_meta_list = array();
        $templates_meta_files = pds_get_theme_parts(new DirectoryIterator(get_template_directory()."/template-parts"), 'json');

        //===> Add the Files to a List <===//
        if (count($templates_meta_files) > 0) {
            foreach ($templates_meta_files as $key => $value) {
                //===> if its a Directory <===//
                if(is_array($value)) {
                    //===> Get its Files and add them to the list <===//
                    foreach ($value as $key2 => $value2) $templates_meta_list[] = $key.'/'.$value2;
                } else {
                    //===> Add only JSON File <===//
                    $templates_meta_list[] = $value;
                }
            }
        }

        //===> Get each File Content <===//
        if (count($templates_meta_list) > 0) {
            foreach($templates_meta_list as $key => $value) {
                //===> Get the File Content <===//
                $template_json = json_decode(file_get_contents(get_template_directory()."/template-parts/".$value), true);
                //===> Check if the File has a Name <===//
                if (isset($template_json['name'])) {
                    //===> Add the Template Meta <===//
                    $template_meta[$template_json['name']] = array("features" => $template_json['features'], "options" => $template_json['options']);
                } else {
                    //===> Skip if No Name <===//
                    continue;
                }
            }
        }

        update_option("templates_meta", $template_meta);
    };

    function pds_templates_parts_register() {
        //===> Set Templates Parts <===//
        $current_theme_parts = pds_get_theme_parts(new DirectoryIterator(get_template_directory()."/template-parts"), 'php');
        update_option('theme_parts', $current_theme_parts);
    };

    add_action('init', 'pds_templates_parts_register');
    add_action('init', 'pds_templates_meta_register');
endif;
