$(document).ready(function(){

// loading products in to products page
$.ajax({

});
// loading products in to products page end
    // alert('working');
  $('#loadimg').addClass('diactivate');
//   Submitting Contact form
  $(document).on('submit','form#contact_form',function(e){
    e.preventDefault();
    $('#loadimg').removeClass('diactivate');
    $('#loadimg').addClass('active');
    var data = new FormData(this);
    $.ajax({
        url : "./classes/handler.php?contact_form",
        method : "POST",
        data : data,
        processData : false,
        contentType : false,
        success : function(res){
          $('#loadimg').removeClass('active');
          $('#loadimg').addClass('diactivate');
            // console.log(typeof(res));
          if(res == "1"){
            $('.result').html("<p class='alert alert-success'>Thankyou..we have received your request.we will contact you as soon as soon... Have a nice day..!</p>");
          }else{
            $('.result').html("<p class='alert alert-success'>Sorry..Something went wrong..request not sent</p>");
          }  
        }
    });
  });
//   Submitting Contact form End

// Calibration Form 
$(document).on('submit',"#calibration_form",function(e) {
  e.preventDefault();
  $('#loadimg').removeClass('diactivate');
    $('#loadimg').addClass('active');
  var host = $(this).data('host');
  var data = new FormData(this);
  $.ajax({   
    url : "../classes/handler.php?calibration_new",
    method : "POST",
    data : data,
    processData : false,
    contentType : false,
    success : function(res){
      $('#loadimg').removeClass('active');
      $('#loadimg').addClass('diactivate');
     var data = JSON.parse(res);
     if(data.status == "saved_data"){
       $(".response").html("<div class='alert alert-success'><span>Successfully saved Click here to </span><a  href='"+host+data.url+"' >Download Certificate</a></div>");
        $('#certificate_details_modal').modal('show');
    }
     else if(data.status == "exist"){
      $(".response").html("<div class='alert alert-danger text-white'>"+data.message+"</div>");
      $('#certificate_details_modal').modal('show');

     }
      // console.log();
    }
  });
});
// Calibration Form End
// Search certificate admin page
$(document).on('submit',"#search_form",function(e){
  e.preventDefault();
  var host =  $(this).data('host');
  var serval = $(".search_certificate").val();
  var url = $(this).attr('action');
  // alert(host);
  $.ajax({
      url : url+serval+"",
      method : "GET",
      success :function(res){
        var data = JSON.parse(res);
        // console.log(data);
        if(data.status == "exist"){
          $('.response').html('<table class="table table-striped">\
                              <tr>  \
                                <td>Calibration Date. </td> \
                                <td>'+data.calib_date+'</td> \
                              </tr> \
                              <tr>  \
                                <td>Calibration No. </td> \
                                <td>'+data.message+'</td> \
                              </tr> \
                              <tr>  \
                                <td>Calibration Validity. </td> \
                                <td>'+data.Cal_validity+'</td> \
                              </tr> \
                              <tr> \
                                <td>Calibration Expired. </td> \
                                <td>'+data.Calibration_Expiry+'</td> \
                              </tr> \
                              <tr>  \
                                <td>Calibration Gas Validity. </td> \
                                <td>'+data.gas_validity_date+ '</td> \
                              </tr> \
                              <tr> \
                                <td>Calibration Gas Expired. </td> \
                                <td>'+data.GasExpiry+'</td> \
                              </tr> \
                              <tr> \
                                <td>Download Certificate. </td> \
                                <td><a target="_blank" href="'+host+data.url+'">Click here</a></td> \
                              </tr> \
                              </table>');
        }else{
          $('.response').html("<p class='alert alert-danger text-white'>"+data.message+"</p>");
        }
        $('#certificate_details_modal').modal('show');
      }
   });
 });
//Search certificate End
// renew Calibraton 
$(document).on('submit',"#renew_calibreation,#renew_gasvalidity",function(e){
  e.preventDefault();
  $('#loadimg').removeClass('diactivate');
  $('#loadimg').addClass('active');
  var cer_number = new FormData(this);
  var url = $(this).attr('action');
  var url2 = $(this).data('site');
  $.ajax({
    url : url,
    method : "POST",
    data : cer_number,
    processData : false,
    contentType : false,
    success : function(res){
      // console.log(res);
      $('#loadimg').removeClass('active');
      $('#loadimg').addClass('diactivate');
      var data = JSON.parse(res);
      if(data.status == "success"){
        $('.renewres').html("  \
                          <table>  \
                           <tr> \
                            <td>Successfully renewed....</td>   \
                            <td> <a href='"+url2+data.url+"'>click here to Download</a></td>   \
                           </tr>\
                          </table>");                  
      }else{
        $('.renewres').html("<p class='alert alert-danger text-white'>"+data.message+"</p>");
      }
      $('#renew_details_modal').modal('show');
    }
  });
});
// renew Calibration End

// Add products 
$(document).on("submit",'#add_product',function(e){
 e.preventDefault();
 $('#loadimg').removeClass('diactivate');
 $('#loadimg').addClass('active');
 var data = new FormData(this);
 var url = $(this).attr('action');
 $.ajax({
     url : url,
     method : "POST",
     data : data,
     processData : false,
     contentType : false,
     success : function(res){
      $('#loadimg').removeClass('active');
      $('#loadimg').addClass('diactivate');
        //  console.log(res);
        var data = JSON.parse(res);
        if(data.status == "success"){
          $('.response').html('<span class="alert alert-success">'+data.message+'</span>');
        }else{
          $('.response').html('<span class="alert alert-danger">'+data.message+'</span>');
        }
        $('#certificate_details_modal').modal('show');
     }
 });
});
// Add Products Ends
// Login to admin
$(document).on("submit","#login_data",function(e){
e.preventDefault();
var data = new FormData(this);
var url = $(this).attr('action');
$.ajax({
  url : url,
  method : "POST",
  data  : data,
  processData : false,
  contentType : false,
  success : function(res){
  //  console.log(res);
    $("#Login_admin").modal('hide');
    // console.log(res);
    var result = JSON.parse(res);
    if(result.status == "success"){
      window.location.href = ""+result.redirect_url+"";
    }else{
      $('.response').html("<p class='alert alert-danger'> "+result.redirect_url+" </p>");
      $("#certificate_details_modal").modal('show');
    }
  }
});
});
// Login to admin ends
// Calibration Editing
$(document).on("submit","#calibration_edit_form",function(e){
  e.preventDefault();
   var data = new FormData(this);
   var url = $(this).attr('action');
   $.ajax({
      url : url,
      method : "POST",
      data : data,
      processData : false,
      contentType : false,
      success : function(res){

        var res_data = JSON.parse(res);
        if(res_data.status == "success"){
          $(".result").html("<sapn class='alert alert-success'>"+res_data.message+" <a href='../"+res_data.redirect_url+"'>Download</a> </span> ");
        }else{
          $(".result").html("<sapn class='alert alert-success'>"+res_data.message+"</span> ");
        }
      }
   });
});
// Calibration Editing Ends


$('#Login_admin').on('hidden.bs.modal', function (e) {
  $(this)
    .find("input,textarea,select")
       .val('')
       .end()
    .find("input[type=checkbox], input[type=radio]")
       .prop("checked", "")
       .end();
});
});