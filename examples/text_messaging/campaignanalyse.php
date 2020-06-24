<?php
/* an example to analyse bulk sms using ROUTEE -  Analyze Bulk Messages - Campaigns */

require realpath(__DIR__ . "/../..").'/vendor/autoload.php';
require realpath(__DIR__ . "/../..").'/config/app.php';

use App\Routee as routee;

/*set application id and application secret to generate access token*/
$config = array('application_id' => APPLICATION_ID, 'application_secret' => APPLICATION_SECRET);

//create an object for TextMessaging class
$sms = new routee\TextMessaging($config);
$data = array(
    'from'=> 'amdTelecom',
    'to'=> array('91.........','91.........'),
    'body'=>'Hello..This is testing'
);

//call TextMessaging campaignAnalyze function
$campaignAnalyse = $sms->campaignAnalyze(json_encode($data));
print_r($campaignAnalyse);

