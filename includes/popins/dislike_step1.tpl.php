<?php
	include_once '../../config/configuration.inc.php';
	include '../head.php';
	include_once '../../acces/auth.inc.php';                 // gestion accès à la page - incluant la session
	include_once '../fonctions.inc.php'; 
	include_once '../../config/configPDO.inc.php';

$type = $_POST['type'];
$id_enseigne_ou_objet = $_POST['id_enseigne_ou_objet'];
$date               = date('Y-m-d H:i:s');
$id_contributeur    = $_SESSION['SESS_MEMBER_ID'];
$categorie 			= $_POST['categorie'];	
	
try
{
	// Requete
	$bdd->beginTransaction(); // Début transaction pour requetes multiples

		// Vérification si le contributeur n'avait déjà pas aimé l'enseigne ou l'objet auparavant
		if ($type == 'enseigne') {
			$sqlCheck = "SELECT contributeurs_id_contributeur
						 FROM contributeurs_aiment_pas_enseignes
						 WHERE contributeurs_id_contributeur = :id_contributeur AND enseignes_id_enseigne=:id_enseigne_ou_objet
						";
		} else if ($type == 'objet') {
			$sqlCheck = "SELECT contributeurs_id_contributeur
						 FROM contributeurs_aiment_pas_objets
						 WHERE contributeurs_id_contributeur = :id_contributeur AND objets_id_objet=:id_enseigne_ou_objet
						";
		}
		$reqCheck = $bdd->prepare($sqlCheck);
		$reqCheck->bindParam(':id_contributeur', $id_contributeur, PDO::PARAM_STR);
		$reqCheck->bindParam(':id_enseigne_ou_objet', $id_enseigne_ou_objet, PDO::PARAM_INT);
		$reqCheck->execute();
		$resultCheck = $reqCheck->fetch(PDO::FETCH_ASSOC);

		// Vérification si le contributeur n'a pas déjà aimé l'enseigne ou l'objet auparavant
		if ($type == 'enseigne') {
			$sqlCheck2 = "SELECT contributeurs_id_contributeur
						 FROM contributeurs_aiment_enseignes
						 WHERE contributeurs_id_contributeur = :id_contributeur AND enseignes_id_enseigne=:id_enseigne_ou_objet
						";
		} else if ($type == 'objet') {
			$sqlCheck2 = "SELECT contributeurs_id_contributeur
						 FROM contributeurs_aiment_objets
						 WHERE contributeurs_id_contributeur = :id_contributeur AND objets_id_objet=:id_enseigne_ou_objet
						";
		}
		$reqCheck2 = $bdd->prepare($sqlCheck2);
		$reqCheck2->bindParam(':id_contributeur', $id_contributeur, PDO::PARAM_STR);
		$reqCheck2->bindParam(':id_enseigne_ou_objet', $id_enseigne_ou_objet, PDO::PARAM_INT);
		$reqCheck2->execute();
		$resultCheck2 = $reqCheck2->fetch(PDO::FETCH_ASSOC);
		
		if (!$resultCheck) {
			if ($type == 'enseigne') {
				$sql = "INSERT INTO contributeurs_aiment_pas_enseignes
						(contributeurs_id_contributeur, enseignes_id_enseigne, date_aime_pas) 
						VALUES (:id_contributeur, :id_enseigne_ou_objet, :date_aime_pas)";
			} else if ($type == 'objet') {
				$sql = "INSERT INTO contributeurs_aiment_pas_objets
						(contributeurs_id_contributeur, objets_id_objet, date_aime_pas) 
						VALUES (:id_contributeur, :id_enseigne_ou_objet, :date_aime_pas)";
			}
			$req = $bdd->prepare($sql);
			$req->bindParam(':id_contributeur', $id_contributeur, PDO::PARAM_INT);
			$req->bindParam(':id_enseigne_ou_objet', $id_enseigne_ou_objet, PDO::PARAM_INT);
			$req->bindParam(':date_aime_pas', $date, PDO::PARAM_INT);
			$req->execute();	
		}			
		if ($resultCheck2) {
			if ($type == 'enseigne') {
				$sql2 = "DELETE FROM contributeurs_aiment_enseignes WHERE contributeurs_id_contributeur=:id_contributeur AND enseignes_id_enseigne=:id_enseigne_ou_objet";
			} else if ($type == 'objet') {
				$sql2 = "DELETE FROM contributeurs_aiment_objets WHERE contributeurs_id_contributeur=:id_contributeur AND objets_id_objet=:id_enseigne_ou_objet";
			}
			$req2 = $bdd->prepare($sql2);
			$req2->bindParam(':id_contributeur', $id_contributeur, PDO::PARAM_INT);
			$req2->bindParam(':id_enseigne_ou_objet', $id_enseigne_ou_objet, PDO::PARAM_INT);
			$req2->execute();
		}
		
	$bdd->commit(); // Validation de la transaction / des requetes
	
	$reqCheck->closeCursor();
	$reqCheck2->closeCursor();
	if (!$resultCheck) {$req->closeCursor();}	  // Ferme la connexion du serveur
	if ($resultCheck2) {$req2->closeCursor();}    // Ferme la connexion du serveur

}
// Gestion des erreurs
catch (PDOException $erreur)
{
	$bdd->rollBack(); // Erreur => annulation transaction / des requetes    
	die ('Erreur : ' .$erreur->getMessage());
	exit;
}
?>
<div class="dislike_wrapper">
    <div class="dislike_wrapper_body_img"<?php echo  AfficheActionLarge("aime_pas", $categorie); ?>></div>
    <div class="dislike_wrapper_footer_txt">
        <span class="dislike_wrapper_footer_txt_normal">Vous <span class="dislike_wrapper_footer_txt_bold">n'aimez pas</span> <?php if ($type == 'enseigne') {echo "ce commerce";} else {echo "cet objet";} ?></span>
    </div>
</div>

<?php include '../requeteunesuggestion.php'; 

$bdd = null;            // Détruit l'objet PDO
//echo 'BDD Fermée';
?>
<script>
    $(document).ready(
    function(){
        clearTimeout(TimeOutPopin1);
    var TimeOutPopin1 = setTimeout(function () {
        $(".dislike_wrapper").delay(300).fadeOut();
        $('.suggestion_wrapper').delay(1000).fadeIn(
        function(){
            clearTimeout(TimeOutPopin2);
            clearTimeout(TimeOutPopin3);
            var TimeOutPopin2 = setTimeout(function() { $('#default_dialog').fadeOut('slow'); }, 10000);
            var TimeOutPopin3 = setTimeout(function() { $('#default_dialog').dialog('close'); }, 10500);
            }
        )    
    }, 2000);
    }
    );
</script>