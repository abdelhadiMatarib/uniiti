<?php
	header('Content-Type: application/json');
	$sujet = 'Bienvenue dans la communauté UNIITI';
	$message = "Bonjour,
	Ceci est un message texte envoyé grâce à php.
	merci :)";
	$destinataire = 'francois.flandin@wanadoo.fr';
	if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $destinataire)) {$passage_ligne = "\r\n";}
	else {$passage_ligne = "\n";}
	$headers = "From: \"UNIITI\"<admin@uniiti.fr\n";
	$headers .= "Reply-To: admin@uniiti.fr\n";
	$headers .= "Content-type: text/html; charset=utf-8\n";
	if(mail($_POST['destinataire'],htmlspecialchars($_POST['sujet']),htmlspecialchars($_POST['message']),$headers)) {$data['result'] = "L'email a bien été envoyé." . $_POST['destinataire'] . $_POST['sujet'];}
	else {$data['result'] = "Une erreur c'est produite lors de l'envoi de l'email.";}
	echo json_encode($data);
?>

<?php
// TEST FONCTION MAIL() PHP
// CREEZ UNE FICHIER email.php

// *** A configurer
$to = "francois.flandin@wanadoo.fr";  
$from  = "postmaster@uniiti.fr";  

// *** Laisser tel quel
$jour  = date("d-m-Y");
$heure = date("H:i");

$sujet = "Essai Mail - $jour $heure";

$contenu = "";
$contenu .= "<html> \n";
$contenu .= "<head> \n";
$contenu .= "<title> Subject </title> \n";
$contenu .= "</head> \n";
$contenu .= "<body> \n";
$contenu .= "Mail au format HTML simple avec la fonction PHP mail().<br> <b>$sujet </b> <br> \n";
$contenu .= "</body> \n";
$contenu .= "</HTML> \n";

$headers  = "MIME-Version: 1.0 \n";
$headers .= "Content-Transfer-Encoding: 8bit \n";
$headers .= "Content-type: text/html; charset=utf-8 \n";
$headers .= "From: $from  \n";
// $headers .= "Disposition-Notification-To: $from  \n"; // accuse de reception

$verif_envoi_mail = TRUE;

$verif_envoi_mail = @mail ($to, $sujet, $contenu, $headers);
 
if ($verif_envoi_mail === FALSE) echo " ### Verification Envoi du Mail=$verif_envoi_mail - Erreur envoi mail <br> \n";
else echo " *** Verification Envoi du Mail=$verif_envoi_mail - Mail envoy&eacute; avec succ&egrave;s de $to vers $from <br> avec comme sujet: $sujet \n"; 
?> 
