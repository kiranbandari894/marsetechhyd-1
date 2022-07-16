<?php
date_default_timezone_set("Asia/kolkata");   
$date = $_GET['cer_date'];
$pollution_center_name = $_GET['centername'];
$certificate_no = $_GET['training_cer_no'];
$operator_name = $_GET['traineename'];
$center_address = $_GET['address1']." ".$_GET['address2'];
$image = "../img/training_cer_img/".$_GET['profimg'];
include_once('../css/mpdf/fpdf.php');



 
$pdf = new FPDF();
$pdf->AddPage('P','A4');
//Header of Letter pad
$pdf->Image('../img/header.png',0,10,200,32);

// QR code image 
$pdf->Image('../img/qrcodes/'.$certificate_no.'.png',150,245);
// QR code image end
// date
$pdf->SetFont('Times','BI',12);
$pdf->SetY(45);
$pdf->SetX(120);
$pdf->Cell(78,8,"Date: ".$date,0,1,'R');
// date emds
// certificat number
$pdf->SetFont('Times','BI',12);
$pdf->SetY(68);
$pdf->SetX(18);
$pdf->Cell(78,8,"Certificate No: ".$certificate_no,0,1,'R');
// Certificate number

// Heading
$pdf->SetFont('Times','BI',18);
$pdf->SetY(45);
$pdf->SetX(60);
$pdf->Cell(78,8,"TRAINING CERTIFICATE",'BUI',1,'C');
// Heading Ends

// customer image 
$pdf->Image($image,135,55,30,38);
//customer image ends

// Text Body
$pdf->SetFont('Times','I',12);
$pdf->SetX(34);
$pdf->SetY(94);
$pdf->MultiCell(180,6,"This is to certify that the following persons of  ".$pollution_center_name.", ".$center_address." . have  attended the training and knows all required operations of MARS Four  Gas Analyser model MN-05   and MARS Smokemeter model SM-05 to perform the PUC tests.",'0','L',false);

$pdf->SetFont('Times','BI',14);
$pdf->SetY(120);
$pdf->SetX(10);
$pdf->Cell(80,8,$operator_name,0,1,'L');

$pdf->SetFont('Times','I',12);
$pdf->SetY(128);
$pdf->SetX(10);
$pdf->Cell(80,8,"Understanding of procedure for testing of idling emission as per CMVR TAP 115/116 procedure.",0,1,'L');

$pdf->SetFont('Times','I',12);
$pdf->SetX(10);
$pdf->SetY(140);
$pdf->MultiCell(180,6,"1.   Normal thermal condition of the vehicle \n2.   Actual testing procedure \n3.   Procedural understanding of issue of PUC Certificate Operation of 4-Gas Analyser",'0','L',false);

$pdf->SetFont('Times','I',12);
$pdf->SetX(10);
$pdf->SetY(165);
$pdf->Cell(80,8,"1.Vehicle testing mode.",0,0,'L');

$pdf->SetFont('Times','BI',14);
$pdf->SetX(150);
$pdf->Cell(20,8,"YES",1,1,'C');


$pdf->SetFont('Times','I',12);
$pdf->SetX(10);
$pdf->SetY(175);
$pdf->Cell(80,8,"2. Zero Calibration",0,0,'L');

$pdf->SetFont('Times','BI',14);
$pdf->SetX(150);
$pdf->Cell(20,8,"YES",1,1,'C');


$pdf->SetFont('Times','I',12);
$pdf->SetX(10);
$pdf->SetY(185);
$pdf->Cell(80,8,"3. Span Calibration ",0,0,'L');

$pdf->SetFont('Times','BI',14);
$pdf->SetX(150);
$pdf->Cell(20,8,"YES",1,1,'C');


$pdf->SetFont('Times','I',12);
$pdf->SetX(10);
$pdf->SetY(195);
$pdf->Cell(80,8,"4.Electronic Calibration ",0,0,'L');

$pdf->SetFont('Times','BI',14);
$pdf->SetX(150);
$pdf->Cell(20,8,"YES",1,1,'C');

$pdf->SetFont('Times','I',12);
$pdf->SetX(10);
$pdf->SetY(205);
$pdf->Cell(80,8,"5.Leak Test ",0,0,'L');

$pdf->SetFont('Times','BI',14);
$pdf->SetX(150);
$pdf->Cell(20,8,"YES",1,1,'C');


$pdf->SetFont('Times','I',16);
$pdf->SetX(10);
$pdf->SetY(215);
$pdf->Cell(80,8,"Maintenance ",0,0,'L');



$pdf->SetFont('Times','I',12);
$pdf->SetX(10);
$pdf->SetY(225);
$pdf->Cell(80,8,"1. Replacement of Filters",0,0,'L');

$pdf->SetFont('Times','BI',14);
$pdf->SetX(150);
$pdf->Cell(20,8,"YES",1,1,'C');


$pdf->SetFont('Times','I',12);
$pdf->SetX(10);
$pdf->SetY(235);
$pdf->Cell(80,8,"2.General Maintenance",0,0,'L');

$pdf->SetFont('Times','BI',14);
$pdf->SetX(150);
$pdf->Cell(20,8,"YES",1,1,'C');
// text body end


$pdf->Image('../img/sig.png',10,245,80,38);
// $pdf->Output("D","training_".$date.".pdf",true);
$pdf->Output("D","training_".$operator_name.".pdf",true);

?>