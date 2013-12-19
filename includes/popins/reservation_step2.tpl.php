<?php
include_once '../../config/configuration.inc.php';
include'../head.php';
include_once '../../config/configPDO.inc.php';
//selim
/**
 * Selection des horaires
 */
$idEnseigne = $_POST['id_enseigne'];
$sDateReservation = $_POST['date'];
$aDateReservation = explode('/', $sDateReservation);
$oDate = new DateTime($aDateReservation[2] . '-' . $aDateReservation[1] . '-' . $aDateReservation[0]);

$sDateToday = $aDateReservation[2] . '-' . $aDateReservation[1] . '-' . $aDateReservation[0];

$req = $bdd->prepare('select * from enseignes_horaires where enseignes_id_enseigne=:idenseigne');
$req->execute(array('idenseigne' => $idEnseigne));
$aHoraires = $req->fetch(PDO::FETCH_OBJ);
/*
 * day from sunday0 ->saturday 6
 * test if open or closed
 */

$iCurrentDay = $oDate->format('w');
$bClosed = false;
//s'il sagit d un dimanche et que l'enseigne n'est pas ouverte le dimanche
if ($iCurrentDay == 0 and (empty($aHoraires->dimanche) or ($aHoraires->dimanche == 'Fermé'))) {
    $bClosed = true;
} elseif ($iCurrentDay == 0) {
    //sinon on récup les horaires de l'enseigne
    $aHorairesDay = explode(',', $aHoraires->dimanche);
}
if ($iCurrentDay == 1 and (empty($aHoraires->lundi) or ($aHoraires->lundi == 'Fermé'))) {
    $bClosed = true;
} elseif ($iCurrentDay == 1) {
    $aHorairesDay = explode(',', $aHoraires->lundi);
}
if ($iCurrentDay == 2 and (empty($aHoraires->mardi) or ($aHoraires->mardi == 'Fermé'))) {
    $bClosed = true;
} elseif ($iCurrentDay == 2) {
    $aHorairesDay = explode(',', $aHoraires->mardi);
}
if ($iCurrentDay == 3 and (empty($aHoraires->mercredi) or ($aHoraires->mercredi == 'Fermé'))) {
    $bClosed = true;
} elseif ($iCurrentDay == 3) {
    $aHorairesDay = explode(',', $aHoraires->mercredi);
}
if ($iCurrentDay == 4 and (empty($aHoraires->jeudi) or ($aHoraires->jeudi == 'Fermé'))) {
    $bClosed = true;
} elseif ($iCurrentDay == 4) {
    $aHorairesDay = explode(',', $aHoraires->jeudi);
}
if ($iCurrentDay == 5 and (empty($aHoraires->vendredi) or ($aHoraires->vendredi == 'Fermé'))) {
    $bClosed = true;
} elseif ($iCurrentDay == 5) {
    $aHorairesDay = explode(',', $aHoraires->vendredi);
}
if ($iCurrentDay == 6 and (empty($aHoraires->samedi) or ($aHoraires->samedi == 'Fermé'))) {
    $bClosed = true;
} elseif ($iCurrentDay == 6) {
    $aHorairesDay = explode(',', $aHoraires->samedi);
}
$firstItemSelected = false;
if (!$bClosed and !empty($aHorairesDay)) {
    //=====================================================================================
    //=============================Horaires de l'enseigne renseignées =====================================
    //=====================================================================================
    ?>

    <div class="reservation_wrapper">

        <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
        <div class="reservation_head">
            <div class="reservation_img_container">
                <img src="<?php echo SITE_URL; ?>/img/pictos_popins/reservation_icon.png" title="" alt="" height="36" width="37" />
            </div><span class="maintitle">Réservation</span>

        </div>
        <div class="reservation_body">
            <?php
            /**
             * $horaire => dans la bdd = 10:30,12:30,14:30,20:00
             */
            //horaires matin
            ?>
            <div class="reservation_option1">
                <div class="reservation_option1_img_container"> <img src="<?php echo SITE_URL; ?>/img/pictos_popins/reservation_icon_horaires.png" title="" alt="" height="17" width="17" /></div>
                <span class="reservation_option_txt">Étape 2 | </span><span class="parrainage_option_txt2">Choisissez l'horaire</span>
            </div>
            <div class="reservation_horaires_body">
                <div class="left100">
                    <div class="reservation_horaires_dejeuner_txt">
                        <span>Déjeuner</span>
                    </div>
                    <?php
                    
                    if (!empty($aHorairesDay[0]) and !empty($aHorairesDay[1])) {
                        $actualTime = strtotime(date('H:i'));
                        $beginTime = strtotime($aHorairesDay[0] . ':00');
                        $maxTime = strtotime($aHorairesDay[1] . ':00');
                        //si le temps actuel < temps de fermeture
                        if (date('Y-m-d') == $sDateToday) {
                            if ($actualTime < $maxTime) {
                                //si le temps actuel > temps d'ouverture
                                if ($beginTime < $actualTime) {
                                    // formatage de $actualTime

                                    $aActualTime = date('H:i', $actualTime);
                                    $aActualTime = explode(":", $aActualTime);
                                    //on change ver s l'heure qui suit
                                    if ($aActualTime[1] > 20) {
                                        $beginTime = ($aActualTime[0] + 1) . ':00';
                                    } else {
                                        $beginTime = ($aActualTime[0]) . ':30';
                                    }
                                    $beginTime = strtotime($beginTime);
                                }
                            } else {
                                $beginTime = $maxTime;
                            }
                        }
                        while ($maxTime > $beginTime) {
                            if ($firstItemSelected==false) {
                                $firstItemSelected = true;
                               echo '<div class="reservation_horaires_nbr_default valid_horaire"><a href="#" title="">' . date('H:i', $beginTime) . '</a></div>';
                            } else {
                                echo '<div class="reservation_horaires_nbr_default"><a href="#" title="">' . date('H:i', $beginTime) . '</a></div>';
                            }
                            $beginTime = strtotime('+30 minutes', $beginTime);
                        }
                    }
                    ?>
                </div>

                <div class="left100">
                    <div class="reservation_horaires_diner_txt">
                        <span>Dîner</span>
                    </div>
    <?php
    if (!empty($aHorairesDay[2]) and !empty($aHorairesDay[3])) {
        $actualTime = strtotime(date('H:i'));
        $beginTime = strtotime($aHorairesDay[2] . ':00');
        $maxTime = strtotime($aHorairesDay[3] . ':00');
        //si le temps actuel < temps de fermeture
        if (date('Y-m-d') == $sDateToday) {
            if ($actualTime < $maxTime) {
                //si le temps actuel > temps d'ouverture
                if ($beginTime < $actualTime) {
                    // formatage de $actualTime

                    $aActualTime = date('H:i', $actualTime);
                    $aActualTime = explode(":", $aActualTime);
                    //on change ver s l'heure qui suit
                    if ($aActualTime[1] > 20) {
                        $beginTime = ($aActualTime[0] + 1) . ':00';
                    } else {
                        $beginTime = ($aActualTime[0]) . ':30';
                    }
                    $beginTime = strtotime($beginTime);
                }
            } else {
                $beginTime = $maxTime;
            }
        }
        while ($maxTime > $beginTime) {
            if ($firstItemSelected==false) {
                $firstItemSelected = true;
               echo '<div class="reservation_horaires_nbr_default valid_horaire"><a href="#" title="">' . date('H:i', $beginTime) . '</a></div>';
            } else {
                echo '<div class="reservation_horaires_nbr_default"><a href="#" title="">' . date('H:i', $beginTime) . '</a></div>';
            }
            $beginTime = strtotime('+30 minutes', $beginTime);
        }
    }
    ?>

                </div>
            </div>

            <div class="reservation_step2_footer">
                <div class="reservation_step2_footer_retour_dates">
                    <a href="#" title="" onclick="EtapePrecedente();">Modifier la date</a>
                </div>
                <div class="reservation_step2_3_vertical_sep"></div>
                <div class="reservation_step2_footer_etape_suivante">
                    <a href="#" title="" onclick="EtapeSuivante();">Étape suivante</a>   
                </div>

            </div>

        </div>
    </div>
    <script>
        $(".reservation_horaires_nbr_default").click(function(e) {
            e.preventDefault(); //don't go to default URL
            e.stopPropagation();
            if (!$(this).hasClass("valid_horaire")) {
                $(".reservation_horaires_nbr_default").removeClass('valid_horaire');
                $(this).addClass('valid_horaire');
            }
        });

        function EtapePrecedente() {
            var data = {
                step : 3,
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
                            chemin : ''
                        };
                        ActualisePopin(data, '/includes/popins/reservation_step1.tpl.php', 'default_dialog');
                    };


                    function EtapeSuivante() {
                        var data = {
                            step : 3,
                            date : '<?php
                if (!empty($_POST['date'])) {
                    echo $_POST['date'];
                }
                ?>',
                            heure : $('.reservation_horaires_nbr_default.valid_horaire a').text(),
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
                        };
                        ActualisePopin(data, '/includes/popins/reservation_step3.tpl.php', 'default_dialog');
                    };
    </script>
    <?php
}   //=====================================================================================
//=============================Horaires de l'enseigne non renseignées =====================================
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
                <span class="reservation_option_txt">Malheureusement il n'y plus d'horaires de réservation pour cette journée</span><span class="parrainage_option_txt2"></span>
            </div>
        </div>
    </div>
    <?php
}
?>