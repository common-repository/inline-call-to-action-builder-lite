(function ($) {
    $(document).ready(function () {

      if (!document.getElementById("ictab_uploadimport_Btn")) {
      //It does not exist
    }else{
        document.getElementById("ictab_uploadimport_Btn").onchange = function () {
           var val = this.value;
           var pathArray = val.split('\\');
           document.getElementById("ictab_uploadFile").value = pathArray[pathArray.length - 1];
        };
      }

       $('.ictab-import-export-wrapper #ictab_export_file').click(function(e){
          e.preventDefault();
          if($('#ictab_file_export_post option:selected').val() === ''){
               alert("Please select one post to export json file.");
          }else{
            $('#ictab-export-form').submit();
          }
      }); 

      $('.ictab-impfiletype').change(function(){
          var filetype = $(this).val();
          if(filetype === 'demo_json'){
            $('.ictab-demo-upload-wrapper').show();
            $('.ictab-custom-upload-wrapper').hide();
          }else if(filetype === 'custom_json'){
            $('.ictab-demo-upload-wrapper').hide();
            $('.ictab-custom-upload-wrapper').show();
          }else{
            $('.ictab-demo-upload-wrapper').hide();
            $('.ictab-custom-upload-wrapper').hide();
          }
      });
  });//$(function () end
}(jQuery));
