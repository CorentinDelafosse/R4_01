<link href="view/panier/style.css" rel="stylesheet">


<div class="container mt-5 p-3 rounded cart">
    <div class="row no-gutters">
        <div class="col-md-12">
            <div class="product-details mr-2">
                <div class="d-flex flex-row align-items-center"><i class="fa fa-long-arrow-left"></i><span class="ml-2">Continue Shopping</span></div>
                <hr>
                <h6 class="mb-0">Shopping cart</h6>
                <div class="d-flex justify-content-between"><span>You have <?=$nbProduit['count'] ?> items in your cart</span>
                    <div class="d-flex flex-row align-items-center"><span class="text-black-50">Sort by:</span>
                        <div class="price ml-2"><span class="mr-1">price</span><i class="fa fa-angle-down"></i></div>
                    </div>
                </div>
                <?php
                foreach($monPanier as $item):
                    $monProduit = get_result("SELECT * FROM Produit WHERE id = ".$item['id_produit']);
                ?>
                <div class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">
                    <div class="d-flex flex-row"><img class="rounded" src="<?=$monProduit['image'] ?>" width="40">
                        <div class="ml-2"><span class="font-weight-bold d-block"><?=$monProduit['nom'] ?></span></div>
                    </div>
                    <div class="d-flex flex-row align-items-center"><span class="d-block">Quantité : <?=$item['quantite'] ?></span><span class="d-block ml-5 font-weight-bold">, Prix : <?=$monProduit['prix']*$item['quantite'] ?>€ </span><i class="fa fa-trash-o ml-3 text-black-50"></i>

                        <form action="panier/<?=$monProduit['identifiant']?>/" method="post">
                            <input class="form-control text-center me-3" name="panier_quantite" type="number" value="1" min="1" max="<?=$item['quantite'] ?>" style="max-width: 4rem" oninput="this.value = Math.min(Math.max(parseInt(this.value), parseInt(this.min)), parseInt(this.max))"/>
                            <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                                <i class="bi-cart-fill me-1"></i>
                                <img id="delete" src="image/deleteLogo.png"/>
                            </button>
                        </form>
                    </div>
                </div>
                <?php
                endforeach;
                ?>
            </div>
            <div class="d-flex flex-row align-items-center p-2">
                <form action="commande/" method="post">
                    <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                        Confirmation
                    </button>
                </form>

                <form action="panier/" method="post">
                    <button class="btn btn-outline-dark flex-shrink-0" name="vider" type="submit">
                        Vider le panier
                    </button>
                </form>
            </div>
        </div>

