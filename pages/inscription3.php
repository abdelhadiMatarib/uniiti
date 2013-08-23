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
            <div class="inscription_head2">
                <div class="inscription_step1"><h3>Informations générales</h3></div>
                <div class="inscription_step2"><h3>Choix de l'avatar</h3></div>
                <div class="inscription_step3 inscription_current_step_texte_head"><h3>Vos centres d'intérêts</h3></div>
            </div>
            <div class="inscription_centres_interets_big_wrap">
             <div class="inscription_centres_interets_aime_texte"><h3>Bien, maintenant dites-nous </h3><h3 class="inscription_centres_interets_aime_texte_highlight"> 5 choses </h3><h3> que </h3><h3 class="inscription_centres_interets_aime_texte_highlight"> vous aimez</h3></div>
                <div class="inscription_centres_interets_aime_wrap">

					<?php include'../includes/requeteinscription.php'; ?>
   
                </div>
            </div><!-- FIN CENTRES INTERETS BIG WRAP -->
             <div class="inscription_centres_interets_aime_wrap2">
                 <span class="inscription_centres_interets_choix_texte">X choix</span>
                 <span class="inscription_centres_interets_choix_texte_highlight">restants</span>
                 <ul>
                    <li><img src="../img/pictos_inscription/choix_centresinterets.png" height="37" width="45" title="" alt=""/></li>
                    <li><img src="../img/pictos_inscription/choix_centresinterets.png" height="37" width="45" title="" alt=""/></li>
                    <li><img src="../img/pictos_inscription/choix_centresinterets.png" height="37" width="45" title="" alt=""/></li>
                    <li><img src="../img/pictos_inscription/choix_centresinterets.png" height="37" width="45" title="" alt=""/></li>
                    <li><img src="../img/pictos_inscription/choix_centresinterets.png" height="37" width="45" title="" alt=""/></li>
                 </ul>
             </div>
            
            <div class="inscription_wrap_next_step2">
            <div class="inscription_next_step2">
                <div class="inscription_current_step"><span class="inscription_current_step_number">3</span><span class="inscription_current_step_etape_texte">étape</span></div>
                <div class="inscription_next_step_button2"><a href="inscription3b.php" title="">Suivant</a></div>
            
            
        </div><!-- FIN BIG WRAPPER -->
            </div><!-- FIN BIGGY -->
 <?php include'../includes/js.php' ?>
    </body>
</html>
