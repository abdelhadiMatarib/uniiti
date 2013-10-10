<?php
        include_once '../../config/configuration.inc.php';
        include'../head.php';
?>

<div class="suggestioncommerce_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="suggestioncommerce_head">
        <div class="suggestioncommerce_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_ajout_liencommerce.png" title="" alt="" height="33" width="33" />
        </div><span class="maintitle">Commerce ajouté</span>
    </div>   
    <div class="suggestioncommerce_body">
            
        <div class="suggestion_valide_txt"><span>Ce commerce appartient désormais à votre réseau.</span></div>
            
    </div>
    <div class="suggestioncommerce_footer">
        
        <div onclick="$('.popin_close_button').click();window.location.reload();" class="suggestioncommerce_valider_wrap"><a href="#">Merci !</a></div>
        
    </div>
</div>