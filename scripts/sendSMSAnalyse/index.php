<?php
require "autoload.php";
/* fetch data from UI and call send single SMS Analyse api*/
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
	//create an object for SendSmsAnalyse class
	$sendSMSAnalyseObj = 	new SendSmsAnalyse();
	//call send sendSMSAnalyse function
	$response	=	$sendSMSAnalyseObj->sendSMSAnalyse($data);
	//encode response in json format and return
	echo json_encode($response);
	exit;	
}
