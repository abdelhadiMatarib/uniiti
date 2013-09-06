<?php
include'config/configuration.inc.php';
include'includes/head.php';
include_once 'config/configPDO.inc.php';
$urlTo = FALSE; // Déclaration variable pour login_access destination
$data = "{}";

$sql = "SELECT COUNT(id_avis) AS count_avis, AVG(note) AS moyenne
			FROM avis AS t1

			";
$req = $bdd->prepare($sql);
$req->execute();
$result = $req->fetch(PDO::FETCH_ASSOC);
$nbavis     = $result['count_avis'];

$nbnouveauxinscrits = 0;

?>
<style>
    body{position:relative;margin:0;}
    .splash_ombre{background:url('../img/pictos_splash/ombre.png') no-repeat 20px;z-index:99;position:absolute;height:705px;padding:5px;width:554px;margin:auto;top:0;left:0;bottom:0;right:0;}
    body > img{max-width:100%;min-height:90%;position:absolute;top:0;left:0;z-index:98;}
    .splash_big_wrapper{position:relative;z-index:99;}
    .splash_head_wrapper{height:70px;}
    .splash_head{width:840px;margin:0 auto;}
    .splash_head_items{margin:10px 0;float:left;text-align:center;width:260px;padding:10px;}
    .splash_head_items span{text-transform:uppercase;display:block;color:white;text-shadow: 0px 1px 1px #252525;filter: dropshadow(color=#252525, offx=0, offy=1);}
    .splash_head_items_nbr{font-size:1.8em;font-weight:700;}
    .splash_body_wrapper{height:95%;}
    .splash_body{text-align:center;position:absolute;height:270px;padding:5px;width:270px;margin:auto;top:0;left:0;bottom:0;right:0;}
    .splash_body span{display:inline-block;color:white;margin-top:5px;}
    .splash_body h1{display:block;margin:14px 0;color:white;font-size:1em;font-weight:300;color:white;}
    .splash_input_login,.splash_input_password{height:40px;width:185px;padding:5px 5px 5px 35px;background-color:transparent;color:white;font-size:1.1em;}
    .splash_input_login{border-bottom:1px solid #cac8c3;background:url('../img/pictos_splash/icon_user.png') no-repeat 5px 10px;}
    .splash_input_password{background:url('../img/pictos_splash/icon_clef.png') no-repeat 5px 15px;}
    .splash_input_button{background-color:transparent;border:1px dashed white;width:185px;padding:5px 10px;color:white;font-size:1.4em;font-weight:300;margin-top:14px;}
    .splash_link_create_account{font-weight:600;color:white;}
    .splash_footer_wrapper{position:relative;}
    .splash_footer{width:185px;margin:0 auto;}
    .splash_footer_nav{width:240px;margin:0 auto;margin-top:10px;text-shadow: 0px 1px 1px #252525;filter: dropshadow(color=#252525, offx=0, offy=1);}
    .splash_footer_nav ul li{display:inline;}
    .splash_footer_nav ul li a{color:white;}
    .splash_footer_nav ul span{display:inline;color:white;}
    .splash_commerce_title{position:absolute;bottom:0;right:20px;}
    .splash_commerce_title span{color:white;text-shadow: 0px 1px 1px #252525;filter: dropshadow(color=#252525, offx=0, offy=1);}
    .splash_commerce_title span a{color:white;}
</style> 
<body>
    <div id="default_dialog_inscription"></div>
    <div class="splash_ombre"></div>
    <img src="img/pictos_splash/splash_img2.jpg"/>
    <div class="splash_big_wrapper">
    <div class="splash_head_wrapper">
        <div class="splash_head">
            <div class="splash_head_items"><span class="splash_head_items_nbr"><?php echo $nbavis; ?></span><span class="splash_head_items_txt">commentaires sur le site</span></div>
            <div class="splash_head_items"><span class="splash_head_items_nbr">2</span><span class="splash_head_items_txt">minutes pour vous inscrire</span></div>
            <div class="splash_head_items"><span class="splash_head_items_nbr"><?php echo $nbnouveauxinscrits; ?></span><span class="splash_head_items_txt">nouveaux inscrits aujourd'hui</span></div>
        </div>
    </div>
    <div class="splash_body_wrapper">
        <div class="splash_body">
            <div class="splash_login_img_container"><img src="img/pictos_splash/logo_splash.png"/></div>
            <h1>Les avis, nouvelle génération</h1>
            <form action="<?php echo SITE_URL; ?>/acces/login_access.php" method="post" autocomplete="off">
				<input class="splash_input_login" type="text" placeholder="login" name="email-login" id="email-login"/>
				<input class="splash_input_password" type="password" placeholder="mot de passe" name="password" id="password"/>
				<input type="hidden" name="urlTo" readonly value="<?php echo $urlTo; ?>" />
				<br />
				<input class="splash_input_button" type="submit" value="connexion">
				<br />
				<span>ou <a class="splash_link_create_account" href="#" onclick="OuvrePopin(<?php echo $data; ?>, '/pages/inscription.php', 'default_dialog_inscription');" title="">créer un compte</a></span>
			</form>
        </div>
    </div>
    <div class="splash_footer_wrapper">
        <div class="splash_commerce_title"><span>Restaurant <a href="#" title="">La Folie Indienne</a></span></div>
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
    </div>
	<?php include'includes/js.php'; ?>
</body>
</html>
