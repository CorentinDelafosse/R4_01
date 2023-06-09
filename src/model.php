<?php
$port = 3306;
$server = "localhost";
$base = "s4-gp64";
$user = "s4-gp64";
$mdp = "1B4z?gs&esHh9fJu";

try{
    $pdo = new PDO("mysql:host=$server;port=$port;dbname=$base;charset=utf8",$user,$mdp);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}

function get_result($requete){
    global $pdo;
    $requete = $pdo->query($requete);
    return $requete->fetch(PDO::FETCH_ASSOC);
}

function get_results($requete){
    global $pdo;
    $requete = $pdo->query($requete);
    return $requete->fetchAll(PDO::FETCH_ASSOC);
}

function insert($requete){
    global $pdo;
    $pdo->query($requete);
}

function update($requete){
    global $pdo;
    $pdo->query($requete);
}

function delete($requete){
    global $pdo;
    $pdo->query($requete);
}



/*  Model API  */
$urlAPI = "https://s4-gp64.kevinpecro.info/api/";

function get_result405($table){
    global $urlAPI;

    $url = $urlAPI . $table . '?' . http_build_query(array(
            "token" => "M3dNN3h0RkpjOUZuWXBMektxMkU1UFp1VmM4fQ=="
        ));

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPGET, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($curl);

    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    $data = array(
        "code" => $http_code,
        "Json" => $response
    );


    return ($data);
}


function get_result401($table){
    global $urlAPI;

    $url = $urlAPI . $table;

    $data = array(
    );

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($curl);

    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    $retour = array(
        "code" => $http_code,
        "Json" => $response
    );

    return ($retour);
}


function get_result200($table){
    global $urlAPI;

    $url = $urlAPI . $table;

    $data = array(
        "token" => "M3dNN3h0RkpjOUZuWXBMektxMkU1UFp1VmM4fQ=="
    );

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($curl);

    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    $retour = array(
        "code" => $http_code,
        "Json" => $response
    );

    return ($retour);
}