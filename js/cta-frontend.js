(function ($) {
    $(function () {
    var wooenabled = ictab_script_variable.woocommerce_enabled;
    var ajax_url = ictab_script_variable.ajax_url;
    var ajax_nonce = ictab_script_variable.ajax_nonce;

  	wow = new WOW();
    wow.init();


  
  /*
  *  Parrallax Effect for Background image , video type for CTA Section
  */
   $('.ictab-parallax-enabled').each(function () {
        var $this = $(this);
        var $this = $(this);
        var type = $this.attr('data-parallax-source');
        var image = false;
        var imageWidth = false;
        var imageHeight = false;
       
        var parallax = $this.attr('data-parallax-type');
        var parallaxSpeed = $this.attr('data-parallax-speed');
        var parallaxMobile = $this.attr('data-parallax-mobile') !== 'false';

        // image type
        if (type === 'image') {
            image = $this.attr('data-parallax-image');
            imageWidth = $this.attr('data-parallax-image-width');
            imageHeight = $this.attr('data-parallax-image-height');
        }

        // prevent if no parallax and no video
        if (!parallax) {
            return;
        }

        var jarallaxParams = {
            type: parallax,
            imgSrc: image,
            imgWidth: imageWidth,
            imgHeight: imageHeight,
            speed: parallaxSpeed,
            noAndroid: !parallaxMobile,
            noIos: !parallaxMobile
        };

        $this.jarallax(jarallaxParams);

    });


  if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
   var is_mobile = true;
  }else{
   var is_mobile = false;
  }

  if(is_mobile){
     $("[data-id='ictab-element-normal_text'] .ictab-element-title-wrap h4").each(function(){
    $(this).fitText(1.1, { minFontSize: '18px' });
  });
  
  $("[data-id='ictab-element-wpeditor'] .ictab-element-title-wrap span").each(function(){
    $(this).fitText(1.1, { minFontSize: '18px' });
  });

  $(".ictab-custom-btn").each(function(){
    $(this).fitText(1.1, { minFontSize: '18px' });
  });



 }


$( window ).resize(function() {

   $(".ictab-inner-content").each(function(){
    var top = $(this).attr('data-top');
    var left = $(this).attr('data-left');
    var width = $(this).attr('data-width');
    var height = $(this).attr('data-height');
    if($( window ).width() <= 910){
                 $(this).css({
                  'width': '',
                  'height': '',
                  'left': '',
                  'top': '',
                  'position': 'relative'
                 });
    }else{
               $(this).css({
                  'width': width,
                  'height': height,
                  'left': left,
                  'top': top,
                  'position': 'absolute'
                 });

     }
   });
}).resize();

    });//$(function () end
}(jQuery));

// 