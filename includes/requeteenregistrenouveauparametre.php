<?php
header('Content-Type: application/json');
include_once '../config/configPDO.inc.php';

if (isset($_POST['type'])) {$type = $_POST['type'];} else {exit;}
if (isset($_POST['table'])) {$table = $_POST['table'];} else {exit;}
if (isset($_POST['valeurs'])) {$valeurs = htmlspecialchars($_POST['valeurs']);} else {exit;}

switch ($table) {
	case "recommandations" :
		$parametre1 = "recommandation";
		break;
	case "labelsuniiti" :
		$parametre1 = "label";
		break;
	case "motscles" :
		$parametre1 = "motcle";
		break;
	case "moyenspaiements" :
		$parametre1 = "moyenpaiement";
		break;
	case "villes" :
		$parametre1 = "nom_ville";
		break;
	default:
		exit;
		break;
}

try
{
	// Requete
	$bdd->beginTransaction(); // Début transaction pour requetes multiples

	$sql = "INSERT INTO " . $table . " (" . $parametre1 . ") VALUES (:valeurs)";
	$req = $bdd->prepare($sql);
	$req->bindParam(':valeurs', $valeurs, PDO::PARAM_STR);
	$req->execute();

	$nouvel_id = $bdd->lastInsertId();
	$bdd->commit(); // Validation de la transaction / des requetes
	$req->closeCursor();

	$data['result'] = $nouvel_id;

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