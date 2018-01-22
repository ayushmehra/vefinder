<?php 
/*  Function IN use From Other Model's And Helper's
|	HELPER FUNCTIONS 
|		1)
*/
class Bid_model extends CI_Model {
    function __construct()
    {
        // Call the Model constructor
		//echo $this->db->last_query(); die();
        parent::__construct();
    }
	/*******************************************************
	********************************************************
		Functions For 	:	Add User Bid Value 
		Return			:	success/failure or Message
	********************************************************
	********************************************************/
	
	## Get All Bidding By User For All Product
	
	function GetUserBidingProduct()
	{
		$productInfo	=	array();  $i=0;
		$user_id		=	$this->session->userdata('user_id');
		$this->db->select('vefinder_bidresponse.*');
		$this->db->from('vefinder_bidresponse');
		/* $this->db->where('vefinder_bidresponse.product_id',$product_id); */
		$this->db->where('vefinder_bidresponse.user_id',$user_id);
		$this->db->where('vefinder_bidresponse.bid_status!=',3);
		
		$result = $this->db->get();
		$count  = $result->num_rows();
		if($count>0)
		{
			$data= $result->result();
			foreach($data as $key=>$pro)
			{
				$productInfo[$i]				= $this->Product_model->GetSingleProductForBid($pro->product_id);
				$productInfo[$i]->bid_id		= $pro->bid_id;
				$productInfo[$i]->max_amount_id	= $pro->max_amount_id;
				$productInfo[$i]->bid_amount	= $pro->bid_amount;
				$productInfo[$i]->bid_status	= $pro->bid_status;
				$productInfo[$i]->bid_datetime	= $pro->bid_datetime;
				$productInfo[$i]->product_id	= $pro->product_id;
				
				$i++;
			}
		}		
		return	$productInfo;		
		
	}
	
	## Check Product Is Active For Biding
	
	function CheckProductActive($product_id)
	{
		$this->db->select('vefinder_product.*');
		$this->db->from('vefinder_product');
		$this->db->where('vefinder_product.status',1);
		$this->db->where('vefinder_product.post_type',2);
		$this->db->where('vefinder_product.product_id',$product_id);
		$result = $this->db->get();
		$count  = $result->num_rows();
		if($count>0)
		{
			return true;
		}
		else
		{
			return false;
		}		
	}
	## Get Active Bid data 
	function GetActiveBidAmount($product_id)
	{
		$this->db->select('vefinder_bidresponse.*');
		$this->db->from('vefinder_bidresponse');
		$this->db->where('vefinder_bidresponse.product_id',$product_id);
		$this->db->where('vefinder_bidresponse.bid_status',1);
		$result = $this->db->get();
		$count  = $result->num_rows();
		if($count>0)
		{
			$data= $result->row();
		}
		else{
			$data='';
		}
		return $data;
	}
	
	## GetProductBidValue
	
	function GetProductBidValue($product_id)
	{
		$this->db->select('vefinder_product.bid_limit');
		$this->db->from('vefinder_product');
		$this->db->where('vefinder_product.product_id',$product_id);
		$result = $this->db->get();
		$count  = $result->num_rows();
		$this->db->last_query();
		if($count>0)
		{
			$data	=	$result->row()->bid_limit;
		}
		else{
			$data	=	0;
		}
		return $data;
	}
	
	##  Get Active Bid Max Amount
	
	function GetBidActiveMaxAmount($product_id)
	{
		$this->db->select('vefinder_bid_user_active_bid_max_amount.*');
		$this->db->from('vefinder_bid_user_active_bid_max_amount');
		$this->db->where('vefinder_bid_user_active_bid_max_amount.product_id', $product_id);
		$result = $this->db->get();
		$count  = $result->num_rows();
		if($count>0)
		{
			$data	=	$result->row();
		}
		else{
			$data	=	'';
		}
		return $data;
	}
	
	## Change Bid Max Amount Status
	
