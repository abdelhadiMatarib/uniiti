<?php
        include_once '../../config/configuration.inc.php';
        include'../head.php'?>

<div class="suggestioncommerce_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="suggestioncommerce_head">
        <div class="suggestioncommerce_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_ajout_liencommerce.png" title="" alt="" height="33" width="33" />
        </div><span class="maintitle">Modification de vos données</span>
    </div>   
    <div class="suggestioncommerce_body">
            
        <div class="ajout_liencommerce_infos_txt">Pour modifier vos données, merci de contacter l'équipe Uniiti ci-dessous :</div>
        <textarea class="demande_modifs_input_centered" placeholder="Votre demande de modification. Veuillez écrire ici les modifications que vous souhaitez apporter à votre page."></textarea>
        
    </div>
    <div class="suggestioncommerce_footer">
        
        <div class="suggestioncommerce_valider_wrap"><a href="#">Soumettre les modifications</a></div>
        
    </div>
</div>
</html>