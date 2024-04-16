
<h2 class="text-center">Ajouter / modifier intervenant</h2>
        <form method="post">
            <input type="hidden" name="id" value="<?= !empty($inter) ? $inter->getId() : ''; ?>">
            <div class="form-group">
                <label for="exampleInputEmail1">Nom</label>
                <input type="text" name="nom" class="form-control" value="<?= !empty($inter) ? $inter->getNom() : ''; ?>">
                
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Prénom</label>
                <input type="text" name="prenom" class="form-control"  value="<?= !empty($inter) ? $inter->getPrenom() : ''; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Affectation</label>
                <input type="text" name="affectation" class="form-control"   value="<?= !empty($inter) ? $inter->getAffectation() : ''; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Url</label>
                <input type="text" name="url_page_perso" class="form-control"   value="<?= !empty($inter) ? $inter->getUrlPagePerso() : ''; ?>">
            </div>
            <br>
            <button type="submit"name="valider" class="d-block btn btn-primary">Valider</button>
        </form>

