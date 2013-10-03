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
	
	$PAGE = "Utilisateur";

	if (!empty($_GET['id_contributeur'])) {$id_contributeur = $_GET['id_contributeur'];}
	else {echo "vous ne pouvez pas accéder directement à cette page !\n<a href=\"" . SITE_URL . "\">Revenir à la page principale</a>"; exit;}

	if(isset($_SESSION['SESS_MEMBER_ID'])) {
		$dataLDW = "{id_contributeur :" . $id_contributeur . "}";
	}
	
	$sql = "SELECT * FROM contributeurs WHERE id_contributeur = " . $id_contributeur;

	$req = $bdd->prepare($sql);
	$req->execute();
	$result = $req->fetch(PDO::FETCH_ASSOC);
 
	$photo_contributeur     = $result['photo_contributeur'];
	$slide1_contributeur    = $result['slide1_contributeur'];
	$slide2_contributeur    = $result['slide2_contributeur'];
	$slide3_contributeur    = $result['slide3_contributeur'];
	$slide4_contributeur    = $result['slide4_contributeur'];
	$slide5_contributeur    = $result['slide5_contributeur'];
	$y1_contributeur	    = $result['y1'];
	$y2_contributeur	    = $result['y2'];
	$y3_contributeur	    = $result['y3'];
	$y4_contributeur	    = $result['y4'];
	$y5_contributeur	    = $result['y5'];
	$prenom_contributeur    = $result['prenom_contributeur'];
	$nom_contributeur       = $result['nom_contributeur'];
	$sexe_contributeur 		= $result['sexe_contributeur'];
	$cp_contributeur 		= $result['cp_contributeur'];
	$ville_contributeur 	= $result['ville_contributeur'];
	$profession_contributeur = $result['profession_contributeur'];
	$date_naissance_jour_contributeur 		= $result['date_naissance_jour_contributeur'];
	$date_naissance_mois_contributeur 		= $result['date_naissance_mois_contributeur'];
	$date_naissance_annee_contributeur 		= $result['date_naissance_annee_contributeur'];
	$email_contributeur 	= $result['email_contributeur'];

	$RequeteNow = $bdd->prepare("select NOW() AS Maintenant");
	$RequeteNow->execute();
	$Maintenant = $RequeteNow->fetchAll(PDO::FETCH_ASSOC);

	$age = Age($Maintenant[0]['Maintenant'], $date_naissance_jour_contributeur, $date_naissance_mois_contributeur, $date_naissance_annee_contributeur);

	$sql = "SELECT COUNT(avis_id_avis) AS count_avis FROM contributeurs_donnent_avis WHERE contributeurs_id_contributeur = " . $id_contributeur;

	$req = $bdd->prepare($sql);
	$req->execute();
	$result = $req->fetch(PDO::FETCH_ASSOC);
	$count_avis_contributeur = $result['count_avis'];

	$sql3 = "SELECT COUNT(contributeurs_id_contributeur) AS count_abonnes
			FROM contributeurs_follow_contributeurs AS t1
			WHERE contributeurs_id_contributeur = :id_contributeur
			";
	$req3 = $bdd->prepare($sql3);
	$req3->bindParam(':id_contributeur', $id_contributeur, PDO::PARAM_INT);
	$req3->execute();
	$result3 = $req3->fetch(PDO::FETCH_ASSOC);
	$count_abonnes = $result3['count_abonnes'];
	
	$Chemin = SITE_URL . "/photos/utilisateurs/couvertures/";
	
