<section class="hm-product-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-1"></div>
				<?php if(is_array($product)){ ?>
                <div class="col-sm-10">
                    <div class="col-sm-12 padding-top5 padding-bottom5">                        
                    </div>
					<?php $i=1; $m=0; $button='';$bid_count_and_watcher='';$bid_timer='';$download_button=''; $k=1;
					foreach($product as $product_value)
					{
						$text=	chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90));
						//print_r($product_value->twoimages);
						if($product_value->twoimages<>'')
						{
							foreach($product_value->twoimages as $image){
								$imagedata[$m]	=	$image->image_name;
								$m++;
							}
							$m=0;
						}
						else{
							$imagedata	="";
							$m=0;
						}
						$ftitle		= 		preg_replace('/[\x00-\x1F\x80-\xFF]/', '',$product_value->product_name);
						$utitle		=		str_replace("?","-",$ftitle);
						$utitle		=		str_replace(" ","-",$utitle);
						$utitle		=		str_replace(",","",$utitle);
						$utitle		=		str_replace("&","",$utitle);
						$utitle		=		str_replace("/","",$utitle);
						$utitle		=		str_replace(" ","-",$utitle);
						
						$fdesc		= 		strip_tags(substr(preg_replace('/[\x00-\x1F\x80-\xFF]/', '',$product_value->product_description),0,200));
						 
						$url		=	 	base_url().'ProductFullView/'.base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ').'/'.base64_encode($product_value->product_id).'/'. base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ');
						$fbimg		=		base_url().'assets/images/product/'.$imagedata[0];
						$fb_Share	=		<<<EOT
