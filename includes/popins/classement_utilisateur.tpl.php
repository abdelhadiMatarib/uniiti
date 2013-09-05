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
<style>
    .classement_utilisateur_body{float:left;width:500px;}
    .classement_utilisateur_footer{float:left;height:100px;background-color:#f0f0f0;width:500px;}
    .classement_utilisateur_footer span{display:block;text-transform:uppercase;}
    .classement_utilisateur_body_item{float:left;width:250px;height:100px;}
    .classement_utilisateur_body_item span{display:block;}
    #item_classement_general{background-color:#a4ebf1;}
    #item_classement_restauration{background-color:#fabe41;}
    #item_classement_cinema{background-color:#46ba8f;}
    #item_classement_beaute{background-color:#f480bc;}
    #item_classement_sante{background-color:#de5b30;}
    #item_classement_aucun{background-color:#f0f0f0;}
    .classement_utilisateur_footer_badges_wrap_txt{border-right: 1px solid #e4e4e4;border-top: 1px solid #e4e4e4;font-size: 1.3em;padding: 15px 10px;float: left;height: 69px;width: 79px;background-color: #f0f0f0;}
    .classement_utilisateur_footer_badge_item{border-right:1px solid #e4e4e4;border-top:1px solid #e4e4e4;text-align:center;font-size:0.8em;padding:10px;float:left;width:79px;height:79px;background-color:#f0f0f0;}
    .classement_utilisateur_body_item_img_container{float:left;margin:15px 10px;}
    .classement_utilisateur_footer_badge_item_img_container{float:left;margin:0 10px;}
    .classement_utilisateur_body_item_txt_container{float:left;width:176px;text-align:center;margin-top:15px;}
    .classement_utilisateur_body_item_txt_nbr{font-size:2.5em;font-weight:700;}
    .classement_utilisateur_body_item_txt_titre{text-transform:uppercase;font-size:0.8em;}
    #badge_cinephile_txt{color:#46ba8f;}
    #badge_gourmet_txt{color:#fabe41;}
    
</style>
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