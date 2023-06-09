<table class="table">
    <thead>
    <tr>
        <th scope="col">URL</th>
        <th scope="col">Méthode</th>
        <th scope="col">Statut</th>
        <th scope="col">Paramètre</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach($data as $item):
        ?>
        <tr>
            <th scope="row"><?=$item['url'] ?></th>
            <td><?=$item['method'] ?></td>
            <td><?=$item['statut'] ?></td>
            <td><?=$item['param'] ?></td>
        </tr>
    <?php
    endforeach;
    ?>
    </tbody>
</table>