        <?php
        include_once '../config/configuration.inc.php';
		if ((!empty($_POST['step'])) && ($_POST['step'] == "change")) {$Change = true;}
		else {$Change = false;}
		
		function TirageSansRemise($debut, $fin, $nombre, &$Tirage) {
			$Tirage[1] = rand($debut, $fin);
			for ($i = $debut + 1 ; $i <= $nombre ; $i++) {
				$DejaTire = true;
				while ($DejaTire) {
					if ($DejaTire) {$NouveauTirage = rand($debut, $fin);}
					$DejaTire = false;
					for ($j = 1 ; $j <= sizeof($Tirage) ; $j++) {if ($Tirage[$j] == $NouveauTirage) {$DejaTire = true;}}
				}
				$Tirage[$i] = $NouveauTirage;
			}
		}
		TirageSansRemise(1, 100, 20, $Tirage);

		?>
            <div class="inscription_head"><div class="liseret_bleu"></div><h2><img src="<?php echo SITE_URL; ?>/img/pictos_inscription/new_user.png" height="68" width="77" title="" alt="" /><?php if ($Change) {echo "Changer votre";} else {echo "Créer un compte en seulement";} ?> <span><?php if ($Change) {echo "avatar";} else {echo "3 étapes";} ?></span></h2></div>
           <div class="inscription_head2">
				<div class="inscription_step1"><h3><?php if (!$Change) { ?>Informations générales<?php } ?></h3></div>
                <div class="inscription_step2 inscription_current_step_texte_head"><h3>Choix de l'avatar</h3></div>
                <div class="inscription_step3"><h3><?php if (!$Change) { ?>Vos centres d'intérêts<?php } ?></h3></div>
            </div>
            <div class="inscription_fields_left2">
                <div class="inscription_upload_image_texte"><span>Glissez-déposez une image dans le cadre</span></div>
            <div class="inscription_separation_ou"><span>Ou</span></div>
            </div>
            <div class="inscription_fields_right2">
                <div class="inscription_choisir_image_texte"><span>Choisissez-en une dans la Uniiti galerie</span></div>
            </div>
			<form id="upload" onsubmit="<?php if ($Change) {echo "return Enregistrer();";} else {echo "return EtapeSuivante();";} ?>" action="<?php echo SITE_URL; ?>/pages/inscription3.php" method="POST" enctype="multipart/form-data">
				<div class="inscription_fields_left2">
					<input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="4000000" />
						<div class="inscription_upload_image_container">
							<div class="inscription_upload_button" id="filedrag"></div>
							<input type="hidden" name="ImageTemp" value="<?php if ($Change) {echo SITE_URL . "/photos/utilisateurs/avatars/" . $_POST['photo_contributeur'];} else {echo SITE_URL; ?>/img/avatars/6.png<?php } ?>" id="ImageTemp" />
							<input type="file" id="inscription_upload" name="inscription_upload[]" multiple="multiple" />
						</div>
						
					<?php foreach ($_POST as $Key => $Value) {?>
					<input type="hidden" id="<?php echo $Key; ?>" name="<?php echo $Key; ?>" value="<?php echo $Value; ?>" />
					<?php } ?>
					
<!-- 					<div id="messages">
						<p>Status Messages</p>
					</div>	 -->			
				
				</div>
				<div class="inscription_fields_right2">
					<div class="inscription_choisir_image_container">
					<!-- Slider -->
						  <div id="slider">
  							<div class="container">
    							<div id="slides">
    								<?php for ($i = 1 ; $i < 20 ; $i++) { ?>
										<img id="image<?php echo $i; ?>" onclick="ChangeAvatar('<?php echo SITE_URL; ?>/photos/utilisateurs/avatars/photo <?php echo $Tirage[$i]; ?>.jpg');" src="<?php echo SITE_URL; ?>/photos/utilisateurs/avatars/photo <?php echo $Tirage[$i]; ?>.jpg" alt="" />
									<?php } ?>
    							</div>
 							 </div>
  							<div id="ombre"></div>
  						</div>
					<!-- /Slider -->
					</div>
				</div>
				<div class="inscription_wrap_next_step2">
				<div class="inscription_next_step2">
					<button class="inscription_next_step_button2" id="submitbutton" type="submit" role="button" class="css3button" ><?php if ($Change) {echo "Enregistrer";} else {echo "Suivant";} ?></button>
				</div>
					<div class="inscription_avatar_selected">
						<div class="inscription_avatar_selected_texte"><span>Votre avatar</span></div>
						<img id="Avatar" src="" height="120" width="120" title="" alt="" />
					</div>
				</div>
           </form>
		
		<script type="text/javascript">
		$('#image1').load(function(){
			$('#slides').slidesjs({width: 240,height: 240,pagination: {active: false},effect: {fade: {speed: 400}}});
		});

		function Enregistrer () {

			var NomImage = new Array;
			var Compresser = 0;

			if($('#ImageTemp').val().lastIndexOf("http://") == 0) {
				var NomUrl = $('#ImageTemp').val();
				NomImage = NomUrl.substring(NomUrl.lastIndexOf('/')+1, NomUrl.length);
			}
			else {NomImage = $('#ImageTemp').val(); Compresser = 1;}
			
			var data = {
							id_contributeur : '<?php if (!empty($_POST['id_contributeur'])) {echo $_POST['id_contributeur'];} ?>',
							photo : NomImage,
							compression : Compresser
						};

			console.log(data);

				$.ajax({
					async : false,
					type :"POST",
					url : siteurl+'/includes/requetechangeavatar.php',
					data : data,
					success: function(html){
						window.location.reload();
					},
					error: function() {alert('Erreur sur url : ' + url);}
				});
			return false;
		}


		function EtapeSuivante() {
				var data = {
						'email_login' : $id("email_login").value,
						prenom : $id("prenom").value,
						nom : $id("nom").value,
						'date_naissance_jour' : $id("date_naissance_jour").value,
						'date_naissance_mois' : $id("date_naissance_mois").value,
						'date_naissance_annee' : $id("date_naissance_annee").value,
						sexe : $id("sexe").value,
						mdp : $id("mdp").value,
						ville : $id("ville").value,
						codepostal : $id("codepostal").value,
						pays : $id("pays").value,
						telephone_contributeur : $id("telephone_contributeur").value,
						ImageTemp : $id("ImageTemp").value
				};
				ActualisePopin(data, '/pages/inscription3.php', 'default_dialog_inscription');
				return false; // si false l action du form ne sera pas appelé
			};	
		
			function ChangeAvatar(src) {
				$("#Avatar").attr("src", src);
				$('#ImageTemp').val(src);
			}
			<?php if ($Change) {echo "ChangeAvatar(" . "'" . SITE_URL . "/photos/utilisateurs/avatars/" . $_POST['photo_contributeur'] . "');";}
				else {echo "ChangeAvatar(" . "'" . SITE_URL . "/photos/utilisateurs/avatars/photo 1.jpg" . "');";} ?>
			
			$("#filedrag").click( function(e) {
				e.stopPropagation();
				$("#inscription_upload").click();
			});
			
			// getElementById
			function $id(id) {
				return document.getElementById(id);
			}

			// output information
			function Output(msg) {
				var m = $id("messages");
				m.innerHTML = "<p>Information</p>" + msg;
			}

			// file drag hover
			function FileDragHover(e) {
				e.stopPropagation();
				e.preventDefault();
		//		e.target.className = (e.type == "dragover" ? "hover" : "");
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
						ChangeAvatar(e.target.result);
		//				$('#ImageTemp').val(e.target.result);
		//				$("#image").attr("src", e.target.result);
					}
					reader.readAsDataURL(file);
				}
				Output(
					"<p>Fichier: <strong>" + file.name +
					"</strong> type: <strong>" + file.type +
					"</strong> size: <strong>" + file.size +
					"</strong> bytes</p>"
				);

			}

			// initialize
			function Init() {
				var fileselect = $id("inscription_upload"),
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
//					submitbutton.style.display = "none";
					fileselect.style.display = "none";
				}

			}


		Init();

			
		</script>