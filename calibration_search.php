<?php
date_default_timezone_set("Asia/kolkata");
include_once('./constants.php');
include_once('classes/main_class.php');
include('./css/phpqrcode/qrlib.php');
$database = new marsetech(HOST,USER,PASS,DB);
$calibration_year = date("Y")."-".(string)(((int)date("Y")) + 1) ;
$cer_no = $_GET['cer_no'];
$search_type = explode("-",$cer_no);
 
if($search_type[1] == "CAL" ){
  echo $database->search_cer('calibrations',["calibration_serial"=>$cer_no,"cal_year"=>$calibration_year],"and","CAL");
}elseif($search_type[1] == "TRAN"){
    echo $database->search_cer('training_certificate',["training_cer_no"=>$cer_no]," ","TRAN");
}elseif($search_type[1] == "AMC"){
    echo $database->search_cer('amc',["amc_cer_no"=>$cer_no]," ","AMC");
}



?>