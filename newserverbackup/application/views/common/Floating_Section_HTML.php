<!-- Modal -->
    <div class="modal fade" id="vefinderCard" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog padding-top100" role="document">
          <div class="modal-content vf-card-content">
            <div class="modal-header border-none-imp">
              
            </div>
            <div class="modal-body" style="padding:0">
                <div class="col-sm-1"></div>
                 <div class="col-sm-10 vbox-container">
                        <div class="col-sm-12" algin="left">
                            <a href="javascript:void(0);" class="vbox-item-by">
                                <span>
								<?php 
									if(($this->session->userdata('user_image')=='')||($this->session->userdata('user_image')=='n/a'))
									{
										$user_image= base_url().'assets/images/user-icon.png';
									}
									else
									{ 
										$user_image=base_url().'assets/UserImage/'.$this->session->userdata('user_id').'/'.$this->session->userdata('user_image');
									}
								?>
                                    <img src="<?php echo $user_image;?>" class="vbox-profile-img">
                                </span>&nbsp;
                                @<?php echo $this->session->userdata('user_name'); ?>
                            </a>
                        </div>
                        <div class="col-sm-12 padding-top20 padding-bottom10 padding-left0-right0" align="center">
                            <p class="vbox-options-heading">
                                Choose one of the option
                            </p>
                        </div>
                        <div class="col-sm-12" align="center">
                            <ul class="vbox-item-types-list">
                                <li>
                                    <div class="vbox-item-types-container vf-item-container-7b7b7b-imp">
                                        <a href="<?php echo base_url();?>Submit-Product">
                                            Sell
                                        </a>
                                    </div>
                                </li>

                                <li>
                                    <div class="vbox-item-types-container vf-item-container-7b7b7b-imp">
                                        <a href="<?php echo base_url();?>Ad">
                                            Ads
                                        </a>
                                    </div>
                                </li>

                                <li>
                                    <div class="vbox-item-types-container vf-item-container-7b7b7b-imp">
                                        <a href="javascript:void(0);">
                                            Requests
                                        </a>
                                    </div>
                                </li>

                                <li>
                                    <div class="vbox-item-types-container vf-item-container-7b7b7b-imp">
                                        <a href="javascript:void(0);">
                                            Auction
                                        </a>
                                    </div>
                                </li>

                                <li>
                                    <div class="vbox-item-types-container vf-item-container-7b7b7b-imp">
                                        <a href="<?php echo base_url(); ?>CreateEvents">
                                            Events
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-1"></div>
            </div>
            <div class="modal-footer border-none-imp">
            </div>
          </div>
        </div>
    </div>
<?php /*
<section class="hm-floating-section outside ui-display-none">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4 outside"></div>
                <div class="col-sm-4 outside">
                    <!--VBOX-->
                    <div class="col-sm-12 vbox-container visibility-hidden">
                        <div class="col-sm-12" algin="left">
                            <a href="javascript:void(0);" class="vbox-item-by">
                                <span>
								<?php 									
									if(($this->session->userdata('user_image')=='')||($this->session->userdata('user_image')=='n/a'))
									{
										$user_image= base_url().'assets/images/user-icon.png';
									}
									else
									{ 
										$user_image=base_url().'assets/UserImage/'.$this->session->userdata('user_id').'/'.$this->session->userdata('user_image');
									}
								?>
                                    <img src="<?php echo $user_image;?>" class="vbox-profile-img">
                                </span>&nbsp;
                                @<?php echo $this->session->userdata('user_name'); ?>
                            </a>
                        </div>
                        <div class="col-sm-12 padding-top20 padding-bottom10 padding-left0-right0" align="center">
                            <p class="vbox-options-heading">
                                Choose one of the option
                            </p>
                        </div>
                        <div class="col-sm-12" align="center">
                            <ul class="vbox-item-types-list">
                                <li>
                                    <div class="vbox-item-types-container vf-item-container-7b7b7b-imp">
                                        <a href="<?php echo base_url();?>Submit-Product">
                                            Sell
                                        </a>
                                    </div>
                                </li>

                                <li>
                                    <div class="vbox-item-types-container vf-item-container-7b7b7b-imp">
                                        <a href="javascript:void(0);">
                                            Ads
                                        </a>
                                    </div>
                                </li>

                                <li>
                                    <div class="vbox-item-types-container vf-item-container-7b7b7b-imp">
                                        <a href="javascript:void(0);">
                                            Requests
                                        </a>
                                    </div>
                                </li>

                                <li>
                                    <div class="vbox-item-types-container vf-item-container-7b7b7b-imp">
                                        <a href="javascript:void(0);">
                                            Auction
                                        </a>
                                    </div>
                                </li>

                                <li>
                                    <div class="vbox-item-types-container vf-item-container-7b7b7b-imp">
                                        <a href="<?php echo base_url(); ?>CreateEvents">
                                            Events
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12 padding-top50"></div>
                    <center>
                        <ul class="floating-icons-list">
                            <li>
                                <a href="<?php echo base_url();?>">
                                    <img src="<?php echo base_url();?>assets/images/floating-more-icon.png">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <img src="<?php echo base_url();?>assets/images/floating-search-icon.png">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="open-vbox">
                                    <img src="<?php echo base_url();?>assets/images/floating-vefinder-icon.png">
                                </a>
								<a href="javascript:void(0);" class="close-vbox ui-display-none-imp">
                                    <img src="<?php echo base_url();?>assets/images/floating-closing-icon.png">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <img src="<?php echo base_url();?>assets/images/floating-comment-icon.png">
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>My-Profile">
                                    <img src="<?php echo base_url();?>assets/images/floating-user-icon.png">
                                </a>
                            </li>
                        </ul>
                    </center>
                </div>
                <div class="col-sm-4 outside"></div>
            </div>
        </div>
    </section> */ ?>