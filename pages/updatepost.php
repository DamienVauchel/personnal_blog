<?php
use App\Controller;
use App\Manager;
use App\Database;
use App\Functions;

if(!empty($_GET['id']))
{
    $id = Functions::checkInput($_GET['id']);
}
$db = Database::connect();
$post_manager = new Manager($db);
$post = $post_manager->getPost($id);
Database::disconnect();

$datas = $_POST;
if (isset($datas['updatePost']))
{
    $post_controller = new Controller();
    $post_controller->updatePost($datas);
}
?>
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
            <form class="form" method="post" action="index.php?update&id=<?= $post->getId(); ?>" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Titre du post</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" id="title" value="<?= $post->getTitle(); ?>">
                        <span class="help-inline"><?php if (isset($tableError['title'])) {echo $tableError['title'];} ?></span>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="author" class="col-sm-2 col-form-label">Auteur</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="author" id="author" value="<?= $post->getAuthor(); ?>">
                        <span class="help-inline"><?php if (isset($tableError['title'])) {echo $tableError['title'];} ?></span>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="photo" class="col-sm-2 col-form-label">Photo du post (.jpg ou .png)</label>
                    <div class="col-sm-10">
                        <img src="assets/post_photo/<?= $post->getPhoto(); ?>" alt="">
                        <input type="file" class="form-control-file" name="photo" id="photo">
                        <span class="help-inline"><?php if (isset($tableError['title'])) {echo $tableError['title'];} ?></span>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="content" class="col-sm-2 col-form-label">Contenu du post</label>
                    <div class="col-sm-10">
                        <textarea class="form-control animated" rows="10" name="content"><?= $post->getContent(); ?></textarea>
                        <span class="help-inline"><?php if (isset($tableError['title'])) {echo $tableError['title'];} ?></span>
                        <small><em>Le cadre peut être redimensionné</em></small>
                    </div>
                </div>
                <div class="form-group row">
                    <input type="submit" class="btn btn-primary btn-lg pull-right" value="Modifier le post" name="updatePost">
                </div>
            </form>
        </div>
    </div><!-- container -->