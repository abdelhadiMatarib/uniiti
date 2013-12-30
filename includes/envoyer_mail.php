<?php

function encodeObjet($objet) {
    $objet = '=?UTF-8?B?' . base64_encode($objet) . '?=';
    return $objet;
}

include_once '../config/configPDO.inc.php';
if (!empty($_POST['step']) and $_POST['step'] == 4) {
    $rand = md5(uniqid(null, true));
    $aDate = explode('/', $_POST['date']);
    $date = $aDate[2] . '-' . $aDate[1] . '-' . $aDate[0];
    $req = $bdd->prepare('insert into enseigne_reservation (enseignes_id_enseigne, email_reservation, telephone_reservation, email_destinataire, telephone_destinataire, status_id, hash, date_reservation, heure_reservation, nombre_reservation, nom_reservation, prenom_reservation) VALUES (:enseignes_id_enseigne, :email_reservation, :telephone_reservation, :email_destinataire, :telephone_destinataire, :status_id, :hash, :date_reservation, :heure_reservation, :nombre_reservation, :nom_reservation, :prenom_reservation) ');
    $req->execute(array('enseignes_id_enseigne' => $_POST['id_enseigne'], 'email_reservation' => $_POST['email_reservation'], 'telephone_reservation' => $_POST['telephone_reservation'], 'email_destinataire' => $_POST['email_destinataire'], 'telephone_destinataire' => $_POST['telephone_destinataire'], 'status_id' => 1, 'hash' => $rand, 'date_reservation' => $date, 'heure_reservation' => $_POST['heure'], 'nombre_reservation' => $_POST['nombre'], 'nom_reservation' => $_POST['nom_destinataire'], 'prenom_reservation' => $_POST['prenom_destinataire']));
}

$contenu = "";
$contenu .= "<html> \n";
$contenu .= "<head> \n";
$contenu .= "<title> Subject </title> \n";
$contenu .= "</head> \n";
$contenu .= "<body> \n";
$contenu .= stripslashes($_POST['message']);
if (!empty($rand)) {
    $contenu .= 'Cliquez sur le lien pour valider la reservation <br />';
    $contenu .= 'http://uniiti.fr/confirm-r/'.$rand;
}
$contenu .= "<BR/><BR/>L'équipe UNIITI vous remercie pour votre confiance.\n";
$contenu .= "</body> \n";
$contenu .= "</html> \n";


$headers = 'From: "UNIITI"<info@uniiti.fr>' . "\n";
$headers .='Reply-To: info@uniiti.fr' . "\n";
$headers .='Content-Type: text/html; charset="utf-8"' . "\n";
$headers .='Content-Transfer-Encoding: 8bit';
//================================================================================
//=========================1) Si c est un mail / sms à destination de l enseigne ============
//================================================================================

