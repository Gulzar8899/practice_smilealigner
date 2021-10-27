<?php
$session_data = $this->session->userdata('doctor_data');
$uncompleted_doctor_data = $this->session->userdata('uncompleted_doctor_data');
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Smile Aligners</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="author" content=""/>

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content=""/>
    <meta name="twitter:image" content=""/>
    <meta name="twitter:url" content=""/>
    <meta name="twitter:card" content=""/>

    <!-- <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet"> -->

    <!-- Animate.css -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/animate.css?" . time()) ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/font-awesome/css/font-awesome.css?" . time()) ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/custom_css.css?" . time()) ?>">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/icomoon.css?" . time()) ?>">
    <!-- Themify Icons-->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/themify-icons.css?" . time()) ?>">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css?" . time()) ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css?" . time()) ?>">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/magnific-popup.css?" . time()) ?>">
    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/owl.carousel.min.css?" . time()) ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/owl.theme.default.min.css?" . time()) ?>">
    <!-- Flexslider -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/flexslider.css?" . time()) ?>">
    <!-- Theme style  -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css?" . time()) ?>">
    <!-- Modernizr JS -->
    <script src="<?php echo base_url("assets/js/modernizr-2.6.2.min.js?" . time()) ?>"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url(" assets/js/respond.min.js?".time())?>"></script>
    <![endif]-->
    <script src="<?php echo base_url("assets/js/jquery.min.js?" . time()) ?>"></script>
    <?php
    if ($this->router->fetch_class() == "faqs") {
        ?>
        <!--treeview css for faqs page-->
        <link rel="stylesheet" href='<?php echo base_url("assets/treeView/css/jquery.treeView.css"); ?>'>
        <?php
    }
    ?>
    <style>
        #doctor_login_modal .modal-header, #doctor_login_modal h4, #doctor_login_modal .close, #forgot_password_modal .modal-header, #forgot_password_modal h4 {
            background-color: #5cb85c;
            color: white !important;
            text-align: center;
            font-size: 30px;
        }
        .login_button:hover{
            background: #f9644d!important;
            color:white;
        }
        #doctor_login_modal .modal-footer {
            background-color: #f9f9f9;
        }

        #doctor_profile .form-control {

            height: 35px;
            font-size: 14px;

        }

        html, body {
            font-size: 16px;
        }

    </style>
    <!--<link href="http://vjs.zencdn.net/6.4.0/video-js.css" rel="stylesheet">-->
</head>
<body>

<div class="ubea-loader"></div>
<div id="page">
    <nav class="ubea-nav" role="navigation">
        <div class="ubea-container">
            <div class="row">
                <div class="col-sm-3 col-xs-12">
                    <div id="ubea-logo"><a href="<?php echo base_url(); ?>"><img style="max-width: 200px;margin: 5px auto;" class="headerlogo" src="<?php echo base_url("assets/images/new/smilealigners_logo_0.png")?>"></a></div>
                </div>
                <div class="col-xs-9 text-right menu-1 main-nav">
                    <ul id="top_menu_bar" >
                        <li id="home"><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li id="aboutus"><a href="<?php echo base_url('aboutus'); ?>">About us</a></li>
                        <li id="services"><a href="<?php echo base_url('services'); ?>">Services</a></li>
<!--                        --><?php //if (isset($session_data)) { ?>
                            <li id="requirement"><a href="<?php echo base_url("requirement") ?>">Order Form</a></li>
<!--                        --><?php //} ?>
                        <li id="locate_orthodontist"><a href="<?php echo base_url("locate_orthodontist") ?>">Locate an Orthodontist</a></li>
                        <li id="gallery"><a href="<?php echo base_url('gallery'); ?>">Smile Gallery</a></li>

                        <li id="contactus"><a href="<?php echo base_url('/contactus'); ?>">Contact</a></li>
                        <?php if (isset($session_data)) { ?>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">My Profile
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu" style="background-color: #f6fcff!important;">
                                    <li id="orders" style="padding: 0"><a style="margin:8px;" href="<?php echo base_url("my_account") ?>">My Account</a></li>
                                    <li id="orders" style="padding: 0"><a style="margin:8px;" href="<?php echo base_url("orders_list") ?>">Orders</a></li>

                                    <li style="padding: 0;"><a style="margin-left: 8px;margin:10px;" href="<?php echo base_url("home/logout"); ?>" id="doctor_logout_button"
                                           class="doctor_logout_button">Logout</a>
                                    </li>
                                </ul>
                            </li>

                        <?php } else { ?>
                                    <li><a href="#" id="doctor_login_button" class=" js-ubea-nav-toggle "
                                data-toggle="modal" data-target="#doctor_login_modal" style="">Doctor Login</a></li>
                        <?php } ?>

                        <?php
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>