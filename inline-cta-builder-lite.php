<?php defined('ABSPATH') or die('No script kiddies please!!');
/*
  Plugin Name: Inline Call To Action Builder Lite
  Plugin URI: http://accesspressthemes.com/wordpress-plugins/inline-cta-builder-lite
  Description: Responsive Call To Action Layer Plugin For WordPress
  Version: 	1.1.2
  Author:  	AccessPress Themes
  Author URI:  http://accesspressthemes.com
  License: 	GPL2
  License URI: https://www.gnu.org/licenses/gpl-2.0.html
  Domain Path: /languages/
  Text Domain: inline-cta-builder-lite
 */
/**
 * Plugin Main Class
 *
 * @since 1.0.0
 */
if ( !class_exists('Inline_CTABuilder_Lite') ) {

    class Inline_CTABuilder_Lite {

        /**
         * Plugin Main initialization
         *
         * @since 1.0.0
         */
        function __construct() {
            $this->define_constants();
            $this->includes();
        }

        /**
         * Necessary Constants Define
         *
         * @since 1.0.0
         */
        function define_constants() {
            global $wpdb;
            defined('ICTABL_PATH') or define('ICTABL_PATH', plugin_dir_path(__FILE__));
            defined('ICTABL_VERSION') or define('ICTABL_VERSION', '1.1.2'); //plugin version
            defined('ICTABL_TD') or define('ICTABL_TD', 'inline-cta-builder-lite');
            defined('ICTABL_URL') or define('ICTABL_URL', plugin_dir_url(__FILE__)); //plugin directory url
            defined('ICTABL_IMG_DIR') or define('ICTABL_IMG_DIR', plugin_dir_url(__FILE__) . 'images/');
            defined('ICTABL_CSS_DIR') or define('ICTABL_CSS_DIR', plugin_dir_url(__FILE__) . 'css/');
            defined('ICTABL_FONT_CSS_DIR') or define('ICTABL_FONT_CSS_DIR', plugin_dir_url(__FILE__) . 'css/available_icons/');
            defined('ICTABL_JS_DIR') or define('ICTABL_JS_DIR', plugin_dir_url(__FILE__) . 'js/');
        }

        /**
         * Includes all the necessary files
         *
         * @since 1.0.0
         */
        function includes() {
            include(ICTABL_PATH . '/includes/classes/class-inline-cta-library.php');
            include(ICTABL_PATH . '/includes/classes/class-inline-cta-activation.php');
            include(ICTABL_PATH . '/includes/classes/class-inline-cta-register-posttypes.php');
            include(ICTABL_PATH . '/includes/classes/class-inline-cta-enqueue.php');
            include(ICTABL_PATH . '/includes/classes/class-inline-cta-builder-ajax.php');
            include(ICTABL_PATH . '/includes/classes/class-inline-cta-shortcode.php');
        }

    }

    $GLOBALS[ 'ictab_lite_object' ] = new Inline_CTABuilder_Lite();
    $GLOBALS[ 'ictablite_settings' ] = get_option('ictab_settings');
}


