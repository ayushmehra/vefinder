<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Cart extends CI_Controller {

	
	public function __construct()
	{ 
		parent::__construct();		
	}    
	 /*****************************************
               *  Cart Landing  *
     ****************************************/
	public function index()
	{
		$data['product_info']=$this->Cart_model->ProductInfo(); 
		$data['customer_bought']	=	$this->Cart_model->GetCustomerBoughtItem();
		//echo  "<pre>";print_r($data); die;
		$this->load->view('Cart_HTML',$data);
	}
	 /*****************************************
               * Empty Cart *
     ****************************************/
	 
     public function EmptyCart()
	 {
		$user_id		= 	$this->session->userdata('user_id');
		if($user_id=='')
		{
			$cart_data	=	$this->session->userdata('user_product_without_login');
			if($cart_data<>'')
			{
				$this->session->unset_userdata('user_product_without_login');
				$this->session->unset_userdata('total_product');			
				$this->session->set_userdata('total_product','0');
				print json_encode(array("exists"=>"1","message"=>"Cart Empty successfully."));
			}
			else
			{
				print json_encode(array("exists"=>"0","message"=>"Cart Allready Empty."));
			}
			die();
		}
		else
		{
			if($this->Cart_model->EmptyCart())
			{
				print json_encode(array("exists"=>"1","message"=>"Cart Empty successfully."));
			}
			else
			{
				print json_encode(array("exists"=>"0","message"=>"Cart Allready Empty."));
			}
			
			die();
		}
		
	 }	 
     
	  /*****************************************
               *  Update Quantity  *
     ****************************************/
	 
	 public function UpdateQuantity()
	 { 
		$user_id		= 	$this->session->userdata('user_id');
		$product_id		=	$_REQUEST['product_id']; 
		$arrId			=	$_REQUEST['arrId'];
		$quantity		=	$_REQUEST['quantity']; 
		$check_product_stock	=	$this->Product_model->CheckStock($product_id);
		if($user_id=='')
		{					
			$cart_data	=	$this->session->userdata('user_product_without_login');				
			if($cart_data<>'')
			{				
				if($quantity==0)
				{					
					$cart_data[$arrId]['quantity']	= 1;					
					$this->session->set_userdata('user_product_without_login',$cart_data);
					print json_encode(array("exists"=>"2","message"=>"Item Quantity is not less than One .","value"=>1));
					die();
				}
				else
				{
					if($check_product_stock<$quantity){					
						print json_encode(array("exists"=>"2","message"=>"Item Quantity is not Greater than Stock Count .","value"=>1));
					}else{
					
						$cart_data[$arrId]['quantity']	= $quantity;										
						$this->session->set_userdata('user_product_without_login',$cart_data);
						print json_encode(array("exists"=>"1","message"=>"Item Quantity Update successfully."));
					}
				}
			}
			else
			{
				print json_encode(array("exists"=>"0","message"=>"No Item In Cart ."));
			}
			die();
		}
		else
		{		
			if($quantity==0)
			{
				$this->Cart_model->UpdateProductInfo($product_id,1) ;
				print json_encode(array("exists"=>"2","message"=>"Item Quantity is not less than One .","value"=>1));
				die();
			}
			else{
				if($check_product_stock<$quantity){
						print json_encode(array("exists"=>"2","message"=>"Item Quantity is not Greater than Stock Count .","value"=>1));
				}else{
					if($this->Cart_model->updateProductInfo($product_id,$quantity))
					{				
						print json_encode(array("exists"=>"1","message"=>"Item Quantity Update successfully."));
					}
					else
					{
						print json_encode(array("exists"=>"0","message"=>"No Item In Cart ."));
					}
				}
			}			
			die();
		} 
	 }
     
	 /*****************************************
               *  Remove Item   *
     ****************************************/
	 
	 public function RemoveItem()
	 {
		$user_id		= 	$this->session->userdata('user_id');
		$count			=	1;
		$new_cart_data	=	array();
		if($user_id=='')
		{			
			$remove		=	$_REQUEST['product_id'];			
			$cart_data	=	$this->session->userdata('user_product_without_login');			
			if($cart_data<>'')
			{	
				unset($cart_data[$remove]);	
				
				$this->session->set_userdata('total_product', count($cart_data));
				foreach($cart_data as $key=> $new)
				{
					//print_r($new);
					$new_cart_data[$count]	= array ('product_id'	=>	$new['product_id'],
													 'quantity'		=>	$new['quantity']);
					$count++;
				}
				
				$this->session->set_userdata('user_product_without_login',$new_cart_data);
				print json_encode(array("exists"=>"1","message"=>"Item Removed From Cart successfully."));
			}
			else
			{
				print json_encode(array("exists"=>"0","message"=>"No Item In Cart ."));
			}
			die();
		}
		else
		{
			$remove		=	$_REQUEST['arrId'];
			if($this->Cart_model->RemoveItem($remove))
			{				
				print json_encode(array("exists"=>"1","message"=>"Item Removed From Cart successfully."));
			}
			else
			{
				print json_encode(array("exists"=>"0","message"=>"No Item In Cart ."));
			}
			die();
		}
	 }
	 /*****************************************
               *  Cart Checkout   *
     ****************************************/
	public function Checkout()
	{
		if($this->session->userdata('user_id')=='')
		{
			$this->session->set_userdata('user_cart',1);	
			$this->session->set_userdata('user_follow_list',array());
			$this->session->set_userdata('user_like_list',array());
			redirect('Login');
		}
		else{
			if(_Cart_count($this->session->userdata('user_id'))==0){
				redirect('Cart');
			}
			$user_address=$this->User_model->GetAddress(); 			
			if (empty($user_address))
			{		
				redirect('AddShippingAddress');
			}
			if(_CheckProductOutOfStockOrNot()==false)
			{
				## Redirect To Cart 
				redirect ('Cart');
			}
			else
			{	
				## Update Order Temp With User's Active Address Id
				$uid		=	$this->session->userdata('user_id');
				$cart_id	=	$this->Cart_model->GetCartActiveId($uid);
				_UpdateTempOrderWithUserAddressId($user_address->user_address_id,$cart_id);
				
				$data['user_address']	=	$user_address;
				if(@$_POST['submit']=='save') 
				{	
                                        //echo "<pre>";print_r($paymentId);
					//$vfPaymentOption	=$this->input->post('vfPaymentOption');
                                        $vfPaymentOption='credit';
					$payment_array		=	array();
					$this->session->set_userdata('payment_array',$payment_array);
					switch($vfPaymentOption)
					{
						case'credit':
						{ 
							$credit_card_name				=$this->input->post('credit_card_name');
							$credit_card_number				=$this->input->post('credit_card_number');
							$credit_month					=$this->input->post('credit_month');
							$credit_year					=$this->input->post('credit_year');
                                                        $cvv                                            =$this->input->post('cvv');
                                                        $orderId= rand(11111,99999);
                                                        $createPayment=createPaymentId($orderId);
                                                        $paymentId=  json_decode($createPayment);
                                                        $twoDigitYear=substr($this->input->post('credit_year'), -2);
                                                        $exp=$twoDigitYear.$this->input->post('credit_month');
							$payment_array['payment_type']	='Credit Card';
							$payment_array['payment_from']	=$credit_card_name;
							$payment_array['payment_number']=$credit_card_number;
							$payment_array['payment_month']	=$credit_month;
							$payment_array['payment_year']	=$credit_year;
							$payment_array['value']			=1;
                                                        $payment_array['payment_id']			=$paymentId->id;
                                                        $payment_array['exp_date']			=$exp;
                                                        $payment_array['cvv']			=$cvv;
							break;
						}
//						case'debit':
//						{ 
//							$debit_card_name					=$this->input->post('debit_card_name');
//							$debit_card_number					=$this->input->post('debit_card_number');
//							$debit_month						=$this->input->post('debit_month');
//							$debit_year							=$this->input->post('debit_year');
//							$payment_array['payment_type']		='Debit Card';
//							$payment_array['payment_from']		=$debit_card_name;
//							$payment_array['payment_number']	=$debit_card_number;
//							$payment_array['payment_month']		=$debit_month;
//							$payment_array['payment_year']		=$debit_year;
//							$payment_array['value']				=2;
//													
//							break;
//						}
//						case'net':
//						{ 
//							$net_bank	=$this->input->post('net_bank');							
//							$payment_array['payment_type']	='Net Banking';
//							$payment_array['payment_from']	=$net_bank;
//							$payment_array['value']			=3;
//							break;
//						}
//						case'emi':
//						{ 
//							$emi_from						=$this->input->post('emi_from');														
//							$payment_array['payment_type']	="EMI";
//							$payment_array['payment_from']	=$emi_from;
//							$payment_array['value']			=4;
//							break;
//						}
					}
					$this->session->set_userdata('payment_array',$payment_array);
					redirect('OrderSummary');
				}
				$this->load->view('PaymentAddress_Info_HTML',$data);
			}
		} 
	}
	/*****************************************
            *  Add Shipping Address   *
     ****************************************/
	public function AddShippingAddress()
	{
		if($this->session->userdata('user_id')=='')
		{
			redirect('Login');
		}
		$user_id	=	$this->session->userdata('user_id');
		if(@$_POST['submit']=='save') 
		{
			$full_name		=	htmlentities($this->input->post('full_name'));
			$mobile			=	htmlentities($this->input->post('mobile'));
			$address		=	htmlentities($this->input->post('address'));
			$address1		=	htmlentities($this->input->post('address1'));
			$landmark		=	htmlentities($this->input->post('landmark'));
			$city			=	htmlentities($this->input->post('city'));
			$state			=	htmlentities($this->input->post('state'));
			$country		=	htmlentities($this->input->post('country'));
			$zip_code		=	htmlentities($this->input->post('zip_code'));
			$address_type	=	htmlentities($this->input->post('type'));
			
			$db_array	=	array(	'user_id'				=>$user_id,
									'full_name' 			=>$full_name,
									'address' 				=>$address,
									'additional_address' 	=>$address1,
									'default_address' 		=>0,
									'state'					=>$state ,
									'city' 					=>$city,
									'zip_code'				=>$zip_code,
									'country' 				=>$country,
									'phone' 				=>$mobile,
									'landmark'				=>$landmark,
									'address_type'			=>$address_type,
									'status' 				=>1,
									'created_date'			=>date("Y-m-d H:i:s")
								);
			
			$data['msg']=	$this->User_model->InsertAddress($db_array);
			
			if($data['msg']==true)
			{
				redirect('Checkout');
			}
		}		
		$this->load->view('EnterAddress_Info_HTML');
	}
	
	/*****************************************
			*  Move Item to Wish List  *
     ****************************************/
	public function MoveToWishList() 
	{
		$user_id		=	$this->session->userdata('user_id');
		$product_id		=	$_REQUEST['dream'];
		$cart_id		=	$_REQUEST['wish'];
		
		if($user_id =='')
		{		
			redirect("Login");
		}
		else{
			if($this->Product_model->AddWishList($product_id))
			{ 
				$this->Cart_model->RemoveFromCart($cart_id,$user_id,$product_id);
				$cart_item		=	_Cart_count($this->session->userdata('user_id'));
				$total_price	=	$this->Cart_model->GetTotalPrice($user_id,'TempTable'); 
				print json_encode(array("exists"=>"1","message"=>"Product successfully Add to Your Dream Box.",'count'=>$cart_item,'pfro'=>$total_price));
			}
			else
			{
				print json_encode(array("exists"=>"0" ,"message"=>"All-Ready Added This product"));          
			}
		}
	}
}
?>