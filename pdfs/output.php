<?php
include_once('../css/mpdf/fpdf.php');
// class PDF extends FPDF{
//     function Header(){
//         $this->
//     }
// }
$pdf = new FPDF();
$pdf->AddPage('P','A4');
//Header of Letter pad
$pdf->Image('../img/pdf_logo.jpg',10,10,20,20);

$pdf->SetFont('Arial','B',22);
$pdf->SetMargins(100,0,0);
$pdf->Cell(195,10,"MARS Technologies Inc.",0,1,'C');

$pdf->SetFont('Arial','',11);
$pdf->SetX(10);
$pdf->Cell(195,8,"#16-11-5411/B/370,Flat.No.301,Upendradevi Nilayam,Shalivahannagar,Moosarambagh,",0,1,'C');

$pdf->SetFont('Arial','',11);
$pdf->SetX(10);
$pdf->Cell(195,8,"Hyderabad,Telangana. Phone: +91 8055537775    Email: marsmn05@gmail.com",'B',1,'C');
//Header of Letter pad End
// QR code image 
$pdf->Image('../img/qrcodes/test.png',160,45);
// QR code image ends

// heading of calibration
$pdf->SetFont('Arial','BI',13);
$pdf->SetY(70);
$pdf->SetX(70);

$pdf->Cell(65,8,"CALIBRATION CERTIFICATE",'B',1,'C');
// heading of calibration end

$pdf->SetFont('Arial','',11);
$pdf->SetX(18);
$pdf->Cell(195,8,"Date: 18 June 2022",0,1,'L');


// table start frome here 

// ********* First Row ****************
$pdf->SetFont('Arial','B',11);
$pdf->SetX(18);
$pdf->Cell(16,18,"1.0",'LRTB',0,'L');

$pdf->SetFont('Arial','B',11);
$pdf->SetX(34);
$pdf->MultiCell(145,6,"  Components :        FOUR GAS ANALYSER\n  PUC equipment model :        MARS MN-05\n  Sr.No :        074",'LRTB','L',false);
 
// ********* First Row Ends ****************
// ********* Second Row  ****************
$pdf->SetFont('Arial','B',11);
$pdf->SetX(18);
$pdf->Cell(16,18,"2.0",'LRTB',0,'L');

$pdf->SetFont('Arial','',11);
$pdf->SetX(34);
$pdf->MultiCell(145,6,"  PUC Center Registration No : --- \n  PUC Center Name :       MS Lakshmi Narasimha Pollution Testing Center,\n                                         Kadiri,Andhrapradesh",'LRTB','L',false);
 
// ********* Second  Row End  ****************
// ********* Third  Row  ****************
$pdf->SetFont('Arial','B',11);
$pdf->SetX(18);
$pdf->Cell(16,18,"3.0",'LRTB',0,'L');

$pdf->SetFont('Arial','',11);
$pdf->SetX(34);
$pdf->MultiCell(145,6," Objective of the test:  To carry out physical check and calibration of Four Gas\n Analyser as per the test procedure specified in Annexure of CMVR TAP 115-116\n Part-8",'LRTB','L',false);
 
// ********* Third Row End  ****************

// ********* Fourth Row 4.0 ****************
$pdf->SetFont('Arial','B',11);
$pdf->SetX(18);
$pdf->Cell(16,7,"4.0",'LRT',0,'L');

$pdf->SetFont('Arial','',11);
$pdf->SetX(34);
$pdf->MultiCell(145,6,"  Detailed Observation",'LRT','L',false);
 
// ********* Fourth Row End 4.0 ****************


// ********* Fourth Row 4.1 ****************
$pdf->SetFont('Arial','B',11);
$pdf->SetX(18);
$pdf->Cell(16,6,"4.1",'LR',0,'L');

$pdf->SetFont('Arial','',11);
$pdf->SetX(34);
$pdf->MultiCell(145,6," Checking of supply / earthing   :   OK ",'LR','L',false);
 
