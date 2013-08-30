<?php
        include_once '../../config/configuration.inc.php';
        include'../head.php'?>
<div class="dislike_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="dislike_wrapper_body_img">
        <img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_dislike_large.png" title="" alt="" height="147" width="147" />
    </div>
    <div class="dislike_wrapper_footer_txt">
        <span class="dislike_wrapper_footer_txt_normal">Vous <span class="dislike_wrapper_footer_txt_bold">n'aimez pas</span> ce commerce</span>
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