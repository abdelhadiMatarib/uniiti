<?php
//Start session
session_start();

//Unset the variables stored in session
unset($_SESSION['SESS_MEMBER_ID']);
unset($_SESSION['SESS_FIRST_NAME']);
unset($_SESSION['SESS_LAST_NAME']);
//unset($_SESSION['SESS_COMPANY']);
//unset($_SESSION['login']);
unset($_SESSION['droits']);

include_once '../config/configuration.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Captain Opinion / Déconnexion</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="<?php echo SITE_URL; ?>/css/template.css" rel="stylesheet" type="text/css" />
</head>
<body class="erreur">
<h1><p align="center">Deconnexion</p></h1>
<p align="center">&nbsp;</p>
<p align="center" class="err">Vous avez été déconnecté(e).</p>
<p align="center"><a href="../index.php">revenir à la timeline</a></p>
</body>
</html>