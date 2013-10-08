<?php
        include_once '../../config/configuration.inc.php';
		include_once '../../config/configPDO.inc.php';
		include_once '../fonctions.inc.php';

		if (isset($_POST['id_enseigne'])) {$id_enseigne = $_POST['id_enseigne'];} else {exit;}

		$sqlcount = "SELECT COUNT(id_avis) AS count_avis FROM avis AS t1
						INNER JOIN contributeurs_donnent_avis AS t2
						ON t1.id_avis = t2.avis_id_avis
						WHERE contributeurs_id_contributeur = :id_contributeur";
		$reqcount = $bdd->prepare($sqlcount);
		
		$sql = "SELECT id_contributeur, nom_contributeur, prenom_contributeur, photo_contributeur, ville_contributeur
					 FROM contributeurs_follow_enseignes AS t1
					 INNER JOIN contributeurs AS t2
					 ON contributeurs_id_contributeur = id_contributeur WHERE enseignes_id_enseigne=:id_enseigne LIMIT 0,9";

		$req = $bdd->prepare($sql);
		$req->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
		$req->execute();
		$result = $req->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="suggestioncommerce_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="suggestioncommerce_head">
        <div class="suggestioncommerce_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_followers.png" title="" alt="" height="36" width="37" />
        </div><span class="maintitle">Ils suivent ce commerce</span>
    </div>  
    <div class="suggestioncommerce_body">
		<?php foreach ($result as $row) { 
			$reqcount->bindParam(':id_contributeur', $row['id_contributeur'], PDO::PARAM_INT);
			$reqcount->execute();
			$resultcount = $reqcount->fetch(PDO::FETCH_ASSOC);
			$count_avis = $resultcount['count_avis'];
		?>
        <div class="follower">
            <div class="box_userpic"><a href="<?php echo $SITE_URL . "/pages/utilisateur.php?id_contributeur=" . $row['id_contributeur']; ?>" ><img src="<?php echo SITE_URL . "/photos/utilisateurs/avatars/" . $row['photo_contributeur']; ?>" title="" alt="" /></a></div>
            <div class="follower_content">
                <span class="follower_identity_txt"><?php echo $row['prenom_contributeur'] . " " . ucFirstOtherLower(tronqueName($row['nom_contributeur'], 1)); ?><?php echo " - " . $row['ville_contributeur']; ?></span>
                <span class="follower_identity_txt_avis"><?php echo $count_avis; ?> avis</span>
                <span class="follower_identity_txt_rang"> 355/3558 Confirmé</span>
            </div>
        </div>
		<?php } ?>
    </div>
</div>