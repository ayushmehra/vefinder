<section class="hm-delivery-status-section ui-display-none">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6 padding-left50 padding-right50">
				<a href="javascript:void(0);" class="close-delivery-status-popup">
					<img src="<?php echo base_url();?>assets/images/close-report-popup.png">
				</a>
				<div class="col-sm-12 followers-list-container">
					<h4 class="followerss-list-heading">Add Delivery Vendor and Shipment ID</h4>					
					<div class="col-sm-12 padding-top30 padding-bottom10">
						<div class="col-sm-1"></div>
						<div class="col-sm-3">
							<label class="delivery-status-form-label">
								Delivery Vendor
							</label>
						</div>
						<div class="col-sm-7">
							<select class="delivery-status-form-select validate[required]" id="Vendor">
								<option value="">Select Vendor</option>
								<option value="UPS">UPS</option>
								<option value="POSTNORD">POSTNORD</option>
							</select>
						</div>
						<div class="col-sm-1"></div>
					</div>
					<div class="col-sm-12 padding-top10 padding-bottom20">
						<div class="col-sm-1"></div>
						<div class="col-sm-3">
							<label class="delivery-status-form-label">
								Shipment ID
							</label>
						</div>
						<div class="col-sm-7">
							<input type="text" class="delivery-status-form-input validate[required]" id="track_id" placeholder="ID Provided by vendor for tracking">
						</div>
						<div class="col-sm-1"></div>
					</div>
					<div class="col-sm-12 padding-top30 padding-bottom20">
						<div class="col-sm-3"></div>
						<div class="col-sm-6">
							<button type="button" data-address="" class="hm-order-link-lg track_id">Update</button>
							<h5 class="followerss-list-heading" id="msg" style="display:none;color:orange;"></h5>
						</div>
						<div class="col-sm-3"></div>
					</div>
				</div>
			</div>
			<div class="col-sm-3"></div>
		</div>
	</div>
</section>