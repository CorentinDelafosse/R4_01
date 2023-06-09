<link href="view/commande/style.css" rel="stylesheet">

<form method="post" action="commande/">
<div class="row">
    <div class="col-lg-6">
        <div class="checkout-billing-details-wrap">

            <div class="accordion md-accordion accordion-blocks" id="accordionEx78" role="tablist" aria-multiselectable="true">
                <div class="card">
                    <div class="card-header" role="tab" id="headingInfos">
                        <i class="fas fa-user fa-2x mr-4 float-left black-text" aria-hidden="true"></i>
                        <h5 class="mb-0"><span>1. Informations de facturation</span> <i class="fas fa-angle-down rotate-icon"></i></h5>
                        <div class="float-right"><i class="fas fa-pencil-alt black-text" id="i_collapseInfos" style="display:none" aria-hidden="true"></i></div>
                    </div>

                    <div id="collapseInfos" class="collapse show" role="tabpanel" aria-labelledby="headingInfos" data-parent="#accordionEx78" style="">
                        <div class="card-body">
                            <div class="billing-form-wrap">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="single-input-item">
                                            <label for="nom" class="required">Nom</label>
                                            <input type="text" id="nom" placeholder="Nom" name="nom" value="" required="">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="single-input-item">
                                            <label for="prenom" class="required">Prénom</label>
                                            <input type="text" id="prenom" placeholder="Prénom" name="prenom" value="" required="">
                                        </div>
                                    </div>
                                </div>


                                <div class="single-input-item">
                                    <label for="email_commande" class="required">Email</label>
                                    <input type="email" id="email" placeholder="Email" name="email" value="" required="">
                                </div>

                                <div class="single-input-item">
                                    <label for="telephone">Téléphone mobile</label>
                                    <input type="text" id="telephone" placeholder="Téléphone mobile" name="telephone" value="" pattern="[0-9]{10}">
                                    <label id="section_info_telephone" class="message_error text-danger"></label>
                                </div>

                                <div class="single-input-item">
                                    <label for="adresse" class="required">Adresse</label>
                                    <input type="text" id="adresse" placeholder="Adresse" name="adresse" value="" required="">
                                </div>

                                <div class="single-input-item">
                                    <label for="complement">Complément d'adresse</label>
                                    <input type="text" id="complement" placeholder="Complément d'adresse" name="complement" value="">
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="single-input-item">
                                            <label for="code_postal" class="required">Code postal</label>
                                            <input type="text" id="code_postal" placeholder="Code postal" name="code_postal" value="" required="">
                                        </div>
                                    </div>

                                    <div class="col-md-9">
                                        <div class="single-input-item">
                                            <label for="ville" class="required">Ville</label>
                                            <input type="text" id="ville" placeholder="Ville" name="ville" value="" required="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="single-input-item">
                                            <label for="pays" class="required">Pays</label>
                                            <input type="text" id="Pays" placeholder="Pays" value="France" require="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" role="tab" id="headingPoste">
                        <a id="a_collapsePoste" data-toggle="collapse" data-parent="#accordionEx78" aria-expanded="true" aria-controls="collapsePoste">
                            <i class="fas fa-truck fa-2x mr-4 float-left black-text" aria-hidden="true"></i>
                            <h5 class="mb-0"><span>2. Livraison</span> <i class="fas fa-angle-down rotate-icon"></i></h5>
                            <div class="float-right"><i class="fas fa-pencil-alt black-text" id="i_collapsePoste" style="display:none" aria-hidden="true"></i></div>
                        </a>
                    </div>

                    <div id="collapsePoste" class="collapse show" role="tabpanel" aria-labelledby="headingPoste9" data-parent="#accordionEx78">
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-sm-12 mt-30">
                                    <label for="data_livraison" class="required"><h4>Mode de livraison</h4></label>
                                    <div class="single-input-item" id="data_livraison">
                                        <ul class="shipping-type">
                                            <li>
                                                <div class="custom-control custom-radio">
                                                    <div class="row g-3 align-items-center">
                                                        <div class="col-auto">
                                                            <input type="radio" name="livraison" id="livraison" class="custom-control-input" required="">
                                                        </div>
                                                        <div class="col-auto">
                                                            <label for="livraison_4" class="col-form-label">Livraison chez vous : 0.00 €</label>
                                                        </div>
                                                    <p>Vous recevrez un email quand votre commande sera prête.</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div id="livraisonInfo" class="collapse show" role="tabpanel" aria-labelledby="headingInfos" data-parent="#accordionEx78" style="">
                        <div class="card-body">
                            <div class="billing-form-wrap">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="single-input-item">
                                            <label for="nomL" class="required">Nom</label>
                                            <input type="text" id="nomL" placeholder="Nom" name="nomL" value="" required="">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="single-input-item">
                                            <label for="prenomL" class="required">Prénom</label>
                                            <input type="text" id="prenomL" placeholder="Prénom" name="prenomL" value="" required="">
                                        </div>
                                    </div>
                                </div>


                                <div class="single-input-item">
                                    <label for="email_commande" class="required">Email</label>
                                    <input type="email" id="emailL" placeholder="Email" name="emailL" value="" required="">
                                </div>

                                <div class="single-input-item">
                                    <label for="telephoneL">Téléphone mobile</label>
                                    <input type="text" id="telephoneL" placeholder="Téléphone mobile" name="telephoneL" value="" pattern="[0-9]{10}">
                                    <label id="section_info_telephone" class="message_error text-danger"></label>
                                </div>

                                <div class="single-input-item">
                                    <label for="adresseL" class="required">Adresse</label>
                                    <input type="text" id="adresseL" placeholder="Adresse" name="adresseL" value="" required="">
                                </div>

                                <div class="single-input-item">
                                    <label for="complementL">Complément d'adresse</label>
                                    <input type="text" id="complementL" placeholder="Complément d'adresse" name="complementL" value="">
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="single-input-item">
                                            <label for="code_postalL" class="required">Code postal</label>
                                            <input type="text" id="code_postalL" placeholder="Code postal" name="code_postalL" value="" required="">
                                        </div>
                                    </div>

                                    <div class="col-md-9">
                                        <div class="single-input-item">
                                            <label for="villeL" class="required">Ville</label>
                                            <input type="text" id="villeL" placeholder="Ville" name="villeL" value="" required="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="single-input-item">
                                            <label for="paysL" class="required">Pays</label>
                                            <input type="text" id="PaysL" placeholder="PaysL" value="France" require="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="order-summary-details">
            <h5 class="checkout-title">Votre commande</h5>
            <div class="order-summary-content">
                <!-- Order Summary Table -->
                <div class="order-summary-table table-responsive text-center" id="div_panier_content">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th colspan="2">Produit</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $totalHT = 0;
                            $totalTVA = 0;
                            $livraison = "--";
                            foreach($monPanier as $item):
                                $monProduit = get_result("SELECT * FROM Produit WHERE id = ".$item['id_produit']);
                                $TVA = get_result("SELECT taux FROM TVA WHERE id = ".$monProduit['id_tva']);
                                $totalHT = $totalHT + (($monProduit['prix'] - ($monProduit['prix'] * $TVA['taux'])) * $item['quantite']);
                                $totalTVA = $totalTVA + (($monProduit['prix'] * $TVA['taux']) * $item['quantite']);
                                ?>
                        <tr>
                            <td>
                                <img src="<?=$monProduit['image'] ?>" alt="<?=$monProduit['Identifiant'] ?>" title="<?=$monProduit['nom'] ?>">
                            </td>
                            <td>
                                <?=$monProduit['nom'] ?><strong> × <?=$item['quantite'] ?></strong>
                            </td>
                            <td><?=$monProduit['prix']*$item['quantite'] ?> €</td>
                        </tr>
                        <?php
                            endforeach;
                            $total = number_format(($totalHT + $totalTVA),2);
                        ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="2">Total HT</td>
                            <td><strong><?=number_format($totalHT, 2) ?> €</strong></td>
                        </tr>
                        <tr>
                            <td colspan="2">Taxes</td>
                            <td><strong><?=number_format($totalTVA, 2) ?> €</strong></td>
                        </tr>
                        <tr>
                            <td colspan="2">Livraison</td>
                            <td class="" id="montant_livraison"><?=$livraison ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">Total TTC</td>
                            <td><strong><?=$total ?></strong> €</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <style>
                    .btn-full-width {
                        display: block;
                        width: 100%;
                    }

                </style>
                <input type="hidden" name="totalPanier" id="totalPanier" value="<?=$total ?>">
                <button class="btn btn-outline-dark p-2 btn-full-width" type="submit" name="confirmer" value=true>Acheter</button>
            </div>
        </div>
    </div>
</div>

</form>

<script src="view/commande/livraison.js"></script>