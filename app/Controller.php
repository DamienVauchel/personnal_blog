<?php
namespace App;
class Controller
{
    protected $db;
    protected $post_manager;

    public function __construct()
    {
        $this->db = Database::connect();
        $this->post_manager = new Manager($this->db);
    }

    public function home()
    {
//        return header('Location:  pages/home.php');
        include "pages/home.php";
    }

    public function addPost($datas)
    {
        $tableError = [];

        if(!empty($datas)) {
            $title              =       Functions::checkInput($datas['title']);
            $content            =       Functions::checkInput($datas['content']);
            $author             =       Functions::checkInput($datas['author']);
            $photo              =       Functions::checkInput($_FILES['photo']['name']);
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
                header("Location: index.php?blog");
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
            $id = Functions::checkinput($_GET['id']);
        }
        else
        {
            $id = 1;
        }

        $post = $this->post_manager->getPost($id);
        include "pages/post.php";
    }

    public function supprPost()
    {
        if(!empty($_GET['id']))
        {
            $id = Functions::checkinput($_GET['id']);
        }

        if(isset($_POST["suppr"]))
        {
            $this->post_manager->delete($_GET['id']);

            Database::disconnect();
            header("Location: index.php?blog");
        }
    }

    public function getList()
    {
        $db = Database::connect();
        $post_manager = new Manager($db);
        $posts = $post_manager->getAll($db);
        include "pages/blog.php";
    }

    public function getCategoryList()
    {
        $db = Database::connect();
        $post_manager = new Manager($db);
        return $post_manager->getAllCategories($db);
    }

    public function findCategory($id)
    {
        $db = Database::connect();
        $manager = new Manager($db);
        return $manager->findCategory($id);
    }

    public function getAddPost()
    {
        include "pages/addpost.php";
    }
}