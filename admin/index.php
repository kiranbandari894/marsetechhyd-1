<?php 
session_start();
include_once('../constants.php');
include('../classes/main_class.php');
date_default_timezone_set("Asia/kolkata"); 
$obj = new marsetech(HOST,USER,PASS,DB);
$calibratio_list = $obj->load_products('calibrations');
$enquiry_list = $obj->load_products('enquiry');
$training_cert_list = $obj->load_products('training_certificate');
$amc_cert_list = $obj->load_products('amc');

$count = $obj->count_rows('calibrations');
$count_enquiry = $obj->count_rows('enquiry');
$count_training_cert = $obj->count_rows('training_certificate');
$count_amc_cert = $obj->count_rows('amc');
 
include_once('../constants.php'); 

if(isset($_SESSION['admin_session_data'][0]['username'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marse Technologies Hyderabad</title>
    <!-- Style Sheets  -->
  
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/Fontscustom/style.css">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/fontawsome/css/all.min.css">
    <link rel="stylesheet" href="../css/main.css">
        <!-- Style Sheets  End -->
</head>
<body>
  
    <header class="desktop-logo">
      <div class="container-fluid">
         <div class="row pt-2 pb-2">
         <div class="item item-logo col-3 pl-3">
          <a class="navbar-brand" href="#"><img src="../img/logo.png" alt=""></a>
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
        <a class="navbar-brand mobile-logo" href="#"><img src="../img/logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
             <a class="nav-link active" aria-current="page" href="?"><i class="fas fa-home"></i> Home</a>
            </li>
           
           <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Menu
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?calibration"><i class="fas fa-plus-circle"></i> New Calibration</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?calibration_renew"><i class="fas fa-external-link-alt"></i> Calibration renewal</a>
                  </li>
                  <!-- <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?calibration_renew"><i class="fas fa-external-link-alt"></i> Gas Cylinder renewal</a>
                  </li> -->
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?cal_list"><i class="fas fa-list"></i> Calibration List</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?customers_enquiry_list"><i class="fas fa-list"></i> Enquiry List</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?products"><i class="fas fa-plus-circle"></i> Add Products</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?amc"><i class="fas fa-key"></i> AMC </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?amc_cert_list_expiry"><i class="fas fa-key"></i> AMC's list</a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?operator_cer"><i class="fas fa-key"></i> Operator Certificate </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?training_cert_list"><i class="fas fa-key"></i> Operators Certificates List </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?changepass"><i class="fas fa-key"></i> Change Pass</a>
                  </li>
                 
              </ul>
            </li>  
            <!-- <li class="nav-item">
              <a class="nav-link disabled">Disabled</a>
            </li> -->
            <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../logout.php?logout"><i class="fas fa-sign-in-alt"></i> Logout</a>
            </li>
        </ul>

        <form class="d-flex" action="../calibration_search.php?cer_no=" data-host="<?php echo SERCH_URL;  ?>" role="search" method="GET" id="search_form">
            <input class="form-control me-2 search_certificate" type="text" name="search_certificate" placeholder="Certificate No." aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        </div>
    </div>
    </nav>
   <!-- Navigation Menu End -->
  <!-- Home page -->
    <div class="container" id="home">
        <div class="row mt-3">
           
            <div class="col-sm-12 col-md-4 col-lg-4">
            <div class="card alert alert-success" id="card">
                    <div class="card-body">
                      <h5 class="card-title">Calibrations</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b> Calibrations : <?php echo $count; ?> </b> </li>
                    </ul>
                    <div class="card-body">
                    <a href="?cal_list" class="btn btn-success"  id="gtc">Go to List</a>
                    <a href="?calibration" class="btn btn-primary"  id="gtc">New calibration</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
            <div class="card alert alert-success" id="card">
                    <div class="card-body">
                        <h5 class="card-title">Customers Enquiry</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Total Enquires : <b> <?php echo $count_enquiry; ?></b></li>
                    </ul>
                    <div class="card-body">
                    <a href="?customers_enquiry_list" class="btn btn-primary">Go to list</a>
                    
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
            <div class="card alert alert-success" id="card">
                    <div class="card-body">
                        <h5 class="card-title">Training Certificates</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Total Certificates : <b> <?php echo $count_training_cert; ?></b></li>
                    </ul>
                    <div class="card-body">
                    <a href="?training_cert_list" class="btn btn-success">Go to list</a>
                    <a href="?operator_cer" class="btn btn-primary">New Certificate</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
            <div class="card alert alert-success" id="card">
                    <div class="card-body">
                        <h5 class="card-title">AMC Certificates</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Total Certificates : <b> <?php echo $count_amc_cert; ?></b></li>
                    </ul>
                    <div class="card-body">
                    <a href="?amc_cert_list" class="btn btn-success">Go to list</a>
                    <a href="?amc" class="btn btn-primary">New Certificate</a>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- Home Page Ends -->
  <!-- Calibration Form -->
  <?php if(isset($_GET['calibration'])){ ?>
   <style>
     #home{
        display: none;
     }
   </style>
    <div class="row">
            <div class="col-sm-12 text-center">
            <h3 class="alert alert-info" style="font-family:yadaiah">Calibration Form</h3>
            </div>
    </div>
    <div class="container">
        
        <div class="row">
          
            <div class="col-sm-12 col-md-4 col-lg-4" id="calibration_form_container"></div>
            <div class="col-sm-12 col-md-4 col-lg-4" id="calibration_form_container">
                
                <form action="" class="mt-3 mb-5" data-host="<?php echo SERCH_URL; ?>" id="calibration_form" method="post">
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" name="present_date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="types">Machine Type</label>
                        <select name="machine_type" class="form-control" id="machine_type">
                            <option value="">--select--</option>
                            <option value="petrol">petrol</option>
                            <option value="diesel">diesel</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="srno">Sr No.</label>
                        <input type="number" name="srno" placeholder="Enter Serial No."  class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="centername">Pollution Center Name</label>
                        <input type="text" name="centername" placeholder="Center Name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="centername">PUC Center Registration No</label>
                        <input type="text" name="centerregistration" placeholder="Center Registration No" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="centeraddress1">Center Address Line 1</label>
                        <input type="text" name="centeraddress1" placeholder="Center address" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="centeraddress2">Center Address Line 2</label>
                        <input type="text" name="centeraddress2" placeholder="Center address" class="form-control" required>
                    </div>
                    <div class="form-group">
                        
                        <input type="hidden" name="gas_valid_date" placeholder="Calibration gas validity date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="calibration_validity_date" required>
                        <input type="hidden" name="calibration_serial" required>
                        <input type="hidden" name="cal_year" required>
                        <input type="hidden" name="qr_img" required>
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile No.</label>
                        <input type="number" name="mobile" placeholder="Enter customer mobile" class="form-control" required>
                    </div>
                    <div class="form-group text-center" id="loadimg">
                      <img id="loading_img"  src="../img/loading-gif.gif" alt="">
                    </div>
                    <div class="form-group text-center mt-3">
                        <input type="submit" class="btn btn-primary" value="submit">
                        <input type="reset" class="btn btn-danger ml-3" value="reset">
                    </div>
                    <div class="form-group">
                       <div class="result"></div>
                    </div>
                </form>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4" id="calibration_form_container"></div>
        </div>
    </div>

  <?php } ?>  
  <!-- Calibration Form End -->
  <!-- Calibration Renewal -->
  <?php if(isset($_GET['calibration_renew'])){ ?> 
    <style>
     #home{
        display: none;
     }
   </style>
   <div class="row">
            <div class="col-sm-12 text-center">
            <h3 class="alert alert-info" style="font-family:yadaiah">Calibration Renew Form</h3>
            </div>
    </div>
    <div class="container">
        <!-- <div class="row">
            <div class="col-sm-12">
            <form action="../classes/renew_calibration.php?cal_no=" method="GET" id="renew_calibreation">
                <div class="form-group" id="ser_form_renew">
                    <span>
                        <input type="number" id="renew"  class="form-control" placeholder="Enter Calibration number">
                    </span>
                    <span>
                       <input type="submit" class="btn btn-info" value="Get Data">
                    </span>
                </div>
            </form>  
            </div>
        </div> -->
        <div class="row">
            <div class="col-sm-12 col-lg-4"></div>
           
            <div class="col-sm-12 col-lg-4">
            <form action="../classes/handler.php?update_calibration" data-site="<?php echo SERCH_URL;  ?>" method="POST" id="renew_calibreation">
                <div class="form-group">
                    <label for="cal_number">Certificate No.</label>
                 
                    <input type="number" class="form-control" name="calibration_serial" value="<?php echo $_GET['calibration_renew'];  ?>" required>
                </div>
                <div class="form-group text-center" id="loadimg">
                      <img id="loading_img"  src="../img/loading-gif.gif" alt="">
                </div>
                <div class="form-group text-center mt-3">
                    <input type="submit" class="btn btn-success" value="Renew Calibration" >
                </div>
            </form>  
            </div>

            <div class="col-sm-12 col-lg-4"></div>
        </div>
    </div>
   <?php } ?>
  <!-- Calibration Renewal End -->
  <!-- Gas Cylinder validity Renewal -->
  <?php if(isset($_GET['gas_validity_renew'])){ ?> 
    <style>
     #home{
        display: none;
     }
   </style>
   <div class="row">
            <div class="col-sm-12 text-center">
            <h3 class="alert alert-info" style="font-family:yadaiah">Gas Cylinder validity Renew</h3>
            </div>
    </div>
    <div class="container">
        <!-- <div class="row">
            <div class="col-sm-12">
            <form action="../classes/renew_calibration.php?cal_no=" method="GET" id="renew_calibreation">
                <div class="form-group" id="ser_form_renew">
                    <span>
                        <input type="number" id="renew"  class="form-control" placeholder="Enter Calibration number">
                    </span>
                    <span>
                       <input type="submit" class="btn btn-info" value="Get Data">
                    </span>
                </div>
            </form>  
            </div>
        </div> -->
        <div class="row">
            <div class="col-sm-12 col-lg-4"></div>
           
            <div class="col-sm-12 col-lg-4">
            <form action="../classes/handler.php?update_calibration" data-site="<?php echo SERCH_URL;  ?>" method="POST" id="renew_gasvalidity">
                <div class="form-group">
                    <label for="cal_number">Certificate No.</label>
                 
                    <input type="number" class="form-control" name="calibration_serial" value="<?php echo $_GET['gas_validity_renew'];  ?>" required>
                </div>
                <div class="form-group text-center" id="loadimg">
                      <img id="loading_img"  src="../img/loading-gif.gif" alt="">
                </div>
                <div class="form-group text-center mt-3">
                    <input type="submit" class="btn btn-success" value="Renew Calibration" >
                </div>
            </form>  
            </div>

            <div class="col-sm-12 col-lg-4"></div>
        </div>
    </div>
   <?php } ?>
  <!--  Gas Cylinder validity Renewal  End -->
  <!-- Add products -->
  <?php if(isset($_GET['products'])){  ?>
    <style>
     #home{
        display: none;
     }
   </style>
   <div class="row">
            <div class="col-sm-12 text-center">
            <h3 class="alert alert-info" style="font-family:yadaiah">Upload Products</h3>
            </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form action="../classes/handler.php?add_product" method="post" id="add_product" enctype="multipart/form-data">
                   <div class="form-group">
                       <label for="machine_name">Machine Name</label>
                       <input type="text" class="form-control" name="machine_name" placeholder="Name of Machine" require>
                   </div> 
                   <div class="form-group">
                       <label for="machine_price">Price</label>
                       <input type="text" class="form-control" name="machine_price" placeholder="Ex: RS. 2,50000" require>
                   </div>
                   <div class="form-group">
                      <label for="images">image</label>
                      <input type="file" accept=".jpg" class="form-control" name="cover_image" required>
                      <input type="hidden" name="cover_images">
                   </div>
                   <div class="form-group">
                      <label for="mobile">Contact No.</label>
                      <input type="number" class="form-control" name="mobile" required>
                   </div>
                   <div class="form-group text-center" id="loadimg">
                      <img id="loading_img"  src="../img/loading-gif.gif" alt="">
                   </div>
                   <div class="form-group text-center mt-4">
                     <input type="submit" class="btn btn-info" value="submit">
                     <input type="reset" class="btn btn-danger" value="Reset">
                   </div>
                </form>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>

   <?php } ?>
  <!-- Add products End -->