<a href="javascript:;" onClick="postToFeed('{$ftitle}', '{$fdesc}','{$url}','{$fbimg}');" title="Facebook">
EOT;
						
						if($product_value->post_type==1 || $product_value->post_type==2)
						{
							$comment_count	=	($product_value->comments==0)?"":$product_value->comments;
							if($this->session->userdata('user_id')<>''){
								$like_image		=	($product_value->Is_like==0)?"like-icon.png":"heart.png";
								$like_count		=	($product_value->likes==0)?"":$product_value->likes;
								
								if($this->session->userdata('user_id')==$product_value->user_id){
									/* $DropDown		=	'<div class="col-sm-8 hm-more-dropdown-container ui-display-none ProdEuct" data-xyhgud="'.base64_encode($product_value->product_id).'" data-drop="'.$product_value->product_id.'">
														<a href="javascript:void(0);"  class="hm-item-edit-opt">Delete product</a>
														</div>'; */
									$DropDown			=	'<ul class="dropdown-menu" aria-labelledby="dLabel">
																<li class="ProdEuct" data-xyhgud="'.base64_encode($product_value->product_id).'" data-drop="'.$product_value->product_id.'">
																	<a href="javascript:void(0);" class="hm-more-dropdown-link hm-item-edit-opt">Delete Product</a>
																</li>
																<li>
																	<a href="'.base_url().'Edit/'.base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ').'/'.base64_encode($product_value->product_id).'/'. base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ').'"  class="hm-item-edit-opt hm-more-dropdown-link">Edit product</a>
																</li>
															</ul>';
								}
								else{
								## REmove This After Edit Product Work 
								/* $DropDown		=	'<div class="col-sm-8 hm-more-dropdown-container ui-display-none" data-drop="'.$product_value->product_id.'">
														<a href="javascript:void(0);" class="hm-item-report-opt" data-var="'.$product_value->product_id.'" >Report Against product</a>
													</div>';  */
								$DropDown		=	'<ul class="dropdown-menu" aria-labelledby="dLabel" data-drop="'.$product_value->product_id.'">
														<li>
															<a href="javascript:void(0);" class="hm-more-dropdown-link hm-item-report-opt" data-var="'.$product_value->product_id.'"  >Report Against product</a>
														</li>
													</ul>';
								}
							}
							else{
								$like_image		=	"like-icon.png";
								$like_count		=	($product_value->likes==0)?"":$product_value->likes;
								/* $DropDown		=	'<div class="col-sm-8 hm-more-dropdown-container ui-display-none" data-drop="'.$product_value->product_id.'">
														<a href="javascript:void(0);" class="hm-item-report-opt" data-var="'.$product_value->product_id.'" >Report Against product</a>
													</div>'; */
								$DropDown		=	'<ul class="dropdown-menu" aria-labelledby="dLabel" data-drop="'.$product_value->product_id.'">
														<li>
															<a href="javascript:void(0);" class="hm-more-dropdown-link hm-item-report-opt" data-var="'.$product_value->product_id.'"  >Report Against product</a>
														</li>
													</ul>';
							}
							$Like_Share_Comment='<!--ITEM ICONS EX: LIKE, COMMENT, SHARE & MORE-->
                            <div class="col-sm-12 padding-top15" align="center">
                                <ul class="hm-item-icon">
                                    <li class="home-like" data-from="home" data-val="'.base64_encode($product_value->product_id).'" data-my="'.$product_value->product_id.'" id="change-'.$product_value->product_id.'">										
                                        <img src="'.base_url().'assets/images/icons/'.$like_image.'" />
                                        <span class="hm-item-icon-counter">
                                            '.$like_count.'
                                        </span>
                                    </li>
									<li>
									<a href="'.base_url().'ProductFullView/'.base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ').'/'.base64_encode($product_value->product_id).'/'. base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ').'/'.$text.'">
										<img src="'.base_url().'assets/images/icons/comment-icon.png" />
                                        <span class="hm-item-icon-counter">
                                            '.$comment_count.'
                                        </span>
										</a>
                                    </li>
                                    <li>'.$fb_Share.'
                                        <img src="'.base_url().'assets/images/icons/share-icon.png" />
                                        <span class="hm-item-icon-counter">                                            
                                        </span></a>
                                    </li>
                                    <li class="hm-more-drop"  data-drop="'.$product_value->product_id.'">
                                        <a href="javascript:void(0);" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
										<img src="'.base_url().'assets/images/icons/more-icon.png" />
										</a>
										<!--MORE DROP DOWN-->
										'.$DropDown.'
                                    </li>
                                </ul>
								 
                                
                            </div>';
						}else{
							$Like_Share_Comment='';
							@$DropDown='';
						}
					##echo '<pre>';print_r($product_value);
					/* <<div class="col-sm-12 padding-top5" align="center">
                                '.$stock.'
                            </div>   */					
						
						if($product_value->img_count!=0){
                        // echo $product_value->img_count;
						 $imagecount=  '<!--COUNT-->
						  <div class="item-count" align="center">
                                +'.$product_value->img_count.'
                            </div>';
						}
						else
						{
						    $imagecount='';
						} 
						if($product_value->product_colour<>'')
						{ 
							$color=explode(',',$product_value->product_colour);
							foreach($color as $data) 
							{
								$divcolor='<!--ITEM COLOR (ALWAY INSIDE ITEM IMAGE DIV)-->
									<li style="background-color:'.$data.'">
                                            <span></span>
                                        </li>';
							}
                            $colordiv='<div class="item-color-list-container">
                                    <ul class="item-color-list">
										'.$divcolor.'
                                    </ul>
                                </div>';
						}
						if($product_value->product_in_stock==1)
						{ 
							$stock='<span class="item-in-stock">'.$product_value->product_stock.' in Stock</span>';
						}
						else 
						{ 
							$stock='<span class="item-not-in-stock">Sold Out</span>';
						}
						
						if($product_value->post_type==2)
						{
								$countdown_time	=str_replace("-","/",$product_value->bid_endDate).' '.$product_value->bid_endTime;
							$button ='<div class="col-sm-12 padding-top5 padding-bottom5 padding-left0-right0" align="center">
									<a href="'.base_url().'ProductFullView/'.base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ').'/'.base64_encode($product_value->product_id).'/'. base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ').'"><button class="hm-item-btn-lg" type="button">Place Bid</button></a>
								</div>';	
							$bid_count_and_watcher='<!--ITEM WATCHING & ITEM BID-->
							<div class="col-sm-12 " align="center">
                                <a href="javascript:void(0);" class="hm-item-watching">
                                    <span>
                                        <img src="'.base_url().'assets/images/icons/watching-icon.png" />
                                    </span>
                                    '._GetCountForBid($product_value->product_id,'Watching').' Watching
                                </a>
                                <a href="javascript:void(0);" class="hm-item-bid">
                                    <span>
                                        <img src="'.base_url().'assets/images/icons/bid-icon.png" />
                                    </span>&nbsp;
                                    '._GetCountForBid($product_value->product_id,'Bids').' bids
                                </a>
							</div>';
							$bid_timer='<!--ITEM TIMER-->
                            <div class="col-sm-12 padding-top5" id="countdown_'.$k.'" align="center">                                
							<span class="hm-item-timer">Time Left :	<span class="days">00 Days</span> : <span class="hours">00 Hours</span> : <span class="minutes">00 Min</span> : <span class="seconds">00 Sec</span> </span>
								
							</div>
							<script type="text/javascript">$("#countdown_'.$k.'").downCount({date:/*MM DD YYYY HH MM SS*/ "'.$countdown_time.'",offset:5.5}, function (){}); 
	   </script>';							
						}
						if($product_value->post_type==3)
						{
							$button ='<div class="col-sm-12 padding-top5 padding-bottom5 padding-left0-right0" align="center">
									<a href="'.$product_value->web_url.'"class="hm-item-btn-lg" target="_blank" >Contact Us</a>
								</div>';							
						}
						if($product_value->post_type==4)
						{
							
							$download_button	=' <!--DOWNLOAD-->
                            <a class="hm-item-download" href="javascript:void(0);">
                                download
                            </a>';
						}
						if($product_value->post_type==1)
						{
							
							if($product_value->product_in_stock!=1)
							{
								$button ='<div class="col-sm-12 padding-top5 padding-bottom5 padding-left0-right0" align="center">
									<button class="hm-item-btn-lg" type="button">request product</button>
								</div>';
								$bid_count_and_watcher='';
								$bid_timer='';
							}							
						}						
						$Descriptions = substr(($product_value->product_description),0,200);
						
						$Descriptions =(strlen($product_value->product_description)>200)?$Descriptions.'...':$Descriptions;
						if($product_value->post_type==1){
							if($product_value->product_discount<>0)
							{
								$price='<p class="hm-item-price">                                    
										$'.$product_value->product_discount_pricing.'
									   &nbsp;&nbsp;&nbsp;&nbsp;
										<del><span>$'.$product_value->product_price.'</span></del>
										&nbsp;&nbsp;&nbsp;&nbsp;
										<span>
											<!--DISCOUNT-->
										   <span class="hm-item-discount" align="center">
												-'.$product_value->product_discount.'%
												</span>
										</span>
									</p>';
							}
							else
							{
								$price='<p class="hm-item-price">                                    
										$'.$product_value->product_price.'</p>';
							}
						}
						else{
								$price='';
							}
						if($product_value->post_type==3)
						{ 
							$product_name_link=' <!--ITEM NAME-->
                            <div class="col-sm-12 padding-top5" align="center">
							<a href="'.$product_value->web_url.'" class="hm-item-name" target="_blank">'.$product_value->product_name.'</a> </div>';
							if($product_value->img_count>1){
							$imageWithLink	=	'<a href="'.$product_value->web_url.'" class="hm-item-name vf-product-img" target="_blank" data-img-url="'.base_url().'assets/images/product/'.$imagedata[1].'">
							<img src="'.base_url().'assets/images/product/'.$imagedata[0].'" class="img-responsive item-image" />
							<a>';
							}
							else{
							$imageWithLink	=	'<a href="'.$product_value->web_url.'" class="hm-item-name vf-product-img" target="_blank" data-img-url="'.base_url().'assets/images/product/'.$imagedata[0].'">
							<img src="'.base_url().'assets/images/product/'.$imagedata[0].'" class="img-responsive item-image" />
							<a>';
							}
						}
						else
						{
							$product_name_link=' <!--ITEM NAME-->
                            <div class="col-sm-12 padding-top5" align="center">
							<a href="'.base_url().'ProductFullView/'.base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ').'/'.base64_encode($product_value->product_id).'/'. base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ').'" class="hm-item-name">'.$product_value->product_name.'</a>
                            </div>';
							if($product_value->img_count>1){
							$imageWithLink	=	'<a href="'.base_url().'ProductFullView/'.base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ').'/'.base64_encode($product_value->product_id).'/'. base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ').'" class="hm-item-name  vf-product-img" data-img-url="'.base_url().'assets/images/product/'.$imagedata[1].'" >
							<img src="'.base_url().'assets/images/product/'.$imagedata[0].'" class="img-responsive item-image" />
							<a>';
							}
							else{
							$imageWithLink	=	'<a href="'.base_url().'ProductFullView/'.base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ').'/'.base64_encode($product_value->product_id).'/'. base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ').'" class="hm-item-name  vf-product-img" data-img-url="'.base_url().'assets/images/product/'.$imagedata[0].'" >
							<img src="'.base_url().'assets/images/product/'.$imagedata[0].'" class="img-responsive item-image" />
							<a>';
							}
						}
						$col='<div id="ghewfj-'.$product_value->product_id.'">
						<div class="col-sm-12 hm-item-container">                         
							<!--Count-->
							
                           '.$download_button.'

                            <!--FOR ITEM BY-->
                            <div class="col-sm-6" align="left">
                                <a href="'.base_url().'User/'.$product_value->user.'" class="hm-item-by-link">
                                    <span>
                                        <img src="'.base_url().'assets/UserImage/'.$product_value->user_id.'/'.$product_value->user_image.'" />
                                    </span>
                                    @'.$product_value->user.'
                                </a>
                            </div>

                            <!--ITEM UPLOAD ITME AGO-->
                            <div class="col-sm-6" align="right">
                                <span class="hm-item-time">
                                     '. HumanTiming($product_value->created_date).'
                                </span>
                            </div>

                            '.$bid_timer.'
                            <!--ITEM IMAGE-->
                            <div class="col-sm-12 padding-top5 item-img-container padding38" align="center">'.
							$imageWithLink.@$colordiv.'
                            </div>                           

                            <!--ITEM STOCK-->
                                                                                                    

                           '.$product_name_link.'                            

                            <!--ITEM DESCRIPTIONS-->
                            <div class="col-sm-12 padding-top5" align="left">
                                <a href="'.base_url().'ProductFullView/'.base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ').'/'.base64_encode($product_value->product_id).'/'. base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ').'" class="hm-item-desc">
                                    '.$Descriptions.'
                                </a>
                            </div>                           
                            '.$bid_count_and_watcher.'                     
                            <!--ITEM PRICE-->
                            <div class="col-sm-12 padding-top5 padding-bottom10" align="center">
                               '.$price.'
                            </div>
                            
                            <!--DIVIDER LINE-->
                            <div class="col-sm-12 padding-top10 border-top1-888888" align="center"></div>                            

                            <!--ITEM LARGE BUTTON ADD TO CART, ACCEPT REQUEST, PLACE BID & CONTACT US-->
                            '.$button. $Like_Share_Comment.'

                                                        
                        </div>
                        <div class="col-sm-12 padding-top80"></div> </div>';
						if($i==1) 
						{
							@$caldivOne.= $col;
								
						}if($i==2)
						{
							@$caldivtwo.= $col;
								
						}if($i==3)
						{
							@$caldivthree.= $col;
								
						}
						if($i==4)
						{
							@$caldivfour.= $col;
							$i=0;	
							
						}
						$i++; $k++;	
						$tag='';
						$button ='';
						$bid_count_and_watcher='';
						$bid_timer='';
						$download_button	='';
						$divcolor='';
						$colordiv='';
						$fb_Share='';
						
					} 
					?>
                    <div id="itemColumn1" class="col-sm-3 padding-bottom20">
                        <!--MAIN ITEM DIV-->
                        <?php echo @$caldivOne; ?>						
                    </div>
					<div id="itemColumn2" class="col-sm-3 padding-bottom20">
                        <!--MAIN ITEM DIV-->
                        <?php echo @$caldivtwo; ?>
                    </div>
					<div id="itemColumn3" class="col-sm-3 padding-bottom20">
                        <!--MAIN ITEM DIV-->
                        <?php echo @$caldivthree; ?>
                    </div>
					<div id="itemColumn4" class="col-sm-3 padding-bottom20">
                        <!--MAIN ITEM DIV-->
                        <?php echo @$caldivfour; ?>
                    </div>	
					<div class="col-sm-12 padding-top20 padding-bottom20" align="center">
					<?php echo $this->pagination->create_links(); ?>
                     </div> 
				</div>
				<?php } else { ?> NO Data <?php }?>
                <div class="col-sm-1"></div>
            </div>
        </div>
    </section>
	