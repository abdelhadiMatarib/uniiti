<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<?php 
	include_once '../acces/auth.inc.php';                 // Gestion accès à la page - incluant la session	
	include_once '../config/configuration.inc.php';
	include'../includes/head.php';
	include_once '../includes/fonctions.inc.php';
	include_once '../config/configPDO.inc.php';
?>

    <body class="dashboard">
        <div class="bg_dashboard">
        <div id="default_dialog"></div>
        <div id="default_dialog_large"></div>
        <div id="dialog_overlay">
        <div class="index_overlay"></div>
            <div class="dialog_overlay_wrap_content">
                    <div class="dialog_footer_loader">
                            <img src="<?php echo SITE_URL; ?>/img/pictos_actions/gif_uniiti.gif" height="70" width="70"/>
                    </div>
            </div>
        </div>
        <?php include'../includes/header.php'; ?>
        <div class="biggymarginer">
            <div class="big_wrapper" id="test">

            </div>
        <!-- FIN BIG WRAPPER -->
        <!-- CONTENU PRINCIPAL -->
        <style>
            body.dashboard{background-color:white;}
            .gestion_content h2{display:inline-block;}
            .parametres_content h2{display:block;}
            .dashboard_center_title{text-align:center;}
            .dashboard_center_title h2{display:inline;}
            .dashboard_center_title a{color:#252525;}
            .dashboard_center_title a:hover{color:#acacac;}
            .dashboard_notif_wrap{float: left;width: 620px;height: 200px;margin: 0 37px;}
            .dashboard_notif_item{float:left;margin-top:30px;width:100%;min-height:50px;background-color:white;border:1px solid #acacac;}
            .dashboard_notif_item_head{float:left;width:100%;background-color:#252525;}
            .dashboard_notif_item_head_img_container{float:left;width:200px;height:80px;overflow:hidden;}
            .dashboard_notif_item_head_desc{float:left;padding: 8px 12px;}
            .dashboard_notif_item_head_desc span{display:block;font-size:1.2em;color:white;}
            span.dashboard_notif_nom_commerce{font-weight:700;}
            span.dashboard_notif_temps{font-weight:700;}
            .dashboard_notif_item_head_buttons{float:right;width:76px;padding: 20px 20px 20px 5px;}
            a.first_img_margin{margin-right:5px;}
            .dashboard_notif_item_body{float:left;padding:10px;}
            .dashboard_notif_item_body p{padding:0;margin:0;}
            .dashboard_notif_item_body_small_head{float:left;padding:0 0 10px 0;width:100%;}
            
            span.dashboard_notif_txt_normal{font-size:1em;font-weight:normal;display:inline-block;}
            span.dashboard_notif_txt_bold{margin-left:5px;font-size:1em;font-weight:700;display:inline-block;}
            span.dashboard_notif_txt_normal2{margin-left:5px;font-size:1em;font-weight:normal;display:inline;}
            span.dashboard_notif_txt_bold2{font-size:1em;font-weight:700;display:inline;}
            
            span.suppression_warning{margin-bottom:10px;color:#ff3f3f;font-size:1.2em;font-weight:700;text-transform:uppercase;}
            input.input_dashboard_large{position:relative;margin-bottom:40px;color:#acacac;font-size:1.2em;font-weight:700;width:600px;height:30px;border:1px solid #acacac;padding:5px 10px;}
            input.input_dashboard_large_parametres{position:relative;margin-bottom:10px;color:#acacac;font-size:1.2em;font-weight:700;width:672px;height:30px;border:1px solid #acacac;padding:5px 10px;}
            .input_dashboard_large_suppression{cursor:pointer;position: absolute;top: 34px;right: 2px;}
            .input_dashboard_large_container{cursor:pointer;position: absolute;top: 4px;right: 4px;}
            .suppression_commerce_wrap{position:relative;}
            h2.h2_suppr_commerce{margin-top:20px;}
            .dashboard_notif_item_float_left{float:left;width:100%;}
            
            .dashboard_notif_item_head_buttons a{display:inline-block;width:34px;height:34px;}
            
            .input_dashboard_parametres_wrap{position:relative;}
            .separation_input_parametres{width:100%;height:40px;}
        </style>
        <div class="dashboard_wrap"><!-- DASH WRAP -->
            <div class="dashboard_cube_ariane">
                <div class="dashboard_cube_item dashboard_cube_item_haut item dashboard_cube_item_f"><a href="#" title=""><span>Paramètres</span></a></div>
            </div>
            <div class="dashboard_ombre_small"><img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/ombre_cube_small.png"/></div>
            <div class="dashboard_retour_wrapper"><a href="javascript:history.back()">Retour</a>|<a href="dashboard_index.php">ACCUEIL</a></div>
            <div class="dashboard_content parametres_content">
                <h2>Paramètres Uniiti.com </h2>
                <div class="input_dashboard_parametres_wrap">
                    <input class="input_dashboard_large_parametres" type="text" placeholder="AJOUTER UNE CATÉGORIE"/>
                    <div class="input_dashboard_large_container">
                         <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_valide.png"/>
                    </div>
                </div>
                <div class="input_dashboard_parametres_wrap">
                    <input class="input_dashboard_large_parametres" type="text" placeholder="AJOUTER UNE SOUS-CATÉGORIE"/>
                    <div class="input_dashboard_large_container">
                         <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_valide.png"/>
                    </div>
                </div>
                <div class="input_dashboard_parametres_wrap">
                    <input class="input_dashboard_large_parametres" type="text" placeholder="AJOUTER UNE SOUS-SOUS CATÉGORIE"/>
                    <div class="input_dashboard_large_container">
                         <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_valide.png"/>
                    </div>
                </div>
                <div class="separation_input_parametres"></div>
                <div class="input_dashboard_parametres_wrap">
                    <input class="input_dashboard_large_parametres" type="text" placeholder="SUPPRIMER UNE CATÉGORIE"/>
                    <div class="input_dashboard_large_container">
                         <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_suppr.png"/>
                    </div>
                </div>
                <div class="input_dashboard_parametres_wrap">
                    <input class="input_dashboard_large_parametres" type="text" placeholder="SUPPRIMER UNE SOUS-CATÉGORIE"/>
                    <div class="input_dashboard_large_container">
                         <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_suppr.png"/>
                    </div>
                </div>
                <div class="input_dashboard_parametres_wrap">
                    <input class="input_dashboard_large_parametres" type="text" placeholder="SUPPRIMER UNE SOUS-SOUS CATÉGORIE"/>
                    <div class="input_dashboard_large_container">
                         <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_suppr.png"/>
                    </div>
                </div>
            </div>
        </div><!-- FIN DASH WRAP -->
        <!-- FIN CONTENU PRINCIPAL -->
        </div><!-- FIN BIGGY -->
        <?php include'../includes/js.php' ?>
        </div>
        <script>
        function moveToNext(field,nextFieldID){
        if(field.value.length >= field.maxLength){
          document.getElementById(nextFieldID).focus();
            }
        }
        </script>

    </body>
</html>                                