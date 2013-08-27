<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

        <?php
        include_once '../config/configuration.inc.php';
        include'../includes/head.php'; ?>
    <body>		
		<!-- Required -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" charset="utf-8"></script>
		<script language="javascript" src="../js/jquery.easydrag.min.js"></script>
		<script>
$(function() {

	$( ".draggable" ).easyDrag({
		'container': $('#fenetre'),
		drag: function(){$('#y').val($(this).offset().top);}
	});

	// getElementById
	function $id(id) {return document.getElementById(id);}

	// output information
	function Output(msg) {
		var m = $id("messages");
		m.innerHTML = "<p>Information</p>" + msg;
	}

	// file drag hover
	function FileDragHover(e) {
		e.stopPropagation();
		e.preventDefault();
		e.target.className = (e.type == "dragover" ? "hover" : "");
	}

	// file selection
	function FileSelectHandler(e) {

		// cancel event and hover styling
		FileDragHover(e);

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
				$("#image").attr("src", e.target.result);
				alert("cliquez sur l'image pour la déplacer verticalement");
				var img = document.getElementById('image');
				var height;
				if(img.offsetHeight) {height=img.offsetHeight;}
				else if(img.style.pixelHeight){height=img.style.pixelHeight;}
				
				var Newheight = Math.round(500 + (height - 500) * 2);
				var Newtop = - Math.round((Newheight - 500) / 2);
				$('#fenetre').css({height: Newheight + 'px', top: Newtop + 'px'});
				Output(
					"<p>Fichier: <strong>" + file.name +
					"</strong> type: <strong>" + file.type +
					"</strong> size: <strong>" + file.size +
					"</strong> bytes</p>"
				);

			}
			reader.readAsDataURL(file);
		}
	}

	// initialize
	function Init() {

		var fileselect = $id("fileselect"),
			filedrag = $id("filedrag"),
			submitbutton = $id("submitbutton");

		// file select
		fileselect.addEventListener("change", FileSelectHandler, false);

		// is XHR2 available?
		var xhr = new XMLHttpRequest();
		if (xhr.upload) {

			// file drop
			filedrag.addEventListener("dragover", FileDragHover, false);
			filedrag.addEventListener("dragleave", FileDragHover, false);
			filedrag.addEventListener("drop", FileSelectHandler, false);
			filedrag.style.display = "block";

			// remove submit button
//			submitbutton.style.display = "none";
		}

	}

	// call initialization file
	if (window.File && window.FileList && window.FileReader) {
		Init();
	}
})();

			
		</script>
	
		<style>
			#fenetre {
				opacity:0;
				position:absolute;
				top:-250px;
				left:50px;
				width: 1700px;
				height: 1000px;
			}
			
			#selection {
				overflow:hidden;
				position:absolute;
				top:0px;
				left:50px;
				width: 1700px;
				height: 500px;
				border: 2px dashed #000000;
			}
			#selection:hover {cursor:n-resize;}
			#upload {position: absolute; top:500px;left:50px;width:1000px; height:200px;border: 2px dashed #000000;}

			#filedrag
			{
				display: none;
				font-weight: bold;
				text-align: center;
				padding: 1em 0;
				margin: 1em 0;
				color: #555;
				border: 2px dashed #555;
				border-radius: 7px;
				cursor: default;
			}

			#filedrag.hover
			{
				color: #f00;
				border-color: #f00;
				border-style: solid;
				box-shadow: inset 0 3px 4px #888;
			}
		</style>

		<div id="fenetre"></div>
		<div id="selection">
			<div class="draggable">
				<img id="image" src="<?php echo $src;?>" width="1700" />
			</div>
		</div>
		<form id="upload" action="couverture.php" method="POST" enctype="multipart/form-data">

			<span>Glissez-déposez une image dans le cadre ci-dessous</span>

			<input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="3000000" />
			<div id="filedrag">Glissez-déposez une image ici</div>
			<label for="fileselect">Ou cliquez pour en choisir un sur votre ordinateur</label>
			<input type="file" name="fileselect" id="fileselect" multiple accept="image/*" />
			<input type="hidden" name="y" value="" id="y" />
			<BR>
			<input id="submitbutton" name="submitted" type="submit" value="Sauvegarder la sélection" />
			
			<div id="messages">
				<?php
				
				function CreerImageCouverture ($NomImage, $CheminImageRecalibree, $y) {

					$image = $NomImage;
					$couv = $CheminImageRecalibree . basename($image) . ".png";
					list($imagewidth, $imageheight, $imageType) = getimagesize($image);
					$scale = $imagewidth / 1700;
					$newImage = imagecreatetruecolor(1700,500);
					$source=imagecreatefromjpeg($image);
					imagecopyresampled($newImage,$source,0,0,0,-$y * $scale,1700,500,$imagewidth,500 * $scale);
					imagepng($newImage, $couv);
					echo "Image sauvegardée dans " . $CheminImageRecalibree;			
				}
				
				$src = "";
				if (isset($_POST["submitted"])) {

				$NomImage = realpath($_FILES['fileselect']['tmp_name']);
				$CheminImageRecalibree = $_SERVER["DOCUMENT_ROOT"] . "/projects/uniiti/img/tmp/";
				CreerImageCouverture ($NomImage, $CheminImageRecalibree, $_POST['y']);
				}
				?>
			</div>	
		</form>
	</body>
</html>