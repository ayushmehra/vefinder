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
	<?php //include VIEWPATH.'common/Filter_StarTag_HTML.php'; ?> 
	<section class="bid-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="vf-cart-section-heading text-transform-capitalize">
                        <?php echo $this->session->userdata('user_name');?>'s Vefinder
                    </h4>
                    <p class="dreambox-section-sub-heading">
                        Requested items By Other User
                    </p>
                </div> 
                <div class="col-sm-12 padding-top50 padding-left60 padding-right60">
				<?php 
				if (is_array($product_info)&&(!empty($product_info)))
					{
						$i=0;
						$text=	chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90));
						foreach ($product_info as $product)
						{ 
							// $product=$productdata->product_info; 
							//print_r($product);die;
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
                    <div class="col-sm-6">
                        <!--SOLD ITEM-->
                        <div class="col-sm-12 padding-bottom30">
                            <div class="col-sm-3">
                               <?php foreach($product->images as $image){  ?>
									<a href="<?php echo base_url().'ProductFullView/'.base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ').'/'.base64_encode($product->product_id).'/'. base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ');?>">
										<img src="<?php echo base_url();?>assets/images/product/<?php echo $image->image_name;?>" class="img-responsive">
									</a>
								<?php } ?>
                            </div>
                            <div class="col-sm-6 padding-top10">
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
                            </div>
                            <div class="col-sm-3 padding-top20" align="center">
                                <!--ITEMS SOLD-->
                                <div class="col-sm-12 padding-top5">
                                    <p class="vf-item-sold margin-bottom0-imp">
                                       <?php echo $product->request_count; ?> Items are <a href="<?php echo base_url();?>Requested-Item-Info/<?php echo base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ').'/'.base64_encode($product->product_id);?>">Requested</a>
                                    </p>
                                </div>

                               <?php  /* <!--ITEM PRICE-->
                                <div class="col-sm-12">
                                    <p class="bid-item-fullview-price theme-font-bold font-size30">
                                        <!--<span>Price</span>&nbsp;&nbsp;&nbsp;-->
                                        $19.99
                                        <!--&nbsp;&nbsp;&nbsp;<del><span>$59.99</span></del>-->
                                    </p>
                                </div> */ ?>
                            </div>
                        </div>
					</div>
					<?php 
						} 
					}
					?>
				</div>
            </div>
        </div>
    </section>
     <?php include VIEWPATH.'common/Footer_HTML.php'; ?>
	 </body>
</html>