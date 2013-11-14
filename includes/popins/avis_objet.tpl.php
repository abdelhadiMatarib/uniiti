<?php
        include_once '../../config/configuration.inc.php';
		include_once '../../acces/auth.inc.php';
		if(isset($_SESSION['SESS_MEMBER_ID'])) {
				$id_contributeurActif = $_SESSION['SESS_MEMBER_ID'];
		}
		else {?>
			<script>ActualisePopin({}, '/includes/popins/ident.tpl.php', 'default_dialog');</script>
		<?php exit;}
?>

<div class="suggestionobjet_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="suggestionobjet_head">
        <div class="suggestionobjet_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/sugg_objet_icon.png" title="" alt="" height="44" width="37" />
        </div><span class="maintitle">Nouvel avis<?php if (!empty($_POST['nom_objet'])) {echo " sur " . $_POST['nom_objet'];} ?></span>
    </div>
	<form onsubmit="return VerifieEtErg();" action="<?php echo SITE_URL; ?>/includes/popins/avis_objet.tpl.php" method="post" autocomplete="off">	
		<div class="suggestionobjet_body">
			<input name="id_contributeur" type="hidden" value="<?php echo $id_contributeurActif; ?>"/>
			<input name="id_objet" type="hidden" value="<?php if (!empty($_POST['id_objet'])) {echo $_POST['id_objet'];} ?>"/>
			<textarea name="avis" id="avis" class="suggestioncommerce_description" placeholder="Avis sur l'objet (140 caractères max.)"></textarea>
			<div class="dashboard_form_input_note" style="width:500px !important;">
				<div id="Note" class="rating"></div>
			</div>
		</div>
		<div class="suggestionobjet_footer">
			<button type="submit" class="suggestioncommerce_valider_wrap">Enregistrer</button>
		</div>
	</form>
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

	$('#Note').rating('avis_objet.php', {cancel:true,maxvalue:5,increment:0.5,curvalue:4.5});

	// getElementByName
	function $name(name) {return document.getElementsByName(name)[0];}

	function VerifieEtErg() {
		if ($('.star.on:last a').length > 0) {note = $('.star.on:last a').attr('href').split('#')[1];}
		else {note = 0;}
		var data = {
		        'id_contributeur' : $name("id_contributeur").value,
		        'id_objet' : $name("id_objet").value,
				'avis' : $("#avis").val(),
				'note' : note
		};
		console.log(data);
		$.ajax({
			async : false,
			type :"POST",
			url : siteurl+'/includes/requeteenregistreavisobjet.php',
			data : data,
			success: function(result){
				if (result.result == -1) {
					alert("Enregistrement de cet avis impossible car ce contributeur a déjà donné son avis sur cet objet !");						
				}
				else {
					ActualisePopin(data, '/includes/popins/avis_objet_valide.tpl.php', 'default_dialog');					
				}

			},
			error: function(xhr) {console.log(xhr);alert('Erreur '+xhr.responseText);}
		});
		return false; // si false l action du form ne sera pas appelée
	};	


</script>