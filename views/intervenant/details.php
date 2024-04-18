<h2 class="text-center">Details de l'intervenant <span class="badge bg-danger"><?= $inter->getId();?></span></s> </h2>
<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= !empty($inter) ? $inter->getId() : ''; ?>">
    <div class="form-group">
        <label for="photo">Sélectionnez une photo :</label>
        <input type="file" class="form-control-file" id="photo" name="photo" accept="image/*" required>
    </div>
    <button type="submit" class="btn btn-primary" name="uploadPhoto">Ajouter</button>
</form>
<br>
<div class="form-group">
    <label for="exampleInputEmail1">Nom</label>
    <input type="text" disabled class="form-control" value="<?= !empty($inter) ? $inter->getNom() : ''; ?>">         
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Prénom</label>
    <input type="text" disabled class="form-control"  value="<?= !empty($inter) ? $inter->getPrenom() : ''; ?>">
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Affectation</label>
    <input type="text" disabled class="form-control"   value="<?= !empty($inter) ? $inter->getAffectation() : ''; ?>">
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Url</label>
    <input type="text" disabled class="form-control"   value="<?= !empty($inter) ? $inter->getUrlPagePerso() : ''; ?>">
</div>

<div class="form-group">
    <label for="exampleInputEmail1"><h2>Photos associées</h2></label>
    <br>
    <div class="photos">
        <?php if (!empty($photos)) : ?>
            <div class="row">
                <div class="col">
                    <?php foreach ($photos as $photo) : ?>
                        <img src="public/photo/<?php echo $photo->getChemin();?>" class="img-thumbnail" alt="Photo de l'intervenant" style="width:200px;">
                    <?php endforeach; ?>
                </div>
            </div>
        <?php else : ?>
            <p>Aucune photo associée à cet intervenant.</p>
        <?php endif; ?>
    </div>
</div>