<?php
        include_once '../../config/configuration.inc.php';
        include'../head.php'; ?>
<div class="couverture_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="couverture_head">
        <div class="couverture_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/parrainage_icon.png" title="" alt="" height="36" width="37" />
        </div><span class="maintitle">Images de couverture</span>
    </div>   
    <div class="couverture_step1_body">
            
        <div class="couverture_step1_dropzone"></div>
            
    </div>
    <div class="couverture_step1_footer"></div>
</div>
<script>    
    $('.popin_close_button').click(function(e){
    e.preventDefault(); //don't go to default URL
    var defaultdialog = $("#default_dialog").dialog();
    defaultdialog.dialog('close');
    });
</script>
</html>

