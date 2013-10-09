<?php
        include_once '../../config/configuration.inc.php';
?>

<div class="suggestioncommerce_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="suggestioncommerce_head">
        <div class="suggestioncommerce_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_ajout_liencommerce.png" title="" alt="" height="33" width="33" />
        </div><span class="maintitle">Ajout de commerce à mon réseau</span>
    </div>   
    <div class="suggestioncommerce_body">
            
        <div class="ajout_liencommerce_infos_txt">Rechercher le commerce que vous voulez ajouter :</div>
		<div class="suppression_commerce_wrap">
		<input id="inputSearch3" class="ajout_liencommerce_input_centered" style="font-size:1.2em;font-weight:300;width:490px;" type="text" value="" placeholder="Nom du commerce"/>
		<input id="inputSearch3Hidden" type="hidden" value=""/>
		<div class="suggestionsContainer display-none" style="top:0px !important;margin-left:7px;" id="suggestionsContainer3"><ul class="suggestionList" id="suggestionList3"><li>&nbsp;</li></ul></div>
        </div>
        <div class="ajout_liencommerce_infos_txt">
            <span>Le commerce n'est pas présent sur Uniiti.com ? </span><span><a onclick="OuvrePopin({}, '/includes/popins/suggestion_commerce.tpl.php', 'default_dialog');" href="#" title="">Suggérez-le</a> et nous vous tiendrons informé de son inscription</span>
        </div>
    </div>
    <div class="suggestioncommerce_footer">
        <div onclick="Valider()" class="suggestioncommerce_valider_wrap"><a href="#">Valider</a></div>
    </div>
</div>
<script>

	function Valider() {

		data = {
			check : 0,
			id_enseigne1 : '<?php if (!empty($_POST['id_enseigne'])) {echo $_POST['id_enseigne'];} ?>',
			id_enseigne2 : ''+inputSearch3Hidden.val()+'',
			id_statut : 1
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
					ActualisePopin({}, '/includes/popins/ajout_liencommerce_valide.tpl.php', 'default_dialog');				
			},
			error: function(xhr) {console.log(xhr);alert('Erreur '+xhr.responseText);}
		});
	}

	var suggestionsContainer3 = $("#suggestionsContainer3"), inputSearch3 = $("input#inputSearch3"),
		inputSearch3Hidden = $("input#inputSearch3Hidden"), suggestionList3 = $("#suggestionList3");

	document.selectSuggestion  = function (NumAction, keyCode , suggestionListLenght, suggestionList, inputSearch, inputSearchHidden) {
		var suggestionListLi = suggestionList.children();
		switch (keyCode) {
			case 38:
				clickSuggestion -= 1;
				if (clickSuggestion < 0) {clickSuggestion = 0;}
				break;
			case 40:
				clickSuggestion += 1;
				if (clickSuggestion > suggestionListLenght) {clickSuggestion = suggestionListLenght;}
				break;
			case 13:
				if ((NumAction == 1) || (NumAction == 2)) {$('#ButtonFiltre').trigger('click');}
				else if (NumAction == 3) {$('#ButtonModifierCommerce').trigger('click');}
				break;
			case 27:
				clickSuggestion = -1;
				$("div#suggestionsContainer"+NumAction).addClass("display-none");
				break;
		}

		if(keyCode == 38 || keyCode == 40) {
			suggestionListLi
				.removeClass("active")
				.eq(clickSuggestion).addClass("active");
			inputSearchHidden.val(suggestionListLi.eq(clickSuggestion).html());
			inputSearch.val(suggestionListLi.eq(clickSuggestion).text());
		} else {clickSuggestion = -1;}
	}
	
	$('.suggestionList').click(function(event) {
		if( suggestionsContainer3.is(":visible") === true ) {suggestionsContainer3.hide();}
	});

	function arrowsAction (NumAction, keyCode, suggestionList, inputSearch, inputSearchHidden) {
		var suggestionListLenght = suggestionList.children().size() - 1;
		document.selectSuggestion (NumAction, keyCode , suggestionListLenght, suggestionList, inputSearch, inputSearchHidden);
		return false;
	}

	inputSearch3.keydown(function (e) {
		var keyCode = e.keyCode || e.which;
		if(keyCode == 13 || keyCode == 38 || keyCode == 40 || keyCode == 27){
			arrowsAction (keyCode, suggestionList3, inputSearch3, inputSearch3Hidden);
			return false;
		}
		if(suggestionsContainer3.is(":visible") === false) {suggestionsContainer3.show();}
		emptyInput(inputSearch3, suggestionsContainer3);
	});
	
	inputSearch3.keyup(function (e) {
		var keyCode = e.keyCode || e.which;
		if(keyCode != 13 && keyCode != 38 && keyCode != 40 && keyCode != 27){
			timeLoadEnseigneOuObjet('enseigne', suggestionsContainer3, inputSearch3, inputSearch3Hidden, suggestionList3);
		}
		emptyInput(inputSearch3, suggestionsContainer3);
	});

	function emptyInput(inputSearch, suggestionsContainer){
		if (jQuery.trim(inputSearch.val()) == "") {suggestionsContainer.addClass("display-none");}
		else {suggestionsContainer.removeClass("display-none");}
	}

var lastRequestI, lastRequestT;

function callbackObjetOuEnseigne (suggestionsContainer, inputSearch, inputSearchHidden, suggestionList) {
	return function (listData) {
		suggestionsContainer.removeClass("display-none");
		var toSend = '';
		for (k in listData) {toSend += '<li id="'+listData[k].id+'">'+listData[k].nom+'</li>';}
		suggestionList.html(toSend);
		suggestionList.children().on("mouseenter" , function(){
			suggestionList.children().removeClass("active");
			$(this).addClass("active");
		}).on("click" , function() {
			inputSearchHidden.val($(this).attr('id'));
			inputSearch.val($(this).text());
			suggestionsContainer.addClass("display-none");
		});
	};
}

function loadEnseigneOuObjet(search, suggestionsContainer, inputSearch, inputSearchHidden, suggestionList){
	query = inputSearch.val();
	query = query.toLowerCase();

	if(query.length == 0){return;}

	query = encodeURIComponent(query);
	res = $.getJSON(siteurl+'/includes/requetechercheobjetouenseigne.php?key='+query+'&search='+search, callbackObjetOuEnseigne(suggestionsContainer, inputSearch, inputSearchHidden, suggestionList));
	console.log(res);
}

function timeLoadEnseigneOuObjet(search, suggestionsContainer, inputSearch, inputSearchHidden, suggestionList){
	if(lastRequestI){clearTimeout(lastRequestI);}
	lastRequestI = setTimeout(function () {loadEnseigneOuObjet(search, suggestionsContainer, inputSearch, inputSearchHidden, suggestionList)}, 100);
}

</script>