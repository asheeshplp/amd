<?php
/* The Kernel class is used as base class to send all curl requests using php curl package*/
 
namespace App\Routee;

use \Curl\Curl;

class Kernel 
{  
 
    public function __construct()
    {  
        //stuff goes here
    }
    /**
    * This method used to send curl request
    * @author : Anu
    * @params : string  $url - curl url to send request to
    *           array  $data - post data
    *           string  $accessToken - access token generated from apllication credentials
    * @return : array - Response array with status = status_code and result = curl response as array.
    *
    */
    public function sendCurlrequest(string $url, array $data, string $accessToken) : array
    {
       	$curl = new Curl();		
        $curl->setHeader('Content-Type', "application/json");
        $curl->setHeader('authorization', "Bearer $accessToken");
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
