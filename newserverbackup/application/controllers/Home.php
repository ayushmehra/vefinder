<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		
	}
	
	##################################
	##								##
	##			HOME PAGE			##
	##								##
	##################################
	
	## Home Page
	public function index($condition='')
	{
		checkredirection();	
		$config 						= array();
		$config["base_url"]				= base_url() . "home/";
		$config["total_rows"]			= _GetProductCount('Product');
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
		$data['product']		=	$this->Product_model->GetProductOnCondition($condition,$config["per_page"], $page);
		if($condition=='Browsing-History')
		{
			$data['product']	=	$this->Product_model->GetBrowsingHistory();
		}			
		$data['condition']	=	$condition;
		error_reporting(0);
        $data['eventsData']=$this->Product_model->getEvents();
                //echo "<pre>";print_r($data);die;
		$this->load->view('Home_HTML',$data);
	}
	
	## SEARCH BAR AUTO COMPLETE
	
	public function ajax_location()
	{
		@$keyword = '%'.$_POST['keyword'].'%';
		@$list= 	$this->Product_model->Product($keyword);
		if($list)
		{
			foreach (@$list as $rs)
			{
				// put in bold the written text
				@$product_name = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['product_name']);
				// add new option
				echo '<li onclick="set_item(\''.str_replace("'", "\'", $rs['product_name']).'\')">'.$product_name.'</li>';					
			}
		}
		else{
			echo '<li>No Data Found</li>';
		}
	}
	
	public function Feedback()
	{
		$user_id		=	$this->session->userdata('user_id');
		$product_id	=	$_POST['product_id'];
		$message	=	$_POST['message'];
		if($user_id =='')
		{
			print json_encode(array("exists"=>"2" ,"message"=>"Please Login First"));
			die();
		}
		else
		{
			$msg	= 	$this->Product_model->Feedback($product_id, $message, $user_id);
			print json_encode(array("exists"=>"1","message"=>$msg));
			die();
		}		
	}
	
	public function CustomerBought()
	{
		$config 						= array();
		$config["base_url"]				= base_url() . "Customer-Bought/";
		$config["total_rows"]			= _GetProductCount('Order');
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
		$data['product']		=	$this->Cart_model->GetCustomerBoughtItemFull($config["per_page"], $page);
		$this->load->view('CustomerBought_HTML',$data);
	}
}
