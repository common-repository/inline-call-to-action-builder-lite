<?php defined('ABSPATH') or die('No script kiddies please!!');
global $post;
$postid         = $post->ID;
$ictab_display_settings = get_post_meta($postid, 'ictab_display_settings', true);
$template_type  = (isset($ictab_display_settings['display_options']['template_type']) && $ictab_display_settings['display_options']['template_type'] != '')?esc_attr($ictab_display_settings['display_options']['template_type']):'available';
$template       = (isset($ictab_display_settings['display_options']['template_number']) && $ictab_display_settings['display_options']['template_number'] != '')?esc_attr($ictab_display_settings['display_options']['template_number']):'template1';
?>
<div class="ictab-wrapper ictab-display-settings">
   <div class="ictab-body-display-wrapper ictab-display-template-options">
	  <div class="ictab-field-options-wrap">
         <div class="ictab-label-field"><label><?php echo __('Select Template Type', ICTABL_TD) ?></label></div>
         <div class="ictab-input-field"> 
           <label class="ictab-template ictab-active-template">
           	<input type="radio" value="available" class="ictab-template-type-option" 
           	name="ictab_display_settings[display_options][template_type]" <?php if($template_type == "available") echo 'checked="checked"';?>>
           	<?php echo __('Pre Available Templates', ICTABL_TD) ?>
           </label>
        </div>
	   </div>
     <div class="ictab-components-docs-wrap" <?php if($template_type == "custom") echo 'style="display:none;"';?>>
      <?php
      for ( $i = 1; $i <= 50; $i++ ) {
          ?>
            <p  data-template-ref="template<?php echo $i; ?>" <?php echo ($template != 'template'.$i) ? 'style="display:none"' : ''; ?>>
            <?php _e('Checkout Template Documentation', ICTABL_TD); ?> 
            <a href="http://demo.accesspressthemes.com/wordpress-plugins/inline-cta-builder/docs/template<?php echo $i; ?>.png"
             target="_blank">
              <?php _e('Here', ICTABL_TD); ?></a>
            </p>
          <?php } ?>  
     </div>
	   <div class="ictab-available-template-show-wrapper">
			   <div class="ictab-field-options-wrap">
		         <div class="ictab-label-field"><label><?php echo __('Choose Template', ICTABL_TD) ?></label></div>
		         <div class="ictab-input-field"> 
              <?php 
              $template_arr = $this->get_available_template_name(); ?>
               <select name="ictab_display_settings[display_options][template_number]" class="ictab-template-selector ictab-select-field" id="ictab-template-selector">
                <option value="template1"><?php _e('Select Template', ICTABL_TD); ?></option>
                       <optgroup class="ictab-group-popup-label" label="<?php _e('Simple Text CTA', ICTABL_TD); ?>">
                         <option value="template1" <?php if($template == 'template1') echo 'selected="selected"';?>>Divine Consultants</option>    
                         <option value="template2" <?php if($template == 'template2') echo 'selected="selected"';?>>Business Promotor</option>    
                         <option value="template3" <?php if($template == 'template3') echo 'selected="selected"';?>>Travel Dry</option>    
                         <option value="template4" <?php if($template == 'template4') echo 'selected="selected"';?>>Creative Approach</option>    
                         <option value="template6" <?php if($template == 'template6') echo 'selected="selected"';?>>Simple StartUp</option>    
                       </optgroup>
                       <optgroup class="ictab-group-popup-label" label="<?php _e('Text & Image CTA', ICTABL_TD); ?>">
                         <option value="template22" <?php if($template == 'template22') echo 'selected="selected"';?>>Special Message</option>
                         <option value="template24" <?php if($template == 'template24') echo 'selected="selected"';?>>Products Highlights</option>
                         <option value="template28" <?php if($template == 'template28') echo 'selected="selected"';?>>Infinite Strategy</option>
                         <option value="template36" <?php if($template == 'template36') echo 'selected="selected"';?>>Model Platform</option>
                         <option value="template37" <?php if($template == 'template37') echo 'selected="selected"';?>>Event CTA</option>
                        </optgroup>
                </select> 
		        </div>
			   </div>
			   <div class="ictab-fullwidth-wrap ictab-templates-preview-wrap">
              <img class="template-preview" src="<?php echo esc_attr(ICTABL_IMG_DIR) . 'templates-preview/simple-cta-template/template1.png'; ?>">
         </div>
       </div>
   </div>
</div>