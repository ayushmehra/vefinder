<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Test extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();		
	}
	function text()
	{
		$params = array(
		"version"      => "v10",
		"merchant_id"  => 44430,
		"agreement_id" => 171670,
		"order_id"     => rand(1000,9999),
		"amount"       => 100,
		"currency"     => "DKK",
		"continueurl" => "vefinder.puzzlecoder.com/Test/continueurl",
		"cancelurl"   => "vefinder.puzzlecoder.com/Test/cancelurl",
		"callbackurl" => "vefinder.puzzlecoder.com/Test/callbackurl",
		);		
		$params["checksum"] = sign($params, "fce9c387f0ada691a807bd9ac42b7ab447739c3027666ae5d60e2f1096507805");
		$this->load->view('text',$params);
	}
	
	function continueurl(){ echo "continueurl";}
	function cancelurl(){ echo "cancelurl";}
	function callbackurl(){ echo "callbackurl";}
}
