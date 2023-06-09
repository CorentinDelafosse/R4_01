<?php
require_once('src/controllers/c-produit.php');

function testAjout(){
    $menu['page'] = "testProduit";

    $lstRetour = array();
    $lstProduit = get_results("SELECT * FROM Produit WHERE statut = 1");

    foreach ($lstProduit as $item){
        $quantite = rand(1,10);
        $lstRetour = execAjout($item['id'], $quantite, $item['nom'], $lstRetour);
    }

    $max = max(array_column($lstRetour, 'id'));

    $lstRetour = execAjout($max + 1, rand(1,10), "Test1", $lstRetour);
    $lstRetour = execAjout($max + 2, rand(1,10), "Test2", $lstRetour);


    require("view/inc/inc.head.php");
    require("view/inc/inc.header.php");
    require('view/test-produit/v-test-produit.php');
    require("view/inc/inc.footer.php");
}


function execAjout($idProduit, $quantite, $nomProduit, $lstRetour){

    $retour = AjoutPanier($idProduit, $nomProduit, $quantite);

    $tab = array(
        "id" => $idProduit,
        "nom" => $nomProduit,
        "quantite" => $quantite,
        "retour" => $retour
    );

    array_push($lstRetour, $tab);

    return $lstRetour;
}