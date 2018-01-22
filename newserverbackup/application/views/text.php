<form method="POST" action="https://payment.quickpay.net">
	<input type="text" name="version" value="<?php echo $version;?>">
	<input type="text" name="merchant_id" value="<?php echo $merchant_id;?>">
	<input type="text" name="agreement_id" value="<?php echo $agreement_id;?>">
	<input type="text" name="order_id" value="<?php echo $order_id;?>">
	<input type="text" name="amount" value="<?php echo $amount;?>">
	<input type="text" name="currency" value="<?php echo $currency;?>">
	<input type="text" name="continueurl" value="<?php echo $continueurl;?>">
	<input type="text" name="cancelurl" value="<?php echo $cancelurl;?>">
	<input type="text" name="callbackurl" value="<?php echo $callbackurl;?>">
	<input type="text" name="checksum" value="<?php echo $checksum; ?>"> 
	<input type="submit" value="Continue to payment...">
</form>
