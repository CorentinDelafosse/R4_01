<?php

require_once ('src/model.php');


function test(){
    if (isset($_GET['identifiant']) && $_GET['identifiant']) {
        testSimple($_GET['identifiant']);
    } else {
        testList();
    }
}

function testList(){
    $menu['page'] = "test";

    $data = get_results("test/");


    require("src/view/inc/inc.head.php");
    require("src/view/inc/inc.header.php");
    require('src/view/test/v-test-list.php');
    require("src/view/inc/inc.footer.php");
}


function testSimple($id){
    $menu['page'] = "test";

    $data = get_result("test/", $id);


    require("src/view/inc/inc.head.php");
    require("src/view/inc/inc.header.php");
    require('src/view/test/v-test.php');
    require("src/view/inc/inc.footer.php");
}