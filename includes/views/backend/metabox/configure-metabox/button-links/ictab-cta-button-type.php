<?php defined('ABSPATH') or die("No script kiddies please!"); 
$internal_link = (isset($ictab_settings['cta_option'][$i]['internal']['link']) && $ictab_settings['cta_option'][$i]['internal']['link'] != '')?esc_url($ictab_settings['cta_option'][$i]['internal']['link']):'';
$internal_link_target = (isset($ictab_settings['cta_option'][$i]['internal']['link_target']) && $ictab_settings['cta_option'][$i]['internal']['link_target'] != '')?esc_attr($ictab_settings['cta_option'][$i]['internal']['link_target']):'same_window';
$external_link = (isset($ictab_settings['cta_option'][$i]['external']['link']) && $ictab_settings['cta_option'][$i]['external']['link'] != '')?esc_url($ictab_settings['cta_option'][$i]['external']['link']):'';
$external_link_target = (isset($ictab_settings['cta_option'][$i]['external']['link_target']) && $ictab_settings['cta_option'][$i]['external']['link_target'] != '')?esc_attr($ictab_settings['cta_option'][$i]['external']['link_target']):'same_window';?>
<div class="ictab-btn-options-wrap" id="ictab-internal-link-option" <?php if($button_link_type == 'internal') echo ''; else echo 'style="display:none;"';?>>
	<div class="ictab-field-options-wrap">
	 <div class="ictab-label-field"><label><?php echo __('Internal URL Link', ICTABL_TD) ?></label></div>
	 <div class="ictab-input-field ictab-internallinks-wrap"> 
	   <input type="url" placeholder="https://" name="ictab_settings[cta_option][<?php echo $i;?>][internal][link]" 
	   id="ictab-internalurl" value="<?php echo $internal_link;?>">
	  <a href="javascript:void(0);" class="ictab-select-content-button ictab-default-button button button-small"><?php esc_html_e('Select Internal Page/Posts',ICTABL_TD) ?></a>
	  <div class="ictab-existing-content-selector" style="display:none;"></div>
	 </div>
	</div>
	<div class="ictab-field-options-wrap">
	 <div class="ictab-label-field"><label><?php echo __('Link Target', ICTABL_TD) ?></label></div>
	 <div class="ictab-input-field"> 
	    <select class="ictab-select-field" name="ictab_settings[cta_option][<?php echo $i;?>][internal][link_target]">
                <option value="same_window" <?php if($internal_link_target == 'same_window') echo 'selected="selected"';?>><?php echo __('Same Window', ICTABL_TD); ?></option>
                <option value="new_window" <?php if($internal_link_target == 'new_window') echo 'selected="selected"';?>><?php echo __('New Window', ICTABL_TD); ?></option>
        </select>
	 </div>
	</div>
</div>
<div class="ictab-btn-options-wrap" id="ictab-external-link-option" <?php if($button_link_type == 'external') echo ''; else echo 'style="display:none;"';?>>
	<div class="ictab-field-options-wrap">
	 <div class="ictab-label-field"><label><?php echo __('External URL Link', ICTABL_TD) ?></label></div>
	 <div class="ictab-input-field"> 
	   <input type="url" class="ictab-setting-input" name="ictab_settings[cta_option][<?php echo $i;?>][external][link]" 
	   value="<?php echo $external_link;?>" placeholder="https://"/> 
	 </div>
	</div>
	<div class="ictab-field-options-wrap">
	 <div class="ictab-label-field"><label><?php echo __('Link Target', ICTABL_TD) ?></label></div>
	 <div class="ictab-input-field"> 
	    <select class="ictab-select-field" name="ictab_settings[cta_option][<?php echo $i;?>][external][link_target]">
                <option value="same_window" <?php if($external_link_target == 'same_window') echo 'selected="selected"';?>><?php echo __('Same Window', ICTABL_TD); ?></option>
                <option value="new_window" <?php if($external_link_target == 'new_window') echo 'selected="selected"';?>><?php echo __('New Window', ICTABL_TD); ?></option>
        </select>
	 </div>
	</div>
</div>