?>
<body>
    <div id="default_dialog_large"></div>
    <div id="default_dialog"></div>
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
        <div class="big_wrapper">
            
            <div class="liseret_gris"></div>
            <div class="objet_head">
                <div class="objet_head_desc">
                    <div class="utilisateur_head_desc_title"><div class="img_container"><img src="../img/pictos_utilisateurs/avatar.png" height="28" width="28" title="" alt="" /></div><h2><?php echo $prenom_contributeur . " " . ucFirstOtherLower(tronqueName($nom_contributeur, 1)); ?></h2></div>
                    <div class="clearfix"></div>
                    <div class="separateur"></div>
                    <div class="clearfix"></div>
                    <div class="utilisateur_head_desc_avatar"><div class="img_container"><img class="user_avatar_target" src="<?php echo SITE_URL . "/photos/utilisateurs/avatars/" . $photo_contributeur;?>" title="" alt="" height="120" width="120"/></div></div>
                    <div class="utilisateur_head_desc_desc"><div class="img_container"><img src="../img/marker_map.png" title="" alt="" height="23" width="15"/></div><span><?php switch ($sexe_contributeur) {case 1: echo "Homme";break; case 0: echo "Femme";break;}?></span><span class="utilisateur_head_desc_desc_lastcat"><?php echo $age; ?></span></div>
                    <div class="utilisateur_head_desc_desc2"><div class="img_container"><img src="../img/pictos_commerces/etiquette.png" title="" alt="" height="20" width="23" /></div><span><?php echo $profession_contributeur; ?></span><span class="utilisateur_head_desc_desc2_lastcat"><?php echo $ville_contributeur; ?></span></div>
                    </div>
                <div class="objet_head_note">
                    <div class="objet_head_note_stars">
                        <img src="../img/pictos_utilisateurs/trust.png" title="" alt="" height="17" width="18" />
                        <img src="../img/pictos_utilisateurs/trust.png" title="" alt="" height="17" width="18" />
                        <img src="../img/pictos_utilisateurs/trust.png" title="" alt="" height="17" width="18" />
                        <img src="../img/pictos_utilisateurs/trust.png" title="" alt="" height="17" width="18" />
                        <img src="../img/pictos_utilisateurs/trust.png" title="" alt="" height="17" width="18" />
                    </div>
                    <div class="center_note">
                    <span class="objet_head_note_note">7</span><span class="objet_head_note_note10">/10</span>
                    <span class="objet_head_note_avis">105 personnes le trust</span>
                    </div>
                </div>
                <div class="objet_head_infos">
                    <div class="separateur"></div>
                    <div class="objet_head_infos_services"><div class="img_container"><img src="../img/pictos_commerces/coupe.png" alt="" title="" height="41" width="39" /></div><div class="objet_head_infos_services_text"><span class="objet_head_infos_services_text_fin">Classement</span><span class="objet_head_infos_services_text_couleur">Paris</span></div><span class="objet_head_infos_services_classement">635<sup>ème</sup></span></div>
                    
                    <div class="objet_head_infos_infos"><div class="img_container"><img src="../img/pictos_commerces/coupe.png" alt="" title="" height="41" width="39" /></div><div class="objet_head_infos_infos_text"><span class="objet_head_infos_infos_text_fin">Classement</span><span class="objet_head_infos_infos_text_couleur">Sport</span></div><span class="objet_head_infos_infos_classement">85<sup>ème</sup></span></div>
                    <div class="objet_head_infos_suivre" id="Suivre"><span id="TexteSuivre" class="objet_head_infos_suivre_firstcat">Suivre</span><span class="objet_head_infos_suivre_lastcat"><?php echo $prenom_contributeur; ?></span><div class="img_container"><img id="ImageSuivre" src="../img/pictos_commerces/suivre.png" alt="" height="43" width="37" /></div></div>
                </div>
            </div>
            <div class="commerce_head2">
                <div class="commerce_head2_right">
                <div class="utilisateur_head2_avis"><span class="commerce_head2_text1">Nombre</span><span class="objet_head2_text2">Avis</span></div><div class="img_container"><img src="../img/pictos_commerces/star_0.png" alt="" title="" height="17" width="18" /></div><div class="commerce_head2_text3_end"><span><?php echo $count_avis_contributeur; ?></span></div>
                <div class="utilisateur_head2_abonnes"><span class="commerce_head2_text1">Nombre</span><span class="objet_head2_text2">Abonnés</span></div><div class="img_container"><img src="../img/pictos_commerces/abonnes.png" alt="" title="" height="18" width="19" /></div><div class="commerce_head2_text3_end"><span><?php echo $count_abonnes; ?></span></div>
                </div>
            </div>
            <div class="commerce_couv">
                <div class="ligne_verticale4"></div>
                <div class="ligne_verticale5"></div>
				<div class="couv_container">
					<?php if ($slide1_contributeur != "" && $slide2_contributeur == "" && $slide3_contributeur == "" && $slide4_contributeur == "" && $slide5_contributeur == "") { ?><img id="couv1" src="<?php echo $Chemin . $slide1_contributeur; ?>" title="" alt=""><?php } ?>
				    <div id="couv_slides">
 					<?php if ($slide1_contributeur != "") { ?><img id="couv1" src="<?php echo $Chemin . $slide1_contributeur; ?>" title="" alt=""><?php } ?>
					<?php if ($slide2_contributeur != "") { ?><img id="couv2" src="<?php echo $Chemin . $slide2_contributeur; ?>" title="" alt=""><?php } ?>					
 					<?php if ($slide3_contributeur != "") { ?><img id="couv3" src="<?php echo $Chemin . $slide3_contributeur; ?>" title="" alt=""><?php } ?>
					<?php if ($slide4_contributeur != "") { ?><img id="couv4" src="<?php echo $Chemin . $slide4_contributeur; ?>" title="" alt=""><?php } ?>
					<?php if ($slide5_contributeur != "") { ?><img id="couv5" src="<?php echo $Chemin . $slide5_contributeur; ?>" title="" alt=""><?php } ?>
				    </div>
				</div>
                <div class="commerce_concept"><a class="button_show_concept_utilisateur" href="#" title=""><span>Description</span><div class="commerce_concept_arrow concept_arrow_up"></div></a><p class="concept_content">En plein coeur du quartier des théâtres, Le Comptoir des Artistes est le restaurant idéal pour dîner avant ou après un spectacle.</p></div>
                <div class="commerce_gerant"><div class="gerant_title gerant_title_utilisateur"><a class="button_show_concept_utilisateur" href="#" title=""><p>Son commerce</p></a></div><div class="utilisateur_gerant_photo"><img src="../img/photos_commerces/1.jpg" title="" alt="" /></div></div>
                
            </div>
           
        
			<!-- FILTRE DE TRI -->
			<?php include'../includes/filters.php' ?>
			<!-- FIN FILTRE DE TRI -->
		</div>
    
        <!-- FIN BIG WRAPPER -->
        <!-- CONTENU PRINCIPAL -->
        <div id="box_container" class="content">
   			<?php include '../includes/requetecontributeur.php' ?>
        </div>
        <!-- FIN CONTENU PRINCIPAL -->
    </div><!-- FIN BIGGY -->
        <!-- FOOTER -->
			<?php include '../includes/footer.php' ?>
        <!-- FIN FOOTER -->
        <?php include'../includes/js.php' ?>

	<script>
	
	// Gestion du slider des couvertures
	$(function() {
	  $('#couv_slides').slidesjs2({width: 1736,height: 496,play: {active: true,auto: true,interval: 6000,swap: true},effect: {slide: {speed: 3000}}
	  });
	})
	
	function InitCouvertures() {
	
		y[1] = <?php if ($y1_contributeur != '') {echo $y1_contributeur;} else {echo 0;} ?>;
		y[2] = <?php if ($y2_contributeur != '') {echo $y2_contributeur;} else {echo 0;} ?>;
		y[3] = <?php if ($y3_contributeur != '') {echo $y3_contributeur;} else {echo 0;} ?>;
		y[4] = <?php if ($y4_contributeur != '') {echo $y4_contributeur;} else {echo 0;} ?>;
		y[5] = <?php if ($y5_contributeur != '') {echo $y5_contributeur;} else {echo 0;} ?>;
		AjusteCouvertures($('.big_wrapper').css('width'));
	}
	InitCouvertures();
	// Fin gestion du slider des couvertures
	
	function AfficheFollow(data) {

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
	var $idcontributeur = <?php echo $id_contributeur; ?>;
	var data = {check : 1, id_contributeurACTIF : $idcontributeurACTIF, id_contributeur : $idcontributeur};
	AfficheFollow(data);

	$('#Suivre').click(function() {
		if ($idcontributeurACTIF == 0) {OuvrePopin({}, '/includes/popins/ident.tpl.php', 'default_dialog');}
		else {
				data = {check : 0, id_contributeurACTIF : $idcontributeurACTIF, id_contributeur : $idcontributeur};
				AfficheFollow(data);
			}
	});

	</script>


	</body>
</html>
