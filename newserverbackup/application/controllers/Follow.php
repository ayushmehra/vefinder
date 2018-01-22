<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Follow extends CI_Controller {
	
	/***********************************
			* Follow/Un-Follow *
    ************************************/
	public function index()
	{
		$user_id		=	$this->session->userdata('user_id');
		$following_id	=	htmlentities(base64_decode($_REQUEST['Follow_id']));	
		
		if($user_id =='')
		{		
			$this->session->set_userdata('user_follow_list',$following_id);	
			$this->session->unset_userdata('user_cart');
			$this->session->unset_userdata('user_like_list');
			print json_encode(array("exists"=>"2" ,"message"=>"Please Login First"));
			die();
		}
		else
		{		
			$msg=$this->Follow_model->Follow($user_id,$following_id);
			
			if($msg['msg']<>'')
			{        
				print json_encode(array("exists"=>"1","message"=>$msg['msg'],"followingText"=>$msg['following'],"follow_count"=>$msg['follow_count'],"count"=>$msg['count'],"div"=>$msg['div'],"html"=>$msg['html']));
			}
			else
			{
				print json_encode(array("exists"=>"0" ,"message"=>"Something Went Worng."));          
			}
		  die();
		}
	}
	
	public function UnfollowUser()
	{
		$user_id			=	$this->session->userdata('user_id'); 
		$following_user_id	=	htmlentities(base64_decode($_REQUEST['follow']));	
		if($user_id =='')
		{			
			print json_encode(array("exists"=>"2" ,"message"=>"Please Login First"));
			die();
		}
		else
		{	
			$msg=$this->Follow_model->UnFollowUser($user_id,$following_user_id);
			
			if($msg['msg']<>'')
			{        
				print json_encode(array("exists"=>"1","message"=>$msg['msg'],"followingText"=>$msg['following'],"follow_count"=>$msg['follow_count'],"count"=>$msg['count'],"div"=>$msg['div']));
			}
			else
			{
				print json_encode(array("exists"=>"0" ,"message"=>"Something Went Worng."));          
			}
		  die();
		}
	}
	
	public function FollowUnfollowUser()
	{
		$user_id			=	$this->session->userdata('user_id'); 
		$following_user_id	=	htmlentities(base64_decode($_REQUEST['follow']));
		if($user_id =='')
		{			
			print json_encode(array("exists"=>"2" ,"message"=>"Please Login First"));
			die();
		}
		else
		{	
			$msg=$this->Follow_model->FollowUnfollowUser($user_id,$following_user_id);
			
			if($msg['msg']<>'')
			{        
				print json_encode(array("exists"=>"1","message"=>$msg['msg'],"a"=>$msg['a'],"followingText"=>$msg['following'],"follow_count"=>$msg['follow_count'],"count"=>$msg['count'],"div"=>$msg['div'],"html"=>$msg['html']));
			}
			else
			{
				print json_encode(array("exists"=>"0" ,"message"=>"Something Went Worng."));          
			}
		  die();
		}
	}
}