	function UpdateBidMaxAmountStatus($max_bid_id)
	{		
		$datapost		=	array(	'status'			=>	2,
									'update_datetime'	=>	date("Y-m-d H:i:s")
							);
		$this->db->where('vefinder_bid_user_active_bid_max_amount.max_limit_id', $max_bid_id);
		// $this->db->where('vefinder_bid_user_active_bid_max_amount.product_id', $product_id);
		$this->db->update('vefinder_bid_user_active_bid_max_amount', $datapost); 
	}
	
	## Change Bid Response Bid Status
	function UpdateBidStatus($bid_id)
	{		
		$datapost		=	array(	'bid_status'			=>	2,
									'update_datetime'	=>	date("Y-m-d H:i:s")
							);
		$this->db->where('vefinder_bidresponse.bid_id', $bid_id);
		// $this->db->where('vefinder_bidresponse.product_id', $product_id);
		$this->db->update('vefinder_bidresponse', $datapost); 
	}
	
	## User Submit bid Value IsAcive
	
	function UserSubmitValueIsAcive($product_id)
	{
		$user_id	=	$this->session->userdata('user_id');
		$this->db->select('vefinder_bidresponse.*');
		$this->db->from('vefinder_bidresponse');
		$this->db->where('vefinder_bidresponse.product_id', $product_id);
		$this->db->where('vefinder_bidresponse.user_id', $user_id);
		$this->db->where('vefinder_bidresponse.bid_status', 1);
		$result = $this->db->get();
		// echo $this->db->last_query(); die; 
		$count  = $result->num_rows();
		if($count>0)
		{
			return true;
		}
		else{
			return false;
		}
	}
	
	##  Set Bid 
	
