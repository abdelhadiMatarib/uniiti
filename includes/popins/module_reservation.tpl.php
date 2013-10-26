<?php
        include_once '../../config/configuration.inc.php';
        include'../head.php';
?>
<div class="ident_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="ident_head">
        <div class="ident_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_module_resa.png" title="" alt="" height="34" width="35" />
        </div><span class="maintitle">Réservation - RDV en ligne</span>
    </div>
    <div class="module_reservation_body">
        <div class="module_reservation_left">
            <div class="module_reservation_left_head1">
                <span>Souhaitez-vous activer ce module</span>
            </div>
            <div class="module_reservation_left_head1_oui<?php if ($_POST['reservation']) {echo " valid_oui";} ?>">
                <a href="#" title="">OUI</a>
            </div>
            <div class="module_reservation_left_head1_non<?php if (!$_POST['reservation']) {echo " valid_non";} ?>">
                <a href="#" title="">NON</a>
            </div>
            <div class="module_reservation_left_head2">
                <span>Veuillez sélectionner une option</span>
            </div>
            <div class="module_reservation_left_head2_rdv<?php if ($_POST['reservation'] == 1) {echo " valid_rdv";} ?>">
                <a href="#" title="">Prise de RDV</a>
            </div>
            <div class="module_reservation_left_head2_reservation<?php if ($_POST['reservation'] == 2) {echo " valid_renligne";} ?>">
                <a href="#" title="">Réservation en ligne</a>
            </div>
        </div>
        <div class="module_reservation_right">
            
            <div class="module_reservation_right_head1">
                <span>Comment voulez-vous être informé ?</span>
            </div>
            <div class="module_reservation_right_content">
                <form>
<!--                    <div class="input_resa_float"><input type="radio" <?php if (($_POST['reservation']) && ($_POST['prevenir_reservation'] == 0)) {echo "checked='checked'";} ?> id="resa_infos_affichage" name="module_resa_radio_choice"/><label for="resa_infos_affichage"><span>Affichage sur ma page commerce Uniiti.com</span></label></div>  -->
                    
                    <div class="input_resa_float"><input type="radio" <?php if (($_POST['reservation']) && ($_POST['prevenir_reservation'] == 1)) {echo "checked='checked'";} ?> id="resa_infos_notifs_mail" name="module_resa_radio_choice"/><label for="resa_infos_notifs_mail" class="infos_resa_espacement"><span>Notification par email</span><span>Merci d'indiquer votre email</span></label></div>
                    <input type="text" id="resa_get_notifs_mail" value="<?php if (!empty($_POST['email_reservation'])) {echo $_POST['email_reservation'];} ?>" placeholder="Votre email"/>
                    
                    <div class="input_resa_float"><input type="radio" <?php if (($_POST['reservation']) && ($_POST['prevenir_reservation'] == 2)) {echo "checked='checked'";} ?> id="resa_infos_notifs_sms" name="module_resa_radio_choice"/><label for="resa_infos_notifs_sms" class="infos_resa_espacement"><span>Notification par sms</span><span>Merci d'indiquer votre numéro de téléphone</span></label></div>
                    <input type="text" id="resa_get_notifs_sms" value="<?php if (!empty($_POST['telephone_reservation'])) {echo $_POST['telephone_reservation'];} ?>" placeholder="Votre numéro de téléphone"/>
                
                </form>
            </div>
            
        </div>
            
    </div>
    <div class="suggestioncommerce_footer">
        
        <div onclick="Enregistrer();" class="suggestioncommerce_valider_wrap"><a href="#">Enregistrer</a></div>
        
    </div>
</div>
<script>
	// getElementById
	function $id(id) {return document.getElementById(id);}
			
	$('.module_reservation_left_head1_oui').click(function () {
		if (!$(this).hasClass('valid_oui')) {
			$(this).addClass('valid_oui');
			$('.module_reservation_left_head1_non').removeClass('valid_non');
			$('.module_reservation_left_head2_rdv').addClass('valid_rdv');
			$id('resa_infos_notifs_mail').checked = true;
		}
	});
	$('.module_reservation_left_head1_non').click(function () {
		if (!$(this).hasClass('valid_non')) {
			$(this).addClass('valid_non');
			$('.module_reservation_left_head1_oui').removeClass('valid_oui');
			$('.module_reservation_left_head2_reservation').removeClass('valid_renligne');
			$('.module_reservation_left_head2_rdv').removeClass('valid_rdv');
			$id('resa_infos_notifs_mail').checked = $id('resa_infos_notifs_sms').checked = false;
		}
	});
	$('.module_reservation_left_head2_rdv').click(function () {
		if (($('.module_reservation_left_head1_oui').hasClass('valid_oui')) && (!$(this).hasClass('valid_rdv'))) {
			$(this).addClass('valid_rdv');
			$('.module_reservation_left_head2_reservation').removeClass('valid_renligne');
		}
	});
	$('.module_reservation_left_head2_reservation').click(function () {
		if (($('.module_reservation_left_head1_oui').hasClass('valid_oui')) && (!$(this).hasClass('valid_renligne'))) {
			$(this).addClass('valid_renligne');
			$('.module_reservation_left_head2_rdv').removeClass('valid_rdv');
		}
	});
	
	function Enregistrer () {
		var reservation, prevenir_reservation = 0;
		if ($('.module_reservation_left_head1_non').hasClass('valid_non')) {reservation = 0;}
		else if ($('.module_reservation_left_head2_rdv').hasClass('valid_rdv')) {reservation = 1;}
		else {reservation = 2;}
		
		if ($id('resa_infos_notifs_mail').checked) {prevenir_reservation = 1;}
		else if ($id('resa_infos_notifs_sms').checked) {prevenir_reservation = 2;}
		else {prevenir_reservation = 0;};

		var datareservations = {
						step : 'Reservations',
						id_enseigne : '<?php if (!empty($_POST['id_enseigne'])) {echo $_POST['id_enseigne'];} ?>',
						reservation : reservation,
						prevenir_reservation : prevenir_reservation,
						email_reservation : ''+$('#resa_get_notifs_mail').val()+'',
						telephone_reservation : ''+$('#resa_get_notifs_sms').val()+''
					};
		console.log(datareservations);
		$.ajax({
			async : false,
			type :"POST",
			url : siteurl+'/includes/requetemodifieenseigne.php',
			data : datareservations,
			success: function(result){
				window.location.assign(siteurl+"/pages/commerce_interface.php?id_enseigne="+result.result);
			},
			error: function(xhr) {console.log(xhr);alert('Erreur '+xhr.responseText);}
		});
	}
</script>




























