<?php
/**
 * Plugin Name: Hover Effects Builder Free
 * Description: Create your own hover effects using build-in Editor and apply them to the images on your website without any CSS coding knowledge.
 * Plugin URI: http://codecanyon.net/item/hover-effects-builder-wordpress-plugin/10932318
 * Version: 1.0.9
 * Author: SeaWebster
 * Author URI: http://seawebster.com/
 * License: 
 */
	defined('ABSPATH') or die("No script kiddies please!");

	// define plugin version
	define( 'HIF_VERSION', '1.0.9' );

	// plugin author
	define( 'HIF_AUTHOR', 'SeaWebster' );

	// plugin author site
	define( 'HIF_AUTHOR_SITE', 'http://seawebster.com/' );

	// plugin codecanyon link
	define( 'HIF_PLUGIN_CC', 'http://codecanyon.net/item/hover-effects-builder-wordpress-plugin/10932318' );

	// changelog file
	define( 'HIF_XML_FILE', HIF_AUTHOR_SITE . 'updates/hover-effects-builder.xml' );

	// define plugin URL
	define( 'HIF_URL', plugin_dir_url( __FILE__ ) );

	// define plugin PATH
	define( 'HIF_PATH', plugin_dir_path( __FILE__ ) );

	// define plugin options prefix
	define( 'HIF_ASSIGNS', 'hi_assigns' );
	define( 'HIF_TEMPLATES', 'hi_templates' );
	define( 'HIF_UPDATES', 'hi_updates' );

	if( ! defined( 'HIF_ACCESS' ) )
	{
		define( 'HIF_ACCESS', 'administrator' );
	}

    if( ! defined( 'HI_VERSION' ) )
    {
        // define is admin
        define( 'HIF_ADMIN', is_admin() );

        // load translations
        load_plugin_textdomain( 'hitd' , false, HIF_PATH . 'languages' );

        // include functions
        include_once( HIF_PATH . 'functions/functions-init.php' );
        include_once( HIF_PATH . 'functions/functions-options.php' );
        include_once( HIF_PATH . 'functions/functions-makestyle.php' );
        include_once( HIF_PATH . 'functions/functions-theme.php' );
        include_once( HIF_PATH . 'functions/functions-update.php' );

        // Divi fixes
        include_once( HIF_PATH . '_divi.php' );

        //include_once( HIF_PATH . 'functions/functions-compatibility.php' );

        include_once( HIF_PATH . 'functions/extension/vc/vc-image-ext/vc_extend.php' );
        include_once( HIF_PATH . 'functions/extension/tinymce/tinymce.php' );

        // init admin interface
        if( HIF_ADMIN )
        {
            hi_admin_hooks();
        }
        else
        {
            hi_frontend_hooks();
        }

        register_activation_hook( __FILE__, 'hi_builder_activate' );
    }

    function hi_secondary_error()
    {
        if( defined( 'HI_VERSION' ) )
        {
            $message = __( 'You cannot use Hover Effects Builder and Hover Effects Builder Free Version at the same time. Please deactivate one of the plugins.', 'hitd' );
            printf( '<div class="notice notice-error"><p>%1$s</p></div>', $message );
        }
    }
    add_action( 'admin_notices', 'hi_secondary_error' );
