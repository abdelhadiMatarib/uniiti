<?php
	include_once '../../config/configuration.inc.php';
	include_once '../../config/configPDO.inc.php';

	if (!empty($_POST['id_enseigne'])) {$id_enseigne = $_POST['id_enseigne'];}
	
	$sql = "SELECT enseignes_id_enseigne1, t2.nom_enseigne AS nom_enseigne1, enseignes_id_enseigne2, t3.nom_enseigne AS nom_enseigne2
			FROM enseignes_reseau_enseignes AS t1
				INNER JOIN enseignes AS t2
				ON t1.enseignes_id_enseigne1 = t2.id_enseigne
					INNER JOIN enseignes AS t3
					ON t1.enseignes_id_enseigne2 = t3.id_enseigne				
					WHERE (enseignes_id_enseigne1 = :id_enseigne OR enseignes_id_enseigne2 = :id_enseigne) AND id_statut = 2";
	$req = $bdd->prepare($sql);
	$req->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
	$req->execute();
	$result = $req->fetchAll(PDO::FETCH_ASSOC);
	
	$sql2 = "SELECT enseignes_id_enseigne1, nom_enseigne
				FROM enseignes_reseau_enseignes AS t1
					INNER JOIN enseignes AS t2
					ON t1.enseignes_id_enseigne1 = t2.id_enseigne
					WHERE enseignes_id_enseigne2 = :id_enseigne AND id_statut = 1";
	$req2 = $bdd->prepare($sql2);
	$req2->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
	$req2->execute();
	$result2 = $req2->fetchAll(PDO::FETCH_ASSOC);
	
	$sql3 = "SELECT enseignes_id_enseigne2, nom_enseigne
				FROM enseignes_reseau_enseignes AS t1
					INNER JOIN enseignes AS t2
					ON t1.enseignes_id_enseigne2 = t2.id_enseigne
					WHERE enseignes_id_enseigne1 = :id_enseigne AND id_statut = 1";
	$req3 = $bdd->prepare($sql3);
	$req3->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
	$req3->execute();
	$result3 = $req3->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="suggestioncommerce_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="suggestioncommerce_head">
        <div class="suggestioncommerce_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_ajout_liencommerce.png" title="" alt="" height="33" width="33" />
        </div><span class="maintitle">Gérez votre réseau</span>
    </div>   
    <div class="suggestioncommerce_body">
		<div class="ajout_liencommerce_infos_txt"><strong>1. Votre réseau actuel :</strong><?php if (!$result) {echo " pas de commerce pour le moment";} ?></div>
		<?php foreach ($result as $row) { 
			if ($row['enseignes_id_enseigne1'] != $id_enseigne) {$nom_enseigne = $row['nom_enseigne1'];}
			else {$nom_enseigne = $row['nom_enseigne2'];} ?>
        <div class="ajout_liencommerce_infos_txt"><?php echo $nom_enseigne;?></div>
		<?php } ?>
		<div class="ajout_liencommerce_infos_txt"><strong>2. Les enseignes qui vous demande en réseau :</strong><?php if (!$result2) {echo " pas de nouvelle demande";} ?></div>
		<?php foreach ($result2 as $row2) { ?>
		<div class="confirmation_footer">
			<span><?php echo $row2['nom_enseigne'];?> : acceptez-vous cette proposition ?</span>
			<div class="presentation_action_left_avis_utile_reponse_wrap">
				<a onclick="Enregistrer(2, '<?php echo $row2['enseignes_id_enseigne1']?>');" href="#" title="">OUI</a><a onclick="Enregistrer(3, '<?php echo $row2['enseignes_id_enseigne1']?>');" href="#" title="">NON</a>
			</div>
		</div>
		<?php } ?>
		<div class="ajout_liencommerce_infos_txt"><strong>3. Vos demandes d'ajout en cours :</strong><?php if (!$result3) {echo " pas de demande en attente";} ?></div>
		<?php foreach ($result3 as $row3) { ?>
        <div class="ajout_liencommerce_infos_txt"><?php echo $row3['nom_enseigne'];?> n'a pas encore répondu.</div>
		<?php } ?>
		<div onclick="DemanderReseau();" class="ajout_liencommerce_infos_txt"><a href="#"><strong>Faire une demande d'ajout de commerce à mon réseau</strong></a></div>
    </div>
    <div class="suggestioncommerce_footer">
        <div onclick="$('.popin_close_button').click();" class="suggestioncommerce_valider_wrap"><a href="#">Fermer</a></div>
    </div>
</div>
<script>

	function DemanderReseau() {
		ActualisePopin({id_enseigne : <?php echo $_POST['id_enseigne']; ?>}, '/includes/popins/ajout_liencommerce.tpl.php', 'default_dialog');				
	}
	function Enregistrer(id_statut, id_enseigne1) {

		data = {
			check : 0,
			id_enseigne1 : id_enseigne1,
			id_enseigne2 : '<?php if (!empty($_POST['id_enseigne'])) {echo $_POST['id_enseigne'];} ?>',
			id_statut : id_statut
		};
	
		$.ajax({
			type: "POST",
			url: siteurl+"/includes/requetereseauenseigne.php",
			data: data,
			dataType: "json",
			beforeSend: function(x) {
				if(x && x.overrideMimeType) {
				x.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(result) {
					ActualisePopin({}, '/includes/popins/ajout_liencommerce_demandeconfirmation_valide.tpl.php', 'default_dialog');				
			},
			error: function(xhr) {console.log(xhr);alert('Erreur '+xhr.responseText);}
		});
	}
</script>