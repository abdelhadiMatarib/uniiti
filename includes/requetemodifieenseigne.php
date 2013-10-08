<?php
header('Content-Type: application/json');
include_once '../config/configPDO.inc.php';

if (isset($_POST['id_enseigne'])) {$id_enseigne = $_POST['id_enseigne'];} else {exit;}

switch ($_POST['step']) {
	case "General" :
		$nom_enseigne            = htmlspecialchars($_POST['nom_enseigne']);
		$adresse1_enseigne       = htmlspecialchars($_POST['adresse1_enseigne']);
		$id_ville	             = $_POST['id_ville'];
		$code_postal             = htmlspecialchars($_POST['cp_enseigne']);
		$id_sous_categorie2      = $_POST['id_sous_categorie2'];
		$telephone_enseigne      = htmlspecialchars($_POST['telephone_enseigne']);
		$url                     = htmlspecialchars($_POST['url']);
		$id_quartier             = $_POST['id_quartier'];
		$id_budget               = $_POST['id_budget'];
		break;
	case "Concept" :
		if (isset($_POST['descriptif'])) {$descriptif          = htmlspecialchars($_POST['descriptif']);}
		break;
	case "Video" :
		$url_video = $_POST['url_video'];
		break;
	case "Labels" :
		$label[1] = $_POST['label1'];
		$label[2] = $_POST['label2'];
		$label[3] = $_POST['label3'];
		$label[4] = $_POST['label4'];
		$label[5] = $_POST['label5'];
		$label[6] = $_POST['label6'];
		break;
	case "Recommandations" :
		$recommandation[1] = $_POST['recommandation1'];
		$recommandation[2] = $_POST['recommandation2'];
		$recommandation[3] = $_POST['recommandation3'];
		$recommandation[4] = $_POST['recommandation4'];
		$recommandation[5] = $_POST['recommandation5'];
		$recommandation[6] = $_POST['recommandation6'];
		break;
	case "MotsCles" :
		$MotCle[1][1] = $_POST['motcle11'];
		$MotCle[1][2] = $_POST['motcle12'];
		$MotCle[1][3] = $_POST['motcle13'];
		$MotCle[2][1] = $_POST['motcle21'];
		$MotCle[2][2] = $_POST['motcle22'];
		$MotCle[2][3] = $_POST['motcle23'];
		$MotCle[3][1] = $_POST['motcle31'];
		$MotCle[3][2] = $_POST['motcle32'];
		$MotCle[3][3] = $_POST['motcle33'];
		$MotCle[4][1] = $_POST['motcle41'];
		$MotCle[4][2] = $_POST['motcle42'];
		$MotCle[4][3] = $_POST['motcle43'];
		
		break;
	case "Prestations" :
		$NomPrestation[14] = $_POST['prestation1'];
		$Prestation[14][1] = $_POST['prestation11'];$Prix[14][1] = $_POST['prix11'];
		$Prestation[14][2] = $_POST['prestation12'];$Prix[14][2] = $_POST['prix12'];
		$Prestation[14][3] = $_POST['prestation13'];$Prix[14][3] = $_POST['prix13'];
		$Prestation[14][4] = $_POST['prestation14'];$Prix[14][4] = $_POST['prix14'];
		$Prestation[14][5] = $_POST['prestation15'];$Prix[14][5] = $_POST['prix15'];
		$NomPrestation[15] = $_POST['prestation2'];
		$Prestation[15][1] = $_POST['prestation21'];$Prix[15][1] = $_POST['prix21'];
		$Prestation[15][2] = $_POST['prestation22'];$Prix[15][2] = $_POST['prix22'];
		$Prestation[15][3] = $_POST['prestation23'];$Prix[15][3] = $_POST['prix23'];
		$Prestation[15][4] = $_POST['prestation24'];$Prix[15][4] = $_POST['prix24'];
		$Prestation[15][5] = $_POST['prestation25'];$Prix[15][5] = $_POST['prix25'];
		$NomPrestation[16] = $_POST['prestation3'];
		$Prestation[16][1] = $_POST['prestation31'];$Prix[16][1] = $_POST['prix31'];
		$Prestation[16][2] = $_POST['prestation32'];$Prix[16][2] = $_POST['prix32'];
		$Prestation[16][3] = $_POST['prestation33'];$Prix[16][3] = $_POST['prix33'];
		$Prestation[16][4] = $_POST['prestation34'];$Prix[16][4] = $_POST['prix34'];
		$Prestation[16][5] = $_POST['prestation35'];$Prix[16][5] = $_POST['prix35'];
		
		break;
	default:
		exit;
		break;
}

