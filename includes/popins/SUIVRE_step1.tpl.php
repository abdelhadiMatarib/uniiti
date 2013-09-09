<?php
        include_once '../../config/configuration.inc.php';
        include'../head.php'?>
<?php
include_once '../../acces/auth.inc.php';                 // gestion accès à la page - incluant la session
?>
		
<?php
include_once '../../config/configPDO.inc.php';

$id_enseigne        = $_POST['id_enseigne'];
$date               = date('Y-m-d H:i:s');
$id_contributeur    = $_SESSION['SESS_MEMBER_ID'];

try
{
	// Requete
	$bdd->beginTransaction(); // Début transaction pour requetes multiples

		// Vérification si le contributeur a déjà ajouté l'enseigne à sa liste de suivi
		$sqlCheck = "SELECT contributeurs_id_contributeur
					 FROM contributeurs_follow_enseignes
					 WHERE contributeurs_id_contributeur = :id_contributeur AND enseignes_id_enseigne=:id_enseigne
					";

		$reqCheck = $bdd->prepare($sqlCheck);
		$reqCheck->bindParam(':id_contributeur', $id_contributeur, PDO::PARAM_STR);
		$reqCheck->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
		$reqCheck->execute();
		$resultCheck = $reqCheck->fetch(PDO::FETCH_ASSOC);

		if (!$resultCheck) {
			$sql = "INSERT INTO contributeurs_follow_enseignes
					(contributeurs_id_contributeur, enseignes_id_enseigne, date_follow) 
					VALUES (:id_contributeur, :id_enseigne, :date_follow)";
		} else {
			$sql = "UPDATE contributeurs_follow_enseignes SET date_follow=:date_follow 
					WHERE contributeurs_id_contributeur=:id_contributeur AND enseignes_id_enseigne=:id_enseigne";
		}
		$req = $bdd->prepare($sql);
		$req->bindParam(':id_contributeur', $id_contributeur, PDO::PARAM_INT);
		$req->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
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


<div class="wishlist_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="wishlist_wrapper_body_img">
        <img src="<?php echo SITE_URL; ?>/img/pictos_commerces/suivre.png" title="" alt="" height="147" width="147" />
    </div>
    <div class="wishlist_wrapper_footer_txt">
        <span class="wishlist_wrapper_footer_txt_normal">Vous <span class="wishlist_wrapper_footer_txt_bold">suivez</span> ce commerce</span>
    </div>
</div>
</html>