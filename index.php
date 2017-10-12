<?php
use App\Autoloader;
use App\Controller;
use App\Functions;

define("APP_ROOT", __DIR__);
require "app/Autoloader.php";
Autoloader::register();
//echo APP_ROOT;
$post_controller = new Controller();

ob_start();
if (empty($_SERVER["QUERY_STRING"]) || isset($_GET['home']))
{
    $post_controller->home();
}
elseif (isset($_GET["blog"]))
{
    $post_controller->getList();
}
elseif (isset($_GET["blog_post"]) && isset($_GET["id"]))
{
    $post_controller->getPost();
}
elseif(!empty($_GET['id']) && isset($_POST["suppr"]))
{
    $post_controller->supprPost();
}
elseif(isset($_GET['addpost']))
{
    $post_controller->getAddPost();
}
$content = ob_get_clean();

require 'pages/templates/default.php';



die;