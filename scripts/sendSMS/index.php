<?php
require "autoload.php";
/* fetch data from UI and call send single SMS api*/
if ($_SERVER['REQUEST_METHOD'] === "POST") {
	//Get POST parameters
	$myPostargs = filter_input_array(INPUT_POST);
	$from 	=	$myPostargs['from'];
	$to 	=	$myPostargs['full_number'];
	$body 	=	$myPostargs['message'];	
	$data = array(
		'body' => $body,
		'to' => $to,
		'from' => $from,
	);
	//create an object for sendSMS class
	$sendSmsobj = 	new SendSms();
	//call send sms function
	$response	=	$sendSmsobj->sendSMS($data);
	//encode response in json format and return
	echo json_encode($response);
	exit;		
}

