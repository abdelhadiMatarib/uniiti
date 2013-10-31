<?php 
		if (!empty($_POST['lastid']) || !empty($_POST['provenance'])) {include_once '../acces/auth.inc.php';include_once '../config/configuration.inc.php';include_once '../config/configPDO.inc.php';include_once 'fonctions.inc.php';}
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
					WHERE id_enseigne = :id_enseigne
					";
		$req = $bdd->prepare($sql);

		$sql3 = "SELECT COUNT(contributeurs_id_contributeur) AS count_likes
				FROM contributeurs_aiment_enseignes AS t1
				WHERE enseignes_id_enseigne = :id_enseigne
				";
		$req3 = $bdd->prepare($sql3);

		$sql4 = "SELECT id_avis, commentaire, appreciation, note, origine, date_avis FROM avis WHERE id_avis = :id_avis";
		$req4 = $bdd->prepare($sql4);
		
		// Requête de récupération des infos contributeurs, date, note, commentaire, enseigne		
		$sql2 = "SELECT provenance, t10.id_categorie, t10.id_sous_categorie, t10.id_sous_categorie2, categorie_principale, sous_categorie, sous_categorie2,
						couleur, t11.posx AS scposx, t11.posy AS scposy, t10.posx, t10.posy, date_avis, id_avis, id_statut, type, id_contributeur, email_contributeur, pseudo_contributeur, photo_contributeur, 
						prenom_contributeur, nom_contributeur, id_enseigne, nom_enseigne, box_enseigne, slide1_enseigne, x1, t9.y1, cp_enseigne, quartier, arrondissement, t9.id_quartier, nom_ville, url
				FROM ( SELECT 'avis' AS provenance, date_avis, id_avis, id_statut, 'enseigne' AS type, contributeurs_id_contributeur, enseignes_id_enseigne
					FROM avis AS t1
					INNER JOIN contributeurs_donnent_avis AS t2
					ON t1.id_avis = t2.avis_id_avis
						INNER JOIN enseignes_recoient_avis AS t3
						ON t1.id_avis = t3.avis_id_avis
				UNION
					SELECT 'aime' AS provenance, date_aime AS date_avis, '0' AS id_avis, '2' AS id_statut, 'enseigne' AS type, contributeurs_id_contributeur, enseignes_id_enseigne
					FROM contributeurs_aiment_enseignes AS t4
				UNION
					SELECT 'aime_pas' as provenance, date_aime_pas AS date_avis, '0' AS id_avis, '2' AS id_statut, 'enseigne' AS type, contributeurs_id_contributeur, enseignes_id_enseigne
					FROM contributeurs_aiment_pas_enseignes AS t5
				UNION
					SELECT 'wish' as provenance, date_wish AS date_avis, '0' AS id_avis, '2' AS id_statut, 'enseigne' AS type, contributeurs_id_contributeur, enseignes_id_enseigne
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
								ON t10.id_categorie = t12.id_categorie
									INNER JOIN villes AS t13
									ON t13.id_ville = t9.villes_id_ville								
										INNER JOIN quartier AS t14
										ON t14.id_quartier = t9.id_quartier
											INNER JOIN arrondissement AS t15
											ON t15.id_arrondissement = t14.id_arrondissement
												INNER JOIN budget AS t16
												ON t9.id_budget = t16.id_budget ";
												
		$ilyaunesemaine = mktime(date("H"), date("i"), date("s"), date("m")  , date("d")-7, date("Y"));
		$datemoinssept = date('Y-m-d H:i:s', $ilyaunesemaine);
		$sql5 = "SELECT COUNT(id_avis) AS count_avis, AVG(note) AS moyenne
			FROM avis AS t1
			INNER JOIN enseignes_recoient_avis AS t2
			ON t1.id_avis = t2.avis_id_avis
			INNER JOIN enseignes AS t3
				ON t2.enseignes_id_enseigne = t3.id_enseigne
				INNER JOIN contributeurs_donnent_avis AS t4
					ON t1.id_avis = t4.avis_id_avis
					INNER JOIN contributeurs AS t5
						ON t4.contributeurs_id_contributeur = t5.id_contributeur
			WHERE(id_statut = 2 OR (id_statut = 1 AND date_avis < '" . $datemoinssept . "'))";
		$req5 = $bdd->prepare($sql5);
		$req5->execute();
		$result5 = $req5->fetch(PDO::FETCH_ASSOC);
		$nbavis     = $result5['count_avis'];
		$ClauseWhere = false;
		if (!empty($_POST['lastid'])) {$sql2 .= "WHERE date_avis < " . urldecode($_POST['lastid']);$ClauseWhere = true;}
		if (!empty($_POST['provenance'])) {
			if (urldecode($_POST['provenance']) == "\"avis_en_attente\"") {
				if ($ClauseWhere) {$sql2 .= " AND ";} else {$sql2 .= " WHERE ";$ClauseWhere = true;}
				$sql2 .= "id_statut = 1 AND provenance = 'avis' AND date_avis >= '" . $datemoinssept . "'";
			}
			else {
				if ($ClauseWhere) {$sql2 .= " AND ";} else {$sql2 .= " WHERE ";$ClauseWhere = true;}
				$sql2 .= "(id_statut = 2 OR (id_statut = 1 AND date_avis < '" . $datemoinssept . "'))";
				if (urldecode($_POST['provenance']) != "\"all\"") {$sql2 .= " AND provenance = " . urldecode($_POST['provenance']);}
			}		
		}
		else {
				if ($ClauseWhere) {$sql2 .= " AND ";} else {$sql2 .= " WHERE ";$ClauseWhere = true;}
				$sql2 .= "(id_statut = 2 OR (id_statut = 1 AND date_avis < '" . $datemoinssept . "'))";
		}
		if (!empty($_POST['categorie'])) {
				if ($ClauseWhere) {$sql2 .= " AND ";}
				else {$sql2 .= " WHERE ";$ClauseWhere = true;}
				$sql2 .= "t10.id_categorie = " . $_POST['categorie'];
		}
		if (!empty($_POST['scategorie'])) {$sql2 .= " AND t10.id_sous_categorie = " . $_POST['scategorie'];}
		if (!empty($_POST['sscategorie'])) {$sql2 .= " AND t10.id_sous_categorie2 = " . $_POST['sscategorie'];}
		if (!empty($_POST['id_ville'])) {$sql2 .= " AND t9.villes_id_ville = " . $_POST['id_ville'];}
		if (!empty($_POST['id_budget'])) {$sql2 .= " AND t9.id_budget = " . $_POST['id_budget'];}
		if (!empty($_POST['quoi'])) {
			$sql2 .= " AND (nom_enseigne LIKE '%" . addslashes(urldecode($_POST['quoi'])) . "%'";
			$sql2 .= " OR categorie_principale LIKE '%" . addslashes(urldecode($_POST['quoi'])) . "%'";
			$sql2 .= " OR sous_categorie LIKE '%" . addslashes(urldecode($_POST['quoi'])) . "%'";		
			$sql2 .= " OR sous_categorie2 LIKE '%" . addslashes(urldecode($_POST['quoi'])) . "%')";		
		}
		if (!empty($_POST['lieu'])) {
			$sql2 .= " AND (nom_ville LIKE '%" . addslashes(urldecode($_POST['lieu'])) . "%'";
			$sql2 .= " OR quartier LIKE '%" . addslashes(urldecode($_POST['lieu'])) . "%'";
			$sql2 .= " OR arrondissement LIKE '%" . addslashes(urldecode($_POST['lieu'])) . "%')";
		}
		$sql2 .= " ORDER BY date_avis DESC LIMIT 0," . $NbItems;

		$req2 = $bdd->prepare($sql2);
		$req2->execute();

		$RequeteNow = $bdd->prepare("select NOW() AS Maintenant");
		$RequeteNow->execute();
		$Maintenant = $RequeteNow->fetchAll(PDO::FETCH_ASSOC);

		// Tirage au hasard top 50 commerces
		$CompteurTop50 = rand(1, $NbItems-1);
		// Tirage au hasard box aléatoires
		$CompteurAlea1 = rand(2, $NbItems-1);
		// Tirage au hasard box aléatoires
		$CompteurAlea2 = rand(3, $NbItems-1);
		// Tirage au hasard box aléatoires
		$CompteurAlea3 = rand(4, $NbItems-1);
		// Tirage au hasard box aléatoires
		$CompteurAlea4 = rand(5, $NbItems-1);
                
		$Compteur = 0;
		while ($row = $req2->fetch(PDO::FETCH_ASSOC))
		{
			$Compteur++;
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
					$Nbcar = strlen($commentaire);
					switch ($Nbcar) {
						case ($Nbcar < 99) :
							$commentaireaffiche = $commentaire;
						break;
						case ($Nbcar < 169) :
							$commentaireaffiche = tronque($commentaire, 134);
						break;						
						default :
							$commentaireaffiche = tronque($commentaire, 200);
						break;					
					}
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
			$id_contributeur		 = $row['id_contributeur'];
			$email_contributeur      = $row['email_contributeur'];
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
			$ville_enseigne          = $row['nom_ville'];
			$couleur 				 = $row['couleur'];
			$id_categorie			 = $row['id_categorie'];
			$id_sous_categorie       = $row['id_sous_categorie'];
			$id_sous_categorie2      = $row['id_sous_categorie2'];
			$categorie				 = $row['categorie_principale'];
			$sous_categorie          = $row['sous_categorie'];
			$sous_categorie2         = $row['sous_categorie2'];
			$scposx					 = $row['scposx'];
			$scposy					 = $row['scposy'];
			$posx					 = $row['posx'];
			$posy					 = $row['posy'];
			$url                     = $row['url'];

			$arrondissement = $row['arrondissement'];
			if ($arrondissement == "Indéfini") {$arrondissement = $ville_enseigne;}
			
			$req->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
			$req->execute();
			$result = $req->fetch(PDO::FETCH_ASSOC);
			$count_avis_enseigne     = $result['count_avis'];
			$note_arrondi = number_format($result['moyenne'],1);

			$req3->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
			$req3->execute();
			$result3 = $req3->fetch(PDO::FETCH_ASSOC);
			$count_likes = $result3['count_likes'];					
			
			$Hasard = rand(1, 4);
			$Taille = "box_height_" . $Hasard;
			if ($box_enseigne == "photo 1.jpg") {
				switch ($Hasard) {
					case 1 :
						$DecalageTaille = -75;
						break;
					case 2 :
						$DecalageTaille = -50;
						break;
					case 3 :
						$DecalageTaille = -25;
						break;
					case 4 :
						$DecalageTaille = 0;
						break;
				}
			}
			else {$DecalageTaille = 0;}
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
				. "posx : " . $posx .","
				. "posy : " . $posy .","
				. "commentaire : '" . str_replace(PHP_EOL ,'\n', addslashes($commentaire)) . "',"
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
				if (($_SESSION['SESS_MEMBER_ID'] == $id_contributeur) && ($provenance == "avis")) {
					$presoumodif = "OuvrePopin(" . $data . ", '/includes/popins/utilisateur_interface_modifs.tpl.php','default_dialog_large');";
				} 
				else {$presoumodif = "OuvrePopin(" . $data . ", '/includes/popins/presentation_action_commentaire.tpl.php','default_dialog_large');";}
			} else {
				$like_step1 = $dislike_step1 = $wishlist_step1 = "OuvrePopin({}, '/includes/popins/ident.tpl.php', 'default_dialog');";
				$presoumodif = "OuvrePopin(" . $data . ", '/includes/popins/presentation_action_commentaire.tpl.php','default_dialog_large');";
			}
			
			$BoxFiltre = $type . " " . $provenance . " cat" . $id_categorie . " scat" . $id_sous_categorie . " sscat" . $id_sous_categorie2;
	?>
			<!-- VIGNETTE TYPE -->
			<div class="box <?php echo $BoxFiltre;?>" id="<?php echo $datetime; ?>" temps="<?php echo strtotime($datetime); ?>">
				
				<header>
					<div class="box_icon" title="<?php if ($sous_categorie2 == NULL) {echo $sous_categorie;} else {echo $sous_categorie2;} ?>" style="background:url('<?php echo SITE_URL; ?>/img/pictos_commerces/sprite_cat.jpg') <?php echo $scposx . "px" . " " . $scposy . "px"?>"></div>
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
                                    
					<div class="box_localisation"><span><?php echo $arrondissement; ?></span></div>
					<div class="box_push_et_img <?php echo $Taille; ?>" style="background:<?php echo $couleur; ?>;height:350px;">
						<img style="display:none;margin-top:<?php echo $DecalageTaille;?>px;" src="<?php echo SITE_ENSEIGNES_BOX . $box_enseigne  . "?" . time();?>" title="" alt="" />
<!--						<img src="img/photos_commerces/1.jpg" title="" alt="" />	-->
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
					<div class="box_useraction"><a href="<?php echo $SITE_URL . "/pages/utilisateur.php?id_contributeur=" . $id_contributeur; ?>"><span style="color:<?php echo $couleur; ?>;"><?php echo $prenom_contributeur . " " . ucFirstOtherLower(tronqueName($nom_contributeur, 1)); ?></span></a> <?php echo $action ?><?php if ($commentaire == "pas de commentaire") { ?><span style="color:<?php echo $couleur; ?>;font-weight: bold;"> <?php echo  $note / 2; ?>/5 </span><?php } ?></div>
					<?php if (($affichecommentaire) && ($commentaire != "pas de commentaire"))  { ?><div class="box_usertext"><figcaption><span style="color:<?php echo $couleur; ?>;font-weight: bold;"><?php echo $note/2 ?>/5 | </span><?php echo $commentaireaffiche; ?></figcaption></div><?php } ?>
				<div class="arrow_up" style="border-bottom:5px solid <?php echo $couleur; ?>;"></div>
				</section>
				
				<footer>
					
					<div class="box_foot">
						<div class="box_userpic"><a href="<?php echo $SITE_URL . "/pages/utilisateur.php?id_contributeur=" . $id_contributeur; ?>" ><img title="<?php echo $prenom_contributeur . ' ' . ucFirstOtherLower(tronqueName($nom_contributeur, 1)); ?>" src="<?php echo $SITE_URL . "/photos/utilisateurs/avatars/" . $photo_contributeur;?>" title="" alt="" /></a></div>
						<div class="box_user_time"><?php echo $delai_avis;  ?></div>
						<div class="box_posttype" <?php echo AfficheProvenance($provenance, $categorie); ?>></div>
					</div>
				</footer>
				
			</div>
			<!-- FIN VIGNETTE TYPE -->
			<?php if ($CompteurTop50 == $Compteur) { ?>
			<div class="box top_50_commerces">
				<div class="box_top_50_commerces_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_commerces/icon_top50.png"/></div>
				<span class="box_top_50_commerces_txt1">TOP 50</span><span class="box_top_50_commerces_txt2">COMMERCES</span>
			</div>
			<?php } ?>
                        <?php if ($CompteurAlea1 == $Compteur) { ?>
			<div class="box box_aleatoire" onclick="OuvrePopin({}, '/includes/popins/suggestion_commerce.tpl.php', 'default_dialog');">
                            <div class="box_aleatoire_img_container">
                                <img src="<?php echo SITE_URL; ?>/img/pictos_commerces/picto_commerce.png" height="69" width="69"/>
                            </div>
                            <span class="box_aleatoire_txt_1">Suggérer</span>
                            <span class="box_aleatoire_txt_2">un commerce</span>
                        </div>
			<?php } ?>
                        <?php if ($CompteurAlea2 == $Compteur) { ?>
			<div class="box box_aleatoire" onclick="OuvrePopin({}, '/includes/popins/suggestion_objet.tpl.php', 'default_dialog');">
                            <div class="box_aleatoire_img_container">
                                <img src="<?php echo SITE_URL; ?>/img/pictos_commerces/picto_objet.png" height="69" width="69"/>
                            </div>
                            <span class="box_aleatoire_txt_1">Suggérer</span>
                            <span class="box_aleatoire_txt_2">un objet</span>
                        </div>
			<?php } ?>
                        <?php if ($CompteurAlea3 == $Compteur) { ?>
                        <div class="box box_aleatoire" onclick="window.open('https://facebook.com/pages/Captain-Opinion/125613297563851');">
                            <div class="box_aleatoire_img_container_sociaux">
                                <img id="picto_fb" src="<?php echo SITE_URL; ?>/img/pictos_commerces/picto_fb.png" height="50" width="50"/>
                                <img id="picto_tw" src="<?php echo SITE_URL; ?>/img/pictos_commerces/picto_tw.png" height="50" width="50"/>
                                <img id="picto_gplus" src="<?php echo SITE_URL; ?>/img/pictos_commerces/picto_gplus.png" height="50" width="50"/>
                            </div>
                            <span class="box_aleatoire_txt_1">Suivez</span>
                            <span class="box_aleatoire_txt_2">nous</span>
                        </div>
                        <?php } ?>
                        <?php if ($CompteurAlea4 == $Compteur) { ?>
                        <div class="box box_aleatoire box_aleatoire_nombres">
                            <span class="box_aleatoire_nbr_1"><?php echo $nbavis ?></span>
                            <span class="box_aleatoire_nbr_2">avis sur le site</span>
                        </div>
                        <?php } ?>
	<?php
		} // Fin du while

		$req->closeCursor();    // Ferme la connexion du serveur
		$bdd = null;            // Détruit l'objet PDO
	?>
	<script>
//	console.log("<?php echo addcslashes($sql2,"\\\'\"\n\r"); ?>");
	</script>