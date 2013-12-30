<?php

session_start();
include_once '../config/configPDO.inc.php';

//============================================================================================================
//============================================TEST IF USER IS THE OWNER OF THIS SHOP=========================================================
//============================================================================================================
//if user is not admin
if ($_SESSION['droits'] != 8) {
    header('location: /');
}


//all user to prospect for their opinion 
$sql = "SELECT t1.*, T2.nom_enseigne ";
$sql .= "FROM demande_avis T1 ";
$sql .= "JOIN enseignes T2 on T1.enseigne_id = T2.id_enseigne ";
$sql .= "WHERE T1.a_donne_avis = 0";

$req = $bdd->prepare($sql);
$req->execute();
$data = $req->fetchAll();
if (!empty($data)) {
    $fichier = 'avis_a_collecter.csv';
    $fp = fopen('php://output', 'w');
    foreach ($data as $fields) {
        fputcsv($fp, array(
                            $fields['prenom'], $fields['nom'], $fields['email'], $fields['telephone'], $fields['nom_enseigne'], $fields['commentaire'], 'http://uniiti.fr/avis/ajouter/'.$fields['token'])
                , ';');
    }
    fclose($fp);
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename=' . $fichier);
} else {
    die('Impossible de trouver la campagne');
}
?>
