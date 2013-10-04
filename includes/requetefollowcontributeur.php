<?php
header('Content-Type: application/json');
include_once '../config/configPDO.inc.php';

$date = date('Y-m-d H:i:s');
$id_contributeur = $_POST['id_contributeur'];
$id_contributeurACTIF = $_POST['id_contributeurACTIF'];

try
{
	// Requete
	$bdd->beginTransaction(); // Début transaction pour requetes multiples

		// Vérification si le contributeur a déjà ajouté le contributeur à suivre à sa liste de suivi
		$sqlCheck = "SELECT contributeurs_id_contributeur
					 FROM contributeurs_follow_contributeurs
					 WHERE contributeurs_id_contributeur = :id_contributeur AND contributeurs_id_contributeurfollow=:id_contributeurfollow
					";

		$reqCheck = $bdd->prepare($sqlCheck);
		$reqCheck->bindParam(':id_contributeur', $id_contributeur, PDO::PARAM_INT);
		$reqCheck->bindParam(':id_contributeurfollow', $id_contributeurACTIF, PDO::PARAM_INT);
		$reqCheck->execute();
		$resultCheck = $reqCheck->fetch(PDO::FETCH_ASSOC);

		if (!$_POST['check']) {
			if (!$resultCheck) {
				$sql = "INSERT INTO contributeurs_follow_contributeurs
						(contributeurs_id_contributeur, contributeurs_id_contributeurfollow, date_follow) 
						VALUES (:id_contributeur, :id_contributeurfollow, :date_follow)";
				$req = $bdd->prepare($sql);
				$req->bindParam(':id_contributeur', $id_contributeur, PDO::PARAM_INT);
				$req->bindParam(':id_contributeurfollow', $id_contributeurACTIF, PDO::PARAM_INT);
				$req->bindParam(':date_follow', $date, PDO::PARAM_STR);
				$req->execute();
				$data['existe'] = 1;
			}
			else {
				$sql = "DELETE FROM contributeurs_follow_contributeurs WHERE contributeurs_id_contributeur = :id_contributeur AND contributeurs_id_contributeurfollow =:id_contributeurfollow";
				$req = $bdd->prepare($sql);
				$req->bindParam(':id_contributeur', $id_contributeur, PDO::PARAM_INT);
				$req->bindParam(':id_contributeurfollow', $id_contributeurACTIF, PDO::PARAM_INT);
				$req->execute();
				$data['existe'] = 0;				
			}
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