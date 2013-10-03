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
	
	$sql = "SELECT id_notification, id_statut, description, date_notification, t1.id_action, action, id_enseigne_ou_objet, slide1_enseigne, t3.x1, t3.y1, t1.id_contributeur, nom_contributeur, prenom_contributeur, id_avis, nom_enseigne FROM notifications AS t1
				INNER JOIN action_notification AS t2
				ON t1.id_action = t2.id_action
					INNER JOIN enseignes AS t3
					ON t1.id_enseigne_ou_objet = t3.id_enseigne 
						INNER JOIN contributeurs AS t4
						ON t1.id_contributeur = t4.id_contributeur
					WHERE type_notification='enseigne' AND id_statut = 1";
	$req = $bdd->prepare($sql);
	$req->execute();		
	while ($row = $req->fetch(PDO::FETCH_ASSOC))
	{
		$nom_enseigne = stripslashes($row['nom_enseigne']);
		$slide1_enseigne = $row['slide1_enseigne'];
		$y1 = $row['y1'];
		$x1 = $row['x1'];
		$nom_demandeur = $row['nom_contributeur'];
		$prenom_demandeur = $row['prenom_contributeur'];
		$id_action = $row['id_action'];
		$id_notification = $row['id_notification'];
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
					<img src="<?php echo SITE_URL . "/photos/enseignes/couvertures/" . $slide1_enseigne; ?>" style="width:327px;margin-top:<?php echo -$y1*327/1750;?>px;margin-left:<?php echo -$x1*327/1750;?>px;"/>
				</div>
				<div class="dashboard_notif_item_head_desc">
					<span class="dashboard_notif_nom_commerce"><?php echo $nom_enseigne;?></span>
					<span class="dashboard_notif_motif"><?php echo $action;?></span>
					<span class="dashboard_notif_temps"><?php echo $delai_notification;?></span>
				</div>
				<div class="dashboard_notif_item_head_buttons">
					<a href="#" onclick="ModifierStatut('notification', <?php echo $id_notification;?>, 3)" class="first_img_margin dashboard_notif_bouton_suppr" title=""><img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_suppr.png"/></a>
					<a href="#" onclick="ModifierStatut('notification', <?php echo $id_notification;?>, 2)" title="" class="dashboard_notif_bouton_valide"><img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_valide.png"/></a>
				</div>
			</div>
			<div class="dashboard_notif_item_body">
				<div class="dashboard_notif_item_body_small_head">
				<span class="dashboard_notif_txt_normal">Demandeur : <?php echo $prenom_demandeur . ' ' . $nom_demandeur;?></span>
				<?php if ($id_action == 2) { ?>
				<span class="dashboard_notif_txt_normal">sur commentaire laissé par <?php echo $prenom_contributeur . ' ' . $nom_contributeur;?></span>
				<span class="dashboard_notif_txt_bold">Motif de suppression : <?php echo $commentaire;?></span>
				<?php } ?>
				</div>
				<p><?php echo $description;?></p>
			</div>
		</div>
		<script>
			$('.dashboard_notif_temps .box_posttime time img').attr('src','../img/pictos_actions/clock_b.png');
			$('.dashboard_notif_temps .box_posttime').css('width','auto').css('padding','5px 0px 0px 0px').css('text-align','left').css('color','white');
			
			function ModifierStatut(type, id, id_statut) {
			
				var data = {
								id : id,
								type : type,
								id_statut : id_statut,
							};
				console.log(data);
				$.ajax({
					async : false,
					type :"POST",
					url : siteurl+'/includes/requetechangestatut.php',
					data : data,
					success: function(result){
						ActualisePopin({id_contributeur:result.result}, '/includes/popins/dashboard_gestion_commerce_notifications.valide.tpl.php', 'default_dialog');
					},
					error: function() {alert('Erreur sur url : ' + siteurl+'/includes/requetechangestatut.php');}
				});
			}
		</script>
<?php } ?>                      