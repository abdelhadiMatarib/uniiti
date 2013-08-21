
	<?php 
		include_once '../config/configPDO.inc.php';
		include_once 'fonctions.inc.php';

		$sql = "SELECT id_contributeur, pseudo_contributeur, photo_contributeur, prenom_contributeur, nom_contributeur, id_avis, commentaire, appreciation, note, origine, date_avis, id_enseigne, nom_enseigne, cp_enseigne, ville_enseigne, url, nom_type_enseigne, btn_donner_avis_visible
				FROM avis AS t1
				INNER JOIN contributeurs_donnent_avis AS t2
					ON t1.id_avis = t2.avis_id_avis
					INNER JOIN contributeurs AS t3
						ON t3.id_contributeur = t2.contributeurs_id_contributeur
						INNER JOIN enseignes_recoient_avis AS t4
							ON t1.id_avis = t4.avis_id_avis
							INNER JOIN enseignes AS t5
								ON t5.id_enseigne = t4.enseignes_id_enseigne
								INNER JOIN types_enseigne AS t6
									ON t6.id_type_enseigne = t5.types_enseigne_id_type_enseigne
				WHERE date_avis < " . $_GET['lastid'] .
				" ORDER BY date_avis DESC
				LIMIT 0,20
			";

		$req = $bdd->prepare($sql);
		$req->execute();

		$RequeteNow = $bdd->prepare("select NOW() AS Maintenant");
		$RequeteNow->execute();
		$Maintenant = $RequeteNow->fetchAll(PDO::FETCH_ASSOC);

		while ($row = $req->fetch(PDO::FETCH_ASSOC))
		{
			// Contributeurs
			//$pseudo_contributeur    = $row['pseudo_contributeur'];
			$photo_contributeur      = $row['photo_contributeur'];
			$prenom_contributeur     = $row['prenom_contributeur'];
			$nom_contributeur        = $row['nom_contributeur'];
			// Avis
			$commentaire             = $row['commentaire'];
			$appreciation            = $row['appreciation'];
			$note                    = $row['note'];
			$origine                 = $row['origine'];
			$datetime                = $row['date_avis'];
			// Enseigne
			$id_enseigne             = $row['id_enseigne'];
			$nom_enseigne            = $row['nom_enseigne'];
			$code_postal             = $row['cp_enseigne'];
			$ville_enseigne          = $row['ville_enseigne'];
			
			$nom_type_enseigne       = $row['nom_type_enseigne'];
			
			$url                     = $row['url'];
			
			$btn_donner_avis_visible = $row['btn_donner_avis_visible'];
	?>

			<!-- VIGNETTE TYPE -->
			<div class="box" id="<?php echo $datetime; ?>">
				
				<header>
					<div class="box_icon"><img src="img/pictos_commerces/restaurant.png" title="" alt="" /></div>
					<div class="box_desc">
						<span class="box_title" title="<?php echo $nom_enseigne; ?>"><?php echo tronque($nom_enseigne); ?></span>
						<span class="box_subtitle">Restauration</span>
					</div>
				</header>
				
				<figure>
					<div class="box_mark">
						<div class="box_stars">
							<?php for ($i = 1 ; $i <= $note / 2 ; $i++) { ?>
								<img src="img/pictos_actions/star.png" title="" alt="" />
							<?php } /* Fin du for */ ?>
						</div>
						<div class="box_headratings"><span><?php echo round($note, 0); ?>/10 - 2543 avis</span></div>
					</div>
					<div class="box_localisation"><span>Paris 7<sup>ème</sup></span></div>
					<img src="img/photos_commerces/1.jpg" title="" alt="" />
				</figure>
				
				<section>
					<div class="box_useraction"><a href="#"><span><?php echo $prenom_contributeur . " " . ucFirstOtherLower(tronqueName($nom_contributeur, 1)); ?></span><a> a noté</div>
					<div class="box_usertext"><figcaption><span><?php echo $note/2 ?>/5 |</span><?php echo $commentaire ?></figcaption></div>
				<div class="arrow_up"></div>
				</section>
				
				<footer>
					
					<div class="box_foot">
						<div class="box_userpic"><a href="#" ><img src="img/avatars/1.png" title="" alt="" /></a></div>
						<div class="box_posttime"><time>Il y a <strong><?php echo EcartDate($Maintenant[0]['Maintenant'], $datetime);  ?></strong></time></div>
						<div class="box_posttype"><img src="img/pictos_actions/notation.png" title="" alt="" /></div>
					</div>
				</footer>
				
			</div>
			<!-- FIN VIGNETTE TYPE -->
		<?php
		} // Fin du while

			$req->closeCursor();    // Ferme la connexion du serveur
			$bdd = null;            // Détruit l'objet PDO
		?>