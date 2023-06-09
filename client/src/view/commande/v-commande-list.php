<table class="table">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Email</th>
            <th scope="col">Date</th>
            <th scope="col">Total</th>
            <th scope="col">Statut</th>
            <th scope="col">BtnConsultation</th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach($data as $item):
    ?>
    <tr>
        <th scope="row"><?=$item['id'] ?></th>
        <td><?=$item['nom'] ?></td>
        <td><?=$item['prenom'] ?></td>
        <td><?=$item['email'] ?></td>
        <td><?=$item['date_visibilite'] ?></td>
        <td><?=$item['total'] ?></td>
        <td><?=$item['statut'] ?></td>
        <td><a href="commande/<?=$item['id']?>/" class="btn btn-sm btn-outline-secondary">Consulter</a></td>
    </tr>
    <?php
    endforeach;
    ?>
    </tbody>
</table>