<!DOCTYPE html>
<html>
	<head>
		<?php include VIEWPATH.'common/HeaderScript_HTML.php'; ?>
		<link href="<?php echo base_url();?>assets/css/vefinder.checkbox.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery-clockpicker.css">
		<link href="<?php echo base_url();?>assets/css/bootstrap-datepicker.css" rel="stylesheet" />
		<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>	
		<script type="text/javascript" src="<?php  echo base_url(); ?>assets/js/bootstrap-clockpicker.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				var maxField = 100; //Input fields increment limitation
				var addButton = $('.add_button'); //Add button selector
				var wrapper = $('.feat'); //Input field wrapper
				var fieldHTML = '<div class="col-sm-11"><input type="text" class="post-form-input validate[required]" name="product_features[]" placeholder="Product Features"/><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="<?php echo base_url();?>assets/remove-icon.png" style="height: 30px; width: 30px"/></a></div>'; //New input field html 
				var x = 1; //Initial field counter is 1
				$(addButton).click(function(){ //Once add button is clicked
					if(x < maxField){ //Check maximum number of input fields
						x++; //Increment field counter
						$(wrapper).append(fieldHTML); // Add field html
					}
				});
				$(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
					e.preventDefault();
					$(this).parent('div').remove(); //Remove field html
					x--; //Decrement field counter		
				});
			});
		</script>
		<script type="text/javascript">
