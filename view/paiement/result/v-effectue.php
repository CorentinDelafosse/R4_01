<?php
require_once("src/model.php");

print ("<center><b><h2>Votre transaction a &eacute;t&eacute; accept&eacute;e</h2></center></b><br>");


if (isset($_SERVER["REQUEST_URI"])) {
    parse_str($_SERVER["REQUEST_URI"], $query_string);
    if (isset($query_string["Ref"])) {
        $ref_com = $query_string["Ref"];

        $num = 0;
        preg_match('/\d+$/', $ref_com, $matches);
        if (count($matches) > 0) {
            $num = intval($matches[0]);
        }

            $recap = get_results("SELECT * FROM Commande_Produit WHERE id_commande = " . $num);
    }
}
        ?>

<div class="container mt-5 p-3 rounded cart">
    <div class="row no-gutters">
        <div class="col-md-12">
            <div class="product-details mr-2">
                <hr>
                <h6 class="mb-0">Recapitulatif</h6>
                <?php
                foreach($recap as $item):
                    $monProduit = get_result("SELECT * FROM Produit WHERE id = ".$item['id_produit']);
                ?>
                <div class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">
                    <div class="d-flex flex-row"><img class="rounded" src="<?=$monProduit['image'] ?>" width="40">
                        <div class="ml-2"><span class="font-weight-bold d-block"><?=$monProduit['nom'] ?></span></div>
                    </div>
                    <div class="d-flex flex-row align-items-center"><span class="d-block">Quantité : <?=$item['quantite'] ?></span><span class="d-block ml-5 font-weight-bold">, Prix : <?=$monProduit['prix']*$item['quantite'] ?>€ </span><i class="fa fa-trash-o ml-3 text-black-50"></i>

                    </div>
                </div>
                <?php
                endforeach;
                ?>
            </div>
        </div>
    </div>
</div>