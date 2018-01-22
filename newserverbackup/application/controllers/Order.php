<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Order extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();		
	}
	
	/*****************************************
               *  Order Summary   *
    ****************************************/
	
	public function OrderSummary()
	{
		if($this->session->userdata('user_id')=='')
		{
			redirect('Login');
		}
		if(_Cart_count($this->session->userdata('user_id'))==0){
				redirect('Cart');
		}
		if(_CheckProductOutOfStockOrNot()==false)
		{
			## Redirect To Cart 
			redirect ('Cart');
		}
		$data['payment_info']	=$this->session->userdata('payment_array');
		$data['user_address']	=$this->User_model->GetAddress();
		$data['product_info']	=$this->Cart_model->ProductInfo(); 
               // echo "<pre>";print_r($data);//die;
		$this->load->view('PayNow_HTML',$data);
	}
	/*****************************************
        *  Make Transaction Request   *
    ****************************************/
	public function MakeTransactionRequest()
	{
		if($this->session->userdata('user_id')=='')
		{
			redirect('Login');
		}
		if(_Cart_count($this->session->userdata('user_id'))==0){
				redirect('Cart');
		}	
		if(_CheckProductOutOfStockOrNot()==false)
		{
			## Redirect To Cart 
			redirect ('Cart');
		}
                $payment_info	=$this->session->userdata('payment_array');
                //echo "<pre>";
                //print_r($payment_info);//die;
                $paymentMade=makePayment($payment_info['payment_id'],'10',$payment_info['payment_number'],$payment_info['exp_date'],'123');
                $errorArray= json_decode($paymentMade);
                //echo "<pre>";print_r($errorArray);//die;
                //$errorMessage="";
                //print_r($errorArray->errors);
                //echo count($errorArray->errors);
                if(count($errorArray->errors)>0){
                    foreach ($errorArray->errors as $key=>$value){
                        //print_r($value[0]);//die;
                        $errorMessage =$value[0];
                        $error='1';
                        //exit;
                    }
                }
                //echo "here$error";
                if($error=='1'){//die("In");
                    $this->session->set_flashdata('error_payment',$errorMessage);
                    redirect('Checkout');
                }
                //echo $errorMessage;
                //die;
                $paymentData=  json_decode($paymentMade);
		$user_id	=	$this->session->userdata('user_id');
		$cart_id	=	$this->Cart_model->GetCartActiveId($user_id);
		$this->session->set_userdata('cart_id',$cart_id);	
		$this->Cart_model->TransferDataTempToMainOrderTable($paymentData->id,$paymentData->order_id);				
		$this->Cart_model->UpdateActiveCartId($cart_id);				
		redirect('OrderPlaced');
	}
	
	## Transaction Success
	/*****************************************
               *  Order Placed   *
    ****************************************/
	
	public function OrderPlaced()
	{		
		$user_id				=$this->session->userdata('user_id');	
		$cart_id				=$this->session->userdata('cart_id');	
		$this->Cart_model->UpdateOrderFailSuccess($cart_id,3);
		$data['total_amount']	=$this->Cart_model->GetTotalPrice($user_id,'MainTable','Success');
		$data['payment_info']	=$this->session->userdata('payment_array');
		$data['user_address']	=$this->User_model->GetAddress();
		$data['product_info_array']	=$this->Cart_model->ProductInfoFromMainTable('Success');  
                //echo "<pre>";print_r($data);die;
		$this->load->view('OrderPlaced_HTML',$data);
	}
	
	## Transaction Failure	
	/*****************************************
               *  Order Placed   *
    ****************************************/
	
	public function OrderNotPlaced()
	{
		if($this->session->userdata('user_id')=='')
		{
			redirect('Login');
		}
		if(_Cart_count($this->session->userdata('user_id'))==0){
				redirect('Cart');
		}		
		$user_id				=$this->session->userdata('user_id');
		$cart_id				=$this->session->userdata('cart_id');	
		$this->Cart_model->UpdateOrderFailSuccess($cart_id,2);
		$data['total_amount']	=$this->Cart_model->GetTotalPrice($user_id,'MainTable','Failure');
		$data['payment_info']	=$this->session->userdata('payment_array');
		$data['user_address']	=$this->User_model->GetAddress();
		$data['product_info']	=$this->Cart_model->ProductInfoFromMainTable('Failure'); 
		$this->load->view('OrderPlaced_HTML',$data);
	}
	
	/*****************************************
               *  Placed Order   *
     ****************************************/
	 public function PlacedOrder()
	{
		if($this->session->userdata('user_id')=='')
		{
			redirect('Login');
		}
		$data['product_info']	=	$this->Cart_model->ProductInfoFromMainTable(); 
		$this->load->view('Placed_Order_HTML',$data);
	}
	
	/*****************************************
               *  Track Order   *
     ****************************************/
	 
	public function TrackOrder($showId)
	{
		if($this->session->userdata('user_id')=='')
		{
			redirect('Login');
		}		
		$data['sold_item_info']	=	$this->Cart_model->GetProductId_UsingShowId($showId);		
		$data['product']		=	$this->Product_model->GetSingleProduct($data['sold_item_info']->product_id,1);
		$this->load->view('Track_order_HTML',$data);
	}
	
	/*****************************************
		   *  Sold Items   *
	****************************************/
	public function SoldItem()
	{
		if($this->session->userdata('user_id')=='')
		{
			redirect('Login');
		}		
		$data['product_info']	=	$this->Cart_model->SoldItem(); 
		$this->load->view('Sold_Item_HTML',$data);
	}
	/*****************************************
		   *  Sold Items Inf0   *
	****************************************/
	public function SoldItemInfo($product_name,$garbage,$product_key)
	{
		if($this->session->userdata('user_id')=='')
		{
			redirect('Login');
		}
		$count	=	$this->Cart_model->GetSoldProductCount(htmlspecialchars($product_key));
		$config 						= array();
		$config["base_url"]				= base_url() . "Sold-Item-Info/".$product_name.'/'.$garbage.'/'.$product_key.'/';
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
		$page	=	($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
		$data['count']			=	$count;
		$data['product_name']			=	urldecode ( $product_name );
		$data['product_info']	=	$this->Cart_model->SoldItemUserListInfo(htmlspecialchars($product_key),$config["per_page"], $page); 
		$this->load->view('Sold_Item_UserList_HTML',$data);
	}
	
	public function UpdateTrackId()
	{
		$address	=	explode( '/',base64_decode($_POST['address']));
		$order_id	=	$address[0];
		$show_id	=	$address[1];
		$track_id	=	$_POST['track_id'];
		$vendor		=	$_POST['vendor'];
		if($this->Cart_model->UpdateTrackId($track_id, $order_id, $show_id, $vendor))
		{
			print json_encode(array("exists"=>1,"message"=>'Tracking Id Updated.'));
		}
		else{
			print json_encode(array("exists"=>2,"message"=>'SomeThing Went Worng. Please Try Again'));
		}	
		die();
	}
        
        function CancelOrder(){
            $this->Cart_model->cancelOrder(@$_GET['order_id']);
            redirect('CancelOrderPage?order='.@$_GET['order_id']);
        }
        
        function CancelOrderPage(){
            $this->load->view('OrderCancel_HTML');
        }
}	
?>