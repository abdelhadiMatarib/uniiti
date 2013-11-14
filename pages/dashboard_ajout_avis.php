<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<?php 
	include_once '../acces/auth.inc.php';                 // Gestion accès à la page - incluant la session
	require_once('../acces/droits.inc.php'); 					// Liste de définition des ACL	
	include_once '../config/configuration.inc.php';
	include'../includes/head.php';
	include_once '../includes/fonctions.inc.php';
	include_once '../config/configPDO.inc.php';

	if ((isset($_SESSION['SESS_MEMBER_ID'])) && ((int)$_SESSION['droits'] & ADMINISTRATEUR)) {$Connecte = true;}
	else {echo "vous ne pouvez pas accéder à cette page sans être connecté!\n<a href=\"" . SITE_URL . "\">Revenir à la page principale</a>"; exit;}
?>

    <body>
        <div class="bg_dashboard">
        <div id="default_dialog"></div>
        <div id="default_dialog_large"></div>
		<div id="dialog_confirmation" title="Merci de vérifier les informations suivantes :">
			<div class="confirmation_wrapper">
				<div class="confirmation_head">
					<div class="suggestioncommerce_img_container">
						<img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_suggestions.png" title="" alt="" height="39" width="39" />
					</div><span class="maintitle">Merci de vérifier ces informations</span>
				</div>
				<div class="confirmation_body">
				<BR/><span><b>Commerce : </b></span><span id="CommerceDonne"></span><BR/><BR/>
				<span><b>Contributeur : </b></span><span id="ContributeurDonne"></span><BR/><BR/>
				<span><b>Note : </b></span><span id="NoteDonnee"></span><BR/><BR/>
				<span><b>Commentaire : </b></span><span id="CommentaireDonne"></span><BR/><BR/>
				</div>
				<div class="confirmation_footer">
					<span>Confirmez-vous ces informations ?</span>
					<div class="presentation_action_left_avis_utile_reponse_wrap">
						<a id="Confirmation" href="#" title="">OUI</a><a id="Infirmation" href="#" title="">NON</a>
					</div>
				</div>
			</div>
		</div>
        <div id="dialog_overlay">
        <div class="index_overlay"></div>
            <div class="dialog_overlay_wrap_content">
                    <div class="dialog_footer_loader">
                            <img src="<?php echo SITE_URL; ?>/img/pictos_actions/gif_uniiti.gif" height="70" width="70"/>
                    </div>
            </div>
        </div>
        <?php include'../includes/header.php'; ?>
        <div class="biggymarginer">
            <div class="big_wrapper" id="test">

            </div>
        <!-- FIN BIG WRAPPER -->
        <!-- CONTENU PRINCIPAL -->
        <div class="dashboard_wrap"><!-- DASH WRAP -->
            <div class="dashboard_cube_ariane">
                <div class="dashboard_cube_item dashboard_cube_item_haut item dashboard_cube_item_c"><a href="#" title=""><span>Ajouter</span><span class="dashboard_txt_bold">des avis</span></a></div>
            </div>
            <div class="dashboard_ombre_small"><img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/ombre_cube_small.png"/></div>
            <div class="dashboard_retour_wrapper"><a href="javascript:history.back()">Retour</a>|<a href="dashboard_index.php">ACCUEIL</a></div>
            <div class="dashboard_content form_content">
                <h2>Saisir un avis</h2>
                    <div class="dashboard_form_wrap">
                        <form id="FormEnregistrerAvis" onsubmit="return OuvreConfirmation();" action="<?php echo SITE_URL; ?>/includes/requeteenregistreavis.php" method="post" autocomplete="off">
                            <div class="dashboard_form_txt">
                                <span class="dashboard_form_avis_commerce"><label for="dashboard_form_avis_commerce">Commerce</label></span>
                                <a href="commerce_interface.php?id_enseigne=0" class="dashboard_form_input_submit"> | Créer un nouveau commerce</a>
								<input id="inputSearch3" class="input_dashboard_large" type="text" value="" placeholder="NOM DU COMMERCE"/>
								<input id="inputSearch3Hidden" type="hidden" value=""/>
								<div class="suggestionsContainer display-none" id="suggestionsContainer3"><ul class="suggestionList" id="suggestionList3"><li>&nbsp;</li></ul></div>
                            </div>
							<div class="clearfix"></div>
                            <div class="dashboard_form_txt">
                                <span class="dashboard_form_avis_commerce"><label for="dashboard_form_avis_commerce">E-mail du contributeur</label></span>
                                <a href="utilisateur_interface.php?id_contributeur=0" class="dashboard_form_input_submit"> | Créer un nouveau contributeur</a>
								<input id="inputSearch4" class="input_dashboard_large" type="text" value="" placeholder="EMAIL DU CONTRIBUTEUR"/>
								<input id="inputSearch4Hidden" type="hidden" value=""/>
								<div class="suggestionsContainer display-none" id="suggestionsContainer4"><ul class="suggestionList" id="suggestionList4"><li>&nbsp;</li></ul></div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="dashboard_form_txt">
                                <span class="dashboard_form_avis_note"><label for="dashboard_form_avis_note">Note</label></span>
                            </div>
                            <div class="dashboard_form_input_note">
									<div id="Note" class="rating"></div>
                            </div>							
                            <div class="clearfix"></div>
                            <div class="dashboard_form_txt">
                                <span class="dashboard_form_avis_commentaire"><label for="dashboard_form_avis_commentaire">Commentaire</label></span>
                            </div>
                            <div class="dashboard_form_input">
                                <textarea id="dashboard_form_avis_commentaire"></textarea>
                            </div>

                            <div class="clearfix"></div>
