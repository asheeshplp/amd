<?php

declare( strict_types = 1 );

namespace SendSMSInput;

require_once realpath(__DIR__ . "/../../..") . "/scripts/sendSMS/autoload.php";
use App\Routee\Authorization;
use App\Routee\Kernel;

final class Input 
{
    private static $instance = null;

    public function __construct() 
    {	
		
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) 
        {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function getAccesToken( array $config ) : int
    {
        $result         = 200;
        $authObj        = new Authorization( $config );
        $authReturn     = $authObj->getAccesToken();

        if( isset($authReturn['status'] ) )
        {
            $result     = $authReturn['status'];
        }

        return $result;
    }

    public function postSendSms(array $config, array $data, string $url ) : int 
    {
      
        $result             =   200;
		$authObj 		    = 	new Authorization($config);
		$kernelObj 		    = 	new Kernel();
        $authReturn 	    =   $authObj->getAccesToken();		
		$accessToken 	    =   $authReturn['result']['access_token'];		
		$response           =   $kernelObj->sendCurlrequest($url, $data, $accessToken);
        
        if( isset($response['status']) ){
            $result = $response['status'];
        }
        
        return $result;
    }
}    