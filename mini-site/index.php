<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="fr"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="fr"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="fr"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="fr"> <!--<![endif]-->
    <head>
        <?php
        include 'inc/data.php';
        include 'inc/functions.php';
        // $iId => shop's id
        ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Uniiti - Mini site</title> <!-- Insérer ici le titre du site -->
        <meta name="description" content=""> <!-- Insérer ici le nom du commerce -->
        <meta name="viewport" content="user-scalable=0,width=device-width,initial-scale=1,maximum-scale=1">

        <!-- Css & Favicon -->
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.css">
        <!-- Javascript & Jquery -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="js/main.js" type="text/javascript"></script>
        <script src="js/jquery.easing.min.js"></script>
        <script src="js/jquery.ascensor.js"></script>
        <script src="js/jquery-ui-1.10.3.custom.min.js"></script>
        <!-- Medias Query pour Ie<9 -->
        <!--[if lt IE 9]>
            <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <![endif]-->
        <!-- Appel de Google fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet' type='text/css'>
        <!-- Initialisation de la Google Map -->
        <?php// var_dump($oShopInfos); die();?>
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>
        <script type="text/javascript">
            var enseigne_id = <?php echo $iId ?>;
            var enseigne_nom = "<?php echo $oShopInfos->enseigne->nom_enseigne; ?>";
            var prevenir_reservation = "<?php echo $oShopInfos->enseigne->prevenir_reservation  ?>";
            var email_reservation = "<?php echo $oShopInfos->enseigne->email_reservation  ?>";
            var telephone_reservation = "<?php echo $oShopInfos->enseigne->telephone_reservation  ?>";
            var address = "<?php echo $oShopInfos->enseigne->adresse1_enseigne . ' ' . $oShopInfos->enseigne->cp_enseigne . ' ' . $oShopInfos->enseigne->nom_ville; ?>";
        </script>
        <script type="text/javascript" src="js/geoloc.js"></script>
        <!-- Initialisation de la galerie -->
        <script type="text/javascript" src="js/galerie.min.js"></script>
        <script type="text/javascript" src="js/galerie.theme.min.js"></script>
        <script type="text/javascript">
            jQuery(function($){
                $.supersized({
                    slide_interval          :   7000,       // Durée de transition
                    transition              :   1,          // Effet de transition 0-Pas d'effet, 1-Fondu
                    transition_speed        :   400,        // Vitesse de transition                                                            
                    slide_links             :   'blank',
                    slides                  :   [           // Images du slider avec description
<?php if ($oShopInfos->enseigne->slide1_enseigne) { ?>
                    {image : 'http://uniiti.fr/photos/enseignes/couvertures/<?php echo $oShopInfos->enseigne->slide1_enseigne; ?>', title : ''},
<?php } ?>
<?php if ($oShopInfos->enseigne->slide2_enseigne) { ?>
                    {image : 'http://uniiti.fr/photos/enseignes/couvertures/<?php echo $oShopInfos->enseigne->slide2_enseigne; ?>', title : ''},  
<?php } ?>
<?php if ($oShopInfos->enseigne->slide3_enseigne) { ?>
                    {image : 'http://uniiti.fr/photos/enseignes/couvertures/<?php echo $oShopInfos->enseigne->slide3_enseigne; ?>', title : ''},
<?php } ?>
<?php if ($oShopInfos->enseigne->slide4_enseigne) { ?>
                    {image : 'http://uniiti.fr/photos/enseignes/couvertures/<?php echo $oShopInfos->enseigne->slide4_enseigne; ?>', title : ""},
<?php } ?>
<?php if ($oShopInfos->enseigne->slide5_enseigne) { ?>                   
                    {image : 'http://uniiti.fr/photos/enseignes/couvertures/<?php echo $oShopInfos->enseigne->slide5_enseigne; ?>', title : ''}
<?php } ?> 
            ]
        });
    });
        </script>
    </head>

    <body>
        <?php
        /**
         * @var = $aShopInfos
         * Array generated by http://uniiti.fr/includes/requeteminisite.php?id_enseigne=XXX
         * and contains all seller's / shop's informations
         */
        ?>
        <nav id="navigationMap"> <!-- Menu vertical avec liens pour accéder aux slides -->
            <ul>
                <li><a class="ascensorLink ascensorLink0"></a></li>
                <li><a class="ascensorLink ascensorLink1"></a></li>
                <li><a class="ascensorLink ascensorLink2"></a></li>
                <li><a class="ascensorLink ascensorLink3"></a></li>
                <li><a class="ascensorLink ascensorLink4"></a></li>
                <li><a class="ascensorLink ascensorLink5"></a></li>
                <li><a class="ascensorLink ascensorLink6"></a></li>
            </ul>
            <button class='ascensorLinkNext'></button>
            <button class='ascensorLinkPrev'></button>
        </nav>

        <div id="navigation">
            <div id="reservation" class="ascensorLink ascensorLink6">Réserver</div>
            <section> <!-- Page d'accueil -->
                <article id="home" style="background-image:url('http://uniiti.fr/photos/enseignes/couvertures/<?php echo $oShopInfos->enseigne->slide1_enseigne; ?>');">
                    <div id="bloc_home">
                        <div id="logo" style="color:white">
                            <!--<img src="img/logo.png">-->
                            <?php echo $oShopInfos->enseigne->nom_enseigne; ?>
                        </div>
                        <p> 
                            <?php
                            if (!empty($oShopInfos->enseigne->descriptif)) {

                                if (strlen($oShopInfos->enseigne->descriptif) > 413) {
                                    echo substr($oShopInfos->enseigne->descriptif, 0, 413) . '...</br> <a class="ascensorLink ascensorLink1" id="readmore">Lire la suite</a>';
                                } else {
                                    echo $oShopInfos->enseigne->descriptif;
                                }
                            }
                            ?>
                        </p>
                    </div>
                    <div id="powered_by">
                        <div id="badge" ><a href="http://uniiti.fr/pages/commerce.php?id_enseigne=<?php echo $iId; ?>" target="_blank" ><h3><?php echo $oShopInfos->enseigne->note ?>/10</h3><p><?php echo $oShopInfos->enseigne->nombre_avis ?> AVIS</p></a></div>
                    </div>
                </article>
            </section>

            <section> <!-- Page Informations -->
                <article id="informations">
                    <div id="informations_bloc"><h1>Informations</h1></div>
                    <div id="informations_textes">
                        <?php if (strlen($oShopInfos->enseigne->descriptif) > 413) { ?>
                            <article id="description">
                                <p>
                                    <?php echo $oShopInfos->enseigne->descriptif; ?>
                                </p> 
                            </article>
                        <?php } ?>
                        <article id="horaires">
                            <h2>Horaires</h2>
                            <ul>

                                <?php
                                if (!empty($oShopInfos->horaires->lundi)) {
                                    $lundi = explode(',', $oShopInfos->horaires->lundi);
                                    if ($lundi[0] == 'Fermé') {
                                        echo '<li><span class="jour">Lundi</span>  <span>' . $lundi[0] . '</span>';
                                    } else {
                                        $lundi = str_replace(':', 'h', $lundi);
                                        echo '<li><span class="jour">Lundi</span>  De <span>' . $lundi[0] . '</span> à <span>' . $lundi[1] . '</span> et de <span>' . $lundi[2] . '</span> à <span>' . $lundi[3] . '</span></li>';
                                    }
                                }
                                if (!empty($oShopInfos->horaires->mardi)) {
                                    $mardi = explode(',', $oShopInfos->horaires->mardi);
                                    if ($mardi[0] == 'Fermé') {
                                        echo '<li><span class="jour">Mardi</span>  <span>' . $mardi[0] . '</span>';
                                    } else {
                                        $mardi = str_replace(':', 'h', $mardi);
                                        echo '<li><span class="jour">Mardi</span>  De <span>' . $mardi[0] . '</span> à <span>' . $mardi[1] . '</span> et de <span>' . $mardi[2] . '</span> à <span>' . $mardi[3] . '</span></li>';
                                    }
                                }
                                if (!empty($oShopInfos->horaires->mercredi)) {
                                    $mercredi = explode(',', $oShopInfos->horaires->mercredi);
                                    if ($mercredi[0] == 'Fermé') {
                                        echo '<li><span class="jour">Mercredi</span>  <span>' . $mercredi[0] . '</span>';
                                    } else {
                                        $mercredi = str_replace(':', 'h', $mercredi);
                                        echo '<li><span class="jour">Mercredi</span>  De <span>' . $mercredi[0] . '</span> à <span>' . $mercredi[1] . '</span> et de <span>' . $mercredi[2] . '</span> à <span>' . $mercredi[3] . '</span></li>';
                                    }
                                }
                                if (!empty($oShopInfos->horaires->jeudi)) {
                                    $jeudi = explode(',', $oShopInfos->horaires->jeudi);
                                    if ($jeudi[0] == 'Fermé') {
                                        echo '<li><span class="jour">Jeudi</span>  <span>' . $jeudi[0] . '</span>';
                                    } else {
                                        $jeudi = str_replace(':', 'h', $jeudi);
                                        echo '<li><span class="jour">Jeudi</span>  De <span>' . $jeudi[0] . '</span> à <span>' . $jeudi[1] . '</span> et de <span>' . $jeudi[2] . '</span> à <span>' . $jeudi[3] . '</span></li>';
                                    }
                                }
                                if (!empty($oShopInfos->horaires->vendredi)) {
                                    $vendredi = explode(',', $oShopInfos->horaires->vendredi);
                                    if ($vendredi[0] == 'Fermé') {
                                        echo '<li><span class="jour">Vendredi</span>  <span>' . $vendredi[0] . '</span>';
                                    } else {
                                        $vendredi = str_replace(':', 'h', $vendredi);
                                        echo '<li><span class="jour">Vendredi</span>  De <span>' . $vendredi[0] . '</span> à <span>' . $vendredi[1] . '</span> et de <span>' . $vendredi[2] . '</span> à <span>' . $vendredi[3] . '</span></li>';
                                    }
                                }
                                if (!empty($oShopInfos->horaires->samedi)) {
                                    $samedi = explode(',', $oShopInfos->horaires->samedi);
                                    if ($samedi[0] == 'Fermé') {
                                        echo '<li><span class="jour">Samedi</span>  <span>' . $samedi[0] . '</span>';
                                    } else {
                                        $samedi = str_replace(':', 'h', $samedi);
                                        echo '<li><span class="jour">Samedi</span>  De <span>' . $samedi[0] . '</span> à <span>' . $samedi[1] . '</span> et de <span>' . $samedi[2] . '</span> à <span>' . $samedi[3] . '</span></li>';
                                    }
                                }
                                if (!empty($oShopInfos->horaires->dimanche)) {
                                    $dimanche = explode(',', $oShopInfos->horaires->dimanche);
                                    if ($dimanche[0] == 'Fermé') {
                                        echo '<li><span class="jour">Dimanche</span>  <span>' . $dimanche[0] . '</span>';
                                    } else {
                                        $dimanche = str_replace(':', 'h', $dimanche);
                                        echo '<li><span class="jour">Dimanche</span>  De <span>' . $dimanche[0] . '</span> à <span>' . $dimanche[1] . '</span> et de <span>' . $dimanche[2] . '</span> à <span>' . $dimanche[3] . '</span></li>';
                                    }
                                }
                                ?>
                                </li>
                            </ul>
                        </article>
                        <article id="parking">
                            <h2>Parking à proximité</h2>
                        </article>
                        <article id="metro">
                            <h2>Métro à proximité</h2>
                        </article>
                        <article id="velib">
                            <h2>Vélib à proximité</h2>
                        </article>
                        <article id="paiement">
                            <h2>Paiements acceptés</h2>
                            <?php
                            /**
                             * var $oShopInfos->horaires->paiement
                             *          |_ moyenpaiement
                             *          |_ posx
                             */
                            ?>
                            <ul>
                                <?php
                                foreach ($oShopInfos->paiement as $oShop) {
                                    echo '<li>' . $oShop->moyenpaiement . '</li>';
                                }
                                ?>
                            </ul>
                        </article>
                        <?php
                        /**
                         * Not sure !
                         * 1 => yes
                         * 2 => no 
                         */
                        if (($oShopInfos->enseigne->voiturier) == 1) {
                            ?>
                            <article id="voiturier">
                                <h2>Service de voiturier</h2>
                                <li>Nous vous proposons un service de voiturier</br>
                                    Pour plus de renseignements, merci de nous contacter au <?php echo $oShopInfos->enseigne->telephone_enseigne; ?>.</li>
                            </article>
                        <?php } ?>
                    </div>
                </article>
            </section>

            <section> <!-- Page Services -->
                <article id="services">
                    <div id="services_bloc"><h1>Services</h1></div>
                    <div id="services_textes">
                        <?php
                        /*
                         * $oShopInfos->prestations contains a collection
                         * of "prestation content" object
                         * 
                         * fields :
                         * object(stdClass)[8]
                         * public 'Test Selim 1' =>
                         *      array (size=1)
                         *          0 =>
                         *              object(stdClass)[9]
                         *              public 'contenu' => string (length=22)
                         *              public 'prix' => string (length=5)
                         */
                        if (!empty($oShopInfos->prestations)) {
                            $i = 1;
                            foreach ($oShopInfos->prestations as $sTitle => $aContent) {
                                echo ' <article id="service_' . $i . '">';
                                echo '<h2>' . $sTitle . '</h2>';
                                echo '<dl>';
                                foreach ($aContent as $aEntry) {

                                    echo '<dt>' . $aEntry->contenu . '</dt><dd>' . $aEntry->prix . ' €</dd>';
                                }
                                echo '</dl>';
                                echo ' </article>';
                                $i++;
                            }
                        }
                        ?>
                    </div>
                </article>
            </section>

            <section> <!-- Page Galerie -->
                <article id="galerie">
                    <!--Contenu du slider appelé dans le js plus haut -->
                    <div id="container"></div>
                    <!-- Gestion du slider -->
                    <div id="progress-bar"></div>
                    <div id="controls-wrapper" class="load-item">
                        <a id="prevslide" class="load-item"></a>
                        <a id="nextslide" class="load-item"></a>
                        <div id="controls">
                            <div id="slidecaption"></div>
                            <ul id="slide-list"></ul>
                        </div>
                    </div>
                    <div id="galerie_bloc"><h1>Galerie Photos</h1></div>
                </article>
            </section>

            <section> <!-- Page Avis -->
                <article id="avis">
                    <div id="avis_bloc"><h1>Les avis</h1></div>
                    <div id="badge"><a href="http://uniiti.fr/pages/commerce.php?id_enseigne=<?php echo $iId; ?>" target="_blank" ><h3><?php echo $oShopInfos->enseigne->note ?>/10</h3><p><?php echo $oShopInfos->enseigne->nombre_avis ?> AVIS</p></a></div>
                    <div id="avis_content">
                        <?php
                        /*  $oShopInfos->avis is a collection of comments /rates
                         *  Oject(stdClass)[12]
                         *       public 'commentaire' => string 'J\'ai regretté la cuisson trop peu al dente des pâtes, apprécié la qualité du vin et le sourire des serveurs malgré quelques gaffes !' (length=139)
                         *       public 'note' => string '8.0' (length=3)
                         *       public 'date_avis' => string '2013-11-13 18:14:02' (length=19)
                         *       public 'prenom_contributeur' => string 'Christie' (length=8)
                         *       public 'nom_contributeur' => string 'S' (length=1)
                         */
                        foreach ($oShopInfos->avis as $oComment) {
                            $fRateToFive = $oComment->note / 2;
                            $iRate = floor($fRateToFive);      // 1
                            $fRateFraction = $fRateToFive - $iRate; // .25
                            echo '<article>';
                            echo '<div id="note">';
                            if (!empty($iRate)) {
                                for ($i = 1; $i <= $iRate; $i++) {
                                    echo '<img src="img/star_full.png"/>';
                                }
                            }
                            if (!empty($fRateFraction) and $fRateFraction >= 0.5) {
                                echo '<img src="img/mark_round.png"/>';
                            }
                            echo '</div>';
                            //avatar
                            echo '<div id="avatar_user">';
                            echo '<img src="http://uniiti.fr/photos/utilisateurs/avatars/' . $oComment->photo_contributeur . '"/>';

                            echo '</div>';

                            echo '<h2>' . round($fRateToFive, 1) . '</h2>';
                            echo '<p>' . $oComment->commentaire . '</p>';

                            echo '<p>';
                            echo 'Avis posté <span>' . EcartDate(date('Y-m-d H:i:s'), $oComment->date_avis) . '</span> par <span>' . $oComment->prenom_contributeur . ' ' . strtoupper($oComment->nom_contributeur) . '.</span>';
                            echo '</p>';

                            echo '</article>';
                        }
                        ?>
                    </div>
                </article>
            </section>

            <section> <!-- Page Contact -->
                <article id="contact">
                    <div id="contacteznous" class="close"></div>
                    <div id="wrapper_form">
                        <div id="contact_form">
                            <form id="formulaire" action="#">
                                <div id="droite">
                                    <label for="nom">Nom & Prénom </label></br>
                                    <input type="text" name="nom" id="nom" /></br>
                                    <label for="email">Email </label></br>
                                    <input type="email" name="email" id="email" /></br>
                                    <label for="sujet">Sujet </label></br>
                                    <input name="text" id="sujet" ></br>
                                </div>
                                <div id="gauche">
                                    <label for="message">Méssage </label></br>
                                    <textarea name="message" id="message" ></textarea></br>
                                    <input type="submit" id="submit" name ="submit" value="Envoyer" />
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="adresse">
                        <p>
                            <span><?php echo $oShopInfos->enseigne->nom_enseigne; ?></span></br>
                            <?php echo $oShopInfos->enseigne->adresse1_enseigne; ?><br />
                            <?php echo $oShopInfos->enseigne->cp_enseigne; ?> 
                            <?php echo $oShopInfos->enseigne->nom_ville; ?><br />
                            <?php echo $oShopInfos->enseigne->telephone_enseigne; ?>
                        </p>
                    </div>
                    <div id="map-canvas"></div>
                </article>
            </section>

            <section> <!-- Page Réservations -->
                <article id="reservations">

                    <div id="reservations_bloc">
                        <h1>Réservations</h1>
                        <h2>Réserver en ligne n’a que des avantages !<h2>
                                <p> - Le service est accessible à toute heure</br>
                                    - Vous recevez une confirmation immédiate par email et SMS</br>
                                    - Il est donc inutile de nous appeler</br>
                                    - C’est 100% gratuit !
                                </p>
                                </div>
                                <?php
                                $aHoraires = $oShopInfos->horaires;
                                
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
                                    ?>
                                    <!-- Step 1 -->
                                    <div id="step1">
                                        <div id="barre-step1"></div><div id="img_step1"></div>
                                        <div class="reservation_stepinfos">
                                            <span class="reservation_step_num">Étape 1 : </span><span class="reservation_step_desc"> Choisissez la date de votre visite</span>
                                        </div>
                                        <div class="reservation_option2_body">
                                            <div class="reservation_option2_body_centered body_calendrier">
                                                <div id="datepicker"></div>
                                            </div>
                                        </div>
                                        <div class="reservation_step_next" id="next_step1"><a href="#" title="">Étape suivante</a></div>
                                    </div>

                                    <!-- Step 2 -->
                                    <div id="step2">
                                        <div id="barre-step2"></div><div id="img_step2"></div>
                                        <div class="reservation_stepinfos">
                                            <span class="reservation_step_num">Étape 2 : </span><span class="reservation_step_desc"> Choisissez l’horaire de votre visite</span>
                                        </div>
                                        <div id="reservation_body" class="table-horaires">
                                        </div>
                                        <div class="reservation_step_next"><a href="#" title="" id="prev_step2">Modifier la date</a> <span>|</span> <a href="#" title="" id="next_step2">Étape suivante</a></div>
                                    </div>

                                    <!-- Step 3 -->
                                    <div id="step3">
                                        <div id="barre-step3"></div><div id="img_step3"></div>
                                        <div class="reservation_stepinfos">
                                            <span class="reservation_step_num">Étape 3 : </span><span class="reservation_step_desc"> Choisissez le nombre de personne</span>
                                        </div>
                                        <div id="reservation_body" class="table-nombre">
                                            <table> 
                                                <tr> 
                                                    <th>Nombre de personnes</th> 
                                                    <td class="full selected" >1</td> 
                                                    <td class="full">2</td> 
                                                    <td class="full">3</td>
                                                    <td class="full">4</td>
                                                    <td class="full">5</td>
                                                    <td class="full">6</td>
                                                    <td class="full">7</td>
                                                    <td class="full">8</td>
                                                    <td class="full">9</td>
                                                    <td class="full">10</td>
                                                    <td id="nombre">Une grande tablée, plus de 10 personnes ?</td>
                                                <input type="text" id="nombre_user" placeholder="11"></input>
                                                </tr> 
                                            </table> 
                                        </div>
                                        <div class="reservation_step_next"><a href="#" title="" id="prev_step3">Modifier l'heure</a><span>|</span> <a href="#" title="" id="next_step3">Étape suivante</a></div>
                                    </div>

                                    <!-- Step 4 -->
                                    <div id="step4">
                                        <div id="barre-step4"></div><div id="img_step4"></div>
                                        <div class="reservation_stepinfos">
                                            <span class="reservation_step_desc">Récapitulatif de votre réservation</span>
                                        </div>
                                        <div id="table_dispo">
                                            <p><span>Une table est disponible !</span></br>
                                                pour le <span>15/11/2013</span> à <span>20:00</span> , <span>8 personnes</span>
                                            </p>
                                        </div>
                                        
                                        <div id="terminer_reservation">
                                            <p>Pour terminer votre réservation, veuillez </br>remplir le formulaire ci-dessous :</p>
                                                <input type="text" name="nom" id="nom_resa" placeholder="Nom" required/>
                                                <input type="text" name="prenom" id="prenom_resa" placeholder="Prenom"/></br>
                                                <input type="text" name="telephone" id="telephone_resa" placeholder="N° de téléphone" required/>
                                                <input type="email" name="email" id="email_resa" placeholder="Email" required/></br>
                                                <textarea name="message" id="message_resa" placeholder="Demande à l’attention du restaurant"></textarea></br>
                                                <input type="checkbox" id="resa_recap_infos"/><label for="resa_recap_infos" class="label_resa">Je souhaite recevoir des informations de la part de ce restaurant</label></br>
                                                <input type="checkbox" id="resa_recap_cgu"/><label for="resa_recap_cgu" class="label_resa">Je reconnais avoir pris connaissance et accepter les <a href="#" class="reservation_recap_body_txt_bleu">conditions générales d'utilisation de Uniiti.com</a></label>
                                                <input type="button" id="submit_resa" name="submit" value="Terminer ma réservation" />
                                        </div>
                                    </div>
                                    </article>
                                    </section>
                                <?php
                                } else {
                                    echo "Malheureusement l'enseigne n'a pas renseigné ses horaires de réservation.";
                                }
                                ?>
                                </div>
                                <script>
                                    $('#navigation').ascensor({
                                        ascensorName: 'ascensor',
                                        childType: 'section',
                                        ascensorFloorName: ['Home','Informations','Services','Galerie','Avis','Contact','Reservation'],
                                        time: 1000,
                                        windowsOn: 0,
                                        direction: "chocolate",
                                        ascensorMap: [[1,0],[2,0],[3,0],[4,0],[5,0],[6,0],[7,0]],
                                        keyNavigation: true,
                                        queued: false,
                                        queuedDirection: "y",
                                        overflow:"hidden"
                                    })

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
                                                yearSuffix: ''};
                                            $.datepicker.setDefaults($.datepicker.regional['fr']);
                                            $( "#datepicker" ).datepicker({selectable:true, beforeShowDay: setCustomDate });
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
      
                                </script>

                                </body>
                                </html>

