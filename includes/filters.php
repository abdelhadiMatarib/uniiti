<?php

		$sql = " SELECT provenance, type, categorie_principale, sous_categorie, sous_categorie2, COUNT(id_avis) as compteur
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
					SELECT 'aime pas' as provenance, date_aime_pas AS date_avis, '' AS id_avis, 'enseigne' AS type, contributeurs_id_contributeur, enseignes_id_enseigne
					FROM contributeurs_aiment_pas_enseignes AS t5
				UNION
					SELECT 'wish' as provenance, date_wish AS date_avis, '' AS id_avis, 'enseigne' AS type, contributeurs_id_contributeur, enseignes_id_enseigne
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
								ON t10.id_categorie = t12.id_categorie ";	

		$req = $bdd->prepare($sql);
		$req->execute();
		$result = $req->fetchAll(PDO::FETCH_ASSOC);
/* SELECT categorie_principale, sous_categorie, sous_categorie2, couleur FROM sous_categories2 AS t1
INNER JOIN sous_categories AS t2
ON t1.id_sous_categorie = t2.id_sous_categorie
INNER JOIN categories AS t3
ON t1.id_categorie = t3.id_categorie */


		$sql = "SELECT * FROM categories";
		$req = $bdd->prepare($sql);
		$req->execute();
		$result = $req->fetchAll(PDO::FETCH_ASSOC);
		foreach ($result as $row) {
			$Lien1Categories[$row['id_categorie']] = $row['categorie_principale'];
		}
		$sql = "SELECT * FROM sous_categories";
		$req = $bdd->prepare($sql);
		$req->execute();
		$result = $req->fetchAll(PDO::FETCH_ASSOC);
		foreach ($result as $row) {
			$Lien2Categories[$Lien1Categories[$row['id_categorie']]][$row['id_sous_categorie']] = $row['sous_categorie'];
		}
		$sql = "SELECT * FROM sous_categories2";
		$req = $bdd->prepare($sql);
		$req->execute();
		$result = $req->fetchAll(PDO::FETCH_ASSOC);
		foreach ($result as $row) {
			$Lien3Categories[$Lien1Categories[$row['id_categorie']]][$Lien2Categories[$Lien1Categories[$row['id_categorie']]][$row['id_sous_categorie']]][$row['id_sous_categorie2']] = $row['sous_categorie2'];
		}
?>

<!--<nav>-->
<div class="filters">
        <div class="rang0">
            <ul>
                <li class="button_all"><div class="notifs_filter"><span>12</span></div></li>
            </ul>
        </div>
        <div class="rang1">
            <ul>
                <li class="button_avis"><div class="notifs_filter"><span>12</span></div></li>
                <li class="button_like"><div class="notifs_filter"><span>12</span></div></li>
                <li class="button_dislike"><div class="notifs_filter"><span>12</span></div></li>
                <li class="button_wishlist"><div class="notifs_filter"><span>12</span></div></li>
            </ul> 
        </div>
        <div class="rang2">
            <ul>
				<?php 
				$Compteur = 0;
				foreach ($Lien1Categories as $Key => $Categorie) { 
					$Compteur++ ?>
					<li class="cat<?php echo $Compteur ?>"><?php echo $Categorie ?><div class="notifs_filter"><span>12</span></div></li>
				<?php }	?>
            </ul>            
        </div>
        <div class="rang3">
            <ul>
				<?php 
					$Compteur = 0;
					foreach ($Lien2Categories as $Key => $Categorie) { 
						$Compteur++;
						$CompteurSousCat = 0;
						foreach ($Lien2Categories[$Key] as $Key2 => $SousCategorie) {
						$CompteurSousCat++; ?>
                <li class="cat<?php echo $Compteur ?> sscat<?php echo $CompteurSousCat ?>"><?php echo $SousCategorie ?></li>
				<?php 	}
					  }	?>
            </ul>            
        </div>
        <div class="rang4">
            <ul>
				<?php 
					$Compteur = 0;
					foreach ($Lien3Categories as $Key => $Categorie) {
						$Compteur++;
						$CompteurSousCat = 0;
						foreach ($Lien3Categories[$Key] as $Key2 => $SousCategorie) {
							$CompteurSousCat++;
							foreach ($Lien3Categories[$Key][$Key2] as $Key3 => $SousCategorie2) {
								if ($SousCategorie2 != "") { ?>
                <li class="cat<?php echo $Compteur ?> sscat<?php echo $CompteurSousCat ?>"><?php echo $SousCategorie2 ?></li>
				<?php			}
							}
						}
					  }	?>
            </ul>            
        </div>
</div>
<!--</nav>-->