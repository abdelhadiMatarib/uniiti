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
	if(mail($_POST['destinataire'],htmlspecialchars($_POST['sujet']),$_POST['message'],$headers)) {$data['result'] = "L'email a bien été envoyé.";}
	else {$data['result'] = "Une erreur c'est produite lors de l'envois de l'email.";}
	echo json_encode($data);
?>