try
{
	// Requete
	$bdd->beginTransaction(); // Début transaction pour requetes multiples
	switch ($_POST['step']) {
		case "General" :
			if ($id_enseigne == 0) {
				$sql = "INSERT INTO enseignes 
				( nom_enseigne, adresse1_enseigne, villes_id_ville,	cp_enseigne, sscategorie_enseigne,
					telephone_enseigne,	url, id_quartier, id_budget, slide1_enseigne, box_enseigne ) VALUES (:nom_enseigne, :adresse1_enseigne, 
					:villes_id_ville, :code_postal, :id_sous_categorie2, :telephone_enseigne, :url, :id_quartier, :id_budget, :slide1_enseigne, :box_enseigne)";
			} else {
				$sql = "UPDATE enseignes 
						SET nom_enseigne=:nom_enseigne,
							adresse1_enseigne=:adresse1_enseigne,
							villes_id_ville=:villes_id_ville,
							cp_enseigne=:code_postal,
							sscategorie_enseigne=:id_sous_categorie2,
							telephone_enseigne=:telephone_enseigne,
							url=:url,
							id_quartier=:id_quartier,
							id_budget=:id_budget
							WHERE id_enseigne=:id_enseigne";
			}
			$req = $bdd->prepare($sql);
			if ($id_enseigne != 0) {$req->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);}
			else {
				$box = "photo 1.jpg";
				$couv = "photo " . rand(1,113) . ".jpg";
				$req->bindParam(':slide1_enseigne', $couv, PDO::PARAM_STR);
				$req->bindParam(':box_enseigne', $box, PDO::PARAM_STR);
			}
			$req->bindParam(':nom_enseigne', $nom_enseigne, PDO::PARAM_STR);
			$req->bindParam(':adresse1_enseigne', $adresse1_enseigne, PDO::PARAM_STR);
			$req->bindParam(':villes_id_ville', $id_ville, PDO::PARAM_STR);
			$req->bindParam(':code_postal', $code_postal, PDO::PARAM_STR);
			$req->bindParam(':id_sous_categorie2', $id_sous_categorie2, PDO::PARAM_INT);
			$req->bindParam(':telephone_enseigne', $telephone_enseigne, PDO::PARAM_STR);
			$req->bindParam(':url', $url, PDO::PARAM_STR);
			$req->bindParam(':id_quartier', $id_quartier, PDO::PARAM_INT);
			$req->bindParam(':id_budget', $id_budget, PDO::PARAM_INT);
			$req->execute();
		break;
		case "Concept" ;
			$sql = "UPDATE enseignes SET descriptif=:descriptif WHERE id_enseigne=:id_enseigne";
			$req = $bdd->prepare($sql);
			$req->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
			$req->bindParam(':descriptif', $descriptif, PDO::PARAM_STR);
			$req->execute();
			break;
		case "Video" :
			$sql = "UPDATE enseignes SET video_enseigne=:url_video WHERE id_enseigne=:id_enseigne";
			$req = $bdd->prepare($sql);
			$req->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
			$req->bindParam(':url_video', $url_video, PDO::PARAM_STR);
			$req->execute();
			break;
		case "Labels" :
			$sqlcheck = "SELECT * FROM enseignes_labelsuniiti WHERE enseignes_id_enseigne=:id_enseigne AND id_label=:id_label";
			$reqcheck = $bdd->prepare($sqlcheck);
			$reqcheck->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
			foreach ($label as $key => $id_label) {
				if ($id_label != '') {
					$reqcheck->bindParam(':id_label', $id_label, PDO::PARAM_INT);
					$reqcheck->execute();
					$resultcheck = $reqcheck->fetch(PDO::FETCH_ASSOC);
					if (!$resultcheck) {
						$sql = "INSERT INTO enseignes_labelsuniiti (enseignes_id_enseigne, id_label) VALUES (:id_enseigne, :id_label)";
						$req = $bdd->prepare($sql);
						$req->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
						$req->bindParam(':id_label', $id_label, PDO::PARAM_INT);
						$req->execute();
					}
					$nepaseffacer[$id_label] = 1;
				}
			}
			$sqlcheck = "SELECT * FROM enseignes_labelsuniiti WHERE enseignes_id_enseigne=:id_enseigne";
			$reqcheck = $bdd->prepare($sqlcheck);
			$reqcheck->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
			$reqcheck->execute();
			$resultcheck = $reqcheck->fetchAll(PDO::FETCH_ASSOC);		
			foreach ($resultcheck as $row) {
				if (!isset($nepaseffacer[$row['id_label']])) {
						$sql = "DELETE FROM enseignes_labelsuniiti WHERE enseignes_id_enseigne=:id_enseigne AND id_label=:id_label";
						$req = $bdd->prepare($sql);
						$req->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
						$req->bindParam(':id_label', $row['id_label'], PDO::PARAM_INT);
						$req->execute();				
				}
			}
			$reqcheck->closeCursor();
			break;
		case "Recommandations" :
			$sqlcheck = "SELECT * FROM enseignes_recommandations WHERE enseignes_id_enseigne=:id_enseigne AND id_recommandation=:id_recommandation";
			$reqcheck = $bdd->prepare($sqlcheck);
			$reqcheck->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
			foreach ($recommandation as $key => $id_recommandation) {
				if ($id_recommandation != '') {
					$reqcheck->bindParam(':id_recommandation', $id_recommandation, PDO::PARAM_INT);
					$reqcheck->execute();
					$resultcheck = $reqcheck->fetch(PDO::FETCH_ASSOC);
					if (!$resultcheck) {
						$sql = "INSERT INTO enseignes_recommandations (enseignes_id_enseigne, id_recommandation) VALUES (:id_enseigne, :id_recommandation)";
						$req = $bdd->prepare($sql);
						$req->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
						$req->bindParam(':id_recommandation', $id_recommandation, PDO::PARAM_INT);
						$req->execute();
					}
					$nepaseffacer[$id_recommandation] = 1;
				}
			}
			$sqlcheck = "SELECT * FROM enseignes_recommandations WHERE enseignes_id_enseigne=:id_enseigne";
			$reqcheck = $bdd->prepare($sqlcheck);
			$reqcheck->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
			$reqcheck->execute();
			$resultcheck = $reqcheck->fetchAll(PDO::FETCH_ASSOC);		
			foreach ($resultcheck as $row) {
				if (!isset($nepaseffacer[$row['id_recommandation']])) {
						$sql = "DELETE FROM enseignes_recommandations WHERE enseignes_id_enseigne=:id_enseigne AND id_recommandation=:id_recommandation";
						$req = $bdd->prepare($sql);
						$req->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
						$req->bindParam(':id_recommandation', $row['id_recommandation'], PDO::PARAM_INT);
						$req->execute();				
				}
			}
			$reqcheck->closeCursor();
			break;
		case "MotsCles" :
			foreach ($MotCle as $id_type_info => $value) {
				$ACreerOuModifier = false;
				if (($MotCle[$id_type_info][1] != '') || ($MotCle[$id_type_info][2] != '') || ($MotCle[$id_type_info][3] != '')) {$ACreerOuModifier = true;}
				$sqlcheck = "SELECT * FROM enseignes_infos_generales WHERE enseignes_id_enseigne=:id_enseigne AND id_type_info=:id_type_info";
				$reqcheck = $bdd->prepare($sqlcheck);
				$reqcheck->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
				$reqcheck->bindParam(':id_type_info', $id_type_info, PDO::PARAM_INT);
				$reqcheck->execute();
				$resultcheck = $reqcheck->fetch(PDO::FETCH_ASSOC);
				if ((!$resultcheck) AND ($ACreerOuModifier)) {
						$sql = "INSERT INTO enseignes_infos_generales (enseignes_id_enseigne, id_type_info, id_motcle1, id_motcle2, id_motcle3) VALUES (:id_enseigne, :id_type_info, :id_motcle1, :id_motcle2, :id_motcle3)";
						$req = $bdd->prepare($sql);
						$req->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
						$req->bindParam(':id_type_info', $id_type_info, PDO::PARAM_INT);
						$req->bindParam(':id_motcle1', $MotCle[$id_type_info][1], PDO::PARAM_INT);
						$req->bindParam(':id_motcle2', $MotCle[$id_type_info][2], PDO::PARAM_INT);
						$req->bindParam(':id_motcle3', $MotCle[$id_type_info][3], PDO::PARAM_INT);
						$req->execute();					
				} else if (($resultcheck) AND ($ACreerOuModifier)) {
						$sql = "UPDATE enseignes_infos_generales SET id_motcle1=:id_motcle1, id_motcle2=:id_motcle2, id_motcle3=:id_motcle3 WHERE enseignes_id_enseigne=:id_enseigne AND id_type_info=:id_type_info";
						$req = $bdd->prepare($sql);
						$req->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
						$req->bindParam(':id_type_info', $id_type_info, PDO::PARAM_INT);
						$req->bindParam(':id_motcle1', $MotCle[$id_type_info][1], PDO::PARAM_INT);
						$req->bindParam(':id_motcle2', $MotCle[$id_type_info][2], PDO::PARAM_INT);
						$req->bindParam(':id_motcle3', $MotCle[$id_type_info][3], PDO::PARAM_INT);
						$req->execute();				
				} else if (($resultcheck) AND (!$ACreerOuModifier)) {
						$sql = "DELETE FROM enseignes_infos_generales WHERE enseignes_id_enseigne=:id_enseigne AND id_type_info=:id_type_info";
						$req = $bdd->prepare($sql);
						$req->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
						$req->bindParam(':id_type_info', $id_type_info, PDO::PARAM_INT);
						$req->execute();				
				}
			}
			
			break;
		case "Prestations" :
			$sqldelete = "DELETE FROM enseignes_prestations_contenus WHERE enseignes_id_enseigne=:id_enseigne AND id_type_info=:id_type_info";
			$reqdelete = $bdd->prepare($sqldelete);
			$reqdelete->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
			foreach ($Prestation as $id_type_info => $value) {
				$ACreerOuModifier = false;
				if ($NomPrestation[$id_type_info] != '') {$ACreerOuModifier = true;}
				$sqlcheck = "SELECT * FROM enseignes_prestations WHERE enseignes_id_enseigne=:id_enseigne AND id_type_info=:id_type_info";
				$reqcheck = $bdd->prepare($sqlcheck);
				$reqcheck->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
				$reqcheck->bindParam(':id_type_info', $id_type_info, PDO::PARAM_INT);
				$reqcheck->execute();
				$resultcheck = $reqcheck->fetch(PDO::FETCH_ASSOC);
				if ((!$resultcheck) AND ($ACreerOuModifier)) {
						$sql = "INSERT INTO enseignes_prestations (enseignes_id_enseigne, id_type_info, prestation) VALUES (:id_enseigne, :id_type_info, :prestation)";
						$req = $bdd->prepare($sql);
						$req->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
						$req->bindParam(':id_type_info', $id_type_info, PDO::PARAM_INT);
						$req->bindParam(':prestation', $NomPrestation[$id_type_info], PDO::PARAM_INT);
						$req->execute();
				} else if (($resultcheck) AND ($ACreerOuModifier)) {
						$sql = "UPDATE enseignes_prestations SET prestation=:prestation WHERE enseignes_id_enseigne=:id_enseigne AND id_type_info=:id_type_info";
						$req = $bdd->prepare($sql);
						$req->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
						$req->bindParam(':id_type_info', $id_type_info, PDO::PARAM_INT);
						$req->bindParam(':prestation', $NomPrestation[$id_type_info], PDO::PARAM_INT);
						$req->execute();
				} else if (($resultcheck) AND (!$ACreerOuModifier)) {
						$sql = "DELETE FROM enseignes_prestations WHERE enseignes_id_enseigne=:id_enseigne AND id_type_info=:id_type_info";
						$req = $bdd->prepare($sql);
						$req->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
						$req->bindParam(':id_type_info', $id_type_info, PDO::PARAM_INT);
						$req->execute();
				}
				$reqdelete->bindParam(':id_type_info', $id_type_info, PDO::PARAM_INT);
				$reqdelete->execute();
				foreach ($Prestation[$id_type_info] as $id_contenu => $contenu) {
					if ($contenu != '') {
						$sql = "INSERT INTO enseignes_prestations_contenus (id_contenu, enseignes_id_enseigne, id_type_info, contenu, prix) VALUES (:id_contenu, :id_enseigne, :id_type_info, :contenu, :prix)";
						$req = $bdd->prepare($sql);
						$req->bindParam(':id_contenu', $id_contenu, PDO::PARAM_INT);
						$req->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
						$req->bindParam(':id_type_info', $id_type_info, PDO::PARAM_INT);
						$req->bindParam(':contenu', $contenu, PDO::PARAM_STR);
						$req->bindParam(':prix', $Prix[$id_type_info][$id_contenu], PDO::PARAM_STR);
						$req->execute();
						$id_contenu++;
					}					
				}
			}
			
			break;

	}

	if ($id_enseigne == 0) {$id_enseigne = $bdd->lastInsertId();}
	$bdd->commit(); // Validation de la transaction / des requetes
	if (isset($req)) {$req->closeCursor();}

	$data['result'] = $id_enseigne;

	$bdd = null;            // Détruit l'objet PDO
	
	echo json_encode($data);

}
// Gestion des erreurs
catch (PDOException $erreur)
{	
	$bdd->rollBack(); // Erreur => annulation transaction / des requetes  
	$data['result'] = $erreur->getMessage();
	echo json_encode($data);
	die ('Erreur : ' .$erreur->getMessage());
	exit;
}

?>