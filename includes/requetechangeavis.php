<?php
header('Content-Type: application/json');
include_once '../config/configuration.inc.php';
include_once '../config/configPDO.inc.php';
include_once 'fonctions.inc.php';


if (!empty($_POST['type'])) {$type = $_POST['type'];} else {exit;}
if (isset($_POST['id_contributeur'])) {$id_contributeur = $_POST['id_contributeur'];} else {exit;}
if (isset($_POST['id_enseigne'])) {$id_enseigne = $_POST['id_enseigne'];} else {exit;}
if (isset($_POST['id_avis'])) {$id_avis = $_POST['id_avis'];} else {exit;}
if (isset($_POST['commentaire'])) {$commentaire = $_POST['commentaire'];} else {exit;}
if (isset($_POST['note'])) {$note = $_POST['note'];} else {exit;}
$date = date('Y-m-d H:i:s');

try
{
	// Requete
	$bdd->beginTransaction(); // Début transaction pour requetes multiples

	switch ($type) {
		case 'note':
			$sql = "UPDATE avis SET note = " . $note * 2 . ", date_avis = '" . $date . "' WHERE id_avis = " . $id_avis;
			$req = $bdd->prepare($sql);
			$req->execute();
			$bdd->commit(); // Validation de la transaction / des requetes
			$req->closeCursor();    // Ferme la connexion du serveur
		break;
		case 'commentaire':
			$sql = "UPDATE avis SET commentaire = '" . htmlspecialchars($commentaire) . "', date_avis = '" . $date . "' WHERE id_avis = " . $id_avis;
			$req = $bdd->prepare($sql);
			$req->execute();
			$bdd->commit(); // Validation de la transaction / des requetes
			$req->closeCursor();    // Ferme la connexion du serveur
		break;
		case 'suppression':
			$sql2 = "DELETE FROM contributeurs_donnent_avis WHERE avis_id_avis = " . $id_avis . " AND contributeurs_id_contributeur = " . $id_contributeur;
			$req2 = $bdd->prepare($sql2);
			$req2->execute();
			$sql3 = "DELETE FROM enseignes_recoient_avis WHERE avis_id_avis = " . $id_avis . " AND enseignes_id_enseigne = " . $id_enseigne;
			$req3 = $bdd->prepare($sql3);
			$req3->execute();
			$sql = "DELETE FROM avis WHERE id_avis = " . $id_avis;
			$req = $bdd->prepare($sql);
			$req->execute();
			$bdd->commit(); // Validation de la transaction / des requetes
			$req->closeCursor();    // Ferme la connexion du serveur
			$req2->closeCursor();    // Ferme la connexion du serveur
			$req3->closeCursor();    // Ferme la connexion du serveur
		break;
		case 'publication':
			$sql = "UPDATE avis SET id_statut = 2 WHERE id_avis = " . $id_avis;
			$req = $bdd->prepare($sql);
			$req->execute();
			$bdd->commit(); // Validation de la transaction / des requetes
			$req->closeCursor();    // Ferme la connexion du serveur		
		break;
		default:
			exit;
		break;
	}
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