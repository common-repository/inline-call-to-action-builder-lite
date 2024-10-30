/* 
 * Lite Version : Admin JS Script
 */
 (function ($) {
  $(document).ready(function () {
    var ajax_url = ictab_backend_js_params.ajax_url;
    var admin_nonce = ictab_backend_js_params.admin_nonce;
    var tp_path = ictab_backend_js_params.template_preview_path;
    $('.ictab-hide-options').hide();

    var button_num1 = ['template3','template6','template7','template8','template13','template15','template16','template17'
    ,'template18','template19','template21','template23','template35','template40'];
    var button_num2 = ['template1','template2','template4','template5','template9','template10','template11','template12'
    ,'template14','template22','template24','template25','template26','template27','template28','template29','template30',
    'template31','template32','template33','template34','template36','template38','template41','template42','template43','template44'
    ,'template45','template46','template47','template48','template49','template50'];

    var nobutton = ['template37','template39'];
    var rtbgcolor = ['template3','template4','template9','template10','template18','template20','template23','template26','template27','template29','template32','template33','template35','template47'];

    var rt_customimage = ['template20','template21','template22','template23','template24','template25','template26','template27',
    'template28','template29','template30','template31','template32','template33','template34','template35','template36',
    'template37','template38'];

        /*
        *  Display Template Preview Settings
        */
        $('body').on('change', '.ictab-template-type-option', function () {
          $('.ictab-template').removeClass('ictab-active-template');
          $(this).parent().addClass('ictab-active-template');
          if($(this).val() === 'available'){
           $('.ictab-available-template-show-wrapper').show();
           $('#ictab_custom_elements_settings,.ictab-custom-template-wrapper').hide();
           $('.ictab-nav-tabs li[data-type="available"]').show();
           $('.ictab-field-options-wrap[data-type="available"]').show();
           $('.ictab-tab-content[data-type="available"]').show();
           $('.ictab-nav-tabs li').removeClass('ictab-active');
           $('.ictab-tab-content').removeClass('ictab-tab-content-active').hide();
           $('.ictab-nav-tabs li[data-id="ictab-content-settings"]').addClass('ictab-active');
           $('.ictab-tab-content#ictab-content-settings').addClass('ictab-tab-content-active').show();
           $('.ictab-field-options-wrap[data-type="available"]').show();
           $('label.ictab-customhide[data-type="available"]').show();
           var template_num = $('.ictab-template-selector option:selected').val();
           check_elements(template_num);
           $('.ictab-components-docs-wrap').show();
           $('.ictab-components-docs-wrap p').hide();
           $('.ictab-components-docs-wrap p[data-template-ref="' + template_num + '"]').show();
           $('.ictab-tab-header').removeClass('ictab-custom-open');
         }else{
           $('.ictab-available-template-show-wrapper').hide();
           $('#ictab_custom_elements_settings,.ictab-custom-template-wrapper').show();
           $('.ictab-nav-tabs li').removeClass('ictab-active');
           $('.ictab-tab-content').removeClass('ictab-tab-content-active').hide();
           $('.ictab-nav-tabs li[data-id="ictab-bg-settings"]').addClass('ictab-active');
           $('.ictab-tab-content#ictab-bg-settings').addClass('ictab-tab-content-active').show();
           $('.ictab-nav-tabs li[data-type="available"]').hide();
           $('.ictab-field-options-wrap[data-type="available"]').hide();
           $('.ictab-tab-content[data-type="available"]').hide();
           $('.ictab-field-options-wrap[data-type="available"]').hide();
           $('label.ictab-customhide[data-type="available"]').hide();
           $('.ictab-components-docs-wrap').hide();
           $('.ictab-components-docs-wrap p').hide();
           $('.ictab-tab-header').addClass('ictab-custom-open');
           
         }
       });

var template_type = $('.ictab-template-type-option:checked').val();
if( template_type === 'available'){
  $('#ictab_custom_elements_settings,.ictab-custom-template-wrapper').hide();
}else{
 $('#ictab_custom_elements_settings,.ictab-custom-template-wrapper').show();
}


        /* 
        * Load Default Display Template Settings Fields on ajax call 
        */
        
        var full_path = tp_path+'simple-cta-template/template1.png';
        var template_number = '';
        $('.ictab-template-selector').change(function () {
          var template_selector = $(this);
          template_number = template_selector.val();
          if ($('.ictab-components-docs-wrap').length > 0) {
            $('.ictab-components-docs-wrap p').hide();
            $('.ictab-components-docs-wrap p[data-template-ref="' + template_number + '"]').show();
          }

          var scta_path = ['template1','template2','template3','template4','template5','template6','template7','template8','template9',
          'template10','template11','template12','template13','template14','template15','template16','template17',
          'template18','template19'];
          var image_cta_path = ['template20','template21','template22','template23','template24','template25','template26','template27','template28',
          'template29','template30','template31','template32','template33','template34','template35','template36',
          'template37','template38'];
          
          if($.inArray(template_number, scta_path) < 0){
          }else{
           full_path = tp_path+'simple-cta-template/'+template_number+ '.png';
         }
         if($.inArray(template_number, image_cta_path) < 0){
         }else{
           full_path =  tp_path+'image-template/'+template_number+ '.png';
         }
         template_selector.parents('.ictab-display-settings').find('.ictab-templates-preview-wrap img').attr('src', full_path);
         check_elements(template_number);

         
       }).change();


/* Default value show start */
var template_num = $('.ictab-template-selector option:selected').val();
check_elements(template_num);
if($('.ictab-template-type-option:checked').val()  == 'custom'){
  $('.ictab-components-docs-wrap p').hide();
}else{
 $('.ictab-components-docs-wrap p').hide();
 $('.ictab-components-docs-wrap p[data-template-ref="' + template_num + '"]').show();
}

function check_elements(template_num){
  if($('.ictab-template-type-option:checked').val()  !== 'custom'){
    if($.inArray(template_num, rtbgcolor) < 0){
      $('#ictab-half-background-color').hide();
      $('.ictab-vtab[data-id=ictab-half-background-color]').hide();
    }else{
      $('#ictab-half-background-color').show();
      $('.ictab-vtab[data-id=ictab-half-background-color]').show();
    }

    if($.inArray(template_num, rt_customimage) < 0){
      $('#ictab-right-image').hide();
      $('.ictab-vtab[data-id=ictab-right-image]').hide();
    }else{
      $('#ictab-right-image').show();
      $('.ictab-vtab[data-id=ictab-right-image]').show();
    }

    if($.inArray(template_num, nobutton) < 0){
    }else{
      $('.ictab-cta-btn-row[data-btnnum=ictab-cta-btn1]').hide();
      $('.ictab-cta-btn-row[data-btnnum=ictab-cta-btn2]').hide();
      $('.ictab-cta-btn-row[data-btnnum=ictab-cta-btn3]').hide();
    }
    if($.inArray(template_num, button_num1) < 0){
    }else{
      $('.ictab-cta-btn-row[data-btnnum=ictab-cta-btn1]').show();
      $('.ictab-cta-btn-row[data-btnnum=ictab-cta-btn2]').hide();
      $('.ictab-cta-btn-row[data-btnnum=ictab-cta-btn3]').hide();
    }
    if($.inArray(template_num, button_num2) < 0){
    }else{
      $('.ictab-cta-btn-row[data-btnnum=ictab-cta-btn1]').show();
      $('.ictab-cta-btn-row[data-btnnum=ictab-cta-btn2]').show();
      $('.ictab-cta-btn-row[data-btnnum=ictab-cta-btn3]').hide();
    }

    if(template_num == 'template37' || template_num == 'template39'){
     $('.ictab-tab[data-id=ictab-cta-settings]').hide();
   }else{
    $('.ictab-tab[data-id=ictab-cta-settings]').show();
  }
}
}


/* Default val Display end */

/* Available options Template based */
$('body').on('click', '.ictab-item-title', function () {
  $(this).closest('.ictab-option-wrapper').find('.ictab-item-inner-body').slideToggle('slow', function () {
    $(this).closest('.ictab-option-wrapper').find('.ictab-tab-toggle').toggleClass('ictab-visible', $(this).is(':visible'));
    $(this).closest('.ictab-option-wrapper').toggleClass('ictab-active-option');
    if($(this).closest('.ictab-option-wrapper').find('.ictab-tab-toggle').hasClass('ictab-visible')){
     $(this).closest('.ictab-option-wrapper').find('.ictab-tab-toggle i').removeClass().addClass('fa fa-caret-up');
   }else{
     $(this).closest('.ictab-option-wrapper').find('.ictab-tab-toggle i').removeClass().addClass('fa fa-caret-down');
   }
   
 });
});


$('body').on('click', '.ictab-upload-img-btn', function (e) {
  e.preventDefault();
  var $this = $(this);
  var image = wp.media({
    title: 'Upload Image',
    multiple: false,
    library: { 
                  type: 'image' // limits the frame to show only images
                },
              }).open()
  .on('select', function (e) {
    var uploaded_img = image.state().get('selection').first();
    var img_url = uploaded_img.toJSON().url;
    $($this).closest('.ictab-input-field').find('.ictab-right-image').val(img_url);
  });
});



$('#ictab-custom-settings').on('change','.ictab-enable-overlay-check',function(){
  if ($(this).prop('checked') == true) {
    $('.ictab-overlay-option-wrapper').removeClass('ictab-hide-options').fadeIn('slow');
  } else {
    $('.ictab-overlay-option-wrapper').addClass('ictab-hide-options').fadeOut('slow');
  }
});  

$('.ictab-style-custom-wrapper').on('change','.ictab-open-cstyles',function(){
  if ($(this).prop('checked') == true) {
    $(this).closest('.ictab-style-custom-wrapper').find('.ictab-custom-styles-showhide').fadeIn('slow');
  } else {
    $(this).closest('.ictab-style-custom-wrapper').find('.ictab-custom-styles-showhide').fadeOut('slow');
  }
});  


$('.ictab-btn-lists-wrapper').on('change','.ictab-button-linktype',function(){
  var btntype = $(this).val();
  $(this).closest('.ictab_btn_toggle_content').find('.ictab-btn-options-wrap').hide();
  $(this).closest('.ictab_btn_toggle_content').find('.ictab-btn-options-wrap#ictab-'+btntype+'-link-option').fadeIn('slow');
});  



        /**
         * Display all post and pages Lists for button internal redirect page
         */
         $('.ictab-internallinks-wrap').on('click','.ictab-select-content-button',function(e){
          e.preventDefault();
          var $post_container =  $(this).closest('.ictab-internallinks-wrap').find('.ictab-existing-content-selector');
          $post_container.toggle();
          if ($post_container.is(':visible') && $post_container.find('ul.ictab_posts li').length === 0) {
            get_pages_link_byajax($(this),'search','');
          }
        });
         
         /**
         * Available template: Pagination of fetched posts
         */
         $('.ictab-internallinks-wrap').on('click', '.ictab-pagination-wrap .page-numbers', function (e) {
          e.preventDefault();
          var $post_container =  $(this).closest('.ictab-internallinks-wrap').find('.ictab-existing-content-selector');
          var page_link = $(this).attr('href');
          var page_link_array = page_link.split('=');
          var page_number = page_link_array[1];
          var $selector = $(this);
          get_pages_link_byajax($(this),'pagination',page_number);
        });

         $('.ictab-internallinks-wrap').on('click', '.ictab-page-selected', function (e) {
          e.preventDefault();
          var page_link = $(this).attr('data-href');
          $(this).closest('.ictab-internallinks-wrap').find('#ictab-internalurl').val(page_link);
          $(this).closest('.ictab-internallinks-wrap').find('.ictab-existing-content-selector').toggle();
          
        });

         /***************************  Available options Template based end *************************/


         /*************************** Custom Design Options Start **********************************/

         /* 
         * Custom Metabox Template Settings
         */
         $('ul.ictab-nav-tabs li').click(function () {
          var tab_id = $(this).attr('data-id');
          $('ul.ictab-nav-tabs li').removeClass('ictab-active');
          $('.ictab-tab-content').hide().removeClass('ictab-tab-content-active');
          $(this).addClass('ictab-active');
          $('#' + tab_id).fadeIn('300').addClass('ictab-tab-content-active');
        });

        /*
        * Vertical tab Available Button Options
        */
        $('ul.ictab-vtab-wrapper li').click(function () {
          var vtab_id = $(this).attr('data-id');
          var vtab_tabid = $(this).attr('data-tabid');
          var vtab_type = $(this).attr('data-type');
          $(this).parent().find('li.ictab-vtab').removeClass('ictab-vactive');
          $(this).closest('.ictab-vertical-tab-wrapper').find('.ictab-vtab-content').hide().removeClass('ictab-vactive-content');
          $(this).addClass('ictab-vactive');
          if(vtab_type == 'header_type'){
            $('#' + vtab_tabid).fadeIn('300').addClass('ictab-vactive-content');
          }else{
            $('#' + vtab_id).fadeIn('300').addClass('ictab-vactive-content');
          }
          
        });


    /*
    * Ajax FUnction : Get all Pages/ Posts List and pagination
    */
    function get_pages_link_byajax(wrapper,type,page_number){
      var $post_container =  $(wrapper).closest('.ictab-internallinks-wrap').find('.ictab-existing-content-selector');
      if(type === 'search'){
       $.ajax({
        url: ajax_url,
        data: {
          _wpnonce: admin_nonce,
          action: 'ictab_search_posts'
        },
        type: 'post',
        success: function (data) {
          $post_container.html(data).fadeIn('slow');
        }
      });
     }else{
       $.ajax({
        type: 'post',
        url: ajax_url,
        data: {
          page_number: page_number,
          action: 'ictab_search_posts',
          _wpnonce: admin_nonce,
        },
        success: function (data) {
          $post_container.html(data).fadeIn('slow');
        }
      });
     }
     
   }


        /*
         * Random number generator
         */
         function randomString(len, charSet) {
          charSet = charSet || 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
          var randomString = '';
          for (var i = 0; i < len; i++) {
            var randomPoz = Math.floor(Math.random() * charSet.length);
            randomString += charSet.substring(randomPoz, randomPoz + 1);
          }
          return randomString;
        }


        $('.ictab-sectionbgtype-option').change(function(){
         var bgstype = $(this).val();
         if(bgstype === 'custom'){
           $('.ictab-section-sc-options').slideDown('slow');
         }else{
           $('.ictab-section-sc-options').slideUp('slow');
         }
       });

        $('.ictab-rtimage-option').change(function(){
         var citype = $(this).val();
         if(citype === 'custom'){
           $(this).closest('.ictab-item-inner-body').find('.ictab-cimage-options').slideDown('slow');
         }else{
          $(this).closest('.ictab-item-inner-body').find('.ictab-cimage-options').slideUp('slow');
        }
      });

        $('.ictab-bgtype-option').change(function(){
         var bgtype = $(this).val();
         if(bgtype === 'custom'){
           $('.ictab-showhide-options').slideDown('slow');
           if($(this).closest('.ictab-main-content-wrapper').find('.ictab-background-selector').val() == 'bgcolor'){
             $('.ictab-parallax-options').hide();
           }else{
            $('.ictab-parallax-options').show();
          }
          $('.ictab-showhide-options').slideDown('slow');
        }else{
         $('.ictab-showhide-options').slideUp('slow');
         $('.ictab-parallax-options').show();
       }
     });

        $('.ictab-background-selector').change(function(){
         var bg_ctype = $(this).val();
         $('.ictab-allbgtype-options').hide();
         $('#ictab-background-'+bg_ctype).slideDown('slow');
         if(bg_ctype === 'video'){
           $('.ictab-video-all-types#ictab-youtube').show();
           $('.ictab-videostart_end-options').show();
         }else{
           $('.ictab-video-all-types').hide();
           $('.ictab-videostart_end-options').hide();
         }
         if(bg_ctype === 'image' || bg_ctype === 'video'){
          $('.ictab-parallax-options').show();
          if(bg_ctype === 'image'){
           var imgurl = $('#ictab-background-image').find('.ictab-bg-upload-img-url').val();
           $('.ictab-ui-draggable').css('background-color', '');
           if(imgurl != ''){
            $('.ictab-ui-draggable').css('background-image', 'url(' + imgurl + ')');
          }
          
        }else{
         $('.ictab-ui-draggable').css('background-color', '');
         $('.ictab-ui-draggable').css('background-image', '');
       }
       
     }else{
      var color = $('#ictab-background-bgcolor').find('#ictab-custom-bgpicker').val();
      $('.ictab-parallax-options').hide();
      $('.ictab-ui-draggable').css('background-image', '');
      if(color != ''){
        $('.ictab-ui-draggable').css('background-color', color);
      }
    }
  });

$('.ictab-custom-color-picker').wpColorPicker();
var myOptions_bgcolor = {
  palettes: true,
  change: function (event, ui) {
    var bgcolor = ui.color.toString();
    $('.ictab-ui-draggable').css('background-image', '');
    $('.ictab-ui-draggable').css('background-color', bgcolor);
  },
  clear: function() {
   bgcolor = '';
   $('.ictab-ui-draggable').css('background-image', '');
   $('.ictab-ui-draggable').css('background-color', '');
 },
};
$('#ictab-custom-bgpicker').wpColorPicker(myOptions_bgcolor);

$('.ictab-upload-img-button').on("click", function (e) {
  e.preventDefault();
  var $this = $(this);
  var image = wp.media({
    title: 'Upload Background Image',
    multiple: false,
    library: { 
                  type: 'image' // limits the frame to show only images
                },
              }).open()
  .on('select', function (e) {
    var uploaded_bgimage = image.state().get('selection').first();
    var img_url = uploaded_bgimage.toJSON().url;
    $('input.ictab-bg-upload-img-url').val(img_url);
    $('.ictab-ui-draggable').css('background-image', 'url(' + img_url + ')');
    $('.ictab-ui-draggable').css('background-size', 'cover');
  });
});

$('#enable_parallax').change(function(e){
  if ($(this).prop('checked') == true) {
    $('.ictab-parallax-option-wrapper').show();
  } else {
   $('.ictab-parallax-option-wrapper').hide();
 }
}); 

         /*
         * Shortcode auto copy
         */
         $('.ictab-usage-trigger').click(function () {
          $('.ictab-usage-trigger').removeClass('ictab-active');
          $(this).addClass('ictab-active');
          var active_tab_key = $('.ictab-usage-trigger.ictab-active').data('usage');
          $('.ictab-usage-post').hide();
          $('.ictab-usage-post[data-usage-ref="' + active_tab_key + '"]').show();
        });

         $('.ictab-short-code,.ictab-short-code2').click(function () {
          if ($(this).attr('id') == "sc") {
            $(this).focus();
            $(this).select();
            document.execCommand('copy');
            $(this).siblings('.ictab-copied-info').show().delay(1000).fadeOut();
          } else {
            $(this).focus();
            $(this).select();
            document.execCommand('copy');
            $(this).siblings('.ictab-copied-info2').show().delay(1000).fadeOut();
          }
        });

         $('.ictab-shortcode-display-value').click(function () {
          $(this).focus();
          $(this).select();
          document.execCommand('copy');
          $(this).siblings('.ictab-copied-info').show().delay(1000).fadeOut();
        });

    });//$(function () end
  }(jQuery));
