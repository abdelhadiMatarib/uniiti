<?php
        include_once '../../config/configuration.inc.php';
		$urlTo = FALSE; // Déclaration variable pour login_access destination
		$data = "{}";
?>
<div class="ident_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="ident_head">
        <div class="ident_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_classement.png" title="" alt="" height="37" width="37" />
        </div><span class="maintitle">Votre classement Uniiti</span></div>
    </div>
    <div class="classement_utilisateur_body">
        <div class="classement_utilisateur_body_item" id="item_classement_general">
            <div class="classement_utilisateur_body_item_img_container"><img src="../img/pictos_classement/classement_general.png" height="67" width="54"/></div>
            
            <div class="classement_utilisateur_body_item_txt_container">
                <span class="classement_utilisateur_body_item_txt_nbr">88/1253</span>
                <span class="classement_utilisateur_body_item_txt_titre">Classement général</span>
            </div>
        </div>
        <div class="classement_utilisateur_body_item" id="item_classement_restauration">
            <div class="classement_utilisateur_body_item_img_container"><img src="../img/pictos_classement/classement_restauration.png" height="67" width="54"/></div>
            
            <div class="classement_utilisateur_body_item_txt_container">
                <span class="classement_utilisateur_body_item_txt_nbr">152/985</span>
                <span class="classement_utilisateur_body_item_txt_titre">Classement restauration</span>
            </div>
        </div>
        <div class="classement_utilisateur_body_item" id="item_classement_cinema">
            <div class="classement_utilisateur_body_item_img_container"><img src="../img/pictos_classement/classement_cinema.png" height="67" width="54"/></div>
            
            <div class="classement_utilisateur_body_item_txt_container">
                <span class="classement_utilisateur_body_item_txt_nbr">45/895</span>
                <span class="classement_utilisateur_body_item_txt_titre">Classement cinéma</span>
            </div>
        </div>
        <div class="classement_utilisateur_body_item" id="item_classement_beaute">
            <div class="classement_utilisateur_body_item_img_container"><img src="../img/pictos_classement/classement_beaute.png" height="67" width="54"/></div>
            
            <div class="classement_utilisateur_body_item_txt_container">
                <span class="classement_utilisateur_body_item_txt_nbr">78/9555</span>
                <span class="classement_utilisateur_body_item_txt_titre">Classement beauté</span>
            </div>
        </div>
        <div class="classement_utilisateur_body_item" id="item_classement_sante">
            <div class="classement_utilisateur_body_item_img_container"><img src="../img/pictos_classement/classement_sante.png" height="67" width="54"/></div>
            
            <div class="classement_utilisateur_body_item_txt_container">
                <span class="classement_utilisateur_body_item_txt_nbr">110/563</span>
                <span class="classement_utilisateur_body_item_txt_titre">Classement santé</span>
            </div>
        </div>
        <div class="classement_utilisateur_body_item" id="item_classement_aucun">
            <span></span> 
        </div>
    </div>
    <div class="classement_utilisateur_footer">
        
        <div class="classement_utilisateur_footer_badges_wrap_txt"><span>Vos</span><span><strong>badges</strong></span><span>Uniiti</span></div>
        
        <div class="classement_utilisateur_footer_badge_item">
            <div class="classement_utilisateur_footer_badge_item_img_container"><img src="../img/pictos_classement/badge_cinephile.png" height="52" width="55"/></div>
            
            <div id="badge_cinephile_txt">
                <span>Grand</span>
                <span>Cinéphile</span>
            </div>
            
        </div>
        <div class="classement_utilisateur_footer_badge_item">
            <div class="classement_utilisateur_footer_badge_item_img_container"><img src="../img/pictos_classement/badge_gourmet.png" height="52" width="55"/></div>
            
            <div id="badge_gourmet_txt">
                <span>Fin</span>
                <span>Gourmet</span>
            </div>
            
        </div>
        <div class="classement_utilisateur_footer_badge_item"></div>
        <div class="classement_utilisateur_footer_badge_item"></div>
        
    </div>
</div>
<script>

</script>
</html>