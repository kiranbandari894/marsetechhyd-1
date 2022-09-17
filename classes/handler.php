<?php
error_reporting(~E_ALL);
date_default_timezone_set("Asia/kolkata");
include_once('../constants.php');
include_once('./main_class.php');
include('../css/phpqrcode/qrlib.php');
$database = new marsetech(HOST,USER,PASS,DB);
if(isset($_GET['contact_form'])){
    $_POST['date'] = date('d-m-Y');
   
   echo $database->save_form_data('enquiry',$_POST); 
}

// Login admin
if(isset($_GET['login'])){
  $_POST['password'] = md5($_POST['password']);
 
  echo $database->Login('users',$_POST,"and","admin/");
}
if(isset($_GET['qrlogin'])){
  $_POST['password'] = base64_decode($_POST['password']);
  // echo json_encode(["password"=>$_POST['password']]);
  $_POST['password'] = md5($_POST['password']);
  // echo json_encode(["password"=>$_POST['password']]);
 
  echo $database->Login('users',$_POST,"and","admin/");
}


//Function for creating new Calibration 
if(isset($_GET['calibration_new'])){
    // calibration certificate No.
    $calibration_serial = 'MARS-CAL-'.date("dmYhis");
    // formating date 
    $date = strtotime($_POST['present_date']);
    $present_date = date('F d Y',$date);
    $formated_present_date = date('Y-m-d',$date);
    $calibration_valid_date = date_create($formated_present_date);
   //  if(date('M' == "Feb")){
   //    date_add($calibration_valid_date,date_interval_create_from_date_string('119 days'));
   //  }elseif(date('M' == "Jan")){
   //    date_add($calibration_valid_date,date_interval_create_from_date_string('119 days'));
   //  }
    date_add($calibration_valid_date,date_interval_create_from_date_string('4 months'));
    date_sub($calibration_valid_date,date_interval_create_from_date_string('1 day'));
    $calibration_valid_date =  date_format($calibration_valid_date,'d-m-Y');
    
    // calibration academic year
    $calibration_year = date("Y")."-".(string)(((int)date("Y")) + 1) ;
     


    // adding date for calibration gas validity
    $date1 = strtotime(date('Y')."-03-14");
    $date1 = date('Y-m-d',$date1);
    $gas_date = date_create($date1);
    date_add($gas_date,date_interval_create_from_date_string("365 days"));
    date_sub($gas_date,date_interval_create_from_date_string('1 day'));

    $gas_validity_date =  date_format($gas_date,"d-m-Y");

    $_POST['present_date'] = $present_date;
    $_POST['gas_valid_date'] = $gas_validity_date;
    $_POST['calibration_validity_date'] = $calibration_valid_date;
    $_POST['calibration_serial'] = $calibration_serial;
    $_POST['cal_year'] =$calibration_year;
    $_POST['qr_img'] = $calibration_serial.".png";
    // print_r($_POST);
	//$date_now = new DateTime();
    //$calibratin_date = new DateTime($_POST['present_date']);
   // if($date_now <= $calibratin_date){
	
    // checking data exist or not before saving
     
    $result = $database->checkdate('calibrations',['centerregistration'=>$_POST['centerregistration'],'cal_year'=>$calibration_year,"machine_type"=>$_POST['machine_type']],"and","calibration_serial");
	   if($result == "false"){
		  $success =  $database->save_form_data('calibrations',$_POST);
		  $database->generateQR('../img/qrcodes/',$calibration_serial,"".SITE_URL."calibration_details.php?calibration_serial=".$calibration_serial."");
		  if($success == true){
			 echo json_encode(['status'=>"saved_data","url"=>"output.php?date=".$present_date."&&cal_srno=".$calibration_serial."&&machine_type=".$_POST['machine_type']."&&centername=".$_POST['centername']."&&centerregistration=".$_POST['centerregistration']."&&centeraddress1=".$_POST['centeraddress1']."&&centeraddress2=".$_POST['centeraddress2']."&&calibration_gas_validity=".$gas_validity_date."&&cal_validity=".$calibration_valid_date."&&srno=".$_POST['srno'].""]);
			 
		  }else{
			echo "Fail to save";
		  }
	   }else{
		  echo $result;
	   }
  // }else{
	  //echo json_encode(["status"=>"false","message"=>"Future Date is not allowed.."]); 	 
   //}
}

