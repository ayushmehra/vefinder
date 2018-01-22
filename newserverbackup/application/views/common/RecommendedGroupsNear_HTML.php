<script type="text/javascript">
    function joinEvent(eventId){
        window.location.href="<?php echo base_url(); ?>Event/JoinEvent?eventId="+eventId;
    }
</script>
<section class="vf-item-slider-section vf-bg-white">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <h5 class="vf-item-slider-section-heading">
                        Recomended Events Near You&nbsp;&nbsp;
                        <a href="javascript:void(0);">
                            View All
							&nbsp;&nbsp;
                            <i class="fa fa-caret-right" aria-hidden="true"></i>
                        </a>
                    </h5>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-12 padding-top10"></div>
                <div class="col-sm-12">
                    <div id="carousel-item-3" class="carousel slide" data-ride="carousel" data-interval="5000">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-10">

                                    <?php 
                                    foreach ($eventsData as $key => $value) {
                                    ?>
                                    <div class="col-sm-3 padding-bottom20">
                                        <div class="col-sm-12 hm-item-container">

                                            <!--FOR ITEM BY-->
                                            <div class="col-sm-6" align="left">
                                                <a href="javascript:void(0)" class="hm-item-by-link">
                                                    <span>
                                                        <img src="<?php echo base_url();?>assets/images/product/product-by-icon.png" />
                                                    </span>
                                                    @Vefinder
                                                </a>
                                            </div>

                                            <!--ITEM UPLOAD ITME AGO-->
                                            <div class="col-sm-6" align="right">
                                                <span class="hm-item-time">
                                                    35 seconds ago
                                                </span>
                                            </div>

                                            <!--ITEM GROUP-->
                                            <div class="col-sm-12 padding-top5  padding-bottom20">
                                                
                                                <img src="<?php echo base_url();?>/assets/event/<?php echo $value['image1'];?>" class="img-responsive">
                                            </div>

                                            <!--ITEM NAME-->
                                            <div class="col-sm-12 padding-top5" align="center">
                                                <a href="javascript:void(0);" class="hm-item-name"><?php echo $value['name'];?></a>
                                            </div>

                                            <!--ITEM DESCRIPTIONS-->
                                            <div class="col-sm-12 padding-top5" align="left">
                                                <p class="hm-item-desc">
                                                    <?php echo $value['description'];?>
                                                </p>
                                            </div>

                                            

                                            <!--ITEM GROUP ICONS REQUEST ACTION EX: YES, NO, STAR-->
                                            <div class="col-sm-12 padding-top15 ui-display-none" align="center">
                                                <ul class="item-icon">
                                                    <li class="req-action">
                                                        <a href="javascript:void(0)">
                                                            <img src="<?php echo base_url();?>assets/images/product/item-more-opt-icon.png" />
                                                        </a>
                                                    </li>
                                                    <li class="req-action">
                                                        <a href="javascript:void(0)">
                                                            <img src="<?php echo base_url();?>assets/images/product/item-accept-icon.png" />
                                                        </a>
                                                    </li>
                                                    <li class="req-action">
                                                        <a href="javascript:void(0)">
                                                            <img src="<?php echo base_url();?>assets/images/product/item-reject-icon.png" />
                                                        </a>
                                                    </li>
                                                    <li class="req-action">
                                                        <a href="javascript:void(0)">
                                                            <img src="<?php echo base_url();?>assets/images/product/item-star-icon.png" />
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <!--ITEM GROUP DESCRIPTION-->
                                            <div class="col-sm-12 padding-top5 padding-bottom10" align="center">
                                                <a href="javascript:void(0);" class="hm-item-group-desc">
                                                    <span>
                                                        <img src="<?php echo base_url();?>assets/images/product/item-group-icon.png" />
                                                    </span>&nbsp;
                                                    Chelesa and 3 others
                                                </a>
                                            </div>

                                            <!--DIVIDER LINE-->
                                            <div class="col-sm-12 padding-top10 border-top1-888888" align="center"></div>

                                            <!--ITEM LARGE BUTTON ADD TO CART, ACCEPT REQUEST, PLACE BID, JOIN EVENT & CONTACT US-->
                                            <div class="col-sm-12 padding-top5 padding-bottom5" align="center">
                                                <?php if($value['isJoined']=='1'){ ?>
                                                <button class="hm-item-btn-lg" type="button" onclick="">Joined</button>
                                                <?php }else{?>
                                                <button class="hm-item-btn-lg" type="button" onclick="joinEvent(<?php echo $value['id'];?>);">Join event</button>
                                                <?php }?>

                                            </div>
                                        </div>
                                    </div>
                                    <?php }?>
                                    
                                    
                                    
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                        </div>
                        <!-- Controls -->
                        <a id="itemBoughtLeftSlide" class="left carousel-control top-50per" href="#carousel-item-3" role="button" data-slide="prev">
                            <img src="<?php echo base_url();?>assets/images/slide-left-icon.png" />
                        </a>
                        <a id="itemBoughtRightSlide" class="right carousel-control top-50per" href="#carousel-item-3" role="button" data-slide="next">
                            <img src="<?php echo base_url();?>assets/images/slide-right-icon.png" />
                        </a>
                    </div>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-10 padding-bottom20 border-bottom3"></div>
                <div class="col-sm-1"></div>
            </div>
        </div>
    </section>
    