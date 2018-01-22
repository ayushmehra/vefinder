<section class="vf-comments-popup-section ui-display-none">
    <div class="container-fluid ">
        <div class="row">
            <div class="col-sm-5"></div>
            <div class="col-sm-4 padding-top100">
                <input type="hidden" name="llb" id= "llb" value="<?php echo base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ') . '/' . base64_encode(@$_GET['eventId']); ?>" >
                <div class="col-sm-12 vf-comments-container ">
                   <!-- <a href="javascript:void(0);" class="vf-close-comment-popup" onclick="$('.vf-comments-popup-section').fadeOut(1000);"> -->
					 <a href="javascript:void(0);" class="vf-close-comment-popup" onclick="window.location.href='<?php echo base_url() ?>/Events'">
                        <img src="<?php echo base_url(); ?>assets/images/close-report-popup.png" />
                    </a>
                    <div class="col-sm-12">
                        <h4 class="vf-comments-popup-heading">Comments</h4>
                        <div class="col-sm-12 padding-top5 text-center" id="com_success_wish" style="display:none;color:green;"></div>
                        <div class="col-sm-12 padding-top5 text-center" id="com_success_error" style="display:none;color:red;"></div>
                    </div>
                    <?php
                    if (is_array($comment_data) && (!empty($comment_data))) {
                        ?>
                        <div id="commentList" class="col-sm-12 padding-right10 vf-comments-list">
                            <!--USER COMMENT-->
                            <?php
                            //print_r($comment_data);die;
                            foreach ($comment_data as $key => $data) { //echo '<pre>'; echo $data->comment_id; }
                                $com_rand = rand(1000, 999999) . time();
                                ?>
                                <div class="col-sm-12 padding-top10 padding-bottom10 padding-left20 padding-right20">
                                    <div class="col-sm-2">
                                        <div class="vf-comments-user-img" style="background-color: #464040;">
                                            <?php echo strtoupper($data->letter); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-10">
                                        <a href="javascript:void(0);" class="vf-comment-by cl<?php echo $com_rand; ?>">
                                            <?php echo ucfirst($data->first_name) . ' ' . ucfirst($data->last_name); ?>
                                        </a>
                                        <p class="vf-comment-content text<?php echo $com_rand; ?>" data="<?php echo base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ') . '/' . base64_encode(base64_encode($data->comment_to_comment_id)); ?>">
                                            <?php echo $data->commentText; ?>
                                        </p>
                                        <a href="javascript:void(0);" class="vf-comment-reply-link" onclick="comentBYIdEvent(<?php echo $com_rand; ?>);">
                                            Reply
                                        </a>
                                        <?php
                                        if ($data->ComAgCom_Count > 0) {
                                            $otprand = rand(10000, 99999999);
                                            ?>
                                            <!--FOR NUMBER OF REPLY-->
                                            <div class="vf-reply-bubble" id="Reply<?php echo $otprand . time(); ?>Btn">
                                                <div class="arrow vf-bottom right"></div>
                                                <a href="javascript:void(0);"  onclick="$('#Reply<?php echo $otprand . time(); ?>').show();
                                                                    $('#Reply<?php echo $otprand . time(); ?>Btn').hide();"><?php echo $data->ComAgCom_Count; ?> Reply</a>
                                            </div>
                                            <!--REPLY TO COMMENTS-->
                                            <div class="col-sm-12 padding-top10 padding-bottom10 vf-sub-comment-list ui-display-none" id="Reply<?php echo $otprand . time(); ?>">
                                                <?php foreach ($data->com_ag_com as $key => $com) { ?>
                                                    <div class="col-sm-12 padding-bottom10">
                                                        <div class="col-sm-2">
                                                            <div class="vf-sub-comments-user-img" style="background-color: green;">
                                                                <?php echo strtoupper($com->letter); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <a href="javascript:void(0);" class="vf-sub-comment-by">
                                                                <?php echo ucfirst($com->first_name) . ' ' . ucfirst($com->last_name); ?>
                                                            </a>
                                                            <p class="vf-sub-comment-content">
                                                                <?php echo $com->commentText; ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>                   
                    </div>
                    <div class="col-sm-12 padding-top10 border-bottom1 vf-bg-white"></div>
                    <input type="hidden" id="cpm" value="">
                    <div class="col-sm-12 padding-top10 padding-bottom20 vf-bg-white">
                        <div class="col-sm-12">
                            <label class="vf-comment-post-label ui-display-none">

                            </label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" id="comment" class="vf-comment-post-input validate[required]" placeholder="Add a comment" required="true" />
                        </div>
                        <div class="col-sm-3">
                            <button type="button" class="vf-comment-post-btn" onclick="saveComment();">
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
<script>
    function saveComment() {
        $.ajax({
            url: '<?php echo base_url(); ?>Event/Comment',
            type: 'POST',
            data: "product_id=" + $('#llb').val() + "&com_id=" + $('#cpm').val() + "&comment=" + $('#comment').val(),
            success: function (data) {
                //alert(data);
                var response = JSON.parse(data);
                //alert(response);
                if (response.exists == "1")
                {
                    $('#com_success_wish').html(response.message);
                    $('#com_success_wish').show("slow");
                    window.setTimeout(function () {
                        $('#success_wish').hide("slow")
                    }, 3000);
                    window.location.reload(true);
                }
                if (response.exists == "2")
                {
                    $('#com_success_error').html(response.message);
                    $('#com_success_error').show("slow");
                    window.setTimeout(function () {
                        $('#success_error').hide("slow")
                    }, 3000);
                    window.setTimeout(function () {
                        window.location.href = base_url + 'Login'
                    }, 3000);
                }
                if (response.exists == "0")
                {
                    $('#com_success_error').html(response.message);
                    $('#com_success_error').show("slow");
                    window.setTimeout(function () {
                        $('#success_error').hide("slow")
                    }, 3000);
                    window.location.reload(true);
                }
            }
        });
    }

    function comentBYIdEvent(id)
    {
        var data = $('.cl' + id).text().trim();
        var datacom = $('.text' + id).attr('data');
        ;
        $('.vf-comment-post-label').html('@' + data);
        $('.vf-comment-post-label').show();
        $('#cpm').attr('value', datacom);
    }
</script>