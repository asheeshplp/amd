<?php
/* The TextMessaging class is used to call all text messaging api's */
namespace App\Routee;

use App\Routee as Authorization;
use \Curl\Curl;
/**
* Class TextMessaging
*/
class TextMessaging {
    /**
    * This is the default variable declaration
    */
    private $config = null, $access_token = null, $authReturn = null;
    const SMS_URL = 'https://connect.routee.net/sms';
    const SMS_ANALYSE_URL = 'https://connect.routee.net/sms/analyze';
    const SMS_CAMPAIGN_URL = 'https://connect.routee.net/sms/campaign';
    const SMS_CAMPAIGN_ANALYSE_URL = 'https://connect.routee.net/sms/analyze/campaign';

    /**
    * Default Constructor
    * This function used to get the access token from the authenticate the user credentials
    * @param array $config
    */
    function __construct(array $config = array()) {
        $this->config = $config;
        $authObj = new Authorization\Authorization($this->config);
        $this->authReturn = $authObj->getAccesToken();
        $this->checkAccessToken($this->authReturn);
    }

    /**
    * function: checkAccessToken
    * This function used to check if access token is created else return with error and error code
    * @param null
    * @return string accesstoke OR string error
    */
    public function checkAccessToken() {
        if($this->authReturn['status'] == 200) {
            $this->access_token = $this->authReturn['result']['access_token'];
        } else {
            return $this->authReturn['result']['error'].':'.$this->authReturn['result']['message'];
        }
    }

    /**
    * function: sendSMS
    * This function used to send single sms
    * @param array $data = 
    * from string REQUIRED 
    * body string REQUIRED 
    * to string REQUIRED Default value false.
    * label string A generic label which can be used for tagging the SMS. The maximum length is 350 characters.
    * callback object
    * callback.url string
    * callback.strategy string
    * @return : array - Response array with status = status_code and result = curl response as array.
    */
    public function sendSMS(string $data = ''): array {
        return $this->getResponse(self::SMS_URL, $data); 
    }

    /**
    * function: smsAnalyze
    * This function is used to Analysing an SMS is useful when the user needs information about the message before actually sending it.
    * @param array $data = 
    * from string REQUIRED 
    * body string REQUIRED 
    * to string REQUIRED Default value false.
    * @return : array - Response array with status = status_code and result = curl response as array.
    */
    public function smsAnalyze(string $data = ''): array {
        return $this->getResponse(self::SMS_ANALYSE_URL, $data);
    }

    /**
    * function: campaign
    * This function used to send messages to multiple recipients/contacts/groups.
    * @param array $data = 
    * contacts array of strings
    * groups array of strings
    * to array of strings
    * from string REQUIRED 
    * body string REQUIRED 
    * scheduledDatedate
    * campaignName string
    * flash boolean etc
    * @return : array - Response array with status = status_code and result = curl response as array.
    */
    public function campaign(string $data = ''): array {
        return $this->getResponse(self::SMS_CAMPAIGN_URL, $data);
    }

    /**
    * function: campaignAnalyze
    * This function used to Analyzing a bulk sendout is useful when the user needs information about the send out before actually sending it.
    * @param array $data = 
    * contacts array of strings
    * groups array of strings
    * from string REQUIRED 
    * body string REQUIRED 
    * to array of strings.
    * @return : array - Response array with status = status_code and result = curl response as array.
    */
    public function campaignAnalyze(string $data = ''): array {
        return $this->getResponse(self::SMS_CAMPAIGN_ANALYSE_URL, $data);
    }
    /**
    * This method used to send curl request
    * @author : Anu
    * @params : string  $url - curl url to send request to
    *           array  $data - post data
    * @return : array - Response array with status = status_code and result = curl response as array.
    *
    */
    public function getResponse(string $url, string $data): array {
        $curl = new Curl();		
        $curl->setHeader('Content-Type', "application/json");
        $curl->setHeader('authorization', "Bearer $this->access_token");
        $curl->post($url, $data);
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
