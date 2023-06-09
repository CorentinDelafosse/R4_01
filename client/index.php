<?php

$idUser = 1;

require_once('src/controllers/c-commande.php');
require_once('src/controllers/c-paiement.php');
require_once('src/controllers/c-liste.php');
require_once('src/controllers/c-test.php');

if(isset($_GET['url']) && $_GET['url']) { #vérifie si $_GET['url'] n'est pas vide
    $url = rtrim($_GET['url'], '/');
    if($url){
        switch($url){
            case "commande" :
                commande();
                break;
            case "paiement":
                paiement();
                break;
            case "test":
                test();
                break;
            default :
                liste();
                break;
        }
    }else liste();
}
else{
    liste();
}
