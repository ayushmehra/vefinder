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
                <div class="col-sm-12">
                    <h4 class="order-section-heading">
                        Track order
                    </h4>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-10 padding-top50 padding-bottom30">
                    <div class="col-sm-12">
                        <div class="col-sm-3" align="center">
                            <div class="col-sm-12" align="left">                                
								 <a href="<?php echo base_url().'User/'.$product->user;?>" class="hm-item-by-link">
                                    <span>
                                        <img src="<?php echo base_url();?>assets/images/product/product-by-icon.png" />
                                    </span>
                                    @<?php echo $product->user;?>
								</a>
                            </div>
                            <?php foreach($product->images as $image){  ?>
									<a href="<?php echo base_url().'ProductFullView/'.base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ').'/'.base64_encode($product->product_id).'/'. base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ');?>">
										<img src="<?php echo base_url();?>assets/images/product/<?php echo $image->image_name;?>" class="img-responsive">
									</a>
								<?php } ?>
                            <br>
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
                        <div class="col-sm-6 padding-top30">
                            <h4 class="order-arriving-info">
                                Arriving on Thursday 19th Feb
                            </h4>
                            <a href="javascript:void(0);" class="order-arriving-link">
                                View order detail
                            </a>
                        </div>
                        <div class="col-sm-3 padding-left50" align="right">
                            <p class="order-track-info">
                                <span>Order Number <?php echo  $sold_item_info->show_order_id; ?></span><br>
                                <span><?php echo date("jS F Y",strtotime($sold_item_info->created_date)); ?> </span>
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-12 padding-top30">
                        <div class="col-sm-9">
                            <div class="col-sm-12 track-path-container">
                                <img src="<?php echo base_url(); ?>assets/images/open-ring.png" class="path-end">
                                <div class="track-path" data-width="50"></div>
                                <img src="<?php echo base_url(); ?>assets/images/close-ring.png" class="path-in-between ui-display-none">
                            </div>
                        </div>
                        <div class="col-sm-3" align="right">
                            
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="col-sm-9">
                            <div class="col-sm-3" align="left">
                                <p class="track-path-info">
                                    Ordered<br>
									<?php $date=	explode('-',date("d-m-Y",strtotime($sold_item_info->created_date)));?>
                                    <span> <?php echo $date[0];?><sup>th</sup> <?php echo date('M',strtotime($sold_item_info->created_date));?> </span>
                                </p>
                            </div>
                            <div class="col-sm-3" align="left">
                                <p class="track-path-info ui-display-none packed">
                                    Packed
                                </p>
                            </div>
                            <div class="col-sm-3" align="left">
                                <p class="track-path-info ui-display-none shipped">
                                    Shipped<br>
                                    On the way
                                </p>
                            </div>
                            <div class="col-sm-3" align="right">
                                <p class="track-path-info ui-display-none delivered">
                                    Delivered
                                </p>
                                <p class="track-path-info arrived">
                                    Arriving on<br>
                                    19th feb Thursday
                                </p>
                            </div>
							<!--DELIVERY TEXT-->
                            <div class="col-sm-12" align="right">
                                <p class="order-delivery-info">
                                    Here the address where the order will be delivered
                                </h4>
                            </div>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>
    </section>
	<?php include VIEWPATH.'common/Footer_HTML.php'; ?>
</body>
</html> 