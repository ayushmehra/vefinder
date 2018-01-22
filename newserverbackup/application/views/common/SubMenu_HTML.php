 <section class="hm-item-menu-section">
        <div class="container-fluid">
            <div class="row">
                <nav id="Header" class="navbar navbar-default vf-item-navbar">
                    <div class="container" style="padding-left: 10px">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header page-scroll">
                            <button type="button" class="navbar-toggle vf-item-navbar-toggle-btn" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                                <span class="sr-only">Toggle navigation</span>
                                Item List
                                <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                            </button>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse bg-grayf9f9f9" id="bs-example-navbar-collapse-2">
                            <ul class="nav navbar-nav navbar-right hm-item-list-menu">
                            <?php   /*  <li>
                                    <a href="<?php echo base_url();?>Home/New" <?php if (@$condition=='New'){ ?>class="active" <?php } ?>>
                                        New
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>Home/Used"<?php if (@$condition=='Used'){ ?>class="active" <?php } ?>>
                                        Used
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>Home/All"<?php if (@$condition=='All'){ ?>class="active" <?php } ?>>
                                        All
                                    </a>
                                </li> */ ?>
                                <li>
                                    <a href="<?php echo base_url();?>Home/Browsing-History"<?php if (@$condition=='Browsing-History'){ ?>class="active" <?php } ?>>
                                        Browsing History
                                    </a>
                                </li>
								<?php if($this->session->userdata('user_name')<>'') { ?>
                                <li>
                                    <a href="<?php echo base_url();?>My-Vefinder" <?php if($class=="User" && $method=='My_Vefinder') { ?> class="active" <?php } ?>>
                                        <?php echo $this->session->userdata('user_name')."'s ";?>vefinder.com
                                    </a>
                                </li>
								<?php } ?>
                                <li>
                                    <a href="<?php echo base_url();?>Department" <?php if($class=="Department" && $method=='index') { ?> class="active" <?php } ?> >
                                        Departments
                                    </a>
                                </li>
								<?php if($this->session->userdata('user_id')<>''){?>
                                <li>
                                     <a href="#" > 
                                        Accounts
                                    </a>
                                </li>
								<?php } ?>
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                    <!-- /.container-fluid -->
                </nav>
            </div>
        </div>
    </section>
    