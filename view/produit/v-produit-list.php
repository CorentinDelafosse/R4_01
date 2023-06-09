<div class="album py-5 bg-light">
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php

            foreach($listProduit as $item):
            ?>

            <div class="col">
                <div class="card shadow-sm">
                    <title>Produit</title>
                    <rect width="100%" height="100%" fill="#55595c"/>
                    <img class="card-img-top" src="<?=$item['image']?>" alt="..." />
                    <text x="50%" y="50%" fill="#eceeef" dy=".3em"><strong><?=$item['nom']?></strong></text>

                    <div class="card-body">
                        <p class="card-text"><?=$item['description']?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="produit/<?=$item['identifiant']?>/" class="btn btn-sm btn-outline-secondary">Consulter</a>
                            </div>
                            <small class="text-muted"><?=$item['date_visibilite']?></small>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
        ?>
        </div>
    </div>
</div>

