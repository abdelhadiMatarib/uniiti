<?php
include_once '../../config/configuration.inc.php';
include_once '../../config/configPDO.inc.php';
include'../head.php';
?>

<?php
//selim
/**
 * Selection des horaires
 */
$idEnseigne = $_POST['id_enseigne'];

$req = $bdd->prepare('select * from enseignes_horaires where enseignes_id_enseigne=:idenseigne');
$req->execute(array('idenseigne' => $idEnseigne));
$aHoraires = $req->fetch(PDO::FETCH_OBJ);
if (!empty($aHoraires)) {
    //=====================================================================================
    //=============================Horaires de l'enseigne renseignée =====================================
    //=====================================================================================
    //recherche des jours où l'enseigne est fermé
    $aDaysToHide = null;
    if (empty($aHoraires->dimanche) or ($aHoraires->dimanche == 'Fermé')) {
        $aDaysToHide[] = 0;
    }
    if (empty($aHoraires->lundi) or ($aHoraires->lundi == 'Fermé')) {
        $aDaysToHide[] = 1;
    }
    if (empty($aHoraires->mardi) or ($aHoraires->mardi == 'Fermé')) {
        $aDaysToHide[] = 2;
    }
    if (empty($aHoraires->mercredi) or ($aHoraires->mercredi == 'Fermé')) {
        $aDaysToHide[] = 3;
    }
    if (empty($aHoraires->jeudi) or ($aHoraires->jeudi == 'Fermé')) {
        $aDaysToHide[] = 4;
    }
    if (empty($aHoraires->vendredi) or ($aHoraires->vendredi == 'Fermé')) {
        $aDaysToHide[] = 5;
    }
    if (empty($aHoraires->samedi) or ($aHoraires->samedi == 'Fermé')) {
        $aDaysToHide[] = 6;
    }
    ?>
    <div class="reservation_wrapper">
        <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
        <div class="reservation_head">
            <div class="reservation_img_container">
                <img src="<?php echo SITE_URL; ?>/img/pictos_popins/reservation_icon.png" title="" alt="" height="36" width="37" />
            </div><span class="maintitle">Réservation</span>
        </div>   
        <div class="reservation_body">

            <div class="reservation_option1">
                <div class="reservation_option1_img_container"> <img src="<?php echo SITE_URL; ?>/img/pictos_popins/reservation_icon_why.png" title="" alt="" height="19" width="13" /></div>
                <span class="reservation_option_txt">Pourquoi réserver avec Uniiti </span><span class="parrainage_option_txt2"></span>
            </div>
            <div class="reservation_option1_body">
                <div class="reservation_option1_body_txt"><span>Réserver en ligne n'a que des avantages !</span></div>
                <div class="reservation_option1_body_txt2">
                    <span>- Le service est accessible à toute heure</span>
                    <span>- Vous recevez une confirmation immédiate par email et SMS</span>
                    <span>- Il est donc inutile d’appeler le restaurant</span>
                    <span>- C’est 100% gratuit !</span>
                </div>
            </div>

            <div class="reservation_option2">
                <div class="reservation_option2_img_container"> <img src="<?php echo SITE_URL; ?>/img/pictos_popins/reservation_calendar_icon.png" title="" alt="" height="20" width="17" /></div>
                <span class="reservation_option_txt">Étape 1 | </span><span class="reservation_option_txt2"> Choisissez la date</span>
            </div>
            <div class="reservation_option2_body">
                <div class="reservation_option2_body_centered body_calendrier">
                    <div id="datepicker"></div>
                </div>
            </div>
            <div class="reservation_step1_footer"><a href="#" title="" onclick="EtapeSuivante();">Étape suivante</a></div>

        </div>
    </div>

    <script>
        $(function() {
            jQuery(function($){
                $.datepicker.regional['fr'] = {
                    closeText: 'Fermer',
                    prevText: 'Précédent',
                    nextText: 'Suivant',
                    currentText: 'Aujourd\'hui',
                    minDate: 0,
                    monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
                        'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
                    monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin',
                        'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
                    dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
                    dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
                    dayNamesMin: ['Dim.','Lun.','Mar.','Mer.','Jeu.','Ven.','Sam.'],
                    weekHeader: 'Sem.',
                    dateFormat: 'dd/mm/yy',
                    firstDay: 1,
                    isRTL: false,
                    showMonthAfterYear: false,
                    yearSuffix: ''
                    };
                $.datepicker.setDefaults($.datepicker.regional['fr']);
                $( "#datepicker" ).datepicker({selectable:true,beforeShowDay: setCustomDate });
            });
        });
                                
        function setCustomDate(date) {
          
            var d = new Date(date);
            var n = d.getDay();
            var out = [];
    <?php
//pas propre !!!!
    if (!empty($aDaysToHide)) {
        foreach ($aDaysToHide as $iDateNum) {
            ?>
                            out.push(<?php echo $iDateNum ?>);
            <?php
        }
    }
    ?>
            var result =[];
            if(out.length==0){
                result.push(true);
            }else{
                       
                if(out.indexOf(n)>=0){
                    result.push(false);
                }else{
                    result.push(true);
                }
            }
            return result;
        }
                                        
        function EtapeSuivante() {
            var data = {
                step : 2,
                date : ''+$( "#datepicker" ).val()+'',
                id_contributeur : '<?php
    if (!empty($_POST['id_contributeur'])) {
        echo $_POST['id_contributeur'];
    }
    ?>',
                id_enseigne :'<?php
    if (!empty($_POST['id_enseigne'])) {
        echo $_POST['id_enseigne'];
    }
    ?>',
                nom_enseigne :'<?php
    if (!empty($_POST['nom_enseigne'])) {
        echo $_POST['nom_enseigne'];
    }
    ?>',
                prevenir_reservation :'<?php
    if (!empty($_POST['prevenir_reservation'])) {
        echo $_POST['prevenir_reservation'];
    }
    ?>',
                email_reservation :'<?php
    if (!empty($_POST['email_reservation'])) {
        echo $_POST['email_reservation'];
    }
    ?>',
                telephone_reservation :'<?php
    if (!empty($_POST['telephone_reservation'])) {
        echo $_POST['telephone_reservation'];
    }
    ?>',
                chemin : ''
            };console.log(data);
            ActualisePopin(data, '/includes/popins/reservation_step2.tpl.php', 'default_dialog');
        };
    </script>
    <?php
}

//=====================================================================================
//============================= Horaires de l'enseigne non renseignées =====================================
//=====================================================================================
else {
    ?>
    <div class="reservation_wrapper">
        <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
        <div class="reservation_head">
            <div class="reservation_img_container">
                <img src="<?php echo SITE_URL; ?>/img/pictos_popins/reservation_icon.png" title="" alt="" height="36" width="37" />
            </div><span class="maintitle">Réservation</span>
        </div>
        <div class="reservation_body">

            <div class="reservation_option1">
                <div class="reservation_option1_img_container"> <img src="<?php echo SITE_URL; ?>/img/pictos_popins/reservation_icon_why.png" title="" alt="" height="19" width="13" /></div>
                <span class="reservation_option_txt">Malheureusement l'enseigne n'a pas renseignée ses horaires </span><span class="parrainage_option_txt2"></span>
            </div>
        </div>
    </div>

    <?php
}
?>