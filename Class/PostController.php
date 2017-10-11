<?php
namespace APP;
class PostController
{
    protected $db;
    protected $post_manager;

    public function __construct()
    {
        $this->db = Database::connect();
        $this->post_manager = new PostManager($this->db);
    }

    public function home()
    {
//        return header('Location:  VIEW/home.php');
        include "VIEW/home.php";
    }

    public function addPost($datas)
    {
        $tableError = [];

        if(!empty($datas)) {
            $title              =       checkInput($datas['title']);
            $content            =       checkInput($datas['content']);
            $author             =       checkInput($datas['author']);
            $photo              =       checkInput($_FILES['photo']['name']);
            $photoPath          =       "assets/post_photo/" . basename($photo); // Chemin de l'image
            $photoExtension     =       pathinfo($photoPath, PATHINFO_EXTENSION);
            $isSuccess          =       true;
            $isUploadSuccess    =       false;

            if(empty($title))
            {
                $titleError = "Ce champ ne peut pas être vide";
                $tableError[] = ["title" => $titleError];
                $isSuccess = false;
            }

            if(empty($content))
            {
                $contentError = "Ce champ ne peut pas être vide";
                $isSuccess = false;
            }

            if(empty($author))
            {
                $authorError = "Ce champ ne peut pas être vide";
                $isSuccess = false;
            }

            if(empty($photo))
            {
                $photoError = "Ce champ ne peut pas être vide";
                $isSuccess = false;
            }
            else
            {
                $isUploadSuccess = true;

                if($photoExtension != "jpg" && $photoExtension != "png" && $photoExtension != "jpeg")
                {
                    $photoError = "Les fichiers autorisés sont: .jpg, .jpeg, .png";
                    $isUploadSuccess = false;
                }

                if(file_exists($photoPath))
                {
                    $photoError = "Le fichier existe déjà";
                    $isUploadSuccess = false;
                }

                if($_FILES['photo']['size'] > 5000000)
                {
                    $photoError = "Le fichier ne peut pas dépasser les 5 MB";
                    $isUploadSuccess = false;
                }

                if($isUploadSuccess)
                {
                    if(!move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath))
                    {
                        $photoError = "Il y a eu une erreur lors de l'upload";
                        $isUploadSuccess = false;
                    }
                }
            }

            if($isSuccess && $isUploadSuccess)
            {
                $this->post_manager->createPost($title, $content, $author, $photo);
                Database::disconnect();
                header("Location: blog.php");
            }
//            else
//            {
//                return $tableError;
//            }
        }
    }

    public function getPost()
    {
        if(!empty($_GET['id']))
        {
            $id = checkinput($_GET['id']);
        }
        else
        {
            $id = 1;
        }

        $post = $this->post_manager->getPost($id);
        include "../VIEW/blog_post.php";
    }

    public function supprPost()
    {
        if(!empty($_GET['id']))
        {
            $id = checkinput($_GET['id']);
        }

        if(isset($_POST["suppr"]))
        {
            $this->post_manager->delete();

            Database::disconnect();
            header("Location: blog.php");
        }
    }

    public function getList()
    {
        $db = Database::connect();
        $post_manager = new PostManager($db);
        $posts = $post_manager->getAll($db);
        include "VIEW/blog.php";
    }
}