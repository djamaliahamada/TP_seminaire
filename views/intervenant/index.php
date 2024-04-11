
<h2 class="text-center">Liste Intervenant</h2>

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
                    <a href="" class="btn btn-danger">supp</a>
                    <a href="" class="btn btn-primary">mod</a>
                </td>
            </tr>
        <?php endforeach; ?>
</table>