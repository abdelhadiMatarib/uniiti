<?php
        include_once '../../config/configuration.inc.php';
		$urlTo = FALSE; // Déclaration variable pour login_access destination
		$data = "{}";
?>
<div class="ident_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="ident_head">
        <div class="ident_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/icon_video.png" title="" alt="" height="36" width="36" />
        </div><span class="maintitle">Gestion de la vidéo</span>
    </div>   
    <div class="ident_body">
        <style>
            .input_lien_video{float:left;}
            input.input_lien_video{padding:10px;width:480px;height:10px;}
            .embed_preview_video{float:left;padding:10px;width:480px;height:360px;background-color:#f0f0f0;}
        </style>
            <div class="infos_gene_title"><span>Lien vidéo (Youtube/Dailymotion/Vimeo)</span></div>
                <input type="text" class="input_lien_video" placeholder="Lien"/>
            <div class="infos_gene_title"><span>Aperçu</span></div>
            <div class="embed_preview_video">
                
            </div>
    </div>
    <div class="suggestioncommerce_footer">
        
        <div class="suggestioncommerce_valider_wrap"><a href="#">Enregistrer</a></div>
        
    </div>
</div>
</html>