<?php
namespace App;
class Controller
{
    // ATTRIBUTES
    protected $db;
    protected $post_manager;

    // CONSTRUCT
    public function __construct()
    {
        $this->db = Database::connect();
        $this->post_manager = new Manager($this->db);
    }

    // METHODS
    public function home() // To go to home page
    {
        include "pages/home.php";
    }

    public function getAddPost() // To go to addpost.php
    {
        include "pages/addpost.php";
    }

    public function getUpdatePost() // To go to updatepost.php
    {
        include "pages/updatepost.php";
    }

    public function addPost($datas) // To add a post from the addpost.php form
    {
        $tableError = [];

        if (!empty($datas))
        {
            $title = Functions::checkInput($datas['title']);
            $content = Functions::checkInput($datas['content']);
            $author = Functions::checkInput($datas['author']);
            $photo = Functions::checkInput($_FILES['photo']['name']);
            $photoPath = "assets/post_photo/" . basename($photo);
            $photoExtension = pathinfo($photoPath, PATHINFO_EXTENSION);

            $tableError[] = ErrorMessage::getTitleError($title);
            $tableError[] = ErrorMessage::getAuthorError($author);
            $tableError[] = ErrorMessage::getPhotoError($photo, $photoExtension, $photoPath);
            $tableError[] = ErrorMessage::getContentError($content);

            if (empty(array_filter($tableError))) {
                if (!move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath)) {
                    $photoError = "Il y a eu une erreur lors de l'upload";
                    return $tableError[] = ["photo" => $photoError];
                }
            }

            if (empty(array_filter($tableError)))
            {
                $this->post_manager->createPost($title, $content, $author, $photo);
                header("Location: index.php?blog");
            }
            else
            {
                return $_SESSION['tableError'] = $tableError;
            }
        }
    }

    public function updatePost($datas) // To update a post from updatepost.php
    {
        $tableError = [];

        if (isset($_GET['id']))
        {
            $id = Functions::checkInput($_GET['id']);
        }

        if(!empty($datas))
        {
            $title              =       Functions::checkInput($datas['title']);
            $content            =       Functions::checkInput($datas['content']);
            $author             =       Functions::checkInput($datas['author']);
            $photo              =       Functions::checkInput($_FILES['photo']['name']);
            $photoPath          =       "assets/post_photo/".basename($photo);
            $photoExtension     =       pathinfo($photoPath, PATHINFO_EXTENSION);

            $tableError[] = ErrorMessage::getTitleError($title);
            $tableError[] = ErrorMessage::getAuthorError($author);
            $tableError[] = ErrorMessage::getContentError($content);

            if(empty($photo))
            {
                $isPhotoUpdated = false;
            }
            else
            {
                $isPhotoUpdated = true;

                if($photoExtension != "jpg" && $photoExtension != "png" && $photoExtension != "jpeg")
                {
                    $photoError = "Les fichiers autorisés sont: .jpg, .jpeg, .png";
                    $tableError[] = ["photo" => $photoError];
                }

                if(file_exists($photoPath))
                {
                    $photoError = "Le fichier existe déjà";
                    $tableError[] = ["photo" => $photoError];
                }

                if($_FILES['photo']['size'] > 5000000)
                {
                    $photoError = "Le fichier ne peut pas dépasser les 5 MB";
                    $tableError[] = ["photo" => $photoError];
                }

                if(!isset($tableError['photo']))
                {
                    if(!move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath))
                    {
                        $photoError = "Il y a eu une erreur lors de l'upload";
                        $tableError[] = ["photo" => $photoError];
                    }
                }
            }

            if(empty(array_filter($tableError)))
            {
                if($isPhotoUpdated)
                {
                    $this->post_manager->updatePostWithPhoto($title, $content, $author, $photo, $id);
                    header("Location: index.php?post&id=".$id);
                }
                else
                {
                    $this->post_manager->updatePostNoPhoto($title, $content, $author, $id);
                    header("Location: index.php?post&id=".$id);
                }
            }
            else
            {
                return $_SESSION['tableError'] = $tableError;
            }
        }
    }

    public function getPost()  // To get one post by its id
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
        Database::disconnect();
    }

    public function supprPost() // To suppress one post by its id
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

    public function getList() // To get all the posts and redirect to blog.php page
    {
        $db = Database::connect();
        $post_manager = new Manager($db);
        $posts = $post_manager->getAll($db);
        Database::disconnect();
        include "pages/blog.php";
    }
}