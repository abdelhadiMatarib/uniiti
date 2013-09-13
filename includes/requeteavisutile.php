<?php
header('Content-Type: application/json');
include_once '../config/configPDO.inc.php';

$date = date('Y-m-d H:i:s');

try
{
	// Requete
	$bdd->beginTransaction(); // Début transaction pour requetes multiples

		// Vérification si le contributeur a déjà ajouté trouvé cet avis utile
		$sqlCheck = "SELECT id_contributeur_avis_utile, avis_utile
					 FROM contributeurs_avis_utiles
					 WHERE id_contributeur_avis_utile = :id_contributeur AND id_avis_utile=:id_avis
					";

		$reqCheck = $bdd->prepare($sqlCheck);
		$reqCheck->bindParam(':id_contributeur', $_POST['id_contributeur'], PDO::PARAM_STR);
		$reqCheck->bindParam(':id_avis', $_POST['id_avis'], PDO::PARAM_INT);
		$reqCheck->execute();
		$resultCheck = $reqCheck->fetch(PDO::FETCH_ASSOC);

		if (!$_POST['check']) {
			if (!$resultCheck) {
				$sql = "INSERT INTO contributeurs_avis_utiles
						(id_contributeur_avis_utile, id_avis_utile, avis_utile, date_avis_utile) 
						VALUES (:id_contributeur, :id_avis, :avis_utile, :date_avis_utile)";
				$req = $bdd->prepare($sql);
				$req->bindParam(':id_contributeur', $_POST['id_contributeur'], PDO::PARAM_INT);
				$req->bindParam(':id_avis', $_POST['id_avis'], PDO::PARAM_INT);
				$req->bindParam(':avis_utile', $_POST['avis_utile'], PDO::PARAM_INT);
				$req->bindParam(':date_avis_utile', $date, PDO::PARAM_INT);
				$req->execute();
			} else if ($resultCheck['avis_utile'] != $_POST['avis_utile']) {
				$sql = "UPDATE contributeurs_avis_utiles SET date_avis_utile=:date_avis_utile , avis_utile=:avis_utile
						WHERE id_contributeur_avis_utile=:id_contributeur AND id_avis_utile=:id_avis";
				$req = $bdd->prepare($sql);
				$req->bindParam(':id_contributeur', $_POST['id_contributeur'], PDO::PARAM_INT);
				$req->bindParam(':id_avis', $_POST['id_avis'], PDO::PARAM_INT);
				$req->bindParam(':avis_utile', $_POST['avis_utile'], PDO::PARAM_INT);
				$req->bindParam(':date_avis_utile', $date, PDO::PARAM_INT);
				$req->execute();
			}
			$data['existe'] = 1;
			$data['avisutile'] = $_POST['avis_utile'];
		}
		else {
			if (!$resultCheck) {$data['existe'] = 0;}
			else {$data['existe'] = 1;$data['avisutile'] = $resultCheck['avis_utile'];}		
		}

	$bdd->commit(); // Validation de la transaction / des requetes
	
	$reqCheck->closeCursor();
	if (!$_POST['check']) {$req->closeCursor();}    // Ferme la connexion du serveur
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