if (!empty($_POST['email_reservation']) || !empty($_POST['telephone_reservation'])) {
    if ($_POST['prevenir_reservation'] == 2) {
        //==========si on doit prévenir par sms

        if (!empty($_POST['telephone_reservation'])) {
//entrer votre nic-handle, remplacer xx123456-ovh par votre propre nic-handle
            $nic = "dj187129-ovh";

//entrer le mot de passe de votre nic-handle, remplacer ovh123456 par votre propre mot de passe
            $pass = "johann111";

//entrer le nom de votre compte sms, remplacer sms-xx123456-1 par votre propre compte
            $sms_compte = "sms-dj187129-1";

            /* entrer le numéro emetteur du sms, ce numéro doit etre identifie dans votre manager,
              remplacer +33600110011 par votre propre numero de mobile */
            $from = "UNIITI";


            /* creation de la variable to dans laquelle nous recuperons via la methode post
              le champ portant le nom destinataire au niveau de la page form.html */
            $to = $_POST['telephone_reservation'];

            /* creation de la variable message dans laquelle nous recuperons via la methode post
              le champ portant le nom texte au niveau de la page form.htlm */
            $message = $_POST['message'];
            if (!empty($rand)) {
                $message .= 'cliquez sur le lien pour valider ';
                $message .= 'http://uniiti.fr/confirm-r/'.$rand;
            }// ouverture de la fonction soapi
            try {
// on travail en soapi
                $soap = new SoapClient("https://www.ovh.com/soapi/soapi-re-1.8.wsdl");

                /* connexion a votre manager avec vos identifiants, ici on utilise
                  le compte xx123456-ovh ($nic) avec le mot de passe ovh123456 ($pass), le nic-handle est francais */
                $session = $soap->login("$nic", "$pass", "fr", false);

                /* on utilise ici le compte sms sms-xx123456-1 ($sms_compte) pris sur notre nic-handle xx123456-ovh,
                  le numero 06600110011 ($from) a ete identifie dans notre manager on l utilise donc en tant
                  qu emetteur, le desinataire se place ensuite ($to), la variable $message contient le texte du sms, le vide permet de laisser
                  les parametres par defaut, le "1" force l envoi du sms au format classique,
                  le sms est sauvegarde sur le portable client */
                $result = $soap->telephonySmsSend($session, "$sms_compte", "$from", "$to", "$message", "", "1", "", "");


                $data['result'] = "Un sms a été envoyé à l'enseigne: \n" . $_POST['sujet'];
            } catch (SoapFault $fault) {
// affichage des erreurs
                echo($fault);
                $data['result'] = "Une erreur s'est produite lors de l'envoi de l'sms.";
            }
        }
    }
    //si on doit prévenir par mail
    else {
        if (mail($_POST['destinataire'], encodeObjet($_POST['sujet']), $contenu, $headers)) {
            $data['result'] = "L'email a bien été envoyé.\n" . $_POST['destinataire'] . "\n" . $_POST['sujet'];
        } else {
            $data['result'] = "Une erreur s'est produite lors de l'envoi de l'email.";
        }
    }
} else {
    if (mail($_POST['destinataire'], encodeObjet($_POST['sujet']), $contenu, $headers)) {
        $data['result'] = "L'email a bien été envoyé.\n" . $_POST['destinataire'] . "\n" . $_POST['sujet'];
    } else {
        $data['result'] = "Une erreur s'est produite lors de l'envoi de l'email.";
    }

    if (!empty($_POST['tel_destinataire'])) {
        //envoi sms
        //==========si on doit prévenir par sms
//entrer votre nic-handle, remplacer xx123456-ovh par votre propre nic-handle
        $nic = "dj187129-ovh";

//entrer le mot de passe de votre nic-handle, remplacer ovh123456 par votre propre mot de passe
        $pass = "johann111";

//entrer le nom de votre compte sms, remplacer sms-xx123456-1 par votre propre compte
        $sms_compte = "sms-dj187129-1";

        /* entrer le numéro emetteur du sms, ce numéro doit etre identifie dans votre manager,
          remplacer +33600110011 par votre propre numero de mobile */
        $from = "UNIITI";


        /* creation de la variable to dans laquelle nous recuperons via la methode post
          le champ portant le nom destinataire au niveau de la page form.html */

        $tel = str_replace(" ", "", $_POST['tel_destinataire']);
        $tel = ltrim($tel, '0');
        $to = '+33' . $tel;
        /* creation de la variable message dans laquelle nous recuperons via la methode post
          le champ portant le nom texte au niveau de la page form.htlm */
        $message = str_replace("<BR>", "", $_POST['message']);

// ouverture de la fonction soapi
        try {
// on travail en soapi
            $soap = new SoapClient("https://www.ovh.com/soapi/soapi-re-1.8.wsdl");

            /* connexion a votre manager avec vos identifiants, ici on utilise
              le compte xx123456-ovh ($nic) avec le mot de passe ovh123456 ($pass), le nic-handle est francais */
            $session = $soap->login("$nic", "$pass", "fr", false);

            $result = $soap->telephonySmsSend($session, "$sms_compte", "$from", "$to", "$message", "", "1", "", "");
            //die('selim');
            $data['result'] = "Un sms de confirmation vous a été envoyé";
        } catch (SoapFault $fault) {
// affichage des erreurs
            echo($fault);
            $data['result'] = "Une erreur s'est produite lors de l'envoi de l'sms.";
        }
    }
}
header('Content-Type: application/json');
if (!empty($soap)) {
    // on ferme la connexion au manager
    $soap->logout($session);
}
echo json_encode($data);
?>
