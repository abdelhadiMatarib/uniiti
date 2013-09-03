<!DOCTYPE html>

<?php
	include_once '../../config/configuration.inc.php';
	include'../head.php';
	

	$MessageAction = "Enregistrer";
	$MessageInfo = "Validez vos images en les repositionnant afin que le rendu soit le plus optimal sur le site.";
	$Step = "{step: 1}";

	function CompresserImage ($image, $ImageRecalibree, $WidthCouv) {
		$couv = $ImageRecalibree;
		list($imagewidth, $imageheight, $imageType) = getimagesize($image);
		$scale = $imagewidth / $WidthCouv;
		$newImage = imagecreatetruecolor($WidthCouv, $imageheight / $scale);
		$imageType = image_type_to_mime_type($imageType);
		switch($imageType) {
			case "image/gif":
				$source=imagecreatefromgif($image); 
				break;
			case "image/pjpeg":
			case "image/jpeg":
			case "image/jpg":
				$source=imagecreatefromjpeg($image); 
				break;
			case "image/png":
			case "image/x-png":
				$source=imagecreatefrompng($image); 
				break;
		}
		imagecopyresampled($newImage, $source, 0, 0, 0, 0, $WidthCouv, $imageheight / $scale, $imagewidth, $imageheight);
		imagejpeg($newImage, $couv, 70);		
	}
	
	function CreerImageCouverture ($image, $ImageRecalibree, $y, $WidthCouv, $HeightCouv) {

		$couv = $ImageRecalibree;
		list($imagewidth, $imageheight, $imageType) = getimagesize($image);
		$scale = $imagewidth / $WidthCouv;
		$newImage = imagecreatetruecolor($WidthCouv, $HeightCouv);
		$imageType = image_type_to_mime_type($imageType);
		switch($imageType) {
			case "image/gif":
				$source=imagecreatefromgif($image); 
				break;
			case "image/pjpeg":
			case "image/jpeg":
			case "image/jpg":
				$source=imagecreatefromjpeg($image); 
				break;
			case "image/png":
			case "image/x-png":
				$source=imagecreatefrompng($image); 
				break;
		}
		imagecopyresampled($newImage, $source, 0, 0, 0, $y * $scale, $WidthCouv, $HeightCouv, $imagewidth, $HeightCouv * $scale);
		imagepng($newImage, $couv);
//			echo "Image sauvegardée dans " . $ImageRecalibree;			
	}
		
		$CheminImageRecalibree = $_SERVER["DOCUMENT_ROOT"] . "/projects/uniiti/img/tmp/";
		if (!empty($_POST['image1'])) {
			CompresserImage ($_POST['image1'], $CheminImageRecalibree . "couv1.jpg", 1750);
//			$image1 = $CheminImageRecalibree . "couv1.png";
//			CreerImageCouverture($_POST['image1'], $image1, $_POST['y1']);
			$image1 = SITE_URL . "/img/tmp/couv1.jpg";
			}
		else {$image1 = SITE_URL . "/img/pictos_popins/couv_popin2.jpg";}
		if (!empty($_POST['image2'])) {
			CompresserImage ($_POST['image2'], $CheminImageRecalibree . "couv2.jpg", 1750);
			$image2 = SITE_URL . "/img/tmp/couv2.jpg";
			}
		else {$image2 = "";}
		if (!empty($_POST['image3'])) {
			CompresserImage ($_POST['image3'], $CheminImageRecalibree . "couv3.jpg", 1750);
			$image3 = SITE_URL . "/img/tmp/couv3.jpg";
			}
		else {$image3 = "";}
		if (!empty($_POST['image4'])) {
			CompresserImage ($_POST['image4'], $CheminImageRecalibree . "couv4.jpg", 1750);
			$image4 = SITE_URL . "/img/tmp/couv4.jpg";
			}
		else {$image4 = "";}
		if (!empty($_POST['image5'])) {
			CompresserImage ($_POST['image5'], $CheminImageRecalibree . "couv5.jpg", 1750);
			$image5 = SITE_URL . "/img/tmp/couv5.jpg";
			}
		else {$image5 = "";}

	
	?>

<body>


<div class="couverture_wrapper">
	<div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
	<div class="couverture_head">
		<div class="couverture_img_container">
			<img src="<?php echo SITE_URL; ?>/img/pictos_popins/couverture_icon.png" title="" alt="" height="37" width="37" />
		</div><span class="maintitle">Images de couverture</span>
	</div>  

	<div class="couverture_step1_body">
		<div class="couverture_img_items_wrapper">
				<ul id="sortable">
					<li id="couverture_img_item1" class="couverture_img_item">
						<div class="couverture_img_item_nbr_img_txt"><span>1</span></div>
						<img src="<?php echo $image1 ?>" title="" alt=""/>
						<div class="couverture_img_item_container_draggable_icon"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_draggable.png" title="" alt=""/></div>
					</li>

					<li id="couverture_img_item2" class="couverture_img_item">
						<div class="couverture_img_item_nbr_img_txt"><span>2</span></div>
						<img src="<?php echo $image2 ?>" title="" alt=""/>
						<div class="couverture_img_item_container_draggable_icon"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_draggable.png" title="" alt=""/></div>
					</li>

					<li id="couverture_img_item3" class="couverture_img_item">
						<div class="couverture_img_item_nbr_img_txt"><span>3</span></div>
						<img src="<?php echo $image3 ?>" title="" alt=""/>
						<div class="couverture_img_item_container_draggable_icon"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_draggable.png" title="" alt=""/></div>
					</li>

					<li id="couverture_img_item4" class="couverture_img_item">
						<div class="couverture_img_item_nbr_img_txt"><span>4</span></div>
						<img src="<?php echo $image4 ?>" title="" alt=""/>
						<div class="couverture_img_item_container_draggable_icon"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_draggable.png" title="" alt=""/></div>
					</li>
					
					<li id="couverture_img_item5" class="couverture_img_item">
						<div class="couverture_img_item_nbr_img_txt"><span>5</span></div>
						<img src="<?php echo $image5 ?>" title="" alt=""/>
						<div class="couverture_img_item_container_draggable_icon"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_draggable.png" title="" alt=""/></div> 
					</li>
				</ul>
			</div>
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
						<li><a id="image1" href="#" onclick="InitSortable();" alt="">1</a></li>
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
<script>    
			function InitSortable() {
				$( "#sortable" ).sortable();
				$( "#sortable" ).disableSelection();
			};

			InitSortable();
</script>

</body>
</html>