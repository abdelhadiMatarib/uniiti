<?php
        include_once '../../config/configuration.inc.php';
		include_once '../../acces/auth.inc.php';
		if(isset($_SESSION['SESS_MEMBER_ID'])) {
				$id_contributeurActif = $_SESSION['SESS_MEMBER_ID'];
		}
		else {exit;}
?>

<div class="suggestionobjet_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="suggestionobjet_head">
        <div class="suggestionobjet_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/sugg_objet_icon.png" title="" alt="" height="44" width="37" />
        </div><span class="maintitle">Suggérer un objet</span>
    </div>
	<form onsubmit="return VerifieEtErg();" action="<?php echo SITE_URL; ?>/includes/popins/suggestion_objet_valide.tpl.php" method="post" autocomplete="off">	
		<div class="suggestionobjet_body">
				<input name="id_contributeur" type="hidden" value="<?php echo $id_contributeurActif; ?>"/>
				<input name="type_suggestion" type="hidden" value="objet"/>				
				<input name="nom_suggestion" type="text" class="suggestionobjet_nom" placeholder="Nom de l'objet" required="required"/>
				<select name="id_categorie" id="id_categorie" class="suggestionobjet_categorie" required="required"><option value="">Catégorie</option><option value="">------------</option></select>
				<select name="id_sous_categorie" id="id_sous_categorie" class="suggestionobjet_souscategorie" required="required"><option value="">Sous-catégorie</option><option value="">------------</option></select>
				<textarea name="description" id="description" class="suggestionobjet_description" placeholder="Description de l'objet (140 caractères max.)"></textarea>
				<input name="id_statut" type="hidden" value="1"/>				
		</div>
		<div class="suggestionobjet_footer">
			
			<button class="suggestionobjet_valider_wrap"><a href="#">Suggérer cet objet</a></button>
			
		</div>
</div>
</html>
<script>

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
					html = $(idselect).html();
					for (var k in result) {html += '<option value=\"'+result[k].id_categorie+'\">'+result[k].categorie_principale+'</option>';}
				} else {
					html = '';
					for (var k in result) {html += '<option value=\"'+result[k].id_sous_categorie+'\">'+result[k].sous_categorie+'</option>';}
				}
				$(idselect).html(html);
			},
			error: function() {alert('Erreur sur url : ' + url);}
		});
	}
	AfficheCategories({}, "#id_categorie");
	$("#id_categorie").change(function () {
		AfficheCategories({id_categorie:$name("id_categorie").value}, "#id_sous_categorie");
	});


	// getElementByName
	function $name(name) {return document.getElementsByName(name)[0];}
	
	function VerifieEtErg() {
		var data = {
		        'id_contributeur' : $name("id_contributeur").value,
		        'type_suggestion' : $name("type_suggestion").value,
				'nom_suggestion' : $name("nom_suggestion").value,
				'id_categorie' : $name("id_categorie").value,
				'id_sous_categorie' : $name("id_sous_categorie").value,
				'description' :  $("#description").val(),
				'id_statut' : $name("id_statut").value,
		};
		ActualisePopin(data, '/includes/popins/suggestion_objet_valide.tpl.php', 'default_dialog');
		return false; // si false l action du form ne sera pas appelée
	};	


</script>