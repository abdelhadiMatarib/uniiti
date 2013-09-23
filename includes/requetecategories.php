<?php
header('Content-Type: application/json');
include_once '../config/configPDO.inc.php';

if (empty($_POST['id_categorie'])) {
	$sql = "SELECT * FROM categories";
	$req = $bdd->prepare($sql);
}
else if (empty($_POST['id_sous_categorie'])) {
	$sql = "SELECT * FROM sous_categories WHERE id_categorie=" . $_POST['id_categorie'];
	$req = $bdd->prepare($sql);
}
else {
	$sql = "SELECT * FROM sous_categories2 WHERE 
		   id_categorie=" . $_POST['id_categorie']
		. " AND id_sous_categorie=" . $_POST['id_sous_categorie'];
	$req = $bdd->prepare($sql);
}
$req->execute();
$result = $req->fetchAll(PDO::FETCH_ASSOC);

$Compteur = 0;
foreach ($result as $row)
{
	$Compteur++;
	foreach ($row as $key => $value) {$data[$Compteur][$key] = $value;}
}	

echo json_encode($data);

?>