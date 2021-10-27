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
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content=""/>
    <meta name="twitter:image" content=""/>
    <meta name="twitter:url" content=""/>
    <meta name="twitter:card" content=""/>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/front/css/animate.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/front/css/font-awesome.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/front/css/custom_css.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/front/css/main.min.css">
    <link rel="shortcut icon" type="image/svg" href="<?= base_url(); ?>assets/images/icon.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/front/uikit/css/uikit.almost-flat.min.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/front/css/icomoon.css">
    <!-- Themify Icons-->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/front/css/themify-icons.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/front/css/bootstrap.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/front/css/magnific-popup.css">
    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/front/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/front/css/owl.theme.default.min.css">
    <!-- Flexslider -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/front/css/flexslider.css">
    <!-- Theme style  -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/front/css/style.css">

    <!-- altair admin -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/assets/css/main.min.css" media="all">

    <!-- Modernizr JS -->
    <script src="<?= base_url(); ?>assets/front/js/modernizr-2.6.2.min.js"></script>
    <script src="<?= base_url(); ?>assets/front/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/admin/assets/js/custom/uikit_fileinput.min.js"></script>    
    <style type="text/css">
        body{
            font-family:Lato;
        }
    </style>
        <style>
        #doctor_login_modal .modal-header, #doctor_login_modal h4, #doctor_login_modal .close, #forgot_password_modal .modal-header, #forgot_password_modal h4 {
            background-color: #5cb85c;
            color: white !important;
            text-align: center;
            font-size: 30px;
        }
        .login_button:hover{
            /*background: #f9644d!important;*/
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
            background-color: #805046;
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
                <div class="col-sm-2 col-xs-12">
                    <div id="ubea-logo">
						<a href="<?= site_url('home'); ?>">
							<img style="max-width: 200px;margin: 5px auto;" class="headerlogo" src="<?= base_url(); ?>assets/images/logo.svg">
						</a>
					</div>
                </div>
                <div class="col-xs-10 text-right menu-1 main-nav">
                    <ul id="top_menu_bar" >
					<li id="home"><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li id="aboutus"><a href="<?php echo base_url('aboutus'); ?>">About us</a></li>
                        <li id="services"><a href="<?php echo base_url('services'); ?>">Services</a></li>
                        <li id="requirement"><a href="<?php echo base_url("requirement") ?>">Order Form</a></li>
                        <li id="locate_orthodontist"><a href="<?php echo base_url("locate_orthodontist") ?>">Locate an Orthodontist</a></li>
                        <li id="gallery"><a href="<?php echo base_url('gallery'); ?>">Smile Gallery</a></li>
                        <li id="contactus"><a href="<?php echo base_url('/contactus'); ?>">Contact</a></li>
<!--                       <li><a href="--><?//= site_url('login'); ?><!--" id="doctor_login_button" style="">Doctor Login</a></li>-->
						<li><a href="#" id="doctor_login_button" class=" js-ubea-nav-toggle "
							   data-toggle="modal" data-target="#doctor_login_modal" style="">Doctor Login</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <style>
        body{
            color: #fff;
        }
        .welcome .row {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            flex-wrap: wrap;
        }

        .welcome .row > [class*='col-'] {
            /*display: flex;*/
            /*flex-direction: column;*/
        }

        .carousel-inner .item img {
            width: 100%
        }
        
        .ubea-container{
            
        }
        
        h4.title-bold{
            color: #fff;
        }
    </style>
	<style>
		.footer_pstyle{
			color: #eee;
		}

		.btn-site{
			border: 2px solid #FFF !important;
		}

		.btn-site:hover{
			border: 1px solid #FFF !important;
		}

		.modal-size{
			width: 384px;
			margin-left: auto;
			margin-right: auto;
		}


		.modal-size .form-control{
			background: rgba(0, 0, 0, 0.05);
			border: 1px solid rgba(0, 0, 0, 0.1);
			box-sizing: border-box;
			border-radius: 100px;

		}


		.modal-size button{
			border-radius: 15px;


			/* Login */

			font-family: Lato;
			align-items: center;
			text-align: center;
			color: #FFFFFF;


		}


		.modal-size label{
			color: #52575C;
		}


		.modal-size .modal-header{
			background-color: #F0E0C9 !important;
			border-radius: 6px;
			padding:15px;"
		}

		.modal-size .modal-title{
			font-weight: bold;
			font-size: 36px;
			line-height: 90%;
			color: #6D3745;
			text-align: center
		}
		/*--------------------------------------------------------------*/
		/* The container */
		.container {
			display: block;
			position: relative;
			padding-left: 35px;
			margin-bottom: 12px;
			cursor: pointer;

			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}

		/* Hide the browser's default checkbox */
		.container input {
			position: absolute;
			opacity: 0;
			cursor: pointer;
			height: 0;
			width: 0;
		}

		/* Create a custom checkbox */
		.checkmark {
			position: absolute;
			border: 1px solid gray;
			top: 8px;
			left: 0;
			height: 17px;
			width: 17px;
		}

		/* On mouse-over, add a grey background color */
		.container:hover input ~ .checkmark {
			background-color: #ccc;
		}

		/* When the checkbox is checked, add a blue background */
		.container input:checked ~ .checkmark {
			background-color: #fff;
			position: absolute;
			border: 1px solid gray;
			top: 8px;
			left: 0;
			height: 17px;
			width: 17px;

		}

		/* Create the checkmark/indicator (hidden when not checked) */
		.checkmark:after {
			content: "";
			position: absolute;
			display: none;
		}

		/* Show the checkmark when checked */
		.container input:checked ~ .checkmark:after {
			display: block;
		}

		/* Style the checkmark/indicator */
		.container .checkmark:after {
			left: 7px;
			top: -9px;
			width: 9px;
			height: 19px;
			border: solid #56BB6D;
			border-width: 0 3px 3px 0;
			-webkit-transform: rotate(45deg);
			-ms-transform: rotate(45deg);
			transform: rotate(45deg);
		}
		@media (max-width: 768px) {

			#doctor_logins p{
				margin-left: 0px !important;
			}

			#doctor_logins .form-group{
				margin-left: 0px !important;
			}

			#doctor_logins #nextForgetType{
				margin: 20% 0% 4% !important;
			}

			#doctor_logins #goBackToLogin{
				margin-left: 0px !important;
			}
		}

	</style>

	<style>
		.widthSetting{
			width:884px !important;
			margin-top:150px;
			margin-bottom: 40px;
		}
		@media only screen and (max-width: 600px) {
			.widthSetting{
				width:384px !important;
				margin-top:150px;
				margin-bottom: 40px;
			}
		}
		.me-5 {
			margin-right: 48px;
			margin-top: 10px;
		}
		.d-flex {
			display: flex !important;
			margin-top: 20px;
			margin-bottom: 45px;
		}
		.footer_pstyle{
			color: #eee;
		}
		.btn-site{
			border: 2px solid #FFF !important;
		}
		.btn-site:hover{
			border: 1px solid #FFF !important;
		}
		.modal-size{
			width: 384px;
			margin-left: auto;
			margin-right: auto;
		}
		.modal-size .form-control{
			background: rgba(0, 0, 0, 0.05);
			border: 1px solid rgba(0, 0, 0, 0.1);
			box-sizing: border-box;
			border-radius: 100px;
		}
		.modal-size button{
			border-radius: 15px;
			font-family: Lato;
			align-items: center;
			text-align: center;
			color: #FFFFFF;
		}
		.modal-size label{
			color: #52575C;
		}
		.modal-size .modal-header{
			background-color: #F0E0C9 !important;
			border-radius: 6px;
			padding:25px;
		}
		.modal-size .modal-title{
			font-weight: bold;
			font-size: 36px;
			line-height: 90%;
			color: #6D3745;
			text-align: center
		}
		.user_heading_avatar {
			float: left;
			margin-right: 24px;
			position: relative;
		}
		/* The container */
		.container {
			display: block;
			position: relative;
			padding-left: 30px;
			margin-bottom: 12px;
			cursor: pointer;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}

		/* Hide the browser's default checkbox */
		.container input {
			position: absolute;
			opacity: 0;
			cursor: pointer;
			height: 0;
			width: 0;
		}

		/* Create a custom checkbox */
		.checkmark {
			position: absolute;
			border: 1px solid gray;
			top: 2px;
			left: 0;
			height: 17px;
			width: 17px;
		}

		/* On mouse-over, add a grey background color */
		.container:hover input ~ .checkmark {
			background-color: #ccc;
		}

		/* When the checkbox is checked, add a blue background */
		.container input:checked ~ .checkmark {
			background-color: #fff;
			position: absolute;
			border: 1px solid gray;
			top: 2px;
			left: 0;
			height: 17px;
			width: 17px;

		}

		/* Create the checkmark/indicator (hidden when not checked) */
		.checkmark:after {
			content: "";
			position: absolute;
			display: none;
		}

		/* Show the checkmark when checked */
		.container input:checked ~ .checkmark:after {
			display: block;
		}

		/* Style the checkmark/indicator */
		.container .checkmark:after {
			left: 7px;
			top: -9px;
			width: 9px;
			height: 19px;
			border: solid #56BB6D;
			border-width: 0 3px 3px 0;
			-webkit-transform: rotate(45deg);
			-ms-transform: rotate(45deg);
			transform: rotate(45deg);
		}
	</style>

