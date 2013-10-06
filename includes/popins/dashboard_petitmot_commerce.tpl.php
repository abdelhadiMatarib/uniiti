<?php
        include_once '../../config/configuration.inc.php';
		include_once '../../includes/fonctions.inc.php';
		include_once '../../config/configPDO.inc.php';
		
		if (isset($_POST['id_enseigne'])) {$id_enseigne = $_POST['id_enseigne'];} else {exit;}
		
		$sql = "SELECT * FROM labelsuniiti";
		$req = $bdd->prepare($sql);
		$req->execute();
		$result = $req->fetchAll(PDO::FETCH_ASSOC);

		$sqlcheck = "SELECT * FROM enseignes_labelsuniiti WHERE enseignes_id_enseigne=:id_enseigne";
		$reqcheck = $bdd->prepare($sqlcheck);
		$reqcheck->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
		$reqcheck->execute();
		$resultcheck = $reqcheck->fetchAll(PDO::FETCH_ASSOC);
		foreach ($resultcheck as $row) {
			$existe[$row['id_label']] = 1;
		}
		
		$sql2 = "SELECT * FROM recommandations";
		$req2 = $bdd->prepare($sql2);
		$req2->execute();
		$result2 = $req2->fetchAll(PDO::FETCH_ASSOC);
		
		$sqlcheck2 = "SELECT * FROM enseignes_recommandations WHERE enseignes_id_enseigne=:id_enseigne";
		$reqcheck2 = $bdd->prepare($sqlcheck2);
		$reqcheck2->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
		$reqcheck2->execute();
		$resultcheck2 = $reqcheck2->fetchAll(PDO::FETCH_ASSOC);
		foreach ($resultcheck2 as $row) {
			$existe2[$row['id_recommandation']] = 1;
		}
		
		$req->closeCursor();
		$reqcheck->closeCursor();
		$req2->closeCursor();
		$reqcheck2->closeCursor();

?>
<div class="ident_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="ident_head">
        <div class="ident_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/icon_labels.png" title="" alt="" height="36" width="36" />
        </div><span class="maintitle">Concept & Labels</span>
    </div>
	<form id="FormModifieEnseigne" onsubmit="return Enregistrer();" action="<?php echo SITE_URL; ?>/includes/requetemodifieenseigne.php" method="post"  autocomplete="off">
		<div class="ident_body">
				<input name="id_enseigne" id="id_enseigne" type="hidden" value="<?php if (!empty($_POST['id_enseigne'])) {echo $_POST['id_enseigne'];}?>"/>
				<input name="step" id="step" type="hidden" value="Concept"/>
				<div class="infos_gene_title"><span>Concept du commerce</span></div>
					<textarea name="descriptif" id="descriptif" class="input_lien_petitmot" placeholder="Concept du commerce en quelques lignes..."><?php if (!empty($_POST['descriptif'])) {echo stripslashes($_POST['descriptif']);}?></textarea>
				<div class="infos_gene_title">
					<span>Les labels Uniiti</span>
				</div>
				<div class="ptitmot_wrap_labels">
					<?php foreach ($result as $row) {
							$selected = false;
							if (isset($existe[$row['id_label']])) {$selected = true;} ?>
					<img id_label="<?php echo $row['id_label'];?>" class="labels<?php if ($selected) {echo " valid_label";}?>" title="<?php echo $row['label'];?>" src="<?php echo SITE_URL . "/img/pictos_actions/" . $row['url_label'];?>" title="" alt="" />
					<?php } ?>					
				</div>
				<div class="infos_gene_title">
					<span>Les recommandations</span>
				</div>
				<div class="ptitmot_wrap_recos">
					<?php foreach ($result2 as $row2) {
							$selected = false;
							if (isset($existe2[$row2['id_recommandation']])) {$selected = true;} ?>
					<img id_recommandation="<?php echo $row2['id_recommandation'];?>" class="recommandations<?php if ($selected) {echo " valid_recommandation";}?>" title="<?php echo $row2['recommandation'];?>" src="<?php echo SITE_URL . "/img/pictos_actions/" . $row2['url_recommandation'];?>" title="" alt="" />
					<?php } ?>	
				</div>    
		</div>
		<div class="suggestioncommerce_footer">
			<button type="submit" class="suggestioncommerce_valider_wrap"><a href="#">Enregistrer</a></button>
		</div>
	</form>
