<?php
        include_once '../../config/configuration.inc.php';
        include'../head.php'?>
<?php
include_once '../../acces/auth.inc.php';                 // gestion accès à la page - incluant la session
?>
		
<?php
include_once '../../config/configPDO.inc.php';

$id_contributeur    = $_POST['id_contributeur'];
$date               = date('Y-m-d H:i:s');
$id_contributeurACTIF    = $_SESSION['SESS_MEMBER_ID'];

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
		$reqCheck->bindParam(':id_contributeur', $id_contributeur, PDO::PARAM_STR);
		$reqCheck->bindParam(':id_contributeurfollow', $id_contributeurACTIF, PDO::PARAM_INT);
		$reqCheck->execute();
		$resultCheck = $reqCheck->fetch(PDO::FETCH_ASSOC);

		if (!$resultCheck) {
			$sql = "INSERT INTO contributeurs_follow_contributeurs
					(contributeurs_id_contributeur, contributeurs_id_contributeurfollow, date_follow) 
					VALUES (:id_contributeur, :id_contributeurfollow, :date_follow)";
		} else {
			$sql = "UPDATE contributeurs_follow_contributeurs SET date_follow=:date_follow 
					WHERE contributeurs_id_contributeur=:id_contributeur AND contributeurs_id_contributeurfollow=:id_contributeurfollow";
		}
		$req = $bdd->prepare($sql);
		$req->bindParam(':id_contributeur', $id_contributeur, PDO::PARAM_INT);
		$req->bindParam(':id_contributeurfollow', $id_contributeurACTIF, PDO::PARAM_INT);
		$req->bindParam(':date_follow', $date, PDO::PARAM_INT);
		$req->execute();

	$bdd->commit(); // Validation de la transaction / des requetes
	
	$reqCheck->closeCursor();
	$req->closeCursor();						    // Ferme la connexion du serveur
	$bdd = null;            // Détruit l'objet PDO

//echo 'BDD Fermée';
}
// Gestion des erreurs
catch (PDOException $erreur)
{
	$bdd->rollBack(); // Erreur => annulation transaction / des requetes    
	die ('Erreur : ' .$erreur->getMessage());
	exit;
}
?>
