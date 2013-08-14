<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
        <?php
        include_once '../config/configuration.inc.php';
        include'../includes/head.php'; ?>
    <body>
        <?php include'../includes/header.php'; ?>
        <div class="biggymarginer">
        <div class="big_wrapper">
            <div class="liseret_bleu"></div>
            <div class="inscription_head"><h2><img src="../img/pictos_inscription/new_user.png" height="68" width="77" title="" alt="" />Créer un compte en seulement <span>3 étapes</span></h2></div>
            <div class="inscription_fields_left inscription_final_step_left">
                <div class="inscription_final_step_img_container"><img src="../img/pictos_inscription/new_user_created.png" height="197" width="190" title="" alt="" /></div>
                <div class="inscription_final_step_txt_container">
                <span class="inscription_final_step_texte_highlight1">Bravo !</span>
                <span class="inscription_final_step_texte_highlight2">Votre compte</span><span class="inscription_final_step_texte_highlight2">est créé</span>
                <span class="inscription_final_step_texte_highlight3">Vous voyez, cela n'était pas si long !</span>
                </div>
            </div>
            <div class="inscription_fields_left inscription_final_step_right"><div class="AbsoluteCenter"><a href="../index.php"><span class="inscription_final_step_right_texte">Retour à la</span><span class="inscription_final_step_right_texte_highlight">page d'accueil</span></a></div></div>
            <div class="containing_rondou"><div class="inscription_final_step_rondou"><span>Ou</span></div></div>
            <div class="inscription_fields_left inscription_final_step_right2"><div class="AbsoluteCenter"><a href="utilisateur.php"><span class="inscription_final_step_right_texte">Accéder à</span><span class="inscription_final_step_right_texte_highlight">votre profil</span></a></div></div>
        </div><!-- FIN BIG WRAPPER -->
        </div><!-- FIN BIGGY -->
 <?php include'../includes/js.php' ?>
    </body>
</html>
