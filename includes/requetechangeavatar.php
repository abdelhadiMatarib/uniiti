<?php
header('Content-Type: application/json');
include_once 'fonctions.inc.php';
include_once '../config/configPDO.inc.php';
include_once '../config/configuration.inc.php';
ini_set('memory_limit', '-1');

$id_contributeur = $_POST['id_contributeur'];

function CompresserImage ($image, $ImageRecalibree, $Width, $Height) {
	$couv = $ImageRecalibree;
	list($imagewidth, $imageheight, $imageType) = getimagesize($image);
	$newImage = imagecreatetruecolor($Width, $Height);
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
	imagecopyresampled($newImage, $source, 0, 0, 0, 0, $Width, $Height, $imagewidth, $imageheight);
	imagejpeg($newImage, $couv, 70);
	imagedestroy($newImage);	
}

if (($_POST['compression']) || (!$_POST['compression']) && ($_POST['photo'] != $id_contributeur . "avatar.jpg")) {
	EffaceFichier(ROOT_UTILISATEURS_AVATARS . $id_contributeur . "avatar.jpg");
}

if ($_POST['compression']) {
	CompresserImage($_POST['photo'], ROOT_UTILISATEURS_AVATARS . $id_contributeur . "avatar.jpg", 120, 120);
	$photo= $id_contributeur . "avatar.jpg";
}
else {$photo = $_POST['photo'];}

try
{
	// Requete
	$bdd->beginTransaction(); // Début transaction pour requetes multiples

	$sql = "UPDATE contributeurs SET photo_contributeur = :photo WHERE id_contributeur = :id_contributeur";
	$req = $bdd->prepare($sql);
	$req->bindParam(':photo', $photo, PDO::PARAM_STR);
	$req->bindParam(':id_contributeur', $id_contributeur, PDO::PARAM_STR);
	$req->execute();
	$req->closeCursor();	

	$data['result'] = 'ok';

	$bdd->commit(); // Validation de la transaction / des requetes
	
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