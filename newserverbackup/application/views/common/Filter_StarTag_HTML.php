<?php 
if($this->session->userdata('user_id')<>'')
{ 
	$user_id=$this->session->userdata('user_id');
	$user_intrestTag	=	_GetUserTag($user_id);
	$i=0; 
	if(is_array($user_intrestTag))
	{
?>	
	    <section class="interest-slider-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="5000">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
						<?php foreach($user_intrestTag as $value){ //print_r($value); die; ?>
						<?php if($i==0){ ?> <div class="item active"><div class="col-sm-1"></div><div class="col-sm-10"> <? } ?>
									<div class="col-sm-2 padding-top5 padding-bottom5 col-xs-6">
                                        <div class="col-sm-12 interest-tag-slide-item ">
                                            *<?php echo $value->interests_name;?>
                                        </div>
                                    </div> 
								<?php $i++;
								if($i%7==0){?></div><div class="col-sm-1"></div></div><div class="item"><div class="col-sm-1"></div><div class="col-sm-10"> <?php } ?>
                                <?php  } ?>
									<?php if($i%7!=0){?></div><div class="col-sm-1"></div></div><?php }?>
                        </div>
                        <!-- Controls -->
						<?php if(count($user_intrestTag)>6){?>
                        <a id="interestLeftSlide" class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <img src="<?php echo base_url();?>assets/images/slide-left-icon.png" />
                        </a>
                        <a id="interestRightSlide" class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <img src="<?php echo base_url();?>assets/images/slide-right-icon.png" />
                        </a>
						<?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } 
}?>	