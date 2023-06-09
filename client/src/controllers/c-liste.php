<?php

require_once ('src/model.php');


function liste(){
    listeList();
}

function listeList(){
    $menu['page'] = "liste";

    $data = get_results("liste/");

    require("src/view/inc/inc.head.php");
    require("src/view/inc/inc.header.php");
    require('src/view/liste/v-liste.php');
    require("src/view/inc/inc.footer.php");
}