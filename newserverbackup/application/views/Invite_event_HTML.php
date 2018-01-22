<!DOCTYPE html> 
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <head><?php include VIEWPATH.'common/HeaderScript_HTML.php'; ?>
        <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/css/scrolling-nav.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/typography.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/commons.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/events.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/vefinder.new.style.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/vefinder.style.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/vefinder.gapping.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/event-invite.css">
		<style>
		
		</style>
    </head>
    <body id="page-top">
        <div id="wrapper">
            <!-- Navigation -->
            <div id="Header">
                <?php include VIEWPATH.'common/NavBar_HTML.php'; ?>
	
            <section class="blank-section">
                <div class="container">
                    <div class="row">
                    </div>
                </div>
            </section>
            <?php include VIEWPATH.'common/SubMenu_HTML.php'; ?>
            </div>
        <!-- Main Content -->
        <div class="overlay">
            <div class="popup">
                <i class="material-icons overlay-close-icon"><a href="<?php echo base_url()?>Events">cancel</a></i>
                <p class="heading">Invite Users</p>
                <input type="text" class="overlay-search" placeholder="Search">
                <i class="material-icons overlay-search-icon">search</i>
                <div class="invite-users clearfix">
                    <?php 
                    foreach ($eventsData as $key=>$value){
                    ?>
                    <div class="row">
                        <div class="col-lg-6 left-content">
                            <img src="<?php echo base_url();?>assets/UserImage/<?php echo $value['user_id']."/".$value['profile_image']?>" style="height: 100px;width: 100px;" />
                            <p class="display-profile-name">
							<a href="<?php echo base_url() ?>User/<?php echo $value['username'] ?>" class="hm-item-by-link">@<?php echo $value['username']?></a></p>
                        </div>
                        <div class="col-lg-6 right-content">
						  <?php if($value['invited']=='Invite') { ?>
                            <button class="<?php echo $value['invite_class'] ?>-user-btn"
                                   <?php if($value['invited']=='Invite')?>
                                    onclick="inviteUser(<?php echo $value['user_id'] ?>);"
                                    
                                    >
                                <?php echo $value['invited'];?>
                            </button>
							
						  <?php } else { ?>
						   <button class="<?php echo $value['invite_class'] ?>-user-btn"  >
                                <?php echo $value['invited'];?>
                            </button>
						  
						  <?php } ?>
							
							
							
							
							
							
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php include VIEWPATH . 'common/Footer_HTML.php'; ?>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/scrolling-nav.js"></script>
    <script src="assets/js/commons.js"></script>
    <script>
    function uploadImageMaster(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var wd = $('#master-image').parent().width();
                var ht = $('#master-image').parent().height();
                $('#master-image').attr('src', e.target.result).width(wd).height(ht);
                $('#master-image').css('margin-top',-ht/2);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    function uploadImage1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var wd = $('#image-1').parent().width();
                var ht = $('#image-1').parent().height();
                $('#image-1').attr('src', e.target.result).width(wd).height(ht);
                $('#image-1').css('margin-top',-ht/1.3);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    function uploadImage2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var wd = $('#image-2').parent().width();
                var ht = $('#image-2').parent().height();
                $('#image-2').attr('src', e.target.result).width(wd).height(ht);
                $('#image-2').css('margin-top',-ht/1.3);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    function uploadImage3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var wd = $('#image-3').parent().width();
                var ht = $('#image-3').parent().height();
                $('#image-3').attr('src', e.target.result).width(wd).height(ht);
                $('#image-3').css('margin-top',-ht/1.3);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    function inviteUser(userId){
        window.location.href="<?php echo base_url();?>SendInvitation?toID="+userId;
    }
    </script>
  </body>
</html>