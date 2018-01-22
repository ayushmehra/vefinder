<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();		
		
	}		
	/*********************************************
			*  Add Like To Product	*
    ********************************************/
	
	public function Like()
	{
		$user_data	=	$this->session->userdata('user_id');
		$product_id	=	$_REQUEST['product_id'];	
		$from		=	$_REQUEST['from'];
		if($user_data =='')
		{		
			$this->session->set_userdata('user_like_list',$product_id);	
			print json_encode(array("exists"=>"2" ,"message"=>"Please Login First"));
			die();
		}
		else
		{		
			$msg=$this->Product_model->ProductLike($product_id,$from);
			//print_r($msg);
			if($msg['msg']<>'')
			{        
				print json_encode(array("exists"=>"1","message"=>$msg['msg'],"likeText"=>$msg['like']));
			}
			else
			{
				print json_encode(array("exists"=>"0" ,"message"=>"Something Went Worng."));          
			}
		  die();
		}
	}
	/*********************************************
			*  Post Product 
    ********************************************/
	public function Post()
	{
		if($this->session->userdata('user_id')=='')
		{	
			redirect('Login');
		}
		if(@$_REQUEST['submit'] == 'Add Product')
		{
			 
			$product_name			=	$this->input->post('product_name');
			$cat_id					=	$this->input->post('cat_id');
			$sub_cat_id				=	$this->input->post('sub_cat_id');
			$product_description	=	$this->input->post('product_description');
			$quantity				=	$this->input->post('quantity');
			$stock					=	$this->input->post('stock');
			$price					=	$this->input->post('price');
			$discount				=	$this->input->post('discount');
			$discount_price			=	$this->input->post('discount_price');
			$weight					=	$this->input->post('weight');
			$shipping_fee			=	$this->input->post('shipping_fee');
			$ships_in				=	$this->input->post('ships_in');
			$ships_over				=	$this->input->post('ships_over');
			$shippingPayment		=	$this->input->post('shippingPayment');
			$tags					=	$this->input->post('tags');
			$product_color			=	$this->input->post('product_color');
			$product_size			=	$this->input->post('size');
			$product_type_id		=	$this->input->post('product_type_id');
			$product_features		=	$this->input->post('product_features');
			
			$postType_BidOrNormal	=	$this->input->post('bid');
			$bid_limit				=	$this->input->post('bid_limit');
			$bid_startDate			=	$this->input->post('bid_startDate');
			$bid_endDate			=	$this->input->post('bid_endDate'); 
			$bid_startTime			=	$this->input->post('bid_startTime');
			$bid_endTime			=	$this->input->post('bid_endTime'); 
			
			if($_FILES['image1']['name'])
			{
				@$image1			=	$_FILES['image1']['name'];
				$ext_image1			=	pathinfo($image1, PATHINFO_EXTENSION);
				$image1_name		=	preg_replace('/\s+/', '_', strtolower($product_name)).'1_'.time().'.'.$ext_image1;
			}
			else{
				$image1_name='';
			}
			
			if($_FILES['image2']['name'])
			{
				@$image2			=	$_FILES['image2']['name'];
				$ext_image2			=	pathinfo($image2, PATHINFO_EXTENSION);
				$image2_name		=	preg_replace('/\s+/', '_', strtolower($product_name)).'2_'.time().'.'.$ext_image2;	
			}
			else{
				$image2_name='';
			}
			if($_FILES['image3']['name'])
			{
				@$image3			=	$_FILES['image3']['name'];
				$ext_image3			=	pathinfo($image3, PATHINFO_EXTENSION);
				$image3_name		=	preg_replace('/\s+/', '_', strtolower($product_name)).'3_'.time().'.'.$ext_image3;
			}
			else{
				$image3_name='';
			}
			if($_FILES['image4']['name'])
			{
				@$image4			=	$_FILES['image4']['name'];
				$ext_image4			=	pathinfo($image4, PATHINFO_EXTENSION);
				$image4_name		=	preg_replace('/\s+/', '_', strtolower($product_name)).'4_'.time().'.'.$ext_image4;
			}
			else{
				$image4_name='';
			}
			
			$data['Submit_Product']= $this->Product_model->SubmitProduct($product_name,$cat_id,$product_description,$quantity,
										$stock,$price,$discount,$discount_price,$weight,$shipping_fee,
										$ships_in,$ships_over,$shippingPayment,$tags,$product_color,$product_size,
										$product_type_id,$product_features,$image1_name,$image2_name,
										$image3_name,$image4_name,$postType_BidOrNormal,$bid_limit,$bid_startDate,$bid_endDate,
										$bid_startTime,$bid_endTime,$sub_cat_id);
			redirect('Home');
			
		}
		$data['catdata']	=	_Get_dropdown('category');
		$this->load->view('SubmitPost_HTML',$data);
	}
	
	function GetSubCatAjax()
	{
		if (isset($_POST) && isset($_POST['cat_id'])) 
		{
			$cat_id		=	$_POST['cat_id'];
			$Subcat		=	_GetSubCategory($cat_id);
			$issuelistdata='<option value="">- Select Sub Category -</option>';
			if($Subcat)
			{
				foreach ($Subcat as $issuelist) 
				{
					$issuelistdata.='<option value="'.$issuelist->subcat_id.'">'.$issuelist->sub_cat_name.'</option>';
				}
			}
			echo $issuelistdata;
		} 
	}
	/*********************************************
			*  Add Comment To Product	*
    ********************************************/
	
	public function Comment()
	{
		$user_data		=	$this->session->userdata('user_id');
		$product_data	=	explode('/',$_REQUEST['product_id']);
		$product_id		=	base64_decode($product_data[1]);		 
		$com_id			=	$_REQUEST['com_id'];		 
		$commentText	=	$_REQUEST['comment'];		
		if($user_data =='')
		{		
			$this->session->set_userdata('user_like_list',$product_data[1]);	
			print json_encode(array("exists"=>"2" ,"message"=>"Please Login First"));
			die();
		}
		else
		{		
			$msg=$this->ProductComment_model->AddComment($product_id,$com_id,$commentText);
			
			if($msg['msg']<>'')
			{        
				print json_encode(array("exists"=>"1","message"=>$msg['msg']));
			}
			else
			{
				print json_encode(array("exists"=>"0" ,"message"=>"Something Went Worng."));          
			}
		  die();
		}
	}	
	/*********************************************
			*  Add Productn As Ad	*
    ********************************************/
	public function Add_Ad()
	{
		if(@$_REQUEST['submit'] == 'Add Advertisement')
		{
			
			$product_name			=	$this->input->post('product_name');
			$cat_id					=	$this->input->post('cat_id');
			$product_description	=	$this->input->post('product_description');
			$web_url				=	$this->input->post('web_url');
			
			if($_FILES['adimage1']['name'])
			{
				@$image1			=	$_FILES['adimage1']['name'];
				$ext_image1			=	pathinfo($image1, PATHINFO_EXTENSION);
				$image1_name		=	preg_replace('/\s+/', '_', strtolower($product_name)).'1_'.time().'.'.$ext_image1;
			}
			else{
				$image1_name='';
			}
			
			if($_FILES['adimage2']['name'])
			{
				@$image2			=	$_FILES['adimage2']['name'];
				$ext_image2			=	pathinfo($image2, PATHINFO_EXTENSION);
				$image2_name		=	preg_replace('/\s+/', '_', strtolower($product_name)).'2_'.time().'.'.$ext_image2;	
			}
			else{
				$image2_name='';
			}
			if($_FILES['adimage3']['name'])
			{
				@$image3			=	$_FILES['adimage3']['name'];
				$ext_image3			=	pathinfo($image3, PATHINFO_EXTENSION);
				$image3_name		=	preg_replace('/\s+/', '_', strtolower($product_name)).'3_'.time().'.'.$ext_image3;
			}
			else{
				$image3_name='';
			}
			if($_FILES['adimage4']['name'])
			{
				@$image4			=	$_FILES['adimage4']['name'];
				$ext_image4			=	pathinfo($image4, PATHINFO_EXTENSION);
				$image4_name		=	preg_replace('/\s+/', '_', strtolower($product_name)).'4_'.time().'.'.$ext_image4;
			}
			else{
				$image4_name='';
			}
			
			$data['Submit_Product']= $this->Product_model->SubmitAd($product_name,$cat_id,$product_description,$web_url,
										$image1_name,$image2_name,$image3_name,$image4_name);			
			redirect('Home');
		}
		
	}	
	/*********************************************
			*  Add Product Cart
    ********************************************/
	
	public function Add_Product()
	{
		$user_data	=	$this->session->userdata('user_id');
		$product_id	=	$_REQUEST['product_id'];
		$quantity	=	$_REQUEST['quantity'];
		$without_login= array();
		//$this->session->sess_destroy(); die();
		if($user_data =='')
		{		
			 $without_login		=	$this->session->userdata('user_product_without_login');				 
			 $count=count($without_login);
			 if($count<=0)
			 {
				 $count=1;
			 }
			 else
			 {
				 $count++;
			 }
			 $Add_product_without_login	= array('product_id'	=>	$product_id,
												'quantity'	=>	$quantity);
			 $without_login[$count]		=	 $Add_product_without_login;			
			 $without	=array_unique($without_login, SORT_REGULAR);			 
			 $this->session->set_userdata('user_product_without_login',$without);	        
             $this->session->set_userdata('total_product', count($without));
			 print json_encode(array("exists"=>"1" ,"message"=>"Product successfully Added to Cart","count"=>count($without)));
			 die();
		}
		else
		{
			$seller_id	=	_Product_SellerUserId(base64_decode($product_id));
			if($seller_id<>0){
				if($user_data!=$seller_id)
				{
					$Add_product_with_login= array('product_id'	=>	base64_decode($product_id),
												   'quantity'	=>	$quantity );
											   
					if($this->Product_model->AddProduct($Add_product_with_login))
					{ 
						$cart_item	=	_Cart_count($this->session->userdata('user_id'));
						print json_encode(array("exists"=>"1","message"=>"Product successfully Added to Cart.","count"=>$cart_item));
					}
					else
					{
						print json_encode(array("exists"=>"0" ,"message"=>"All-Ready Added This product"));          
					}
					die();
				}
				else{
					print json_encode(array("exists"=>"0" ,"message"=>"You Can Only Buy Other Seller Items.")); 
				}
			}
			else{
				print json_encode(array("exists"=>"0" ,"message"=>"Something Went Worng,Please Try After Some Time.")); 
			}
		}
	}
	
	/*********************************************************
			*  Add Product In Cart From Wish List
    **********************************************************/
	
	public function AddToCartFromWishList()
	{
		$user_id	=	$this->session->userdata('user_id');
		$product_id	=	$_REQUEST['dream'];
		$wish_id	=	$_REQUEST['wish'];
		$Add_product_with_login= array('product_id'	=>	base64_decode($product_id),
									   'quantity'	=>	1 );
								   
		if($this->Product_model->AddProduct($Add_product_with_login))
		{ 
			$cart_item	=	_Cart_count($this->session->userdata('user_id'));
			$this->Product_model->MoveTo_Cart_From_WishList($wish_id,$user_id,base64_decode($product_id));
			$count=$this->Product_model->WishListCount();
			print json_encode(array("exists"=>"1","message"=>"Product successfully Added to Cart.","count"=>$cart_item,'mycount'=>$count));
		}
		else
		{
			print json_encode(array("exists"=>"0" ,"message"=>"All-Ready Added This product"));          
		}
		die();
	}
	
		
	/*********************************************
			*  Add Product In Wish List
    ********************************************/
	
	public function Add_To_Wish_List()
	{
		$user_data	=	$this->session->userdata('user_id');
		$product_id	=	$_REQUEST['product_id'];
		
		if($user_data =='')
		{			
			 $this->session->set_userdata('user_wish_list',$product_id);	
				print json_encode(array("exists"=>"0" ,"message"=>"Please Login First"));
			 die();
		}
		else
		{
			$seller_id	=	_Product_SellerUserId(base64_decode($product_id));
			if($seller_id<>0){
				if($user_data!=$seller_id)
				{
					if($this->Product_model->AddWishList($product_id))
					{        
						print json_encode(array("exists"=>"1","message"=>"Product successfully Add to Your Dream Box."));
					}
					else
					{
						print json_encode(array("exists"=>"0" ,"message"=>"All-Ready Added This product"));          
					}
					die();
				}
				else
				{
					print json_encode(array("exists"=>"0" ,"message"=>"You Can Only Add Other Seller Items In Your Dream Box.")); 
				}
			}
			else
			{
				print json_encode(array("exists"=>"0" ,"message"=>"Something Went Worng,Please Try After Some Time.")); 
			}
		}
	}
	/*********************************************
			*  Product In Wish List
    ********************************************/
	
	public function MyWishList()
	{
		$user_id	=	$this->session->userdata('user_id');
		if($user_id=='')
		{
			redirect('Login');
		}
		$data['wish_count']	=	$this->Product_model->WishListCount();
		$data['wish_list']	=	$this->Product_model->ProductInWishList($user_id);
		$this->load->view('DreamBox_HTML',$data);	
	}
	
	/***************************************************
			*  Rempve Product From  Wish List *
    ****************************************************/
	
	public function RemoveFromWishList()
	{		
		$product_id	=	$_REQUEST['dream'];
		$wish_id	=	$_REQUEST['wish'];
		if($this->Product_model->RemoveFromWishlist(base64_decode($product_id),$wish_id))
		{
			$count=$this->Product_model->WishListCount();
			print json_encode(array("exists"=>"1","message"=>"Product successfully Removed From Dream Box.",'mycount'=>$count));
		}
		else
		{
			print json_encode(array("exists"=>"0" ,"message"=>"Something Went Worng"));          
		}
		 die();
	}
	
	/*********************************************
			*  Product Full View
    ********************************************/
	public function ProductFullView($garbage,$key,$garbage1,$com='')
	{
		//echo "<pre>";print_r($_SESSION);die;
		$product_id		=	base64_decode($key);
		if(get_cookie('product'))
		{
			$serialized 			=	get_cookie('product');
			$arrayData				=	unserialize($serialized);			
			$count					=	count($arrayData);
			$arrayData[$count+1]	=	$product_id;
			$value					=	serialize(array_values(array_unique($arrayData)));			
		}
		else{
			$id		=	array($product_id);			
			$value	=	serialize($id);
		}				
		$cookie = array('name' => 'product',
						'value' => $value,
						'expire' => 222222222,
			);		
			
			
		$this->input->set_cookie($cookie);
		$this->input->cookie('product', TRUE);
		$user_id	=	$this->session->userdata('user_id');
		if($user_id<>'')
		{
			$this->Product_model->SetProductWatcher($product_id, $user_id);
		}
		$data['captcha_image']		=	_CreatCaptcha();		
		$data['browsing_history']	=	$this->Product_model->GetBrowsingHistory();
		$data['product']			=	$this->Product_model->GetSingleProduct($product_id);		
		$data['customer_bought']	=	$this->Cart_model->GetCustomerBoughtItem($data['product']->cat_id);
		$data['comment_data']		=	$this->ProductComment_model->GetCommentForProduct($product_id);
		$data['ad_post']			=	$this->Product_model->GetRandomAd();	
		
		if($com<>'')
		{ 
			$data['comment_box']	=	1;
		}
		else{
			$data['comment_box']	=0	;
		}
		error_reporting(0);
		$data['eventsData']=$this->Product_model->getFanEvents($this->session->userdata('user_id'));
		$this->load->view('ProductFullView_HTML',$data);
	}
	
	function RemoveProdut()
	{
		$user_id	=	$this->session->userdata('user_id');
		if($user_id=='')
		{
			redirect('Login');
		}
		else{			
			$product_id		=	base64_decode($_POST['Div_id']);
			$msg	=	$this->Product_model->RemoveProdut($product_id);
			if($msg<>'')
			{
				print json_encode(array("exists"=>"1","message"=>$msg,"val"=>$product_id));
			}
			else{
				print json_encode(array("exists"=>"1","message"=>'Something Went Worng. Try After Some Time'));
			}
		}
	}
	
	function Edit_Product($garbage,$key,$garbage1,$com='')
	{
		$product_id			=	base64_decode($key);
		_CheckThisProductIsMine($product_id);
		$data['product']	=	$this->Product_model->GetSingleProduct($product_id);
		if($data['product']->post_type==1)
		{
			if(@$_REQUEST['submit'] == 'Edit Product')
			{
				
				$product_name			=	$this->input->post('product_name');
				$cat_id					=	$this->input->post('cat_id');
				$product_description	=	$this->input->post('product_description');
				$quantity				=	$this->input->post('quantity');
				$stock					=	$this->input->post('stock');
				$price					=	$this->input->post('price');
				$discount				=	$this->input->post('discount');
				$discount_price			=	$this->input->post('discount_price');
				$weight					=	$this->input->post('weight');
				$shipping_fee			=	$this->input->post('shipping_fee');
				$ships_in				=	$this->input->post('ships_in');
				$ships_over				=	$this->input->post('ships_over');
				$shippingPayment		=	$this->input->post('shippingPayment');
				$tags					=	$this->input->post('tags');
				$product_color			=	$this->input->post('product_color');
				$product_size			=	$this->input->post('size');
				$product_type_id		=	$this->input->post('product_type_id');
				$product_features		=	$this->input->post('product_features');
				
				$postType_BidOrNormal	=	$this->input->post('bid');
				$bid_limit				=	$this->input->post('bid_limit');
				$bid_startDate			=	$this->input->post('bid_startDate');
				$bid_endDate			=	$this->input->post('bid_endDate'); 
				$bid_startTime			=	$this->input->post('bid_startTime');
				$bid_endTime			=	$this->input->post('bid_endTime'); 
				
				if(@@$_FILES['image1']['name'])
				{
					@$image1			=	$_FILES['image1']['name'];
					$ext_image1			=	pathinfo($image1, PATHINFO_EXTENSION);
					$image1_name		=	preg_replace('/\s+/', '_', strtolower($product_name)).'1_'.time().'.'.$ext_image1;
				}
				else{
					$image1_name='';
				}
				
				if(@@$_FILES['image2']['name'])
				{
					@$image2			=	$_FILES['image2']['name'];
					$ext_image2			=	pathinfo($image2, PATHINFO_EXTENSION);
					$image2_name		=	preg_replace('/\s+/', '_', strtolower($product_name)).'2_'.time().'.'.$ext_image2;	
				}
				else{
					$image2_name='';
				}
				if(@@$_FILES['image3']['name'])
				{
					@$image3			=	$_FILES['image3']['name'];
					$ext_image3			=	pathinfo($image3, PATHINFO_EXTENSION);
					$image3_name		=	preg_replace('/\s+/', '_', strtolower($product_name)).'3_'.time().'.'.$ext_image3;
				}
				else{
					$image3_name='';
				}
				if(@@$_FILES['image4']['name'])
				{
					@$image4			=	$_FILES['image4']['name'];
					$ext_image4			=	pathinfo($image4, PATHINFO_EXTENSION);
					$image4_name		=	preg_replace('/\s+/', '_', strtolower($product_name)).'4_'.time().'.'.$ext_image4;
				}
				else{
					$image4_name='';
				}
				
				$data['Submit_Product']= $this->Product_model->EditNormalProduct($product_name,$cat_id,$product_description,$quantity,
											$stock,$price,$discount,$discount_price,$weight,$shipping_fee,
											$ships_in,$ships_over,$shippingPayment,$tags,$product_color,$product_size,
											$product_type_id,$product_features,$image1_name,$image2_name,
											$image3_name,$image4_name,$postType_BidOrNormal,$product_id);
			}
			$data['product']	=	$this->Product_model->GetSingleProduct($product_id);
			$this->load->view('Edit_Product_HTML',$data);
		}
		if($data['product']->post_type==2)
		{
			if(@$_REQUEST['submit'] == 'Edit Bid Product')
			{
				
				$product_name			=	$this->input->post('product_name');
				$cat_id					=	$this->input->post('cat_id');
				$product_description	=	$this->input->post('product_description');
				$quantity				=	$this->input->post('quantity');
				$stock					=	$this->input->post('stock');
				$price					=	$this->input->post('price');
				$discount				=	$this->input->post('discount');
				$discount_price			=	$this->input->post('discount_price');
				$weight					=	$this->input->post('weight');
				$shipping_fee			=	$this->input->post('shipping_fee');
				$ships_in				=	$this->input->post('ships_in');
				$ships_over				=	$this->input->post('ships_over');
				$shippingPayment		=	$this->input->post('shippingPayment');
				$tags					=	$this->input->post('tags');
				$product_color			=	$this->input->post('product_color');
				$product_size			=	$this->input->post('size');
				$product_type_id		=	$this->input->post('product_type_id');
				$product_features		=	$this->input->post('product_features');
				
				$postType_BidOrNormal	=	$this->input->post('bid');
				$bid_limit				=	$this->input->post('bid_limit');
				$bid_startDate			=	$this->input->post('bid_startDate');
				$bid_endDate			=	$this->input->post('bid_endDate'); 
				$bid_startTime			=	$this->input->post('bid_startTime');
				$bid_endTime			=	$this->input->post('bid_endTime'); 
				
				if(@$_FILES['image1']['name'])
				{
					@$image1			=	$_FILES['image1']['name'];
					$ext_image1			=	pathinfo($image1, PATHINFO_EXTENSION);
					$image1_name		=	preg_replace('/\s+/', '_', strtolower($product_name)).'1_'.time().'.'.$ext_image1;
				}
				else{
					$image1_name='';
				}
				
				if(@$_FILES['image2']['name'])
				{
					@$image2			=	$_FILES['image2']['name'];
					$ext_image2			=	pathinfo($image2, PATHINFO_EXTENSION);
					$image2_name		=	preg_replace('/\s+/', '_', strtolower($product_name)).'2_'.time().'.'.$ext_image2;	
				}
				else{
					$image2_name='';
				}
				if(@$_FILES['image3']['name'])
				{
					@$image3			=	$_FILES['image3']['name'];
					$ext_image3			=	pathinfo($image3, PATHINFO_EXTENSION);
					$image3_name		=	preg_replace('/\s+/', '_', strtolower($product_name)).'3_'.time().'.'.$ext_image3;
				}
				else{
					$image3_name='';
				}
				if(@$_FILES['image4']['name'])
				{
					@$image4			=	$_FILES['image4']['name'];
					$ext_image4			=	pathinfo($image4, PATHINFO_EXTENSION);
					$image4_name		=	preg_replace('/\s+/', '_', strtolower($product_name)).'4_'.time().'.'.$ext_image4;
				}
				else{
					$image4_name='';
				}
				
				$data['Submit_Product']= $this->Product_model->EditBidProduct($product_name,$cat_id,$product_description,$quantity,
											$stock,$price,$discount,$discount_price,$weight,$shipping_fee,
											$ships_in,$ships_over,$shippingPayment,$tags,$product_color,$product_size,
											$product_type_id,$product_features,$image1_name,$image2_name,
											$image3_name,$image4_name,$postType_BidOrNormal,$bid_limit,$bid_startDate,$bid_endDate,
											$bid_startTime,$bid_endTime,$product_id);
			}
			$data['product']	=	$this->Product_model->GetSingleProduct($product_id);
			$this->load->view('Edit_Bid_Product_HTML',$data);
		}
	}
}