<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marse Technologies Hyderabad</title>
    <!-- Style Sheets  -->
  
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/Fontscustom/style.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/fontawsome/css/all.min.css">
    <link rel="stylesheet" href="css/main.css">
        <!-- Style Sheets  End -->
</head>
<body>
  
    <header class="desktop-logo">
      <div class="container-fluid">
         <div class="row pt-2 pb-2">
         <div class="item item-logo col-3 pl-3">
          <a class="navbar-brand" href="#"><img src="img/logo.png" alt=""></a>
        </div>
        <div class="item item-heading col-9">
            <h1 style="font-family:krishika;color:blue;font-size:18px;">MARS Technologies Inc</h1>
        </div>
         </div>
      </div>
    </header> 
   
   <!-- Navigation Menu -->
   <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand mobile-logo" href="#"><img src="img/logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
             <a class="nav-link active" aria-current="page" href="?"><i class="fas fa-home"></i> Home</a>
            </li>
        </ul>
        <form class="d-flex" action="./calibration_search.php?cer_no=" data-host="<?php echo SERCH_URL;  ?>" role="search" method="GET" id="search_form">
            <input class="form-control me-2 search_certificate" type="text" name="search_certificate" placeholder="Certificate No." aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        </div>
    </div>
    </nav>
    <!-- QR CODE LOGIN -->

    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-sm-12 col-md-12 col-lg-12 text-center" id="qrbody">
                    <div class="mt-5"  style="width:500px;" id="reader"></div>
            </div>
        </div>
    </div>
   <!-- QR CODE LOGIN -->




 <!-- JS Starts -->
<script src="js/jquery.min.js"></script>    
<script src="js/bootstrap.bundle.min.js"></script>
 <script src="js/main.js"></script>
 <script src="js/qrcode.js"></script>
  <!-- Qrcode Scanner -->
  <script type="text/javascript">
function login(pathurl,password){
    $.ajax({
    url : pathurl,
    method : "POST",
    data  : {password:password},
    success : function(res){
    //  console.log(res);
        // $("#Login_admin").modal('hide');
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
}    
function onScanSuccess(qrCodeMessage) {
   // alert(qrCodeMessage);
    login("classes/handler.php?qrlogin",qrCodeMessage);
}
function onScanError(errorMessage) {
  //handle scan error
}

var html5QrcodeScanner = new Html5QrcodeScanner("reader", { fps: 10, qrbox: 250 });
html5QrcodeScanner.render(onScanSuccess, onScanError);
</script>
 <!-- QrCode scanner ends -->
 <!-- JS scripts End -->

 <!-- Modal search -->
 <div class="modal" tabindex="-1" id="certificate_details_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <div class="response"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal search End -->
</body>
</html>