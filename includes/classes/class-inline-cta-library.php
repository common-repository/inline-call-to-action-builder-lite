<?php defined('ABSPATH') or die('No script kiddies please!!');
if ( !class_exists('ICTABL_Library') ) {

    class ICTABL_Library {

        /**
         * Prints array in pre format
         *
         * @since 1.0.0
         *
         * @param array $array
         */
        function displayArr($array) {
            echo "<pre>";
            print_r($array);
            echo "</pre>";
        }

        /**
         * Create necessary data saved to option table
         * 
         * @since 1.0.0
         */
        public function ictab_animation_options() {
             $ictab_animation_options = array(
                'fading_entrances' => array('fadeIn','fadeInLeft','fadeInRight','fadeInUp')
             );
            return $ictab_animation_options;
        }

           /**
         * Get All Google Font Family
         * @since 1.0.0
         */
        public function ictab_get_font_family() {
                $ictab_font_family = array('Arial', 'Abel', 'Abril Fatface', 'Advent Pro', 'Aguafina Script', 
                'Aladin', 'Aldrich', 
                'Bad Script', 'Balthazar', 'Bangers', 'Basic', 'Battambang', 'Belgrano',
                'Belleza', 'BenchNine', 'Bentham', 'Bevan', 'Bilbo', 'Bilbo Swash Caps',
                'Cabin', 'Cabin Condensed', 'Cabin Sketch',  'Caesar Dressing', 'Ceviche One', 'Chango', 'Chenla', 'Cherry Cream Soda',  'Chicle', 'Chivo', 'Cinzel', 'Combo',  'Coming Soon', 'Concert One', 'Condiment', 'Content',
                'Contrail One', 'Convergence', 'Cookie', 'Copse', 'Dekko', 'Delius', 'Emblema One', 'Emilys Candy', 'Engagement', 'Euphoria Script', 'Ewert', 'Exo', 'Exo 2', 'Expletus Sans', 'Fanwood Text', 'Fascinate', 'Fauna One',
                'Federant', 'Federo', 'Felipa',   'Fondamento', 'Fontdiner Swanky', 'Geo', 'Geostar',  'Headland One', 'Henny Penny', 'Herr Von Muellerhoff', 'Hind', 'Holtwood One SC', 'Homemade Apple',   'Iceberg', 'Iceland', 'Italiana', 'Italianno', 'Jacques Francois', 
                'Jim Nightshade', 'Jockey One', 'Jolly Lodger', 'Josefin Sans',
                'Just Me Again Down Here', 'Kadwa', 'Kalam', 'Kaushan Script',
                'Kelly Slab', 'Kenia', 'Khand', 'Khmer', 'Khula', 'Kite One', 'Knewave', 
                'Kristi', 'Krona One', 'Kurale', 'Lato',  'Ledger', 'Lekton',  'Life Savers',
                'Lilita One', 'Lily Script One',  'Maiden Orange', 'Mako', 'Mallanna', 'Mandali', 'Marcellus',
                'Marcellus SC',  'Merienda One', 'Merriweather', 'Metal',  'Metamorphous', 'Milonga', 'Miniver', 'Modern Antiqua',
                'Montez', 'Montserrat', 'Montserrat Alternates', 'Montserrat Subrayada', 'Moul', 
                'Moulpali', 'Mountains of Christmas', 'New Rocker', 'Niconne',  'Noto Sans', 'Noto Serif', 'Nova Mono', 'Nova Oval', 'Nova Round', 'Nova Script', 'Nova Slim', 'Nova Square', 'Numans', 'Nunito', 'Odor Mean Chey', 'Offside', 'Old Standard TT', 'Oldenburg', 'Oleo Script', 'Oxygen', 'Oxygen Mono', 'PT Mono', 'PT Sans',  'PT Serif', 
                'Palanquin Dark', 'Patrick Hand', 'Peralta', 'Permanent Marker',
                'Philosopher', 'Piedra', 'Pinyon Script', 'Pirata One', 'Plaster', 'Playfair Display SC',
                'Podkova', 'Poiret One', 'Poller One', 'Poly', 'Pompiere', 'Pontano Sans', 
                'Preahvihear', 'Press Start 2P', 'Princess Sofia', 'Prociono', 'Prosto One', 'Quando', 'Quantico', 'Quattrocento',  'Rajdhani', 'Raleway', 'Raleway Dots', 'Ramabhadra', 'Ramaraja',
                'Rambla', 'Rammetto One', 'Ranchers', 'Rancho', 'Righteous', 'Risque', 'Roboto', 'Roboto Condensed', 'Roboto Mono', 'Sarala', 'Sarina', 'Sarpanch', 'Satisfy', 'Shadows Into Light', 
                'Sigmar One', 'Signika', 'Signika Negative',  'Slabo 13px', 'Slabo 27px', 
                'Slackey', 'Smokum', 'Sofia', 'Sonsie One',
                'Sree Krushnadevaraya', 'Stalemate', 'Tangerine', 'Taprom', 'Tauri',  'Tenor Sans', 'Text Me One', 'The Girl Next Door', 'Tienne', 'Tillana', 'Timmana', 
                'Tinos',  'Ubuntu', 'Unica One', 'UnifrakturCook', 'Varela', 'Vesper Libre', 'Vibur', 'Wendy One', 'Wire One');
            return $ictab_font_family;
        }

        /**
         * Function to generate random number
         * @param  integer $length Length of the random number to be generated
         * @return mixed Returns the mixed value of number and alphabets
         */
        public function generateRandomIndex($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
       
        /**
         * Sanitizes Multi Dimensional Array
         * @param array $array
         * @param array $sanitize_rule
         * @return array
         *
         * @since 1.0.0
         */
         function sanitize_array($array = array(), $sanitize_rule = array()) {
            if ( !is_array($array) || count($array) == 0 ) {
                return array();
            }

            foreach ( $array as $k => $v ) {
                if ( !is_array($v) ) {

                    $default_sanitize_rule = (is_numeric($k)) ? 'text' : 'html';
                    $sanitize_type = isset($sanitize_rule[ $k ]) ? $sanitize_rule[ $k ] : $default_sanitize_rule;
                    $array[ $k ] = $this->sanitize_value($v, $sanitize_type);
                }
                if ( is_array($v) ) {
                    $array[ $k ] = $this->sanitize_array($v, $sanitize_rule);
                }
            }

            return $array;
        }

        /**
         * Sanitizes Value
         *
         * @param type $value
         * @param type $sanitize_type
         * @return string
         *
         * @since 1.0.0
         */
        function sanitize_value($value = '', $sanitize_type = 'text') {
            switch ( $sanitize_type ) {
                case 'html':
                  return wp_kses_post(stripslashes_deep($value));
                    break;
                default:
                    return sanitize_text_field($value);
                    break;
            }
        }

        /**
         * Query WooCommerce activation check
        */
        public static function is_woocommerce_activated() {
          return class_exists( 'woocommerce' ) ? true : false;
        }


        /**
         * Generates the list of the registered post type
         *
         * @return array $post_types
         * @since 1.0.0
         */
          /*
         * Returns all the registered post types only
         */
        public static function get_registered_post_types() {
           $post_types = get_post_types();
           unset($post_types['attachment']);
           unset($post_types['product_variation']);
           unset($post_types['shop_order']);
           unset($post_types['shop_order_refund']);
           unset($post_types['shop_coupon']);
           unset($post_types['shop_webhook']);
           unset($post_types['wp1slider']);
           unset($post_types['everest_tab']);
           unset($post_types['tabs']);
           unset($post_types['revision']);
           unset($post_types['nav_menu_item']);
           unset($post_types['wp-types-group']);
           unset($post_types['wp-types-user-group']);
           unset($post_types['customize_changeset']);
           unset($post_types['wpcf7_contact_form']);
           unset($post_types['custom_css']);
           unset($post_types['page']);
           unset($post_types['post_tag']);
           unset($post_types['vc4_templates']);
           unset($post_types['vc_grid_item']);
           return $post_types;
       }


       //SLUG TO ID
       public static function ictab_get_ID_by_slug($post_slug) {
         $posts = get_posts(array('name' => $post_slug, 'post_type' => 'inline-cta-builder'));
         return $posts[0]->ID;
        }

        public function  ictab_available_content(){
        $ictab_available_content['available_text'] = array(
            'template1' => array(
                'header_text' => 'TEAM OF CONSULTANTS','descripion' => 'I am member of a team, and I rely on the team. I defer to it and sacrifice for it, because we are the team not the individual, is the ultimate champion.',
                'button1' => 'GET LOCATION','button2' => 'VIEW LOCATION', 'button3' => '', 'sub-title' => '', 
                'default_animation1'=>'',
                'default_animation2'=>'',
                'default_animation3'=>'',
                'bgimage'=>  'http://demo.accesspressthemes.com/wordpress-plugins/inline-cta-builder/available-images/divine-consultant.jpg'
            ),
            'template2' => array(
                'header_text' => 'More than 25 years experience','descripion' => 'Over 24 years experience and knowledge international standards, technologically changes.',
                'button1' => 'Read More','button2' => 'View More','button3' => '','sub-title' => '',
                'default_animation1'=>'button-3d-flip',
                'default_animation2'=>'button-3d-flip',
                'default_animation3'=>'', 
                'bgimage'=>  'http://demo.accesspressthemes.com/wordpress-plugins/inline-cta-builder/available-images/business-promotor.jpg'
            ),
            'template3' => array(
                'header_text' => 'about company','descripion' => 'Worthy time spent <br/> around the world <br/> with traveldry',
                'button1' => 'Book Your Trip','button2' => '','button3' => '','sub-title' => '',
                'default_animation1'=>'button-shine',
                'default_animation2'=>'',
                'default_animation3'=>'', 
                'bgimage'=>  'http://demo.accesspressthemes.com/wordpress-plugins/inline-cta-builder/available-images/traveldry.jpeg'
            ),
             'template4' => array(
                'header_text' => 'Creative Approach','descripion' => 'All our security products are fast, light and pack powerful features to give you the best protection. We develop strategies, create content build products, lauch campaigns, design systems and then some all to inspire the people...',
                'button1' => 'Buy Themes','button2' => 'Buy Plugins','button3' => '','sub-title' => '',
                'default_animation1'=>'',
                'default_animation2'=>'',
                'default_animation3'=>'', 
                'bgimage'=>  'http://demo.accesspressthemes.com/wordpress-plugins/inline-cta-builder/available-images/creative-approach.jpg'
            ),
             'template6' => array(
                'header_text' => 'FIND OUT MORE ABOUT STARTUP THEME?','descripion' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages',
                'button1' => 'MORE FEATURES','button2' => '','button3' => '','sub-title' => '',
                'bgimage'=> '',
                'default_animation1'=>'hvr-bounce-to-right',
                'default_animation2'=>'',
                'default_animation3'=>''
            ),
           'template22' => array(
                'header_text' => "Director's Message",
                'descripion' => 'Capital means wealth in the form of money or other assets owned by a person or organization or available for a purpose such as starling a company or investing.
                Prcesinu commondo curus magna, vei sclersque nisi consecietur et. Cras jsuta aduido, dupibus ac facisis in. egestas eget quam cuismod malis. Consectir adipiscing elit malesuada magna.',
                'button1' => 'KNOW US BETTER','button2' => 'View More','button3' => '','sub-title' => '',
                 'default_animation1'=>'button-reveal-overlay',
                'default_animation2'=>'button-reveal-overlay',
                'default_animation3'=>'',
                 'bgimage'=>  'http://demo.accesspressthemes.com/wordpress-plugins/inline-cta-builder/available-images/special-message.jpg',
                'image1'=> 'http://demo.accesspressthemes.com/wordpress-plugins/inline-cta-builder/available-images/special-message-image.jpeg','image2'=>'',
            ),
           'template24' => array(
                'header_text' => '1500+ Happy Customer',
                'descripion' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
                'button1' => 'DEMO','button2' => 'BUY NOW','button3' => '','sub-title' => '',
                 'default_animation1'=>'button-drop-shadow',
                'default_animation2'=>'button-drop-shadow',
                'default_animation3'=>'',
                'image1'=> 'http://demo.accesspressthemes.com/wordpress-plugins/inline-cta-builder/available-images/product-hightlights-image.png','image2'=>'',
                 'bgimage'=>  'http://demo.accesspressthemes.com/wordpress-plugins/inline-cta-builder/available-images/product-hightlights.jpg',
            ),'template28' => array(
                'header_text' => 'With over 20 years experience providing expert photography',
                'descripion' => 'Various edge infrastructure, backed by industry leading support. Let our hosting bring your digotal strategy to life. This is an easy notice that you have visited one of our paid endorsers while researching your purchase. It is better to lead from behind and to put others in front, especially.',
                'button1' => 'BUY THEME','button2' => 'BUY THEME','button3' => '','sub-title' => '',
                 'default_animation1'=>'button-reveal',
                'default_animation2'=>'button-reveal',
                'default_animation3'=>'',
               'image1'=> 'http://demo.accesspressthemes.com/wordpress-plugins/inline-cta-builder/available-images/infinite-strategy-image.png','image2'=>'',
                 'bgimage'=>  'http://demo.accesspressthemes.com/wordpress-plugins/inline-cta-builder/available-images/infinite-strategy.jpg',
            ),
            'template36' => array(
                'header_text' => 'Hello','descripion' => 'This is Mia, model','bgimage'=> '',
                 'button1' => '- a bit about me','button2' => '- my profile','button3' => '','sub-title' => '',
                 'default_animation1'=>'button-underline-text',
                'default_animation2'=> 'button-underline-text',
                'default_animation3'=>'',
                 'image1'=> 'http://demo.accesspressthemes.com/wordpress-plugins/inline-cta-builder/available-images/modern-platform.jpg',
                 'image2'=>'',
            ),'template37' => array(
                'header_text' => 'EVENT SPEAKERS',
                'descripion' => 'Transforming ideas into real products & make sure about the quality!',
                'button1' => '','button2' => '','button3' => '','sub-title' => '',
                 'default_animation1'=>'',
                'default_animation2'=> '',
                'default_animation3'=>'',
                'image1'=> 'http://demo.accesspressthemes.com/wordpress-plugins/inline-cta-builder/available-images/events-speaker-image.jpeg','image2'=>'',
                 'bgimage'=>  'http://demo.accesspressthemes.com/wordpress-plugins/inline-cta-builder/available-images/events-cta.jpg',
            )
        );
          return $ictab_available_content;
       }

       public function get_available_template_name(){
          $template_arr = 
          array(
             '1' => 'Divine Consultants',
             '2' => 'Business Promotor',
             '3' => 'Travel Dry',
             '4' => 'Creative Approach',
             '6' => 'Simple StartUp',
             '22' => 'Special Message',
             '24' => 'Product Highlights',
             '28' => 'Infinite Strategy',
             '36' => 'Model Platform',
             '37' => 'Event CTA',
            );
          return $template_arr;
       }

 }

}