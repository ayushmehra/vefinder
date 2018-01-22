<!DOCTYPE html>
<html>
<head>
<?php include VIEWPATH.'common/HeaderScript_HTML.php'; ?>
<head>
<body>
	<?php include VIEWPATH.'common/Report_Popup_HTML.php'; ?>	
	<?php include VIEWPATH.'common/UserFollowers_List_HTML.php'; ?>
	<?php include VIEWPATH.'common/UserFollows_List_HTML.php'; ?>
	<?php include VIEWPATH.'common/Profile_Comment_List_HTML.php'; ?>
	<?php include VIEWPATH.'common/Profile_Like_List_HTML.php'; ?>
	<?php include VIEWPATH.'common/NavBar_HTML.php'; ?>
	<section class="blank-section">
        <div class="container">
            <div class="row">
            </div>
        </div>
    </section>
	<?php include VIEWPATH.'common/SubMenu_HTML.php'; ?>
	 <!--Profile Cover Pic-->
	 <?php if(($user_info->cover_image=='')||($user_info->cover_image=='n/a')){ $cover_image=  base_url().'assets/images/cover-pic.png';}
		   else{ $cover_image=  base_url().'assets/UserImage/'.$user_info->user_id.'/CoverImage/'.$user_info->cover_image;}?>
    <section class="vf-profile-cover-pic-section" style="background-image: url(<?php echo $cover_image;?>);"> 
		 <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 vf-profile-name-container">
                    <div class="col-sm-4 padding-top20" align="right">
                        <h4 class="vf-profile-name">
                             <?php echo $user_info->first_name.' '.$user_info->last_name; ?>  
                        </h4>
                    </div>
                    <div class="col-sm-4"></div>
                   <div class="col-sm-4 changeFOption" align="center">
                        <a href="javascript:void(0);" data-follow="<?php echo base64_encode($user_info->user_id)?>" class="hm-follow-unfollow-link-lg follow" id="profileFollowToggleBtn"><?php echo ($follow_this_user==1)?'Un-Follow':'Follow'; ?></a>
						 <a href="javascript:void(0);" data-like="<?php echo base64_encode($user_info->user_id)?>" class="hm-follow-unfollow-link-lg Like" id="profileLikeToggleBtn"><?php echo ($like_this_user==1)?'Un-Like':'Like'; ?></a>
                    </div> 
					
                </div>
            </div>
        </div>
    </section>	
	  <!--Profile Option with Profile Pic-->
    <section id="profileOptionSection" class="vf-profile-option-section margin-top-neg110">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="col-sm-4">
                    </div>
                    <!--Profile Pic-->
                    <div class="col-sm-4">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8" align="center">
                            <div class="col-sm-12 vf-profile-pic-container" align="center">
                               <?php if(($user_info->profile_image=='')||($user_info->profile_image=='n/a')){ $user_image= base_url().'assets/images/user-icon.png';}
								else{ $user_image=base_url().'assets/UserImage/'.$user_info->user_id.'/'.$user_info->profile_image;}?>
								<img src="<?php echo $user_image;?>" class="vf-profile-pic" />
                            </div>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                    <div class="col-sm-4"></div>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-12 padding-top10"></div>
                <div class="col-sm-12 padding-bottom20 border-bottom1-f9f9f9" id="profileTrafficOption">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <div class="col-sm-4">
                            <div class="col-sm-6" align="center">
                                <a href="javascript:void(0);" class="vf-profile-options-link follower input-count">
                                    <span>
                                        <img src="<?php echo base_url();?>assets/images/icons/follower-icon.png" />
                                    </span>&nbsp;
                                    Followers <?php echo ($Followers==0)?'': $Followers;?>
                                </a>
                            </div>
                            <div class="col-sm-6" align="center">
                                <a href="javascript:void(0);" class="vf-profile-options-link follows ">
                                    <span>
                                        <img src="<?php echo base_url();?>assets/images/icons/follow-icon.png" />
                                    </span>&nbsp;
                                    Follows <?php echo ($Follows==0)?'':$Follows;?>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-4">
                            <div class="col-sm-6" align="center">
                                <a href="javascript:void(0);" class="vf-profile-options-link comments input-count-comment" data-var="<?php echo base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ').'/'.base64_encode($user_info->user_id).'/'.base64_encode(mt_rand(100000,9999999)).'/'.base64_encode($user_info->username);?>">
                                    <span>
                                        <img src="<?php echo base_url();?>assets/images/icons/comment-icon.png" />
                                    </span>&nbsp;
                                      <?php echo ($Comments==0)?'':$Comments;?> <?php echo ($Comments>1)?'Comments':'Comment';?>
                                </a>
                            </div>
                            <div class="col-sm-6" align="center">
                                <a href="javascript:void(0);" class="vf-profile-options-link likes input-count-like">
                                    <span>
									<?php $profile_like_image		=	($like_this_user==0)?"like-icon.png":"heart.png";  ?>
                                        <img src="<?php echo base_url();?>assets/images/icons/<?php echo $profile_like_image;?>" />
                                    </span>&nbsp;
                                    <?php echo ($Likes==0)?'':$Likes;?> <?php echo ($Likes>1)?'Likes':'Like';?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-1"></div>
                </div>
                <div class="col-sm-12 padding-bottom20"></div>
                <div class="col-sm-12 padding-bottom30 border-bottom1">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-5">
                        <h4 class="vf-profile-info-heading">
                            <span>
                                <img src="<?php echo base_url();?>assets/images/icons/info-icon.png" />
                            </span>
                            &nbsp;
                           <?php echo ($user_info->user_type_id==2)?  'Company Info' :'Private Profile' ; ?>
                        </h4>
                        <ul class="vf-profile-detail-links">
                            <li>
                                <span>
                                    location : 
                                </span>&nbsp;
                                <?php echo $user_info->location;?>
                            </li>
							<?php if($user_info->user_web!=''){ ?>
                            <li>
                                <span>
                                    Website : 
                                </span>&nbsp;
                               <?php echo $user_info->user_web; ?>
                            </li>
							<?php } if ($user_info->user_type_id==2) { 
								if ($user_info->cat_data<>''){ ?>							
                            <li>
                                <span>
                                    Category : 
                                </span>&nbsp;
								<?php 
								$cat_data=	explode(',',$user_info->cat_data);
								for($i=0;$i<count($cat_data);$i++){
								$name=	_GetCategoryData($cat_data[$i]);
									$data_cat[$i]=$name->cat_name;
								}
								echo implode(',',$data_cat);
								?>
                               
                            </li>
							<?php } ?>
							<li>
                                <span>
                                    vat legal no  : 
                                </span>&nbsp;
                                <?php echo $user_info->company_number; ?>
                            </li>
							<?php } ?>
                            
                            <li>
                                <span>
                                    address : 
                                </span>&nbsp;
                                harlev hodgadev 310
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-5">
                        <div class="col-sm-6">
                            <div class="talk-bubble tri-right border round btm-left-in">
                                <div class="talktext">
                                    <p align="center">Now we add a border and it looks like a comic. Uses .border .round and .btm-left-in</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            
                        </div>
                    </div>
                    <div class="col-sm-1"></div>
                </div>
            </div>
        </div>
    </section>
    <!--Profile Interested Tag and Filteration Option-->
    <?php include VIEWPATH.'common/ProfileStarTag_HTML.php'; ?>
    <?php include VIEWPATH.'common/OtherUserProductItemProfile_HTML.php'; ?>
	<?php include VIEWPATH.'common/Footer_HTML.php'; ?>	
	<script>
		$(document).ready(function(){
		$('.follow').click(function() {	
			var val = $(this).data('follow');				
		$.ajax({		
                url: base_url+'Follow',
                type: 'POST',
                data: "Follow_id=" + val,
                dataType:"json",
                success:function(response)
                {
                    if(response.exists == "1") 
                    {									
						$(".follow").text(response.followingText);
						$('.input-count').html(response.follow_count);
						$('.inputcount').html(response.count);
						if(response.followingText=='Follow'){
							$('#follower_list-remove-'+response.div).remove();
						}
						else{
						$(".follower-List").prepend(response.html);
						}
						
					}
					if(response.exists == "2") 
					{										
						window.setTimeout(function(){window.location.href=base_url+'Login'}, 3000 );	
					}
				}
		 });
		});
		$('.Like').click(function() {	
			var val = $(this).data('like');				
		$.ajax({		
                url: base_url+'ProfileLike',
                type: 'POST',
                data: "Like_id=" + val,
                dataType:"json",
                success:function(response)
                {
                    if(response.exists == "1") 
                    {									
						$(".Like").text(response.likeText);
						$('.input-count-like').html(response.like_count);
						$('.inputcountlike').html(response.count);
						if(response.likeText=='Like'){
							$('#like_list-remove-'+response.div).remove();
						}
						else{
							$(".like-list").prepend(response.html);
						}						
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
    </body>	
</html> 