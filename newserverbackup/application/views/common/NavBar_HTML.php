<!--FLOATING ICONS ON BOTTOM-->
<div class="col-sm-12 floating-icon-position" align="center">
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
			<?php if($this->session->userdata('user_id')=='') { ?>
				<a href="<?php echo base_url();?>Login">
					<img src="<?php echo base_url();?>assets/images/floating-vefinder-icon.png">
				</a>
				<?php } else { ?>
				<a href="javascript:void(0);" class="open-vbox" data-toggle="modal" data-target="#vefinderCard">
					<img src="<?php echo base_url();?>assets/images/floating-vefinder-icon.png">
				</a>
			<?php } ?>
			<?php /*		<a href="javascript:void(0);" class="close-vbox ui-display-none-imp">
				<img src="<?php echo base_url();?>assets/images/floating-closing-icon.png">
			</a> */ ?>
		</li> 
		<li>
			<a href="javascript:void(0);">
				<img src="<?php echo base_url();?>assets/images/floating-comment-icon.png">
			</a>
		</li>
		<li>
			<?php if($this->session->userdata('user_id')<>'') { ?>
				<a href="<?php echo base_url();?>My-Profile">
					<img src="<?php echo base_url();?>assets/images/floating-user-icon.png">
				</a>
				<?php } else { ?>
				<a href="<?php echo base_url();?>Login">
					<img src="<?php echo base_url();?>assets/images/floating-user-icon.png">
				</a>
			<?php } ?>
		</li>
	</ul>
</div>
<!--PAGE SCROLL UP-->
<a href="javascript:void(0);" class="vf-scroll-page-up scrollPageTop ui-display-none">
	<img src="<?php echo base_url();?>assets/images/bottom-to-top-icon.png">
</a>
<?php if($this->session->userdata('user_id')<>''){?>
	<?php include VIEWPATH.'common/Floating_Section_HTML.php'; ?>
	<div class="vefinder-floating-btn">
		<a class="floating-icons" href="javascript:void(0);" data-toggle="modal" data-target="#vefinderCard">
			<img src="<?php echo base_url();?>assets/images/vefinder-floating-btn.png" />
		</a>
	</div>
<?php } ?>
<script>
	function autocomplet()
	{
		var min_length = 0; // min caracters to display the autocomplete
		var keyword = $('#location').val();
		if (keyword.length > min_length)
		{
			$.ajax({
				url: '<?php echo base_url(); ?>ajax_location',
				type: 'POST',
				data: {keyword:keyword},
				success:function(data){
					$('#location_id').show();
					$('#location_id').html(data);
				}
			});
		} 
		else
		{
			$('#location_id').hide();
		}
	} 
	// set_item : this function will be executed when we select an item
	function set_item(item)
	{
		// change input value
		$('#location').val(item);
		// hide proposition list
		$('#location_id').hide();
		var item_cat=$('.hm-search-input-select').data('value');
		var item_cat_text=$('.hm-search-input-select').data('text');
		if(item_cat !=0){
			window.location.href='<?php echo base_url();?>'+'Search?q='+item+'&in='+item_cat+'-'+item_cat_text;
		}
		else
		{
			window.location.href='<?php echo base_url();?>'+'Search?q='+item;
		}
	}
	$(document).ready(function(){
		$('#search').click(function() {	
			var item_cat=$('.hm-search-input-select').data('value');
			var item_cat_text=$('.hm-search-input-select').data('text');
			var item = $('#location').val();
			if(item!='')
			{
				if(item_cat !=0){
					window.location.href='<?php echo base_url();?>'+'Search?q='+item+'&in='+item_cat+'-'+item_cat_text;
				}
				else
				{
					window.location.href='<?php echo base_url();?>'+'Search?q='+item;
				}
			}
			else{
				window.location.href='<?php echo base_url();?>'+'Search/nav_cat/'+item_cat+'-'+item_cat_text;
			}
		});
	});
