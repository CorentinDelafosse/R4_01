<table class="table">
    <thead>
    <tr>
        <th scope="col">id du test</th>
        <th scope="col">Date du test</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach($data as $item):
        ?>
        <tr>
            <th scope="row"><?=$item['id'] ?></th>
            <td><?=$item['date'] ?></td>
            <td><a href="test/<?=$item['id']?>/" class="btn btn-sm btn-outline-secondary">Consulter</a></td>
        </tr>
    <?php
    endforeach;
    ?>
    </tbody>
</table>