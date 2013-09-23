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
        
        $PAGE = "Commerce"; 

	$sql2 = "SELECT id_enseigne, t2.id_categorie, t2.id_sous_categorie, t2.id_sous_categorie2, categorie_principale, sous_categorie, sous_categorie2, couleur,
					logotype_enseigne, slide1_enseigne, slide2_enseigne, slide3_enseigne, slide4_enseigne, slide5_enseigne, nom_enseigne, adresse1_enseigne, cp_enseigne, ville_enseigne, pays_enseigne, telephone_enseigne, descriptif, url, id_budget
			FROM enseignes AS t1
				INNER JOIN sous_categories2 AS t2
				ON t2.id_sous_categorie2 = t1.sscategorie_enseigne
					INNER JOIN sous_categories AS t3
					ON t2.id_sous_categorie = t3.id_sous_categorie
						INNER JOIN categories AS t4
						ON t2.id_categorie = t4.id_categorie
			WHERE id_enseigne = :id_enseigne
		";

	$req2 = $bdd->prepare($sql2);

	if (!empty($_GET['id_enseigne'])) {$id_enseigne = $_GET['id_enseigne'];}
	else {echo "vous ne pouvez pas accéder directement à cette page !\n<a href=\"" . SITE_URL . "\">Revenir à la page principale</a>"; exit;}

	if(isset($_SESSION['SESS_MEMBER_ID'])) {
		$dataLDW = "{id_contributeur :" . $_SESSION['SESS_MEMBER_ID'] . "," . "id_enseigne :" . $id_enseigne . "}";
		$like_step1 = "OuvrePopin(" . $dataLDW . ", '/includes/popins/like_step1.tpl.php', 'default_dialog');";
		$dislike_step1 = "OuvrePopin(" . $dataLDW . ", '/includes/popins/dislike_step1.tpl.php', 'default_dialog');";
		$wishlist_step1 = "OuvrePopin(" . $dataLDW . ", '/includes/popins/wishlist_step1.tpl.php', 'default_dialog');";
	} else {
		$like_step1 = $dislike_step1 = $wishlist_step1 = "OuvrePopin({}, '/includes/popins/ident.tpl.php', 'default_dialog');";
	}		
	
	$req2->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);

	$req2->execute();
	$result2 = $req2->fetch(PDO::FETCH_ASSOC);
           
	$nom_enseigne            = $result2['nom_enseigne'];
	$logotype_enseigne       = $result2['logotype_enseigne'];
	$slide1_enseigne    	 = $result2['slide1_enseigne'];
	$slide2_enseigne    	 = $result2['slide2_enseigne'];
	$slide3_enseigne    	 = $result2['slide3_enseigne'];
	$slide4_enseigne    	 = $result2['slide4_enseigne'];
	$slide5_enseigne    	 = $result2['slide5_enseigne'];
	$adresse1_enseigne       = $result2['adresse1_enseigne'];
	$code_postal             = $result2['cp_enseigne'];
	$ville_enseigne          = $result2['ville_enseigne'];
	$pays_enseigne           = $result2['pays_enseigne'];
	$telephone_enseigne      = $result2['telephone_enseigne'];
	$descriptif              = $result2['descriptif'];
	$categorie				 = $result2['categorie_principale'];
	$sous_categorie          = $result2['sous_categorie'];
	$sous_categorie2         = $result2['sous_categorie2'];
    $couleur                 = $result2['couleur'];
	$url                     = $result2['url'];
	$id_budget               = $result2['id_budget'];

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
        <div class="bg_dashboard">
        <?php include'../includes/header.php'; ?>
        <div class="biggymarginer">
            <div class="big_wrapper" id="test">

            </div>
        <!-- FIN BIG WRAPPER -->
        <!-- CONTENU PRINCIPAL -->

        <div class="dashboard_wrap"><!-- DASH WRAP -->
            <div class="dashboard_cube_ariane">
                <div class="dashboard_cube_item dashboard_cube_item_haut item dashboard_cube_item_f"><a href="#" title=""><span>Ajouter</span><span class="dashboard_txt_bold">un commerce</span></a></div>
            </div>
            <div class="dashboard_ombre_small"><img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/ombre_cube_small.png"/></div>
            <div class="dashboard_retour_wrapper"><a href="javascript:history.back()">Retour</a>|<a href="dashboard_index.php">ACCUEIL</a></div>
            <div class="dashboard_content dashboard_content_nomargintop">
                <h2>Ajouter un nouveau commerce</h2>
            </div>
                <div class="big_wrapper" id="test">
            <div class="liseret_bleu"></div>
            <div class="commerce_head">
                <div class="commerce_head_desc">
                    <a href="#" class="commerce_head_desc_modif" onclick="OuvrePopin({}, '/includes/popins/dashboard_infos_generales_commerce.tpl.php', 'default_dialog');"></a>
                    <div class="commerce_head_desc_title"><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/restauration_b.png" title="" alt="" /></div><h2 class="nom_entreprise_modifiable">Nom entreprise<?php /*echo $nom_enseigne*/?></h2></div>
                    <div class="clearfix"></div>
                    <div class="separateur"></div>
                    <div class="clearfix"></div>
                    <div class="commerce_head_desc_address"><div class="img_container" id="commerce_head_desc_address_button"><a href="#" title=""><img src="<?php echo SITE_URL; ?>/img/marker_map.png" title="" alt="" height="23" width="15"/></a></div><div id="commerce_head_desc_address_wrap"><address>Adresse<?php /*echo /*$adresse1_enseigne; */?></address><span>CODE POSTAL VILLE<?php /*echo /*$code_postal; */?> <?php /*echo /*$ville_enseigne; */?></span></div></div>
                    <div class="commerce_head_desc_ariane"><div class="img_container" id="commerce_head_desc_ariane_button"><a href="#" title=""><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/etiquette.png" title="" alt="" height="20" width="23" /></a></div><div id="commerce_head_desc_ariane_wrap"><span>Catégorie > Sous-catégorie </span><span class="commerce_head_desc_ariane_lastcat">> Sous-sous catégorie</span></div></div>
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
                    <div class="commerce_head_infos_services"><a href="#" title="" onclick="OuvrePopin({}, '/includes/popins/dashboard_menutarifs.tpl.php', 'default_dialog_large');"><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/menutarifs.png" alt="" title="" height="35" width="35" /></div><div class="commerce_head_infos_services_text"><span class="commerce_head_infos_services_text_fin">Menu</span><span class="commerce_head_infos_services_text_couleur">& Tarifs</span></div></a></div>
                    <div class="commerce_head_infos_infos"><a href="#" title="" onclick="OuvrePopin({}, '/includes/popins/dashboard_infospratiques.tpl.php', 'default_dialog_large');"><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/horloge.png" alt="" title="" height="35" width="35" /></div><div class="commerce_head_infos_infos_text"><span class="commerce_head_infos_infos_text_fin">Infos</span><span class="commerce_head_infos_infos_text_couleur">Pratiques</span></div></a></div>
                    <div class="commerce_head_infos_suivre"><a href="#" title="" onclick="<?php /*echo $follow_step1; */?>"><span>Suivre</span><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/suivre.png" alt="" height="43" width="37" /></div></a></div>
                    <div class="clearfix"></div>
                    <div class="separateur"></div>
                    <div class="clearfix"></div>
                    <div class="commerce_head_infos_infosrapides">
                        <a href="#" class="commerce_head_infos_modif_clefs" "title="" onclick="OuvrePopin({}, '/includes/popins/dashboard_mots_clefs.tpl.php', 'default_dialog');"></a>
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
                    <div class="commerce_head2_coinvideo_text"><a href="#" onclick="OuvrePopin({step:1}, '/includes/popins/dashboard_video.tpl.php', 'default_dialog');"><span class="commerce_head2_text1_1">Coin</span><span class="commerce_head2_text2_1">Vidéo</span></a></div><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/play.png" alt="" title="" height="19" width="19" /></div>
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
                    <div class="dashboard_couverture_gestion_couverture"><a href="#" title="" onclick="OuvrePopin({step:1}, '/includes/popins/couverture_step1.tpl.php', 'default_dialog_large');">Gestion des couvertures</a></div>
                    <div class="dashboard_couverture_gestion_popin"><a href="#" title="" onclick="OuvrePopin({step:1}, '/includes/popins/vignette_step1.tpl.php', 'default_dialog_large');">Gestion de la popin</a></div>
                    <div class="dashboard_couverture_gestion_box"><a href="#" title="" onclick="OuvrePopin({step:1}, '/includes/popins/box_step1.tpl.php', 'default_dialog_large');">Gestion de la box</a></div>
                </div>
                <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/couv_dash.jpg" title="" alt="" />
                
                <div class="commerce_concept"><a class="button_show_concept" href="#" title=""><span>Le concept</span><div class="commerce_concept_arrow concept_arrow_up"></div></a><p class="concept_content"><?php /*echo $descriptif */?></p></div>
                <div class="commerce_gerant"><div class="gerant_title"><a class="button_show_concept" href="#" title=""><p>Le gérant</p></a></div><div class="gerant_photo"><img src="<?php echo SITE_URL; ?>/img/avatars/james.jpg" title="" alt="" /></div></div>
                
                <div class="commerce_recos"><a class="button_show_recos" href="#" title="" onclick="OuvrePopin({},'/includes/popins/dashboard_petitmot_commerce.tpl.php', 'default_dialog');"><span>Recommandations</span><div class="commerce_recos_arrow recos_arrow_up"></div><div class="commerce_recos_wrap"><img src="<?php echo SITE_URL; ?>/img/pictos_actions/reco_book.png" width="50" height="44" title="" alt="" /><img src="<?php echo SITE_URL; ?>/img/pictos_actions/reco_book.png" width="50" height="44" title="" alt="" /><p></p></div></a></div>
                <div class="commerce_labels"><a class="button_show_labels" href="#" title="" onclick="OuvrePopin({},'/includes/popins/dashboard_petitmot_commerce.tpl.php', 'default_dialog');"><span>Labels captain</span><div class="commerce_labels_arrow labels_arrow_up"></div><div class="commerce_labels_wrap"><img src="<?php echo SITE_URL; ?>/img/pictos_actions/label_bio.png" width="50" height="44" title="" alt="" /><img src="<?php echo SITE_URL; ?>/img/pictos_actions/label_bio.png" width="50" height="44" title="" alt="" /><p></p></div></a></div>
                
                <!--<div class="wrapper_boutons">
                    <div class="boutons not_signedin" class="boutons_action_popin" <?php echo AfficheAction('aime',$categorie); ?>></div>
                    <div class="boutons not_signedin" class="boutons_action_popin" <?php echo AfficheAction('aime_pas',$categorie); ?>></div>
                    <div class="boutons not_signedin" class="boutons_action_popin" <?php echo AfficheAction('wish',$categorie); ?>></div>
                </div>-->
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
            $(function () {
    $('.commerce_head_desc_title').delegate('.nom_entreprise_modifiable','click',function () {
        var input = $('<input />', {'type': 'text','class': 'nom_entreprise_modifiable_input','name': 'aname', 'value': $(this).html()});
        var button = $('<input />', {'type': 'button','class':'valider_nouveau_nom_commerce','name':'', 'value':''});
        $(this).parent().append(input).append(button);
        $(this).remove();
        input.focus();
    });
    $('.commerce_head_desc_title').delegate('.valider_nouveau_nom_commerce','click',function(){
       console.log('coucou');
       $(this).parent().append($('<h2 class="nom_entreprise_modifiable"></h2>').html($('.nom_entreprise_modifiable_input').val()));
       $(this).remove(); 
       $('.nom_entreprise_modifiable_input').remove();
    });
    })

        function moveToNext(field,nextFieldID){
  if(field.value.length >= field.maxLength){
    document.getElementById(nextFieldID).focus();
  }
}
</script>

    </body>
</html>