$(document).ready(function(){
	$("#cat_id").change(function() {
		var selcat = $(this).val();
		//alert (selcat);
		console.log(selcat);
		$.ajax({
			type: "POST",
			data: "cat_id="+selcat,
			url: "<?php echo base_url().'Product/GetSubCatAjax'; ?>" ,
			dataType: "html",
			success: function(data)
			{
				$('#sub_cat_id').html(data);
			}
		});
	});
});
		</script>
		<script>
			$( document ).ready(function() {
				$("#startTags").val();
				$("#submit_product").click(function(){		
					var reason = $("#product").validationEngine('validate'); 
					if (!reason){
						return false;
					}
					else{
						var radioValue = $("input[name='bid']:checked").val();							
						if(radioValue==2)
						{							
							var bid_statDate	=	$('#signupDOBTxt').val();
							var bid_endDate		=	$('#signupDOBTxt2').val();
							var bid_startTime	=	$('#bid_startTime').val();
							var bid_endTime		=	$('#bid_endTime').val();								
							if(bid_statDate>bid_endDate)
							{
								alert("Bid Start date Is not Greater Than End date");
							}
							if(bid_statDate==bid_endDate)
							{
								if(bid_startTime>bid_endTime)
								{
									alert("Bid Start Time Is Not Greater Than Bid End Time");
								}
								if(bid_startTime==bid_endTime)
								{
									alert("Bid Start Time Never Equal To Bid End Time");
								}
							}
							else
							{								
								$("form[name='product']").submit();
							}
						}
						else{
							$("form[name='product']").submit();
						}					
					}
				});
				$("#ad-btn").click(function(){		
					var reason = $("#ad").validationEngine('validate'); 
					if (!reason){
						return false;
					}
					else{
					alert("hello");
						$("form[name='ad']").submit();
					}
				});
			});
		</script>
		
		<head>
			<body>
				<?php include VIEWPATH.'common/NavBar_HTML.php'; ?>
				<section class="blank-section">
					<div class="container">
						<div class="row">
						</div>
					</div>
				</section>
				<?php include VIEWPATH.'common/SubMenu_HTML.php'; ?>
				<section class="post-section">
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-1"></div>
							<div class="col-sm-10">
								
									<!-- Product Type -->
									<div class="col-sm-12">
										<h4 class="post-section-heading">
											Post Type
										</h4>
									</div> 								
									<div class="col-sm-12 post-form-container">
										<div class="col-sm-12 padding-bottom20">
											<div class="col-sm-1">
												<label class="post-form-label">
													Type
												</label>
											</div>
											<div class="col-sm-11">
												<input type="radio" class="post-Add validate[required]" value="1" name="post_type" checked  />&nbsp;&nbsp;&nbsp;Advertisement &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;												
												<input type="radio" class="post-Sell validate[required]" value="2" name="post_type"  />&nbsp;&nbsp;&nbsp; Product &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											</div>
										</div>									
									</div>
									<div class="col-sm-12 padding-top20"></div>
									
									
									<div class="my-element" style="display:none;">
									<form name="product" id="product" action="<?php echo base_url();?>/Submit-Product"  method="POST" enctype="multipart/form-data">
										<!--Product Info-->
										<div class="col-sm-12">
											<h4 class="post-section-heading">
												Product Info
											</h4>
										</div> 								
										<div class="col-sm-12 post-form-container">
											<div class="col-sm-12 padding-bottom20">
												<div class="col-sm-1">
													<label class="post-form-label">
														Name
													</label>
												</div>
												<div class="col-sm-11">
													<input type="text" class="post-form-input validate[required,custom[onlyLetterSp]]" name="product_name" placeholder="Name" />
												</div>
											</div>
											<div class="col-sm-12 padding-bottom20">
												<div class="col-sm-1">
													<label class="post-form-label">
														Category
													</label>
												</div>
												<div class="col-sm-11">
													<select class="post-form-select validate[required]" id="cat_id" name="cat_id">
														<option value="">Select and Enter Category</option>
														<?php foreach($catdata as $val){ ?>
															<option value="<?php echo $val->cat_id;?>"><?php echo $val->cat_name; ?></option>';
														<?php }?>
													</select>
												</div>
											</div>
											<div class="col-sm-12 padding-bottom20">
												<div class="col-sm-1">
													<label class="post-form-label">
														Sub Category
													</label>
												</div>
												<div class="col-sm-11">
													<select class="post-form-select validate[required]" id="sub_cat_id" name="sub_cat_id">
														<option value="">Select Sub Category</option>
													</select>
												</div>
											</div>
											<div class="col-sm-12 padding-bottom20">
												<div class="col-sm-1">
													<label class="post-form-label">
														Description
													</label>
												</div>
												<div class="col-sm-11">
													<textarea class="post-form-textarea validate[required]" placeholder="Enter description" name="product_description" rows="5"></textarea>
												</div>
											</div>
											<div class="col-sm-12">
												<div class="col-sm-1">
													<label class="post-form-label">
														Quantity
													</label>
												</div>
												<div class="col-sm-5">
													<input type="number" name="quantity" class="post-form-input validate[required,custom[integer]]" placeholder="Quantity" />
												</div>
												<div class="col-sm-1">
													<label class="post-form-label">
														In Stock
													</label>
												</div>
												<div class="col-sm-5">
													<input type="number" class="post-form-input validate[required,custom[integer]]" name="stock" placeholder="Number of items in stock" />
												</div>
											</div>
										</div>
										<div class="col-sm-12 padding-top20"></div>
										
										<!--Pricing-->
										<div class="col-sm-12">
											<h4 class="post-section-heading">
												Pricing
											</h4>
										</div>									
										<div class="col-sm-12 post-form-container">
											<div class="col-sm-12">
												<div class="col-sm-12">
													<label class="post-form-note-label">
														Note : You can only select one way of pricing either Fix price or biding
													</label>
												</div>
											</div>
											<div class="col-sm-12 padding-bottom20">
												<div class="col-sm-1">
													<label class="post-form-label">
														Pricing Type
													</label>
												</div>
												<div class="col-sm-5">											
													<div class="radio-inline">
														<input id="checkbox2" type="radio" name="bid" value="1" class="post-form-checkbox Normal-Enable" checked>Fix price													
													</div>
													<div class="radio-inline">
														<input id="checkbox3" type="radio" name="bid" value="2" class="post-form-checkbox Bid-Enable"> Enable Biding													
													</div>
												</div>
												
											</div>											
												<div class="col-sm-12 padding-bottom20">
													<div class="col-sm-1">
														<label class="post-form-label">
															Product Pricing
														</label> 
													</div>
													<div class="col-sm-5">
														<input type="number" class="post-form-input validate[required]" id="price" name="price" placeholder="Maximum Retail Price" />
													</div>
													<div class="col-sm-1">
														<label class="post-form-label">
															Product Discount
														</label>
													</div>
													<div class="col-sm-5">
														<input type="number" class="post-form-input " id="discount" name="discount" placeholder="Discount %" />
													</div>											
												</div>
												<div class="col-sm-12 padding-bottom20">
													<div class="col-sm-1">
														<label class="post-form-label">
															Discount Price
														</label>
													</div>
													<div class="col-sm-5">
														<input type="number" class="post-form-input  " id="final_price" name="discount_price" readonly placeholder="Price after Discount" />
													</div>
												</div>	
																					
										</div>
										<div class="col-sm-12 padding-top20"></div>
										<div class="biding">
