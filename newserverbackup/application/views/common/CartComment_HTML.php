<section class="comments-popup-section ui-display-none">
        <div class="container-fluid"> 
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4 padding-top100">
                    <div class="col-sm-12 comments-container">
                        <a href="javascript:void(0);" class="close-comment-popup" onclick="$('.comments-popup-section').fadeOut(1000);">
                            <img src="<?php echo base_url();?>assets/images/close-icon.png" />
                        </a>
                        <div class="col-sm-12">
                            <h4 class="comments-popup-heading">Comments</h4>
                        </div>
                        <div id="commentList" class="col-sm-12 padding-right10 comments-list">
                            <!--USER COMMENT-->
                            <div class="col-sm-12 padding-top10 padding-bottom10 padding-left20 padding-right20">
                                <div class="col-sm-2">
                                    <div class="comments-user-img" style="background-color: #464040;">
                                        RM
                                    </div>
                                </div>
                                <div class="col-sm-10">
                                    <a href="javascript:void(0);" class="comment-by">
                                        Rishabh Mehrotra
                                    </a>
                                    <p class="comment-content">
                                        very useful product
                                    </p>
                                    <a href="javascript:void(0);" class="comment-reply-link" onclick="$('.comment-post-label').show();">
                                        Reply
                                    </a>
                                </div>
                            </div>

                            <!--USER COMMENT-->
                            <div class="col-sm-12 padding-top10 padding-bottom10 padding-left20 padding-right20">
                                <div class="col-sm-2">
                                    <div class="comments-user-img" style="background-color: #e42929;">
                                        TM
                                    </div>
                                </div>
                                <div class="col-sm-10">
                                    <a href="javascript:void(0);" class="comment-by">
                                        Thierry Madvig
                                    </a>
                                    <p class="comment-content">
                                        very useful product
                                    </p>
                                    <a href="javascript:void(0);" class="comment-reply-link">
                                        Reply
                                    </a>
                                </div>
                            </div>

                            <!--USER COMMENT-->
                            <div class="col-sm-12 padding-top10 padding-bottom10 padding-left20 padding-right20">
                                <div class="col-sm-2">
                                    <div class="comments-user-img" style="background-color: green;">
                                        NK
                                    </div>
                                </div>
                                <div class="col-sm-10">
                                    <a href="javascript:void(0);" class="comment-by">
                                        Nirav Kapoor
                                    </a>
                                    <p class="comment-content">
                                        very useful product
                                    </p>
                                    <a href="javascript:void(0);" class="comment-reply-link">
                                        Reply
                                    </a>
                                    <!--FOR NUMBER OF REPLY-->
                                    <div class="reply-bubble" id="Reply3Btn">
                                        <div class="arrow bottom right"></div>
                                        <a href="javascript:void(0);" onclick="$('#Reply3').show(); $('#Reply3Btn').hide();">2 Reply</a>
                                    </div>
                                    <!--REPLY TO COMMENTS-->
                                    <div class="col-sm-12 padding-top10 padding-bottom10 sub-comment-list ui-display-none" id="Reply3">
                                        <div class="col-sm-12 padding-bottom10">
                                            <div class="col-sm-2">
                                                <div class="sub-comments-user-img" style="background-color: green;">
                                                    D
                                                </div>
                                            </div>
                                            <div class="col-sm-10">
                                                <a href="javascript:void(0);" class="sub-comment-by">
                                                    Deepak Kumar
                                                </a>
                                                <p class="sub-comment-content">
                                                    exactly
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 padding-bottom10">
                                            <div class="col-sm-2">
                                                <div class="sub-comments-user-img" style="background-color: green;">
                                                    N
                                                </div>
                                            </div>
                                            <div class="col-sm-10">
                                                <a href="javascript:void(0);" class="sub-comment-by">
                                                    Neha Rajput
                                                </a>
                                                <p class="sub-comment-content">
                                                    right!
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!--USER COMMENT-->
                            <div class="col-sm-12 padding-top10 padding-bottom10 padding-left20 padding-right20">
                                <div class="col-sm-2">
                                    <div class="comments-user-img" style="background-color: #147d73;">
                                        AM
                                    </div>
                                </div>
                                <div class="col-sm-10">
                                    <a href="javascript:void(0);" class="comment-by">
                                        Ayush Mehra
                                    </a>
                                    <p class="comment-content">
                                        Delivery in just 5 days
                                    </p>
                                    <a href="javascript:void(0);" class="comment-reply-link">
                                        Reply
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 padding-top10 border-bottom1"></div>
                        <div class="col-sm-12 padding-top10">
                            <div class="col-sm-12">
                                <label class="comment-post-label ui-display-none">
                                    @Ayush Mehra
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" class="comment-post-input" placeholder="Add a comment" />
                            </div>
                            <div class="col-sm-3">
                                <button type="button" class="comment-post-btn">
                                    Post
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
    </section>
    