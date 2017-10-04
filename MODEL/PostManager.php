<?php
require "Post.php";
class PostManager
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function getPost($id)
    {
        $statement = $this->database->prepare("   SELECT *
                                      FROM post
                                      WHERE id = ?");
        $statement->execute(array($id));
        $datas = $statement->fetch();
//        die(var_dump($datas));
        $post = new Post($datas);
//        die(var_dump($post));
        return $post;
//        Database::disconnect();
    }
}