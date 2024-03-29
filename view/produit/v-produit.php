        <!-- Product section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src=<?=$unProduit['image']?> alt="..." /></div>
                    <div class="col-md-6">
                        <h1 class="display-5 fw-bolder"><?=$unProduit['nom']?></h1>
                        <div class="fs-5 mb-5">
                            <span><?=$unProduit['prix']?>€</span>
                        </div>
                        <p class="lead"><?=$unProduit['description']?></p>
                        <div class="d-flex">
                            <form action="produit/<?=$unProduit['identifiant']?>/" method="post">

                                <input class="form-control text-center me-3" name="produit_quantite" type="number" value="1" min="1" max="<?=$unProduit['stock'] ?>" style="max-width: 10rem" oninput="this.value = Math.min(Math.max(parseInt(this.value), parseInt(this.min)), parseInt(this.max))"/>
                                <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                                    <i class="bi-cart-fill me-1"></i>
                                    Ajouter au panier
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>