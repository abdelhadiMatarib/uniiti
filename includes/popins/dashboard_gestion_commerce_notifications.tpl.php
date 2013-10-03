<?php 
	include_once '../../acces/auth.inc.php';                 // Gestion accès à la page - incluant la session	
	include_once '../../config/configuration.inc.php';
	include_once '../../config/configPDO.inc.php';
	include_once '../../includes/fonctions.inc.php';
	
	$RequeteNow = $bdd->prepare("select NOW() AS Maintenant");
	$RequeteNow->execute();
	$Maintenant = $RequeteNow->fetchAll(PDO::FETCH_ASSOC);

	$sql2 = "SELECT nom_contributeur, prenom_contributeur, commentaire FROM avis AS t1
				INNER JOIN contributeurs_donnent_avis AS t2
				ON t1.id_avis = t2.avis_id_avis
					INNER JOIN contributeurs AS t3
					ON t2.contributeurs_id_contributeur = t3.id_contributeur
				WHERE t1.id_avis = :id_avis";
	$req2 = $bdd->prepare($sql2);
	
	$sql = "SELECT id_statut, description, date_notification, t1.id_action, action, id_enseigne_ou_objet, id_contributeur, id_avis, nom_enseigne FROM notifications AS t1
				INNER JOIN action_notification AS t2
				ON t1.id_action = t2.id_action
					INNER JOIN enseignes AS t3
					ON t1.id_enseigne_ou_objet = t3.id_enseigne WHERE type_notification='enseigne' AND id_statut = 1";
	$req = $bdd->prepare($sql);
	$req->execute();		
	while ($row = $req->fetch(PDO::FETCH_ASSOC))
	{
		$nom_enseigne = stripslashes($row['nom_enseigne']);
		$id_action = $row['id_action'];
		$action = stripslashes($row['action']);
		$description = stripslashes($row['description']);
		$delai_notification = EcartDate($Maintenant[0]['Maintenant'], $row['date_notification']);
			
		if ($id_action == 2) {
			$id_avis = $row['id_avis'];
			$req2->bindParam(':id_avis', $id_avis, PDO::PARAM_INT);
			$req2->execute();
			$result2 = $req2->fetch(PDO::FETCH_ASSOC);
			$commentaire = $description;
			$description = stripslashes($result2['commentaire']);
			$nom_contributeur = $result2['nom_contributeur'];
			$prenom_contributeur = $result2['prenom_contributeur'];
		}
?>                      
		<!-- ITEM NOTIFICATIONS -->
		<div class="dashboard_notif_item">
			<div class="dashboard_notif_item_head">
				<div class="dashboard_notif_item_head_img_container">
					<img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/photo_notif.jpg"/>
				</div>
				<div class="dashboard_notif_item_head_desc">
					<span class="dashboard_notif_nom_commerce"><?php echo $nom_enseigne;?></span>
					<span class="dashboard_notif_motif"><?php echo $action;?></span>
					<span class="dashboard_notif_temps"><?php echo $delai_notification;?></span>
				</div>
				<div class="dashboard_notif_item_head_buttons">
					<a href="#" class="first_img_margin dashboard_notif_bouton_suppr" title=""><img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_suppr.png"/></a>
					<a href="#" title="" class="dashboard_notif_bouton_valide"><img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_valide.png"/></a>
				</div>
			</div>
			<div class="dashboard_notif_item_body">
				<?php if ($id_action == 2) { ?>
				<div class="dashboard_notif_item_body_small_head">
				<span class="dashboard_notif_txt_normal">Commentaire laissé par <?php echo $prenom_contributeur . ' ' . $nom_contributeur;?></span><span class="dashboard_notif_txt_bold">Motif de suppression : <?php echo $commentaire;?></span>
				</div>
				<?php } ?>
				<p><?php echo $description;?></p>
			</div>
		</div>
		<script>
			$('.dashboard_notif_temps .box_posttime time img').attr('src','../img/pictos_actions/clock_b.png');
			$('.dashboard_notif_temps .box_posttime').css('width','auto').css('padding','5px 0px 0px 0px').css('text-align','left').css('color','white');
		</script>
<?php } ?>                      