$(document).ready(function(){
    // alert('working');
  $('img#loading_img').css('display','none');
//   Submitting Contact form
  $(document).on('submit','form#contact_form',function(e){
    e.preventDefault();
    var data = new FormData(this);
    $.ajax({
        url : "./classes/handler.php",
        method : "POST",
        data : data,
        processData : false,
        contentType : false,
        success : function(res){
            console.log(res);
        }
    });
  });
});