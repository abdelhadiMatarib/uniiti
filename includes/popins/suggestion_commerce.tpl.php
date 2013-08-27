<?php
        include_once '../../config/configuration.inc.php';?>

<div class="suggestioncommerce_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="suggestioncommerce_head">
        <div class="suggestioncommerce_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/sugg_commerce_icon.png" title="" alt="" height="44" width="37" />
        </div><span class="maintitle">Suggérer un commerce</span>
    </div>   
    <div class="suggestioncommerce_body">
            
        <input type="text" class="suggestioncommerce_nom" placeholder="Nom de l'enseigne"/>
        <select class="suggestioncommerce_categorie"><option>Catégorie</option><option>------------</option><option>Restauration</option></select>
        <select class="suggestioncommerce_souscategorie"><option>Sous-catégorie</option><option>------------</option><option>Cuisine somalienne</option></select>
        <textarea class="suggestioncommerce_description" placeholder="Description de l'enseigne (140 caractères max.)"></textarea>
        <input type="text" class="suggestioncommerce_ville" placeholder="Code postal ou ville"/>
            
    </div>
    <div class="suggestioncommerce_footer">
        
        <div class="suggestioncommerce_valider_wrap"><a href="#">Suggérer ce commerce</a></div>
        
    </div>
</div>
<script>    
    $('.popin_close_button').click(function(e){
    e.preventDefault(); //don't go to default URL
    var defaultdialog = $("#default_dialog").dialog();
    defaultdialog.dialog('close');
    });
</script>
</html>