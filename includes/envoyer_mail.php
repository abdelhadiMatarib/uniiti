	<meta charset="utf-8">
<?php
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
	if(mail($destinataire,htmlspecialchars($sujet),$message,$headers)) {echo "L'email a bien été envoyé.";}
	else {echo "Une erreur c'est produite lors de l'envois de l'email.";}
?>