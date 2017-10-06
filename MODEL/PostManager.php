<?php
require "Post.php";
class PostManager
{
    // ATTRIBUTES
    private $database;

    // CONSTRUCT
    public function __construct($database)
    {
        $this->database = $database;
    }

    // METHODS
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

    public function getAll()
    {
        $statement = $this->database->query("   SELECT *
                                                FROM post
                                                ORDER BY date_creation DESC");
        $id = $this->database->query("  SELECT id
                                        FROM post");
        return $posts = $statement->fetch();
    }
}