<?php
date_default_timezone_set("Asia/kolkata");   
include_once('../css/mpdf/fpdf.php');
$date = "Date : ".date('d/m/Y');

$pdf = new FPDF();
$pdf->AddPage('P','A4');

// date
$pdf->SetFont('Times','I',12);
$pdf->SetY(28);
$pdf->SetX(110);
$pdf->Cell(78,8,$date,0,1,'R');
// date end

// Heading
$pdf->SetFont('Times','BI',12);
$pdf->SetY(45);
$pdf->SetX(60);
$pdf->Cell(78,8,"AMC CERTIFICATE(PETROL)",'BUI',1,'C');
// Heading Ends



// $pdf->Output("D","training_".$date.".pdf",true);
$pdf->Output("I","training_".$date.".pdf",true);


?>