<?php

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

		$sql5 = "SELECT quartier, arrondissement FROM quartier AS t1
					INNER JOIN arrondissement AS t2
					ON t1.id_arrondissement = t2.id_arrondissement WHERE t1.id_quartier = :id_quartier";
		$req5 = $bdd->prepare($sql5);
		
		// Requête de tirage aléatoire d'une enseigne		
		$sql2 = "SELECT t10.id_categorie, t10.id_sous_categorie, t10.id_sous_categorie2, categorie_principale, sous_categorie, sous_categorie2,
						couleur, t11.posx AS scposx, t11.posy AS scposy, t10.posx, t10.posy, id_enseigne, nom_enseigne, id_quartier, nom_ville, slide1_enseigne, y1
				FROM enseignes AS t9
					INNER JOIN sous_categories2 AS t10
						ON t10.id_sous_categorie2 = t9.sscategorie_enseigne
						INNER JOIN sous_categories AS t11
						ON t10.id_sous_categorie = t11.id_sous_categorie
							INNER JOIN categories AS t12
							ON t10.id_categorie = t12.id_categorie 
								INNER JOIN villes  AS t13
								ON t9.villes_id_ville = t13.id_ville ORDER BY RAND() DESC LIMIT 0,1";

		$req2 = $bdd->prepare($sql2);
		$req2->execute();
		$row = $req2->fetch(PDO::FETCH_ASSOC);

		// Enseigne
		$id_enseigne             = $row['id_enseigne'];
		$nom_enseigne            = $row['nom_enseigne'];
		$ville_enseigne          = $row['nom_ville'];
		$couleur 				 = $row['couleur'];
		$slide1_enseigne		 = $row['slide1_enseigne'];
		$y1		 				 = $row['y1'];
		$categorie				 = $row['categorie_principale'];
		$sous_categorie          = $row['sous_categorie'];
		$sous_categorie2         = $row['sous_categorie2'];
		$scposx					 = $row['scposx'];
		$scposy					 = $row['scposy'];
		$posx					 = $row['posx'];
		$posy					 = $row['posy'];

		$req5->bindParam(':id_quartier', $row['id_quartier'], PDO::PARAM_INT);
		$req5->execute();
		$result5 = $req5->fetch(PDO::FETCH_ASSOC);
		if ($result5['arrondissement'] != "Indéfini") {$arrondissement = $result5['arrondissement'];}
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
		
		$req->closeCursor();    // Ferme la connexion du serveur
		$req2->closeCursor();    // Ferme la connexion du serveur
		$req3->closeCursor();    // Ferme la connexion du serveur
		$bdd = null;            // Détruit l'objet PDO
		
		$Chemin = SITE_URL . "/photos/enseignes/couvertures/";
		
		$dataLDW = "{id_contributeur :" . $_SESSION['SESS_MEMBER_ID'] . "," . "id_enseigne :" . $id_enseigne . ", categorie : '" . addslashes($categorie) . "'}";
		$like_step1 = "ActualisePopin(" . $dataLDW . ", '/includes/popins/like_step1.tpl.php', 'default_dialog');";
		$dislike_step1 = "ActualisePopin(" . $dataLDW . ", '/includes/popins/dislike_step1.tpl.php', 'default_dialog');";
		$wishlist_step1 = "Actualise(" . $dataLDW . ", '/includes/popins/wishlist_step1.tpl.php', 'default_dialog');";
		
?>	<!-- SUGGESTION TYPE -->

<div class="suggestion_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="suggestion_head">
        <div class="suggestion_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_suggestions.png" title="" alt="" height="39" width="39" />
        </div><span class="maintitle">Vous pourriez également aimer...</span>
    </div>   
    <div class="suggestion_body">
	
		<div class="presentation_action_left_head_img_container_picto_categorie">
			<div class="box_icon" title="<?php if ($sous_categorie2 == NULL) {echo $sous_categorie;} else {echo $sous_categorie2;} ?>" style="background:url('<?php echo SITE_URL; ?>/img/pictos_commerces/sprite_cat.jpg') <?php echo $scposx . "px" . " " . $scposy . "px"?>"></div>
		</div>
		
		<div class="suggestion_action_left_head_categorie_wrap">    
			<span class="presentation_action_left_head_titre"><?php echo $nom_enseigne; ?></span>
			<span class="presentation_action_left_head_categorie"><?php echo $categorie; ?></span>
		</div>   
		
		<div class="presentation_action_left_head_likes_wrap">
			<div class="presentation_action_left_head_img_container_picto_likes"></div>
			<span class="presentation_action_left_head_nombrelikes"><strong><?php echo $count_likes; ?></strong></span>
			<span class="presentation_action_left_head_nombrelikes_txt">LIKE</span>
		</div>
			
		<div class="presentation_action_left_head_note_wrap">
			<?php echo AfficheEtoiles($note_arrondi, $categorie); ?>
			<span class="presentation_action_left_head_note_txt"><?php echo $note_arrondi; ?>/10 - <?php echo $count_avis_enseigne; ?> Avis</span>
		</div>
    </div>
    
	<div class="suggestion_action_left_figure">
		<div class="box_localisation suggestion_box_localisation"><span><?php echo $arrondissement;?></span></div>
		<div class="suggestion_vertical_sep1"></div>
		<div class="suggestion_vertical_sep2"></div>
		<div class="wrapper_boutons_popin wrapper_boutons_suggestions">
			<div title="J'aime" onclick="<?php echo $like_step1; ?>" class="boutons_action_popin" <?php echo AfficheAction('aime',$categorie); ?>></div>
			<div title="Je n'aime pas" onclick="<?php echo $dislike_step1; ?>" class="boutons_action_popin" <?php echo AfficheAction('aime_pas',$categorie); ?>></div>
			<div title="Ajouter à ma Wishlist" onclick="<?php echo $wishlist_step1; ?>" class="boutons_action_popin" <?php echo AfficheAction('wish',$categorie); ?>></div>
		</div>
	
		<figure>
			<img id="couv1" src="<?php echo $Chemin . $slide1_enseigne; ?>" style="width:500px;margin-top : <?php echo -$y1*500/1750; ?>px;" title="" alt="">
		</figure>
	</div>
    <div class="suggestion_footer"></div>
</div>

	<!-- FIN SUGGESTION TYPE -->
