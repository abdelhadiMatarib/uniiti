<?php 
		if (!empty($_POST['lastid']) || !empty($_POST['provenance'])) {include_once '../acces/auth.inc.php';include_once '../config/configuration.inc.php';include_once '../config/configPDO.inc.php';include_once 'fonctions.inc.php';}
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
		
		$sql5 = "SELECT quartier, arrondissement FROM quartier AS t1
					INNER JOIN arrondissement AS t2
					ON t1.id_arrondissement = t2.id_arrondissement WHERE t1.id_quartier = :id_quartier";
		$req5 = $bdd->prepare($sql5);
		
		// Requête de récupération des infos contributeurs, date, note, commentaire, enseigne		
		$sql2 = "SELECT provenance, t10.id_categorie, t10.id_sous_categorie, t10.id_sous_categorie2, categorie_principale, sous_categorie, sous_categorie2,
				couleur, t10.posx, t10.posy, date_avis, id_avis, type, id_contributeur, email_contributeur, pseudo_contributeur, photo_contributeur,
				prenom_contributeur, nom_contributeur, id_enseigne, nom_enseigne, box_enseigne, slide1_enseigne, x1, t9.y1, cp_enseigne, id_quartier, ville_enseigne, url
				FROM ( SELECT 'avis' AS provenance, date_avis, id_avis, 'enseigne' AS type, contributeurs_id_contributeur, enseignes_id_enseigne
					FROM avis AS t1
					INNER JOIN contributeurs_donnent_avis AS t2
					ON t1.id_avis = t2.avis_id_avis
						INNER JOIN enseignes_recoient_avis AS t3
						ON t1.id_avis = t3.avis_id_avis
				UNION
					SELECT 'aime' AS provenance, date_aime AS date_avis, '0' AS id_avis, 'enseigne' AS type, contributeurs_id_contributeur, enseignes_id_enseigne
					FROM contributeurs_aiment_enseignes AS t4
				UNION
					SELECT 'aime_pas' as provenance, date_aime_pas AS date_avis, '0' AS id_avis, 'enseigne' AS type, contributeurs_id_contributeur, enseignes_id_enseigne
					FROM contributeurs_aiment_pas_enseignes AS t5
				UNION
					SELECT 'wish' as provenance, date_wish AS date_avis, '0' AS id_avis, 'enseigne' AS type, contributeurs_id_contributeur, enseignes_id_enseigne
					FROM contributeurs_wish_enseignes AS t6
				) AS t7
				INNER JOIN contributeurs AS t8
				ON t7.contributeurs_id_contributeur = t8.id_contributeur
					INNER JOIN enseignes AS t9
					ON t7.enseignes_id_enseigne = t9.id_enseigne
						INNER JOIN sous_categories2 AS t10
							ON t10.id_sous_categorie2 = t9.sscategorie_enseigne
							INNER JOIN sous_categories AS t11
							ON t10.id_sous_categorie = t11.id_sous_categorie
								INNER JOIN categories AS t12
								ON t10.id_categorie = t12.id_categorie WHERE id_contributeur = " . $id_contributeur;

		if (!empty($_POST['lastid'])) {$sql2 .= " AND date_avis < " . urldecode($_POST['lastid']);}
		if (!empty($_POST['provenance'])) {
			if (urldecode($_POST['provenance']) != "\"all\"") {$sql2 .= " AND provenance = " . urldecode($_POST['provenance']);}
		}
		if (!empty($_POST['categorie'])) {$sql2 .= " AND t10.id_categorie = " . $_POST['categorie'];}
		if (!empty($_POST['scategorie'])) {$sql2 .= " AND t10.id_sous_categorie = " . $_POST['scategorie'];}
		if (!empty($_POST['sscategorie'])) {$sql2 .= " AND t10.id_sous_categorie2 = " . $_POST['sscategorie'];}
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
			$box_enseigne			 = $row['box_enseigne'];
			$slide1_enseigne		 = $row['slide1_enseigne'];
			$x1		 				 = $row['x1'];
			$y1		 				 = $row['y1'];
			$code_postal             = $row['cp_enseigne'];
			$ville_enseigne          = $row['ville_enseigne'];
			$couleur 				 = $row['couleur'];
			$categorie				 = $row['categorie_principale'];
			$sous_categorie          = $row['sous_categorie'];
			$sous_categorie2         = $row['sous_categorie2'];
			$posx					 = $row['posx'];
			$posy					 = $row['posy'];
			$url                     = $row['url'];
			
			$req5->bindParam(':id_quartier', $row['id_quartier'], PDO::PARAM_INT);
			$req5->execute();
			$result5 = $req5->fetch(PDO::FETCH_ASSOC);
			if ($result5) {$arrondissement = $result5['arrondissement'];}
			else {$arrondissement = $ville_enseigne;}
			
			$req->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
			$req->execute();
			$result = $req->fetch(PDO::FETCH_ASSOC);
			$count_avis_enseigne     = $result['count_avis'];
			$note_arrondi = number_format($result['moyenne'],1);	

			$req3->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
			$req3->execute();
			$result3 = $req3->fetch(PDO::FETCH_ASSOC);
			$count_likes = $result3['count_likes'];	
			
			$data = "{provenance :'" . addslashes($provenance) . "',"
				. "type : '" . $type . "',"
				. "id_avis :" . $id_avis . ","
				. "id_contributeur :" . $id_contributeur . ","
				. "nom_contributeur : '" . addslashes($nom_contributeur) . "',"
				. "photo_contributeur : '" . addslashes($photo_contributeur) . "',"
				. "prenom_contributeur : '" . addslashes($prenom_contributeur) . "',"
				. "id_enseigne :" . $id_enseigne . ","
				. "nom_enseigne : '" . addslashes($nom_enseigne) . "',"
				. "slide1 : '" . $slide1_enseigne . "', "
				. "x1 : '" . $x1 . "', "
				. "y1 : '" . $y1 . "', "
				. "couleur : '" . $couleur . "',"
				. "categorie : '" . addslashes($categorie) . "',"
				. "scategorie : '" . addslashes($sous_categorie) . "',"
				. "sscategorie : '" . addslashes($sous_categorie2) . "',"
				. "arrondissement : '" . htmlspecialchars($arrondissement) . "',"
				. "commentaire : '" . str_replace(PHP_EOL ,'\n', addslashes($commentaire)) . "',"
				. "posx : " . $posx .","
				. "posy : " . $posy .","
				. "delai_avis : '" . htmlspecialchars($delai_avis) . "',"
				. "count_avis_enseigne :" . $count_avis_enseigne . ","
				. "count_likes :" . $count_likes . ","
				. "note :" . $note . ","
				. "note_arrondi :" . $note_arrondi . "}";
				
			if(isset($_SESSION['SESS_MEMBER_ID'])) {
				$dataLDW = "{id_contributeur :" . $_SESSION['SESS_MEMBER_ID'] . "," . "id_enseigne :" . $id_enseigne . ", categorie : '" . addslashes($categorie) . "'}";
				$like_step1 = "OuvrePopin(" . $dataLDW . ", '/includes/popins/like_step1.tpl.php', 'default_dialog');";
				$dislike_step1 = "OuvrePopin(" . $dataLDW . ", '/includes/popins/dislike_step1.tpl.php', 'default_dialog');";
				$wishlist_step1 = "OuvrePopin(" . $dataLDW . ", '/includes/popins/wishlist_step1.tpl.php', 'default_dialog');";
				if ($_SESSION['SESS_MEMBER_ID'] == $id_contributeur) {
					$presoumodif = "OuvrePopin(" . $data . ", '/includes/popins/utilisateur_interface_modifs.tpl.php','default_dialog_large');";
				} 
				else {$presoumodif = "OuvrePopin(" . $data . ", '/includes/popins/presentation_action_commentaire.tpl.php','default_dialog_large');";}
			} else {
				$like_step1 = $dislike_step1 = $wishlist_step1 = "OuvrePopin({}, '/includes/popins/ident.tpl.php', 'default_dialog');";
				$presoumodif = "OuvrePopin(" . $data . ", '/includes/popins/presentation_action_commentaire.tpl.php','default_dialog_large');";
			}
				
	?>

                      <!-- VIGNETTE TYPE -->
			<div class="box" id="<?php echo $datetime; ?>">
				
				<header>
					<div class="box_icon" title="<?php if ($sous_categorie2 == NULL) {echo $sous_categorie;} else {echo $sous_categorie2;} ?>" style="background:url('<?php echo SITE_URL; ?>/img/pictos_commerces/sprite_cat.jpg') <?php echo $posx . "px" . " " . $posy . "px"?>"></div>
