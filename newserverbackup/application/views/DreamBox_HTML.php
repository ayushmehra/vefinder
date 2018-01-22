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
                    <p class="dreambox-section-sub-heading DreamBox-Heading">
                       <?php if($wish_count>0){ ?>   dreambox <?php }else { ?> Your Dreambox Is Empty. <?php } ?>
                    </p>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
					<?php 
					if (is_array($wish_list)&&(!empty($wish_list)))
					{
						$i=0;
						$text=	chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90));
						foreach ($wish_list as $product)
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
                    <!--DREAMBOX ITEM-->
                    <div class="col-sm-12 bid-item-container "  id="change-<?php echo $product->wish_id.'-remove'; ?>" >
                        <div class="col-sm-2">
                            <?php foreach($product->images as $image){  ?>
									<a href="<?php echo base_url().'ProductFullView/'.base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ').'/'.base64_encode($product->product_id).'/'. base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ');?>">
										<img src="<?php echo base_url();?>assets/images/product/<?php echo $image->image_name;?>" class="img-responsive">
									</a>
								<?php } ?>
                        </div>
                        <div class="col-sm-3">
                            <!--ITEM UPLOAD ITME AGO-->
                            <div class="col-sm-12" align="right">
                                 <span class="hm-item-time">
                                    <?php echo HumanTiming($product->wish_created_date) ; ?>
                                </span>
                            </div>

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
                        <div class="col-sm-3 padding-left30" align="center">
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
							<?php if($product->product_in_stock==1) { ?>						
                               <button class="hm-item-btn-lg add_product" data-val="<?php echo base64_encode($product->product_id);?>" data-my="<?php echo $product->wish_id;?>" type="button">Add to cart</button>
								<?php } else { ?>
								<button class="hm-item-btn-lg add_product" type="button">Request Item</button>
								<?php } ?>
                                
                            </div>

                            <div class="col-sm-12 padding-top5"></div>

                            <!--ITEM LARGE BUTTON ADD TO CART, ACCEPT REQUEST, PLACE BID & CONTACT US-->
                            <div class="col-sm-12 padding-top5 padding-bottom5" align="center">
                                <button class="hm-item-btn-lg remove" data-val="<?php echo base64_encode($product->product_id);?>" data-my="<?php echo $product->wish_id;?>" type="button">Remove item</button>
                            </div>
                        </div>
                    </div>
					<?php } } ?>
                   
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>
    </section>
    <?php include VIEWPATH.'common/Footer_HTML.php'; ?>
	<script >
	$(document ).ready(function() {   
	 $( ".add_product" ).click(function() {
			var val = $(this).data('val');				
			var my = $(this).data('my');				
		$.ajax({
			
					url: base_url+'Add-To-Cart-From-Wish-List',
					type: 'POST',
					data: "dream=" + val + "&wish="+my,
					dataType:"json",
					success:function(response)
					{
						if(response.exists == "1") 
						{							
							$('#replace').show();
							$('#replace').html(response.count);			
							$('#change-'+my+'-remove').remove();
							if(response.mycount==0){							
								$('.DreamBox-Heading').html('Your Dreambox Is Empty.');			
							}							
						}
					}
			});
	 });
	 $( ".remove" ).click(function() {
			var val = $(this).data('val');				
			var my = $(this).data('my');				
		$.ajax({
				url: base_url+'Remove-From-Wish-List',
				type: 'POST',
				data: "dream=" + val + "&wish="+my,
				dataType:"json",
				success:function(response)
				{
					if(response.exists == "1") 
					{									
						$('#change-'+my+'-remove').remove();
						if(response.mycount==0){							
								$('.DreamBox-Heading').html('Your Dreambox Is Empty.');			
						}
					}
				}
			});
	 });
	});
</script>
	</body>
</html>