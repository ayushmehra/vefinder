<?php 
class Cart_model extends CI_Model{
   
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	} 
	/*****************************************
               *  Cart Summary   *
    ****************************************/
	public function ProductInfo()
	{
        $productInfo	=	array(); 
        $user_data		= 	$this->session->userdata('user_id');
		if($this->session->userdata('user_id')=='')
		{		
			$data			=	$this->session->userdata('user_product_without_login');			
			if($data<>'')
			{
				$count=1;    
				foreach($data as $key=>$pro)
				{	     
					$product_id	=	base64_decode($pro['product_id']);
					$productInfo[$count]	= $this->Product_model->GetSingleProduct($product_id,1);	              
					$productInfo[$count]->quantity	= $pro['quantity'];
					$count++;					      
				}
			}
		}
		else
		{
			$this->db->select('vefinder_order_temp.order_id,vefinder_order_temp.user_id,
			vefinder_order_temp.product_id,vefinder_order_temp.quantity,vefinder_order_temp.created_date');
			$this->db->from('vefinder_order_temp');
			$this->db->where('vefinder_order_temp.user_id', $user_data);
			$this->db->where("vefinder_order_temp.status",1);
			$this->db->order_by('vefinder_order_temp.created_date', "desc");
			$query  = 	$this->db->get();
			$data	=	$query->result();
			$count	=	1;  			
			if($data)
			{	
				foreach($data as $key=>$pro)
				{	     
					$product_id	=	$pro->product_id;
					$quantity	=	$pro->quantity;
					$order_id	=	$pro->order_id;
					
					$productInfo[$count]					= $this->Product_model->GetSingleProduct($product_id,1);
					$productInfo[$count]->quantity			= $pro->quantity;
					$productInfo[$count]->order_id			= $pro->order_id;	
					$productInfo[$count]->cart_created_date	= $pro->created_date;						
					$productInfo[$count]->is_like			= $this->Product_model->IsProductLiked($product_id);	
					$count++;       
				}
			}
		}
        return $productInfo;
    }
	
	 /*********************************************
				* Remove Item from Cart
    ********************************************/
    
    public function RemoveItem($product_id)
	{
		$user_id	= $this->session->userdata('user_id');
		$this->db->select('order_id,user_id,product_id,quantity');
		$this->db->from('vefinder_order_temp');
		$this->db->where('user_id', $user_id);
		$this->db->where('product_id', $product_id);
		$this->db->where("status =1");
		$query  = 	$this->db->get();
		if($query->num_rows()>0)
		{
			$data=array('updated_date'			=>  date("Y-m-d H:i:s"),
						'status'				=>	0
							);
			$this->db->where('user_id', $user_id);
			$this->db->where('product_id', $product_id);
			$this->db->update('vefinder_order_temp', $data);			
			if($this->db->affected_Rows())
			{
				return true;
			}
		}
		else
		{
			return false;		
		}        
    }
	
	/******************************
			*** Empty Cart ***
    *******************************/
    
    public function EmptyCart()
	{
        $user_id	= $this->session->userdata('user_id');
		$this->db->select('order_id,user_id,product_id,quantity');
		$this->db->from('vefinder_order_temp');
		$this->db->where('user_id', $user_id);
		$this->db->where("status =1");
		$query  = 	$this->db->get();
		if($query->num_rows()>0)
		{
			$data=array('updated_date'			=>  date("Y-m-d H:i:s"),
						'status'				=>	0
							);
			$this->db->where('user_id', $user_id);
			$this->db->update('vefinder_order_temp', $data);			
			if($this->db->affected_Rows())
			{
				return true;
			}
		}
		else
		{
			return false;		
		}
		
    }
	
	/*********************************************
    *  Update Qunatity in cart
    ********************************************/
    public function UpdateProductInfo($product_id,$updateQunatity)
	{
		$user_id	= $this->session->userdata('user_id');
		
		$data=array('updated_date'			=>  date("Y-m-d H:i:s"),
					'quantity'				=>	$updateQunatity
						);
		$this->db->where('user_id', $user_id);
		$this->db->where('product_id', $product_id);
		$this->db->where('status', 1);
		$this->db->update('vefinder_order_temp', $data);			
		if($this->db->affected_Rows())
		{
			return true;
		}		
		else
		{
			return false;		
		}      
        
    }
	
	 /*********************************************
				* Remove Item from Cart
    ********************************************/
    
    public function RemoveFromCart($cart_id,$user_id,$product_id)
	{
		$user_id	= $this->session->userdata('user_id');
		$this->db->select('order_id,user_id,product_id,quantity');
		$this->db->from('vefinder_order_temp');
		$this->db->where('user_id', $user_id);
		$this->db->where('product_id', base64_decode($product_id));
		$this->db->where('order_id', $cart_id);
		$this->db->where("status =1");
		$query  = 	$this->db->get();
		if($query->num_rows()>0)
		{
			$data=array('updated_date'			=>  date("Y-m-d H:i:s"),
						'status'				=>	0
							);
			$this->db->where('user_id', $user_id);
			$this->db->where('order_id', $cart_id);
			$this->db->where('product_id', base64_decode($product_id));
			$this->db->update('vefinder_order_temp', $data);			
			if($this->db->affected_Rows())
			{
				return true;
			}
		}
		else
		{
			return false;		
		}        
    }
	/*****************************************
            *  Get Total Price   *
    ****************************************/
	function GetTotalPrice($user_id,$case,$for='')
	{
		$total_price	=	0;
		switch($case)
		{
			case'MainTable':
			{
				$this->db->select('vefinder_order.product_id,vefinder_order.quantity,
				`vefinder_product`.`product_price`,`vefinder_product`.`product_discount_pricing`');
				$this->db->from('vefinder_order');
				$this->db->join('vefinder_product', 'vefinder_order.product_id=vefinder_product.product_id');
				$this->db->where('vefinder_order.user_id', $user_id);	
				if($for=='Success')
				{
					$this->db->where("vefinder_order.status ",3); ## Order Success
				}
				if($for=='Failure'){
					$this->db->where("vefinder_order.status ",2); ## Order Fail
				}
				$query  = 	$this->db->get();
				if($query->num_rows()>0)
				{			
					$data			=	$query->result();
					foreach($data as $product)
					{
						if($product->product_discount_pricing<>0){
							$total_price = $total_price + ($product->product_discount_pricing * $product->quantity);	
						}else{
							$total_price = $total_price + ($product->product_price * $product->quantity);						
						}			
					}
				}		
				break;
			}
			case'TempTable':
			{
				$this->db->select('vefinder_order_temp.product_id,vefinder_order_temp.quantity,
				`vefinder_product`.`product_price`,`vefinder_product`.`product_discount_pricing`');
				$this->db->from('vefinder_order_temp');
				$this->db->join('vefinder_product', 'vefinder_order_temp.product_id=vefinder_product.product_id');
				$this->db->where('vefinder_order_temp.user_id', $user_id);		
				$this->db->where("vefinder_order_temp.status ",1);
				$query  = 	$this->db->get();
				if($query->num_rows()>0)
				{			
					$data			=	$query->result();
					foreach($data as $product)
					{
						if($product->product_discount_pricing<>0){
							$total_price = $total_price + ($product->product_discount_pricing * $product->quantity);	
						}else{
							$total_price = $total_price + ($product->product_price * $product->quantity);						
						}			
					}
				}		
				break;
			}
		}
			
		return $total_price;
	}	
	/************************************************************
            *  Transfer Data Temp To Main Order Table   *
    *************************************************************/
	function TransferDataTempToMainOrderTable($transactionId,$orderId)
	{
		$user_id	= $this->session->userdata('user_id');
		$this->db->select('vefinder_order_temp.*');
		$this->db->from('vefinder_order_temp');
		$this->db->where('vefinder_order_temp.user_id', $user_id);
		$this->db->where("vefinder_order_temp.status",1);
		$this->db->order_by('vefinder_order_temp.created_date', "desc");
		$query  = 	$this->db->get();
		$data	=	$query->result();
		if($data)
		{	
			foreach($data as $key=>$pro)
			{
				$pro->temp_id	=	$pro->order_id;
				$pro->payment_id	=       $transactionId;
                                $pro->show_order_id	=	$orderId;
				$pro->updated_date	=	'0000-00-00 00:00:00';
				$pro->created_date	=	date("Y-m-d H:i:s");
				//unset($pro->order_id);							
				$this->db->insert('vefinder_order',$pro);				
				$this->UpdateTempRecord($pro->temp_id,$pro->product_id);				
			}
		}
		
	}	
	function UpdateTempRecord($temp_id,$product_id)
	{
		$user_id	= $this->session->userdata('user_id');
		$data		= array('updated_date'			=>  date("Y-m-d H:i:s"),
							'status'				=>	2
						);
		$this->db->where('user_id', $user_id);
		$this->db->where('order_id', $temp_id);
		$this->db->where('product_id',$product_id);
		$this->db->update('vefinder_order_temp', $data);			
		if($this->db->affected_Rows())
		{
			return true;
		}
	}
	function UpdateActiveCartId($cart_id)
	{
		$user_id	= $this->session->userdata('user_id');
		$data		= array('updated_date'			=>  date("Y-m-d H:i:s"),
							'status'				=>	2
						);
		$this->db->where('user_id', $user_id);
		$this->db->where('cart_id', $cart_id);		
		$this->db->update('vefinder_user_cart', $data);			
		if($this->db->affected_Rows())
		{
			return true;
		}
	}
	
	function UpdateOrderFailSuccess($cart_id,$status)
	{
		$user_id	= $this->session->userdata('user_id');
		$data		= array('updated_date'			=>  date("Y-m-d H:i:s"),
							'status'				=>	$status
						);
		$this->db->where('user_id', $user_id);
		$this->db->where('cart_id', $cart_id);		
		$this->db->update('vefinder_order', $data);			
		if($this->db->affected_Rows())
		{
			return true;
		}
	}
	
	/*********************************
		*** Check Active Cart Id ****
	**********************************/
	
	function GetCartActiveId($user_id)
	{		
		$this->db->select('`cart_id`');
		$this->db->from('vefinder_user_cart');		
		$this->db->where('user_id', $user_id);
		$this->db->where('status', 1);
		$q 		=	$this->db->get();
		$data	=	$q->row();
		if($data)
		{
			return $data->cart_id;						
		}
		else
		{	
			return 0;					
		}
	}
	
	/*********************************
		*** Create Active Cart Id ****
	**********************************/
	function GenerateCartId($post_data) 
	{		
		if($this->db->insert('vefinder_user_cart',$post_data))
		{
			return $this->db->insert_id();
		}
	}
	
	function ProductInfoFromMainTable($case='')
	{
		$productInfo=	array();
		$user_id	= $this->session->userdata('user_id');
		$this->db->select('vefinder_order.*');
		$this->db->from('vefinder_order');
		$this->db->where('vefinder_order.user_id', $user_id);
		switch($case){
			case'Success':
			{
				$this->db->where("vefinder_order.status ",3); ## Order Success 
				$this->db->where("vefinder_order.cart_id ",$this->session->userdata('cart_id'));
				$this->db->where("date(vefinder_order.created_date)",date("Y-m-d"));
				break;
			}
			case'Failure':
			{
				$this->db->where("vefinder_order.status ",2); ## Order Fail
				$this->db->where("vefinder_order.cart_id ",$this->session->userdata('cart_id'));
				$this->db->where("date(vefinder_order.created_date)",date("Y-m-d"));
				break;
			}
			default:
			{
			 break;
			}
		}
		$this->db->where("vefinder_order.status!= ",1);
		$this->db->order_by('vefinder_order.created_date', "desc");		
		
		$query  = 	$this->db->get();
		$data	=	$query->result();
		$count	=	1;  			
		if($data)
		{	
			foreach($data as $key=>$pro)
			{	     
				$product_id	=	$pro->product_id;
				$quantity	=	$pro->quantity;
				$order_id	=	$pro->order_id;
				
				$productInfo[$count]						= $this->Product_model->GetSingleProduct($product_id,1);
				$productInfo[$count]->purchase_quantity		= $pro->quantity;
				$productInfo[$count]->order_id				= $pro->order_id;	
				$productInfo[$count]->temp_id				= $pro->temp_id;	
				$productInfo[$count]->cart_id				= $pro->cart_id;	
				$productInfo[$count]->payment_id			= $pro->payment_id;	
				$productInfo[$count]->tracking_id			= $pro->tracking_id;	
				$productInfo[$count]->purchase_created_date	= $pro->created_date;						
				$productInfo[$count]->purchase_price		= $pro->base_price;										
				$productInfo[$count]->purchase_user_id		= $pro->user_id;										
				$productInfo[$count]->seller_user_id		= $pro->seller_user_id;										
				$productInfo[$count]->purchase_status		= $pro->status;										
				$productInfo[$count]->show_order_id			= $pro->show_order_id;
				$count++;       
			}
		}
		return $productInfo;
	}
	
	function SoldItem()
	{
		$productInfo=	array();
		$user_id	= $this->session->userdata('user_id');
		$this->db->select('vefinder_order.*');
		$this->db->from('vefinder_order');
		//$this->db->where('vefinder_order.seller_user_id', $user_id);
		$this->db->where("vefinder_order.status ",3);
		$this->db->order_by('vefinder_order.created_date', "desc");		
		
		$query  = 	$this->db->get();
		$data	=	$query->result();
		$count	=	1;  			
		if($data)
		{	
			foreach($data as $key=>$pro)
			{	     
				$product_id	=	$pro->product_id;				
				$productInfo[$count]					= $this->Product_model->GetSingleProduct($product_id,1);
				$productInfo[$count]->SoldItemCount		= $this->GetSoldItemCount($product_id);
				
				$count++;       
			}
		}
		return $productInfo;
	}
	
	function GetSoldItemCount($product_id)
	{
		$user_id	= $this->session->userdata('user_id');
		$this->db->select('vefinder_order.*');
		$this->db->from('vefinder_order');
		$this->db->where('vefinder_order.seller_user_id', $user_id);
		$this->db->where('vefinder_order.product_id', $product_id);
		$this->db->where("vefinder_order.status ",3);
		$query  = 	$this->db->get();		
		return $query->num_rows();
	}
	
	function GetProductId_UsingShowId($showId)
	{
		$user_id	= $this->session->userdata('user_id');
		$this->db->select('vefinder_order.*');
		$this->db->from('vefinder_order');
		$this->db->where('vefinder_order.user_id', $user_id);
		$this->db->where('vefinder_order.show_order_id', $showId);
		$this->db->where("vefinder_order.status ",3);
		$query  = 	$this->db->get();	
		if($query->num_rows()>0)
		{
			return $query->row();
		}
	}
	
	function GetCustomerBoughtItem($cat_id='')
	{
		$productInfo=	array();
		$this->db->select('vefinder_order.*');
		$this->db->from('vefinder_order');
		//$this->db->where('vefinder_order.cat_id', $cat_id);		
		$this->db->where("vefinder_order.status ",3);
		$this->db->order_by('vefinder_order.created_date', "desc");		
		$this->db->order_by('vefinder_order.order_id', "RANDOM");
		$this->db->limit(28);
		$query  = 	$this->db->get();
		$data	=	$query->result();
		$count	=	1;  			
		if($data)
		{	
			foreach($data as $key=>$pro)
			{						
				$productInfo[$count]					= $this->Product_model->GetSingleProduct($pro->product_id,1);
				$productInfo[$count]->Sold_date			= $pro->created_date;
				
				$count++;       
			}
		}
		return $productInfo;
	}
	
	function GetCustomerBoughtItemFull($page=1,$take=40)
	{
		$productInfo=	array();
		$this->db->select('vefinder_order.*');
		$this->db->from('vefinder_order');
		//$this->db->where('vefinder_order.cat_id', $cat_id);		
		$this->db->where("vefinder_order.status ",3);
		$this->db->order_by('vefinder_order.created_date', "desc");				
		$this->db->limit($page, $take);
		$result = $this->db->get();
		$count  = $result->num_rows();
		if($count>0)
		{
			$i=0;
			$data	=	$result->result();
			foreach($data as $key=>$pro)
			{						
				$productInfo[$i]					= $this->Product_model->GetSingleProduct($pro->product_id,1);
				$productInfo[$i]->Sold_date			= $pro->created_date;
				
				$i++;       
			}
				
		}
		else
		{
			$productInfo= '';
		}		
		return @$productInfo;
	}
	function SoldItemUserListInfo($product_key,$page=1,$take=40)
	{
		$productPurchaseInfo=	array();
		$product_id	=	base64_decode($product_key);
		$user_id	=	$this->session->userdata('user_id');
		$this->db->select('vefinder_order.*');
		$this->db->from('vefinder_order');
		$this->db->where('vefinder_order.product_id', $product_id);	
		$this->db->where('vefinder_order.seller_user_id', $user_id);
		$this->db->where("vefinder_order.status ",3);
		$this->db->order_by('vefinder_order.created_date', "desc");				
		$this->db->limit($page, $take);
		$result = $this->db->get();
		$count  = $result->num_rows();
		if($count>0)
		{
			$i=0;
			$productPurchaseInfo	=	$result->result();
			foreach($productPurchaseInfo as $key=>$data )
			{
				$userInfo		=	_GetUserData($data->user_id);
				$useraddress		=	$this->User_model->GetShippingAddressforOrder($data->user_address_id,$data->user_id);
				$productPurchaseInfo[$i]->first_name	=	$userInfo->first_name;
				$productPurchaseInfo[$i]->last_name		=	$userInfo->last_name;
				$productPurchaseInfo[$i]->full_name		=	$useraddress->full_name;
				$productPurchaseInfo[$i]->address		=	$useraddress->address;
				$i++;
			}
		}
		return $productPurchaseInfo;		
	}		
	
	function GetSoldProductCount($product_key)
	{
		$product_id	=	base64_decode($product_key);
		$user_id	=	$this->session->userdata('user_id');
		$this->db->select('vefinder_order.*');
		$this->db->from('vefinder_order');
		$this->db->where('vefinder_order.product_id', $product_id);	
		$this->db->where('vefinder_order.seller_user_id', $user_id);
		$this->db->where("vefinder_order.status ",3);
		$this->db->order_by('vefinder_order.created_date', "desc");						
		$result = $this->db->get();
		return $result->num_rows();
	}
	
	function UpdateTrackId($track_id, $order_id, $show_id, $vendor)
	{
		$data		= array('tracking_id'			=>  $track_id,
							'shiped_by'				=>	$vendor
						);
		$this->db->where('order_id', $order_id);
		$this->db->where('show_order_id', $show_id);		
		$this->db->update('vefinder_order', $data);			
		if($this->db->affected_Rows())
		{
			return true;
		}
		return false;
	}
        
        function cancelOrder($orderID){
            
            $this->db->set('status','4')->where('order_id',$orderID)->update('vefinder_order');
            return TRUE;
            
        }
}
?>