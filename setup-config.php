<?php
//=====> Setup Merlin Wizard <=====//
if (class_exists('Merlin')) :
	/**
	 * Setup Phenix Design System Data
	 * @since Phenix WP 1.0
	 * @return void
	*/

    $wizard = new Merlin(
        //===> Wizard Settings <===//
        $config = array(
            'dev_mode'    => false,
            'directory'   => 'wizard',
            'merlin_url'  => 'pds-wizard',
            'parent_slug' => 'theme.php',
            'capability'  => 'manage_options',
            'ready_big_button_url' => admin_url("themes.php?page=advanced-import"),
            'child_action_btn_url' => false, // URL for the 'child-action-link'.
            //====> License Settings <====//
            'license_step' => false, //====> EDD license activation step.
            'license_required' => false, // Require the license activation step.
            'license_help_url' => '', // URL for the 'license-tooltip'.
            //====> Easy Digital Downloads Software License activation <====//
            'edd_remote_api_url'   => '', // EDD_Theme_Updater_Admin remote_api_url.
            'edd_item_name'        => 'pds-starter', // EDD_Theme_Updater_Admin item_name.
            'edd_theme_slug'       => 'pds-starter', // EDD_Theme_Updater_Admin item_slug.
        ),
        //===> Wizard Content <===//
        $strings = array(
            'admin-menu'               => esc_html__('Theme Setup', 'phenix'),
            'title%s%s%s%s'            => esc_html__( '%1$s%2$s Themes &lsaquo; Theme Setup: %3$s%4$s', 'phenix' ),
            'return-to-dashboard'      => esc_html__( 'Return to the dashboard', 'phenix' ),
            'ignore'                   => esc_html__( 'Disable this wizard', 'phenix' ),
            'btn-skip'                 => esc_html__( 'Skip', 'phenix' ),
            'btn-next'                 => esc_html__( 'Next', 'phenix' ),
            'btn-start'                => esc_html__( 'Start', 'phenix' ),
            'btn-no'                   => esc_html__( 'Cancel', 'phenix' ),
            'btn-plugins-install'      => esc_html__( 'Install', 'phenix' ),
            'btn-child-install'        => esc_html__( 'Install', 'phenix' ),
            'btn-content-install'      => esc_html__( 'Install', 'phenix' ),
            'btn-import'               => esc_html__( 'Import', 'phenix' ),
            'btn-license-activate'     => esc_html__( 'Activate', 'phenix' ),
            'btn-license-skip'         => esc_html__( 'Later', 'phenix' ),
            'license-header%s'         => esc_html__( 'Activate %s', 'phenix' ),
            'license-header-success%s' => esc_html__( '%s is Activated', 'phenix' ),
            'license%s'                => esc_html__( 'Enter your license key to enable remote updates and theme support.', 'phenix' ),
            'license-label'            => esc_html__( 'License key', 'phenix' ),
            'license-success%s'        => esc_html__( 'The theme is already registered, so you can go to the next step!', 'phenix' ),
            'license-json-success%s'   => esc_html__( 'Your theme is activated! Remote updates and theme support are enabled.', 'phenix' ),
            'license-tooltip'          => esc_html__( 'Need help?', 'phenix' ),
            'welcome-header%s'         => esc_html__( 'Welcome to %s', 'phenix' ),
            'welcome-header-success%s' => esc_html__( 'Hi. Welcome back', 'phenix' ),
            'welcome%s'                => esc_html__( 'This wizard will set up your theme, install plugins, and import content. It is optional & should take only a few minutes.', 'phenix' ),
            'welcome-success%s'        => esc_html__( 'You may have already run this theme setup wizard. If you would like to proceed anyway, click on the "Start" button below.', 'phenix' ),
            'child-header'             => esc_html__( 'Install Child Theme', 'phenix' ),
            'child-header-success'     => esc_html__( 'You\'re good to go!', 'phenix' ),
            'child'                    => esc_html__( 'Let\'s build & activate a child theme so you may easily make theme changes.', 'phenix' ),
            'child-success%s'          => esc_html__( 'Your child theme has already been installed and is now activated, if it wasn\'t already.', 'phenix' ),
            'child-action-link'        => esc_html__( 'Learn about child themes', 'phenix' ),
            'child-json-success%s'     => esc_html__( 'Awesome. Your child theme has already been installed and is now activated.', 'phenix' ),
            'child-json-already%s'     => esc_html__( 'Awesome. Your child theme has been created and is now activated.', 'phenix' ),
            'plugins-header'           => esc_html__( 'Install Plugins', 'phenix' ),
            'plugins-header-success'   => esc_html__( 'You\'re up to speed!', 'phenix' ),
            'plugins'                  => esc_html__( 'Let\'s install some essential WordPress plugins to get your site up to speed.', 'phenix' ),
            'plugins-success%s'        => esc_html__( 'The required WordPress plugins are all installed and up to date. Press "Next" to continue the setup wizard.', 'phenix' ),
            'plugins-action-link'      => esc_html__( 'Advanced', 'phenix' ),
            'import-header'            => esc_html__( 'Import Content', 'phenix' ),
            'import'                   => esc_html__( 'Let\'s import content to your website, to help you get familiar with the theme.', 'phenix' ),
            'import-action-link'       => esc_html__( 'Advanced', 'phenix' ),
            'ready-header'             => esc_html__( 'One More Step to Go', 'phenix' ),
            'ready%s'                  => esc_html__( 'Your theme has been all set up and one step remaining is to import your demo data and Enjoy your new website by %s.', 'phenix' ),
            'ready-action-link'        => esc_html__( 'Extras', 'phenix' ),
            'ready-big-button'         => esc_html__( 'Import Content', 'phenix' ),
            'ready-link-1'             => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://phenixthemes/themes/', esc_html__( 'Explore More Themes', 'phenix' ) ),
            'ready-link-2'             => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://phenixthemes.com', esc_html__( 'Get Theme Support', 'phenix' ) ),
            'ready-link-3'             => sprintf( '<a href="%1$s">%2$s</a>', admin_url('site-editor.php'), esc_html__( 'Start Customizing', 'phenix' ) ),
        )
    );
endif;

//====> Advanced Demo Importer <======//
if (!function_exists('phenix_demo_import_lists')) :
	/**
	 * Setup Phenix Themes Demos
	 * @since Phenix WP 1.0
	 * @return void
	*/

    function phenix_demo_import_lists(){
        //===> Define Data <===//
        $data_dir = get_template_directory_uri().'/data';

        //===> Demos List <===//
        $demo_lists = array(
            'advanced-systems' =>array(
                'is_pro'   => false,
                'type'     => 'Business',
                'title'    => __('Advanced Systems', 'phenix'),
                'demo_url' => 'https://phenixthemes.com/asfco',
                'keywords'   => array('business', 'multipurpose'),
                'categories' => array('business','multipurpose' ),
                'author'     => __( 'Phenix Themes', 'phenix'),
                'screenshot_url' => $data_dir.'/advanced-systems/screenshot.jpg',
                //===> Data Path <===//
                'template_url' => array(
                    'content' => $data_dir.'/advanced-systems/content.json',
                    'options' => $data_dir.'/advanced-systems/options.json',
                    'widgets' => $data_dir.'/advanced-systems/widgets.json',
                )
            ),
        );

        //===> Send the List <===//
        return $demo_lists;
    }

    add_filter('advanced_import_demo_lists', 'phenix_demo_import_lists');
endif;