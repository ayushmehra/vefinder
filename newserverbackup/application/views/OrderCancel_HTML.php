<!DOCTYPE html>
<html>
<head>
<?php include VIEWPATH.'common/HeaderScript_HTML.php'; ?>
</head>
<body>
<?php include VIEWPATH.'common/NavBar_HTML.php'; ?>
<section class="blank-section">
        <div class="container">
            <div class="row">
            </div>
        </div>
    </section>
	<?php include VIEWPATH.'common/SubMenu_HTML.php'; ?>
	 <section class="order-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10 padding-top50 padding-bottom30">
                    <div class="col-sm-12 padding-bottom20">
                        <h4 class="order-section-heading align-left">
                            order no: <?php echo @$_GET['order']; ?> cancelled successfully!
                        </h4>
                    </div>
					</div>
                <div class="col-sm-1"></div>
            </div>
        </div>
    </section>
    <?php include VIEWPATH.'common/Footer_HTML.php'; 
    header('Refresh: 3;url='.base_url());
    ?>
</body>
</html> 