<!-- Calibration Expiry List -->
<?php 
 if(isset($_GET['cal_list'])){ 
  $calib_expired = [];
  $gas_expired = [];
  $not_expired = [];
  $slno = 0;  
  foreach($calibratio_list as $calibration){  
    $date_now = new DateTime();
    $calibratin_date = new DateTime($calibration['calibration_validity_date']);
    $calibratin_date1 = new DateTime($calibration['gas_valid_date']);
    if($date_now > $calibratin_date) {
       $calib_expired[] = $calibration;
    }
    elseif($date_now > $calibratin_date1){
       $gas_expired[] = $calibration;
    }else{
       $not_expired[] = $calibration;
    }

  }
  
  ?>
  <style>
     #home{
        display: none;
     }
   </style>
   <div class="row">
            <div class="col-sm-12 text-center">
            <h3 class="alert alert-info" style="font-family:yadaiah">Calibrations  List</h3>
            </div>
    </div>

<div class="container">
  <div class="row">
    <div class="col-sm-12 col-md-1"></div>
    <div class="col-sm-12 col-md-10">
      <!-- Calibration Expires Ends -->
      <h2 class="text-danger">Calibration Expired:</h2>
      <div class="table-responsive-lg table-responsive-sm table-responsive-md p-1">
      <table class="table table-striped table-responsive table-bordered "  id="list_table">
        <th>Sl No.</th>
        <th>Certificate No.</th>
        <th>Center_Name.</th>
        <th>Machine_Type</th>
        <th>Machine_SrNo.</th>
        <th>Mobile_No.</th>
        <th>validity</th>
        <th>Calibration_Validity</th>
        <th>whatsapp</th>
        <th>Edit</th>

        <?php $slno = 0; foreach($calib_expired as $calib_cert){ 
           if($slno == 0){
            $slno = 1;
          }
          ?>
          
          <tr>
                <td><?php echo $slno++; ?></td>
                <td><?php echo $calib_cert['calibration_serial']; ?></td>
                <td><?php echo $calib_cert['centername']; ?></td>
                <td><?php echo $calib_cert['machine_type']; ?></td>
                <td><?php echo $calib_cert['srno']; ?></td>
                <td><?php echo $calib_cert['mobile']; ?></td>
                <td><?php echo $calib_cert['calibration_validity_date']; ?></td>
                <td>
                   <?php 
                        // $expiry = null;
                        // $date_now = new DateTime();
                        // $calibratin_date = new DateTime($calibration['calibration_validity_date']);
                        // if ($date_now > $calibratin_date) {
                         echo  "<b class='text-danger'>Expired </b> <a href='?calibration_renew=".explode('-',$calib_cert['calibration_serial'])[2]."'>Renew</a>";
                        // }else{
                        //   echo  "<b class='text-success'>Not Expired </b>";
                        // }
                        
                    ?>
                </td>
               
                <td><a class="text-success" style="font-size:32px;" href="https://wa.me/+918074765166?text=Hi, <?php echo " ".$calibration['centername']." "; ?> Your Calibration has Expired.Please Renew it....Thankyou."><i class="fab fa-whatsapp"></i></a></td>
                <td><a class="text-info" target="_blank" style="font-size:32px;" href="?id=<?php echo $calibration['id']; ?>&&srno=<?php echo $calibration['srno']; ?>&&calibration_serial=<?php echo $calibration['calibration_serial']; ?>&&centername=<?php echo $calibration['centername']; ?>&&centerregistration=<?php echo $calibration['centerregistration']; ?>&&centeraddress1=<?php echo $calibration['centeraddress1'];  ?>&&centeraddress2=<?php echo $calibration['centeraddress2'];  ?>&&gas_valid_date=<?php echo $calibration['gas_valid_date'];  ?>&&mobile=<?php echo $calibration['mobile'];  ?>"><i class="fas fa-edit"></i></a></td>
              </tr>
              
        <?php } ?>
    </table>
  </div> 

  <!--Calibration  Expired End -->
  <!-- Gas cylinder expired Expired -->
  <h2 class="text-danger">Gas Cylinder Expired:</h2>
      <div class="table-responsive-lg table-responsive-sm table-responsive-md p-1">
      <table class="table table-striped table-responsive table-bordered "  id="list_table">
        <th>Sl No.</th>
        <th>Certificate No.</th>
        <th>Center_Name.</th>
        <th>Machine_Type</th>
        <th>Machine_SrNo.</th>
        <th>Mobile_No.</th>
        <th>validity</th>
        <th>Gas_Cylinder_validity</th>
        <th>whatsapp</th>
        <th>Edit</th>

        <?php $slno = 0; foreach($gas_expired as $gas_cert){ 
           if($slno == 0){
            $slno = 1;
          }
          ?>
          
          <tr>
                <td><?php echo $slno++; ?></td>
                <td><?php echo $gas_cert['calibration_serial']; ?></td>
                <td><?php echo $gas_cert['centername']; ?></td>
                <td><?php echo $gas_cert['machine_type']; ?></td>
                <td><?php echo $gas_cert['srno']; ?></td>
                <td><?php echo $gas_cert['mobile']; ?></td>
                <td><?php echo $gas_cert['gas_valid_date']; ?></td>
                <td>
                   <?php 
                      
                         echo  "<b class='text-danger'>Expired </b> <a href='?gas_validity_renew=".explode('-',$gas_cert['calibration_serial'])[2]."'>Renew </a>";
                        
                    ?>
                </td>
               
                <td><a class="text-success" style="font-size:32px;" href="https://wa.me/+918074765166?text=Hi, <?php echo " ".$gas_cert['centername']." "; ?> Your Gas Cylinder Calibration has Expired.Please Renew it....Thankyou."><i class="fab fa-whatsapp"></i></a></td>
                <td><a class="text-info" target="_blank" style="font-size:32px;" href="?id=<?php echo $gas_cert['id']; ?>&&srno=<?php echo $gas_cert['srno']; ?>&&calibration_serial=<?php echo $gas_cert['calibration_serial']; ?>&&centername=<?php echo $gas_cert['centername']; ?>&&centerregistration=<?php echo $gas_cert['centerregistration']; ?>&&centeraddress1=<?php echo $gas_cert['centeraddress1'];  ?>&&centeraddress2=<?php echo $gas_cert['centeraddress2'];  ?>&&gas_valid_date=<?php echo $gas_cert['gas_valid_date'];  ?>&&mobile=<?php echo $gas_cert['mobile'];  ?>"><i class="fas fa-edit"></i></a></td>
              </tr>
              
        <?php } ?>
    </table>
  </div> 
