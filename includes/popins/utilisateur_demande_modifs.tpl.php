<?php
	include_once '../../config/configuration.inc.php';
	include_once '../fonctions.inc.php';
	include_once '../../acces/auth.inc.php';                 // gestion accès à la page - incluant la session

if (empty($_POST['id_enseigne'])) {echo "vous ne pouvez pas accéder directement à cette page !\n<a href=\"" . SITE_URL . "\">Revenir à la page principale</a>"; exit;}
		
?>

<div class="suggestioncommerce_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="suggestioncommerce_head">
        <div class="suggestioncommerce_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_modifs.png" title="" alt="" height="33" width="33" />
        </div>
		<span class="maintitle">Modification de vos données</span>
    </div>   
    <div class="suggestioncommerce_body">
        <div class="ajout_liencommerce_infos_txt">Pour modifier vos données, merci de contacter l'équipe Uniiti ci-dessous :</div>
        <textarea id="demande_modifs" class="demande_modifs_input_centered" placeholder="Votre demande de modification. Veuillez écrire ici les modifications que vous souhaitez apporter à votre page."></textarea>
    </div>
    <div class="suggestioncommerce_footer">
        <div onclick="Notifier();" class="suggestioncommerce_valider_wrap"><a href="#">Soumettre les modifications</a></div>
    </div>
</div>
<script>

function Notifier() {

	var data = {
					id_contributeur : '<?php echo $_SESSION['SESS_MEMBER_ID'];?>',
					id_enseigne_ou_objet : '<?php echo $_POST['id_enseigne'];?>',
					id_avis : '0',
					type_notification : 'enseigne',
					id_action : 1,
					description : ''+$('#demande_modifs').val()+'',
				};
				console.log(data);
	$.ajax({
		async : false,
		type :"POST",
		url : siteurl+'/includes/requeteenregistrenotification.php',
		data : data,
		success: function(result){
			ActualisePopin({id_contributeur:result.result}, '/includes/popins/utilisateur_demande_modifs_valide.tpl.php', 'default_dialog');
		},
		error: function() {alert('Erreur sur url : ' + siteurl+'/includes/requeteenregistreavis.php');}
	});


}

</script>