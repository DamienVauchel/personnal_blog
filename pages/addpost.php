<?php
if ($_POST)
{
    $tableError = array_filter($_SESSION['tableError']);
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
<?php
//var_dump($tableError);
?>
<div class="container w">
    <div class="container" id="addpost">
        <form class="form" method="post" action="index.php?addpost" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Titre du post</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" id="title" placeholder="Tapez le titre du post" value="<?php if (!empty($_POST['title'])) {echo $_POST['title'];} ?>">
                    <?php if(isset($tableError[0]["title"])) {echo "<span class='help-inline col-sm-12'>".$tableError[0]['title']."</span>";} ?>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="author" class="col-sm-2 col-form-label">Auteur</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="author" id="author" placeholder="Tapez le nom de l'Auteur" value="<?php if (!empty($_POST['author'])) {echo $_POST['author'];} ?>">
                    <?php if (isset($tableError[1]["author"])) {echo "<span class='help-inline col-sm-12'>".$tableError[1]["author"]."</span>";} ?>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="photo" class="col-sm-2 col-form-label">Photo du post (.jpg ou .png)</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control-file" name="photo" id="photo">
                    <?php if (isset($tableError[2]['photo'])) {echo "<span class='help-inline col-sm-12'>".$tableError[2]['photo']."</span>";} ?>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="content" class="col-sm-2 col-form-label">Contenu du post</label>
                <div class="col-sm-10">
                    <textarea name="content" class="form-control animated" placeholder="Tapez votre contenu ici" rows="10"><?php if (!empty($_POST['content'])) {echo $_POST['content'];} ?></textarea>
                    <small><em>Le cadre peut être redimensionné</em></small>
                    <br>
                    <?php if (isset($tableError[3]['content'])) {echo "<span class='help-inline col-sm-12'>".$tableError[3]['content']."</span>";} ?>
                </div>
            </div>
            <div class="form-group row">
                <input type="submit" class="btn btn-success btn-lg pull-right" name="addPost" value="Ajouter un post">
            </div>
        </form>
    </div>
</div><!-- container -->