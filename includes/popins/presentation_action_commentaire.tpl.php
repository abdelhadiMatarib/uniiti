<?php

include_once '../../config/configuration.inc.php';
include_once '../fonctions.inc.php';
include_once '../../acces/auth.inc.php';                 // gestion accès à la page - incluant la session

if (empty($_POST['id_enseigne'])) {echo "vous ne pouvez pas accéder directement à cette page !\n<a href=\"" . SITE_URL . "\">Revenir à la page principale</a>"; exit;}
$provenance = $_POST['provenance'];
switch ($provenance) {
	case "avis":
		$action = "a noté";
		$affichecommentaire = true;
		break;
	case "aime":
		$note = "''";
		$commentaire = "''";
		$action = "a aimé";
		$affichecommentaire = false;
		break;
	case "aime_pas":
		$note = "''";
		$commentaire = "''";
		$action = "n'a pas aimé";
		$affichecommentaire = false;
		break;
	case "wish":
		$note = "''";
		$commentaire = "''";
		$action = "a ajouté à sa wishlist";
		$affichecommentaire = false;
		break;
	default :
		$note = "''";
		$commentaire = "''";
		$action = "";
		$affichecommentaire = false;
		break;
}
if(isset($_SESSION['SESS_MEMBER_ID'])) {
	$dataLDW = "{id_contributeur :" . $_SESSION['SESS_MEMBER_ID'] . "," . "id_enseigne :" . $_POST['id_enseigne'] . "}";
	$like_step1 = "OuvrePopin(" . $dataLDW . ", '/includes/popins/like_step1.tpl.php', 'default_dialog');";
	$dislike_step1 = "OuvrePopin(" . $dataLDW . ", '/includes/popins/dislike_step1.tpl.php', 'default_dialog');";
	$wishlist_step1 = "OuvrePopin(" . $dataLDW . ", '/includes/popins/wishlist_step1.tpl.php', 'default_dialog');";
} else {
	$like_step1 = $dislike_step1 = $wishlist_step1 = "OuvrePopin({}, '/includes/popins/ident.tpl.php', 'default_dialog');";
}	
		
?>
	
