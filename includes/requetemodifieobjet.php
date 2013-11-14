<?php
header('Content-Type: application/json');
include_once '../config/configPDO.inc.php';

if (isset($_POST['id_objet'])) {$id_objet = $_POST['id_objet'];} else {exit;}

switch ($_POST['step']) {
	case "General" :
		$nom_objet            = htmlspecialchars($_POST['nom_objet']);
		$id_ville	             = $_POST['id_ville'];
		$id_sous_categorie2      = $_POST['id_sous_categorie2'];
		$url                     = htmlspecialchars($_POST['url']);
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
	case "Prestations" :
		$NomPrestation[7] = $_POST['prestation1'];
		$Prestation[7][1] = $_POST['prestation11'];$Prix[7][1] = $_POST['prix11'];
		$Prestation[7][2] = $_POST['prestation12'];$Prix[7][2] = $_POST['prix12'];
		$Prestation[7][3] = $_POST['prestation13'];$Prix[7][3] = $_POST['prix13'];
		$Prestation[7][4] = $_POST['prestation14'];$Prix[7][4] = $_POST['prix14'];
		$Prestation[7][5] = $_POST['prestation15'];$Prix[7][5] = $_POST['prix15'];
		$NomPrestation[8] = $_POST['prestation2'];
		$Prestation[8][1] = $_POST['prestation21'];$Prix[8][1] = $_POST['prix21'];
		$Prestation[8][2] = $_POST['prestation22'];$Prix[8][2] = $_POST['prix22'];
		$Prestation[8][3] = $_POST['prestation23'];$Prix[8][3] = $_POST['prix23'];
		$Prestation[8][4] = $_POST['prestation24'];$Prix[8][4] = $_POST['prix24'];
		$Prestation[8][5] = $_POST['prestation25'];$Prix[8][5] = $_POST['prix25'];
		$NomPrestation[9] = $_POST['prestation3'];
		$Prestation[9][1] = $_POST['prestation31'];$Prix[9][1] = $_POST['prix31'];
		$Prestation[9][2] = $_POST['prestation32'];$Prix[9][2] = $_POST['prix32'];
		$Prestation[9][3] = $_POST['prestation33'];$Prix[9][3] = $_POST['prix33'];
		$Prestation[9][4] = $_POST['prestation34'];$Prix[9][4] = $_POST['prix34'];
		$Prestation[9][5] = $_POST['prestation35'];$Prix[9][5] = $_POST['prix35'];
		break;
	case "MotsCles" :
		$MotCle[1][1] = $_POST['motcle11'];
		$MotCle[1][2] = $_POST['motcle12'];
		$MotCle[1][3] = $_POST['motcle13'];
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
			if ($id_objet == 0) {
				$sql = "INSERT INTO objets 
				( nom_objet, villes_id_ville, sscategorie_objet, url_objet, slide1_objet, box_objet ) VALUES (:nom_objet, :villes_id_ville, :id_sous_categorie2, :url, :slide1_objet, :box_objet)";
			} else {
				$sql = "UPDATE objets 
						SET nom_objet=:nom_objet,
							villes_id_ville=:villes_id_ville,
							sscategorie_objet=:id_sous_categorie2,
							url_objet=:url
							WHERE id_objet=:id_objet";
			}
			$req = $bdd->prepare($sql);
			if ($id_objet != 0) {$req->bindParam(':id_objet', $id_objet, PDO::PARAM_INT);}
			else {
				$box = "photo 1.jpg";
				$couv = "photo " . rand(1,113) . ".jpg";
				$req->bindParam(':slide1_objet', $couv, PDO::PARAM_STR);
				$req->bindParam(':box_objet', $box, PDO::PARAM_STR);
			}
			$req->bindParam(':nom_objet', $nom_objet, PDO::PARAM_STR);
			$req->bindParam(':villes_id_ville', $id_ville, PDO::PARAM_STR);
			$req->bindParam(':id_sous_categorie2', $id_sous_categorie2, PDO::PARAM_INT);
			$req->bindParam(':url', $url, PDO::PARAM_STR);
			$req->execute();
		break;
		case "Concept" ;
			$sql = "UPDATE objets SET descriptif_objet=:descriptif WHERE id_objet=:id_objet";
			$req = $bdd->prepare($sql);
			$req->bindParam(':id_objet', $id_objet, PDO::PARAM_INT);
			$req->bindParam(':descriptif', $descriptif, PDO::PARAM_STR);
			$req->execute();
			break;
		case "Video" :
			$sql = "UPDATE objets SET video_objet=:url_video WHERE id_objet=:id_objet";
			$req = $bdd->prepare($sql);
			$req->bindParam(':id_objet', $id_objet, PDO::PARAM_INT);
			$req->bindParam(':url_video', $url_video, PDO::PARAM_STR);
			$req->execute();
			break;
		case "Labels" :
			$sqlcheck = "SELECT * FROM objets_labelsuniiti WHERE objets_id_objet=:id_objet AND id_label=:id_label";
			$reqcheck = $bdd->prepare($sqlcheck);
			$reqcheck->bindParam(':id_objet', $id_objet, PDO::PARAM_INT);
			foreach ($label as $key => $id_label) {
				if ($id_label != '') {
					$reqcheck->bindParam(':id_label', $id_label, PDO::PARAM_INT);
					$reqcheck->execute();
					$resultcheck = $reqcheck->fetch(PDO::FETCH_ASSOC);
					if (!$resultcheck) {
						$sql = "INSERT INTO objets_labelsuniiti (objets_id_objet, id_label) VALUES (:id_objet, :id_label)";
						$req = $bdd->prepare($sql);
						$req->bindParam(':id_objet', $id_objet, PDO::PARAM_INT);
						$req->bindParam(':id_label', $id_label, PDO::PARAM_INT);
						$req->execute();
					}
					$nepaseffacer[$id_label] = 1;
				}
			}
			$sqlcheck = "SELECT * FROM objets_labelsuniiti WHERE objets_id_objet=:id_objet";
			$reqcheck = $bdd->prepare($sqlcheck);
			$reqcheck->bindParam(':id_objet', $id_objet, PDO::PARAM_INT);
			$reqcheck->execute();
			$resultcheck = $reqcheck->fetchAll(PDO::FETCH_ASSOC);		
			foreach ($resultcheck as $row) {
				if (!isset($nepaseffacer[$row['id_label']])) {
						$sql = "DELETE FROM objets_labelsuniiti WHERE objets_id_objet=:id_objet AND id_label=:id_label";
						$req = $bdd->prepare($sql);
						$req->bindParam(':id_objet', $id_objet, PDO::PARAM_INT);
						$req->bindParam(':id_label', $row['id_label'], PDO::PARAM_INT);
						$req->execute();				
				}
			}
			$reqcheck->closeCursor();
			break;
		case "Recommandations" :
			$sqlcheck = "SELECT * FROM objets_recommandations WHERE objets_id_objet=:id_objet AND id_recommandation=:id_recommandation";
			$reqcheck = $bdd->prepare($sqlcheck);
			$reqcheck->bindParam(':id_objet', $id_objet, PDO::PARAM_INT);
			foreach ($recommandation as $key => $id_recommandation) {
				if ($id_recommandation != '') {
					$reqcheck->bindParam(':id_recommandation', $id_recommandation, PDO::PARAM_INT);
					$reqcheck->execute();
					$resultcheck = $reqcheck->fetch(PDO::FETCH_ASSOC);
					if (!$resultcheck) {
						$sql = "INSERT INTO objets_recommandations (objets_id_objet, id_recommandation) VALUES (:id_objet, :id_recommandation)";
						$req = $bdd->prepare($sql);
						$req->bindParam(':id_objet', $id_objet, PDO::PARAM_INT);
						$req->bindParam(':id_recommandation', $id_recommandation, PDO::PARAM_INT);
						$req->execute();
					}
					$nepaseffacer[$id_recommandation] = 1;
				}
			}
			$sqlcheck = "SELECT * FROM objets_recommandations WHERE objets_id_objet=:id_objet";
			$reqcheck = $bdd->prepare($sqlcheck);
			$reqcheck->bindParam(':id_objet', $id_objet, PDO::PARAM_INT);
			$reqcheck->execute();
			$resultcheck = $reqcheck->fetchAll(PDO::FETCH_ASSOC);		
			foreach ($resultcheck as $row) {
				if (!isset($nepaseffacer[$row['id_recommandation']])) {
						$sql = "DELETE FROM objets_recommandations WHERE objets_id_objet=:id_objet AND id_recommandation=:id_recommandation";
						$req = $bdd->prepare($sql);
						$req->bindParam(':id_objet', $id_objet, PDO::PARAM_INT);
						$req->bindParam(':id_recommandation', $row['id_recommandation'], PDO::PARAM_INT);
						$req->execute();				
				}
			}
			$reqcheck->closeCursor();
			break;
		case "Prestations" :
			$sqldelete = "DELETE FROM objets_prestations_contenus WHERE objets_id_objet=:id_objet AND id_type_info=:id_type_info";
			$reqdelete = $bdd->prepare($sqldelete);
			$reqdelete->bindParam(':id_objet', $id_objet, PDO::PARAM_INT);
			foreach ($Prestation as $id_type_info => $value) {
				$ACreerOuModifier = false;
				if ($NomPrestation[$id_type_info] != '') {$ACreerOuModifier = true;}
				$sqlcheck = "SELECT * FROM objets_prestations WHERE objets_id_objet=:id_objet AND id_type_info=:id_type_info";
				$reqcheck = $bdd->prepare($sqlcheck);
				$reqcheck->bindParam(':id_objet', $id_objet, PDO::PARAM_INT);
				$reqcheck->bindParam(':id_type_info', $id_type_info, PDO::PARAM_INT);
				$reqcheck->execute();
				$resultcheck = $reqcheck->fetch(PDO::FETCH_ASSOC);
				if ((!$resultcheck) AND ($ACreerOuModifier)) {
						$sql = "INSERT INTO objets_prestations (objets_id_objet, id_type_info, prestation) VALUES (:id_objet, :id_type_info, :prestation)";
						$req = $bdd->prepare($sql);
						$req->bindParam(':id_objet', $id_objet, PDO::PARAM_INT);
						$req->bindParam(':id_type_info', $id_type_info, PDO::PARAM_INT);
						$req->bindParam(':prestation', $NomPrestation[$id_type_info], PDO::PARAM_INT);
						$req->execute();
				} else if (($resultcheck) AND ($ACreerOuModifier)) {
						$sql = "UPDATE objets_prestations SET prestation=:prestation WHERE objets_id_objet=:id_objet AND id_type_info=:id_type_info";
						$req = $bdd->prepare($sql);
						$req->bindParam(':id_objet', $id_objet, PDO::PARAM_INT);
						$req->bindParam(':id_type_info', $id_type_info, PDO::PARAM_INT);
						$req->bindParam(':prestation', $NomPrestation[$id_type_info], PDO::PARAM_INT);
						$req->execute();
				} else if (($resultcheck) AND (!$ACreerOuModifier)) {
						$sql = "DELETE FROM objets_prestations WHERE objets_id_objet=:id_objet AND id_type_info=:id_type_info";
						$req = $bdd->prepare($sql);
						$req->bindParam(':id_objet', $id_objet, PDO::PARAM_INT);
						$req->bindParam(':id_type_info', $id_type_info, PDO::PARAM_INT);
						$req->execute();
				}
				$reqdelete->bindParam(':id_type_info', $id_type_info, PDO::PARAM_INT);
				$reqdelete->execute();
				foreach ($Prestation[$id_type_info] as $id_contenu => $contenu) {
					if ($contenu != '') {
						$sql = "INSERT INTO objets_prestations_contenus (id_contenu, objets_id_objet, id_type_info, contenu, prix) VALUES (:id_contenu, :id_objet, :id_type_info, :contenu, :prix)";
						$req = $bdd->prepare($sql);
						$req->bindParam(':id_contenu', $id_contenu, PDO::PARAM_INT);
						$req->bindParam(':id_objet', $id_objet, PDO::PARAM_INT);
						$req->bindParam(':id_type_info', $id_type_info, PDO::PARAM_INT);
						$req->bindParam(':contenu', $contenu, PDO::PARAM_STR);
						$req->bindParam(':prix', $Prix[$id_type_info][$id_contenu], PDO::PARAM_STR);
						$req->execute();
						$id_contenu++;
					}					
				}
			}
			break;
		case "MotsCles" :
			foreach ($MotCle as $id_type_info => $value) {
				$ACreerOuModifier = false;
				if (($MotCle[$id_type_info][1] != '') || ($MotCle[$id_type_info][2] != '') || ($MotCle[$id_type_info][3] != '')) {$ACreerOuModifier = true;}
				$sqlcheck = "SELECT * FROM objets_infos_motscles WHERE objets_id_objet=:id_objet AND id_type_info=:id_type_info";
				$reqcheck = $bdd->prepare($sqlcheck);
				$reqcheck->bindParam(':id_objet', $id_objet, PDO::PARAM_INT);
				$reqcheck->bindParam(':id_type_info', $id_type_info, PDO::PARAM_INT);
				$reqcheck->execute();
				$resultcheck = $reqcheck->fetch(PDO::FETCH_ASSOC);
				if ((!$resultcheck) AND ($ACreerOuModifier)) {
						$sql = "INSERT INTO objets_infos_motscles (objets_id_objet, id_type_info, id_motcle1, id_motcle2, id_motcle3) VALUES (:id_objet, :id_type_info, :id_motcle1, :id_motcle2, :id_motcle3)";
						$req = $bdd->prepare($sql);
						$req->bindParam(':id_objet', $id_objet, PDO::PARAM_INT);
						$req->bindParam(':id_type_info', $id_type_info, PDO::PARAM_INT);
						$req->bindParam(':id_motcle1', $MotCle[$id_type_info][1], PDO::PARAM_INT);
						$req->bindParam(':id_motcle2', $MotCle[$id_type_info][2], PDO::PARAM_INT);
						$req->bindParam(':id_motcle3', $MotCle[$id_type_info][3], PDO::PARAM_INT);
						$req->execute();					
				} else if (($resultcheck) AND ($ACreerOuModifier)) {
						$sql = "UPDATE objets_infos_motscles SET id_motcle1=:id_motcle1, id_motcle2=:id_motcle2, id_motcle3=:id_motcle3 WHERE objets_id_objet=:id_objet AND id_type_info=:id_type_info";
						$req = $bdd->prepare($sql);
						$req->bindParam(':id_objet', $id_objet, PDO::PARAM_INT);
						$req->bindParam(':id_type_info', $id_type_info, PDO::PARAM_INT);
						$req->bindParam(':id_motcle1', $MotCle[$id_type_info][1], PDO::PARAM_INT);
						$req->bindParam(':id_motcle2', $MotCle[$id_type_info][2], PDO::PARAM_INT);
						$req->bindParam(':id_motcle3', $MotCle[$id_type_info][3], PDO::PARAM_INT);
						$req->execute();				
				} else if (($resultcheck) AND (!$ACreerOuModifier)) {
						$sql = "DELETE FROM objets_infos_motscles WHERE objets_id_objet=:id_objet AND id_type_info=:id_type_info";
						$req = $bdd->prepare($sql);
						$req->bindParam(':id_objet', $id_objet, PDO::PARAM_INT);
						$req->bindParam(':id_type_info', $id_type_info, PDO::PARAM_INT);
						$req->execute();				
				}
			}
			break;
	}

	if ($id_objet == 0) {$id_objet = $bdd->lastInsertId();}
	$bdd->commit(); // Validation de la transaction / des requetes
	if (isset($req)) {$req->closeCursor();}

	$data['result'] = $id_objet;

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