<?php
        include_once '../../config/configuration.inc.php';
        include'../head.php'?>
<div class="suggestion_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="suggestion_head">
        <div class="suggestion_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/ident_icon.png" title="" alt="" height="36" width="37" />
        </div><span class="maintitle">Nous vous suggérons...</span>
    </div>   
    <div class="suggestion_body">
          <div class="presentation_action_left_head_img_container_picto_categorie"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/restaurant.png"/></div>
            <div class="suggestion_action_left_head_categorie_wrap">    
                <span class="presentation_action_left_head_titre"><?php /*echo tronque(stripslashes($_POST['nom_enseigne'])); */?></span>
                <span class="presentation_action_left_head_categorie">Restauration</span>
            </div>   
            
            <div class="presentation_action_left_head_likes_wrap">
                <div class="presentation_action_left_head_img_container_picto_likes"> <img src="<?php echo SITE_URL; ?>/img/pictos_popins/like.png"/></div>
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
            
            <div class="box_localisation"><span>Paris 7<sup>ème</sup></span></div>
            
            <figure><img src="<?php echo SITE_URL; ?>/img/pictos_popins/couv_suggestion.jpg"/></figure>
        </div>  
    </div>
</div>
</html>