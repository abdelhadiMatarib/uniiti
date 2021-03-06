<?php
header('Content-Type: application/json');
include_once '../config/configPDO.inc.php';

if (isset($_POST['id_contributeur'])) {$id_contributeur = $_POST['id_contributeur'];} else {exit;}
if (isset($_POST['id_objet'])) {$id_objet = $_POST['id_objet'];} else {exit;}
if (isset($_POST['avis'])) {$avis = htmlspecialchars($_POST['avis']);} else {exit;}
if (isset($_POST['note'])) {$note = $_POST['note']*2;} else {exit;}

$date = date('Y-m-d H:i:s');
$origine = 1;
$appreciation = 1;

try
{
	// Requete
	$bdd->beginTransaction(); // Début transaction pour requetes multiples
	
	$sqlcheck = "SELECT * FROM contributeurs_donnent_avis_objet AS t1
					INNER JOIN objets_recoient_avis AS t2   
					ON t1.avis_id_avis = t2.avis_id_avis
					WHERE t1.contributeurs_id_contributeur = :id_contributeur
						AND t2.objets_id_objet = :id_objet";
	$reqcheck = $bdd->prepare($sqlcheck);
	$reqcheck->bindParam(':id_contributeur', $id_contributeur, PDO::PARAM_INT);
	$reqcheck->bindParam(':id_objet', $id_objet, PDO::PARAM_INT);
	$reqcheck->execute();
	$resultcheck = $reqcheck->fetch(PDO::FETCH_ASSOC);
	
	if (!$resultcheck) {
	$sql = "INSERT INTO avis_objet 
			(appreciation, note, commentaire, origine, date_avis)
			VALUES (:appreciation, :note, :commentaire, :origine, :date_avis)";
	$req = $bdd->prepare($sql);
	$req->bindParam(':appreciation', $appreciation, PDO::PARAM_INT);
	$req->bindParam(':note', $note, PDO::PARAM_STR);
	$req->bindParam(':commentaire', $avis, PDO::PARAM_STR);
	$req->bindParam(':origine', $origine, PDO::PARAM_STR);
	$req->bindParam(':date_avis', $date, PDO::PARAM_STR);

	$req->execute();
	$id_avis = $bdd->lastInsertId();
	
	$sql2 = "INSERT INTO objets_recoient_avis (objets_id_objet, avis_id_avis) VALUES (:id_objet, :id_avis)";
	$req2 = $bdd->prepare($sql2);
	$req2->bindParam(':id_objet', $id_objet, PDO::PARAM_INT);
	$req2->bindParam(':id_avis', $id_avis, PDO::PARAM_INT);
	$req2->execute();
	
	$sql3 = "INSERT INTO contributeurs_donnent_avis_objet (contributeurs_id_contributeur, avis_id_avis) VALUES (:id_contributeur, :id_avis)";
	$req3 = $bdd->prepare($sql3);
	$req3->bindParam(':id_contributeur', $id_contributeur, PDO::PARAM_INT);
	$req3->bindParam(':id_avis', $id_avis, PDO::PARAM_INT);
	$req3->execute();
	
	$bdd->commit(); // Validation de la transaction / des requetes
	$req->closeCursor();
	$req2->closeCursor();
	$req3->closeCursor();
	
	$data['result'] = $id_avis;
	}
	else {
		$bdd->commit(); // Validation de la transaction / des requetes
		$data['result'] = -1;
	}
	
	$reqcheck->closeCursor();
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