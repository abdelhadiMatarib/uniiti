<?php 
		if (!empty($_POST['lastid'])) {include_once '../acces/auth.inc.php';include_once '../config/configuration.inc.php';include_once '../config/configPDO.inc.php';include_once 'fonctions.inc.php';}
		if (!empty($_POST['id_contributeur'])) {$id_contributeur = urldecode($_POST['id_contributeur']);}
		if (!empty($_POST['site_url'])) {$SITE_URL = $_POST['site_url'];} else {$SITE_URL =SITE_URL;}
		if (!empty($_POST['nbitems'])) {$NbItems = $_POST['nbitems'];} else {$NbItems = 40;}
		// Calcul de la note moyenne et du nombre d'avis par enseigne : PAS OPTIMISE à revoir
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
					WHERE id_enseigne = :id_enseigne";
		$req = $bdd->prepare($sql);

		$sql3 = "SELECT COUNT(contributeurs_id_contributeur) AS count_likes
				FROM contributeurs_aiment_enseignes AS t1
				WHERE enseignes_id_enseigne = :id_enseigne
				";
		$req3 = $bdd->prepare($sql3);		

		$sql4 = "SELECT id_avis, commentaire, appreciation, note, origine, date_avis FROM avis WHERE id_avis = :id_avis";
		$req4 = $bdd->prepare($sql4);
		
		// Requête de récupération des infos contributeurs, date, note, commentaire, enseigne		
		$sql2 = "SELECT provenance, date_avis, id_avis, type, id_contributeur, email_contributeur, pseudo_contributeur, photo_contributeur, prenom_contributeur, nom_contributeur, id_enseigne, nom_enseigne, cp_enseigne, ville_enseigne, url, nom_type_enseigne, btn_donner_avis_visible
				FROM ( SELECT 'avis' AS provenance, date_avis, id_avis, 'enseigne' AS type, contributeurs_id_contributeur, enseignes_id_enseigne
					FROM avis AS t1
					INNER JOIN contributeurs_donnent_avis AS t2
					ON t1.id_avis = t2.avis_id_avis
						INNER JOIN enseignes_recoient_avis AS t3
						ON t1.id_avis = t3.avis_id_avis
				UNION
					SELECT 'aime' AS provenance, date_aime AS date_avis, '' AS id_avis, 'enseigne' AS type, contributeurs_id_contributeur, enseignes_id_enseigne
					FROM contributeurs_aiment_enseignes AS t4
				UNION
					SELECT 'aime_pas' as provenance, date_aime_pas AS date_avis, '' AS id_avis, 'enseigne' AS type, contributeurs_id_contributeur, enseignes_id_enseigne
					FROM contributeurs_aiment_pas_enseignes AS t5
				UNION
					SELECT 'wish' as provenance, date_wish AS date_avis, '' AS id_avis, 'enseigne' AS type, contributeurs_id_contributeur, enseignes_id_enseigne
					FROM contributeurs_wish_enseignes AS t6
				) AS t7
				INNER JOIN contributeurs AS t8
				ON t7.contributeurs_id_contributeur = t8.id_contributeur
					INNER JOIN enseignes AS t9
					ON t7.enseignes_id_enseigne = t9.id_enseigne
						INNER JOIN types_enseigne AS t10
							ON t10.id_type_enseigne = t9.types_enseigne_id_type_enseigne WHERE id_contributeur = " . $id_contributeur;
		if (!empty($_POST['lastid'])) {$sql2 .= " AND date_avis < " . urldecode($_POST['lastid']);}
		$sql2 .= " ORDER BY date_avis DESC LIMIT 0," . $NbItems;

		$req2 = $bdd->prepare($sql2);
		$req2->execute();

		$RequeteNow = $bdd->prepare("select NOW() AS Maintenant");
		$RequeteNow->execute();
		$Maintenant = $RequeteNow->fetchAll(PDO::FETCH_ASSOC);

		while ($row = $req2->fetch(PDO::FETCH_ASSOC))
		{
			// Provenances des avis
			$type = $row['type'];
			$provenance = $row['provenance'];
			$datetime = $row['date_avis'];
			$delai_avis = EcartDate($Maintenant[0]['Maintenant'], $datetime);
			$id_avis = $row['id_avis'];			
			// Avis
			switch ($provenance) {
				case "avis":
					$req4->bindParam(':id_avis', $id_avis, PDO::PARAM_INT);
					$req4->execute();
					$result4 = $req4->fetch(PDO::FETCH_ASSOC);
					$commentaire             = str_replace(PHP_EOL ,"", stripslashes($result4['commentaire']));
					$commentaire			 = str_replace("\r" , "", $commentaire);
					$commentaire			 = str_replace("\n" , "", $commentaire);
					if ($commentaire == "") {$commentaire = "pas de commentaire";}
					$appreciation            = $result4['appreciation'];
					$note                    = $result4['note'];
					$origine                 = $result4['origine'];
					$action = "a noté";
					$affichecommentaire = true;
					break;
				case "aime":
					$note = "''";
					$commentaire = "''";
					$action = "a aimé";
					$affichecommentaire = false;
					break;
				case "aime_pas":
					$note = "''";
					$commentaire = "''";
					$action = "n'a pas aimé";
					$affichecommentaire = false;
					break;
				case "wish":
					$note = "''";
					$commentaire = "''";
					$action = "a ajouté à sa wishlist";
					$affichecommentaire = false;
					break;
				default :
					$note = "''";
					$commentaire = "''";
					$action = "";
					$affichecommentaire = false;
					break;
			}
			// Contributeurs
			//$pseudo_contributeur    = $row['pseudo_contributeur'];
			$photo_contributeur      = $row['photo_contributeur'];
			$prenom_contributeur     = $row['prenom_contributeur'];
			$nom_contributeur        = $row['nom_contributeur'];
			// Enseigne
			$id_enseigne             = $row['id_enseigne'];
			$nom_enseigne            = $row['nom_enseigne'];
			$code_postal             = $row['cp_enseigne'];
			$ville_enseigne          = $row['ville_enseigne'];
			$nom_type_enseigne       = $row['nom_type_enseigne'];
			$url                     = $row['url'];
			$btn_donner_avis_visible = $row['btn_donner_avis_visible'];
			
			$req->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
			$req->execute();
			$result = $req->fetch(PDO::FETCH_ASSOC);
			$count_avis_enseigne     = $result['count_avis'];
			$note_arrondi = number_format($result['moyenne'],1);	

			$req3->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
			$req3->execute();
			$result3 = $req3->fetch(PDO::FETCH_ASSOC);
			$count_likes = $result3['count_likes'];	
			
			$data = "{id_contributeur :" . $id_contributeur . ","
				. "nom_contributeur : '" . addslashes($nom_contributeur) . "',"
				. "prenom_contributeur : '" . addslashes($prenom_contributeur) . "',"
				. "id_enseigne :" . $id_enseigne . ","
				. "nom_enseigne : '" . addslashes($nom_enseigne) . "',"
				. "commentaire : '" . str_replace(PHP_EOL ,'\n', addslashes($commentaire)) . "',"
				. "delai_avis : '" . $delai_avis . "',"
				. "count_avis_enseigne :" . $count_avis_enseigne . ","
				. "count_likes :" . $count_likes . ","
				. "note :" . $note . ","
				. "note_arrondi :" . $note_arrondi . "}";
				
			if(isset($_SESSION['SESS_MEMBER_ID'])) {
				$dataLDW = "{id_contributeur :" . $_SESSION['SESS_MEMBER_ID'] . "," . "id_enseigne :" . $id_enseigne . "}";
				$like_step1 = "OuvrePopin(" . $dataLDW . ", '/includes/popins/like_step1.tpl.php', 'default_dialog');";
				$dislike_step1 = "OuvrePopin(" . $dataLDW . ", '/includes/popins/dislike_step1.tpl.php', 'default_dialog');";
				$wishlist_step1 = "OuvrePopin(" . $dataLDW . ", '/includes/popins/wishlist_step1.tpl.php', 'default_dialog');";
			} else {
				$like_step1 = $dislike_step1 = $wishlist_step1 = "OuvrePopin({}, '/includes/popins/ident.tpl.php', 'default_dialog');";
			}
				
	?>

                      <!-- VIGNETTE TYPE -->
			<div class="box" id="<?php echo $datetime; ?>">
				
				<header>
					<div class="box_icon"><img src="../img/pictos_commerces/restaurant.png" title="" alt="" /></div>
<!--					<div class="box_desc" onclick="location.href='<?php echo $url; ?>/<?php echo $id_enseigne; ?>.html';">
						<div class="box_desc" onclick="location.href='<?php echo "http://127.0.0.1/projects/uniiti"; ?>/<?php echo $url; ?>/<?php echo $id_enseigne; ?>.html';">
-->					<div class="box_desc" onclick="location.href='<?php echo $SITE_URL . "/pages/commerce.php?id_enseigne=" . $id_enseigne; ?>'">
							<span class="box_title" title="<?php echo $nom_enseigne; ?>"><?php echo tronque($nom_enseigne); ?></span>
							<span class="box_subtitle">Restauration</span>
					</div>
				</header>
				
				<figure>
					<div class="box_mark">
						<div class="box_stars">
							<?php echo AfficheEtoiles($note_arrondi); ?>
						</div>
						<div class="box_headratings"><span><?php echo $note_arrondi; ?>/10 - <?php echo $count_avis_enseigne; ?> avis</span></div>
					</div>
					<div class="box_localisation"><span>Paris 7<sup>ème</sup></span></div>
					<div class="box_push_et_img">
						<img src="../img/photos_commerces/1.jpg" title="" alt="" />
						<div class="box_push"></div>
					</div>
					<div class="overlay_push">
						<div class="push_buttons_wrapper">
							<div onclick="<?php echo $like_step1; ?>" class="push_buttons_like"><a href="#" title=""></a></div>
							<div onclick="<?php echo $dislike_step1; ?>" class="push_buttons_dislike"><a href="#" title=""></a></div>
							<div onclick="<?php echo $wishlist_step1; ?>" class="push_buttons_wishlist"><a href="#" title=""></a></div>
						</div>
					</div>
				</figure>
				
				<section onclick="OuvrePopin(<?php echo $data; ?>, '/includes/popins/utilisateur_interface_modifs.tpl.php','default_dialog_large');">
					<div class="box_useraction"><a href="<?php echo $SITE_URL . "/pages/utilisateur.php?id_contributeur=" . $id_contributeur; ?>"><span><?php echo $prenom_contributeur . " " . ucFirstOtherLower(tronqueName($nom_contributeur, 1)); ?></span></a> <?php echo $action ?></div>
					<?php if ($affichecommentaire) { ?><div class="box_usertext"><figcaption><span><?php echo $note/2 ?>/5 |</span><?php echo $commentaire; ?></figcaption></div><?php } ?>
				<div class="arrow_up"></div>
				</section>
				
				<footer>
					
					<div class="box_foot">
						<div class="box_userpic"><a href="<?php echo $SITE_URL . "/pages/utilisateur.php?id_contributeur=" . $id_contributeur; ?>" ><img src="../img/avatars/1.png" title="" alt="" /></a></div>
						<div class="box_posttime"><time>Il y a <strong><?php echo $delai_avis ?></strong></time></div>
						<div class="box_posttype"><img src="../img/pictos_actions/notation.png" title="" alt="" /></div>
					</div>
				</footer>
            
        </div>
		<!-- FIN VIGNETTE TYPE -->
	<?php
		} // Fin du while

		$req->closeCursor();    // Ferme la connexion du serveur
		$bdd = null;            // Détruit l'objet PDO
	?>