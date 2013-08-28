<?php
	include_once '../../config/configuration.inc.php';
	include'../head.php';
	
	switch($_POST['step']) {
		case 1:
			?>
			<div class="couverture_wrapper">
				<div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
				<div class="couverture_head">
					<div class="couverture_img_container">
						<img src="<?php echo SITE_URL; ?>/img/pictos_popins/couverture_icon.png" title="" alt="" height="37" width="37" />
					</div><span class="maintitle">Images de couverture</span>
				</div>   
				<div class="couverture_step1_body">
						
					<div class="couverture_step1_dropzone">
						<div class="couverture_step1_dropzone_img_container">
							<img src="<?php echo SITE_URL; ?>/img/pictos_popins/img_upload.png" title="" alt="" height="50" width="51" />
						</div>
						<div class="couverture_step1_dropzone_txt">
						<span class="couverture_step1_dropzone_txt1">Glissez-déposez une image dans le cadre</span>
						<span class="couverture_step1_dropzone_txt2">Ou choisissez une image sur <a href="#" title="">votre ordinateur</a></span>
						</div>
					</div>
						
				</div>
				<div class="couverture_step1_footer">
					<div class="couverture_step1_footer_vertical_sep"></div>
					<div class="couverture_step1_infos"><div class="couverture_step_1_infos_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/couverture_infos_icon.png" title="" alt="" height="23" width="23" /></div><span>Une fois le chargement de/des images effectué, vous pourrez les ajuster pour un affichage optimal.</span></div>

					<div class="couverture_arianne">
						<div class="couverture_arianne_txt">
						<span class="arianne_txt_1">Vos </span>
						<span class="arianne_txt_2">images</span>
						</div>
						<div class="couverture_arianne_nbr">
							<ul class="couverture_arianne_nbr_liste">
								<li><a href="#" alt="">1</a></li>
								<li><a href="#" alt="">2</a></li>
								<li><a href="#" alt="">3</a></li>
								<li><a href="#" alt="">4</a></li>
								<li><a href="#" alt="">5</a></li>                    
							</ul>
						</div>
					</div>
				</div>
				<div class="couverture_champs_action"><a href="#" title="" onclick="ActualisePopin({step:2}, '/includes/popins/couverture_steps.tpl.php', 'default_dialog_large');"><span>Étape suivante</span></a></div>
			</div>
			
			<?php break;
		case 2: ?>
			<div class="couverture_wrapper">
				<div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
				<div class="couverture_head">
					<div class="couverture_img_container">
						<img src="<?php echo SITE_URL; ?>/img/pictos_popins/couverture_icon.png" title="" alt="" height="37" width="37" />
					</div><span class="maintitle">Images de couverture</span>
				</div>   
				<div class="couverture_step1_body">
					<div class="couverture_step1_dropzone couverture_step2_dropzone">
						<div class="couverture_step1_wrap_buttons">
							<div class="couverture_step1_button_supprimer"></div>
							<div class="couverture_step1_button_valider"></div>
						</div>
						<div class="couverture_step2_resize_infos">
							<div class="couverture_step2_resize_infos_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/couverture_resize_icon.png" title="" alt="" height="18" width="10" /></div>
							<span>cliquez pour repositionner l'image</span>
						</div>
						<img src="<?php echo SITE_URL; ?>/img/pictos_popins/couv_popin2.jpg" title="" alt="" height="189" width="660" />
						
					</div>
						
				</div>
				<div class="couverture_step1_footer">
					<div class="couverture_step1_footer_vertical_sep"></div>
					<div class="couverture_step1_infos"><div class="couverture_step_1_infos_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/couverture_infos_icon.png" title="" alt="" height="23" width="23" /></div><span>Validez vos images en les repositionnant afin que le rendu soit le plus optimal sur le site.</span></div>
					<div class="couverture_arianne">
						<div class="couverture_arianne_txt">
						<span class="arianne_txt_1">Vos </span>
						<span class="arianne_txt_2">images</span>
						</div>
						<div class="couverture_arianne_nbr">
							<ul class="couverture_arianne_nbr_liste">
								<li><a href="#" alt="">1</a></li>
								<li><a href="#" alt="">2</a></li>
								<li><a href="#" alt="">3</a></li>
								<li><a href="#" alt="">4</a></li>
								<li><a href="#" alt="">5</a></li>                    
							</ul>
						</div>
					</div>
				</div>
				<div class="couverture_champs_action"><a href="#" title="" onclick="ActualisePopin({step:3}, '/includes/popins/couverture_steps.tpl.php', 'default_dialog_large');"><span>Étape suivante</span></a></div>
			</div>
			<?php break;
		case 3: ?>
			<div class="couverture_wrapper">
				<div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
				<div class="couverture_head">
					<div class="couverture_img_container">
						<img src="<?php echo SITE_URL; ?>/img/pictos_popins/couverture_icon.png" title="" alt="" height="37" width="37" />
					</div><span class="maintitle">Images de couverture</span>
				</div>   
				<div class="couverture_step1_body">
					<div class="couverture_img_items_wrapper">
						<div class="couverture_img_container_center1">
					<div id="couverture_img_item1" class="couverture_img_item">
						<div class="couverture_img_item_nbr_img_txt"><span>1</span></div>
						<img src="<?php echo SITE_URL; ?>/img/pictos_popins/couv_popin2.jpg" title="" alt=""/>
						<div class="couverture_img_item_container_draggable_icon"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_draggable.png" title="" alt=""/></div>
					</div>
					<div id="couverture_img_item2" class="couverture_img_item">
						<div class="couverture_img_item_nbr_img_txt"><span>2</span></div>
						<div class="couverture_img_item_container_draggable_icon"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_draggable.png" title="" alt=""/></div>
					</div>
					<div id="couverture_img_item3" class="couverture_img_item">
						<div class="couverture_img_item_nbr_img_txt"><span>3</span></div>
						<div class="couverture_img_item_container_draggable_icon"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_draggable.png" title="" alt=""/></div>
					</div>
						</div>
						<div class="couverture_img_container_center2">
					<div id="couverture_img_item4" class="couverture_img_item">
						<div class="couverture_img_item_nbr_img_txt"><span>4</span></div>
						<div class="couverture_img_item_container_draggable_icon"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_draggable.png" title="" alt=""/></div>
					</div>
					<div id="couverture_img_item5" class="couverture_img_item">
						<div class="couverture_img_item_nbr_img_txt"><span>5</span></div>
						<div class="couverture_img_item_container_draggable_icon"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_draggable.png" title="" alt=""/></div> 
					</div>
						</div>
					</div>
				</div>
				<div class="couverture_step1_footer">
					<div class="couverture_step1_footer_vertical_sep"></div>
					<div class="couverture_step1_infos"><div class="couverture_step_1_infos_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/couverture_infos_icon.png" title="" alt="" height="23" width="23" /></div><span>Validez vos images en les repositionnant afin que le rendu soit le plus optimal sur le site.</span></div>
					<div class="couverture_arianne">
						<div class="couverture_arianne_txt">
						<span class="arianne_txt_1">Vos </span>
						<span class="arianne_txt_2">images</span>
						</div>
						<div class="couverture_arianne_nbr">
							<ul class="couverture_arianne_nbr_liste">
								<li><a href="#" alt="">1</a></li>
								<li><a href="#" alt="">2</a></li>
								<li><a href="#" alt="">3</a></li>
								<li><a href="#" alt="">4</a></li>
								<li><a href="#" alt="">5</a></li>                    
							</ul>
						</div>
					</div>
				</div>
				<div class="couverture_champs_action"><a href="#" title=""><span>Enregistrer</span></a></div>
			</div>
			
			<?php break;
		default:
			echo "vous ne pouvez pas accéder directement à cette page !\n<a href=\"" . SITE_URL . "\">Revenir à la page principale</a>"; exit;
			break;
	}
?>
<script>    
    $('.popin_close_button').click(function(e){
    e.preventDefault(); //don't go to default URL
    var defaultdialog = $("#default_dialog_large").dialog();
    defaultdialog.dialog('close');
    });
</script>