	function AddBid($product_id,$bid_amount)
	{		
		$product_id	=	base64_decode($product_id);
		$user_id	=	$this->session->userdata('user_id');
		
		## Check Product For Bidding is Active Or Not
		if($this->CheckProductActive($product_id)==true)
		{
			if($this->UserSubmitValueIsAcive($product_id)==false){
				## check Bid On This Product ang get Winning Bid Detail
				## Set Lowest Bid Amount
				## Set Max Bid Amount As Per Bid System
				
				## Status 1 For Winning Bid And Active User User Bid
				## Status 2 For Bid Active But Not Winning This Product	
				$bid_count= _GetCountForBid($product_id,'Bids');
				if($bid_count==0)
				{
					## Insert New Bid For ProDuct With Bid Value 
					
					$bid_max_insert	=	array(	'product_id'		=>	$product_id,
												'create_datetime'	=>	date("Y-m-d H:i:s"),
												'user_id'			=>	$user_id,
												'bid_max_amount'	=>	$bid_amount,
												'status'			=>	1
										);
					$this->db->insert('vefinder_bid_user_active_bid_max_amount',$bid_max_insert);
					$max_last_id	 = $this->db->insert_id();
					## Set Bid Value  Afetr Setting Max Value in table enter bid value in bid response table 
					## After Comparing Value From Min Value 
					
					## Get Product Min Value 
					$product_price 	= $this->GetProductBidValue($product_id);
					$new_bid_amount	= $product_price + 0.25;	
					$bid_insert		=	array(	'product_id'	=>	$product_id,
												'bid_datetime'	=>	date("Y-m-d H:i:s"),
												'user_id'		=>	$user_id,
												'bid_amount'	=>	$new_bid_amount,
												'max_amount_id'	=>	$max_last_id,
												'bid_status'	=>	1
										);
					$this->db->insert('vefinder_bidresponse',$bid_insert);
					$msg="Bid Insert SuccessFully";
				}
				else
				{
					## Check Last Active Bid  Get His Value and Set As Value As Define In Doc
					$bid_data	=	$this->GetActiveBidAmount($product_id) ;
					
					##  Active User Bid Max Amount 
					$bid_max_amount_from_Active_user	=	$this->GetBidActiveMaxAmount($product_id);
					
					// print_r($bid_max_amount_from_Active_user);
					
					## Compair New Bid Amount And Max Active Bid Amount
					if($bid_data->bid_amount<$bid_amount)
					{
						if($bid_amount > $bid_max_amount_from_Active_user->bid_max_amount)
						{
							
							## Change Last Active Max Amount Status Active tO iN active
						
							$this->UpdateBidMaxAmountStatus($bid_max_amount_from_Active_user->max_limit_id);
							
							## Insert New Max Amount
						
							$bid_max_insert	=	array(	'product_id'		=>	$product_id,
														'create_datetime'	=>	date("Y-m-d H:i:s"),
														'user_id'			=>	$user_id,
														'bid_max_amount'	=>	$bid_amount,
														'status'			=>	1
												);
							$this->db->insert('vefinder_bid_user_active_bid_max_amount',$bid_max_insert);
							$max_last_id	 = $this->db->insert_id();
							
							## Insert New Bid In Bid response
							$product_price	=	$bid_data->bid_amount;
							
							## Update Active Bid Status to in-active
							$this->UpdateBidStatus($bid_data->bid_id);
							
							## Insert New Bid Amount
							$new_bid_amount	= 	$product_price + 0.25;
							$bid_insert		=	array(	'product_id'	=>	$product_id,
														'bid_datetime'	=>	date("Y-m-d H:i:s"),
														'user_id'		=>	$user_id,
														'bid_amount'	=>	$new_bid_amount,
														'max_amount_id'	=>	$max_last_id,
														'bid_status'	=>	1
												);
							$this->db->insert('vefinder_bidresponse',$bid_insert);
							
							$msg="Bid Insert SuccessFully";
						}
						if($bid_amount < $bid_max_amount_from_Active_user->bid_max_amount)
						{
							## Insert New Max Amount
							$bid_max_insert	=	array(	'product_id'		=>	$product_id,
														'create_datetime'	=>	date("Y-m-d H:i:s"),
														'user_id'			=>	$user_id,
														'bid_max_amount'	=>	$bid_amount,
														'status'			=>	2
												);
							$this->db->insert('vefinder_bid_user_active_bid_max_amount',$bid_max_insert);
							$max_last_id	 = $this->db->insert_id();
							$bid_insert		=	array(	'product_id'	=>	$product_id,
														'bid_datetime'	=>	date("Y-m-d H:i:s"),
														'user_id'		=>	$user_id,
														'bid_amount'	=>	$bid_amount,
														'max_amount_id'	=>	$max_last_id,
														'bid_status'	=>	2
												);
							$this->db->insert('vefinder_bidresponse',$bid_insert);
							
							$msg="Bid Insert SuccessFully, But Bid is inactive because someone else value is greater than your's.";
						}
						
					}
					else
					{
						## Insert New Max Amount
						$bid_max_insert	=	array(	'product_id'		=>	$product_id,
													'create_datetime'	=>	date("Y-m-d H:i:s"),
													'user_id'			=>	$user_id,
													'bid_max_amount'	=>	$bid_amount,
													'status'			=>	2
											);
						$this->db->insert('vefinder_bid_user_active_bid_max_amount',$bid_max_insert);
						$max_last_id	= $this->db->insert_id();
						$bid_insert		=	array(	'product_id'	=>	$product_id,
													'bid_datetime'	=>	date("Y-m-d H:i:s"),
													'user_id'		=>	$user_id,
													'bid_amount'	=>	$bid_amount,
													'max_amount_id'	=>	$max_last_id,
													'bid_status'	=>	2
											);
						$this->db->insert('vefinder_bidresponse',$bid_insert);
						$msg="Bid Insert SuccessFully, But Bid is inactive because some else value is greater than your's.";
					}
					
				}
			}
			else
			{
				$msg="Your Bid Is Still Active So Need To Add More BId. ";
			}
		}
		else
		{
			## No Bid Possible
			$msg="";
		}
		
		return $msg;
	}
}