<?php
use App\Controller;
use App\Functions;

if(!empty($_GET['id']))
{
    $id = Functions::checkinput($_GET['id']);
}

if(isset($_POST["suppr"]))
{
    if (!empty($_POST['id']))
    {
        $controller = new Controller();
        $controller->supprPost($id);
    }
}
?>

<div class="container">
    <form class="form" method="post" action="index.php?delete" role="form">
        <input type="hidden" name="id" value="<?= $id ?>">
        <p class="alert alert-warning">Voulez-vous réellement supprimer le post?</p>
        <div class="form-actions">
            <button class="btn btn-danger" type="submit" name="suppr">Oui</button>
            <a href="index.php?blog" class="btn btn-default">Non</a>
        </div>
    </form>
</div>