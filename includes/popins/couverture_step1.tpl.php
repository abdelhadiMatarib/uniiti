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
		$MessageAction = "Étape suivante";
		$MessageInfo = "Une fois le chargement de/des images effectué, vous pourrez les ajuster pour un affichage optimal.";
		$Step = "{step: 2}";
?>

	<body>

		<style>
			#fenetre {opacity:0; position:absolute; top:-50px; left:20px; width: 660px; height: 300px;}
			#selection {overflow:hidden}
			#selection:hover {box-shadow: inset 0 3px 4px #888;}
			ul {list-style-type: none;}
			#fileselect {display: none;}
			.couverture_step2_resize_infos {display : none;}
			.couverture_step1_wrap_buttons {display : none;}
			.couverture_step1_dropzone_txt2	{}		
			#image {position:absolute;}

		</style>

<div class="couverture_wrapper">
	<div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
	<div class="couverture_head">
		<div class="couverture_img_container">
			<img src="<?php echo SITE_URL; ?>/img/pictos_popins/couverture_icon.png" title="" alt="" height="37" width="37" />
		</div><span class="maintitle">Images de couverture</span>
	</div>   
	<div class="couverture_step1_body">
		
		<form id="upload" action="javascript:ActualisePopin(<?php echo $Step ?>, '/includes/popins/couverture_steps.tpl.php', 'default_dialog_large');" method="POST" enctype="multipart/form-data">
			<input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="3000000" />
			
			<div id="fenetre"></div>
			<div id="selection" class="couverture_step1_dropzone">
				<div class="draggable">
					<img id="image" src="" width="660" />
				</div>
				<div id="Interaction1">
					<div class="couverture_step1_dropzone_img_container">
						<img src="<?php echo SITE_URL; ?>/img/pictos_popins/img_upload.png" title="" alt="" height="50" width="51" />
					</div>
					<div class="couverture_step1_dropzone_txt">
						<span class="couverture_step1_dropzone_txt1">Glissez-déposez une image dans le cadre</span>
						<span class="couverture_step1_dropzone_txt2">Ou choisissez une image sur <a href="#" title="">votre ordinateur</a></span>
					</div>
				</div>
				
				<div class="couverture_step1_wrap_buttons">
					<div class="couverture_step1_button_supprimer"></div>
					<div class="couverture_step1_button_valider"></div>
				</div>
				<div class="couverture_step2_resize_infos">
					<div class="couverture_step2_resize_infos_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/couverture_resize_icon.png" title="" alt="" height="18" width="10" /></div>
					<span>cliquez pour repositionner l'image</span>
				</div>
			</div>

			<input type="file" name="fileselect" id="fileselect" multiple accept="image/*" />
			<input type="hidden" name="y" value="" id="y" />
			<input type="hidden" name="y1" value="" id="y1" />
			<input type="hidden" name="y2" value="" id="y2" />
			<input type="hidden" name="y3" value="" id="y3" />
			<input type="hidden" name="y4" value="" id="y4" />
			<input type="hidden" name="y5" value="" id="y5" />
			<input type="hidden" name="ImageTemp" value="" id="ImageTemp" />
			<input type="hidden" name="ImageTemp1" value="" id="ImageTemp1" />
			<input type="hidden" name="ImageTemp2" value="" id="ImageTemp2" />
			<input type="hidden" name="ImageTemp3" value="" id="ImageTemp3" />
			<input type="hidden" name="ImageTemp4" value="" id="ImageTemp4" />
			<input type="hidden" name="ImageTemp5" value="" id="ImageTemp5" />
			<input id="submitbutton" name="submitted" type="submit" value="Sauvegarder la sélection" />

		</form>
							
	</div>
	<div class="couverture_step1_footer">
		<div class="couverture_step1_footer_vertical_sep"></div>
		<div class="couverture_step1_infos"><div class="couverture_step_1_infos_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/couverture_infos_icon.png" title="" alt="" height="23" width="23" /></div><span id="MessageInfo"><?php echo $MessageInfo ?></span></div>

		<div class="couverture_arianne">
			<div class="couverture_arianne_txt">
			<span class="arianne_txt_1">Vos </span>
			<span class="arianne_txt_2">images</span>
			</div>
			<div class="couverture_arianne_nbr">
				<ul class="couverture_arianne_nbr_liste">
					<li><a id="image1" href="#" alt="">1</a></li>
					<li><a id="image2" href="#" alt="">2</a></li>
					<li><a id="image3" href="#" alt="">3</a></li>
					<li><a id="image4" href="#" alt="">4</a></li>
					<li><a id="image5" href="#" alt="">5</a></li>                    
				</ul>
			</div>
		</div>
	</div>
	<div class="couverture_champs_action"><a href="#" title="" onclick="EtapeSuivante();"><span><?php echo $MessageAction ?></span></a></div>
