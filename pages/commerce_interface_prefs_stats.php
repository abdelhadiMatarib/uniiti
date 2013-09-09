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
	
	$sql2 = "SELECT id_enseigne, logotype_enseigne, nom_enseigne, adresse1_enseigne, cp_enseigne, ville_enseigne, pays_enseigne, telephone_enseigne, descriptif, note_moyenne, satisfaction_pourcent, certification_pro, code_visible, avis_visible, nom_type_enseigne, btn_donner_avis_visible, url
			FROM enseignes AS t1
			INNER JOIN types_enseigne AS t2
				ON t1.types_enseigne_id_type_enseigne = t2.id_type_enseigne
			WHERE id_enseigne = :id_enseigne
		";

	$req2 = $bdd->prepare($sql2);

	if (!empty($_GET['id_enseigne'])) {$id_enseigne = $_GET['id_enseigne'];}
	else {echo "vous ne pouvez pas accéder directement à cette page !\n<a href=\"" . SITE_URL . "\">Revenir à la page principale</a>"; exit;}

	$req2->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);

	$req2->execute();
	$result = $req2->fetch(PDO::FETCH_ASSOC);
           
	$nom_enseigne            = $result['nom_enseigne'];
	$logotype_enseigne       = $result['logotype_enseigne'];
	$adresse1_enseigne       = $result['adresse1_enseigne'];
	$code_postal             = $result['cp_enseigne'];
	$ville_enseigne          = $result['ville_enseigne'];
	$pays_enseigne           = $result['pays_enseigne'];
	$telephone_enseigne      = $result['telephone_enseigne'];
	$descriptif              = $result['descriptif'];
	$certification_pro       = $result['certification_pro'];
	$code_visible            = $result['code_visible'];
	$avis_visible            = $result['avis_visible'];
	$nom_type_enseigne       = $result['nom_type_enseigne'];
	$btn_donner_avis_visible = $result['btn_donner_avis_visible'];
	$url                     = $result['url'];

	$sql = "SELECT COUNT(id_avis) AS count_avis, AVG(note) AS moyenne
			FROM avis AS t1

			INNER JOIN enseignes_recoient_avis AS t2
			ON t1.id_avis = t2.avis_id_avis
			INNER JOIN enseignes AS t3
				ON t2.enseignes_id_enseigne = t3.id_enseigne
				INNER JOIN contributeurs_donnent_avis AS t4
					ON t1.id_avis = t4.avis_id_avis
					INNER JOIN contributeurs AS t5
						ON t4.contributeurs_id_contributeur = t5.id_contributeur
			WHERE id_enseigne = :id_enseigne
			";
	$req = $bdd->prepare($sql);
	$req->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
	$req->execute();
	$result = $req->fetch(PDO::FETCH_ASSOC);
	$count_avis_enseigne     = $result['count_avis'];
	$note_arrondi = number_format($result['moyenne'],1);
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
        <?php include'../includes/header.php'; ?>
        <div class="biggymarginer">
        <div class="big_wrapper" id="test">
            <div class="liseret_orange"></div>
            <div class="commerce_head">
                <div class="commerce_head_desc">
                    <div class="commerce_head_desc_title"><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/restauration_b.png" title="" alt="" /></div><h2><?php echo $nom_enseigne; ?></h2></div>
                    <div class="utilisateur_interface_engrenage">
                        <div class="utilisateur_interface_engrenage_img_container"><a href="#" title="" onclick="OuvrePopin({}, '/includes/popins/utilisateur_demande_modifs.tpl.php', 'default_dialog');"><img src="../img/pictos_utilisateurs/utilisateur_interface_engrenage_icon.png" height="20" width="20" title="" alt=""/></a></div>
                    </div>
                    <div class="commerce_head_desc_social"><img src="<?php echo SITE_URL; ?>/img/pictos_actions/fb_logo.png" title="" alt="" height="24" width="24" /><img src="<?php echo SITE_URL; ?>/img/pictos_actions/tw_logo.png" title="" alt="" height="24" width="24" /><img src="<?php echo SITE_URL; ?>/img/pictos_actions/g_logo.png" title="" alt="" height="24" width="24" /><span>Partager</span></div>
                    <div class="clearfix"></div>
                    <div class="separateur"></div>
                    <div class="clearfix"></div>
                    <div class="commerce_head_desc_address"><div class="img_container" id="commerce_head_desc_address_button"><a href="#" title=""><img src="<?php echo SITE_URL; ?>/img/marker_map.png" title="" alt="" height="23" width="15"/></a></div><div id="commerce_head_desc_address_wrap"><address><?php echo $adresse1_enseigne; ?></address><span><?php echo $code_postal; ?> <?php echo $ville_enseigne; ?></span></div></div>
                    <div class="commerce_head_desc_ariane"><div class="img_container" id="commerce_head_desc_ariane_button"><a href="#" title=""><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/etiquette.png" title="" alt="" height="20" width="23" /></a></div><div id="commerce_head_desc_ariane_wrap"><span>Commerce > Restauration</span><span class="commerce_head_desc_ariane_lastcat">Cuisine Asiatique - Chinoise</span></div></div>
                    <div class="clearfix"></div>
                    <div class="separateur"></div>
                    <div class="clearfix"></div>
                    <div class="commerce_head_desc_identity"><div class="img_container" id="commerce_head_desc_identity_button"><a href="#"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/identity.png" title="" alt="" height="18" width="22" /></a></div><div id="commerce_head_desc_identity_wrap"><span><?php if ($telephone_enseigne) echo 'Tél. : ';echo chunk_split($telephone_enseigne,2,'.');?></span><a href="#" title="">www.chezlesartistes.com</a></div></div>
                    <div class="commerce_head_desc_prices"><div class="img_container" id="commerce_head_desc_prices_button"><a href="#" title=""><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/price.png" title="" alt="" height="21" width="21" /></a></div><div id="commerce_head_desc_prices_wrap"><img class="price_bag" src="<?php echo SITE_URL; ?>/img/pictos_commerces/price_bag_1.png" title="" alt="" height="25" width="19" /><img class="price_bag" src="<?php echo SITE_URL; ?>/img/pictos_commerces/price_bag_1.png" title="" alt="" height="25" width="19" /><img class="price_bag" src="<?php echo SITE_URL; ?>/img/pictos_commerces/price_bag_1.png" title="" alt="" height="25" width="19" /><img class="price_bag" src="<?php echo SITE_URL; ?>/img/pictos_commerces/price_bag_1.png" title="" alt="" height="25" width="19" /></div></div>
                </div>
                <div class="commerce_head_note">
                    <div class="commerce_head_note_stars">
						<?php for ($i = 1 ; $i <= round($note_arrondi / 2) ; $i++) { ?>
							<img src="<?php echo SITE_URL; ?>/img/pictos_commerces/star_0.png" title="" alt="" height="17" width="18" />
						<?php } /* Fin du for */ ?>
                    </div>
                    <div class="center_note">
                    <span class="commerce_head_note_note"><?php echo $note_arrondi; ?></span><span class="commerce_head_note_note10">/10</span>
                    </div>
                    <span class="commerce_head_note_avis"><?php echo $count_avis_enseigne; ?> Avis</span>
                    <div class="commerce_head_note_reservation">
                        <a href="#" title="" class="commerce_reserver_button" onclick="OuvrePopin({}, '/includes/popins/reservation_step1.tpl.php', 'default_dialog');">
                        <div class="img_container_reservation"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/sonette.png" title="" alt="" height="24" width="30" /></div>
                        <div class="commerce_head_note_reserver"><span><strong>Réserver</strong> une table</span></div>
                        </a>
                    </div>
                </div>
                <div class="commerce_head_infos">
                    <div class="commerce_head_infos_services"><a href="#" title="" onclick="OuvrePopin({}, '/includes/popins/menutarifs.tpl.php', 'default_dialog_large');"><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/menutarifs.png" alt="" title="" height="35" width="35" /></div><div class="commerce_head_infos_services_text"><span class="commerce_head_infos_services_text_fin">Menu</span><span class="commerce_head_infos_services_text_couleur">& Tarifs</span></div></a></div>
                    <div class="commerce_head_infos_infos"><a href="#" title="" onclick="OuvrePopin({}, '/includes/popins/infospratiques.tpl.php', 'default_dialog_large');"><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/horloge.png" alt="" title="" height="35" width="35" /></div><div class="commerce_head_infos_infos_text"><span class="commerce_head_infos_infos_text_fin">Infos</span><span class="commerce_head_infos_infos_text_couleur">Pratiques</span></div></a></div>
                    <div class="utilisateur_head_infos_suggestion">
                        <div class="commerce_reservation_commerce"><a href="#" onclick="OuvrePopin({}, '/includes/popins/module_reservation.tpl.php', 'default_dialog');" title=""><span class="utilisateur_suggerer_commerce_firstcat">Réservation</span></a></div>
                        <div class="clearfix"></div>
                        <div class="commerce_optin_commerce"><a href="#" title="" onclick="OuvrePopin({}, '/includes/popins/module_optin.tpl.php', 'default_dialog');"><span class="utilisateur_suggerer_objet_firstcat">Campagne opt-in</span></a></div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="separateur"></div>
                    <div class="clearfix"></div>
                    <div class="commerce_head_infos_infosrapides">
                        <div class="infosrapides1"><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/infosrapides1.png" alt="" title="" height="26" width="21" /></div><span>Généreux</span><span>Chaleureux</span><span>Convivial</span></div>
                        <div class="infosrapides2"><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/infosrapides2.png" alt="" title="" height="25" width="26" /></div><span>Terrasse</span><span>Piscine</span><span>Voiturier</span></div>
                        <div class="clearfix_infosrapides"></div>
                        <div class="infosrapides3"><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/infosrapides3.png" alt="" title="" height="30" width="30" /></div><span>Sans gluten</span><span>Bio</span><span></span></div>
                        <div class="infosrapides4"><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/infosrapides4.png" alt="" title="" height="23" width="32" /></div><span>Entre amis</span><span>En famille</span><span>Séminaire</span></div>
                    </div>
                    
                </div>
            
            </div>
            <div class="commerce_head2">
                <div class="commerce_head2_coinvideo">
                    <div class="commerce_head2_coinvideo_text"><span class="commerce_head2_text1_1">Coin</span><span class="commerce_head2_text2_1">Vidéo</span></div><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/play.png" alt="" title="" height="19" width="19" /></div>
                </div>
                <div class="commerce_head2_right">
                <div class="commerce_head2_reseau"><span class="commerce_head2_text1">Votre</span><span class="commerce_head2_text2">Réseau</span></div><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/reseau.png" alt="" title="" height="19" width="19" /></div><div class="commerce_head2_text3"><span>2</span></div>
                <div class="commerce_head2_avis"><span class="commerce_head2_text1">Nombre</span><span class="commerce_head2_text2">Avis</span></div><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/star_0.png" alt="" title="" height="19" width="19" /></div><div class="commerce_head2_text3"><span><?php echo $count_avis_enseigne; ?></span></div>
                <a href="#" title="" onclick="OuvrePopin({}, '/includes/popins/commerce_suiveurs.tpl.php', 'default_dialog');"><div class="commerce_head2_abonnes"><span class="commerce_head2_text1">Nombre</span><span class="commerce_head2_text2">Abonnés</span></div><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/abonnes.png" alt="" title="" height="19" width="19" /></div><div class="commerce_head2_text3_end"><span>1258</span></div></a>
                </div>
            </div>
            <div class="commerce_couv">
                <div class="ligne_verticale1"></div>
                <div class="ligne_verticale2"></div>
                <img src="<?php echo SITE_URL; ?>/img/photos_commerces/couv.jpg" title="" alt="" />
                
                <div class="commerce_concept"><a class="button_show_concept" href="#" title=""><span>Le concept</span><div class="commerce_concept_arrow concept_arrow_up"></div></a><p class="concept_content"><?php echo $descriptif ?></p></div>
                <div class="commerce_gerant"><div class="gerant_title"><a class="button_show_concept" href="#" title=""><p>Le gérant</p></a></div><div class="gerant_photo"><img src="<?php echo SITE_URL; ?>/img/avatars/james.jpg" title="" alt="" /></div></div>
                
                <div class="wrapper_boutons">
                <div class="boutons not_signedin" onclick="OuvrePopin({}, '/includes/popins/ident.tpl.php', 'default_dialog');"><a href="#"><img src="<?php echo SITE_URL; ?>/img/pictos_actions/pouce_OK.png" height="22" width="27"/></a></div>
                <div class="boutons not_signedin" onclick="OuvrePopin({}, '/includes/popins/ident.tpl.php', 'default_dialog');"><a href="#"><img src="<?php echo SITE_URL; ?>/img/pictos_actions/pouce_NOK.png" height="22" width="27"/></a></div>
                <div class="boutons not_signedin" onclick="OuvrePopin({}, '/includes/popins/ident.tpl.php', 'default_dialog');"><a href="#"><img src="<?php echo SITE_URL; ?>/img/pictos_actions/wishlist.png" height="23" width="30"/></a></div>
                </div>
            </div>
        
        <!-- FILTRE DE TRI -->
        <?php include'../includes/filters_commerce_interface_prefs_stats.php' ?>
        <!-- FIN FILTRE DE TRI -->
        </div>
        <!-- FIN BIG WRAPPER -->
        <!-- CONTENU PRINCIPAL -->
        <style>
            .commerce_prefs_stats_tableau{border-radius:3px;width:100%;background-color:#fabe41;height:166px;margin-bottom:14px;}
            .commerce_prefs_stats_item{text-align:center;padding:20px 10px;color:white;height:125px;background-color:#252525;position:relative;-webkit-box-shadow:0px 1px 3px 0px rgba(0, 0, 0, 0.25); box-shadow:0px 1px 3px 0px rgba(0, 0, 0, 0.25); margin:1px 7px 14px 7px;width:216px;-webkit-border-radius: 3px;border-radius: 3px;overflow: hidden;}
            .commerce_prefs_stats_item a{color:#252525;display:inline-block;width:100%;height:100%;}
            .commerce_prefs_stats_item a:hover{color:#ACACAC;}
            
            .commerce_prefs_stats_item span{display:block;}
            .commerce_prefs_stats_item_nbr{font-size:5em;font-weight:600;}
            .commerce_prefs_stats_item_titre{text-transform:uppercase;font-size:0.9em;}
            
            .item_gestion_site{font-size:2.3em;background-color:white;text-transform:uppercase;color:#252525;}
        </style>
        
        <div class="commerce_prefs_stats_tableau"></div>
        <div id="prefs_items_container">
        <div class="commerce_prefs_stats_item">
            <span class="commerce_prefs_stats_item_nbr">853</span>
            <span class="commerce_prefs_stats_item_titre">Nombre de j'aime</span>
        </div>
        <div class="commerce_prefs_stats_item">
            <span class="commerce_prefs_stats_item_nbr">853</span>
            <span class="commerce_prefs_stats_item_titre">Nombre de j'aime</span>
        </div>
        <div class="commerce_prefs_stats_item">
            <span class="commerce_prefs_stats_item_nbr">1258</span>
            <span class="commerce_prefs_stats_item_titre">Nombre d'abonnés</span>
        </div>
        <div class="commerce_prefs_stats_item item_gestion_site">
            <a href="#" title="" onclick="OuvrePopin({}, '/includes/popins/gestion_minisite.tpl.php', 'default_dialog');">
                <span><strong>Gestion</strong></span>
                <span>de votre</span>
                <span><strong>Site web</strong></span>
            </a>
        </div>
        <div class="commerce_prefs_stats_item">
            <span class="commerce_prefs_stats_item_nbr">72</span>
            <span class="commerce_prefs_stats_item_titre">Nombre d'ajout liste de souhaits</span>
        </div>
        <div class="commerce_prefs_stats_item">
            <span class="commerce_prefs_stats_item_nbr">1258</span>
            <span class="commerce_prefs_stats_item_titre">Nombre d'abonnés</span>
        </div>
        <div class="commerce_prefs_stats_item">
            <span class="commerce_prefs_stats_item_nbr">853</span>
            <span class="commerce_prefs_stats_item_titre">Nombre de j'aime</span>
        </div>
        <div class="commerce_prefs_stats_item item_gestion_site">
            <a href="#" title="" onclick="OuvrePopin({}, '/includes/popins/gestion_minisite.tpl.php', 'default_dialog');">
                <span><strong>Gestion</strong></span>
                <span>de votre</span>
                <span><strong>Site web</strong></span>
            </a>
        </div>
        </div>
        <!-- FIN CONTENU PRINCIPAL -->
        </div><!-- FIN BIGGY -->
        <!-- FOOTER -->
			<?php include '../includes/footer.php' ?>
        <!-- FIN FOOTER -->
        <?php include'../includes/js.php' ?>
        <script>
            $(window).load(function() {
            var $container = $('#prefs_items_container'), $body = $('body'), colW = 250, columns = null;
        $container.isotope({
					// disable window resizing
					resizable: false,
					masonry: {
						itemSelector : '.commerce_prefs_stats_item',
						columnWidth: colW,
						resizable: false
					}
				});
            });
        </script>
    </body>
</html>