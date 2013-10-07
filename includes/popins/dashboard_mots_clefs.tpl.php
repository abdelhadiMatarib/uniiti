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
			<select id="sel1" class="motscles" id_type_info="1" mcle="1">
				<option value="">Mot-clef 1</option>
				<?php foreach ($result as $row) {
						$selected = '';
						if ((isset($MotCle[1][1])) && ($MotCle[1][1] == $row['id_motcle'])) {$selected = 'selected="selected"';}
						echo "<option " . $selected . " value='" . $row['id_motcle'] . "'>" . $row['motcle'] . "</option>";
				} ?>
			</select>
		</div>
        <div class="infos_gene_input">
			<select id="sel2" class="motscles" id_type_info="1" mcle="2">
				<option value="">Mot-clef 2</option>
				<?php foreach ($result as $row) {
						$selected = '';
						if ((isset($MotCle[1][2])) && ($MotCle[1][2] == $row['id_motcle'])) {$selected = 'selected="selected"';}
						echo "<option " . $selected . " value='" . $row['id_motcle'] . "'>" . $row['motcle'] . "</option>";
				} ?>			
			</select>
		</div>
        <div class="infos_gene_input">
			<select id="sel3" class="motscles" id_type_info="1" mcle="3">
				<option value="">Mot-clef 3</option>
				<?php foreach ($result as $row) {
						$selected = '';
						if ((isset($MotCle[1][3])) && ($MotCle[1][3] == $row['id_motcle'])) {$selected = 'selected="selected"';}
						echo "<option " . $selected . " value='" . $row['id_motcle'] . "'>" . $row['motcle'] . "</option>";
				} ?>			
			</select>
		</div>
		<div class="infos_gene_title"><span>Les services proposés</span></div>
        <div class="infos_gene_input">
			<select id="sel4" class="motscles" id_type_info="2" mcle="1">
				<option value="">Mot-clef 1</option>
				<?php foreach ($result as $row) {
						$selected = '';
						if ((isset($MotCle[2][1])) && ($MotCle[2][1] == $row['id_motcle'])) {$selected = 'selected="selected"';}
						echo "<option " . $selected . " value='" . $row['id_motcle'] . "'>" . $row['motcle'] . "</option>";
				} ?>			
			</select>
		</div>
        <div class="infos_gene_input">
			<select id="sel5" class="motscles" id_type_info="2" mcle="2">
				<option value="">Mot-clef 2</option>
				<?php foreach ($result as $row) {
						$selected = '';
						if ((isset($MotCle[2][2])) && ($MotCle[2][2] == $row['id_motcle'])) {$selected = 'selected="selected"';}
						echo "<option " . $selected . " value='" . $row['id_motcle'] . "'>" . $row['motcle'] . "</option>";
				} ?>			
			</select>
		</div>
        <div class="infos_gene_input">
			<select id="sel6" class="motscles" id_type_info="2" mcle="3">
				<option value="">Mot-clef 3</option>
				<?php foreach ($result as $row) {
						$selected = '';
						if ((isset($MotCle[2][3])) && ($MotCle[2][3] == $row['id_motcle'])) {$selected = 'selected="selected"';}
						echo "<option " . $selected . " value='" . $row['id_motcle'] . "'>" . $row['motcle'] . "</option>";
				} ?>			
			</select>
		</div>
		<div class="infos_gene_title"><span>Les régimes spéciaux</span></div>
        <div class="infos_gene_input">
			<select id="sel7" class="motscles" id_type_info="3" mcle="1">
				<option value="">Mot-clef 1</option>
				<?php foreach ($result as $row) {
						$selected = '';
						if ((isset($MotCle[3][1])) && ($MotCle[3][1] == $row['id_motcle'])) {$selected = 'selected="selected"';}
						echo "<option " . $selected . " value='" . $row['id_motcle'] . "'>" . $row['motcle'] . "</option>";
				} ?>			
			</select>
		</div>
        <div class="infos_gene_input">
			<select id="sel8" class="motscles" id_type_info="3" mcle="2">
				<option value="">Mot-clef 2</option>
				<?php foreach ($result as $row) {
						$selected = '';
						if ((isset($MotCle[3][2])) && ($MotCle[3][2] == $row['id_motcle'])) {$selected = 'selected="selected"';}
						echo "<option " . $selected . " value='" . $row['id_motcle'] . "'>" . $row['motcle'] . "</option>";
				} ?>			
			</select>
		</div>
        <div class="infos_gene_input">
			<select id="sel9" class="motscles" id_type_info="3" mcle="3">
				<option value="">Mot-clef 3</option>
				<?php foreach ($result as $row) {
						$selected = '';
						if ((isset($MotCle[3][3])) && ($MotCle[3][3] == $row['id_motcle'])) {$selected = 'selected="selected"';}
						echo "<option " . $selected . " value='" . $row['id_motcle'] . "'>" . $row['motcle'] . "</option>";
				} ?>			
			</select>
		</div>
		<div class="infos_gene_title"><span>Avec qui venir ?</span></div>
        <div class="infos_gene_input">
			<select id="sel10" class="motscles" id_type_info="4" mcle="1">
				<option value="">Mot-clef 1</option>
				<?php foreach ($result as $row) {
						$selected = '';
						if ((isset($MotCle[4][1])) && ($MotCle[4][1] == $row['id_motcle'])) {$selected = 'selected="selected"';}
						echo "<option " . $selected . " value='" . $row['id_motcle'] . "'>" . $row['motcle'] . "</option>";
				} ?>			
			</select>
		</div>
        <div class="infos_gene_input">
			<select id="sel11" class="motscles" id_type_info="4" mcle="2">
				<option value="">Mot-clef 2</option>
				<?php foreach ($result as $row) {
						$selected = '';
						if ((isset($MotCle[4][2])) && ($MotCle[4][2] == $row['id_motcle'])) {$selected = 'selected="selected"';}
						echo "<option " . $selected . " value='" . $row['id_motcle'] . "'>" . $row['motcle'] . "</option>";
				} ?>			
			</select>
		</div>
        <div class="infos_gene_input">
			<select id="sel12" class="motscles" id_type_info="4" mcle="3">
				<option value="">Mot-clef 3</option>
				<?php foreach ($result as $row) {
						$selected = '';
						if ((isset($MotCle[4][3])) && ($MotCle[4][3] == $row['id_motcle'])) {$selected = 'selected="selected"';}
						echo "<option " . $selected . " value='" . $row['id_motcle'] . "'>" . $row['motcle'] . "</option>";
				} ?>			
			</select>
		</div>
    </div>
    <div class="suggestioncommerce_footer">
        
        <div onclick="Enregistrer();" class="suggestioncommerce_valider_wrap"><a href="#">Enregistrer</a></div>
        
    </div>
</div>
<script>
	// getElementById
	function $id(id) {return document.getElementById(id);}
	
	function Enregistrer () {

		var datamotscles = {
						step : 'MotsCles',
						id_enseigne : '<?php if (!empty($_POST['id_enseigne'])) {echo $_POST['id_enseigne'];} ?>',
						motcle11 :$id('sel1').value,
						motcle12 :$id('sel2').value,
						motcle13 :$id('sel3').value,
						motcle21 :$id('sel4').value,
						motcle22 :$id('sel5').value,
						motcle23 :$id('sel6').value,
						motcle31 :$id('sel7').value,
						motcle32 :$id('sel8').value,
						motcle33 :$id('sel9').value,
						motcle41 :$id('sel10').value,
						motcle42 :$id('sel11').value,
						motcle43 :$id('sel12').value
					};
		console.log(datamotscles);
		$.ajax({
			async : false,
			type :"POST",
			url : siteurl+'/includes/requetemodifieenseigne.php',
			data : datamotscles,
			success: function(result){window.location.reload();},
			error: function(xhr) {console.log(xhr);alert('Erreur '+xhr.responseText);}
		});
	}
</script>