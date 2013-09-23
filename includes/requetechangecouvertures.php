<?php
header('Content-Type: application/json');
include_once '../config/configuration.inc.php';
include_once '../config/configPDO.inc.php';
include_once 'fonctions.inc.php';


if (!empty($_POST['type'])) {$type = $_POST['type'];} else {exit;}
if (isset($_POST['x1'])) {$Changex1 = true;} else {$Changex1 = false;}

switch ($type) {
	case 'contributeur':
		$id = $_POST['id_contributeur'];
		$sql = "UPDATE contributeurs SET ";
		$chemin = ROOT_UTILISATEURS_COUV;
	break;
	case 'enseigne':
		$id = $_POST['id_enseigne'];
		$sql = "UPDATE enseignes SET ";
		$chemin = ROOT_ENSEIGNES_COUV;
	break;
	case 'objet':
		$id = $_POST['id_objet'];
		$sql = "UPDATE objets SET ";
		$chemin = ROOT_OBJETS_COUV;
	break;
	default:
		exit;
	break;
}

if (!$Changex1) {
	if ((!isset($_POST['image1'])) || (!isset($_POST['image2'])) || (!isset($_POST['image3'])) || (!isset($_POST['image4'])) || (!isset($_POST['image5']))) {exit;}
	if ((!isset($_POST['y1'])) || (!isset($_POST['y2'])) || (!isset($_POST['y3'])) || (!isset($_POST['y4'])) || (!isset($_POST['y5']))) {exit;}
	$chemintmp = $_POST['chemin'];
	for ($i = 1 ; $i <= 5 ; $i++) {
		if (empty($_POST['image' . $i]) || (substr_count($_POST['image' . $i], "couv") == 0)) {EffaceFichier($chemin . $id . "couv" . $i . ".jpg");}
		else {
			DeplaceFichier($chemintmp . $id . "couv" . $i . ".jpg", $chemin . $id . "couv" . $i . ".jpg");
		}
	}
}
else if ($type == 'contributeur') {exit;}

try
{
	// Requete
	$bdd->beginTransaction(); // Début transaction pour requetes multiples
	if ($Changex1) {
		$sql .= "x1 = :x1 ";	
		$sql .= "WHERE id_" . $type . " = :id";
		$req = $bdd->prepare($sql);
		$req->bindParam(':id', $id, PDO::PARAM_STR);
		$req->bindParam(':x1', $_POST['x1'], PDO::PARAM_STR);		
	}
	else {
		$sql .= "slide1_" . $type . " = :slide1,";
		$sql .= "slide2_" . $type . " = :slide2,";
		$sql .= "slide3_" . $type . " = :slide3,";
		$sql .= "slide4_" . $type . " = :slide4,";
		$sql .= "slide5_" . $type . " = :slide5,";
		$sql .= "y1 = :y1, y2 = :y2, y3 = :y3, y4 = :y4, y5 = :y5 ";
		$sql .= "WHERE id_" . $type . " = :id";
		$req = $bdd->prepare($sql);
		$req->bindParam(':id', $id, PDO::PARAM_STR);
		$req->bindParam(':slide1', $_POST['image1'], PDO::PARAM_STR);
		$req->bindParam(':slide2', $_POST['image2'], PDO::PARAM_STR);
		$req->bindParam(':slide3', $_POST['image3'], PDO::PARAM_STR);
		$req->bindParam(':slide4', $_POST['image4'], PDO::PARAM_STR);	
		$req->bindParam(':slide5', $_POST['image5'], PDO::PARAM_STR);
		$req->bindParam(':y1', $_POST['y1'], PDO::PARAM_INT);
		$req->bindParam(':y2', $_POST['y2'], PDO::PARAM_INT);
		$req->bindParam(':y3', $_POST['y3'], PDO::PARAM_INT);
		$req->bindParam(':y4', $_POST['y4'], PDO::PARAM_INT);	
		$req->bindParam(':y5', $_POST['y5'], PDO::PARAM_INT);		
	}

	$req->execute();
	$req->closeCursor();	

	$bdd->commit(); // Validation de la transaction / des requetes
	
	$data['result'] = 'ok';
	
	$req->closeCursor();    // Ferme la connexion du serveur
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