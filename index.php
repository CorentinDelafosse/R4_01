<?php

$idUser = 1;

require_once('src/controllers/c-accueil.php');
require_once('src/controllers/c-produit.php');
require_once('src/controllers/c-post.php');
require_once('src/controllers/c-panier.php');
require_once('src/controllers/c-commande.php');
require_once('src/controllers/c-paiement.php');
require_once('src/controllers/c-test-produit.php');
require_once('src/controllers/c-test-panier.php');
require_once('src/controllers/c-test-service.php');
require_once('src/controllers/c-retour.php');


//API
require_once('src/controllers/api/c-api-liste.php');
require_once('src/controllers/api/c-api-commande.php');
require_once('src/controllers/api/c-api-paiement.php');
require_once('src/controllers/api/c-api-test.php');


if(isset($_GET['url']) && $_GET['url']) { #vérifie si $_GET['url'] n'est pas vide
    $url = rtrim($_GET['url'], '/');
    if($url){
        switch($url){
            case "post" :
                post();
                break;
            case "produit" :
                produit();
                break;
            case "panier" :
                panier();
                break;
            case "commande" :
                commande();
                break;
            case "testProduit" :
                testAjout();
                break;
            case "testPanier" :
                testSuppr();
                break;
            case "effectue" :
                effectue();
                break;
            case "annule" :
                annule();
                break;
            case "refuse" :
                refuse();
                break;
            case "confirmation" :
                ajoutPaiement();
                break;
            case "testService" :
                testService();
                break;
            default :
                accueil();
                break;
        }
    }else accueil();
}
else if(isset($_GET['urlAPI']) && $_GET['urlAPI']) { #vérifie si $_GET['url'] n'est pas vide
    $url = rtrim($_GET['urlAPI'], '/');
        if($url) {
            switch ($url) {
                case "commande" :
                    APICommande();
                    break;
                case "paiement" :
                    APIPaiement();
                    break;
                case "test" :
                    APITest();
                    break;
                default :
                    APIListe();
                    break;
            }
    } else accueil();
}
else{
    accueil();
}