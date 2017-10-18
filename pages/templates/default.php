<?php use App\Functions; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.png">

    <title>Blog de Damien Vauchel</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-- Fixed navbar -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">&lt;?php Damien_V ?&gt;</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <?php
                //                $path = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                //                $current = basename ($path);
                ?>
                <li><a href="index.php">ACCUEIL</a></li>
                <li><a href="index.php?blog">BLOG</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">ADMIN <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php?addpost">AJOUTER UN POST</a></li>
                    </ul>
                </li>
                <li><a data-toggle="modal" data-target="#myModal" href="#myModal"><i class="fa fa-envelope-o"></i></a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
<div id="header"></div>
<?= $content; ?>
<!-- FOOTER -->
<div id="f">
    <div class="container">
        <div class="row centered">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <a href="http://www.damienvauchel.com" target="_blank"><i class="fa fa-user" aria-hidden="true"></i></a>
                <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="#" target="_blank"><i class="fa fa-github"></i></a>
            </div>
            <div class="col-md-1"><a href="#header" id="gotop"><i class="fa fa-angle-up" aria-hidden="true"></i></a></div>
        </div><!-- row -->
    </div><!-- container -->
</div><!-- Footer -->

<?php require "include/modal_contact_form.php"; ?>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script>
    $(function ()
    {
        $('#gotop').on('click', function(e)
        {
            e.preventDefault();
            var hash = this.hash;
            $('html, body').animate(
                {
                    scrollTop: $(this.hash).offset().top
                }, 1000, function()
                {
                    window.location.hash = hash;
                });
        });
    });
</script>
</body>
</html>