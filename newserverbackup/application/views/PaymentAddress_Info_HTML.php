<!DOCTYPE html>
<html>
    <head>
        <?php include VIEWPATH . 'common/HeaderScript_HTML.php'; ?>
    </head>
    <body>
        <?php include VIEWPATH . 'common/NavBar_HTML.php'; ?>
        <section class="blank-section">
            <div class="container">
                <div class="row">
                </div>
            </div>
        </section>
        <?php include VIEWPATH . 'common/SubMenu_HTML.php'; ?>	
        <section class="order-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10 padding-top50 padding-bottom30">
                        <?php 
                        echo "Credit Card length ".$this->session->flashdata('error_payment');
                        ?>
                        <div class="col-sm-12 padding-bottom20">
                            <h4 class="order-section-heading align-left">
                                Shipping Address
                            </h4> 
                        </div>
                        <div class="col-sm-12 padding-bottom50">
                            <div class="col-sm-3 shipping-address-container">
                                <span><?php echo $user_address->full_name; ?></span><br>
                                <?php echo $user_address->address; ?> <br>
                                <?php echo $user_address->additional_address; ?>  <br>
                                <?php echo $user_address->city; ?>,  <?php echo $user_address->state; ?> <br>
                                <?php echo $user_address->zip_code; ?>.<br>
                                PhoneNumber :  <?php echo $user_address->phone; ?><br>
                                <br>
                                <a href="<?php echo base_url(); ?>AddShippingAddress">
                                    Add new address
                                </a>
                                <span class="selected">
                                    <img src="<?php echo base_url(); ?>assets/images/tick-black-bg.png">
                                </span>
                            </div>
                            <div class="col-sm-3"></div>
                            <div class="col-sm-3"></div>
                            <div class="col-sm-3"></div>
                        </div>
                        <form method="POST" name="payment" id="payment">
                            <div class="col-sm-12 padding-bottom20">
                                <h4 class="order-section-heading align-left tranform-capitalize font-size20">
                                    Select Payment method
                                </h4> 
                            </div>
                            <!--CREDIT CARD-->
                            <div class="col-sm-12 padding-bottom30">
                                <p>
                                    <input type="radio" id="CreditCard" value="credit"  class="myckeck validate[required]" name="vfPaymentOption">
                                    <label for="CreditCard" class="order-form-radio-label">Credit Card</label>
                                </p>
                                <div class="col-sm-12 padding-left30">
                                    <div class="col-sm-3">
                                        <label class="order-pay-form-label">Name on Card</label>
                                        <input type="text" name="credit_card_name" class="credit order-pay-form-input validate[required,custom[onlyLetterSp]]" placeholder="">
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="order-pay-form-label text-color757575">Card Number</label>
                                        <input type="text" name="credit_card_number" class="credit order-pay-form-input validate[required,custom[onlyNumber]]" placeholder="">
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="col-sm-12">
                                            <label class="order-pay-form-label text-color757575">Expiry Date</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <select name="credit_month" class="credit order-pay-form-select validate[required]">
                                                <option value="">Month</option>
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <select name="credit_year" class="credit order-pay-form-select validate[required]">
                                                <option>Year</option>
                                                <?php $year = date("Y");
                                                for ($i = 0; $i < 12; $i++) { ?>
                                                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>   
    <?php $year++;
} ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4"></div>
                                    </div>
                                    <div class="col-sm-3">

                                    </div>
                                </div>
                            </div>
                            <!--DEBIT CARD-->
                            <div class="col-sm-12 padding-bottom30">
                                <p>
                                    <input type="radio" class="myckeck validate[required]" value="debit" id="DebitCard" name="vfPaymentOption">
                                    <label for="DebitCard" class="order-form-radio-label">Debit Card</label>
                                </p>
                                <div class="col-sm-12 padding-left30">
                                    <div class="col-sm-3">
                                        <label class="order-pay-form-label">Name on Card</label>
                                        <input type="text" name="debit_card_name" class="order-pay-form-input debit validate[required,custom[onlyLetterSp]]" placeholder="">
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="order-pay-form-label text-color757575">Card Number</label>
                                        <input type="text" name="debit_card_number" class="order-pay-form-input debit validate[required,custom[onlyNumber]]" placeholder="">
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="col-sm-12">
                                            <label class="order-pay-form-label text-color757575">Expiry Date</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <select name="debit_month" class="debit order-pay-form-select validate[required]">
                                                <option value="">Month</option>
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <select name="debit_year" class="debit order-pay-form-select validate[required]">
                                                <option>Year</option>
                                                <?php $year = date("y");
                                                for ($i = 0; $i < 12; $i++) { ?>
                                                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>   
    <?php $year++;
} ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4"></div>
                                    </div>
                                    <div class="col-sm-3">

                                    </div>
                                </div>
                            </div>
                            <!--NET BANKING CARD
                            <div class="col-sm-12 padding-bottom30">
                                <p>
                                    <input type="radio" id="NetBanking" value="net"  class="myckeck validate[required]" name="vfPaymentOption">
                                    <label for="NetBanking" class="order-form-radio-label">Net Banking</label>
                                </p>
                                <div class="col-sm-12 padding-left30">
                                    <div class="col-sm-3">
                                        <label class="order-pay-form-label text-color757575">Select Bank</label>
                                        <select name="net_bank" class="order-pay-form-select validate[required] net">
                                            <option value="">Select Bank</option>
                                            <option value="SBI">SBI</option>
                                            <option value="HDFC">HDFC</option>
                                            <option value="CITI">CITI</option>
                                            <option value="ICICI">ICICI</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-3"></div>
                                </div>
                            </div>
                            <!--FINANCE EMI OPTION
                            <div class="col-sm-12 padding-bottom30">
                                <p>
                                    <input type="radio" id="EMIOption"  value="emi" class=" myckeck validate[required]" name="vfPaymentOption">
                                    <label for="EMIOption" class="order-form-radio-label">EMI Option</label>
                                </p>
                                <div class="col-sm-12 padding-left30">
                                    <div class="col-sm-3">
                                        <select name="emi_from" class="emi order-pay-form-select validate[required]">
                                            <option value="">Finance Emi Option</option>
                                            <option value="SBI">SBI</option>
                                            <option value="HDFC">HDFC</option>
                                            <option value="CITI">CITI</option>
                                            <option value="ICICI">ICICI</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-3"></div>
                                </div>
                            </div> -->
                            <div class="col-sm-12 padding-top40">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-3"></div>
                                <div class="col-sm-3"></div>
                                <div class="col-sm-3">
                                    <button type="submit" name="submit" id="submit_pay" class="hm-order-link-lg" value="save">
                                        Continue
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-1"></div>
                </div>
            </div>
        </section>	
