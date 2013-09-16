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
            
               <div class="presentation_action_left_head_img_container_picto_categorie" style="background:url('<?php echo SITE_URL; ?>/img/pictos_commerces/sprite_cat.jpg') <?php echo $_POST['posx'] . "px" . " " . $_POST['posy'] . "px"?>"></div>         <div class="presentation_action_left_head_categorie_wrap">    
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
            <span class="presentation_action_left_body_username" style="color:<?php echo $_POST['couleur']; ?>;"><?php echo $_POST['prenom_contributeur'] . " " . ucFirstOtherLower(tronqueName($_POST['nom_contributeur'], 1)); ?></span>
            <span class="presentation_action_left_body_action"><?php echo $action ?></span>
            <div class="presentation_action_commentaire_left_body_message">
				<?php if ($affichecommentaire) { ?><span style="color:<?php echo $_POST['couleur']; ?>;"><?php echo $_POST['note'] / 2; ?>/5 | </span><span><?php echo stripslashes($_POST['commentaire']); ?></span><?php } ?>
            </div>
            <div class="arrow_up" style="border-bottom:5px solid <?php echo $_POST['couleur']; ?>;"></div>
        </div>
                    
                <div class="presentation_action_left_footer">
            <div class="presentation_action_left_footer_img_container"><figure><img src="<?php echo SITE_URL . "/photos/utilisateurs/avatars/" . $_POST['photo_contributeur'];?>" height="50" width="50"/></figure></div>
            <div class="presentation_action_left_footer_timing"><?php echo stripslashes($_POST['delai_avis']); ?></div>
            <div class="presentation_action_left_footer_picto_action" <?php echo AfficheProvenance($_POST['provenance'], $_POST['categorie']); ?>></div>
        
        </div>
    </div>



    
    <div class="presentation_action_right">
       
        <div class="utilisateur_interface_modifs_modifier_note">
            <a href="#" title="" class="maintitle"><span class="utilisateur_interface_modifs_txt_bold">Modifier</span><span> ma note</span></a>
            <div class="utilisateur_interface_modifs_modifier_note_inside">
                <div class="utilisateur_interface_modifs_modifier_note_inside_img_container">
                    <img src="<?php echo SITE_URL; ?>/img/pictos_popins/modifier_note_icon_star0.png" title="" alt="" height="26" width="28" />
                    <img src="<?php echo SITE_URL; ?>/img/pictos_popins/modifier_note_icon_star0.png" title="" alt="" height="26" width="28" />
                    <img src="<?php echo SITE_URL; ?>/img/pictos_popins/modifier_note_icon_star0.png" title="" alt="" height="26" width="28" />
                    <img src="<?php echo SITE_URL; ?>/img/pictos_popins/modifier_note_icon_star0.png" title="" alt="" height="26" width="28" />
                    <img src="<?php echo SITE_URL; ?>/img/pictos_popins/modifier_note_icon_star0.png" title="" alt="" height="26" width="28" />
                </div>
            </div>
        </div>
        <div class="utilisateur_interface_modifs_modifier_commentaire">
            <a href="#" title="" class="maintitle"><span class="utilisateur_interface_modifs_txt_bold">Modifier</span><span> mon commentaire</span></a>
            <div class="utilisateur_interface_modifs_modifier_commentaire_inside">
                <div class="utilisateur_interface_modifs_modifier_commentaire_inside_img_container">
                    <span>Nous vous remercions de bien vouloir indiquer les motifs de cette modification :</span>
                </div>
                <div class="utilisateur_interface_modifs_modifier_commentaire_inputs">
                    <form>
                    <div class="modif_input_float_left"><input type="radio" name="radio_modif_user" id="modifier_commentaire_input_saisie_incorrecte"/><label for="modifier_commentaire_input_saisie_incorrecte">Saisie incorrecte de mon avis</label></div>
                    <div class="modif_input_float_left"><input type="radio" name="radio_modif_user" id="modifier_commentaire_input_opinion_commercant"/><label for="modifier_commentaire_input_opinion_commercant">Mon opinion sur ce commerçant a évolué</label></div>
                    <div class="modif_input_float_left"><input type="radio" name="radio_modif_user" id="modifier_commentaire_input_precisions"/><label for="modifier_commentaire_input_precisions">Je souhaite préciser ou compléter certains points</label></div>
                    <div class="modif_input_float_left"><input type="radio" name="radio_modif_user" id="modifier_commentaire_input_pas_auteur"/><label for="modifier_commentaire_input_pas_auteur">Je ne suis pas l'auteur de ce texte</label></div>
                    </form>
                </div>
            <div class="wrap_buttons_valider_supprimer">
                <div class="button_valider"></div>
            </div>
            </div>
        </div>
        <div class="utilisateur_interface_modifs_modifier_avis">
            <a href="#" title="" class="maintitle"><span class="utilisateur_interface_modifs_txt_bold">Supprimer</span><span> mon avis</span></a>
            <div class="utilisateur_interface_modifs_modifier_avis_inside">
                <div class="utilisateur_interface_modifs_modifier_avis_inside_img_container">
                    <span>Êtes-vous certain de vouloir supprimer cet avis ?</span>
                </div>
                <div class="utilisateur_interface_modifs_modifier_avis_inside_choice_oui"><a href="#" title="" class="modif_avis_choice_oui"><span>OUI</span></a></div>
                <div class="utilisateur_interface_modifs_modifier_avis_inside_choice_non"><a href="#" title="" class="modif_avis_choice_non"><span>NON</span></a></div>
            </div>
        </div>
            
        </div>
        <div class="clearfix"></div>


    </div>
    

       
    
</div>
<script>
// Box utilisateur modifier interface modifier note

    // On annule le comportement par défaut du clic sur le lien (scroll)
/*    $("a").click(function(e){
       e.preventDefault(); 
    });*/ //             FF ==> ATTENTION : LORQUE L'ON FERME LA DIALOG BOX, PLUS AUCUN LIEN NE FONCTIONNE : est-ce vraiment nécessaire ?
    
    // NOTE
    $(".utilisateur_interface_modifs_modifier_note a.maintitle").click(function(e){
       e.preventDefault();
       
       $(this).next().stop().slideToggle();
       if ($(".utilisateur_interface_modifs_modifier_commentaire_inside,.utilisateur_interface_modifs_modifier_avis_inside").is(':visible'))
       {
           $(".utilisateur_interface_modifs_modifier_commentaire_inside,.utilisateur_interface_modifs_modifier_avis_inside").stop().slideUp();
       };
    });
    
    // COMMENTAIRE
    $(".utilisateur_interface_modifs_modifier_commentaire a.maintitle").click(function(e){
       e.preventDefault();
       
       $(this).next().stop().slideToggle();
       if ($(".utilisateur_interface_modifs_modifier_note_inside,.utilisateur_interface_modifs_modifier_avis_inside").is(':visible'))
       {
           $(".utilisateur_interface_modifs_modifier_note_inside,.utilisateur_interface_modifs_modifier_avis_inside").stop().slideUp();
       };
    });
    
    // AVIS
    $(".utilisateur_interface_modifs_modifier_avis a.maintitle").click(function(e){
       e.preventDefault();
       
       $(this).next().stop().slideToggle();
       if ($(".utilisateur_interface_modifs_modifier_commentaire_inside,.utilisateur_interface_modifs_modifier_note_inside").is(':visible'))
       {
           $(".utilisateur_interface_modifs_modifier_commentaire_inside,.utilisateur_interface_modifs_modifier_note_inside").stop().slideUp();
       };
    });
</script>
</html>