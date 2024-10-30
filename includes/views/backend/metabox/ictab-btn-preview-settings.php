<?php defined('ABSPATH') or die("No script kiddies please!"); ?>
<div class="ictab-btn-preview-wrapper">
  <?php 
  for ($i=1; $i <= 3 ; $i++) { ?>
  
  <div class="ictab-btn-preview" id="ictab-btnpreview-<?php echo $i;?>">
  	<h3>Button Preview <?php echo $i;?></h3>
    <a href="#" class="ictab-button-tag" rel="nofollow">BUTTON <?php echo $i;?></a>
  </div>
  <?php }
  ?>
</div>