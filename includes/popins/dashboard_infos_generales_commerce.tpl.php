<?php
        include_once '../../config/configuration.inc.php';
		$urlTo = FALSE; // Déclaration variable pour login_access destination
		$data = "{}";
?>
<div class="ident_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="ident_head">
        <div class="ident_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/icon_infos_gene.png" title="" alt="" height="35" width="35" />
        </div><span class="maintitle">Informations générales</span>
    </div>
    <div class="ident_body">
        <div class="infos_gene_title"><span>Adresse | Code postal | Ville  | Arrond. | Quartier</span></div>
        <div class="infos_gene_input"><input type="text" placeholder="Adresse du commerce" value="<?php if (!empty($_POST['adresse1_enseigne'])) {echo $_POST['adresse1_enseigne'];}?>"/></div>
		<div class="infos_gene_input"><input type="text" placeholder="Code postal du commerce" value="<?php if (!empty($_POST['cp_enseigne'])) {echo $_POST['cp_enseigne'];}?>"/></div>
        <div class="infos_gene_input"><select name="id_ville" id="id_ville" required="required"><option value="">Ville</option></select></div>
        <div class="infos_gene_input"><select name="id_arrondissement" id="id_arrondissement" required="required"><option value="">Arrondissement</option></select></div>
        <div class="infos_gene_input"><select name="id_quartier" id="id_quartier" required="required"><option value="0">Quartier indéfini</option></select></div>
        <div class="infos_gene_title"><span>Catégorie | Sous-catégorie | Sous-sous-catégorie</span></div>
        <div class="infos_gene_input"><select name="id_categorie" id="id_categorie" required="required"><option value="">Catégorie</option></select></div>
        <div class="infos_gene_input"><select name="id_sous_categorie" id="id_sous_categorie" required="required"><option value="">Sous-Catégorie</option></select></div>
        <div class="infos_gene_input"><select name="id_sous_categorie2" id="id_sous_categorie2" required="required"><option value="">Sous-sous Catégorie</option></select></div>
        <div class="infos_gene_title"><span>Téléphone | Site internet</span></div>
        <div class="infos_gene_input"><input type="text" placeholder="N° de téléphone" value="<?php if (!empty($_POST['telephone_enseigne'])) {echo $_POST['telephone_enseigne'];}?>"/></div>
        <div class="infos_gene_input"><input type="text" placeholder="Lien site internet" value="<?php if (!empty($_POST['url'])) {echo $_POST['url'];}?>"/></div>
        <div class="infos_gene_title"><span>Catégorie de prix</span></div>
        <div class="infos_gene_input_img">
            <div class="infos_gene_input_img_container">
                <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/icon_sacs_prix.png" />
                <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/icon_sacs_prix.png" />
                <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/icon_sacs_prix.png" />
                <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/icon_sacs_prix.png" />
            </div>
        </div>
    </div>
    <div class="suggestioncommerce_footer">
        
        <button type="submit" class="suggestioncommerce_valider_wrap"><a href="#">Enregistrer</a></button>
        
    </div>
</div>
</html>
<script>

	// getElementByName
	function $name(name) {return document.getElementsByName(name)[0];}
	
	function AfficheCategories(data, idselect) {

		$.ajax({
			type: "POST",
			url: siteurl+"/includes/requetecategories.php",
			data: data,
			dataType: "json",
			beforeSend: function(x) {
				if(x && x.overrideMimeType) {
				x.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(result) {
				if (typeof(data.id_categorie) == 'undefined') {
					html = '';
					for (var k in result) {html += '<option value=\"'+result[k].id_categorie+'\">'+result[k].categorie_principale+'</option>';}
				} else if (typeof(data.id_sous_categorie) == 'undefined') {
					html = '';
					for (var k in result) {html += '<option value=\"'+result[k].id_sous_categorie+'\">'+result[k].sous_categorie+'</option>';}
					AfficheCategories({id_categorie:data.id_categorie, id_sous_categorie:result[1].id_sous_categorie}, "#id_sous_categorie2");
				} else {
					html = '';
					for (var k in result) {html += '<option value=\"'+result[k].id_sous_categorie2+'\">'+result[k].sous_categorie2+'</option>';}				
				}
				$(idselect).html(html);
			},
			error: function() {alert('Erreur sur url : ' + url);}
		});
	}
	AfficheCategories({}, "#id_categorie");
	AfficheCategories({id_categorie:1}, "#id_sous_categorie");
	AfficheCategories({id_catagorie:1, id_sous_categorie:1}, "#id_sous_categorie2");
	$("#id_categorie").change(function () {
		AfficheCategories({id_categorie:$name("id_categorie").value}, "#id_sous_categorie");
	});
	$("#id_sous_categorie").change(function () {
		AfficheCategories({id_categorie:$name("id_categorie").value, id_sous_categorie:$name("id_sous_categorie").value}, "#id_sous_categorie2");
	});

	function AfficheQuartiers(data, idselect) {

		$.ajax({
			type: "POST",
			url: siteurl+"/includes/requetequartiers.php",
			data: data,
			dataType: "json",
			beforeSend: function(x) {
				if(x && x.overrideMimeType) {
				x.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(result) {
				if (typeof(data.id_ville) == 'undefined') {
					html = '';
					for (var k in result) {html += '<option value=\"'+result[k].id_ville+'\">'+result[k].nom_ville+'</option>';}
				} else if (typeof(data.id_arrondissement) == 'undefined') {
					html = '';
					if (typeof(result.noresult) == 'undefined') {
						for (var k in result) {html += '<option value=\"'+result[k].id_arrondissement+'\">'+result[k].arrondissement+'</option>';}
						AfficheQuartiers({id_ville:data.id_ville, id_arrondissement:result[1].id_arrondissement}, "#id_quartier");
					}
					else {AfficheQuartiers({id_ville:data.id_ville, id_arrondissement:0}, "#id_quartier");}
				} else {
					html = '';
					if (typeof(result.noresult) == 'undefined') {
						for (var k in result) {html += '<option value=\"'+result[k].id_quartier+'\">'+result[k].quartier+'</option>';}
					}
				}
				$(idselect).html(html);
			},
			error: function() {alert('Erreur sur url : ' + url);}
		});
	}
	AfficheQuartiers({}, "#id_ville");
	AfficheQuartiers({id_ville:1}, "#id_arrondissement");
	AfficheQuartiers({id_ville:1, id_arrondissement:1}, "#id_quartier");
	$("#id_ville").change(function () {
		AfficheQuartiers({id_ville:$name("id_ville").value}, "#id_arrondissement");
	});
	$("#id_arrondissement").change(function () {
		AfficheQuartiers({id_ville:$name("id_ville").value, id_arrondissement:$name("id_arrondissement").value}, "#id_quartier");
	});	
	
	
	
	
</script>
