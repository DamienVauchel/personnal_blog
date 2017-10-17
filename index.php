<?php
session_start();
use App\Autoloader;
use App\Controller;

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
elseif (isset($_GET["post"]) && isset($_GET["id"]))
{
    $post_controller->getPost();
}
elseif(isset($_GET['addpost']))
{
    $post_controller->getAddPost();
}
elseif(isset($_GET['update']))
{
    $post_controller->getUpdatePost();
}
elseif(isset($_GET['contact']))
{
    $post_controller->home();
}
$content = ob_get_clean();

require 'pages/templates/default.php';

die();