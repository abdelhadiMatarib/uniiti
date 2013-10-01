<?php
header('Content-Type: application/json');
include_once '../config/configPDO.inc.php';

if (isset($_POST['id_contributeur'])) {$id_contributeur = $_POST['id_contributeur'];} else {exit;}

$changemdp = $_POST["changemdp"];
$mdp = sha1($_POST['mdp']);
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
$telephone_contributeur = htmlspecialchars($_POST["telephone_contributeur"]);

try
{
	// Requete
	$bdd->beginTransaction(); // Début transaction pour requetes multiples
	if ($id_contributeur == 0) {
		$sql = "INSERT INTO contributeurs 
				( nom_contributeur,	prenom_contributeur, sexe_contributeur,	pseudo_contributeur, date_naissance_jour_contributeur,
					date_naissance_mois_contributeur, date_naissance_annee_contributeur, cp_contributeur, ville_contributeur, profession_contributeur,
					email_contributeur, telephone_contributeur, groupes_permissions_id_permission, photo_contributeur, slide1_contributeur";
		if ($changemdp) {$sql .= ",password_contributeur)";}
		else {$sql .= ")";}
		$sql .= " VALUES (:nom_contributeur, :prenom_contributeur, :sexe_contributeur, :pseudo_contributeur, :date_naissance_jour,
					:date_naissance_mois, :date_naissance_annee, :code_postal, :ville, :profession_contributeur, :email_login, :telephone_contributeur, :permission, :photo, :couv";
		if ($changemdp) {$sql .= ",:mdp)";}
		else {$sql .= ")";}
	} else {
		$sql = "UPDATE contributeurs 
				SET nom_contributeur=:nom_contributeur,
					prenom_contributeur=:prenom_contributeur,
					sexe_contributeur=:sexe_contributeur,
					pseudo_contributeur=:pseudo_contributeur,
					date_naissance_jour_contributeur=:date_naissance_jour,
					date_naissance_mois_contributeur=:date_naissance_mois,
					date_naissance_annee_contributeur=:date_naissance_annee,
					cp_contributeur=:code_postal,
					ville_contributeur=:ville,
					profession_contributeur=:profession_contributeur,
					email_contributeur=:email_login,";
		if ($changemdp) {$sql .= "password_contributeur=:mdp,";}
		$sql .= "telephone_contributeur=:telephone_contributeur WHERE id_contributeur=:id_contributeur";
	}
	$req = $bdd->prepare($sql);
	if ($id_contributeur != 0) {$req->bindParam(':id_contributeur', $_POST['id_contributeur'], PDO::PARAM_INT);}
	else {
		$permission = 1;
		$photo = "photo " . rand(1, 100) . ".jpg";
		$couv = "photo " . rand(1, 113) . ".jpg";
		$req->bindParam(':permission', $permission, PDO::PARAM_INT);
		$req->bindParam(':photo', $photo, PDO::PARAM_STR);
		$req->bindParam(':couv', $couv, PDO::PARAM_STR);
	}
	$req->bindParam(':nom_contributeur', $nom_contributeur, PDO::PARAM_STR);
	$req->bindParam(':prenom_contributeur', $prenom, PDO::PARAM_STR);
	$req->bindParam(':sexe_contributeur', $sexe, PDO::PARAM_INT);
	$req->bindParam(':pseudo_contributeur', $pseudo, PDO::PARAM_STR);
	$req->bindParam(':date_naissance_jour', $date_naissance_jour, PDO::PARAM_INT);
	$req->bindParam(':date_naissance_mois', $date_naissance_mois, PDO::PARAM_INT);
	$req->bindParam(':date_naissance_annee', $date_naissance_annee, PDO::PARAM_INT);
	$req->bindParam(':code_postal', $codepostal, PDO::PARAM_STR);
	$req->bindParam(':ville', $ville, PDO::PARAM_STR);
	$req->bindParam(':profession_contributeur', $profession_contributeur, PDO::PARAM_STR);
	$req->bindParam(':email_login', $email_login, PDO::PARAM_STR);
	if ($changemdp) {$req->bindParam(':mdp', $mdp, PDO::PARAM_STR);}
	$req->bindParam(':telephone_contributeur', $telephone_contributeur, PDO::PARAM_STR);

	$req->execute();
	if ($id_contributeur == 0) {$id_contributeur = $bdd->lastInsertId();}
	$bdd->commit(); // Validation de la transaction / des requetes
	$req->closeCursor();

	$data['result'] = $id_contributeur;

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