<!--					<div class="box_desc" onclick="location.href='<?php echo $url; ?>/<?php echo $id_enseigne; ?>.html';">
						<div class="box_desc" onclick="location.href='<?php echo "http://127.0.0.1/projects/uniiti"; ?>/<?php echo $url; ?>/<?php echo $id_enseigne; ?>.html';">
-->					<div class="box_desc" onclick="location.href='<?php echo $SITE_URL . "/pages/commerce.php?id_enseigne=" . $id_enseigne; ?>'">
							<span class="box_title" title="<?php echo $nom_enseigne; ?>"><?php echo tronque($nom_enseigne); ?></span>
							<span class="box_subtitle" title="<?php if ($sous_categorie2 == NULL) {echo $sous_categorie;} else {echo $sous_categorie2;} ?>" style="color:<?php echo $couleur; ?>;"><?php if ($sous_categorie2 == NULL) {echo $sous_categorie;} else {echo $sous_categorie2;} ?></span>
					</div>
				</header>
				
				<figure>
					<div class="box_mark">
						<div class="box_stars">
							<?php echo AfficheEtoiles($note_arrondi, $categorie); ?>
						</div>
						<div class="box_headratings"><span><?php echo $note_arrondi; ?>/10 - <?php echo $count_avis_enseigne; ?> avis</span></div>
					</div>
					<div class="box_localisation"><?php echo $arrondissement; ?></span></div>
					<div class="box_push_et_img" style="background:<?php echo $couleur; ?>;height:350px">
						<img onload="AfficheImage($(this));" style="display:none;" src="<?php echo SITE_ENSEIGNES_BOX . $box_enseigne . "?" . time(); ?>" title="" alt="" />
						<div class="box_push" <?php echo AffichePush($categorie); ?>></div>
					</div>
					<div class="overlay_push">
						<div class="push_buttons_wrapper">
							<div title="J'aime" onclick="<?php echo $like_step1; ?>" class="push_buttons_like" <?php echo AfficheAction('aime',$categorie); ?>></div>
							<div title="Je n'aime pas" onclick="<?php echo $dislike_step1; ?>" class="push_buttons_dislike" <?php echo AfficheAction('aime_pas',$categorie); ?>></div>
							<div title="Ajouter à ma Wishlist" onclick="<?php echo $wishlist_step1; ?>" class="push_buttons_wishlist" <?php echo AfficheAction('wish',$categorie); ?>></div>
						</div>
					</div>
				</figure>
				
				<section onclick="<?php echo $presoumodif; ?>">
					<div class="box_useraction"><a href="<?php echo $SITE_URL . "/pages/utilisateur.php?id_contributeur=" . $id_contributeur; ?>"><span style="color:<?php echo $couleur; ?>;"><?php echo $prenom_contributeur . " " . ucFirstOtherLower(tronqueName($nom_contributeur, 1)); ?></span></a> <?php echo $action ?><?php if ($commentaire == "pas de commentaire") { ?><span style="color:<?php echo $couleur; ?>;font-weight: bold;"> <?php echo  $note / 2; ?>/5 <?php } ?></span></div>
					<?php if (($affichecommentaire) && ($commentaire != "pas de commentaire"))  { ?><div class="box_usertext"><figcaption><span style="color:<?php echo $couleur; ?>;font-weight: bold;"><?php echo $note/2 ?>/5 | </span><?php echo $commentaire; ?></figcaption></div><?php } ?>
				<div class="arrow_up" style="border-bottom:5px solid <?php echo $couleur; ?>;"></div>
				</section>
				
				<footer>
					
					<div class="box_foot">
						<div class="box_userpic"><a href="<?php echo $SITE_URL . "/pages/utilisateur.php?id_contributeur=" . $id_contributeur; ?>" ><img title="<?php echo $prenom_contributeur . ' ' . ucFirstOtherLower(tronqueName($nom_contributeur, 1)); ?>" src="<?php echo $SITE_URL . "/photos/utilisateurs/avatars/" . $photo_contributeur;?>" /></a></div>
						<div class="box_user_time"><?php echo $delai_avis;  ?></div>
						<div class="box_posttype" <?php echo AfficheProvenance($provenance, $categorie); ?>></div>
					</div>
				</footer>
            
        </div>
		<!-- FIN VIGNETTE TYPE -->
	<?php
		} // Fin du while

		$req->closeCursor();    // Ferme la connexion du serveur
		$bdd = null;            // Détruit l'objet PDO
	?>