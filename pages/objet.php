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

	if (isset($_GET['id_objet'])) {$id_objet = $_GET['id_objet'];}
	else {echo "vous ne pouvez pas accéder directement à cette page !\n<a href=\"" . SITE_URL . "\">Revenir à la page principale</a>"; exit;}
	
	$Connecte = false;
	if (isset($_SESSION['SESS_MEMBER_ID'])) {$Connecte = true;}

	if (($Connecte) && ((int)$_SESSION['droits'] & ADMINISTRATEUR)) {$Admin = true;}
	else {$Admin = false;}
	
	$PAGE = "Objet"; 

	$sql2 = "SELECT id_objet, t2.id_categorie, t2.id_sous_categorie, t2.id_sous_categorie2, categorie_principale, sous_categorie, sous_categorie2, couleur,
					box_objet, slide1_objet, slide2_objet, slide3_objet, slide4_objet, slide5_objet, nom_objet, x1, y1, y2, y3, y4, y5,
					nom_ville, villes_id_ville, video_objet, descriptif_objet, url_objet
			FROM objets AS t1
				INNER JOIN sous_categories2 AS t2
				ON t2.id_sous_categorie2 = t1.sscategorie_objet
					INNER JOIN sous_categories AS t3
					ON t2.id_sous_categorie = t3.id_sous_categorie
						INNER JOIN categories AS t4
						ON t2.id_categorie = t4.id_categorie
							INNER JOIN villes  AS t5
							ON t1.villes_id_ville = t5.id_ville
			WHERE id_objet = :id_objet
		";

	$req2 = $bdd->prepare($sql2);

	$req2->bindParam(':id_objet', $id_objet, PDO::PARAM_INT);

	$req2->execute();
	$result2 = $req2->fetch(PDO::FETCH_ASSOC);
	
	$nom_objet            = $result2['nom_objet'];
	$box_objet       	 = $result2['box_objet'];
	$slide1_objet    	 = $result2['slide1_objet'];
	$slide2_objet    	 = $result2['slide2_objet'];
	$slide3_objet    	 = $result2['slide3_objet'];
	$slide4_objet    	 = $result2['slide4_objet'];
	$slide5_objet    	 = $result2['slide5_objet'];
	$x1_objet    		 = $result2['x1'];
	$y1_objet    		 = $result2['y1'];
	$y2_objet    		 = $result2['y2'];
	$y3_objet		 	 = $result2['y3'];
	$y4_objet    		 = $result2['y4'];
	$y5_objet    		 = $result2['y5'];
	$descriptif				 = str_replace(PHP_EOL ,"", stripslashes($result2['descriptif_objet']));
	$descriptif			 	 = str_replace("\r" , "", $descriptif);
	$descriptif			 	 = str_replace("\n" , "", $descriptif);	
	$categorie				 = $result2['categorie_principale'];
	$sous_categorie          = $result2['sous_categorie'];
	$sous_categorie2         = $result2['sous_categorie2'];
	$id_categorie      		 = $result2['id_categorie'];
	$id_sous_categorie       = $result2['id_sous_categorie'];
	$id_sous_categorie2      = $result2['id_sous_categorie2'];
    $couleur                 = $result2['couleur'];
	$url                     = $result2['url_objet'];
	$url_video               = $result2['video_objet'];
	$id_ville          		 = $result2['villes_id_ville'];
	
	// Recherche de la ville
	$sql4 = "SELECT nom_ville FROM villes WHERE id_ville=:id_ville";
	$req4 = $bdd->prepare($sql4);
	$req4->bindParam(':id_ville', $id_ville, PDO::PARAM_INT);
	$req4->execute();
	$result4 = $req4->fetch(PDO::FETCH_ASSOC);		
	$ville_objet          = $result4['nom_ville'];
	$id_arrondissement       = 0;

	// On compte les avis reçus par l'objet et on calcule sa note moyenne
	$sql = "SELECT COUNT(id_avis) AS count_avis, AVG(note) AS moyenne
			FROM avis_objet AS t1

			INNER JOIN objets_recoient_avis AS t2
			ON t1.id_avis = t2.avis_id_avis
			INNER JOIN objets AS t3
				ON t2.objets_id_objet = t3.id_objet
				INNER JOIN contributeurs_donnent_avis_objet AS t4
					ON t1.id_avis = t4.avis_id_avis
					INNER JOIN contributeurs AS t5
						ON t4.contributeurs_id_contributeur = t5.id_contributeur
			WHERE id_objet = :id_objet
			";
	$req = $bdd->prepare($sql);
	$req->bindParam(':id_objet', $id_objet, PDO::PARAM_INT);
	$req->execute();
	$result = $req->fetch(PDO::FETCH_ASSOC);
	$count_avis_objet     = $result['count_avis'];
	$note_arrondi = number_format($result['moyenne'],1);

	$sql11 = "SELECT COUNT(contributeurs_id_contributeur) AS count_aime
				FROM contributeurs_aiment_objets AS t1
					WHERE objets_id_objet = :id_objet";
	$req11 = $bdd->prepare($sql11);
	$req11->bindParam(':id_objet', $id_objet, PDO::PARAM_INT);
	$req11->execute();
	$result11 = $req11->fetch(PDO::FETCH_ASSOC);
	$count_aime = $result11['count_aime'];

	$sql12 = "SELECT COUNT(contributeurs_id_contributeur) AS count_aime_pas
				FROM contributeurs_aiment_pas_objets AS t1
					WHERE objets_id_objet = :id_objet";
	$req12 = $bdd->prepare($sql12);
	$req12->bindParam(':id_objet', $id_objet, PDO::PARAM_INT);
	$req12->execute();
	$result12 = $req12->fetch(PDO::FETCH_ASSOC);
	$count_aime_pas = $result12['count_aime_pas'];

	$sql13 = "SELECT COUNT(contributeurs_id_contributeur) AS count_wish
				FROM contributeurs_wish_objets AS t1
					WHERE objets_id_objet = :id_objet";
	$req13 = $bdd->prepare($sql13);
	$req13->bindParam(':id_objet', $id_objet, PDO::PARAM_INT);
	$req13->execute();
	$result13 = $req13->fetch(PDO::FETCH_ASSOC);
	$count_wish = $result13['count_wish'];	
	
	
	// Labels et recommandations
	$sql5 = "SELECT * FROM objets_labelsuniiti AS t1
				INNER JOIN labelsuniiti AS t2
				ON t1.id_label = t2.id_label
					WHERE objets_id_objet=:id_objet";
	$req5 = $bdd->prepare($sql5);
	$req5->bindParam(':id_objet', $id_objet, PDO::PARAM_INT);
	$req5->execute();
	$result5 = $req5->fetchAll(PDO::FETCH_ASSOC);
	
	$sql6 = "SELECT * FROM objets_recommandations AS t1
				INNER JOIN recommandations AS t2
				ON t1.id_recommandation = t2.id_recommandation
					WHERE objets_id_objet=:id_objet";
	$req6 = $bdd->prepare($sql6);
	$req6->bindParam(':id_objet', $id_objet, PDO::PARAM_INT);
	$req6->execute();
	$result6 = $req6->fetchAll(PDO::FETCH_ASSOC);

	// Mots clés
	$sql7 = "SELECT id_type_info, id_motcle1, id_motcle2, id_motcle3 FROM objets_infos_motscles WHERE objets_id_objet=" . $id_objet;
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
	
	$Chemin = SITE_URL . "/photos/objets/couvertures/";
	
	$datacouv = "{step : 1, "
			. "type : 'objet', "
			. "id_objet : " . $id_objet . ", "
			. "cheminbox : '" . SITE_URL . "/photos/objets/box/', "
			. "box : '" . $box_objet . "', "
			. "chemin : '" . SITE_URL . "/photos/objets/couvertures/', "
			. "image1 : '" . $slide1_objet . "', "
			. "image2 : '" . $slide2_objet . "', "
			. "image3 : '" . $slide3_objet . "', "
			. "image4 : '" . $slide4_objet . "', "
			. "image5 : '" . $slide5_objet . "', "
			. "x1 : '" . $x1_objet . "', "
			. "y1 : '" . $y1_objet . "', "
			. "y2 : '" . $y2_objet . "', "
			. "y3 : '" . $y3_objet . "', "
			. "y4 : '" . $y4_objet . "', "
			. "y5 : '" . $y5_objet . "'}";
			
	$datamodif = "{type : 'objet', "
			. "id_objet : " . $id_objet . ", "
			. "nom_objet:'" . addslashes($nom_objet) . "', "
			. "descriptif:'" . str_replace(PHP_EOL ,'\n', addslashes($descriptif)) . "', "
			. "id_ville:'" . $id_ville . "', "
			. "id_categorie:" . $id_categorie . ", "
			. "id_sous_categorie:" . $id_sous_categorie . ", "
			. "id_sous_categorie2:" . $id_sous_categorie2 . ", "
			. "url:'" . $url . "', "
			. "url_video:'" . $url_video . "'}";

	$datainfospratiques = "{type : 'objet', "
			. "id_objet : " . $id_objet . ", "
			. "couleur:'" . $couleur . "', "
			. "nom_objet:'" . addslashes($nom_objet) . "', "
			. "ville_objet:'" . addslashes($ville_objet) . "'}";

	if ($Admin) {

		$Engrenage = "OuvrePopin(" . $datamodif . ", '/includes/popins/dashboard_infos_generales_objet.tpl.php', 'default_dialog');";
		$MotsCles = "OuvrePopin(" . $datamodif . ", '/includes/popins/dashboard_mots_clefs.tpl.php', 'default_dialog');";
		$Menutarifs = "OuvrePopin({id_objet : " . $id_objet . "}, '/includes/popins/dashboard_menutarifs.tpl.php', 'default_dialog_large');";
		$Infospratiques = "OuvrePopin({id_objet : " . $id_objet . "}, '/includes/popins/dashboard_infospratiques.tpl.php', 'default_dialog_large');";
		$Video = "OuvrePopin(" . $datamodif . ", '/includes/popins/dashboard_video.tpl.php', 'default_dialog');";
		$LabelsCaptain = "OuvrePopin(" . $datamodif . ",'/includes/popins/dashboard_petitmot_objet.tpl.php', 'default_dialog');";
		$Recommandations = "OuvrePopin(" . $datamodif . ",'/includes/popins/dashboard_petitmot_objet.tpl.php', 'default_dialog');";

		$Reservation = "OuvrePopin(" . $datamodif . ", '/includes/popins/reservation_step1.tpl.php', 'default_dialog')";
		$Modulereservation = "OuvrePopin(" . $datamodif . ", '/includes/popins/module_reservation.tpl.php', 'default_dialog');";		
		$AvisObjet = "OuvrePopin(" . $datamodif . ", '/includes/popins/avis_objet.tpl.php', 'default_dialog');";
	} else {
		$Engrenage = "OuvrePopin(" . $datamodif . ", '/includes/popins/utilisateur_demande_modifs.tpl.php', 'default_dialog')";
		$Video = "OuvrePopin(" . $datamodif . ", '/includes/popins/utilisateur_demande_modifs.tpl.php', 'default_dialog')";
		$Reservation = "OuvrePopin(" . $datamodif . ", '/includes/popins/reservation_step1.tpl.php', 'default_dialog')";
		$Menutarifs = "OuvrePopin({id_objet : " . $id_objet . "}, '/includes/popins/menutarifs.tpl.php', 'default_dialog_large');";
		$Infospratiques = "OuvrePopin(" . $datainfospratiques . ", '/includes/popins/infospratiques.tpl.php', 'default_dialog_large');";
		$Modulereservation = "OuvrePopin(" . $datamodif . ", '/includes/popins/module_reservation.tpl.php', 'default_dialog');";		
		$AvisObjet = "OuvrePopin(" . $datamodif . ", '/includes/popins/avis_objet.tpl.php', 'default_dialog');";
		
		if(isset($_SESSION['SESS_MEMBER_ID'])) {
			$dataLDW = "{id_contributeur :" . $_SESSION['SESS_MEMBER_ID'] . ", type : 'objet', id_enseigne_ou_objet :" . $id_objet . ", categorie : '" . addslashes($categorie) . "'}";
			$like_step1 = "OuvrePopin(" . $dataLDW . ", '/includes/popins/like_step1.tpl.php', 'default_dialog');";
			$dislike_step1 = "OuvrePopin(" . $dataLDW . ", '/includes/popins/dislike_step1.tpl.php', 'default_dialog');";
			$wishlist_step1 = "OuvrePopin(" . $dataLDW . ", '/includes/popins/wishlist_step1.tpl.php', 'default_dialog');";
		} else {
			$like_step1 = $dislike_step1 = $wishlist_step1 = "OuvrePopin({}, '/includes/popins/ident.tpl.php', 'default_dialog');";
		}
	}	
			
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
        <div class="biggymarginer" style="display:none;">
        <div class="big_wrapper" id="test">
            <div class="liseret" style="background-color:<?php echo $couleur; ?>;"></div>
            <div class="commerce_head" style="height:104px ! important;">
                <div class="commerce_head_desc">
                    <div class="commerce_head_desc_title"><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/chaussure.png" title="" alt="" /></div><h2><?php echo $nom_objet; ?></h2></div>
					<?php if (!$Admin) { ?>
                    <div class="commerce_head_desc_social">
                        <div class="overlay_social_buttons">
                        <img src="<?php echo SITE_URL; ?>/img/pictos_actions/fb_logo.png" title="" alt="" height="24" width="24" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_actions/tw_logo.png" title="" alt="" height="24" width="24" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_actions/g_logo.png" title="" alt="" height="24" width="24" />
                        </div>
                        <span>Partager</span>
                    </div>
					<?php } else { ?>
                    <div class="utilisateur_interface_engrenage">
                        <div class="utilisateur_interface_engrenage_img_container"><a href="#" class="link_engrenage_button" title="" onclick="<?php echo $Engrenage; ?>"></a></div>
                    </div>
					<?php } ?>
                    <div class="clearfix"></div>
                    <div class="separateur"></div>
                    <div class="clearfix"></div>
                    <div class="commerce_head_desc_address" id="commerce_head_desc_address_button"><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/marker_map.png" title="" alt="" height="23" width="15"/></div><div id="commerce_head_desc_address_wrap"><address>Où le trouver ?</address><span><?php echo $ville_objet; ?></span></div></div>
                    <div class="commerce_head_desc_ariane" id="commerce_head_desc_ariane_button"><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/etiquette.png" title="" alt="" height="20" width="23" /></div><div id="commerce_head_desc_ariane_wrap"><span>Objet > <?php echo $categorie; ?> > <?php echo $sous_categorie; ?></span><span class="commerce_head_desc_ariane_lastcat"><?php echo $sous_categorie2; ?></span></div></div>
                    <div class="clearfix"></div>
                    <div class="separateur"></div>
                    <div class="clearfix"></div>
                </div>
                <div class="commerce_head_note">
                    <div class="commerce_head_note_stars">
						<?php echo AfficheEtoiles($note_arrondi, $categorie); ?>
                    </div>
                    <div class="center_note">
                    <span class="commerce_head_note_note"><?php echo $note_arrondi; ?></span><span class="commerce_head_note_note10">/10</span>
                    </div>
                    <span class="commerce_head_note_avis"><?php echo $count_avis_objet; ?> Avis</span>
                </div>
				<?php if ($id_objet != 0) { ?>
                <div class="commerce_head_infos" style="height:104px ! important;">
                    <div class="commerce_head_infos_services" onclick="<?php echo $Menutarifs; ?>"><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/prestationstarifs.png" alt="" title="" height="59" width="59" /></div><div class="commerce_head_infos_services_text"><span class="commerce_head_infos_services_text_fin">Prestations</span><span class="commerce_head_infos_services_text_couleur" style="color:<?php echo $couleur; ?>;">& Tarifs</span></div></div>
					<div class="commerce_head_infos_infos" onclick="<?php echo $Infospratiques; ?>"><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/coupe.png" alt="" title="" height="59" width="59" /></div><div class="commerce_head_infos_infos_text"><span class="commerce_head_infos_infos_text_fin">Classement</span><span class="commerce_head_infos_infos_text_couleur" style="color:<?php echo $couleur; ?>;"><?php echo $sous_categorie; ?></span></div></div>
                    <div class="utilisateur_head_infos_suggestion">
						<div class="commerce_reservation_commerce">
							<div style="float:left;" <?php if ($Admin) {echo "onclick=\"" . $MotsCles . "\"";} ?>>
								<div class="img_container" style="float:left;padding-right: 5px;padding-top: 10px !important; width: 30px;"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/infosrapides1.png" alt="" title="" height="26" width="21" /></div>
								<?php if ($AfficheMotcle[1]) { foreach ($MotCle[1] as $id_motcle => $motcle) { 
								echo "<span style=\"float:left;\">" . $motcle . "</span>"; 
								}} ?>
							</div>
						</div>
                        <div class="commerce_optin_commerce" onclick="<?php echo $AvisObjet; ?>"><span class="utilisateur_suggerer_objet_firstcat">Ajouter un avis</span></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
				<?php } ?>
            </div>
            <div class="commerce_head2">
                <div class="commerce_head2_coinvideo" <?php if (($Admin) && ($id_objet != 0)) {echo 'onclick="'.$Video.'"';} ?>>
                    <div class="commerce_head2_coinvideo_text"><span class="commerce_head2_text1_1">Coin</span><span class="commerce_head2_text2_1" style="color:<?php echo $couleur; ?>;">Vidéo</span></div><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/play.png" alt="" title="" height="19" width="19" /></div>
                </div>
                <div class="commerce_head2_right">
                <div class="commerce_head2_avis"><span class="commerce_head2_text1">Nombre</span><span class="commerce_head2_text2" style="color:<?php echo $couleur; ?>;">Avis</span><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/star_0.png" alt="" title="" height="19" width="19" /></div><div class="commerce_head2_text3"><span><?php echo $count_avis_objet; ?></span></div></div>
                <div class="commerce_head2_avis"><span class="commerce_head2_text1">Nombre</span><span class="commerce_head2_text2" style="color:<?php echo $couleur; ?>;">J'aime</span><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/star_0.png" alt="" title="" height="19" width="19" /></div><div class="commerce_head2_text3"><span><?php echo $count_aime; ?></span></div></div>
                <div class="commerce_head2_avis"><span class="commerce_head2_text1">Nombre</span><span class="commerce_head2_text2" style="color:<?php echo $couleur; ?>;">J'aime pas</span><div class="img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/star_0.png" alt="" title="" height="19" width="19" /></div><div class="commerce_head2_text3"><span><?php echo $count_aime_pas; ?></span></div></div>
                </div>
            </div>
            <div class="commerce_couv">
                <div class="ligne_verticale1"></div>
                <div class="ligne_verticale2"></div>
				
				<div class="couv_container">
					<?php if ($slide1_objet != "" && $slide2_objet == "" && $slide3_objet == "" && $slide4_objet == "" && $slide5_objet == "") { ?><img id="couv1" src="<?php echo $Chemin . $slide1_objet; ?>" title="" alt=""><?php } ?>
				    <div id="couv_slides">
 					<?php if ($slide1_objet != "") { ?><img id="couv1" src="<?php echo $Chemin . $slide1_objet . "?" . time(); ?>" title="" alt=""><?php } ?>
					<?php if ($slide2_objet != "") { ?><img id="couv2" src="<?php echo $Chemin . $slide2_objet . "?" . time(); ?>" title="" alt=""><?php } ?>					
 					<?php if ($slide3_objet != "") { ?><img id="couv3" src="<?php echo $Chemin . $slide3_objet . "?" . time(); ?>" title="" alt=""><?php } ?>
					<?php if ($slide4_objet != "") { ?><img id="couv4" src="<?php echo $Chemin . $slide4_objet . "?" . time(); ?>" title="" alt=""><?php } ?>
					<?php if ($slide5_objet != "") { ?><img id="couv5" src="<?php echo $Chemin . $slide5_objet . "?" . time(); ?>" title="" alt=""><?php } ?>
				    </div>
					<?php if (!$Admin) { ?>
					<div class="wrapper_boutons">
						<div class="boutons not_signedin" title="J'aime" onclick="<?php echo $like_step1; ?>" class="boutons_action_popin" <?php echo AfficheAction('aime',$categorie); ?>></div>
						<div class="boutons not_signedin" title="Je n'aime pas" onclick="<?php echo $dislike_step1; ?>" class="boutons_action_popin" <?php echo AfficheAction('aime_pas',$categorie); ?>></div>
						<div class="boutons not_signedin" title="Ajouter à ma Wishlist" onclick="<?php echo $wishlist_step1; ?>" class="boutons_action_popin" <?php echo AfficheAction('wish',$categorie); ?>></div>
					</div>
					<?php } ?>					
				</div>
                
				<?php if ($id_objet != 0) { ?>
			
				<div class="commerce_concept"><a class="button_show_concept" href="#" title="" onclick="<?php echo $LabelsCaptain; ?>"><span style="color:<?php echo $couleur; ?>">Concept</span><div class="commerce_concept_arrow concept_arrow_up"></div></a><p class="concept_content"><?php echo $descriptif ?></p></div>

			
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
					<div class="commerce_interface_modifier_box" onclick="OuvrePopin(<?php echo $datacouv;?>, '/includes/popins/box_step1.tpl.php', 'default_dialog_large');"><div class="utilisateur_interface_modifier_icon_noir"></div><span>Changer la box</span></div>
					<div class="commerce_interface_modifier_popin" onclick="OuvrePopin(<?php echo $datacouv;?>, '/includes/popins/vignette_step1.tpl.php', 'default_dialog_large');"><div class="utilisateur_interface_modifier_icon_noir"></div><span>Changer la popin</span></div>
					<div class="commerce_interface_modifier_couv" onclick="OuvrePopin(<?php echo $datacouv;?>, '/includes/popins/couverture_step1.tpl.php', 'default_dialog_large');"><div class="utilisateur_interface_modifier_icon_noir"></div><span>Changer les couvertures</span></div>
					<?php } ?>
				<?php } ?>
				<?php if (!$Admin) { ?>
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
							<span>Découvrez</span><span class="commerce_couv_video_txt_left_colored"><?php echo $nom_objet; ?></span><span>en vidéo !</span>
						</div>
						<div class="commerce_couv_video_embbed">
							<iframe id="lienvideo" width="" height="" src="" frameborder="0" allowfullscreen></iframe>
						</div>
					</div>
				</div>
				<?php } ?>				
				
            </div>
        
        <!-- FILTRE DE TRI -->
        <?php include'../includes/filters_objet_interface.php' ?>
        <!-- FIN FILTRE DE TRI -->
        </div>
        <!-- FIN BIG WRAPPER -->
        <!-- CONTENU PRINCIPAL -->
        <div id="box_container" class="content utilisateur_boxes">
			<?php include '../includes/requeteobjet.php' ?> 
		</div>
 
		<div id="commerce_stats">
