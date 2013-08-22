
	<?php 
	
		if (!empty($_GET['lastid'])) {include_once '../config/configPDO.inc.php';include_once 'fonctions.inc.php';}
		if (!empty($_GET['id_enseigne'])) {$id_enseigne = $_GET['id_enseigne'];}
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
					WHERE id_enseigne = " . $id_enseigne;
		$req = $bdd->prepare($sql);

		// Requête de récupération des infos contributeurs, date, note, commentaire, enseigne		
		$sql2 = "SELECT id_contributeur, pseudo_contributeur, photo_contributeur, prenom_contributeur, nom_contributeur, id_avis, commentaire, appreciation, note, origine, date_avis, id_enseigne, nom_enseigne, cp_enseigne, ville_enseigne, url, nom_type_enseigne, btn_donner_avis_visible
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
									ON t6.id_type_enseigne = t5.types_enseigne_id_type_enseigne WHERE id_enseigne = " . $id_enseigne;
		if (!empty($_GET['lastid'])) {$sql2 .= " AND date_avis < " . stripslashes($_GET['lastid']);}
		$sql2 .= " ORDER BY date_avis DESC LIMIT 0,20";

		$req2 = $bdd->prepare($sql2);
		$req2->execute();

		$RequeteNow = $bdd->prepare("select NOW() AS Maintenant");
		$RequeteNow->execute();
		$Maintenant = $RequeteNow->fetchAll(PDO::FETCH_ASSOC);

		while ($row = $req2->fetch(PDO::FETCH_ASSOC))
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
			
			$req->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
			$req->execute();
			$result = $req->fetch(PDO::FETCH_ASSOC);
			$count_avis_enseigne     = $result['count_avis'];
			$note_arrondi = number_format($result['moyenne'],1);	
	?>

        <!-- VIGNETTE TYPE -->
        <div class="box" id="<?php echo $datetime; ?>">
            
            <header>
                <div class="box_icon"><img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/user.png" height="50" width="50" title="" alt="" /></div>
                <div class="box_desc">
                    <span class="box_title" title="<?php echo $prenom_contributeur . " " . ucFirstOtherLower(tronqueName($nom_contributeur, 1)); ?>"><?php echo $prenom_contributeur . " " . ucFirstOtherLower(tronqueName($nom_contributeur, 1)); ?></span>
                    <span class="box_subtitle">355/3000 - Confirmé</span>
                </div>
                <div class="box_suivre_user"><a href="#" title="Suivre"><img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/suivre.png" height="50" width="50" alt="" title="" /></a></div>
            </header>
            
            <figure>
                <div class="box_mark">
                    <div class="box_stars">
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                        <img src="<?php echo SITE_URL; ?>/img/pictos_utilisateurs/trust.png" title="" alt="" />
                    </div>
                    <div class="box_headratings"><span><?php echo $note_arrondi; ?>/10 - <?php echo $count_avis_enseigne; ?> avis</span></div>
                </div>
            </figure>
            
            <section>
                <div class="box_useraction"><a href="#"><span><?php echo $prenom_contributeur . " " . ucFirstOtherLower(tronqueName($nom_contributeur, 1)); ?></span><a> a noté</div>
                <div class="box_usertext"><figcaption><span>3/5 |</span> <?php if ($commentaire <>"") {echo $commentaire;} else {echo "pas de commentaire";} ?></figcaption></div>
            <div class="arrow_up"></div>
            </section>
            
            <footer>
                
                <div class="box_foot">
                    <div class="box_userpic"><a href="#" ><img src="<?php echo SITE_URL; ?>/img/avatars/1.png" title="" alt="" /></a></div>
                    <div class="box_posttime"><time>Il y a <strong><?php echo EcartDate($Maintenant[0]['Maintenant'], $datetime);  ?></strong></time></div>
                    <div class="box_posttype"><img src="<?php echo SITE_URL; ?>/img/pictos_actions/notation.png" title="" alt="" /></div>
                </div>
            </footer>
            
        </div>
		<!-- FIN VIGNETTE TYPE -->
	<?php
		} // Fin du while

		$req->closeCursor();    // Ferme la connexion du serveur
		$bdd = null;            // Détruit l'objet PDO
	?>