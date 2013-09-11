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

    <body>
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
            .gestion_content h2{display:block;}
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
            .dashboard_notif_item_body{float:left;}
            .dashboard_notif_item_body p{padding:10px;margin:0;}
            .dashboard_notif_item_body_small_head{float:left;padding:10px;width:100%;}
            span.dashboard_notif_txt_normal{font-size:1em;font-weight:normal;display:inline-block;}
            span.dashboard_notif_txt_bold{margin-left:5px;font-size:1em;font-weight:700;display:inline-block;}
            span.suppression_warning{margin-bottom:10px;color:#ff3f3f;font-size:1.2em;font-weight:700;text-transform:uppercase;}
            input.input_dashboard_large{position:relative;width:100%;height:20px;border:1px solid #acacac;padding:5px 10px;}
            input_dashboard_large_suppression{position:absolute;top:0;right:0;}
        </style>
        <div class="dashboard_wrap"><!-- DASH WRAP -->
            <div class="dashboard_cube_ariane">
                <div class="dashboard_cube_item dashboard_cube_item_haut item dashboard_cube_item_c"><a href="#" title=""><span>Ajouter</span><span class="dashboard_txt_bold">des avis</span></a></div>
            </div>
            <div class="dashboard_ombre_small"><img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/ombre_cube_small.png"/></div>
            <div class="dashboard_content gestion_content">
                <div class="dashboard_center_title"><h2><a href="#" title="">Notifications commerces </a></h2><h2>|<a href="#" title=""> Suggestions commerces</a></h2></div>
                    <div class="dashboard_notif_wrap">
                        <!-- ITEM -->
                        <div class="dashboard_notif_item">
                            <div class="dashboard_notif_item_head">
                                <div class="dashboard_notif_item_head_img_container">
                                    <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/photo_notif.jpg"/>
                                </div>
                                <div class="dashboard_notif_item_head_desc">
                                    <span class="dashboard_notif_nom_commerce">Restaurant Chez les Artistes</span>
                                    <span class="dashboard_notif_motif">Demande de modification du profil</span>
                                    <span class="dashboard_notif_temps">Il y a 2 jours</span>
                                </div>
                                <div class="dashboard_notif_item_head_buttons">
                                    <a href="#" class="first_img_margin" title=""><img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_suppr.png"/></a>
                                    <a href="#" title=""><img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_valide.png"/></a>
                                </div>
                            </div>
                            <div class="dashboard_notif_item_body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam dapibus sed est sit amet laoreet. Donec enim neque, cursus vitae euismod at, faucibus nec neque. Etiam diam magna, ultrices ac commodo a, sodales non odio. Aliquam vel aliquet libero. Ut pellentesque odio nibh, eget euismod magna mollis quis. Sed lectus leo, mollis in sollicitudin quis, egestas a lorem.</p>
                            </div>
                        </div>
                        <!-- ITEM -->
                                                <!-- ITEM -->
                        <div class="dashboard_notif_item">
                            <div class="dashboard_notif_item_head">
                                <div class="dashboard_notif_item_head_img_container">
                                    <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/photo_notif.jpg"/>
                                </div>
                                <div class="dashboard_notif_item_head_desc">
                                    <span class="dashboard_notif_nom_commerce">Restaurant Positano</span>
                                    <span class="dashboard_notif_motif">Demande de suppression d'un avis</span>
                                    <span class="dashboard_notif_temps">Il y a 4 jours</span>
                                </div>
                                <div class="dashboard_notif_item_head_buttons">
                                    <a href="#" class="first_img_margin" title=""><img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_suppr.png"/></a>
                                    <a href="#" title=""><img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_valide.png"/></a>
                                </div>
                            </div>
                            <div class="dashboard_notif_item_body">
                                <div class="dashboard_notif_item_body_small_head">
                                <span class="dashboard_notif_txt_normal">Commentaire laissé par Arnaud K.</span><span class="dashboard_notif_txt_bold">Motif de suppression : Avis à caractère diffamatoire</span>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam dapibus sed est sit amet laoreet. Donec enim neque, cursus vitae euismod at, faucibus nec neque. Etiam diam magna, ultrices ac commodo a, sodales non odio. Aliquam vel aliquet libero. Ut pellentesque odio nibh, eget euismod magna mollis quis. Sed lectus leo, mollis in sollicitudin quis, egestas a lorem.</p>
                            </div>
                        </div>
                        <!-- ITEM -->
                        <h2>Suppression d'un commerce</h2>
                        <span class="suppression_warning">Attention cette action est définitive</span>
                        <input class="input_dashboard_large" type="text" placeholder="NOM DU COMMERCE"/>
                        <div class="input_dashboard_large_suppression">
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