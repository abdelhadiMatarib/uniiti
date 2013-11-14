<?php
include_once '../../acces/auth.inc.php';                 // gestion accès à la page - incluant la session
include_once '../../config/configuration.inc.php';
include_once '../../config/configPDO.inc.php';

?>
<div class="suggestioncommerce_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="suggestioncommerce_head">
        <div class="suggestioncommerce_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/sugg_commerce_icon.png" title="" alt="" height="44" width="37" />
        </div><span class="maintitle">Avis enregistré</span>
    </div>   
    <div class="suggestioncommerce_body">
            
        <div class="suggestion_valide_txt"><span>Nous avons bien enregistré votre avis.</span></div>
            
    </div>
    <div class="suggestioncommerce_footer">
        
        <div onclick="$('.popin_close_button').click();" class="modifprofil_valider_wrap">Merci !</div>
        
    </div>
</div>
