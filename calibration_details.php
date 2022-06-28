<?php 
error_reporting(~E_ALL);
include_once('./classes/main_class.php');
include_once('./constants.php');
$obj = new marsetech(HOST,USER,PASS,DB);
if(isset($_GET['calibration_serial'])){
$details = $obj->getDetails('calibrations',$_GET," ");
// To checking Expiry dates
$expiry = null;
$expiry1 = null;
$date_now = new DateTime();
$calibratin_date = new DateTime($details[0]['calibration_validity_date']);
if($date_now > $calibratin_date){
$expiry =  'Yes';
}else{
    $expiry = 'No';
}
// checking gas validity
$calibratin_gas_date = new DateTime($details[0]['gas_valid_date']);
if($date_now > $calibratin_gas_date){
$expiry1 =  'Yes';
}else{
    $expiry1 = 'No';
}
  ?>
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
             <a class="nav-link active" aria-current="page" href="./"><i class="fas fa-home"></i> Home</a>
            </li>
           
            <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
            </li> -->
            <!-- <li class="nav-item">
              <a class="nav-link disabled">Disabled</a>
            </li> -->
        </ul>
        <form class="d-flex" action="./calibration_search.php?cer_no=" data-host="<?php echo SERCH_URL;  ?>" role="search" method="GET" id="search_form">
            <input class="form-control me-2 search_certificate" type="text" name="search_certificate" placeholder="Certificate No." aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        </div>
    </div>
    </nav>
   <!-- Navigation Menu End -->
     <div class="container">
     <div class="row">
            <div class="col-sm-12 text-center">
            <h3 class="alert alert-info" style="font-family:yadaiah">Calibration Details</h3>
    </div>
        <div class="row">
            <div class="col-sm-12 col-md-2 col-lg-2"></div>
            <div class="col-sm-12 col-md-8 col-lg-8">
     <?php   if($details != "false"){  ?>           
            <table class="table table-striped mt-5">
                              <tr>  
                                <td>Calibration Date. </td> 
                                <td><?php echo $details[0]['present_date']; ?></td> 
                              </tr> 
                              <tr> 
                                <td>Calibration No. </td>
                                <td><?php echo $details[0]['calibration_serial']; ?></td> 
                              </tr>
                              <tr> 
                                <td>Calibration Validity. </td>
                                <td><?php echo $details[0]['calibration_validity_date']; ?></td> 
                              </tr> 
                              <tr> 
                                <td>Calibration Expired. </td>
                                <td><?php echo $expiry; ?></td> 
                              </tr>
                              <tr> 
                                <td>Calibration Gas Validity. </td>
                                <td><?php echo $details[0]['gas_valid_date']; ?></td> 
                              </tr>
                              <tr> 
                                <td>Calibration Gas Expired. </td> 
                                <td><?php echo $expiry1; ?></td> 
                              </tr>
                              <tr>
                                <td>Download Certificate. </td>
                                <td><a target="_blank" href="<?php echo SERCH_URL."output.php?centerregistration=".$details[0]['centerregistration']."&&date=".$details[0]['present_date']."&&cal_srno=".$details[0]['calibration_serial']."&&machine_type=".$details[0]['machine_type']."&&centername=".$details[0]['centername']."&&centeraddress1=".$details[0]['centeraddress1']."&&centeraddress2=".$details[0]['centeraddress2']."&&calibration_gas_validity=".$details[0]['gas_valid_date']."&&cal_validity=".$details[0]['calibration_validity_date']."&&srno=".$details[0]['srno'];  ?>">Click here</a></td>
                              </tr>
    </table>
    <?php  } ?>
            </div>
            <div class="col-sm-12 col-md-2 col-lg-2"></div>
        </div>
     </div>
   <div class="container-fluid fixed-bottom">
     <div class="row">
        <div class="col-12 text-center bg-dark text-white p-3">
        <i class="fas fa-copyright"></i> All rights reserved @2022
        </div>
     </div>
   </div>
    
  <!-- Js scripts -->
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./css/fontawsome/js/all.min.js"></script>
    <script src="./js/main.js"></script>
    
  <!-- Js scripts End-->
 <!-- Modal search -->
 <div class="modal" tabindex="-1" id="certificate_details_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Calibration Details</h5>
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

  <?php 
}
?>

