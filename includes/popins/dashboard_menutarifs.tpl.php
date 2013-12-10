<?php
include_once '../../config/configuration.inc.php';
include_once '../../config/configPDO.inc.php';

if (!empty($_POST['id_enseigne'])) {
    $id_enseigne_ou_objet = $_POST['id_enseigne'];
    $sql = "SELECT t1.id_enseignes_prestations, t1.id_type_info, t1.prestation, t2.id_contenu, t2.contenu, t2.prix FROM enseignes_prestations AS t1
						INNER JOIN enseignes_prestations_contenus AS t2
						ON t1.id_enseignes_prestations = t2.id_prestation 
						WHERE t1.enseignes_id_enseigne=:id_enseigne_ou_objet";
} else if (!empty($_POST['id_objet'])) {
    $id_enseigne_ou_objet = $_POST['id_objet'];
    $sql = "SELECT t1.id_type_info, t1.prestation, t2.id_contenu, t2.contenu, t2.prix FROM objets_prestations AS t1
						INNER JOIN objets_prestations_contenus AS t2
						ON t1.objets_id_objet = t2.objets_id_objet AND t1.id_type_info = t2.id_type_info
						WHERE t1.objets_id_objet=:id_enseigne_ou_objet";
} else {
    echo "vous ne pouvez pas accéder directement à cette page !\n<a href=\"" . SITE_URL . "\">Revenir à la page principale</a>";
    exit;
}
$req = $bdd->prepare($sql);
$req->bindParam(':id_enseigne_ou_objet', $id_enseigne_ou_objet, PDO::PARAM_INT);
$req->execute();
$result = $req->fetchAll(PDO::FETCH_ASSOC);
$idPresta = null;
$aPrestations = null;

// Selim
//organisation des resultats sous forme d'un tableau de prestations
//prestation
//   |_ contenu 1
//   |_ contenu 2
foreach ($result as $row) {
    //si c est une nouvelle presta
    if ($idPresta == null || $idPresta != $row['id_enseignes_prestations']) {
        $idPresta = $row['id_enseignes_prestations'];
    }
    $aPrestations[$idPresta]['name'] = $row['prestation'];

    //si on a  du contenu
    if (!empty($row['id_contenu'])) {
        $aPrestations[$idPresta]['contents'][$row['id_contenu']]['name'] = $row['contenu'];
        $aPrestations[$idPresta]['contents'][$row['id_contenu']]['price'] = $row['prix'];
    }
}
?>  
<form id="send-menu-form" method="POST">
    <?php
    if (!empty($_POST['id_enseigne'])) {
        echo '<input name="id_enseigne" value="' . $_POST['id_enseigne'] . '" type="hidden" />';
        echo '<input name="step" value="Prestations" type="hidden" />';
    }
    ?>
    <div class="menutarifs_wrapper">
        <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
        <div class="menutarifs_head">
            <div class="ident_img_container">
                <img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_menutarifs.png" title="" alt="" height="36" width="36" />
            </div><span class="maintitle">Prestations & Tarifs</span>
        </div>
        <div class="menutarifs_body left100" id="menu-body-content">

            <?php
            //Pas de prestations
            if (empty($aPrestations)) {
                ?>
                <?php
            } else {
                /*
                 * Array
                  (
                  [7](prestation id) => Array
                  (
                  [name] => titre de la prestation
                  [contenus] => Array
                  (
                  [1] (content id) => Array
                  (
                  [name] => contenu1
                  [price] => 0.00
                  )

                  )

                  )

                  )
                 */
                $i = 1;
                $z = 1;
                foreach ($aPrestations as $idPrestation => $aPrest) {//if we have many prestations    
                    //keep .prestation-ligne => used with javascript to get the number of current prestation
                    ?>
                    <div class="menutarifs_body_desserts prestation-ligne">
                        <img src="/img/plus.png" class="add-prestation-content" alt="<?php echo $i; ?>" title="Ajouter un contenu" />
                        <div class="menutarifs_body_desserts_head">
                            <span><input name="prestation[<?php echo $i; ?>][nom]" type="text" class="input_menustarifs" value="<?php echo $aPrest['name'] ?>"/></span>
                        </div>
                        <div class="content-list left100">
                            <?php
                            foreach ($aPrest['contents'] as $idContent => $aContent) {
                                ?>
                                <div class="left100">
                                    <div class="menutarifs_body_entrees_entree_generique dashboard_menutarifs_nopadding"><span><input name="prestation[<?php echo $i; ?>][ligne][<?php echo $z; ?>][content]" type="text" class="input_menustarifs" value="<?php echo $aContent['name']; ?>"/></span></div>
                                    <div class="menutarifs_body_entrees_prix_generique dashboard_menutarifs_largerprice"><span><input name="prestation[<?php echo $i; ?>][ligne][<?php echo $z; ?>][price]" type="text" maxlength=7 class="input_infos_horaires input_prix_mini" value="<?php echo $aContent['price']; ?>"/>€</span></div>
                                </div>
                                <?php
                                $z++;
                            }//============================== end foreach contents
                            ?>
                        </div>

                    </div>


                    <?php
                    $i++;
                }//============================== end foreach prestation
            }
            ?>
        </div>
        <div class="left100">
            <div id="add-prestation" class="valider_dialog_large"><a href="#">Ajouter une prestation</a></div>
        </div>
        <div class="suggestioncommerce_footer">
            <div id="save-menu" class="valider_dialog_large"><a href="#">Enregistrer</a></div>
        </div>
    </div>

