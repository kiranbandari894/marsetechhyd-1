<?php
date_default_timezone_set("Asia/kolkata");
include_once('./constants.php');
include_once('classes/main_class.php');
include('./css/phpqrcode/qrlib.php');
$database = new marsetech(HOST,USER,PASS,DB);
$calibration_year = date("Y")."-".(string)(((int)date("Y")) + 1) ;
$cer_no = "MARS-CAL-".$_GET['cer_no'];

echo $database->search_cer('calibrations',["calibration_serial"=>$cer_no,"cal_year"=>$calibration_year],"and");

?>