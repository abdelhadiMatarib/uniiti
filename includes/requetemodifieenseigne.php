<?php
header('Content-Type: application/json');
include_once '../config/configPDO.inc.php';

$date = date('Y-m-d H:i:s');

if (!empty($_POST['id_enseigne'])) {;$id_enseigne            = $_POST['id_enseigne'];} else {exit;}
$nom_enseigne            = $_POST['nom_enseigne'];
$adresse1_enseigne       = $_POST['adresse1_enseigne'];
$ville_enseigne          = $_POST['ville_enseigne'];
$code_postal             = $_POST['cp_enseigne'];
$sous_categorie2         = $_POST['sous_categorie2'];
$telephone_enseigne      = $_POST['telephone_enseigne'];
$url                     = $_POST['url'];
$id_quartier             = $_POST['id_quartier'];
$id_budget               = $_POST['id_budget'];


$descriptif              = $_POST['descriptif'];





try
{
	// Requete
	$bdd->beginTransaction(); // Début transaction pour requetes multiples

	$sql = "UPDATE enseignes_avis_utiles 
			SET nom_enseigne=:nom_enseigne,
				adresse1_enseigne=:adresse1_enseigne,
				ville_enseigne=:ville_enseigne,
				cp_enseigne=:code_postal,
				sscategorie_enseigne=:sous_categorie2,
				telephone_enseigne=:telephone_enseigne,
				url=:url,
				id_budget=:id_budget
				WHERE id_enseigne=:id_enseigne";
	$req = $bdd->prepare($sql);
	$req->bindParam(':id_enseigne', $_POST['id_enseigne'], PDO::PARAM_INT);
	$req->bindParam(':nom_enseigne', $nom_enseigne, PDO::PARAM_STR);
	$req->bindParam(':adresse1_enseigne', $adresse1_enseigne, PDO::PARAM_STR);
	$req->bindParam(':ville_enseigne', $ville_enseigne, PDO::PARAM_STR);
	$req->bindParam(':code_postal', $code_postal, PDO::PARAM_STR);
	$req->bindParam(':sous_categorie2', $sous_categorie2, PDO::PARAM_INT);
	$req->bindParam(':telephone_enseigne', $telephone_enseigne, PDO::PARAM_STR);
	$req->bindParam(':url', $url, PDO::PARAM_STR);
	$req->bindParam(':id_quartier', $id_quartier, PDO::PARAM_INT);
	$req->bindParam(':id_budget', $id_budget, PDO::PARAM_INT);

	$req->execute();

	$bdd->commit(); // Validation de la transaction / des requetes
	$reqCheck->closeCursor();

	$data['result'] = 'ok';

	$bdd = null;            // Détruit l'objet PDO
	
	echo json_encode($data);

}
// Gestion des erreurs
catch (PDOException $erreur)
{
	$bdd->rollBack(); // Erreur => annulation transaction / des requetes    
	die ('Erreur : ' .$erreur->getMessage());
	exit;
}

?>