<!--                            
							<div class="dashboard_form_txt">
                                <span class="dashboard_form_avis_nom"><label for="dashboard_form_avis_nom">Nom</label></span>
                            </div>
                            <div class="dashboard_form_input_right">
                                <input type="text" id="dashboard_form_avis_nom"/>
                            </div>
                            <div class="clearfix"></div>
                            <div class="dashboard_form_txt">
                                <span class="dashboard_form_avis_prenom"><label for="dashboard_form_avis_prenom">Prénom</label></span>
                            </div>
                            <div class="dashboard_form_input_right">
                                <input type="text" id="dashboard_form_avis_prenom"/>
                            </div>
                            <div class="clearfix"></div>
                            
                            <div class="dashboard_form_txt">
                                <span class="dashboard_form_avis_ddn"><label for="dashboard_form_avis_ddn">Date de naissance</label></span>
                            </div>
                            <div class="dashboard_form_input_right">
                                <input type="text" class="dashboard_form_avis_ddn_dd" id="dashboard_form_avis_ddn" maxlength=2 onkeyup="moveToNext(this,'mm')"/>
                                <input type="text" class="dashboard_form_avis_ddn_mm" id="mm" maxlength=2 onkeyup="moveToNext(this,'yyyy')"/>
                                <input type="text" class="dashboard_form_avis_ddn_yyyy" id="yyyy" maxlength=4 />
                            </div>
                           
                            <div class="clearfix"></div>
                            
                            <div class="dashboard_form_txt">
                                <span class="dashboard_form_avis_email"><label for="dashboard_form_avis_email">Email</label></span>
                            </div>
                            <div class="dashboard_form_input_right">
                                <input type="text" id="dashboard_form_avis_email"/>
                            </div>
                            <div class="clearfix"></div>
                            <div class="dashboard_form_txt">
                                <span class="dashboard_form_avis_tel"><label for="dashboard_form_avis_tel">N° Tél.</label></span>
                            </div>
                            <div class="dashboard_form_input_right">
                                <input type="text" id="dashboard_form_avis_tel"/>
                            </div>
                            <div class="clearfix"></div>
                            <div class="dashboard_form_txt">
                                <span class="dashboard_form_avis_invitations"><label for="dashboard_form_avis_invitations">Invitations</label></span>
                            </div>
                            <div class="dashboard_form_input dashboard_form_input_radio">
                                <input type="radio" name="dashboard_invitation_choix" id="dashboard_form_avis_invitations" value="Oui"/><span><label for="dashboard_form_avis_invitations">Oui</label></span>
                                <input type="radio" name="dashboard_invitation_choix" id="dashboard_form_avis_invitations_non" value="Non"/><span><label for="dashboard_form_avis_invitations_non">Non</label></span>
                            </div>
                            <div class="dashboard_form_txt">
                                <span class="dashboard_form_avis_frequence"><label for="dashboard_form_avis_frequence">Fréquence</label></span>
                            </div>
                            <div class="dashboard_form_input">
                                <div id="dashboard_form_avis_frequence">
                                    <select>
                                        <option>1x / mois</option>
                                        <option>2x / mois</option>
                                        <option>3x+ / mois</option>
                                    </select>
                                </div>
                            </div>
