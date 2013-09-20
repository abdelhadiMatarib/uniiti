<?php
header('Content-Type: application/json');
include_once '../config/configPDO.inc.php';


if ($_GET['search'] == "enseigne") {
	$sql = "SELECT nom_enseigne AS result FROM enseignes 
				WHERE nom_enseigne LIKE '%" . $_GET['key'] . "%'
					ORDER BY nom_enseigne ASC LIMIT 0,10";
}
else if ($_GET['search'] == "objet") {
	$sql = "SELECT id_objet, nom_objet FROM objets 
				WHERE nom_objet LIKE '%" . $_GET['key'] . "%'
					ORDER BY nom_objet ASC LIMIT 0,10";
}
$req = $bdd->prepare($sql);
$req->execute();
$result = $req->fetchAll(PDO::FETCH_ASSOC);

$Compteur = 0;
foreach ($result as $row)
{
	$Compteur++;
	foreach ($row as $key => $value) {$data[$Compteur][$key] = $value;}
}	

if (!isset($data)) {$data[1]['result'] = '';}
echo json_encode($data);

?>