</div>
<?php		
	}
?>

<!--		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" charset="utf-8"></script>
		<script language="javascript" src="../../js/jquery.easydrag.min.js"></script>
-->
		<script>    
			
			function ChercherFichier() {
				$("#fileselect").click();
			};

			$("#selection").click( function() {
				if ($(".couverture_step1_dropzone_txt").css('display') != 'none') {ChercherFichier();}
			});
			
			function AfficheBtnES() {
				$id("MessageInfo").innerHTML = "Validez vos images en les repositionnant afin que le rendu soit le plus optimal sur le site.";
				$(".couverture_step1_dropzone_img_container").css({display : "none"});
				$(".couverture_step1_dropzone_txt").css({display : "none"});
				$(".couverture_step1_wrap_buttons").css({display : "block"});
				$(".couverture_step2_resize_infos").css({display : "block"});
			};
			
			function AfficheChercheImage() {
				$("#image").attr("src", "");
				$(".couverture_step1_dropzone_img_container").css({display : "block"});
				$(".couverture_step1_dropzone_txt").css({display : "block"});
				$(".couverture_step1_wrap_buttons").css({display : "none"});
				$(".couverture_step2_resize_infos").css({display : "none"});
				$('#fenetre').css({height: 189 + 'px', top: 20 + 'px'});
				$("#image").css({display : "block"});
			};

			var CompteImageErg = 0;
			var NumImageSel = 1;
			$('.couverture_step1_button_valider').click(function(e){
				e.preventDefault();
				e.stopPropagation();
				if (CompteImageErg < 5) {
					CompteImageErg++;
					var NumImage = CompteImageErg;
					$("#image" + NumImage).addClass("is_valid");
					$('#ImageTemp' + NumImage).val($('#ImageTemp').val());
					$('#y' + NumImage).val($('#y').val());
					$("#image" + NumImage).click(function(e){
						e.preventDefault();
						e.stopPropagation();
						NumImageSel = NumImage;
						$("#image").attr("src", $('#ImageTemp' + NumImage).val());
					});
					AfficheChercheImage();
				}
				else {alert ("Il y a déjà 5 images dans votre gallerie")}

			});
			
			$('.couverture_step1_button_supprimer').click(function(e){
				e.preventDefault();
				e.stopPropagation();
				var NumImage = NumImageSel;
				if ((CompteImageErg > 0) && (NumImage <= CompteImageErg)) {
					for (i = NumImage + 1 ; i <= CompteImageErg ; i++) {
						$('#ImageTemp' + (i - 1)).val($('#ImageTemp' + i).val());
						$('#y' + (i - 1)).val($('#y' + i).val());
					}
					$('#ImageTemp' + CompteImageErg).val("");
					$('#y' + CompteImageErg).val("");
					$("#image" + CompteImageErg).removeClass("is_valid");
					$("#image" + CompteImageErg).unbind('click');
					$('#y').val(0);
					CompteImageErg--;
				}
				AfficheChercheImage();
			});

			$("#image").load(function() {
				var img = document.getElementById('image');
				var height;
				if(img.offsetHeight) {height=img.offsetHeight;}
				else if(img.style.pixelHeight){height=img.style.pixelHeight;}
				var Newheight = Math.round(189 + (height - 189) * 2);
				DecalageSelectionTop = 20;
				var Newtop = DecalageSelectionTop - Math.round((Newheight - 189) / 2);
				$('#fenetre').css({height: Newheight + 'px', top: Newtop + 'px'});
				AfficheBtnES();
				var decalage = 0;
				if ($('#y' + NumImageSel).val() != "") {decalage = -$('#y' + NumImageSel).val()*189/500;}
//				alert(NumImageSel+' '+$('#y' + NumImageSel).val());
				$(".draggable").css({top: decalage+'px'});
				$("#image").css({display : "block"});
			});

			function EtapeSuivante() {
			var data = {
							step : 2,
							image1 : $('#ImageTemp1').val(),
							image2 : $('#ImageTemp2').val(),
							image3 : $('#ImageTemp3').val(),
							image4 : $('#ImageTemp4').val(),
							image5 : $('#ImageTemp5').val(),
							y1 : $('#y1').val(),
							y2 : $('#y2').val(),
							y3 : $('#y3').val(),
							y4 : $('#y4').val(),
							y5 : $('#y5').val()
						};
				ActualisePopin(data, '/includes/popins/couverture_step2.tpl.php', 'default_dialog_large');
			};
			
			
			var DragInit = false;
			function InitDrag() {
				if (!DragInit) {
					$( ".draggable" ).easyDrag({
						'container': $('#fenetre'),
						'axis': 'y',
						drag: function(){
							$('#y').val(($('#selection').offset().top - $(this).offset().top)*500/189);
						}
					});
					DragInit = true;
				}				
			};

			// getElementById
			function $id(id) {return document.getElementById(id);}

			// output information
			function Output(msg) {
				var m = $id("messages");
				m.innerHTML = "<p>Information</p>" + msg;
			}

			// file drag hover
			function selectionHover(e) {
				e.stopPropagation();
				e.preventDefault();
//				e.target.className = (e.type == "dragover" ? "hover" : "");
			}

			// file selection
			function FileSelectHandler(e) {
				// cancel event and hover styling
				selectionHover(e);
				// fetch FileList object
				var files = e.target.files || e.dataTransfer.files;
				// process all File objects
				for (var i = 0, f; f = files[i]; i++) {
					ParseFile(f);
				}
			}
				// output file information
			function ParseFile(file) {
				// display an image
				if (file.type.indexOf("image") == 0) {
					var reader = new FileReader();
					reader.onload = function(e) {
						NumImageSel = CompteImageErg+1;
						$("#image").attr("src", e.target.result);
						InitDrag();
						$(".draggable").css({top: '0px'});
						$('#y').val(0);
						$('#ImageTemp').val(e.target.result);

						/*						Output(
							"<p>Fichier: <strong>" + file.name +
							"</strong> type: <strong>" + file.type +
							"</strong> size: <strong>" + file.size +
							"</strong> bytes</p>"
						);*/
					}
					reader.readAsDataURL(file);
				}
			}
			
			// initialize
			function Init() {
				var image = $id("image"),
					fileselect = $id("fileselect"),
					selection = $id("selection"),
					submitbutton = $id("submitbutton");
				// file select
				fileselect.addEventListener("change", FileSelectHandler, false);
				// is XHR2 available?
				
				var xhr = new XMLHttpRequest();
				if (xhr.upload) {
					// file drop
					selection.addEventListener("dragover", selectionHover, false);
					selection.addEventListener("dragleave", selectionHover, false);
					selection.addEventListener("drop", FileSelectHandler, false);
					
					// remove submit button
					submitbutton.style.display = "none";
				}
			}			
			<?php if ($step == 1) { ?>Init();<?php } ?>

		</script>

	</body>
</html>



