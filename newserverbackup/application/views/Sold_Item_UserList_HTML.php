<!DOCTYPE html>
<html>
<head>
<?php include VIEWPATH.'common/HeaderScript_HTML.php'; ?>
<head>	
<body class="home-page-body">	
	<?php include VIEWPATH.'common/NavBar_HTML.php'; ?>
	<?php include VIEWPATH.'common/UpdateTrackingPopUp_HTML.php'; ?>
	<section class="blank-section">
        <div class="container">
            <div class="row">
            </div>
        </div>
    </section>
	<?php include VIEWPATH.'common/SubMenu_HTML.php'; ?>
	 <section class="bid-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10 padding-left20 padding-right20">
                    <div class="col-sm-12 followers-list-container">
                        <h4 class="followerss-list-heading"><?php echo $product_name;?> (<?php echo $count;?> items sold)</h4>
                        <div class="col-sm-12 padding-top20">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-8 search-box-container">
                                <span>
                                    <img src="<?php echo base_url();?>assets/images/modal-search-bar-icon.png">
                                </span>
                                <?php /* <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for OrderID.."> */ ?>
                                <input type="text"  id="search" placeholder="Search..">
                            </div>
                            <div class="col-sm-2"></div>
                        </div>
                        <div class="col-sm-12 padding-top30">
                            <div class="col-sm-12 soldItemList-container">
                                <table class="sold-item-table" id="myTable">
                                    <tr>
                                        <th>
                                            Sr No
                                        </th>
                                        <th>
                                            order id
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Delivery Address
                                        </th>
                                        <th>
                                            Tracking Id
                                        </th>
                                        <th>
                                            Date
                                        </th>
                                        <th>
                                            Amount
                                        </th>
                                    </tr>
									<?php 
									$i = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
									foreach ($product_info as $data){  $i++;//print_r($data);?>
                                    <tr class="content">
                                        <td>
                                            <?php echo $i ;?>
                                        </td>
                                        <td>
                                            <?php echo $data->show_order_id;?>
                                        </td>
                                        <td>
                                            <?php echo $data->full_name;?>
                                        </td>
                                        <td>
                                            <?php echo $data->address;?>
                                        </td>
                                        <td>
										<?php if ($data->tracking_id=='00000000') { ?>
                                            <a href="javascript:void(0);" data-address="<?php echo base64_encode($data->order_id.'/'.$data->show_order_id);?>" class="add-delivery-status">+Add</a>
										<?php } else{  
										echo  $data->tracking_id ;
										} ?>
                                        </td>
                                        <td>
                                           <?php echo date('jS M Y',strtotime($data->created_date)); ?>
                                        </td>
                                        <td>
                                            $<?php echo  $data->base_price; ?>
                                        </td>
                                    </tr>
									<?php } ?>									
                                </table>
                            </div>                            
							<!--PAGINATION-->
							<div class="col-sm-12 padding-top20 padding-bottom20" align="center">
								<?php echo $this->pagination->create_links(); ?>
							 </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>
    </section>
    <?php include VIEWPATH.'common/Footer_HTML.php'; ?>
	<script>
var $rows = $('#myTable tr');
$('#search').keyup(function() {
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
    
    $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
});
</script>
	</body>
</html>