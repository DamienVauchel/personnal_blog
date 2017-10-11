<?php
require "include/header.php";
use APP\PostController;

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
    <?php foreach($posts as $post):
    //            die(var_dump($post)); ?>
    <a href="index.php?blog_post&id=<?= $post->getId(); ?>">
        <div class="row thumbnail">
            <div class="col-md-6">
                <img src="assets/post_photo/<?= $post->getPhoto(); ?>" alt="" style="max-width: 100%;">
            </div>
            <div class="col-md-6">
                <h2 class="text-center"><b><?= strtoupper($post->getTitle()); ?></b></h2>
                <div class="text-right">
                    <small style="text-decoration: underline;">
                        <i class="fa fa-clock-o" aria-hidden="true"></i> Date de dernière mise à jour: <?php if($post->getUpdateDate() != null)
                        {
                            echo $post->getUpdateDate();
                        }
                        else
                        {
                            echo $post->getCreationDate();
                        }?>
                    </small>
                </div>
                <p>
                    <?= $post->getChapo(); ?>
                </p>
                <p class="text-right">... Lire l'article</p>
            </div>
        </div><!-- row -->
    </a>

    <hr>
    <?php endforeach; ?>
<!--Database::disconnect();-->
</div>

<?php require "include/footer.php"; ?>