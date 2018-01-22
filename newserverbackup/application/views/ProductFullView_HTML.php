<!DOCTYPE html>
<html>
<head>
<?php include VIEWPATH.'common/HeaderScript_HTML.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php  echo base_url(); ?>assets/css/jquery.spzoom.css"/>
<script src="<?php echo base_url();?>assets/js/Product.js"></script>
<head>
<body class="home-page-body">
	<?php include VIEWPATH.'common/CommentsPopupProductPage_HTML.php'; ?>
	<?php include VIEWPATH.'common/Report_Popup_HTML.php'; ?>
	<?php include VIEWPATH.'common/NavBar_HTML.php'; ?>
	<section class="blank-section">
        <div class="container">
            <div class="row">
            </div>
        </div>
    </section>
	<?php include VIEWPATH.'common/SubMenu_HTML.php'; ?>	
	<?php //include VIEWPATH.'common/Filter_StarTag_HTML.php'; ?>
	 <section class="vf-product-fullview-section">
		 <div class="container-fluid">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-4">
                    <div class="col-sm-3"> 
					<?php foreach($product->images as $image){ ?>	
                        <div class="col-sm-12 vf-item-img-thumbnail vf-item-img-thumbnail-active" align="center">							
								<img src="<?php echo base_url();?>assets/images/product/<?php echo $image->image_name;?>" class="thumbImg img-responsive" />							
                        </div>
                        <div class="col-sm-12 padding-top15"></div>
					<?php }?>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-12" align="left">
                            <span class="vf-item-time"><?php echo HumanTiming($product->created_date);?></span>
                        </div>
						<?php foreach($product->Singleimages as $simage){ ?>
                        <div class="col-sm-12" align="left">
							<a  id="previewImg1" href="<?php echo base_url();?>assets/images/product/<?php echo $simage->image_name;?>"  data-spzoom data-spzoom-width="200" data-spzoom-height="200">
                            <img id="previewImg" src="<?php echo base_url();?>assets/images/product/<?php echo $simage->image_name;?>" class="img-responsive" />
							</a>
                        </div>
						<?php }?>
                        <div class="col-sm-12 padding-top30" align="center">
                            <span class="vf-item-zoom-text">
                                Roll over the image to zoom in
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="col-sm-6">
                        <div class="col-sm-8 padding-top5 padding-left20" align="left">
                            <span class="vf-item-fullview-name"><?php echo $product->product_name;?></span>
                        </div>
                        <!--<div class="col-sm-4 padding-top5" align="right">
                            <a href="javascript:void(0);" class="vf-item-full-view-share-link">
                                <span>
                                    <img src="images/product/item-share-counter-icon.png" />
                                </span>&nbsp;
                                3 Shares
                            </a>
                        </div>-->
                        <div class="col-sm-12 padding-top5 padding-left20">
                            <span class="vf-item-fullview-desc">
                                <?php echo $product->product_description;?>
								<input type="hidden" name="product_id" id= "product_id" value="<?php echo base64_encode($product->product_id);?>" >
                            </span>
                        </div>
						<?php if ($product->Is_like==0){ ?>
                        <div class="col-sm-12 padding-top5 padding-left20">
						<input type="hidden" id="my_id" value="<?php echo base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ').'/'.base64_encode($product->product_id).'/'. base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ');?>">
                            <a href="javascript:void(0);" class="vf-item-fullview-icon change">
                                <span>
                                    <img src="<?php echo base_url();?>assets/images/icons/like-icon.png" />
                                </span>&nbsp;
                                <?php echo ($product->likes==0)?'':$product->likes;?> <?php echo ($product->likes>1)?'Likes':'Like';?>
                            </a>
                        </div>
						<?php } else { ?>
						<div class="col-sm-12 padding-top5 padding-left20">
							<a href="javascript:void(0);" class="vf-item-fullview-icon change">
                                <span>
                                    <img src="<?php echo base_url();?>assets/images/icons/heart.png" />
                                </span>&nbsp;
                                <?php echo ($product->likes==0)?'':$product->likes;?> <?php echo ($product->likes>1)?'Likes':'Like';?>
                            </a>
                        </div>
						<?php } ?>
                        <div class="col-sm-12 padding-top5 padding-left20">
                            <a href="javascript:void(0);" class="vf-item-fullview-icon" onclick="$('.vf-comments-popup-section').fadeIn(1000);">
                                <span>
                                    <img src="<?php echo base_url();?>assets/images/icons/comment-icon.png" />
                                </span>&nbsp;
                                 <?php echo ($product->comments==0)?'':$product->comments;?> <?php echo ($product->comments>1)?' Comments':' Comment'; ?>
                            </a>
                        </div>
						<?php 
						$ftitle		= 		preg_replace('/[\x00-\x1F\x80-\xFF]/', '',$product->product_name);
						$utitle		=		str_replace("?","-",$ftitle);
						$utitle		=		str_replace(" ","-",$utitle);
						$utitle		=		str_replace(",","",$utitle);
						$utitle		=		str_replace("&","",$utitle);
						$utitle		=		str_replace("/","",$utitle);
						$utitle		=		str_replace(" ","-",$utitle);
						
						$fdesc		= 		strip_tags(substr(preg_replace('/[\x00-\x1F\x80-\xFF]/', '',$product->product_description),0,200));
						 
						$url		=	 	base_url().'ProductFullView/'.base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ').'/'.base64_encode($product->product_id).'/'. base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ');
						$fbimg		=		base_url().'assets/images/product/'.$simage->image_name;
						?>
                        <div class="col-sm-12 padding-top5 padding-left20">
							<a href="javascript:;" class="vf-item-fullview-icon" onClick="postToFeed('<?php echo $ftitle; ?>', '<?php echo $fdesc;?>','<?php echo $url;?>','<?php echo $fbimg;?>');" title="Facebook">                             
                                <span>
                                    <img src="<?php echo base_url();?>assets/images/icons/share-icon.png" />
                                </span>&nbsp;
                                <?php //echo $product->shares;?> Shares
                            </a>
                        </div>
                        <div class="col-sm-12 padding-top5 padding-left20">
                            <a href="javascript:void(0);" class="vf-item-fullview-icon" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <span>
                                    <img src="<?php echo base_url();?>assets/images/icons/more-icon.png" />
                                </span>&nbsp;
                                More
                            </a>
							<?php 
								if($this->session->userdata('user_id')<>'')
								{ 
									if($this->session->userdata('user_id')==$product->user_id)
									{
								?>
								<ul class="dropdown-menu" aria-labelledby="dLabel">
									<?php /* <li class="ProdEuct" data-xyhgud="<?php echo base64_encode($product->product_id); ?>" data-drop="<?php echo $product->product_id; ?>">
										<a href="javascript:void(0);" class="hm-more-dropdown-link hm-item-edit-opt">Delete Product</a>
									</li> */ ?>
									<li>
										<a href="<?php echo base_url().'Edit/'.base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ').'/'.base64_encode($product_value->product_id).'/'. base64_encode('dfsEWCEWETGFTEDFTEXSXSEXRXESRXESRXEXRZ'); ?>"  class="hm-item-edit-opt hm-more-dropdown-link">Edit product</a>
									</li>
								</ul>
									<?php }	else { ?>
							<ul class="dropdown-menu" aria-labelledby="dLabel" data-drop="'.$product_value->product_id.'">
								<li>
									<a href="javascript:void(0);" class="hm-more-dropdown-link hm-item-report-opt" data-var="<?php echo  $product->product_id; ?>"  >Report Against product</a>
								</li>
							</ul>
								<?php } } else { ?>
								<ul class="dropdown-menu" aria-labelledby="dLabel" data-drop="'.$product_value->product_id.'">
								<li>
									<a href="javascript:void(0);" class="hm-more-dropdown-link hm-item-report-opt" data-var="<?php echo  $product->product_id; ?>"  >Report Against product</a>
								</li>
							</ul>
								<?php } ?>
                        </div>	
						<?php if($product->product_discount_pricing<>0) { ?>
                        <div class="col-sm-12 padding-top5 padding-left20">
                            <p class="vf-item-fullview-price">
                                <span>Price</span>&nbsp;&nbsp;&nbsp;
                                $<?php echo $product->product_discount_pricing;?>
                                &nbsp;&nbsp;&nbsp;<del><span>$<?php echo $product->product_price;?></span></del>
                            </p>
                        </div>
						<?php } else{ ?>
						<div class="col-sm-12 padding-top5 padding-left20">
                            <p class="vf-item-fullview-price">
							 $<?php echo $product->product_price;?>
							 </p>
                        </div>
						<?php } ?>
                      <?php /*  <div class="col-sm-12 padding-top5">
                            <ul class="vf-item-fullview-size">
                                <li class="first">Size</li>
                                <li>
                                    <a href="javascript:void(0)">
                                        6
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        7
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        8
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        9
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        10
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        11
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        12
                                    </a>
                                </li>
                            </ul>
                        </div>
                        */ ?>
						<?php if($product->product_colour<>''){ ?>
						<div class="col-sm-12 padding-top5">
                            <span class="vf-item-fullview-color-list">Color</span>
							<?php $color=explode(',',$product->product_colour); foreach($color as $data) {?>
                            <div class="vf-item-fullview-color" style="background-color:<?php echo $data ?>;"></div>
							<?php } ?>     
                        </div>
						<?php 
						}
							switch($product->product_type_id)
							{
								case'1':{$item='New Item';break;}
								case'2':{$item='Used Item';break;}
								case'3':{$item='Refurbished Item';break;}
								case'4':{$item='Bid for Item';break;}
								default:{$item=''; break;}
							} 
							switch($product->ship_over)
							{
								case'1':{$Delivery='Globle Delivery';break;}								
								case'2':{$Delivery='Local Delivery';break;}								
								case'3':{$Delivery='Globle and Local Delivery';break;}								
							}
							//$Delivery=($product->ship_over==1)?'Globle Delivery':($product->ship_over==2)?'Local Delivery':'Globle and Local Delivery';
							?>
                        <div class="col-sm-12 padding-top15">
                            <p class="vf-item-fullview-subheading"><?php echo $item;?>, <?php echo $Delivery;?></p>
							<?php if($product->features<>''){ ?>
                            <ul class="vf-item-fullview-keypoints">
							<?php	foreach($product->features as $features){?>
                                <li>
                                    <span>
                                        <img src="<?php echo base_url();?>assets/images/product/bullet-point-icon.png" />
                                    </span>
                                    <?php echo $features->product_features?>.
                                </li>
							<?php } ?>
                            </ul>
							<?php } ?>
                        </div>
						<?php  if($this->session->userdata('user_id')<>'')
								{ 
									if($this->session->userdata('user_id')!= $product->user_id)
									{ ?>
                        <div class="col-sm-12 padding-top5">
                            <a href="javascript:void(0);" class="vf-item-report-problem-link hm-item-report-opt" data-var="<?php echo  $product->product_id; ?>" >
                                Report incorrect product information
                            </a>
                        </div>
								<?php }} else{ ?>
						 <div class="col-sm-12 padding-top5">
                            <a href="javascript:void(0);" class="vf-item-report-problem-link hm-item-report-opt" data-var="<?php echo  $product->product_id; ?>" >
                                Report incorrect product information
                            </a>
								</div> <?php } ?>
                        <div class="col-sm-12 padding-top5">
                            <p class="item-delivery-info">
                                <span>
                                    <img src="<?php echo base_url();?>assets/images/product/delivery-icon.png" />
                                </span>
                                In <?php echo round($product->ships_in/2);?> to <?php echo $product->ships_in;?> days Delivery 
                            </p>
                        </div>
						 <?php 
						 if($product->post_type==1){
						 if($product->product_in_stock==1){ ?>
                        <div class="col-sm-12 padding-top5 padding-bottom5" align="center">
                            <button class="hm-item-btn-lg" type="button">Buy as gift</button>
                        </div>
						 <?php } else {?>
						  <div class="col-sm-12 padding-top5 padding-bottom5" align="center">
                            <button class="hm-item-btn-lg" type="button">Request Item</button>
                        </div>
						 <?php } }?>
                    </div>
                    <div class="col-sm-6 padding-left20 padding-bottom50">
                        <div class="col-sm-12 padding-top5 padding-bottom30">
                            <a href="<?php echo base_url().'User/'.$product->user;?>" class="vf-item-fullview-by-link">
                                <span>
                                    <img src="<?php echo base_url();?>assets/UserImage/<?php echo $product->user_id.'/'.$product->user_image;?>" />
                                </span>&nbsp;
                                @<?php echo $product->user;?>
                            </a>
                        </div>
						<div class="col-sm-12 padding-top5" id="success_wish" style="display:none;color:green;"></div>
						<div class="col-sm-12 padding-top5" id="success_error" style="display:none;color:red;"></div>
                        <div class="col-sm-12 padding-top10"></div>
						<?php if($product->post_type==2){ ?>
                        <!--ITEM TIMER-->
                        <div class="col-sm-12 padding-top5 " id="countdown">
                            <span class="hm-item-timer">Time Left :	<span class="days">00</span> : <span class="hours">00</span> : <span class="minutes">00</span> : <span class="seconds">00</span> </span>
                        </div>
					
                        <!--BIDDING-->
                        <div class="col-sm-12" align="center">
						<form id="bidform" name="bidform" method="POST">
                            <div class="col-sm-12 padding-top5 padding-bottom5" align="center">
                                <input type="number" name="bid_value" id="bid_value" class="hm-bidding-input validate[required]" placeholder="Enter your bid amount here">
								<input type="hidden" name="product_id_bid" id= "product_id_bid" value="<?php echo base64_encode($product->product_id);?>" >
                            </div>
							<div class="col-sm-12 padding-top5 padding-bottom5" align="center">
								<span id="replace2"><?php echo @$captcha_image;?></span> &nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php  echo base_url(); ?>assets/images/refresh_image.png" class="captchasmall"  id="refreshimg" style="height: 25px;"/>
							</div>
							<div class="col-sm-12 padding-top5 padding-bottom5" align="center">
								<input type="text" name="word" id="word"  value="" maxlength="6" minlength="6"  autocomplete="off" class="hm-bidding-input validate[required]" placeholder="Enter Captcha Value">
							</div>
                            <div class="col-sm-12 padding-top5 padding-bottom5" align="center">
                                <button class="hm-item-btn-lg" id="bid-btn" type="button">Place Bid</button>
                            </div>
						</form>
                        </div>	
						<?php } else { ?>
                        <div class="col-sm-12">
						<?php if($product->product_in_stock==1){ ?>						
                            <div class="col-sm-12 padding-top5 padding-bottom5" align="center">
                                <button class="hm-item-btn-lg-rev width-73per-imp" id="add_product" type="button">Add to cart</button>
                            </div>
							<?php } else{ ?>
							<div class="col-sm-12 padding-top5 padding-bottom5" align="center">
                                <button class="hm-item-btn-lg width-73per-imp" id="request_product" type="button">Request Item</button>
                            </div>
							<?php } ?>
                            <div class="col-sm-12 padding-top5 padding-bottom5" align="center">
                                <button class="hm-item-btn-lg width-73per-imp wish-list" type="button">Dream Box</button>
                            </div>
                        </div>
						<?php } ?>
                        <div class="col-sm-12 padding-top10 padding-bottom10" align="center">
                            <span class="vf-item-tags-container">
								<?php $tags= explode(',',$product->product_star_tag_id);for($j=0;$j<count($tags);$j++){ $tag= _GetTagById($tags[$j]); ?>
                                <a href="<?php echo base_url();?>StarTag/<?php echo urlencode (trim($tag));?>" class="badge vf-item-tags-fill">
                                    <?php echo $tag; ?>
                                </a>
                                <?php } ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>
    </section>
    
	<?php include VIEWPATH.'common/CustomerBroughtAlso_HTML.php'; ?>
    <?php include VIEWPATH.'common/RecentViews_HTML.php'; ?>
    <?php include VIEWPATH.'common/RecommendedGroupsNear_HTML.php'; ?>
    <?php include VIEWPATH.'common/Ad_HTML.php'; ?>
	<?php include VIEWPATH.'common/Footer_HTML.php'; ?>
	<?php if($product->post_type==2){
		$countdown_time	=str_replace("-","/",$product->bid_endDate).' '.$product->bid_endTime;
		?>
<?php /*	<script>
 var target_date = new Date('<?php echo $product->bid_endDate.' '.$product->bid_endTime;?>');
// alert(target_date);
// variables for time units
var days, hours, minutes, seconds;
 
// get tag element
<!-- var countdown = document.getElementById('countdown'); -->
 
// update the tag with id "countdown" every 1 second
setInterval(function () {
  var current_date = new Date().getTime();
 if(target_date > current_date){
    // find the amount of "seconds" between now and target
    
    var seconds_left = (target_date - current_date) / 1000;
 
    // do some time calculations
    days = parseInt(seconds_left / 86400);
    seconds_left = seconds_left % 86400;
     
    hours = parseInt(seconds_left / 3600);
    seconds_left = seconds_left % 3600;
     
    minutes = parseInt(seconds_left / 60);
    seconds = parseInt(seconds_left % 60);
     
    // format countdown string + set tag value
    $('#countdown').html ('<span class="hm-item-timer">Time Left : <span class="time">' + days +  ' <b>Days</b></span> <span class="time">' + hours + ' <b>Hours</b></span> <span class="time">'
    + minutes + ' <b>Min</b></span> <span class="time">' + seconds + ' <b>Sec</b></span></span>'); 
	} 
 else{
 $('#countdown').html ('<span class="hm-item-timer"> Time Expired</span>');
 } 
}, 1000); 
</script> */ ?>
<script type="text/javascript">$("#countdown").downCount({date:"<?php echo $countdown_time; ?>",offset:5.5}, function (){}); </script>			
<script>
	$(document).ready(function(){
		$("#bid-btn").click(function(){
			var reason = $("#bidform").validationEngine('validate'); 
			if (!reason) {
				return false;
			}
			var word= $("#word").val();			
			$.ajax({
					url: base_url+'PlaceBid',
					type: 'POST',
					data: "product_id_bid=" + $('#product_id_bid').val() + "&bid_value=" + $('#bid_value').val()+ "&word=" + word,
					dataType:"json",
					success:function(response)
					{
						//alert(response);
						if(response.exists == 1) 
						{
							$('#success_wish').html(response.message);			   
							$('#success_wish').show("slow");
							window.setTimeout(function(){ $('#success_wish').hide("slow")}, 3000 );
							var target ="<?php  echo base_url(); ?>"+'CaptchaAjax';
								$.post(target,{ajax:true},
									function(html){												
										$('#replace2').html(html);										
								  });
							$("#word").val('');	
							$('#bid_value').val('');
						}
						if(response.exists == 2) 
						{
							$('#success_error').html(response.message);						
							$('#success_error').show("slow");
							var target ="<?php  echo base_url(); ?>"+'CaptchaAjax';
								$.post(target,{ajax:true},
									function(html){												
										$('#replace2').html(html);										
								  });
							$("#word").val('');	
							$('#bid_value').val('');
							
							window.setTimeout(function(){ $('#success_error').hide("slow")}, 3000 );						
							window.setTimeout(function(){window.location.href=base_url+'Login'}, 3000 );			   
						}						
						if(response.exists == 3) 
						{
							$('#success_error').show("slow");
							window.setTimeout(function(){ $('#success_error').hide("slow")}, 3000 );	
							var target ="<?php  echo base_url(); ?>"+'CaptchaAjax';
								$.post(target,{ajax:true},
									function(html){												
										$('#replace2').html(html);										
								  });
								$("#word").val('');	
								$('#bid_value').val('');
						}                     
						
					}
			});
		});
		$("#refreshimg").click(function(){							
			var target ="<?php  echo base_url(); ?>"+'CaptchaAjax';
			$.post(target,{ajax:true},
				function(html){												
					$('#replace2').html(html);
			  });
		});
	});
	
</script>
	<?php } ?>
	<script type="text/javascript">
        $(function() {
           $('[data-spzoom]').spzoom();
        });
    </script>
	<script src="<?php  echo base_url(); ?>assets/js/jquery.spzoom.js" type="text/javascript" charset="utf-8"></script>
	<?php 
		$class	=	$this->router->fetch_class();
	$method	=	$this->router->fetch_method();
	if($comment_box==1){ ?>
	<script>
	$(document).ready(function(){
		$('.vf-comments-popup-section').fadeIn(1000);
	});
	</script>
	<?php } ?>
    </body>
</html> 