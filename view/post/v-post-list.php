<div class="album py-5 bg-light">
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
<?php

foreach($listPost as $item):
    ?>

            <div class="col">
                <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title><?=$item['title']?></title>
                        <rect width="100%" height="100%" fill="#55595c"/>
                        <image xlink:href="<?=$item['image'] ?>" width="100%" height="100%" preserveAspectRatio="xMidYMid slice"/>
                        <div style="border: 1px solid black; padding: 10px;">
                            <text x="50%" y="50%" fill="#eceeef" dy=".3em"><?=$item['titre']?></text>
                        </div>
                    </svg>

                    <div class="card-body">
                        <p class="card-text"><?=$item['contenu']?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="post/<?=$item['identifiant']?>/" class="btn btn-sm btn-outline-secondary">Consulter</a>
                            </div>
                            <small class="text-muted"><?=$item['date_creation']?></small>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        endforeach;
    ?>