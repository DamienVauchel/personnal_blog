<?php
use App\Controller;

if(!empty($_GET['id']) && isset($_POST["suppr"]))
{
    $post_controller = new Controller();
    $post_controller->supprPost();
}
?>

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
            <div class="text-right"><a class="btn btn-danger" data-toggle="modal" data-target="#suppressModal">Supprimer l'article</a></div>
            <!-- Modal -->
            <div class="modal fade" id="suppressModal" tabindex="-1" role="dialog" aria-labelledby="suppressModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="suppressModalLabel">Suppression de post</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
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