<!-- Gas Cylinder Expired Ends -->
<!-- Notexpired Expired -->
<h2 class="text-danger">Calibrations Not  Expired:</h2>
      <div class="table-responsive-lg table-responsive-sm table-responsive-md p-1">
      <table class="table table-striped table-responsive table-bordered "  id="list_table">
        <th>Sl No.</th>
        <th>Certificate No.</th>
        <th>Center_Name.</th>
        <th>Machine_Type</th>
        <th>Machine_SrNo.</th>
        <th>Mobile_No.</th>
        <th>validity</th>
        <th>Gas_Cylinder_validity</th>
        <th>Calibration_Validity</th>
        <th>whatsapp</th>
        <th>Edit</th>

        <?php $slno = 0; foreach($not_expired as $not_expire){ 
           if($slno == 0){
            $slno = 1;
          }
          ?>
          
          <tr>
                <td><?php echo $slno++; ?></td>
                <td><?php echo $not_expire['calibration_serial']; ?></td>
                <td><?php echo $not_expire['centername']; ?></td>
                <td><?php echo $not_expire['machine_type']; ?></td>
                <td><?php echo $not_expire['srno']; ?></td>
                <td><?php echo $not_expire['mobile']; ?></td>
                <td><?php echo $not_expire['calibration_validity_date']; ?></td>
                <td>
                   <?php 
                       
                          echo  "<b class='text-success'>Not Expired </b>";
                        
                        
                    ?>
                </td>
                <td>
                   <?php 
                       
                          echo  "<b class='text-success'>Not Expired </b>";
                        
                        
                    ?>
                </td>
                <td><a class="text-success" style="font-size:32px;" href="https://wa.me/+918074765166?text=Hi, <?php echo " ".$calibration['centername']." "; ?> Your Calibration has Expired.Please Renew it....Thankyou."><i class="fab fa-whatsapp"></i></a></td>
                <td><a class="text-info" target="_blank" style="font-size:32px;" href="?id=<?php echo $not_expire['id']; ?>&&srno=<?php echo $not_expire['srno']; ?>&&calibration_serial=<?php echo $not_expire['calibration_serial']; ?>&&centername=<?php echo $not_expire['centername']; ?>&&centerregistration=<?php echo $not_expire['centerregistration']; ?>&&centeraddress1=<?php echo $not_expire['centeraddress1'];  ?>&&centeraddress2=<?php echo $not_expire['centeraddress2'];  ?>&&gas_valid_date=<?php echo $not_expire['gas_valid_date'];  ?>&&mobile=<?php echo $not_expire['mobile'];  ?>"><i class="fas fa-edit"></i></a></td>
              </tr>
              
        <?php } ?>
    </table>
  </div> 
