<?php

include_once '../../config/configuration.inc.php';
include_once '../fonctions.inc.php';
include'../head.php';
include'../js.php';

/*if (empty($_POST['id_enseigne'])) {echo "vous ne pouvez pas accéder directement à cette page !\n<a href=\"" . SITE_URL . "\">Revenir à la page principale</a>"; exit;}
		*/
?>
	
<div class="presentation_action_wrapper presentation_action_commentaire_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    
    <div class="presentation_action_left">
        <div class="presentation_action_left_head left_head_avisenattente">
            
            <div class="presentation_action_left_head_img_container_picto_categorie"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/restaurant.png"/></div>
            <div class="presentation_action_left_head_categorie_wrap">    
                <span class="presentation_action_left_head_titre user_txt_avisenattente"><?php /*echo $_POST['prenom_contributeur'] . " " . ucFirstOtherLower(tronqueName($_POST['nom_contributeur'], 1)); */?></span>
                <span class="presentation_action_left_head_categorie">355/3000 - Confirmé</span>
            </div>
            
            <div class="presentation_action_left_head_likes_wrap">
                <span class="presentation_action_left_head_nombrelikes"><strong>15756</strong></span>
                <span class="presentation_action_left_head_nombrelikes_txt">ABONNÉS</span>
            </div>
                
            <div class="presentation_action_left_head_note_wrap">
				<?php /*for ($i = 1 ; $i <= round($_POST['note_arrondi'] / 2) ; $i++) { ?>
					<img src="img/pictos_utilisateurs/trust.png" title="" alt="" />
				<?php } /* Fin du for */ ?>
                <span class="presentation_action_left_head_note_txt"><?php /*echo $_POST['note_arrondi']; ?>/10 - <?php echo $_POST['count_avis_enseigne']; */?> Avis</span>
            </div>
            
        </div>

        <div class="presentation_action_left_body presentation_action_commentaire_left_body">
            <span class="presentation_action_left_body_username"><?php /*echo $_POST['prenom_contributeur'] . " " . ucFirstOtherLower(tronqueName($_POST['nom_contributeur'], 1)); */?></span>
            <span class="presentation_action_left_body_action">a laissé un nouveau commentaire pour votre commerce</span>
            <div class="presentation_action_commentaire_left_body_message">
                <span>5/5 - <?php /*echo $_POST['note'] / 2; ?>/5 | <?php echo stripslashes($_POST['commentaire']); */?></span>
            </div>
            <div class="arrow_up"></div>
        </div>
                    
                <div class="presentation_action_left_footer">
            <div class="presentation_action_left_footer_img_container"><figure><img src="<?php echo SITE_URL; ?>/img/avatars/1.png"/></figure></div>
            <div class="presentation_action_left_footer_timing"><span><img src="<?php echo SITE_URL; ?>/img/pictos_actions/clock.png"/>Il y a <strong><?php/* echo $_POST['delai_avis'];  */?></strong></span></div>
            <div class="presentation_action_left_footer_picto_action"><img src="<?php echo SITE_URL; ?>/img/pictos_actions/notation.png"/></div>
        
        </div>
    </div>



    
    <div class="presentation_action_right">
        <div class="utilisateur_interface_avisenattente_haut">
            <a href="#" title="" class="maintitle"><span>Voici un nouveau commentaire. Il sera pubié dans</span><span class="interface_avisenattente_txt_colored"> <strong>3</strong> </span><span>jours</span></a>
        </div>
       
        <div class="utilisateur_interface_modifs_modifier_commentaire">
            <a href="#" title="" class="maintitle"><span class="utilisateur_interface_modifs_txt_restauration">Signaler</span><span> le commentaire</span></a>
            <div class="utilisateur_interface_modifs_modifier_commentaire_inside">
                <div class="utilisateur_interface_modifs_modifier_commentaire_inside_img_container">
                    <span>Nous vous remercions de bien vouloir indiquer les motifs de ce signalement :</span>
                </div>
                <div class="utilisateur_interface_modifs_modifier_commentaire_inputs">
                    <form>
                    <div class="modif_input_float_left"><input type="radio" name="radio_modif_user" id="modifier_commentaire_input_saisie_incorrecte"/><label for="modifier_commentaire_input_saisie_incorrecte">Avis à caractère diffamatoire ou injurieux</label></div>
                    <div class="modif_input_float_left"><input type="radio" name="radio_modif_user" id="modifier_commentaire_input_opinion_commercant"/><label for="modifier_commentaire_input_opinion_commercant">Avis incohérent ou sans intérêt</label></div>
                    <div class="modif_input_float_left"><input type="radio" name="radio_modif_user" id="modifier_commentaire_input_precisions"/><label for="modifier_commentaire_input_precisions">Spam</label></div>
                    <div class="modif_input_float_left"><input type="radio" name="radio_modif_user" id="modifier_commentaire_input_preciser_motif"/><label for="modifier_commentaire_input_pas_auteur">Autre motif</label></div>
                    <div class="modif_input_float_left"><input type="text" class="input_avisenattente_precisezmotif" placeholder="Précisez le motif"/></div>
                    </form>
                </div>
            <div class="wrap_buttons_valider_supprimer">
                <div class="button_valider"></div>
            </div>
            </div>
        </div>
        <div class="utilisateur_interface_modifs_modifier_note">
            <a href="#" title="" class="maintitle"><span class="utilisateur_interface_modifs_txt_restauration">Répondre</span><span> à ce commentaire</span></a>
            <div class="utilisateur_interface_modifs_modifier_note_inside">
                <textarea placeholder="Ajouter un commentaire"></textarea>
            <div class="wrap_buttons_valider_supprimer">
                <div class="button_valider"></div>
            </div>
            </div>
        </div>
        <div class="utilisateur_interface_modifs_modifier_avis">
            <a href="#" title="" class="maintitle"><span class="utilisateur_interface_modifs_txt_restauration">Publier</span><span> le commentaire</span></a>
            <div class="utilisateur_interface_modifs_modifier_avis_inside">
                <div class="utilisateur_interface_modifs_modifier_avis_inside_img_container">
                    <span>Êtes-vous certain de vouloir publier cet avis ?</span>
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