<?php include VIEWPATH . 'common/Footer_HTML.php'; ?>
        <script>
            jQuery(document).ready(function () {
                jQuery("#payment").validationEngine({showOneMessage: true, scroll: false, autoHidePrompt: true, autoHideDelay: 1000, fadeDuration: 0.3});
            });
            $(document).ready(function () {
                $('.emi').prop('disabled', true);
                $('.credit').prop('disabled', true);
                $('.debit').prop('disabled', true);
                $('.net').prop('disabled', true);
                $(".myckeck").click(function () {
                    var val = $(this).val();
                    switch (val)
                    {
                        case'credit':
                        {
                            $('.credit').prop('disabled', false);
                            $('.debit').prop('disabled', true);
                            $('.net').prop('disabled', true);
                            $('.emi').prop('disabled', true);
                            break;
                        }
                        case'debit':
                        {
                            $('.debit').prop('disabled', false);
                            $('.credit').prop('disabled', true);
                            $('.net').prop('disabled', true);
                            $('.emi').prop('disabled', true);
                            break;
                        }
                        case'net':
                        {
                            $('.net').prop('disabled', false);
                            $('.credit').prop('disabled', true);
                            $('.debit').prop('disabled', true);
                            $('.emi').prop('disabled', true);
                            break;
                        }
                        case'emi':
                        {
                            $('.emi').prop('disabled', false);
                            $('.credit').prop('disabled', true);
                            $('.debit').prop('disabled', true);
                            $('.net').prop('disabled', true);
                            break;
                        }
                    }
                });
                $("#submit_pay").click(function () {
                    var reason = $("#payment").validationEngine('validate');
                    if (!reason) {
                        return false;
                    }
                    else {
                        $("form[name='payment']").submit();
                    }
                });
            });
        </script>
    </body>
</html> 