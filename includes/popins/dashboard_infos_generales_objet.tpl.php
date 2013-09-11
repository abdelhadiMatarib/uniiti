<?php
        include_once '../../config/configuration.inc.php';
		$urlTo = FALSE; // Déclaration variable pour login_access destination
		$data = "{}";
?>
<div class="ident_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="ident_head">
        <div class="ident_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/icon_infos_gene.png" title="" alt="" height="35" width="35" />
        </div><span class="maintitle">Informations générales</span>
    </div>
    <style>

    </style>
    <div class="ident_body">
        <div class="infos_gene_title"><span>Adresse | Ville | Code postal</span></div>
        <div class="infos_gene_input"><input type="text" placeholder="Adresse du commerce" /></div>
        <div class="infos_gene_input"><input type="text" placeholder="Ville du commerce" /></div>
        <div class="infos_gene_input"><input type="text" placeholder="Code postal du commerce" /></div>
        <div class="infos_gene_title"><span>Catégorie | Sous-catégorie | Sous-sous-catégorie</span></div>
        <div class="infos_gene_input"><select><option>Catégorie</option></select></div>
        <div class="infos_gene_input"><select><option>Sous-Catégorie</option></select></div>
        <div class="infos_gene_input"><select><option>Sous-sous Catégorie</option></select></div>
        <div class="infos_gene_title"><span>Mots-clefs</span></div>
        <div class="infos_gene_input"><select><option>Mot-clef 1</option></select></div>
        <div class="infos_gene_input"><select><option>Mot-clef 2</option></select></div>
        <div class="infos_gene_input"><select><option>Mot-clef 3</option></select></div>
    </div>
    <div class="suggestioncommerce_footer">
        
        <div class="suggestioncommerce_valider_wrap"><a href="#">Enregistrer</a></div>
        
    </div>
</div>
</html>