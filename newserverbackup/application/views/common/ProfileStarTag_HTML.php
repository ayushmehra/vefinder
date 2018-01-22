 <section class="vf-profile-interest-tag-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 padding-bottom10">
                    <h4 class="vf-profile-interest-tag-heading">
                       <?php echo $user_info->first_name;?>'s Interest
                    </h4>
                </div>
				<?php 					
					$user_intrestTag	=	_GetUserTag($user_info->user_id);
					$i=0;
					if(is_array($user_intrestTag))
					{ ?>
					   <div class="col-sm-12">
							<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="5000">
								<!-- Wrapper for slides -->
								<div class="carousel-inner" role="listbox">
									<?php 
											foreach($user_intrestTag as $value)
											{ //print_r($value); die; ?>
									<?php 	
												if($i==0){ ?><div class="item active"><div class="col-sm-1"></div><div class="col-sm-10" align="center"><ul class="vf-tag-list"><?php } ?>
													<li>
														<div>
															<a href="javascript:void(0);">
																<?php echo $value->interests_name;?>
															</a>
														</div>
													</li> 
												<?php $i++;	if(($i%8==0)&&($i!= count($user_intrestTag))){ ?></ul></div><div class="col-sm-1"></div></div><div class="item"><div class="col-sm-1"></div><div class="col-sm-10" align="center"><ul class="vf-tag-list"><?php } ?>
									<?php   } ?>
									</ul></div><div class="col-sm-1"></div></div>
								</div>
								<!-- Controls -->
								<?php /*if(count($user_intrestTag)>6){?>
								<a id="interestLeftSlide" class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
									<img src="<?php echo base_url();?>assets/images/slide-left-icon.png" />
								</a>
								<a id="interestRightSlide" class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
									<img src="<?php echo base_url();?>assets/images/slide-right-icon.png" />
								</a>
								<?php }  */?>
							</div>
						</div>
                
				<?php } ?>
                <div class="col-sm-12 padding-top40"></div>
				<div class="col-sm-12">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10" align="center">
                        <ul class="vf-item-types-list">
                            <li>
                                <div class="vf-item-types-container vf-item-container-ff286f">
                                    <a href="javascript:void(0);">
                                        <span><?php echo $Request; ?></span><br />
                                        Requests
                                    </a>
                                </div>
                            </li>

                            <li>
                                <div class="vf-item-types-container vf-item-container-fc6603">
                                    <a href="javascript:void(0);">
                                        <span><?php echo $Auction; ?></span><br />
                                        Auction
                                    </a>
                                </div>
                            </li>

                            <li>
                                <div class="vf-item-types-container vf-item-container-3f48cc">
                                    <a href="javascript:void(0);">
                                        <span><?php echo $All; ?></span><br />
                                        All
                                    </a>
                                </div>
                            </li>

                            <li>
                                <div class="vf-item-types-container vf-item-container-77e698">
                                    <a href="javascript:void(0);">
                                        <span><?php echo $Selling; ?></span><br />
                                        Uploads
                                    </a>
                                </div>
                            </li>

                            <li>
                                <div class="vf-item-types-container vf-item-container-ed1c24">
                                    <a href="javascript:void(0);">
                                        <span><?php echo $Ads; ?></span><br />
                                        Ads
                                    </a>
                                </div>
                            </li>

                            <li>
                                <div class="vf-item-types-container vf-item-container-a349a4">
                                    <a href="javascript:void(0);">
                                        <span>0</span><br />
                                        Events
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-1"></div>
                </div>
            </div>
        </div>
</section>   