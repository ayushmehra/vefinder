<!DOCTYPE html>
<html>
<head>
<?php include VIEWPATH.'common/HeaderScript_HTML.php'; ?>
<script src="<?php echo base_url();?>assets/js/login.js"></script>
</head>
<body>
 <section class="vf-signup-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">

                        <div class="col-sm-12 vf-logo-heading">
                            <span>
                                <img src="<?php echo base_url();?>assets/images/vifinder-black-logo.png" />
                            </span>&nbsp;
                            Vifinder
                        </div>
                        <div class="col-sm-12 padding-top20">
                            <p class="vf-signup-section-heading">
                               Email Verification
                            </p>
                        </div>				   
                        <div class="col-sm-12 padding-top20">
                            <div class="col-sm-11">
                                <?php echo $msg;?>
                            </div>
                            <div class="col-sm-1">
                        </div>                                                
                    </div>
                    <div class="col-sm-1"></div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
    </section>
</body>
</html>