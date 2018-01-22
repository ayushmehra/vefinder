<!DOCTYPE html>
<html>
<head>
<?php include VIEWPATH.'common/HeaderScript_HTML.php'; ?>
</head>
<body>
<?php include VIEWPATH.'common/NavBar_HTML.php'; ?>
<section class="blank-section">
        <div class="container">
            <div class="row">
            </div>
        </div>
    </section>
	<?php include VIEWPATH.'common/SubMenu_HTML.php'; ?>	
	<section class="order-section"> 
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-1"></div>
				<form method="POST" name="address" id="address">
                <div class="col-sm-10 padding-top50 padding-bottom30">
                    <div class="col-sm-12 padding-bottom20">
                        <h4 class="order-section-heading align-left">
                            Enter Shipping address 
                        </h4> 
                    </div>
                    <div class="col-sm-12 padding-bottom20">
                        <div class="col-sm-3 padding-top10">
                            <label class="order-form-label">
                                Full name:
                            </label>    
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="order-form-input validate[required,custom[onlyLetterSp]]" name="full_name" placeholder="Enter Full Name">
                        </div>
                    </div>
                    <div class="col-sm-12 padding-bottom20">
                        <div class="col-sm-3 padding-top10">
                            <label class="order-form-label">
                                Mobile number:
                            </label>    
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="order-form-input validate[required,custom[phone]]" maxlength="10" name="mobile" placeholder="Enter Mobile Number">
                        </div>
                    </div>
                    <div class="col-sm-12 padding-bottom20">
                        <div class="col-sm-3 padding-top10">
                            <label class="order-form-label">
                                Flat / House No. / Floor:
                            </label>    
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="order-form-input validate[required]" name="address" placeholder="Enter Address">
                        </div>
                    </div>
                    <div class="col-sm-12 padding-bottom20">
                        <div class="col-sm-3 padding-top10">
                            <label class="order-form-label">
                                Colony / Street / Locality: 
                            </label>    
                        </div>
                        <div class="col-sm-9">
                            <input type="text" name="address1" class="order-form-input validate[required]" placeholder="Enter Address">
                        </div>
                    </div>
                    <div class="col-sm-12 padding-bottom20">
                        <div class="col-sm-3 padding-top10">
                            <label class="order-form-label">
                                Landmark:  
                            </label>    
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="order-form-input validate[required]" name="landmark" placeholder="Enter Landmark (if any)">
                        </div>
                        <div class="col-sm-1 padding-top10">
                            <label class="order-form-label">
                                Town/City: 
                            </label>    
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="order-form-input validate[required]" name="city" placeholder="Enter Town/City: ">
                        </div>						
                    </div>
                    <div class="col-sm-12 padding-bottom20">
                        <div class="col-sm-3 padding-top10">
                            <label class="order-form-label">
                                State:  
                            </label>    
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="order-form-input validate[required]" name="state" placeholder="Enter State">
                        </div>
                        <div class="col-sm-1 padding-top10">
                            <label class="order-form-label">
                                Country:
                            </label>    
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="order-form-input validate[required]" name="country" placeholder="Country">
                        </div>						
                    </div>
					<div class="col-sm-12 padding-bottom20">
                        <div class="col-sm-3 padding-top10">
                            <label class="order-form-label">
                                Zip Code:
                            </label>    
                        </div>
						<div class="col-sm-4">
                            <input type="text" class="order-form-input validate[required]" name="zip_code" placeholder="Zip Code">
                        </div>
						<div class="col-sm-1 padding-top10">
                            <label class="order-form-label">
                                Address Type: 
                            </label>    
                        </div>
                        <div class="col-sm-4">
                            <select class="order-form-input validate[required]" name="type">
								<option value="">Select and Enter Category</option>
								<option value="1">Home</option>
								<option value="2">Office</option>
							</select>
                        </div>
					</div>
                    <div class="col-sm-12 padding-top40">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-3"></div>
                        <div class="col-sm-3"></div>
                        <div class="col-sm-3">
                            <button type="submit" name="submit" id="submit_address" class="hm-order-link-lg" value="save">
                                Deliver to this address
                            </button>
                        </div>
                    </div>
                </div>
				</form>
                <div class="col-sm-1"></div>
            </div>
        </div>
    </section>
	<?php include VIEWPATH.'common/Footer_HTML.php'; ?>
	<script>
		jQuery(document).ready(function(){jQuery("#address").validationEngine({showOneMessage: true, scroll: false});});
		$( document ).ready(function() {
				$("#submit_address").click(function(){		
					var reason = $("#address").validationEngine('validate'); 
					if (!reason){
						return false;
					}
					else{
						$("form[name='address']").submit();
					}
				});
		});
	</script>
</body>
</html> 