<?php
require_once realpath(__DIR__ . "/../..").'/vendor/autoload.php';
require_once realpath(__DIR__ . "/../.."). '/config/app.php';
require 'SendSmsAnalyse.php';
define('SMS_URL', 'https://connect.routee.net/sms/analyze');
define('SMS_FROM', 'amdTelecom');