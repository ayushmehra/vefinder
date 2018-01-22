 <!--FOLLOWERS SECTION-->
    <section class="hm-followers-list-section ui-display-none">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8 padding-left20 padding-right20">
                    <a href="javascript:void(0);" class="close-follower-popup">
                        <img src="<?php echo base_url();?>assets/images/close-report-popup.png">
                    </a>
                    <div class="col-sm-12 followers-list-container"> <?php  //echo "here"; ?>
                        <h4 class="followerss-list-heading">Followers(<span class="inputcount"><?php echo $Followers;?></span>)</h4>
                        <div class="col-sm-12 padding-top20">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10 search-box-container">
                                <span>
                                    <img src="<?php echo base_url();?>assets/images/modal-search-bar-icon.png">
                                </span>
                                <input type="text" id="box2" placeholder="Search">
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                        <div class="col-sm-12 padding-top30">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10 followerList-container follower-List" id="followerList">
							<?php if (is_array($follower_list)&&(!empty($follower_list))){ foreach($follower_list as $follower) { ?>
                                <div class="col-sm-12 follower-item" id="follower_list-remove-<?php echo $follower->follow_id;?>">
                                   <a href="<?php echo base_url();?>User/<?php echo $follower->username; ?>">
									   <span class="follower-name-icon">
                                        <?php echo $follower->letter; ?>
                                    </span>
									</a>
									<a href="<?php echo base_url();?>User/<?php echo $follower->username; ?>">
                                    <span class="follower-name">
                                        @<?php echo $follower->first_name.' '.$follower->last_name; ?>
                                    </span>
									</a>
									<?php if($this->session->userdata('user_id')<> $follower->followed_by){ ?>
                                    <a href="javascript:void(0);" class="hm-follow-link-lg follow-unfollow text-change-<?php echo $follower->followed_by;?>"  data-val="<?php echo base64_encode($follower->followed_by);?>">
                                        <?php $check=	_IAmFollowingThisUser($follower->followed_by);echo ($check==true)?'Un-Follow':'Follow';?>
                                    </a>
									<?php } ?>
                                </div> 
							<?php } } ?>
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
    </section>
	<script>		
		$(document).ready(function(){
			$('.follow-unfollow').click(function() {	
				var val = $(this).data('val');	
				$.ajax({		
					url: base_url+'FollowUnfollowUser',
					type: 'POST',
					data: "follow=" + val,
					dataType:"json",
					success:function(response)
					{
						if(response.exists == "1") 
						{				
							$(".text-change-"+response.a).html(response.followingText);								
						}
						if(response.exists == "2") 
						{										
							window.setTimeout(function(){window.location.href=base_url+'Login'}, 3000 );	
						}
					}
				});
			});
		});
		</script>
		<script>	
	$("#box2").on('keyup', function(){
  var matcher = new RegExp($(this).val(), 'gi');
  $('.follower-item').show().not(function(){
      return matcher.test($(this).find('.follower-name').text())
  }).hide();
});
	</script>