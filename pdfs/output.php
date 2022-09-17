<?php
// echo $_GET['cal_srno'];
$date = $_GET['date'];
$srno = $_GET['srno'];
$image = $_GET['cal_srno'];
$certificateno = $_GET['cal_srno'];
$type = $_GET['machine_type'];
$centername = $_GET['centername'];
$centeraddress1 = $_GET['centeraddress1'];
$centeraddress2 = $_GET['centeraddress2'];
$calibration_gas_validity = $_GET['calibration_gas_validity'];
$center_registration = $_GET['centerregistration'];
$cal_validity = $_GET['cal_validity'];
include_once('../css/mpdf/fpdf.php');


$pdf = new FPDF();
$pdf->AddPage('P','A4');
//Header of Letter pad
$pdf->Image('../img/header.png',0,10,200,32);

// $pdf->SetFont('Arial','BI',18);
// $pdf->SetMargins(100,0,0);
// $pdf->SetX(35);
// $pdf->Cell(195,8,"MARS Technologies Inc.",0,1,'L');

// $pdf->SetFont('Arial','',10);
// $pdf->SetX(10);
// $pdf->Cell(195,8,"#16-11-5411/B/370,Flat.No.301,Upendradevi Nilayam,Shalivahannagar,Moosarambagh,",0,1,'C');

// $pdf->SetFont('Arial','',10);
// $pdf->SetX(10);
// $pdf->Cell(195,8,"Hyderabad,Telangana. Phone: +91 8055537775,040-35882547 Email: nagu1278@gmail.com",'B',1,'C');
//Header of Letter pad End

