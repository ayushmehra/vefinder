<!--FOLLOWS SECTION-->
    <section class="hm-follows-list-section ui-display-none">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8 padding-left20 padding-right20">
                    <a href="javascript:void(0);" class="close-follows-popup">
                        <img src="<?php echo base_url();?>assets/images/close-report-popup.png">
                    </a>
                    <div class="col-sm-12 followers-list-container"> 
                        <h4 class="followerss-list-heading">Follows(<span id="noOfFollower"><?php echo $Follows;?></span>)</h4>
                        <div class="col-sm-12 padding-top20">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10 search-box-container">
                                <span>
                                    <img src="<?php echo base_url();?>assets/images/modal-search-bar-icon.png">
                                </span>
                                <input type="text" id="box"placeholder="Search">
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                        <div class="col-sm-12 padding-top30">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10 followerList-container follow-list " id="followerList">
							<?php if (is_array($follow_list)&&(!empty($follow_list))){ foreach($follow_list as $follower) { ?>
                                <div class="col-sm-12 follower-item" id="follow_list-remove-<?php echo $follower->follow_id;?>">
                                    <a href="<?php echo base_url();?>User/<?php echo $follower->username; ?>">
									<span class="follower-name-icon">
                                        <?php echo $follower->letter; ?>
                                    </span>
									</a>
									<a href="<?php echo base_url();?>User/<?php echo $follower->username; ?>">
                                    <span class="follower-name">
                                        @<?php echo $follower->first_name.' '.$follower->last_name; ?>
                                    </span></a>
									<?php if($this->session->userdata('user_id')<> $follower->followed_to){ ?>
                                    <a href="javascript:void(0);" data-follow="<?php echo base64_encode($follower->followed_to)?>" class="hm-follow-link-lg follow2">
                                        Unfollow
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
		$(document).on("click",'.follow2',function(e){	
				var val = $(this).data('follow');	
				$.ajax({		
                url: base_url+'UnfollowUser',
                type: 'POST',
                data: "follow=" + val,
                dataType:"json",
                success:function(response)
                {
                    if(response.exists == "1") 
                    {							
						$('#follow_list-remove-'+response.div).remove();
						$('#noOfFollower').html(response.count);
						$('.popupCount').html(response.follow_count);						
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
	$("#box").on('keyup', function(){
  var matcher = new RegExp($(this).val(), 'gi');
  $('.follower-item').show().not(function(){
      return matcher.test($(this).find('.follower-name').text())
  }).hide();
});
	</script>