<?php
require "header.php";
require "../MODEL/admin/db.php";
require "../CONTROLLER/functions.php";

if(!empty($_GET['id']))
{
    $id = checkInput($_GET['id']);
}

$titreErreur = $contenuErreur = $auteurErreur = $photoErreur = $titre = $contenu = $auteur = $photo = "";

if(!empty($_POST)) {
    $titre              =       checkInput($_POST['title']);
    $contenu            =       checkInput($_POST['content']);
    $auteur             =       checkInput($_POST['author']);
    $photo              =       checkInput($_FILES['photo']['name']);
    $photoPath          =       "../assets/post_photo/" . basename($photo); // Chemin de l'image
    $photoExtension     =       pathinfo($photoPath, PATHINFO_EXTENSION);
    $isSuccess          =       true;

    if(empty($titre)) {
        $titreErreur = "Ce champ ne peut pas être vide";
        $isSuccess = false;
    }

    if(empty($contenu)) {
        $contenuErreur = "Ce champ ne peut pas être vide";
        $isSuccess = false;
    }

    if(empty($auteur))
    {
        $auteurErreur = "Ce champ ne peut pas être vide";
        $isSuccess = false;
    }

    if(empty($photo))
    {
        $isPhotoUpdated = false;
    }
    else
    {
        $isPhotoUpdated = true;
        $isUploadSuccess = true;

        if($photoExtension != "jpg" && $photoExtension != "png" && $photoExtension != "jpeg") {
            $photoErreur = "Les fichiers autorisés sont: .jpg, .jpeg, .png";
            $isUploadSuccess = false;
        }

        if(file_exists($photoPath)) {
            $photoErreur = "Le fichier existe déjà";
            $isUploadSuccess = false;
        }

        if($_FILES['photo']['size'] > 5000000) {
            $imageError = "Le fichier ne peut pas dépasser les 5 MB";
            $isUploadSuccess = false;
        }

        if($isUploadSuccess) {
            if(!move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath)) {
                $photoErreur = "Il y a eu une erreur lors de l'upload";
                $isUploadSuccess = false;
            }
        }
    }

    if(($isSuccess && $isPhotoUpdated && $isUploadSuccess) || ($isSuccess && !$isPhotoUpdated )) {
        $db = Database::connect();
        if($isPhotoUpdated)
        {
            $statement = $db->prepare("  UPDATE post 
                                         SET title = ?, content = ?, author = ?, photo = ?, date_creation = NOW() 
                                         WHERE id = ?");
            $statement->execute(array($titre, $contenu, $auteur, $photo, $id));
        }
        else
        {
            $statement = $db->prepare("  UPDATE post 
                                         SET title = ?, content = ?, author = ?, date_creation = NOW() 
                                         WHERE id = ?");
            $statement->execute(array($titre, $contenu, $auteur, $id));
        }

        Database::disconnect();
        header("Location: blog_post.php?id=".$id);
    }
}
else
{
    $db = Database::connect();
    $statement = $db->prepare("SELECT * FROM post WHERE id = ?;");
    $statement->execute(array($id));
    $post = $statement->fetch();
    $titre = $post['title'];
    $contenu = $post['content'];
    $auteur = $post['author'];
    $photo = $post['photo'];

    Database::disconnect();
}
?>
<?php
//require '../MODEL/admin/db.php';
//
//$titleError = $contentError = $authorError = $photoError = $title = $content = $author = $photo = "";
//
//if(!empty($_POST))
//{
//    $title          = checkInput($_POST['title']);
//    $content        = checkInput($_POST['content']);
//    $author         = checkInput($_POST['author']);
//    $photo          = checkInput($_FILES['photo']['name']);
//    $photoPath      = "../assets/post_photo/" . basename($photo); // Chemin de l'image
//    $photoExtension = pathinfo($photoPath, PATHINFO_EXTENSION);
//    $isSuccess      = true;
//
//    if (empty($title))
//    {
//        $titleError = "Ce champ ne peut pas être vide";
//        $isSuccess = false;
//    }
//
//    if (empty($content))
//    {
//        $contentError = "Ce champ ne peut pas être vide";
//        $isSuccess = false;
//    }
//
//    if (empty($author))
//    {
//        $authorError = "Ce champ ne peut pas être vide";
//        $isSuccess = false;
//    }
//
//    if (empty($photo))
//    {
//        $photoError = "Ce champ ne peut pas être vide";
//        $isSuccess = false;
//    }
//    else
//    {
//        $isUploadSuccess = true;
//
//        if ($photoExtension != "jpg" && $photoExtension != "png" && $photoExtension != "jpeg")
//        {
//            $photoError = "Les fichiers autorisés sont: .jpg, .jpeg, .png";
//            $isUploadSuccess = false;
//        }
//
//        if (file_exists($photoPath))
//        {
//            $photoError = "Le fichier existe déjà";
//            $isUploadSuccess = false;
//        }
//
//        if ($_FILES['photo']['size'] > 5000000)
//        {
//            $imageError = "Le fichier ne peut pas dépasser les 5 MB";
//            $isUploadSuccess = false;
//        }
//
//        if ($isUploadSuccess)
//        {
//            if (!move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath))
//            {
//                $photoError = "Il y a eu une erreur lors de l'upload";
//                $isUploadSuccess = false;
//            }
//        }
//    }
//
//    if (($isSuccess && $isPhotoUpdated && $isUploadSuccess) || ($isSuccess && !$isPhotoUpdated)) {
//        $db = Database::connect();
//        if ($isPhotoUpdated)
//        {
//            $statement = $db->prepare("UPDATE post SET title = ?, content = ?, author = ?, photo = ?, date_modif = NOW() WHERE id = ?");
//            $statement->execute(array($title, $content, $author, $photo, $id));
//        }
//        else
//        {
//            $statement = $db->prepare("UPDATE post SET title = ?, content = ?, author = ?, date_modif = NOW() WHERE id = ?");
//            $statement->execute(array($title, $content, $author, $id));
//        }
//
//        Database::disconnect();
//        header("Location: blog.php");
//    }
//    elseif ($isPhotoUpdated && !$isUploadSuccess)
//    {
//        $db = Database::connect();
//        $statement = $db->prepare("SELECT photo FROM post WHERE id = ?;");
//        $statement->execute(array($id));
//        $post = $statement->fetch();
//        $photo = $post['photo'];
//
//        Database::disconnect();
//    }
//}
//else
//{
//    $db = Database::connect();
//    $statement = $db->prepare("SELECT * FROM post WHERE id = ?;");
//    $statement->execute(array($id));
//    $post = $statement->fetch();
//    $title = $post['title'];
//    $content = $post['content'];
//    $author = $post['author'];
//    $photo = $post['photo'];
//
//    Database::disconnect();
//}
//
//function checkInput($data)
//{
//    $data = trim($data);
//    $data = stripslashes($data);
//    $data = htmlspecialchars($data);
//    return $data;
//}
//
//?>
    <div id="blue">
        <div class="container">
            <div class="row centered">
                <div class="col-lg-8 col-lg-offset-2">
                    <h1><b>MODIFIER UN BLOG POST</b></h1>
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </div><!-- blue wrap -->


    <div class="container w">
        <div class="container" id="updatepost">
            <form class="form" method="post" action="updatepost.php?id=<?php echo $post["id"]; ?>" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="titre" class="col-sm-2 col-form-label">Titre du post</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="titre" id="titre" value="<?php echo $titre; ?>">
                        <span class="help-inline"><?php echo $titreErreur ?></span>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="auteur" class="col-sm-2 col-form-label">Auteur</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="auteur" id="auteur" value="<?php echo $auteur; ?>">
                        <span class="help-inline"><?php echo $auteurErreur ?></span>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="photo" class="col-sm-2 col-form-label">Photo du post (.jpg ou .png)</label>
                    <div class="col-sm-10">
                        <img src="../assets/post_photo/<?php echo $photo; ?>" alt="">
                        <input type="file" class="form-control-file" name="photo" id="photo">
                        <span class="help-inline"><?php echo $photoErreur ?></span>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="contenu" class="col-sm-2 col-form-label">Contenu du post</label>
                    <div class="col-sm-10">
                        <textarea class="form-control animated" rows="10" name="contenu"><?php echo $contenu; ?></textarea>
                        <span class="help-inline"><?php echo $contenuErreur ?></span>
                        <small><em>Le cadre peut être redimensionné</em></small>
                    </div>
                </div>
                <div class="form-group row">
                    <input type="submit" class="btn btn-primary btn-lg pull-right" value="Modifier le post" name="updatePost">
                </div>
            </form>
        </div>
    </div><!-- container -->

<?php require "footer.php"; ?>