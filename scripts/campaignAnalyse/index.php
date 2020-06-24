<?php
require "autoload.php";
/* fetch data from UI and call Campaign Analyse api*/
if ($_SERVER['REQUEST_METHOD'] === "POST") {
	//Get POST parameters
	$myPostargs = filter_input_array(INPUT_POST);
	$from 	=	$myPostargs['from'];
	$to 	=	explode(",",$myPostargs['bulk-number']);
	$body 	=	$myPostargs['message'];	
	$data = array(
		'body' => $body,
		'to' => $to,
		'from' => $from,
	);
	//create an object for CampaignAnalyse class
	$campaignAnalyseObj = 	new CampaignAnalyse();
	//call send campaignAnalyse function
	$response	=	$campaignAnalyseObj->campaignAnalyse($data);
	//encode response in json format and return
	echo json_encode($response);
	exit;
}



