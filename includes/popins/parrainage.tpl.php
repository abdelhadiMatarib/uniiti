<?php
        include_once '../../config/configuration.inc.php';
        include'../head.php'; ?>
<div class="parrainage_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="parrainage_head">
        <div class="parrainage_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/parrainage_icon.png" title="" alt="" height="36" width="37" />
        </div><span class="maintitle">Parrainez vos amis</span>
    </div>   
    <div class="parrainage_body">
            
        <div class="parrainage_option1">
            <div class="parrainage_option1_img_container"> <img src="<?php echo SITE_URL; ?>/img/pictos_popins/parrainage_arobase.png" title="" alt="" height="15" width="18" /></div>
            <span class="parrainage_option_txt">Option 1 |</span><span class="parrainage_option_txt2">Inviter vos amis par email</span>
        </div>
        <div class="parrainage_option1_body">
            <input class="parrainage_input_destinataires" type="text" />
            <input class="parrainage_input_objet" type="text" />
            <textarea class="parrainage_input_message">Bonjour, Rejoins-moi sur Uniiti.com, le premier site d’avis en France. Grâce à Uniiti.com, j'ai accès à des milliers d’avis sur les commerces, objets et films ! Alors, rejoins moi ? A tout de suite sur Uniiti.com ! David B.</textarea>
        </div>
            
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
