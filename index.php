<?php
use APP\Autoloader;
use APP\PostController;

define("APP_ROOT", __DIR__);
require "Class/Autoloader.php";
Autoloader::register();

//echo APP_ROOT;
//die();
$post_controller = new PostController();

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



die;