<?php
/* an example to send bulk sms using ROUTEE - Send Bulk Messages - Campaigns */
require realpath(__DIR__ . "/../..").'/vendor/autoload.php';
require realpath(__DIR__ . "/../..").'/config/app.php';

use App\Routee as routee;

/*set application id and application secret to generate access token*/
$config = array('application_id' => APPLICATION_ID, 'application_secret' => APPLICATION_SECRET);

//create an object for TextMessaging class
$sms = new routee\TextMessaging($config);
$data = array(
    //'contacts' => ''//array of strings  //The contact ids that the message will be sent to. Contacts have to be uploaded to the system. One of "groups", "to", "contacts" parameters is required.
    'from' => 'amdTelecom',
   // 'groups'  => '',//The groups of contacts in the account selected as recipients. Groups have to be created at the system. One of "groups", "to", "contacts" parameters is required.
    'to'=> array('91...........','91........'),
    'body'=>'Hello..This is testing from ROUTEE....'
);

//call TextMessaging campaign function
$smsCampaign = $sms->campaign(json_encode($data));
print_r($smsCampaign);



