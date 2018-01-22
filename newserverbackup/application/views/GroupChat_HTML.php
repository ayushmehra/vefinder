<!DOCTYPE html>
<html>
    <head><?php include VIEWPATH . 'common/HeaderScript_HTML.php'; ?>
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/typography.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/commons.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/chat.css">
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
<div id="content" class="chat-screen">
    <div class="row">
        <section class="col-lg-3 threads-section">
            <div class="row threads-section-heading">
                <div class="col-lg-3 chat-settings">
                    <a href="#">
                        <img src="../assets/images/settings_inv.png" alt="_settings" title="Chat Settings" />
                    </a>
       <!-- <i onclick="openChatPage()">groups</i> -->
                </div>
                <div class="col-lg-6">
                    Vifinder Chat
                </div>
                <div class="col-lg-3 add-chat">
                    <i class="material-icons add-forum-btn" style=" font-weight: bold" >add</i>
                </div>

            </div>
            <div class="tab">
                <button class="tablinks chatTab " onclick="openOneChatPage()">Chat</button>
                <button class="tablinks forumTab active"  onclick="openChatPage()">Forum</button>
            </div>
            <div class="search-thread-section">
                <input type="text" id="box" value="" class="topics-search" placeholder="search"><br>
                <i class="material-icons">search</i>
            </div>
            <div class="forum-list-tab tabcontent" >
                <p class="interest-title">Based on your Interests</p>

                <ul class="topics-list">
				
                    <?php foreach ($topic_info_all as $group) { ?>

                        <li <?php if ($_GET['group_id'] == $group['id']) { ?>class="active"<?php } ?>>
                            <a href="<?php echo base_url() ?>Chat/groupChat?group_id=<?php echo $group['id'] ?>&room_id=<?php echo $group['room_id'] ?>&topic=<?php echo $group['id'] ?>">
                                <p>
                                    <?php echo $group['group_name'] ?>
                                </p>
                            </a>
                        </li>
                    <?php } ?>
                    <p></p>
                </ul>
            </div>
        </section>
        <section class="col-lg-6 live-chat-section">
            <div class="forum-live-tab">
                <div class="chat-screen-section">
                </div>
                <div class="chat-type-section row">
                    <!-- <label class="typing_text" style="display:none;">
                     <img src="<?php echo base_url() ?>assets/images/Loader-typing.gif" alt="" style="width:22px;" /></label> -->
                    <div class="col-lg-1">
                        <input type="file" id="attachment" name="userfile" />
                        <img class="attachment-img" src="../assets/images/attach.png" alt="_attach" title="Upload Attachment" />
                    </div>
                    <div class="col-lg-9">
                        <input type="hidden" id="message_type" value="1">
                        <textarea type="text" class="type-message-input" id="data" required="true" placeholder="Type Your Message..."></textarea>
                    </div>
                    <div class="col-lg-1">
                        <a href="#" class="send-smiley">
                            <i class="material-icons smiley-btn">insert_emoticon</i>
                        </a>
                    </div>
                    <div class="col-lg-1 send-container"> 

                        <a href="#" class="send-msg">

                            <i class="material-icons send-btn datasend" id="datasend">chevron_right</i>
                        </a>

                    </div>
                    <div>
                        <p class="file-upload-name"></p>
                    </div>
                </div>
            </div>
        </section>
        <section class="col-lg-3 profile-section">
            <div class="forum-info-tab" >
                <div class="forum-header">
                    <p class="forum-info-title">Forum Info</p>
                    <img src="<?php echo $topic_info->group_image; ?>" width="245" height="125" alt="HALO" title="HALO">
                    <p class="forum-name"><?php echo $topic_info->group_name; ?></p>
                    <p class="forum-creator">Created by <?php echo $topic_info->username; ?></p>
                </div>
                <div class="forum-details">  
                    <p><?php echo $topic_info->group_info; ?>
                    </p>

                </div>
            </div>

            <!--       <div class="topics-title">Topics</div> -->
            <!--            <div class="topics-subtitle">Based on your interests</div>-->
            <!--            <div class="search-topic-section">
                          <input type="text" class="topics-search" placeholder="Search"><br />
                        <i class="material-icons">search</i>
                      </div>-->
            <!--         <div class="topics-list">
            <?php foreach ($topic_info_all as $group) { ?>
                          <a href="<?php echo base_url() ?>Chat/groupChat?group_id=<?php echo $group['id'] ?>&room_id=<?php echo $group['room_id'] ?>&topic=<?php echo $group['id'] ?>">
                              <div <?php if ($_GET['group_id'] == $group['id']) { ?>class="active"<?php } ?>>
                <?php echo $group['group_name'] ?>
                              </div>
                          </a>
            <?php } ?>
                  </div> -->
        </section>
    </div>
