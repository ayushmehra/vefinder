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
                    <h4 class="bid-section-heading">
                        <?php echo $this->session->userdata('user_name');?>'s Vefinder
                    </h4>
                    <p class="bid-section-sub-heading">
                        bids
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
							// print_r($product); die;
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
							$countdown_time	=str_replace("-","/",$product->bid_endDate).' '.$product->bid_endTime;
							?>
					<!--BID ITEM-->
                    <div class="col-sm-12 bid-item-container">
                        <div class="col-sm-2">
                           <?php foreach($product->images as $image){  ?>
						   <a href="<?php echo base_url().'ProductFullView/'.base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ').'/'.base64_encode($product->product_id).'/'. base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ');?>">
                            <img src="<?php echo base_url();?>assets/images/product/<?php echo $image->image_name;?>" class="img-responsive">
							</a>
							<?php } ?>
                        </div>
                        <div class="col-sm-4">
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
                        <div class="col-sm-3">
                            <!--FOR ITEM BY-->
                            <div class="col-sm-12">
                                <a href="javascript:void(0)" class="bids-item-by-link">
                                    <span>
                                        <img src="<?php echo base_url(); ?>assets/images/product/product-by-icon.png" />
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
                                    <?php
										$like_image		=	($product->Is_like==0)?"like-icon.png":"heart.png";
										$like_count		=	($product->likes==0)?"":$product->likes;
									?>
                                    <li class="slider-product padding-left0-imp home-like" data-from="cart" data-val="<?php echo base64_encode($product->product_id);?>" data-my="<?php echo $product->product_id;?>" id="change-<?php echo $product ->product_id; ?>">
                                        <img src="<?php echo base_url();?>assets/images/icons/<?php echo $like_image ?>" />
                                         <?php echo $like_count;?>
                                    </li>									
                                    <li class="slider-product padding-left0-imp">
									<a href="<?php echo base_url().'ProductFullView/'.base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ').'/'.base64_encode($product->product_id).'/'. base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ').'/'.$text;?>" class="bid-item-name">
                                        <img src="<?php echo base_url();?>assets/images/icons/comment-icon.png" />
                                        <?php echo ($product->comments<>0)?$product->comments:'';?>
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
                                 <?php /*   <li class="slider-product padding-left0-imp">
                                        <img src="<?php echo base_url();?>assets/images/icons/more-icon.png" />
                                    </li> */?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3 padding-left50">
                            <!--ITEM UPLOAD ITME AGO-->
                            <div class="col-sm-12">
                                <span class="hm-item-time">
                                   <?php echo  HumanTiming($product->bid_datetime); ?>
                                </span>
                            </div>

                            <!--ITEM TIMER-->
                            <div class="col-sm-12 padding-top5" id="countdown_<?php echo $i; ?>">
                             <span class="hm-item-timer">Time Left :	<span class="days">00</span> : <span class="hours">00</span> : <span class="minutes">00</span> : <span class="seconds">00</span> </span>
                            </div>
							<script type="text/javascript">$("#countdown_<?php echo $i; ?>").downCount({date:"<?php echo $countdown_time; ?>",offset:5.5}, function (){}); </script>			

                            <!--ITEM PRICE-->
                            <div class="col-sm-12">
                                <p class="bid-item-fullview-price">
                                    <span>Price</span>&nbsp;&nbsp;&nbsp;
                                    $<?php echo  $product->product_discount_pricing;?>
                                    &nbsp;&nbsp;&nbsp;<del><span>$<?php echo $product->product_price; ?></span></del>
                                </p>
                            </div>

                            <!--YOUR BID-->
                            <div class="col-sm-12">
                                <p class="bid-item">
                                    <span>Your </span>Bid
                                    $<?php echo $product->bid_amount; ?>                                   
									<?php if($product->bid_status!=1){ ?>
                                    <a href="<?php echo base_url().'ProductFullView/'.base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ').'/'.base64_encode($product->product_id).'/'. base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ');?>">Change</a>
									<?php } ?>
                                </p>
                            </div>

                            <!--BIDS COUNT-->
                            <div class="col-sm-12">
                                <p class="bid-item-count">
                                    <span><img src="<?php echo base_url(); ?>assets/images/icons/tick-icon.png"></span>
                                    &nbsp;
                                   <?php echo _GetCountForBid($product->product_id,'Bids'); ?> Bids
                                </p>
                            </div>
                            
                        </div>
                    </div>
					<?php  $i++ ;} } ?>
				</div>
                <div class="col-sm-1"></div>
            </div>
        </div>
    </section>
	<?php include VIEWPATH.'common/Footer_HTML.php'; ?>
	</body>
</html> 