<!DOCTYPE html>
<html>
<head>
<?php include VIEWPATH.'common/HeaderScript_HTML.php'; ?>
<head>	
<body class="home-page-body">	
	<?php include VIEWPATH.'common/NavBar_HTML.php'; ?>
	<section class="blank-section">
        <div class="container">
            <div class="row">
            </div>
        </div>
    </section>
	<?php include VIEWPATH.'common/SubMenu_HTML.php'; ?>
	 <section class="bid-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="vf-cart-section-heading text-transform-capitalize">
                        <?php echo $this->session->userdata('user_name');?>'s Vefinder
                    </h4>
                    <p class="dreambox-section-sub-heading theme-font-bold">
                        <?php if($request_count>0){ ?> Requested Items <?php }else { ?> No Item Requested Yet. <?php } ?>
                    </p>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
					<?php 
					if (is_array($product_info)&&(!empty($product_info)))
					{
						$i=0;
						$text=	chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90));
						foreach ($product_info as $product)
						{ 
							// $product=$productdata->product_info; 
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
                    <!--ORDER ITEM-->
                    <div class="col-sm-12 bid-item-container">
                        <div class="col-sm-2">
                           <?php foreach($product->images as $image){  ?>
									<a href="<?php echo base_url().'ProductFullView/'.base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ').'/'.base64_encode($product->product_id).'/'. base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ');?>">
										<img src="<?php echo base_url();?>assets/images/product/<?php echo $image->image_name;?>" class="img-responsive">
									</a>
							<?php } ?>
                        </div>
                        <div class="col-sm-3">
                            <!--ITEM ORDER DATE-->
                            <div class="col-sm-12 padding-top5">
                                <a href="javascript:void(0);" class="order-item-date">On   <?php echo date("jS F, Y",strtotime($product->request_created_date)); ?></a>
                            </div>

                            <!--ITEM NAME-->
                            <div class="col-sm-12 padding-top5">                                
								 <a href="<?php echo base_url().'ProductFullView/'.base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ').'/'.base64_encode($product->product_id).'/'. base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ');?>" class="bid-item-name theme-font-bold"><?php echo $product->product_name;?></a>
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

                        </div>

                        <div class="col-sm-1"></div>

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
                        </div>
                        <div class="col-sm-3 padding-left30">
                            <!--ITEM ORDER NUMBER-->
                            <div class="col-sm-12 padding-top5 padding-bottom10" align="right">
                                <a href="javascript:void(0);" class="order-item-requested-ago"><?php echo HumanTiming($product->request_created_date) ; ?></a>
                            </div>

                            <center>
                                <!--ITEM PRICE-->
                                <div class="col-sm-12">
                                    <p class="bid-item-fullview-price">
                                        <span>Price</span>&nbsp;&nbsp;&nbsp;
                                        $<?php echo $product->product_price; ?>
                                        <!--&nbsp;&nbsp;&nbsp;<del><span>$59.99</span></del>-->
                                    </p>
                                </div>

                                <!--ITEM LARGE BUTTON ADD TO CART, ACCEPT REQUEST, PLACE BID & CONTACT US-->
                                <div class="col-sm-12 padding-top5 padding-bottom5" align="center">
                                    <button class="hm-item-btn-lg" type="button">Cancel Request</button>
                                </div>
                            </center>
                        </div>
                    </div>
					<?php } } ?>                   
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>
    </section>
    <?php include VIEWPATH.'common/Footer_HTML.php'; ?>
	</body>
</html>