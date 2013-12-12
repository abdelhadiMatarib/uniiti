<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>My Uniiti badge</title>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,600,700,800,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="/css/badge.css" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    </head>
    <body class="badge-body">
        <?php
        if (!empty($_GET['enseigne']) and is_numeric($_GET['enseigne'])) {
            $id_enseigne = $_GET['enseigne'];

            include_once '../config/configPDO.inc.php';

// On récupère les informations sur les avis
            $sql3 = "SELECT COUNT(id_avis) AS count_avis, AVG(note) AS moyenne
			FROM avis AS t1

			INNER JOIN enseignes_recoient_avis AS t2
			ON t1.id_avis = t2.avis_id_avis
			INNER JOIN enseignes AS t3
				ON t2.enseignes_id_enseigne = t3.id_enseigne
				INNER JOIN contributeurs_donnent_avis AS t4
					ON t1.id_avis = t4.avis_id_avis
					INNER JOIN contributeurs AS t5
						ON t4.contributeurs_id_contributeur = t5.id_contributeur
			WHERE id_enseigne = :id_enseigne
			";

            $req3 = $bdd->prepare($sql3);
            $req3->bindParam(':id_enseigne', $id_enseigne, PDO::PARAM_INT);
            $req3->execute();
            $result3 = $req3->fetch(PDO::FETCH_OBJ);

            $nbavis = $result3->count_avis;
            $moyenne = floatval($result3->moyenne);


            if (strpos($moyenne, '.')) {
                $moyenne = round($result3->moyenne, 1);
            } else {
                if ($result3->moyenne < 10) {
                    $moyenne = '0' . round($result3->moyenne, 1);
                }
            }

            if (!empty($result3->count_avis)) {
                echo '<div class="my-badge">';
                echo '<span class="rate">' . $moyenne . '/10</span>';
                echo '<p class="votes">' . $nbavis . ' AVIS</p>';
                echo '</div>';
            } else {
                echo '<div class="my-badge">';
                echo '<span class="no-rate" >Malheureusement, il n\'y a aucun avis !</span>';
                echo '</div>';
            }
        } else {
            echo 'Error : no valid key found !';
        }
        ?>
        <script type="text/javascript">
            $('.my-badge').click(function(){
                openWindow("http://uniiti.fr/pages/commerce.php?id_enseigne=<?php echo $id_enseigne; ?>");
            });
            function openWindow( url )
            {
                window.open(url, '_blank');
                window.focus();
            }
        </script>
    </body>
</html>