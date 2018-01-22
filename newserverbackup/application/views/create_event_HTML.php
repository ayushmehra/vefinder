<!DOCTYPE html> 
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <head><?php include VIEWPATH.'common/HeaderScript_HTML.php'; ?>
        <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/css/scrolling-nav.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/typography.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/commons.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/events.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/vefinder.new.style.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/vefinder.style.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/vefinder.gapping.css">
        
    </head>
  <body id="page-top">
    <div id="wrapper">
        <div id="Header">
            <?php include VIEWPATH.'common/NavBar_HTML.php'; ?>
    
            <section class="blank-section">
                <div class="container">
                    <div class="row">
                    </div>
                </div>
            </section>
            <?php include VIEWPATH.'common/SubMenu_HTML.php'; ?>
        </div>
        <!-- Main Content -->
        <div id="content">
            <div class="container">
               
            
                <div class="heading">
                    <p>Create Event</p>
                </div>
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-6 add-images">
                                <form method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="file-container">
                                            <i class="material-icons">add</i>
                                            <input class="add-image add-image-master" onchange="uploadImageMaster(this);" type="file" name="userfile[]" accept="image/*">
                                            <img id="master-image" src="#" />
                                        </div><br />
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="file-container">
                                            <i class="material-icons">add</i>
                                            <input class="add-image add-image-1" onchange="uploadImage1(this);" type="file" name="userfile[]" accept="image/*">
                                            <img id="image-1" src="#" />
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="file-container">
                                            <i class="material-icons">add</i>
                                            <input class="add-image add-image-2" onchange="uploadImage2(this);" type="file" name="userfile[]" accept="image/*">
                                            <img id="image-2" src="#" />
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="file-container">
                                            <i class="material-icons">add</i>
                                            <input class="add-image add-image-3" onchange="uploadImage3(this);" type="file" name="userfile[]" accept="image/*">
                                            <img id="image-3" src="#" />
                                        </div>
                                    </div>
                                </div>
								
                            </div>
                            <div class="col-lg-6 create-event-form-section">
                                
                           
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="event_name" placeholder="Event Name" id="event-name-input">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="event_location" placeholder="Event Location" id="event-location-input">
										<div class="map_canvas"></div>
                                        <i class="material-icons loc-material">location_on</i>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="date" name="event_date" placeholder="Event Date" id="event-date-input">
										<i class="material-icons date-material">event</i>
                                        
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="event_description" id="event-detail" rows="5"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="event_tags" placeholder="Event Tags" id="event-tags-input">
                                    </div>
                                    <input type="hidden" name="submitForm" value="eventForm" />
                                    <button type="submit" class="btn btn-primary create-event-btn">Create</button>
                        </form>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <section class="footer-section" id="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <div class="col-sm-2" align="left">
                            <img src="http://vefinder.puzzlecoder.com/assets/images/vefinder-footer-logo.png">
                        </div>
                        <div class="col-sm-1" align="left">
    
                        </div>
                        <div class="col-sm-6" align="center">
                            <ul class="footer-menu-links">
                                <li>
                                    <a href="javascript:void(0);">
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        Shop
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        Team
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        About us
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        Contact
                                    </a>
                                </li>
                            </ul>
                            <div class="col-sm-12 padding-top15"></div>
                            <ul class="footer-flag-links">
                                <li>
                                    <a href="javascript:void(0);">
                                        <img src="http://vefinder.puzzlecoder.com/assets/images/flags/denmark.png">
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <img src="http://vefinder.puzzlecoder.com/assets/images/flags/india.png">
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <img src="http://vefinder.puzzlecoder.com/assets/images/flags/us.png">
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <img src="http://vefinder.puzzlecoder.com/assets/images/flags/spain.png">
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <img src="http://vefinder.puzzlecoder.com/assets/images/flags/uk.png">
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <img src="http://vefinder.puzzlecoder.com/assets/images/flags/china.png">
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <img src="http://vefinder.puzzlecoder.com/assets/images/flags/italy.png">
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-3 padding-top20" align="right">
                            <ul class="footer-social-links">
                                <li>
                                    <a href="http://facebook.com" target="_blank">
                                        <img src="http://vefinder.puzzlecoder.com/assets/images/social-icons/social-fb.png">
                                    </a>
                                </li>
                                <li>
                                    <a href="http://twitter.com" target="_blank">
                                        <img src="http://vefinder.puzzlecoder.com/assets/images/social-icons/social-tw.png">
                                    </a>
                                </li>
                                <li>
                                    <a href="http://plus.google.com" target="_blank">
                                        <img src="http://vefinder.puzzlecoder.com/assets/images/social-icons/social-gp.png">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-12 padding-top20"></div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <div class="col-sm-5" align="left">
                            <ul class="footer-left-aside-menu-links">
                                <li>
                                    Payment Options
                                </li>
                                <li>
                                    <img src="http://vefinder.puzzlecoder.com/assets/images/payment/mastercard.png">
                                </li>
                                <li>
                                    <img src="http://vefinder.puzzlecoder.com/assets/images/payment/visa.png">
                                </li>
                                <li>
                                    <img src="http://vefinder.puzzlecoder.com/assets/images/payment/amex.png">
                                </li>
                                <li>
                                    <img src="http://vefinder.puzzlecoder.com/assets/images/payment/discover.png">
                                </li>
                            </ul>
                            <div class="col-sm-12 padding-top5"></div>
                            <ul class="footer-left-aside-menu-links">
                                <li>
                                    Financing Options
                                </li>
                                <li>
                                    <img src="http://vefinder.puzzlecoder.com/assets/images/viabill.png">
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-5 padding-top30" align="right">
                            <ul class="footer-right-aside-menu-links">
                                <li>
                                    <a href="javascript:void(0);">
                                        Privacy Policy
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        Terms and Conditions
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-1"></div>
                </div>
            </div>
        </section>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/scrolling-nav.js"></script>
    <script src="assets/js/commons.js"></script>
	<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places&key=AIzaSyBqZPOFsTFQzC02T9Wf06qp7SCYZxJMKfY"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="assets/js/jquery.geocomplete.js"></script>

    <script>
      $(function(){
        
        var options = {
          map: ".map_canvas",
          location: "NYC"
        };
        
        $("#event-location-input").geocomplete(options);
        
      });
    </script>
        <script>
            function uploadImageMaster(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var wd = $('#master-image').parent().width();
                        var ht = $('#master-image').parent().height();
                        $('#master-image').attr('src', e.target.result).width(wd).height(ht);
                        $('#master-image').css('margin-top',-ht/2);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
            function uploadImage1(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var wd = $('#image-1').parent().width();
                        var ht = $('#image-1').parent().height();
                        $('#image-1').attr('src', e.target.result).width(wd).height(ht);
                        $('#image-1').css('margin-top',-ht/1.4);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
            function uploadImage2(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var wd = $('#image-2').parent().width();
                        var ht = $('#image-2').parent().height();
                        $('#image-2').attr('src', e.target.result).width(wd).height(ht);
                        $('#image-2').css('margin-top',-ht/1.4);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
            function uploadImage3(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var wd = $('#image-3').parent().width();
                        var ht = $('#image-3').parent().height();
                        $('#image-3').attr('src', e.target.result).width(wd).height(ht);
                        $('#image-3').css('margin-top',-ht/1.4);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
  </body>
</html>