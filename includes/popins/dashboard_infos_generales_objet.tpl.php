<?php
        include_once '../../config/configuration.inc.php';
		include_once '../../config/configPDO.inc.php';
		
		$sql = "SELECT * FROM budget ORDER BY id_budget ASC";
		$req = $bdd->prepare($sql);
		$req->execute();
		$result = $req->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="ident_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="ident_head">
        <div class="ident_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/icon_infos_gene.png" title="" alt="" height="35" width="35" />
        </div><span class="maintitle">Informations générales</span>
    </div>
	<form id="FormModifieEnseigne" onsubmit="return Enregistrer();" action="<?php echo SITE_URL; ?>/includes/requetemodifieobjet.php" method="post"  autocomplete="off">
		<div class="ident_body">
			<div class="infos_gene_title"><span>Nom de l'objet</span></div>
			<div class="infos_gene_input"><input name="nom_objet" id="nom_objet" type="text" placeholder="Nom de l'objet" value="<?php if (!empty($_POST['nom_objet'])) {echo stripslashes($_POST['nom_objet']);}?>"/></div>
			<input name="id_objet" id="id_objet" type="hidden" value="<?php if (!empty($_POST['id_objet'])) {echo $_POST['id_objet'];}?>"/>
			<input name="step" id="step" type="hidden" value="Concept"/>
			<div class="infos_gene_title"><span>Où acheter</span></div>
			<div class="infos_gene_input"><select style="width:500px !important;" name="id_ville" id="id_ville" required="required"><option value="">Ville</option></select></div>
			<div class="infos_gene_title"><span>Catégorie | Sous-catégorie | Sous-sous-catégorie</span></div>
			<div class="infos_gene_input"><select name="id_categorie" id="id_categorie" required="required"><option value="">Catégorie</option></select></div>
			<div class="infos_gene_input"><select name="id_sous_categorie" id="id_sous_categorie" required="required"><option value="">Sous-Catégorie</option></select></div>
			<div class="infos_gene_input"><select name="id_sous_categorie2" id="id_sous_categorie2" required="required"><option value="">Sous-sous Catégorie</option></select></div>
			<div class="infos_gene_title"><span>Site internet</span></div>
			<div class="infos_gene_input"><input name="url" id="url" type="text" placeholder="Lien site internet" value="<?php if (!empty($_POST['url'])) {echo $_POST['url'];}?>"/></div>
		</div>

		<div class="suggestioncommerce_footer">
			<button type="submit" class="suggestioncommerce_valider_wrap"><a href="#">Enregistrer</a></button>
		</div>
	</form>
