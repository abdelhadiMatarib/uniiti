<?php
        include_once '../../config/configuration.inc.php';
		include_once '../../includes/fonctions.inc.php';
		include_once '../../config/configPDO.inc.php';
		
		if (isset($_POST['id_enseigne'])) {$id_enseigne = $_POST['id_enseigne'];} else {exit;}
		
		$sql = "SELECT * FROM moyenspaiements";
		$req = $bdd->prepare($sql);
		$req->execute();
		$result = $req->fetchAll(PDO::FETCH_ASSOC);
		
		$sqlcheck = "SELECT * FROM enseignes_moyenspaiements WHERE enseignes_id_enseigne=:id_enseigne";
		$reqcheck = $bdd->prepare($sqlcheck);
		$reqcheck->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
		$reqcheck->execute();
		$resultcheck = $reqcheck->fetchAll(PDO::FETCH_ASSOC);
		foreach ($resultcheck as $row) {
			$existe[$row['id_moyenpaiement']] = 1;
		}
		
		$sql2 = "SELECT voiturier FROM enseignes WHERE id_enseigne=:id_enseigne";
		$req2 = $bdd->prepare($sql2);
		$req2->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
		$req2->execute();
		$result2 = $req2->fetch(PDO::FETCH_ASSOC);
		$voiturier = $result2['voiturier'];

		$sql3 = "SELECT * FROM enseignes_horaires WHERE enseignes_id_enseigne=:id_enseigne AND id_type_info=5";
		$req3 = $bdd->prepare($sql3);
		$req3->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
		$req3->execute();		
		$result3 = $req3->fetch(PDO::FETCH_ASSOC);
		if ($result3) {
			$datahoraires = "{Lundi : '" . $result3['lundi'] . "', "
							. "Mardi : '" . $result3['mardi'] . "', "
							. "Mercredi : '" . $result3['mercredi'] . "', "
							. "Jeudi : '" . $result3['jeudi'] . "', "
							. "Vendredi : '" . $result3['vendredi'] . "', "
							. "Samedi : '" . $result3['samedi'] . "', "
							. "Dimanche : '" . $result3['dimanche'] . "'}";
		} else {$datahoraires = '{}';}
?>
<div class="menutarifs_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="menutarifs_head">
        <div class="ident_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_infospratiques.png" title="" alt="" height="37" width="37" />
        </div><span class="maintitle">Infos pratiques</span>
    </div>   
    <div class="infospratiques_body">
        <div class="infospratiques_body_paiements">
            <div class="infospratiques_head">
                <div class="infospratiques_head_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_infospratiques_paiements.png" title="" alt="" height="22" width="22" /></div><span>Paiements acceptés</span>
            </div>
			<?php foreach ($result as $row) {
					$selected = false;
					if (isset($existe[$row['id_moyenpaiement']])) {$selected = true;} ?>
					<div class="menutarifs_body_entrees_prix_generique paiement_generique<?php echo $row['id_moyenpaiement'];?>">
						<img id_paiement="<?php echo $row['id_moyenpaiement'];?>" class="img_container_payment_options img_container_payment_options<?php echo $row['id_moyenpaiement'];?> moyenspaiements<?php if ($selected) {echo " valid_paiement";}?>" title="<?php echo $row['moyenpaiement'];?>"></img>
					</div>

			<?php } ?>
        </div>
        <div class="infospratiques_body_voiturier">
            <div class="infospratiques_head">
                <div class="infospratiques_head_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_infospratiques_voiturier.png" title="" alt="" height="22" width="22" /></div><span>Service de voiturier</span>
            </div>
            <div class="infospratiques_body_voiturier">
                <div class="infospratiques_body_voiturier_inside">
                <input type="button" class="button_voiturier_choix<?php if ($voiturier == 1) {echo " valid";} ?>" value="Oui"/>
                <input type="button" class="button_voiturier_choix<?php if ($voiturier == 2) {echo " valid";} ?>" value="Non"/>
                </div>
            </div>
        </div>
        <div class="infospratiques_body_horaires">
            <div class="infospratiques_head">
                <div class="infospratiques_head_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_infospratiques_horaires.png" title="" alt="" height="22" width="22" /></div><span>Horaires d'ouverture</span>
            </div>

            <div class="infospratiques_horaires premier">
            </div>
            <div class="menutarifs_body_entrees_prix_generique horaires_commerces_ouvert">
                <span>Lundi</span>
            </div>
            <div class="infospratiques_horaires">
            </div>
            <div class="menutarifs_body_entrees_prix_generique horaires_commerces_ouvert">
                <span>Mardi</span>
            </div>
            <div class="infospratiques_horaires">
            </div>
            <div class="menutarifs_body_entrees_prix_generique horaires_commerces_ouvert">
                <span>Mercredi</span>
            </div>
            <div class="infospratiques_horaires">
            </div>
            <div class="menutarifs_body_entrees_prix_generique horaires_commerces_ouvert">
                <span>Jeudi</span>
            </div>
            <div class="infospratiques_horaires">
            </div>
            <div class="menutarifs_body_entrees_prix_generique horaires_commerces_ouvert">
                <span>Vendredi</span>
            </div>
            <div class="infospratiques_horaires">
            </div>
            <div class="menutarifs_body_entrees_prix_generique horaires_commerces_ouvert">
                <span>Samedi</span>
            </div>
            <div class="infospratiques_horaires">
            </div>
            <div class="menutarifs_body_entrees_prix_generique horaires_commerces_ouvert">
                <span>Dimanche</span>
            </div>
        
        </div>
    </div>
	<div class="suggestioncommerce_footer">
		<button onclick="Enregistrer();" class="suggestioncommerce_valider_wrap"><a href="#">Enregistrer</a></button>
	</div>
