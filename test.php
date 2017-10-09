<?php
require "MODEL/PostManager.php";
require "MODEL/admin/db.php";

$db = new Database();
$post_manager = new PostManager($db);
die(var_dump($post_manager->getAll()));
