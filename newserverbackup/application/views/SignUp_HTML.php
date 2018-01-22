<!DOCTYPE html>
<html>
	<head>
		<?php include VIEWPATH.'common/HeaderScript_HTML.php'; ?>
		<script src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyBfi1CKChvy4M-w8ph5WZtC8yHcQii6poY"></script>
		<script src="<?php echo base_url();?>assets/js/registration.js"></script>
		<script>var placeSearch, autocomplete;  
			google.maps.event.addDomListener(window, 'load', function () {
			var places = new google.maps.places.Autocomplete(document.getElementById('city')); })
		</script>
		<head>
			<body>
				<section class="signup-section">
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
									<div class="col-sm-12 ui-display-none">
										<p class="signup-section-heading">
											Sign Up
										</p>
									</div>
									<form  id="registerform" name="registerform" method="post" enctype="multipart/form-data" accept-charset="UTF-8" >
										<div class="col-sm-12 padding-top20">
											<div class="col-sm-3">
												<img id="userImgPreview" class="img-responsive img-circle vf-user-img" src="<?php echo base_url();?>assets/images/default-user-icon.png" />
												<a href="javascript:void(0);" class="upload-icon" onclick="$('#signupImgUpload').click();">
													<img src="<?php echo base_url();?>assets/images/upload-img-icon.png" />
												</a>
												<input type="file" name="user" id="signupImgUpload" accept="image/x-png,image/gif,image/jpeg" />
											</div>
											<div class="col-sm-8 padding-top35">
												<input type="text" class="vf-sigup-form-input validate[required,custom[onlyLetterNumber]]" name="inputUname" id="inputUname" placeholder="@Username" />
												<p id="msg" style="position:absolute;top:0;right:0;" ></p>
											</div>
											<div class="col-sm-1"></div>
										</div>
										<div class="col-sm-12 padding-top20">
											<div class="col-sm-11">
												<input type="text" class="vf-sigup-form-input validate[required,custom[onlyLetterSp]]" name="fname" id="inputFname" placeholder="First Name" />
											</div>
											<div class="col-sm-1"></div>
										</div>
										<div class="col-sm-12 padding-top20">
											<div class="col-sm-11">
												<input type="text" class="vf-sigup-form-input validate[required,custom[onlyLetterSp]]" name="lname" id="inputlname" placeholder="Last Name" />
											</div>
											<div class="col-sm-1"></div>
										</div>
										<div class="col-sm-12 padding-top20">
											<div class="col-sm-11">
												<label class="radio-inline form-label vf-signup-form-label">
													<input type="radio"  class="validate[required]" name="gender" value="Male" checked> Male
												</label>
												<label class="radio-inline form-label vf-signup-form-label">
													<input type="radio"  class="validate[required]" name="gender" value="Female"> Female
												</label>
												<label class="radio-inline form-label vf-signup-form-label">
													<input type="radio"  class="validate[required]" name="gender" value="Other"> Other
												</label>
											</div>
											<div class="col-sm-1"></div>
										</div>
										<div class="col-sm-12 padding-top20">
											<div class="col-sm-11">
												<input type="email" class="vf-sigup-form-input validate[required,custom[email]]" name="email" id="inputEmail" placeholder="Email Address" />
											</div>
											<div class="col-sm-1"></div>
										</div>
										<div class="col-sm-12 padding-top20">
											<div class="col-sm-11">
												<div class="input-group date">
													<input type="password"  id="signupPasswordTxt" class="vf-sigup-form-input vf-signup-form-input-group validate[requiredvalidate[required,minSize[6]]]" maxlength="10" placeholder="Password" />
													<span class="input-group-addon vf-signup-form-input-group-icon">
														<span class="glyphicon glyphicon glyphicon-eye-close" id="show-password" data-value="0"></span>
													</span>
												</div>
											</div>
											<div class="col-sm-1"></div>
										</div>
										<div class="col-sm-12 padding-top20">
											<div class="col-sm-11">
												<div class="input-group date">
													<input type="password" id="signupConfirmPasswordTxt" name="password" class="vf-sigup-form-input vf-signup-form-input-group validate[required,equals[signupPasswordTxt]]"  maxlength="10"placeholder="Confirm Password" />
													<span class="input-group-addon vf-signup-form-input-group-icon">
														<span class="glyphicon glyphicon glyphicon-eye-close"  id="show-confirm-password" data-value="0"></span>
													</span>
												</div>
											</div>
											<div class="col-sm-1"></div>
										</div>
										<div class="col-sm-12 padding-top20">
											<div class="col-sm-11">
												<?php /* <input type="text" class="sigup-form-input validate[required,custom[onlyLetterSp]]" placeholder="Private/ Company" /> */ ?>
												<label class="radio-inline form-label vf-signup-form-label">
													<input type="radio" id="Private-Profile" class="validate[required]" name="profile" value="1" checked> Private Profile
												</label>
												<label class="radio-inline form-label vf-signup-form-label">
													<input type="radio" id="Company-Profile" class="validate[required]" name="profile" value="2"> Company Profile
												</label>
											</div>
											<div class="col-sm-1"></div>
										</div>
										<div id="Company" style="display: none;">
											<div class="col-sm-12 padding-top20">
												<div class="col-sm-11">
													<input type="text" class="vf-sigup-form-input validate[required]" name="company_number" placeholder="Legal Company Number" />
												</div>
												<div class="col-sm-1 padding-top7" align="left">
													<a href="javascript:void(0);" class="blank-url" data-toggle="tooltip" data-placement="top" title="Your Registered Company Number">
														<img src="<?php echo base_url();?>assets/images/information-icon.png" />
													</a>
												</div>
											</div>
											<?php if(is_array($cat_data)){ ?>
											<div class="col-sm-12 padding-top20">
											<div class="col-sm-11">
												<?php  foreach($cat_data as $cat){?>
												<label class="checkbox-inline form-label">
													<input type="checkbox" id="<?php echo $cat->cat_name?>" class="validate[required]" name="cat[]" value="<?php echo $cat->cat_id?>" checked > <?php echo $cat->cat_name?>
												</label>
												<?php  } ?>
											</div>
											<div class="col-sm-1"></div>
											</div>
											<?php } ?>
										</div>
										<div class="col-sm-12 padding-top20">
											<div class="col-sm-11">
												<div class="input-group date">
													<input type="text" name="location" id="city" class="vf-sigup-form-input  validate[required]" placeholder="Location" />
													<span class="input-group-addon vf-signup-form-input-group-icon">
														<span class="glyphicon glyphicon-map-marker"></span>
													</span> 
												</div>
											</div>
											<div class="col-sm-1"></div>
										</div>                       
										<div class="col-sm-12 padding-top20">
											<div class="col-sm-11">
												<div class="input-group date ">
													<input type="text" name="dob" data-provide="datepicker" id="signupDOBTxt" class="vf-sigup-form-input vf-signup-form-input-group validate[required,custom[date]]" placeholder="Date of Birth" />
													<span class="input-group-addon vf-signup-form-input-group-icon">
														<span class="glyphicon glyphicon-calendar"></span>
													</span>
												</div>
											</div>
											<div class="col-sm-1 padding-top7" align="left">
												<label class="vf-signup-form-info-label">
													Optional
												</label>
											</div>
										</div>
										<div class="col-sm-12 padding-top20">
											<div class="col-sm-11">
												<input type="url" name="web" class="vf-sigup-form-input" placeholder="Website" />
											</div>
											<div class="col-sm-1 padding-top7" align="left">
												<label class="vf-signup-form-info-label">
													Optional
												</label>
											</div>
										</div>
										<div class="col-sm-12 padding-top10">
											<div class="col-sm-11">
												<div class="checkbox">
													<label class="vf-signup-form-label">
														<input class="checked validate[required]"  type="checkbox" value="Yes" id="agree" name="agree"> I have read and accept <a href="javascript:void(0);" class="vf-signup-form-link">Terms and Conditions</a>
														and <a href="javascript:void(0);" class="vf-signup-form-link">Privacy Poilcy</a>
													</label>
												</div>
											</div>
											<div class="col-sm-1"></div>
										</div>
										<div class="col-sm-12 padding-top10" id="get_sign_up">
											<div class="col-sm-11">
												<button type="button" id="register" class="vf-signup-form-btn">Sign up</button>
											</div>
											<div class="col-sm-1"></div>
										</div>
									</form>
									<div class="col-sm-12 padding-top10">
										<div class="col-sm-11" align="center">
											<label class="vf-signup-form-label">
												Already have a ID? <a href="<?php echo base_url();?>Login" class="vf-signup-form-link">Sign In</a>
											</label>
										</div>
										<div class="col-sm-1"></div>
									</div>
									<div class="col-sm-12 padding-top10" align="center" id="loder" style="display: none;" >
										<img src="<?php echo base_url(); ?>assets/images/preview.gif" style="height: 32px;">
									</div>
									<div class="col-sm-12 padding-top10 text-center" id="success_reg" style="display: none;color:green;font-weight: bold" >
									</div>
									<div class="col-sm-12 padding-top10 text-center" id="fail" style="display: none;color:Red;font-weight: bold" >
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