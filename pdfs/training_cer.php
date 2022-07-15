<?php
date_default_timezone_set("Asia/kolkata");   
$pollution_center_name = " M/S. Eswaramma Pollution center";
$operator_name = "Mr.  S. Sanjeeva Naik";
$center_address = "Sy.No. 469/1A, Raptadu, Anantapur Dist, A.P";
$image = "../img/training_cer_img/kcr.jpg";
include_once('../css/mpdf/fpdf.php');
$date = date('dmYhis');
$pdf = new FPDF();
$pdf->AddPage('P','A4');

// Heading
$pdf->SetFont('Times','BI',18);
$pdf->SetY(28);
$pdf->SetX(60);
$pdf->Cell(78,8,"TRAINING CERTIFICATE",'BUI',1,'C');
// Heading Ends

// customer image 
$pdf->Image($image,135,40,30,38);
//customer image ends

// Text Body
$pdf->SetFont('Times','I',12);
$pdf->SetX(34);
$pdf->SetY(84);
$pdf->MultiCell(180,6,"This is to certify that the following persons of ".$pollution_center_name.", ".$center_address." . have  attended the training and knows all required operations of MARS Four  Gas Analyser model MN-05   and MARS Smokemeter model SM-05 to perform the PUC tests.",'0','L',false);

$pdf->SetFont('Times','BI',14);
$pdf->SetY(110);
$pdf->SetX(10);
$pdf->Cell(80,8,$operator_name,0,1,'L');

$pdf->SetFont('Times','I',12);
$pdf->SetY(118);
$pdf->SetX(10);
$pdf->Cell(80,8,"Understanding of procedure for testing of idling emission as per CMVR TAP 115/116 procedure.",0,1,'L');

$pdf->SetFont('Times','I',12);
$pdf->SetX(10);
$pdf->SetY(130);
$pdf->MultiCell(180,6,"1.   Normal thermal condition of the vehicle \n2.   Actual testing procedure \n3.   Procedural understanding of issue of PUC Certificate Operation of 4-Gas Analyser",'0','L',false);

$pdf->SetFont('Times','I',12);
$pdf->SetX(10);
$pdf->SetY(155);
$pdf->Cell(80,8,"1.Vehicle testing mode.",0,0,'L');

$pdf->SetFont('Times','BI',14);
$pdf->SetX(150);
$pdf->Cell(20,8,"YES",1,1,'C');


$pdf->SetFont('Times','I',12);
$pdf->SetX(10);
$pdf->SetY(165);
$pdf->Cell(80,8,"2. Zero Calibration",0,0,'L');

$pdf->SetFont('Times','BI',14);
$pdf->SetX(150);
$pdf->Cell(20,8,"YES",1,1,'C');


$pdf->SetFont('Times','I',12);
$pdf->SetX(10);
$pdf->SetY(175);
$pdf->Cell(80,8,"3. Span Calibration ",0,0,'L');

$pdf->SetFont('Times','BI',14);
$pdf->SetX(150);
$pdf->Cell(20,8,"YES",1,1,'C');


$pdf->SetFont('Times','I',12);
$pdf->SetX(10);
$pdf->SetY(185);
$pdf->Cell(80,8,"4.Electronic Calibration ",0,0,'L');

$pdf->SetFont('Times','BI',14);
$pdf->SetX(150);
$pdf->Cell(20,8,"YES",1,1,'C');

$pdf->SetFont('Times','I',12);
$pdf->SetX(10);
$pdf->SetY(195);
$pdf->Cell(80,8,"5.Leak Test ",0,0,'L');

$pdf->SetFont('Times','BI',14);
$pdf->SetX(150);
$pdf->Cell(20,8,"YES",1,1,'C');


$pdf->SetFont('Times','I',16);
$pdf->SetX(10);
$pdf->SetY(205);
$pdf->Cell(80,8,"Maintenance ",0,0,'L');



$pdf->SetFont('Times','I',12);
$pdf->SetX(10);
$pdf->SetY(215);
$pdf->Cell(80,8,"1. Replacement of Filters",0,0,'L');

$pdf->SetFont('Times','BI',14);
$pdf->SetX(150);
$pdf->Cell(20,8,"YES",1,1,'C');


$pdf->SetFont('Times','I',12);
$pdf->SetX(10);
$pdf->SetY(225);
$pdf->Cell(80,8,"2.General Maintenance",0,0,'L');

$pdf->SetFont('Times','BI',14);
$pdf->SetX(150);
$pdf->Cell(20,8,"YES",1,1,'C');
// text body end


$pdf->Image('../img/sig.png',10,245,80,38);
// $pdf->Output("D","training_".$date.".pdf",true);
$pdf->Output("I","training_".$date.".pdf",true);

?>