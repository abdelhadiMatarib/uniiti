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
					<img src="<?php echo SITE_URL; ?>/img/pictos_commerces/star_0.png" title="" alt="" />
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
            <div class="presentation_action_signalement_flag"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_signalement_flag.png"/></div>
            <style>
                .presentation_action_signalement_flag{cursor:pointer;border-radius:3px;position:absolute;height:16px;width:16px;background-color:#d3d3d3;top:5px;right:10px;padding:2px;}
                .presentation_action_signalement_body{display:none;}
                .input_float_left{float:left;margin-left: 15px;}
                .input_float_right{float:right;margin-right: 15px;}
                .input_float_left input[type="text"]{background-color:#f0f0f0;}
                .input_float_left label{margin-left:10px;}
                .presentation_action_signalement_txt{font-weight:600;width: 430px;display: inline-block;margin:10px 0;}
                .bouton_signaler a{border-radius:3px;color:white;font-weight:600;text-transform:uppercase;margin:10px 0;display:inline-block;padding:3px;width:80px;height:20px;background-color:#de5b30;}
                input.input_signalement_motif{width:290px;}
                .signalement_button_background{background-color:#252525;}
            </style>
            <script>
            $('#modifier_commentaire_input_preciser_motif').click(function(){
                $('.input_avisenattente_precisezmotif').slideToggle();
            });
            $('.presentation_action_signalement_flag').click(function(){
               $(this).toggleClass('signalement_button_background');
               $('.presentation_action_commentaire_left_body_message').slideToggle();
               $('.presentation_action_signalement_body').slideToggle();
               
            });
            </script>
            <span class="presentation_action_left_body_username"><?php echo $_POST['prenom_contributeur'] . " " . ucFirstOtherLower(tronqueName($_POST['nom_contributeur'], 1)); ?></span>
            <span class="presentation_action_left_body_action">a laissé un avis</span>
            <div class="presentation_action_commentaire_left_body_message">
                <span><?php echo $_POST['note'] / 2; ?>/5 | <?php echo stripslashes($_POST['commentaire']); ?></span>
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
            <div class="arrow_up"></div>
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
        
    </div>
    <div class="clearfix"></div>

        <div class="presentation_action_left_avis_utile_wrap">
            
            <div class="presentation_action_left_avis_utile_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png"/></div>
            <span>Trouvez-vous cet avis utile ?</span>
            <div class="presentation_action_left_avis_utile_reponse_wrap">
                <a href="#" title="">OUI</a><a href="#" title="">NON</a>
            </div>
            
        </div>
    <div class="presentation_action_right_voirplus">
            <span class="presentation_action_right_voirplus_txt"><a href="#" title=""><strong>Voir plus</strong> de suggestions</a></span>
        </div>
        <div class="presentation_action_left_footer">
            <div class="presentation_action_left_footer_img_container"><figure><img src="<?php echo SITE_URL; ?>/img/avatars/1.png"/></figure></div>
            <div class="presentation_action_left_footer_timing"><span><img src="<?php echo SITE_URL; ?>/img/pictos_actions/clock.png"/>Il y a <strong><?php echo $_POST['delai_avis'];  ?></strong></span></div>
            <div class="presentation_action_left_footer_picto_action"><img src="<?php echo SITE_URL; ?>/img/pictos_actions/notation.png"/></div>
        
        </div>

        
        <div class="presentation_action_right_suivre">
            <div class="presentation_action_right_suivre_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/suivre.png"/></div>
            <span class="presentation_action_right_suivre_txt_1">Suivre cet</span><span class="presentation_action_right_suivre_txt_2">utilisateur</span>
        </div>
    
</div>
</html>
