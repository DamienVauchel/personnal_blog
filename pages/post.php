    <div id="blue">
        <div class="container">
            <div class="row centered">
                <div class="col-lg-8 col-lg-offset-2">
                    <h1 class="text-center"><b><?= $post->getTitle(); ?></b></h1>
                    <div class="text-right">
                        <div><b>
                                <?php
                                if($post->getUpdateDate() != null)
                                {
                                    echo "Mis à jour";
                                }
                                else
                                {
                                    echo "Ecrit";
                                }
                                ?> par: <?= $post->getAuthor(); ?></b>
                            <div style="text-decoration: underline; font-weight: bold;"><i class="fa fa-clock-o" aria-hidden="true"></i> Date de la dernière mise à jour: <?php
                                                                                                                                if($post->getUpdateDate() != null)
                                                                                                                                {
                                                                                                                                    echo $post->getUpdateDate();
                                                                                                                                }
                                                                                                                                else
                                                                                                                                {
                                                                                                                                    echo $post->getCreationDate();
                                                                                                                                }
                                                                                                                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </div><!--  bluewrap -->


    <div class="container desc">
        <div class="row thumbnail">
            <br>
            <div class="text-left"><a href="index.php?update&id=<?= $post->getId(); ?>" class="btn btn-primary">Modifier l'article</a></div>
            <br>
            <br>
            <div class="col-xs-12">
                <img src="assets/post_photo/<?= $post->getPhoto(); ?>" alt="" style="width: 100%;">
            </div>
            <br>
            <div class="col-xs-12">
                <p><?= $post->getContent(); ?></p>
            </div>
            <br>
            <div class="text-right"><a class="btn btn-danger" href="index.php?delete&id=<?= $post->getId(); ?>">Supprimer l'article</a></div>
            <br>
        </div><!-- row -->
    </div>