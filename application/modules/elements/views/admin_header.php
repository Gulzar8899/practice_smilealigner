<!doctype html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>
    <link rel="icon" type="image/png" href="assets/img/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="assets/img/favicon-32x32.png" sizes="32x32">
    <title>SmileAligners</title>

    <!-- <link href="<?php echo base_url(); ?>assets/admin/bower_components/bootstrap/css/bootstrap.css" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/admin/bower_components/weather-icons/css/weather-icons.min.css" media="all">
    <!-- metrics graphics (charts) -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/admin/bower_components/metrics-graphics/dist/metricsgraphics.css">
    <!-- chartist -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/admin/bower_components/chartist/dist/chartist.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/admin/bower_components/uikit/css/uikit.almost-flat.min.css" media="all">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/admin/bower_components/uikit/css/uikit-accordion.min.css" media="all">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/admin/assets/icons/flags/flags.min.css" media="all">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/admin/assets/css/main.min.css" media="all">
    <link rel="shortcut icon" type="image/svg" href="<?= base_url(); ?>assets/images/icon.svg">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/admin/assets/css/custom.css" media="all">
    <!-- <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/admin/assets/css/slick.css" media="all"> -->
    <!-- <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/admin/assets/css/slick-theme.css" media="all"> -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.2/css/components/slider.almost-flat.min.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.2/css/components/slider.min.css"> -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/admin/assets/skins/dropify/css/dropify.css">
    <link type="text/css" href="<?php echo base_url('assets/admin/assets/js/custom_file/fileinput.css') ?>" rel="stylesheet">
    <script src="<?php echo base_url(); ?>assets/admin/bower_components/jquery/jquery.min.js"></script>
    <link type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="https://getuikit.com/css/theme.css?1455"> -->
    <!-- <script src="<?= base_url(); ?>assets/admin/assets/js/common.min.js"></script> -->
    <script src="<?= base_url(); ?>assets/admin/assets/js/stl_viewer.min.js"></script>
    <script type="text/javascript">
      var base_url        = "<?= base_url() ?>";
      var site_url        = "<?= base_url() ?>";
    </script>
</head>
<!-- <body class=" sidebar_main_open sidebar_main_swipe"> -->
    <body class="sidebar_main_open sidebar_main_swipe">
    <!-- main header -->
    <header style="background-color: #F2E6CC; padding-top:20px; padding-bottom: 30px;  margin-left: 0 !important;" id="header_main">
        <div class="header_main_content">
            <nav class="uk-navbar">
                <a style=" padding-left: 6px !important;padding-right: 6px !important;padding-top: 12px !important;border-radius: 4px !important;background-color: #6D3745;" href="#" id="sidebar_main_toggle" class="sSwitch sSwitch_left"> <span class="sSwitchIcon"></span>
                </a>
                <a  href="#"  class="sSwitc">
                    <img style="max-width: 150px;margin: 1px auto; margin-top: 10px;" class="headerlogo" src="<?= base_url(); ?>assets/images/logo.svg">
                </a>
               <a href="#" id="" class="user_action_icon uk-visible-large">
                <input class="inputSetting" type="text" placeholder="Search..">
                <img class="inputIconSetting" src="<?php echo site_url('assets/images/search-icon.svg'); ?>">
              </a>

            <style>
                html{
                    padding-right: 0px !important;
                }
                @media screen and (max-width: 600px) {
                .inputSetting{
                        float: none;
                        display: block;
                        text-align: left;
                        width: 100%;
                        margin: 0;
                        padding: 14px;
                }
                .inputSetting{
                      border: 1px solid #ccc; 
                }
            }
            .inputSetting{
              margin-left: 42px;
              width: 350px;
              padding: 0px !important;
              margin-top: 8px;
              margin-right: 16px;
              border: 1px solid rgba(0, 0, 0, 0.1);
              font-size: 13px;
              border-radius: 100px;
              height: 40px;
            }
            </style>