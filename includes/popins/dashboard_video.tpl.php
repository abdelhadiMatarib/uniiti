<?php
        include_once '../../config/configuration.inc.php';

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
	var data = {
				step : 'Video',
				id_enseigne : '<?php if (!empty($_POST['id_enseigne'])) {echo $_POST['id_enseigne'];} ?>',
				url_video : ''+$('#lienvideo').val()+'',
			};
	console.log(data);
	$.ajax({
		async : false,
		type :"POST",
		url : siteurl+'/includes/requetemodifieenseigne.php',
		data : data,
		success: function(result){
			alert('video enregistrée');
		},
		error: function() {alert(result.result);}
	});
	
	
});
</script>

