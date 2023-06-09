<?php

function testSuppr(){
    $menu['page'] = "testPanier";

    $lstRetour = array();
    $lstProduit = get_results("SELECT * FROM Panier_Produit WHERE id_panier = 1");

    foreach ($lstProduit as $item){
        $quantite = $item['quantite'];
        $nomProduit = get_result("SELECT nom FROM Produit WHERE id = ".$item['id_produit']);
        $lstRetour = execSuppr($item['id_produit'], $nomProduit['nom'], $quantite, $lstRetour);
    }

    if($lstRetour != array()) {
        $max = max(array_column($lstRetour, 'id'));
    }
    else{
        $max = 0;
    }

    $lstRetour = execSuppr($max + 1, "Test1", rand(1,10), $lstRetour);
    $lstRetour = execSuppr($max + 2, "Test2", rand(1,10), $lstRetour);


    require("view/inc/inc.head.php");
    require("view/inc/inc.header.php");
    require('view/test-panier/v-test-panier.php');
    require("view/inc/inc.footer.php");

}

function execSuppr($idProduit, $nomProduit, $quantite, $lstRetour){

    $retour = suppressionProduit($idProduit, $quantite);

    $exist = get_result("SELECT COUNT(id) as 'exist' FROM Panier_Produit WHERE id_produit = ".$idProduit." and id_panier = 1");

    if($exist['exist'] != 0) {
        $quantiteApres = get_result("SELECT quantite FROM Panier_Produit WHERE id_produit = " . $idProduit . " and id_panier = 1");
    }
    else {
        $quantiteApres = 0;
    }
    if($retour == 0){
        $quantite = 0;
    }

    $tab = array(
        "id" => $idProduit,
        "nom" => $nomProduit,
        "avant" => $quantite,
        "apres" => $quantiteApres,
        "retour" => $retour
    );

    array_push($lstRetour, $tab);

    return $lstRetour;

}