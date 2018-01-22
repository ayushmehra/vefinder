<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Ad extends CI_Controller {
		
		
		public function __construct()
		{ 
			parent::__construct();		
		}    
		/*****************************************
			*  Cart Landing  *
		****************************************/
		public function index()
		{
			if($this->session->userdata('user_id')=='')
			{	
				redirect('Login');
			}
			if(isset($_POST) && (@$_POST['submit'] == 'Proceed'))
			{
				$ad					=	$this->input->post('ad');
				$endDate			=	$this->input->post('end_date'); 
				$headline			=	$this->input->post('headline');
				$startDate			=	$this->input->post('start_date');
				$product_link		=	$this->input->post('product_link'); 
				for($i=0;$i<count($ad);$i++)
				{
					if($ad[$i] == 'banner-ad'){
						$ad_type=1;
						$width="1500";
						$height="360";
					}
					if($ad[$i] == 'sponsor-ad'){
						$ad_type=2;
						$width="300";
						$height="300";
					}
					if($ad[$i] == 'footer-ad'){
						$ad_type=3;
						$width="450";
						$height="250";
					}
					if($ad[$i] == 'landing-ad'){
						$ad_type=4;
						$width="820";
						$height="440";
					}
					$this->Ad_model->InsertAd($ad_type,$headline,$product_link,$startDate,$endDate,$width,$height);
				}
				redirect('/');
			}
			$this->load->view('CreateAd_HTML',$data);
		}
	}	