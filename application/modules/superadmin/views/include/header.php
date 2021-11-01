<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Smile Aligners</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <link rel="stylesheet" href="<?php echo base_url("assets/css/animate.css?".time())?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/font-awesome/css/font-awesome.css?".time())?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css?".time())?>">
    <script src="<?php echo base_url("assets/js/modernizr-2.6.2.min.js?".time())?>"></script>
    <script src="<?php echo base_url("assets/js/jquery.min.js?".time())?>"></script>
    <?php
    if($this->router->fetch_class()=="superadmin") {
        if($this->router->fetch_method() == "login") {?>
            <link rel="stylesheet" href='<?php echo base_url("assets/superadmin/css/login_style.css?".time()); ?>'>
        <?php }else if($this->router->fetch_method() == "index"){?>
            <link rel="stylesheet" href="<?php echo base_url("assets/superadmin/css/admin_panel.css?".time())?>">
        <?php }
    }
    ?>
</head>
<body>
<?php if($this->router->fetch_method() !== "login") {?>

<?php }?>
