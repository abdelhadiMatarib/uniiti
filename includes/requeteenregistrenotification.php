<?php
header('Content-Type: application/json');
include_once '../config/configPDO.inc.php';


if (isset($_POST['id_enseigne_ou_objet'])) {$id_enseigne_ou_objet = $_POST['id_enseigne_ou_objet'];} else {exit;}
if (isset($_POST['id_contributeur'])) {$id_contributeur = $_POST['id_contributeur'];} else {exit;}
if (isset($_POST['id_avis'])) {$id_avis = $_POST['id_avis'];} else {exit;}
if (isset($_POST['type_notification'])) {$type_notification = $_POST['type_notification'];} else {exit;}
if (isset($_POST['id_action'])) {$id_action = $_POST['id_action'];} else {exit;}
if (isset($_POST['description'])) {$description = htmlspecialchars($_POST['description']);} else {exit;}

$date = date('Y-m-d H:i:s');
$id_statut = 1;

try
{
	// Requete
	$bdd->beginTransaction(); // Début transaction pour requetes multiples
	
	
	$sql = "INSERT INTO notifications 
			(id_enseigne_ou_objet, id_contributeur, id_avis, date_notification, type_notification, id_action, description, id_statut)
			VALUES (:id_enseigne_ou_objet, :id_contributeur, :id_avis, :date_notification, :type_notification, :id_action, :description, :id_statut)";
	$req = $bdd->prepare($sql);
	$req->bindParam(':id_enseigne_ou_objet', $id_enseigne_ou_objet, PDO::PARAM_INT);
	$req->bindParam(':id_contributeur', $id_contributeur, PDO::PARAM_INT);
	$req->bindParam(':id_avis', $id_avis, PDO::PARAM_INT);
	$req->bindParam(':date_notification', $date, PDO::PARAM_STR);
	$req->bindParam(':type_notification', $type_notification, PDO::PARAM_STR);
	$req->bindParam(':id_action', $id_action, PDO::PARAM_INT);
	$req->bindParam(':description', $description, PDO::PARAM_STR);
	$req->bindParam(':id_statut', $id_statut, PDO::PARAM_INT);

	$req->execute();
	$id_notification = $bdd->lastInsertId();
	
	$bdd->commit(); // Validation de la transaction / des requetes
	$req->closeCursor();
	
	$data['result'] = $id_notification;

	$bdd = null;            // Détruit l'objet PDO
	
	echo json_encode($data);

}
// Gestion des erreurs
catch (PDOException $erreur)
{
	$bdd->rollBack(); // Erreur => annulation transaction / des requetes  
	$data['result'] = $erreur->getMessage();
	echo json_encode($data);	
	die ('Erreur : ' .$erreur->getMessage());
	exit;
}

?>