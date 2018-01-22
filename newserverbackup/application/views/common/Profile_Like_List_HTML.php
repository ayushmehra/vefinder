<!--LIKES SECTION-->
    <section class="hm-likes-list-section ui-display-none">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4 padding-left20 padding-right20">
                    <a href="javascript:void(0);" class="close-likes-popup">
                        <img src="<?php echo base_url();?>assets/images/close-report-popup.png">
                    </a>
                    <div class="col-sm-12 followers-list-container">
                        <h4 class="followerss-list-heading">Likes<span class="inputcountlike"><?php echo ($Likes<>0)?'('.$Likes.')':'';?></span></h4>
                        <div class="col-sm-12 padding-top30">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10 followerList-container like-list" id="followerList">
							<?php if (is_array($like_list)&&(!empty($like_list))){ foreach($like_list as $liker) { ?>
                                <div class="col-sm-12 follower-item" align="center" id="like_list-remove-<?php echo $liker->profile_like_id;?>">
                                    <a href="<?php echo base_url().'User/'.$liker->username;?>" class="vf-item-fullview-by-link">
										<span class="follower-name-icon">
                                        <?php echo $liker->letter; ?>
                                    </span>
                                    <span class="follower-name">
                                        @<?php echo $liker->first_name.' '.$liker->last_name; ?>
                                    </span>
									</a>
                                </div> 
							<?php }} ?>
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
    </section>
