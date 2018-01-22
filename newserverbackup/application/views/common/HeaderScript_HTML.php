    <?php 
	$class	=	$this->router->fetch_class();
	$method	=	$this->router->fetch_method();
	switch($method)
	{
		case'index': $title=($class=='Home')?'-Home':(($class=='User')?'-My Profile':'-Login'); break;
		case'Post': $title='-Post Product'; break;
		case'Cart': $title='-My Cart'; break;
		case'ProductFullView': $title='-Product Detail'; break;
		case'register': $title='-Sign Up'; break;
		case'register_step_2': $title='-Star Tag'; break;
		case'forget': $title='-Forget Password'; break;
		
		default: $title=''; break;
		
	}?>
	<title>Vifinder <?php echo $title; ?></title>
	<link rel="shortcut icon" href="<?php echo base_url();?>assets/images/vifinder-black-logo.png" />
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <!--Vefinder CSS-->
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/vefinder.fonts.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/vefinder.gapping.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/vefinder.style.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/vefinder.external.css" rel="stylesheet" />
	<?php   /* <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/typography.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/commons.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/chat.css"> */ ?>
	<link href="<?php echo base_url();?>assets/css/vefinder.new.style.css" rel="stylesheet" />
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    
    <!--JQUERY-->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <!--Vefinder SCRIPTS-->
	<script> var base_url    =   "<?php echo base_url();?>"; </script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url();?>assets/js/vefinder.script.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.downCount.js"></script>
    
	<!-- For Error CSS -->
	<link rel="stylesheet" href="<?php  echo base_url(); ?>assets/css/validationEngine.jquery.css" type="text/css"/>
	<!-- For Error JS -->
	 <script src="<?php  echo base_url(); ?>assets/js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php  echo base_url(); ?>assets/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script> 
	<div id="fb-root"></div>
<script src='http://connect.facebook.net/en_US/all.js'></script>
	<script>
FB.init({appId: "1488869214539515", status: true, cookie: true});

	function postToFeed(name,thought,profileurl,pic) {
	// calling the API ...
	
	var obj = {
		method: 'feed',
		link: profileurl,
		 picture: pic,
		name: name,
		caption: 'Subinfra.com',
		description: thought
	};
	function callback(response) {
	   // document.getElementById('msg').innerHTML = "Post ID: " + response['post_id'];
	}

	FB.ui(obj, callback);
}</script>
<script>
	$(document).ready(function(){
		$('.home-like').click(function() {	
			var val = $(this).data('val');				
			var my = $(this).data('my');				
			var ffrom = $(this).data('from');				
			$.ajax({		
                url: base_url+'Like',
                type: 'POST',
                data: "product_id=" + val+ "&from="+ffrom,
                dataType:"json",
                success:function(response)
                {
                    if(response.exists == "1") 
                    {							
						$('#change-'+my).html(response.likeText);						
					}
					if(response.exists == "2") 
					{										
						window.setTimeout(function(){window.location.href=base_url+'Login'}, 3000 );	
					}
				}
		 });
		});
		$('.Bhome-like').click(function() {	
			var val = $(this).data('val');				
			var my = $(this).data('my');				
			var ffrom = $(this).data('from');				
			$.ajax({		
                url: base_url+'Like',
                type: 'POST',
                data: "product_id=" + val+ "&from="+ffrom,
                dataType:"json",
                success:function(response)
                {
                    if(response.exists == "1") 
                    {							
						$('#Bchange-'+my).html(response.likeText);						
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
	$(document).ready(function(){
		$('.Feedback').click(function() {			
			var reason = $(".feedback-mesage").validationEngine('validate'); 			
			if (!reason) {
				return false;
			}
			var val = $(this).data('val');			
			var ffrom = $('.feedback-mesage').val();
			$('.Feedback').prop('disabled', true);	
			$.ajax({		
                url: base_url+'Feedback',
                type: 'POST',
                data: "product_id=" + val+ "&message="+ffrom,
                dataType:"json",
                success:function(response)
                {
                    if(response.exists == "1") 
                    {							
						$('.feedback-mesage').val('');
						$('#Message').html(response.message);						
						$('#Message').show();
						$('.Feedback').prop('disabled', false);
						window.setTimeout(function(){ $('#Message').hide("slow")}, 1000 );
						$(".hm-item-report-section").fadeOut(1500);
						$('body').css("overflow","auto");
					}
					if(response.exists == "2") 
					{										
						$('#Message').html("Please Login First");
						$('#Message').show();
						$('.Feedback').prop('disabled', false);
						window.setTimeout(function(){window.location.href=base_url+'Login'}, 3000 );	
					}
				}
		 });
		});
		
		$('.ProdEuct').click(function() {
			var val=	$(this).data('xyhgud');			
			$('.ProdEuct').hide();
			$.ajax({		
                url: base_url+'RemoveProdut',
                type: 'POST',
                data: "Div_id=" +val,
                dataType:"json",
                success:function(response)
                {
                    if(response.exists == "1") 
                    {
						location.reload();
						//$('#ghewfj-'+response.val).remove();
					}
				}
			});
		}); 
		$( ".comment-btn" ).click(function() {
			var reason = $("#comment").validationEngine('validate');         
			if (!reason){
				return false; 
				}
			var id=	$(this).data('val');
			$('.comment-btn').prop('disabled', true);
			$.ajax({		
					url: base_url+'Comment-Profile',
					type: 'POST',
					data: "commentoff=" + id + "&comment="+ $('#comment').val(),
					dataType:"json",
					success:function(response)
					{
						if(response.exists == "1") 
						{							
							$('.input-count-comment').html(response.profile_comment_count);
							$('#NoOfComment').html(response.count);
							$(".comment-List").append(response.html);
							$(".hm-comments-list-section").fadeOut(500);
							$('body').css("overflow","auto");
						}
						if(response.exists == "2") 
						{										
							window.setTimeout(function(){window.location.href=base_url+'Login'}, 3000 );	
						}
					}
			});
		});
		$( ".track_id" ).click(function() {
			var reason = $("#track_id").validationEngine('validate');         
			var reason1 = $("#Vendor").validationEngine('validate');         
			if (!reason){
				return false; 
				}
			if (!reason1){
				return false; 
				}
			var id=	$(this).data('address');
			$('.track_id').prop('disabled', true);
			$.ajax({		
					url: base_url+'Update-TrackId',
					type: 'POST',
					data: "address=" + id + "&vendor="+ $('#Vendor').val()+"&track_id=" + $('#track_id').val(),
					dataType:"json",
					success:function(response)
					{
						if(response.exists == "1") 
						{
							location.reload();							
						}
						else
						{
							$('.track_id').prop('disabled', false);							
							$('#msg').html(response.message);
							$('#msg').show();
							window.setTimeout(function(){location.reload()}, 3000 );
						}
					}
			});
		});
	});
</script>
