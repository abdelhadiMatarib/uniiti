<?php
header('Content-Type: application/json');
include_once '../config/configPDO.inc.php';



$sql = "SELECT email_contributeur AS nom, id_contributeur AS id FROM contributeurs 
			WHERE email_contributeur LIKE '%" . $_GET['key'] . "%'
				ORDER BY nom ASC LIMIT 0,10";
				
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