<!-- Not Expired Ends -->
    </div>
    <div class="col-sm-12 col-md-1"></div>
  </div>
</div>


<?php }  ?>
<!-- Calibration Expiry List -->
<!-- AMCS Expiry List -->
<?php 
 if(isset($_GET['amc_cert_list_expiry'])){ 
  $amc_expired = [];
  
  $not_expired = [];
  $slno = 0;  
  foreach($amc_cert_list as $amc){  
    $date_now = new DateTime();
    $amc_date = new DateTime($amc['valid_date']);
   
    if($date_now > $amc_date) {
       $amc_expired[] = $amc;
    }
    else{
       $not_expired[] = $amc;
    }

  }
  
  ?>
  <style>
     #home{
        display: none;
     }
   </style>
   <div class="row">
            <div class="col-sm-12 text-center">
            <h3 class="alert alert-info" style="font-family:yadaiah">Calibrations  List</h3>
            </div>
    </div>

<div class="container">
  <div class="row">
    <div class="col-sm-12 col-md-1"></div>
    <div class="col-sm-12 col-md-10">
      <!-- AMC Expires  -->
      <h2 class="text-danger">AMC Expired:</h2>
      <div class="table-responsive-lg table-responsive-sm table-responsive-md p-1">
      <table class="table table-striped table-responsive table-bordered "  id="list_table">
        <th>Sl No.</th>
        <th>Certificate No.</th>
        <th>Owner Name.</th>
        <th>Center_Name.</th>
        <th>Machine_Type</th>
        <th>Machine_SrNo.</th>
        <th>Mobile_No.</th>
        <th>validity</th>
        <th>Expired status</th>
        <th>whatsapp</th>
        <th>Edit</th>

        <?php $slno = 0; foreach($amc_expired as $amc_cert){ 
           if($slno == 0){
            $slno = 1;
          }
          ?>
          
          <tr>
                <td><?php echo $slno++; ?></td>
                <td><?php echo $amc_cert['amc_cer_no']; ?></td>
                <td><?php echo $amc_cert['ownername']; ?></td>
                <td><?php echo $amc_cert['centername']; ?></td>
                <td><?php echo $amc_cert['fueltype']; ?></td>
                <td><?php echo $amc_cert['srno']; ?></td>
                <td><?php echo $amc_cert['mobile']; ?></td>
                <td><?php echo $amc_cert['certificate_valid_date']; ?></td>
                <td>
                   <?php 
                        // $expiry = null;
                        // $date_now = new DateTime();
                        // $calibratin_date = new DateTime($calibration['calibration_validity_date']);
                        // if ($date_now > $calibratin_date) {
                         echo  "<b class='text-danger'>Expired </b> <a href='?amc_renew=".explode('-',$amc_cert['amc_cer_no'])[2]."'>Renew</a>";
                        // }else{
                        //   echo  "<b class='text-success'>Not Expired </b>";
                        // }
                        
                    ?>
                </td>
               
                <td><a class="text-success" style="font-size:32px;" href="https://wa.me/+918074765166?text=Hi, <?php echo " ".$amc_cert['centername']." "; ?> Your Calibration has Expired.Please Renew it....Thankyou."><i class="fab fa-whatsapp"></i></a></td>
                <td><a class="text-info" target="_blank" style="font-size:32px;" href="?id=<?php echo $amc_cert['id']; ?>&&amc_cer_no=<?php echo $amc_cert['amc_cer_no']; ?>&&centername=<?php echo $amc_cert['centername']; ?>&&mobile=<?php echo $amc_cert['mobile']; ?>&&address1=<?php echo $amc_cert['address1']; ?>&&address2=<?php echo $amc_cert['address2']; ?>&&ownername=<?php echo $amc_cert['ownername']; ?>&&slno=<?php echo $amc_cert['slno']; ?>&&certificate_issue_date=<?php echo $amc_cert['certificate_issue_date']; ?>&&certificate_valid_date=<?php echo $amc_cert['certificate_valid_date']; ?>&&fueltype=<?php echo $amc_cert['fueltype']; ?>"><i class="fas fa-edit"></i></a></td>
              </tr>
              
        <?php } ?>
    </table>
  </div> 

  <!--AMC  Expired End -->
   
  <!-- AMC Expires  -->
  <h2 class="text-danger">AMC Not Expired:</h2>
      <div class="table-responsive-lg table-responsive-sm table-responsive-md p-1">
      <table class="table table-striped table-responsive table-bordered "  id="list_table">
        <th>Sl No.</th>
        <th>Certificate No.</th>
        <th>Owner Name.</th>
        <th>Center_Name.</th>
        <th>Machine_Type</th>
        <th>Machine_SrNo.</th>
        <th>Mobile_No.</th>
        <th>validity</th>
        <th>Expired status</th>
        <th>Edit</th>

        <?php $slno = 0; foreach($not_expired as $amc_cert){ 
           if($slno == 0){
            $slno = 1;
          }
          ?>
          
          <tr>
                <td><?php echo $slno++; ?></td>
                <td><?php echo $amc_cert['amc_cer_no']; ?></td>
                <td><?php echo $amc_cert['ownername']; ?></td>
                <td><?php echo $amc_cert['centername']; ?></td>
                <td><?php echo $amc_cert['fueltype']; ?></td>
                <td><?php echo $amc_cert['slno']; ?></td>
                <td><?php echo $amc_cert['mobile']; ?></td>
                <td><?php echo $amc_cert['certificate_valid_date']; ?></td>
                <td>
                   <?php 
                        // $expiry = null;
                        // $date_now = new DateTime();
                        // $calibratin_date = new DateTime($calibration['calibration_validity_date']);
                        // if ($date_now > $calibratin_date) {
                         echo  "<b class='text-success'>Not Expired </b>";
                        // }else{
                        //   echo  "<b class='text-success'>Not Expired </b>";
                        // }
                        
                    ?>
                </td>  
               
            
                <td><a class="text-info" target="_blank" style="font-size:32px;" href="?id=<?php echo $amc_cert['id']; ?>&&amc_cer_no=<?php echo $amc_cert['amc_cer_no']; ?>&&centername=<?php echo $amc_cert['centername']; ?>&&mobile=<?php echo $amc_cert['mobile']; ?>&&address1=<?php echo $amc_cert['address1']; ?>&&address2=<?php echo $amc_cert['address2']; ?>&&ownername=<?php echo $amc_cert['ownername']; ?>&&slno=<?php echo $amc_cert['slno']; ?>&&certificate_issue_date=<?php echo $amc_cert['certificate_issue_date']; ?>&&certificate_valid_date=<?php echo $amc_cert['certificate_valid_date']; ?>&&fueltype=<?php echo $amc_cert['fueltype']; ?>"><i class="fas fa-edit"></i></a></td>
              </tr>
              
        <?php } ?>
    </table>
  </div> 

  <!--AMC  Expired End -->
    </div>
    <div class="col-sm-12 col-md-1"></div>
  </div>
