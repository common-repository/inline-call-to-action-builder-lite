<?php defined('ABSPATH') or die("No script kiddies please!"); 
if($post->post_name != ''){
?>
<div class="ictab-sc-usage-wrapper">
     <ul class="ictab-usage-tab-wrap">
        <li data-usage="tab-1" class="ictab-usage-trigger ictab-active">
            <?php _e( 'Shortcode', ICTABL_TD ); ?>
        </li>
        <li data-usage="tab-2" class="ictab-usage-trigger">
            <?php _e( 'Template Include', ICTABL_TD ); ?>
        </li>
    </ul>
     <div class="ictab-usage-post" data-usage-ref="tab-1">
        <p class="description">
                <?php _e('Copy &amp; paste the shortcode directly into any WordPress post or page.',ICTABL_TD);?>
                </p>
        <div class="ictab-shortcode-page-wrap">
            <input type='text' id="sc" class='ictab-short-code' readonly='' value='[ictabs alias="<?php echo $post->post_name; ?>"]' style='width: 100%;' onclick='select()' />
             <span class="ictab-copied-info" style="display: none;"><?php _e('Shortcode copied to your clipboard.', ICTABL_TD); ?></span>
        </div>
    </div>
    <div class="ictab-usage-post" data-usage-ref="tab-2" style="display: none;">
        <p class="description"><?php _e('Copy &amp; paste this code into a template file to include Inline CTA within your theme.',ICTABL_TD);?></p>
        <div class = "ictab-shortcode-theme-wrap">
            <textarea id="sc2" cols="37" rows="3" class='ictab-short-code2' readonly='readonly'>&lt;?php echo do_shortcode("[ictabs alias="<?php echo $post->post_name; ?>"]")?&gt;</textarea>
            <span class="ictab-copied-info2" style="display: none;"><?php _e('Shortcode copied to your clipboard.', ICTABL_TD); ?></span>
        </div>
    </div>
</div>
<?php }else{ ?>
<p class="description"><?php _e('You need to publish this post first in order to get its shortcode.',ICTABL_TD);?></p>
<?php }?>