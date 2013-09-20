<?php
		$ProvAvis = array('all', 'avis', 'aime', 'aime_pas', 'wish');
		
		$sqldroite = " FROM ( SELECT 'avis' AS provenance, date_avis, id_avis, 'enseigne' AS type, contributeurs_id_contributeur, enseignes_id_enseigne
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
						INNER JOIN sous_categories2 AS t10
							ON t10.id_sous_categorie2 = t9.sscategorie_enseigne
							INNER JOIN sous_categories AS t11
							ON t10.id_sous_categorie = t11.id_sous_categorie
								INNER JOIN categories AS t12
								ON t10.id_categorie = t12.id_categorie";

		switch ($PAGE) {
			case "Commerce" :
				$sqldroite .= " WHERE enseignes_id_enseigne = " . $id_enseigne;
				$sql = "SELECT categorie_principale, couleur FROM enseignes AS t1
							INNER JOIN sous_categories2 AS t2
							ON t2.id_sous_categorie2 = t1.sscategorie_enseigne
								INNER JOIN sous_categories AS t3
								ON t2.id_sous_categorie = t3.id_sous_categorie
									INNER JOIN categories AS t4
									ON t2.id_categorie = t4.id_categorie WHERE id_enseigne=" . $id_enseigne;
				$req = $bdd->prepare($sql);
				$req->execute();
				$result = $req->fetch(PDO::FETCH_ASSOC);
				$Couleur = $result['couleur'];
				echo "<style>.categorie_" . $id_enseigne . " li, .flux_commerce a, .avisenattente_commerce a {background-color:" . $result['couleur'] . " !important;}</style>\n";
			break;
			case "Utilisateur" :
				$sqldroite .= " WHERE contributeurs_id_contributeur = " . $id_contributeur;
			break;
		}
								
		$sqlprovenance = "SELECT provenance, COUNT(id_avis) as compteur" . $sqldroite . " GROUP BY provenance";
		$reqprovenance = $bdd->prepare($sqlprovenance);
		$reqprovenance->execute();
		$resultprovenance = $reqprovenance->fetchAll(PDO::FETCH_ASSOC);
		foreach ($resultprovenance as $row) {
			$CompteurProvenance[$row['provenance']] = $row['compteur'];
		}
		if (isset($CompteurProvenance['avis'])) {$CompteurTotal = $CompteurProvenance['avis'];} else {$CompteurTotal = 0;}
		if (!empty($CompteurProvenance['aime'])) {$CompteurTotal += $CompteurProvenance['aime'];}
		if (!empty($CompteurProvenance['aime_pas'])) {$CompteurTotal += $CompteurProvenance['aime_pas'];}
		if (!empty($CompteurProvenance['wish'])) {$CompteurTotal += $CompteurProvenance['wish'];}		
		
		$sqlcategorie = "SELECT provenance, t10.id_categorie, COUNT(id_avis) as compteur" . $sqldroite  . " GROUP BY provenance, t10.id_categorie";
		$reqcategorie = $bdd->prepare($sqlcategorie);
		$reqcategorie->execute();
		$resultcategorie = $reqcategorie->fetchAll(PDO::FETCH_ASSOC);
		if ($resultcategorie) {
			foreach ($resultcategorie as $row) {
				$CompteurCategorie[$row['provenance']][$row['id_categorie']] = $row['compteur'];
				if (!empty($Somme[$row['id_categorie']])) {$Somme[$row['id_categorie']] += $row['compteur'];}
				else {$Somme[$row['id_categorie']] = $row['compteur'];}
			}
			foreach ($Somme as $key => $value) {
				$CompteurCategorie['all'][$key] = $value;
			}
		}

		$sqlscategorie = "SELECT provenance, t10.id_sous_categorie, COUNT(id_avis) as compteur" . $sqldroite  . " GROUP BY provenance, t10.id_sous_categorie";
		$reqscategorie = $bdd->prepare($sqlscategorie);
		$reqscategorie->execute();
		$resultscategorie = $reqscategorie->fetchAll(PDO::FETCH_ASSOC);
		if ($resultscategorie) {
			foreach ($resultscategorie as $row) {
				$CompteurSousCategorie[$row['provenance']][$row['id_sous_categorie']] = $row['compteur'];
				if (!empty($Sommesscategorie[$row['id_sous_categorie']])) {$Sommesscategorie[$row['id_sous_categorie']] += $row['compteur'];}
				else {$Sommesscategorie[$row['id_sous_categorie']] = $row['compteur'];}
			}
			foreach ($Sommesscategorie as $key => $value) {
				$CompteurSousCategorie['all'][$key] = $value;
			}
		}
		$sqlsscategorie = "SELECT provenance, t10.id_sous_categorie2, COUNT(id_avis) as compteur" . $sqldroite  . " GROUP BY provenance, t10.id_sous_categorie2";
		$reqsscategorie = $bdd->prepare($sqlsscategorie);
		$reqsscategorie->execute();
		$resultsscategorie = $reqsscategorie->fetchAll(PDO::FETCH_ASSOC);
		if ($resultsscategorie) {
			foreach ($resultsscategorie as $row) {
				$CompteurSousCategorie2[$row['provenance']][$row['id_sous_categorie2']] = $row['compteur'];
				if (!empty($Sommesscategorie2[$row['id_sous_categorie2']])) {$Sommesscategorie2[$row['id_sous_categorie2']] += $row['compteur'];}
				else {$Sommesscategorie2[$row['id_sous_categorie2']] = $row['compteur'];}
			}
			foreach ($Sommesscategorie2 as $key => $value) {
				$CompteurSousCategorie2['all'][$key] = $value;
			}
		}

		
		
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
			$Lien2Categories[$row['id_categorie']][$row['id_sous_categorie']] = $row['sous_categorie'];
		}
		$sql = "SELECT * FROM sous_categories2";
		$req = $bdd->prepare($sql);
		$req->execute();
		$result = $req->fetchAll(PDO::FETCH_ASSOC);
		foreach ($result as $row) {
			$Lien3Categories[$row['id_categorie']][$row['id_sous_categorie']][$row['id_sous_categorie2']] = $row['sous_categorie2'];
		}
		$notifmoins100 = "notifs_filter";
		$notifplus100 = "notifs_filter2";
