<?php require "header.php"; ?>
<?php
require "../MODEL/admin/db.php";

$titreErreur = $contenuErreur = $auteurErreur = $photoErreur = $titre = $contenu = $auteur = $photo = "";

if(!empty($_POST)) {
    $titre              =       checkInput($_POST['titre']);
    $contenu            =       checkInput($_POST['contenu']);
    $auteur             =       checkInput($_POST['auteur']);
    $photo              =       checkInput($_FILES['photo']['name']);
    $photoPath          =       "../assets/post_photo/" . basename($photo); // Chemin de l'image
    $photoExtension     =       pathinfo($photoPath, PATHINFO_EXTENSION);
    $isSuccess          =       true;
    $isUploadSuccess    =       false;

    if(empty($titre)) {
        $titreErreur = "Ce champ ne peut pas être vide";
        $isSuccess = false;
    }

    if(empty($contenu)) {
        $contenuErreur = "Ce champ ne peut pas être vide";
        $isSuccess = false;
    }

    if(empty($auteur)) {
        $auteurErreur = "Ce champ ne peut pas être vide";
        $isSuccess = false;
    }

    if(empty($photo)) {
        $photoErreur = "Ce champ ne peut pas être vide";
        $isSuccess = false;
    } else {
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

    if($isSuccess && $isUploadSuccess) {
        $db = Database::connect();
        $statement = $db->prepare("  INSERT INTO post (titre, contenu, auteur, photo, date_creation) 
                                     VALUES (?, ?, ?, ?, NOW())");
        $statement->execute(array($titre, $contenu, $auteur, $photo));
        Database::disconnect();
        header("Location: blog.php");
    }
}

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
				    <h1><b>AJOUTER UN BLOG POST</b></h1>
				</div>
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- blue wrap -->


	<div class="container w">
        <div class="container" id="addpost">
            <form class="form" method="post" action="addpost.php" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="titre" class="col-sm-2 col-form-label">Titre du post</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="titre" id="titre" placeholder="Tapez le titre du post">
                        <span class="help-inline"><?php echo $titreErreur ?></span>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="auteur" class="col-sm-2 col-form-label">Auteur</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="auteur" id="auteur" placeholder="Tapez le nom de l'Auteur">
                        <span class="help-inline"><?php echo $auteurErreur ?></span>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="photo" class="col-sm-2 col-form-label">Photo du post (.jpg ou .png)</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control-file" name="photo" id="photo">
                        <span class="help-inline"><?php echo $photoErreur ?></span>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="contenu" class="col-sm-2 col-form-label">Contenu du post</label>
                    <div class="col-sm-10">
                        <textarea name="contenu" class="form-control animated" placeholder="Tapez votre contenu ici" rows="10"></textarea>
                        <small><em>Le cadre peut être redimensionné</em></small>
                        <span class="help-inline"><?php echo $contenuErreur ?></span>
                    </div>
                </div>
                <div class="form-group row">
                    <input type="submit" class="btn btn-success btn-lg pull-right" name="addPost" value="Ajouter un post">
                </div>
            </form>
        </div>
    </div><!-- container -->

<?php require "footer.php"; ?>