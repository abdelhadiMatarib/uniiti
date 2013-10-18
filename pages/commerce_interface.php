<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<?php 
	include_once '../acces/auth.inc.php';                 // Gestion accès à la page - incluant la session
	require_once('../acces/droits.inc.php'); 					// Liste de définition des ACL	
	include_once '../config/configuration.inc.php';
	include'../includes/head.php';
	include_once '../includes/fonctions.inc.php';
	include_once '../config/configPDO.inc.php';

	if (isset($_GET['id_enseigne'])) {$id_enseigne = $_GET['id_enseigne'];}
	else {echo "vous ne pouvez pas accéder directement à cette page !\n<a href=\"" . SITE_URL . "\">Revenir à la page principale</a>"; exit;}
	
	if ((isset($_SESSION['SESS_MEMBER_ID'])) && (((int)$_SESSION['droits'] & ADMINISTRATEUR) OR ((int)$_SESSION['droits'] & PROFESSIONNEL))) {$Connecte = true;}
	else {echo "vous ne pouvez pas accéder à cette page sans être connecté!\n<a href=\"" . SITE_URL . "\">Revenir à la page principale</a>"; exit;}
	/////////////////////////////////// IL FAUT AJOUTER UN TEST SUR LES ENSEIGNES QUE L'UTILISATEUR A LE DROIT D'ATTEINDRE
	if (($Connecte) && ((int)$_SESSION['droits'] & ADMINISTRATEUR)) {$Admin = true;}
	else {$Admin = false;}
	
	$PAGE = "Commerce"; 

	$sql2 = "SELECT id_enseigne, t2.id_categorie, t2.id_sous_categorie, t2.id_sous_categorie2, categorie_principale, sous_categorie, sous_categorie2, couleur,
					box_enseigne, slide1_enseigne, slide2_enseigne, slide3_enseigne, slide4_enseigne, slide5_enseigne, nom_enseigne, x1, y1, y2, y3, y4, y5,
					reservation, prevenir_reservation, email_reservation, telephone_reservation, optin, adresse1_enseigne, cp_enseigne, nom_ville, villes_id_ville, id_quartier, telephone_enseigne, video_enseigne, descriptif, url, id_budget
			FROM enseignes AS t1
				INNER JOIN sous_categories2 AS t2
				ON t2.id_sous_categorie2 = t1.sscategorie_enseigne
					INNER JOIN sous_categories AS t3
					ON t2.id_sous_categorie = t3.id_sous_categorie
						INNER JOIN categories AS t4
						ON t2.id_categorie = t4.id_categorie
							INNER JOIN villes  AS t5
							ON t1.villes_id_ville = t5.id_ville
			WHERE id_enseigne = :id_enseigne
		";

	$req2 = $bdd->prepare($sql2);

	$req2->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);

	$req2->execute();
	$result2 = $req2->fetch(PDO::FETCH_ASSOC);
           
	$nom_enseigne            = $result2['nom_enseigne'];
	$box_enseigne       	 = $result2['box_enseigne'];
	$slide1_enseigne    	 = $result2['slide1_enseigne'];
	$slide2_enseigne    	 = $result2['slide2_enseigne'];
	$slide3_enseigne    	 = $result2['slide3_enseigne'];
	$slide4_enseigne    	 = $result2['slide4_enseigne'];
	$slide5_enseigne    	 = $result2['slide5_enseigne'];
	$x1_enseigne    		 = $result2['x1'];
	$y1_enseigne    		 = $result2['y1'];
	$y2_enseigne    		 = $result2['y2'];
	$y3_enseigne		 	 = $result2['y3'];
	$y4_enseigne    		 = $result2['y4'];
	$y5_enseigne    		 = $result2['y5'];
	$reservation 			 = $result2['reservation'];
	$prevenir_reservation 	 = $result2['prevenir_reservation'];
	$email_reservation 		 = $result2['email_reservation'];
	$telephone_reservation 	 = $result2['telephone_reservation'];
	$optin	  				 = $result2['optin'];
	$adresse1_enseigne       = $result2['adresse1_enseigne'];
	$code_postal             = $result2['cp_enseigne'];
	$telephone_enseigne      = $result2['telephone_enseigne'];
	$descriptif				 = str_replace(PHP_EOL ,"", stripslashes($result2['descriptif']));
	$descriptif			 	 = str_replace("\r" , "", $descriptif);
	$descriptif			 	 = str_replace("\n" , "", $descriptif);	
	$categorie				 = $result2['categorie_principale'];
	$sous_categorie          = $result2['sous_categorie'];
	$sous_categorie2         = $result2['sous_categorie2'];
	$id_categorie      		 = $result2['id_categorie'];
	$id_sous_categorie       = $result2['id_sous_categorie'];
	$id_sous_categorie2      = $result2['id_sous_categorie2'];
    $couleur                 = $result2['couleur'];
	$url                     = $result2['url'];
	$url_video               = $result2['video_enseigne'];
	$id_budget               = $result2['id_budget'];

	// Recherche de la ville, de l'arrondissement et du quartier si les deux derniers existent
	$id_ville          		 = $result2['villes_id_ville'];
	$id_quartier          	 = $result2['id_quartier'];
	if ($id_quartier != 0) {
		$sql4 = "SELECT id_arrondissement, t1.id_ville, nom_ville FROM quartier AS t1 
				INNER JOIN villes AS t2 ON t1.id_ville=t2.id_ville WHERE id_quartier=:id_quartier";
		$req4 = $bdd->prepare($sql4);
		$req4->bindParam(':id_quartier', $id_quartier, PDO::PARAM_INT);
		$req4->execute();
		$result4 = $req4->fetch(PDO::FETCH_ASSOC);		
		$ville_enseigne          = $result4['nom_ville'];
		$id_arrondissement       = $result4['id_arrondissement'];	
	}
	else {
		$sql4 = "SELECT nom_ville FROM villes WHERE id_ville=:id_ville";
		$req4 = $bdd->prepare($sql4);
		$req4->bindParam(':id_ville', $id_ville, PDO::PARAM_INT);
		$req4->execute();
		$result4 = $req4->fetch(PDO::FETCH_ASSOC);		
		$ville_enseigne          = $result4['nom_ville'];
		$id_arrondissement       = 0;	
	}

	// On compte les avis reçus par l'enseigne et on calcule sa note moyenne
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

	// On compte le nombre de followers de l'enseigne	
	$sql3 = "SELECT COUNT(contributeurs_id_contributeur) AS count_abonnes
			FROM contributeurs_follow_enseignes AS t1
			WHERE enseignes_id_enseigne = :id_enseigne
			";
	$req3 = $bdd->prepare($sql3);
	$req3->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
	$req3->execute();
	$result3 = $req3->fetch(PDO::FETCH_ASSOC);
	$count_abonnes = $result3['count_abonnes'];
	
	// On compte le nombre de commerce en réseau avec l'enseigne	
	$sql9 = "SELECT COUNT(enseignes_id_enseigne1) AS count_reseau
			FROM enseignes_reseau_enseignes AS t1
			WHERE (enseignes_id_enseigne1 = :id_enseigne OR enseignes_id_enseigne2 = :id_enseigne) AND id_statut = 2
			";
	$req9 = $bdd->prepare($sql9);
	$req9->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
	$req9->execute();
	$result9 = $req9->fetch(PDO::FETCH_ASSOC);
	$count_reseau = $result9['count_reseau'];

	$sql10 = "SELECT COUNT(enseignes_id_enseigne1) AS count_reseau_attente
				FROM enseignes_reseau_enseignes AS t1
					WHERE enseignes_id_enseigne2 = :id_enseigne AND id_statut = 1";
	$req10 = $bdd->prepare($sql10);
	$req10->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
	$req10->execute();
	$result10 = $req10->fetch(PDO::FETCH_ASSOC);
	$count_reseau_attente = $result10['count_reseau_attente'];

	$sql11 = "SELECT COUNT(contributeurs_id_contributeur) AS count_aime
				FROM contributeurs_aiment_enseignes AS t1
					WHERE enseignes_id_enseigne = :id_enseigne";
	$req11 = $bdd->prepare($sql11);
	$req11->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
	$req11->execute();
	$result11 = $req11->fetch(PDO::FETCH_ASSOC);
	$count_aime = $result11['count_aime'];

	$sql12 = "SELECT COUNT(contributeurs_id_contributeur) AS count_aime_pas
				FROM contributeurs_aiment_pas_enseignes AS t1
					WHERE enseignes_id_enseigne = :id_enseigne";
	$req12 = $bdd->prepare($sql12);
	$req12->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
	$req12->execute();
	$result12 = $req12->fetch(PDO::FETCH_ASSOC);
	$count_aime_pas = $result12['count_aime_pas'];

	$sql13 = "SELECT COUNT(contributeurs_id_contributeur) AS count_wish
				FROM contributeurs_wish_enseignes AS t1
					WHERE enseignes_id_enseigne = :id_enseigne";
	$req13 = $bdd->prepare($sql13);
	$req13->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
	$req13->execute();
	$result13 = $req13->fetch(PDO::FETCH_ASSOC);
	$count_wish = $result13['count_wish'];	
	
	
	// Labels et recommandations
	$sql5 = "SELECT * FROM enseignes_labelsuniiti AS t1
				INNER JOIN labelsuniiti AS t2
				ON t1.id_label = t2.id_label
					WHERE enseignes_id_enseigne=:id_enseigne";
	$req5 = $bdd->prepare($sql5);
	$req5->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
	$req5->execute();
	$result5 = $req5->fetchAll(PDO::FETCH_ASSOC);
	
	$sql6 = "SELECT * FROM enseignes_recommandations AS t1
				INNER JOIN recommandations AS t2
				ON t1.id_recommandation = t2.id_recommandation
					WHERE enseignes_id_enseigne=:id_enseigne";
	$req6 = $bdd->prepare($sql6);
	$req6->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
	$req6->execute();
	$result6 = $req6->fetchAll(PDO::FETCH_ASSOC);

	// Mots clés
	$sql7 = "SELECT id_type_info, id_motcle1, id_motcle2, id_motcle3 FROM enseignes_infos_generales WHERE enseignes_id_enseigne=" . $id_enseigne;
	$req7 = $bdd->prepare($sql7);
	$req7->execute();
	$result7 = $req7->fetchAll(PDO::FETCH_ASSOC);
	$sql8 = "SELECT motcle FROM motscles WHERE id_motcle=:id_motcle";
	$req8 = $bdd->prepare($sql8);
	$AfficheMotcle[1] = $AfficheMotcle[2] = $AfficheMotcle[3] = $AfficheMotcle[4] = false;
	foreach ($result7 as $row7) {
		$AfficheMotcle[$row7['id_type_info']] = true;
		$req8->bindParam(':id_motcle', $row7['id_motcle1'], PDO::PARAM_INT);
		$req8->execute();
		$result8 = $req8->fetch(PDO::FETCH_ASSOC);
		$MotCle[$row7['id_type_info']][1] = $result8['motcle'];
		$req8->bindParam(':id_motcle', $row7['id_motcle2'], PDO::PARAM_INT);
		$req8->execute();
		$result8 = $req8->fetch(PDO::FETCH_ASSOC);
		$MotCle[$row7['id_type_info']][7] = $result8['motcle'];
		$req8->bindParam(':id_motcle', $row7['id_motcle3'], PDO::PARAM_INT);
		$req8->execute();
		$result8 = $req8->fetch(PDO::FETCH_ASSOC);
		$MotCle[$row7['id_type_info']][3] = $result8['motcle'];			
	}
	$req7->closeCursor();
	if ($req8) {$req8->closeCursor();}
	
	$Chemin = SITE_URL . "/photos/enseignes/couvertures/";
	
	$datacouv = "{step : 1, "
			. "type : 'enseigne', "
			. "id_enseigne : " . $id_enseigne . ", "
			. "cheminbox : '" . SITE_URL . "/photos/enseignes/box/', "
			. "box : '" . $box_enseigne . "', "
			. "chemin : '" . SITE_URL . "/photos/enseignes/couvertures/', "
			. "image1 : '" . $slide1_enseigne . "', "
			. "image2 : '" . $slide2_enseigne . "', "
			. "image3 : '" . $slide3_enseigne . "', "
			. "image4 : '" . $slide4_enseigne . "', "
			. "image5 : '" . $slide5_enseigne . "', "
			. "x1 : '" . $x1_enseigne . "', "
			. "y1 : '" . $y1_enseigne . "', "
			. "y2 : '" . $y2_enseigne . "', "
			. "y3 : '" . $y3_enseigne . "', "
			. "y4 : '" . $y4_enseigne . "', "
			. "y5 : '" . $y5_enseigne . "'}";
			
	$datamodif = "{type : 'enseigne', "
			. "id_enseigne : " . $id_enseigne . ", "
			. "nom_enseigne:'" . addslashes($nom_enseigne) . "', "
			. "descriptif:'" . str_replace(PHP_EOL ,'\n', addslashes($descriptif)) . "', "
			. "adresse1_enseigne:'" . addslashes($adresse1_enseigne) . "', "
			. "id_ville:'" . $id_ville . "', "
			. "cp_enseigne:'" . $code_postal . "', "
			. "id_categorie:" . $id_categorie . ", "
			. "id_sous_categorie:" . $id_sous_categorie . ", "
			. "id_sous_categorie2:" . $id_sous_categorie2 . ", "
			. "telephone_enseigne:'" . $telephone_enseigne . "', "
			. "reservation : " . $reservation . ", "
			. "prevenir_reservation : " . $prevenir_reservation . ", "
			. "email_reservation : '" . $email_reservation . "', "
			. "telephone_reservation : '" . $telephone_reservation . "', "
			. "optin : " . $optin . ", "
			. "url:'" . $url . "', "
			. "url_video:'" . $url_video . "', "
			. "id_arrondissement:" . $id_arrondissement . ", "
			. "id_quartier:" . $id_quartier . ", "
			. "id_budget:" . $id_budget . "}";

	$IlsSuiventCeCommerce = "OuvrePopin({id_enseigne : " . $id_enseigne . "}, '/includes/popins/commerce_suiveurs.tpl.php', 'default_dialog')";		
	$AjoutReseau = "OuvrePopin({id_enseigne : " . $id_enseigne . "}, '/includes/popins/ajout_liencommerce_votrereseau.tpl.php', 'default_dialog')";		
			
	if ($Admin) {

		$Engrenage = "OuvrePopin(" . $datamodif . ", '/includes/popins/dashboard_infos_generales_commerce.tpl.php', 'default_dialog');";
		$MotsCles = "OuvrePopin(" . $datamodif . ", '/includes/popins/dashboard_mots_clefs.tpl.php', 'default_dialog');";
		$Menutarifs = "OuvrePopin({id_enseigne : " . $id_enseigne . "}, '/includes/popins/dashboard_menutarifs.tpl.php', 'default_dialog_large');";
		$Infospratiques = "OuvrePopin({id_enseigne : " . $id_enseigne . "}, '/includes/popins/dashboard_infospratiques.tpl.php', 'default_dialog_large');";
		$Video = "OuvrePopin(" . $datamodif . ", '/includes/popins/dashboard_video.tpl.php', 'default_dialog');";
		$LabelsCaptain = "OuvrePopin(" . $datamodif . ",'/includes/popins/dashboard_petitmot_commerce.tpl.php', 'default_dialog');";
		$Recommandations = "OuvrePopin(" . $datamodif . ",'/includes/popins/dashboard_petitmot_commerce.tpl.php', 'default_dialog');";

		$Reservation = "OuvrePopin(" . $datamodif . ", '/includes/popins/reservation_step1.tpl.php', 'default_dialog')";
		$Modulereservation = "OuvrePopin(" . $datamodif . ", '/includes/popins/module_reservation.tpl.php', 'default_dialog');";		
		$Moduleoption = "OuvrePopin({id_enseigne : " . $id_enseigne . "}, '/includes/popins/module_optin.tpl.php', 'default_dialog');";
	} 
