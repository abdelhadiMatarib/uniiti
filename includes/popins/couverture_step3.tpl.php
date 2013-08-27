<?php
        include_once '../../config/configuration.inc.php';
        include'../head.php'; ?>
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
<script>    
    $('.popin_close_button').click(function(e){
    e.preventDefault(); //don't go to default URL
    var defaultdialog = $("#default_dialog").dialog();
    defaultdialog.dialog('close');
    });
</script>
</html>