<!--			<div class="commerce_prefs_stats_tableau"></div> -->
			<div id="prefs_items_container">
				<div class="commerce_prefs_stats_item">
					<span class="commerce_prefs_stats_item_nbr"><?php echo $count_avis_objet; ?></span>
					<span class="commerce_prefs_stats_item_titre">Nombre d'avis</span>
				</div>
				<div class="commerce_prefs_stats_item">
					<span class="commerce_prefs_stats_item_nbr"><?php echo $count_aime; ?></span>
					<span class="commerce_prefs_stats_item_titre">Nombre de j'aime</span>
				</div>
				<div class="commerce_prefs_stats_item">
					<span class="commerce_prefs_stats_item_nbr"><?php echo $count_wish; ?></span>
					<span class="commerce_prefs_stats_item_titre">Nombre d'ajout liste de souhaits</span>
				</div>
				<div class="commerce_prefs_stats_item">
					<span class="commerce_prefs_stats_item_nbr"><?php echo $count_aime_pas; ?></span>
					<span class="commerce_prefs_stats_item_titre">Nombre de j'aime pas</span>
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
			$('#couv_slides').slidesjs2({width: 1736,height: 496,play: {active: true,auto: true,interval: 6000,swap: true},effect: {slide: {speed: 3000}}});
		})
		
		function InitCouvertures() {
		
			y[1] = <?php if ($y1_objet != '') {echo $y1_objet;} else {echo 0;} ?>;
			y[2] = <?php if ($y2_objet != '') {echo $y2_objet;} else {echo 0;} ?>;
			y[3] = <?php if ($y3_objet != '') {echo $y3_objet;} else {echo 0;} ?>;
			y[4] = <?php if ($y4_objet != '') {echo $y4_objet;} else {echo 0;} ?>;
			y[5] = <?php if ($y5_objet != '') {echo $y5_objet;} else {echo 0;} ?>;
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
					$('.SuivreContributeur'+data.id_contributeur).attr('src', siteurl+'/img/pictos_utilisateurs/picto_user_suivi.png');
				} else {
					$('.SuivreContributeur'+data.id_contributeur).attr('src', siteurl+'/img/pictos_utilisateurs/suivre.png');				
				}
			},
			error: function() {alert('Erreur sur url : ' + url);}
		});
	}
	
	function InitFollowContributeur() {
		$('#box_container').find('.box_suivre_user').each(function() {
			var contributeur = $(this).find("img").attr("class").replace(/SuivreContributeur/gi, "");
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
