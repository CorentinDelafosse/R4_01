<table class="table table-bordered">
    <thead>
    <tr>
        <th>id_Produit</th>
        <th>Nom</th>
        <th>Quantite</th>
        <th>Retour</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach($lstRetour as $item):
    ?>
        <tr>
            <td>
                <?=$item['id'] ?>
            </td>
            <td>
                <?= $item['nom'] ?>
            </td>
            <td>
                <?=$item['quantite'] ?>
            </td>
            <td>
                <?=$item['retour'] ?>
            </td>
        </tr>
    <?php
    endforeach;
    ?>
    </tbody>
</table>