<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bid extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();		
		
	}
	## Place Bid ##
	function PlaceBid()
	{
		$user_data	=	$this->session->userdata('user_id');
		$product_id	=	$_REQUEST['product_id_bid'];		 
		$Bid_value	=	$_REQUEST['bid_value'];	
		
		if($user_data =='')
		{		
			$this->session->set_userdata('user_like_list',$product_id);	
			print json_encode(array("exists"=>"2" ,"message"=>"Please Login First"));
			die();
		}
		else
		{
			if($this->input->post('word'))
			{
				if(strtolower(htmlentities($this->input->post('word')))!=strtolower($this->session->userdata('captchaalphabet')))
				{				
					$this->session->unset_userdata('captchaalphabet');
					print json_encode(array("exists"=>"3","msg"=>"Incorrect captcha value entered"));	
					die;
				}
				else
				{
					$msg=$this->Bid_model->AddBid($product_id,$Bid_value);
					
					if($msg<>'')
					{        
						print json_encode(array("exists"=>"1","message"=>$msg));
					}
					else
					{
						print json_encode(array("exists"=>"0" ,"message"=>"Something Went Worng."));          
					}
				}
			}		 
		}
	}
	## Captcha Ajax ##
	function CaptchaAjax()
	{
		echo _CreatCaptcha();
	}
	
	function MyBids()
	{
		$user_data	=	$this->session->userdata('user_id');
		if($user_data =='')
		{
			redirect('home');
		}
		
		$data['product_info']	= $this->Bid_model->GetUserBidingProduct();
		$this->load->view('MyBids_HTML',$data);		
	}
	
	function test()
	{
		echo $this->Bid_model->GetProductBidValue(40);
		die('here');
	}
}