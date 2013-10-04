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
		$id_budget               = 1;
		// $id_budget               = $_POST['id_budget'];
		break;
	case "Concept" :
		if (isset($_POST['descriptif'])) {$descriptif          = htmlspecialchars($_POST['descriptif']);}
		break;
	case "Video" :
		$url_video = $_POST['url_video'];
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
		break;
		case "Concept" ;
			$sql = "UPDATE enseignes SET descriptif=:descriptif WHERE id_enseigne=:id_enseigne";
			$req = $bdd->prepare($sql);
			$req->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
			$req->bindParam(':descriptif', $descriptif, PDO::PARAM_STR);
			break;
		case "Video" :
			$sql = "UPDATE enseignes SET video_enseigne=:url_video WHERE id_enseigne=:id_enseigne";
			$req = $bdd->prepare($sql);
			$req->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
			$req->bindParam(':url_video', $url_video, PDO::PARAM_STR);
			break;
	}

	$req->execute();
	if ($id_enseigne == 0) {$id_enseigne = $bdd->lastInsertId();}
	$bdd->commit(); // Validation de la transaction / des requetes
	$req->closeCursor();

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