else {
		$Engrenage = "OuvrePopin(" . $datamodif . ", '/includes/popins/utilisateur_demande_modifs.tpl.php', 'default_dialog')";
		$Video = "OuvrePopin(" . $datamodif . ", '/includes/popins/utilisateur_demande_modifs.tpl.php', 'default_dialog')";
		$Reservation = "OuvrePopin(" . $datamodif . ", '/includes/popins/reservation_step1.tpl.php', 'default_dialog')";
		$Menutarifs = "OuvrePopin({id_enseigne : " . $id_enseigne . "}, '/includes/popins/menutarifs.tpl.php', 'default_dialog_large');";
		$Infospratiques = "OuvrePopin({id_enseigne : " . $id_enseigne . "}, '/includes/popins/infospratiques.tpl.php', 'default_dialog_large');";
		$Modulereservation = "OuvrePopin(" . $datamodif . ", '/includes/popins/module_reservation.tpl.php', 'default_dialog');";		
		$Moduleoption = "OuvrePopin({id_enseigne : " . $id_enseigne . "}, '/includes/popins/module_optin.tpl.php', 'default_dialog');";
	}	
			
?>

    <body style="display:none;">
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
                    <div class="utilisateur_interface_engrenage">
                        <div class="utilisateur_interface_engrenage_img_container"><a href="#" class="link_engrenage_button" title="" onclick="<?php echo $Engrenage; ?>"></a></div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="separateur"></div>
                    <div class="clearfix"></div>
                    <div class="commerce_head_desc_address"><div class="img_container" id="commerce_head_desc_address_button"><a href="#" title=""><img src="<?php echo SITE_URL; ?>/img/marker_map.png" title="" alt="" height="23" width="15"/></a></div><div id="commerce_head_desc_address_wrap"><address><?php echo $adresse1_enseigne; ?></address><span><?php echo $code_postal; ?> <?php echo $ville_enseigne; ?></span></div></div>
                    <div class="commerce_head_desc_ariane"><div class="img_container" id="commerce_head_desc_ariane_button"><a href="#" title=""><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/etiquette.png" title="" alt="" height="20" width="23" /></a></div><div id="commerce_head_desc_ariane_wrap"><span>Commerce > <?php echo $categorie; ?> > <?php echo $sous_categorie; ?></span><span class="commerce_head_desc_ariane_lastcat"><?php echo $sous_categorie2; ?></span></div></div>
                    <div class="clearfix"></div>
                    <div class="separateur"></div>
                    <div class="clearfix"></div>
                    <div class="commerce_head_desc_identity"><div class="img_container" id="commerce_head_desc_identity_button"><a href="#"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/identity.png" title="" alt="" height="18" width="22" /></a></div><div id="commerce_head_desc_identity_wrap"><span><?php if ($telephone_enseigne) echo 'Tél. : ';echo chunk_split($telephone_enseigne,2,'.');?></span><a href="#" title=""><?php echo $url; ?></a></div></div>
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
					<?php if ($reservation) { ?>
                    <div class="commerce_head_note_reservation" style="background-color:<?php echo $couleur; ?>;">
                        <a href="#" title="" class="commerce_reserver_button" onclick="<?php echo $Reservation; ?>">
                        <div class="img_container_reservation"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/sonette.png" title="" alt="" height="24" width="30" /></div>
                        <div class="commerce_head_note_reserver"><span><strong>Réserver</strong> une table</span></div>
                        </a>
                    </div>
					<?php } ?>
                </div>
				<?php if ($id_enseigne != 0) { ?>
                <div class="commerce_head_infos">
                    <div class="commerce_head_infos_services"><a href="#" title="" onclick="<?php echo $Menutarifs; ?>"><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/menutarifs.png" alt="" title="" height="35" width="35" /></div><div class="commerce_head_infos_services_text"><span class="commerce_head_infos_services_text_fin">Prestations</span><span class="commerce_head_infos_services_text_couleur" style="color:<?php echo $couleur; ?>;">& Tarifs</span></div></a></div>
                    <div class="commerce_head_infos_infos"><a href="#" title="" onclick="<?php echo $Infospratiques; ?>"><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/horloge.png" alt="" title="" height="35" width="35" /></div><div class="commerce_head_infos_infos_text"><span class="commerce_head_infos_infos_text_fin">Infos</span><span class="commerce_head_infos_infos_text_couleur">Pratiques</span></div></a></div>
                    <div class="utilisateur_head_infos_suggestion">
                        <div class="commerce_reservation_commerce"><a href="#" onclick="<?php echo $Modulereservation; ?>" title=""><span class="utilisateur_suggerer_commerce_firstcat">Réservation</span></a></div>
                        <div class="clearfix"></div>
                        <div class="commerce_optin_commerce"><a href="#" title="" onclick="<?php echo $Moduleoption; ?>"><span class="utilisateur_suggerer_objet_firstcat">Campagne opt-in</span></a></div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="separateur"></div>
                    <div class="clearfix"></div>
                    <div class="commerce_head_infos_infosrapides" <?php if ($Admin) {echo "onclick=\"" . $MotsCles . "\" style='cursor:pointer'";} ?>>
                        <div class="infosrapides1">
							<div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/infosrapides1.png" alt="" title="" height="26" width="21" /></div>
							<?php if ($AfficheMotcle[1]) { ?>
							<?php foreach ($MotCle[1] as $id_motcle => $motcle) { 
							echo "<span>" . $motcle . "</span>"; 
							}} ?>
						</div>
						<?php if ($AfficheMotcle[2]) { ?>
                        <div class="infosrapides2">
							<div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/infosrapides2.png" alt="" title="" height="25" width="26" /></div>
							<?php foreach ($MotCle[2] as $id_motcle => $motcle) { 
							echo "<span>" . $motcle . "</span>"; 
							} ?>
						</div>
                        <div class="clearfix_infosrapides"></div>
						<?php } ?>
						<?php if ($AfficheMotcle[3]) { ?>
                        <div class="infosrapides3">
							<div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/infosrapides3.png" alt="" title="" height="30" width="30" /></div>
							<?php foreach ($MotCle[3] as $id_motcle => $motcle) { 
							echo "<span>" . $motcle . "</span>"; 
							} ?>
						</div>
						<?php } ?>
						<?php if ($AfficheMotcle[4]) { ?>
                        <div class="infosrapides4">
							<div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/infosrapides4.png" alt="" title="" height="23" width="32" /></div>
							<?php foreach ($MotCle[4] as $id_motcle => $motcle) { 
							echo "<span>" . $motcle . "</span>"; 
							} ?>
						</div>
						<?php } ?>
                    </div>
                    
                </div>
				<?php } ?>
            
            </div>
            <div class="commerce_head2">
                <div class="commerce_head2_coinvideo" onclick="<?php if ($id_enseigne != 0) {echo $Video;} ?>">
                    <div class="commerce_head2_coinvideo_text"><span class="commerce_head2_text1_1">Coin</span><span class="commerce_head2_text2_1" style="color:<?php echo $couleur; ?>;">Vidéo</span></div><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/play.png" alt="" title="" height="19" width="19" /></div>
                </div>
                <div class="commerce_head2_right">
				<a href="#" title="" onclick="<?php echo $AjoutReseau; ?>"><div class="commerce_head2_reseau"><span class="commerce_head2_text1">Votre</span><span class="commerce_head2_text2" style="color:<?php echo $couleur; ?>;">Réseau</span></div><?php if ($count_reseau_attente > 0) { ?><div class="notifs_reseau"><span><?php echo $count_reseau_attente; ?></span></div><?php } ?><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/reseau.png" alt="" title="" height="19" width="19" /></div><div class="commerce_head2_text3"><span><?php echo $count_reseau; ?></span></div></a>
                <div class="commerce_head2_avis"><span class="commerce_head2_text1">Nombre</span><span class="commerce_head2_text2" style="color:<?php echo $couleur; ?>;">Avis</span></div><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/star_0.png" alt="" title="" height="19" width="19" /></div><div class="commerce_head2_text3"><span><?php echo $count_avis_enseigne; ?></span></div>
                <a href="#" title="" onclick="<?php echo $IlsSuiventCeCommerce; ?>"><div class="commerce_head2_abonnes"><span class="commerce_head2_text1">Nombre</span><span class="commerce_head2_text2" style="color:<?php echo $couleur; ?>;">Abonnés</span></div><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/abonnes.png" alt="" title="" height="19" width="19" /></div><div class="commerce_head2_text3_end"><span><?php echo $count_abonnes; ?></span></div></a>
                </div>
            </div>
            <div class="commerce_couv">
                <div class="ligne_verticale1"></div>
                <div class="ligne_verticale2"></div>
				
				<div class="couv_container">
					<?php if ($slide1_enseigne != "" && $slide2_enseigne == "" && $slide3_enseigne == "" && $slide4_enseigne == "" && $slide5_enseigne == "") { ?><img id="couv1" src="<?php echo $Chemin . $slide1_enseigne; ?>" title="" alt=""><?php } ?>
				    <div id="couv_slides">
 					<?php if ($slide1_enseigne != "") { ?><img id="couv1" src="<?php echo $Chemin . $slide1_enseigne . "?" . time(); ?>" title="" alt=""><?php } ?>
					<?php if ($slide2_enseigne != "") { ?><img id="couv2" src="<?php echo $Chemin . $slide2_enseigne . "?" . time(); ?>" title="" alt=""><?php } ?>					
 					<?php if ($slide3_enseigne != "") { ?><img id="couv3" src="<?php echo $Chemin . $slide3_enseigne . "?" . time(); ?>" title="" alt=""><?php } ?>
					<?php if ($slide4_enseigne != "") { ?><img id="couv4" src="<?php echo $Chemin . $slide4_enseigne . "?" . time(); ?>" title="" alt=""><?php } ?>
					<?php if ($slide5_enseigne != "") { ?><img id="couv5" src="<?php echo $Chemin . $slide5_enseigne . "?" . time(); ?>" title="" alt=""><?php } ?>
				    </div>
				</div>
                
				<?php if ($id_enseigne != 0) { ?>
				
                <div class="commerce_concept"><a class="button_show_concept" onclick="<?php echo $LabelsCaptain; ?>" href="#" title=""><span>Le concept</span><div class="commerce_concept_arrow concept_arrow_up"></div></a><p class="concept_content"><?php echo $descriptif ?></p></div>
                <div class="commerce_gerant"><div class="gerant_title"><a class="button_show_concept" href="#" title=""><p>Le gérant</p></a></div><div class="gerant_photo"><img src="<?php echo SITE_URL; ?>/img/avatars/james.jpg" title="" alt="" /></div></div>
			
					<?php if ($Admin) { ?>
					<div class="commerce_recos">
						<a class="button_show_recos" onclick="<?php echo $Recommandations; ?>" href="#" title="">
							<span>Recommandations</span>
							<div class="commerce_recos_arrow recos_arrow_up"></div>
							<div class="commerce_recos_wrap">
								<?php foreach ($result6 as $row) { ?>
								<img title="<?php echo $row['recommandation']; ?>" src="<?php echo SITE_URL; ?>/img/pictos_actions/<?php echo $row['url_recommandation']; ?>" width="50" height="44" title="" alt="" />
								<?php } ?>
							</div>
						</a>
					</div>
					<div class="commerce_labels">
						<a class="button_show_labels" onclick="<?php echo $LabelsCaptain; ?>" href="#" title="">
							<span>Labels Uniiti</span>
							<div class="commerce_labels_arrow labels_arrow_up"></div>
							<div class="commerce_labels_wrap">
								<?php foreach ($result5 as $row) { ?>
								<img title="<?php echo $row['label']; ?>" src="<?php echo SITE_URL; ?>/img/pictos_actions/<?php echo $row['url_label']; ?>" width="50" height="44" title="" alt="" />
								<?php } ?>
							</div>
						</a>
					</div>
					<div class="commerce_interface_modifier_box"><a href="#" title="" class="button_changer_couverture" onclick="OuvrePopin(<?php echo $datacouv;?>, '/includes/popins/box_step1.tpl.php', 'default_dialog_large');"><div class="utilisateur_interface_modifier_icon_noir"><img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/interface_crayon_icon_n.png" title="" alt="" height="12" width="12" /></div><span>changer la box</span></a></div>
					<div class="commerce_interface_modifier_popin"><a href="#" title="" class="button_changer_couverture" onclick="OuvrePopin(<?php echo $datacouv;?>, '/includes/popins/vignette_step1.tpl.php', 'default_dialog_large');"><div class="utilisateur_interface_modifier_icon_noir"><img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/interface_crayon_icon_n.png" title="" alt="" height="12" width="12" /></div><span>changer la popin</span></a></div>
					<div class="commerce_interface_modifier_couv"><a href="#" title="" class="button_changer_couverture" onclick="OuvrePopin(<?php echo $datacouv;?>, '/includes/popins/couverture_step1.tpl.php', 'default_dialog_large');"><div class="utilisateur_interface_modifier_icon_noir"><img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/interface_crayon_icon_n.png" title="" alt="" height="12" width="12" /></div><span>changer les couvertures</span></a></div>
					<?php } ?>
				<?php } ?>
            </div>
        
        <!-- FILTRE DE TRI -->
        <?php include'../includes/filters_commerce_interface.php' ?>
        <!-- FIN FILTRE DE TRI -->
        </div>
        <!-- FIN BIG WRAPPER -->
        <!-- CONTENU PRINCIPAL -->
        <div id="box_container" class="content utilisateur_boxes">
			<?php include '../includes/requetecommerce.php' ?> 
		</div>
 
		<div id="commerce_stats">