if($type == "diesel"){
  
// QR code image 
$pdf->Image('../img/qrcodes/'.$image.'.png',160,45);
// QR code image ends

// heading of calibration
$pdf->SetFont('Times','BI',13);
$pdf->SetY(70);
$pdf->SetX(60);

$pdf->Cell(80,8,"DIESEL CALIBRATION CERTIFICATE",'B',1,'C');
// heading of calibration end

$pdf->SetFont('Times','BI',11);
$pdf->SetX(18);
$pdf->Cell(50,8,"Date:".$date."",0,0,'L');

$pdf->SetFont('Times','BI',11);
$pdf->SetX(80);
$pdf->Cell(100,8,"Certificate No. ".$certificateno."",0,1,'R');


// table start frome here 

// ********* First Row ****************
$pdf->SetFont('Times','BI',11);
$pdf->SetX(18);
$pdf->Cell(16,18,"1.0",'LRTB',0,'L');

$pdf->SetFont('Times','BI',11);
$pdf->SetX(34);
$pdf->MultiCell(145,6,"  Components :        SMOKE METER\n  PUC equipment model :        MARS SM-05\n  Sr.No :        ".$srno."",'LRTB','L',false);
 
// ********* First Row Ends ****************
// ********* Second Row  ****************
$pdf->SetFont('Times','BI',11);
$pdf->SetX(18);
$pdf->Cell(16,24,"2.0",'LRTB',0,'L');

$pdf->SetFont('Times','',11);
$pdf->SetX(34);
$pdf->MultiCell(145,6,"  PUC Center Registration No : ".$center_registration."\n  PUC Center Name :       ".$centername.",\n                                         ".$centeraddress1.",\n                                         ".$centeraddress2."",'LRTB','L',false);
 
// ********* Second  Row End  ****************
// ********* Third  Row  ****************
$pdf->SetFont('Times','BI',11);
$pdf->SetX(18);
$pdf->Cell(16,18,"3.0",'LRTB',0,'L');

$pdf->SetFont('Times','',11);
$pdf->SetX(34);
$pdf->MultiCell(145,6," Objective of the test:  To carry out physical check and calibration of Four Gas\n Analyser as per the test procedure specified in Annexure of CMVR TAP 115-116\n Part-8",'LRTB','L',false);
 
// ********* Third Row End  ****************

// ********* Fourth Row 4.0 ****************
$pdf->SetFont('Times','BI',11);
$pdf->SetX(18);
$pdf->Cell(16,7,"4.0",'LRT',0,'L');

$pdf->SetFont('Times','BI',11);
$pdf->SetX(34);
$pdf->MultiCell(145,6,"  Detailed Observation",'LRT','L',false);
 
// ********* Fourth Row End 4.0 ****************


// ********* Fourth Row 4.1 ****************
$pdf->SetFont('Times','BI',11);
$pdf->SetX(18);
$pdf->Cell(16,6,"4.1",'LR',0,'L');

$pdf->SetFont('Times','BI',11);
$pdf->SetX(34);
$pdf->MultiCell(145,6," Checking of supply / earthing   :   OK ",'LR','L',false);
 
// ********* Fourth Row End 4.1 ****************

// ********* Fourth Row 4.2 ****************
$pdf->SetFont('Times','BI',11);
$pdf->SetX(18);
$pdf->Cell(16,8,"4.2",'LRB',0,'L');

$pdf->SetFont('Times','BI',11);
$pdf->SetX(34);
$pdf->MultiCell(145,8," Checking of Accessories  :    OK ",'LRB','L',false);
 
// ********* Fourth Row End 4.2  ****************

// ********* Fifth  Row  ****************
$pdf->SetFont('Times','BI',11);
$pdf->SetX(18);
$pdf->Cell(16,6,"4.3",'LRTB',0,'L');

$pdf->SetFont('Times','BI',11);
$pdf->SetX(34);
$pdf->MultiCell(145,6," Calibration Details",'LRTB','L',false);
 
// ********* Fifth Row End  ****************
// ********* sixth  Row  ****************
$pdf->SetFont('Times','BI',11);
$pdf->SetX(18);
$pdf->Cell(16,6,"4.4",'LRTB',0,'L');

$pdf->SetFont('Times','BI',11);
$pdf->SetX(34);
$pdf->MultiCell(145,6," Description  : Natural Density Calibration Filer",'LRTB','L',false);
 
// ********* sixth Row End  ****************
// ********* seventh  Row  ****************
$pdf->SetFont('Times','BI',11);
$pdf->SetX(18);
$pdf->Cell(16,6,"4.5",'LRTB',0,'L');

$pdf->SetFont('Times','BI',11);
$pdf->SetX(34);
$pdf->MultiCell(145,6,"                                        Filer(k) Value                 Instrument (k) Value",'LRTB','L',false);
 
// ********* seventh Row End  ****************

// ********* Eigth  Row  ****************
$pdf->SetFont('Times','BI',11);
$pdf->SetX(18);
$pdf->Cell(16,6,"5.0",'LRTB',0,'L');

$pdf->SetFont('Times','BI',11);
$pdf->SetX(34);
$pdf->MultiCell(145,6,"                                                2.70 m-l                      2.70 m-l",'LRTB','L',false);
 
// ********* Eigth Row End  ****************
// ********* Ninth  Row  ****************
$pdf->SetFont('Times','BI',11);
$pdf->SetX(18);
$pdf->Cell(16,6,"6.0",'LRTB',0,'L');

$pdf->SetFont('Times','BI',11);
$pdf->SetX(34);
$pdf->MultiCell(145,6," Result                                     O.K                    O.K",'LRTB','L',false);
 
// ********* Ninth Row End  ****************
// ********* Ninth  Row  ****************
$pdf->SetFont('Times','BI',11);
$pdf->SetX(18);
$pdf->Cell(16,6,"",'LRTB',0,'L');

$pdf->SetFont('Times','BI',11);
$pdf->SetX(34);
$pdf->MultiCell(145,6," Electrical Calibration            O.K",'LRTB','L',false);
 
// ********* Ninth Row End  ****************
// *********Tenth  Row  ****************
$pdf->SetFont('Times','BI',11);
$pdf->SetX(18);
$pdf->Cell(16,6,"7.0",'LRTB',0,'L');

$pdf->SetFont('Times','BI',11);
$pdf->SetX(34);
$pdf->MultiCell(145,6,"Leak Test : NA",'LRTB','L',false);
 
// ********* Tenth Row End  ****************
// ********* Eleventh  Row  ****************
$pdf->SetFont('Times','BI',11);
$pdf->SetX(18);
$pdf->Cell(16,6,"",'LRTB',0,'L');

$pdf->SetFont('Times','BI',11);
$pdf->SetX(34);
$pdf->MultiCell(145,6,"One no.of Diesel vehicle is checked for free acceleration test.",'LRTB','L',false);
 
// ********* Eleventh Row End  ****************
// ********* ninth  Row  ****************
$pdf->SetFont('Times','BI',11);
$pdf->SetX(18);
$pdf->Cell(16,6,"",'LRTB',0,'L');

$pdf->SetFont('Times','BI',11);
$pdf->SetX(34);
$pdf->MultiCell(145,6,"Conclusion : Smoke Meter is working satisfactorily.",'LRTB','L',false);
 
// ********* Ninth Row End  ****************
// *********Tenth  Row  ****************
$pdf->SetFont('Times','BI',11);
$pdf->SetX(18);
$pdf->Cell(16,6,"8.0",'LRTB',0,'L');

$pdf->SetFont('Times','BI',11);
$pdf->SetX(34);
$pdf->MultiCell(145,6,"Next calibration Due Date :  ".$cal_validity."",'LRTB','L',false);
 
// ********* Tenth Row End  ****************
$pdf->Image('../img/sig.png',10,251,80,38);
// $pdf->SetFont('Times','BI',10);
// $pdf->SetX(18);
// $pdf->Cell(16,10,"For MARS Technologies Inc.",0,0,'L');

// $pdf->SetFont('Times','BI',10);
// $pdf->SetY(264);
// $pdf->SetX(18);
// $pdf->Cell(16,10,"AUTHORISED SIGNATORY",0,0,'L');

}else{

// QR code image 
$pdf->Image('../img/qrcodes/'.$image.'.png',160,45);
// QR code image ends

// heading of calibration
$pdf->SetFont('Times','BI',13);
$pdf->SetY(70);
$pdf->SetX(60);

$pdf->Cell(65,8,"CALIBRATION CERTIFICATE",'B',1,'C');
// heading of calibration end

$pdf->SetFont('Times','BI',11);
$pdf->SetX(18);
$pdf->Cell(50,8,"Date:".$date."",0,0,'L');

$pdf->SetFont('Times','BI',11);
$pdf->SetX(80);
$pdf->Cell(100,8,"Certificate No. ".$certificateno."",0,1,'R');


// table start frome here 

// ********* First Row ****************
$pdf->SetFont('Times','BI',11);
$pdf->SetX(18);
$pdf->Cell(16,18,"1.0",'LRTB',0,'L');

$pdf->SetFont('Times','BI',11);
$pdf->SetX(34);
$pdf->MultiCell(145,6,"  Components :        FOUR GAS ANALYSER\n  PUC equipment model :        MARS MN-05\n  Sr.No :        ".$srno."",'LRTB','L',false);
 
// ********* First Row Ends ****************
// ********* Second Row  ****************
$pdf->SetFont('Times','BI',11);
$pdf->SetX(18);
$pdf->Cell(16,24,"2.0",'LRTB',0,'L');

$pdf->SetFont('Times','',11);
$pdf->SetX(34);
$pdf->MultiCell(145,6,"  PUC Center Registration No : ".$center_registration." \n  PUC Center Name :       ".$centername.",\n                                         ".$centeraddress1.",\n                                         ".$centeraddress2."",'LRTB','L',false);
 
// ********* Second  Row End  ****************
// ********* Third  Row  ****************
$pdf->SetFont('Times','BI',11);
$pdf->SetX(18);
$pdf->Cell(16,18,"3.0",'LRTB',0,'L');

$pdf->SetFont('Times','',11);
$pdf->SetX(34);
$pdf->MultiCell(145,6," Objective of the test:  To carry out physical check and calibration of Four Gas\n Analyser as per the test procedure specified in Annexure of CMVR TAP 115-116\n Part-8",'LRTB','L',false);
 
// ********* Third Row End  ****************

// ********* Fourth Row 4.0 ****************
$pdf->SetFont('Times','BI',11);
$pdf->SetX(18);
$pdf->Cell(16,7,"4.0",'LRT',0,'L');

$pdf->SetFont('Times','BI',11);
$pdf->SetX(34);
$pdf->MultiCell(145,6,"  Detailed Observation",'LRT','L',false);
 
// ********* Fourth Row End 4.0 ****************


// ********* Fourth Row 4.1 ****************
$pdf->SetFont('Times','BI',11);
$pdf->SetX(18);
$pdf->Cell(16,6,"4.1",'LR',0,'L');

$pdf->SetFont('Times','BI',11);
$pdf->SetX(34);
$pdf->MultiCell(145,6," Checking of supply / earthing   :   OK ",'LR','L',false);
 
// ********* Fourth Row End 4.1 ****************

// ********* Fourth Row 4.2 ****************
$pdf->SetFont('Times','BI',11);
$pdf->SetX(18);
$pdf->Cell(16,8,"4.2",'LRB',0,'L');

$pdf->SetFont('Times','BI',11);
$pdf->SetX(34);
$pdf->MultiCell(145,8," Checking of Accessories  :    OK ",'LRB','L',false);
 
// ********* Fourth Row End 4.2  ****************

// ********* Fifth  Row  ****************
$pdf->SetFont('Times','BI',11);
$pdf->SetX(18);
$pdf->Cell(16,54,"4.3",'LRTB',0,'L');

$pdf->SetFont('Times','I',11);
$pdf->SetX(34);
$pdf->MultiCell(145,6," Span Calibration\n 1.Details of span gas concentration : CO-2.93%,HC-3607 PPM Propane\n                                                            Oxygen- 0.43%,CO2-11.89%\n                                                            Nitrogen Balanc\n 2.Calibration gas cylinder No            :  75201\n 3.Calibraton Gas cylinder            :   CHEMIX GASES\n 4.Calibration gas validity date            : ".$calibration_gas_validity."\n OR\n 5.Details of Natural Density filters mid point calibrator : NA",'LRTB','L',false);
 
// ********* Fifth Row End  ****************
// ********* sixth  Row  ****************
$pdf->SetFont('Times','BI',11);
$pdf->SetX(18);
$pdf->Cell(16,6,"4.4",'LRTB',0,'L');

$pdf->SetFont('Times','BI',11);
$pdf->SetX(34);
$pdf->MultiCell(145,6,"Electrical Calibration   : O.K",'LRTB','L',false);
 
// ********* sixth Row End  ****************
// ********* seventh  Row  ****************
$pdf->SetFont('Times','BI',11);
$pdf->SetX(18);
$pdf->Cell(16,6,"4.5",'LRTB',0,'L');

$pdf->SetFont('Times','BI',11);
$pdf->SetX(34);
$pdf->MultiCell(145,6,"Leak Test   : Passed",'LRTB','L',false);
 
// ********* seventh Row End  ****************
// ********* Eith  Row  ****************
$pdf->SetFont('Times','BI',11);
$pdf->SetX(18);
$pdf->Cell(16,6,"",'LRTB',0,'L');

$pdf->SetFont('Times','BI',11);
$pdf->SetX(34);
$pdf->MultiCell(145,6,"One no.of petrol checked for idling Emission.",'LRTB','L',false);
 
// ********* Eith Row End  ****************
// ********* ninth  Row  ****************
$pdf->SetFont('Times','BI',11);
$pdf->SetX(18);
$pdf->Cell(16,6,"",'LRTB',0,'L');

$pdf->SetFont('Times','BI',11);
$pdf->SetX(34);
$pdf->MultiCell(145,6,"Conclusion : Four Gas Analyser working satisfactorily.",'LRTB','L',false);
 
// ********* Ninth Row End  ****************
// *********Tenth  Row  ****************
$pdf->SetFont('Times','BI',11);
$pdf->SetX(18);
$pdf->Cell(16,6,"8.0",'LRTB',0,'L');

$pdf->SetFont('Times','BI',11);
$pdf->SetX(34);
$pdf->MultiCell(145,6,"Next calibration Due Date :  ".$cal_validity."",'LRTB','L',false);

$pdf->Image('../img/sig.png',10,251,80,38);
// ********* Tenth Row End  ****************
// $pdf->SetFont('Times','BI',10);
// $pdf->SetX(18);
// $pdf->Cell(16,10,"For MARS Technologies Inc.",0,0,'L');

// $pdf->SetFont('Times','BI',10);
// $pdf->SetY(264);
// $pdf->SetX(18);
// $pdf->Cell(16,10,"AUTHORISED SIGNATORY",0,0,'L');
// table ends here
}
$pdf->Output("D","Calibration_".$srno.".pdf",true);

?>