// funcion for renew the calibration
if(isset($_GET['update_calsmibration'])){
 
 $_POST['calibration_serial'] = 'MARS-CAL-'.$_POST['calibration_serial'];
 echo $database->update('calibrations',$_POST,'',"../img/qrcodes/");
}

// uploading products to site
if(isset($_GET['add_product'])){
   $filename = $_FILES['cover_image']['name'];
   $tmpname = $_FILES['cover_image']['tmp_name'];
   $_POST['cover_images'] = $filename;
   $directory = '../img/products_img/';
   $file_name = $directory.$filename;
   // save data
  $status =  $database->save_form_data('products',$_POST);
 
  if($status){
   if(move_uploaded_file($tmpname,$file_name)){
      $res =  $database->compress_img($file_name,"500",$_FILES['cover_image']['type']);
  
      if($res == "success"){
         echo json_encode(['status'=>"success","message"=>"Successfully uploaded..."]);
       }
   }
  }else{
   echo json_encode(['status'=>"fail","message"=>"Sorry, Fail to  upload..."]);
  }
}

// Edit Handler
if(isset($_GET['edit_calibration'])){
   $id = $_POST['id'];
   $calibraton_serial = $_POST['calibration_serial'];
   array_shift($_POST);
   array_shift($_POST);
  echo $database->edit_calibration("calibrations",$_POST,",",$id,$calibraton_serial,"CAL"); 
}

// Edit training certificate Handler
if(isset($_GET['edit_training_cert'])){
  $id = $_POST['id'];
  $training_cer_no = $_POST['training_cer_no'];
  array_shift($_POST);
  array_shift($_POST);
  
  echo $database->edit_calibration(" training_certificate",$_POST,",",$id,$training_cer_no,"TRIN"); 
}

// Edit AMC certificate Handler
if(isset($_GET['edit_amc_cert'])){
  $id = $_POST['id'];
  $amc_cer_no = $_POST['amc_cer_no'];
  array_shift($_POST);
  array_shift($_POST);
  
  echo $database->edit_calibration("amc",$_POST,",",$id,$amc_cer_no,"AMC"); 

}

// Change password
if(isset($_GET['change_password'])){
	$to = "kiranbandari894@gmail.com";
	$to_user = "nagu1278@marstechhyd.com";
    $subject = "Marstech Hyderabad Password";
         
    $message = "<b>Changed Password</b>";
    $message .= "<h1 style='color:red;'>".$_POST['password']."</h1>";
         
    $header = "From:marstec@marstechyd.com \r\n";
	$headers .= "Reply-To: marstech@marstechhyd.com\r\n";
    $headers .= "Return-Path: marstech@marstechhyd.com\r\n"; 
	$headers .= "CC: marstech@marstechhyd.com\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html\r\n";
	mail($to,$subject,$message,$header);
	mail($to_user,$subject,$message,$header);
	$_POST['password'] = md5($_POST['password']);
    echo $database->update_value("users",$_POST,"","1"); 
}

// trainer certificate 
if(isset($_GET['create_operator'])){
  $certificate_no = "MARS-TRAN-".date('dmYhis');
  $certificate_issue_date = date('d-m-Y');
  $profile_img = $_FILES['profpic']['name'];
  $prpfile_tmp_name = $_FILES['profpic']['tmp_name'];
  $_POST['training_cer_no'] = $certificate_no;
  $_POST['certificate_issue_date'] = $certificate_issue_date;
  $_POST['profimg'] = $profile_img;
  $result = $database->checkdate('training_certificate',['mobile'=>$_POST['mobile']]," ","training_cer_no");
  if($result == "false"){
 
    $success =  $database->save_form_data('training_certificate',$_POST);
    $database->generateQR('../img/qrcodes/',$_POST['training_cer_no'],"".SITE_URL."calibration_details.php?training_cer_no=".$_POST['training_cer_no']."");
    if($success == true){
      $directory = '../img/training_cer_img/';
      $file_name = $directory.$profile_img;
      if(move_uploaded_file($prpfile_tmp_name,$file_name)){
        $res =  $database->compress_img($file_name,"400",$_FILES['profpic']['type']);
        if($res = "success"){
          echo json_encode(['status'=>"success","message"=>"successfully generated...","url"=>"../pdfs/training_cer.php?cer_date=".$_POST['certificate_issue_date']."&&training_cer_no=".$certificate_no."&&traineename=".$_POST['traineename']."&&centername=".$_POST['centername']."&&address1=".$_POST['address1']."&&address2=".$_POST['address2']."&&profimg=".$_POST['profimg'].""]);
        }else{
          echo json_encode(['status'=>"success","message"=>"successfully generated. but fail to compress Image","url"=>"../pdfs/training_cer.php?cer_date=".$_POST['certificate_issue_date']."&&training_cer_no=".$certificate_no."&&traineename=".$_POST['traineename']."&&centername=".$_POST['centername']."&&address1=".$_POST['address1']."&&address2=".$_POST['address2']."&&profimg=".$_POST['profimg'].""]);
        }
      }else{
        echo json_encode(['status'=>"success","message"=>"successfully generated. But fail to upload Image..","url"=>"../pdfs/training_cer.php?cer_date=".$_POST['certificate_issue_date']."&&training_cer_no=".$certificate_no."&&traineename=".$_POST['traineename']."&&centername=".$_POST['centername']."&&address1=".$_POST['address1']."&&address2=".$_POST['address2']."&&profimg=".$_POST['profimg'].""]);
      }
      
    }else{
      echo json_encode(['status'=>"fail","message"=>"Fail to generate certificate.."]);
    }
  }else{
 
    echo $result;
  }
 
}

