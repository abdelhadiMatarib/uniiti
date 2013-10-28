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
					slide1_enseigne, slide2_enseigne, slide3_enseigne, slide4_enseigne, slide5_enseigne, nom_enseigne, y1, y2, y3, y4, y5, 
					reservation, prevenir_reservation, email_reservation, telephone_reservation, adresse1_enseigne, cp_enseigne, nom_ville, villes_id_ville, id_quartier, telephone_enseigne, video_enseigne, descriptif, url, t1.id_budget, budget_enseigne
			FROM enseignes AS t1
				INNER JOIN sous_categories2 AS t2
				ON t2.id_sous_categorie2 = t1.sscategorie_enseigne
					INNER JOIN sous_categories AS t3
					ON t2.id_sous_categorie = t3.id_sous_categorie
						INNER JOIN categories AS t4
						ON t2.id_categorie = t4.id_categorie
							INNER JOIN villes  AS t5
							ON t1.villes_id_ville = t5.id_ville
								INNER JOIN budget AS t6
								ON t1.id_budget = t6.id_budget
			WHERE id_enseigne = :id_enseigne
		";

	$req2 = $bdd->prepare($sql2);

	if (!empty($_GET['id_enseigne'])) {$id_enseigne = $_GET['id_enseigne'];}
	else {echo "vous ne pouvez pas accéder directement à cette page !\n<a href=\"" . SITE_URL . "\">Revenir à la page principale</a>"; exit;}

	$req2->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);

	$req2->execute();
	$result2 = $req2->fetch(PDO::FETCH_ASSOC);
           
	$nom_enseigne            = $result2['nom_enseigne'];
	$slide1_enseigne    	 = $result2['slide1_enseigne'];
	$slide2_enseigne    	 = $result2['slide2_enseigne'];
	$slide3_enseigne    	 = $result2['slide3_enseigne'];
	$slide4_enseigne    	 = $result2['slide4_enseigne'];
	$slide5_enseigne    	 = $result2['slide5_enseigne'];
	$y1_enseigne    		 = $result2['y1'];
	$y2_enseigne    		 = $result2['y2'];
	$y3_enseigne    		 = $result2['y3'];
	$y4_enseigne    		 = $result2['y4'];
	$y5_enseigne    		 = $result2['y5'];
	$reservation 			 = $result2['reservation'];
	$prevenir_reservation 	 = $result2['prevenir_reservation'];
	$email_reservation 		 = $result2['email_reservation'];
	$telephone_reservation 	 = $result2['telephone_reservation'];
	$adresse1_enseigne       = $result2['adresse1_enseigne'];
	$code_postal             = $result2['cp_enseigne'];
	$ville_enseigne          = $result2['nom_ville'];
	$id_ville          		 = $result2['villes_id_ville'];
	$id_quartier          	 = $result2['id_quartier'];
	$telephone_enseigne      = $result2['telephone_enseigne'];
	$descriptif              = $result2['descriptif'];
	$id_categorie			 = $result2['id_categorie'];
	$categorie				 = $result2['categorie_principale'];
	$sous_categorie          = $result2['sous_categorie'];
	$sous_categorie2         = $result2['sous_categorie2'];
    $couleur                 = $result2['couleur'];
	$url                     = $result2['url'];
	$url_video               = $result2['video_enseigne'];
	$id_budget               = $result2['id_budget'];
	$budget               	 = $result2['budget_enseigne'];

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
			. "chemin : '" . SITE_URL . "/photos/enseignes/couvertures/', "
			. "image1 : '" . $slide1_enseigne . "', "
			. "image2 : '" . $slide2_enseigne . "', "
			. "image3 : '" . $slide3_enseigne . "', "
			. "image4 : '" . $slide4_enseigne . "', "
			. "image5 : '" . $slide5_enseigne . "', "
			. "y1 : '" . $y1_enseigne . "', "
			. "y2 : '" . $y2_enseigne . "', "
			. "y3 : '" . $y3_enseigne . "', "
			. "y4 : '" . $y4_enseigne . "', "
			. "y5 : '" . $y5_enseigne . "'}";
			
	$datareservation = "{type : 'enseigne', "
			. "id_enseigne : " . $id_enseigne . ", "
			. "nom_enseigne:'" . addslashes($nom_enseigne) . "', "
			. "reservation : " . $reservation . ", "
			. "prevenir_reservation : " . $prevenir_reservation . ", "
			. "email_reservation : '" . $email_reservation . "', "
			. "telephone_reservation : '" . $telephone_reservation . "'}";
			
	$datainfospratiques = "{type : 'enseigne', "
			. "id_enseigne : " . $id_enseigne . ", "
			. "couleur:'" . $couleur . "', "
			. "nom_enseigne:'" . addslashes($nom_enseigne) . "', "
			. "adresse1_enseigne:'" . addslashes($adresse1_enseigne) . "', "
			. "code_postal :'" . addslashes($code_postal) . "', "
			. "ville_enseigne:'" . addslashes($ville_enseigne) . "',"
			. "telephone_enseigne : '" . $telephone_enseigne . "'}";
			
	$menu_tarif = "OuvrePopin({id_enseigne : " . $id_enseigne . "}, '/includes/popins/menutarifs.tpl.php', 'default_dialog_large');";	
	$IlsSuiventCeCommerce = "OuvrePopin({id_enseigne : " . $id_enseigne . "}, '/includes/popins/commerce_suiveurs.tpl.php', 'default_dialog')";
	$Reservation = "OuvrePopin(" . $datareservation . ", '/includes/popins/reservation_step1.tpl.php', 'default_dialog')";
	$Infospratiques = "OuvrePopin(" . $datainfospratiques . ", '/includes/popins/infospratiques.tpl.php', 'default_dialog_large');";

	if(isset($_SESSION['SESS_MEMBER_ID'])) {
		$dataLDW = "{id_contributeur :" . $_SESSION['SESS_MEMBER_ID'] . "," . "id_enseigne :" . $id_enseigne . ", categorie : '" . addslashes($categorie) . "'}";
		$like_step1 = "OuvrePopin(" . $dataLDW . ", '/includes/popins/like_step1.tpl.php', 'default_dialog');";
		$dislike_step1 = "OuvrePopin(" . $dataLDW . ", '/includes/popins/dislike_step1.tpl.php', 'default_dialog');";
		$wishlist_step1 = "OuvrePopin(" . $dataLDW . ", '/includes/popins/wishlist_step1.tpl.php', 'default_dialog');";
	} else {
		$like_step1 = $dislike_step1 = $wishlist_step1 = "OuvrePopin({}, '/includes/popins/ident.tpl.php', 'default_dialog');";
	}