<div class="col-sm-12">
											<h4 class="post-section-heading">
												Bidding
											</h4>
										</div>
										<div class="col-sm-12 post-form-container">
												<div class="col-sm-12 padding-bottom20">
													<div class="col-sm-1">
														<label class="post-form-label">
															Biding Min Price
														</label>
													</div>
													<div class="col-sm-5">
														<input type="number" class="post-form-input" name="bid_limit" placeholder="Enter minimum biding amount" />
													</div>												  
												</div>
												<div class="col-sm-12 padding-bottom20">
													<div class="col-sm-1">
														<label class="post-form-label">
															Biding Start Date
														</label>
													</div>
													<div class="col-sm-5">
														<input type="text" class="post-form-input validate[required,custom[date]]" data-provide="datepicker" value="<?php echo date('Y-m-d');?>"id="signupDOBTxt" name="bid_startDate" />
													</div>
													<div class="col-sm-1">
														<label class="post-form-label">
															Biding End Date
														</label>
													</div>
													<div class="col-sm-5">
														<input type="text" class="post-form-input validate[required,custom[date]]" data-provide="datepicker" value="<?php echo date('Y-m-d',strtotime("+7 day"));?>" id="signupDOBTxt2" name="bid_endDate" />
													</div>
												</div>
												<div class="col-sm-12 padding-bottom20">
													<div class="col-sm-1">
														<label class="post-form-label">
															Biding Start Time
														</label>
													</div>
													<div class="col-sm-5">
														<input type="text" class="post-form-input clockpicker validate[required] " id="bid_startTime" value="<?php echo date("H:i");?>" name="bid_startTime"  />
													</div>
													<div class="col-sm-1">
														<label class="post-form-label">
															Biding End Time
														</label>
													</div>
													<div class="col-sm-5">
														<input type="text" class="post-form-input clockpicker2 validate[required] " id="bid_endTime" value="<?php echo date("H:i");?>" name="bid_endTime"/>
													</div>
												</div>
												</div>
										<div class="col-sm-12 padding-top20"></div>
											</div>
										<!--Shipping-->
										<div class="col-sm-12">
											<h4 class="post-section-heading">
												Shipping Info
											</h4>
										</div>
										<div class="col-sm-12 post-form-container">
											<div class="col-sm-12 padding-bottom20">
												<div class="col-sm-1">
													<label class="post-form-label">
														Weight
													</label>
												</div>
												<div class="col-sm-5">
													<select class="post-form-select validate[required]" name="weight">
														<option value="">Select weight in KG</option>
														<?php for($i=1;$i<=20;$i++){ ?>
															<option value="<?php echo $i;?>"><?php echo $i;?> KG</option>
														<?php } ?>
													</select>
												</div>
												<div class="col-sm-1">
													<label class="post-form-label">
														Shipping Fee
													</label>
												</div>
												<div class="col-sm-5">
													<input type="number" class="post-form-input validate[required]" name="shipping_fee" placeholder="Enter Price" />
												</div>
											</div>
											
											<div class="col-sm-12">
												<div class="col-sm-1">
													<label class="post-form-label">
														Ships in
													</label>
												</div>
												<div class="col-sm-5">
													<select class="post-form-select validate[required]" name="ships_in">
														<option value="">Select Duration</option>
														<?php for($i=1;$i<=20;$i++){ ?>
															<option value="<?php echo $i;?>"><?php echo $i;?></option>
														<?php } ?>
													</select>
												</div>
												<div class="col-sm-1">
													<label class="post-form-label">
														Ships over
													</label>
												</div>
												<div class="col-sm-2">
													<select class="post-form-select validate[required]" name="ships_over">
														<option value="">Select Option</option>
														<option value="1">Local</option>
														<option value="2">Global</option>
														<option value="3">Global or Local</option>
													</select>
												</div>
												<div class="col-sm-1">
													<label class="post-form-label">
														Paid by
													</label>
												</div>
												<div class="col-sm-2">
													<div class="radio radio-info radio-inline">
														<input type="radio" id="shippingPaymentMe" value="1" name="shippingPayment" class="post-form-radio validate[required]">
														<label for="shippingPaymentMe" class="post-form-label"> Me </label>
													</div>
													<div class="radio radio-info radio-inline">
														<input type="radio" id="shippingPaymentBuyer" value="2" name="shippingPayment" class="post-form-radio validate[required]">
														<label for="shippingPaymentBuyer" class="post-form-label"> Buyer </label>
													</div>
												</div>
											</div>
											
										</div>
										<div class="col-sm-12 padding-top20"></div>
										
										<!--Others-->
										<div class="col-sm-12">
											<h4 class="post-section-heading">
												Others
											</h4>
										</div>
										<div class="col-sm-12 post-form-container">
											<div class="col-sm-12 padding-bottom20">
												<div class="col-sm-1">
													<label class="post-form-label">
														Tags
													</label>
												</div>
												<div class="col-sm-11">
													<input type="text" id="startTags" class="post-form-input validate[required]" data-role="tagsinput" name="tags" placeholder="Enter Startags Clothes, Winter etc" />
													<!--To get the value of these tag input use $("#startTags").val(); -->
												</div>
											</div>
											<div class="col-sm-12 padding-bottom20">
												<div class="col-sm-1">
													<label class="post-form-label">
														Color(s)
													</label>
												</div>
												<div class="col-sm-5">
													<div class="input-group">
														<input type="text" id="colors" class="post-form-input" name="product_color" onfocus="$('#colorPicker').click();" placeholder="Select color from pallate. Use coma for more colors" />
														<div class="input-group-addon">
															<a href="javascript:void(0);" class="blank-url" onclick="$('#colorPicker').click();">
																<img src="<?php echo base_url();?>assets/images/color-picker.png" />
															</a>
														</div>
													</div>
													<input id="colorPicker" type="color" class="post-form-input-color" onchange="colorPickerChange()" />
												</div>
												<div class="col-sm-1">
													<label class="post-form-label">
														Size
													</label>
												</div>
												<div class="col-sm-5">
													<select class="post-form-select" name="size">
														<option value="">Select size (if any)</option>
														<option value="1">Small</option>
														<option value="2">Medium</option>
														<option value="3">Large</option>
														<option value="4">XXL</option>
														<option value="5">XXXl</option>
													</select>
												</div>
											</div>
										<?php 	/* <div class="col-sm-12 padding-bottom20">
												<div class="col-sm-1">
													<label class="post-form-label">
														Type
													</label>
												</div>
												<div class="col-sm-11">
													<select class="post-form-select validate[required]" name="product_type_id">
														<option value="">Select Product Type</option>
														<option value="1">New</option>
														<option value="2">Used</option>
														<option value="3">Refurbished</option>
													</select>
												</div>
											</div> */ ?>
										</div>
										<div class="col-sm-12 padding-top20"></div>
										<!-- Featrues-->
										<div class="col-sm-12">
											<h4 class="post-section-heading">
												Product Features
											</h4>
										</div>
										<div class="col-sm-12 post-form-container">
											<div class="col-sm-12 padding-bottom20 feat">
												<div class="col-sm-11">
													<input type="text" class="post-form-input validate[required]" name="product_features[]" placeholder="Product Features" />
													<a href="javascript:void(0);" class="add_button" title="Add field"><img src="<?php echo base_url();?>assets/add-icon.png" style="height: 30px; width: 30px"/></a>
												</div>
											</div>
										</div>
										<div class="col-sm-12 padding-top20"></div>
										<!--Others-->
										<div class="col-sm-12">
											<h4 class="post-section-heading">
												Add Image
											</h4>
										</div>
										<div class="col-sm-12 post-form-container">
											<div class="col-sm-12">
												<div class="col-sm-3 padding-bottom5">
													<img src="<?php echo base_url();?>assets/images/upload-image.png" id="postImagePreview1" class="post-form-img-preview" onclick="$('#postImage1').click();" />
													<input type="file" name="image1" class="post-form-file-upload postImgUpload validate[required]" data-value="1" id="postImage1" accept="image/x-png,image/gif,image/jpeg,image/jpg" />
												</div>
												<div class="col-sm-3 padding-bottom5">
													<img src="<?php echo base_url();?>assets/images/upload-image.png" id="postImagePreview2" class="post-form-img-preview" onclick="$('#postImage2').click();" />
													<input type="file" name="image2" class="post-form-file-upload postImgUpload" data-value="2" id="postImage2" accept="image/x-png,image/gif,image/jpeg,image/jpg" />
												</div>
												<div class="col-sm-3 padding-bottom5">
													<img src="<?php echo base_url();?>assets/images/upload-image.png" id="postImagePreview3" class="post-form-img-preview" onclick="$('#postImage3').click();" />
													<input type="file" name="image3" class="post-form-file-upload postImgUpload" data-value="3" id="postImage3" accept="image/x-png,image/gif,image/jpeg,image/jpg" />
												</div>
												<div class="col-sm-3 padding-bottom5">
													<img src="<?php echo base_url();?>assets/images/upload-image.png" id="postImagePreview4" class="post-form-img-preview" onclick="$('#postImage4').click();" />
													<input type="file" name="image4" class="post-form-file-upload postImgUpload" data-value="4" id="postImage4" accept="image/x-png,image/gif,image/jpeg,image/jpg" />
												</div>
											</div>
										</div>
										<div class="col-sm-12 padding-top20"></div>
										
										<!--Button-->
										<div class="col-sm-12">
											<div class="col-sm-4"></div>
											<div class="col-sm-4"></div>
											<div class="col-sm-4">
												<input type="submit" id="submit_product" name='submit' value="Add Product" class="hm-item-btn-lg">
											</div>
										</div>
										</form>
									</div>
									
								
								
								
								<div class="my-element-add">
									<form name="ad" id="ad" action="<?php echo base_url();?>Product/Add_Ad" method="POST" enctype="multipart/form-data">
										<!--Product Info-->
										<div class="col-sm-12">
											<h4 class="post-section-heading">
												Advertisement Info
											</h4>
										</div> 								
										<div class="col-sm-12 post-form-container">
											<div class="col-sm-12 padding-bottom20">
												<div class="col-sm-1">
													<label class="post-form-label">
														Name
													</label>
												</div>
												<div class="col-sm-11">
													<input type="text" class="post-form-input validate[required,custom[onlyLetterSp]]" name="product_name" placeholder="Name" />
												</div>
											</div>
											<div class="col-sm-12 padding-bottom20">
												<div class="col-sm-1">
													<label class="post-form-label">
														Category
													</label>
												</div>
												<div class="col-sm-11">
													<select class="post-form-select validate[required]" name="cat_id">
														<option value="">Select and Enter Category</option>
														<?php foreach($catdata as $val){ ?>
															<option value="<?php echo $val->cat_id;?>"><?php echo $val->cat_name; ?></option>';
														<?php }?>
													</select>
												</div>
											</div>
											<div class="col-sm-12 padding-bottom20">
												<div class="col-sm-1">
													<label class="post-form-label">
														Description
													</label>
												</div>
												<div class="col-sm-11">
													<textarea class="post-form-textarea validate[required]" placeholder="Enter description" name="product_description" rows="5"></textarea>
												</div>
												<div class="col-sm-1">
													<label class="post-form-label">
														Web URL
													</label>
												</div>
												<div class="col-sm-11">
													<input type="text" class="post-form-input validate[required]" placeholder="Enter Web URL" name="web_url">
												</div>
											</div>
										</div>
										<div class="col-sm-12 padding-top20"></div>
										<div class="col-sm-12">
											<h4 class="post-section-heading">
												Add Image
											</h4>
										</div>
										<div class="col-sm-12 post-form-container">
											<div class="col-sm-12">
												<div class="col-sm-3 padding-bottom5">
													<img src="<?php echo base_url();?>assets/images/upload-image.png" id="postImagePreview5" class="post-form-img-preview" onclick="$('#postImage5').click();" />
													<input type="file" name="adimage1" class="post-form-file-upload postImgUpload validate[required]" data-value="5" id="postImage5" accept="image/x-png,image/gif,image/jpeg,image/jpg" />
												</div>
												<div class="col-sm-3 padding-bottom5">
													<img src="<?php echo base_url();?>assets/images/upload-image.png" id="postImagePreview6" class="post-form-img-preview" onclick="$('#postImage6').click();" />
													<input type="file" name="adimage2" class="post-form-file-upload postImgUpload" data-value="6" id="postImage6" accept="image/x-png,image/gif,image/jpeg,image/jpg" />
												</div>
												<div class="col-sm-3 padding-bottom5">
													<img src="<?php echo base_url();?>assets/images/upload-image.png" id="postImagePreview7" class="post-form-img-preview" onclick="$('#postImage7').click();" />
													<input type="file" name="adimage3" class="post-form-file-upload postImgUpload" data-value="7" id="postImage7" accept="image/x-png,image/gif,image/jpeg,image/jpg" />
												</div>
												<div class="col-sm-3 padding-bottom5">
													<img src="<?php echo base_url();?>assets/images/upload-image.png" id="postImagePreview8" class="post-form-img-preview" onclick="$('#postImage8').click();" />
													<input type="file" name="adimage4" class="post-form-file-upload postImgUpload" data-value="8" id="postImage8" accept="image/x-png,image/gif,image/jpeg,image/jpg" />
												</div>
											</div>
										</div> 
										<div class="col-sm-12 padding-top20"></div>
										
										<!--Button-->
										<div class="col-sm-12">
											<div class="col-sm-4"></div>
											<div class="col-sm-4"></div>
											<div class="col-sm-4">
												<input type="submit" id="ad-btn" name='submit' value="Add Advertisement" class="hm-item-btn-lg">
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</section>
				<?php include VIEWPATH.'common/Footer_HTML.php'; ?>
				<script>
					$( document ).ready(function() {						
						$(".biding").hide();
						$('.my-element').hide();
						$('.my-element-add').show();
						$(".Bid-Enable").click(function() {
							if($(this).is(":checked")) {
								$(".biding").show();
								// $(".Normal").show();
								} else {
								$(".biding").hide();
								// $(".Normal").show();
							}
						});
						$(".Normal-Enable").click(function() {
							if($(this).is(":checked")) {
								$(".biding").hide();
								$(".Normal").show();
								} else {
								$(".biding").show();
								$(".Normal").show();
							}
						}); 
						$(".post-Add").click(function() {
							if($(this).is(":checked")) {
								$(".my-element").hide();
								$(".my-element-add").show();
								} else {
								$(".my-element").show();
								$(".my-element-add").hide();
							}
						});
						$(".post-Sell").click(function() {
							if($(this).is(":checked")) {
								$(".my-element").show();
								$(".my-element-add").hide();
								} else {
								$(".my-element").hide();
								$(".my-element-add").show();
							}
						});	
						$("#discount").change(function() {
							var tprice = $('#price').val();					
							var percent = $('#discount').val();
							var discountpercent=percent / 100;
							var discountprice=tprice -(tprice * discountpercent );
							$('#final_price').val(discountprice);					
						});
						$("#signupDOBTxt2").datepicker({
							format: "yyyy-mm-dd",
							autoclose: !0,					
							startDate: new Date(),
							setDate: '+7d'
						});
						$("#signupDOBTxt").datepicker({
							format: "yyyy-mm-dd",
							autoclose: !0,					
							startDate: new Date(),
							setDate: new Date()
						}); 
						$(".clockpicker").clockpicker({
							placement: "top",
							align: "left",
							autoclose: !0,
							'default': 'now'
						});
						$(".clockpicker2").clockpicker({
							placement: "top",
							align: "left",
							autoclose: !0,
							'default': 'now'
						});
					});			
					
				</script>
			</body>
		</html> 				