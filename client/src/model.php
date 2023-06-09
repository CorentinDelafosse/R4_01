<?php

$urlAPI = "https://s4-gp64.kevinpecro.info/api/";

function get_result($table, $param){
    global $urlAPI;

    $url = $urlAPI . $table;

    $data = array(
        'token' => 'M3dNN3h0RkpjOUZuWXBMektxMkU1UFp1VmM4fQ==',
        'id' => $param,
    );

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($curl);

    if($response === false){
        error_log('Erreur Curl : ' . curl_error($curl));
    } else{
        error_log('Réponse du serveur : ' . $response);
    }

    curl_close($curl);

    return json_decode($response, true);
}

function get_results($table){
    global $urlAPI;

    $url = $urlAPI . $table;

    $data = array(
        'token' => 'M3dNN3h0RkpjOUZuWXBMektxMkU1UFp1VmM4fQ==',
    );

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($curl);

    if($response === false){
        error_log('Erreur Curl : ' . curl_error($curl));
        return false;
    } else{
        error_log('Réponse du serveur : ' . $response);
        curl_close($curl);

        return json_decode($response, true);
    }
}