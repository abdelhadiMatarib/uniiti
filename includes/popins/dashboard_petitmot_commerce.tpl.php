<?php
        include_once '../../config/configuration.inc.php';
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
					<img src="<?php echo SITE_URL; ?>/img/pictos_actions/label_bio.png" title="" alt="" />
					<img src="<?php echo SITE_URL; ?>/img/pictos_actions/label_bio.png" title="" alt="" />
					<img src="<?php echo SITE_URL; ?>/img/pictos_actions/label_bio.png" title="" alt="" />
					<img src="<?php echo SITE_URL; ?>/img/pictos_actions/label_bio.png" title="" alt="" />
					<img src="<?php echo SITE_URL; ?>/img/pictos_actions/label_bio.png" title="" alt="" />
					<img src="<?php echo SITE_URL; ?>/img/pictos_actions/label_bio.png" title="" alt="" />
				</div>
				<div class="infos_gene_title">
					<span>Les recommandations</span>
				</div>
				<div class="ptitmot_wrap_recos">
					<img src="<?php echo SITE_URL; ?>/img/pictos_actions/reco_book.png" title="" alt="" />
					<img src="<?php echo SITE_URL; ?>/img/pictos_actions/reco_book.png" title="" alt="" />
					<img src="<?php echo SITE_URL; ?>/img/pictos_actions/reco_book.png" title="" alt="" />
					<img src="<?php echo SITE_URL; ?>/img/pictos_actions/reco_book.png" title="" alt="" />
					<img src="<?php echo SITE_URL; ?>/img/pictos_actions/reco_book.png" title="" alt="" />
					<img src="<?php echo SITE_URL; ?>/img/pictos_actions/reco_book.png" title="" alt="" />
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
			success: function(html){
				window.location.reload();
			},
			error: function() {alert('Erreur sur url : ' + url);}
		});
		return false;
	}	
	
</script>