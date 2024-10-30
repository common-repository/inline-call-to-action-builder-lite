<?php
defined('ABSPATH') or die('No script kiddies please!!');
if ( !class_exists('ICTABL_Ajax') ) {

    class ICTABL_Ajax extends ICTABL_Library {

        /**
         * All the Admin ajax related tasks are hooked
         *
         * @since 1.0.0
         */
        function __construct() {
            add_action('wp_ajax_ictab_search_posts', array( $this, 'ictab_search_posts' ));
        }


         
         function ictab_search_posts() {
            if ( isset($_POST[ '_wpnonce' ]) && wp_verify_nonce($_POST[ '_wpnonce' ], 'ictab_admin_nonce') ) {
            global $wpdb;
            $paged = isset($_POST[ 'page_number' ]) ? sanitize_text_field($_POST[ 'page_number' ]) : 1;
            $args = array(
                'posts_per_page'   => 8,
                'post_status' => 'publish',
                'post_type'        => array('page','post'),
                'paged' => $paged
            );
            $post_query = new WP_Query( $args );
           ?>
             <div class="ictab-field-wrap">
                    <label><?php _e('Choose Page', ICTABL_TD); ?></label>
                    <div class="ictab-field">
                        <ul>
                            <?php
                            if ( $post_query->have_posts() ) {
                                while ( $post_query->have_posts() ) {
                                    $post_query->the_post();
                                    ?>
                                    <li>
                                    <a class="ictab-page-selected" href="javascript:void(0);"  data-id="<?php echo get_the_ID(); ?>" 
                                      data-href="<?php echo get_the_permalink(get_the_ID());?>"><?php the_title(); ?></a>
                                    </li>
                                    <?php
                                }
                                ?>
                                <p class="description"><?php _e('Please select page for button link redirect.', ICTABL_TD); ?></p>
                                <div class="ictab-pagination-wrap">
                                    <?php
                                    $big = 999999999; // need an unlikely intictaber
                                    $paginate_links = paginate_links(array(
                                        'type' => 'plain',
                                        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                                        'format' => '?paged=%#%',
                                        'current' => max(1, $paged),
                                        'total' => $post_query->max_num_pages
                                    ));
                                    echo $paginate_links;
                                    ?>
                                </div>
                                <?php
                            } else {
                                ?>
                                <li><?php _e('Page not found', ICTABL_TD); ?></li>
                                <?php
                            }
                            ?>
                        </ul>

                    </div>
                </div>
           <?php
             die();
            } else {
                die('No script kiddies please!!');
            }
       }

    }

    new ICTABL_Ajax();
}