?>

<!--<nav>-->
<div class="filters">
    <style>
        .flux_utilisateur{float:left;}
        .quoideneuf_utilisateur,.recommandations_utilisateur,.avisenattente_utilisateur{float:right;}
        .quoideneuf_utilisateur a,.recommandations_utilisateur a,.avisenattente_utilisateur a,.flux_utilisateur a{display:inline-block;color:white;height:21px;margin-right:1px;padding:12px;background-color:#CBCBCB;}
        .quoideneuf_utilisateur a:hover,.recommandations_utilisateur a:hover,.avisenattente_utilisateur a:hover,.flux_utilisateur a:hover{color:white;background-color:#ADADAD;}
    </style>
    <div class="quoideneuf_utilisateur button_moving"><a href="#" title="">Quoi de neuf ?</a></div>
    <div class="recommandations_utilisateur button_moving"><a href="#" title="">Recommandations</a></div>
    <div class="avisenattente_utilisateur button_moving"><a href="#" title="">Avis en attente</a></div>
    <div class="flux_utilisateur button_moving"><a href="#" title="">Mon flux</a></div>
        <div class="rang0">
            <ul>
				<li onclick="SetFiltre({provenance:'all'});" class="button_all"><div class="<?php if ($CompteurTotal > 99) {echo $notifplus100;} else {echo $notifmoins100;}?>"><span><?php echo $CompteurTotal ?></span></div></li>
            </ul>
        </div>
        <div class="rang1">
            <ul>
				<?php if (!empty($CompteurProvenance['avis'])) { ?>
                <li onclick="SetFiltre({provenance:'avis'});" class="avis button_avis"><div class="<?php if ($CompteurProvenance['avis'] > 99) {echo $notifplus100;} else {echo $notifmoins100;}?>"><span><?php echo $CompteurProvenance['avis']; ?></span></div></li>
				<?php } 
				if (!empty($CompteurProvenance['aime'])) { ?>
                <li onclick="SetFiltre({provenance:'aime'});" class="aime button_like"><div class="<?php if ($CompteurProvenance['aime'] > 99) {echo $notifplus100;} else {echo $notifmoins100;}?>"><span><?php echo $CompteurProvenance['aime']; ?></span></div></li>
				<?php }
				if (!empty($CompteurProvenance['aime_pas'])) { ?>
                <li onclick="SetFiltre({provenance:'aime_pas'});" class="aime_pas button_dislike"><div class="<?php if ($CompteurProvenance['aime_pas'] > 99) {echo $notifplus100;} else {echo $notifmoins100;}?>"><span><?php echo $CompteurProvenance['aime_pas']; ?></span></div></li>
				<?php }
				if (!empty($CompteurProvenance['wish'])) { ?>
                <li onclick="SetFiltre({provenance:'wish'});" class="wish button_wishlist"><div class="<?php if ($CompteurProvenance['wish'] > 99) {echo $notifplus100;} else {echo $notifmoins100;}?>"><span><?php echo $CompteurProvenance['wish']; ?></span></div></li>
				<?php } ?>
            </ul> 
        </div>
        <div class="rang2">
            <ul>
				<?php 
				$Compteur = 0;
				foreach ($Lien1Categories as $Key => $Categorie) { 
					if (!empty($CompteurCategorie['all'][$Key])) {
						foreach ($ProvAvis as $provenance) {
							if (!empty($CompteurCategorie[$provenance][$Key])) { ?>
								<li onclick="SetFiltre({provenance:'<?php echo $provenance ?>', categorie:<?php echo $Key ?>});" class="<?php echo $provenance ?> cat<?php echo $Key ?>"><?php echo $Categorie ?><div class="<?php if ($CompteurCategorie[$provenance][$Key] > 99) {echo $notifplus100;} else {echo $notifmoins100;}?>"><span><?php echo $CompteurCategorie[$provenance][$Key] ?></span></div></li>
				<?php 		}
						}
					}
				} ?>
            </ul>            
        </div>
        <div class="rang3">
            <ul>
				<?php 
					$Compteur = 0;
					foreach ($Lien2Categories as $Key => $Categorie) { 
						foreach ($Lien2Categories[$Key] as $Key2 => $SousCategorie) { 
							if (!empty($CompteurSousCategorie['all'][$Key2])) {
								foreach ($ProvAvis as $provenance) {
									if (!empty($CompteurSousCategorie[$provenance][$Key2])) { ?>
				<li onclick="SetFiltre({provenance:'<?php echo $provenance ?>', categorie:<?php echo $Key ?>, scategorie:<?php echo $Key2 ?>});" class="<?php echo $provenance ?> cat<?php echo $Key ?> sscat<?php echo $Key2 ?>"><?php echo $SousCategorie ?><div class="<?php if ($CompteurSousCategorie[$provenance][$Key2] > 99) {echo $notifplus100;} else {echo $notifmoins100;}?>"><span><?php echo $CompteurSousCategorie[$provenance][$Key2] ?></span></div></li>
				<?php 				}
								}
							}
						}
					  }	?>
            </ul>            
        </div>
        <div class="rang4">
            <ul>
				<?php 
					$Compteur = 0;
					foreach ($Lien3Categories as $Key => $Categorie) {
						foreach ($Lien3Categories[$Key] as $Key2 => $SousCategorie) {
							foreach ($Lien3Categories[$Key][$Key2] as $Key3 => $SousCategorie2) {
								if (!empty($CompteurSousCategorie2['all'][$Key3])) {
									foreach ($ProvAvis as $provenance) {
										if (!empty($CompteurSousCategorie2[$provenance][$Key3])) { 								
											if ($SousCategorie2 != "") { ?>
				<li onclick="SetFiltre({provenance:'<?php echo $provenance ?>', categorie:<?php echo $Key ?>, scategorie:<?php echo $Key2 ?>, sscategorie:<?php echo $Key3 ?>});" class="<?php echo $provenance ?> cat<?php echo $Key ?> sscat<?php echo $Key2 ?>"><?php echo $SousCategorie2 ?><div class="<?php if ($CompteurSousCategorie2[$provenance][$Key3] > 99) {echo $notifplus100;} else {echo $notifmoins100;}?>"><span><?php echo $CompteurSousCategorie2[$provenance][$Key3] ?></span></div></li>
				<?php						}
										}
									}
								}
							}
						}
					  }	?>
            </ul>            
        </div>
</div>
<!--</nav>-->