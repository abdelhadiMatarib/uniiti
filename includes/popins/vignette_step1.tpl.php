<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<?php
	include_once '../../config/configuration.inc.php';
	include'../head.php';

	if ((empty($_POST['step'])  && empty($_GET['step']))) {echo "vous ne pouvez pas accéder directement à cette page !\n<a href=\"" . SITE_URL . "\">Revenir à la page principale</a>";}
	
	else {
		if (!empty($_GET['step'])) {$step = $_GET['step'];}
		else {$step = $_POST['step'];}
		$MessageAction = "Enregistrer";
		$MessageInfo = "Veuillez choisir sur cette image la zone visible lors de l'affichage des popins.";
		$Step = "{step: 2}";
?>

		<style>
			#fenetre {opacity:0; position:absolute; top:20px; left:20px; width: 735px; height: 210px;}
			#selection {overflow:hidden}
			#selection:hover {box-shadow: inset 0 3px 4px #888;}
			ul {list-style-type: none;}
			.vignette_step2_resize_infos {display : none;}
			.couverture_step1_wrap_buttons {display : none;}
			.vignette_step1_dropzone_txt2{}		
			#image {position:absolute;}
                        .step1_infos_popin{float:none;margin:0 auto;width:425px;margin-top:5px;}
                        .popin_step1_infos_img_container{margin-top:-5px;}
		</style>

<div class="couverture_wrapper">
	<div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
	<div class="couverture_head">
		<div class="couverture_img_container">
			<img src="<?php echo SITE_URL; ?>/img/pictos_popins/couverture_icon.png" title="" alt="" height="37" width="37" />
		</div><span class="maintitle">Image de popin</span>
	</div>   
	<div class="couverture_step1_body">
		
		<form>
			<div id="fenetre"></div>
			<div id="selection" class="vignette_step1_dropzone">
				<div class="draggable">
					<img id="image" src="<?php echo $_POST['chemin'] . $_POST['image1']; ?>" width="735"/>
				</div>
	
				<div class="vignette_step2_resize_infos">
					<div class="couverture_step2_resize_infos_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/couverture_resize_icon.png" title="" alt="" height="18" width="10" /></div>
					<span>cliquez pour repositionner l'image</span>
				</div>
			</div>

			<input type="hidden" name="x1" value="<?php if ((!empty($_POST['x1'])) && ($_POST['x1'] != '')) {echo $_POST['x1'];} ?>" id="x1" />
			<input type="hidden" name="y1" value="<?php if ((!empty($_POST['y1'])) && ($_POST['y1'] != '')) {echo $_POST['y1'];} ?>" id="y1" />
		</form>
							
	</div>
	<div class="couverture_step1_footer">
		
		<div class="couverture_step1_infos step1_infos_popin"><div class="couverture_step_1_infos_img_container popin_step1_infos_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/couverture_infos_icon.png" title="" alt="" height="23" width="23" /></div><span id="MessageInfo"><?php echo $MessageInfo ?></span></div>

	</div>
	<div class="couverture_champs_action"><a href="#" title="" onclick="Enregistrer();"><span><?php echo $MessageAction ?></span></a></div>
</div>
<?php		
	}
?>

<!--		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" charset="utf-8"></script>
		<script language="javascript" src="../../js/jquery.easydrag.min.js"></script>
-->
		<script>    
			// getElementById
			function $id(id) {return document.getElementById(id);}
			
			function AfficheBtnES() {
				$id("MessageInfo").innerHTML = "Validez vos images en les repositionnant afin que le rendu soit le plus optimal sur le site.";
				$(".vignette_step1_dropzone_img_container").css({display : "none"});
				$(".vignette_step1_dropzone_txt").css({display : "none"});
				$(".couverture_step1_wrap_buttons").css({display : "block"});
				$(".vignette_step2_resize_infos").css({display : "block"});
			};
			
			function CacheBtnES() {
				$(".couverture_step1_wrap_buttons").css({display : "none"});
				$(".vignette_step2_resize_infos").css({display : "none"});
			};
			
			$("#image").load(function() {
				var img = document.getElementById('image');
				var height;
				if(img.offsetHeight) {height=img.offsetHeight;}
				else if(img.style.pixelHeight){height=img.style.pixelHeight;}
				var Newheight = height;
				var width;
				if(img.offsetWidth) {width=img.offsetWidth;}
				else if(img.style.pixelWidth){width=img.style.pixelWidth;}
				var Newwidth = (735 - 450)*2 + 450; 
				DecalageSelectionLeft = 125;
				var Newleft = DecalageSelectionLeft - Math.round((Newwidth - 450) / 2);
				$('#fenetre').css({width: Newwidth + 'px', left: Newleft + 'px', top: 20 + 'px', height: Newheight + 'px'});
				DecalageSelectionTop = 20;
				var Newtop = 1 + DecalageSelectionTop - $("#y1").val() * 735 /1750;
				console.log($("#y1").val());
				$('#fenetre').css({top: Newtop + 'px'});
				AfficheBtnES();
				InitDrag();
				$(".draggable").css({top: Newtop-20+'px'});
				if ($('#x1').val() != "") {
					var decalage = -$('#x1').val()*735/1750;
					$(".draggable").css({left: decalage+'px'});
				}
				$("#image").css({display : "block"});

			});

			var DragInit = false;
			function InitDrag() {
				if (!DragInit) {
					$( ".draggable" ).easyDrag({
						'container': $('#fenetre'),
						'axis': 'x',
						start: function() {CacheBtnES();},
						drag: function(){
							$('#x1').val(($('#selection').offset().left - $(this).offset().left+1)*1750/735);
						},
						stop: function() {AfficheBtnES();}
					});
					DragInit = true;
				}				
			};
			
			function Enregistrer () {

			var data = {
							type : '<?php if (!empty($_POST['type'])) {echo $_POST['type'];} ?>',
							id_enseigne : '<?php if (!empty($_POST['id_enseigne'])) {echo $_POST['id_enseigne'];} ?>',
							id_objet : '<?php if (!empty($_POST['id_objet'])) {echo $_POST['id_objet'];} ?>',
							x1 : $('#x1').val(),
						};
				console.log($('#x1').val());
				$.ajax({
					async : false,
					type :"POST",
					url : siteurl+'/includes/requetechangecouvertures.php',
					data : data,
					success: function(html){
						window.location.reload();
					},
					error: function() {alert('Erreur sur url : ' + url);}
				});
			
			}
		</script>



