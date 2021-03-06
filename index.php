<?php
include'config/configuration.inc.php';
include'includes/head.php';
include_once 'config/configPDO.inc.php';
$urlTo = FALSE; // Déclaration variable pour login_access destination
$data = "{}";

$sql = "SELECT COUNT(id_avis) AS count_avis, AVG(note) AS moyenne
			FROM avis AS t1
			INNER JOIN enseignes_recoient_avis AS t2
			ON t1.id_avis = t2.avis_id_avis
			INNER JOIN enseignes AS t3
				ON t2.enseignes_id_enseigne = t3.id_enseigne
				INNER JOIN contributeurs_donnent_avis AS t4
					ON t1.id_avis = t4.avis_id_avis
					INNER JOIN contributeurs AS t5
						ON t4.contributeurs_id_contributeur = t5.id_contributeur
			";
$req = $bdd->prepare($sql);
$req->execute();
$result = $req->fetch(PDO::FETCH_ASSOC);
$nbavis     = $result['count_avis'];

$d = new DateTime();
    $d->modify('first day of this month');
    $d->format('Y-m-d');
    
$sql2 = "SELECT COUNT(id_avis) AS count_nouveaux
			FROM avis WHERE DATE(date_avis+1) > \"" . date('Y-m-d H:i:s', strtotime('first day of this month')) . "\"";
$req2 = $bdd->prepare($sql2);
$req2->execute();
$result2 = $req2->fetch(PDO::FETCH_ASSOC);
$nbnouveauxinscrits = $result2['count_nouveaux'];


?>
<body>
    <div id="default_dialog_inscription"></div>
    <div class="splash_ombre"></div>
    <div id="bg" style="background-image:url('img/pictos_splash/splash_img2.jpg');"></div>
    <div class="splash_big_wrapper">
    <div class="splash_head_wrapper">
        <div class="splash_head">
            <div class="splash_head_items1"><span class="splash_head_items_nbr"><?php echo $nbavis; ?> </span><p>Avis sur le site</p></div>
            <div class="splash_head_items2"><span class="splash_head_items_nbr"><?php echo $nbnouveauxinscrits; ?> </span>
                <?php $mois = array("","Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre"); ?>
                <p>au mois <?php $month = $mois[date("n")]; if($month[0]=="A" or $month[0]=="O"){ echo "d'";}else{echo "de";} echo ' '.$month; ?><p/></div>
        </div>
    </div>
    <div class="splash_body_wrapper">
        <div class="splash_body">
            <div class="splash_login_img_container"><img src="img/pictos_splash/logo_splash.png"/></div>
            <h1>Les avis, les vrais</h1>
            <form action="<?php echo SITE_URL; ?>/acces/login_access.php" method="post" autocomplete="off">
                    <input class="splash_input_login" type="text" placeholder="login" name="email-login" id="email-login"/>
                    <input class="splash_input_password" type="password" placeholder="mot de passe" name="password" id="password"/>
                    <input type="hidden" name="urlTo" readonly value="<?php echo $urlTo; ?>" />
                    <br />
                    <input class="splash_input_button" type="submit" value="connexion">
                    <br />
                    <span>ou <a class="splash_link_create_account" href="#" onclick="OuvrePopin(<?php echo $data; ?>, '/pages/inscription.php', 'default_dialog_inscription');" title="">créer un compte en 2 minutes</a></span>
            </form>
        </div>
    </div>
    </div>
        <div class="splash_footer_wrapper">
        <div class="splash_commerce_title"><span>Restaurant <a href="http://uniiti.fr/pages/commerce.php?id_enseigne=139" title="">La petite cour</a></span></div>
        <div class="splash_footer">
        <form action="timeline.php">
            <input class="splash_input_button" type="submit" value="entrer sans s'inscrire"/>
        </form>
            
        </div>
        <div class="splash_footer_nav">
            <nav>
                <ul>
                    <li><a href="#" title="">Plan du site</a></li>
                    <span> | </span>
                    <li><a href="#" title="">A propos</a></li>
                    <span> | </span>
                    <li><a href="#" title="">FAQ</a></li>
                    <span> | </span>
                    <li><a href="#" title="">Contact</a></li>
                </ul>
            </nav>
        </div>
    </div>
	<?php include'includes/js.php'; ?>
</body>
</html>
