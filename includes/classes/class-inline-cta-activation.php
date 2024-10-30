<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!!' );
if ( !class_exists( 'ICTABL_Activation' ) ) {

    class ICTABL_Activation extends ICTABL_Library{

        /**
         * Executes all the tasks on plugin activation
         * 
         * @since 1.0.0
         */
        function __construct() {
            register_activation_hook( ICTABL_PATH . 'inline-cta-builder-lite.php', array( $this, 'fn_ictab_on_activation' ) );
        }

        /**
         * All the activation tasks
         * Creating tables for all blogs in a WordPress Multisite installation
         * 
         * @since 1.0.0
         */
        function fn_ictab_on_activation() {
            include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
            if (is_plugin_active('inline-cta-builder/inline-cta-builder.php')) {
                wp_die(__('You need to deactivate Inline Call To Action Builder Premium Plugin in order to activate Inline Call To Action Builder Lite plugin.Please deactivate premium one. On deactivating premium plugin, your premium plugin data will not be removed.', ICTABL_TD));
            }

           if (!get_option('ictabl_animation_options')) {
               $ictab_animation_options = $this->ictab_animation_options();
               update_option('ictabl_animation_options', $ictab_animation_options);
           }
            /** Updating Google font into Database */
            $ictab_font_family = $this->ictab_get_font_family();
            if (!get_option('ictab_typo_fonts')) {
                update_option('ictab_typo_fonts', $ictab_font_family);
            } 
        }


    }

    new ICTABL_Activation();
}
