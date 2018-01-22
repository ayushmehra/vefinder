<!DOCTYPE html>
<html>
	<head>
		<?php include VIEWPATH.'common/HeaderScript_HTML.php'; ?>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/modal.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/typography.css">
		<script src="<?php echo base_url();?>assets/js/login.js"></script>
	</head>
	<body>
		<div class="overlay" style="display:none;">
			<div class="popup">
				<i class="material-icons overlay-close-icon">cancel</i>
				<p class="popup-content" > 
					<i class="material-icons"style="color: #a50439;">error</i><span id="pop_fail"></span>
				</p>
				<div class="row text-center">
					<button class="view-btn Tryclose">Try Again</button>
				</div>
			</div>
		</div>
		<section class="vf-signup-section">
			<div class="container">
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<div class="col-sm-1"></div>
						<div class="col-sm-10">
							<a href="<?php echo base_url(); ?>">
								<div class="col-sm-12 vf-logo-heading">
									<span>
										<img src="<?php echo base_url();?>assets/images/vifinder-black-logo.png" />
									</span>&nbsp;
									Vifinder
								</div>
							</a>
							<div class="col-sm-12 padding-top20">
								<p class="vf-signup-section-heading">
									Sign In
								</p>
							</div>
							<form  id="loginform" method="post" name="loginform" >
								<div class="col-sm-12">
									<div class="col-sm-11">
										<input type="text" class="vf-signup-form-input validate[required]" id="username" placeholder="Email Address" />
									</div>
									<div class="col-sm-1"></div>
								</div>
								<div class="col-sm-12 padding-top20">
									<div class="col-sm-11">
										<div class="input-group date">
											<input type="password" id="signupPasswordTxt" class="vf-signup-form-input vf-signup-form-input-group validate[requiredvalidate[required,minSize[6]]]" placeholder="Password" />
											<span class="input-group-addon vf-signup-form-input-group-icon">
												<span class="glyphicon glyphicon glyphicon-eye-close" id="show-password" data-value="0"></span>
											</span>
										</div>
									</div>
									<div class="col-sm-1"></div>
								</div>
								<div class="col-sm-12 padding-top10">
									<div class="col-sm-6">
										<div class="checkbox">
											<label class="vf-signup-form-label">
												<input name="signin" id="signin" type="checkbox"  value="forever" checked> Stay signed in
											</label>
										</div>
									</div>
									<div class="col-sm-5 padding-top10" align="right">
										<a href="<?php echo base_url(); ?>Forget-Password" class="vf-signup-form-link">Forgot Password?</a>
									</div>
									<div class="col-sm-1"></div>
								</div>
								<div class="col-sm-12 padding-top10">
									<div class="col-sm-11">
										<button type="button" id="login" class="vf-signup-form-btn">Sign in</button>
									</div>
									<div class="col-sm-1"></div>
								</div>
							</form>
							<div class="col-sm-12 padding-top10">
								<div class="col-sm-11">
									<label class="vf-signup-form-label vf-text-uppercase vf-float-left">
										Not a member yet?
									</label>
									<label class="signup-form-label vf-float-right">
										<a href="<?php echo base_url(); ?>SignUp" class="vf-signup-redirect-link">Get Vefinder ID</a>
									</label>
								</div>
								<div class="col-sm-1"></div>
							</div>
						</div>
						<div class="col-sm-1"></div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</div>
		</section>
	</body>
</html>