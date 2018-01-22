<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileLike extends CI_Controller {
	
	/***********************************
		* ProfileLike/Un-ProfileLike *
    ************************************/
	public function index()
	{
		$user_id		=	$this->session->userdata('user_id');
		$like_user_id	=	htmlentities(base64_decode($_REQUEST['Like_id']));	
		if($user_id =='')
		{		
			$this->session->set_userdata('user_follow_list',$like_user_id);	
			print json_encode(array("exists"=>"2" ,"message"=>"Please Login First"));
			die();
		}
		else
		{		
			$msg=$this->ProfileLike_model->ProfileLike($user_id,$like_user_id);
			
			if($msg['msg']<>'')
			{        
				print json_encode(array("exists"=>"1","message"=>$msg['msg'],"likeText"=>$msg['like'],"like_count"=>$msg['like_count'],"count"=>$msg['count'],"div"=>$msg['div'],"html"=>$msg['html']));
			}
			else
			{
				print json_encode(array("exists"=>"0" ,"message"=>"Something Went Worng."));          
			}
		  die();
		}
	}	
}