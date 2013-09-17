<?php
header('Content-Type: application/json');
include_once '../config/configPDO.inc.php';

try
{
	// Requete
	$bdd->beginTransaction(); // Début transaction pour requetes multiples

	$sql = "UPDATE contributeurs SET
					slide1_contributeur = :slide1_contributeur,
					slide2_contributeur = :slide2_contributeur,
					slide3_contributeur = :slide3_contributeur,
					slide4_contributeur = :slide4_contributeur,
					slide5_contributeur = :slide5_contributeur,
					y1 = :y1,
					y2 = :y2,
					y3 = :y3,
					y4 = :y4,
					y5 = :y5
			WHERE id_contributeur = :id_contributeur";
	$req = $bdd->prepare($sql);
	$req->bindParam(':id_contributeur', $_POST['id_contributeur'], PDO::PARAM_STR);
	$req->bindParam(':slide1_contributeur', $_POST['image1'], PDO::PARAM_STR);
	$req->bindParam(':slide2_contributeur', $_POST['image2'], PDO::PARAM_STR);
	$req->bindParam(':slide3_contributeur', $_POST['image3'], PDO::PARAM_STR);
	$req->bindParam(':slide4_contributeur', $_POST['image4'], PDO::PARAM_STR);	
	$req->bindParam(':slide5_contributeur', $_POST['image5'], PDO::PARAM_STR);
	$req->bindParam(':y1', $_POST['y1'], PDO::PARAM_INT);
	$req->bindParam(':y2', $_POST['y2'], PDO::PARAM_INT);
	$req->bindParam(':y3', $_POST['y3'], PDO::PARAM_INT);
	$req->bindParam(':y4', $_POST['y4'], PDO::PARAM_INT);	
	$req->bindParam(':y5', $_POST['y5'], PDO::PARAM_INT);
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