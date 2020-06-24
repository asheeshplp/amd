<?php 
/*
 * Class consists PHP Unit test cases to check Suspicious sender IDs
 * @As on: 27 Feb, 2020
 */	 
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\ExpectationFailedException as PHPUnitException;

require_once __DIR__ .'/Input.php';

use SendSMSInput\Input;
use App\Routee\Kernel;

final class SendSMSTest extends TestCase
{
    Private $url;
    private $appId;
    Private $config;
    Private $appSecret;
    Private $invalidUrl;
    private $SendSMSInput;
    Private $invalidAppId;
    Private $invalidAppSecret;
    Private $data;

	public function setUp() : void {
        
        $this->url                  = SMS_URL;
        
        $this->appId                = APPLICATION_ID;
        
        $this->appSecret            = APPLICATION_SECRET;
        
        $this->invalidUrl           = '';
        
        $this->SendSMSInput         = Input::getInstance();
        
        $this->invalidAppId         = 'e5a01912-9fe5-44d5-8c06-12a52ee36ae5';
        
        $this->invalidAppSecret     = 'hJ4JDZAhdU';
        
        $this->config               = array(
            'application_id'     => $this->appId, 
            'application_secret' => $this->appSecret
        );

        $this->data = array(
            'body' => 'Lorem ipsum dolor sit amet',
            'to'   => '91.......',
            'from' => 'AMD Telecom',
        );

    }

    public function tearDown() : void 
    {
       unset($this->SendSMSInput);
    }
    
    /*Check App Id is not empty. 
     *Positive Case
    */
	public function testNotEmptyAppID() : void
    {
       	$this->assertNotEmpty($this->appId);
    }

    /*Check App Id is not empty. 
     *Negative Case
    */
    public function testEmptyAppId() : void
    {
        $this->assertEmpty($this->appId, 'App ID is empty.');
    }

    /*Check App Secret is not empty. 
     *Positive Case
    */
	public function testNotEmptyAppSecret() : void
    {
       	$this->assertNotEmpty($this->appSecret);
    }

    /*Check App Secret is not empty. 
     *Negative Case
    */
    public function testEmptyAppSecret() : void
    {
        $this->assertEmpty($this->appSecret, 'App Secret is empty.');
    }

    /*Check App Secret is not empty. 
     *Positive Case
    */
	public function testNotEmptyUrl() : void
    {
       	$this->assertNotEmpty( $this->url );
    }

    /*Check App Secret is not empty. 
     *Negative Case
    */
    public function testEmptyUrl() : void
    {
        $this->assertEmpty($this->url, 'Url is empty.');
    }
    
    /*Check is config consist array. 
     *Positive Case
    */
    public function testIsConfigArray() : void
    {
        $this->assertIsArray($this->config);
    }

    /*Check is config not consist array. 
     *Negative Case
    */
    public function testIsNotConfigArray() : void
    {
        $this->assertIsNotArray($this->config,'Config is not of array type.');
    }

     /*Check is object of class Kernel. 
     *Positive Case
    */
    public function testIsObjectOfKernelClass() : void
    {
        $this->assertIsObject(new Kernel());
    }

    /*Check is object of class Kernel. 
     *Negative Case
    */
    public function testIsNotObjectOfKernelClass() : void
    {
        $this->assertIsNotObject(new Kernel(), 'Failed to assert that Object is not an object of Class Kernal');
    }

    /*Get Access Token While Valid Application Id. 
     *Positive Case
    */
    public function testGetAccessTokenWithValidApplicationId() : void
    {
        $expected = 200;
        $actual   = $this->SendSMSInput->getAccesToken( $this->config );
        $this->assertEquals($expected, $actual );
    }

    /*Get Access Token While InValid Application Id. 
     *Negative Case
    */
    public function testGetAccessTokenWithInValidApplicationId() : void
    {
        $expected = 200;
        $this->config['application_id'] = $this->invalidAppId;
        $actual   = $this->SendSMSInput->getAccesToken( $this->config );
        $this->assertEquals( $expected, $actual, 'Application ID is invalid.' );
    }

    /*Get Access Token While Valid Application Id. 
     *Positive Case
    */
    public function testGetAccessTokenWithValidAppSecret() : void
    {
        $expected = 200;
        $actual   = $this->SendSMSInput->getAccesToken( $this->config );
        $this->assertEquals($expected, $actual );
    }

    /*Get Access Token While InValid Application Id. 
     *Negative Case
    */
    public function testGetAccessTokenWithInValidAppSecret() : void
    {
        $expected = 200;
        $this->config['application_secret'] = $this->invalidAppSecret;
        $actual   = $this->SendSMSInput->getAccesToken( $this->config );
        $this->assertEquals( $expected, $actual, 'App Secret is invalid.' );
    }

    /*Test Send Sms Response while valid input. 
     *Positive Case
    */
    public function testSendSms() : void
    {
        $expected = 200;
        $actual   = $this->SendSMSInput->postSendSms(  $this->config, $this->data, $this->url );
        $this->assertEquals( $expected, $actual );
    }
}
?>