</div>		
<script>    
    $('.popin_close_button').click(function(e){
		e.preventDefault(); //don't go to default URL
		var defaultdialog = $("#default_dialog").dialog();
		defaultdialog.dialog('close');
    });
    $('.button_voiturier_choix').click(function(e){
		e.preventDefault(); //don't go to default URL
		$('.button_voiturier_choix').removeClass('valid');
		$(this).addClass('valid');
    });
	
	var heuresmatin = ['','00','01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24'];
	var heuresapmidi = ['','00','01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24'];
	var minutes = ['','00','15','30','45'];
	var inithoraires = <?php echo $datahoraires; ?>;
	
	function InitHoraires(div) {
		var id = div.next().find('span').text();
		var html = '<div style="display:none;float:left;" class="ferme">Fermé</div>\n';
		html += '<div class="ouvert">\n';
		html += '<span>De</span>\n';
		for (var i = 1 ; i <= 8 ; i++) {
			html += '<div class="input_infos_horaires">\n';
			html += '<select id="'+id+i+'">\n';
			if (i%2 == 0) {
				for (var j in minutes) {
					html += '<option value="'+minutes[j]+'">'+minutes[j]+'</option>\n';
				}
				html += '</select>\n';
				html += '</div>\n';
				if (i == 4) {html += '<span>et de</span>\n';}
				else if (i != 8) {html += '<span>à</span>\n';}
			} else if (i > 4) {
				for (var j in heuresapmidi) {
					html += '<option value="'+heuresapmidi[j]+'">'+heuresapmidi[j]+'</option>\n';
				}
				html += '</select>\n';
				html += '</div>\n';
				html += '<span>h.</span>\n';				
			} else {
				for (var j in heuresmatin) {
					html += '<option value="'+heuresmatin[j]+'">'+heuresmatin[j]+'</option>\n';
				}
				html += '</select>\n';
				html += '</div>\n';
				html += '<span>h.</span>\n';
			}
		}
		html += '</div>\n';
		if (!div.hasClass('premier')) {html += '<div title="copier la ligne du dessus" class="copier_horaire"><a href="#">copier</a></div>\n';}
		html += '<div title="commerce ouvert ou fermé" class="bouton_infos_modif bouton_commerce_ferme"></div>\n';
		div.html(html);
		var selectionne = new Array();
		if (typeof(inithoraires[id]) != 'undefined') {
			if (inithoraires[id] != "Fermé") {
				var inith = inithoraires[id].replace(/,/g, ':');
				selectionne = inith.split(':');
			} else {selectionne[0] = "Fermé";}
		}
		if (selectionne[0] != "Fermé") {
			for (var i = 1 ; i <= 8 ; i++) {
				$('#'+id+i).val(selectionne[i-1]);
			}
		} else {
			div.find('.bouton_infos_modif').removeClass('bouton_commerce_ferme');
			div.find('.bouton_infos_modif').addClass('bouton_commerce_ouvert');
			div.find('.ferme').show();
			div.find('.ouvert').hide();
			div.next(':first').removeClass('horaires_commerces_ouvert');
			div.next(':first').addClass('horaires_commerces_ferme');
		}
	}
	
	$('.infospratiques_horaires').each(function() {InitHoraires($(this));});
	
    $('.copier_horaire').click(function(e){
		e.preventDefault(); //don't go to default URL
		var parent = $(this).parent();
		var prev = parent.prev().prev();
		var selected = new Array(), compteur = 0;
		prev.find('.input_infos_horaires').each(function() {
			var select = $(this).find('select');
			var id = select.attr('id');
			var num = Math.floor(id.substring(id.length-1, id.length));
			selected[num] = select.val();
		});
		parent.find('.input_infos_horaires').each(function() {
			var select = $(this).find('select');
			var id = select.attr('id');
			var num = Math.floor(id.substring(id.length-1, id.length));
			select.val(selected[num]);
		});
    });	
	
	function moveToNext(field,nextFieldID){if(field.value.length >= field.maxLength){document.getElementById(nextFieldID).focus();}}

	$('.bouton_infos_modif').click(function(){
		if ($(this).hasClass('bouton_commerce_ferme')){
			$(this).removeClass('bouton_commerce_ferme');
			$(this).addClass('bouton_commerce_ouvert');
			$(this).parent().find('.ferme').show();
			$(this).parent().find('.ouvert').hide();
			$(this).parent().next(':first').removeClass('horaires_commerces_ouvert');
			$(this).parent().next(':first').addClass('horaires_commerces_ferme');
		}
		else if ($(this).hasClass('bouton_commerce_ouvert')){
			$(this).removeClass('bouton_commerce_ouvert');
			$(this).addClass('bouton_commerce_ferme');
			$(this).parent().find('.ferme').hide();
			$(this).parent().find('.ouvert').show();
			$(this).parent().next(':first').removeClass('horaires_commerces_ferme');
			$(this).parent().next(':first').addClass('horaires_commerces_ouvert');
		}
	});	
	
	
	$(".moyenspaiements").click(function(e) {
		e.preventDefault(); //don't go to default URL
		e.stopPropagation();
		if ($(this).hasClass("valid_paiement")) {$(this).removeClass('valid_paiement');}
		else {$(this).addClass('valid_paiement');}
	});
	
	function Enregistrer () {
		var id_enseigne = '<?php if (!empty($_POST['id_enseigne'])) {echo $_POST['id_enseigne'];} ?>';
		
		var datahoraires = {
						step : 'Horaires',
						id_enseigne : id_enseigne
					};

		var msg = false, unhorairenonnul = false;			
		$('.infospratiques_horaires').each(function() {
		var id = $(this).next().find('span').text();
		var ouvert = $(this).find('.ouvert');
			if (ouvert.css('display') != 'none') {
				var attribut = '';
				for (var i = 1 ; i <= 8 ; i++) {
					if (i%2 == 0) {attribut += ':'+$('#'+id+i).val();if (i!=8) {attribut += ',';}}
					else {attribut += $('#'+id+i).val();}
				}
				if ((attribut.length != 23) && (attribut != ':,:,:,:')) {alert("\tVous n'avez pas sélectionné\ntoutes les informations du "+id+".\n\nEnregistrement interrompu.");return false;}
				if (attribut == ':,:,:,:') {attribut = '';if (!msg) {msg = id;} else {msg += '\n'+id;}}
				else {unhorairenonnul = true;}
				var chaine = '{"'+id+'" : "'+attribut+'"}';
				var json = $.parseJSON(chaine);
				datahoraires = $.extend({}, datahoraires, json);
			} else {
				var chaine = '{"'+id+'" : "Fermé"}';
				var json = $.parseJSON(chaine);
				datahoraires = $.extend({}, datahoraires, json);			
			}
		});
		
		if (msg) {msg = "Vous n'avez entré aucune information\npour les jours suivants :\n"+msg+"\n\nAucune information ne sera stockée\npour ces jours.";alert(msg);}
		console.log(datahoraires);
		if (unhorairenonnul) {
			$.ajax({
				async : false,
				type :"POST",
				data : datahoraires,
				url : siteurl+'/includes/requetemodifieenseigne.php',
				success: function(result){
				},
				error: function(xhr) {console.log(xhr);alert('Erreur '+xhr.responseText);}
			});
		}
		
		var voiturier = 0;
		if ($('.button_voiturier_choix.valid').length > 0) {
			voiturier = $('.button_voiturier_choix.valid').val();
			if (voiturier == 'Oui') {voiturier = 1}
			if (voiturier == 'Non') {voiturier = 2}			
		}	
		$.ajax({
			async : false,
			type :"POST",
			data : {step : 'Voiturier', id_enseigne : id_enseigne, voiturier : voiturier},
			url : siteurl+'/includes/requetemodifieenseigne.php',
			success: function(result){
			},
			error: function(xhr) {console.log(xhr);alert('Erreur '+xhr.responseText);}
		});	
	
		var compteur = 1, comptepaiement = 1;
		var paiement = new Array();
		$(".moyenspaiements").each(function () {
			paiement[compteur++] = '';
			if ($(this).hasClass("valid_paiement")) {paiement[comptepaiement++] = $(this).attr('id_paiement');}
		});
	
		var datapaiements = {
						step : 'MoyensPaiements',
						id_enseigne : id_enseigne,
						paiement1 :paiement[1],
						paiement2 :paiement[2],
						paiement3 :paiement[3],
						paiement4 :paiement[4],
						paiement5 :paiement[5]
					};
		$.ajax({
			async : false,
			type :"POST",
			url : siteurl+'/includes/requetemodifieenseigne.php',
			data : datapaiements,
			success: function(result){
				$('.popin_close_button').click();
//				window.location.assign(siteurl+"/pages/commerce_interface.php?id_enseigne="+result.result);
			},
			error: function(xhr) {console.log(xhr);alert('Erreur '+xhr.responseText);}
		});
		return false;
	}

</script>
