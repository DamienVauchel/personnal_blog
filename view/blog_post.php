<?php require "header.php"; ?>
<?php
require '../model/admin/db.php';

if(!empty($_GET['id'])) {
    $id = checkinput($_GET['id']);
}

$db = Database::connect();
$statement = $db->prepare("   SELECT *
                              FROM post
                              WHERE id = ?");
$statement->execute(array($id));
$post = $statement->fetch();

Database::disconnect();

function checkInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

    <div id="blue">
        <div class="container">
            <div class="row centered">
                <div class="col-lg-8 col-lg-offset-2">
                    <h1 class="text-center"><b><?php echo $post["titre"]; ?></b></h1>
                    <div class="text-right">
                        <div><b>Ecrit par: <?php echo $post["auteur"]; ?></b>
                            <div style="text-decoration: underline; font-weight: bold;"><i class="fa fa-clock-o" aria-hidden="true"></i> Date de dernière mise à jour: <?php   if($post["date_modif"] != null)
                                                                                                                                    {
                                                                                                                                        echo $post["date_modif"];
                                                                                                                                    }
                                                                                                                                    else
                                                                                                                                    {
                                                                                                                                        echo $post["date_creation"];
                                                                                                                                    }?></div>
                        </div>
                    </div>
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </div><!--  bluewrap -->


    <div class="container desc">
        <div class="row thumbnail">
            <br><br>
            <div class="col-xs-12">
                <img src="../assets/post_photo/<?php echo $post["photo"]; ?>" alt="" style="width: 100%;">
            </div>
            <br>
            <div class="col-xs-12">
                <p><?php echo $post["contenu"]; ?></p>
            </div>
            <br><br>
        </div><!-- row -->
    </div>

<?php require "footer.php"; ?>