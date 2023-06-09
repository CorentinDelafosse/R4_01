<?php

require_once('src/model.php');


function produit()
{
    if (isset($_GET['identifiant']) && $_GET['identifiant']) {
        $unProduit = get_result("SELECT * FROM Produit WHERE identifiant = '" . $_GET['identifiant'] . "'");
        produitSimple($unProduit);
    } else {
        $listProduit = get_results("SELECT * FROM Produit WHERE statut = 1");
        produitList($listProduit);
    }
}

function produitSimple($unProduit)
{
    $menu['page'] = "produit";

    if (isset($_POST['produit_quantite']) && $_POST['produit_quantite'])
        $checkAjout = ajoutPanier($unProduit['id'], $unProduit['nom'], $_POST['produit_quantite']);

    //Condition $_POST sur le formulaire de qantité -> produit_quantité
    //function ajouterAuPanier() qui retourne true/false --> "checkAjout"

    require("view/inc/inc.head.php");
    require("view/inc/inc.header.php");
    require('view/produit/v-produit.php');
    require("view/inc/inc.footer.php");
}

function produitList($listProduit)
{
    $menu['page'] = "produit";

    require("view/inc/inc.head.php");
    require("view/inc/inc.header.php");
    require('view/produit/v-produit-list.php');
    require("view/inc/inc.footer.php");
}

function ajoutPanier($idProduit, $nomProduit, $quantite)
{
    global $idUser;

    try {
        $verifProduit = get_result("SELECT COUNT(id) as 'exist' FROM Produit WHERE id = " . $idProduit . " and nom = '" . $nomProduit . "'");

        if ($verifProduit['exist'] == 1) {
            //Est-ce que l'utilisateur a un panier
            $panier = get_result("SELECT COUNT(*) as 'count' FROM Panier WHERE id_client = " . $idUser);

            //Sinon créer un panier
            if ($panier['count'] == 0)
                insert("INSERT INTO Panier VALUES (" . $idUser . ", " . $idUser . ", NOW())");

            $panier = get_result("SELECT * FROM Panier WHERE id_client = " . $idUser);
            //Regarder si le produit est dans le panier
            $produit = get_result("SELECT COUNT(id_panier) as 'count' FROM Panier_Produit WHERE id_panier = " . $panier['id'] . " and id_produit = " . $idProduit);
            //Update pour l'ajouter dans le panier
            if ($produit['count'] == 1)
                insert("UPDATE Panier_Produit SET quantite = quantite + " . $quantite . " WHERE id_panier = " . $panier['id'] . " and id_produit = " . $idProduit);
            //Sinon
            //Insert dans panier_produit
            else
                insert("INSERT INTO Panier_Produit(id_panier, id_produit, quantite) VALUES (" . $idUser . ", " . $idProduit . ", " . $quantite . ")");

            /*   if($pdo->errorCode() = 'ERROR') {
                   return 1;
               }
               else{
                   return 0;
               }*/
            return 1;
        } else {
            return 0;
        }
    }
    catch(Exception $err){
        error_log($err);
}
}