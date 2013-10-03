<?php
header('Content-Type: application/json');
include_once '../config/configuration.inc.php';
include_once '../config/configPDO.inc.php';
include_once 'fonctions.inc.php';


if (!empty($_POST['type'])) {$type = $_POST['type'];} else {exit;}
if (isset($_POST['id'])) {$id = $_POST['id'];} else {exit;}
if (isset($_POST['id_statut'])) {$id_statut = $_POST['id_statut'];} else {exit;}


try
{
	// Requete
	$bdd->beginTransaction(); // Début transaction pour requetes multiples

	switch ($type) {
		case 'notification':
			$sql = "UPDATE notifications SET id_statut = " . $id_statut . " WHERE id_notification = " . $id;
			$req = $bdd->prepare($sql);
		break;
		case 'suggestion':
			$sql = "UPDATE suggestions SET id_statut = " . $id_statut . " WHERE id_suggestion = " . $id;
			$req = $bdd->prepare($sql);
		break;
		case 'avis':
			$sql = "UPDATE avis SET id_statut = " . $id_statut . " WHERE id_avis = " . $id;
			$req = $bdd->prepare($sql);
		break;
		default:
			exit;
		break;
	}
	$req->execute();
	$bdd->commit(); // Validation de la transaction / des requetes
	$req->closeCursor();    // Ferme la connexion du serveur
	$data['result'] = 'ok';
	$bdd = null;            // Détruit l'objet PDO
	echo json_encode($data);
}
// Gestion des erreurs
catch (PDOException $erreur)
{
	$bdd->rollBack(); // Erreur => annulation transaction / des requetes    
	die ('Erreur : ' .$erreur->getMessage());
	exit;
}

?>