<!--			<div class="commerce_prefs_stats_tableau"></div> -->
			<div id="prefs_items_container">
				<div class="commerce_prefs_stats_item">
					<span class="commerce_prefs_stats_item_nbr"><?php echo $count_avis_enseigne; ?></span>
					<span class="commerce_prefs_stats_item_titre">Nombre d'avis</span>
				</div>
				<div class="commerce_prefs_stats_item">
					<span class="commerce_prefs_stats_item_nbr"><?php echo $count_aime; ?></span>
					<span class="commerce_prefs_stats_item_titre">Nombre de j'aime</span>
				</div>
				<div class="commerce_prefs_stats_item">
					<span class="commerce_prefs_stats_item_nbr"><?php echo $count_abonnes; ?></span>
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
					<span class="commerce_prefs_stats_item_nbr"><?php echo $count_wish; ?></span>
					<span class="commerce_prefs_stats_item_titre">Nombre d'ajout liste de souhaits</span>
				</div>
				<div class="commerce_prefs_stats_item">
					<span class="commerce_prefs_stats_item_nbr"><?php echo $count_reseau; ?></span>
					<span class="commerce_prefs_stats_item_titre">Nombre d'enseignes dans<BR/>votre réseau</span>
				</div>
				<div class="commerce_prefs_stats_item">
					<span class="commerce_prefs_stats_item_nbr"><?php echo $count_aime_pas; ?></span>
					<span class="commerce_prefs_stats_item_titre">Nombre de j'aime pas</span>
				</div>
				<div class="commerce_prefs_stats_item item_gestion_site">
					<a href="#" title="" onclick="OuvrePopin({}, '/includes/popins/gestion_minisite.tpl.php', 'default_dialog');">
						<span><strong>Gestion</strong></span>
						<span>de votre</span>
						<span><strong>Site web</strong></span>
					</a>
				</div>
			</div>
		</div>
 
        </div>
        <!-- FIN CONTENU PRINCIPAL -->
        </div><!-- FIN BIGGY -->
        <!-- FOOTER -->
			<?php include '../includes/footer.php' ?>
        <!-- FIN FOOTER -->
        <?php include'../includes/js.php' ?>
		
	<script>
	$(".filters.stats").css({display: "none"});
	$('#commerce_stats').css({display: "none"});
	$('#PrefStat').click(function () {
		$(".filters.stats").css({display: "block"});
		$('#box_container').css({display: "none"});
		$('#commerce_stats').css({display: "block"});
		$(".filters.flux").css({display: "none"});
        var $statcontainer = $('#prefs_items_container'), $body = $('body'), colW = 250, columns = null;
        $statcontainer.imagesLoaded(function(){
			$statcontainer.isotope({
					// disable window resizing
					resizable: false,
					masonry: {
						itemSelector : '.commerce_prefs_stats_item',
						columnWidth: colW,
						resizable: false
					}
			});
		});
		DisableScroll = true;

	});
	$('#PrefStatTermine').click(function () {
		$(".filters.stats").css({display: "none"});
		$('#commerce_stats').css({display: "none"});
		$('#box_container').css({display: "block"});
		$(".filters.flux").css({display: "block"});
		DisableScroll = false;
		resizeboxContainer();
	});

		// Gestion du slider des couvertures
		$(window).load(function() {
			$("body").fadeIn(500);
		  $('#couv_slides').slidesjs2({width: 1736,height: 496,play: {active: true,auto: true,interval: 6000,swap: true},effect: {slide: {speed: 3000}}});
		  
		})
		
		function InitCouvertures() {
		
			y[1] = <?php if ($y1_enseigne != '') {echo $y1_enseigne;} else {echo 0;} ?>;
			y[2] = <?php if ($y2_enseigne != '') {echo $y2_enseigne;} else {echo 0;} ?>;
			y[3] = <?php if ($y3_enseigne != '') {echo $y3_enseigne;} else {echo 0;} ?>;
			y[4] = <?php if ($y4_enseigne != '') {echo $y4_enseigne;} else {echo 0;} ?>;
			y[5] = <?php if ($y5_enseigne != '') {echo $y5_enseigne;} else {echo 0;} ?>;
			AjusteCouvertures($('.big_wrapper').css('width'));
		}
		InitCouvertures();
		// Fin gestion du slider des couvertures
		
	var $idcontributeurACTIF = <?php if (isset($_SESSION['SESS_MEMBER_ID'])) {echo $_SESSION['SESS_MEMBER_ID'];} else {echo 0;} ?>;

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
