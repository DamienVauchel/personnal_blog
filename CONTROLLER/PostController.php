<?php
require "../MODEL/PostManager.php";
require '../MODEL/admin/db.php';
class PostController
{
    public function addPost($datas)
    {
        if(!empty($datas)) {
            $title              =       checkInput($datas['title']);
            $content            =       checkInput($datas['content']);
            $author             =       checkInput($datas['author']);
            $photo              =       checkInput($_FILES['photo']['name']);
            $photoPath          =       "../assets/post_photo/" . basename($photo); // Chemin de l'image
            $photoExtension     =       pathinfo($photoPath, PATHINFO_EXTENSION);
            $isSuccess          =       true;
            $isUploadSuccess    =       false;

            if(empty($title)) {
                $titleError = "Ce champ ne peut pas être vide";
                $isSuccess = false;
                return $titleError;
                return $isSuccess;
            }

            if(empty($content)) {
                $contentError = "Ce champ ne peut pas être vide";
                $isSuccess = false;
                return $contentError;
                return $isSuccess;
            }

            if(empty($author)) {
                $authorError = "Ce champ ne peut pas être vide";
                $isSuccess = false;
                return $authorError;
                return $isSuccess;
            }

            if(empty($photo)) {
                $photoError = "Ce champ ne peut pas être vide";
                $isSuccess = false;
                return $photoError;
                return $isSuccess;
            } else {
                $isUploadSuccess = true;

                if($photoExtension != "jpg" && $photoExtension != "png" && $photoExtension != "jpeg") {
                    $photoError = "Les fichiers autorisés sont: .jpg, .jpeg, .png";
                    $isUploadSuccess = false;
                    return $photoError;
                    return $isUploadSuccess;
                }

                if(file_exists($photoPath)) {
                    $photoError = "Le fichier existe déjà";
                    $isUploadSuccess = false;
                    return $photoError;
                    return $isUploadSuccess;
                }

                if($_FILES['photo']['size'] > 5000000) {
                    $photoError = "Le fichier ne peut pas dépasser les 5 MB";
                    $isUploadSuccess = false;
                    return $photoError;
                    return $isUploadSuccess;
                }

                if($isUploadSuccess) {
                    if(!move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath)) {
                        $photoError = "Il y a eu une erreur lors de l'upload";
                        $isUploadSuccess = false;
                        return $photoError;
                        return $isUploadSuccess;
                    }
                }
            }

            if($isSuccess && $isUploadSuccess) {
                $db = Database::connect();
                $post_manager = new PostManager($db);
                $post_manager->createPost($title, $content, $author, $photo);
                Database::disconnect();
                header("Location: blog.php");
            }
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

        $db = Database::connect();
        $post_manager = new PostManager($db);
        $post = $post_manager->getPost($id);
        return $post;
    }

    public function supprPost()
    {
        if(!empty($_GET['id']))
        {
            $id = checkinput($_GET['id']);
        }

        if(isset($_POST["suppr"]))
        {
            $db = Database::connect();
            $statement = $db->prepare(" DELETE
                                        FROM post
                                        WHERE id = ?");
            $statement->execute(array($id));

            Database::disconnect();
            header("Location: blog.php");
        }
    }

    public function getList()
    {
        $db = Database::connect();
        $post_manager = new PostManager($db);
        $posts = $post_manager->getAll($db);
//        die(var_dump($posts));

        // AFFICHAGE DE TOUS LES ARTICLES DU BLOG
        foreach($posts as $post)
        {
//            die(var_dump($post));
            ?>
            <a href="blog_post.php?id=<?= $post->getId(); ?>">
                <div class="row thumbnail">
                    <div class="col-md-6">
                        <img src="../assets/post_photo/<?= $post->getPhoto(); ?>" alt="" style="max-width: 100%;">
                    </div>
                    <div class="col-md-6">
                        <h2 class="text-center"><b><?= strtoupper($post->getTitle()); ?></b></h2>
                        <div class="text-right">
                            <small style="text-decoration: underline;">
                                <i class="fa fa-clock-o" aria-hidden="true"></i> Date de dernière mise à jour: <?php if($post->getUpdateDate() != null)
                                {
                                    echo $post->getUpdateDate();
                                }
                                else
                                {
                                    echo $post->getCreationDate();
                                }?>
                            </small>
                        </div>
                        <p>
                            <?= $post->getChapo(); ?>
                        </p>
                        <p class="text-right">... Lire l'article</p>
                    </div>
                </div><!-- row -->
            </a>

            <hr>
<?php
        }
        Database::disconnect();
    }
}