<?php
include_once '../config/configuration.inc.php';
include_once '../config/configPDO.inc.php';
header('Access-Control-Allow-Origin: *');
;
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
    <table>
        <tr>
            <th>Déjeuner</th>
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
                $nb = 0;
                while ($maxTime > $beginTime) {
                    if ($firstItemSelected == false) {
                        $firstItemSelected = true;
                        echo '<td class="full selected">' . date('H:i', $beginTime) . '</td>';
                    } else {
                        echo '<td class="full">' . date('H:i', $beginTime) . '</td>';
                    }
                    $beginTime = strtotime('+30 minutes', $beginTime);
                    $nb++;
                }
                //ajout de bloc vide pour combler le rectangle
                if ($nb == 0 || ($nb % 5 != 0)) {
                    if ($nb == 0) {
                        echo '<td class="empty">/</td>';
                        echo '<td class="empty">/</td>';
                        echo '<td class="empty">/</td>';
                        echo '<td class="empty">/</td>';
                        echo '<td class="empty">/</td>';
                    } else {
                        while ($nb % 5 != 0) {
                            echo '<td class="empty">/</td>';
                            $nb++;
                        }
                    }
                }
            }
            ?>
        </tr>

        <tr>
            <th>Dîner</th>
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
                $nb = 0;
                while ($maxTime > $beginTime) {
                    if ($firstItemSelected == false) {
                        $firstItemSelected = true;
                        echo '<td class="full selected">' . date('H:i', $beginTime) . '</td>';
                    } else {
                        echo '<td class="full">' . date('H:i', $beginTime) . '</td>';
                    }
                    $beginTime = strtotime('+30 minutes', $beginTime);
                    $nb++;
                }
                //ajout de bloc vide pour combler le rectangle
                if ($nb == 0 || ($nb % 5 != 0)) {
                    if ($nb == 0) {
                        echo '<td class="empty">/</td>';
                        echo '<td class="empty">/</td>';
                        echo '<td class="empty">/</td>';
                        echo '<td class="empty">/</td>';
                        echo '<td class="empty">/</td>';
                    } else {
                        while ($nb % 5 != 0) {
                            echo '<td class="empty">/</td>';
                            $nb++;
                        }
                    }
                }
            }
            ?>
        </tr>
    </table>

    <?php
}   //=====================================================================================
//=============================Horaires de l'enseigne non renseignées =====================================
//=====================================================================================
else {
    ?>
    <table>
        <tr>
            <th>Malheureusement il n'y plus d'horaires de réservation pour cette journée</th>
        </tr>    
    </table>
    <?php
}
?>