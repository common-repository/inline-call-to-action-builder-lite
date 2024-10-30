<?php defined('ABSPATH') or die('No script kiddies please!!');
if (!class_exists('ICTABL_Register_Posttype')):

    class ICTABL_Register_Posttype extends ICTABL_Library {

         /*
         * Executes function of construct with creation of post type
         *  @since 1.0.0
         */
        function __construct() {
            add_action('init', array( $this, 'ictab_register_posttype' ) );
            add_action('admin_menu', array( $this, 'ictab_admin_menu' ) );
            /* Display Settings */
            add_action('add_meta_boxes', array( $this, 'ictab_display_settings' ) );
            add_action('save_post', array($this, 'ictab_display_meta_save'));
            /* Configuration Settings */
            add_action('add_meta_boxes', array( $this, 'ictab_configuration_settings' ) );
            add_action('save_post', array($this, 'ictab_configuration_meta_save'));
            /* ICTAB Elements Settings */
            add_action('add_meta_boxes', array($this, 'ictab_shortcode_usage'));
            add_action( 'add_meta_boxes', array( $this, 'ictab_upgrade_pro' ) );
           // add_action('add_meta_boxes', array($this, 'ictab_button_preview'));
            add_filter('manage_inline-cta-builder_posts_columns', array($this,'ictab_columns_head'));
            add_action('manage_inline-cta-builder_posts_custom_column', array($this,'ictab_columns_content'), 10, 2);
            add_filter('the_content', array($this, 'preview_ictab_builder'));
            add_action('admin_head-post-new.php', array($this, 'ictab_admin_css'));
            add_action('admin_head-post.php', array($this, 'ictab_admin_css'));
            add_filter('post_row_actions', array($this, 'ictab_remove_row_actions'), 10, 1);
            add_action( 'admin_action_ictab_duplicate_cta_builder',array($this, 'ictab_duplicate_tab_as_draft' ));

            //action to export cta post
            add_action('admin_post_ictab_export_form_action', array($this, 'ictab_export_cta_post') );
           //action to import cta post
            add_action('admin_post_ictab_import_form_action', array($this, 'ictab_import_cta_post') );
            add_action( 'admin_init', array( $this, 'redirect_to_site' ), 1 );
            add_filter( 'plugin_row_meta', array( $this, 'plugin_row_meta' ), 10, 2 );
            add_filter( 'admin_footer_text', array( $this, 'admin_footer_text' ) );
        }

        function admin_footer_text( $text ){
            $link = 'https://wordpress.org/support/plugin/inline-call-to-action-builder-lite/reviews/#new-post';
            $pro_link = 'https://accesspressthemes.com/wordpress-plugins/inline-cta-builder/';
        if(isset( $_GET[ 'page' ] )){
            if($_GET[ 'page' ] == 'ictab-import-export' || $_GET[ 'page' ] == 'ictab-how-to-use'
                || $_GET[ 'page' ] == 'ictab-about-us' || $_GET[ 'page' ] == 'ictab-how-to-use'){
                $text = 'Enjoyed Inline Call To Action Builder Lite? <a href="' . $link . '" target="_blank">Please leave us a ★★★★★ rating</a> We really appreciate your support! | Try premium version of <a href="' . $pro_link . '" target="_blank">Inline Call To Action Builder</a> - more features, more power!';
            }
         }
         $screen = (array) get_current_screen();
         if(isset( $_GET[ 'post_type' ] )){
            if($_GET[ 'post_type' ] == 'inline-cta-builder'){
                $text = 'Enjoyed Inline Call To Action Builder Lite? <a href="' . $link . '" target="_blank">Please leave us a ★★★★★ rating</a> We really appreciate your support! | Try premium version of <a href="' . $pro_link . '" target="_blank">Inline Call To Action Builder</a> - more features, more power!';
            }
         }else if(isset($screen['post_type']) && $screen['post_type'] == 'inline-cta-builder'){
           $text = 'Enjoyed Inline Call To Action Builder Lite? <a href="' . $link . '" target="_blank">Please leave us a ★★★★★ rating</a> We really appreciate your support! | Try premium version of <a href="' . $pro_link . '" target="_blank">Inline Call To Action Builder</a> - more features, more power!';
         }
        return $text;
        }

      function redirect_to_site(){
            if ( isset( $_GET[ 'page' ] ) && $_GET[ 'page' ] == 'ictab-doclinks' ) {
                wp_redirect( 'https://accesspressthemes.com/documentation/inline-cta-builder-lite/' );
                exit();
            }
            if ( isset( $_GET[ 'page' ] ) && $_GET[ 'page' ] == 'ictab-premium' ) {
                wp_redirect( 'https://accesspressthemes.com/wordpress-plugins/inline-cta-builder/' );
                exit();
            }
        }

      function plugin_row_meta( $links, $file ){
            if ( strpos( $file, 'inline-cta-builder-lite.php' ) !== false ) {
                $new_links = array(
                    'demo' => '<a href="http://demo.accesspressthemes.com/wordpress-plugins/inline-cta-builder-lite" target="_blank"><span class="dashicons dashicons-welcome-view-site"></span>Live Demo</a>',
                    'doc' => '<a href="https://accesspressthemes.com/documentation/inline-cta-builder-lite/" target="_blank"><span class="dashicons dashicons-media-document"></span>Documentation</a>',
                    'support' => '<a href="http://accesspressthemes.com/support" target="_blank"><span class="dashicons dashicons-admin-users"></span>Support</a>',
                    'pro' => '<a href="https://accesspressthemes.com/wordpress-plugins/inline-cta-builder/" target="_blank"><span class="dashicons dashicons-cart"></span>Premium version</a>'
                );
                $links = array_merge( $links, $new_links );
            }
            return $links;
        }

        /*
         * Register Post Type: inline-cta-builder
        */
        public function ictab_register_posttype(){
            load_plugin_textdomain('inline-cta-builder-lite', false, basename(dirname(__FILE__)) . '/languages/');
            $labels = array(
                'name'               => _x( 'Inline CTA Builder Lite', 'post type general name', ICTABL_TD ),
                'singular_name'      => _x( 'Inline CTA Builder Lite', 'post type singular name', ICTABL_TD ),
                'menu_name'          => _x( 'Inline CTA Builder Lite', 'admin menu', ICTABL_TD ),
                'name_admin_bar'     => _x( 'Inline CTA Builder Lite', 'add new on admin bar', ICTABL_TD ),
                'add_new'            => _x( 'Add New CTA', 'Inline CTA Builder Lite', ICTABL_TD ),
                'add_new_item'       => __( 'Add New CTA', ICTABL_TD ),
                'new_item'           => __( 'New CTA', ICTABL_TD ),
                'edit_item'          => __( 'Edit CTA', ICTABL_TD ),
                'view_item'          => __( 'View CTA', ICTABL_TD ),
                'all_items'          => __( 'All Inline CTA', ICTABL_TD ),
                'search_items'       => __( 'Search Inline CTA', ICTABL_TD ),
                'parent_item_colon'  => __( 'Parent Inline CTA:', ICTABL_TD ),
                'not_found'          => __( 'No any data found.', ICTABL_TD ),
                'not_found_in_trash' => __( 'No any data found in trash.', ICTABL_TD )
            );

            $args = array(
                'labels'             => $labels,
                'description'        => __( 'Description.', ICTABL_TD ),
                'public'             => false,
                'publicly_queryable' => true,
                'show_ui'            => true,
                'show_in_menu'       => true,
                'menu_icon'          => 'dashicons-feedback',
                'query_var'          => true,
                'rewrite'            => array( 'slug' => 'inline-cta-builder' ),
                'capability_type'    => 'post',
                'has_archive'        => true,
                'hierarchical'       => false,
                'menu_position'      => null,
                'supports'           => array( 'title')
            );
            register_post_type('inline-cta-builder', $args);
        }

        /*
        * Admin Menu Item
        */
        public function ictab_admin_menu(){
            add_submenu_page('edit.php?post_type=inline-cta-builder', __('Import/Export', ICTABL_TD), __('Import/Export', ICTABL_TD), 'manage_options', 'ictab-import-export', array($this, 'ictab_import_export_callback'));
            add_submenu_page('edit.php?post_type=inline-cta-builder', __('How To Use', ICTABL_TD), __('How To Use', ICTABL_TD), 'manage_options', 'ictab-how-to-use', array($this, 'ictab_how_to_use_callback'));
            add_submenu_page('edit.php?post_type=inline-cta-builder', __('More WordPress Stuff', ICTABL_TD), __('More WordPress Stuff', ICTABL_TD), 'manage_options', 'ictab-about-us', array($this, 'ictab_about_us_callback'));
             add_submenu_page('edit.php?post_type=inline-cta-builder', __('Documentation', ICTABL_TD), __('Documentation', ICTABL_TD), 'manage_options', 'ictab-doclinks', '__return_false', null, 9 );
             add_submenu_page('edit.php?post_type=inline-cta-builder', __('Check Premium Version', ICTABL_TD), __('Check Premium Version', ICTABL_TD), 'manage_options', 'ictab-premium', '__return_false', null, 9 );
        }

        /*
        * How To Use Page
        */
        public function ictab_how_to_use_callback(){
            include(ICTABL_PATH. '/includes/views/backend/settings/ictab-howtouse.php');
        }

        /*
        * Import/Export Page
        */
        public function ictab_import_export_callback(){
            include(ICTABL_PATH. '/includes/views/backend/settings/ictab-import-export.php');
        }

        /*
        * More WordPress Stuff Page
        */
        public function ictab_about_us_callback(){
            include(ICTABL_PATH. '/includes/views/backend/settings/ictab-about.php');
        }

        /*
        * Post Type Section: Display Settings
        */
        public function ictab_display_settings(){
           add_meta_box('ictab_display_settings',__('Display Settings',ICTABL_TD),array($this, 'render_display_settings_callback'),'inline-cta-builder','normal','high');
        }


        public function render_display_settings_callback( $post ){
             // Add nonce for security and authentication.
            wp_nonce_field(basename(__FILE__),'ictab_display_setup_nonce');
            include(ICTABL_PATH.'/includes/views/backend/metabox/ictab-display-settings.php');
        }

         /*
        * Save Display Settings Data
        */
        public function ictab_display_meta_save( $post_id ){
            $output_arr = array();
            if (isset($_POST['ictab_display_settings'])) {
                $_POST = array_map('stripslashes_deep', $_POST);
                $ictab_display_settings = $this->sanitize_array($_POST['ictab_display_settings']);
                update_post_meta($post_id, 'ictab_display_settings',$ictab_display_settings);
            }
            return;
            // Checks save status
            $is_autosave = wp_is_post_autosave($post_id);
            $is_revision = wp_is_post_revision($post_id);
            $is_valid_nonce = ( isset($_POST['ictab_display_setup_nonce']) && wp_verify_nonce($_POST['ictab_display_setup_nonce'], basename(__FILE__)) ) ? 'true' : 'false';
            // Exits script depending on save status
            if ($is_autosave || $is_revision || !$is_valid_nonce) {
                return;
            }
        }

        /*
        * Post Type Section: Configuration Settings
        */
        public function ictab_configuration_settings(){
           add_meta_box('ictab_configuration_settings',__('Configuration Settings',ICTABL_TD),array($this, 'render_configuration_settings_callback'),'inline-cta-builder','normal','high');
        }


        public function render_configuration_settings_callback( $post ){
             // Add nonce for security and authentication.
            wp_nonce_field(basename(__FILE__),'ictab_configuration_setup_nonce');
            include(ICTABL_PATH.'/includes/views/backend/metabox/ictab-configuration-settings.php');
        }

        /*
        * Save Configuration Data
        */
        public function ictab_configuration_meta_save( $post_id ){
            if (isset($_POST['ictab_settings'])) {
                $_POST = array_map('stripslashes_deep', $_POST);
                $ictab_settings = $this->sanitize_array($_POST['ictab_settings']);
                update_post_meta($post_id, 'ictab_settings',$ictab_settings);
            }
            return;
            // Checks save status
            $is_autosave = wp_is_post_autosave($post_id);
            $is_revision = wp_is_post_revision($post_id);
            $is_valid_nonce = ( isset($_POST['ictab_configuration_setup_nonce']) && wp_verify_nonce($_POST['ictab_configuration_setup_nonce'], basename(__FILE__)) ) ? 'true' : 'false';
            // Exits script depending on save status
            if ($is_autosave || $is_revision || !$is_valid_nonce) {
                return;
            }
        }

        /*
        * Post Type Section: Display Shortcode Section
        */
        public function ictab_shortcode_usage(){
            add_meta_box('ictab_builder_shortcode_settings',__('Inline CTA Builder Lite Shortcode',ICTABL_TD),array($this, 'render_sc_usage_callback'),'inline-cta-builder','side','default');
        }

        public function ictab_upgrade_pro(){
         add_meta_box( 'ictab_upgrade_banner', __( 'Upgrade to Inline CTA Builder', ICTABL_TD), array( $this, 'ictab_upgrade_action' ), 'inline-cta-builder', 'side', 'default' );
        }

        function ictab_upgrade_action( $post ){
           include(ICTABL_PATH.'/includes/views/backend/metabox/ictab-upgrade-right.php');
       }

        public function render_sc_usage_callback( $post ){
            wp_nonce_field(basename(__FILE__),'ictab_sc_nonce');
            include(ICTABL_PATH.'/includes/views/backend/metabox/ictab-sc-usage-settings.php');
        }

        /*
        * Add custom column to Inline CTA Post type
        */
        public function ictab_columns_head( $defaults ){
             $defaults['shortcodes'] = __('Shortcodes', ICTABL_TD);
             $defaults['template'] = __('Template Include', ICTABL_TD);
              unset($defaults['date']);   // remove it from the columns list
              $defaults['date'] = __('Date', ICTABL_TD);
              return $defaults;
        }

        /*
         * Added content to custom column to Inline CTA Builder Post-Type
        */
        public function ictab_columns_content( $column, $post_ID ){
             if ($column == 'shortcodes') {
                $id = $post_ID;
                $post = get_post($id);
                $slug = $post->post_name;
                if($slug != ''){ ?>
                <textarea class="ictab-shortcode-display-value" style="resize: none;" rows="2" cols="40" readonly="readonly">[ictabs alias="<?php echo $slug; ?>"]</textarea>
                <span class="ictab-copied-info" style="display: none;"><?php _e('Shortcode copied to your clipboard.', ICTABL_TD); ?></span>
               <?php  }else{
                  echo 'Posts not published yet.';
               }
                }
            if ($column == 'template') {
                $id = $post_ID;
                $post = get_post($id);
                $slug = $post->post_name;
                 if($slug != ''){ ?>
                <textarea class="ictab-shortcode-display-value" style="resize: none;" rows="2" cols="45" readonly="readonly">&lt;?php echo do_shortcode("[ictabs alias='<?php echo $slug; ?>']"); ?&gt;</textarea>
                <span class="ictab-copied-info" style="display: none;"><?php _e('Shortcode copied to your clipboard.', ICTABL_TD); ?></span>
                <?php }else{
                   echo 'Posts not published yet.';
                  }
            }
        }


        public function ictab_admin_css(){
            global $post_type;
            $post_types = array(
                'inline-cta-builder'
            );
            if (in_array($post_type, $post_types))
                echo '<style type="text/css"> #view-post-btn, .updated a,#screen-meta-links .screen-meta-toggle
                {display: none;}</style>';
        }

        /*
         * Display Backend Preview on single page itself with shortcode load
         */
        public function preview_ictab_builder($content) {
            global $post;
            if ( is_singular( 'inline-cta-builder' ) ) {
                if (isset($_GET['preview_id']) && is_user_logged_in()) {
                    $ictab_postid = intval($_GET['preview_id']);
                    $post = get_post($ictab_postid);
                    $alias = $post->post_name;
                    return do_shortcode("[ictabs alias='$alias']");
                }if (isset($_GET['p']) && is_user_logged_in()) {
                    $ictab_postid = intval($_GET['p']);
                    $post = get_post($ictab_postid);
                    $alias = $post->post_name;
                    return do_shortcode("[ictabs alias='$alias']");
                }else{
                    $alias = $post->post_name;
                    return do_shortcode("[ictabs alias='$alias']");
                }
            }else {
                return $content;
            }
        }

     public function ictab_remove_row_actions($actions){
             if (get_post_type() == 'inline-cta-builder') {
                $post_id = get_the_ID();
               // choose the post type where you want to hide the button
                unset($actions['view']); // this hides the VIEW button on your edit post screen
                unset($actions['inline hide-if-no-js']);
                if (current_user_can('edit_posts')) {
                 $actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=ictab_duplicate_cta_builder&post=' . $post_id, basename(__FILE__), 'ictab_duplicate_nonce' ) . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
               }
            }
            return $actions;
        }

      /*
      * Function creates post duplicate as a draft and redirects then to the edit post screen
      */
      public function ictab_duplicate_tab_as_draft(){
        global $wpdb;
                if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'ictab_duplicate_cta_builder' == $_REQUEST['action'] ) ) ) {
                    wp_die('No post to duplicate has been supplied!');
                }

                /*
                 * Nonce verification
                 */
                if ( !isset( $_GET['ictab_duplicate_nonce'] ) || !wp_verify_nonce( $_GET['ictab_duplicate_nonce'], basename( __FILE__ ) ) )
                    return;

                /*
                 * get the original post id
                 */
                $post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
                /*
                 * and all the original post data then
                 */
                $post = get_post( $post_id );

                /*
                 * if you don't want current user to be the new post author,
                 * then change next couple of lines to this: $new_post_author = $post->post_author;
                 */
                $current_user = wp_get_current_user();
                $new_post_author = $current_user->ID;

                /*
                 * if post data exists, create the post duplicate
                 */
                if (isset( $post ) && $post != null) {

                    /*
                     * new post data array
                     */
                    $args = array(
                        'comment_status' => $post->comment_status,
                        'ping_status'    => $post->ping_status,
                        'post_author'    => $new_post_author,
                        'post_content'   => $post->post_content,
                        'post_excerpt'   => $post->post_excerpt,
                        'post_name'      => $post->post_name,
                        'post_parent'    => $post->post_parent,
                        'post_password'  => $post->post_password,
                        'post_status'    => 'draft',
                        'post_title'     => $post->post_title,
                        'post_type'      => $post->post_type,
                        'to_ping'        => $post->to_ping,
                        'menu_order'     => $post->menu_order
                    );

                    /*
                     * insert the post by wp_insert_post() function
                     */
                    $new_post_id = wp_insert_post( $args );

                    /*
                     * get all current post terms ad set them to the new post draft
                     */
                    $taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
                    foreach ($taxonomies as $taxonomy) {
                        $post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
                        wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
                    }

                    /*
                     * duplicate all post meta just in two SQL queries
                     */
                    $post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
                    if (count($post_meta_infos)!=0) {
                        $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
                        foreach ($post_meta_infos as $meta_info) {
                            $meta_key = $meta_info->meta_key;
                            if( $meta_key == '_wp_old_slug' ) continue;
                            $meta_value = addslashes($meta_info->meta_value);
                            $sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
                        }
                        $sql_query.= implode(" UNION ALL ", $sql_query_sel);
                        $wpdb->query($sql_query);
                    }


                    /*
                     * finally, redirect to the edit post screen for the new draft
                     */
                    wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
                    exit;
                } else {
                    wp_die('Inline CTA Builder Lite Post creation failed, could not find original post: ' . $post_id);
                }
         }

         /**
         * Function to export the cta post of the plugin
         * @return Boolean provides the json file of the specified shortcode id
         */
       public function ictab_export_cta_post() {
            global $wpdb;
            if(isset($_POST['action']) && $_POST['action'] == 'ictab_export_form_action' && wp_verify_nonce($_POST['ictab_export_nonce_field'], 'ictab-export-nonce')){
              $post_id = (isset($_POST['ictab_export_id']) && $_POST['ictab_export_id'] != '')?intval($_POST['ictab_export_id']):'';
              if($post_id != ''){
                  $post_arr = get_post( $post_id );
                  $current_user = wp_get_current_user();
                  $new_post_author = $current_user->ID;
                  if (isset( $post_arr ) && $post_arr != null) {
                  $filename = sanitize_title( $post_arr->post_name );
                  $args = array(
                        'comment_status' => $post_arr->comment_status,
                        'ping_status'    => $post_arr->ping_status,
                        'post_author'    => $new_post_author,
                        'post_content'   => $post_arr->post_content,
                        'post_excerpt'   => $post_arr->post_excerpt,
                        'post_name'      => $post_arr->post_name,
                        'post_parent'    => $post_arr->post_parent,
                        'post_password'  => $post_arr->post_password,
                        'post_status'    => 'draft',
                        'post_title'     => $post_arr->post_title,
                        'post_type'      => $post_arr->post_type,
                        'to_ping'        => $post_arr->to_ping,
                        'menu_order'     => $post_arr->menu_order
                    );
                    $post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
                    if (count($post_meta_infos)!=0) {
                        foreach ($post_meta_infos as $meta_info) {
                            $meta_key = $meta_info->meta_key;
                            if( $meta_key == '_wp_old_slug' ) continue;
                            $meta_value = addslashes($meta_info->meta_value);
                            $args['key'][$meta_key] = $meta_value;
                        }
                    }
                    $json = json_encode( $args );
                    header( 'Content-disposition: attachment; filename=' . $filename . '.json' );
                    header( 'Content-type: application/json' );
                    echo( $json );
                  }else{
                    wp_redirect( admin_url( 'edit.php?post_type=inline-cta-builder&page=ictab-import-export&message=2' ) );
                     exit;
                 }
              }
            } else {
                die( 'No script kiddies please!!' );
            }
        }

        /**
         * Function to perform the upload of the json data to plugin post data
         * @return boolean return true or false based on the operation and redirect according to it.
         */
        public function ictab_import_cta_post() {

            if(isset($_POST['action']) && $_POST['action'] == 'ictab_import_form_action' && wp_verify_nonce($_POST['ictab_import_nonce_field'], 'ictab-import-nonce')){

                $filetype = (isset($_POST['ictab_import_file_type']) && $_POST['ictab_import_file_type'] == 'demo_json')?'demo_json':'custom_json';
                $demo_import_file = (isset($_POST['demo_import_file']) && $_POST['demo_import_file'] != '')?$_POST['demo_import_file']:'';

                if($filetype  == "demo_json"){
                //from demo import
                    $demo_import_file = $_POST['demo_import_file'];
                    $demopath = ICTABL_PATH . 'demo/' .$demo_import_file;
                    $filename_array = explode( '.',  $demopath );
                    $filename_ext = $filename_array[1];
                    if ( $filename_ext == 'json' ) {
                            $params = array(
                                'sslverify' => false,
                                'timeout' => 60
                            );
                       $url = ICTABL_URL . '/demo/' . $demo_import_file;
                       $connection = wp_remote_get( $url, $params );
                       if ( !is_wp_error( $connection ) ) {
                                $body = $connection['body'];
                                $cta_post_value = json_decode( $body );
                                $check = self:: ictab_import_cta_data( $cta_post_value );
                                  if ( $check ) {
                                     wp_redirect( admin_url( 'edit.php?post_type=inline-cta-builder&page=ictab-import-export&message=1' ) );
                                    exit;
                                } else {
                                     wp_redirect( admin_url( 'edit.php?post_type=inline-cta-builder&page=ictab-import-export&message=3' ) );
                                    exit;
                                }
                            }else {
                                wp_redirect( admin_url( 'edit.php?post_type=inline-cta-builder&page=ictab-import-export&message=3' ) );
                                exit;
                           }

                   }else{
                     wp_redirect( admin_url( 'edit.php?post_type=inline-cta-builder&page=ictab-import-export&message=5' ) );
                     exit;
                   }
                }else if($filetype  == "custom_json"){
                  //custom json
                   if ( !empty( $_FILES ) && $_FILES['import_cta_file']['name'] != '' ) {
                     $filename = $_FILES['import_cta_file']['name'];
                     $filename_array = explode( '.', $filename );
                     $filename_ext = end( $filename_array );
                      if ( $filename_ext == 'json' ) {
                            $new_filename = 'ictab-post-' . rand( 111111, 999999 ) . '.' . $filename_ext;
                            $upload_path = ICTABL_PATH . '/temp/' . $new_filename;
                            $source_path = $_FILES['import_cta_file']['tmp_name'];
                            $check = @move_uploaded_file( $source_path, $upload_path );

                              if ( $check ) {
                                    $url = ICTABL_URL . '/temp/' . $new_filename;
                                    $params = array(
                                        'sslverify' => false,
                                        'timeout' => 60
                                    );
                                    $connection = wp_remote_get( $url, $params );
                                    if ( !is_wp_error( $connection ) ) {
                                        $body = $connection['body'];
                                        $cta_post_value = json_decode( $body );
                                        unlink( $upload_path );
                                        $check = self:: ictab_import_cta_data( $cta_post_value );
                                        if ( $check ) {
                                             wp_redirect( admin_url( 'edit.php?post_type=inline-cta-builder&page=ictab-import-export&message=1' ) );
                                            exit;
                                        } else {
                                             wp_redirect( admin_url( 'edit.php?post_type=inline-cta-builder&page=ictab-import-export&message=3' ) );
                                            exit;
                                        }
                                    } else {
                                        wp_redirect( admin_url( 'edit.php?post_type=inline-cta-builder&page=ictab-import-export&message=3' ) );
                                        exit;
                                    }
                                } else {
                                    wp_redirect( admin_url( 'edit.php?post_type=inline-cta-builder&page=ictab-import-export&message=4' ) );
                                    exit;
                                }

                      }else {
                        wp_redirect( admin_url( 'edit.php?post_type=inline-cta-builder&page=ictab-import-export&message=5' ) );
                        exit;
                      }
                   }
                    wp_redirect( admin_url( 'edit.php?post_type=inline-cta-builder&page=ictab-import-export&message=7' ) );
                    exit;
                }else{
                    wp_redirect( admin_url( 'edit.php?post_type=inline-cta-builder&page=ictab-import-export&message=6' ) );
                    exit;
                }

            }else {
                die( 'No script kiddies please!!' );
            }

        }

        /*
        * Custom CTA Posts Import
        */
        public function ictab_import_cta_data($cta_post_value ){
            global $wpdb;
            $cta_post_value = ( array ) $cta_post_value;
            /*
             * if you don't want current user to be the new post author,
             * then change next couple of lines to this: $new_post_author = $post->post_author;
             */
            $current_user = wp_get_current_user();
            $new_post_author = $current_user->ID;
            $args = array(
                        'comment_status' => $cta_post_value['comment_status'],
                        'ping_status'    => $cta_post_value['ping_status'],
                        'post_author'    => $new_post_author,
                        'post_content'   => $cta_post_value['post_content'],
                        'post_excerpt'   => $cta_post_value['post_excerpt'],
                        'post_name'      => $cta_post_value['post_name'],
                        'post_parent'    => $cta_post_value['post_parent'],
                        'post_password'  => $cta_post_value['post_password'],
                        'post_status'    => 'draft',
                        'post_title'     => $cta_post_value['post_title'],
                        'post_type'      => $cta_post_value['post_type'],
                        'to_ping'        => $cta_post_value['to_ping'],
                        'menu_order'     => $cta_post_value['menu_order']
             );
             /*
             * insert the post by wp_insert_post() function
             */
            $new_post_id = wp_insert_post( $args );
            /*
             * Import all post meta just in two SQL queries
             */
             if (count($cta_post_value['key'])!=0) {
                $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
                foreach ($cta_post_value['key'] as $meta_key => $meta_value) {
                  $sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
                }
                $sql_query.= implode(" UNION ALL ", $sql_query_sel);
                $wpdb->query($sql_query);
             }
           return true;
        }

    }
new ICTABL_Register_Posttype();
endif;
