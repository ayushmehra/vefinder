<?php 
	if(is_array($customer_bought)&&(!empty($customer_bought)))
	{
		$i=0;
	?>	
<section class="vf-item-slider-section vf-bg-white">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <h5 class="vf-item-slider-section-heading">
                            Customer bought these items also&nbsp;&nbsp;
                            <a href="<?php echo base_url();?>Customer-Bought">
                                View All
								&nbsp;&nbsp;
                                <i class="fa fa-caret-right" aria-hidden="true"></i>
                            </a>
                        </h5>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-12 padding-top10"></div>
                    <div class="col-sm-12">
                       <div id="carousel-item-1" class="carousel slide" data-ride="carousel" data-interval="5000">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">						
                            <?php 
							//print_r($customer_bought); 
							
							foreach($customer_bought as $value){ 
							$text=	chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90));
								//print_r($value); die;
								if($value->product_star_tag_id<>''){
									$star_tags_data=	explode(',',$value->product_star_tag_id);
									for($j=0;$j<count($star_tags_data);$j++){
										@$star_tag.='<span class="badge item-tags">*'._GetTagById($star_tags_data[$j]).'</span>';
									}
								}
								if($value->images<>'')
								{
									foreach($value->images as $image){
										$imagedata	=	$image->image_name;
									}
								}?>
								<?php 								
								if($i==0){ ?> <div class="item active"><div class="col-sm-1"></div><div class="col-sm-10"> <? } ?>
                                    <div class="col-sm-3 padding-bottom20">
                                        <div class="col-sm-12 hm-item-container">
                                            <!--COUNT
												<div class="item-count" align="center">
                                                +5
											</div>-->
											
                                            <!--DOWNLOAD-->
                                            <!--<a class="hm-item-download" href="javascript:void(0);">
                                                download
											</a>-->
											
                                            <!--FOR ITEM BY-->
                                            <div class="col-sm-6" align="left">
                                                <a href="javascript:void(0)" class="hm-item-by-link">
                                                    <span>
														<img src="<?php echo base_url();?>assets/images/product/product-by-icon.png" />
													</span>
                                                    @<?php echo $value->user;?>
												</a>
											</div>
											
											<?php  /*    <!--ITEM UPLOAD ITME AGO-->
												<div class="col-sm-6" align="right">
                                                <span class="hm-item-time">
												
                                                </span>
											</div>  */ ?>
											
                                            <!--ITEM IMAGE-->
                                            <div class="col-sm-12 padding-top5 item-img-container padding38" align="center">
                                                <img src="<?php echo base_url();?>assets/images/product/<?php echo $imagedata; ?>" class="img-responsive item-image" />
                                                <!--ITEM COLOR (ALWAY INSIDE ITEM IMAGE DIV)-->
                                                <!--<div class="item-color-list-container">
                                                    <ul class="item-color-list">
													<li style="background-color:red">
													<span></span>
													</li>
													<li style="background-color:green">
													<span></span>
													</li>
													<li style="background-color:gray">
													<span></span>
													</li>
													<li style="background-color:brown">
													<span></span>
													</li>
                                                    </ul>
												</div>-->
											</div>
											
                                            <!--ITEM NAME-->
                                            <div class="col-sm-12 padding-top5" align="center">
                                                <a href="<?php echo base_url();?>ProductFullView/<?php echo base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ');?>/<?php echo base64_encode($value->product_id);?>/<?php echo base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ');?>" class="hm-item-name"><?php echo $value->product_name;?></a>
											</div>
											
                                            <!--ITEM DESCRIPTIONS-->
                                            <div class="col-sm-12 padding-top5" align="left">
                                                <p class="hm-item-desc">
                                                    <?php $Descriptions = substr(($value->product_description),0,200);
													echo $Descriptions =(strlen($value->product_description)>200)?$Descriptions.'...':$Descriptions; ?>
												</p>
											</div>
											<?php if($value->post_type==1){ 
												if($value->product_discount<>0)
												{
													?>
												<!--ITEM PRICE-->
												<div class="col-sm-12 padding-top5" align="center">
													<p class="hm-item-price">
														<!--<span>Price</span>&nbsp;&nbsp;&nbsp;-->
														$<?php echo $value->product_discount_pricing; ?> &nbsp;&nbsp;&nbsp;&nbsp;
														<del><span>$<?php echo $value->product_price; ?></span></del>
														&nbsp;&nbsp;&nbsp;&nbsp;
														<span>
															<!--DISCOUNT-->
															<span class="hm-item-discount" align="center">
																-<?php echo $value->product_discount;?>%
															</span>
														</span>
													</p>
												</div>
											<?php } else { ?>
											<div class="col-sm-12 padding-top5" align="center">
												<p class="hm-item-price">
												$<?php echo $value->product_price; ?>
												</p>
											</div>
											<?php } }?>
                                            <!--DIVIDER LINE-->
                                            <div class="col-sm-12 padding-top10 border-top1-888888" align="center"></div>
											
                                            <!--ITEM ICONS EX: LIKE, COMMENT, SHARE & MORE with count-->
                                            <div class="col-sm-12 padding-top15" align="center">
                                                <ul class="hm-item-icon">
                                                    <li class="slider-product Bhome-like" data-from="recent" data-val="<?php echo base64_encode($value->product_id);?>" data-my="<?php echo $value->product_id;?>" id="Bchange-<?php echo $value ->product_id; ?>">
                                                        <?php if($value->Is_like==1){ ?>
														<img src="<?php echo base_url();?>assets/images/icons/heart.png" />
                                                        <?php echo $value->likes;?>  <?php echo ($value->likes>1)?'Likes':'Like'; ?>
														
														<?php } else{ ?>
													<img src="<?php echo base_url();?>assets/images/icons/like-icon.png" />
													<?php echo ($value->likes<>0)?$value->likes:''; ?>  <?php echo ($value->likes>1)?'Likes':'Like'; ?>
														<?php } ?>
													</li>
                                                    <li class="slider-product">
														<a href="<?php echo base_url().'ProductFullView/'.base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ').'/'.base64_encode($value->product_id).'/'. base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ').'/'.$text;?>">
                                                        <img src="<?php echo base_url();?>assets/images/icons/comment-icon.png" />
                                                        <?php echo ($value->comments<>0)? $value->comments:''; ?> <?php echo ($value->comments>1)?' Comments':' Comment'; ?>
														</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
									<?php $i++;   $star_tag='';
									if(($i%4==0)&&($i!=count($customer_bought))){?></div><div class="col-sm-1"></div></div><div class="item"><div class="col-sm-1"></div><div class="col-sm-10"> <?php } ?>
								<?php  }  ?>
								</div><div class="col-sm-1"></div></div>
						</div>
                        <!-- Controls -->
                        <?php if(count($customer_bought)>4){ ?>
							 <a id="itemBoughtLeftSlide" class="left carousel-control top-50per" href="#carousel-item-1" role="button" data-slide="prev">
                                <img src="<?php echo base_url();?>assets/images/slide-left-icon.png" />
                            </a>
                            <a id="itemBoughtRightSlide" class="right carousel-control top-50per" href="#carousel-item-1" role="button" data-slide="next">
                                <img src="<?php echo base_url();?>assets/images/slide-right-icon.png" />
                            </a>
						<?php } ?>
					</div>
				</div>
                </div>
            </div>
        </section>
 <?php } ?>