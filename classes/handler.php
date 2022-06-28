<?php
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
    // checking data exist or not before saving
     
    $result = $database->checkdate('calibrations',['mobile'=>$_POST['mobile'],'cal_year'=>$calibration_year,"machine_type"=>$_POST['machine_type']],"and");
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
    
}

// funcion for renew the calibration
if(isset($_GET['update_calibration'])){
 
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
  echo $database->edit_calibration("calibrations",$_POST,",",$id,$calibraton_serial); 
}


?>