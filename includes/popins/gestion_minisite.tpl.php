<?php
        include_once '../../config/configuration.inc.php';
		$urlTo = FALSE; // Déclaration variable pour login_access destination
		$data = "{}";
?>
<style>
    .minisite_body{float:left;width:500px;background-color: #e4e4e4;}
    .minisite_body_left,.minisite_body_right{float:left;}
    .minisite_body_left{width:200px;}
    .minisite_body_right{width:300px;}
    .minisite_body_head_titre{line-height:14px;text-align:center;width:189px;float:left;padding:10px 5px;background-color:#73d4dc;color:white;}
    .minisite_body_head_titre span{width:155px;text-transform:uppercase;display:inline-block;font-size:0.9em;font-weight:700;height:16px;}
    .minisite_body_head_content{float:left;background-color:#f0f0f0;width:179px;padding:10px;text-align:center;}

    .minisite_body_head2_titre{line-height:14px;text-align:center;width:289px;float:left;padding:10px 5px;background-color:#73d4dc;color:white;}
    .minisite_body_head2_titre span{width:280px;text-transform:uppercase;display:inline-block;font-size:0.9em;font-weight:700;height:16px;}
    .minisite_body_head2_content{float:left;background-color:#f0f0f0;width:279px;padding:10px;text-align:center;}
    .minisite_body_head2_content1_img_container,.minisite_body_head2_content2_img_container{float:left;padding:2px 0 0 0;height:16px;margin-left:10px;}
    .minisite_body_head2_content1_img_container span,.minisite_body_head2_content2_img_container span{float:right;display:inline-block;margin-left:5px;}
    .minisite_body_head2_content2_img_container img{margin-top:-3px;}
    .minisite_body_head2_content2{position:relative;float:left;height:93px;background-color:#f0f0f0;width:300px;}
    .minisite_body_head2_content2 textarea{position:relative;float:left;padding:20px 10px;width:279px;height:52px;resize:none;background-color:#f0f0f0;border-bottom:1px solid #e4e4e4;}
    .minisite_textarea_explications_absolues{cursor:default;position:absolute;top:5px;left:10px;font-size:0.8em;z-index:99;}
    .minisite_explications_palette_couleurs{float:left;font-size:0.8em;padding:5px 10px;width:280px;background-color: #f0f0f0;}
    
    .minisite_body_head_content_cases,.minisite_body_head_content_cases_bleues{text-align:center;float:left;}
    .minisite_body_head_content_cases a{text-transform:uppercase;color:#cbcbcb;font-size:2em;font-weight:600;display:inline-block;width:79px;padding:20px 10px;background-color:#f0f0f0;border-right:1px solid #e4e4e4;}
    .minisite_body_head_content_cases a span{display:block;font-size:12px;}
    /*.minisite_body_head_content_cases a:hover{color:white;background-color:#a4ebf1;}*/

    .minisite_body_head_content_cases_bleues a{text-transform:uppercase;color:white;font-size:2em;font-weight:600;display:inline-block;width:79px;padding:20px 10px;background-color:#a4ebf1;}
    .minisite_body_head_content_cases_bleues a span{display:block;font-size:12px;}
    
    .minisite_palette_couleurs_fleches{float:left;width:27px;margin:15px;}
    .minisite_palette_couleurs_fleches_haut a,.minisite_palette_couleurs_fleches_bas a{display:inline-block;height:15px;width:27px;}
    .minisite_palette_couleurs_wrap{float:left;margin-top:17px;}
    .minisite_palette_couleurs_items{float:left;width:30px;height:30px;border-radius:3px;margin-right:2px;}
    .minisite_palette_couleurs_items a{display:inline-block;height:30px;width:30px;}
    .minisite_palette_couleurs_items a:hover{border:1px solid #a4ebf1;}
    #minisite_palette_couleurs_1{background-color:#a4ebf1;}
    #minisite_palette_couleurs_2{background-color:#51c0eb;}
    #minisite_palette_couleurs_3{background-color:#4ea7ca;}
    #minisite_palette_couleurs_4{background-color:#4c8ea8;}
    #minisite_palette_couleurs_5{background-color:#497687;}
    #minisite_palette_couleurs_6{background-color:#475d65;}
    #minisite_palette_couleurs_7{background-color:#444444;}
    
</style>
<div class="ident_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="ident_head">
        <div class="ident_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_gestion_minisite.png" title="" alt="" height="36" width="36" />
        </div><span class="maintitle">Gestion de votre site web</span></div>
    </div>   
    <div class="minisite_body">
        <div class="minisite_body_left">
        <div class="minisite_body_head_titre">
            <span>Votre URL</span>
        </div>
        <div class="minisite_body_head_content">
            <a href="#" title="" target="_blank">www.chezlesartistes.com</a>
        </div>
        <div class="minisite_body_head_titre">
            <span>Statistiques</span>
        </div>
        <div class="minisite_body_head_content_cases">
            <a href="#" title="">75<span>Visites</span></a>
        </div>
        <div class="minisite_body_head_content_cases_bleues">
            <a href="#" title="">32,2%<span>Évolution</span></a>
        </div>
         <div class="minisite_body_head_content_cases">
            <a href="#" title="">253<span>Pages vues</span></a>
        </div>
        <div class="minisite_body_head_content_cases_bleues">
            <a href="#" title="">24,5%<span>Évolution</span></a>
        </div>
                <div class="minisite_body_head_content_cases">
            <a href="#" title="">23<span>Réservations</span></a>
        </div>
        <div class="minisite_body_head_content_cases_bleues">
            <a href="#" title="">15%<span>Évolution</span></a>
        </div>
        </div>
        <div class="minisite_body_right">
        <div class="minisite_body_head2_titre">
            <span>Informations globales</span>
        </div>
        <div class="minisite_body_head2_content">
            <div class="minisite_body_head2_content1_img_container"><img src="../img/pictos_popins/icon_minisite_infos_jour.png" /><span>Abonnement à jour</span></div>
            <div class="minisite_body_head2_content2_img_container"><img src="../img/pictos_popins/icon_minisite_facture.png" /><span><strong>Facture</strong>(.pdf)</span></div>
           
        </div>
            <div class="minisite_body_head2_titre">
                <span>Informations globales</span>
            </div>
            <div class="minisite_body_head2_content2">
                <div class="minisite_textarea_explications_absolues"><strong>Balise META Title (18 caractère(s) restant(s))</strong></div>
                <textarea>Restaurant chez les Artistes | Paris 15ème</textarea>
            </div>
            <div class="minisite_body_head2_content2">
                <div class="minisite_textarea_explications_absolues"><strong>Balise META Description (0 caractère(s) restant(s))</strong></div>
                <textarea>Le Cuba Compagnie est un Bar Cubain, Un Restaurant / Resto Cubain Latino Paris un Bar Latino Paris et un Restaurant / Resto Cubain Latino situé à Paris. Lorem ipsum.</textarea>
            </div>
            <div class="minisite_body_head2_content2">
                <div class="minisite_explications_palette_couleurs">
                    <span><strong>Choix de la palette de couleurs</strong></span>
                </div>
                <div class="minisite_palette_couleurs_fleches">
                    <div class="minisite_palette_couleurs_fleches_haut"><a href="#" title="" alt=""><img src="../img/pictos_popins/icon_minisite_palette_h.png" title="" alt="" /></a></div>
                    <div class="minisite_palette_couleurs_fleches_bas"><a href="#" title="" alt=""><img src="../img/pictos_popins/icon_minisite_palette_b.png" title="" alt="" /></a></div>
                </div>
                <div class="minisite_palette_couleurs_wrap">
                        <div class="minisite_palette_couleurs_items" id="minisite_palette_couleurs_1"><a href="#" title=""></a></div>
                        <div class="minisite_palette_couleurs_items" id="minisite_palette_couleurs_2"><a href="#" title=""></a></div>
                        <div class="minisite_palette_couleurs_items" id="minisite_palette_couleurs_3"><a href="#" title=""></a></div>
                        <div class="minisite_palette_couleurs_items" id="minisite_palette_couleurs_4"><a href="#" title=""></a></div>
                        <div class="minisite_palette_couleurs_items" id="minisite_palette_couleurs_5"><a href="#" title=""></a></div>
                        <div class="minisite_palette_couleurs_items" id="minisite_palette_couleurs_6"><a href="#" title=""></a></div>
                        <div class="minisite_palette_couleurs_items" id="minisite_palette_couleurs_7"><a href="#" title=""></a></div>
                </div>
            </div>
           
        </div>
            
       
            
    </div>
    <div class="suggestioncommerce_footer">
        
        <div class="suggestioncommerce_valider_wrap"><a href="#">Enregistrer</a></div>
        
    </div>
</div>
</html>