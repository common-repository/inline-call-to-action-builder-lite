<?php defined('ABSPATH') or die("No script kiddies please!");?>
<?php 
if($template_num == "template1" || $template_num == "template2" || $template_num == "template3" || $template_num == "template4" ){?>
<div class="ictab-single-content-wrapper">
<div class="ictab-content-wrap-section">
 <?php include( ICTABL_PATH . '/includes/views/frontend/parts/ictab-header-text.php'); ?>
 <?php include( ICTABL_PATH . '/includes/views/frontend/parts/ictab-description-text.php'); ?>
 <?php include( ICTABL_PATH . '/includes/views/frontend/parts/ictab-cta-button.php'); ?>
   </div>
</div>
<?php }else if($template_num == "template6"){ ?>
<div class="ictab-double-content-wrapper">
	<div class="ictab-content-wrap-section">
    <div class="ictab-left-content-wrap">
		 <?php include( ICTABL_PATH . '/includes/views/frontend/parts/ictab-header-text.php'); ?>
		 <?php include( ICTABL_PATH . '/includes/views/frontend/parts/ictab-description-text.php'); ?>
	</div>
	<div class="ictab-right-content-wrap">
		 <?php include( ICTABL_PATH . '/includes/views/frontend/parts/ictab-cta-button.php'); ?>
	</div>
</div>
</div>
<?php }else if($template_num == "template22" || $template_num == "template24" || $template_num == "template28"
|| $template_num == "template36" ){ ?>
<div class="ictab-double-content-wrapper ictab-image-template-type">
    <div class="ictab-content-wrap-section">
    <div class="ictab-left-content-wrap">
		<?php if($template_num == "template22" || $template_num == "template24" || $template_num == "template28"){?>
		  <?php include( ICTABL_PATH . '/includes/views/frontend/parts/ictab-custom-image.php'); ?>
		 <?php }else{?>
		 <?php include( ICTABL_PATH . '/includes/views/frontend/parts/ictab-header-text.php'); ?>
		 <?php include( ICTABL_PATH . '/includes/views/frontend/parts/ictab-description-text.php'); ?>
		 <?php include( ICTABL_PATH . '/includes/views/frontend/parts/ictab-cta-button.php'); ?>
		 <?php } ?>
	</div>
	<div class="ictab-right-content-wrap">
		<?php if($template_num == "template22" || $template_num == "template24" || $template_num == "template28"){?>
		 <?php include( ICTABL_PATH . '/includes/views/frontend/parts/ictab-header-text.php'); ?>
		 <?php include( ICTABL_PATH . '/includes/views/frontend/parts/ictab-description-text.php'); ?>
		 <?php include( ICTABL_PATH . '/includes/views/frontend/parts/ictab-cta-button.php'); ?>
		 <?php }else{?>
          <?php include( ICTABL_PATH . '/includes/views/frontend/parts/ictab-custom-image.php'); ?>
		 <?php } ?>
	</div>
	</div>
</div>
<?php }else if($template_num == "template37"){ ?>
<div class="ictab-double-content-wrapper ictab-image-template-type">
	<div class="ictab-content-wrap-section">
    <div class="ictab-left-content-wrap">
		  <?php include( ICTABL_PATH . '/includes/views/frontend/parts/ictab-custom-image.php'); ?>
	</div>
	<div class="ictab-right-content-wrap">
		 <?php include( ICTABL_PATH . '/includes/views/frontend/parts/ictab-header-text.php'); ?>
		 <?php include( ICTABL_PATH . '/includes/views/frontend/parts/ictab-description-text.php'); ?>
	</div>
	</div>
</div>
<?php }