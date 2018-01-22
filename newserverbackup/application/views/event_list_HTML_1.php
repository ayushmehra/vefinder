<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>

    <meta charset="utf-8">
    <title>Events</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="@AMANK">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/events/assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/events/assets/css/scrolling-nav.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/events/assets/css/typography.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/events/assets/css/commons.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/events/assets/css/events.css">
  </head>

  <body id="page-top">
    <div id="wrapper">
        <!-- Navigation -->
        <header id="header">
          <nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
            <div class="container">
              <a class="navbar-brand" href="#">
                <img src="./assets/events/assets/images/header/vifinder-black-logo.png" alt="vifinder-logo" title="Vifinder" />
                <span>VIFINDER</span>
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarResponsive">
                <div class="search-bar">
                    <input type="text" class="search-input nav-link js-scroll-trigger" placeholder="I'M LOOKING FOR">
                    <select class="search-category">
                        <option value="all">All Departments</option>
                        <option value="sports">Sports Leisure and Games</option>
                        <option value="fashion">Fashion and Accessories</option>
                        <option value="home">Home and Garden</option>
                        <option value="electronics">Electronics</option>
                        <option value="cars">Cars and Motors</option>
                        <option value="movies">Movies Books and Music</option>
                        <option value="jwellery">Jewellery</option>
                        <option value="education">Education</option>
                    </select>
                </div>
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                    <span class="nav-link js-scroll-trigger" href="#">
                        <img src="./assets/events/assets/images/header/cart-icon.png" alt="cart" title="Cart" />
                        <a href="#">CART</a>
                    </span>
                  </li>
                  <li class="nav-item">
                    <span class="nav-link js-scroll-trigger" href="#">
                        <img src="./assets/events/assets/images/header/user-icon.png" alt="user" title="User" />
                        <a href="#">LOGIN</a>&nbsp;/&nbsp;<a href="#">SIGNUP</a>
                    </span>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </header>


        <!-- Main Content -->
        <div id="content">
            <div class="visible-lg">
                <div class="breadcrumb">
                    <div class="container">
                        <ul class="breadcrumb-list">
                            <li>
                                <a href="#">New</a>
                            </li>
                            <li>
                                <a href="#">Used</a>
                            </li>
                            <li>
                                <a href="#">All</a>
                            </li>
                            <li>
                                <a href="#">Browsing History</a>
                            </li>
                            <li class="active">
                                <a href="#">Thierry's Vifinder.com</a>
                            </li>
                            <li>
                                <a href="#">Departments</a>
                            </li>
                            <li>
                                <a href="#">Accounts</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="visible-md">
                <div class="md-breadcrumb">
                    <div class="container">
                        <button class="breadcrumb-menu-btn">
                            MENU&nbsp;&nbsp;<i class="material-icons">list</i>
                        </button><br />
                        <ul class="breadcrumb-list">
                            <li>
                                <a href="#">All</a>
                            </li>
                            <li>
                                <a href="#">Browsing History</a>
                            </li>
                            <li class="active">
                                <a href="#">Thierry's Vifinder.com</a>
                            </li>
                            <li>
                                <a href="#">Departments</a>
                            </li>
                            <li>
                                <a href="#">Accounts</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container main-content">
                <div class="heading-section">
                    <h4 class="page-heading">Thierry's Vifinder</h4>
                    <p class="page-subheading">Events</p>
                    <br /><br />

                    <?php 
                    if(count($eventsData)>0){
                        foreach ($eventsData as $key => $value) {
                    ?>

                    <div class="events-section">
                        <div class="row">
                            <div class="col-lg-3">
                                <img class="profile-pic" src="./assets/events/assets/images/profile_pic.png" alt="profile" title="thierry" />
                                <span class="profile-name">@thierry</span>
                                <div class="event-pic">
                                    <img src="<?php echo base_url(); ?>assets/event/<?php echo $value['image1'] ?>" alt="event-pic" title="Event" />
                                </div>
                                <div class="event-actions row">
                                    <?php 
                                    $tags=explode(",",$value['tags']);
                                    foreach ($tags as $keyT => $valueT) {
                                    ?>
                                    <div class="col-6">
                                        <button class="clothes-btn"><?php echo $valueT;?></button>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="col-lg-6 event-details">
                                <h4><?php echo $value['name'] ?></h4>
                                <p class="event-location">
                                    <i class="material-icons">location_on</i>&nbsp;
                                    <?php echo $value['location'] ?>
                                </p>
                                <p class="event-date">
                                    <i class="material-icons">event_note</i>&nbsp;
                                    <?php echo $value['date'] ?>
                                </p>
                                <p class="event-attendies">
                                    <i class="material-icons">location_on</i>&nbsp;
                                    <?php echo $value['location'] ?>
                                </p>
                                <p class="event-description">
                                    <?php echo $value['description'] ?>
                                </p>
                            </div>
                            <div class="col-lg-3 action-menus">
                                <p class="event-acceptnance">
                                    You have accepted this event
                                </p>
                                <button class="invite-btn">
                                    invite users
                                </button>
                                <div class="row action-items">
                                    <div class="col-3">
                                        <img src="./assets/events/assets/images/like-icon.png" />
                                        <span>25</span>
                                    </div>
                                    <div class="col-3">
                                        <img src="./assets/events/assets/images/comment-icon.png" />
                                        <span>7</span>
                                    </div>
                                    <div class="col-3">
                                        <img src="./assets/events/assets/images/share-icon.png" />
                                    </div>
                                    <div class="col-3">
                                        <img src="./assets/events/assets/images/more-icon.png" />
                                    </div>
                                </div><br />
                                <div class="start-chat">
                                    <a class="start-chat-link" href="#">
                                        <i class="material-icons">textsms</i>&nbsp;&nbsp;Start Chat with host
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php }}?>
                
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <a href="#">
                            <img src="./assets/events/assets/images/footer/vefinder-footer-logo.png" alt="vifinder-logo" title="Vifinder" />
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <div class="footer-links">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Shop</a></li>
                                <li><a href="#">Team</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="social-links">
                            <ul>
                                <li>
                                    <a href="http://www.facebook.com">
                                        <img src="./assets/events/assets/images/footer/social-fb.png" />
                                    </a>
                                </li>
                                <li>
                                    <a href="http://www.twitter.com">
                                        <img src="./assets/events/assets/images/footer/social-tw.png" />
                                    </a>
                                </li>
                                <li>
                                    <a href="http://plus.google.com">
                                        <img src="./assets/events/assets/images/footer/social-gp.png" />
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="country-links">
                    <ul>
                        <li>
                            <a href="#">
                                <img src="./assets/events/assets/images/footer/denmark.png" alt="Denmark" title="Denmark" />
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="./assets/events/assets/images/footer/india.png" alt="India" title="India" />
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="./assets/events/assets/images/footer/us.png" alt="US" title="United States of America" />
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="./assets/events/assets/images/footer/spain.png" alt="Spain" title="Spain" />
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="./assets/events/assets/images/footer/uk.png" alt="UK" title="United Kingdom" />
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="./assets/events/assets/images/footer/china.png" alt="china" title="China" />
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="./assets/events/assets/images/footer/italy.png" alt="Italy" title="Italy" />
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="payment-finance col-lg-6">
                        <div class="payment">
                            <span class="payment-label">Payment Options</span>
                            <ul class="payment-links">
                                <li>
                                    <a href="#">
                                        <img src="./assets/events/assets/images/footer/mastercard.png" alt="Master-Card" title="Master Card" />
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="./assets/events/assets/images/footer/visa.png" alt="Visa" title="Visa" />
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="./assets/events/assets/images/footer/amex.png" alt="American-Express" title="American-Express" />
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="./assets/events/assets/images/footer/discover.png" alt="Discover" title="Discover" />
                                    </a>
                                </li>
                            </ul>
                        </div><br />
                        <div class="finance">
                            <span class="finance-label">Finance Options</span>
                            <ul class="finance-links">
                                <li>
                                    <a href="#">
                                        <img src="./assets/events/assets/images/footer/viabill.png" alt="Viabill" title="Viabill" />
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="privacy-tnc col-lg-6">
                        <ul class="privacy-tnc-links">
                            <li>
                                <a href="#">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="#">Terms and Conditions</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="assets/events/assets/js/jquery.min.js"></script>
    <script src="assets/events/assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/events/assets/js/jquery.easing.min.js"></script>
    <script src="assets/events/assets/js/scrolling-nav.js"></script>
    <script src="assets/events/assets/js/commons.js"></script>
  </body>
</html>