</div>


<?php }  ?>
<!-- AMCS Expiry list end -->
<!-- Enquiry list -->
<?php if(isset($_GET['customers_enquiry_list'])){ ?>
  <style>
     #home{
        display: none;
     }
   </style>
   <div class="row">
            <div class="col-sm-12 text-center">
            <h3 class="alert alert-info" style="font-family:yadaiah">Enquires List</h3>
    </div>
    </div>
    <div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2"></div>
    <div class="col-sm-12 col-md-8 col-lg-8">
    <div class="table-responsive">
            <table class="table table-striped table-bordered" id="list_table">
              <th>Sl No.</th>
              <th>Customer Name</th>
              <th>Mobile No.</th>
              <th>email</th>
              <th>address</th>
              <th>Query</th>
              <th>whatsapp</th>
              <?php  $slno = 0;  foreach($enquiry_list as $enquiry){ 
                if($slno == 0){
                  $slno = 1;
                }
                ?>
              <tr data-id="<?php echo $enquiry['id']; ?>">
                <td><?php echo $slno++; ?></td>
                <td><?php echo $enquiry['name']; ?></td>
                <td><?php echo $enquiry['mobile']; ?></td>
                <td><?php echo $enquiry['email']; ?></td>
                <td><?php echo $enquiry['address']; ?></td>
                <td><?php echo $enquiry['yourQuery']; ?></td>
                <td><a class="text-success" style="font-size:32px;" href="#"><i class="fab fa-whatsapp"></i></a></td>
                
              </tr>
              <?php  } ?>
            </table>
        </div>
    </div>
    <div class="col-sm-12 col-md-2 col-lg-2"></div>
    </div>

   <?php  }  ?> 
