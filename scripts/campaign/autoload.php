<?php
require_once realpath(__DIR__ . "/../..").'/vendor/autoload.php';
require_once realpath(__DIR__ . "/../.."). '/config/app.php';
require 'Campaign.php';
define('SMS_URL', 'https://connect.routee.net/sms/campaign');
define('SMS_FROM', 'amdTelecom');