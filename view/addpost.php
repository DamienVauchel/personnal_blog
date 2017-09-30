<?php require "header.php"; ?>
<?php
require "../db_cnx.php";
require "../model/admin/db.php";
if (isset($_POST["addPost"]))
{
    $titre = $_POST["titre"];
    $auteur = $_POST["auteur"];
    $contenu = $_POST["contenu"];
    $date_creation = time();
    $chapo = substr($_POST["contenu"], 0, 200);
    $q = "  INSERT INTO post(titre, contenu, , chapo, auteur, date_creation)
            VALUES ($titre, $contenu, $chapo, $auteur, $date_creation);";

    $db->query($q);
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
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="auteur" class="col-sm-2 col-form-label">Auteur</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="auteur" id="auteur" placeholder="Tapez le nom de l'Auteur">
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="photo" class="col-sm-2 col-form-label">Photo du post (.jpg ou .png)</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control-file" name="photo" id="photo">
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="contenu" class="col-sm-2 col-form-label">Contenu du post</label>
                    <div class="col-sm-10">
                        <textarea name="contenu" class="form-control animated" placeholder="Tapez votre contenu ici" rows="10"></textarea>
                        <small><em>Le cadre peut être redimensionné</em></small>
                    </div>
                </div>
                <div class="form-group row">
                    <input type="submit" class="btn btn-success btn-lg pull-right" name="addPost" value="Ajouter un post">
                </div>
            </form>
        </div>
    </div><!-- container -->

<?php require "footer.php"; ?>