<!-- Enquiry list Ends -->
<!-- Training certificates List -->
<?php if(isset($_GET['training_cert_list'])){ ?>
  <style>
     #home{
        display: none;
     }
   </style>
   <div class="row">
            <div class="col-sm-12 text-center">
            <h3 class="alert alert-info" style="font-family:yadaiah">Training Certificates List</h3>
            </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-2 col-lg-1"></div>
        <div class="col-sm-12 col-md-10 col-lg-10">
          <div class="table-responsive-lg table-responsive-sm table-responsive-md p-1">
            <table class="table table-striped table-responsive table-bordered "  id="list_table">
              <th>Sl No.</th>
              <th>Certificate No.</th>
              <th>Center_Name.</th>
              <th>Mobile_No.</th>
              <th>whatsapp</th>
              <th>Edit</th>
              <?php  $slno = 0;  foreach($training_cert_list as $training){ 
                if($slno == 0){
                  $slno = 1;
                }
                ?>
              <tr>
                <td><?php echo $slno++; ?></td>
                <td><?php echo $training['training_cer_no']; ?></td>
                <td><?php echo $training['centername']; ?></td>
                <td><?php echo $training['mobile']; ?></td>
                <td><a class="text-success" style="font-size:32px;" href="#"><i class="fab fa-whatsapp"></i></a></td>
                <td><a class="text-info" target="_blank" style="font-size:32px;" href="?id=<?php echo $training['id']; ?>&&training_cer_no=<?php echo $training['training_cer_no']; ?>&&centername=<?php echo $training['centername']; ?>&&mobile=<?php echo $training['mobile']; ?>&&address1=<?php echo $training['address1']; ?>&&address2=<?php echo $training['address2']; ?>&&traineename=<?php echo $training['traineename']; ?>"><i class="fas fa-edit"></i></a></td>
              </tr>
              <?php  } ?>
            </table>
            </div>
        </div>
        <div class="col-sm-12 col-md-1 col-lg-1"></div>
      
      </div>
    </div> 
<?php } ?>
<!-- Training certificates Ens -->
<!-- AMCs certificates List -->
<?php if(isset($_GET['amc_cert_list'])){ ?>
  <style>
     #home{
        display: none;
     }
   </style>
   <div class="row">
            <div class="col-sm-12 text-center">
            <h3 class="alert alert-info" style="font-family:yadaiah">Amc Certificates List</h3>
            </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-2 col-lg-1"></div>
        <div class="col-sm-12 col-md-10 col-lg-10">
          <div class="table-responsive-lg table-responsive-sm table-responsive-md p-1">
            <table class="table table-striped table-responsive table-bordered "  id="list_table">
              <th>Sl No.</th>
              <th>Certificate No.</th>
              <th>Center_Name.</th>
              <th>Mobile_No.</th>
              <th>whatsapp</th>
              <th>Edit</th>
              <?php  $slno = 0;  foreach($amc_cert_list as $amc){ 
                if($slno == 0){
                  $slno = 1;
                }
                ?>
              <tr>
                <td><?php echo $slno++; ?></td>
                <td><?php echo $amc['amc_cer_no']; ?></td>
                <td><?php echo $amc['centername']; ?></td>
                <td><?php echo $amc['mobile']; ?></td>
                <td><a class="text-success" style="font-size:32px;" href="#"><i class="fab fa-whatsapp"></i></a></td>
                <td><a class="text-info" target="_blank" style="font-size:32px;" href="?id=<?php echo $amc['id']; ?>&&amc_cer_no=<?php echo $amc['amc_cer_no']; ?>&&centername=<?php echo $amc['centername']; ?>&&mobile=<?php echo $amc['mobile']; ?>&&address1=<?php echo $amc['address1']; ?>&&address2=<?php echo $amc['address2']; ?>&&ownername=<?php echo $amc['ownername']; ?>&&slno=<?php echo $amc['slno']; ?>&&certificate_issue_date=<?php echo $amc['certificate_issue_date']; ?>&&certificate_valid_date=<?php echo $amc['certificate_valid_date']; ?>&&fueltype=<?php echo $amc['fueltype']; ?>"><i class="fas fa-edit"></i></a></td>
              </tr>
              <?php  } ?>
            </table>
            </div>
        </div>
        <div class="col-sm-12 col-md-1 col-lg-1"></div>
      
      </div>
    </div> 
<?php } ?>
<!-- AMC certificates list End -->
<!-- Edit calibration -->
<?php if(isset($_GET['calibration_serial'])){  ?>
  <style>
     #home{
        display: none;
     }
   </style>
   <div class="row">
            <div class="col-sm-12 text-center">
            <h3 class="alert alert-info" style="font-family:yadaiah">Edit Calibration   <?php echo explode("-",$_GET['calibration_serial'])[2]; ?></h3>
    </div>
  <div class="container">
    <div class="row mb-4">
      <div class="col-sm-12 col-md-4"></div>
      <div class="col-sm-12 col-md-4"> 
        <form action="../classes/handler.php?edit_calibration" class="mt-3 mb-5" data-host="<?php echo SERCH_URL; ?>" id="calibration_edit_form" method="post">
                   
                   
                    <div class="form-group">
                        <label for="srno">Sr No.</label>
                        <input type="hidden" name="id" value="<?php echo $_GET['id'];  ?>">
                        <input type="hidden" name="calibration_serial" value="<?php echo $_GET['calibration_serial'];  ?>">
                        <input type="number" name="srno" placeholder="Enter Serial No." value="<?php echo $_GET['srno'];  ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="centername">Pollution Center Name</label>
                        <input type="text" name="centername" placeholder="Center Name" value="<?php echo $_GET['centername'];  ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="centername">PUC Center Registration No</label>
                        <input type="text" name="centerregistration" value="<?php echo $_GET['centerregistration'];  ?>" placeholder="Center Registration No" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="centeraddress1">Center Address Line 1</label>
                        <input type="text" name="centeraddress1" value="<?php echo $_GET['centeraddress1'];  ?>" placeholder="Center address"  class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="centeraddress2">Center Address Line 2</label>
                        <input type="text" name="centeraddress2" value="<?php echo $_GET['centeraddress2'];  ?>" placeholder="Center address" class="form-control" required>
                    </div> 
                    
                    <div class="form-group">
                        <label for="mobile">Mobile No.</label>
                        <input type="number" name="mobile" value="<?php echo $_GET['mobile'];  ?>" placeholder="Enter customer mobile" class="form-control" required>
                    </div>
                    <div class="form-group text-center" id="loadimg">
                      <img id="loading_img"  src="../img/loading-gif.gif" alt="">
                    </div>
                    <div class="form-group text-center mt-3" id="edit_btns">
                        <input type="submit" class="btn btn-primary" value="submit">
                        <input type="reset" class="btn btn-danger ml-3" value="reset">
                    </div>
                    <div class="form-group text-center">
                       <div class="result"></div>
                    </div>
                </form>
              </div>
              <div class="col-sm-12 col-md-4"></div>

    </div>
  </div>
