<?php defined('ABSPATH') or die('No script kiddies please!!');
if ( !class_exists('ICTABL_Enqueue_Scripts') ) {

    class ICTABL_Enqueue_Scripts extends ICTABL_Library{

        /**
         * Enqueue all the necessary JS and CSS
         *
         * since @1.0.0
         */
        function __construct() {
            add_action('admin_enqueue_scripts', array( $this, 'ictab_register_admin_assets' ));
            add_action('wp_enqueue_scripts', array( $this, 'ictab_register_frontend_assets' ));
        } 

        function ictab_register_admin_assets() {
            global $typenow,$pagenow;
            $page_array = array( 'inline-cta-builder');
            $spage_array = array(  'ictab-import-export');
            $s1page_array = array(  'ictab-about-us','ictab-how-to-use');
            $ajax_nonce = wp_create_nonce('ictab_admin_nonce');
            $ictab_js_object_array = array(
                'ajax_url' => admin_url('admin-ajax.php'),
                'template_preview_path' => ICTABL_IMG_DIR.'templates-preview/',
                'admin_nonce' => $ajax_nonce,
                'plugin_url' => ICTABL_URL
            );

          if ( isset($_GET[ 'post_type' ]) && in_array(sanitize_text_field($_GET[ 'post_type' ]), $page_array) || $typenow == 'inline-cta-builder') {
            wp_enqueue_media();
            if( isset($_GET[ 'page' ]) &&  in_array(sanitize_text_field($_GET[ 'page' ]), $spage_array)){
                //about us , import,export and how to use
                 wp_enqueue_script('ictab-admin-script', ICTABL_JS_DIR . 'cta-admin.js', array( 'jquery'), ICTABL_VERSION);
            }else{
                if($pagenow == "post-new.php" || isset($_GET['action']) && $_GET['action'] == "edit"){
                    wp_enqueue_style('wp-color-picker');
                    wp_enqueue_editor();
                    wp_enqueue_script('ictab-backend-script', ICTABL_JS_DIR . 'cta-backend.js', array( 'jquery', 'wp-color-picker'), ICTABL_VERSION);
                   
                    wp_enqueue_style('ictab-animate-style', ICTABL_CSS_DIR . 'animate.css', array(), ICTABL_VERSION);
                    wp_enqueue_script('ictab-colorpicker-alpha', ICTABL_JS_DIR . '/icta-color-picker-alpha.js', array('wp-color-picker'), ICTABL_VERSION);

                    //wp_enqueue_style('ictab-hover-animation', ICTABL_CSS_DIR . 'hover.css', array(), ICTABL_VERSION);
                    wp_enqueue_style( 'dashicons' );
                    wp_localize_script('ictab-backend-script', 'ictab_backend_js_params', $ictab_js_object_array);
                }
            }
             wp_enqueue_style('ictab-fontawesome', ICTABL_FONT_CSS_DIR . 'font-awesome/font-awesome.min.css', array(), ICTABL_VERSION);
             wp_enqueue_style('ictab-backend-style', ICTABL_CSS_DIR . 'cta-backend.css', array(), ICTABL_VERSION);
             wp_enqueue_style('ictab-animation-style', ICTABL_CSS_DIR . 'cta-animation.css', array(), ICTABL_VERSION);
          }    
        }

        public function ictab_register_frontend_assets(){
             if($this->is_woocommerce_activated()){
                $wooenabled = "true";
             }else{
                $wooenabled = "false";
             }  
             wp_enqueue_style('ictab-frontend-style', ICTABL_CSS_DIR . 'cta-frontend.css', array(), ICTABL_VERSION);
             wp_enqueue_style('ictab-animation-style', ICTABL_CSS_DIR . 'cta-animation.css', array(), ICTABL_VERSION);
            // wp_enqueue_style('ictab-hover-animation', ICTABL_CSS_DIR . 'hover.css', array(), ICTABL_VERSION);
             wp_enqueue_style('ictab-fontawesome', ICTABL_FONT_CSS_DIR . 'font-awesome/font-awesome.min.css', array(), ICTABL_VERSION);
            
             wp_enqueue_style( 'dashicons' );
             wp_enqueue_script('ictab-wow', ICTABL_JS_DIR . 'wow.js', array( 'jquery' ), ICTABL_VERSION);
             wp_enqueue_script('ictab-fittext', ICTABL_JS_DIR . 'jquery.fittext.js', array( 'jquery' ), ICTABL_VERSION);
             
             wp_enqueue_style('ictab-frontend-animate-style', ICTABL_CSS_DIR . 'animate.css', array(), ICTABL_VERSION);
           
             wp_enqueue_script('ictab-jarallax', ICTABL_JS_DIR . 'jarallax.js', array('jquery'), ICTABL_VERSION , true );
           
             wp_enqueue_script('ictab_jarallax_video_js', ICTABL_JS_DIR . 'jarallax-video.js', array('jquery'), ICTABL_VERSION , true );
             $ictab_script_variable = array(
                'ajax_url' => admin_url() . 'admin-ajax.php',
                'ajax_nonce' => wp_create_nonce('ictab-admin-ajax-nonce'),
                'woocommerce_enabled' => $wooenabled,
                );
              wp_enqueue_script('ictab-frontend-script', ICTABL_JS_DIR . 'cta-frontend.js', array( 'jquery','ictab-fittext','ictab-wow','ictab-jarallax','ictab_jarallax_video_js'), ICTABL_VERSION);
              wp_localize_script('ictab-frontend-script', 'ictab_script_variable', $ictab_script_variable); //localization of php variable in edn-pro-admin-js
        }


    }

    new ICTABL_Enqueue_Scripts();
}