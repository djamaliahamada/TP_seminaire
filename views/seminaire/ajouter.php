
<h2 class="text-center">Ajouter / modifier seminaire</h2>

        <form method="post">
            <input type="hidden" name="id" value="<?= !empty($semi) ? $semi->getId() : ''; ?>">
            <div class="form-group">
                <label for="exampleInputEmail1">Titre</label>
                <input type="text" name="titre" class="form-control" value="<?= !empty($semi) ? $semi->getTitre() : ''; ?>">
                
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Resume</label><br>
                <textarea name="resumer" class="form-control" id="" cols="177" rows="4"><?= !empty($semi) ? $semi->getResumer() : ''; ?></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Lieu</label>
                <input type="text" name="lieu" class="form-control"   value="<?= !empty($semi) ? $semi->getLieu() : ''; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Date</label>
                <input type="date" name="date" class="form-control"   value="<?= !empty($semi) ? $semi->getDate() : ''; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Intervenant</label>
                <?php if(isset($inters)) {?>
                    <select name="intervenant" id="" class="form-control">
                        <?php foreach($inters as $inter): ?>
                            <option value="<?= $inter->getId(); ?>"> <?= $inter->getNom(); ?></option>
                        <?php endforeach; ?> 
                    </select>
                <?php }else{?>
                    <input type="text" name="intervenant"  class="form-control">
                <?php }?>
            </div>
            <br>
            <button type="submit"name="valider" class="d-block btn btn-primary">Valider</button>
        </form>

