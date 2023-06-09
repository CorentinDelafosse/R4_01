<table class="table">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">Montant</th>
        <th scope="col">Référence</th>
        <th scope="col">Auto</th>
        <th scope="col">Code Erreur</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach($data as $item):
        ?>
        <tr>
            <th scope="row"><?=$item['id'] ?></th>
            <td><?=$item['mt'] ?></td>
            <td><?=$item['ref'] ?></td>
            <td><?=$item['auto'] ?></td>
            <td><?=$item['erreur'] ?></td>
            <td><a href="paiement/<?=$item['id']?>/" class="btn btn-sm btn-outline-secondary">Consulter</a></td>
        </tr>
    <?php
    endforeach;
    ?>
    </tbody>
</table>