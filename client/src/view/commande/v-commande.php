<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Récapitulatif de commande</h3>
            <hr>
        </div>

        <div class="col-md-6">
            <table class="table">
                <tbody>
                <tr>
                    <td>id Commande</td>
                    <td><?= $data[0]['id'] ?></td>
                </tr>
                <tr>
                    <td>id Client</td>
                    <td><?= $data[0]['id_client'] ?></td>
                </tr>
                <tr>
                    <td>Nom</td>
                    <td><?= $data[0]['nom'] ?></td>
                </tr>
                <tr>
                    <td>Prénom</td>
                    <td><?= $data[0]['prenom'] ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?= $data[0]['email'] ?></td>
                </tr>
                <tr>
                    <td>Téléphone</td>
                    <td><?= $data[0]['telephone'] ?></td>
                </tr>
                <tr>
                    <td>Adresse</td>
                    <td><?= $data[0]['adresse'] ?></td>
                </tr>
                <tr>
                    <td>Complément</td>
                    <td><?= $data[0]['complement'] ?></td>
                </tr>
                <tr>
                    <td>Code Postal</td>
                    <td><?= $data[0]['code_postal'] ?></td>
                </tr>
                <tr>
                    <td>Ville</td>
                    <td><?= $data[0]['ville']?></td>
                </tr>
                <tr>
                    <td>Nom Livraison</td>
                    <td><?= $data[0]['nom_livraison'] ?></td>
                </tr>
                <tr>
                    <td>Prénom Livraison</td>
                    <td><?= $data[0]['prenom_livraison'] ?></td>
                </tr>
                <tr>
                    <td>Email Livraison</td>
                    <td><?= $data[0]['email_livraison'] ?></td>
                </tr>
                <tr>
                    <td>Téléphone Livraison</td>
                    <td><?= $data[0]['telephone_livraison'] ?></td>
                </tr>
                <tr>
                    <td>Adresse Livraison</td>
                    <td><?= $data[0]['adresse_livraison'] ?></td>
                </tr>
                <tr>
                    <td>Complément Livraison</td>
                    <td><?= $data[0]['complement_livraison'] ?></td>
                </tr>
                <tr>
                    <td>Code Postal Livraison</td>
                    <td><?= $data[0]['code_postal_livraion'] ?></td>
                </tr>
                <tr>
                    <td>Ville Livraison</td>
                    <td><?= $data[0]['ville_livraison'] ?></td>
                </tr>
                <tr>
                    <td>Date Création</td>
                    <td><?= $data[0]['date_creation'] ?></td>
                </tr>
                <tr>
                    <td>Date Visibilité</td>
                    <td><?= $data[0]['date_visibilite'] ?></td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td><?= $data[0]['total'] ?></td>
                </tr>
                <tr>
                    <td>Statut</td>
                    <td><?= $data[0]['statut'] ?></td>
                </tr>
                </tbody>
            </table>
        </div>

                <div class="col-md-6">
                    <div class="product-details mr-2">
                        <hr>
                        <h6 class="mb-0">Recapitulatif</h6>
                        <?php
                        foreach($data[0]["produit"] as $item):
                            ?>
                            <div class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">
                                <div class="d-flex flex-row"><img class="rounded" src="<?=$item['image'] ?>" width="40">
                                    <div class="ml-2"><span class="font-weight-bold d-block"><?=$item['nom'] ?></span></div>
                                </div>
                                <div class="d-flex flex-row align-items-center"><span class="d-block">Quantité : <?=$item['quantite'] ?></span>

                                </div>
                            </div>
                        <?php
                        endforeach;
                        ?>
                    </div>
        </div>
    </div>
</div>
