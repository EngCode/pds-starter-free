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
*/

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

		//====> Translation Support <====//
		load_theme_textdomain('phenix', get_template_directory() . '/languages');

		//====> Support Thumbnails <====//
		add_theme_support('post-thumbnails');
	}
endif;

add_action('after_setup_theme', 'phenix_support');

//=====> Theme Style.css <=====//
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
endif;

//=====> Theme Scripts <=====//
if (!function_exists('pds_theme_script')) :
    function pds_theme_script() {
        wp_enqueue_script('pds-script', get_template_directory_uri().'/style.js', 'phenix' , NULL , true);
    }

    //===> Include Phenix Core in the Plugin Page <===//
    // add_action('wp_enqueue_scripts', 'pds_theme_script');
endif;

//=====> Register the required plugins for this theme. <=====//
require_once get_template_directory().'/wizard/tgm/class-tgm-plugin-activation.php';

if (!function_exists('phenix_register_required_plugins')) :
	/**
	 * Setup Phenix Design System Plugins
	 * @since Phenix WP 1.0
	 * @return void
	*/

    function phenix_register_required_plugins() {
        //===> Define Plugins to Install <===//
        $plugins = array(
            array('name' => 'Phenix Blocks', 'slug' => 'phenix-blocks', 'source' => 'https://github.com/EngCode/phenix-blocks/archive/master.zip', 'required' => true),
            array('name' => 'Flamingo', 'slug' => 'flamingo', 'required' => true),
            array('name' => 'Polylang', 'slug' => 'polylang', 'required' => false),
            array('name' => 'Newsletter', 'slug' => 'newsletter', 'required' => false),
            array('name' => 'SVG Support', 'slug' => 'svg-support', 'required' => true),
            array('name' => 'Contact Form 7', 'slug' => 'contact-form-7', 'required' => true),
            array('name' => 'Advanced Import', 'slug' => 'advanced-import', 'required' => true),
            array('name' => 'Advanced Export', 'slug' => 'advanced-export', 'required' => false),
            array('name' => 'Yoast SEO', 'slug' => 'wordpress-seo', 'required' => false),
            array('name' => 'W3 Total Cache', 'slug' => 'w3-total-cache', 'required' => false),
            array('name' => 'Theme and plugin translation for Polylang (TTfP)', 'slug' => 'theme-translation-for-polylang', 'required' => false),
            // array('name' => 'WooCommerce', 'slug' => 'woocommerce', 'required' => false),
            // array('name' => 'WooCommerce PayPal Payments', 'slug' => 'woocommerce-paypal-payments', 'required' => false),
            // array('name' => 'Blocks Product Editor for WooCommerce', 'slug' => 'blocks-product-editor-for-woocommerce', 'required' => false),
        );
    
        //===> Array of configuration settings. Amend each line as needed. <===//
        $config = array(
            'id'           => 'phenix-plugins',
            'default_path' => get_template_directory().'/wizard/tgm/plugins',
            'menu'         => 'pds-install',
            'parent_slug'  => 'themes.php',
            'capability'   => 'edit_theme_options',
            'has_notices'  => true,
            'dismissable'  => true,
            'dismiss_msg'  => '',
            'is_automatic' => true,
            'message'      => '',
        );

        tgmpa($plugins, $config);
    }

    add_action('tgmpa_register', 'phenix_register_required_plugins');
endif;

//=====> Includes Merlin Wizard Class <=====//
require_once get_template_directory().'/wizard/vendor/autoload.php';
require_once get_template_directory().'/wizard/class-merlin.php';
require_once get_template_directory().'/setup-config.php';