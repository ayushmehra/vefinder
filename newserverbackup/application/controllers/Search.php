<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();		
		
	}
	## Search ##
	function index()
	{
		//print_r($_GET); die;
		$in	=	explode('-',$_GET['in']);
		if(count($in)>2){
			redirect('/');
		}
		$cat_id	=	$in[0];
		$cat_name=	$in[1];
		
		$count							= $this->Product_model->SearchItemCount(htmlspecialchars($_GET['q']),htmlspecialchars($cat_id));
		$config["base_url"]				= base_url() . "Search?q=".$_GET['q'];
		$config["total_rows"]			= $count;
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
		$data['searchItem']		=	$_GET['q'];
		$data['search_count']	=	$count;
		$data['product']		=	$this->Product_model->SearchItem(htmlspecialchars($_GET['q']),htmlspecialchars($cat_id),$config["per_page"], htmlspecialchars($page));		
		$data['SErcat_Dat']['cat_id']	=	$cat_id;
		$data['SErcat_Dat']['cat_name']	=	urldecode($cat_name);
		$this->load->view('Search_HTML',$data);
	}
	
	function nav_cat($ind)
	{
		$in	=	explode('-',$ind);
		if(count($in)>2){
			redirect('/');
		}
		$cat_id	=	$in[0];
		$cat_name=	$in[1];
		$count							= $this->Product_model->SearchItemCount(htmlspecialchars($_GET['q']),htmlspecialchars($cat_id));
		$config["base_url"]				= base_url() . "Search/nav_cat/".$ind;
		$config["total_rows"]			= $count;
		$config["per_page"]				= 20;
		$config["uri_segment"]			= 4;
		
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
		
		$config['num_links'] 			= 4;
		
		$this->pagination->initialize($config);
		$page	=	($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data['searchItem']		=	urldecode($cat_name);
		$data['search_count']	=	$count;
		$data['product']		=	$this->Product_model->SearchItem(htmlspecialchars($_GET['q']),htmlspecialchars($cat_id),$config["per_page"], htmlspecialchars($page));		
		$data['SErcat_Dat']['cat_id']	=	$cat_id;
		$data['SErcat_Dat']['cat_name']	=	urldecode($cat_name);
		$this->load->view('Search_HTML',$data);
	}
}