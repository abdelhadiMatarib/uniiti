<?php
header('Content-Type: application/json');
include_once '../config/configPDO.inc.php';

$date = date('Y-m-d H:i:s');
$id_enseigne1 = $_POST['id_enseigne1'];
$id_enseigne2 = $_POST['id_enseigne2'];
$id_statut = $_POST['id_statut'];

try
{
	// Requete
	$bdd->beginTransaction(); // Début transaction pour requetes multiples

		// Vérification si le réseau existe déjà
		$sqlCheck = "SELECT * FROM enseignes_reseau_enseignes
					 WHERE enseignes_id_enseigne2 = :id_enseigne2 AND enseignes_id_enseigne1=:id_enseigne1
					";

		$reqCheck = $bdd->prepare($sqlCheck);
		$reqCheck->bindParam(':id_enseigne2', $id_enseigne2, PDO::PARAM_INT);
		$reqCheck->bindParam(':id_enseigne1', $id_enseigne1, PDO::PARAM_INT);
		$reqCheck->execute();
		$resultCheck = $reqCheck->fetch(PDO::FETCH_ASSOC);

		if (!$_POST['check']) {
			if (!$resultCheck) {
				$sql = "INSERT INTO enseignes_reseau_enseignes
						(enseignes_id_enseigne2, enseignes_id_enseigne1, id_statut, date_reseau) 
						VALUES (:id_enseigne2, :id_enseigne1, :id_statut, :date_reseau)";
				$req = $bdd->prepare($sql);
				$req->bindParam(':id_enseigne2', $id_enseigne2, PDO::PARAM_INT);
				$req->bindParam(':id_enseigne1', $id_enseigne1, PDO::PARAM_INT);
				$req->bindParam(':id_statut', $id_statut, PDO::PARAM_INT);
				$req->bindParam(':date_reseau', $date, PDO::PARAM_STR);
				$req->execute();
				$data['existe'] = 1;
			}
			else {
				$sql = "UPDATE enseignes_reseau_enseignes SET id_statut = :id_statut WHERE enseignes_id_enseigne2 = :id_enseigne2 AND enseignes_id_enseigne1 = :id_enseigne1";
				$req = $bdd->prepare($sql);
				$req->bindParam(':id_enseigne2', $id_enseigne2, PDO::PARAM_INT);
				$req->bindParam(':id_enseigne1', $id_enseigne1, PDO::PARAM_INT);
				$req->bindParam(':id_statut', $id_statut, PDO::PARAM_INT);
				$req->execute();
				$data['existe'] = 1;			
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