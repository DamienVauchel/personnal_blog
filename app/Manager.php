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
        $controller = new Controller();
        $paginationInfos = $controller->paginate();
//        die(var_dump($paginationInfos));

        $posts = array();
        $statement = $this->database->query(" SELECT *
                                                FROM post
                                                ORDER BY creation_date DESC
                                                LIMIT ".$paginationInfos['firstToRead'].",".$paginationInfos['postsPerPage']);
//        die(var_dump($statement));
        while ($datas = $statement->fetch())
        {
            $posts[] = new Post($datas);
        }
//        die(var_dump($posts));
        return $posts;
    }

    public function getFourLastPosts()
    {
        $posts = array();
        $statement = $this->database->query("SELECT *
                                             FROM post
                                             ORDER BY creation_date DESC
                                             LIMIT 4");
        while ($datas = $statement->fetch())
        {
            $posts[] = new Post($datas);
        }
        return $posts;
    }

    public function getTotalForPaginate() // To count all the posts to create pagination
    {
        $statement = $this->database->query("  SELECT COUNT(*) AS total 
                                               FROM post");
        $datas = $statement->fetch();
        return $total = $datas['total'];
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
}