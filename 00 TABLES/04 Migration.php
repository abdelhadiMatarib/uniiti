<?php
include_once '../acces/auth.inc.php';
include_once '../config/configuration.inc.php';
include_once '../config/configPDO.inc.php';
include_once '../includes/fonctions.inc.php';

try
{
	// Requete
	$bdd->beginTransaction(); // Début transaction pour requetes multiples

	$sql4 = "UPDATE enseignes SET professionnels_id_pro=:id_contributeur WHERE professionnels_id_pro=:id_pro";
	$req4 = $bdd->prepare($sql4);
	
	$sql3 = "SELECT * FROM professionnels";
	$req3 = $bdd->prepare($sql3);
	$req3->execute();
	$result3 = $req3->fetchAll(PDO::FETCH_ASSOC);
	
	foreach ($result3 as $row) {
		if ($row['id_pro'] > 3) {
			$req = $bdd->prepare('INSERT INTO contributeurs(email_contributeur,
															prenom_contributeur, 
															nom_contributeur, 
															sexe_contributeur, 
															password_contributeur, 
															groupes_permissions_id_permission
															) 
											VALUES(
															:email_contributeur, 
															:prenom_contributeur,  
															:nom_contributeur, 
															:sexe_contributeur, 
															:password_contributeur, 
															:groupes_permissions_id_permission
													)');
			$sexe = 2;
			$groupe_permission = 2;
			$req->bindParam(':email_contributeur', $row['login_pro'], PDO::PARAM_STR);
			$req->bindParam(':prenom_contributeur', $row['prenom_pro'], PDO::PARAM_STR);
			$req->bindParam(':nom_contributeur', $row['nom_pro'], PDO::PARAM_STR);
			$req->bindParam(':sexe_contributeur', $sexe, PDO::PARAM_INT);
			$req->bindParam(':password_contributeur', $row['password_pro'], PDO::PARAM_STR);
			$req->bindParam(':groupes_permissions_id_permission', $groupe_permission, PDO::PARAM_INT);
			$req->execute();
			$id_contributeur = $bdd->lastInsertId();
		}
		if ($row['id_pro'] <=3) {$id_contributeur = 4866;}
		$req4->bindParam(':id_contributeur', $id_contributeur, PDO::PARAM_INT);
		$req4->bindParam(':id_pro', $row['id_pro'], PDO::PARAM_INT);
		$req4->execute();
	}	

	echo "Réaffectation des professionnels à la table contributeurs : ok<BR><BR>";


	$sql5 = "UPDATE contributeurs SET date_naissance_jour_contributeur=:jour, date_naissance_mois_contributeur=:mois, date_naissance_annee_contributeur=:annee WHERE id_contributeur=:id_contributeur ";
	$req5 = $bdd->prepare($sql5);
	
	$sql1 = "SELECT date_naissance, id_contributeur, photo_contributeur, slide1_contributeur FROM contributeurs";
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
		$req->bindParam(':id_contributeur', $id_contributeur, PDO::PARAM_INT);
		$req->execute();
		if ($row['date_naissance'] != "") {
			if ((strtotime($row['date_naissance'])) === false) {
				$date_naissance = str_replace("juil", "july", $row['date_naissance']);
				$date_naissance = str_replace("déc", "dec", $date_naissance);
				$date_naissance = str_replace("janv", "jan", $date_naissance);		
				$date_naissance = str_replace("févr", "feb", $date_naissance);
				$date_naissance = str_replace("avr", "april", $date_naissance);		
				$date_naissance = str_replace("mai", "may", $date_naissance);		
				$date_naissance = str_replace("juin", "jun", $date_naissance);		
				$date_naissance = str_replace("août", "aug", $date_naissance);		
			}
			else {$date_naissance = $row['date_naissance'];}
			if ((strtotime($date_naissance)) === false) {
				echo $id_contributeur . " : " . $row['date_naissance'] . " ==> problème<BR/>";
			}
			else {
				$jour = date("j", strtotime($date_naissance));
				$mois = date("n", strtotime($date_naissance));
				$annee = date("Y", strtotime($date_naissance));
				$req5->bindParam(':jour', $jour, PDO::PARAM_INT);
				$req5->bindParam(':mois', $mois, PDO::PARAM_INT);
				$req5->bindParam(':annee', $annee, PDO::PARAM_INT);
				$req5->bindParam(':id_contributeur', $id_contributeur, PDO::PARAM_INT);
				$req5->execute();
//				echo $id_contributeur . " : " . $row['date_naissance'] . "  ||  " . $jour . "/" . $mois . "/" . $annee . "<BR/>";
			}
		}
	}
	
	echo "Affectation aléatoire des avatars et couvertures des utilisateurs,
			et changement des dates de naissance si nécessaire : ok<BR><BR>";
	
	$sql2 = "SELECT id_enseigne, box_enseigne, slide1_enseigne FROM enseignes";
	$req2 = $bdd->prepare($sql2);
	$req2->execute();
	$result2 = $req2->fetchAll(PDO::FETCH_ASSOC);
	
	foreach ($result2 as $row) {
		$sql = "UPDATE enseignes SET url = :url, box_enseigne = :photo, slide1_enseigne = :couv, y1 = 0 
				WHERE id_enseigne = :id_enseigne";
		$req = $bdd->prepare($sql);
		$photo = "photo 1.jpg";
		$couv = "photo " . rand(1, 113) . ".jpg";
		$url = "";
		$id_enseigne = $row['id_enseigne'];
		$req->bindParam(':url', $url, PDO::PARAM_STR);
		$req->bindParam(':photo', $photo, PDO::PARAM_STR);
		$req->bindParam(':couv', $couv, PDO::PARAM_STR);
		$req->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_STR);
		$req->execute();
	}
	
	echo "Affectation aléatoire des avatars et couvertures des enseignes : ok<BR><BR>";

	$sql = "UPDATE avis SET id_statut = 2";
	$req = $bdd->prepare($sql);
	$req->execute();
	
	echo "Ajout statut validé aux anciens avis : ok<BR><BR>";
	
	$bdd->commit(); // Validation de la transaction / des requetes
	
	$req->closeCursor();    // Ferme la connexion du serveur
	$req1->closeCursor();    // Ferme la connexion du serveur
	$req2->closeCursor();    // Ferme la connexion du serveur
	$req3->closeCursor();    // Ferme la connexion du serveur
	$req4->closeCursor();    // Ferme la connexion du serveur
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