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
				<p class="popup-content fail" style="display:none;" > 
					<i class="material-icons"style="color: #a50439;">error</i><span id="pop_fail"></span>
				</p>
				<p class="popup-content success_reg" style="display:none;" > 
					<i class="material-icons">check_circle</i><span id="pop_success"></span>
				</p>
				<div class="row text-center fail" style="display:none;">
					<button class="view-btn Tryclose">Try Again</button>
				</div>
				<div class="row text-center success_reg" style="display:none;">
					<button class="view-btn Tryclose">Okay</button>
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
                                Forget Password
                            </p>
                        </div>
						<div class="col-sm-12 padding-top20">
                            <div class="col-sm-11">
                                <input type="text" class="sigup-form-input validate[required]" id="inputEmail"  placeholder="Email Address" />
                            </div>
                            <div class="col-sm-1"></div><div class="col-sm-1"></div><div class="col-sm-1"></div>
                        </div>
                        <div class="col-sm-12 padding-top10">
                            <div class="col-sm-11">
                                <button type="button" id="get_password" class="vf-signup-form-btn">Get Password</button>
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
						<div class="col-sm-12 padding-top10">
                            <div class="col-sm-11" align="center">
                                <label class="vf-signup-form-label">
                                    Already have an account yet ? <a href="<?php echo base_url(); ?>Login" class="vf-signup-form-link"> Log in.</a>
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