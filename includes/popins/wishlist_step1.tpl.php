<?php
        include_once '../../config/configuration.inc.php';
        include_once '../fonctions.inc.php';
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

		// Vérification si le contributeur a déjà ajouté l'enseigne à sa wishlist
		$sqlCheck = "SELECT contributeurs_id_contributeur
					 FROM contributeurs_wish_enseignes
					 WHERE contributeurs_id_contributeur = :id_contributeur AND enseignes_id_enseigne=:id_enseigne
					";

		$reqCheck = $bdd->prepare($sqlCheck);
		$reqCheck->bindParam(':id_contributeur', $id_contributeur, PDO::PARAM_STR);
		$reqCheck->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
		$reqCheck->execute();
		$resultCheck = $reqCheck->fetch(PDO::FETCH_ASSOC);

		if (!$resultCheck) {
			$sql = "INSERT INTO contributeurs_wish_enseignes
					(contributeurs_id_contributeur, enseignes_id_enseigne, date_wish) 
					VALUES (:id_contributeur, :id_enseigne, :date_wish)";
			$req = $bdd->prepare($sql);
			$req->bindParam(':id_contributeur', $id_contributeur, PDO::PARAM_INT);
			$req->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
			$req->bindParam(':date_wish', $date, PDO::PARAM_INT);
			$req->execute();
		}

	$bdd->commit(); // Validation de la transaction / des requetes
	
	$reqCheck->closeCursor();
	if (!$resultCheck) {$req->closeCursor();}	  // Ferme la connexion du serveur
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
    <div class="wishlist_wrapper_body_img" <?php echo AfficheActionLarge('wish',$_POST['categorie']); ?>></div>
    <div class="wishlist_wrapper_footer_txt">
        <span class="wishlist_wrapper_footer_txt_normal">Vous avez <span class="wishlist_wrapper_footer_txt_bold">ajouté</span> ce commerce</span>
    </div>
</div>
<script>
setTimeout(function () {
    $('.like_wrapper').fadeOut();
    $('#default_dialog').load('<?php echo SITE_URL; ?>/includes/popins/suggestion_action_wishlist.tpl.php').fadeIn();
}, 2000);
</script>
</html>