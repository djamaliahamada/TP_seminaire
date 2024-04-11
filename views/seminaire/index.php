
<h2 class="text-center">Liste seminaire</h2>

<table class="table table-striped">
    <tr class="table-dark">
        <td>Titre</td>
        <td>Resumé</td>
        <td>Lieu</td>
        <td>Date</td>
        <td>Id intervenant</td>
        <td>Action</td>
    </tr>
    <?php foreach($semis as $semi): ?>
            <tr>
                <td> <?= $inter->getTitre(); ?> </td>
                <td> 
                    <a href="" class="btn btn-danger">supp</a>
                    <a href="" class="btn btn-primary">mod</a>
                </td>
            </tr>
        <?php endforeach; ?>
</table>