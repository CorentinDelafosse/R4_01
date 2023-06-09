<?php

require_once ('src/model.php');

function APITest(){
    if($_SERVER['REQUEST_METHOD'] !== 'POST'){
        http_response_code(405);
        die('Méthode non autorisée');
    }

    if(!isset($_POST['token']) || $_POST['token'] !== 'M3dNN3h0RkpjOUZuWXBMektxMkU1UFp1VmM4fQ=='){
        http_response_code(401);
        die('Non autorisée');
    }

    if(isset($_POST['id']) && $_POST['id']){
        $data = get_results("SELECT * FROM test WHERE id=".$_POST['id']);
    }
    else
        $data = get_results("SELECT * FROM test");


    echo json_encode($data);

}
