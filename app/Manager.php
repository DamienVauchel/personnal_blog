<?php
namespace App;
class Manager
{
    // ATTRIBUTES
    private $database;

    // CONSTRUCT
    public function __construct($database)
    {
        $this->database = $database;
    }

    // METHODS
    public function createPost($titre, $contenu, $auteur, $photo)
    {
        $statement = $this->database->prepare("   INSERT INTO post (title, content, author, photo, creation_date) 
                                                  VALUES (?, ?, ?, ?, NOW())");
        $statement->execute(array($titre, $contenu, $auteur, $photo));
        return $statement;
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

    public function getAll()
    {
        $posts = array();
        $statement = $this->database->query(" SELECT *
                                              FROM post
                                              ORDER BY creation_date DESC");

        while ($datas = $statement->fetch())
        {
            $posts[] = new Post($datas);
        }

//        die(var_dump($posts));
        return $posts;
    }

    public function getAllCategories()
    {
        $categories = [];
        $statement = $this->database->query("   SELECT *
                                                FROM category");
        while($datas = $statement->fetch())
        {
            $categories[] = new Category($datas);
        }

        return $categories;
    }

    public function findCategory($id)
    {
        $statement = $this->database->prepare("   SELECT *
                                                  FROM category
                                                  WHERE id = ?");
        $statement->execute(array($id));
        $datas = $statement->fetch();
        $category = new Category($datas);

        return $category;
    }

    public function delete($id)
    {
        $statement = $this->database->query("   DELETE FROM post
                                                WHERE id = $id");
        return $statement;
    }
}