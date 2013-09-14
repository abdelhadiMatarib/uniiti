<?php
header('Content-Type: application/json');
include_once '../config/configPDO.inc.php';


$sql = "SELECT * FROM villes WHERE nom_ville LIKE '%" . $_GET['key'] . "%'";
$req = $bdd->prepare($sql);
$req->execute();
$result = $req->fetchAll(PDO::FETCH_ASSOC);

$Compteur = 0;
foreach ($result as $row)
{
	$Compteur++;
	foreach ($row as $key => $value) {$data[$Compteur][$key] = $value;}
}	

if (!isset($data)) {$data[1]['nom_ville'] = '';}
echo json_encode($data);

?>