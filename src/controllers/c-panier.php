<?php

require_once('src/model.php');


function panier()
{
    global $idUser;
    if (isset($idUser) && $idUser) {
        $panier = get_result("SELECT COUNT(*) as 'count' FROM Panier WHERE id_client = ".$idUser);

        if($panier['count'] == 0){
            affichagePanierVide();
        }
        else{
            $idPanier = get_result("SELECT id FROM Panier WHERE id_client = " .$idUser);
            if(isset($_POST['vider'])){
                viderPanier($idPanier);
                affichagePanierVide();
            }
            else {
                $nbProduit = get_result("SELECT COUNT(*) as 'count' FROM Panier_Produit WHERE id_panier = " . $idPanier['id']);

                if ($nbProduit['count'] <= 1) {
                    $monPanier = get_result("SELECT * FROM Panier_Produit WHERE id_panier = " . $idPanier['id']);
                    affichagePanier($monPanier, $nbProduit);
                } else {
                    $monPanier = get_results("SELECT * FROM Panier_Produit WHERE id_panier = " . $idPanier['id']);
                    affichagePanierList($monPanier, $nbProduit);
                }
            }
        }
    }
    else {
        accueil();
    }

}


function affichagePanier($monPanier, $nbProduit){
    $menu['page'] = "panier";

    global $idUser;

    if (isset($_GET['identifiant']) && $_GET['identifiant']) {
        $unProduit = get_result("SELECT * FROM Produit WHERE identifiant = '" . $_GET['identifiant'] . "'");
        if (isset($_POST['panier_quantite']) && $_POST['panier_quantite'])
            $checkSuppression = suppresionProduit($unProduit['id'], $_POST['panier_quantite']);
    }

    $idPanier = get_result("SELECT id FROM Panier WHERE id_client = " .$idUser);
    $nbProduit = get_result("SELECT COUNT(*) as 'count' FROM Panier_Produit WHERE id_panier = " .$idPanier['id']);
    $monPanier = get_result("SELECT * FROM Panier_Produit WHERE id_panier = " .$idPanier['id']);

    require("view/inc/inc.head.php");
    require("view/inc/inc.header.php");
    require('view/panier/v-panier.php');
    require("view/inc/inc.footer.php");
}

function affichagePanierList($monPanier, $nbProduit){
    $menu['page'] = "panier";

    global $idUser;

    if (isset($_GET['identifiant']) && $_GET['identifiant']) {
        $unProduit = get_result("SELECT * FROM Produit WHERE identifiant = '" . $_GET['identifiant'] . "'");
        if (isset($_POST['panier_quantite']) && $_POST['panier_quantite'])
            $checkSuppression = suppressionProduit($unProduit['id'], $_POST['panier_quantite']);
    }

    $idPanier = get_result("SELECT id FROM Panier WHERE id_client = " .$idUser);
    $nbProduit = get_result("SELECT COUNT(*) as 'count' FROM Panier_Produit WHERE id_panier = " .$idPanier['id']);
    $monPanier = get_results("SELECT * FROM Panier_Produit WHERE id_panier = " . $idPanier['id']);


    require("view/inc/inc.head.php");
    require("view/inc/inc.header.php");
    require('view/panier/v-panier-list.php');
    require("view/inc/inc.footer.php");
}


function affichagePanierVide(){
    $menu['page'] = "panier";

    require("view/inc/inc.head.php");
    require("view/inc/inc.header.php");
    require('view/panier/v-panier-vide.php');
    require("view/inc/inc.footer.php");
}


function suppressionProduit($idProduit, $quantite){
    global $idUser;

    try {
        $panier = get_result("SELECT id FROM Panier WHERE id_client = " . $idUser);
        $exist = get_result("SELECT COUNT(id) as 'exist' FROM Panier_Produit WHERE id_panier = ".$panier['id']." and id_produit = ".$idProduit);

        if($exist['exist'] != 0) {
            $quantiteProduit = get_result("SELECT quantite FROM Panier_Produit WHERE id_panier = " . $panier['id'] . " and id_produit = " . $idProduit);

            if ($quantite >= $quantiteProduit['quantite']) {
                delete("DELETE FROM Panier_Produit WHERE id_panier = " . $panier['id'] . " and id_produit = " . $idProduit);
            } else {
                update("UPDATE Panier_Produit SET quantite = quantite - " . $quantite . " WHERE id_panier = " . $panier['id'] . " and id_produit = " . $idProduit);
            }
            return 1;
        }
        else{
            return 0;
        }
    }
    catch(Exception $err){
        error_log($err);
        return 0;
    }

}


function viderPanier($idPanier)
{
    delete("DELETE FROM Panier_Produit WHERE id_panier = " . $idPanier['id']);
    delete("DELETE FROM Panier WHERE id = " . $idPanier['id']);
}