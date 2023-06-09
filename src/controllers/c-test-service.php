<?php
require_once("src/model.php");

function testService(){
    $menu['page'] = "testService";


    $Liste405 = get_result405("liste/");

    $Liste401 = get_result401("liste/");

    $Liste200 = get_result200("liste/");

    $Paiement405 = get_result405("paiement/");

    $Paiement401 = get_result401("paiement/");

    $Paiement200 = get_result200("paiement/");

    $Commande405 = get_result405("commande/");

    $Commande401 = get_result401("commande/");

    $Commande200 = get_result200("commande/");

    insert("INSERT INTO test (date, 405_List, 401_List, 200_List, 405_Paiement, 401_Paiement, 200_Paiement, 405_Commande, 401_Commande, 200_Commande, JsonList405, JsonList401, JsonList200, JsonPaiement405, JsonPaiement401, JsonPaiement200, JsonCommande405, JsonCommande401, JsonCommande200)
        VALUES (NOW(), ".$Liste405["code"].",".$Liste401["code"].",".$Liste200["code"].", ".$Paiement405["code"].",".$Paiement401["code"].",".$Paiement200["code"].", ".$Commande405["code"].",".$Commande401["code"].",".$Commande200["code"].", '".$Liste405["Json"]."','".$Liste401["Json"]."','".$Liste200["Json"]."','".$Paiement405["Json"]."','".$Paiement401["Json"]."','".$Paiement200["Json"]."','".$Commande405["Json"]."','".$Commande401["Json"]."','".$Commande200["Json"]."')");
}