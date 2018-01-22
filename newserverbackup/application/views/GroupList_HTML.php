<!DOCTYPE html>
<html>
    <head><?php include VIEWPATH . 'common/HeaderScript_HTML.php'; ?>
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/typography.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/commons.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/chat.css">
        <script>
        function createNewGroup(){
            window.location.href="<?php echo base_url(); ?>Chat/createGroup";
        }
        </script>
    </head>
    <body>
        <?php include VIEWPATH . 'common/NavBar_HTML.php'; ?>
        <section class="blank-section">
            <div class="container">
                <div class="row">
                </div>
            </div>
        </section>
        <?php
        ini_set("display_errors", "Off");
        error_reporting(0);
        include VIEWPATH . 'common/SubMenu_HTML.php';
        ?>

    </nav>
</div>
            <!-- Main Content -->
            <div id="content" class="group-chat-screen">
                <div class="row">
                    <section class="col-lg-3 threads-section">
                        <div class="thread-title">
                            <i class="material-icons" onclick="createNewGroup();">add</i>
                            <span>Create New Thread</span>
                        </div>
                        <div class="thread-banner">
                            <?php 
                            //echo $group_info['group_name'];
                            ?>
                        </div>
                        <div class="thread-lists">
                            <?php 
                                                       // print_r($group_info);die;
                                foreach ($group_info as $key=>$value){
                            ?>
                            <div class="row">
                                <div class="col-lg-4">
                                    <img class="profile-dp" src="<?php echo base_url() ?>assets/UserImage/<?php echo $value['member_id'] ?>/<?php echo $value['profile_image'] ?>" style="height: 30px;width: 30px;" />
                                </div>
                                <div class="col-lg-8">
                                    <a href="<?php echo base_url(); ?>Chat/groupChat?group_id=<?php echo $value['id'] ?>&room_id=<?php echo $value['room_id'] ?>"><p class="profile-name">@<?php echo $value['group_name'] ?></p></a>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </section>
                    <section class="col-lg-6 live-chat-section">
                        <div class="chat-screen-section"></div>
                        <div class="chat-type-section">
                            <i class="material-icons">attach_file</i>
                            <input type="text" class="type-message-input" placeholder="Type Your Message...">
                            <i class="material-icons">insert_emoticon</i>
                            <i class="material-icons">send</i>
                        </div>
                    </section>
                    <section class="col-lg-3 topics-section"></section>
                </div>
            </div>
        </div>
        </div>

<script>
    $('#box').keyup(function () {
        var valThis = $(this).val().toLowerCase();
        if (valThis == "") {
            $('.chat-threads-section > .row').show();
        } else {
            $('.chat-threads-section > .row').each(function () {
                var text = $(this).text().toLowerCase();
                (text.indexOf(valThis) >= 0) ? $(this).show() : $(this).hide();
            });
        }
        ;
    });

</script>
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.easing.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/scrolling-nav.js"></script>
<script src="<?php echo base_url(); ?>assets/js/commons.js"></script>
<script src="<?php echo base_url(); ?>assets/js/chat.js"></script>
<!--<script src="http://code.jquery.com/jquery-latest.min.js"></script>-->
<script src="https://cdn.socket.io/socket.io-1.3.7.js"></script>
<script src="http://localhost/socketOTO/index.js"></script>
<?php include VIEWPATH . 'common/Footer_HTML.php'; ?>
</body>
</html>