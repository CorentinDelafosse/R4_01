<?php

require_once('src/model.php');


function paiement()
{
    if (isset($_GET['identifiant']) && $_GET['identifiant']) {
        paiementSimple($_GET['identifiant']);
    } else {
        paiementList();
    }
}

function paiementList()
{
    $menu['page'] = "paiement";

    $data = get_results("paiement/");

    require("src/view/inc/inc.head.php");
    require("src/view/inc/inc.header.php");
    require('src/view/paiement/v-paiement-list.php');
    require("src/view/inc/inc.footer.php");
}


function paiementSimple($id)
{
    $menu['page'] = "paiement";

    $data = get_result("paiement/", $id);


    require("src/view/inc/inc.head.php");
    require("src/view/inc/inc.header.php");
    require('src/view/paiement/v-paiement.php');
    require("src/view/inc/inc.footer.php");
}