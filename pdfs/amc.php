<?php
date_default_timezone_set("Asia/kolkata");   
include_once('../css/mpdf/fpdf.php');
$date = "Date : ".date('d/m/Y');
$certificate_no = $_GET['amc_cer_no'];
$ownername = $_GET['ownername'];
// $cer_date = $_GET['cer_date'];
$ownername = $_GET['ownername'];
$centername = $_GET['centername'];
$address1 = $_GET['address1'];
$address2 = $_GET['address2'];
$fueltype = $_GET['fueltype'];
$slno = $_GET['slno'];
$certificate_valid_date = $_GET['certificate_valid_date'];
$cer_date = $_GET['cer_date'];

 

$pdf = new FPDF();
$pdf->AddPage('P','A4'); 

//Header of Letter pad
$pdf->Image('../img/header.png',0,10,200,32);

// QR code image 
$pdf->Image('../img/qrcodes/'.$certificate_no.'.png',160,60);
// QR code image ends
// date
$pdf->SetFont('Times','I',12);
$pdf->SetY(53);
$pdf->SetX(110);
$pdf->Cell(78,8,$cer_date,0,1,'R');
// date end

// date
$pdf->SetFont('Times','BI',12);
$pdf->SetY(53);
$pdf->SetX(10);
$pdf->Cell(78,8,"Certificate No. ".$certificate_no,0,1,'L');
// date end
if($fueltype == "diesel"){
    // Heading
    $pdf->SetFont('Times','BI',12);
    $pdf->SetY(70);
    $pdf->SetX(60);
    $pdf->Cell(60,8,"AMC CERTIFICATE(".strtoupper("smokemeter").")",'BUI',1,'C');

    // Heading Ends
}elseif($fueltype == "petrol" || $fueltype == "both"){
   // Heading
   $pdf->SetFont('Times','BI',12);
   $pdf->SetY(70);
   $pdf->SetX(60);
   $pdf->Cell(60,8,"AMC CERTIFICATE(".strtoupper($fueltype).")",'BUI',1,'C');

   // Heading Ends
}

$pdf->SetFont('Times','I',12);
$pdf->SetY(90);
$pdf->SetX(10);
$pdf->Cell(80,8,"To,",0,1,'L');

$pdf->SetFont('Times','I',12);
$pdf->SetY(95);
$pdf->SetX(10);
$pdf->Cell(80,8,$ownername.",",0,1,'L');

$pdf->SetFont('Times','I',12);
$pdf->SetY(100);
$pdf->SetX(10);
$pdf->Cell(80,8,$centername.",",0,1,'L');

$pdf->SetFont('Times','I',12);
$pdf->SetY(105);
$pdf->SetX(10);
$pdf->Cell(80,8,$address1.",",0,1,'L');

$pdf->SetFont('Times','I',12);
$pdf->SetY(110);
$pdf->SetX(10);
$pdf->Cell(80,8,$address2.",",0,1,'L');

$pdf->SetFont('Times','I',12);
$pdf->SetY(125);
$pdf->SetX(10);
$pdf->Cell(80,8,"Dear Sir,",0,1,'L');
if($fueltype == "petrol"){
    $pdf->SetFont('Times','I',12);
    $pdf->SetY(135);
    $pdf->SetX(10);
    $pdf->Cell(80,8,"Subject :  AMC of MARS 4 Gas Analyser model MN-05.",0,1,'L');
}elseif($fueltype == "diesel"){
    $pdf->SetFont('Times','I',12);
    $pdf->SetY(135);
    $pdf->SetX(10);
    $pdf->Cell(80,8,"Subject : AMC of MARS Smokemeter model SM-05.",0,1,'L');
}else{
    $pdf->SetFont('Times','I',12);
    $pdf->SetY(135);
    $pdf->SetX(10);
    $pdf->Cell(80,8,"Subject : AMC of MARS Smokemeter model SM-05 and MARS 4 Gas Analyser model MN-05.",0,1,'L');
}
$device = null;
if($fueltype == "petrol"){
  $device = "MARS 4 Gas Analyser model MN-05";
  $slno = $slno;
}elseif($fueltype == "diesel"){
  $device = "MARS Smokemeter model SM-05";
  $slno = $slno;
}else{
  $device = "MARS Smokemeter model SM-05 and MARS 4 Gas Analyser model MN-05";
  $slno = "diesel-".explode("-",$slno)[0]." and petrol-".explode("-",$slno)[1];
}

$pdf->SetFont('Times','I',12);
$pdf->SetY(145);
$pdf->SetX(10);
$pdf->MultiCell(180,6,"This is to certify that the  ".$device." belonging to ".$ownername.", ".$centername.", ".$address1.", ".$address2." .with Serial No ".$slno."  is under AMC and  Warranty for one year until ".$certificate_valid_date." and has been included for Annual Maintenance Contract by us ".$cer_date.". The AMC lapses on ".$certificate_valid_date."",'0','L',false);

$pdf->SetFont('Times','I',12);
$pdf->SetY(185);
$pdf->SetX(10);
$pdf->Cell(80,8,"Thanking you,",0,1,'L');

$pdf->SetFont('Times','I',12);
$pdf->SetY(195);
$pdf->SetX(10);
$pdf->Cell(80,8,"Yours Faithfully,",0,1,'L');


$pdf->Image('../img/sig.png',10,215,80,38);
 
// $pdf->Output("D","training_".$date.".pdf",true);
$pdf->Output("D","amc".$date.".pdf",true);


?>