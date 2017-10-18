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
        // CREATE
    public function createPost($titre, $contenu, $auteur, $photo) // To create one post
    {
        $statement = $this->database->prepare("   INSERT INTO post (title, content, author, photo, creation_date) 
                                                  VALUES (?, ?, ?, ?, NOW())");
        $statement->execute(array($titre, $contenu, $auteur, $photo));
        return $statement;
    }

        // READ
    public function getPost($id) // To get one post by its id
    {
        $statement = $this->database->prepare("   SELECT *
                                                  FROM post
                                                  WHERE id = ?");
        $statement->execute(array($id));
        $datas = $statement->fetch();
        $post = new Post($datas);
        return $post;
    }

    public function getAll() // To get all the posts
    {
        $posts = array();
        $statement = $this->database->query(" SELECT *
                                              FROM post
                                              ORDER BY creation_date DESC");

        while ($datas = $statement->fetch())
        {
            $posts[] = new Post($datas);
        }
        return $posts;
    }

        // UPDATE
    public function updatePostWithPhoto($title, $content, $author, $photo, $id) // To update post when a photo is updated
    {
        $statement = $this->database->prepare("  UPDATE post
                                                 SET title = ?, content = ?, author = ?, photo = ?, date_creation = NOW()
                                                 WHERE id = ?");
        $statement->execute(array($title, $content, $author, $photo, $id));
        return $statement;
    }

    public function updatePostNoPhoto($title, $content, $author, $id) // To update a photo without photo updated
    {
        $statement = $this->database->prepare("  UPDATE post 
                                                 SET title = ?, content = ?, author = ?, creation_date = NOW() 
                                                 WHERE id = ?");
        $statement->execute(array($title, $content, $author, $id));
        return $statement;
    }

        // DELETE
    public function delete($id) // To delete a post by its id
    {
        $statement = $this->database->query("   DELETE FROM post
                                                WHERE id = $id");
        return $statement;
    }

//    public function getAllCategories()
//    {
//        $categories = [];
//        $statement = $this->database->query("   SELECT *
//                                                FROM category");
//        while($datas = $statement->fetch())
//        {
//            $categories[] = new Category($datas);
//        }
//
//        return $categories;
//    }

//    public function findCategory($id)
//    {
//        $statement = $this->database->prepare("   SELECT *
//                                                  FROM category
//                                                  WHERE id = ?");
//        $statement->execute(array($id));
//        $datas = $statement->fetch();
//        $category = new Category($datas);
//
//        return $category;
//    }
}