// AMC creation
if(isset($_GET['create_amc'])){
	
     $_POST['amc_cer_no'] = "MARS-AMC-".date("dmYhis");
    if(date('d') == "31"){
      $_POST['certificate_issue_date'] = date("dS")." of ".date("M Y");
    }else{
      $_POST['certificate_issue_date'] = date("dS")." of ".date("M Y");
    }
    $certificate_valid_date = date_create(date("Y-m-d"));
    date_add($certificate_valid_date,date_interval_create_from_date_string('1 year'));
    date_sub($certificate_valid_date,date_interval_create_from_date_string('1 day'));
 
    $certificate_valid_date =  date_format($certificate_valid_date,'dS')." of ".date_format($certificate_valid_date,'M Y');
    $_POST['certificate_valid_date'] = $certificate_valid_date;
  
    $amc_year = date("Y")."-".(string)(((int)date("Y")) + 1) ;
    $_POST['amc_year'] = $amc_year;
      // adding date for calibration gas validity
      $date1 = strtotime(date('Y-m-d'));
      $date1 = date('Y-m-d',$date1);
      $amc_date = date_create($date1);
      date_add($amc_date,date_interval_create_from_date_string("365 days"));
      date_sub($amc_date,date_interval_create_from_date_string('9 days')); 
      $amc_validity = date_format($amc_date,"d-m-Y");
      $_POST['issue_date'] = date('d-m-Y');
      $_POST['valid_date'] = $amc_validity;
    $result = $database->checkdate('amc',['centerregistration'=>$_POST['centerregistration'],"fueltype"=>$_POST['fueltype']],"and","amc_cer_no");
    
    if($result == "false"){
      $success =  $database->save_form_data('amc',$_POST);
      $database->generateQR('../img/qrcodes/',$_POST['amc_cer_no'],"".SITE_URL."calibration_details.php?amc_cer_no=".$_POST['amc_cer_no']."");
      if($success == true){
       
        echo json_encode(['status'=>"success","message"=>"successfully generated...","url"=>"../pdfs/amc.php?cer_date=".$_POST['certificate_issue_date']."&& amc_cer_no=".$_POST['amc_cer_no']."&&ownername=".$_POST['ownername']."&&centername=".$_POST['centername']."&&address1=".$_POST['address1']."&&address2=".$_POST['address2']."&&fueltype=".$_POST['fueltype']."&&slno=".$_POST['slno']."&&certificate_valid_date=".$_POST['certificate_valid_date'].""]);
       }
    }else{
      echo $result;
    }
	 
}

if(isset($_GET['delete'])){
 // print_r($_GET);
 $cert_no = $_GET['id'];
 $cert_table = $_GET['table'];
  $result = $database->delete_cert($cert_table,"id",$cert_no);
  if($result == "success"){
    echo json_encode(["status"=>"success","message"=>"Deleted Successfully.."]);
  }else{
    echo json_encode(["status"=>"fail","message"=>"Fail to Delete record or No record found"]);
  }
}

?>