</div>
<script>

	// getElementById
	function $id(id) {return document.getElementById(id);}
	
	var CompteurLabels = $(".labels.valid_label").length;
	$(".labels").click(function() {
		if ($(this).hasClass("valid_label")) {
			$(this).removeClass('valid_label');
			CompteurLabels--;
		}
		else if (CompteurLabels < 6) {
			CompteurLabels++;
			$(this).addClass('valid_label');
		}
	});
	
	var CompteurRecommandations = $(".recommandations.valid_recommandation").length;
	$(".recommandations").click(function() {
		if ($(this).hasClass("valid_recommandation")) {
			$(this).removeClass('valid_recommandation');
			CompteurRecommandations--;
		}
		else if (CompteurRecommandations < 6) {
			CompteurRecommandations++;
			$(this).addClass('valid_recommandation');
		}
		console.log(CompteurRecommandations);
	});	
	
	function Enregistrer () {

		var data = {
						step : 'Concept',
						id_enseigne : '<?php if (!empty($_POST['id_enseigne'])) {echo $_POST['id_enseigne'];} ?>',
						descriptif : $id("descriptif").value
					};
		console.log(data);
		$.ajax({
			async : false,
			type :"POST",
			url : siteurl+'/includes/requetemodifieenseigne.php',
			data : data,
			success: function(html){},
			error: function(xhr) {console.log(xhr);alert('Erreur '+xhr.responseText);}
		});
		var compteur = 1, comptelabel = 1;
		var label = new Array();
		$(".labels").each(function () {
			label[compteur++] = '';
			if ($(this).hasClass("valid_label")) {label[comptelabel++] = $(this).attr('id_label');}
		});
		var datalabels = {
						step : 'Labels',
						id_enseigne : '<?php if (!empty($_POST['id_enseigne'])) {echo $_POST['id_enseigne'];} ?>',
						label1 :label[1],
						label2 :label[2],
						label3 :label[3],
						label4 :label[4],
						label5 :label[5],
						label6 :label[6]
					};
		console.log(datalabels);
		$.ajax({
			async : false,
			type :"POST",
			url : siteurl+'/includes/requetemodifieenseigne.php',
			data : datalabels,
			success: function(result){},
			error: function(xhr) {console.log(xhr);alert('Erreur '+xhr.responseText);}
		});
		var compteur = 1, compterecommandation = 1;
		var recommandation = new Array();
		$(".recommandations").each(function () {
			recommandation[compteur++] = '';
			if ($(this).hasClass("valid_recommandation")) {recommandation[compterecommandation++] = $(this).attr('id_recommandation');}
		});
		var datarecommandations = {
						step : 'Recommandations',
						id_enseigne : '<?php if (!empty($_POST['id_enseigne'])) {echo $_POST['id_enseigne'];} ?>',
						recommandation1 :recommandation[1],
						recommandation2 :recommandation[2],
						recommandation3 :recommandation[3],
						recommandation4 :recommandation[4],
						recommandation5 :recommandation[5],
						recommandation6 :recommandation[6]
					};
		console.log(datarecommandations);
		$.ajax({
			async : false,
			type :"POST",
			url : siteurl+'/includes/requetemodifieenseigne.php',
			data : datarecommandations,
			success: function(result){
				window.location.reload();
			},
			error: function(xhr) {console.log(xhr);alert('Erreur '+xhr.responseText);}
		});
		
		return false;
	}	
	
</script>