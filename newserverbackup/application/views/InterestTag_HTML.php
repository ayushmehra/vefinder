<!DOCTYPE html>
<html>
<head>
   <?php include VIEWPATH.'common/HeaderScript_HTML.php'; ?>
   <script src="<?php echo base_url();?>assets/js/registration.js"></script>
</head>
<body>
    <section class="signup-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10 padding-top20">
                        <div class="col-sm-12 vf-starttag-logo-heading" align="center">
                            <span>
                                <img src="<?php echo base_url();?>assets/images/vifinder-black-logo.png" />
                            </span>&nbsp;
                            Vifinder
                        </div>
                    </div>
                    <div class="col-sm-1"></div>
                </div>
                <div class="col-sm-3"></div>
                <div class="col-sm-12 padding-top10 padding-bottom10">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <p class="vf-signup-section-heading" align="center">
                            Please Select Intrest Tags and Intrest will find you
                        </p>
                        <div class="col-sm-12 padding-bottom20">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10 vf-signup-search-container">
                                <span class="vf-signup-search-icon">
                                    <img src="<?php echo base_url();?>assets/images/search-icon.png" />
                                </span>
                                <input type="text" class="vf-signup-search-box" id="box" placeholder="Search your interest" />
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                        <p class="vf-signup-section-subheading padding-top50" id="selectedcount" align="center">
                            Select Atleast 5 Startags
                        </p>
                    </div>
                    <div class="col-sm-2"></div>
                </div>
                <div class="col-sm-12 padding-top20 padding-bottom20">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10 vf-startag-container padding-top10 padding-bottom10" id="startags">
						<div class="col-sm-12 padding-bottom10">
                        <?php foreach($Intrest_Tags as $value){?>						 
                            <div class="col-sm-3 padding-bottom10 connect-cat">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-10 vf-interest-tag" data-value="0" data-id="<?php echo $value->interests_id; ?>">
                                    <?php echo $value->interests_name;?>
                                    <img src="<?php echo base_url();?>assets/images/seleted-icon.png" class="vf-select-icon ui-display-none" />
                                </div>
                                <div class="col-sm-1"></div>
                            </div>                                                 
						<?php } ?>
						</div>
                    </div>
                    <div class="col-sm-1"></div>
                </div>
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <div class="col-sm-12 padding-top10">
                            <div class="col-sm-11">
                                <button type="button" id="done" class="vf-signup-form-btn">Done</button>
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                        <div class="col-sm-12 padding-top10">
                            <div class="col-sm-11" align="center">
                                <a href="javascript:void(0);" id="skip" class="vf-signup-form-link">Skip</a>
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                    </div>
		<?php /*			<div class="col-sm-12 padding-top10" align="center" id="loder" style="display: none;" >
							<img src="<?php echo base_url(); ?>assets/images/preview.gif" style="height: 32px;">
						</div>
						<div class="col-sm-12 padding-top10 text-center" id="success_reg" style="display: none;color:green;font-weight: bold" >																
						</div>
						<div class="col-sm-12 padding-top10 text-center" id="fail" style="display: none;color:Red;font-weight: bold" >									
						</div> */ ?>
                    <div class="col-sm-1"></div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
    </section>
</body>
<script>	
	$("#box").on('keyup', function(){
  var matcher = new RegExp($(this).val(), 'gi');
  $('.connect-cat').show().not(function(){
      return matcher.test($(this).find('.vf-interest-tag').text())
  }).hide();
});
	</script>
</html>
