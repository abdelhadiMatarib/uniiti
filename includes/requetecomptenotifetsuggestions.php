<?php
header('Content-Type: application/json');
include_once '../config/configPDO.inc.php';


if (isset($_POST['type'])) {$type = $_POST['type'];} else {exit;}

$sql = "SELECT COUNT(id_notification) AS count_notif FROM notifications WHERE id_statut = 1 AND type_notification = '" . $type . "'";
$req = $bdd->prepare($sql);
$req->execute();
$result = $req->fetch(PDO::FETCH_ASSOC);
$data['nbnotifs'] = $result['count_notif'];

$sql = "SELECT COUNT(id_suggestion) AS count_suggestions FROM suggestions WHERE id_statut = 1 AND type_suggestion = '" . $type . "'";
$req = $bdd->prepare($sql);
$req->execute();
$result = $req->fetch(PDO::FETCH_ASSOC);
$data['nbsuggestions'] = $result['count_suggestions'];

$sql = "SELECT COUNT(id_enseigne_clients_campagne) AS count_campain FROM enseigne_clients_campagne WHERE status = 1";
$req = $bdd->prepare($sql);
$req->execute();
$result = $req->fetch(PDO::FETCH_ASSOC);
$data['nb_new_compain'] = $result['count_campain'];

$data['total'] = $data['nbnotifs'] + $data['nbsuggestions']+ $data['nb_new_compain'];
echo json_encode($data);

?>