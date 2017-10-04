<?php
require "../MODEL/PostManager.php";
class PostController
{
    public function getPost()
    {
        if(!empty($_GET['id'])) {
            $id = checkinput($_GET['id']);
        }

        $db = Database::connect();
        $post_manager = new PostManager($db);
        $post = $post_manager->getPost($id);
        return $post;
    }

    public function getList()
    {
        $db = Database::connect();
        $post_manager = new PostManager($db);
        $statement = $post_manager->view_list();

        // AFFICHAGE DE TOUS LES ARTICLES DU BLOG
        while ($post = $statement->fetch()) { ?>
            <a href="blog_post.php?id=<?= $post->getId(); ?>">
                <div class="row thumbnail">
                    <br><br>
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
                    <br><br>
                </div><!-- row -->
            </a>

            <hr>
<?php
        }

        Database::disconnect();

    }
}