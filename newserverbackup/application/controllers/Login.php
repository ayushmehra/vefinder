<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		/* $this->load->helper('cookie');
		$this->load->library('session');
		$this->load->library('pagination'); */
	}

	/*****************************************
			***User LOGIN ****
    ****************************************/
	
	public function index()
	{
		//print_r($this->session->userdata);die();
		if(($this->session->userdata('step_two')==1 )&& ($this->session->userdata('user_id')<>''))
		{
			redirect('SignUp-Step-2');
		}
		if(($this->session->userdata('step_two')==3 )&& ($this->session->userdata('user_id')<>''))
		{
			redirect('Home');
		}
		redirection();
		$this->load->view('Login_HTML');
	}
	
	function DoLoginProcess()
	{
		//print_r(md5($_REQUEST['password']));die;
		$data				= 	array(	'email'			=>$_REQUEST['username'],
										'password'		=>$_REQUEST['password']
								);
		@$p_id				=	$this->session->userdata("user_like_list");		// Use for redirect for Like And Bid on product
		@$user_f_id			=	$this->session->userdata("user_follow_list");	// User Follow id redirect after Login 
		@$user_cart			=	$this->session->userdata("user_cart");			// User Follow id redirect after Login
		@$user_wish_list	=	$this->session->userdata("user_wish_list");		// User Follow id redirect after Login
		if($this->Login_model->user_login($data))
		{ 
			if(@$user_f_id<>'')
			{
				$this->session->unset_userdata('user_follow_list');				
				## GET UserName
				$user_name			=	_GetUserNameById($user_f_id);
				if($user_name<>'')
				{
					@$newuri='User/'.$user_name; 
					print json_encode(array("exists"=>2,"message"=>'User Login successfully.',"url"=>$newuri ));
				}
				else{
					print json_encode(array("exists"=>1,"message"=>'User Login successfully.'));
				}				
			}
			else if(@$p_id<>'')
			{
				$this->session->unset_userdata('user_like_list');
				$redirect 	= base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ');	
				@$newuri 	= 'ProductFullView/'.$redirect.'/'.$p_id.'/'.$redirect;
				print json_encode(array("exists"=>2,"message"=>'User Login successfully.',"url"=>$newuri ));								
			}
			else if(@$user_wish_list<>'')
			{
				$this->session->unset_userdata('user_wish_list');
				$redirect 	= base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ');	
				@$newuri 	= 'ProductFullView/'.$redirect.'/'.$user_wish_list.'/'.$redirect;
				print json_encode(array("exists"=>2,"message"=>'User Login successfully.',"url"=>$newuri ));					
			}
			else if(@$user_cart<>'')
			{ 
				$cart_data	='';
				$this->session->unset_userdata('user_cart');
				@$newuri='Cart';
				print json_encode(array("exists"=>2,"message"=>'User Login successfully.',"url"=>$newuri ));	
			}
			else
			{
				print json_encode(array("exists"=>1,"message"=>'User Login successfully.'));				
			}
		}
		else
		{
			print json_encode(array("exists"=>0,"message"=>'Please check details'));          
		}
		die();
	}
	
	/*****************************************
               * User LOGOUT *
     ****************************************/
	 
	public function logout()
	{
		$this->session->sess_destroy(); 
        redirect('home');
	}
	
	/*****************************************
			*** User Registration ****
    ****************************************/
	public function register()
	{
		if(($this->session->userdata('user_id')<>'')&&($this->session->userdata('step_two')==1))
		{
			redirect('SignUp-Step-2');
		}
		if(($this->session->userdata('user_id')<>'')&&($this->session->userdata('user_login')==1))
		{
			redirect('Home');
		}
		if(($this->session->userdata('user_id')<>'')&&($this->session->userdata('user_login')==3))
		{
			redirect('Home');
		}
		$data['cat_data']	=	_Get_dropdown('category');
		$this->load->view('SignUp_HTML',$data);
	}
	
	public function Do_Registration()
	{
		//print_r($_POST); die();
		$email	=	strtolower($_REQUEST['email']);
		/* $dob	=	explode('/',$_REQUEST['dob']);
		$n_dob	=	$dob[2].'-'.$dob[1].'-'.$dob[0]; */
		$data= array(	'username'			=>	preg_replace('/\s+/', '', strtolower($_REQUEST['inputUname'])),
						'email'				=>	$email,						
						'email_otp'			=>	mt_rand(100000, 999999),
						'email_verified'	=>	0,
						'first_name'		=>	$_REQUEST['fname'],							
						'last_name'			=>	$_REQUEST['lname'],							
						'user_type_id'		=>	$_REQUEST['profile'],							
						'temp_password'		=>	$_REQUEST['password'],						
						'user_web'			=>	$_REQUEST['web'],
						'birth_date'		=>	$_REQUEST['dob'],
						'location'			=>	$_REQUEST['location'],
						'company_number'	=>	$_REQUEST['company_number'],
						'status'			=>	1,
						'gender'			=>	$_REQUEST['gender'],
						'cat_data'			=> implode(',',$_REQUEST['cat'])
					);
		//print_r($_REQUEST['cat']); print_r($data);die();
		$response	=	$this->Login_model->user_registration($data);
		if($response['data']<>'')
		  {        
			print json_encode(array("exists"=>"1","message"=>$response['response'],'type'=>'registration' ));
		  }
		  else
		  {
			print json_encode(array("exists"=>"0" ,"message"=>$response['response']));          
		  }
		  die();
	}	
	public function FindUserName()
	{		
		//echo $_POST['username'];die('here');
		if(isset($_POST['username'])){
			$username		 	= $_POST['username']; 
			$username_exist 	= $this->Login_model->showusername($username);
			if($username_exist==false){
				$path=base_url().'assets/available.png';
				@$image.='<img src="'.$path.'" style="float: left;padding-top: 5px;padding-right: 5px;" />';
				echo $image;
				die('<span id="av">available!</span>');
			}
			else{
				$path=base_url().'assets/not-available.png';
				@$image.='<img src="'.$path.'" style="float: left;padding-top: 5px;padding-right: 5px;" />';
				echo $image;
				die('<span id="av">not-available!</span>');
			}
		}
	}
	
	public function register_step_2()
	{
		//print_r($this->session->userdata()); die;
		if(($this->session->userdata('user_id')=='')&&($this->session->userdata('step_two')==0))
		{
			redirect('SignUp');
		}
		
		if(($this->session->userdata('user_id')<>'')&&($this->session->userdata('user_login')==1))
		{
			redirect('Home');
		}
		if(($this->session->userdata('user_id')<>'')&&($this->session->userdata('user_login')==3))
		{
			redirect('Home');
		}
		
		$data['Intrest_Tags']	=	_GetIntrestTag();
		$this->load->view('InterestTag_HTML',$data);
	}
	
	public function IntrestTag()
	{
		if(($this->session->userdata('user_id')<>'')&&($this->session->userdata('step_two')==1))
		{
			if($_POST)
			{
				$user_id	=	$this->session->userdata('user_id');
				$intrest	=	implode(',',json_decode(stripslashes($_POST['data'])));
				$data		=	array('intrest_id'=>$intrest,'updated_date'=>date("Y-m-d H:i:s"));
				$response	=	$this->Login_model->UserTagUpdate($data,$user_id);
				if($response)
				{				       
					print json_encode(array("exists"=>"1","message"=>'Account Registration Done' ));
				}
				else
				{
					print json_encode(array("exists"=>"0" ,"message"=>'Something Went Wrong'));          
				}
			}
			else
			{
				print json_encode(array("exists"=>"0" ,"message"=>"Some Thing Went Worng"));
			}
		}
		else
		{
			redirect('Home');
		}
		
	}
	public function Skip_Step2()
	{
		if($this->session->userdata('step_two')==1)
		{
			$userdatasess = array('step_two'=>	3);  
			$this->session->set_userdata($userdatasess);
			print json_encode(array("exists"=>"1" ));
		}
	}
	
	/****************************
		***Forget Password ****
	*****************************/	
	
	public function forget()
	{
		$this->load->view('ForgetPassword_HTML');
	}
	
	public function GetPassword()
	{		
		$email = $_REQUEST['email'];
		if(GetMailCount('forget',$email)<4)
		{			
			if($this->Login_model->UpdateForgotPassword($email))
			  {        
				print json_encode(array("exists"=>"1","message"=>"Password Send To Your Email.",'type'=>'forget_password' ));
			  }
			  else
			  {
				print json_encode(array("exists"=>"0" ,"message"=>"Something went worng"));          
			  }
			  die();
		}
		else
		{
			print json_encode(array("exists"=>"0" ,"message"=>"Sory!! Today Email Limit Reached."));
		}
		die();
	}
	
	/*****************************************
			***Email Verify ****
	****************************************/
	
	public function verify_email()
	{		
		$this->load->view('VerifyEmail_HTML');
	}
	
	public function VerifyEmailNow($garbage,$key,$key_date) 
	{
		$date_decode		= base64_decode($key_date);
		$link_expire_date	= date('Y-m-d', strtotime($date_decode. ' + 5 days'));
		$current_date		= date('Y-m-d');
		if($current_date < $link_expire_date)
		{
			if($this->Login_model->VerifyEmailRegister($key))
			{
				$data['msg'] 		=	"<div style='color:green'>Email verification successful.</div><script>window.setTimeout(function(){ window.location.href='".base_url()."Login'}, 3000 );</script>";
				
			}else
			{
				$data['msg'] 		=	"<div style='color:red'>Email Verification is Unsuccessful.</div><script>window.setTimeout(function(){ window.location.href='".base_url()."Verify-Email'}, 3000 );</script>";
				
			}
		}
		else{
			$data['msg'] 		=	"<div style='color:red'>Email Verification url is no valid.</div><script>window.setTimeout(function(){ window.location.href='".base_url()."Verify-Email'}, 3000 );</script>";
		}
		$this->load->view('EmailVerifySucess_HTML',$data);
		
	}
	
	public function SendVerify_email()
	{		
		$email	=	$_REQUEST['email']; 
		if(GetMailCount('verification',0)<4)
		{	
			$response =	$this->Login_model->SendVerifyEmail($email);
			if($response['data']<>'')
		  	{        
				print json_encode(array("exists"=>"1","message"=>$response['response'],'type'=>'Verification Email' ));
			}
			else
			{
				print json_encode(array("exists"=>"0" ,"message"=>$response['response']));          
			} die();
		}
		else
		{
			print json_encode(array("exists"=>"0" ,"message"=>"Sory!! Today Email Limit Reached."));
		}
		die();
	}
	
	function text()
	{
		$data['Intrest_Tags']	=	_GetIntrestTag();
		$this->load->view('InterestTag_HTML',$data);
	}
}
