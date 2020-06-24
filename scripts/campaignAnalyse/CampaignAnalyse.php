<?php
/* The CampaignAnalyse class - Analyzing a bulk sendout is useful when the user needs information about the send out before actually sending it.*/
use App\Routee as Routee;
use \Curl\Curl;

class CampaignAnalyse
{
    /**
    * This is the default variable declaration
    */
    private $config = null, $appId = null, $appSecret = null, $accessToken = null, $authReturn = null, $url = null;

    /**
    * Default Constructor
    * This method used to set default values i.e application_id, application_secret
    * @param Null
    * @return Null
    */
    public function __construct()
    {
        $this->appId		=	APPLICATION_ID;
        $this->appSecret	=	APPLICATION_SECRET;
        $this->url			=	SMS_URL;
    }
    
	/**
    * This method used to first get access token using application credentials and then use send bulk sms analyse api call of ROUTEE
    * @param array $data = 
    * contacts array of strings
    * groups array of strings
    * from string REQUIRED 
    * body string REQUIRED 
    * to array of strings.
    * @return : array - Response array with status = status_code and result = curl response as array.
    */
    public function campaignAnalyse(array $data): array
    {
        $this->config 	= 	array('application_id' => $this->appId, 'application_secret' => $this->appSecret);
		$authObj 		= 	new Routee\Authorization($this->config);
        $this->authReturn 	= $authObj->getAccesToken();
        if($this->authReturn['status'] != 200) {
            return $this->authReturn;
        }		
        $this->accessToken 	= $this->authReturn['result']['access_token'];		
        $kernelObj 		= 	new Routee\Kernel();
		return $kernelObj->sendCurlrequest($this->url, $data, $this->accessToken);		
    }   
}
