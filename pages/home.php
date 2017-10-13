<?php \App\Functions::contact(); ?>

<div id="headerwrap">
    <div class="container">
        <div class="row centered">
            <div class="col-lg-8 col-lg-offset-2">
            <h1><b>Damien Vauchel</b></h1>
            <h2>Le développement, j'ai ça dans le sang!</h2>
            <br>
            <a href="assets/docs/online-2017-CV-Damien-Vauchel.pdf" class="btn btn-default" target="_blank">Télécharger le CV</a>
            </div>
        </div><!-- row -->
    </div><!-- container -->
</div><!-- headerwrap -->


<div class="container w">
    <div class="row centered">
        <br><br>
        <div class="col-md-3">
            <i class="fa fa-desktop"></i>
            <h4>HTML / CSS</h4>
            <p>Pour structurer et embellir les pages web</p>
        </div>

        <div class="col-md-3">
            <i class="fa fa-mobile" aria-hidden="true"></i>
            <h4>BOOTSTRAP</h4>
            <p>Pour organiser les pages web en fonction de la grille BootStrap et que le site soit facilement responsive</p>
        </div>

        <div class="col-md-3">
            <i class="fa fa-laptop"></i>
            <h4>PHP / SQL</h4>
            <p>Pour rendre le site dynamique et le faire intéragir avec sa base de données</p>
        </div>

        <div class="col-md-3">
            <i class="fa fa-tablet"></i>
            <h4>WORDPRESS</h4>
            <p>Pour que vous puissiez aisément vous occuper vous-même de votre site responsive</p>
        </div>
    </div><!-- row -->
    <br>
    <br>
</div><!-- container -->


<!-- PORTFOLIO SECTION -->
<div id="dg">
    <div class="container">
        <div class="row centered">
            <h4>DERNIERES REALISATIONS</h4>
            <br>
            <div class="col-lg-4">
                <div class="tilt">
                <a href="http://chaletsdeluxe.damienvauchel.com/" target="_blank"><img src="assets/img/p01.png" height="200"></a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="tilt">
                <a href="http://www.travel-agency.damienvauchel.com/" target="_blank"><img src="assets/img/p03.png" height="200"></a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="tilt">
                <a href="http://redcloud-design.com/" target="_blank"><img src="assets/img/p02.png" height="200"></a>
                </div>
            </div>
        </div><!-- row -->
    </div><!-- container -->
</div><!-- DG -->


<!--                   CONTACT                                                                   -->
<div class="container tab-pane" id="contact">
    <br>
    <h2 class="text-center"><b>Pour me contacter</b></h2>
    <h4 class="text-center">Pour les questions d'ordre général, vous pouvez utiliser le formulaire ci-joint.</h4>
    <h4 class="text-center">Je vous répondrez dès que possible.</h4>
    <br>
    <form class="form" action="index.php?home" method="post" autocomplete="off">
        <div class="form-group row">
            <label for="nom" class="col-sm-2 col-form-label">Nom</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nom" id="nom" placeholder="Tapez votre Nom">
            </div>
        </div>
        <br>
        <div class="form-group row">
            <label for="prenom" class="col-sm-2 col-form-label">Prénom</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Tapez votre Prénom">
            </div>
        </div>
        <br>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="email" id="email" placeholder="Tapez votre mail">
            </div>
        </div>
        <br>
        <div class="form-group row">
            <label for="subject" class="col-sm-2 col-form-label">Sujet</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Objet du message">
            </div>
        </div>
        <div class="form-group row">
            <label for="message" class="col-sm-2 col-form-label">Votre message</label>
            <div class="col-sm-10">
                <textarea name="message" class="form-control animated" placeholder="Tapez votre message ici" rows="10"></textarea>
                <small><em>Le cadre peut être redimensionné</em></small>
            </div>
        </div>
        <div class="form-group row">
            <input type="submit" name="sendmsg" class="btn btn-default btn-lg pull-right" value="Envoyer le message">
        </div>
    </form>
</div>
<!--                    FIN CONTACT                                                    -->