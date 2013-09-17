<?php
header('Content-Type: application/json');
include_once '../config/configPDO.inc.php';

try
{
	// Requete
	$bdd->beginTransaction(); // Début transaction pour requetes multiples

	$sql = "UPDATE contributeurs SET photo_contributeur = :photo WHERE id_contributeur = :id_contributeur";
	$req = $bdd->prepare($sql);
	$req->bindParam(':photo', $_POST['photo'], PDO::PARAM_STR);
	$req->bindParam(':id_contributeur', $_POST['id_contributeur'], PDO::PARAM_STR);
	$req->execute();
	$req->closeCursor();	

	$data['result'] = 'ok';

	$bdd->commit(); // Validation de la transaction / des requetes
	
	$req->closeCursor();    // Ferme la connexion du serveur
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