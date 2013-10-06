<?php
        include_once '../../config/configuration.inc.php';
		include_once '../../includes/fonctions.inc.php';
		include_once '../../config/configPDO.inc.php';
		
		if (isset($_POST['id_enseigne'])) {$id_enseigne = $_POST['id_enseigne'];} else {exit;}
		
		$sql = "SELECT * FROM motscles";
		$req = $bdd->prepare($sql);
		$req->execute();
		$result = $req->fetchAll(PDO::FETCH_ASSOC);
		
		$sql2 = "SELECT id_type_info, id_motcle1, id_motcle2, id_motcle3 FROM enseignes_infos_generales WHERE enseignes_id_enseigne=" . $id_enseigne;
		$req2 = $bdd->prepare($sql2);
		$req2->execute();
		$result2 = $req2->fetchAll(PDO::FETCH_ASSOC);
		foreach ($result2 as $row2) {
			$MotCle[$row2['id_type_info']][1] = $row2['id_motcle1'];
			$MotCle[$row2['id_type_info']][2] = $row2['id_motcle2'];
			$MotCle[$row2['id_type_info']][3] = $row2['id_motcle3'];			
		}
		$req->closeCursor();
		$req2->closeCursor();
?>
<div class="ident_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="ident_head">
        <div class="ident_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/icon_infos_gene.png" title="" alt="" height="35" width="35" />
        </div><span class="maintitle">Informations générales</span>
    </div>
    <div class="ident_body">
        <div class="infos_gene_title"><span>En général</span></div>
        <div class="infos_gene_input">
			<select>
				<option>Mot-clef 1</option>
				<?php foreach ($result as $row) {
						$selected = '';
						if ((isset($MotCle[1][1])) && ($MotCle[1][1] == $row['id_motcle'])) {$selected = 'selected="selected"';}
						echo "<option " . $selected . " value='" . $row['id_motcle'] . "'>" . $row['motcle'] . "</option>";
				} ?>
			</select>
		</div>
        <div class="infos_gene_input">
			<select>
				<option>Mot-clef 2</option>
				<?php foreach ($result as $row) {
						$selected = '';
						if ((isset($MotCle[1][2])) && ($MotCle[1][1] == $row['id_motcle'])) {$selected = 'selected="selected"';}
						echo "<option " . $selected . " value='" . $row['id_motcle'] . "'>" . $row['motcle'] . "</option>";
				} ?>			
			</select>
		</div>
        <div class="infos_gene_input">
			<select>
				<option>Mot-clef 3</option>
				<?php foreach ($result as $row) {
						$selected = '';
						if ((isset($MotCle[1][3])) && ($MotCle[1][1] == $row['id_motcle'])) {$selected = 'selected="selected"';}
						echo "<option " . $selected . " value='" . $row['id_motcle'] . "'>" . $row['motcle'] . "</option>";
				} ?>			
			</select>
		</div>
		<div class="infos_gene_title"><span>Les services proposés</span></div>
        <div class="infos_gene_input">
			<select>
				<option>Mot-clef 1</option>
				<?php foreach ($result as $row) {
						$selected = '';
						if ((isset($MotCle[2][1])) && ($MotCle[1][1] == $row['id_motcle'])) {$selected = 'selected="selected"';}
						echo "<option " . $selected . " value='" . $row['id_motcle'] . "'>" . $row['motcle'] . "</option>";
				} ?>			
			</select>
		</div>
        <div class="infos_gene_input">
			<select>
				<option>Mot-clef 2</option>
				<?php foreach ($result as $row) {
						$selected = '';
						if ((isset($MotCle[2][2])) && ($MotCle[1][1] == $row['id_motcle'])) {$selected = 'selected="selected"';}
						echo "<option " . $selected . " value='" . $row['id_motcle'] . "'>" . $row['motcle'] . "</option>";
				} ?>			
			</select>
		</div>
        <div class="infos_gene_input">
			<select>
				<option>Mot-clef 3</option>
				<?php foreach ($result as $row) {
						$selected = '';
						if ((isset($MotCle[2][3])) && ($MotCle[1][1] == $row['id_motcle'])) {$selected = 'selected="selected"';}
						echo "<option " . $selected . " value='" . $row['id_motcle'] . "'>" . $row['motcle'] . "</option>";
				} ?>			
			</select>
		</div>
		<div class="infos_gene_title"><span>Les régimes spéciaux</span></div>
        <div class="infos_gene_input">
			<select>
				<option>Mot-clef 1</option>
				<?php foreach ($result as $row) {
						$selected = '';
						if ((isset($MotCle[3][1])) && ($MotCle[1][1] == $row['id_motcle'])) {$selected = 'selected="selected"';}
						echo "<option " . $selected . " value='" . $row['id_motcle'] . "'>" . $row['motcle'] . "</option>";
				} ?>			
			</select>
		</div>
        <div class="infos_gene_input">
			<select>
				<option>Mot-clef 2</option>
				<?php foreach ($result as $row) {
						$selected = '';
						if ((isset($MotCle[3][2])) && ($MotCle[1][1] == $row['id_motcle'])) {$selected = 'selected="selected"';}
						echo "<option " . $selected . " value='" . $row['id_motcle'] . "'>" . $row['motcle'] . "</option>";
				} ?>			
			</select>
		</div>
        <div class="infos_gene_input">
			<select>
				<option>Mot-clef 3</option>
				<?php foreach ($result as $row) {
						$selected = '';
						if ((isset($MotCle[3][3])) && ($MotCle[1][1] == $row['id_motcle'])) {$selected = 'selected="selected"';}
						echo "<option " . $selected . " value='" . $row['id_motcle'] . "'>" . $row['motcle'] . "</option>";
				} ?>			
			</select>
		</div>
		<div class="infos_gene_title"><span>Avec qui venir ?</span></div>
        <div class="infos_gene_input">
			<select>
				<option>Mot-clef 1</option>
				<?php foreach ($result as $row) {
						$selected = '';
						if ((isset($MotCle[4][1])) && ($MotCle[1][1] == $row['id_motcle'])) {$selected = 'selected="selected"';}
						echo "<option " . $selected . " value='" . $row['id_motcle'] . "'>" . $row['motcle'] . "</option>";
				} ?>			
			</select>
		</div>
        <div class="infos_gene_input">
			<select>
				<option>Mot-clef 2</option>
				<?php foreach ($result as $row) {
						$selected = '';
						if ((isset($MotCle[4][2])) && ($MotCle[1][1] == $row['id_motcle'])) {$selected = 'selected="selected"';}
						echo "<option " . $selected . " value='" . $row['id_motcle'] . "'>" . $row['motcle'] . "</option>";
				} ?>			
			</select>
		</div>
        <div class="infos_gene_input">
			<select>
				<option>Mot-clef 3</option>
				<?php foreach ($result as $row) {
						$selected = '';
						if ((isset($MotCle[4][3])) && ($MotCle[1][1] == $row['id_motcle'])) {$selected = 'selected="selected"';}
						echo "<option " . $selected . " value='" . $row['id_motcle'] . "'>" . $row['motcle'] . "</option>";
				} ?>			
			</select>
		</div>
    </div>
    <div class="suggestioncommerce_footer">
        
        <div class="suggestioncommerce_valider_wrap"><a href="#">Enregistrer</a></div>
        
    </div>
</div>