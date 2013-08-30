<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
        <?php
        include_once '../config/configuration.inc.php';
        include'../includes/head.php';
		include_once '../includes/fonctions.inc.php';
		include_once '../config/configPDO.inc.php';

	if (!empty($_GET['id_contributeur'])) {$id_contributeur = $_GET['id_contributeur'];}
	else {echo "vous ne pouvez pas accéder directement à cette page !\n<a href=\"" . SITE_URL . "\">Revenir à la page principale</a>"; exit;}
		
	$sql = "SELECT * FROM contributeurs WHERE id_contributeur = " . $id_contributeur;

	$req = $bdd->prepare($sql);
	$req->execute();
	$result = $req->fetch(PDO::FETCH_ASSOC);
 
	$photo_contributeur     = $result['photo_contributeur'];
	$prenom_contributeur    = $result['prenom_contributeur'];
	$nom_contributeur       = $result['nom_contributeur'];
	$sexe_contributeur 		= $result['sexe_contributeur'];
	$cp_contributeur 		= $result['cp_contributeur'];
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
?>
<body>    
    <div id="default_dialog_large"></div>
    <div id="default_dialog"></div>
        <?php include'../includes/header.php'; ?>
    <div class="biggymarginer">
        <div class="big_wrapper">
            
            <div class="liseret_gris"></div>
            <div class="objet_head">
                <div class="objet_head_desc">
                    <div class="utilisateur_head_desc_title">
                        <div class="img_container">
                            <img src="../img/pictos_utilisateurs/avatar.png" height="28" width="28" title="" alt="" />
                            </div>
                        <h2><?php echo $prenom_contributeur . " " . $nom_contributeur; ?></h2>
                    </div>
                    <div class="utilisateur_interface_engrenage">
                        <div class="utilisateur_interface_engrenage_img_container"><img src="../img/pictos_utilisateurs/utilisateur_interface_engrenage_icon.png" height="20" width="20" title="" alt=""/></div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="separateur"></div>
                    <div class="clearfix"></div>
                    <div class="utilisateur_head_desc_avatar">
                        <div class="img_container">
                            <img src="../img/avatars/3.jpg" title="" alt="" height="120" width="120"/>
                            <div class="utilisateur_interface_modifier_couv"><a href="#" title="" class="button_changer_couverture" onclick="OuvrePopin({step:1}, '/includes/popins/couverture_steps.tpl.php', 'default_dialog_large');"><div class="utilisateur_interface_modifier_icon_noir"><img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/interface_crayon_icon_n.png" title="" alt="" height="12" width="12" /></div><span>changer l'avatar</span></a></div>
                        
                        </div>
                    </div>
                    <div class="utilisateur_head_desc_desc"><div class="img_container"><img src="../img/marker_map.png" title="" alt="" height="23" width="15"/></div><span><?php switch ($sexe_contributeur) {case 1: echo "Homme";break; case 0: echo "Femme";break;}?></span><span class="utilisateur_head_desc_desc_lastcat"><?php echo $age; ?></span></div>
                    <div class="utilisateur_head_desc_desc2"><div class="img_container"><img src="../img/pictos_commerces/etiquette.png" title="" alt="" height="20" width="23" /></div><span>Restaurateur</span><span class="utilisateur_head_desc_desc2_lastcat">Paris</span></div>
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
                    <div class="utilisateur_head_infos_suggestion">
                        <div class="utilisateur_suggerer_commerce"><a href="#" title=""><span class="utilisateur_suggerer_commerce_firstcat">Suggérer</span><span class="utilisateur_suggerer_commerce_lastcat"> commerce</span></a></div>
                        <div class="clearfix"></div>
                        <div class="utilisateur_suggerer_objet"><a href="#" title=""><span class="utilisateur_suggerer_objet_firstcat">Suggérer</span><span class="utilisateur_suggerer_objet_lastcat"> objet</span></a></div>
                    </div>
                </div>
            </div>
            <div class="commerce_head2">
                <div class="commerce_head2_right">
                <div class="utilisateur_head2_avis"><span class="commerce_head2_text1">Nombre</span><span class="objet_head2_text2">Avis</span></div><div class="img_container"><img src="../img/pictos_commerces/star_0.png" alt="" title="" height="18" width="21" /></div><div class="commerce_head2_text3_end"><span><?php echo $count_avis_contributeur; ?></span></div>
                <div class="utilisateur_head2_abonnes"><span class="commerce_head2_text1">Nombre</span><span class="objet_head2_text2">Abonnés</span></div><div class="img_container"><img src="../img/pictos_commerces/abonnes.png" alt="" title="" height="18" width="21" /></div><div class="commerce_head2_text3_end"><span>23</span></div>
                </div>
            </div>
            <div class="commerce_couv">
                <div class="ligne_verticale4"></div>
                <div class="ligne_verticale5"></div>
                <img src="../img/photos_commerces/couv3.jpg" title="" alt="" />
                <div class="commerce_concept"><a class="button_show_concept_utilisateur" href="#" title=""><div class="utilisateur_interface_modifier_icon_blanc"><img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/interface_crayon_icon_b.png" title="" alt="" height="12" width="12" /></div><span>Description</span><div class="commerce_concept_arrow concept_arrow_up"></div></a><p class="concept_content">En plein coeur du quartier des théâtres, Le Comptoir des Artistes est le restaurant idéal pour dîner avant ou après un spectacle.</p></div>
                <div class="commerce_gerant"><div class="gerant_title gerant_title_utilisateur"><a class="button_show_concept_utilisateur" href="#" title=""><p>Son commerce</p></a></div><div class="utilisateur_gerant_photo"><img src="../img/photos_commerces/1.jpg" title="" alt="" /></div></div>
                
                <div class="utilisateur_interface_modifier_couv"><a href="#" title="" class="button_changer_couverture" onclick="OuvrePopin({step:1}, '/includes/popins/couverture_steps.tpl.php', 'default_dialog_large');"><div class="utilisateur_interface_modifier_icon_noir"><img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/interface_crayon_icon_n.png" title="" alt="" height="12" width="12" /></div><span>changer les couvertures</span></a></div>
                
            </div>
           
        
			<!-- FILTRE DE TRI -->
			<?php include'../includes/filters.php' ?>
			<!-- FIN FILTRE DE TRI -->
		</div>
    
        <!-- FIN BIG WRAPPER -->
        <!-- CONTENU PRINCIPAL -->
        <div id="box_container" class="content">
   			<?php $Contributeur = 1; include '../includes/requetecontributeur.php' ?>
        </div>
        <!-- FIN CONTENU PRINCIPAL -->
        <!-- FOOTER -->
        <div class="uniiti_footer big_wrapper">
            <div class="uniiti_footer_loader_barre_horizontale"></div>
            <div class="uniiti_footer_loader">
                <img src="<?php echo SITE_URL; ?>/img/pictos_actions/gif_uniiti.gif" height="70" width="70"/>
            </div>
        </div>
        <!-- FIN FOOTER -->
        
        <!-- FIN BIGGY -->

    </div>
        <?php include'../includes/js.php' ?>
		
    </body>
</html>
