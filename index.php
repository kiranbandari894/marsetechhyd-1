<?php 
date_default_timezone_set("Asia/kolkata");  
include_once('./constants.php');
include('./classes/main_class.php');
$obj = new marsetech(HOST,USER,PASS,DB);
$products = $obj->load_products("products");

 
$host = HOST;
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
             <a class="nav-link active" aria-current="page" href="?"><i class="fas fa-home"></i> Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="?about"><i class="fas fa-brain"></i> About us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="?products"><i class="fas fa-cart-arrow-down"></i> Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="?contact"><i class="fas fa-address-book"></i> Contact us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" data-bs-toggle="modal" data-bs-target="#Login_admin" aria-current="page" href=""><i class="fas fa-sign-in-alt"></i> Login</a>
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
<!-- Home page -->
   <div class="container home-page  bg-info bg-opacity-10 border border-left border-right border-info mt-1">
    <div class="row">
        <div class="col-sm-12 text-center">
            <img src="img/home-img.jpg" style="max-height:400px;" class="img-fluid mt-2" alt="">
        </div>
    </div>
     <div class="row">
        <div class="col-sm-12">
           
             
              <h4 class="bg-info bg-gradient p-1 mt-2">Vehicle emission standard</h4>
               <p>
                 Emission standards are the legal requirements governing air pollutants released into the atmosphere. Emission standards set quantitative limits on the permissible amount of specific air pollutants that may be released from specific sources over specific timeframes. They are generally designed to achieve air quality standards and to protect human life. Different regions and countries have different standards for vehicle emissions.
               </p>
                <hr>
               <h4 class="bg-info bg-gradient p-1 mt-2">UNIQUE FEATURES OF MARS DIESEL SMOKE METER MODEL SM-05</h4>
                <hr>
            <ol>
                <li>
                    4 Type of RPM MEasurement Systems. i.e, Piezo.BATT.VIBRARION and OBD.
                </li>
                <li>
                   First Indigenous Smoke Meter in India with OBD which is a digital Vehicle interface and RPM and Oil Temperature read directly from the Vehicle.
                </li>
                <li>First Indigenous Infrared Sensor Non contact type Oil Temperature Measurement system.</li>
                <li>Remote Connection indication. Supplied with Rechargeable batteries.</li>
                <li>Super Range of wireless Remote</li>
                <li>Sunlight Readable LCD Displays for  Good Visibility in the Daylight.</li>
                <li>Earth/Ground Indication on the Smoke meter.(Improper Earthing gives improper values and damages the instrument)</li>
                <li>Power On Delay Incorporated  fpr Safety of the Smoke meter from power fluctuations and Generator giltches.</li>
                <li>Compact Power Supply</li>
                <li>Aluminium Body for  less weight</li>
                <li>SMD Components for easy servicing</li>
                <li>Remote Problem Debugging of the smoke meter through internet</li>
                <li>Auto Calibration Facility</li>
                
              </ol>
              

        </div>
     </div>
   </div>
