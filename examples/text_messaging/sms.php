<?php
/* an example to analyse bulk sms using ROUTEE -  Send an SMS */

require realpath(__DIR__ . "/../..").'/vendor/autoload.php';
require realpath(__DIR__ . "/../..").'/config/app.php';

use App\Routee as routee;

/*set application id and application secret to generate access token*/
$config = array('application_id' => APPLICATION_ID, 'application_secret' => APPLICATION_SECRET);

//create an object for TextMessaging class
$sms = new routee\TextMessaging($config);
$data = array(
	'body'=>'Test Message',
	'to'=> '91.............',
	'from'=> 'amdTelecom'
);

//call TextMessaging sendSMS function
$sendSMS = $sms->sendSMS(json_encode($data));
print_r($sendSMS);
