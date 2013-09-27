<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<?php
		include_once '../config/configuration.inc.php';
		include'../includes/head.php';
		include_once '../config/configPDO.inc.php';
		include_once '../includes/fonctions.inc.php';

		// Requête de récupération aléatoire des infos enseigne		
		$sql = "SELECT id_enseigne, nom_enseigne, cp_enseigne, url
				FROM enseignes ORDER BY RAND() DESC LIMIT 0,15";

		$req = $bdd->prepare($sql);
		$req->execute();
		$result = $req->fetchAll(PDO::FETCH_ASSOC);
		
		$Compteur = 0;
		foreach ($result as $row) {
			$Compteur++;
			// Enseigne
			$id_enseigne             = $row['id_enseigne'];
			$nom_enseigne            = $row['nom_enseigne'];
			$code_postal             = $row['cp_enseigne'];
			$url                     = $row['url'];
	?>
			<div class="inscription_box" id="<?php echo $id_enseigne;?>">
				<div class="valid_box"></div>
				<div class="inscription_box_head">
					<div class="inscription_box_head_img_container categorie_restauration_img"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/restauration_s.png" /></div>
					<div class="inscription_box_head_desc"><span class="categorie_titre" title="<?php echo $nom_enseigne; ?>"><?php echo tronqueName($nom_enseigne, 20); ?></span><span class="categorie_restauration_texte">Restauration</span></div>
				</div>
				<div class="inscription_box_body_img">
					<figure><img src="<?php echo SITE_URL; ?>/img/photos_commerces/p1.jpg" title="" alt="" /></figure>
				</div>
			</div>
	<?php
		}
	?>
</html>
