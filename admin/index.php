<?php 
session_start();
include_once('../constants.php');
include('../classes/main_class.php');
date_default_timezone_set("Asia/kolkata"); 
$obj = new marsetech(HOST,USER,PASS,DB);
$calibratio_list = $obj->load_products('calibrations');
$enquiry_list = $obj->load_products('enquiry');
$count = $obj->count_rows('calibrations');
$count_enquiry = $obj->count_rows('enquiry');
 
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
                <div class="card alert alert-info" id="card">
                    <div class="card-body">
                        <h5 class="card-title">Calibrations</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b> Calibrations : <?php echo $count; ?> </b> </li>
          
                    </ul>
                    <div class="card-body text-center">
                    <a href="?calibration" class="btn btn-primary">New Calibration</a>
                    <a href="?cal_list" class="btn btn-success"  id="gtc">Go to Calibration List</a>
                    
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
                    <a href="?customers_enquiry_list" class="btn btn-primary">Go to enquiry list</a>
                    
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
<!-- Calibration List -->
<?php if(isset($_GET['cal_list'])){ ?>
  <style>
     #home{
        display: none;
     }
   </style>
   <div class="row">
            <div class="col-sm-12 text-center">
            <h3 class="alert alert-info" style="font-family:yadaiah">Calibration List</h3>
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
              <th>Machine_Type</th>
              <th>Machine_SrNo.</th>
              <th>Mobile_No.</th>
              <th>validity</th>
              <th>Gas_Cylinder_validity</th>
              <th>Calibration_Validity</th>
              <th>whatsapp</th>
              <th>Edit</th>
              <?php  $slno = 0;  foreach($calibratio_list as $calibration){ 
                if($slno == 0){
                  $slno = 1;
                }
                ?>
              <tr>
                <td><?php echo $slno++; ?></td>
                <td><?php echo $calibration['calibration_serial']; ?></td>
                <td><?php echo $calibration['centername']; ?></td>
                <td><?php echo $calibration['machine_type']; ?></td>
                <td><?php echo $calibration['srno']; ?></td>
                <td><?php echo $calibration['mobile']; ?></td>
                <td><?php echo $calibration['calibration_validity_date']; ?></td>
                <td>
                   <?php 
                        $expiry = null;
                        $date_now = new DateTime();
                        $calibratin_date = new DateTime($calibration['gas_valid_date']);
                        if ($date_now > $calibratin_date) {
                         echo  "<b class='text-danger'>Expired </b> <a href='?gas_validity_renew=".explode('-',$calibration['calibration_serial'])[2]."'>Renew </a>";
                        }else{
                          echo  "<b class='text-success'>Not Expired </b>";
                        }
                        
                    ?>
                </td>
                <td>
                   <?php 
                        $expiry = null;
                        $date_now = new DateTime();
                        $calibratin_date = new DateTime($calibration['calibration_validity_date']);
                        if ($date_now > $calibratin_date) {
                         echo  "<b class='text-danger'>Expired </b> <a href='?calibration_renew=".explode('-',$calibration['calibration_serial'])[2]."'>Renew</a>";
                        }else{
                          echo  "<b class='text-success'>Not Expired </b>";
                        }
                        
                    ?>
                </td>
               
                <td><a class="text-success" style="font-size:32px;" href="#"><i class="fab fa-whatsapp"></i></a></td>
                <td><a class="text-info" target="_blank" style="font-size:32px;" href="?id=<?php echo $calibration['id']; ?>&&srno=<?php echo $calibration['srno']; ?>&&calibration_serial=<?php echo $calibration['calibration_serial']; ?>&&centername=<?php echo $calibration['centername']; ?>&&centerregistration=<?php echo $calibration['centerregistration']; ?>&&centeraddress1=<?php echo $calibration['centeraddress1'];  ?>&&centeraddress2=<?php echo $calibration['centeraddress2'];  ?>&&gas_valid_date=<?php echo $calibration['gas_valid_date'];  ?>&&mobile=<?php echo $calibration['mobile'];  ?>"><i class="fas fa-edit"></i></a></td>
              </tr>
              <?php  } ?>
            </table>
            </div>
        </div>
        <div class="col-sm-12 col-md-1 col-lg-1"></div>
      
      </div>
    </div> 
<?php } ?>
<!-- Calibration List Ens -->
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
<!-- Edit Calibration End -->
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
        <h5 class="modal-title">Calibration Details</h5>
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