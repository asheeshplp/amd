<?php
/* an example to analyse bulk sms using ROUTEE -  Analyse an SMS message */

require realpath(__DIR__ . "/../..").'/vendor/autoload.php';
require realpath(__DIR__ . "/../..").'/config/app.php';

use App\Routee as routee;

/*set application id and application secret to generate access token*/
$config = array('application_id' => APPLICATION_ID, 'application_secret' => APPLICATION_SECRET);

//create an object for TextMessaging class
$sms = new routee\TextMessaging($config);
$data = array(
    'from'=> 'amdTelecom',
    'to'=> '91........',
    'body'=>'Test Message'
);

//call TextMessaging smsAnalyze function
$smsAnalyse = $sms->smsAnalyze(json_encode($data));
print_r($smsAnalyse);


