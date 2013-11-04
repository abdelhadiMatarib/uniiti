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
	<form id="FormModifieEnseigne" onsubmit="return Enregistrer();" action="<?php echo SITE_URL; ?>/includes/requetemodifieenseigne.php" method="post"  autocomplete="off">
		<div class="ident_body">
			<div class="infos_gene_title"><span>Nom du commerce</span></div>
			<div class="infos_gene_input"><input name="nom_enseigne" id="nom_enseigne" type="text" placeholder="Nom du commerce" value="<?php if (!empty($_POST['nom_enseigne'])) {echo stripslashes($_POST['nom_enseigne']);}?>"/></div>
			<input name="id_enseigne" id="id__enseigne" type="hidden" value="<?php if (!empty($_POST['id_enseigne'])) {echo $_POST['id_enseigne'];}?>"/>
			<input name="step" id="step" type="hidden" value="Concept"/>
			<div class="infos_gene_title"><span>Adresse | Code postal | Ville  | Arrond. | Quartier</span></div>
			<div class="infos_gene_input"><input name="adresse1_enseigne" id="adresse1_enseigne" type="text" placeholder="Adresse du commerce" value="<?php if (!empty($_POST['adresse1_enseigne'])) {echo $_POST['adresse1_enseigne'];}?>"/></div>
			<div class="infos_gene_input"><input name="cp_enseigne" id="cp_enseigne" type="text" placeholder="Code postal du commerce" value="<?php if (!empty($_POST['cp_enseigne'])) {echo $_POST['cp_enseigne'];}?>"/></div>
			<div class="infos_gene_input"><select name="id_ville" id="id_ville" required="required"><option value="">Ville</option></select></div>
			<div class="infos_gene_input"><select name="id_arrondissement" id="id_arrondissement" required="required"><option value="">Arrondissement</option></select></div>
			<div class="infos_gene_input"><select name="id_quartier" id="id_quartier" required="required"><option value="0">Quartier indéfini</option></select></div>
			<div class="infos_gene_title"><span>Catégorie | Sous-catégorie | Sous-sous-catégorie</span></div>
			<div class="infos_gene_input"><select name="id_categorie" id="id_categorie" required="required"><option value="">Catégorie</option></select></div>
			<div class="infos_gene_input"><select name="id_sous_categorie" id="id_sous_categorie" required="required"><option value="">Sous-Catégorie</option></select></div>
			<div class="infos_gene_input"><select name="id_sous_categorie2" id="id_sous_categorie2" required="required"><option value="">Sous-sous Catégorie</option></select></div>
			<div class="infos_gene_title"><span>Téléphone | Site internet</span></div>
			<div class="infos_gene_input"><input name="telephone_enseigne" id="telephone_enseigne" type="text" placeholder="N° de téléphone" value="<?php if (!empty($_POST['telephone_enseigne'])) {echo $_POST['telephone_enseigne'];}?>"/></div>
			<div class="infos_gene_input"><input name="url" id="url" type="text" placeholder="Lien site internet" value="<?php if (!empty($_POST['url'])) {echo $_POST['url'];}?>"/></div>
			<div class="infos_gene_title"><span>Catégorie de prix</span></div>
			<div class="infos_gene_input_img">
				<div class="infos_gene_input_img_container">
				<?php $selected = " valid_budget";
					foreach ($result as $row) { ?>
					<img title="<?php echo $row['budget_enseigne']; ?>" id_budget="<?php echo $row['id_budget']; ?>" class="budgets<?php echo $selected; ?>" src="<?php echo SITE_URL; ?>/img/pictos_dashboard/icon_sacs_prix.png" />
				<?php if ($row['id_budget'] == $_POST['id_budget']) {$selected ='';} } ?>
				</div>
			</div>
			<?php if ($_POST['id_enseigne'] == 0) { ?>
			<div class="infos_gene_title"><span>Professionnel à relier à cet enseigne</span></div>
			<div class="infos_gene_input">
				<input id="inputSearch" type="text" value="" placeholder="EMAIL DU PROFESSIONNEL"/>
				<input id="inputSearchHidden" type="hidden" value=""/>
				<div class="suggestionsContainer display-none" id="suggestionsContainer"><ul class="suggestionList" id="suggestionList"><li>&nbsp;</li></ul></div>
			</div>
			<?php } ?>
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

	$(".budgets").click(function() {
		var imgnxt = imgprv = $(this);
		while (imgnxt.next('.budgets').length > 0) {
			imgnxt = imgnxt.next('.budgets');
			if (imgnxt.hasClass("valid_budget")) {imgnxt.removeClass('valid_budget');}
		}
		while (imgprv.length > 0) {
			if (!imgprv.hasClass("valid_budget")) {imgprv.addClass('valid_budget');}
			imgprv = imgprv.prev('.budgets');
		}
	});
	
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
	AfficheQuartiers({id_ville:<?php echo $_POST['id_ville']; ?>}, "#id_arrondissement", <?php echo $_POST['id_ville']; ?>, <?php echo $_POST['id_arrondissement']; ?>);
	AfficheQuartiers({id_ville:<?php echo $_POST['id_ville']; ?>, id_arrondissement:<?php echo $_POST['id_arrondissement']; ?>}, "#id_quartier", <?php echo $_POST['id_ville']; ?>, <?php echo $_POST['id_arrondissement']; ?>, <?php echo $_POST['id_quartier']; ?>);
	
	$("#id_ville").change(function () {
		AfficheQuartiers({id_ville:$name("id_ville").value}, "#id_arrondissement");
	});
	$("#id_arrondissement").change(function () {
		AfficheQuartiers({id_ville:$name("id_ville").value, id_arrondissement:$name("id_arrondissement").value}, "#id_quartier");
	});
	
	function Enregistrer () {
		var id_enseigne = '<?php if (!empty($_POST['id_enseigne'])) {echo $_POST['id_enseigne'];} ?>';
		var data = {
						step : 'General',
						id_enseigne : id_enseigne,
						nom_enseigne : $id("nom_enseigne").value,
						adresse1_enseigne : $id("adresse1_enseigne").value,
						cp_enseigne : $id("cp_enseigne").value,
						id_ville : $id("id_ville").value,
						id_sous_categorie2 : $id("id_sous_categorie2").value,
						telephone_enseigne : $id("telephone_enseigne").value,
						url : $id("url").value,
						id_quartier : $id("id_quartier").value,
						id_budget : $(".budgets.valid_budget:last").attr('id_budget')
					};
		if (id_enseigne == 0) {
			if ($id("inputSearchHidden").value == '') {alert('Vous devez choisir un professionnel');return false;}
			data = $.extend({}, data, {id_pro : $id("inputSearchHidden").value});
		}
		console.log(data);
		$.ajax({
			async : false,
			type :"POST",
			url : siteurl+'/includes/requetemodifieenseigne.php',
			data : data,
			success: function(result){
				window.location.assign(siteurl+"/pages/commerce_interface.php?id_enseigne="+result.result);
			},
			error: function(xhr) {console.log(xhr);alert('Erreur '+xhr.responseText);}
		});
		return false;
	}
