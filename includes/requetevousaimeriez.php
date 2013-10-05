<?php
		include_once '../config/configPDO.inc.php';
		include_once 'fonctions.inc.php';
		if (!empty($_POST['site_url'])) {$SITE_URL = $_POST['site_url'];} else {$SITE_URL =SITE_URL;}
		if (!empty($_POST['nbitems'])) {$NbItems = $_POST['nbitems'];} else {$NbItems = 5;}

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

		// Requête de récupération des infos contributeurs, date, note, commentaire, enseigne		
		$sql2 = "SELECT t10.id_categorie, t10.id_sous_categorie, t10.id_sous_categorie2, categorie_principale, sous_categorie, sous_categorie2,
						couleur, t11.posx AS scposx, t11.posy AS scposy, t10.posx, t10.posy, id_enseigne, nom_enseigne
				FROM enseignes AS t9
					INNER JOIN sous_categories2 AS t10
						ON t10.id_sous_categorie2 = t9.sscategorie_enseigne
						INNER JOIN sous_categories AS t11
						ON t10.id_sous_categorie = t11.id_sous_categorie
							INNER JOIN categories AS t12
							ON t10.id_categorie = t12.id_categorie ORDER BY RAND() DESC LIMIT 0," . $NbItems;

		$req2 = $bdd->prepare($sql2);
		$req2->execute();

		while ($row = $req2->fetch(PDO::FETCH_ASSOC))
		{
			// Enseigne
			$id_enseigne             = $row['id_enseigne'];
			$nom_enseigne            = $row['nom_enseigne'];
			$couleur 				 = $row['couleur'];
			$categorie				 = $row['categorie_principale'];
			$sous_categorie          = $row['sous_categorie'];
			$sous_categorie2         = $row['sous_categorie2'];
			$scposx					 = $row['scposx'];
			$scposy					 = $row['scposy'];
			$posx					 = $row['posx'];
			$posy					 = $row['posy'];
			
			$req->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
			$req->execute();
			$result = $req->fetch(PDO::FETCH_ASSOC);
			$count_avis_enseigne     = $result['count_avis'];
			$note_arrondi = number_format($result['moyenne'],1);

?>	<!-- VIGNETTE TYPE -->

				<div id='posts'>

					<div class='presentation_action_right_suggestions_img_container'>
						<div class="box_icon" title="<?php if ($sous_categorie2 == NULL) {echo $sous_categorie;} else {echo $sous_categorie2;} ?>" style="background:url('<?php echo $SITE_URL; ?>/img/pictos_commerces/sprite_cat.jpg') <?php echo $scposx . "px" . " " . $scposy . "px"?>"></div>
					</div>
		            <div class='presentation_action_right_suggestions_content' onclick="location.href='<?php echo $SITE_URL . "/pages/commerce.php?id_enseigne=" . $id_enseigne; ?>'">
		                <span class='presentation_action_right_suggestions_content_titre'><?php echo tronque(stripslashes($nom_enseigne), 19); ?></span>
		                <span class='presentation_action_right_suggestions_content_categorie'><?php echo tronque($categorie, 19); ?></span>
        			</div>
		            <div class='presentation_action_right_suggestions_note'>
		                <span class='presentation_action_right_suggestions_note_reelle'><?php echo $note_arrondi; ?></span>
		                <span class='presentation_action_right_suggestions_note_base'>/10</span>
		            </div>
        		</div>

	<!-- FIN VIGNETTE TYPE -->
<?php
		} // Fin du while

		$req->closeCursor();    // Ferme la connexion du serveur
		$req2->closeCursor();    // Ferme la connexion du serveur
		$bdd = null;            // Détruit l'objet PDO
?>