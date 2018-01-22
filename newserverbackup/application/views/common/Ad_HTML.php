<?php if(count($ad_post)>2){ ?>
<section class="vf-ads-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
					<?php if (is_array($ad_post)&&(!empty($ad_post))){ foreach($ad_post as $ad) { ?>
					<div class="col-sm-4" align="center">
						<a href="<?php echo $ad->web_url; ?>" target="_blank" >
							<img src="<?php echo base_url();?>assets/images/product/<?php echo $ad->image_name;?>" class="img-responsive" />
						</a>
                    </div>					
					<?php } } ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>