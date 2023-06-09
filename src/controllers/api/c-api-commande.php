<?php

require_once ('src/model.php');

function APICommande(){
    if($_SERVER['REQUEST_METHOD'] !== 'POST'){
        http_response_code(405);
        die('Méthode non autorisée');
    }

    if(!isset($_POST['token']) || $_POST['token'] !== 'M3dNN3h0RkpjOUZuWXBMektxMkU1UFp1VmM4fQ=='){
        http_response_code(401);
        die('Non autorisée');
    }


    if(isset($_POST['id']) && $_POST['id']){
        $data = get_results("SELECT * FROM Commande WHERE id=" . $_POST['id']);

        $oui = get_results("SELECT cp.id_produit, cp.quantite, p.nom, p.image
                                           FROM Commande_Produit cp
                                             INNER JOIN Produit p ON cp.id_produit = p.id
                                        WHERE cp.id_commande = ".$_POST['id']);

        $data[0]["produit"] = $oui;
    }
    else {
        $data = get_results("SELECT * FROM Commande");
    }

    $i = 0;
    foreach($data as $commande):
        $totalCommande = get_results("SELECT * FROM Commande_Produit WHERE id_commande = " . $commande['id']);

        $total = 0;
        foreach ($totalCommande as $item):
            $total += $item['quantite'] * $item['prix_unitaire'];
        endforeach;

        $data[$i]['total'] = $total;
        $i++;

    endforeach;

    http_response_code(200);
    echo json_encode($data);
}
