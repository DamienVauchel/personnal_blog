<?php
require "header.php";
require "../CONTROLLER/PostController.php";

$post_controller = new PostController();
?>

<div id="blue">
    <div class="container">
        <div class="row centered">
            <div class="col-lg-8 col-lg-offset-2">
            <h1><b>BLOG</b></h1>
            <h2>Liste des articles</h2>
            </div>
        </div><!-- row -->
    </div><!-- container -->
</div><!--  bluewrap -->


<div class="container desc">
    <?php
    $post_controller->getList();
    ?>
</div>

<?php require "footer.php"; ?>