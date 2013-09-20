<?php
        include_once '../../config/configuration.inc.php';
        include'../head.php'?>
<?php
include_once '../../acces/auth.inc.php';                 // gestion accès à la page - incluant la session
include_once '../fonctions.inc.php'; 
?>

<?php
include_once '../../config/configPDO.inc.php';

$id_enseigne        = $_POST['id_enseigne'];
$date               = date('Y-m-d H:i:s');
$id_contributeur    = $_SESSION['SESS_MEMBER_ID'];
$categorie = $_POST['categorie'];

try
{
	// Requete
	$bdd->beginTransaction(); // Début transaction pour requetes multiples

		// Vérification si le contributeur a déjà aimé l'enseigne
		$sqlCheck = "SELECT contributeurs_id_contributeur
					 FROM contributeurs_aiment_enseignes
					 WHERE contributeurs_id_contributeur = :id_contributeur AND enseignes_id_enseigne=:id_enseigne
					";

		$reqCheck = $bdd->prepare($sqlCheck);
		$reqCheck->bindParam(':id_contributeur', $id_contributeur, PDO::PARAM_STR);
		$reqCheck->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
		$reqCheck->execute();
		$resultCheck = $reqCheck->fetch(PDO::FETCH_ASSOC);

		// Vérification si le contributeur n'avait pas aimé l'enseigne auparavant
		$sqlCheck2 = "SELECT contributeurs_id_contributeur
					 FROM contributeurs_aiment_pas_enseignes
					 WHERE contributeurs_id_contributeur = :id_contributeur AND enseignes_id_enseigne=:id_enseigne
					";

		$reqCheck2 = $bdd->prepare($sqlCheck2);
		$reqCheck2->bindParam(':id_contributeur', $id_contributeur, PDO::PARAM_STR);
		$reqCheck2->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
		$reqCheck2->execute();
		$resultCheck2 = $reqCheck2->fetch(PDO::FETCH_ASSOC);
		
		if (!$resultCheck) {
			$sql = "INSERT INTO contributeurs_aiment_enseignes
					(contributeurs_id_contributeur, enseignes_id_enseigne, date_aime) 
					VALUES (:id_contributeur, :id_enseigne, :date_aime)";
			$req = $bdd->prepare($sql);
			$req->bindParam(':id_contributeur', $id_contributeur, PDO::PARAM_INT);
			$req->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
			$req->bindParam(':date_aime', $date, PDO::PARAM_INT);
			$req->execute();
		}

		if ($resultCheck2) {
			$sql2 = "DELETE FROM contributeurs_aiment_pas_enseignes WHERE contributeurs_id_contributeur=:id_contributeur AND enseignes_id_enseigne=:id_enseigne";
			$req2 = $bdd->prepare($sql2);
			$req2->bindParam(':id_contributeur', $id_contributeur, PDO::PARAM_INT);
			$req2->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
			$req2->execute();
		}
		
	$bdd->commit(); // Validation de la transaction / des requetes
	
	$reqCheck->closeCursor();
	$reqCheck2->closeCursor();
	if (!$resultCheck) {$req->closeCursor();}	  // Ferme la connexion du serveur
	if ($resultCheck2) {$req2->closeCursor();}    // Ferme la connexion du serveur
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

		
<div class="like_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="like_wrapper_body_img" <?php echo  AfficheActionLarge("aime", $categorie); ?>></div>
    <div class="like_wrapper_footer_txt">
        <span class="like_wrapper_footer_txt_normal">Vous <span class="like_wrapper_footer_txt_bold">aimez</span> ce commerce</span>
    </div>
</div>
</html>