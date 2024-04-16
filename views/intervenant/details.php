<h2>Détails de l'intervenant</h2>

<?php if (!empty($inter)) : ?>
    <p>Nom: <?= $inter->getNom(); ?></p>
    <p>Prénom: <?= $inter->getPrenom(); ?></p>
    <p>Affectation: <?= $inter->getAffectation(); ?></p>
    <p>Url Page Perso: <?= $inter->getUrlPagePerso(); ?></p>

    <h3>Photos associées</h3>
    <?php if (!empty($photos)) : ?>
        <div class="photos">
            <?php foreach ($photos as $photo) : ?>
                <img src="<?= $photo->getChemin(); ?>" alt="Photo de l'intervenant">
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <p>Aucune photo associée à cet intervenant.</p>
    <?php endif; ?>

<?php else : ?>
    <p>Aucun intervenant trouvé.</p>
<?php endif; ?>
<br>
<h2 class="text-center">Ajouter une photo à l'intervenant <?= $inter->getNom() . ' ' . $inter->getPrenom(); ?></h2>
<form action="?action=ajouterPhoto&id=<?= $inter->getId(); ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="photo">Sélectionnez une photo :</label>
        <input type="file" class="form-control-file" id="photo" name="photo" accept="image/*" required>
    </div>
    <button type="submit" class="btn btn-primary" name="uploadPhoto">Ajouter</button>
</form>