<div class="presentation_action_wrapper presentation_action_commentaire_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    
    <div class="presentation_action_left">
        <div class="presentation_action_left_head">
            <div class="presentation_action_left_head_img_container_picto_categorie" style="background:url('<?php echo SITE_URL; ?>/img/pictos_commerces/sprite_cat.jpg') <?php echo $_POST['posx'] . "px" . " " . $_POST['posy'] . "px"?>"></div>
            <div class="presentation_action_left_head_categorie_wrap">    
                <span class="presentation_action_left_head_titre"><?php echo tronque(stripslashes($_POST['nom_enseigne'])); ?></span>
                <span class="presentation_action_left_head_categorie" style="color:<?php echo $_POST['couleur']; ?>;"><?php echo stripslashes($_POST['scategorie']); ?></span>
            </div>   
            
            <div class="presentation_action_left_head_likes_wrap">
                <div class="presentation_action_left_head_img_container_picto_likes"> <img src="<?php echo SITE_URL; ?>/img/pictos_popins/like.png"/></div>
                <span class="presentation_action_left_head_nombrelikes"><strong><?php echo $_POST['count_likes']; ?></strong></span>
                <span class="presentation_action_left_head_nombrelikes_txt">LIKE</span>
            </div>
                
            <div class="presentation_action_left_head_note_wrap">
				<?php echo AfficheEtoiles($_POST['note_arrondi'], $_POST['categorie']); ?>
                <span class="presentation_action_left_head_note_txt"><?php echo $_POST['note_arrondi']; ?>/10 - <?php echo $_POST['count_avis_enseigne']; ?> Avis</span>
            </div>
            
        </div>
        <div class="presentation_action_left_figure">
            <div class="wrapper_boutons_popin">
                <div onclick="<?php echo $like_step1; ?>" class="boutons_action_popin" <?php echo AfficheAction('aime',$_POST['categorie']); ?>></div>
                <div onclick="<?php echo $dislike_step1; ?>" class="boutons_action_popin" <?php echo AfficheAction('aime_pas',$_POST['categorie']); ?>></div>
                <div onclick="<?php echo $wishlist_step1; ?>" class="boutons_action_popin" <?php echo AfficheAction('wish',$_POST['categorie']); ?>></div>
            </div>
            <div class="box_localisation"><span><?php echo $_POST['arrondissement']; ?></span></div>
            
            <figure><img src="<?php echo SITE_URL; ?>/img/pictos_popins/couv_popin.jpg"/></figure>
        </div>
        <div class="presentation_action_left_body presentation_action_commentaire_left_body">
            <div class="presentation_action_signalement_flag"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_signalement_flag.png"/></div>
            <span class="presentation_action_left_body_username" style="color:<?php echo $_POST['couleur']; ?>;"><?php echo $_POST['prenom_contributeur'] . " " . ucFirstOtherLower(tronqueName($_POST['nom_contributeur'], 1)); ?></span>
            <span class="presentation_action_left_body_action"><?php echo $action ?></span>
            <div class="presentation_action_commentaire_left_body_message">
                <?php if ($affichecommentaire) { ?><span style="color:<?php echo $_POST['couleur']; ?>;font-weight: bold;"><?php echo $_POST['note'] / 2; ?>/5 | </span><span><?php echo stripslashes($_POST['commentaire']); ?></span><?php } ?>
            </div>
            <div class="presentation_action_signalement_body utilisateur_interface_modifs_modifier_commentaire_inputs">
                <span class="presentation_action_signalement_txt">Nous vous remercions de bien vouloir justifier ce signalement</span>
                    <form>
                        <div class="input_float_left"><input type="radio" name="radio_modif_user" id="modifier_commentaire_input_saisie_incorrecte"/><label for="modifier_commentaire_input_saisie_incorrecte">Avis à caractère diffamatoire ou injurieux</label></div>
                        <br/>
                        <div class="input_float_left"><input type="radio" name="radio_modif_user" id="modifier_commentaire_input_opinion_commercant"/><label for="modifier_commentaire_input_opinion_commercant">Avis incohérent ou sans intérêt</label></div>
                        <br/>
                        <div class="input_float_left"><input type="radio" name="radio_modif_user" id="modifier_commentaire_input_precisions"/><label for="modifier_commentaire_input_precisions">Spam</label></div>
                        <br/>
                        <div class="input_float_left"><input type="radio" name="radio_modif_user" id="modifier_commentaire_input_preciser_motif"/><label for="modifier_commentaire_input_preciser_motif">Autre motif</label></div>
                        <br/>
                        <div class="input_float_left"><input type="text" class="input_avisenattente_precisezmotif input_signalement_motif" placeholder="Précisez le motif"/></div>
                        <div class="input_float_right bouton_signaler"><a href="#" title=""><span>Signaler</span></a></div>
                    </form>
            </div>
            <div class="arrow_up" style="border-bottom:5px solid <?php echo $_POST['couleur']; ?>;"></div>
        </div>
        <div class="presentation_action_left_avis_utile_wrap">
            
            <div class="presentation_action_left_avis_utile_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png"/></div>
            <span>Trouvez-vous cet avis utile ?</span>
            <div class="presentation_action_left_avis_utile_reponse_wrap">
                <a href="#" title="">OUI</a><a href="#" title="">NON</a>
            </div>
            
        </div>
        
        <div class="presentation_action_left_footer">
            <div class="presentation_action_left_footer_img_container"><figure><img src="<?php echo SITE_URL; ?>/img/avatars/1.png"/></figure></div>
            <div class="presentation_action_left_footer_timing"><?php echo stripslashes($_POST['delai_avis']); ?></div>
            <div class="presentation_action_left_footer_picto_action" <?php echo AfficheProvenance($_POST['provenance'], $_POST['categorie']); ?>></div>
        
        </div>
    </div>
    
    <div class="presentation_action_right">
        <div class="presentation_action_right_head">
            <span class="presentation_action_right_head_txt"><strong>Vous pourriez</strong><span>également aimer ...</span></span>
        </div>
        <div class="presentation_action_right_suggestions">
            
            <!-- 1 BOX DE SUGGESTION -->
            <div id="posts">
            <div class="presentation_action_right_suggestions_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/restaurant.png"/></div>
            <div class="presentation_action_right_suggestions_content">
                <span class="presentation_action_right_suggestions_content_titre">Au bon goût de...</span>
                <span class="presentation_action_right_suggestions_content_categorie">Restauration</span>
            </div>
            <div class="presentation_action_right_suggestions_note">
                <span class="presentation_action_right_suggestions_note_reelle">7</span>
                <span class="presentation_action_right_suggestions_note_base">/10</span>
            </div>
            </div>
            <!-- FIN 1 BOX DE SUGGESTION -->
            
            <!-- 1 BOX DE SUGGESTION -->
            <div id="posts">
            <div class="presentation_action_right_suggestions_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/restaurant.png"/></div>
            <div class="presentation_action_right_suggestions_content">
                <span class="presentation_action_right_suggestions_content_titre">Au bon goût de...</span>
                <span class="presentation_action_right_suggestions_content_categorie">Restauration</span>
            </div>
            <div class="presentation_action_right_suggestions_note">
                <span class="presentation_action_right_suggestions_note_reelle">8</span>
                <span class="presentation_action_right_suggestions_note_base">/10</span>
            </div>
            </div>
            <!-- FIN 1 BOX DE SUGGESTION -->
            
            <!-- 1 BOX DE SUGGESTION -->
            <div id="posts">
            <div class="presentation_action_right_suggestions_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/restaurant.png"/></div>
            <div class="presentation_action_right_suggestions_content">
                <span class="presentation_action_right_suggestions_content_titre">Au bon goût de...</span>
                <span class="presentation_action_right_suggestions_content_categorie">Restauration</span>
            </div>
            <div class="presentation_action_right_suggestions_note">
                <span class="presentation_action_right_suggestions_note_reelle">8</span>
                <span class="presentation_action_right_suggestions_note_base">/10</span>
            </div>
            </div>
            <!-- FIN 1 BOX DE SUGGESTION -->
            
            <!-- 1 BOX DE SUGGESTION -->
            <div id="posts">
            <div class="presentation_action_right_suggestions_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/restaurant.png"/></div>
            <div class="presentation_action_right_suggestions_content">
                <span class="presentation_action_right_suggestions_content_titre">Au bon goût de...</span>
                <span class="presentation_action_right_suggestions_content_categorie">Restauration</span>
            </div>
            <div class="presentation_action_right_suggestions_note">
                <span class="presentation_action_right_suggestions_note_reelle">8</span>
                <span class="presentation_action_right_suggestions_note_base">/10</span>
            </div>
            </div>
            <!-- FIN 1 BOX DE SUGGESTION -->
            
            <!-- 1 BOX DE SUGGESTION -->
            <div id="posts">
            <div class="presentation_action_right_suggestions_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/restaurant.png"/></div>
            <div class="presentation_action_right_suggestions_content">
                <span class="presentation_action_right_suggestions_content_titre">Au bon goût de...</span>
                <span class="presentation_action_right_suggestions_content_categorie">Restauration</span>
            </div>
            <div class="presentation_action_right_suggestions_note">
                <span class="presentation_action_right_suggestions_note_reelle">8</span>
                <span class="presentation_action_right_suggestions_note_base">/10</span>
            </div>
            </div>
            <!-- FIN 1 BOX DE SUGGESTION -->
            
            <!-- 1 BOX DE SUGGESTION -->
            <div id="posts">
            <div class="presentation_action_right_suggestions_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/restaurant.png"/></div>
            <div class="presentation_action_right_suggestions_content">
                <span class="presentation_action_right_suggestions_content_titre">Au bon goût de...</span>
                <span class="presentation_action_right_suggestions_content_categorie">Restauration</span>
            </div>
            <div class="presentation_action_right_suggestions_note">
                <span class="presentation_action_right_suggestions_note_reelle">8</span>
                <span class="presentation_action_right_suggestions_note_base">/10</span>
            </div>
            </div>
            <!-- FIN 1 BOX DE SUGGESTION -->
        </div>
                             <div class="presentation_action_right_suivre">
                <div class="presentation_action_right_suivre_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/suivre.png"/></div>
                <span class="presentation_action_right_suivre_txt_1">Suivre cet</span><span class="presentation_action_right_suivre_txt_2" style="color:<?php echo $_POST['couleur']; ?>;">utilisateur</span>
            </div>
    </div>
    <div class="clearfix"></div>    
</div>
<script>
    // SIGNALEMENT COMMENTAIRE + PRECISION MOTIF
    $('#modifier_commentaire_input_preciser_motif').click(function(){
    $('.input_avisenattente_precisezmotif').stop().slideToggle();
    });
    $('.presentation_action_signalement_flag').click(function(){
       $(this).toggleClass('signalement_button_background');
       $('.presentation_action_commentaire_left_body_message').stop().slideToggle();
       $('.presentation_action_signalement_body').stop().slideToggle();
    });
</script>
</html>