</div>
</div>

<div class="overlay">
    <div class="popup">
        <i class="material-icons overlay-close-icon">clear</i>
        <div class="popup-content">
            <form method="POST" action="<?php echo base_url() ?>Chat/createGroup" enctype="multipart/form-data">
                <h4 class="title">Create Forum</h4>
                <div class="file-slot">
                    <div class="file-container">
                        <img class="logo" src="../assets/images/img-logo.png" />
                        <p class="ad-image-label">Upload Cover Image/Drag and Drop</p>
                        <input class="add-image add-forum-image" onchange="uploadForumImage(this);" type="file" name="userfile" accept="image/*">
                        <img id="forum-image" src="#">
                    </div>
                </div>
                <input type="text" name="group_name" placeholder="Name of the Forum" required="true"><br />
                <textarea placeholder="Description" name="group_info"></textarea><br />
                <input type="hidden" name="isTopic" value="1" />
                <button type="submit" name="create" value="Create" class="create-btn-forum">Create Forum</button>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('input[type="file"]').change(function (e) {
            var fileName = e.target.files[0].name;
            $('p.file-upload-name').text(fileName);
        });
    });

    function uploadForumImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var wd = $('#forum-image').parent().width();
                var ht = $('#forum-image').parent().height();
                $('#forum-image').attr('src', e.target.result).width(wd).height(ht);
                $('#forum-image').css('display', 'block');
                $('.file-container img.logo').css('display', 'none');
                $('.file-container .ad-image-label').css('display', 'none');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }


</script>
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
<script>

    function openNewPage() {
        window.location.href = "<?php echo base_url() ?>Chat/createGroup";
    }
    function openOneChatPage() {
		<?php 
		foreach ($all_user_info as $key => $value) {
			 $ddd =  $value->user_id;
			  break; 
		}
		?>
        window.location.href = "<?php echo base_url() ?>Chat/chatPage?user_id=<?php echo $ddd; ?>";
    }

    var socket = io.connect('http://54.186.106.85:3000/', {reconnection: true, reconnectionDelay: 1000, reconnectionDelayMax: 5000, reconnectionAttempts: 99999});
    socket.emit('adduserId', <?php echo $room_id; ?>); // sending user name to the server
    socket.emit('adduser', <?php echo $user_info->user_id; ?>); // sending user name to the server

    socket.on('receiveReadMessages', function (data) {
        //alert(JSON.stringify(data));
        for (var i in data) {

            if (data[i].message_type == '2') {
                data[i].message = "<a target='_blank' href='" + data[i].message + "'><img style='height: 100px;width: 100px;' src='" + data[i].message + "' /></a>";
            } else {
                data[i].message = data[i].message;
            }
            if (data[i].from_id == '<?php echo $user_info->user_id; ?>') {
                $('.chat-screen-section').append('<div class="row outgoing"><div class="col-lg-3 group-chat-profile-section"><img src="<?php echo base_url() ?>assets/UserImage/' + data[i].from_id + '/' + data[i].profile_image + '" alt="' + data[i].profile_image + '" class="outgoing-group-dp"> <span class="outgoing-profile-name">' + data[i].sender_name + '</span></div><div class="col-lg-9"><div class="outgoing-group-msg message-section"><p class="message">' + data[i].message + '</p><p class="group-msg-timestamp">' + data[i].timestamp + '</p></div></div></div>');
            } else {
                $('.chat-screen-section').append('<div class="row incoming"><div class="col-lg-2"><img style="height: 30px;width: 30px" src="<?php echo base_url() ?>assets/UserImage/' + data[i].from_id + '/' + data[i].profile_image + '" alt="' + data[i].profile_image + '" class="incoming-dp"></div><div class="col-lg-10"><div class="incoming-msg message-section"><p class="message">' + data[i].message + '</p><p class="msg-timestamp">' + data[i].timestamp + '</p></div></div></div>');
            }
        }

    });

