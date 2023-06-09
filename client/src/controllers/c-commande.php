<?php

require_once ('src/model.php');


function commande(){
    if (isset($_GET['identifiant']) && $_GET['identifiant']) {
        commandeSimple($_GET['identifiant']);
    } else {
        commandeList();
    }
}

function commandeList(){
    $menu['page'] = "commande";

    $data = get_results("commande/");


    require("src/view/inc/inc.head.php");
    require("src/view/inc/inc.header.php");
    require('src/view/commande/v-commande-list.php');
    require("src/view/inc/inc.footer.php");
}


function commandeSimple($id){
    $menu['page'] = "commande";

    $data = get_result("commande/", $id);


    require("src/view/inc/inc.head.php");
    require("src/view/inc/inc.header.php");
    require('src/view/commande/v-commande.php');
    require("src/view/inc/inc.footer.php");
}