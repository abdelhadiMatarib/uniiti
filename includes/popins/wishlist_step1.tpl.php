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

<div class="suggestion_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="suggestion_head">
        <div class="suggestion_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_suggestions.png" title="" alt="" height="39" width="39" />
        </div><span class="maintitle">Vous pourriez également ajouter...</span>
    </div>   
    <div class="suggestion_body">
        
          <div class="presentation_action_left_head_img_container_picto_categorie"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/restaurant.png"/></div>
            <div class="suggestion_action_left_head_categorie_wrap">    
                <span class="presentation_action_left_head_titre"><?php /*echo tronque(stripslashes($_POST['nom_enseigne'])); */?></span>
                <span class="presentation_action_left_head_categorie">Restauration</span>
            </div>   
            
            <div class="presentation_action_left_head_likes_wrap">
                <div class="presentation_action_left_head_img_container_picto_likes"></div>
                <span class="presentation_action_left_head_nombrelikes"><strong>15756</strong></span>
                <span class="presentation_action_left_head_nombrelikes_txt">LIKE</span>
            </div>
                
            <div class="presentation_action_left_head_note_wrap">
				<?php /*for ($i = 1 ; $i <= round($_POST['note_arrondi'] / 2) ; $i++) { ?>
					<img src="img/pictos_commerces/star_0.png" title="" alt="" />
				<?php } /* Fin du for */ ?>
                <span class="presentation_action_left_head_note_txt"><?php /*echo $_POST['note_arrondi']; ?>/10 - <?php echo $_POST['count_avis_enseigne']; */?> Avis</span>
            </div>
            
        </div>
    
        <div class="suggestion_action_left_figure">
            <div class="box_localisation suggestion_box_localisation"><span>Paris 7<sup>ème</sup></span></div>
            <div class="suggestion_vertical_sep1"></div>
        <div class="suggestion_vertical_sep2"></div>
            <div class="wrapper_boutons_popin wrapper_boutons_suggestions">
                <!--<div onclick="<?php echo $like_step1; ?>" class="boutons_action_popin" <?php echo AfficheAction('aime',$_POST['categorie']); ?>></div>-->
                <!--<div onclick="<?php echo $dislike_step1; ?>" class="boutons_action_popin" <?php echo AfficheAction('aime_pas',$_POST['categorie']); ?>></div>-->
                <!--<div onclick="<?php echo $wishlist_step1; ?>" class="boutons_action_popin" <?php echo AfficheAction('wish',$_POST['categorie']); ?>></div>-->
            </div>
        
            <figure><img src="<?php echo SITE_URL; ?>/img/pictos_popins/couv_suggestion.jpg"/></figure>
        </div>
    <div class="suggestion_footer"></div>
</div>

<script>
    $(document).ready(
    function(){
        clearTimeout(TimeOutPopin1);
    var TimeOutPopin1 = setTimeout(function () {
        $(".wishlist_wrapper").delay(300).fadeOut();
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
</html>