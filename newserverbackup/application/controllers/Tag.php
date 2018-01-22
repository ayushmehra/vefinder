<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Tag extends CI_Controller {

	
	public function __construct()
	{ 
		parent::__construct();		
	}    
	 /*****************************************
               *  Star Tag Landing  *
     ****************************************/
	public function StarTag($startag)
	{
		$startag						= urldecode($startag);
		$tag_id							= $this->Extended_product_model->GetTagId($startag);
		$count							= $this->Extended_product_model->GetTagIdCountForProduct($tag_id);
		$config["base_url"]				= base_url().'/StarTag/'.$startag;
		$config["total_rows"]			= $count;
		$config["per_page"]				= 20;
		$config["uri_segment"]			= 3;
		
		$config['full_tag_open'] 		= '<ul class="pagination-list">';
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
		$data['searchItem']		=	$startag;
		$data['search_count']	=	$count;
		$data['product']		=	$this->Extended_product_model->GetAllTagProduct($tag_id,$config["per_page"], $page);		
		$this->load->view('Search_HTML',$data);
		//print_r($data['product']);
	}
}