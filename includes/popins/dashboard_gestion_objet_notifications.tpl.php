<?php 
	include_once '../../acces/auth.inc.php';                 // Gestion accès à la page - incluant la session	
	include_once '../../config/configuration.inc.php';
	include_once '../../config/configPDO.inc.php';
?>                      
                        <!-- ITEM NOTIFICATIONS -->
                        <div class="dashboard_notif_item">
                            <div class="dashboard_notif_item_head">
                                <div class="dashboard_notif_item_head_img_container">
                                    <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/photo_notif_objet.jpg"/>
                                </div>
                                <div class="dashboard_notif_item_head_desc">
                                    <span class="dashboard_notif_nom_commerce">Ipad mini</span>
                                    <span class="dashboard_notif_motif">Demande de modification de la page</span>
                                    <span class="dashboard_notif_temps">Il y a 2 jours</span>
                                </div>
                                <div class="dashboard_notif_item_head_buttons">
                                    <a href="#" class="first_img_margin dashboard_notif_bouton_suppr" title=""><img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_suppr.png"/></a>
                                    <a href="#" title="" class="dashboard_notif_bouton_valide"><img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_valide.png"/></a>
                                </div>
                            </div>
                            <div class="dashboard_notif_item_body">
                                <div class="dashboard_notif_item_body_small_head">
                                <span class="dashboard_notif_txt_normal">Demande formulée par Arnaud K.</span>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam dapibus sed est sit amet laoreet. Donec enim neque, cursus vitae euismod at, faucibus nec neque. Etiam diam magna, ultrices ac commodo a, sodales non odio. Aliquam vel aliquet libero. Ut pellentesque odio nibh, eget euismod magna mollis quis. Sed lectus leo, mollis in sollicitudin quis, egestas a lorem.</p>
                            </div>
                        </div>
                        <!-- ITEM -->
                        
                       <!-- ITEM NOTIFICATIONS -->
                        <div class="dashboard_notif_item">
                            <div class="dashboard_notif_item_head">
                                <div class="dashboard_notif_item_head_img_container">
                                    <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/photo_notif_objet.jpg"/>
                                </div>
                                <div class="dashboard_notif_item_head_desc">
                                    <span class="dashboard_notif_nom_commerce">Ipad mini</span>
                                    <span class="dashboard_notif_motif">Demande de modification de la page</span>
                                    <span class="dashboard_notif_temps">Il y a 2 jours</span>
                                </div>
                                <div class="dashboard_notif_item_head_buttons">
                                    <a href="#" class="first_img_margin dashboard_notif_bouton_suppr" title=""><img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_suppr.png"/></a>
                                    <a href="#" title="" class="dashboard_notif_bouton_valide"><img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_valide.png"/></a>
                                </div>
                            </div>
                            <div class="dashboard_notif_item_body">
                                <div class="dashboard_notif_item_body_small_head">
                                <span class="dashboard_notif_txt_normal">Demande formulée par Arnaud K.</span>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam dapibus sed est sit amet laoreet. Donec enim neque, cursus vitae euismod at, faucibus nec neque. Etiam diam magna, ultrices ac commodo a, sodales non odio. Aliquam vel aliquet libero. Ut pellentesque odio nibh, eget euismod magna mollis quis. Sed lectus leo, mollis in sollicitudin quis, egestas a lorem.</p>
                            </div>
                        </div>
                       <script>
                            $('.dashboard_notif_temps .box_posttime time img').attr('src','../img/pictos_actions/clock_b.png');
                            $('.dashboard_notif_temps .box_posttime').css('width','auto').css('padding','5px 0px 0px 0px').css('text-align','left').css('color','white');
                        </script>
                        <!-- ITEM -->
                      