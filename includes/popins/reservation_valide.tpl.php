<?php
        include_once '../../config/configuration.inc.php';
        include'../head.php';?>

<div class="suggestioncommerce_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="suggestioncommerce_head">
        <div class="suggestioncommerce_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/reservation_icon.png" title="" alt="" height="36" width="36" />
        </div><span class="maintitle">Réservation validée</span>
    </div>   
    <div class="suggestioncommerce_body">
            
        <div class="suggestion_valide_txt"><span>Une demande de réservation pour <?php echo $_POST['nom_enseigne'] ?> à bien été prise en compte. Le commerce vous contactera dans les plus brefs délais pour confirmer de cette dernière.</span></div>
            
    </div>
    <div class="suggestioncommerce_footer">
        
        <div onclick="$('.popin_close_button').click();" class="suggestioncommerce_valider_wrap"><a href="#">Merci !</a></div>
        
    </div>
</div>