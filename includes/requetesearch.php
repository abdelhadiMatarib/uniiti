<?php
header('Content-Type: application/json');
include_once '../config/configPDO.inc.php';


if ($_GET['search'] == "quoi") {
$sql = "SELECT result FROM
		(SELECT nom_enseigne AS result FROM enseignes 
			WHERE nom_enseigne LIKE '%" . $_GET['key'] . "%'
		UNION
		SELECT categorie_principale AS result FROM categories
			WHERE categorie_principale LIKE '%" . $_GET['key'] . "%'
		UNION
		SELECT sous_categorie AS result FROM sous_categories
			WHERE sous_categorie LIKE '%" . $_GET['key'] . "%'
		UNION
		SELECT sous_categorie2 AS result FROM sous_categories2
			WHERE sous_categorie2 LIKE '%" . $_GET['key'] . "%'			
			) AS t1
	ORDER BY result ASC LIMIT 0,10";
}
else {
$sql = "SELECT result FROM
		(SELECT nom_ville AS result FROM villes 
			WHERE nom_ville LIKE '" . $_GET['key'] . "%'
		UNION
		SELECT quartier AS result FROM quartier
			WHERE quartier LIKE '" . $_GET['key'] . "%'
		UNION
		SELECT arrondissement AS result FROM arrondissement
			WHERE arrondissement LIKE '%" . $_GET['key'] . "%') AS t1
	ORDER BY result ASC LIMIT 0,10";
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