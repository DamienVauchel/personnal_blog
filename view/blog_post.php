<?php
require "header.php";
require "../model/PostManager.php";
require '../model/admin/db.php';

if(!empty($_GET['id'])) {
    $id = checkinput($_GET['id']);
}

$db = Database::connect();
$post_manager = new PostManager($db);
$post = $post_manager->getPost($id);

function checkInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST["suppr"]))
{
    $db = Database::connect();
    $statement = $db->prepare(" DELETE
                                FROM post
                                WHERE id = ?");
    $statement->execute(array($id));

    Database::disconnect();
    header("Location: blog.php");
}
?>

    <div id="blue">
        <div class="container">
            <div class="row centered">
                <div class="col-lg-8 col-lg-offset-2">
                    <h1 class="text-center"><b><?php echo $post->getTitle(); ?></b></h1>
                    <div class="text-right">
                        <div><b><?php   if($post->getUpdateDate() != null)
                                        {
                                            echo "Mis à jour";
                                        }
                                        else
                                        {
                                            echo "Ecrit";
                                        }?> par: <?php echo $post["auteur"]; ?></b>
                            <div style="text-decoration: underline; font-weight: bold;"><i class="fa fa-clock-o" aria-hidden="true"></i> Date de la dernière mise à jour: <?php   if($post["date_modif"] != null)
                                                                                                                                        {
                                                                                                                                            echo $post["date_modif"];
                                                                                                                                        }
                                                                                                                                        else
                                                                                                                                        {
                                                                                                                                            echo $post["date_creation"];
                                                                                                                                        }?>
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
            <div class="text-left"><a href="updatepost.php?id=<?php echo $post["id"]; ?>" class="btn btn-primary">Modifier l'article</a></div>
            <br>
            <br>
            <div class="col-xs-12">
                <img src="../assets/post_photo/<?php echo $post["photo"]; ?>" alt="" style="width: 100%;">
            </div>
            <br>
            <div class="col-xs-12">
                <p><?php echo $post["contenu"]; ?></p>
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
                            <form action="blog_post.php?id=<?php echo $id; ?>" method="post">
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

<?php require "footer.php"; ?>