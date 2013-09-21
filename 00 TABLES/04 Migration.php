<?php
include_once '../acces/auth.inc.php';
include_once '../config/configuration.inc.php';
include_once '../config/configPDO.inc.php';
include_once '../includes/fonctions.inc.php';

try
{
	// Requete
	$bdd->beginTransaction(); // Début transaction pour requetes multiples

	
	$sql1 = "SELECT id_contributeur, photo_contributeur, slide1_contributeur FROM contributeurs";
	$req1 = $bdd->prepare($sql1);
	$req1->execute();
	$result1 = $req1->fetchAll(PDO::FETCH_ASSOC);
	
	foreach ($result1 as $row) {
		$sql = "UPDATE contributeurs SET photo_contributeur = :photo, slide1_contributeur = :couv, y1 = 0 
				WHERE id_contributeur = :id_contributeur";
		$req = $bdd->prepare($sql);
		$photo = "photo " . rand(1, 100) . ".jpg";
		$couv = "photo " . rand(1, 113) . ".jpg";
		$id_contributeur = $row['id_contributeur'];
		$req->bindParam(':photo', $photo, PDO::PARAM_STR);
		$req->bindParam(':couv', $couv, PDO::PARAM_STR);
		$req->bindParam(':id_contributeur', $id_contributeur, PDO::PARAM_STR);
		$req->execute();
	}
	
	echo "Affectation aléatoire des avatars et couvertures des utilisateurs : ok<BR><BR>";
	
	$sql2 = "SELECT id_enseigne, box_enseigne, slide1_enseigne FROM enseignes";
	$req2 = $bdd->prepare($sql2);
	$req2->execute();
	$result2 = $req2->fetchAll(PDO::FETCH_ASSOC);
	
	foreach ($result2 as $row) {
		$sql = "UPDATE enseignes SET box_enseigne = :photo, slide1_enseigne = :couv, y1 = 0 
				WHERE id_enseigne = :id_enseigne";
		$req = $bdd->prepare($sql);
		$photo = "photo 1.jpg";
		$couv = "photo " . rand(1, 113) . ".jpg";
		$id_enseigne = $row['id_enseigne'];
		$req->bindParam(':photo', $photo, PDO::PARAM_STR);
		$req->bindParam(':couv', $couv, PDO::PARAM_STR);
		$req->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_STR);
		$req->execute();
	}
	
	echo "Affectation aléatoire des avatars et couvertures des enseignes : ok<BR><BR>";
	
	
	
	
	
	
	
	
	
	$bdd->commit(); // Validation de la transaction / des requetes
	
	$req1->closeCursor();    // Ferme la connexion du serveur
	$bdd = null;            // Détruit l'objet PDO
	
}
// Gestion des erreurs
catch (PDOException $erreur)
{
	$bdd->rollBack(); // Erreur => annulation transaction / des requetes    
	die ('Erreur : ' .$erreur->getMessage());
	exit;
}
?>