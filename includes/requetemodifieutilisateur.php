<?php
header('Content-Type: application/json');
include_once '../config/configPDO.inc.php';

if (!empty($_POST['id_contributeur'])) {$id_contributeur = $_POST['id_contributeur'];} else {exit;}

$nom_contributeur = htmlspecialchars($_POST["nom"]);
$prenom = htmlspecialchars($_POST["prenom"]);
$sexe = $_POST["sexe"];
$pseudo = htmlspecialchars($_POST["pseudo"]);
$date_naissance_jour = $_POST["date_naissance_jour"];
$date_naissance_mois = $_POST["date_naissance_mois"];
$date_naissance_annee = $_POST["date_naissance_annee"];
$codepostal = htmlspecialchars($_POST["codepostal"]);
$ville = htmlspecialchars($_POST["ville"]);
$profession_contributeur = htmlspecialchars($_POST["profession_contributeur"]);
$email_login = htmlspecialchars($_POST["email_login"]);
$mdp = sha1($_POST['mdp']);
$telephone_contributeur = htmlspecialchars($_POST["telephone_contributeur"]);

try
{
	// Requete
	$bdd->beginTransaction(); // Début transaction pour requetes multiples
	$sql = "UPDATE contributeurs 
			SET nom_contributeur=:nom_contributeur,
				prenom_contributeur=:prenom_contributeur,
				sexe_contributeur=:sexe_contributeur,
				pseudo_contributeur=:pseudo_contributeur,
				date_naissance_jour_contributeur=:date_naissance_jour,
				date_naissance_mois_contributeur=:date_naissance_mois,
				date_naissance_annee_contributeur=:date_naissance_annee,
				cp_contributeur=:code_postal,
				villes_contributeur=:ville,
				profession_contributeur=:profession_contributeur,
				email_contributeur=:email_login,
				password_contributeur=:mdp,
				telephone_contributeur=:telephone_contributeur,
				WHERE id_contributeur=:id_contributeur";
	$req = $bdd->prepare($sql);
	$req->bindParam(':id_contributeur', $_POST['id_contributeur'], PDO::PARAM_INT);
	$req->bindParam(':nom_contributeur', $nom_contributeur, PDO::PARAM_STR);
	$req->bindParam(':prenom_contributeur', $prenom_contributeur, PDO::PARAM_STR);
	$req->bindParam(':sexe_contributeur', $prenom_contributeur, PDO::PARAM_INT);
	$req->bindParam(':pseudo_contributeur', $pseudo, PDO::PARAM_STR);
	$req->bindParam(':date_naissance_jour', $date_naissance_jour, PDO::PARAM_INT);
	$req->bindParam(':date_naissance_mois', $date_naissance_mois, PDO::PARAM_INT);
	$req->bindParam(':date_naissance_annee', $date_naissance_annee, PDO::PARAM_INT);
	$req->bindParam(':code_postal', $codepostal, PDO::PARAM_STR);
	$req->bindParam(':ville', $ville, PDO::PARAM_STR);
	$req->bindParam(':profession_contributeur', $profession_contributeur, PDO::PARAM_STR);
	$req->bindParam(':email_login', $email_login, PDO::PARAM_STR);
	$req->bindParam(':mdp', $mdp, PDO::PARAM_STR);
	$req->bindParam(':telephone_contributeur', $telephone_contributeur, PDO::PARAM_STR);

	$req->execute();

	$bdd->commit(); // Validation de la transaction / des requetes
	$req->closeCursor();

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