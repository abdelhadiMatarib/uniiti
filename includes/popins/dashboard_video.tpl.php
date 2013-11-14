<?php
        include_once '../../config/configuration.inc.php';

		if (empty($_POST['type'])) {echo "vous ne pouvez pas accéder directement à cette page !\n<a href=\"" . SITE_URL . "\">Revenir à la page principale</a>"; exit;}
		else {$type = $_POST['type'];}
		if ($type == "enseigne") {
			if (empty($_POST['id_enseigne'])) {echo "vous ne pouvez pas accéder directement à cette page !\n<a href=\"" . SITE_URL . "\">Revenir à la page principale</a>"; exit;}
			else {$id_enseigne_ou_objet = $_POST['id_enseigne'];}
		} else if ($type == "objet") {
			if (empty($_POST['id_objet'])) {echo "vous ne pouvez pas accéder directement à cette page !\n<a href=\"" . SITE_URL . "\">Revenir à la page principale</a>"; exit;}
			else {$id_enseigne_ou_objet = $_POST['id_objet'];}
		} else {echo "vous ne pouvez pas accéder directement à cette page !\n<a href=\"" . SITE_URL . "\">Revenir à la page principale</a>"; exit;}		
		
?>
<div class="ident_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="ident_head">
        <div class="ident_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/icon_video.png" title="" alt="" height="36" width="36" />
        </div><span class="maintitle">Gestion de la vidéo</span>
    </div>   
    <div class="ident_body">
            <div class="infos_gene_title"><span>Lien vidéo (Youtube/Dailymotion/Vimeo)</span></div>
                <input id='lienvideo' type="text" class="input_lien_video" placeholder="Lien" value="<?php echo $_POST['url_video'];?>"/>
            <div class="infos_gene_title"><span>Aperçu</span></div>
            <div class="embed_preview_video">
			<iframe id="video" width="480" height="300" src="" frameborder="0" allowfullscreen>
			</iframe>               
            </div>
    </div>
    <div class="suggestioncommerce_footer">
        
        <div id="Enregistrer" class="suggestioncommerce_valider_wrap"><a href="#">Enregistrer</a></div>
        
    </div>
</div>
<script>
$('#Enregistrer').click(function () {
	$('#video').attr('src', $('#lienvideo').val());
	var $type = '<?php echo $type;?>';
	var data = {
				step : 'Video',
				id_enseigne : '<?php echo $id_enseigne_ou_objet; ?>',
				id_objet : '<?php echo $id_enseigne_ou_objet; ?>',
				url_video : ''+$('#lienvideo').val()+'',
			};
	console.log(data);
	var url = '';
	if ($type == 'enseigne') {url = siteurl+'/includes/requetemodifieenseigne.php';}
	else {url = siteurl+'/includes/requetemodifieobjet.php';}
	$.ajax({
		async : false,
		type :"POST",
		url : url,
		data : data,
		success: function(result){
			alert('video enregistrée');
		},
		error: function() {alert(result.result);}
	});
	
	
});
</script>

