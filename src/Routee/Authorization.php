<?php
/* The Authorization class is used to authenticate User application using your Application Credentials*/
 
namespace App\Routee;

use \Curl\Curl;
/**
* Class Authorization
*/
class Authorization 
{  
    /**
    * Class Authorization
    */
    private $applicationId, $applicationSecret, $applicationIdSecret;
	
    const AUTHORIZATION_URL = 'https://auth.routee.net/oauth/token';

    /**
    * This method used to set default values i.e application_id, application_secret
    * @author : Anu
    * @param : array $config - application_id, application_secret
    * @return : NULL
    *
    */
    public function __construct(array $config = array()) {  
        $this->applicationId = isset($config['application_id']) ? $config['application_id'] : '';
        $this->applicationSecret = isset($config['application_secret']) ?  $config['application_secret'] : '';
        $this->applicationIdSecret = base64_encode($this->applicationId.":".$this->applicationSecret);
    }
    /**
    * This method used to get the access token based upon application credentials
    * @author : Anu
    * @param : string  applicationIdSecret - combination of application_id:application_secret
    *          string  AUTHORIZATION_URL - url to get access token - set as constant
    * @return : array - Response array with status = status_code and result = curl response as array.
    *
    */
    public function getAccesToken()
    {
       	$curl = new Curl();		
		$curl->setHeader('Content-Type', "application/x-www-form-urlencoded");
		$curl->setHeader('authorization', "Basic $this->applicationIdSecret");
        $curl->post(self::AUTHORIZATION_URL, "grant_type=client_credentials");
		$returnResp = array();
		if ($curl->error) {
			$returnResp['status'] =	$curl->errorCode;
			$returnResp['result'] = $curl->errorMessage;			
		} else {
			$returnResp['status'] = $curl->getHttpStatusCode();
			$returnResp['result'] = json_decode($curl->getRawResponse(), true);
        }
       
		return $returnResp;
    }
}