<?php } ?>
<!-- Edit Calibration End -->
<!-- Edit Training Certificate -->
<?php if(isset($_GET['training_cer_no'])){  ?>
  <style>
     #home{
        display: none;
     }
   </style>
   <div class="row">
            <div class="col-sm-12 text-center">
            <h3 class="alert alert-info" style="font-family:yadaiah">Edit Training Certificate  <?php echo explode("-",$_GET['training_cer_no'])[2]; ?></h3>
    </div>
  <div class="container">
    <div class="row mb-4">
      <div class="col-sm-12 col-md-4"></div>
      <div class="col-sm-12 col-md-4"> 
        <form action="../classes/handler.php?edit_training_cert" class="mt-3 mb-5" data-host="<?php echo SERCH_URL; ?>" id="training_edit_form" method="post">
                   
                   
                    <div class="form-group">
                        <label for="srno">Center Name</label>
                        <input type="hidden" name="id" value="<?php echo $_GET['id'];  ?>">
                        <input type="hidden" name="training_cer_no" value="<?php echo $_GET['training_cer_no'];  ?>">
                        <input type="text" name="centername" placeholder="Enter Center Name." value="<?php echo $_GET['centername'];  ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="operatorname">Operator Name</label>
                        <input type="text" name="traineename" value="<?php echo $_GET['traineename'];  ?>" placeholder="Operator Name"  class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="centeraddress1">Center Address Line 1</label>
                        <input type="text" name="address1" value="<?php echo $_GET['address1'];  ?>" placeholder="Center address"  class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="centeraddress1">Center Address Line 2</label>
                        <input type="text" name="address2" value="<?php echo $_GET['address2'];  ?>" placeholder="Center address"  class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="mobile">Operator Mobile</label>
                        <input type="text" name="mobile" value="<?php echo $_GET['mobile'];  ?>" placeholder="Mobile Number"  class="form-control" required>
                    </div>
                    
                    <div class="form-group text-center" id="loadimg">
                      <img id="loading_img"  src="../img/loading-gif.gif" alt="">
                    </div>
                    <div class="form-group text-center mt-3" id="edit_btns">
                        <input type="submit" class="btn btn-primary" value="submit">
                        <input type="reset" class="btn btn-danger ml-3" value="reset">
                    </div>
                    <div class="form-group text-center">
                       <div class="result"></div>
                    </div>
                </form>
              </div>
              <div class="col-sm-12 col-md-4"></div>

    </div>
  </div>
<?php } ?>
<!-- Edit Training End -->
<!-- Edit AMC Certificate -->
<?php if(isset($_GET['amc_cer_no'])){  ?>
  <style>
     #home{
        display: none;
     }
   </style>
   <div class="row">
            <div class="col-sm-12 text-center">
            <h3 class="alert alert-info" style="font-family:yadaiah">Edit AMC Certificate  <?php echo explode("-",$_GET['amc_cer_no'])[2]; ?></h3>
    </div>
  <div class="container">
    <div class="row mb-4">
      <div class="col-sm-12 col-md-4"></div>
      <div class="col-sm-12 col-md-4"> 
        <form action="../classes/handler.php?edit_amc_cert" class="mt-3 mb-5" data-host="<?php echo SERCH_URL; ?>" id="amc_edit_form" method="post">
                   
                   
                    <div class="form-group">
                        <label for="srno">Center Name</label>
                        <input type="hidden" name="id" value="<?php echo $_GET['id'];  ?>">
                        <input type="hidden" name="amc_cer_no" value="<?php echo $_GET['amc_cer_no'];  ?>">
                        <input type="text" name="centername" placeholder="Enter Center Name." value="<?php echo $_GET['centername'];  ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="operatorname">Owner Name</label>
                        <input type="text" name="ownername" value="<?php echo $_GET['ownername'];  ?>" placeholder="Owner Name"  class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="centeraddress1">Center Address Line 1</label>
                        <input type="text" name="address1" value="<?php echo $_GET['address1'];  ?>" placeholder="Center address"  class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="centeraddress1">Center Address Line 2</label>
                        <input type="text" name="address2" value="<?php echo $_GET['address2'];  ?>" placeholder="Center address"  class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="slno">Slno</label>
                        <input type="text" name="slno" value="<?php echo $_GET['slno'];  ?>" placeholder="Machine Serial Number"  class="form-control" required>
                        <input type="hidden" name="issue_date" >
                        <input type="hidden" name="valid_date" >
                      </div>
                    
                    <div class="form-group text-center" id="loadimg">
                      <img id="loading_img"  src="../img/loading-gif.gif" alt="">
                    </div>
                    <div class="form-group text-center mt-3" id="edit_btns">
                        <input type="submit" class="btn btn-primary" value="submit">
                        <input type="reset" class="btn btn-danger ml-3" value="reset">
                    </div>
                    <div class="form-group text-center">
                       <div class="result"></div>
                    </div>
                </form>
              </div>
              <div class="col-sm-12 col-md-4"></div>

    </div>
  </div>
<?php } ?>
<!-- Edit AMC End -->
<!-- Change Password-->
<?php if(isset($_GET['changepass'])){ ?>
     <style>
     #home{
        display: none;
     }
   </style>
   <div class="row">
            <div class="col-sm-12 text-center">
            <h3 class="alert alert-info" style="font-family:yadaiah">Change  Password</h3>
    </div>
  <div class="container">
    <div class="row mb-4">
      <div class="col-sm-12 col-md-4"></div>
      <div class="col-sm-12 col-md-4">
	    <form action="../classes/handler.php?change_password" method="post" id="changePassform">
		  <div class="form-group">
		    <label>New Password</label>
			<input type="text" placeholder="New password"name="password" class="form-control" >
		  </div>
		  <div class="form-group text-center mt-3">
			<input type="submit"  class="btn btn-success">
		  </div> 
		  <div class="result mt-3"></div>
		</form>
	  </div>
      <div class="col-sm-12 col-md-4"></div>
    </div>
  </div>	