-->
                            <div class="dashboard_form_input_submit_wrap">
                                <input type="submit" class="dashboard_form_input_submit" value="Enregistrer" />
                            </div>
                        </form>
                    </div>
            </div>
        </div><!-- FIN DASH WRAP -->
        <!-- FIN CONTENU PRINCIPAL -->
        </div><!-- FIN BIGGY -->
        <?php include'../includes/js.php' ?>
        </div>
		
<style>
.rating {margin-left:20px;cursor: pointer;display: block;}
.rating:after {content: '.';display: block;height: 0;width: 0;clear: both;visibility: hidden;}
.cancel, .star {float: left;width: 19px;height: 19px;overflow: hidden;text-indent: -999em;cursor: pointer;}
.cancel {margin-right:10px;}
.star-left {margin-left:0px;}
.star-left, .star-right {width: 9.5px;}

.cancel, .cancel a, .star, .star a {background: url(<?php echo SITE_URL; ?>/img/pictos_commerces/sprite.png) no-repeat 0 -152px;}
.star-left, .star-left a {background: url(<?php echo SITE_URL; ?>/img/pictos_commerces/sprite.png) no-repeat 0px -152px;}
.star-right, .star-right a {background: url(<?php echo SITE_URL; ?>/img/pictos_commerces/sprite.png) no-repeat -9.5px -152px;}

.cancel a {display: block;width: 100%;height: 100%;}
.star.star-left a {display: block;width: 100%;height: 100%;background-position: 0 -152px;}
.star.star-right a {display: block;width: 100%;height: 100%;background-position: -9.5px -152px;}

div.rating div.star-left.on a {background-position: 0 -76px;}
div.rating div.star-left.hover a, div.rating div.star-left a:hover {background-position: 0 -76px;}
div.rating div.star-right.on a {background-position: -9.5px -76px;}
div.rating div.star-right.hover a, div.rating div.star-right a:hover {background-position: -9.5px -76px;}


</style>
		
		
<script>
	function moveToNext(field,nextFieldID){
		if(field.value.length >= field.maxLength){document.getElementById(nextFieldID).focus();}
	}

	$('#Note').rating('dashboard_ajout_avis.php', {cancel:true,maxvalue:5,increment:0.5,curvalue:4.5});
	
	function OuvreConfirmation() {
		if ($('.star.on:last a').length > 0) {note = $('.star.on:last a').attr('href').split('#')[1];}
		else {note = 0;}
		$('#CommerceDonne').html($('#inputSearch3').val()+', identifiant : '+$('#inputSearch3Hidden').val());
		$('#ContributeurDonne').html($('#inputSearch4').val()+', identifiant : '+$('#inputSearch4Hidden').val());
		$('#NoteDonnee').html(note);
		$('#CommentaireDonne').html($('#dashboard_form_avis_commentaire').val());
		$("#dialog_confirmation").dialog('open');
		return false;
	}

	$('#Confirmation').click(function () {
		if ($('.star.on:last a').length > 0) {note = $('.star.on:last a').attr('href').split('#')[1];}
		else {note = 0;}
		VerifieEtErg(note);
	});
	
	$('#Infirmation').click(function () {
		$("#dialog_confirmation").dialog('close');
	});
	
	function VerifieEtErg(note) {
		if ($('#inputSearch4Hidden').val() == '') {alert("Merci de choisir un contributeur dans la liste");$("#dialog_confirmation").dialog('close');return false;}
		if ($('#inputSearch3Hidden').val() == '') {alert("Merci de choisir une enseigne dans la liste");$("#dialog_confirmation").dialog('close');return false;}
		var data = {
						id_contributeur : ''+$('#inputSearch4Hidden').val()+'',
						id_enseigne : ''+$('#inputSearch3Hidden').val()+'',
						avis : ''+$('#dashboard_form_avis_commentaire').val()+'',
						note : ''+note+''
					};
					console.log(data);
		$.ajax({
			async : false,
			type :"POST",
			url : siteurl+'/includes/requeteenregistreavis.php',
			data : data,
			success: function(result){
				if (result.result == -1) {
					$("#dialog_confirmation").dialog('close');
					alert("Enregistrement de cet avis impossible car ce contributeur a déjà donné son avis sur cette enseigne !");						
				}
				else {
					$("#dialog_confirmation").dialog('close');
					alert("Nouvel avis enregistré sous le n°"+result.result);				
				}

			},
			error: function(xhr) {console.log(xhr);alert('Erreur '+xhr.responseText);}
		});
		return false;
	}	
	
</script>

    </body>
</html>