</script>
<nav id="Header" class="navbar navbar-default navbar-fixed-top hm-navbar-top">
	<div class="container" style="padding-left: 10px">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header page-scroll padding-top10 padding-left5">
			<button type="button" class="navbar-toggle vf-navbar-top-toggle-btn" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="page-scroll hm-navbar-logo" href="<?php echo base_url();?>">
				<img src="<?php echo base_url();?>assets/images/vifinder-black-logo.png" />
				&nbsp;Vifinder
			</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse vf-bg-ffffff padding-top7" id="bs-example-navbar-collapse-1">
			<ul id="navbarSearchBar" class="nav navbar-nav navbar-menu-item padding-left40">
				<li class="padding-top10">
					<div class="col-sm-12 hm-search-box-container">
						<span id="search">
							<img src="<?php echo base_url();?>assets/images/search-bar-icon.png" />
						</span>
						
						<input type="text" class="hm-search-input-txt" id="location" onkeyup="autocomplet()" placeholder="Search for users, product or near by events" value="<?php echo (@$_GET['q']<>'')?@$_GET['q']:'';?>"/>
						<?php /* <select class="hm-search-input-select">
							<option>All Departments</option>
							<?php 
							$catdata=_GetCategory();
							foreach($catdata as $val){ 
							@$cat_option .='<option value="'.$val->cat_id.'">'.$val->cat_name.'</option>';
							}
							echo $cat_option;
							?>
						</select> */ ?>
						<button class="btn btn-default dropdown-toggle hm-search-input-select" data-toggle="dropdown" type="button" data-value="<?php echo (@$SErcat_Dat['cat_id']<>'')? @$SErcat_Dat['cat_id']:'0'; ?>" data-text="<?php echo (@$SErcat_Dat['cat_name']<>'')? @$SErcat_Dat['cat_name']:'All Departments';?>" > <?php echo (@$SErcat_Dat['cat_name']<>'')? @$SErcat_Dat['cat_name']:'All Departments';?>
							<span>
								<i class="fa fa-caret-down" aria-hidden="true"></i>
							</span>
						</button>
						<ul class="dropdown-menu category-dropdown">
							<li>
								<a class="category-dropdown-item"  href="javascript:void(0);" data-value="0">All Departments</a>
							</li>
							<?php 
								$catdata=_GetCategory();
								foreach($catdata as $val)
								{ 
									$subcat	=	_GetSubCategory($val->cat_id); 
									if ($subcat<>'')
									{
									?> 
									<li class="dropdown-submenu">
										<a class="test category-dropdown-item" tabindex="-1" href="#" data-value="<?php echo $val->cat_id;?>"><?php echo $val->cat_name;?> <i class="fa fa-angle-right" aria-hidden="true"></i></a>
										<ul class="dropdown-menu">
											<?php foreach($subcat as $sub){ ?> 
												<li><a class="category-dropdown-item" tabindex="-1" href="#" data-value="<?php echo $sub->subcat_id;?> "><?php echo $sub->sub_cat_name;?></a></li>
											<?php }?>
										</ul>
									</li>
									<?php 	}
									else
									{
									?>  
									<li><a class="category-dropdown-item" tabindex="-1" href="#" data-value="<?php echo $val->cat_id;?>"><?php echo $val->cat_name;?></a></li>
									<?php 	}
								}	?>
						</ul>
					</div>
					<ul id="location_id" style="display:none;" class="hm-search-result-list">
					</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right hm-navbar-menu-item">
				<li>
					<a href="<?php echo base_url();?>Cart">
						<?php 
							if($this->session->userdata('user_id')<>''){
								$cart_item	=	_Cart_count($this->session->userdata('user_id'));
							}else
							{
								$without_login		=	$this->session->userdata('user_product_without_login');				 
								$cart_item			=	count($without_login);
							} 
						?>
						<?php if($cart_item<>0){ ?>
							<span>
								<img src="<?php echo base_url();?>assets/images/icons/cart-icon.png" />							
								<span class="hm-counter-cart" id="replace"><font><?php echo $cart_item; ?></font></span>							
							</span>&nbsp;&nbsp;
							<?php } else { ?>
							<span>
								<img src="<?php echo base_url();?>assets/images/icons/cart-icon.png" />							
								<span class="hm-counter-cart" id="replace" style="display:none;"></span>							
							</span>&nbsp;&nbsp;
						<?php } ?>
						Cart
					</a>
				</li>
				<?php if($this->session->userdata('user_id')<>''){ ?>
					<li>
						<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
							<span>
								<img src="<?php echo base_url();?>assets/images/icons/notification-icon.png" />
								<?php $notification=0; if($notification<>0 ){ ?>
									<span class="hm-counter"><font><?php echo $notification; ?> </font></span>
								<?php } ?>
							</span>&nbsp;&nbsp;
							Notifications
						</a>
						<ul class="dropdown-menu vf-notification-dropdown">
							<li>
								<a href="javascript:void(0);">
									<p>Thierry Commented on your profile. </p>
									<span>
										2 min ago
									</span>
								</a>
							</li>
							<li>
								<a href="javascript:void(0);">
									<p>Thierry Commented on your product
									“Wall Art”</p>
									<span>
										2 min ago
									</span>
								</a>
							</li>
							<li>
								<a href="javascript:void(0);">
									<p>There are lots of exciting new products
									grab them all.</p>
									<span>
										2 min ago
									</span>
								</a>
							</li>
							<img src="<?php echo base_url();?>assets/images/dropdown-tip.png">
						</ul>
					</li>
				<?php } ?>
				<li>
					<?php if($this->session->userdata('user_id')<>''){?>
						<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
							<span>
								<img src="<?php echo base_url();?>assets/images/icons/user-icon.png" />
							</span>&nbsp;&nbsp;
							<?php echo $this->session->userdata('user_name'); ?>
						</a>
						<ul class="dropdown-menu vf-logout-dropdown">
							<li>
								<a href="<?php echo base_url();?>Logout">
									<p>Logout</p>
								</a>
							</li>
							<img src="<?php echo base_url();?>assets/images/dropdown-tip.png">
						</ul>
						<?php } else { ?>
						<a href="<?php echo base_url();?>Login" >
							<span>
								<img src="<?php echo base_url();?>assets/images/icons/user-icon.png" />
							</span>&nbsp;&nbsp;
							Login / Signup
						</a>
					<?php } ?>
				</li>
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>	