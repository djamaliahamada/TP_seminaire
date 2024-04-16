
<h2 class="text-center">Liste Intervenant</h2>
<a href="?action=addIntervenant" class="btn btn-primary">Ajouter un intervenant</a>
<br><br>
<table class="table table-striped">
    <tr class="table-dark">
        <td>Nom</td>
        <td>Prenom</td>
        <td>Affectation</td>
        <td>Url</td>
        <td>Action</td>
    </tr>
    <?php foreach($inters as $inter): ?>
            <tr>
                <td> <?= $inter->getNom(); ?> </td>
                <td> <?= $inter->getPrenom(); ?> </td>
                <td> <?= $inter->getAffectation(); ?> </td>
                <td> <?= $inter->getUrlPagePerso(); ?> </td>
                <td> 
                    <a href="?action=deleteIntervenant&id=<?= $inter->getId(); ?>" class="btn btn-danger">supp</a>
                    <a href="?action=updateIntervenant&id=<?= $inter->getId(); ?>" class="btn btn-primary">mod</a>
                    <a href="?action=detailsIntervenant&id=<?= $inter->getId(); ?>" class="btn btn-info">Détails</a>
                </td>
            </tr>
        <?php endforeach; ?>
</table>