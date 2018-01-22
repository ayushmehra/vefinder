<!DOCTYPE html>
<html>
<head>
<?php include VIEWPATH.'common/HeaderScript_HTML.php'; ?>
<script src="<?php echo base_url();?>assets/js/Product.js"></script>
<head>
<body>
	<?php include VIEWPATH.'common/NavBar_HTML.php'; ?>
	<section class="blank-section">
        <div class="container">
            <div class="row">
            </div>
        </div>
    </section>
	<?php //include VIEWPATH.'common/CartComment_HTML.php'; ?>
	<?php include VIEWPATH.'common/SubMenu_HTML.php'; ?>
	<?php //include VIEWPATH.'common/Filter_StarTag_HTML.php'; ?>
	<section class="bid-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="vf-cart-section-heading cartheading">
                        Your Cart  <?php if(count($product_info)<=0){ echo " Is Empty";}?>
                    </h4>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
					<!--CART ITEM-->
					<?php 
					if (is_array($product_info)&&(!empty($product_info)))
					{
						$i				=	1;
						$total_price	=	0;
						$item_count		=	count($product_info);
						foreach ($product_info as $product)
						{ 
							$text=	chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90));
							if($product->product_discount_pricing<>0){
							$total_price = $total_price + ($product->product_discount_pricing * $product->quantity);	
							}else{
								$total_price = $total_price + ($product->product_price * $product->quantity);						
							}
							switch($product->product_type_id) 
							{
								case'1':{$item='New Item';break;}
								case'2':{$item='Used Item';break;}
								case'3':{$item='Refurbished Item';break;}
								case'4':{$item='Bid for Item';break;}
								default:{$item=''; break;}
							} 
							switch($product->ship_over)
							{
								case'1':{$Delivery='Globle Delivery';break;}								
								case'2':{$Delivery='Local Delivery';break;}								
								case'3':{$Delivery='Globle and Local Delivery';break;}								
							}
													
							//echo "<pre>";print_r($product);die; ?> 
                    <!--BID ITEM-->
                    <div class="col-sm-12 bid-item-container" id="change-<?php echo $product->order_id.'-remove'; ?>" >
					<INPUT type="hidden" id="arrId_<?php echo $i; ?>" name="arrId" value="<?php echo $i; ?>">
					<INPUT type="hidden" id="pro_id_<?php echo $i; ?>" name="pro_id" value="<?php echo $product->product_id; ?>">
                        <div class="col-sm-2">
							<?php foreach($product->images as $image){  ?>
							<a href="<?php echo base_url().'ProductFullView/'.base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ').'/'.base64_encode($product->product_id).'/'. base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ');?>">
                            <img src="<?php echo base_url();?>assets/images/product/<?php echo $image->image_name;?>" class="img-responsive">
							</a>
							<?php } ?>
                        </div>
                        <div class="col-sm-4">
							<?php /* <div class="col-sm-12" align="right">
                                 <span class="hm-item-time">
                                    <?php echo HumanTiming($product->cart_created_date) ; ?>
                                </span>
                            </div> */ ?>
                            <!--ITEM NAME-->
                            <div class="col-sm-12 padding-top5">
                                <a href="<?php echo base_url().'ProductFullView/'.base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ').'/'.base64_encode($product->product_id).'/'. base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ');?>" class="bid-item-name"><?php echo $product->product_name;?></a>
                            </div>

                            <!--ITEM DESCRIPTION TITLE-->
                            <div class="col-sm-12 padding-top5" align="left">
                                <a href="javascript:void(0);" class="bid-item-desc-title"><?php echo $item; ?>, <?php echo $Delivery; ?></a>
                            </div>

                            <!--ITEM DESCRIPTIONS-->
                            <div class="col-sm-12 padding-top5">
                                <p class="bid-item-desc">
                                    <?php $Descriptions = substr(($product->product_description),0,200);
											echo $Descriptions =(strlen($product->product_description)>200)?$Descriptions.'...':$Descriptions;
										?>
                                </p>
                            </div>

                            <!--CART ITEM IN STOCK-->
                            <div class="col-sm-12 padding-top5">
                                <?php if($product->product_in_stock==1) { ?>						
                                <p class="vf-cart-item-in-stock theme-font-bold">
                                    <?php echo $product->product_stock ; ?> in Stock
                                </p>
								<?php } else { ?>
								<p class="vf-cart-item-in-stock theme-font-bold">
                                    Out Of Stock
                                </p>
								<?php } ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <!--FOR ITEM BY-->
                            <div class="col-sm-12">
                                <a href="<?php echo base_url().'User/'.$product->user;?>" class="bids-item-by-link">
                                    <span>
                                        <img src="<?php echo base_url();?>assets/images/product/product-by-icon.png" />
                                    </span>
                                    @<?php echo $product->user;?>
                                </a>
                            </div>
                            <div class="col-sm-12 padding-top10 padding-bottom10">
                                <span class="vf-item-tags-container">
								<?php $tags= explode(',',$product->product_star_tag_id);for($j=0;$j<count($tags);$j++){ ?>
                                    <span class="badge vf-item-tags-fill">
                                        <?php echo _GetTagById($tags[$j]); ?>
                                    </span>  
								<?php } ?>
                                </span>
                            </div>
                            <!--ITEM ICONS EX: LIKE, COMMENT, SHARE & MORE-->
                            <div class="col-sm-12 padding-top5">
                                <ul class="hm-item-icon-dreambox">
                                    <li class="slider-product padding-left0-imp home-like" data-from="cart" data-val="<?php echo base64_encode($product->product_id);?>" data-my="<?php echo $product->product_id;?>" id="change-<?php echo $product ->product_id; ?>">
                                        <?php if(@$product->is_like==1){ ?>
										<img src="<?php echo base_url();?>assets/images/icons/heart.png" />
										<?php echo $product->likes; 
										}else{										
										?>
										 <img src="<?php echo base_url();?>assets/images/icons/like-icon.png" />
										 <?php echo ($product->likes<>0)?$product->likes:''; 
										 } ?> 
                                    </li>									
                                    <li class="slider-product padding-left0-imp">
									<a href="<?php echo base_url().'ProductFullView/'.base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ').'/'.base64_encode($product->product_id).'/'. base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ').'/'.$text;?>" class="bid-item-name">
                                        <img src="<?php echo base_url();?>assets/images/icons/comment-icon.png" />
                                        <?php echo ($product->comments==0)?'':$product->comments;?>
									</a>
                                    </li>
									<?php 
									$ftitle		= 		preg_replace('/[\x00-\x1F\x80-\xFF]/', '',$product->product_name);
									$utitle		=		str_replace("?","-",$ftitle);
									$utitle		=		str_replace(" ","-",$utitle);
									$utitle		=		str_replace(",","",$utitle);
									$utitle		=		str_replace("&","",$utitle);
									$utitle		=		str_replace("/","",$utitle);
									$utitle		=		str_replace(" ","-",$utitle);
									
									$fdesc		= 		strip_tags(substr(preg_replace('/[\x00-\x1F\x80-\xFF]/', '',$product->product_description),0,200));
									 
									$url		=	 	base_url().'ProductFullView/'.base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ').'/'.base64_encode($product->product_id).'/'. base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ');
									$fbimg		=		base_url().'assets/images/product/'.$image->image_name;
							?>
                                    <li class="slider-product padding-left0-imp">
										<a href="javascript:;"  onClick="postToFeed('<?php echo $ftitle; ?>', '<?php echo $fdesc;?>','<?php echo $url;?>','<?php echo $fbimg;?>');" title="Facebook">                             
                                        <img src="<?php echo base_url();?>assets/images/icons/share-icon.png" />
                                        &nbsp;&nbsp;<?php //echo $product->shares;?>
										</a>
									</li>
                                   <?php  /* <li class="slider-product padding-left0-imp">
                                        <img src="<?php echo base_url();?>assets/images/icons/more-icon.png" />
                                    </li> */ ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3 padding-left50">
                            <!--CART ITEM QUANTITY-->
                            <div class="col-sm-12 padding-top5">
                                <span class="vf-cart-label">Quantity:</span>
                                <input type="number" class="vf-cart-quantity-input" min="1"  onclick="javascript:quantityFunction(<?php echo $i;?>)" id="quantity_<?php echo $i;?>" value="<?php echo $product->quantity;?>" />
                            </div>

                            <div class="col-sm-12 padding-top30"></div>

                            <!--ITEM PRICE-->
							<?php if($product->product_discount_pricing<>0) { ?>
                            <div class="col-sm-12">
                                <p class="vf-cart-item-price">
                                    <span class="price">Price</span>&nbsp;&nbsp;&nbsp;
                                    $<?php echo $product->product_discount_pricing; //* $product->quantity;?>
                                    <!--&nbsp;&nbsp;&nbsp;<del><span>$59.99</span></del>-->
                                </p>
                            </div>
							<?php } else { ?>
							<div class="col-sm-12">
                                <p class="vf-cart-item-price">
                                    <span class="price">Price</span>&nbsp;&nbsp;&nbsp;
                                    $<?php echo $product->product_price; //* $product->quantity;?>
                                    <!--&nbsp;&nbsp;&nbsp;<del><span>$59.99</span></del>-->
                                </p>
                            </div>
							<?php } ?>
                            <div class="col-sm-12 padding-top30"></div>                            

                            <!--CART ITEM ACTION-->
                            <div class="col-sm-12">
                                <p class="vf-cart-item-action">
                                    <span>
                                        <a href="javascript:void(0);" onclick="javascript:removeFunction(<?php echo $i ;?>)">Delete</a>
                                    </span>&nbsp;
                                    |
                                    &nbsp;
                                    <span>
                                        <a href="javascript:void(0);" class="DreamBox-data" data-val="<?php echo base64_encode($product->product_id);?>" data-my="<?php echo $product->order_id;?>" >Add to dreambox</a>
                                    </span>
                                </p>
                            </div>
                            
                        </div>
                    </div> 
					<?php $i++; } ?>
                    <!--CART TOTAL-->
                    <div class="col-sm-12 padding-top50 checkcount">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-3"></div>
                        <div class="col-sm-3"></div>
                        <div class="col-sm-3">
                            <p class="vf-cart-total">
                                Sub Total (<?php echo $item_count;?> Item) : $<?php echo $total_price; ?>    
                            </p>  
                            <a class="hm-item-btn-lg Checkout" href="<?php echo base_url();?>Checkout">
                                Proceed to Checkout
                            </a> 
                        </div>    
                    </div>
					<?php }
					@$total_price=	($total_price<>'')?$total_price:0;
					$this->session->set_userdata('total_price',$total_price); ?>
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>
    </section>
	<?php include VIEWPATH.'common/CustomerBroughtAlso_HTML.php'; ?>
	<?php include VIEWPATH.'common/Footer_HTML.php'; ?>	
</body>
</html>