<!-- Home page Ends -->
<!-- About Page -->
   <?php 
     if(isset($_GET['about'])){
   ?>
      <style>
        .home-page{
            display: none;
        }
      </style>
    <div class="container">
        <div class="row mt-2 p-2 text-dark mb-5">
            <div class="col-sm-12">
                <h4>About</h4>
                <hr>
                <p>
                An emission test cycle is a protocol contained in an emission standard to allow repeatable and comparable measurement of exhaust emissions for different engines or vehicles. Test cycles specify the specific conditions under which the engine or vehicle is operated during the emission test. There are many different test cycles issued by various national and international governments and working groups.[1] Specified parameters in a test cycle include a range of operating temperature, speed, and load. Ideally these are specified so as to accurately and realistically represent the range of conditions under which the vehicle or engine will be operated in actual use. Because it is impractical to test an engine or vehicle under every possible combination of speed, load, and temperature, this may not actually be the case.[2] Vehicle and engine manufacturers may exploit the limited number of test conditions in the cycle by programming their engine management systems to control emissions to regulated levels at the specific test points contained in the cycle, but create a great deal more pollution under conditions experienced in real operation but not represented in the test cycle. This results in real emissions higher than the standards are supposed to allow, undermining the standards and public health
                </p>
                <h4>Application :</h4>
                <hr>
                <p>
                Emission test cycles are typical tests for research and development activities on engines at automobile OEMs.
The commonly used hardware platforms therefore are:
                 <ul>
                    <li>
                       engine test stand - for just a single engine
                    </li>
                    <li>
                    vehicle test stand (also "chassis dynamometer" or "chassis dyno" or "emission dyno") - for the complete car with engine
                    </li>
                    <li>
                    ASM Test - Accelerated Simulation Mode: (California inspections) Vehicles tested at 15 MPH & 25 MPH where vehicle undergoes a load.
                    </li>
                 </ul>
                </p>
                <p>
                Many emissions standards focus on regulating pollutants released by automobiles (motor cars) and other powered vehicles. Others regulate emissions from industry, power plants, small equipment such as lawn mowers and diesel generators, and other sources of air pollution.

The first automobile emissions standards were enacted in 1963 in the United States, mainly as a response to Los Angeles' smog problems. Three years later Japan enacted their first emissions rules, followed between 1970 and 1972 by Canada, Australia, and several European nations.[1] The early standards mainly concerned carbon monoxide (CO) and hydrocarbons (HC). Regulations on nitrogen oxide emissions (NOx) were introduced in the United States, Japan, and Canada in 1973 and 1974, with Sweden following in 1976 and the European Economic Community in 1977. These standards gradually grew more and more stringent but have never been unified.[2]

There are largely three main sets of standards: United States, Japanese, and European, with various markets mostly using these as their base.[2] Sweden, Switzerland, and Australia had separate emissions standards for many years but have since adopted the European standards. India, China, and other newer markets have also begun enforcing vehicle emissions standards (derived from the European requirements) in the twenty-first century, as growing vehicle fleets have given rise to severe air quality problems there, too.
                </p>
            </div>
        </div>
    </div>

   <?php     
     }
   ?>
   <!-- About page Ends -->
   <!-- Products Page -->
      <?php if(isset($_GET['products'])){ ?>
        <style>
        .home-page{
            display: none;
        }
      </style>
             
        <div class="container">
           <div class="row mt-3 mb-4">
              <div class="col-sm-12 col-md-3">
                
              </div>
              <div class="col-sm-12 col-md-6">
<!--  Product Cards   -->
                 <div class="card" style="max-width: 100%;height:100%!important;">
              <?php
               if($products){

               
               foreach($products as $product){ 
               ?>
                 <div class="row g-0 border border-info">
                  <div class="col-md-4">
                    <img src="img/products_img/<?php echo $product['cover_images']; ?>" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $product['machine_name']; ?></h5>
                      <h6><i class="fas fa-rupee-sign"></i> <?php echo $product['machine_price']; ?> </h6> 
                      <ul>
                        <li><b>Brand:</b> Marse</li>
                        <!-- <li><b>Weight: 6kg</b></li> -->
                        <!-- <li><b>Measuring Range: CO 0-10,co2 0-20%</b></li> -->
                        <!-- <li><b>Dimension(Millimeter): 260mm(W)x180mm(H)x450mm(D)</b></li> -->
                        <li><b>Power Supply(V per Hz):220V </b></li>
                        <!-- <li><b>Warm Up: 10min</b></li> -->
                      </ul>
                       <p style="line-height:31px;">Contact: <?php echo $product['mobile'];   ?> or Chat  <a class="text-success" style="font-size:32px;" href="#"><i class="fab fa-whatsapp"></i></a></p>
                      <p class="card-text"><small class="text-muted"><?php echo $product['uploaded_on']; ?></small></p>
                    </div>
                  </div>
                </div>

                <?php
                  } 
                }else{ ?>
                  <div class="row">
                    <div class="col-sm-12">
                       <p class="alert alert-danger"> No Products found</p>
                    </div>
                  </div>
                <?php    } ?>
              </div>
<!--  Product Cards Ends  -->
              </div>
              <div class="col-sm-12 col-md-3"></div>
           </div>
        </div>

      <?php } ?>
   <!-- Products Page End -->
   <!-- Contact Form -->
    <?php if(isset($_GET['contact'])){ ?>
      <style>
        .home-page{
            display: none;
        }
      </style>
      <div class="container">
        <div class="row">
          <div class="col-sm-6" id="office_address">
             <address>
               16-11-5411/B/370,<br>
               Flat No.301,<br>
               Upendradevi Nilayam,<br>
               Shalivahannagar,Moosarambagh,<br>
               Hyderabad,<br>
               Telangana<br>
               Mobile : +91 8074765166 or Chat - <a class="text-success" style="font-size:32px;" href="#"><i class="fab fa-whatsapp"></i></a></p>
             </address>
          </div>
          <div class="col-sm-6">
             <form action="" class="p-3 mt-2 mb-2"  method="post" id="contact_form">
                <div class="form-group text-center">
                  <h4>Contact Form</h4>
                </div>
                <div class="form-group p-2">
                   <label for="name">Name:<sup style="font-size" class="text-danger">*</sup></label>
                   <input type="text" class="form-control" name="name" placeholder="Enter Your Name" required>
                   
                </div>
                
                <div class="form-group p-2">
                   <label for="address">Address:<sup style="font-size" class="text-danger">*</sup></label>
                   <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                </div>
                <div class="form-group p-2">
                   <label for="email">Email:<sup style="font-size" class="text-danger">*</sup></label>
                   <input type="email" class="form-control" name="email" placeholder="example@gmail.com">
                </div>
                <div class="form-group p-2">
                   <label for="mobile">Mobile/Phone:<sup style="font-size" class="text-danger">*</sup></label>
                   <input type="number"  class="form-control" name="mobile" placeholder="Your mobile or Land line number" required>
                </div>
                <div class="form-group p-2">
                  <label for="country">Country: <sup style="font-size" class="text-danger">*</sup></label>
                  <select name="country" class="form-control" id="country">
                    <option value="">-select-</option>
                    <option value="india">India</option>
                  </select>
                </div>

                <div class="form-group p-2">
                  <label for="country">State: <sup style="font-size" class="text-danger">*</sup></label>
                  <select name="state" class="form-control" id="state">
                    <option value="">-select-</option>
                    <option value="ap">Andhra Pradesh</option>
                    <option value="ts">Telangana</option>
                  </select>
                </div>
                <div class="form-group p-2">
                   <label for="query">Your Query:<sup style="font-size" class="text-danger">*</sup></label>
                   <textarea class="form-control" id="yourQuery" name="yourQuery" rows="3" required></textarea>
                   <input type="hidden" class="form-control" name="date">
                </div>
                <div class="form-group text-center" id="loadimg">
                   <img id="loading_img"  src="img/loading-gif.gif" alt="">
                </div>
                <div class="form-group text-center p-4">
                  <input type="submit" class="btn btn-primary" value="submit">
                </div>
                <div class="form-group">
                   <div class="result"></div>
                </div>
             </form>
          </div>
        </div>
      </div>

    <?php } ?>
   <!-- Contact Form End -->

   <div class="container-fluid">
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
<!-- Modal -->
<div class="modal fade" id="Login_admin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Admin Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="classes/handler.php?login" id="login_data" method="POST">
          <div class="form-group">
            <label for="email">Username</label>
            <input type="email" class="form-control" placeholder="example@gmail.com" name="username" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" placeholder="**********" name="password" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Login</button>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
<!-- Modal End -->
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
 <!-- Modal calibration success model -->
 <div class="modal" tabindex="-1" id="calibration_status_modal">
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
<!-- Modal calibration End -->
</body>
</html>