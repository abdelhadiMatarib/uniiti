<?php
header('Content-Type: application/json');
include_once '../config/configPDO.inc.php';



$sql = "SELECT * FROM contributeurs WHERE email_contributeur = '" . $_POST['email'] . "'";
				
$req = $bdd->prepare($sql);
$req->execute();
$result = $req->fetchAll(PDO::FETCH_ASSOC);

if ($result) {$data['result'] = 1;} else {$data['result'] = -1;}

echo json_encode($data);

?>