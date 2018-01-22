<!DOCTYPE html> 
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <head><?php include VIEWPATH . 'common/HeaderScript_HTML.php'; ?>
        <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/css/scrolling-nav.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/typography.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/commons.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/events.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/vefinder.new.style.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/vefinder.style.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/vefinder.gapping.css">
        <style>
            .event-pic img {height: 150px;width: 150px;}
        </style>
    </head>
    <body id="page-top">
	<?php 
	$fb_Share	=		<<<EOT
<a href="javascript:;" onClick="postToFeed('{$ftitle}', '{$fdesc}','{$url}','{$fbimg}');" title="Facebook">
EOT;
	?>
        <div id="wrapper">
            <!-- Navigation -->
            <div id="Header">
                <?php include VIEWPATH . 'common/NavBar_HTML.php'; ?>
                
                <section class="blank-section">
                    <div class="container">
                        <div class="row">
                        </div>
                    </div>
                </section>
                <?php include VIEWPATH . 'common/SubMenu_HTML.php'; ?>
            </div>
            <!-- Main Content -->
            <div id="content">
                <div class="container main-content">
                    <div class="heading-section">
                        <h4 class="page-heading"><?php echo $this->session->userdata('name') ?>'s Vifinder</h4>
                        <p class="page-subheading">Events</p>
                    </div>
                    <?php
                    if (count($eventsData) > 0) {
                        foreach ($eventsData as $key => $value) {
                            ?>
                    <?php //include VIEWPATH.'common/CommentsPopupProductPage_HTML.php'; ?>
                            <div class="events-section">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <img class="display-pic" src="./assets/images/profile_pic.png" alt="profile" title="thierry" />
                                        <span class="profile-name">@<?php echo $this->session->userdata('name') ?></span>
                                        <div class="event-pic">
                                            <img src="<?php echo base_url(); ?>assets/event/<?php echo $value['image1'] ?>" alt="event-pic" title="Event" />
                                        </div>
                                        <div class="event-actions row">
                                            <?php
                                            $tags = explode(",", $value['tags']);
                                            foreach ($tags as $keyT => $valueT) {
                                                ?>
                                                <div class="col-xs-6">
                                                    <button class="clothes-btn"><?php echo $valueT; ?></button>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 event-details">
                                        <h4><?php echo $value['name'] ?></h4>
                                        <p class="event-location">
                                            <i class="material-icons">location_on</i>&nbsp;
                                            <?php echo $value['location'] ?>
                                        </p>
                                        <p class="event-date">
                                            <i class="material-icons">event_note</i>&nbsp;
                                            <?php echo date("d M Y h:i a", strtotime($value['date'])) ?>
                                        </p>
                                        <!-- <p class="event-attendies">
                                            <i class="material-icons">location_on</i>&nbsp;
                                            @Rishabh Mehrotra and 215 will attend
                                        </p> -->
                                        <p class="event-description">
                                            <?php echo $value['description'] ?>
                                        </p>
                                    </div>
                                    <div class="col-lg-3 action-menus">
                                        <button class="invite-btn" onclick="showInvitePage();">
                                            invite users
                                        </button>
                                        <div class="row action-items">
                                            <div class="col-xs-3 like_<?php echo $value['id'];?>">
                                                <img <?php if($value['likes']>0){?>src="./assets/images/icons/heart.png"<?php }else{?>src="./assets/images/like-icon.png"<?php }?> onclick="increaseLikeCount(<?php echo $value['id'] ?>);" />
                                                
                                                <span><?php echo $value['likes'] ?></span>
                                            </div>
                                            <a href="<?php echo base_url();?>IndividualEvents?eventId=<?php echo $value['id'];?>" class="vf-item-fullview-icon" onclick="$('.vf-comments-popup-section').fadeIn(1000);">
                                            <div class="col-xs-3">
                                                <img src="./assets/images/comment-icon.png" />
                                                <span><?php echo $value['comments'] ?></span>
                                            </div>
                                            </a>
                                            <div class="col-xs-3">
											<?php echo $fb_Share;?>
                                                <img src="./assets/images/share-icon.png" />
                                            </div>
                                            <div class="col-xs-3">
                                                <img src="./assets/images/more-icon.png" />
                                            </div>
                                        </div>
                                        <br />
                                        <div class="start-chat">
                                            <a class="start-chat-link" href="#">
                                                <i class="material-icons">textsms</i>&nbsp;&nbsp;Start Chat with host
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    } ?>
                </div>
            </div>
            <!-- Footer -->
<?php include VIEWPATH . 'common/Footer_HTML.php'; ?>
        </div>
        <script>
            function showInvitePage() {
                window.location.href = "<?php echo base_url(); ?>InviteUsers";
            }

            function increaseLikeCount(id) {
                $.ajax({
                    url: '<?php echo base_url(); ?>Event/EventLike',
                    type: 'POST',
                    data: {id: id},
                    success: function (data) {
                        
                        var result=JSON.parse(data);
                        if(result.exists=='1'){
                            $('.like_'+id+' img').attr('src','http://vefinder.puzzlecoder.com/assets/images/icons/heart.png');
                            var count=parseInt($('.like_'+id+' span').text());
                            $('.like_'+id+' span').text("");
                            $('.like_'+id+' span').text(count+1);
                        }else if(result.exists=='2'){
							$('.like_'+id+' img').attr('src','http://vefinder.puzzlecoder.com/assets/images/icons/like-icon.png');
                            var count=parseInt($('.like_'+id+' span').text());
                            $('.like_'+id+' span').text("");
                            $('.like_'+id+' span').text(count-1);
						}
                    }
                });
            }
            
            function addComment(comment,eventID) {
                $.ajax({
                    url: '<?php echo base_url(); ?>Event/EventLike',
                    type: 'POST',
                    data: {Comment: comment,EventID,eventID},
                    success: function (data) {
                        location.reload();
                    }
                });
            }
        </script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.easing.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/scrolling-nav.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/commons.js"></script>

    </body>
</html>