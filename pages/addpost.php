<?php
use App\PostController;

$titleError = $contentError = $authorError = $photoError = $title = $content = $author = $photo = "";
$datas = $_POST;
$post_controller = new PostController();
$post_controller->addPost($datas);
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
            <form class="form" method="post" action="index.php?addpost" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Titre du post</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" id="title" placeholder="Tapez le titre du post">
                        <span class="help-inline"><?= $titleError ?></span>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="author" class="col-sm-2 col-form-label">Auteur</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="author" id="author" placeholder="Tapez le nom de l'Auteur">
                        <span class="help-inline"><?= $authorError ?></span>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="photo" class="col-sm-2 col-form-label">Photo du post (.jpg ou .png)</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control-file" name="photo" id="photo">
                        <span class="help-inline"><?= $photoError ?></span>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="content" class="col-sm-2 col-form-label">Contenu du post</label>
                    <div class="col-sm-10">
                        <textarea name="content" class="form-control animated" placeholder="Tapez votre contenu ici" rows="10"></textarea>
                        <small><em>Le cadre peut être redimensionné</em></small>
                        <span class="help-inline"><?= $contentError ?></span>
                    </div>
                </div>
                <div class="form-group row">
                    <input type="submit" class="btn btn-success btn-lg pull-right" name="addPost" value="Ajouter un post">
                </div>
            </form>
        </div>
    </div><!-- container -->