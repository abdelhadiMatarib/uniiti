<?php
header('Content-Type: application/json');
include_once '../config/configPDO.inc.php';

$date = date('Y-m-d H:i:s');
$id_enseigne = $_POST['id_enseigne'];
$id_contributeurACTIF = $_POST['id_contributeurACTIF'];

try
{
	// Requete
	$bdd->beginTransaction(); // Début transaction pour requetes multiples

		// Vérification si le contributeur a déjà ajouté l'enseigne à suivre à sa liste de suivi
		$sqlCheck = "SELECT contributeurs_id_contributeur
					 FROM contributeurs_follow_enseignes
					 WHERE contributeurs_id_contributeur = :id_contributeur AND enseignes_id_enseigne=:id_enseigne
					";

		$reqCheck = $bdd->prepare($sqlCheck);
		$reqCheck->bindParam(':id_contributeur', $id_contributeurACTIF, PDO::PARAM_INT);
		$reqCheck->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
		$reqCheck->execute();
		$resultCheck = $reqCheck->fetch(PDO::FETCH_ASSOC);

		if (!$_POST['check']) {
			if (!$resultCheck) {
				$sql = "INSERT INTO contributeurs_follow_enseignes
						(contributeurs_id_contributeur, enseignes_id_enseigne, date_follow) 
						VALUES (:id_contributeur, :id_enseigne, :date_follow)";
				$req = $bdd->prepare($sql);
				$req->bindParam(':id_contributeur', $id_contributeurACTIF, PDO::PARAM_INT);
				$req->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
				$req->bindParam(':date_follow', $date, PDO::PARAM_STR);
				$req->execute();
			}
			$data['existe'] = 1;
		}
		else {
			if (!$resultCheck) {$data['existe'] = 0;}
			else {$data['existe'] = 1;}		
		}

	$bdd->commit(); // Validation de la transaction / des requetes
	
	$reqCheck->closeCursor();
	if ((!$_POST['check']) && (!$resultCheck)) {$req->closeCursor();}    // Ferme la connexion du serveur
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