//    socket.on('broadcast', function (data) {
//        //alert(data);
//        if(data.from_id!='<?php echo $user_info->user_id ?>'){
//        $('.unread_count_' + data.room_id).text((parseInt($('.unread_count_' + data.room_id).text())) + 1);
//        //$('.last_message_' + data.from_id).text(data.message);
//        }
//    })

    socket.on('updatechat', function (user, data) {
        //alert(JSON.stringify(data));
        //alert('.last-message-chat_' + data.from_id);
        //alert($('.last-message-chat_' + data.from_id).text());
        //alert((parseInt($('.last-message-chat_' + data.from_id).text())) + 1);
        $('.typing_text').hide();
        if (data.message_type == '2') {
            data.message = "<a target='_blank' href='" + data.message + "'><img style='height: 100px;width: 100px;' src='" + data.message + "' /></a>";
        } else {
            data.message = data.message;
        }
        if (data.from_id == '<?php echo $this->session->userdata('user_id'); ?>') {
            $('.chat-screen-section').append('<div class="row outgoing"><div class="col-lg-3 group-chat-profile-section"><img src="'+data.sender_image+'" class="outgoing-group-dp"> <span class="outgoing-profile-name">' + data.sender_name + '</span></div><div class="col-lg-9"><div class="outgoing-group-msg message-section"><p class="message">' + data.message + '</p><p class="group-msg-timestamp">' + data.timestamp + '</p></div></div></div>');
        } else {

            $('.chat-screen-section').append('<div class="row incoming"><div class="col-lg-2"><img style="height: 30px;width: 30px" src="'+data.sender_image+'" class="incoming-dp"></div><div class="col-lg-10"><div class="incoming-msg message-section"><p class="message">' + data.message + '</p><p class="msg-timestamp">' + data.timestamp + '</p></div></div></div>');
        }


    });




    socket.on('typing', function (data) {
        if (data.currentUser != '<?php echo $user_info->user_id; ?>')
            $('.typing_text').show();
    });
    /* socket.on('receiveReadMessages', function (data) {
     $('.chat-screen-section').append('<div class="row incoming"><div class="col-lg-10"><div class="outgoing-msg message-section"><p class="message">'+data[0].message+'</p><p class="msg-timestamp">12:39</p></div></div><div class="col-lg-2"><img style="height: 30px;width: 30px" src="<?php echo base_url() ?>assets/UserImage/<?php echo $user_info->user_id; ?>/<?php echo $user_info->profile_image; ?>" alt="@Thierry" class="outgoing-dp"></div></div>');
     }); */
    $(function () {

        $('#data').on('keyup', function () {
            var typingData = {room_id: "<?php echo $_GET['room_id']; ?>", currentUser: "<?php echo $user_info->user_id; ?>", username: "<?php echo $user_info->username ?>"};
            if (this.value.length > 1) {
                socket.emit('typing', typingData);
            }
        });

// when the client clicks SEND
        $('#datasend').click(function () {
            var message = $('#data').val();

            if (message == '') {
                alert("Please type something in box");
                return false;
            }
            $('#data').val('');
            var data_server = {
                message: message,
                from_id: '<?php echo $this->session->userdata('user_id'); ?>',
                to_id: '0',
                message_type: $('#message_type').val(),
                room_id: '<?php echo $_GET['room_id'] ?>',
                sender_name: '<?php echo $user_info->username ?>'
            };
            socket.emit('sendchat', data_server);
            $('#message_type').val('1');
        });

// when the client hits ENTER on their keyboard
        $('#data').keypress(function (e) {
            if (e.which == 13) {
                if ($('#data').val() == '') {
                    alert("Please type something in box");
                    return false;
                }
                $(this).blur();
                $('#datasend').focus().click();
                $('#message_type').val('1');
            }
        });

        $('.topics-search').keypress(function (e) {
            if (e.which == 13) {
                window.location.href = "<?php echo base_url(); ?>Chat/groupChat?keyword=" + $('.topics-search').val();
            }
        });

        $(document).on("change", "#attachment", function () {
            //alert("here");
            var file_data = $("#attachment").prop("files")[0];   // Gettin the properties of file from file field
            //alert(file_data);
            var form_data = new FormData();                  // Creating object of FormData class
            form_data.append("file", file_data)              // Appending parameter named file with properties of file_field to form_data
            form_data.append("user_id", 123)
            // Adding extra parameters to form_data
            $.ajax({
                url: "<?php echo base_url(); ?>Chat/uploadAttachment",
                dataType: 'script',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data, // Setting the data attribute of ajax with file_data
                type: 'post',
                success: function (data) {
                    //alert("Success");
                    //alert(data);
                    $('#data').val(data);
                    $('#message_type').val('2');
                    $("#datasend").trigger("click");
                }
            })
        });
    });
</script>
<?php // include VIEWPATH . 'common/Footer_HTML.php'; ?>
</body>
</html>