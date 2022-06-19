<?php
include('css/phpqrcode/qrlib.php');
// include('config.php');

// how to save PNG codes to server

$tempDir = 'img/qrcodes/';

// $codeContents = 'http://google.com';

// // we need to generate filename somehow, 
// // with md5 or with database ID used to obtains $codeContents...
// $fileName = 'test.png';

$pngAbsoluteFilePath = $tempDir.$fileName;
// $urlRelativeFilePath =  $tempDir.$fileName;

// // generating
// if (!file_exists($pngAbsoluteFilePath)) {
//     QRcode::png($codeContents, $pngAbsoluteFilePath);
//     echo 'File generated!';
//     echo '<hr />';
// } else {
//     echo 'File already generated! We can use this cached file to speed up site on common codes!';
//     echo '<hr />';
// }

// echo 'Server PNG File: '.$pngAbsoluteFilePath;
// echo '<hr />';

// // displaying
// echo '<img src="'.$urlRelativeFilePath.'" />';

include('../lib/full/qrlib.php');


// how to build raw content - QRCode to send SMS

// $tempDir = EXAMPLE_TMP_SERVERPATH;

// here our data
$phoneNo = '(91)9959393184';

// we building raw data
$codeContents = 'sms:'.$phoneNo;

// generating
QRcode::png($codeContents, $tempDir.'021.png', QR_ECLEVEL_L, 3);

// displaying
echo '<img src="'.$tempDir.'021.png" />';

?>