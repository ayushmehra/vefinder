<!DOCTYPE html>
<html>
<head>
<?php include VIEWPATH.'common/HeaderScript_HTML.php'; ?>
</head>
<body>
<?php include VIEWPATH.'common/NavBar_HTML.php'; ?>
<section class="blank-section">
        <div class="container">
            <div class="row">
            </div>
        </div>
    </section>
	<?php include VIEWPATH.'common/SubMenu_HTML.php'; ?>	
		<section class="order-section">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-1"></div>
						<div class="col-sm-10 padding-top50 padding-bottom30">
                                                    <?php 
                                                    echo $this->session->flashdata('error_payment');
                                                    ?>
							<div class="col-sm-12 padding-bottom20">
								<h4 class="order-section-heading align-left">
									Review Your order
								</h4> 
							</div>
							<div class="col-sm-5 review-order-container">
								<div class="col-sm-6" align="right">
									<p class="order-by-detail">
										<span><?php echo $user_address->full_name; ?></span><br>
										<?php echo $user_address->address; ?> <br>
										<?php echo $user_address->additional_address; ?>  <br>
										<?php echo $user_address->city; ?>,  <?php echo $user_address->state; ?> <br>
										<?php echo $user_address->zip_code; ?>.<br>
										PhoneNumber :  <?php echo $user_address->phone; ?><br>
									</p>
									<a href="<?php echo base_url();?>AddShippingAddress" class="order-by-detail-link">
										Change
									</a>
								</div>
								<div class="col-sm-2"></div>
								<div class="col-sm-4" align="right">
									<p class="order-payment-mode">
										Payment mode<br>
										<?php echo $payment_info['payment_type'];?>
									</p>
									<a href="<?php echo base_url();?>Checkout" class="order-by-detail-link">
										Change
									</a>
								</div>
							</div>
							<div class="col-sm-4 padding-left30 padding-right30">
								<div class="col-sm-12 review-order-container">
									<h5 class="order-total-details-heading">
										Order Summary
									</h5>
									<div class="col-sm-12 padding-right30">
										<span class="order-total-desc vf-float-left">Items:</span>
										<span class="order-total-desc vf-float-right"><?php echo count($product_info);?></span>
									</div>
									<?php /*
									<div class="col-sm-12 padding-top20 padding-right30">
										<span class="order-total-desc vf-float-left">Delivery:</span>
										<span class="order-total-desc vf-float-right">$2.00</span>
									</div>
									*/ ?>									
									<div class="col-sm-12 padding-top40 padding-right10">
										<span class="order-grand-total-desc vf-float-left">Order Total:</span>
										<span class="order-grand-total-desc vf-float-right">$<?php echo $this->session->userdata('total_price'); ?></span>
									</div>
								</div>
							</div>
							<div class="col-sm-3"></div>

							<div class="col-sm-12 padding-top20"></div>

							<div class="col-sm-5"></div>
							<div class="col-sm-4">
								<div class="col-sm-2"></div>
								<div class="col-sm-10">
									<div class="col-sm-12 padding-bottom20">
										<a href="<?php echo base_url();?>MakeTransactionRequest" class="hm-order-link-lg">
											Confirm now and pay
										</a>
									</div>
								</div>
							</div>
							<div class="col-sm-3"></div>
							<?php 
							foreach ($product_info as $product)
							{  
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
								?>
							<div class="col-sm-12 padding-top20">
								<h4 class="order-estimate-date">
									Estimated delivery:  <span id="estimatedDate"> April 2017 - 28 April 2017</span>
								</h4>
							</div>
							<div class="col-sm-12 padding-top50">
								<div class="col-sm-2">
									<?php foreach($product->images as $image){  ?>
							<a href="<?php echo base_url().'ProductFullView/'.base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ').'/'.base64_encode($product->product_id).'/'. base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ');?>">
                            <img src="<?php echo base_url();?>assets/images/product/<?php echo $image->image_name;?>" class="img-responsive">
							</a>
									<?php } ?>
								</div>
								<div class="col-sm-3">
									<!--ITEM NAME-->
									<div class="col-sm-12 padding-top5">
										<a href="<?php echo base_url().'ProductFullView/'.base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ').'/'.base64_encode($product->product_id).'/'. base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ');?>" class="bid-item-name font-family-bold-imp"><?php echo $product->product_name;?></a>
									</div>

									<!--ITEM DESCRIPTION TITLE-->
									<div class="col-sm-12 padding-top5" align="left">
										<a href="javascript:void(0);" class="bid-item-desc-title font-family-bold-imp"><?php echo $item; ?>, <?php echo $Delivery; ?></a>
									</div>

									<!--ITEM DESCRIPTIONS-->
									<div class="col-sm-12 padding-top5">
										<p class="bid-item-desc font-family-bold-imp font-size16">
											<?php $Descriptions = substr(($product->product_description),0,200);
											echo $Descriptions =(strlen($product->product_description)>200)?$Descriptions.'...':$Descriptions;
										?>
										</p>
									</div>

									<!--ITEM TAG-->
									<div class="col-sm-12 padding-top10 padding-bottom10">
										<span class="vf-item-tags-container">
											<?php $tags= explode(',',$product->product_star_tag_id);for($j=0;$j<count($tags);$j++){ ?>
											<span class="badge vf-item-tags-fill">
												<?php echo _GetTagById($tags[$j]); ?>
											</span>  
										<?php } ?>
										</span>
									</div>
								</div>
								<div class="col-sm-3 padding-top30">
									<!--ITEM PRICE-->
									<?php if($product->product_discount_pricing<>0){ ?>
									<div class="col-sm-12 padding-top5">
										<p class="vf-item-fullview-price">
											<span>Price</span>&nbsp;&nbsp;&nbsp;
											$<?php echo $product->product_discount_pricing; ?>
											&nbsp;&nbsp;&nbsp;<del><span>$<?php echo $product->product_price; ?></span></del>
											&nbsp;&nbsp;
											<span>
												<!--DISCOUNT-->
												<span class="hm-item-discount" align="center">
													-<?php echo $product->product_discount; ?>%
												</span>
											</span>
										</p>
									</div>
									<?php } else { ?>
									<div class="col-sm-12 padding-top5">
										<p class="vf-item-fullview-price">
											<span>Price</span>&nbsp;&nbsp;&nbsp;
											$<?php echo $product->product_price; ?>
										</p>
									</div>
									<?php } ?>
								</div>
								<div class="col-sm-3 padding-left50">
									
								</div>
							</div>
							<?php } ?>
						</div>
						<div class="col-sm-1"></div>
					</div>
				</div>
			</section>
			<?php include VIEWPATH.'common/Footer_HTML.php'; ?>
</body>
</html> 