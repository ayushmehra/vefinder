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
								<form name="product" id="product" method="POST" enctype="multipart/form-data">
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
												<input type="text" class="post-form-input validate[required,custom[onlyLetterSp]]" name="product_name" value="<?php echo $product->product_name; ?>" placeholder="Name" />
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
														<option value="<?php echo $val->cat_id;?>" <?php if($product->cat_id==$val->cat_id){ echo 'selected'; } ?>><?php echo $val->cat_name; ?></option>';
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
												<textarea class="post-form-textarea validate[required]" placeholder="Enter description" name="product_description" rows="5"><?php echo $product->product_description; ?></textarea>
											</div>
										</div>
										<div class="col-sm-12">
											<div class="col-sm-1">
												<label class="post-form-label">
													Quantity
												</label>
											</div>
											<div class="col-sm-5">
												<input type="number" name="quantity" class="post-form-input validate[required,custom[integer]]" value="<?php echo $product->product_quantity;?>" placeholder="Quantity" />
											</div>
											<div class="col-sm-1">
												<label class="post-form-label">
													In Stock
												</label>
											</div>
											<div class="col-sm-5">
												<input type="number" class="post-form-input validate[required,custom[integer]]" name="stock" value="<?php echo $product->product_stock;?>" placeholder="Number of items in stock" />
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
												<div class="radio-inline"></div>
											</div>
										</div>
										<div class="col-sm-12 padding-bottom20">
											<div class="col-sm-1">
												<label class="post-form-label">
													Product Pricing
												</label> 
											</div>
											<div class="col-sm-5">
												<input type="number" class="post-form-input validate[required]" id="price" name="price" value="<?php echo $product->product_price; ?>" placeholder="Maximum Retail Price" />
											</div>
											<div class="col-sm-1">
												<label class="post-form-label">
													Product Discount
												</label>
											</div>
											<div class="col-sm-5">
												<input type="number" class="post-form-input " id="discount" name="discount" value="<?php echo $product->product_discount; ?>" placeholder="Discount %" />
											</div>
										</div>
										<div class="col-sm-12 padding-bottom20">
											<div class="col-sm-1">
												<label class="post-form-label">
													Discount Price
												</label>
											</div>
											<div class="col-sm-5">
												<input type="number" class="post-form-input  " id="final_price" name="discount_price" value="<?php echo $product->product_discount_pricing; ?>" readonly placeholder="Price after Discount" />
											</div>
										</div>	
									</div>
									<div class="col-sm-12 padding-top20"></div>
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
														<option value="<?php echo $i;?>" <?php if($i==$product->product_weight){ echo " selected"; } ?> ><?php echo $i;?> KG</option>
													<?php } ?>
												</select>
											</div>
											<div class="col-sm-1">
												<label class="post-form-label">
													Shipping Fee
												</label>
											</div>
											<div class="col-sm-5">
												<input type="number" class="post-form-input validate[required]" name="shipping_fee" value="<?php echo $product->shipping_fee; ?>" placeholder="Enter Price" />
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
														<option value="<?php echo $i;?>" <?php if($i==$product->ships_in){ echo " selected"; } ?> ><?php echo $i;?></option>
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
													<option value="1" <?php if($product->ship_over==1){ echo " selected"; } ?> >Local</option>
													<option value="2" <?php if($product->ship_over==2){ echo " selected"; } ?> >Global</option>
													<option value="3" <?php if($product->ship_over==3){ echo " selected"; } ?> >Global or Local</option>
												</select>
											</div>
											<div class="col-sm-1">
												<label class="post-form-label">
													Paid by
												</label>
											</div>
											<div class="col-sm-2">
												<div class="radio radio-info radio-inline">
													<input type="radio" id="shippingPaymentMe" value="1" name="shippingPayment" <?php if($product->ship_paid_by==1){ echo " checked"; } ?> class="post-form-radio validate[required]">
													<label for="shippingPaymentMe" class="post-form-label"> Me </label>
												</div>
												<div class="radio radio-info radio-inline">
													<input type="radio" id="shippingPaymentBuyer" value="2" name="shippingPayment" <?php if($product->ship_paid_by==2){ echo " checked"; } ?> class="post-form-radio validate[required]">
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
											<?php $tag=[];$tags= explode(',',$product->product_star_tag_id);for($j=0;$j<count($tags);$j++){ $tag[$j]= _GetTagById($tags[$j]); } ?>
											<div class="col-sm-11">
												<input type="text" id="startTags" class="post-form-input validate[required]" data-role="tagsinput" name="tags" value="<?php echo implode(',',$tag); ?>" placeholder="Enter Startags Clothes, Winter etc" />
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
													<input type="text" id="colors" class="post-form-input" name="product_color" value="<?php echo $product->product_colour; ?>" onfocus="$('#colorPicker').click();" placeholder="Select color from pallate. Use coma for more colors" />
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
											
											<?php  $i=0;
											foreach($product->features as $features) { if($i==0){?> 
													<div class="col-sm-11">
												<input type="text" class="post-form-input validate[required]" name="product_features[]" value="<?php echo $features->product_features; ?>" placeholder="Product Features" />
												<a href="javascript:void(0);" class="add_button" title="Add field">
													<img src="<?php echo base_url();?>assets/add-icon.png" style="height: 30px; width: 30px"/>
												</a>
											</div>
											<?php }else { ?>
													<div class="col-sm-11">
													<input type="text" class="post-form-input validate[required]" name="product_features[]" value="<?php echo $features->product_features; ?>" placeholder="Product Features"/>
													<a href="javascript:void(0);" class="remove_button" title="Remove field">
													<img src="<?php echo base_url().'assets/remove-icon.png'; ?>" style="height: 30px; width: 30px"/>
													</a>
													</div>
											<?php } $i++; } ?>
										</div>
									</div>
									<div class="col-sm-12 padding-top20"></div>
									<!--Others-->
									<div class="col-sm-12">
										<h4 class="post-section-heading">
											Product Image
										</h4>
									</div>
									<div class="col-sm-12 post-form-container">
										<div class="col-sm-12">
											<?php foreach(@$product->images as $image){ ?>
											<div class="col-sm-3 padding-bottom5">
												<img src="<?php echo base_url();?>assets/images/product/<?php echo $image->image_name;?>"  class="post-form-img-preview"  />
											</div>
											<?php } ?>
										</div>
									</div>
									<div class="col-sm-12">
										<h4 class="post-section-heading">
											Change Image
										</h4>
									</div>
									<div class="col-sm-12 post-form-container">
										<div class="col-sm-12">
										<?php $i=1;
										foreach(@$product->images as $image){ ?>
											<div class="col-sm-3 padding-bottom5">
												<img src="<?php echo base_url();?>assets/images/upload-image.png" id="postImagePreview1" class="post-form-img-preview" onclick="$('#postImage<?php echo $i;?>').click();" />
												<input type="file" name="image<?php echo $i;?>" class="post-form-file-upload postImgUpload" data-value="<?php echo $i;?>" id="postImage<?php echo $i;?>" accept="image/x-png,image/gif,image/jpeg,image/jpg" />
											</div>
											<?php $i++ ; } ?>
										</div>
									</div>
									<div class="col-sm-12 padding-top20"></div>
									<!--Button-->
									<div class="col-sm-12">
										<div class="col-sm-4"></div>
										<div class="col-sm-4"></div>
										<div class="col-sm-4">
											<input type="submit" id="submit_product" name='submit' value="Edit Product" class="hm-item-btn-lg">
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</section>
				<?php include VIEWPATH.'common/Footer_HTML.php'; ?>
				<script>
					$( document ).ready(function() {
						$("#discount").change(function() {
							var tprice = $('#price').val();
							var percent = $('#discount').val();
							var discountpercent=percent / 100;
							var discountprice=tprice -(tprice * discountpercent );
							$('#final_price').val(discountprice);
						});
					});			
				</script>
			</body>
		</html>