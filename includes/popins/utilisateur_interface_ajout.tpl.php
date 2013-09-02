<?php

include_once '../../config/configuration.inc.php';
include_once '../fonctions.inc.php';

if (empty($_POST['id_enseigne'])) {echo "vous ne pouvez pas accéder directement à cette page !\n<a href=\"" . SITE_URL . "\">Revenir à la page principale</a>"; exit;}
		
?>
	
<div class="presentation_action_wrapper presentation_action_commentaire_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    
    <div class="presentation_action_left">
        <div class="presentation_action_left_head">
            
            <div class="presentation_action_left_head_img_container_picto_categorie"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/restaurant.png"/></div>
            <div class="presentation_action_left_head_categorie_wrap">    
                <span class="presentation_action_left_head_titre"><?php echo tronque(stripslashes($_POST['nom_enseigne'])); ?></span>
                <span class="presentation_action_left_head_categorie">Restauration</span>
            </div>
            
            <div class="presentation_action_left_head_likes_wrap">
                <div class="presentation_action_left_head_img_container_picto_likes"> <img src="<?php echo SITE_URL; ?>/img/pictos_popins/like.png"/></div>
                <span class="presentation_action_left_head_nombrelikes"><strong>15756</strong></span>
                <span class="presentation_action_left_head_nombrelikes_txt">LIKE</span>
            </div>
                
            <div class="presentation_action_left_head_note_wrap">
				<?php for ($i = 1 ; $i <= round($_POST['note_arrondi'] / 2) ; $i++) { ?>
					<img src="img/pictos_commerces/star_0.png" title="" alt="" />
				<?php } /* Fin du for */ ?>
                <span class="presentation_action_left_head_note_txt"><?php echo $_POST['note_arrondi']; ?>/10 - <?php echo $_POST['count_avis_enseigne']; ?> Avis</span>
            </div>
            
        </div>
        <div class="presentation_action_left_figure">
            <div class="wrapper_boutons_popin">
                <div class="boutons_action_popin"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/pouce_OK_popin.png"/></div>
                <div class="boutons_action_popin"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/pouce_NOK_popin.png"/></div>
                <div class="boutons_action_popin"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/wishlist_popin.png"/></div>
            </div>
            <div class="box_localisation"><span>Paris 7<sup>ème</sup></span></div>
            
            <figure><img src="<?php echo SITE_URL; ?>/img/pictos_popins/couv_popin.jpg"/></figure>
        </div>
        <div class="presentation_action_left_body presentation_action_commentaire_left_body">
            <span class="presentation_action_left_body_username"><?php echo $_POST['prenom_contributeur'] . " " . ucFirstOtherLower(tronqueName($_POST['nom_contributeur'], 1)); ?></span>
            <span class="presentation_action_left_body_action">a laissé un avis</span>
            <div class="presentation_action_commentaire_left_body_message">
                <span><?php echo $_POST['note'] / 2; ?>/5 | <?php echo stripslashes($_POST['commentaire']); ?></span>
            </div>
            <div class="arrow_up"></div>
        </div>
                <div class="presentation_action_left_footer">
            <div class="presentation_action_left_footer_img_container"><figure><img src="<?php echo SITE_URL; ?>/img/avatars/1.png"/></figure></div>
            <div class="presentation_action_left_footer_timing"><span><img src="<?php echo SITE_URL; ?>/img/pictos_actions/clock.png"/>Il y a <strong><?php echo $_POST['delai_avis'];  ?></strong></span></div>
            <div class="presentation_action_left_footer_picto_action"><img src="<?php echo SITE_URL; ?>/img/pictos_actions/notation.png"/></div>
        
        </div>
    </div>



    
    <div class="presentation_action_right">
       
        <div class="utilisateur_interface_modifs_modifier_note">
            <a href="#" title="" class="maintitle"><span class="utilisateur_interface_modifs_txt_bold">Ajouter</span><span> ma note</span></a>
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
            <a href="#" title="" class="maintitle"><span class="utilisateur_interface_modifs_txt_bold">Ajouter</span><span> mon commentaire</span></a>
            <div class="utilisateur_interface_modifs_modifier_commentaire_inside">
                <textarea placeholder="Ajouter un commentaire"></textarea>
            </div>
        </div>
        <div class="utilisateur_interface_modifs_modifier_avis">
            <a href="#" title="" class="maintitle"><span class="utilisateur_interface_modifs_txt_bold">Ne pas donner</span><span> mon avis</span></a>
            <div class="utilisateur_interface_modifs_modifier_avis_inside">
                <div class="utilisateur_interface_modifs_modifier_avis_inside_img_container">
                    <span>Êtes-vous certain de ne pas vouloir donner d'avis ?</span>
                </div>
                <div class="utilisateur_interface_modifs_modifier_avis_inside_choice_oui"><a href="#" title=""><span>OUI</span></a></div>
                <div class="utilisateur_interface_modifs_modifier_avis_inside_choice_non"><a href="#" title=""><span>NON</span></a></div>
            </div>
        </div>
            
        </div>
        <div class="clearfix"></div>


    </div>
    

       
    
</div>
<script>
// Box utilisateur modifier interface modifier note
    $(".utilisateur_interface_modifs_modifier_note a.maintitle").click(function(e){
       e.preventDefault();
       
       $(this).next().stop().slideToggle();
       if ($(".utilisateur_interface_modifs_modifier_commentaire_inside,.utilisateur_interface_modifs_modifier_avis_inside").is(':visible'))
       {
           $(".utilisateur_interface_modifs_modifier_commentaire_inside,.utilisateur_interface_modifs_modifier_avis_inside").stop().slideUp();
       };
    });
    $(".utilisateur_interface_modifs_modifier_commentaire a.maintitle").click(function(e){
       e.preventDefault();
       
       $(this).next().stop().slideToggle();
       if ($(".utilisateur_interface_modifs_modifier_note_inside,.utilisateur_interface_modifs_modifier_avis_inside").is(':visible'))
       {
           $(".utilisateur_interface_modifs_modifier_note_inside,.utilisateur_interface_modifs_modifier_avis_inside").stop().slideUp();
       };
    });
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