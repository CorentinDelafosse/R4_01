<?php

require_once ('src/model.php');

function commande()
{
    $menu['page'] = "commande";

    global $idUser;

    $idPanier = get_result("SELECT id FROM Panier WHERE id_client = " . $idUser);
    $monPanier = get_results("SELECT * FROM Panier_Produit WHERE id_panier = " . $idPanier['id']);

    if (isset($_POST['confirmer']) && $_POST['confirmer']) {
        $idCommande = AjoutCommande($idUser, $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['telephone'], $_POST['adresse'], $_POST['complement'], $_POST['code_postal'], $_POST['ville'], $_POST['nomL'], $_POST['prenomL'], $_POST['emailL'], $_POST['telephoneL'], $_POST['adresseL'], $_POST['complementL'], $_POST['code_postalL'], $_POST['villeL']);
        viderPanier($idPanier);
        $total = $_POST['totalPanier'];
        paiement($total, $idCommande);
    } else {
        affichageCommande($monPanier);
    }
}


function affichageCommande($monPanier){
    global $idUser;

    require("view/inc/inc.head.php");
    require("view/inc/inc.header.php");
    require('view/commande/v-commande.php');
    require("view/inc/inc.footer.php");
}

function AjoutCommande($id_client, $nom, $prenom, $email, $telephone, $adresse, $complement, $code_postal, $ville, $nomL, $prenomL, $emailL, $telephoneL, $adresseL, $complementL, $code_postalL, $villeL){
    $date_creation = get_result("SELECT NOW() as date");
    insert("INSERT INTO Commande (id_client, nom, prenom, email, telephone, adresse, complement,code_postal, ville, nom_livraison, prenom_livraison, email_livraison, telephone_livraison, adresse_livraison,complement_livraison , code_postal_livraion, ville_livraison, date_creation, date_visibilite, statut) VALUES (".$id_client.",'".$nom."','".$prenom."','".$email."','".$telephone."','".$adresse."','".$complement."','".$code_postal."','".$ville."','".$nomL."','".$prenomL."','".$emailL."','".$telephoneL."','".$adresseL."','".$complementL."','".$code_postalL."','".$villeL."','".$date_creation['date']."',NOW(),0)");

    $commande = get_result("SELECT * FROM Commande WHERE id_client = ".$id_client." and date_creation = '".$date_creation['date']."'");
    $panier = get_result("SELECT * FROM Panier WHERE id_client = ".$id_client);
    $nbProduit = get_result("SELECT COUNT(*) as 'count' FROM Panier_Produit WHERE id_panier = " . $panier['id']);

    if($nbProduit['count'] <= 1){
        $produitPanier = get_result("SELECT * FROM Panier_Produit WHERE id_panier = ".$panier['id']);
        $produit = get_result("SELECT prix, id_tva FROM Produit WHERE id = ".$produitPanier['id_produit']);
        insert("INSERT INTO Commande_Produit (id_commande, id_produit, quantite, prix_unitaire, id_tva) VALUES (".$commande['id'].",".$panier['id'].",".$produitPanier['quantite'].",".$produit['prix'].", ".$produit['id_tva'].")");

    }
    else {
        $produitPanier = get_results("SELECT * FROM Panier_Produit WHERE id_panier = " . $panier['id']);
        foreach ($produitPanier as $item) :
            $produit = get_result("SELECT prix, id_tva FROM Produit WHERE id = ".$item['id_produit']);
            insert("INSERT INTO Commande_Produit (id_commande, id_produit, quantite, prix_unitaire, id_tva) VALUES (".$commande['id'].",".$item['id_produit'].",".$item['quantite'].",".$produit['prix'].", ".$produit['id_tva'].")");
        endforeach;
    }

    return $commande['id'];
}
