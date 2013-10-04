<?php
        include_once '../../config/configuration.inc.php';
        include'../head.php';
?>

<div class="suggestioncommerce_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="suggestioncommerce_head">
        <div class="suggestioncommerce_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_ajout_liencommerce.png" title="" alt="" height="33" width="33" />
        </div><span class="maintitle">Ajout de commerce à mon réseau</span>
    </div>   
    <div class="suggestioncommerce_body">
            
        <div class="ajout_liencommerce_infos_txt">Rechercher le commerce que vous voulez ajouter :</div>
        <input type="text" class="suggestioncommerce_nom ajout_liencommerce_input_centered" placeholder="Nom du commerce"/>
        
        <div class="ajout_liencommerce_infos_txt">
            <span>Le commerce n'est pas présent sur Uniiti.com ? </span><span><a href="#" title="">Suggérez-le</a> et nous vous tiendrons informé de son inscription</span>
        </div>
    </div>
    <div class="suggestioncommerce_footer">
        
        <div class="suggestioncommerce_valider_wrap"><a href="#">Valider</a></div>
        
    </div>
</div>