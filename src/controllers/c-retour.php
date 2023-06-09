<?php

function effectue(){
    require("view/inc/inc.head.php");
    require("view/inc/inc.header.php");
    require('view/paiement/result/v-effectue.php');
    require("view/inc/inc.footer.php");
}


function annule(){
    require("view/inc/inc.head.php");
    require("view/inc/inc.header.php");
    require('view/paiement/result/v-annule.php');
    require("view/inc/inc.footer.php");
}


function refuse(){
    require("view/inc/inc.head.php");
    require("view/inc/inc.header.php");
    require('view/paiement/result/v-refuse.php');
    require("view/inc/inc.footer.php");
}