<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {

    public function index() {
        //checkredirection();
        //$product = $this->Product_model->getFeaturedProduct();
        //$data['product'] = array_chunk($product,2);
        $data['categoryWithProducts'] = $this->Product_model->categoryWithProducts();
        foreach ($data['categoryWithProducts'] as $key => $value) {
        	//print_r($value);die;
        	$product[] = $this->Product_model->getFeaturedProduct($value['cat_id']);
        }
        $data['product']=$product;
		$data['ad_post']			=	$this->Product_model->GetRandomAd();
        //echo "<pre>";print_r($data);die;
        $this->load->view('Department_HTML',$data);
    }
	

}
