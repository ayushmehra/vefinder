<section class="slider-section">
	<div class="container-fluid">
		<div class="row position-relative">
			<div class="col-sm-12 bottom-slider-blackbar">
				<div class="col-sm-2"></div>
				<?php /* <div class="col-sm-8">
					<a id="buynowbtn1" href="javascript:void(0);" class="buynowbtn btn hm-slider-buynow-btn hm-slider-buynow-btn-pos">
						buy now
					</a>
				</div> */?>
				<div class="col-sm-2"></div>
			</div>
			<div id="carousel-example-generic1" class="carousel slide" data-ride="carousel" data-interval="4000">
				<!-- Indicators -->
				<ol class="carousel-indicators z-index50">
				<?php 
				$data	=	_GetSliderImage();
				$count= count($data); 
				for ($i=0;$i<$count;$i++){ ?>
					<li data-target="#carousel-example-generic1" data-slide-to="<?php echo $i; ?>"  <?php echo ($i==0)?' class="active"':''; ?>></li>					
			<?php 	} ?>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
				<?php $j=0;
				foreach(_GetSliderImage() as $value ){ ?>
					<div class="item <?php if($j==0){?>active<?php } ?>">
						<img src="<?php echo base_url();?>assets/images/slider/<?php echo $value->slider_image; ?>" class="vf-slider-img" />
						<div class="carousel-caption" style="z-index:100">
							<a id="buynowbtn<?php $j ++;echo $j;?>" href="<?php echo $value->slider_url; ?>" class="buynowbtn btn hm-slider-buynow-btn hm-slider-buynow-btn-pos">
								buy now
							</a>
						</div>
					</div>
				<?php $j++;} ?>
				</div>
				<a class="left carousel-control margin-top50-neg" href="#carousel-example-generic1" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control margin-top50-neg" href="#carousel-example-generic1" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
			</div>
		</div>
	</div>
</section>