</div>
<script>

	// getElementByName
	function $name(name) {return document.getElementsByName(name)[0];}
	// getElementById
	function $id(id) {return document.getElementById(id);}

	function AfficheCategories(data, idselect, id_catselect, id_scatselect, id_sscatselect) {

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
					for (var k in result) {
						if (result[k].id_categorie == id_catselect) {
							html += '<option selected="selected" value=\"'+result[k].id_categorie+'\">'+result[k].categorie_principale+'</option>';
						}
						else {
							html += '<option value=\"'+result[k].id_categorie+'\">'+result[k].categorie_principale+'</option>';
						}
					}
				} else if (typeof(data.id_sous_categorie) == 'undefined') {
					html = '';
					var selected = false;
					for (var k in result) {
						if (result[k].id_sous_categorie == id_scatselect) {
							selected = true;
							html += '<option selected="selected" value=\"'+result[k].id_sous_categorie+'\">'+result[k].sous_categorie+'</option>';
						}
						else {html += '<option value=\"'+result[k].id_sous_categorie+'\">'+result[k].sous_categorie+'</option>';}
					}
					if (!selected) {AfficheCategories({id_categorie:data.id_categorie, id_sous_categorie:result[1].id_sous_categorie}, "#id_sous_categorie2");}
				} else {
					html = '';
					for (var k in result) {
						if (result[k].id_sous_categorie2 == id_sscatselect) {
							html += '<option selected="selected" value=\"'+result[k].id_sous_categorie2+'\">'+result[k].sous_categorie2+'</option>';
						}
						else {html += '<option value=\"'+result[k].id_sous_categorie2+'\">'+result[k].sous_categorie2+'</option>';}
					}				
				}
				$(idselect).html(html);
			},
			error: function() {alert('Erreur sur url : ' + url);}
		});
	}
	AfficheCategories({}, "#id_categorie", <?php echo $_POST['id_categorie']; ?>);
	AfficheCategories({id_categorie:<?php echo $_POST['id_categorie']; ?>}, "#id_sous_categorie", <?php echo $_POST['id_categorie']; ?>, <?php echo $_POST['id_sous_categorie']; ?>);
	AfficheCategories({id_categorie:<?php echo $_POST['id_categorie']; ?>, id_sous_categorie:<?php echo $_POST['id_sous_categorie']; ?>}, "#id_sous_categorie2", <?php echo $_POST['id_categorie']; ?>, <?php echo $_POST['id_sous_categorie']; ?>, <?php echo $_POST['id_sous_categorie2']; ?>);
	$("#id_categorie").change(function () {
		AfficheCategories({id_categorie:$name("id_categorie").value}, "#id_sous_categorie");
	});
	$("#id_sous_categorie").change(function () {
		AfficheCategories({id_categorie:$name("id_categorie").value, id_sous_categorie:$name("id_sous_categorie").value}, "#id_sous_categorie2");
	});

	function AfficheQuartiers(data, idselect, id_villeselect, id_ardtselect, id_quartierselect) {

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
					for (var k in result) {
						if (result[k].id_ville == id_villeselect) {
							html += '<option selected="selected" value=\"'+result[k].id_ville+'\">'+result[k].nom_ville+'</option>';
						}
						else {html += '<option value=\"'+result[k].id_ville+'\">'+result[k].nom_ville+'</option>';}
					}
				} else if (typeof(data.id_arrondissement) == 'undefined') {
					html = '';
					if (typeof(result.noresult) == 'undefined') {
						var selected = false;
						for (var k in result) {
							if (result[k].id_arrondissement == id_ardtselect) {
								selected = true;
								html += '<option selected="selected" value=\"'+result[k].id_arrondissement+'\">'+result[k].arrondissement+'</option>';
							}
							else {html += '<option value=\"'+result[k].id_arrondissement+'\">'+result[k].arrondissement+'</option>';}
						}
						if (!selected) {AfficheQuartiers({id_ville:data.id_ville, id_arrondissement:result[1].id_arrondissement}, "#id_quartier");}
					}
					else {
						html = '<option value=\"0\">indéfini</option>';
						AfficheQuartiers({id_ville:data.id_ville, id_arrondissement:0}, "#id_quartier");
					}
				} else {
					html = '';
					if (typeof(result.noresult) == 'undefined') {
						for (var k in result) {
							if (result[k].id_quartier == id_quartierselect) {
								html += '<option selected="selected" value=\"'+result[k].id_quartier+'\">'+result[k].quartier+'</option>';
							}
							else {html += '<option value=\"'+result[k].id_quartier+'\">'+result[k].quartier+'</option>';}
						}
					}
					else {html = '<option value=\"0\">indéfini</option>';}
				}
				$(idselect).html(html);
			},
			error: function() {alert('Erreur sur url : ' + url);}
		});
	}
	AfficheQuartiers({}, "#id_ville", <?php echo $_POST['id_ville']; ?>);
	
	function Enregistrer () {
		var id_objet = '<?php if (!empty($_POST['id_objet'])) {echo $_POST['id_objet'];} ?>';
		var data = {
						step : 'General',
						id_objet : id_objet,
						nom_objet : $id("nom_objet").value,
						id_ville : $id("id_ville").value,
						id_sous_categorie2 : $id("id_sous_categorie2").value,
						url : $id("url").value,
					};
		console.log(data);
		$.ajax({
			async : false,
			type :"POST",
			url : siteurl+'/includes/requetemodifieobjet.php',
			data : data,
			success: function(result){
				window.location.assign(siteurl+"/pages/objet.php?id_objet="+result.result);
			},
			error: function(xhr) {console.log(xhr);alert('Erreur '+xhr.responseText);}
		});
		return false;
	}
</script>	

