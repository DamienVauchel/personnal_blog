<?php
session_start();
use App\Autoloader;
use App\Controller;
use App\Functions;
require "app/Autoloader.php";
Autoloader::register();

$post_controller = new Controller();

ob_start();
if (empty($_SERVER["QUERY_STRING"]) || isset($_GET['home']))
{
    Functions::contact();
    $post_controller->home();
}
elseif (isset($_GET["blog"]))
{
    $post_controller->getList();
}
elseif (isset($_GET["post"]) && isset($_GET["id"]))
{
    $post_controller->getPost();
    if(!empty($_GET['id']) && isset($_POST["suppr"]))
    {
        $post_controller->supprPost();
    }
}
elseif(isset($_GET['addpost']))
{
    if ($_POST)
    {
        $post_controller->addPost($_POST);
    }
    $post_controller->getAddPost();
}
elseif(isset($_GET['update']))
{
    $post_controller->getUpdatePost();
}
elseif(isset($_GET['contact']))
{
    $post_controller->home();
    ?>
    <script>
        $(window).load(function() {
            $("html, body").animate({ scrollTop: $("#contact").offset().top-50 }, 500);
        });
    </script>
    <?php
}
$content = ob_get_clean();

require 'pages/templates/default.php';

die();