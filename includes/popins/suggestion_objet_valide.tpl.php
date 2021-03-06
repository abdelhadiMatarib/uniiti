<?php
include_once '../../acces/auth.inc.php';                 // gestion accès à la page - incluant la session
include_once '../../config/configuration.inc.php';
include_once '../../config/configPDO.inc.php';

$id_contributeur = $_POST['id_contributeur'];
$type_suggestion = $_POST['type_suggestion'];
$nom_suggestion = $_POST['nom_suggestion'];
$id_categorie = $_POST['id_categorie'];
$id_sous_categorie = $_POST['id_sous_categorie'];
$description = $_POST['description'];
$id_statut = $_POST['id_statut'];
$date_suggestion = date('Y-m-d H:i:s');

try
{
	// Requete
	$bdd->beginTransaction(); // Début transaction pour requetes multiples

	$sql = "INSERT INTO suggestions (id_contributeur, date_suggestion, type_suggestion, nom_suggestion, id_categorie, id_sous_categorie, description, id_statut)
							VALUES (:id_contributeur, :date_suggestion, :type_suggestion, :nom_suggestion, :id_categorie, :id_sous_categorie, :description, :id_statut)";
	$req = $bdd->prepare($sql);
	$req->bindParam(':id_contributeur', $id_contributeur, PDO::PARAM_INT);
	$req->bindParam(':date_suggestion', $date_suggestion, PDO::PARAM_STR);
	$req->bindParam(':type_suggestion', $type_suggestion, PDO::PARAM_STR);
	$req->bindParam(':nom_suggestion', $nom_suggestion, PDO::PARAM_STR);
	$req->bindParam(':id_categorie', $id_categorie, PDO::PARAM_INT);
	$req->bindParam(':id_sous_categorie', $id_sous_categorie, PDO::PARAM_INT);
	$req->bindParam(':description', $description, PDO::PARAM_STR);
	$req->bindParam(':id_statut', $id_statut, PDO::PARAM_INT);
	$req->execute();

	$lastSuggestionID = $bdd->lastInsertId();
    $bdd->commit(); // Validation de la transaction / des requetes
	$req->closeCursor();   // Ferme la connexion du serveur
	$bdd = null;            // Détruit l'objet PDO

?>

<div class="suggestioncommerce_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="suggestioncommerce_head">
        <div class="suggestioncommerce_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/sugg_objet_icon.png" title="" alt="" height="44" width="37" />
        </div><span class="maintitle">Objet suggéré</span>
    </div>   
    <div class="suggestioncommerce_body">
            
        <div class="suggestion_valide_txt"><span>Nous avons bien enregistré votre suggestion et nous engageons à la prendre en compte dans les plus bref délais.</span></div>
            
    </div>
    <div class="suggestioncommerce_footer">
        
        <div onclick="$('.popin_close_button').click();" class="modifprofil_valider_wrap">Merci !</div>
        
    </div>
</div>
<?php
}
// Gestion des erreurs
catch (PDOException $erreur)
{
	$bdd->rollBack(); // Erreur => annulation transaction / des requetes    
	die ('Erreur : ' .$erreur->getMessage());
}
?>