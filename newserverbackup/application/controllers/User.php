<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	/*********************************************
			*  My Profile View *
    ********************************************/
	public function index()
	{
		$this->is_logged_in();
		checkredirection();
		$user_id	= $this->session->userdata('user_id');
		$config 						= array();
		$config["base_url"]				= base_url() . "home/";
		$config["total_rows"]			= _GetCountForProfile('All',$user_id);
		$config["per_page"]				= 20;
		$config["uri_segment"]			= 2;
		
		$config['full_tag_open'] 		= ' <ul class="pagination-list">';
		$config['full_tag_close'] 		= '</ul>';

		$config['num_tag_open'] 		= '<li>';
		$config['num_tag_close'] 		= '</li>';	
		$config['first_link'] 			= false;
        $config['last_link'] 			= false;		
		$config['next_link'] 			= '<span> Next Page </span>&nbsp;&nbsp;<span><img src="'.base_url().'assets/images/pagination-next-icon.png"></span>';
		$config['next_tag_open'] 		= '<li class="next">';
        $config['next_tag_close'] 		= '</li>';
		
		$config['prev_link']			= '<span><img src="'.base_url().'assets/images/pagination-previous-icon.png"></span>&nbsp;&nbsp;<span> Previous Page </span>';		
        $config['prev_tag_open'] 		= '<li class="previous">';
        $config['prev_tag_close'] 		= '</li>';
		
		$config['num_links'] 			= 2;
		
		$this->pagination->initialize($config);
		$page	=	($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		
		$data['user_info']		= 	$this->User_model->GetUserInfo($user_id);
		$data['Followers']		= 	_GetCountForProfile('Follows',$user_id);
		$data['Follows']		= 	_GetCountForProfile('Followers',$user_id);
		$data['Comments']		= 	_GetCountForProfile('Comments',$user_id);
		$data['Likes']			= 	_GetCountForProfile('Likes',$user_id);
		$data['Selling']		= 	_GetCountForProfile('Selling',$user_id);
		$data['All']			= 	_GetCountForProfile('All',$user_id);
		$data['Auction']		= 	_GetCountForProfile('Auction',$user_id);
		$data['Request']		= 	_GetCountForProfile('Request',$user_id);
		$data['Ads']			= 	_GetCountForProfile('Ads',$user_id);
		$data['product']		=	$this->Product_model->GetUserProduct($user_id,$config["per_page"], $page);
		$data['follower_list']	=	$this->Follow_model->FollowerList($user_id);
		$data['follow_list']	=	$this->Follow_model->FollowList($user_id);	
		$data['like_list']		=	$this->ProfileLike_model->LikeList($user_id);	
		$data['comment_list']	=	$this->User_model->GetCommentList($user_id);
		$this->load->view('MyProfile_HTML',$data);
	}
	/*********************************************
			*  Other Profile View *
    ********************************************/
	public function UserProfile($user_name)
	{		
		$user_id	= _GetUserId($user_name); 
		
		$uid		=	$this->session->userdata('user_id');
		if($user_id==0){
			/* echo "<script> alert('No User Found');</script>"; */
			redirect('/home');
		}
		else if($uid== $user_id)
		{
			$config 						= array();
			$config["base_url"]				= base_url() . "User/".$user_name;
			$config["total_rows"]			= _GetCountForProfile('All',$user_id);
			$config["per_page"]				= 20;
			$config["uri_segment"]			= 3;
			
			$config['full_tag_open'] 		= ' <ul class="pagination-list">';
			$config['full_tag_close'] 		= '</ul>';

			$config['num_tag_open'] 		= '<li>';
			$config['num_tag_close'] 		= '</li>';	
			$config['first_link'] 			= false;
			$config['last_link'] 			= false;		
			$config['next_link'] 			= '<span> Next Page </span>&nbsp;&nbsp;<span><img src="'.base_url().'assets/images/pagination-next-icon.png"></span>';
			$config['next_tag_open'] 		= '<li class="next">';
			$config['next_tag_close'] 		= '</li>';
			
			$config['prev_link']			= '<span><img src="'.base_url().'assets/images/pagination-previous-icon.png"></span>&nbsp;&nbsp;<span> Previous Page </span>';		
			$config['prev_tag_open'] 		= '<li class="previous">';
			$config['prev_tag_close'] 		= '</li>';
			
			$config['num_links'] 			= 2;
			
			$this->pagination->initialize($config);
			$page	=	($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['user_info']		=	$this->User_model->GetUserInfo($user_id);
			$data['Followers']		=	_GetCountForProfile('Follows',$user_id);
			$data['Follows']		=	_GetCountForProfile('Followers',$user_id);
			$data['Comments']		=	_GetCountForProfile('Comments',$user_id);
			$data['Likes']			=	_GetCountForProfile('Likes',$user_id);
			$data['Selling']		=	_GetCountForProfile('Selling',$user_id);
			$data['All']			=	_GetCountForProfile('All',$user_id);
			$data['Auction']		=	_GetCountForProfile('Auction',$user_id);
			$data['Request']		=	_GetCountForProfile('Request',$user_id);
			$data['Ads']			=	_GetCountForProfile('Ads',$user_id);
			$data['product']		=	$this->Product_model->GetUserProduct($user_id,$config["per_page"], $page);
			$data['follower_list']	=	$this->Follow_model->FollowerList($user_id);
			$data['follow_list']	=	$this->Follow_model->FollowList($user_id);
		 	$data['like_list']		=	$this->ProfileLike_model->LikeList($user_id);
			$data['comment_list']	=	$this->User_model->GetCommentList($user_id);
			$this->load->view('MyProfile_HTML',$data);
		}
		else
		{			
			$config 						= array();
			$config["base_url"]				= base_url() . "User/".$user_name;
			$config["total_rows"]			= _GetCountForProfile('All',$user_id);
			$config["per_page"]				= 20;
			$config["uri_segment"]			= 3;
			
			$config['full_tag_open'] 		= ' <ul class="pagination-list">';
			$config['full_tag_close'] 		= '</ul>';

			$config['num_tag_open'] 		= '<li>';
			$config['num_tag_close'] 		= '</li>';	
			$config['first_link'] 			= false;
			$config['last_link'] 			= false;		
			$config['next_link'] 			= '<span> Next Page </span>&nbsp;&nbsp;<span><img src="'.base_url().'assets/images/pagination-next-icon.png"></span>';
			$config['next_tag_open'] 		= '<li class="next">';
			$config['next_tag_close'] 		= '</li>';
			
			$config['prev_link']			= '<span><img src="'.base_url().'assets/images/pagination-previous-icon.png"></span>&nbsp;&nbsp;<span> Previous Page </span>';		
			$config['prev_tag_open'] 		= '<li class="previous">';
			$config['prev_tag_close'] 		= '</li>';
			
			$config['num_links'] 			= 2;
			
			$this->pagination->initialize($config);
			$page	=	($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['user_info']			=	 $this->User_model->GetUserInfo($user_id);
			$data['Followers']			=	_GetCountForProfile('Follows',$user_id);
			$data['Follows']			=	_GetCountForProfile('Followers',$user_id);
			$data['Comments']			=	_GetCountForProfile('Comments',$user_id);
			$data['Likes']				=	_GetCountForProfile('Likes',$user_id);
			$data['Selling']			=	_GetCountForProfile('Selling',$user_id);
			$data['All']				=	_GetCountForProfile('All',$user_id);
			$data['Auction']			=	_GetCountForProfile('Auction',$user_id);
			$data['Request']			=	_GetCountForProfile('Request',$user_id);
			$data['Ads']				=	_GetCountForProfile('Ads',$user_id);
			$data['product']			=	$this->Product_model->GetUserProduct($user_id,$config["per_page"], $page);
			$data['follower_list']		=	$this->Follow_model->FollowerList($user_id);
			$data['follow_list']		=	$this->Follow_model->FollowList($user_id);			
			$data['like_list']			=	$this->ProfileLike_model->LikeList($user_id);			
			$data['follow_this_user']	=	_IAmFollowingThisUser($user_id);			
			$data['like_this_user']		=	_IAmLikeThisUser($user_id);	
			$data['comment_list']		=	$this->User_model->GetCommentList($user_id);
			$this->load->view('UserProfileView_HTML',$data);
		}
	}		
	/*********************************************
			*  My Profile Cover Update *
    ********************************************/
	public function ProfileCover()
	{
		$user_id				=	$this->session->userdata('user_id');
		@$image					=	$_FILES['cover']['name'];
		if($_FILES['cover']['name'])
		{
			$path 		= $_FILES['cover']['name'];
			$extvenue 	= pathinfo($path, PATHINFO_EXTENSION);
			$imagename	= $user_id.'_'.time().'.'.$extvenue;
			$pathMain 	= getcwd().'/assets/UserImage/'.$user_id.'/CoverImage';
			$result = $this->Login_model->do_upload("cover", $pathMain,$imagename);

			if (!$result['status'])
			{
				$error=1;
				$data['error_msg'] ="Can not upload Image for " . $result['error'] . " ";
			}
			else
			{
				$dataImage=array('cover_image'=> $imagename,'updated_date'=>date('Y-m-d H:i:s'));
				$this->Login_model->UserUpdate($dataImage,$user_id);
				$userdata= array('cover_image' =>$imagename);	 
				$this->session->set_userdata($userdata);
				redirect("My-Profile");
			}
		}
	}
	/*********************************************
			*  My Profile Image Update *
    ********************************************/
	public function ProfileImage()
	{
		$user_id				=	$this->session->userdata('user_id');
		if($_FILES['profile_img']['name']!='')
		{
			$path 		= $_FILES['profile_img']['name'];
			$extvenue 	= pathinfo($path, PATHINFO_EXTENSION);
			$imagename	= $user_id.'_'.time().'.'.$extvenue;
			$pathMain 	= getcwd().'/assets/UserImage/'.$user_id;
			$path2Thumb	= getcwd().'/assets/UserImage/'.$user_id.'/thumb';
			$result = $this->Login_model->do_upload("profile_img", $pathMain,$imagename);

			if (!$result['status'])
			{
				$error=1;
				$data['error_msg'] ="Can not upload Image for " . $result['error'] . " ";
			}
			else
			{
				$dataImage=array('profile_image'=> $imagename,'image_thumb'=>$imagename,'updated_date'=>date('Y-m-d H:i:s'));
				$this->Login_model->UserUpdate($dataImage,$user_id);
				if (!is_dir($path2Thumb))
				mkdir($path2Thumb, 0755);			
				$this->Login_model->resize_image($pathMain . '/' . $result['upload_data']['file_name'], $path2Thumb . '/'.$imagename,'200','200');
				$userdata= array('user_image' =>$imagename);	 
				$this->session->set_userdata($userdata);
				redirect("My-Profile");
				
			}			
		}
	}
	/***************************
		* Check User Login *
	****************************/
	function is_logged_in() 
    {
        if (!$this->session->userdata('user_id'))
        {
            redirect('home');
        }
	}
	
	function ProfileComment()
	{
		$user_id			=	$this->session->userdata('user_id');
		$comment_for_user	=	$this->input->post('commentoff');
		$comment_text		=	$this->input->post('comment');
		$userdata			=	explode('/',$comment_for_user);		
		$comment_profile_id	=	base64_decode($userdata['1']); 
		
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
			$msg=$this->User_model->SetProfileComment($user_id,$comment_profile_id,$comment_text);
			
			if($msg['msg']<>'')
			{        
				print json_encode(array("exists"=>"1","message"=>$msg['msg'],"profile_comment_count"=>$msg['profile_comment_count'],"count"=>$msg['count'],"html"=>$msg['html']));
			}
			else
			{
				print json_encode(array("exists"=>"0" ,"message"=>"Something Went Worng."));          
			}
		  die();
		}
		
		
	}
	/*********************************************
				*  My Vefinder *
    ********************************************/
	public function My_Vefinder()
	{		
		$this->is_logged_in();
		$user_id		=	$this->session->userdata('user_id');
		$data['ad_post']	=	$this->Product_model->GetRandomAd();
		$data['user_info']	= $this->User_model->GetUserInfo($user_id);
		$this->load->view('My_Vefinder_HTML',$data);
	}
	
	/*********************************************
				*  My Requested Items *
    ********************************************/
	public function My_RequestedItems()
	{		
		$this->is_logged_in();
		$user_id		=	$this->session->userdata('user_id');
		$data['request_count']	= _GetCountForProfile('Request',$user_id);
		$data['product_info']	= $this->Product_model->ProductRequestedByMe($user_id);
		$this->load->view('Requested_Item_HTML',$data);
	}
	/*********************************************
		*  Requested Items By Other User*
    ********************************************/
	public function RequestedItems_ByOther()
	{		
		$this->is_logged_in();
		$user_id		=	$this->session->userdata('user_id');
		$data['product_info']	= $this->Product_model->ProductRequestedByOther($user_id);
		$this->load->view('Requested_Item_ByOther_HTML',$data);
	}
	
	/*********************************************
				*  My Gifts *
    ********************************************/
	public function My_Gifts()
	{		
		$this->is_logged_in();
		$user_id			=	$this->session->userdata('user_id');		
		$this->load->view('Gift_Item_HTML');
	}	
}