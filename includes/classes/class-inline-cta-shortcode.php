<?php defined('ABSPATH') or die('No script kiddies please!!');
if (!class_exists('ICTABL_Shortcode')) {

    /**
     * Frontend Inline CTA Builder Shortcode
     */
    class ICTABL_Shortcode extends ICTABL_Library {

        function __construct() {
            add_shortcode('ictabs', array($this, 'ictab_shortcode_generator'));
           
        }

        /*
         * Generating shortcode with post slug
         */
       public function ictab_shortcode_generator($atts) {
        if(isset($atts['alias'])){
            $args = array(
                'post_type' => 'inline-cta-builder',
                'post_status' => 'publish',
                'posts_per_page' => 1,
                'p' => $this->ictab_get_ID_by_slug($atts['alias'])
            );
            $ictab_posts = new WP_Query($args);
             // $this->displayArr($ictab_posts);
            if ($ictab_posts->have_posts()) {
                ob_start();
                include( ICTABL_PATH . '/includes/views/frontend/ictab-shortcode.php' );
                $return_data = ob_get_contents();
                ob_end_clean();
                wp_reset_query();
                if (isset($return_data)) {
                    return $return_data;
                } else {
                    return NULL;
                }
             } else {
                wp_reset_query();
                return null;
            }
           }
            
        }

    }

    new ICTABL_Shortcode();
}