// ********* Fourth Row End 4.1 ****************

// ********* Fourth Row 4.2 ****************
$pdf->SetFont('Arial','B',11);
$pdf->SetX(18);
$pdf->Cell(16,8,"4.2",'LRB',0,'L');

$pdf->SetFont('Arial','',11);
$pdf->SetX(34);
$pdf->MultiCell(145,8," Checking of Accessories  :    OK ",'LRB','L',false);
 
// ********* Fourth Row End 4.2  ****************

// ********* Fifth  Row  ****************
$pdf->SetFont('Arial','B',11);
$pdf->SetX(18);
$pdf->Cell(16,54,"4.3",'LRTB',0,'L');

$pdf->SetFont('Arial','',11);
$pdf->SetX(34);
$pdf->MultiCell(145,6," Span Calibration\n 1.Details of span gas concentration : CO-3.04%,HC-3603 PPM Propane\n                                                            Oxygen- 0.43%,CO2-12.63%\n                                                            Nitrogen Balanced\n 2.Calibration gas cylinder No            :  147102\n 3.Calibraton Gas cylinder            :   CHEMIX GASES\n 4.Calibration gas validity date            :  05-12-2022\n OR\n 5.Details of Natural Density filters mid point calibrator : NA",'LRTB','L',false);
 
// ********* Fifth Row End  ****************
// ********* sixth  Row  ****************
$pdf->SetFont('Arial','B',11);
$pdf->SetX(18);
$pdf->Cell(16,6,"4.4",'LRTB',0,'L');

$pdf->SetFont('Arial','B',11);
$pdf->SetX(34);
$pdf->MultiCell(145,6,"Electrical Calibration   : O.K",'LRTB','L',false);
 
// ********* sixth Row End  ****************
// ********* seventh  Row  ****************
$pdf->SetFont('Arial','B',11);
$pdf->SetX(18);
$pdf->Cell(16,6,"4.5",'LRTB',0,'L');

$pdf->SetFont('Arial','B',11);
$pdf->SetX(34);
$pdf->MultiCell(145,6,"Leak Test   : Passed",'LRTB','L',false);
 
// ********* seventh Row End  ****************
// ********* Eith  Row  ****************
$pdf->SetFont('Arial','B',11);
$pdf->SetX(18);
$pdf->Cell(16,6,"5.0",'LRTB',0,'L');

$pdf->SetFont('Arial','B',11);
$pdf->SetX(34);
$pdf->MultiCell(145,6,"One no.of petrol checked for idling Emission.",'LRTB','L',false);
 
// ********* Eith Row End  ****************
// ********* ninth  Row  ****************
$pdf->SetFont('Arial','B',11);
$pdf->SetX(18);
$pdf->Cell(16,6,"6.0",'LRTB',0,'L');

$pdf->SetFont('Arial','B',11);
$pdf->SetX(34);
$pdf->MultiCell(145,6,"Conclusion : Four Gas Analyser working satisfactorily.",'LRTB','L',false);
 
// ********* Ninth Row End  ****************
// *********Tenth  Row  ****************
$pdf->SetFont('Arial','B',11);
$pdf->SetX(18);
$pdf->Cell(16,6,"7.0",'LRTB',0,'L');

$pdf->SetFont('Arial','B',11);
$pdf->SetX(34);
$pdf->MultiCell(145,6,"Next calibration Due Date :  12/02/2023",'LRTB','L',false);
 
// ********* Tenth Row End  ****************
$pdf->SetFont('Arial','B',10);
$pdf->SetX(18);
$pdf->Cell(16,10,"For MARS Technologies Inc.",0,0,'L');

$pdf->SetFont('Arial','B',10);
$pdf->SetY(264);
$pdf->SetX(18);
$pdf->Cell(16,10,"AUTHORISED SIGNATORY",0,0,'L');
// table ends here

$pdf->Output("I");

?>