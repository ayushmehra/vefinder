 <!--COMMENTS SECTION-->
    <section class="hm-comments-list-section ui-display-none">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8 padding-left20 padding-right20">
                    <a href="javascript:void(0);" class="close-comments-popup">
                        <img src="<?php echo base_url();?>assets/images/close-report-popup.png">
                    </a>					
                    <div class="col-sm-12 followers-list-container">
                        <h4 class="followerss-list-heading">Comments(<span id="NoOfComment"><?php echo $Comments;?></span>)</h4>
                        <div class="col-sm-12 padding-top30">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10 followerList-container comment-List" id="followerList">
							<?php if (is_array($comment_list)&&(!empty($comment_list))){ foreach($comment_list as $comment) { ?>
                                <div class="col-sm-12 follower-item">
                                    <div class="col-sm-1">
									<a href="<?php echo base_url().'User/'.$comment->username;?>" class="vf-item-fullview-by-link">
                                        <span class="follower-name-icon">
                                           <?php echo $comment->letter; ?>
                                        </span>
									</a>
                                    </div>
                                    <div class="col-sm-11" align="left">
                                        <span class="follower-name">
                                            <a href="<?php echo base_url().'User/'.$comment->username;?>" class="vf-item-fullview-by-link"> @<?php echo $comment->first_name.' '.$comment->last_name; ?> </a>
                                            <br>
                                            <span class="user-comment">
                                                <?php echo $comment->commentText;?>
                                            </span>
                                        </span>
                                    </div>
                                </div>
							<?php }} ?>
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                        <div class="col-sm-12 padding-top20">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                                <input type="text" placeholder="Add a comment" id="comment" class="comment-input-box validate[required]">
                                &nbsp;&nbsp;
                                <span>
                                    <a href="javascript:void(0);" class="hm-search-link-lg comment-btn" data-val="">
                                        Post
                                    </a>
                                </span>
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
    </section>