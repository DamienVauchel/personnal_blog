<?php require "header.php"; ?>

<div id="blue">
    <div class="container">
        <div class="row centered">
            <div class="col-lg-8 col-lg-offset-2">
            <h1><b>BLOG</b></h1>
            <h2>Liste des articles</h2>
            </div>
        </div><!-- row -->
    </div><!-- container -->
</div><!--  bluewrap -->


<div class="container desc">
    <?php
    require '../model/admin/db.php';
    $db = Database::connect();
    $statement = $db -> query("   SELECT *
                                  FROM post
                                  ORDER BY date_creation");

    // AFFICHAGE DE TOUS LES ARTICLES DU BLOG
    while ($post = $statement->fetch()) { ?>
        <a href="blog_post.php?id=<?php echo $post["id"]; ?>">
            <div class="row thumbnail">
                <br><br>
                <div class="col-md-6">
                    <img src="../assets/post_photo/<?php echo $post["photo"]; ?>" alt="" style="max-width: 100%;">
                </div>
                <div class="col-md-6">
                    <h2 class="text-center"><b><?php echo strtoupper($post["titre"]); ?></b></h2>
                    <div class="text-right">
                        <small style="text-decoration: underline;">
                            <i class="fa fa-clock-o" aria-hidden="true"></i> Date de dernière mise à jour: <?php echo $post["date_creation"]; ?>
                        </small>
                    </div>
                <p>
                    <?php echo substr($post["contenu"], 0, 200)."..."; ?>
                </p>
                <p class="text-right"><a href="blog_post.php?id=<?php echo $post["id"]; ?>">... Lire l'article</a></p>
            </div>
            <br><br>
        </div><!-- row -->
    </a>

    <hr>
    <?php
    }

    Database::disconnect();
    ?>
</div>

<?php require "footer.php"; ?>