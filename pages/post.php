<div id="blue">
    <div class="container">
        <div class="row centered">
            <div class="col-lg-8 col-lg-offset-2">
                <h1 class="text-center"><b><?= $post->getTitle(); ?></b></h1>
                <div class="text-right">
                    <div><b>
                            <?php
                            if($post->getUpdateDate() != $post->getCreationDate())
                            {
                                echo "Mis à jour";
                            }
                            else
                            {
                                echo "Ecrit";
                            }
                            ?> par: <?= $post->getAuthor(); ?></b>
                        <div style="text-decoration: underline; font-weight: bold;"><i class="fa fa-clock-o" aria-hidden="true"></i> Date de la dernière mise à jour: <?= $post->getUpdateDate(); ?></div>
                    </div>
                </div>
            </div>
        </div><!-- row -->
    </div><!-- container -->
</div><!--  bluewrap -->

<div class="container desc">
    <div class="row thumbnail home-post-mobile">
        <br>
        <div class="text-left col-md-6" ><a href="index.php?update&id=<?= $post->getId(); ?>" class="btn btn-primary">Modifier l'article</a></div>
        <div class="text-right col-md-6">
            <a href="index.php?blog" class="return"><p><i class="fa fa-hand-o-right" aria-hidden="true"></i> Retourner à la liste des articles</p></a>
        </div>
        <br>
        <br>
        <div class="col-xs-12">
            <img class="center-block img-responsive" src="assets/post_photo/<?= $post->getPhoto(); ?>" alt="">
        </div>
        <br>
        <div class="col-xs-12">
            <p class="post-content"><?= $post->getContent(); ?></p>
        </div>
        <br>
        <div class="text-right"><a class="btn btn-danger" data-toggle="modal" data-target="#suppressModal">Supprimer l'article</a></div>
        <!-- Modal -->
        <div class="modal fade" id="suppressModal" tabindex="-1" role="dialog" aria-labelledby="suppressModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h5 class="modal-title" id="suppressModalLabel">Suppression de post</h5>
                    </div>
                    <div class="modal-body">
                        <div>Etes-vous certain(e) de vouloir supprimer le post?</div>
                    </div>
                    <div class="modal-footer">
                        <form action="index.php?post&id=<?= $post->getId(); ?>" method="post">
                            <input type="submit" class="btn btn-danger" name="suppr" value="Oui">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin du Modal -->
        <br>
    </div><!-- row -->
</div>