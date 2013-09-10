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
        .infos_gene_title{float:left;width:480px;background-color:#73d4dc;padding:5px 10px;;}
        .infos_gene_title span{text-transform:uppercase;color:white;font-size:1.2em;font-weight:600;}
        .infos_gene_input{float:left;}
        .infos_gene_input_img{float:left;text-align:center;width:480px;padding:10px;background-color:#f0f0f0;}
        .infos_gene_input input{width:480px;padding:10px;background-color:#f0f0f0;color:#252525;}
        .infos_gene_input select{width:166.5px;height:30px;}
    </style>
    <div class="ident_body">
            <div class="infos_gene_title"><span>En général</span></div>
        <div class="infos_gene_input"><select><option>Mot-clef 1</option></select></div>
        <div class="infos_gene_input"><select><option>Mot-clef 2</option></select></div>
        <div class="infos_gene_input"><select><option>Mot-clef 3</option></select></div>
                <div class="infos_gene_title"><span>Les services proposés</span></div>
        <div class="infos_gene_input"><select><option>Mot-clef 1</option></select></div>
        <div class="infos_gene_input"><select><option>Mot-clef 2</option></select></div>
        <div class="infos_gene_input"><select><option>Mot-clef 3</option></select></div>
                <div class="infos_gene_title"><span>Les régimes spéciaux</span></div>
        <div class="infos_gene_input"><select><option>Mot-clef 1</option></select></div>
        <div class="infos_gene_input"><select><option>Mot-clef 2</option></select></div>
        <div class="infos_gene_input"><select><option>Mot-clef 3</option></select></div>
                <div class="infos_gene_title"><span>Avec qui venir ?</span></div>
        <div class="infos_gene_input"><select><option>Mot-clef 1</option></select></div>
        <div class="infos_gene_input"><select><option>Mot-clef 2</option></select></div>
        <div class="infos_gene_input"><select><option>Mot-clef 3</option></select></div>
    </div>
    <div class="suggestioncommerce_footer">
        
        <div class="suggestioncommerce_valider_wrap"><a href="#">Enregistrer</a></div>
        
    </div>
</div>
</html>