<?php
        include_once '../../config/configuration.inc.php';
		$urlTo = FALSE; // Déclaration variable pour login_access destination
		$data = "{}";
?>
<div class="ident_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="ident_head">
        <div class="ident_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/icon_labels.png" title="" alt="" height="36" width="36" />
        </div><span class="maintitle">Concept & Labels</span>
    </div>   
    <div class="ident_body">
            <div class="infos_gene_title"><span>Concept du commerce</span></div>
                <textarea class="input_lien_petitmot" placeholder="Concept du commerce en quelques lignes..."></textarea>
            <div class="infos_gene_title">
                <span>Les labels Uniiti</span>
            </div>
            <div class="ptitmot_wrap_labels">
                <img src="<?php echo SITE_URL; ?>/img/pictos_actions/label_bio.png" title="" alt="" />
                <img src="<?php echo SITE_URL; ?>/img/pictos_actions/label_bio.png" title="" alt="" />
                <img src="<?php echo SITE_URL; ?>/img/pictos_actions/label_bio.png" title="" alt="" />
                <img src="<?php echo SITE_URL; ?>/img/pictos_actions/label_bio.png" title="" alt="" />
                <img src="<?php echo SITE_URL; ?>/img/pictos_actions/label_bio.png" title="" alt="" />
                <img src="<?php echo SITE_URL; ?>/img/pictos_actions/label_bio.png" title="" alt="" />
            </div>
            <div class="infos_gene_title">
                <span>Les recommandations</span>
            </div>
            <div class="ptitmot_wrap_recos">
                <img src="<?php echo SITE_URL; ?>/img/pictos_actions/reco_book.png" title="" alt="" />
                <img src="<?php echo SITE_URL; ?>/img/pictos_actions/reco_book.png" title="" alt="" />
                <img src="<?php echo SITE_URL; ?>/img/pictos_actions/reco_book.png" title="" alt="" />
                <img src="<?php echo SITE_URL; ?>/img/pictos_actions/reco_book.png" title="" alt="" />
                <img src="<?php echo SITE_URL; ?>/img/pictos_actions/reco_book.png" title="" alt="" />
                <img src="<?php echo SITE_URL; ?>/img/pictos_actions/reco_book.png" title="" alt="" />
            </div>    
       </div>
    </div>
    <div class="suggestioncommerce_footer">
        
        <div class="suggestioncommerce_valider_wrap"><a href="#">Enregistrer</a></div>
        
    </div>
</div>
</html>