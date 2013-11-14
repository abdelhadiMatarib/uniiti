<?php
header('Content-Type: application/json');
include_once '../config/configuration.inc.php';
include_once '../config/configPDO.inc.php';
include_once 'fonctions.inc.php';


if (!empty($_POST['type'])) {$type = $_POST['type'];} else {exit;}
if (isset($_POST['id_contributeur'])) {$id_contributeur = $_POST['id_contributeur'];} else {exit;}
if (isset($_POST['id_objet'])) {$id_objet = $_POST['id_objet'];} else {exit;}
if (isset($_POST['id_avis'])) {$id_avis = $_POST['id_avis'];} else {exit;}
if (isset($_POST['commentaire'])) {$commentaire = $_POST['commentaire'];} else {exit;}
if (isset($_POST['reponse'])) {$reponse = $_POST['reponse'];}
if (isset($_POST['note'])) {$note = $_POST['note'];} else {exit;}
$date = date('Y-m-d H:i:s');

try
{
	// Requete
	$bdd->beginTransaction(); // Début transaction pour requetes multiples

	switch ($type) {
		case 'note':
			$sql = "UPDATE avis_objet SET note = " . $note * 2 . ", date_avis = '" . $date . "' WHERE id_avis = " . $id_avis;
			$req = $bdd->prepare($sql);
			$req->execute();
			$bdd->commit(); // Validation de la transaction / des requetes
			$req->closeCursor();    // Ferme la connexion du serveur
		break;
		case 'commentaire':
			$sql = "UPDATE avis_objet SET commentaire = '" . htmlspecialchars($commentaire) . "', date_avis = '" . $date . "' WHERE id_avis = " . $id_avis;
			$req = $bdd->prepare($sql);
			$req->execute();
			$bdd->commit(); // Validation de la transaction / des requetes
			$req->closeCursor();    // Ferme la connexion du serveur
		break;
		case 'reponse':
			$commentaire = htmlspecialchars($commentaire);
			if ($reponse != '') {$reponse = "<BR><b>Réponse du commerçant :</b> " . htmlspecialchars($reponse);}
			$sql = "UPDATE avis_objet SET commentaire = CONCAT(:commentaire, :reponse) WHERE id_avis = :id_avis";
			$req = $bdd->prepare($sql);
			$req->bindParam(':id_avis', $id_avis, PDO::PARAM_INT);
			$req->bindParam(':commentaire', $commentaire, PDO::PARAM_STR);
			$req->bindParam(':reponse', $reponse, PDO::PARAM_STR);
			$req->execute();
			$bdd->commit(); // Validation de la transaction / des requetes
			$req->closeCursor();    // Ferme la connexion du serveur
		break;
		case 'suppression':
			$sql2 = "DELETE FROM contributeurs_donnent_avis_objet WHERE avis_id_avis = " . $id_avis . " AND contributeurs_id_contributeur = " . $id_contributeur;
			$req2 = $bdd->prepare($sql2);
			$req2->execute();
			$sql3 = "DELETE FROM objets_recoient_avis WHERE avis_id_avis = " . $id_avis . " AND objets_id_objet = " . $id_objet;
			$req3 = $bdd->prepare($sql3);
			$req3->execute();
			$sql = "DELETE FROM avis_objet WHERE id_avis = " . $id_avis;
			$req = $bdd->prepare($sql);
			$req->execute();
			$bdd->commit(); // Validation de la transaction / des requetes
			$req->closeCursor();    // Ferme la connexion du serveur
			$req2->closeCursor();    // Ferme la connexion du serveur
			$req3->closeCursor();    // Ferme la connexion du serveur
		break;
		case 'publication':
			$sql = "UPDATE avis_objet SET id_statut = 2 WHERE id_avis = " . $id_avis;
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