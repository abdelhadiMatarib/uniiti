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
	<style>
	.display-none {display:none;}
	#suggestionsContainer3 {position: relative;background-color:#f0f0f0;max-width: 620px;top: -40px;left: 0px;z-index:1000;}
	.suggestionList li {cursor:pointer;padding: 3px 0 3px 3px;}
	.suggestionList li.active {background-color: #ffffff;}
	.suggestionList {list-style-type: none;z-index:1000;}
	</style>
	
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
        <div class="dashboard_wrap"><!-- DASH WRAP -->
            <div class="dashboard_cube_ariane">
                <div class="dashboard_cube_item dashboard_cube_item_haut item dashboard_cube_item_c"><a href="#" title=""><span>Gestion des</span><span class="dashboard_txt_bold">commerces</span></a></div>
                <div class="dashboard_notif"><span>5</span></div>
            </div>
            <div class="dashboard_ombre_small"><img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/ombre_cube_small.png"/></div>
            <div class="dashboard_retour_wrapper"><a href="javascript:history.back()">Retour</a>|<a href="dashboard_index.php">ACCUEIL</a></div>
            <div class="dashboard_content gestion_content">
                <div class="dashboard_center_title"><h2><a href="#" title="" class="load_notif_commerce">Notifications commerces </a></h2><h2>|<a href="#" title="" class="load_sugg_commerce"> Suggestions commerces</a></h2></div>
                    <div class="dashboard_notif_wrap">
                        
                        <div class="dashboard_load_notifs">
                            
                        <!-- *DYNAMIC CONTENT HERE* -->
                        
                        </div>
                        <!-- DASHBOARD LOAD NOTIFS -->
                        
                        <h2 class="h2_suppr_commerce">Suppression d'un commerce</h2>
                        <div class="suppression_commerce_wrap">
                        <span class="suppression_warning">Attention cette action est définitive</span>
                        <input class="input_dashboard_large" type="text" placeholder="NOM DU COMMERCE"/>
                        <div class="input_dashboard_large_suppression">
                            <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_suppr.png"/>
                        </div>
                        </div>
                        <div class="suppression_commerce_wrap">
                        <h2 class="h2_suppr_commerce">Modification d'un commerce</h2>
						<input id="inputSearch3" class="input_dashboard_large" type="text" value="" placeholder="NOM DU COMMERCE"/>
						<input id="inputSearch3Hidden" type="hidden" value=""/>
						<div class="suggestionsContainer display-none" id="suggestionsContainer3"><ul class="suggestionList" id="suggestionList3"><li>&nbsp;</li></ul></div>
				
                        <div id="ButtonModifierCommerce" class="input_dashboard_large_validation">
                            <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_valide.png"/>
                        </div>
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
<script>
    $(document).ready(
        $('.load_sugg_commerce').click(function(e){
            e.preventDefault();
           $('.dashboard_load_notifs').slideUp().load('../includes/popins/dashboard_gestion_commerce_suggestions.tpl.php').slideDown();
        }),
        $('.load_notif_commerce').click(function(e){
            e.preventDefault();
           $('.dashboard_load_notifs').slideUp().load('../includes/popins/dashboard_gestion_commerce_notifications.tpl.php').slideDown();
        }),
        $('.dashboard_notif_bouton_suppr').click(function(e){
            e.preventDefault();
           $(this).parents('.dashboard_notif_item').prev().css('display','none');
        })
    );
</script>

    </body>
</html>                                