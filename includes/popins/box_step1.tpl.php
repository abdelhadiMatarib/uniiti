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
		$MessageInfo = "Une fois le chargement de/des images effectué, vous pourrez les ajuster pour un affichage optimal.";
		$Step = "{step: 2}";
?>

	<body>
            <style>
                #fenetre {opacity:0; position:absolute; top:20px; left:20px; width: 236px; height: 350px;}
#selection {overflow:hidden}
#selection:hover {box-shadow: inset 0 3px 4px #888;}
ul {list-style-type: none;}
#fileselect {display: none;}
.vignette_step2_resize_infos {display : none;}
.couverture_step1_wrap_buttons {display : none;}
.vignette_step1_dropzone_txt2	{}		
#image {position:absolute;}
            </style>

<div class="couverture_wrapper">
	<div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
	<div class="couverture_head">
		<div class="couverture_img_container">
			<img src="<?php echo SITE_URL; ?>/img/pictos_popins/couverture_icon.png" title="" alt="" height="37" width="37" />
		</div><span class="maintitle">Image de box</span>
	</div>   
	<div class="couverture_step1_body">
		
		<form id="upload" action="javascript:ActualisePopin(<?php echo $Step ?>, '/includes/popins/couverture_steps.tpl.php', 'default_dialog_large');" method="POST" enctype="multipart/form-data">
			<input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="4000000" />
			
			<div id="fenetre"></div>
			<div id="selection" class="box_step1_dropzone">
				<div class="draggable">
					<img id="image" src="" height="350" />
				</div>
				<div id="Interaction1">
					<div class="box_step1_dropzone_img_container">
						<img src="<?php echo SITE_URL; ?>/img/pictos_popins/img_upload.png" title="" alt="" height="95" width="199" />
					</div>
					<div class="box_step1_dropzone_txt">
						<span class="couverture_step1_dropzone_txt1">Glissez-déposez une image dans le cadre</span>
						<span class="couverture_step1_dropzone_txt2">Ou choisissez une image sur <a href="#" title="">votre ordinateur</a></span>
					</div>
				</div>
				
				<div class="couverture_step1_wrap_buttons box_wrap_buttons">
					<div class="couverture_step1_button_supprimer"></div>
					<div class="couverture_step1_button_valider"></div>
				</div>
				<div class="box_step2_resize_infos">
					<div class="couverture_step2_resize_infos_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/couverture_resize_icon.png" title="" alt="" height="18" width="10" /></div>
					<span>cliquez pour repositionner l'image</span>
				</div>
			</div>

			<input type="file" name="fileselect" id="fileselect" multiple accept="image/*" />
			<input type="hidden" name="x" value="" id="x" />
			<input type="hidden" name="x1" value="" id="x1" />
			<input type="hidden" name="ImageTemp" value="<?php if (isset($_POST['box'])) {echo $_POST['cheminbox'] . $_POST['box'];} ?>" id="ImageTemp" />
			<input type="hidden" name="ImageTemp1" value="<?php if (isset($_POST['box'])) {echo $_POST['cheminbox'] . $_POST['box'];} ?>" id="ImageTemp1" />
			<input id="submitbutton" name="submitted" type="submit" value="Sauvegarder la sélection" />

		</form>
							
	</div>
	<div class="couverture_step1_footer">
		<div class="couverture_step1_footer_vertical_sep"></div>
		<div class="couverture_step1_infos"><div class="couverture_step_1_infos_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/couverture_infos_icon.png" title="" alt="" height="23" width="23" /></div><span id="MessageInfo"><?php echo $MessageInfo ?></span></div>

		<div class="couverture_arianne">
			<div class="couverture_arianne_txt">
			<span class="arianne_txt_1">Votre </span>
			<span class="arianne_txt_2">image</span>
			</div>
			<div class="couverture_arianne_nbr">
				<ul class="couverture_arianne_nbr_liste">
					<li><a id="image1" href="#" alt="">1</a></li>
				</ul>
			</div>
		</div>
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
			
			function ChercherFichier() {
				$("#fileselect").click();
			};

			$("#selection").click( function() {
				if ($(".box_step1_dropzone_txt").css('display') != 'none') {ChercherFichier();}
			});
			
			function AfficheBtnES() {
				$id("MessageInfo").innerHTML = "Validez vos images en les repositionnant afin que le rendu soit le plus optimal sur le site.";
				$(".box_step1_dropzone_img_container").css({display : "none"});
				$(".box_step1_dropzone_txt").css({display : "none"});
				$(".couverture_step1_wrap_buttons").css({display : "block"});
				$(".box_step2_resize_infos").css({display : "block"});
			};
			
			function CacheBtnES() {
				$(".couverture_step1_wrap_buttons").css({display : "none"});
				$(".box_step2_resize_infos").css({display : "none"});
			};
			
			function AfficheChercheImage() {
				$("#image").attr("src", "");
				$("#image").css({'height': 0});
				$(".box_step1_dropzone_img_container").css({display : "block"});
				$(".box_step1_dropzone_txt").css({display : "block"});
				$(".couverture_step1_wrap_buttons").css({display : "none"});
				$(".box_step2_resize_infos").css({display : "none"});
				$('#fenetre').css({width: 236 + 'px', left: 140 + 'px', top: 20 + 'px'});
				$("#image").css({display : "block"});
			};

			var CompteImageErg = 0;
			var NumImageSel = 1;
			$('.couverture_step1_button_valider').click(function(e){
				e.preventDefault();
				e.stopPropagation();
				if ($("#image" + NumImageSel).hasClass("is_valid")) {
					$('#x' + NumImageSel).val($('#x').val());
					AfficheChercheImage();
				}
				else if (CompteImageErg < 1) {
					CompteImageErg++;
					var NumImage = CompteImageErg;
					$("#image" + NumImage).addClass("is_valid");
					$('#ImageTemp' + NumImage).val($('#ImageTemp').val());
					$('#x' + NumImage).val($('#x').val());
					$("#image" + NumImage).click(function(e){
						InitDrag();
						e.preventDefault();
						e.stopPropagation();
						NumImageSel = NumImage;
						$("#image").attr("src", $('#ImageTemp' + NumImage).val());
					});
					AfficheChercheImage();
				}
				else {alert ("Vous ne pouvez enregistrer qu'une image")}

			});
			
			function InitImage() {
				if ($('#ImageTemp1').val() != "") {
					CompteImageErg++;
					$("#image1").addClass("is_valid");
					$("#image1").click(function(e){
						e.preventDefault();
						e.stopPropagation();
						InitDrag();
						NumImageSel = 1;
						$("#image").attr("src", $('#ImageTemp1').val());
					});
				}
				else {
					$("#image1").click(function(e){
						e.preventDefault();
						e.stopPropagation();
						AfficheChercheImage();
					});					
				}
			}
			InitImage();
			
			$('.couverture_step1_button_supprimer').click(function(e){
				e.preventDefault();
				e.stopPropagation();
				var NumImage = NumImageSel;
				if ((CompteImageErg > 0) && (NumImage <= CompteImageErg)) {
					for (i = NumImage + 1 ; i <= CompteImageErg ; i++) {
						$('#ImageTemp' + (i - 1)).val($('#ImageTemp' + i).val());
						$('#x' + (i - 1)).val($('#x' + i).val());
					}
					$('#ImageTemp' + CompteImageErg).val("");
					$('#x' + CompteImageErg).val("");
					$("#image" + CompteImageErg).removeClass("is_valid");
					$("#image" + CompteImageErg).unbind('click');
					$('#x').val(0);
					$("#image" + CompteImageErg).click(function(e){
						e.preventDefault();
						e.stopPropagation();
						AfficheChercheImage();
					});
					CompteImageErg--;
				}
				AfficheChercheImage();
			});

			$("#image").load(function() {
				$("#image").css({'height': 350});
				var img = document.getElementById('image');
				var width;
				if(img.offsetWidth) {width=img.offsetWidth;}
				else if(img.style.pixelWidth){width=img.style.pixelWidth;}
				var Newwidth = Math.round(236 + (Math.max(width, 236) - 236) * 2);
				DecalageSelectionLeft = 232;
				var Newleft = DecalageSelectionLeft - Math.round((Newwidth - 236) / 2);
				$('#fenetre').css({width: Newwidth + 'px', left: Newleft + 'px', top: 20 + 'px'});
				AfficheBtnES();
				var decalage = 0;
				if ($('#x' + NumImageSel).val() != "") {decalage += -$('#x' + NumImageSel).val();}
				$(".draggable").css({left: decalage+'px'});
				$("#image").css({display : "block"});
			});

			function Enregistrer () {
			
			if ($("#image1").hasClass("is_valid")) {
				var data = {
								type : '<?php if (!empty($_POST['type'])) {echo $_POST['type'];} ?>',
								id_enseigne : '<?php if (!empty($_POST['id_enseigne'])) {echo $_POST['id_enseigne'];} ?>',
								id_objet : '<?php if (!empty($_POST['id_objet'])) {echo $_POST['id_objet'];} ?>',
								box : $('#ImageTemp1').val(),
								x1 : $('#x1').val(),
							};
				console.log($('#x1').val());
				$.ajax({
					async : false,
					type :"POST",
					url : siteurl+'/includes/requetechangebox.php',
					data : data,
					success: function(html){
						window.location.reload();
					},
					error: function() {alert('Erreur sur url : ' + url);}
				});
			}
			
			}			

			var DragInit = false;
			function InitDrag() {
				if (!DragInit) {
					$( ".draggable" ).easyDrag({
						'container': $('#fenetre'),
						'axis': 'x',
						start: function() {CacheBtnES();},
						drag: function(){
							$('#x').val(($('#selection').offset().left - $(this).offset().left+1));
						},
						stop: function() {AfficheBtnES();}
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
						$(".draggable").css({left: '0px'});
						$('#x').val(0);
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
			Init();

		</script>

	</body>
</html>



