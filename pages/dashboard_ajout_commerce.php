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
            <style>
                .bg_dashboard{background-color:white;height:100%;}
                .dashboard_wrap{margin:0 auto;}
                .dashboard_title_wrap{text-transform:uppercase;margin:0 auto;text-align:center;width:630px;}
                .dashboard_title_wrap h1{font-weight:300;margin:40px 0;}
                .dashboard_title_wrap h1 span{font-weight:600;}
                
                .dashboard_panel,.dashboard_content{width:694px;min-height:460px;margin:0 auto;}
                .dashboard_content_nomargintop{min-height:40px;}
                .form_content{height:940px;}
                .form_content span{display:inline-block;font-size:1.4em;font-weight:600;}
                .dashboard_cube_ariane{width:228px;height:190px;margin:0 auto;margin-top:40px;}
                .dashboard_cube_ariane a{cursor:default;}
                
                .dashboard_cube_item{position:relative;line-height:1.85em;text-align:center;float:left;}
                .dashboard_cube_item_margin_right{margin-right:5px;}
                .dashboard_cube_item_haut{z-index:2;}
                .dashboard_cube_item_bas{z-index:1;}
                .dashboard_cube_item_margin_top{margin-top:-7px;}
                
                .dashboard_cube_item_c{background:url('../img/pictos_dashboard/cube_c.png');}
                .dashboard_cube_item_f{background:url('../img/pictos_dashboard/cube_f.png');}
                .dashboard_cube_item span{display:block;font-size:1.7em;font-weight:400;text-transform:uppercase;}
                .dashboard_cube_item span.dashboard_txt_bold{font-weight:700;}
                .dashboard_cube_item a{color:white;display:inline-block;padding-top:75px;height:115px;width:228px;}
                .dashboard_cube_item a.dashboard_cube_item_last{padding-top:90px;height:100px;}
                .dashboard_cube_item a:hover{color:#acacac;}
                
                .dashboard_cube_ombre{float:left;margin:-15px -25px 0 0;width:736px;height:93px;background:url('../img/pictos_dashboard/ombre_cube.png');}
                
                .dashboard_content h2{margin-top:0;text-transform:uppercase;font-size:1.7em;font-weight:600;border-bottom:1px solid #252525;}
                .dashboard_content span{display:inline-block;font-size:1.4em;}
                .dashboard_content span.dashboard_txt_bold{font-weight:700;margin-left:20px;}
                
                .dashboard_form_wrap{float:left;height:700px;}
                .dashboard_form_txt{float:left;}
                .dashboard_form_txt span{display:inline-block;}
                .dashboard_form_input{float:left;margin-bottom:15px;}
                .dashboard_form_input_right{float:right;margin-bottom:15px;}
                .dashboard_form_input input,.dashboard_form_input_right input{height:40px;border:1px dashed #252525;font-size:1.4em;font-weight:600;color:#acacac;}
                .dashboard_form_input textarea{resize:none;height:198px;width:674px;border:1px dashed #252525;padding:10px;font-size:1.4em;font-weight:600;color:#acacac;}
                .dashboard_form_input_radio{margin-top:7px;}
                
                .dashboard_form_avis_date{height:33px;padding-top:7px;margin-right:20px;}
                input#dashboard_form_avis_date{width:155px;padding-left:10px;}
                .dashboard_form_avis_heure{height:33px;padding-top:7px;margin-right:20px;margin-left:60px;}
                input#dashboard_form_avis_heure{width:155px;padding-left:10px;}
                .dashboard_form_avis_commerce{height:33px;padding-top:7px;margin-right:20px;}
                input#dashboard_form_avis_commerce{width:570px;padding-left:10px;}
                .dashboard_form_avis_commentaire{height:33px;margin-right:20px;}
                .dashboard_form_avis_note{height:33px;padding-top:7px;margin-right:20px;}
                .dashboard_form_avis_nom{height:33px;padding-top:7px;margin-right:20px;}
                input#dashboard_form_avis_nom{width:520px;padding-left:10px;}
                .dashboard_form_avis_prenom{height:33px;padding-top:7px;margin-right:20px;}
                input#dashboard_form_avis_prenom{width:520px;padding-left:10px;}
                .dashboard_form_avis_ddn{height:33px;padding-top:7px;margin-right:20px;}
                .dashboard_form_avis_ddn_dd{text-align:center;width:155px;padding-left:10px;}
                .dashboard_form_avis_ddn_mm{text-align:center;width:155px;padding-left:10px;}
                .dashboard_form_avis_ddn_yyyy{text-align:center;width:155px;padding-left:10px;}
                
                .dashboard_form_avis_email{height:33px;padding-top:7px;margin-right:20px;}
                input#dashboard_form_avis_email{width:520px;padding-left:10px;}
                .dashboard_form_avis_tel{height:33px;padding-top:7px;margin-right:20px;}
                input#dashboard_form_avis_tel{width:520px;padding-left:10px;}
                
                .dashboard_form_note_wrap{margin:0 0 0 220px;}
                a.note_avis_etoile{background:url('../img/pictos_dashboard/etoile_avis.png');display:inline-block;margin-right:10px;height:45px;width:48px;}
                a:hover.note_avis_etoile{background-position:0 -45px;}
                
                .dashboard_form_avis_invitations{margin-right:120px;height:33px;padding-top:7px;}
                input#dashboard_form_avis_invitations{margin:0 10px;height:13px;}
                input#dashboard_form_avis_invitations_non{margin:0 10px 0 40px;height:13px;}
                .dashboard_form_avis_frequence{margin-left:85px;height:33px;padding-top:7px;margin-right:20px;}
                div#dashboard_form_avis_frequence{width:123px;height:40px;border:1px dashed #252525;text-align:center;}
                div#dashboard_form_avis_frequence select{background-color:white;list-style:none;display:block;padding:8px;font-size:1.4em;}
            
                .dashboard_form_input_submit_wrap{margin:0 auto;width:441px;}
                input.dashboard_form_input_submit{margin-top:20px;font-size:1.4em;padding:10px 120px;background-color:#a4ebf1;border:1px dashed #252525;}
                input:hover.dashboard_form_input_submit{border:1px dashed white;color:white;}
                
                /* COMMERCE INSIDE DASHBOARD */
                
                .submit_commerce{margin-bottom:40px;}

                .dashboard_wrap .commerce_couv{height:363px;}
                .dashboard_wrap .commerce_head_note_reservation{background-color:#a4ebf1;}
                .dashboard_wrap .commerce_head_infos_services_text_couleur,.dashboard_wrap .commerce_head_infos_infos_text_couleur{color:#a4ebf1;}
                .dashboard_wrap .commerce_head_infos_infos,.dashboard_wrap .commerce_head_infos_services{width:230px;}
                .dashboard_wrap .commerce_head2_text2{color:#a4ebf1;}
                .dashboard_wrap .commerce_head2_text2_1{color:#a4ebf1;}
                .dashboard_wrap .gerant_title{background-color:#a4ebf1;}
                .dashboard_wrap .boutons{width: 44px;height: 45px;background: url("../img/pictos_dashboard/boutons.png") no-repeat center;}
            
                .dashboard_commerce_couv{position:absolute;left:270px;top:80px;}
                .dashboard_couverture_img_title{text-align:center;margin:0 auto;width:685px;margin-bottom:20px;}
                .dashboard_couverture_gestion_couverture,.dashboard_couverture_gestion_popin,.dashboard_couverture_gestion_box{float:left;text-align:center;}
                .dashboard_couverture_gestion_couverture,.dashboard_couverture_gestion_popin{margin-right:10px;}
                .dashboard_couverture_gestion_couverture a,.dashboard_couverture_gestion_popin a,.dashboard_couverture_gestion_box a{color:#252525;display:inline-block;font-size:1.2em;font-weight:600;padding:10px 10px;width:203px;height:20px;border:1px dashed #252525;}
                .dashboard_couverture_gestion_couverture a:hover,.dashboard_couverture_gestion_popin a:hover,.dashboard_couverture_gestion_box a:hover{color:#acacac;border:1px dashed #acacac;}
                span.dashboard_couv_subtitle{display:block;text-transform:uppercase;}
                
                .dashboard_couv_ombre_grande{width:1201px;margin:0 auto;}
                .dashboard_ombre_small{width:269px;height:61px;margin:0 auto;}
            </style>
        <!-- FIN BIG WRAPPER -->
        <!-- CONTENU PRINCIPAL -->
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
        <div class="dashboard_wrap"><!-- DASH WRAP -->
            <div class="dashboard_cube_ariane">
                <div class="dashboard_cube_item dashboard_cube_item_haut item dashboard_cube_item_f"><a href="#" title=""><span>Ajouter</span><span class="dashboard_txt_bold">un commerce</span></a></div>
            </div>
            <div class="dashboard_ombre_small"><img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/ombre_cube_small.png"/></div>
            <div class="dashboard_content dashboard_content_nomargintop">
                <h2>Ajouter un nouveau commerce</h2>
            </div>
                <div class="big_wrapper" id="test">
            <div class="liseret_bleu"></div>
            <div class="commerce_head">
                <div class="commerce_head_desc">
                    <div class="commerce_head_desc_title"><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/restauration_b.png" title="" alt="" /></div><h2>Nom entreprise<?php /*echo $nom_enseigne*/?></h2></div>
                    <div class="commerce_head_desc_social"><img src="<?php echo SITE_URL; ?>/img/pictos_actions/fb_logo.png" title="" alt="" height="24" width="24" /><img src="<?php echo SITE_URL; ?>/img/pictos_actions/tw_logo.png" title="" alt="" height="24" width="24" /><img src="<?php echo SITE_URL; ?>/img/pictos_actions/g_logo.png" title="" alt="" height="24" width="24" /><span>Partager</span></div>
                    <div class="clearfix"></div>
                    <div class="separateur"></div>
                    <div class="clearfix"></div>
                    <div class="commerce_head_desc_address"><div class="img_container" id="commerce_head_desc_address_button"><a href="#" title=""><img src="<?php echo SITE_URL; ?>/img/marker_map.png" title="" alt="" height="23" width="15"/></a></div><div id="commerce_head_desc_address_wrap"><address>Adresse<?php /*echo /*$adresse1_enseigne; */?></address><span>CODE POSTAL VILLE<?php /*echo /*$code_postal; */?> <?php /*echo /*$ville_enseigne; */?></span></div></div>
                    <div class="commerce_head_desc_ariane"><div class="img_container" id="commerce_head_desc_ariane_button"><a href="#" title=""><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/etiquette.png" title="" alt="" height="20" width="23" /></a></div><div id="commerce_head_desc_ariane_wrap"><span>Catégorie > Sous-catégorie</span><span class="commerce_head_desc_ariane_lastcat">Sous-sous catégorie</span></div></div>
                    <div class="clearfix"></div>
                    <div class="separateur"></div>
                    <div class="clearfix"></div>
                    <div class="commerce_head_desc_identity"><div class="img_container" id="commerce_head_desc_identity_button"><a href="#"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/identity.png" title="" alt="" height="18" width="22" /></a></div><div id="commerce_head_desc_identity_wrap"><span>Téléphone<?php /*if ($telephone_enseigne) echo 'Tél. : ';echo chunk_split($telephone_enseigne,2,'.');*/?></span><a href="#" title="">Lien site Internet</a></div></div>
                    <div class="commerce_head_desc_prices"><div class="img_container" id="commerce_head_desc_prices_button"><a href="#" title=""><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/price.png" title="" alt="" height="21" width="21" /></a></div><div id="commerce_head_desc_prices_wrap"><img class="price_bag" src="<?php echo SITE_URL; ?>/img/pictos_commerces/price_bag_1.png" title="" alt="" height="25" width="19" /><img class="price_bag" src="<?php echo SITE_URL; ?>/img/pictos_commerces/price_bag_1.png" title="" alt="" height="25" width="19" /><img class="price_bag" src="<?php echo SITE_URL; ?>/img/pictos_commerces/price_bag_1.png" title="" alt="" height="25" width="19" /><img class="price_bag" src="<?php echo SITE_URL; ?>/img/pictos_commerces/price_bag_1.png" title="" alt="" height="25" width="19" /></div></div>
                </div>
                <div class="commerce_head_note">
                    <div class="commerce_head_note_stars">
			<img src="<?php echo SITE_URL; ?>/img/pictos_commerces/star_0.png" title="" alt="" height="17" width="18" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_commerces/star_0.png" title="" alt="" height="17" width="18" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_commerces/star_0.png" title="" alt="" height="17" width="18" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_commerces/star_0.png" title="" alt="" height="17" width="18" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_commerces/star_0.png" title="" alt="" height="17" width="18" />
                    </div>
                    <div class="center_note">
                    <span class="commerce_head_note_note">NC <?php /*echo $note_arrondi; */?></span><span class="commerce_head_note_note10"> /10</span>
                    </div>
                    <span class="commerce_head_note_avis"><?php /*echo $count_avis_enseigne; */?>0 Avis</span>
                    <div class="commerce_head_note_reservation">
                        <a href="#" title="" class="commerce_reserver_button" onclick="OuvrePopin({}, '/includes/popins/module_reservation.tpl.php', 'default_dialog');">
                            <div class="img_container_reservation"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/sonette.png" title="" alt="" height="24" width="30" /></div>
                            <div class="commerce_head_note_reserver"><span><strong>Module</strong> résa/rdv</span></div>
                        </a>
                    </div>
                </div>
                <div class="commerce_head_infos">
                    <div class="commerce_head_infos_services"><a href="#" title="" onclick="OuvrePopin({}, '/includes/popins/menutarifs.tpl.php', 'default_dialog_large');"><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/menutarifs.png" alt="" title="" height="35" width="35" /></div><div class="commerce_head_infos_services_text"><span class="commerce_head_infos_services_text_fin">Menu</span><span class="commerce_head_infos_services_text_couleur">& Tarifs</span></div></a></div>
                    <div class="commerce_head_infos_infos"><a href="#" title="" onclick="OuvrePopin({}, '/includes/popins/infospratiques.tpl.php', 'default_dialog_large');"><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/horloge.png" alt="" title="" height="35" width="35" /></div><div class="commerce_head_infos_infos_text"><span class="commerce_head_infos_infos_text_fin">Infos</span><span class="commerce_head_infos_infos_text_couleur">Pratiques</span></div></a></div>
                    <div class="commerce_head_infos_suivre"><a href="#" title="" onclick="<?php /*echo $follow_step1; */?>"><span>Suivre</span><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/suivre.png" alt="" height="43" width="37" /></div></a></div>
                    <div class="clearfix"></div>
                    <div class="separateur"></div>
                    <div class="clearfix"></div>
                    <div class="commerce_head_infos_infosrapides">
                        <div class="infosrapides1"><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/infosrapides1.png" alt="" title="" height="26" width="21" /></div><span></span><span>Mot-clefs 1</span><span></span></div>
                        <div class="infosrapides2"><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/infosrapides2.png" alt="" title="" height="25" width="26" /></div><span></span><span>Mots-clefs 2</span><span></span></div>
                        <div class="clearfix_infosrapides"></div>
                        <div class="infosrapides3"><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/infosrapides3.png" alt="" title="" height="30" width="30" /></div><span></span><span>Mots-clefs 3</span><span></span></div>
                        <div class="infosrapides4"><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/infosrapides4.png" alt="" title="" height="23" width="32" /></div><span></span><span>Mots-clefs 4</span><span></span></div>
                    </div>
                    
                </div>
            
            </div>
            <div class="commerce_head2">
                <div class="commerce_head2_coinvideo">
                    <div class="commerce_head2_coinvideo_text"><span class="commerce_head2_text1_1">Coin</span><span class="commerce_head2_text2_1">Vidéo</span></div><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/play.png" alt="" title="" height="19" width="19" /></div>
                </div>
                <div class="commerce_head2_right">
                <div class="commerce_head2_reseau"><span class="commerce_head2_text1">Son</span><span class="commerce_head2_text2">Réseau</span></div><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/reseau.png" alt="" title="" height="19" width="19" /></div><div class="commerce_head2_text3"><span>0</span></div>
                <div class="commerce_head2_avis"><span class="commerce_head2_text1">Nombre</span><span class="commerce_head2_text2">Avis</span></div><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/star_0.png" alt="" title="" height="19" width="19" /></div><div class="commerce_head2_text3"><span>0<?php /*echo $count_avis_enseigne; */?></span></div>
                <div class="commerce_head2_abonnes"><span class="commerce_head2_text1">Nombre</span><span class="commerce_head2_text2">Abonnés</span></div><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/abonnes.png" alt="" title="" height="19" width="19" /></div><div class="commerce_head2_text3_end"><span>0<?php /*echo $count_abonnes; */?></span></div>
                </div>
            </div>
            <div class="commerce_couv">
                <div class="dashboard_commerce_couv">
                    <div class="dashboard_couverture_img_title">
                        <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/logo.png"/>
                        <span class="dashboard_couv_subtitle">Gestionnaire des images</span>
                    </div>
                    <div class="dashboard_couverture_gestion_couverture"><a href="#" title="" onclick="OuvrePopin({}, '/includes/popins/couverture_step1.tpl.php', 'default_dialog_large');">Gestion des couvertures</a></div>
                    <div class="dashboard_couverture_gestion_popin"><a href="#" title="">Gestion de la popin</a></div>
                    <div class="dashboard_couverture_gestion_box"><a href="#" title="">Gestion de la box</a></div>
                </div>
                <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/couv_dash.jpg" title="" alt="" />
                
                <div class="commerce_concept"><a class="button_show_concept" href="#" title=""><span>Le concept</span><div class="commerce_concept_arrow concept_arrow_up"></div></a><p class="concept_content"><?php /*echo $descriptif */?></p></div>
                <div class="commerce_gerant"><div class="gerant_title"><a class="button_show_concept" href="#" title=""><p>Le gérant</p></a></div><div class="gerant_photo"><img src="<?php echo SITE_URL; ?>/img/avatars/james.jpg" title="" alt="" /></div></div>
                
                <div class="commerce_recos"><a class="button_show_recos" href="#" title=""><span>Recommandations</span><div class="commerce_recos_arrow recos_arrow_up"></div><div class="commerce_recos_wrap"><img src="<?php echo SITE_URL; ?>/img/pictos_actions/reco_book.png" width="50" height="44" title="" alt="" /><img src="<?php echo SITE_URL; ?>/img/pictos_actions/reco_book.png" width="50" height="44" title="" alt="" /><p></p></div></a></div>
                <div class="commerce_labels"><a class="button_show_labels" href="#" title=""><span>Labels captain</span><div class="commerce_labels_arrow labels_arrow_up"></div><div class="commerce_labels_wrap"><img src="<?php echo SITE_URL; ?>/img/pictos_actions/label_bio.png" width="50" height="44" title="" alt="" /><img src="<?php echo SITE_URL; ?>/img/pictos_actions/label_bio.png" width="50" height="44" title="" alt="" /><p></p></div></a></div>
                
                <div class="wrapper_boutons">
                <div class="boutons not_signedin" onclick=""><a href="#"><img src="<?php echo SITE_URL; ?>/img/pictos_actions/pouce_OK.png" height="22" width="27"/></a></div>
                <div class="boutons not_signedin" onclick=""><a href="#"><img src="<?php echo SITE_URL; ?>/img/pictos_actions/pouce_NOK.png" height="22" width="27"/></a></div>
                <div class="boutons not_signedin" onclick=""><a href="#"><img src="<?php echo SITE_URL; ?>/img/pictos_actions/wishlist.png" height="23" width="30"/></a></div>
                </div>
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
