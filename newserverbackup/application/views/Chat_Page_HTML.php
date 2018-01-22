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
                 </div>
            </div>
            <div class="tab">
                            <button class="tablinks chatTab active">Chat</button>
                            <button class="tablinks forumTab"  onclick="openChatPage()">Forum</button>
                        </div>
            <div class="search-thread-section">

                <input type="text" id="box" value="<?php echo $_GET['keyword'] ?>" class="topics-search" placeholder="Search" ><br>
                <i class="material-icons">search</i>
            </div>
			 <div class="chat-list-tab tabcontent">
            <div class="chat-threads-section">
                <?php
                if (count($all_user_info) > 0)
                    foreach ($all_user_info as $key => $value) {
                        ?>
                        <a href="<?php echo base_url() ?>Chat/chatPage?user_id=<?php echo $value->user_id; ?>">
                            <div class="row <?php if ($_GET['user_id'] == $value->user_id) { ?>active<?php } ?>">
                                <div class="col-lg-2">
                                    <img style="height: 30px;width: 30px;" class="profile-dp-chat" src="<?php echo base_url() ?>assets/UserImage/<?php echo $value->user_id; ?>/<?php echo $value->profile_image; ?>" title="@<?php echo $value->username; ?>" />
                                </div>
                                <div class="col-lg-8">
                                    <p class="profile-name-chat"><?php echo $value->username; ?></p>
<?php if($value->unreadCount >0) { ?>                                   
								   <p id="remaining_chat" class="last-message-chat_<?php echo $value->user_id; ?>"><?php echo $value->unreadCount; ?></p>
<?php }?> 
                                    <p class="last-message last_message_<?php echo $value->user_id; ?>"><?php echo $value->last_message; ?></p>
                                </div>
                                <div class="col-lg-2">
                                    <p class="thread-timestamp"><?php
                                    if($value->last_message_time)
                                    echo date("H:i",$value->last_message_time); 
                                    ?></p>
                                </div>
                            </div>
                        </a>
                        <?php
                    }
                ?>
            </div>
			 </div>
        </section>
        <section class="col-lg-6 live-chat-section">
		<div class="chat-live-tab">
            <?php if ($_GET['user_id'] != '') { ?>
                <div class="chat-screen-section live-chat">
                </div>

                <div class="chat-type-section row">
				<div class="col-lg-12">
				<label class="typing_text" style="display:none;"><p class="last-message"><?php echo $to_info->username; ?> is typing <img src="<?php echo base_url() ?>assets/images/Loader-typing.gif" alt="" style="width:22px;" /></p></label>
				
                               
				
				</div>
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
                    <!-- <button class="material-icons send-btn datasend" id="datasend">send</button> -->
					  </div>
					   <div>
                                 <!--   <p class="file-upload-name"></p> -->
                                </div>
                </div>
            <?php } ?>
			</div>
        </section>

        <section class="col-lg-3 profile-section">
		 <div class="chat-profile-tab">
		 <img class="profile-cover" src="<?php echo base_url() ?>assets/UserImage/<?php echo $to_info->user_id; ?>/CoverImage/<?php echo $to_info->cover_image; ?>" />
                        <div class="profile-info">
            <div class="profile-section-heading">Profile</div>
            <div class="profile-header">
                <img style="height: 141px;width: 136px;" src="<?php echo base_url() ?>assets/UserImage/<?php echo $to_info->user_id; ?>/<?php echo $to_info->profile_image; ?>" class="account-dp" />
                <p class="account-name">@<?php echo $to_info->username; ?></p>
            </div>
            <div class="account-details">
                <p>
                   <img src="../assets/images/loc_logo.png" class="material-icons" />
                    <?php echo $to_info->location; ?>
                </p>
                <p>
                    <img src="../assets/images/heart_logo.png" class="material-icons" />
                    Single
                </p>
                <p>
                     <img src="../assets/images/gender_logo.png" class="material-icons" />
                    <?php echo $to_info->gender; ?>
                </p>
                <p>
                    <img src="../assets/images/bday_logo.png" class="material-icons" />
                    <?php
                    $dateOfBirth = $to_info->birth_date;
                    $today = date("Y-m-d");
                    $diff = date_diff(date_create($dateOfBirth), date_create($today));
                    echo 'Age is ' . $diff->format('%y');
                    ?>
                </p>
                <p>
                     <img src="../assets/images/world_logo.png" class="material-icons" />
                    www.intellirisecorp.com
                </p>
            </div>
			</div>
			</div>
        </section>
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
<script>
    
    function openNewPage(){
        window.location.href="<?php echo base_url() ?>Chat/createGroup";
    }
    
    function openChatPage(){
		<?php foreach ($topic_info_all as $group) {
			$topic = $group['id'];
			$room = $group['room_id'];
			break;
		}			?>
        window.location.href="<?php echo base_url() ?>Chat/groupChat?group_id=<?php echo $topic; ?>&room_id=<?php echo $room; ?>&topic=<?php echo $topic; ?>";
    }
    
    var socket = io.connect('http://54.186.106.85:3000/',{reconnection: true,reconnectionDelay: 1000,reconnectionDelayMax : 5000,reconnectionAttempts: 99999});
    socket.emit('adduserId', <?php echo $room_id; ?>); // sending user name to the server
    socket.emit('adduser', <?php echo $user_info->user_id; ?>); // sending user name to the server

    socket.on('receiveReadMessages', function (data) {
        for (var i in data) {
            if (data[i].message_type == '2') {
                data[i].message = "<a target='_blank' href='" + data[i].message + "'><img style='height: 100px;width: 100px;' src='" + data[i].message + "' /></a>";
            } else {
                data[i].message = data[i].message;
            }
            if (data[i].from_id == '<?php echo $user_info->user_id; ?>') {
                $('.chat-screen-section').append('<div class="row outgoing"><div class="col-lg-10"><div class="outgoing-msg message-section"><p class="message">' + data[i].message + '</p><p class="msg-timestamp">' + data[i].timestamp + '</p></div></div><div class="col-lg-2"><img style="height: 30px;width: 30px" src="<?php echo base_url() ?>assets/UserImage/<?php echo $user_info->user_id; ?>/<?php echo $user_info->profile_image; ?>" alt="<?php echo $user_info->username ?>" class="outgoing-dp"></div></div>');
            } else {
                $('.chat-screen-section').append('<div class="row incoming"><div class="col-lg-2"><img style="height: 30px;width: 30px" src="<?php echo base_url() ?>assets/UserImage/<?php echo $chat_user_info->user_id; ?>/<?php echo $chat_user_info->profile_image; ?>" alt="<?php echo $chat_user_info->username ?>" class="incoming-dp"></div><div class="col-lg-10"><div class="incoming-msg message-section"><p class="message">' + data[i].message + '</p><p class="msg-timestamp">' + data[i].timestamp + '</p></div></div></div>');
            }
        }

    });
    
    socket.on('broadcast',function(data){
    //alert("here"+data.from_id);
    if(data.from_id=='<?php echo $_GET['user_id'] ?>'){
    $('.last-message-chat_' + data.from_id).text((parseInt($('.last-message-chat_' + data.from_id).text())) + 1);
    $('.last_message_' + data.from_id).text(data.message);
    }
    })

    socket.on('updatechat', function (user,data) {
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
        if (data.from_id == '<?php echo $user_info->user_id; ?>') {
            $('.chat-screen-section').append('<div class="row outgoing"><div class="col-lg-10"><div class="outgoing-msg message-section"><p class="message">' + data.message + '</p><p class="msg-timestamp">' + data.timestamp + '</p></div></div><div class="col-lg-2"><img style="height: 30px;width: 30px" src="<?php echo base_url() ?>assets/UserImage/<?php echo $user_info->user_id; ?>/<?php echo $user_info->profile_image; ?>" alt="<?php echo $user_info->username ?>" class="outgoing-dp"></div></div>');
        } else {
            
            $('.chat-screen-section').append('<div class="row incoming"><div class="col-lg-2"><img style="height: 30px;width: 30px" src="<?php echo base_url() ?>assets/UserImage/<?php echo $chat_user_info->user_id; ?>/<?php echo $chat_user_info->profile_image; ?>" alt="<?php echo $chat_user_info->username ?>" class="incoming-dp"></div><div class="col-lg-10"><div class="incoming-msg message-section"><p class="message">' + data.message + '</p><p class="msg-timestamp">' + data.timestamp + '</p></div></div></div>');
        }


    });




    socket.on('typing', function (data) {
        if(data.currentUser!='<?php echo $user_info->user_id; ?>')
            $('.typing_text').show();
    });
    /* socket.on('receiveReadMessages', function (data) {
     $('.chat-screen-section').append('<div class="row incoming"><div class="col-lg-10"><div class="outgoing-msg message-section"><p class="message">'+data[0].message+'</p><p class="msg-timestamp">12:39</p></div></div><div class="col-lg-2"><img style="height: 30px;width: 30px" src="<?php echo base_url() ?>assets/UserImage/<?php echo $user_info->user_id; ?>/<?php echo $user_info->profile_image; ?>" alt="@Thierry" class="outgoing-dp"></div></div>');
     }); */
    $(function () {

        $('#data').on('keyup', function () {
            var typingData = {room_id:"<?php echo $room_id; ?>",currentUser: "<?php echo $user_info->user_id; ?>",username:"<?php echo $user_info->username ?>"};
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
                from_id: <?php echo $user_info->user_id; ?>,
                to_id: '<?php echo $_GET['user_id']; ?>',
                message_type: $('#message_type').val(),
                room_id: '<?php echo $room_id; ?>'
            };
            socket.emit('sendchat', data_server);
            $('#message_type').val('1');
			
			document.querySelector('.type-message-input').focus();
		var chatScreen = document.querySelector('.live-chat');
		chatScreen.scrollTop = chatScreen.scrollHeight;
			
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
                window.location.href = "<?php echo base_url(); ?>Chat/chatPage?keyword=" + $('.topics-search').val();
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
<script>
            $(document).ready(function(){
                $('input[type="file"]').change(function(e){
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
                        $('#forum-image').css('display','block');
                        $('.file-container img.logo').css('display', 'none');
                        $('.file-container .ad-image-label').css('display', 'none');
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

            
        </script>
<?php// include VIEWPATH . 'common/Footer_HTML.php'; ?>
</body>
</html>