<!-- MODAL FOR CONTACT -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2 class="modal-title text-center" id="myModalLabel"><b>Pour me contacter</b></h2>
            </div>
            <div class="modal-body">
                <div class="row centered">
                    <!--                   CONTACT                                                                   -->
                    <form class="form" action="index.php" method="post" autocomplete="off">
                        <div class="form-group row">
                            <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nomModal" id="nom" placeholder="Tapez votre Nom">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="prenom" class="col-sm-2 col-form-label">Prénom</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="prenomModal" id="prenom" placeholder="Tapez votre Prénom">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="emailModal" id="email" placeholder="Tapez votre mail">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="subject" class="col-sm-2 col-form-label">Sujet</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="subjectModal" id="subject" placeholder="Objet du message">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="message" class="col-sm-2 col-form-label">Votre message</label>
                            <div class="col-sm-10">
                                <textarea name="messageModal" class="form-control animated" placeholder="Tapez votre message ici" rows="10"></textarea>
                                <small><em>Le cadre peut être redimensionné</em></small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="form-group row">
                                <input type="submit" name="sendmsgModal" class="btn btn-default btn-lg pull-right" right="" value="Envoyer le message">
                            </div>
                        </div>
                    </form>
                    <!--                    FIN CONTACT                                                    -->
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