</form>
<script>
    function moveToNext(field,nextFieldID){
        if (field.value.length >= field.maxLength){document.getElementById(nextFieldID).focus();}
    }

    // getElementById
    function $id(id) {return document.getElementById(id);}

</script>

<script type="text/javascript" >
    //selim 
    var oTarifs = {
        nbContent : null,
        //menu-body-content
        init: function(){
            oTarifs.nbContent =1;
            $(document).on('click', '#add-prestation', oTarifs.AddPrestation);
            $(document).on('click', '.add-prestation-content', oTarifs.AddPrestationContent);
            $(document).on('click', '#save-menu', oTarifs.SavePrestation);
        },
        /**
         * Add a html prestation row in the main content
         */
        AddPrestation : function(){
            var nbPrestation = $('.prestation-ligne').size();
            //html
            var html = '<div class="menutarifs_body_desserts prestation-ligne">'+
                '<img src="/img/plus.png" class="add-prestation-content" alt="'+(nbPrestation+1)+'" title="Ajouter un contenu" />'+
                '<div class="menutarifs_body_desserts_head">'+
                '<span><input name="prestation['+(nbPrestation+1)+'][nom]" type="text" class="input_menustarifs" placeholder="titre de la prestation"></span>'+
                '</div>'+
                '<div class="content-list left100">'+
                '<div class="left100">'+
                '<div class="menutarifs_body_entrees_entree_generique dashboard_menutarifs_nopadding"><span><input name="prestation['+(nbPrestation+1)+'][ligne]['+(oTarifs.nbContent)+'][content]" type="text" class="input_menustarifs" placeholder="Contenu"></span></div>'+
                '<div class="menutarifs_body_entrees_prix_generique dashboard_menutarifs_largerprice"><span><input name="prestation['+(nbPrestation+1)+'][ligne]['+(oTarifs.nbContent)+'][price]" type="text" maxlength="7" class="input_infos_horaires input_prix_mini" value="0.00">€</span></div>'+
                '</div>'+
                '</div>'+
                            
                '</div>';
            $('#menu-body-content').append(html);
        },
        /**
         * Add a new content row to current prestation 
         */
        AddPrestationContent: function(){
            var nb;
            oTarifs.nbContent++;
            //find current prestation num
            nb = $(this).attr('alt');
            var nbInput = $("input").size();
            
            var html = '<div class="left100">'+
                '<div class="menutarifs_body_entrees_entree_generique dashboard_menutarifs_nopadding"><span><input name="prestation['+(nb)+'][ligne]['+(nbInput)+'][content]" type="text" class="input_menustarifs" placeholder="Contenu"></span></div>'+
                '<div class="menutarifs_body_entrees_prix_generique dashboard_menutarifs_largerprice"><span><input name="prestation['+(nb)+'][ligne]['+(nbInput)+'][price]" type="text" maxlength="7" class="input_infos_horaires input_prix_mini" value="0.00">€</span></div>'+
                '</div>';
            $(this).parent().find('.content-list').append(html);
            
        },
        /**
         * Send ajax request to save prestation
         */
        SavePrestation : function(){
            var url = '/includes/requetemodifieenseigne.php';
            $.ajax({
                       
                type :"POST",
                url : url,
                data : $("#send-menu-form").serialize(),
                success: function(result){window.location.reload();},
                error: function(xhr) {console.log(xhr);alert('Erreur '+xhr.responseText);}
            });
        }
        
    }
    
    oTarifs.init();
</script>