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
    <div class="col-md-12">
        <?php foreach($posts as $post):
            ?>
            <a href="index.php?post&id=<?= $post->getId(); ?>">
                <div class="row thumbnail moveUp home-post-mobile">
                    <div class="col-md-6">
                        <img class="center-block img-responsive" src="assets/post_photo/<?= $post->getPhoto(); ?>" alt="" style="max-width: 100%;">
                    </div>
                    <div class="col-md-6">
                        <h2 class="text-center home-post-title"><b><?= strtoupper($post->getTitle()); ?></b></h2>
                        <div class="text-right">
                            <small style="text-decoration: underline;">
                                <i class="fa fa-clock-o" aria-hidden="true"></i> Date de dernière mise à jour: <?= $post->getUpdateDate(); ?>
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
            <br>
        <?php endforeach; ?>

<!--        PAGINATION          -->
        <nav aria-label="Page navigation" class="text-center">
            <ul class="pagination justify-content-center">
                <?php
                if($paginationInfos['actualPage'] > 1){
                    $previous = $paginationInfos['actualPage']-1;
                    ?>
                    <li class="page-item"><a class="page-link" href="index.php?blog&page=<?= $previous; ?>">Précedent</a></li>
                    <?php
                }

                for($i = 1; $i <= $paginationInfos['pagesCount']; $i++)
                {
                    if($i == $paginationInfos['actualPage'])
                    {
                        ?>
                        <li class="page-item active"><a class="page-link" href="index.php?blog&page=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php
                    }
                    else
                    {
                        ?>
                        <li class="page-item"><a class="page-link" href="index.php?blog&page=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php
                    }
                }
                if($paginationInfos['actualPage'] >=1 && $paginationInfos['actualPage'] < $paginationInfos['pagesCount']){
                    $next = $paginationInfos['actualPage']+1;
                    ?>
                    <li class="page-item"><a class="page-link" href="index.php?blog&page=<?= $next; ?>">Next</a></li>
                    <?php
                } ?>
            </ul>
        </nav> <!-- END PAGINATION -->
    </div>
</div>