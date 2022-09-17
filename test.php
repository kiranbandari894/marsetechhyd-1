<?php
include_once('./constants.php');
include_once('./classes/main_class.php');
include('./css/phpqrcode/qrlib.php');
$database = new marsetech(HOST,USER,PASS,DB);


$password = base64_encode("krishika.23");
$database->generateQR('./password_qrs/',"test_".date("dis"),$password);
	// // Account details
	// $apiKey = urlencode('N2EzNTY0NDU2OTc1NzM0ZDVhNDc2ZjQ2NjI2MTM4NGY=');
	
	// // Message details
	// $numbers = array(919959393184);
	// $sender = urlencode('TXTLCL');
	// $message = rawurlencode('This is your  message');
 
	// $numbers = implode(',', $numbers);
 
	// // Prepare data for POST request
	// $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
	// // Send the POST request with cURL
	// $ch = curl_init('https://api.textlocal.in/send/');
	// curl_setopt($ch, CURLOPT_POST, true);
	// curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// $response = curl_exec($ch);
	// curl_close($ch);
	
	// // Process your response here
	// echo $response;
?>