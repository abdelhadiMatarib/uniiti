<?php
header('Content-Type: application/json');
include_once '../config/configPDO.inc.php';

if (isset($_POST['type'])) {$type = $_POST['type'];} else {exit;}
if (isset($_POST['table'])) {$table = $_POST['table'];} else {exit;}
if (isset($_POST['valeurs'])) {$valeurs = htmlspecialchars($_POST['valeurs']);} else {exit;}
if (isset($_POST['modif'])) {$modif = htmlspecialchars($_POST['modif']);}

switch ($table) {
	case "recommandations" :
		$parametre1 = "recommandation";
		$id = "id_recommandation";
		$sqlcheck2 = "SELECT * FROM enseignes_recommandations AS t1";
		$sqlcheck2 .= " INNER JOIN recommandations AS t2";
		$sqlcheck2 .= " ON t1.id_recommandation = t2.id_recommandation";
		$sqlcheck2 .= " INNER JOIN enseignes AS t3";
		$sqlcheck2 .= " ON t1.enseignes_id_enseigne = t3.id_enseigne";
		$sqlcheck2 .= " WHERE t2.recommandation =:valeurs";
		break;
	case "labelsuniiti" :
		$parametre1 = "label";
		$id = "id_label";
		$sqlcheck2 = "SELECT * FROM enseignes_labelsuniiti AS t1";
		$sqlcheck2 .= " INNER JOIN labelsuniiti AS t2";
		$sqlcheck2 .= " ON t1.id_label = t2.id_label";
		$sqlcheck2 .= " INNER JOIN enseignes AS t3";
		$sqlcheck2 .= " ON t1.enseignes_id_enseigne = t3.id_enseigne";
		$sqlcheck2 .= " WHERE t2.label =:valeurs";
		break;
	case "motscles" :
		$parametre1 = "motcle";
		$id = "id_motcle";
		$sqlcheck2 = "SELECT * FROM enseignes_infos_generales AS t1";
		$sqlcheck2 .= " INNER JOIN motscles AS t2";
		$sqlcheck2 .= " ON (t1.id_motcle1 = t2.id_motcle OR t1.id_motcle2 = t2.id_motcle OR t1.id_motcle3 = t2.id_motcle)";
		$sqlcheck2 .= " INNER JOIN enseignes AS t3";
		$sqlcheck2 .= " ON t1.enseignes_id_enseigne = t3.id_enseigne";
		$sqlcheck2 .= " WHERE t2.motcle =:valeurs";
		break;
	case "moyenspaiements" :
		$parametre1 = "moyenpaiement";
		$id = "id_moyenpaiement";
		$sqlcheck2 = "SELECT * FROM enseignes_moyenspaiements AS t1";
		$sqlcheck2 .= " INNER JOIN moyenspaiements AS t2";
		$sqlcheck2 .= " ON t1.id_moyenpaiement = t2.id_moyenpaiement";
		$sqlcheck2 .= " INNER JOIN enseignes AS t3";
		$sqlcheck2 .= " ON t1.enseignes_id_enseigne = t3.id_enseigne";
		$sqlcheck2 .= " WHERE t2.moyenpaiement =:valeurs";
		break;
	case "villes" :
		$parametre1 = "nom_ville";
		$id = "id_ville";
		$sqlcheck2 = "SELECT * FROM enseignes AS t1";
		$sqlcheck2 .= " INNER JOIN villes AS t2";
		$sqlcheck2 .= " ON t1.villes_id_ville = t2.id_ville";
		$sqlcheck2 .= " WHERE t2.nom_ville =:valeurs";
		break;
	default:
		exit;
		break;
}

try
{
	// Requete
	$bdd->beginTransaction(); // Début transaction pour requetes multiples

	$sqlcheck = "SELECT * FROM " . $table . " WHERE " . $parametre1 . " =:valeurs";
	$reqcheck = $bdd->prepare($sqlcheck);
	$reqcheck->bindParam(':valeurs', $valeurs, PDO::PARAM_STR);
	$reqcheck->execute();
	$resultcheck = $reqcheck->fetch(PDO::FETCH_ASSOC);				
	if ((!$resultcheck) && ($type == "enregistrer")) {
	
		$sql = "INSERT INTO " . $table . " (" . $parametre1 . ") VALUES (:valeurs)";
		$req = $bdd->prepare($sql);
		$req->bindParam(':valeurs', $valeurs, PDO::PARAM_STR);
		$req->execute();

		$nouvel_id = $bdd->lastInsertId();
		$bdd->commit(); // Validation de la transaction / des requetes
		$req->closeCursor();

		$data['result'] = $nouvel_id;
	} else if (($resultcheck) && ($type == "supprimer")) {
	
		$reqcheck2 = $bdd->prepare($sqlcheck2);
		$reqcheck2->bindParam(':valeurs', $valeurs, PDO::PARAM_STR);
		$reqcheck2->execute();
		$resultcheck2 = $reqcheck2->fetchAll(PDO::FETCH_ASSOC);		
	
		if (!$resultcheck2) {
			$sql = "DELETE FROM " . $table . " WHERE " . $parametre1 . "= :valeurs";
			$req = $bdd->prepare($sql);
			$req->bindParam(':valeurs', $valeurs, PDO::PARAM_STR);
			$req->execute();

			$bdd->commit(); // Validation de la transaction / des requetes
			$req->closeCursor();

			$data['result'] = 1;
		} else {
			$data['result'] = 0;
			foreach ($resultcheck2 as $row) {
				$data['id'][$row['id_enseigne']] = $row['nom_enseigne'];
			}
		}
	} else 	if (($resultcheck) && ($type == "modifier")) {
	
		$sql = "UPDATE " . $table . " SET " . $parametre1 . "=:modif" . " WHERE " . $parametre1 . "=:valeurs";
		$req = $bdd->prepare($sql);
		$req->bindParam(':modif', $modif, PDO::PARAM_STR);
		$req->bindParam(':valeurs', $valeurs, PDO::PARAM_STR);
		$req->execute();

		$bdd->commit(); // Validation de la transaction / des requetes
		$req->closeCursor();

		$data['result'] = 1;
	} else if (($resultcheck) && ($type == "enregistrer")) {
		$data['result'] = -1;
		$data['id'] = $resultcheck[$id];
	} else if ((!$resultcheck) && (($type == "supprimer") || ($type == "modifier"))) {
		$data['result'] = -1;
	}

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