<?php
header('Content-Type: application/json');
include_once '../config/configuration.inc.php';
include_once '../config/configPDO.inc.php';
include_once 'fonctions.inc.php';
ini_set('memory_limit', '-1');
	
function CreerImageBox ($image, $ImageRecalibree, $x, $WidthCouv, $HeightCouv) {

	$couv = $ImageRecalibree;
	list($imagewidth, $imageheight, $imageType) = getimagesize($image);
	$scale = $imageheight / $HeightCouv;
	$newImage = imagecreatetruecolor($WidthCouv, $HeightCouv);
	$imageType = image_type_to_mime_type($imageType);
	switch($imageType) {
		case "image/gif":
			$source=imagecreatefromgif($image); 
			break;
		case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
			$source=imagecreatefromjpeg($image); 
			break;
		case "image/png":
		case "image/x-png":
			$source=imagecreatefrompng($image); 
			break;
	}
	imagecopyresampled($newImage, $source, 0, 0, $x * $scale, 0, $WidthCouv, $HeightCouv, $WidthCouv * $scale, $imageheight);
	imagepng($newImage, $couv);
	imagedestroy($newImage);
}


if (!empty($_POST['type'])) {$type = $_POST['type'];} else {exit;}
if (isset($_POST['x1'])) {$x1 = $_POST['x1'];} else {exit;}

switch ($type) {
	case 'enseigne':
		$id = $_POST['id_enseigne'];
		$sql = "UPDATE enseignes SET box_enseigne = :box ";
		$chemin = ROOT_ENSEIGNES_BOX;
	break;
	case 'objet':
		$id = $_POST['id_objet'];
		$sql = "UPDATE objets SET box_objet = :box ";
		$chemin = ROOT_OBJETS_BOX;
	break;
	default:
		exit;
	break;
}

$box = $id . "box.jpg";
CreerImageBox ($_POST['box'], $chemin . $box, $x1, 236, 350);

try
{
	// Requete
	$bdd->beginTransaction(); // Début transaction pour requetes multiples

	$sql .= "WHERE id_" . $type . " = :id";
	$req = $bdd->prepare($sql);
	$req->bindParam(':id', $id, PDO::PARAM_STR);
	$req->bindParam(':box', $box, PDO::PARAM_STR);
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