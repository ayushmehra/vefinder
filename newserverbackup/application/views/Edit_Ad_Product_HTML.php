<!DOCTYPE html>
<html>
	<head>
		<?php include VIEWPATH.'common/HeaderScript_HTML.php'; ?>
		<link href="<?php echo base_url();?>assets/css/vefinder.checkbox.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery-clockpicker.css">
		<link href="<?php echo base_url();?>assets/css/bootstrap-datepicker.css" rel="stylesheet" />
		<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>	
		<script type="text/javascript" src="<?php  echo base_url(); ?>assets/js/bootstrap-clockpicker.min.js"></script>
		<script>
			$( document ).ready(function() {
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
								<div class="col-sm-12 padding-top20"></div>
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
															<option value="<?php echo $val->cat_id;?>" <?php if($product->cat_id==$val->cat_id){ echo 'selected'; } ?> ><?php echo $val->cat_name; ?></option>';
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
												<input type="submit" id="ad-btn" name='submit' value="Edit Advertisement" class="hm-item-btn-lg">
											</div>
										</div>
									</form>
							</div>
						</div>
					</div>
				</section>
				<?php include VIEWPATH.'common/Footer_HTML.php'; ?>
			</body>
		</html>