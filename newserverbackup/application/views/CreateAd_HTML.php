<!DOCTYPE html>
<html>
	<head>
		<?php include VIEWPATH.'common/HeaderScript_HTML.php'; ?>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/typography.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/commons.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/create-ad.css">
		<head>
			<body id="page-top">
				<?php include VIEWPATH.'common/NavBar_HTML.php'; ?>
				<section class="blank-section">
					<div class="container">
						<div class="row">
						</div>
					</div>
				</section>
				<?php //include VIEWPATH.'common/CartComment_HTML.php'; ?>
				<?php include VIEWPATH.'common/SubMenu_HTML.php'; ?>
				<?php //include VIEWPATH.'common/Filter_StarTag_HTML.php'; ?>
				<!-- Main Content -->
				<div id="content">
					<div class="container main-content create-ad-content">
						<form name="createad" id="createad" method="POST" enctype="multipart/form-data">
							<div class="heading-section">
								<h4 class="page-heading">Create Ad</h4>
							</div>
							<div class="create-ad-section">
								<div class="row">
									<div class="col-lg-2">
										<p class="row-title">Ad Type</p>
									</div>
									<div class="col-lg-10">
										<label class="ad-type-cb-label">Banner Ad
											<input type="checkbox" name="ad[]" value="banner-ad" id="banner-cb" class="banner-cb ad-type-cb validate[minCheckbox[1]]" checked>
											<span class="checkmark"></span>
										</label>
										
										<label class="ad-type-cb-label">Sponsor Ad
											<input type="checkbox" name="ad[]" value="sponsor-ad" id="sponsor-cb" class="sponsor-cb ad-type-cb validate[minCheckbox[1]]">
											<span class="checkmark"></span>
										</label>
										
										<label class="ad-type-cb-label">Footer Ad
											<input type="checkbox" name="ad[]" value="footer-ad" id="footer-cb" class="footer-cb ad-type-cb validate[minCheckbox[1]]">
											<span class="checkmark"></span>
										</label>
										
										<label class="ad-type-cb-label">Landing Page Ad
											<input type="checkbox" name="ad[]" value="landing-ad" id="landing-page-cb" class="landing-page-cb ad-type-cb validate[minCheckbox[1]]">
											<span class="checkmark"></span>
										</label>
									</div>
								</div>
								
								<div class="row date-info-row">
									<div class="col-lg-2">
										<p class="row-title">Schedule</p>
									</div>
									<div class="col-lg-10">
										<p class="row-subtitle">Select Period</p>
										<p class="date-info start-date-info">
											<span>Start</span>
											<i class="material-icons date-material">event</i>
											<input type="date" name="start_date" class="validate[required,custom[date]]" placeholder="Event Date" id="start-date-input">
										</p>
										<p class="date-info end-date-info">
											<span>End</span>
											<i class="material-icons date-material">event</i>
											<input type="date" name="end_date" class="validate[required,custom[date]]" placeholder="Event Date" id="end-date-input">
										</p>
									</div>
								</div>
								
								<div class="row amount-info-row">
									<div class="col-lg-2">
										<p class="row-title">Ad Amount</p>
									</div>
									<div class="col-lg-10">
										<span class="event-amount">$150</span>&nbsp;
										<span class="min-value">(Min $5 per day)</span>
										<p class="per-day-info">This amount will be spent per day</p>
									</div>
								</div>
								
								<p class="ad-run-info">
									Your ad will run <b>30 Days</b> and total <b>$150</b> will be spent on that
								</p>
								
								<div class="row ad-images-row">
									<div class="col-md-4" id="Banner">
										<div class="file-slot">
											<div class="file-container">
												<i class="material-icons">collections</i>
												<p class="ad-image-size">1360 x 360</p>
												<p class="ad-image-label">Upload image</p>
												<input class="add-image add-banner-ad-image validate[required]" id="banner_ad_image" onchange="uploadBannerAdImage(this);" type="file" name="banner_ad_image" accept="image/*">
												<img id="banner-ad-image" src="#" style="display: none;" />
											</div>
											<p class="slot-header">Banner Ad</p>
											<p class="slot-subheader">This Ad will be visible on the home page of the website</p>
										</div>
									</div>
									<div class="col-md-2" id="Sponsor" style="display: none;" >
										<div class="file-slot">
											<div class="file-container">
												<i class="material-icons">collections</i>
												<p class="ad-image-size">300 x 300</p>
												<p class="ad-image-label">Upload image</p>
												<input class="add-image add-sponsor-ad-image validate[required]" onchange="uploadSponsorAdImage(this);" type="file" name="sponsor_ad_image" accept="image/*">
												<img id="sponsor-ad-image" src="#" style="display: none;"/>
											</div>
											<p class="slot-header">Sponsor Ad</p>
										</div>
									</div>
									<div class="col-md-3" id="Footer" style="display: none;">
										<div class="file-slot">
											<div class="file-container">
												<i class="material-icons">collections</i>
												<p class="ad-image-size">450 x 250</p>
												<p class="ad-image-label">Upload image</p>
												<input class="add-image add-footer-ad-image validate[required]" onchange="uploadFooterAdImage(this);" type="file" name="footer_ad_image" accept="image/*">
												<img id="footer-ad-image" src="#" style="display: none;" />
											</div>
											<p class="slot-header">Footer Ad</p>
											<p class="slot-subheader">only banner will be displayed</p>
										</div>
									</div>
									<div class="col-md-3" id="Landing" style="display: none;">
										<div class="file-slot">
											<div class="file-container">
												<i class="material-icons">collections</i>
												<p class="ad-image-size">820 x 440</p>
												<p class="ad-image-label">Upload image</p>
												<input class="add-image add-landing-ad-image validate[required]" onchange="uploadLandingAdImage(this);" type="file" name="landing_ad_image" accept="image/*">
												<img id="landing-ad-image" src="#" style="display: none;"/>
											</div>
											<p class="slot-header">Landing Page Ad</p>
											<p class="slot-subheader">in this ad only banner will be displayed</p>
										</div>
									</div>
								</div>
								
								<div class="row prod-link-row" id="Product-Link">
									<div class="col-lg-2">
										<p class="row-title">Product Link</p>
									</div>
									<div class="col-lg-10">
										<input type="text" name="product_link" class="prod-link-input validate[required]" placeholder="paste your link here"><br />
										<span class="by-line">add a link of the product you want to redirect to when clicked on the ad</span>
									</div>
								</div>
								
								<div class="row headline-row">
									<div class="col-lg-2">
										<p class="row-title">Headline</p>
									</div>
									<div class="col-lg-10">
										<input type="text" name="headline" class="headline-input validate[required]" placeholder="exampe: new iphone 10 50% off"><br />
										<span class="by-line">add a name of the product or headline</span>
									</div>
								</div>
							</div>
							<input id="submit_ad" type="submit" name='submit' class="btn proceed-btn" value="Proceed" >
						</form>
					</div>
				</div>
				<?php include VIEWPATH.'common/Footer_HTML.php'; ?>
				<script src="assets/js/bootstrap.bundle.min.js"></script>
				<script src="<?php echo base_url();?>assets/js/jquery.easing.min.js"></script>
				<script src="<?php echo base_url();?>assets/js/scrolling-nav.js"></script>
				<script src="<?php echo base_url();?>assets/js/commons.js"></script>
				<script>
					document.addEventListener("DOMContentLoaded", function(event) {
						document.querySelectorAll('img').forEach(function(img){
							img.onerror = function(){this.style.display='none';};
						})
					});
					function uploadBannerAdImage(input) {
						if (input.files && input.files[0]) {
							var reader = new FileReader();
							reader.onload = function (e) {
								var image = new Image();
								image.src = e.target.result;
								//Validate the File Height and Width.
								image.onload = function () {
									var height = this.height;
									var width = this.width;
									if (height > 1500 || width > 300) {
										//alert("Height and Width must not exceed 100px.");
										return false;
									}
								};
								var wd = $('#banner-ad-image').parent().width();
								var ht = $('#banner-ad-image').parent().height();
								$('#banner-ad-image').attr('src', e.target.result).width(wd).height(ht);
								$('#banner-ad-image').css('display','block');
							};
							reader.readAsDataURL(input.files[0]);
						}
					}
					function uploadSponsorAdImage(input) {
						if (input.files && input.files[0]) {
							var reader = new FileReader();
							reader.onload = function (e) {
								var wd = $('#sponsor-ad-image').parent().width();
								var ht = $('#sponsor-ad-image').parent().height();
								$('#sponsor-ad-image').attr('src', e.target.result).width(wd).height(ht);
								$('#sponsor-ad-image').css('display','block');
							};
							reader.readAsDataURL(input.files[0]);
							}
						}
						function uploadLandingAdImage(input) {
							if (input.files && input.files[0]) {
								var reader = new FileReader();
								reader.onload = function (e) {
									var wd = $('#landing-ad-image').parent().width();
									var ht = $('#landing-ad-image').parent().height();
									$('#landing-ad-image').attr('src', e.target.result).width(wd).height(ht);
									$('#landing-ad-image').css('display','block');
								};
								reader.readAsDataURL(input.files[0]);
							}
						}
						function uploadFooterAdImage(input) {
							if (input.files && input.files[0]) {
								var reader = new FileReader();
								reader.onload = function (e) {
									var wd = $('#footer-ad-image').parent().width();
									var ht = $('#footer-ad-image').parent().height();
									$('#footer-ad-image').attr('src', e.target.result).width(wd).height(ht);
									$('#footer-ad-image').css('display','block');
								};
								reader.readAsDataURL(input.files[0]);
							}
						}
				</script>
				<script>
					$("#banner-cb").click(function() {
						if($(this).is(":checked")) {
							$("#Banner").show();
							} else {
							$("#Banner").hide();
							$("#banner-cb").prop('checked',false);
						}
					});
					$("#footer-cb").click(function() {
						if($(this).is(":checked")) {
							$("#Footer").show();
							} else {
							$("#Footer").hide();
							$("#footer-cb").prop('checked',false);
						}
					});
					$("#sponsor-cb").click(function() {
						if($(this).is(":checked")) {
							$("#Sponsor").show();
							} else {
							$("#Sponsor").hide();
							$("#sponsor-cb").prop('checked',false);
						}
					});
					$("#landing-page-cb").click(function() {
						if($(this).is(":checked")) {
							$("#Landing").show();
							} else {
							$("#Landing").hide();
							$("#landing-page-cb").prop('checked',false);
						}
					});
					
					$( document ).ready(function() {
						$("#submit_ad").click(function(){
							var reason = $("#createad").validationEngine('validate'); 
							if (!reason){
								return false;
							}
							else{
								$("form[name='createad']").submit();
							}
						});
					})
				</script>
			</body>
		</html>				