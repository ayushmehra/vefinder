<!DOCTYPE html>
<html>
    <head><?php include VIEWPATH . 'common/HeaderScript_HTML.php'; ?>
    </head>
    <body>
       <?php include VIEWPATH.'common/NavBar_HTML.php'; ?>
        <section class="blank-section">
            <div class="container">
                <div class="row">
                </div>
            </div>
        </section>
	<?php
    ini_set("display_errors", "Off");
    error_reporting(0);
     include VIEWPATH.'common/SubMenu_HTML.php'; ?>
	
            
        <section class="vf-department-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <div class="col-sm-12 padding-bottom10">
                            <h3 class="vf-department-section-heading">
                                Departments
                            </h3>
                        </div>
                        <div class="col-sm-5">
                            <!--MOVIES DEPARTMENT-->
                            <?php
                            foreach ($categoryWithProducts as $key => $value) {
                                //if (count(@$value['products']) > 0) {
                                    ?>
                                    <div class="col-sm-12 padding-bottom20 border-bottom1">
                                        <span class="vf-department-title">
        <?php echo $value['cat_name']; ?>
                                        </span>&nbsp;
                                        <a href="javascript:void(0);" class="vf-department-shop-btn">
                                            Shop
                                        </a>
                                        <div class="col-sm-12 padding-top30" align="center">
                                        </div>
                                        <?php
                                        if (count(@$value['images']) > 0) {
                                            foreach (@$value['images'] as $pkey => $pvalue) {
                                                ?>
                                                <div class="col-sm-4 padding-bottom10" align="center">
                                                    <a href="javascript:void(0);" class="blank-url">
                                                        <img src="http://admin.puzzlecoder.com/assets/category/<?php echo $pvalue['image'];?>" class="vf-department-movie-poster" />
                                                    </a>
                                                </div>
            <?php }
        } ?>
                                    </div>
                                    <!--DIVIDER-->
                                    <div class="col-sm-12 padding-top30"></div>
    <?php //}
} ?>
                            <!--MUSIC DEPARTMENT-->

                        </div>

                        <!-- products list-->
                        <div class="col-sm-7 padding-left40 padding-right40">
                            <!--ROW-->
                            <?php
                            if (count($product) > 0) {
                                foreach ($product as $key => $arrValue) {
                                    ?>

                                    <div class="col-sm-12">
        <?php foreach ($arrValue as $keyf => $value) { ?>
                                            <div class="col-sm-6 padding-bottom40">
                                                <div class="col-sm-12 hm-item-container">
                                                    <!--FOR ITEM BY-->
                                                    <div class="col-sm-6" align="left">
                                                        <a href="javascript:void(0)" class="hm-item-by-link">
                                                            <span>
                                                                <img src="assets/images/product/<?php echo $value->images[0]->image_name ?>" />
                                                            </span>
                                                            @<?php echo $value->user ?>
                                                        </a>
                                                    </div>

                                                    <!--ITEM UPLOAD ITME AGO-->
                                                    <div class="col-sm-6" align="right">
                                                        <span class="hm-item-time">
            <?php echo HumanTiming($value->created_date) ?>
                                                        </span>
                                                    </div>

                                                    <!--ITEM IMAGE-->
                                                    <div class="col-sm-12 padding-top5 item-img-container" align="center">
                                                        <img src="assets/images/product/<?php echo $value->images[0]->image_name ?>" class="img-responsive item-image" />
                                                        <!--ITEM COLOR (ALWAY INSIDE ITEM IMAGE DIV)-->
                                                    </div>

                                                    <!--ITEM NAME-->
                                                    <div class="col-sm-12 padding-top5" align="center">
                                                        <a href="javascript:void(0);" class="hm-item-name"><?php echo $value->product_name; ?></a>
                                                    </div>

                                                    <!--ITEM DESCRIPTIONS-->
                                                    <div class="col-sm-12 padding-top5" align="left">
                                                        <p class="hm-item-desc">
                                                            Product info : <?php echo $value->product_description; ?>
                                                        </p>
                                                    </div>

                                                    <!--ITEM PRICE-->
                                                    <div class="col-sm-12 padding-top5" align="center">
                                                        <p class="hm-item-price">
                                                            <!--<span>Price</span>&nbsp;&nbsp;&nbsp;-->
                                                            $<?php echo $value->product_price; ?> &nbsp;&nbsp;&nbsp;&nbsp;
                                                            <del><span>$<?php echo $value->product_price; ?></span></del>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                                            <span>
                                                                <!--DISCOUNT-->
                                                                <span class="hm-item-discount" align="center">
                                                                    -0%
                                                                </span>
                                                            </span>
                                                        </p>
                                                    </div>

                                                    <!--DIVIDER LINE-->
                                                    <div class="col-sm-12 padding-top10 border-top1-888888" align="center"></div>

                                                    <!--ITEM ICONS EX: LIKE, COMMENT, SHARE & MORE with count-->
                                                    <div class="col-sm-12 padding-top15" align="center">
                                                        <ul class="hm-item-icon">
                                                            <li class="slider-product">
                                                                <img src="assets/images/icons/heart.png" />
                                                                <?php echo $value->likes; ?> Likes
                                                            </li>
                                                            <li class="slider-product">
                                                                <img src="assets/images/icons/comment-icon.png" />
            <?php echo $value->comments; ?> Comments
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php } ?>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                            <!--ROW-->
                        </div>
                    </div>
                    <div class="col-sm-1"></div>
                </div>
            </div>
        </section>
        <section class="vf-ads-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-4" align="center">
                            <img src="images/product/ad-1.png" class="img-responsive" />
                        </div>
                        <div class="col-sm-4" align="center">
                            <img src="images/product/ad-2.png" class="img-responsive" />
                        </div>
                        <div class="col-sm-4" align="center">
                            <img src="images/product/ad-3.png" class="img-responsive" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php include VIEWPATH . 'common/Footer_HTML.php'; ?>
    </body>
</html>