?>
    <body>
        <div id="default_dialog"></div>
        <div id="default_dialog_large"></div>
        <div id="default_dialog_inscription"></div>
		<div id="default_dialog_map"></div>
        <div id="dialog_overlay">
			<div class="index_overlay"></div>
			<div class="dialog_overlay_wrap_content">
				<div class="dialog_footer_loader">
					<img src="<?php echo SITE_URL; ?>/img/pictos_actions/gif_uniiti.gif" height="70" width="70"/>
				</div>
			</div>
        </div>
        <?php include'../includes/header.php'; ?>
        <div class="biggymarginer" style="display:none;">
        <div class="big_wrapper" id="test">
            <div class="liseret" style="background-color:<?php echo $couleur; ?>;"></div>
            <div class="commerce_head">
                <div class="commerce_head_desc">
                    <div class="commerce_head_desc_title"><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/restauration_b.png" title="" alt="" /></div><h2 title="<?php echo $nom_enseigne; ?>"><?php echo $nom_enseigne; ?></h2></div>
                    <div class="commerce_head_desc_social">
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
                    <div class="commerce_head_desc_address" id="commerce_head_desc_address_button"><div class="img_container" ><img src="<?php echo SITE_URL; ?>/img/marker_map.png" title="" alt="" height="23" width="15"/></div><div id="commerce_head_desc_address_wrap" title="Visualiser sur la carte"><address><?php echo $adresse1_enseigne; ?></address><span><?php echo $code_postal; ?> <?php echo $ville_enseigne; ?></span></div></div>
                    <div class="commerce_head_desc_ariane" id="commerce_head_desc_ariane_button"><div class="img_container" ><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/etiquette.png" title="" alt="" height="20" width="23" /></div><div id="commerce_head_desc_ariane_wrap" title="Commerce - <?php echo $categorie; ?> - <?php echo $sous_categorie; ?> - <?php echo $sous_categorie2; ?>"><span>Commerce - <?php echo $categorie; ?> - <?php echo $sous_categorie; ?></span><span class="commerce_head_desc_ariane_lastcat"> - <?php echo $sous_categorie2; ?></span></div></div>
                    <div class="clearfix"></div>
                    <div class="separateur"></div>
                    <div class="clearfix"></div>
                    <div class="commerce_head_desc_identity" id="commerce_head_desc_identity_button"><div class="img_container" ><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/identity.png" title="" alt="" height="18" width="22" /></div><div id="commerce_head_desc_identity_wrap"><span><?php if ($telephone_enseigne) echo 'Tél. : ';echo chunk_split($telephone_enseigne,2,'.');?></span><a href="#" title=""><?php echo $url; ?></a></div></div>
                    <div class="commerce_head_desc_prices" id="commerce_head_desc_prices_button">
						<div class="img_container" ><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/price.png" title="<?php echo $budget; ?>" alt="" height="21" width="21" /></div>
						<div id="commerce_head_desc_prices_wrap">
							<?php for ($i = 1 ; $i <= $id_budget ; $i++) { ?>
								<img title="<?php echo $budget; ?>" class="price_bag" src="<?php echo SITE_URL; ?>/img/pictos_commerces/price_bag_1.png" title="" alt="" height="25" width="19" />
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
                    <div class="commerce_head_note_reservation" style="background-color:<?php echo $couleur; ?>;">
                        <a href="#" title="" class="commerce_reserver_button" onclick="<?php if ($reservation) { echo $Reservation; } else { ?>alert('Module non activé par le commerçant');<?php } ?>">
                            <div class="img_container_reservation"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/sonette.png" title="" alt="" height="24" width="30" /></div>
                            <div class="commerce_head_note_reserver"><?php if ($id_categorie == 1) {echo "<span><strong>Réserver</strong> une table</span>";} else {echo "<span><strong>Prendre</strong><BR/>un rdv</span>";}?></div>
                        </a>
                    </div>
                </div>
                <div class="commerce_head_infos">
                    <div class="commerce_head_infos_services" onclick="<?php echo $menu_tarif;?>"><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/prestationstarifs.png" alt="" title="" height="59" width="59" /></div><div class="commerce_head_infos_services_text" title="Prestations & Tarifs"><span class="commerce_head_infos_services_text_fin">Prestations</span><span class="commerce_head_infos_services_text_couleur" style="color:<?php echo $couleur; ?>;">& Tarifs</span></div></div>
                    <div class="commerce_head_infos_infos" onclick="<?php echo $Infospratiques;?>"><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/infospratiques.png" alt="" title="" height="59" width="59" /></div><div class="commerce_head_infos_infos_text" title="Infos Pratiques"><span class="commerce_head_infos_infos_text_fin">Infos</span><span class="commerce_head_infos_infos_text_couleur" style="color:<?php echo $couleur; ?>;">Pratiques</span></div></div>
                    <div class="commerce_head_infos_suivre" id="Suivre"><div class="img_container"><img id="ImageSuivre" src="<?php echo SITE_URL; ?>/img/pictos_commerces/suivre.png" alt="" height="59" width="59" /></div><span id="TexteSuivre">Suivre</span></div>
                    <div class="clearfix"></div>
                    <div class="separateur"></div>
                    <div class="clearfix"></div>
                    <div class="commerce_head_infos_infosrapides">
                        <div class="infosrapides1">
							<div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/infosrapides1.png" alt="" title="" height="26" width="21" /></div>
							<?php if ($AfficheMotcle[1]) { foreach ($MotCle[1] as $id_motcle => $motcle) { 
							echo "<span>" . $motcle . "</span>"; 
							}} ?>
						</div>
                        <div class="infosrapides2">
							<div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/infosrapides2.png" alt="" title="" height="25" width="26" /></div>
							<?php if ($AfficheMotcle[2]) { foreach ($MotCle[2] as $id_motcle => $motcle) { 
							echo "<span>" . $motcle . "</span>"; 
							}} ?>
						</div>
                        <div class="clearfix_infosrapides"></div>
                        <div class="infosrapides3">
							<div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/infosrapides3.png" alt="" title="" height="30" width="30" /></div>
							<?php if ($AfficheMotcle[3]) {foreach ($MotCle[3] as $id_motcle => $motcle) { 
							echo "<span>" . $motcle . "</span>"; 
							}} ?>
						</div>
                        <div class="infosrapides4">
							<div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/infosrapides4.png" alt="" title="" height="23" width="32" /></div>
							<?php if ($AfficheMotcle[4]) {foreach ($MotCle[4] as $id_motcle => $motcle) { 
							echo "<span>" . $motcle . "</span>"; 
							}} ?>
						</div>
                   </div>
                    
                </div>
            
            </div>
            <div class="commerce_head2">
                <div class="commerce_head2_coinvideo">
                    <div class="commerce_head2_coinvideo_text"><span class="commerce_head2_text1_1">Coin</span><span class="commerce_head2_text2_1" style="color:<?php echo $couleur; ?>;">Vidéo</span></div><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/play.png" alt="" title="" height="19" width="19" /></div>
                </div>
                <div class="commerce_head2_right">
                <div class="commerce_head2_reseau"><span class="commerce_head2_text1">Son</span><span class="commerce_head2_text2" style="color:<?php echo $couleur; ?>;">Réseau</span><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/reseau.png" alt="" title="" height="19" width="19" /></div><div class="commerce_head2_text3"><span><?php echo $count_reseau; ?></span></div></div>
                <div class="commerce_head2_avis"><span class="commerce_head2_text1">Nombre</span><span class="commerce_head2_text2" style="color:<?php echo $couleur; ?>;">Avis</span><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/star_0.png" alt="" title="" height="19" width="19" /></div><div class="commerce_head2_text3"><span><?php echo $count_avis_enseigne; ?></span></div></div>
                <div class="commerce_head2_abonnes"onclick="<?php echo $IlsSuiventCeCommerce; ?>"><span class="commerce_head2_text1">Nombre</span><span class="commerce_head2_text2" style="color:<?php echo $couleur; ?>;">Abonnés</span><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/abonnes.png" alt="" title="" height="19" width="19" /></div><div class="commerce_head2_text3_end"><span><?php echo $count_abonnes; ?></span></div></div>
                </div>
            </div>
            <div class="commerce_couv">
               
				
				<div class="couv_container">
					<div class="ligne_verticale1"></div>
                	<div class="ligne_verticale2"></div>
					<?php if ($slide1_enseigne != "" && $slide2_enseigne == "" && $slide3_enseigne == "" && $slide4_enseigne == "" && $slide5_enseigne == "") { ?><img id="couv1" src="<?php echo $Chemin . $slide1_enseigne; ?>" title="" alt=""><?php } ?>
				    <div id="couv_slides">
 					<?php if ($slide1_enseigne != "") { ?><img id="couv1" src="<?php echo $Chemin . $slide1_enseigne; ?>" title="" alt=""><?php } ?>
					<?php if ($slide2_enseigne != "") { ?><img id="couv2" src="<?php echo $Chemin . $slide2_enseigne; ?>" title="" alt=""><?php } ?>					
 					<?php if ($slide3_enseigne != "") { ?><img id="couv3" src="<?php echo $Chemin . $slide3_enseigne; ?>" title="" alt=""><?php } ?>
					<?php if ($slide4_enseigne != "") { ?><img id="couv4" src="<?php echo $Chemin . $slide4_enseigne; ?>" title="" alt=""><?php } ?>
					<?php if ($slide5_enseigne != "") { ?><img id="couv5" src="<?php echo $Chemin . $slide5_enseigne; ?>" title="" alt=""><?php } ?>
				    </div>
				    <div class="commerce_concept"><a class="button_show_concept" href="#" title=""><span>Concept <span style="color:<?php echo $couleur; ?>"> & Gérant</span></span> <div class="commerce_concept_arrow concept_arrow_up"></div></a><p class="concept_content"><img id="gerant_photo"src="<?php echo SITE_URL; ?>/img/avatars/james.jpg" title="" alt="" style="border: 2px solid <?php echo $couleur; ?>" /><?php echo $descriptif ?></p></div>
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
				<div class="wrapper_boutons">
                	<div class="boutons not_signedin" title="J'aime" onclick="<?php echo $like_step1; ?>" class="boutons_action_popin" <?php echo AfficheAction('aime',$categorie); ?>></div>
                	<div class="boutons not_signedin" title="Je n'aime pas" onclick="<?php echo $dislike_step1; ?>" class="boutons_action_popin" <?php echo AfficheAction('aime_pas',$categorie); ?>></div>
                	<div class="boutons not_signedin" title="Ajouter à ma Wishlist" onclick="<?php echo $wishlist_step1; ?>" class="boutons_action_popin" <?php echo AfficheAction('wish',$categorie); ?>></div>
                </div>          
				</div>


				<div id="video_content" style="display:none;">

					<div class="commerce_couv_video_button_retour"><span>Retour</span></div>

					<div class="commerce_couv_video_bg">

					</div>
					<div class="commerce_couv_video_content">
						<div class="commerce_couv_video_txt_left">
							<span>Coin</span><span class="commerce_couv_video_txt_left_colored">Vidéo</span>
							<div class="commerce_couv_video_txt_left_img_container">
								<img src="../img/pictos_commerces/icon_player.png" title="" alt="" height="54" width="54" />
							</div>
						</div>
						<div class="commerce_couv_video_txt_right">
							<span>Découvrez</span><span class="commerce_couv_video_txt_left_colored"><?php echo $nom_enseigne; ?></span><span>en vidéo !</span>
						</div>
						<div class="commerce_couv_video_embbed">
							<iframe id="lienvideo" width="" height="" src="" frameborder="0" allowfullscreen></iframe>
						</div>
					</div>
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
<script src="//maps.googleapis.com/maps/api/js?sensor=false&amp;key=AIzaSyAIPMi9wXX7j6Wzer4QdNGLq4MPO4ykUQw&libraries=places,adsense"></script>		
	<script>
	
	var url_video = '<?php echo $url_video; ?>';
	$('.commerce_head2_coinvideo').click(function () {
		if ($('#video_content').css("display") == "none") {
			$('#lienvideo').attr('src', url_video);
			$('#video_content').show();
			$('.couv_container').stop().animate({opacity: 0}, 1500);
			$('#video_content').animate({opacity: 1}, 1500);
		}
		else {
			$('#lienvideo').attr('src', '');
			$('#video_content').animate({opacity: 0}, 1500).hide();
			$('.couv_container').stop().animate({opacity: 1}, 1500);
		}
	});
	$('.commerce_couv_video_button_retour').click(function () {
		$('#lienvideo').attr('src', '');
		$('#video_content').animate({opacity: 0}, 1500).hide();
		$('.couv_container').stop().animate({opacity: 1}, 1500);
	});
	
	// Gestion du slider des couvertures
	$(window).load(function() {
		$('#couv_slides').slidesjs2({width: 1736,height: 496,play: {active: true,auto: true,interval: 6000,swap: true},effect: {slide: {speed: 3000}}});
	})
	var adresse_enseigne = '<?php echo addslashes($adresse1_enseigne);?>';
	var code_postal = '<?php echo $code_postal;?>';
	var ville_enseigne = '<?php echo addslashes($ville_enseigne);?>';
	adresse_enseigne += ','+code_postal+','+ville_enseigne;	
	
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
