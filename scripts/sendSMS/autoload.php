<?php

require_once realpath(__DIR__ . "/../..").'/vendor/autoload.php';
require_once realpath(__DIR__ . "/../.."). '/config/app.php';
require realpath(__DIR__).'/SendSms.php';
define('SMS_URL', 'https://connect.routee.net/sms');
define('SMS_FROM', 'amdTelecom');