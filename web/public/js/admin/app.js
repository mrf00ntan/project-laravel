function previewFile(){
       var preview = $('.upload-file-container'); //selects the query named img
       var file    = $('#file')[0].files[0]; //sames as here

       var reader  = new FileReader();

       reader.onloadend = function () {
           preview.css('background-image', 'url('+reader.result+')');
       }

       if (file) {
           reader.readAsDataURL(file); //reads the data as a URL
       } else {
           preview.src = "";
       }
  }