<?php } ?>
<!-- Change Password End-->
<!-- Operator Certificate -->
<?php if(isset($_GET['operator_cer'])){ ?>
<style>
     #home{
        display: none;
     }
   </style>
   <div class="row">
            <div class="col-sm-12 text-center">
            <h3 class="alert alert-info" style="font-family:yadaiah">New Training Certificate</h3>
   </div>
  <div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-3 col-lg-3"></div>
        <div class="col-sm-12 col-md-3 col-lg-6">
            <form action="" method="POST" id="operator_form">            
              <div class="form-group mt-1">
                 <label for=""><b>Trainee Name</b></label>
                 
                 <input type="hidden" name="training_cer_no" required>
                 <input type="hidden" name="certificate_issue_date" required>
                 <input type="text" name="traineename" placeholder="Enter name of Operator" class="form-control" required>
              </div> 
              <div class="form-group mt-1">
                 <label for=""><b>Center Name</b></label>
                 <input type="text" name="centername" placeholder=" M/S or Mr.  Pollution center name" class="form-control" required>
              </div> 
              <div class="form-group mt-1">
                 <label for=""><b>Address Line 1</b></label>
                 <input type="text" name="address1" placeholder=" address of center" class="form-control" required>
              </div> 
              <div class="form-group mt-1">
                 <label for=""><b>Address Line 2</b></label>
                 <input type="text" name="address2" placeholder="address of center" class="form-control" required>
              </div> 
              <div class="form-group mt-1">
                 <label for=""><b>Mobile No</b></label>
                 <input type="tel" name="mobile" pattern="[0-9]{10}"   maxlength="10" placeholder="Operator Mobile Number" class="form-control" required>
              </div> 
              <div class="form-group mt-1">
                 <label for=""><b>image</b></label>
                 <input type="file" name="profpic" class="form-control" required>
                 <input type="hidden" name="profimg" class="form-control" required>
              </div> 
              <div class="form-group text-center mt-3">
                 <input type="submit" class="btn btn-primary" value="submit">
              </div>
              <div class="form-group mt-3 text-center">
                  <div class="result mt-4"></div>
              </div>
            </form>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3"></div>
    </div>
  </div>

<?php } ?>
<!-- Operator Certificate End -->
<!-- Amc  -->
<?php if(isset($_GET['amc'])){ ?>
<style>
     #home{
        display: none;
     }
   </style>
   <div class="row">
            <div class="col-sm-12 text-center">
            <h3 class="alert alert-info" style="font-family:yadaiah">New AMC</h3>
   </div>
   <div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-3 col-lg-3"></div>
        <div class="col-sm-12 col-md-3 col-lg-6">
            <form action="../classes/handler.php?create_amc" method="POST" id="new_amc_form">            
              <div class="form-group mt-1">
                 <label for=""><b>Name</b></label> 
                 
                 <input type="hidden" name="amc_cer_no" required>
                 <input type="hidden" name="certificate_issue_date" required>
                 <input type="hidden" name="certificate_valid_date" required>
                 <input type="text" name="ownername" placeholder="Enter name of Owner" class="form-control" required>
              </div>
              <div class="form-group mt-1">
                 <label for=""><b>Center Registration</b></label>
                 <input type="text" name="centerregistration" placeholder=" PUC Licence" class="form-control" required>
              </div> 
              <div class="form-group mt-1">
                 <label for=""><b>Center Name</b></label>
                 <input type="text" name="centername" placeholder=" M/S or Mr.  Pollution center name" class="form-control" required>
              </div> 
              <div class="form-group mt-1">
                 <label for=""><b>Address Line 1</b></label>
                 <input type="text" name="address1" placeholder=" address of center" class="form-control" required>
              </div> 
              <div class="form-group mt-1">
                 <label for=""><b>Address Line 2</b></label>
                 <input type="text" name="address2" placeholder="address of center" class="form-control" required>
              </div> 
              <div class="form-group mt-1">
                 <label for=""><b>Mobile No</b></label>
                 <input type="tel" name="mobile" pattern="[0-9]{10}"   maxlength="10" placeholder="Operator Mobile Number" class="form-control" required>
              </div> 
              <div class="form-group mt-1">
              <label for=""><b>Fuel Type</b></label>
                <select name="fueltype" id="fueltype" class="form-control">
                   <option value="">--Select--</option>
                   <option value="petrol">Petrol</option>
                   <option value="diesel">Diesel</option>
                   <option value="both">Petrol and Diesel</option>

                </select>
                <input type="hidden" name="amc_year">
              </div> 
              <div class="form-group mt-1">
                 <label for=""><b>Sl.No.</b></label>
                 <input type="text" name="slno" placeholder="if both : ex-345-456 (diesel-petrol)" class="form-control" required>
              </div>  
              <div class="form-group text-center mt-3">
                 <input type="submit" class="btn btn-primary" value="submit">
              </div>
              <div class="form-group mt-3 text-center">
                  <div class="result mt-4"></div>
              </div>
            </form>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3"></div>
    </div>
  </div>
      
<?php } ?>

<!-- Amc end -->


<!-- Amc update  -->
<?php if(isset($_GET['amclist'])){ ?>
<style>
     #home{
        display: none;
     }
   </style>
   <div class="row">
            <div class="col-sm-12 text-center">
            <h3 class="alert alert-info" style="font-family:yadaiah">AMC List</h3>
   </div>
<?php } ?>

<!-- Amc update end -->

  <!-- Footer -->
  <div class="container-fluid fixed-bottom">
     <div class="row">
        <div class="col-12 text-center bg-dark text-white p-3">
        <i class="fas fa-copyright"></i> 2022 | All rights reserved 
        </div>
     </div>
   </div>
   <!-- Footer Ends -->
  <!-- Js scripts -->
    <script src="../js/jquery.min.js"></script>
   <script src="../js/bootstrap.bundle.min.js"></script>
 
    <script src="../css/fontawsome/js/all.min.js"></script>
    <script src="../js/main.js"></script>
    
  <!-- Js scripts End-->

  <!-- Modal -->
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
      
      </div>
    </div>
  </div>
</div>
<!-- Modal End -->
<!-- Modal -->
<div class="modal" tabindex="-1" id="renew_details_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Calibration Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <div class="renewres"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
     
      </div>
    </div>
  </div>
</div>
<!-- Modal End -->
</body>
</html>
<?php  }else{
  header("Location:../");
} ?>