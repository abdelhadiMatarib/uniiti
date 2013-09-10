<?php
        include_once '../../config/configuration.inc.php';
        include'../head.php'?>
<div class="menutarifs_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="menutarifs_head">
        <div class="ident_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_menutarifs.png" title="" alt="" height="36" width="36" />
        </div><span class="maintitle">Menu & Tarifs</span>
    </div>   
    <div class="menutarifs_body">
        <div class="menutarifs_body_entrees">
            <div class="menutarifs_body_entrees_head">
                <span>Suggestions d'entrées</span>
            </div>
            <div class="menutarifs_body_entrees_entree_generique dashboard_menutarifs_nopadding"><span><input type="text" class="input_menustarifs" placeholder="Titre de l'entrée 1"/></span></div>
            <div class="menutarifs_body_entrees_prix_generique dashboard_menutarifs_largerprice"><span><input type="text" maxlength=3 class="input_infos_horaires input_prix_mini" placeholder="Prix"/><span class="span_float_left_prix">,</span><input type="text" maxlength=2 class="input_infos_horaires input_prix_mini" placeholder="Prix" onkeyup="moveToNext(this,'prix2')"/></span></div>
            <div class="menutarifs_body_entrees_entree_generique dashboard_menutarifs_nopadding"><span><input type="text" class="input_menustarifs" placeholder="Titre de l'entrée 2"/></span></div>
            <div class="menutarifs_body_entrees_prix_generique dashboard_menutarifs_largerprice"><span><input id="prix2" type="text" maxlength=3 class="input_infos_horaires input_prix_mini" placeholder="Prix"/><span class="span_float_left_prix">,</span><input type="text" maxlength=2 class="input_infos_horaires input_prix_mini" placeholder="Prix" onkeyup="moveToNext(this,'prix3')"/></span></div>
            <div class="menutarifs_body_entrees_entree_generique dashboard_menutarifs_nopadding"><span><input type="text" class="input_menustarifs" placeholder="Titre de l'entrée 3"/></span></div>
            <div class="menutarifs_body_entrees_prix_generique dashboard_menutarifs_largerprice"><span><input id="prix3" type="text" maxlength=3 class="input_infos_horaires input_prix_mini" placeholder="Prix"/><span class="span_float_left_prix">,</span><input type="text" maxlength=2 class="input_infos_horaires input_prix_mini" placeholder="Prix" onkeyup="moveToNext(this,'prix4')"/></span></div>
            <div class="menutarifs_body_entrees_entree_generique dashboard_menutarifs_nopadding"><span><input type="text" class="input_menustarifs" placeholder="Titre de l'entrée 4"/></span></div>
            <div class="menutarifs_body_entrees_prix_generique dashboard_menutarifs_largerprice"><span><input id="prix4" type="text" maxlength=3 class="input_infos_horaires input_prix_mini" placeholder="Prix"/><span class="span_float_left_prix">,</span><input type="text" maxlength=2 class="input_infos_horaires input_prix_mini" placeholder="Prix" onkeyup="moveToNext(this,'prix5')"/></span></div>
            <div class="menutarifs_body_entrees_entree_generique dashboard_menutarifs_nopadding"><span><input type="text" class="input_menustarifs" placeholder="Titre de l'entrée 5"/></span></div>
            <div class="menutarifs_body_entrees_prix_generique dashboard_menutarifs_largerprice"><span><input id="prix5" type="text" maxlength=3 class="input_infos_horaires input_prix_mini" placeholder="Prix"/><span class="span_float_left_prix">,</span><input type="text" maxlength=2 class="input_infos_horaires input_prix_mini" placeholder="Prix"/></span></div>
        </div>
        <div class="menutarifs_body_plats">
            <div class="menutarifs_body_plats_head">
                <span>Suggestions de plats principaux</span>
            </div>
            <div class="menutarifs_body_entrees_entree_generique dashboard_menutarifs_nopadding"><span><input type="text" class="input_menustarifs" placeholder="Titre du plat 1"/></span></div>
            <div class="menutarifs_body_entrees_prix_generique dashboard_menutarifs_largerprice"><span><input type="text" maxlength=3 class="input_infos_horaires input_prix_mini" placeholder="Prix"/><span class="span_float_left_prix">,</span><input type="text" maxlength=2 class="input_infos_horaires input_prix_mini" placeholder="Prix" onkeyup="moveToNext(this,'prix2')"/></span></div>
            <div class="menutarifs_body_entrees_entree_generique dashboard_menutarifs_nopadding"><span><input type="text" class="input_menustarifs" placeholder="Titre du plat 2"/></span></div>
            <div class="menutarifs_body_entrees_prix_generique dashboard_menutarifs_largerprice"><span><input id="prix2" type="text" maxlength=3 class="input_infos_horaires input_prix_mini" placeholder="Prix"/><span class="span_float_left_prix">,</span><input type="text" maxlength=2 class="input_infos_horaires input_prix_mini" placeholder="Prix" onkeyup="moveToNext(this,'prix3')"/></span></div>
            <div class="menutarifs_body_entrees_entree_generique dashboard_menutarifs_nopadding"><span><input type="text" class="input_menustarifs" placeholder="Titre du plat 3"/></span></div>
            <div class="menutarifs_body_entrees_prix_generique dashboard_menutarifs_largerprice"><span><input id="prix3" type="text" maxlength=3 class="input_infos_horaires input_prix_mini" placeholder="Prix"/><span class="span_float_left_prix">,</span><input type="text" maxlength=2 class="input_infos_horaires input_prix_mini" placeholder="Prix" onkeyup="moveToNext(this,'prix4')"/></span></div>
            <div class="menutarifs_body_entrees_entree_generique dashboard_menutarifs_nopadding"><span><input type="text" class="input_menustarifs" placeholder="Titre du plat 4"/></span></div>
            <div class="menutarifs_body_entrees_prix_generique dashboard_menutarifs_largerprice"><span><input id="prix4" type="text" maxlength=3 class="input_infos_horaires input_prix_mini" placeholder="Prix"/><span class="span_float_left_prix">,</span><input type="text" maxlength=2 class="input_infos_horaires input_prix_mini" placeholder="Prix" onkeyup="moveToNext(this,'prix5')"/></span></div>
            <div class="menutarifs_body_entrees_entree_generique dashboard_menutarifs_nopadding"><span><input type="text" class="input_menustarifs" placeholder="Titre du plat 5"/></span></div>
            <div class="menutarifs_body_entrees_prix_generique dashboard_menutarifs_largerprice"><span><input id="prix5" type="text" maxlength=3 class="input_infos_horaires input_prix_mini" placeholder="Prix"/><span class="span_float_left_prix">,</span><input type="text" maxlength=2 class="input_infos_horaires input_prix_mini" placeholder="Prix"/></span></div>
        </div>
        <div class="menutarifs_body_desserts">
            <div class="menutarifs_body_desserts_head">
                <span>Suggestions de desserts</span>
            </div>
            <div class="menutarifs_body_entrees_entree_generique dashboard_menutarifs_nopadding"><span><input type="text" class="input_menustarifs" placeholder="Titre du dessert 1"/></span></div>
            <div class="menutarifs_body_entrees_prix_generique dashboard_menutarifs_largerprice"><span><input type="text" maxlength=3 class="input_infos_horaires input_prix_mini" placeholder="Prix"/><span class="span_float_left_prix">,</span><input type="text" maxlength=2 class="input_infos_horaires input_prix_mini" placeholder="Prix" onkeyup="moveToNext(this,'prix2')"/></span></div>
            <div class="menutarifs_body_entrees_entree_generique dashboard_menutarifs_nopadding"><span><input type="text" class="input_menustarifs" placeholder="Titre du dessert 2"/></span></div>
            <div class="menutarifs_body_entrees_prix_generique dashboard_menutarifs_largerprice"><span><input id="prix2" type="text" maxlength=3 class="input_infos_horaires input_prix_mini" placeholder="Prix"/><span class="span_float_left_prix">,</span><input type="text" maxlength=2 class="input_infos_horaires input_prix_mini" placeholder="Prix" onkeyup="moveToNext(this,'prix3')"/></span></div>
            <div class="menutarifs_body_entrees_entree_generique dashboard_menutarifs_nopadding"><span><input type="text" class="input_menustarifs" placeholder="Titre du dessert 3"/></span></div>
            <div class="menutarifs_body_entrees_prix_generique dashboard_menutarifs_largerprice"><span><input id="prix3" type="text" maxlength=3 class="input_infos_horaires input_prix_mini" placeholder="Prix"/><span class="span_float_left_prix">,</span><input type="text" maxlength=2 class="input_infos_horaires input_prix_mini" placeholder="Prix" onkeyup="moveToNext(this,'prix4')"/></span></div>
            <div class="menutarifs_body_entrees_entree_generique dashboard_menutarifs_nopadding"><span><input type="text" class="input_menustarifs" placeholder="Titre du dessert 4"/></span></div>
            <div class="menutarifs_body_entrees_prix_generique dashboard_menutarifs_largerprice"><span><input id="prix4" type="text" maxlength=3 class="input_infos_horaires input_prix_mini" placeholder="Prix"/><span class="span_float_left_prix">,</span><input type="text" maxlength=2 class="input_infos_horaires input_prix_mini" placeholder="Prix" onkeyup="moveToNext(this,'prix5')"/></span></div>
            <div class="menutarifs_body_entrees_entree_generique dashboard_menutarifs_nopadding"><span><input type="text" class="input_menustarifs" placeholder="Titre du dessert 5"/></span></div>
            <div class="menutarifs_body_entrees_prix_generique dashboard_menutarifs_largerprice"><span><input id="prix5" type="text" maxlength=3 class="input_infos_horaires input_prix_mini" placeholder="Prix"/><span class="span_float_left_prix">,</span><input type="text" maxlength=2 class="input_infos_horaires input_prix_mini" placeholder="Prix"/></span></div>
        </div>
       
    </div>
    <div class="suggestioncommerce_footer">
        
        <div class="valider_dialog_large"><a href="#">Enregistrer</a></div>
        
    </div>
</div>
<script>
        function moveToNext(field,nextFieldID){
  if(field.value.length >= field.maxLength){
    document.getElementById(nextFieldID).focus();
  }
}
</script>
</html>