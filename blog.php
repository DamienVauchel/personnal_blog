<?php require "view/header.php"; ?>

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
    <!--############################################################################
     ### MODELE POUR UN ARTICLE A ENTRER DANS UNE BOUCLE POUR TOUS LES AFFICHER ####
     ###############################################################################-->
    <div class="row thumbnail">
        <br><br>
        <div class="col-md-6">
            <img src="assets/img/p03.png" alt="" style="max-width: 100%;">
        </div><!-- col-lg-6 -->
        <div class="col-md-6">
            <h2 class="text-center"><b>TITRE DU BLOG POST</b></h2>
            <div class="text-right"><small style="text-decoration: underline;"><i class="fa fa-clock-o" aria-hidden="true"></i> Date de dernière mise à jour: 29/09/2017</small></div>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
            <p class="text-right"><a href="#">... Lire l'article</a></p>
        </div>
    </div><!-- row -->
    <hr>
<!--    FIN MODELE-->
</div>

<?php require "view/footer.php"; ?>