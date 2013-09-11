<?php 
	include_once '../../acces/auth.inc.php';                 // Gestion accès à la page - incluant la session	
	include_once '../../config/configuration.inc.php';
	include_once '../../config/configPDO.inc.php';
?>                      
                        <!-- ITEM SUGGESTION -->
                        <div class="dashboard_notif_item">
                            <div class="dashboard_notif_item_head">
                                <div class="dashboard_notif_item_head_img_container">
                                    <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/photo_notif.jpg"/>
                                </div>
                                <div class="dashboard_notif_item_head_desc">
                                    <span class="dashboard_notif_nom_commerce">The Conjuring, les dossiers Warren</span>
                                    <span class="dashboard_notif_motif">Notification d'ajout d'objet</span>
                                    <span class="dashboard_notif_temps">Il y a 2 jours</span>
                                </div>
                                <div class="dashboard_notif_item_head_buttons">
                                    <a href="#" class="first_img_margin" title=""><img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_suppr.png"/></a>
                                    <a href="#" title=""><img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_valide.png"/></a>
                                </div>
                            </div>
                            <div class="dashboard_notif_item_body">
                                <div class="dashboard_notif_item_float_left">
                                    <span class="dashboard_notif_txt_bold2">Nom de l'objet :</span><span class="dashboard_notif_txt_normal2"> The conjuring, les dossiers Warren</span>
                                </div>
                                
                                <div class="dashboard_notif_item_float_left">
                                    <span class="dashboard_notif_txt_bold2">Catégorie :</span><span class="dashboard_notif_txt_normal2"> Sorties & Loisirs</span>
                                </div>
                                
                                <div class="dashboard_notif_item_float_left">
                                    <span class="dashboard_notif_txt_bold2">Sous-catégorie :</span><span class="dashboard_notif_txt_normal2"> Cinéma</span>
                                </div>
                                
                                <div class="dashboard_notif_item_float_left">
                                    <span class="dashboard_notif_txt_bold2">Sous-sous catégorie :</span><span class="dashboard_notif_txt_normal2"> Thriller/Horreur</span>
                                </div>
                                
                                <div class="dashboard_notif_item_float_left">
                                    <span class="dashboard_notif_txt_bold2">Descriptif :</span><span class="dashboard_notif_txt_normal2"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae dui quis mauris varius commodo nec nec velit. Donec et tristique enim. Suspendisse potenti.</span>
                                </div>
                            </div>
                        </div>
                        <!-- ITEM -->
                       