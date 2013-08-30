<?php
        include_once '../../config/configuration.inc.php';?>

<div class="suggestionobjet_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="suggestionobjet_head">
        <div class="suggestionobjet_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/sugg_objet_icon.png" title="" alt="" height="44" width="37" />
        </div><span class="maintitle">Suggérer un objet</span>
    </div>   
    <div class="suggestionobjet_body">
            
        <input type="text" class="suggestionobjet_nom" placeholder="Nom de l'objet"/>
        <select class="suggestionobjet_categorie"><option>Catégorie</option><option>------------</option><option>Restauration</option></select>
        <select class="suggestionobjet_souscategorie"><option>Sous-catégorie</option><option>------------</option><option>Cuisine somalienne</option></select>
        <textarea class="suggestionobjet_description" placeholder="Description de l'objet (140 caractères max.)"></textarea>
            
    </div>
    <div class="suggestionobjet_footer">
        
        <div class="suggestionobjet_valider_wrap"><a href="#">Suggérer cet objet</a></div>
        
    </div>
</div>
</html>