<?php
        include_once '../../config/configuration.inc.php';
        include'../head.php'?>
<div class="wishlist_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="wishlist_wrapper_body_img">
        <img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_wishlist_large.png" title="" alt="" height="147" width="147" />
    </div>
    <div class="wishlist_wrapper_footer_txt">
        <span class="wishlist_wrapper_footer_txt_normal">Vous avez <span class="wishlist_wrapper_footer_txt_bold">ajouté</span> ce commerce</span>
    </div>
</div>
<script>    
    $('.popin_close_button').click(function(e){
    e.preventDefault(); //don't go to default URL
    var defaultdialog = $("#default_dialog").dialog();
    defaultdialog.dialog('close');
    });
</script>
</html>