<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Personal framework</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="./web/assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="./web/assets/css/bootstrap-theme.min.css" rel="stylesheet">
        <script src="./web/assets/js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body class="container">
        
            <!--[if lt IE 7]>
                <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
            <![endif]-->

            <div class="page-header">
                <h1 class="container">Personal PHP Framework<br>
                    <small>by Valentin DAGUENET</small>
                </h1>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="list-group">
                        <nav>
                            <a href="?/Default" class="list-group-item">Home</a>
                            <a href="?/News/index" class="list-group-item">News</a>
                            <a href="?/User/index" class="list-group-item">Profile</a>
                        </nav>
                    </div>
                </div>
                <div class="col-md-8">
                    <div>
                        <!-- The view called in controllersis here -->
                        <?php include($viewName.'.php'); ?>
                    </div> 
                </div>
            </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="./web/assets/js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="./web/assets/js/vendor/bootstrap.min.js"></script>
        <script src="./web/assets/js/plugins.js"></script>
    </body>
</html>
