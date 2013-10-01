<?php
        include_once '../../config/configuration.inc.php';
        include'../head.php';
?>

<div class="suggestioncommerce_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="suggestioncommerce_head">
        <div class="suggestioncommerce_img_container">
           <img src="<?php echo SITE_URL; ?>/img/pictos_popins/infospersos_icon_user.png" title="" alt="" height="37" width="37" />
        </div><span class="maintitle">Informations personnelles</span>
    </div>   
    <div class="suggestioncommerce_body">
            
        <div class="suggestion_valide_txt"><span>Vos informations personnelles ont bien été modifiées.</span></div>
            
    </div>
    <div class="suggestioncommerce_footer">
        
    <div onclick='window.location.assign("<?php echo SITE_URL . "/pages/utilisateur_interface.php?id_contributeur=" . $_POST['id_contributeur'];?>");' class="modifprofil_valider_wrap">Réactualiser la page / Retour à votre profil</div>
        
    </div>
</div>
</html>
