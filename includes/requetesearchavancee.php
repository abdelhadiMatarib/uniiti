<?php 
	header('Content-Type: application/json');
	include_once '../config/configPDO.inc.php';
	
	if (!isset($_POST['cible'])) {exit;} else {$cible = $_POST['cible'];}

	switch ($cible) {
		case 'type' :
			$sqlgauche = "SELECT type";
			$sqldroite = " GROUP BY type";
		break;
		case 'id_ville' :
			$sqlgauche = "SELECT t9.villes_id_ville AS id, nom_ville AS nom";
			$sqldroite = " GROUP BY id";
		break;
		case 'categorie' :
			$sqlgauche = "SELECT t10.id_categorie AS id, categorie_principale AS nom, t12.posx, t12.posy";
			$sqldroite = " GROUP BY id";
		break;
		case 'scategorie' :
			$sqlgauche = "SELECT t10.id_sous_categorie AS id, sous_categorie AS nom, t11.posx, t11.posy";
			$sqldroite = " GROUP BY id";
		break;
		case 'sscategorie' :
			$sqlgauche = "SELECT t10.id_sous_categorie2 AS id, sous_categorie2 AS nom, t10.posx, t10.posy";
			$sqldroite = " GROUP BY id";
		break;
		case 'id_budget' :
			$sqlgauche = "SELECT t9.id_budget AS id, budget_enseigne AS nom";
			$sqldroite = " GROUP BY id";
		break;		 
	}
	
	// Requête de récupération des infos contributeurs, date, note, commentaire, enseigne		
	$sqlmilieu = " FROM ( SELECT 'avis' AS provenance, date_avis, id_avis, id_statut, 'enseigne' AS type, contributeurs_id_contributeur, enseignes_id_enseigne
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
	$ClauseWhere = false;
	$sqlmilieu .= "WHERE (id_statut = 2 OR (id_statut = 1 AND date_avis < '" . $datemoinssept . "'))";
	if (!empty($_POST['type'])) {$sqlmilieu .= " AND type = '" . $_POST['type'] . "'";}
	if (!empty($_POST['id_ville'])) {$sqlmilieu .= " AND t9.villes_id_ville = " . $_POST['id_ville'];}
	if (!empty($_POST['categorie'])) {$sqlmilieu .= " AND t10.id_categorie = " . $_POST['categorie'];}
	if (!empty($_POST['scategorie'])) {$sqlmilieu .= " AND t10.id_sous_categorie = " . $_POST['scategorie'];}
	if (!empty($_POST['sscategorie'])) {$sqlmilieu .= " AND t10.id_sous_categorie2 = " . $_POST['sscategorie'];}
	if (!empty($_POST['id_budget'])) {$sqlmilieu .= " AND t9.id_budget = " . $_POST['id_budget'];}

	$req = $bdd->prepare($sqlgauche . $sqlmilieu . $sqldroite);
	$req->execute();
	$result = $req->fetchAll(PDO::FETCH_ASSOC);

	$Compteur = 0;
	foreach ($result as $row)
	{
		$Compteur++;
		foreach ($row as $key => $value) {$data[$Compteur][$key] = $value;}
	}	

	if (!isset($data)) {$data['result'] = 'no data';}
	echo json_encode($data);
?>