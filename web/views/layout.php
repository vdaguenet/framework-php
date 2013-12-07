<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <!--<link rel="stylesheet" href="./web/assets/css/normalize.css">-->
        <!--<link rel="stylesheet" href="./web/assets/css/main.css">-->
        <link href="./web/assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="./web/assets/css/bootstrap-theme.min.css" rel="stylesheet">
        <script src="./web/assets/js/vendor/modernizr-2.6.2.min.js"></script>
        
    </head>
    <body>
        
            <!--[if lt IE 7]>
                <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
            <![endif]-->

            <!-- Add your site or application content here -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation">
                <ul class="nav nav-pills container">
                    <li class="active"><a href="?/Default">Home</a></li>
                    <li><a href="?/News/index">News</a></li>
                    <li><a href="?/User/index">Profile</a></li>
                </ul>
            </nav>
            <div class="page-header">
                <h1 class="container">Personal PHP Framework<br>
                    <small>by Valentin DAGUENET</small>
                </h1>
            </div>
        <div class="container">
            <?php include($viewName.'.php'); ?>
        </div> 

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="./web/assets/js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="./web/assets/js/vendor/bootstrap.min.js"></script>
        <script src="./web/assets/js/plugins.js"></script>
        <script src="./web/assets/js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
    </body>
</html>
