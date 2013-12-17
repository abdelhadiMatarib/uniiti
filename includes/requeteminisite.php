<?php
	header('Content-Type: application/json');
	include_once '../config/configPDO.inc.php';

	if (isset($_GET['id_enseigne'])) {$id_enseigne = $_GET['id_enseigne'];} else {exit;}

	// On récupère les informations sur l'enseigne
	$sql = "SELECT *, t5.nom_ville FROM enseignes AS t1
				INNER JOIN sous_categories2 AS t2
				ON t2.id_sous_categorie2 = t1.sscategorie_enseigne
				INNER JOIN sous_categories AS t3
				ON t2.id_sous_categorie = t3.id_sous_categorie
				INNER JOIN categories AS t4
				ON t2.id_categorie = t4.id_categorie
				INNER JOIN villes  AS t5
				ON t1.villes_id_ville = t5.id_ville
				INNER JOIN budget AS t6
				ON t1.id_budget = t6.id_budget
			WHERE id_enseigne = :id_enseigne
		";
	$req = $bdd->prepare($sql);
	$req->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
	$req->execute();
	$result = $req->fetch(PDO::FETCH_ASSOC);
	$data['enseigne'] = $result;

	// On récupère les informations sur le gérant
	/* $sql2 = "SELECT * FROM contributeurs
			WHERE id_contributeur = :id_contributeur
		";
	$req2 = $bdd->prepare($sql2);
	$req2->bindParam(':id_contributeur', $data['enseigne']['professionnels_id_pro'], PDO::PARAM_INT);
	$req2->execute();
	$result2 = $req2->fetch(PDO::FETCH_ASSOC);
	$data['gerant'] = $result2;
         
         */

	// On récupère les informations sur les avis
	$sql3 = "SELECT COUNT(id_avis) AS count_avis, AVG(note) AS moyenne, commentaire
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

	
	$req3 = $bdd->prepare($sql3);
	$req3->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
	$req3->execute();
	$result3 = $req3->fetch(PDO::FETCH_ASSOC);
        
        
        //selim 
        //récup des infos sur les horaires
        
	// On récupère les informations sur les avis
	$sqlHoraires = "SELECT *
			FROM enseignes_horaires
                        WHERE enseignes_id_enseigne = :id_enseigne
			";
        $reqHoraires = $bdd->prepare($sqlHoraires);
	$reqHoraires->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
	$reqHoraires->execute();
	$resultHoraires = $reqHoraires->fetch(PDO::FETCH_ASSOC);
        
        $data['horaires'] = $resultHoraires;
        
        // On récupère les informations sur les avis
	$sqlAvis = "SELECT commentaire, note, date_avis, t5.prenom_contributeur, LEFT(t5.nom_contributeur, 1) as nom_contributeur
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
                                AND id_statut = 2
                                AND commentaire != '' 
                        ORDER BY date_avis DESC
                        LIMIT 10
			";
        $reqAvis = $bdd->prepare($sqlAvis);
	$reqAvis->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
	$reqAvis->execute();
	$resultAvis = $reqAvis->fetchAll(PDO::FETCH_ASSOC);
	
        $sqlPaiement = "SELECT t2.moyenpaiement, t2.posx
			FROM enseignes_moyenspaiements AS t1

			INNER JOIN moyenspaiements AS t2
			ON t1.id_moyenpaiement = t2.id_moyenpaiement
			
			WHERE t1.enseignes_id_enseigne = :id_enseigne 
			";
        $reqPaiement = $bdd->prepare($sqlPaiement);
	$reqPaiement->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
	$reqPaiement->execute();
	$resultPaiement = $reqPaiement->fetchAll(PDO::FETCH_ASSOC);
	 $data['paiement'] = $resultPaiement;
        
        
        $sqlPrestation = "SELECT t1.id_enseignes_prestations, t1.id_type_info, t1.prestation, t2.id_contenu, t2.contenu, t2.prix FROM enseignes_prestations AS t1
						INNER JOIN enseignes_prestations_contenus AS t2
						ON t1.id_enseignes_prestations = t2.id_prestation 
						WHERE t1.enseignes_id_enseigne=:id_enseigne ORDER BY t1.id_enseignes_prestations DESC
			";
        $reqPrestation = $bdd->prepare($sqlPrestation);
	$reqPrestation ->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
	$reqPrestation->execute();
	$resultPrestation = $reqPrestation->fetchAll(PDO::FETCH_ASSOC);
        //converting to a clean array
        $cleanArray = null;
        $name = null;
        $i = 0;
        foreach ($resultPrestation as $key=>$prestation){
         
        
            if($name == null){
                $name = $prestation['prestation'];
                
            }elseif($name != $prestation['prestation']){
                $name = $prestation['prestation'];
            }
                $cleanArray[addslashes($name)][$i]['contenu'] = $prestation['contenu'];
                $cleanArray[addslashes($name)][$i]['prix'] = $prestation['prix'];
                $i++;
        }
           
        $data['prestations'] = $cleanArray;
        
        // On récupère les informations sur les avis
	$sqlAvis = "SELECT commentaire, note, date_avis, t5.prenom_contributeur, LEFT(t5.nom_contributeur, 1) as nom_contributeur, t5.photo_contributeur
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
                                AND id_statut = 2
                                AND commentaire != '' 
                        ORDER BY date_avis DESC
                        LIMIT 10
			";
        $reqAvis = $bdd->prepare($sqlAvis);
	$reqAvis->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
	$reqAvis->execute();
	$resultAvis = $reqAvis->fetchAll(PDO::FETCH_ASSOC);
        
        $data['avis'] = $resultAvis;
        
	$data['enseigne']['nombre_avis'] = $result3['count_avis'];
	$data['enseigne']['note'] = number_format($result3['moyenne'],1);
	
	// On récupère les informations sur les abonnés
	/*
        $sql4 = "SELECT COUNT(contributeurs_id_contributeur) AS count_abonnes
			FROM contributeurs_follow_enseignes AS t1
			WHERE enseignes_id_enseigne = :id_enseigne
			";
	$req4 = $bdd->prepare($sql4);
	$req4->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
	$req4->execute();
	$result4 = $req4->fetch(PDO::FETCH_ASSOC);
	$data['enseigne']['nombre_abonnes'] = $result4['count_abonnes'];
	*/
        
	// On compte le nombre de commerce en réseau avec l'enseigne	
	/*
        $sql5 = "SELECT COUNT(enseignes_id_enseigne1) AS count_reseau
			FROM enseignes_reseau_enseignes AS t1
			WHERE (enseignes_id_enseigne1 = :id_enseigne OR enseignes_id_enseigne2 = :id_enseigne) AND id_statut = 2
			";
	$req5 = $bdd->prepare($sql5);
	$req5->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
	$req5->execute();
	$result5 = $req5->fetch(PDO::FETCH_ASSOC);
	$data['enseigne']['nombre_reseau'] = $result5['count_reseau'];
	*/
        
	// Labels et recommandations
	$sql6 = "SELECT * FROM enseignes_labelsuniiti AS t1
				INNER JOIN labelsuniiti AS t2
				ON t1.id_label = t2.id_label
					WHERE enseignes_id_enseigne=:id_enseigne";
	$req6 = $bdd->prepare($sql6);
	$req6->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
	$req6->execute();
	$result6 = $req6->fetchAll(PDO::FETCH_ASSOC);
	$data['enseigne']['labels'] = $result6;
	
	$sql7 = "SELECT * FROM enseignes_recommandations AS t1
				INNER JOIN recommandations AS t2
				ON t1.id_recommandation = t2.id_recommandation
					WHERE enseignes_id_enseigne=:id_enseigne";
	$req7 = $bdd->prepare($sql7);
	$req7->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
	$req7->execute();
	$result7 = $req7->fetchAll(PDO::FETCH_ASSOC);
	$data['enseigne']['recommandations'] = $result7;		

	// Mots clés
	/*$sql8 = "SELECT id_type_info, id_motcle1, id_motcle2, id_motcle3 FROM enseignes_infos_generales WHERE enseignes_id_enseigne=" . $id_enseigne;
	$req8 = $bdd->prepare($sql8);
	$req8->execute();
	$result8 = $req8->fetchAll(PDO::FETCH_ASSOC); 
         */
	/*
         * $sql9 = "SELECT motcle FROM motscles WHERE id_motcle=:id_motcle";
         *
	$req9 = $bdd->prepare($sql9);
	$AfficheMotcle[1] = $AfficheMotcle[2] = $AfficheMotcle[3] = $AfficheMotcle[4] = false;
        $MotCle = null;
	foreach ($result8 as $row8) {
		$AfficheMotcle[$row8['id_type_info']] = true;
		$req9->bindParam(':id_motcle', $row8['id_motcle1'], PDO::PARAM_INT);
		$req9->execute();
		$result9 = $req9->fetch(PDO::FETCH_ASSOC);
		$MotCle[$row8['id_type_info']][1] = $result9['motcle'];
		$req9->bindParam(':id_motcle', $row8['id_motcle2'], PDO::PARAM_INT);
		$req9->execute();
		$result9 = $req9->fetch(PDO::FETCH_ASSOC);
		$MotCle[$row8['id_type_info']][7] = $result9['motcle'];
		$req9->bindParam(':id_motcle', $row8['id_motcle3'], PDO::PARAM_INT);
		$req9->execute();
		$result9 = $req9->fetch(PDO::FETCH_ASSOC);
		$MotCle[$row8['id_type_info']][3] = $result9['motcle'];			
	}
        //print_r($MotCle);
	$data['enseigne']['motscles'] = $MotCle;
	*/
	/*
        $sql10 = "SELECT t1.prestation, t2.contenu, t2.prix FROM enseignes_prestations AS t1
				INNER JOIN enseignes_prestations_contenus AS t2
				ON t1.enseignes_id_enseigne = t2.enseignes_id_enseigne AND t1.id_type_info = t2.id_type_info
				WHERE t1.enseignes_id_enseigne=:id_enseigne";
	$req10 = $bdd->prepare($sql10);
	$req10->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
	$req10->execute();
	$result10 = $req10->fetchAll(PDO::FETCH_ASSOC);
	$data['enseigne']['prestations'] = $result10;
		*/
        /*
	$sql11 = "SELECT COUNT(contributeurs_id_contributeur) AS count_aime
				FROM contributeurs_aiment_enseignes AS t1
					WHERE enseignes_id_enseigne = :id_enseigne";
	$req11 = $bdd->prepare($sql11);
	$req11->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
	$req11->execute();
	$result11 = $req11->fetch(PDO::FETCH_ASSOC);
	$data['enseigne']['nombre_aime'] = $result11['count_aime'];
*/
        /*
	$sql12 = "SELECT COUNT(contributeurs_id_contributeur) AS count_aime_pas
				FROM contributeurs_aiment_pas_enseignes AS t1
					WHERE enseignes_id_enseigne = :id_enseigne";
	$req12 = $bdd->prepare($sql12);
	$req12->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
	$req12->execute();
	$result12 = $req12->fetch(PDO::FETCH_ASSOC);
	$data['enseigne']['nombre_aime_pas'] = $result12['count_aime_pas'];
*/
        /*
	$sql13 = "SELECT COUNT(contributeurs_id_contributeur) AS count_wish
				FROM contributeurs_wish_enseignes AS t1
					WHERE enseignes_id_enseigne = :id_enseigne";
	$req13 = $bdd->prepare($sql13);
	$req13->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
	$req13->execute();
	$result13 = $req13->fetch(PDO::FETCH_ASSOC);
	$data['enseigne']['nombre_wish'] = $result13['count_wish'];
	*/
        /*
	$req->closeCursor();
	//$req2->closeCursor();
	$req3->closeCursor();
	$req4->closeCursor();
	$req5->closeCursor();
	$req6->closeCursor();
	$req7->closeCursor();
	$req8->closeCursor();
	if ($req9) {$req9->closeCursor();}
	$req10->closeCursor();
	$req11->closeCursor();
	$req12->closeCursor();
	$req13->closeCursor();
	*/
        echo json_encode($data);
        //echo json_encode($data);
?>