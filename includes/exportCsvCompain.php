<?php
if (empty($_GET['id_compain'])) {
    die('Impossible de trouver la campagne');
} else {
    include_once '../config/configPDO.inc.php';
    $req = $bdd->prepare('SELECT * FROM enseigne_clients_campagne_destination WHERE enseigne_clients_campagne_id=:idEnseigne');
    $req->execute(array('idEnseigne'=>$_GET['id_compain']));

    $data = $req->fetchAll();
    if (!empty($data)) {
        $fichier = 'compain_num_'.$_GET['id_compain'].'.csv';
        $fp = fopen('php://output', 'w');
        foreach ($data as $fields) {
            fputcsv($fp, array($fields['prenom'], $fields['nom'], $fields['email'], $fields['telephone']),';');
        }
        fclose($fp);
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $fichier);
    } else {
        die('Impossible de trouver la campagne');
    }
}
?>
