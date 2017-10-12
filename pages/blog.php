<?php
use App\PostController;

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
    <div class="col-md-9">
        <?php foreach($posts as $post): ?>
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
    </div>
    <div class="categories col-md-3 thumbnail">
        <h1 class="text-center"><b>Catégories</b></h1>
        <ul>
            <?php foreach ( as $category): ?>
                <li>
                    <a href=""></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>  <!-- CATEGORIES END -->
<!--Database::disconnect();-->
</div>