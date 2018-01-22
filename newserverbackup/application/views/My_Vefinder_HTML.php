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
	<section class="tm-vefinder-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <div class="col-sm-4">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10 vf-tm-profile-pic-container" align="center">
							<?php if(($user_info->profile_image=='')||($user_info->profile_image=='n/a')){ $user_image= base_url().'assets/images/user-icon.png';}
								else{ $user_image=base_url().'assets/UserImage/'.$user_info->user_id.'/'.$user_info->profile_image;}?>
                                <img src="<?php echo $user_image;?>" class="vf-tm-profile-pic" />
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                        <div class="col-sm-8">
                            <h2 class="vf-tm-profile-name"> <?php echo $user_info->first_name; ?>  's Vefinder</h2>
                            <a href="javascript:void(0);" class="vf-tm-track-order-link">
                                View Track and Cancel an order
                            </a>
                            <div class="col-sm-12"></div>
                            <!--LINK PAIR-->
                            <div>
                                <div class="col-sm-5 padding-top20">
                                    <a href="<?php echo base_url();?>My-Order" class="hm-item-link-lg" type="button">Your Orders</a>
                                </div>
                                <div class="col-sm-5 padding-top20">
                                    <a href="<?php echo base_url();?>My-DreamBox" class="hm-item-link-lg" type="button">Dream Box</a>
                                </div>
                                <div class="col-sm-2"></div>
                            </div>

                            <!--LINK PAIR-->
                            <div>
                                <div class="col-sm-5 padding-top20">
                                    <a href="<?php echo base_url();?>My-Sold-Item" class="hm-item-link-lg" type="button">Sold Items</a>
                                </div>
                                <div class="col-sm-5 padding-top20">
                                    <a href="<?php echo base_url();?>My-Requested-Items" class="hm-item-link-lg" type="button">Requested Items</a>
                                </div>
                                <div class="col-sm-2"></div>
                            </div>
                            
                            <!--LINK PAIR-->
                            <div>
                                <div class="col-sm-5 padding-top20">
                                    <a href="javascript:void(0);" class="hm-item-link-lg" type="button">Digital Downloads</a>
                                </div>
                                <div class="col-sm-5 padding-top20">
                                    <a href="javascript:void(0);" class="hm-item-link-lg" type="button">Groups</a>
                                </div>
                                <div class="col-sm-2"></div>
                            </div>

                            <!--LINK PAIR-->
                            <div>
                                <div class="col-sm-5 padding-top20">
                                    <a href="javascript:void(0);" class="hm-item-link-lg" type="button">FAQ </a>
                                </div>
                                <div class="col-sm-5 padding-top20">
                                    <a href="javascript:void(0);" class="hm-item-link-lg" type="button">Ads</a>
                                </div>
                                <div class="col-sm-2"></div>
                            </div>

                            <!--LINK PAIR-->
                            <div>
                                <div class="col-sm-5 padding-top20">
                                    <a href="<?php echo base_url()?>MyBids" class="hm-item-link-lg" type="button">Bids</a>
                                </div>
                                <div class="col-sm-5 padding-top20">
                                    <a href="<?php echo base_url();?>Events" class="hm-item-link-lg" type="button">Events</a>
                                </div>
                                <div class="col-sm-2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-1"></div>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
    </section>
	 <?php include VIEWPATH.'common/Ad_HTML.php'; ?>
	<?php include VIEWPATH.'common/Footer_HTML.php'; ?>
</body>
</html> 