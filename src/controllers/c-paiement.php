<?php

function paiement($total, $idCommande){

    $menu['page'] = "paiement";
// --------------- DÉCLARATION DES VARIABLES ---------------

$pbx_rang = '001';
$pbx_total = $total;
$pbx_site = '3277512';
$pbx_identifiant = '38023694';

$serveurs = array('tpeweb.e-transactions.fr', //serveur primaire
    'tpeweb1.e-transactions.fr'); //serveur secondaire//variable de test 200
// Suppression des points ou virgules dans le montant
$pbx_total = str_replace(",", "", $pbx_total);
$pbx_total = str_replace(".", "", $pbx_total);

$pbx_cmd = "22gp1-".$idCommande;											//variable de test cmd_test1
$pbx_porteur = 'test@test.fr';												//variable de test test@test.fr

// Paramétrage de l'url de retour back office site (notification de paiement IPN) :
$pbx_repondre_a = 'https://s4-gp64.kevinpecro.info/confirmation/';

// Paramétrage des données retournées via l'IPN :
$pbx_retour = 'Mt:M;Ref:R;Auto:A;Erreur:E';
$pbx_ruf1 = "POST";

// Paramétrage des urls de redirection navigateur client après paiement :
$pbx_effectue = 'https://s4-gp64.kevinpecro.info/effectue/';
$pbx_annule = 'https://s4-gp64.kevinpecro.info/annule/';
$pbx_refuse = 'https://s4-gp64.kevinpecro.info/refuse/';

// On récupère la date au format ISO-8601 :
$dateTime = date("c");

// Nombre de produit envoyé dans PBX_SHOPPINGCART :
$pbx_nb_produit = '5';									//variable de test 5
// Construction de PBX_SHOPPINGCART :
$pbx_shoppingcart = "<?xml version=\"1.0\" encoding=\"utf-8\"?><shoppingcart><total><totalQuantity>".$pbx_nb_produit."</totalQuantity></total></shoppingcart>";

// Valeurs envoyées dans PBX_BILLING :
$pbx_prenom_fact = 'Jean-Marie';							//variable de test Jean-Marie
$pbx_nom_fact = 'Thomson';									//variable de test Thomson
$pbx_adresse1_fact = '1 rue de Paris';						//variable de test 1 rue de Paris
$pbx_adresse2_fact = '2 rue de Paris';						//variable de test <vide>
$pbx_zipcode_fact = '75001';						    	//variable de test 75001
$pbx_city_fact = 'Paris';									//variable de test Paris
$pbx_country_fact = '250';		                            //variable de test 250 (pour la France)
// Construction de PBX_BILLING :
$pbx_billing = "<?xml version=\"1.0\" encoding=\"utf-8\"?><Billing><Address><FirstName>".$pbx_prenom_fact."</FirstName>".
    "<LastName>".$pbx_nom_fact."</LastName><Address1>".$pbx_adresse1_fact."</Address1>".
    "<Address2>".$pbx_adresse2_fact."</Address2><ZipCode>".$pbx_zipcode_fact."</ZipCode>".
    "<City>".$pbx_city_fact."</City><CountryCode>".$pbx_country_fact."</CountryCode>".
    "</Address></Billing>";

// --------------- SÉLÉCTION DE L'ENVIRRONEMENT ---------------
// Recette (paiements de test)  :
$urletrans ="https://recette-tpeweb.e-transactions.fr/php/";

// Production (paiements réels) :
// URL principale :
// $urletrans ="https://tpeweb.e-transactions.fr/php/";
// URL secondaire :
// $urletrans ="https://tpeweb1.e-transactions.fr/php/";

// --------------- RÉCUPÉRATION DE LA CLÉ HMAC ---------------
// Connection à la base de données
// mysql_connect...
// On récupère la clé secrète HMAC (stockée dans une base de données par exemple) et que l’on renseigne dans la variable $hmackey;
$hmackey =
    "E28ED3CE6CA7AC848C2E47072DBC609838CDDD08AAB2E93C4C1C02067B16C81FDFD31322F9E397F75186AADA74B828C31821A4258F95D93608E3575158B04966";
// --------------- TRAITEMENT DES VARIABLES ---------------

// On crée la chaîne à hacher sans URLencodage
$msg = "PBX_SITE=".$pbx_site.
    "&PBX_RANG=".$pbx_rang.
    "&PBX_IDENTIFIANT=".$pbx_identifiant.
    "&PBX_TOTAL=".$pbx_total.
    "&PBX_DEVISE=978".
    "&PBX_CMD=".$pbx_cmd.
    "&PBX_PORTEUR=".$pbx_porteur.
    "&PBX_REPONDRE_A=".$pbx_repondre_a.
    "&PBX_RETOUR=".$pbx_retour.
    "&PBX_EFFECTUE=".$pbx_effectue.
    "&PBX_ANNULE=".$pbx_annule.
    "&PBX_REFUSE=".$pbx_refuse.
    "&PBX_HASH=SHA512".
    "&PBX_RUF1=".$pbx_ruf1.
    "&PBX_TIME=".$dateTime.
    "&PBX_SHOPPINGCART=".$pbx_shoppingcart.
    "&PBX_BILLING=".$pbx_billing;
// echo $msg;

// Si la clé est en ASCII, On la transforme en binaire
$binKey = pack("H*", $hmackey);

// On calcule l’empreinte (à renseigner dans le paramètre PBX_HMAC) grâce à la fonction hash_hmac et //
// la clé binaire
// On envoi via la variable PBX_HASH l'algorithme de hachage qui a été utilisé (SHA512 dans ce cas)
// Pour afficher la liste des algorithmes disponibles sur votre environnement, décommentez la ligne //
// suivante
// print_r(hash_algos());
$hmac = strtoupper(hash_hmac('sha512', $msg, $binKey));

// La chaîne sera envoyée en majuscule, d'où l'utilisation de strtoupper()
// On crée le formulaire à envoyer
// ATTENTION : l'ordre des champs dans le formulaire est extrêmement important, il doit
// correspondre exactement à l'ordre des champs dans la chaîne hachée.


    require("view/inc/inc.head.php");
    require("view/inc/inc.header.php");
    require('view/paiement/v-paiement.php');
    require("view/inc/inc.footer.php");
}


function ajoutPaiement(){
    $montant = $_POST['Mt'] ?? 'NULL';
    $ref_com = $_POST['Ref'] ?? 'NULL';
    $auto = $_POST['Auto'] ?? 'NULL';
    $erreur = $_POST['Erreur'] ?? 'NULL';
    insert("INSERT INTO Paiement (mt, ref, auto, erreur) VALUES (".$montant.",'".$ref_com."','".$auto."','".$erreur."')");


    $num = 0;
    preg_match('/\d+$/', $ref_com, $matches);
    if (count($matches) > 0) {
        $num = intval($matches[0]);
    }

    update("UPDATE Commande SET statut = 1 WHERE id = ".$num);
    update("UPDATE Commande SET date_visibilite = NOW() WHERE id = ".$num);

}