<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../assets/img/favicon.png">

    <title>Blog de Damien Vauchel</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/main.css" rel="stylesheet">


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
                <?php   $path = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                            $current = basename ($path); ?>
                    <li <?php if ($current == 'index.php'){ echo "class = 'active'";}?>><a href="index.php">ACCUEIL</a></li>
                    <li <?php if ($current == 'blog.php'){ echo "class = 'active'";}?>><a href="blog.php">BLOG</a></li>
                    <li class="dropdown <?php if ($current == 'addpost.php' || $current == 'updatepost.php'){echo "active";}?>">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">ADMIN <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="addpost.php">AJOUTER UN POST</a></li>
                          <li><a href="updatepost.php">MODIFIER UN POST</a></li>
                        </ul>
                    </li>
                    <li><a data-toggle="modal" data-target="#myModal" href="#myModal"><i class="fa fa-envelope-o"></i></a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>