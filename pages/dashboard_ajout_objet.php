<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<?php 
	include_once '../acces/auth.inc.php';                 // Gestion accès à la page - incluant la session	
	include_once '../config/configuration.inc.php';
	include'../includes/head.php';
	include_once '../includes/fonctions.inc.php';
	include_once '../config/configPDO.inc.php';
?>

    <body>
        <div id="default_dialog"></div>
        <div id="default_dialog_large"></div>
        <div id="dialog_overlay">
        <div class="index_overlay"></div>
            <div class="dialog_overlay_wrap_content">
                    <div class="dialog_footer_loader">
                            <img src="<?php echo SITE_URL; ?>/img/pictos_actions/gif_uniiti.gif" height="70" width="70"/>
                    </div>
            </div>
        </div>
        <div class="bg_dashboard">
        <?php include'../includes/header.php'; ?>
        <div class="biggymarginer">
            <div class="big_wrapper" id="test">

            </div>
        <!-- FIN BIG WRAPPER -->
        <!-- CONTENU PRINCIPAL -->

        <div class="dashboard_wrap"><!-- DASH WRAP -->
            <div class="dashboard_cube_ariane">
                <div class="dashboard_cube_item dashboard_cube_item_haut item dashboard_cube_item_f"><a href="#" title=""><span>Ajouter</span><span class="dashboard_txt_bold">un objet</span></a></div>
            </div>
            <div class="dashboard_ombre_small"><img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/ombre_cube_small.png"/></div>
            <div class="dashboard_content dashboard_content_nomargintop">
                <h2>Ajouter un nouvel objet</h2>
            </div>
                <div class="big_wrapper" id="test">
            <div class="liseret_bleu"></div>
            <div class="objet_head">
                <div class="objet_head_desc">
                    <div class="objet_head_desc_title"><div class="img_container"><img src="../img/pictos_commerces/chaussure.png" height="35" width="32" title="" alt="" /></div><h2>Nom objet</h2></div>
                    <div class="objet_head_desc_social"><img src="../img/pictos_actions/fb_logo.png" title="" alt="" height="24" width="24" /><img src="../img/pictos_actions/tw_logo.png" title="" alt="" height="24" width="24" /><img src="../img/pictos_actions/g_logo.png" title="" alt="" height="24" width="24" /><span>Partager</span></div>
                    <div class="clearfix"></div>
                    <div class="separateur"></div>
                    <div class="clearfix"></div>
                    <a href="#" class="objet_head_desc_modif" onclick="OuvrePopin({}, '/includes/popins/dashboard_infos_generales_objet.tpl.php', 'default_dialog');"></a>
                    
                    <div class="objet_head_desc_ouacheter"><div class="img_container"><img src="../img/marker_map.png" title="" alt="" height="23" width="15"/></div><span>Localisation</span><span class="objet_head_desc_ouacheter_lastcat">Ville</span></div>
                    <div class="objet_head_desc_ariane"><div class="img_container"><img src="../img/pictos_commerces/etiquette.png" title="" alt="" height="20" width="23" /></div><span>Catégorie > Sous-catégorie</span><span class="objet_head_desc_ariane_lastcat">Sous-sous catégorie</span></div>
                    <div class="objet_head_desc_infosrapides"><div class="objet_infosrapides1"><div class="img_container"><img src="../img/pictos_commerces/infosrapides1.png" alt="" title="" height="26" width="21" /></div><span></span><span>Mots clefs</span><span></span></div></div>
                </div>
                <div class="objet_head_note">
                    <div class="objet_head_note_stars">
                        <img src="../img/pictos_commerces/star_0.png" title="" alt="" height="17" width="18" />
                        <img src="../img/pictos_commerces/star_0.png" title="" alt="" height="17" width="18" />
                        <img src="../img/pictos_commerces/star_0.png" title="" alt="" height="17" width="18" />
                        <img src="../img/pictos_commerces/star_0.png" title="" alt="" height="17" width="18" />
                        <img src="../img/pictos_commerces/star_0.png" title="" alt="" height="17" width="18" />
                    </div>
                    <div class="center_note">
                    <span class="objet_head_note_note">NC</span><span class="objet_head_note_note10">/10</span>
                    <span class="objet_head_note_avis">0 Avis</span>
                    </div>
                </div>
                <div class="objet_head_infos">
                    <div class="separateur"></div>
                    <div class="objet_head_infos_services"><div class="img_container"><img src="../img/pictos_commerces/coupe.png" alt="" title="" height="41" width="39" /></div><div class="objet_head_infos_services_text"><span class="objet_head_infos_services_text_fin">Classement</span><span class="objet_head_infos_services_text_couleur">Ville</span></div><span class="objet_head_infos_services_classement">NC</span></div>
                    
                    <div class="objet_head_infos_infos"><div class="img_container"><img src="../img/pictos_commerces/coupe.png" alt="" title="" height="41" width="39" /></div><div class="objet_head_infos_infos_text"><span class="objet_head_infos_infos_text_fin">Classement</span><span class="objet_head_infos_infos_text_couleur">Catégorie</span></div><span class="objet_head_infos_infos_classement">NC</span></div>
                    <div class="objet_head_infos_suivre"><span class="objet_head_infos_suivre_firstcat">Modifier</span><span class="objet_head_infos_suivre_lastcat">la page</span><div class="img_container"><img src="../img/pictos_commerces/suivre.png" alt="" height="43" width="37" /></div></div>
                </div>
            
            </div>
            <div class="commerce_head2">
                <div class="commerce_head2_coinvideo">
                    <div class="commerce_head2_coinvideo_text"><a href="#" onclick="OuvrePopin({step:1}, '/includes/popins/dashboard_video.tpl.php', 'default_dialog');"><span class="commerce_head2_text1_1">Coin</span><span class="objet_head2_text2_1">Vidéo</span></a></div><div class="img_container"><img src="../img/pictos_commerces/play.png" alt="" title="" height="19" width="19" /></div>
                </div>
                <div class="commerce_head2_right">
                <div class="commerce_head2_abonnes"><span class="commerce_head2_text1">Nombre</span><span class="objet_head2_text2">Like</span></div><div class="img_container"><img src="../img/pictos_commerces/like.png" alt="" title="" height="18" width="21" /></div><div class="commerce_head2_text3_end"><span>0</span></div>
                </div>
            </div>
            <div class="commerce_couv">
                <div class="dashboard_commerce_couv">
                    <div class="dashboard_couverture_img_title">
                        <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/logo.png"/>
                        <span class="dashboard_couv_subtitle">Gestionnaire des images</span>
                    </div>
                    <div class="dashboard_couverture_gestion_couverture"><a href="#" title="" onclick="OuvrePopin({step:1}, '/includes/popins/couverture_step1.tpl.php', 'default_dialog_large');">Gestion des couvertures</a></div>
                    <div class="dashboard_couverture_gestion_popin"><a href="#" title="" onclick="OuvrePopin({step:1}, '/includes/popins/vignette_step1.tpl.php', 'default_dialog_large');">Gestion de la popin</a></div>
                    <div class="dashboard_couverture_gestion_box"><a href="#" title="" onclick="OuvrePopin({step:1}, '/includes/popins/box_step1.tpl.php', 'default_dialog_large');">Gestion de la box</a></div>
                </div>
                <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/couv_dash.jpg" title="" alt="" />
                
                <div class="commerce_concept"><a class="button_show_concept_utilisateur" href="#" title="" onclick="OuvrePopin({},'/includes/popins/dashboard_petitmot_objet.tpl.php', 'default_dialog');"><span>Description</span><div class="commerce_concept_arrow concept_arrow_up"></div></a><p class="concept_content"></p></div>
                <div class="commerce_gerant"><div class="gerant_title gerant_title_utilisateur"><a class="button_show_concept_utilisateur" href="#" title=""><p>Son commerce</p></a></div><div class="utilisateur_gerant_photo"><img src="../img/photos_commerces/1.jpg" title="" alt="" /></div></div>
                
           </div>
                </div><!-- FIN BIG WRAPPER -->
                <div class="dashboard_couv_ombre_grande"><img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/ombre_grande.png"/></div>
                <div class="dashboard_form_input_submit_wrap submit_commerce">
                     <input type="submit" class="dashboard_form_input_submit" value="Enregistrer ce commerce" />
                </div>
        </div><!-- FIN DASH WRAP -->
        <!-- FIN CONTENU PRINCIPAL -->
        </div><!-- FIN BIGGY -->
     <?php include'../includes/js.php' ?> 
        </div>
        <script>
        function moveToNext(field,nextFieldID){
  if(field.value.length >= field.maxLength){
    document.getElementById(nextFieldID).focus();
  }
}
</script>

    </body>
</html>
