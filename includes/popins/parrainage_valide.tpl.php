<?php
        include_once '../../config/configuration.inc.php';?>

<div class="suggestioncommerce_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="suggestioncommerce_head">
        <div class="suggestioncommerce_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/sugg_objet_icon.png" title="" alt="" height="44" width="37" />
        </div><span class="maintitle">Invitations envoyées</span>
    </div>   
    <div class="suggestioncommerce_body">
            
        <div class="suggestion_valide_txt"><span>Vos invitations ont bien été envoyées !</span></div>
            
    </div>
    <div class="suggestioncommerce_footer">
        
        <div onclick="$('.popin_close_button').click();" class="suggestioncommerce_valider_wrap"><a href="#">Merci !</a></div>
        
    </div>
</div>