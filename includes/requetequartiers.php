<?php
header('Content-Type: application/json');
include_once '../config/configPDO.inc.php';

if (empty($_POST['id_ville'])) {
	$sql = "SELECT * FROM villes";
	$req = $bdd->prepare($sql);
}
else if (empty($_POST['id_arrondissement'])) {
	$sql = "SELECT * FROM arrondissement WHERE id_ville=" . $_POST['id_ville'];
	$req = $bdd->prepare($sql);
}
else {
	$sql = "SELECT * FROM quartier WHERE 
		   id_ville=" . $_POST['id_ville']
		. " AND id_arrondissement=" . $_POST['id_arrondissement'];
	$req = $bdd->prepare($sql);
}
$req->execute();
$result = $req->fetchAll(PDO::FETCH_ASSOC);

if (!$result) {$data[1]['noresult'] = 'no result';}
else {
	$Compteur = 0;
	foreach ($result as $row)
	{
		$Compteur++;
		foreach ($row as $key => $value) {$data[$Compteur][$key] = $value;}
	}	
}

echo json_encode($data);

?>