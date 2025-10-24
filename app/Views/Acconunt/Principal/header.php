<!DOCTYPE html>
<html data-bs-theme="light" lang="es-419" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title><?php echo lang('App.general.sistema');?></title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180"
        href="<?php echo base_url();?>assets/assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32"
        href="<?php echo base_url();?>assets/assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16"
        href="<?php echo base_url();?>assets/assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon"
        href="<?php echo base_url();?>assets/assets/img/favicons/favicon.ico">
    <link rel="manifest" href="<?php echo base_url();?>assets/assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage"
        content="<?php echo base_url();?>assets/assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="<?php echo base_url();?>assets/assets/js/config.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/simplebar/simplebar.min.js"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">
    <link href="<?php echo base_url();?>assets/vendors/simplebar/simplebar.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/assets/css/theme-rtl.css" rel="stylesheet" id="style-rtl">
    <link href="<?php echo base_url();?>assets/assets/css/theme.css" rel="stylesheet" id="style-default">
    <link href="<?php echo base_url();?>assets/assets/css/user-rtl.css" rel="stylesheet" id="user-style-rtl">
    <link href="<?php echo base_url();?>assets/assets/css/user.css" rel="stylesheet" id="user-style-default">
    <link href="<?php echo base_url();?>assets/vendors/choices/choices.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/choices/choices.min.js"></script>
    <script>
    var isRTL = JSON.parse(localStorage.getItem('isRTL'));
    if (isRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
    } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
    }
    const baseUrl = <?php echo json_encode(base_url()); ?>;
    </script>
</head>

<body>
<button class="btn btn-primary" style="display: none;" id="liveToastBtn" type="button">Show live toast</button>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1056">
    <div class="toast fade" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-primary text-white"><strong class="me-auto">Bootstrap</strong><small>11 mins ago</small>
        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">Hello, world! This is a toast message.</div>
    </div>
</div>