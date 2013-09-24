<?php 
	include_once '../../acces/auth.inc.php';                 // Gestion accès à la page - incluant la session	
	include_once '../../config/configuration.inc.php';
	include_once '../../config/configPDO.inc.php';
	include_once '../../includes/fonctions.inc.php';
	
	$RequeteNow = $bdd->prepare("select NOW() AS Maintenant");
	$RequeteNow->execute();
	$Maintenant = $RequeteNow->fetchAll(PDO::FETCH_ASSOC);
		
	$sql = "SELECT categorie_principale, sous_categorie, nom_suggestion, date_suggestion, prenom_contributeur, nom_contributeur,
					description, cp_ou_ville FROM suggestions AS t1
							INNER JOIN sous_categories AS t2
							ON t1.id_sous_categorie = t2.id_sous_categorie
								INNER JOIN categories AS t3
								ON t1.id_categorie = t3.id_categorie 
									INNER JOIN contributeurs AS t4
									ON t1.id_contributeur = t4.id_contributeur WHERE type_suggestion='enseigne'";
	$req = $bdd->prepare($sql);
	$req->execute();		
	while ($row = $req->fetch(PDO::FETCH_ASSOC))
	{
		$nom_suggestion = $row['nom_suggestion'];
		$categorie = $row['categorie_principale'];
		$sous_categorie = $row['sous_categorie'];
		$description = $row['description'];
		$cp_ou_ville = $row['cp_ou_ville'];
		$delai_suggestion = EcartDate($Maintenant[0]['Maintenant'], $row['date_suggestion']);
	
?>                      
		<!-- ITEM SUGGESTION -->
		<div class="dashboard_notif_item">
			<div class="dashboard_notif_item_head">
				<div class="dashboard_notif_item_head_img_container">
					<img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/photo_notif.jpg"/>
				</div>
				<div class="dashboard_notif_item_head_desc">
					<span class="dashboard_notif_nom_commerce"><?php echo $row['nom_contributeur'] . ' ' . $row['prenom_contributeur']; ?></span>
					<span class="dashboard_notif_motif">Notification d'ajout de commerce</span>
					<span class="dashboard_notif_temps"><style>.box_posttime {color:white !important;}</style><?php echo $delai_suggestion; ?></span>
				</div>
				<div class="dashboard_notif_item_head_buttons">
					<a href="#" class="first_img_margin" title=""><img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_suppr.png"/></a>
					<a href="#" title=""><img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_valide.png"/></a>
				</div>
			</div>
			<div class="dashboard_notif_item_body">
				<div class="dashboard_notif_item_float_left">
					<span class="dashboard_notif_txt_bold2">Nom de l'enseigne :</span><span class="dashboard_notif_txt_normal2"> <?php echo $row['nom_suggestion']; ?></span>
				</div>
				
				<div class="dashboard_notif_item_float_left">
					<span class="dashboard_notif_txt_bold2">Catégorie :</span><span class="dashboard_notif_txt_normal2"> <?php echo $categorie; ?></span>
				</div>
				
				<div class="dashboard_notif_item_float_left">
					<span class="dashboard_notif_txt_bold2">Sous-catégorie :</span><span class="dashboard_notif_txt_normal2"> <?php echo $sous_categorie; ?></span>
				</div>
				
				<div class="dashboard_notif_item_float_left">
					<span class="dashboard_notif_txt_bold2">Descriptif :</span><span class="dashboard_notif_txt_normal2"> <?php echo $description; ?></span>
				</div>
				
				<div class="dashboard_notif_item_float_left">
					<span class="dashboard_notif_txt_bold2">Code postal ou ville :</span><span class="dashboard_notif_txt_normal2"> <?php echo $cp_ou_ville; ?></span>
				</div>
			</div>
		</div>
		<!-- ITEM -->
<?php } ?>                      