</script>	
<?php if ($_POST['id_enseigne'] == 0) { ?>
<script>
	////////////////////////////////////////////////////
	// Concerne la recherche du mail du professionnel //
	////////////////////////////////////////////////////
	
	var suggestionsContainer = $("#suggestionsContainer"), inputSearch = $("input#inputSearch"),
		inputSearchHidden = $("input#inputSearchHidden"), suggestionList = $("#suggestionList");

	$(document).click(function(event) {
		if( suggestionsContainer.is(":visible") === true ) {suggestionsContainer.hide();}
	});

	inputSearch.keydown(function (e) {
		var keyCode = e.keyCode || e.which;
		if(keyCode == 13 || keyCode == 38 || keyCode == 40 || keyCode == 27){
			arrowsAction (keyCode, suggestionList, inputSearch, inputSearchHidden);
			return false;
		}
		if(suggestionsContainer.is(":visible") === false) {suggestionsContainer.show();}
		emptyInput(inputSearch, suggestionsContainer4);
	});
	
	inputSearch.keyup(function (e) {
		var keyCode = e.keyCode || e.which;
		if(keyCode != 13 && keyCode != 38 && keyCode != 40 && keyCode != 27){
			timeLoadEmails(suggestionsContainer, inputSearch, inputSearchHidden, suggestionList);
		}
		emptyInput(inputSearch, suggestionsContainer);
	});

</script>
<?php } ?>
