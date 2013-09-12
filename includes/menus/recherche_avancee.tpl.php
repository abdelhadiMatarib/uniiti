        <?php
        include_once '../../config/configuration.inc.php';
		include_once '../../config/configPDO.inc.php';
		if (!empty($_POST['type'])) {echo "type : " . $_POST['type'] . "<BR>";}
		if (!empty($_POST['categorie'])) {echo "cat : " . $_POST['categorie'] . "<BR>";}
		if (!empty($_POST['sous_categorie'])) {echo "sous cat : " . $_POST['sous_categorie'] . "<BR>";}
		if (!empty($_POST['budget'])) {echo "budget : " . $_POST['budget'] . "<BR>";}
		$sql = "SELECT * FROM categories";
		$req = $bdd->prepare($sql);
		$req->execute();
		$result = $req->fetchAll(PDO::FETCH_ASSOC);
		$htmlcat = "<select name=\"categorie\" onchange=\"javascript:submit(this)\">\n";
		$htmlcat .= '<option value="">Choisir</option>';
		foreach ($result as $row) {
			if (!empty($_POST['categorie']) &&($_POST['categorie'] == $row['id_categorie'])) {
				$htmlcat .= '<option value="' . $row['id_categorie'] . '" selected="selected">' . $row['categorie_principale'] . '</option>\n';
			}
			else {
				$htmlcat .= '<option value="' . $row['id_categorie'] . '">' . $row['categorie_principale'] . '</option>\n';
			}
		}
		$htmlcat .= "</select>\n";

		$sqlsouscat = "SELECT * FROM sous_categories WHERE id_categorie=:id_categorie";
		$reqsouscat = $bdd->prepare($sqlsouscat);
			
		$sql = "SELECT * FROM budget";
		$req = $bdd->prepare($sql);
		$req->execute();
		$result = $req->fetchAll(PDO::FETCH_ASSOC);
		$htmlbudget = "<select name=\"budget\" onchange=\"javascript:submit(this)\">\n";
		foreach ($result as $row) {
			$htmlbudget .= '<option value="' . $row['id_budget'] . '">' . $row['budget_enseigne'] . '</option>\n';
		}
		$htmlbudget .= "</select>\n";			
		
		?>
	<form action="" method="post">
		<form action="<?php echo SITE_URL; ?>/includes/menus/recherche_avancee.tpl.php" method="post">
			<div class="recherche_avancee_left">
				<span>Je recherche un <select onchange="javascript:submit(this)" name="type">
										<option value="">Choisir</option>
										<option value="enseigne" <?php if (!empty($_POST['type']) &&($_POST['type'] == "enseigne")) {echo "selected='selected'";}?>>Commerce</option>
										<option value="objet" <?php if (!empty($_POST['type']) &&($_POST['type'] == "objet")) {echo "selected='selected'";}?>>Objet</option>
									  </select>
				
				<?php if (!empty($_POST['type'])) { 
					if ($_POST['type'] == "enseigne") {?>
						près de <a href="#" title="">Paris 15<sup>ème</sup></a>
					<?php } ?>
					<?php if ((($_POST['type'] == "enseigne") && (!empty($_POST['localisation']))) || (($_POST['type'] == "objet"))){?>
						dans la catégorie </span><span><?php echo $htmlcat;?>
					<?php } ?>
					<?php if (!empty($_POST['categorie'])) {
							$reqsouscat->bindParam(':id_categorie', $_POST['categorie'], PDO::PARAM_INT);					
							$reqsouscat->execute();
							$resultsouscat = $reqsouscat->fetchAll(PDO::FETCH_ASSOC);
							$htmlsouscat = "<select name=\"sous_categorie\" onchange=\"javascript:submit(this)\">\n";
							foreach ($resultsouscat as $row) {
								$htmlsouscat .= '<option value="' . $row['id_sous_categorie'] . '">' . $row['sous_categorie'] . '</option>\n';
							}
							$htmlsouscat .= "</select>\n";	
					?>
						et plus précisemment <?php echo $htmlsouscat;?></span><span>
					<?php } ?>
					pour un prix <?php echo $htmlbudget;?>
				<?php } ?>
				</span>
			</div>
		</form>
		<div class="recherche_avancee_right">
			<div class="recherche_avancee_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/recherche_loupe.png" title="" alt="" height="95" width="96"/></div>
			<div class="recherche_avancee_right_txt"><span class="recherche_avancee_right_txt1">Recherche</span><span class="recherche_avancee_right_txt2">avancée</span></div>
		</div>
	</form>
	<script>
	</script>
