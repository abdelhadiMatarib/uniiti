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
		$dataLDW = "{id_contributeur :" . $_SESSION['SESS_MEMBER_ID'] . "," . "id_enseigne :" . $id_enseigne . ", categorie : '" . addslashes($categorie) . "'}";
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
	
	$sql3 = "SELECT COUNT(contributeurs_id_contributeur) AS count_abonnes
			FROM contributeurs_follow_enseignes AS t1
			WHERE enseignes_id_enseigne = :id_enseigne
			";
	$req3 = $bdd->prepare($sql3);
	$req3->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
	$req3->execute();
	$result3 = $req3->fetch(PDO::FETCH_ASSOC);
	$count_abonnes = $result3['count_abonnes'];

?>
    <body>
        <div id="default_dialog"></div>
        <div id="default_dialog_large"></div>
        <div id="default_dialog_inscription"></div>
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
            <div class="liseret" style="background-color:<?php echo $couleur; ?>;"></div>
            <div class="commerce_head">
                <div class="commerce_head_desc">
                    <div class="commerce_head_desc_title"><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/restauration_b.png" title="" alt="" /></div><h2><?php echo $nom_enseigne; ?></h2></div>
                    <div class="commerce_head_desc_social">
                        <style>
                            .overlay_social_buttons{display:none;position:relative;}
                            .overlay_social_buttons_specific{border-radius:3px;display:block !important;background-color:rgba(37,37,37,0.8);position:absolute;top:9px;right:60px;padding-left:5px;}
                        </style>
                        <div class="overlay_social_buttons">
                        <img src="<?php echo SITE_URL; ?>/img/pictos_actions/fb_logo.png" title="" alt="" height="24" width="24" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_actions/tw_logo.png" title="" alt="" height="24" width="24" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_actions/g_logo.png" title="" alt="" height="24" width="24" />
                        </div>
                        <span>Partager</span>
                    </div>
                    <div class="clearfix"></div>
                    <div class="separateur"></div>
                    <div class="clearfix"></div>
                    <div class="commerce_head_desc_address"><div class="img_container" id="commerce_head_desc_address_button"><a href="#" title=""><img src="<?php echo SITE_URL; ?>/img/marker_map.png" title="" alt="" height="23" width="15"/></a></div><div id="commerce_head_desc_address_wrap"><address><?php echo $adresse1_enseigne; ?></address><span><?php echo $code_postal; ?> <?php echo $ville_enseigne; ?></span></div></div>
                    <div class="commerce_head_desc_ariane"><div class="img_container" id="commerce_head_desc_ariane_button"><a href="#" title=""><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/etiquette.png" title="" alt="" height="20" width="23" /></a></div><div id="commerce_head_desc_ariane_wrap"><span>Commerce > <?php echo $categorie; ?> > <?php echo $sous_categorie; ?></span><span class="commerce_head_desc_ariane_lastcat"> > <?php echo $sous_categorie2; ?></span></div></div>
                    <div class="clearfix"></div>
                    <div class="separateur"></div>
                    <div class="clearfix"></div>
                    <div class="commerce_head_desc_identity"><div class="img_container" id="commerce_head_desc_identity_button"><a href="#"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/identity.png" title="" alt="" height="18" width="22" /></a></div><div id="commerce_head_desc_identity_wrap"><span><?php if ($telephone_enseigne) echo 'Tél. : ';echo chunk_split($telephone_enseigne,2,'.');?></span><a href="#" title="">www.chezlesartistes.com</a></div></div>
                    <div class="commerce_head_desc_prices">
						<div class="img_container" id="commerce_head_desc_prices_button"><a href="#" title=""><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/price.png" title="" alt="" height="21" width="21" /></a></div>
						<div id="commerce_head_desc_prices_wrap">
							<?php for ($i = 1 ; $i <= $id_budget ; $i++) { ?>
								<img class="price_bag" src="<?php echo SITE_URL; ?>/img/pictos_commerces/price_bag_1.png" title="" alt="" height="25" width="19" />
							<?php } ?>
						</div>
					</div>
                </div>
                <div class="commerce_head_note">
                    <div class="commerce_head_note_stars">
							<?php echo AfficheEtoiles($note_arrondi, $categorie); ?>
                    </div>
                    <div class="center_note">
                    <span class="commerce_head_note_note"><?php echo $note_arrondi; ?></span><span class="commerce_head_note_note10">/10</span>
                    </div>
                    <span class="commerce_head_note_avis"><?php echo $count_avis_enseigne; ?> Avis</span>
                    <div class="commerce_head_note_reservation"style="background-color:<?php echo $couleur; ?>;">
                        <a href="#" title="" class="commerce_reserver_button" onclick="OuvrePopin({}, '/includes/popins/reservation_step1.tpl.php', 'default_dialog');">
                            <div class="img_container_reservation"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/sonette.png" title="" alt="" height="24" width="30" /></div>
                            <div class="commerce_head_note_reserver"><span><strong>Réserver</strong> une table</span></div>
                        </a>
                    </div>
                </div>
                <div class="commerce_head_infos">
                    <div class="commerce_head_infos_services"><a href="#" title="" onclick="OuvrePopin({}, '/includes/popins/menutarifs.tpl.php', 'default_dialog_large');"><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/menutarifs.png" alt="" title="" height="35" width="35" /></div><div class="commerce_head_infos_services_text"><span class="commerce_head_infos_services_text_fin">Prestations</span><span class="commerce_head_infos_services_text_couleur" style="color:<?php echo $couleur; ?>;">& Tarifs</span></div></a></div>
                    <div class="commerce_head_infos_infos"><a href="#" title="" onclick="OuvrePopin({}, '/includes/popins/infospratiques.tpl.php', 'default_dialog_large');"><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/horloge.png" alt="" title="" height="35" width="35" /></div><div class="commerce_head_infos_infos_text"><span class="commerce_head_infos_infos_text_fin">Infos</span><span class="commerce_head_infos_infos_text_couleur" style="color:<?php echo $couleur; ?>;">Pratiques</span></div></a></div>
                    <div class="commerce_head_infos_suivre" id="Suivre"><a href="#" title=""><span id="TexteSuivre">Suivre</span><div class="img_container"><img id="ImageSuivre" src="<?php echo SITE_URL; ?>/img/pictos_commerces/suivre.png" alt="" height="43" width="37" /></div></a></div>
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
                    <div class="commerce_head2_coinvideo_text"><span class="commerce_head2_text1_1">Coin</span><span class="commerce_head2_text2_1" style="color:<?php echo $couleur; ?>;">Vidéo</span></div><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/play.png" alt="" title="" height="19" width="19" /></div>
                </div>
                <div class="commerce_head2_right">
                <div class="commerce_head2_reseau"><span class="commerce_head2_text1">Son</span><span class="commerce_head2_text2" style="color:<?php echo $couleur; ?>;">Réseau</span></div><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/reseau.png" alt="" title="" height="19" width="19" /></div><div class="commerce_head2_text3"><span>2</span></div>
                <div class="commerce_head2_avis"><span class="commerce_head2_text1">Nombre</span><span class="commerce_head2_text2" style="color:<?php echo $couleur; ?>;">Avis</span></div><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/star_0.png" alt="" title="" height="19" width="19" /></div><div class="commerce_head2_text3"><span><?php echo $count_avis_enseigne; ?></span></div>
                <div class="commerce_head2_abonnes"><span class="commerce_head2_text1">Nombre</span><span class="commerce_head2_text2" style="color:<?php echo $couleur; ?>;">Abonnés</span></div><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/abonnes.png" alt="" title="" height="19" width="19" /></div><div class="commerce_head2_text3_end"><span><?php echo $count_abonnes; ?></span></div>
                </div>
            </div>
            <div class="commerce_couv">
                <div class="ligne_verticale1"></div>
                <div class="ligne_verticale2"></div>
                <img src="<?php echo SITE_URL . "/photos/utilisateurs/couvertures/" . $slide1_enseigne;?>" title="" alt="" />
                
                <div class="commerce_concept"><a class="button_show_concept" href="#" title=""><span>Le concept</span><div class="commerce_concept_arrow concept_arrow_up"></div></a><p class="concept_content"><?php echo $descriptif ?></p></div>
                <div class="commerce_gerant"><div class="gerant_title" style="background-color:<?php echo $couleur; ?>;"><a class="button_show_concept" href="#" title=""><p>Le gérant</p></a></div><div class="gerant_photo"><img src="<?php echo SITE_URL; ?>/img/avatars/james.jpg" title="" alt="" /></div></div>
                
                <div class="commerce_recos"><a class="button_show_recos" href="#" title=""><span>Recommandations</span><div class="commerce_recos_arrow recos_arrow_up"></div><div class="commerce_recos_wrap"><img src="<?php echo SITE_URL; ?>/img/pictos_actions/reco_book.png" width="50" height="44" title="" alt="" /><img class="marginleftlabels" src="<?php echo SITE_URL; ?>/img/pictos_actions/reco_book.png" width="50" height="44" title="" alt="" /></div></a></div>
                <div class="commerce_labels"><a class="button_show_labels" href="#" title=""><span>Labels captain</span><div class="commerce_labels_arrow labels_arrow_up"></div><div class="commerce_labels_wrap"><img src="<?php echo SITE_URL; ?>/img/pictos_actions/label_bio.png" width="50" height="44" title="" alt="" /><img class="marginleftlabels" src="<?php echo SITE_URL; ?>/img/pictos_actions/label_bio.png" width="50" height="44" title="" alt="" /></div></a></div>
                
                <div class="wrapper_boutons">
                <div class="boutons not_signedin" onclick="<?php echo $like_step1; ?>" class="boutons_action_popin" <?php echo AfficheAction('aime',$categorie); ?>></div>
                <div class="boutons not_signedin" onclick="<?php echo $dislike_step1; ?>" class="boutons_action_popin" <?php echo AfficheAction('aime_pas',$categorie); ?>></div>
                <div class="boutons not_signedin" onclick="<?php echo $wishlist_step1; ?>" class="boutons_action_popin" <?php echo AfficheAction('wish',$categorie); ?>></div>
                </div>
            </div>
        
        <!-- FILTRE DE TRI -->
        <?php include'../includes/filters.php' ?>
        <!-- FIN FILTRE DE TRI -->
        </div>
        <!-- FIN BIG WRAPPER -->
        <!-- CONTENU PRINCIPAL -->
        <div id="box_container" class="content utilisateur_boxes">
			<?php include '../includes/requetecommerce.php' ?>
		</div>
        
        </div>
        <!-- FIN CONTENU PRINCIPAL -->
        </div><!-- FIN BIGGY -->
        <!-- FOOTER -->
			<?php include '../includes/footer.php' ?>
        <!-- FIN FOOTER -->
        <?php include'../includes/js.php' ?>
		
	<script>
            
            
	function AfficheFollow(data) {

		$.ajax({
			type: "POST",
			url: siteurl+"/includes/requetefollowenseigne.php",
			data: data,
			dataType: "json",
			beforeSend: function(x) {
				if(x && x.overrideMimeType) {
				x.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(result) {
				if (result.existe == 1) {
					$('#TexteSuivre').html('Suivi');
					$('#ImageSuivre').attr('src', siteurl+'/img/pictos_utilisateurs/picto_user_suivi.png');
				} else {
					$('#TexteSuivre').html('Suivre');
					$('#ImageSuivre').attr('src', siteurl+'/img/pictos_commerces/suivre.png');				
				}
			},
			error: function() {alert('Erreur sur url : ' + url);}
		});
	}
	var $idcontributeurACTIF = <?php if (isset($_SESSION['SESS_MEMBER_ID'])) {echo $_SESSION['SESS_MEMBER_ID'];} else {echo 0;} ?>;
	var $idenseigne = <?php echo $id_enseigne; ?>;
	var data = {check : 1, id_contributeurACTIF : $idcontributeurACTIF, id_enseigne : $idenseigne};
	AfficheFollow(data);

	$('#Suivre').click(function() {
		if ($idcontributeurACTIF == 0) {OuvrePopin({}, '/includes/popins/ident.tpl.php', 'default_dialog');}
		else {
				data = {check : 0, id_contributeurACTIF : $idcontributeurACTIF, id_enseigne : $idenseigne};
				AfficheFollow(data);
			}
	});

	function AfficheFollowContributeur(data) {

		$.ajax({
			type: "POST",
			url: siteurl+"/includes/requetefollowcontributeur.php",
			data: data,
			dataType: "json",
			beforeSend: function(x) {
				if(x && x.overrideMimeType) {
				x.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(result) {
				if (result.existe == 1) {
					$('#SuivreContributeur'+data.id_contributeur).attr('src', siteurl+'/img/pictos_utilisateurs/picto_user_suivi.png');
				} else {
					$('#SuivreContributeur'+data.id_contributeur).attr('src', siteurl+'/img/pictos_utilisateurs/suivre.png');				
				}
			},
			error: function() {alert('Erreur sur url : ' + url);}
		});
	}
	
	function InitFollowContributeur() {
		$('#box_container').find('.box_suivre_user').each(function() {
			var contributeur = $(this).find("img").attr("id").replace(/SuivreContributeur/gi, "");
			dataFollow = {check : 1, 
						  id_contributeurACTIF : $idcontributeurACTIF,
						  id_contributeur : contributeur};
			AfficheFollowContributeur(dataFollow);		
		});
	}
	InitFollowContributeur();
	
	</script>		
		
    </body>
</html>
