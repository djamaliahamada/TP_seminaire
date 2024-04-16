
<h2 class="text-center">Liste seminaire</h2>
<a href="?action=addSeminaire" class="btn btn-primary">Ajouter un seminaire</a>
<br><br>
<table class="table table-striped">
    <tr class="table-dark">
        <td>Titre</td>
        <td>Resumé</td>
        <td>Lieu</td>
        <td>Date</td>
        <td>Action</td>
    </tr>
    <?php foreach($semis as $semi): ?>
            <tr>
                <td> <?= $semi->getTitre(); ?> </td>
                <td> <?= $semi->getResumer(); ?> </td>
                <td> <?= $semi->getLieu(); ?> </td>
                <td> <?= $semi->getDate(); ?> </td>
                <td> 
                    <a href="?action=deleteSeminaire&id=<?= $semi->getId(); ?>" class="btn btn-danger">supp</a>
                    <a href="?action=updateSeminaire&id=<?= $semi->getId(); ?>" class="btn btn-primary">mod</a>
                </td>
            </tr>
        <?php endforeach; ?>
</table>