<?php

header('Content-Type: application/json');
include_once '../config/configPDO.inc.php';

/**
 * ====================================== test before continue ====================================
 */
if (!empty($_POST['token'])) {
    $sToken = $_POST['token'];
    //select request
    $req = $bdd->prepare('SELECT * FROM demande_avis WHERE token=:token');
    $req->execute(array('token' => $sToken));
    $aOpinionRequest = $req->fetch();
    if (!empty($aOpinionRequest)) {
        $aAlreadyRegistred = null; // contain user info (if registred)
        $iEnseigneId = $aOpinionRequest['enseigne_id'];
        //test if user is already registred
        if (!empty($aOpinionRequest['email'])) {
            $req = $bdd->prepare('SELECT * FROM contributeurs WHERE email_contributeur=:email');
            $req->execute(array('email' => $aOpinionRequest['email']));
            $aAlreadyRegistred = $req->fetch();
        }
        /**
         * If user is registred one 
         */
        if (!empty($aAlreadyRegistred)) {
            $iIdUser = $aAlreadyRegistred['id_contributeur'];
            if (!empty($_POST['avis']) and !empty($_POST['note'])) {
                try {
                    $req = $bdd->prepare("INSERT INTO avis (note, commentaire, origine, date_avis, id_statut) VALUES (:note, :commentaire, :origine, :date_avis, :id_statut)");
                    $req->execute(array('note' => $_POST['note'], 'commentaire' => $_POST['avis'], 'origine' => '1', 'date_avis' => date('Y-m-d h:i:s'), 'id_statut' => '1'));
                    $iIdAvis = $bdd->lastInsertId();
                    // if the opinion was saved
                    try {
                        //we affect opinion to user
                        $req = $bdd->prepare("INSERT INTO contributeurs_donnent_avis (contributeurs_id_contributeur, avis_id_avis) VALUES (:id_contributeur, :id_avis)");
                        $req->execute(array('id_contributeur' => $iIdUser, 'id_avis' => $iIdAvis));
                        //we affect opinion to shop
                        $req = $bdd->prepare("INSERT INTO enseignes_recoient_avis (enseignes_id_enseigne, avis_id_avis) VALUES (:id_enseigne, :id_avis)");
                        $req->execute(array('id_enseigne' => $iEnseigneId, 'id_avis' => $iIdAvis));

                        echo json_encode(array('status' => 'success', 'message' => "Votre avis a été bien prise en compte."));
                    } catch (Exception $e) {
                        echo json_encode(array('status' => 'error', 'message' => "Impossible d'affecter votre avis à l'enseigne en question."));
                    }
                } catch (Exception $e) {
                    echo json_encode(array('status' => 'error', 'message' => 'Impossible de sauvegarder votre avis.'));
                }
            } else {
                echo json_encode(array('status' => 'error', 'message' => 'Merci de remplir les champs avis et note.'));
            }
        } else {
            /**
             * If user is new one 
             */
            //=========================== 1) Register User
            //contributeurs
            if (!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['mail']) ) {
                if(empty($_POST['avis']) or empty($_POST['note'])){
                                                echo json_encode(array('status' => 'error', 'message' => "Merci de remplir les champs avis et note."));

                    die();
                }
                try {
                    $req = $bdd->prepare("INSERT INTO contributeurs (nom_contributeur, prenom_contributeur, email_contributeur, telephone_contributeur, date_inscription, groupes_permissions_id_permission) VALUES (:nom_contributeur, :prenom_contributeur, :email_contributeur, :telephone_contributeur, :date_inscription, :groupes_permissions_id_permission)");
                    $req->execute(array('nom_contributeur' => $_POST['nom'], 'prenom_contributeur' => $_POST['prenom'], 'email_contributeur' => $_POST['mail'], 'telephone_contributeur' => $aOpinionRequest['telephone'], 'date_inscription' => date('Y-m-d h:i:s'),'groupes_permissions_id_permission'=>1));
                    $iIdUser = $bdd->lastInsertId();
                    //=========================== 2) SAVE opinion
                    try {
                        $req = $bdd->prepare("INSERT INTO avis (note, commentaire, origine, date_avis, id_statut) VALUES (:note, :commentaire, :origine, :date_avis, :id_statut)");
                        $req->execute(array('note' => $_POST['note'], 'commentaire' => $_POST['avis'], 'origine' => '1', 'date_avis' => date('Y-m-d h:i:s'), 'id_statut' => '1'));
                        $iIdAvis = $bdd->lastInsertId();
                        // if the opinion was saved
                        try {
                            //we affect opinion to user
                            $req = $bdd->prepare("INSERT INTO contributeurs_donnent_avis (contributeurs_id_contributeur, avis_id_avis) VALUES (:id_contributeur, :id_avis)");
                            $req->execute(array('id_contributeur' => $iIdUser, 'id_avis' => $iIdAvis));
                            //we affect opinion to shop
                            $req = $bdd->prepare("INSERT INTO enseignes_recoient_avis (enseignes_id_enseigne, avis_id_avis) VALUES (:id_enseigne, :id_avis)");
                            $req->execute(array('id_enseigne' => $iEnseigneId, 'id_avis' => $iIdAvis));

                            echo json_encode(array('status' => 'success', 'message' => "Votre avis a été bien prise en compte."));
                        } catch (Exception $e) {
                            echo json_encode(array('status' => 'error', 'message' => "Impossible d'affecter votre avis à l'enseigne en question."));
                        }
                    } catch (Exception $e) {
                        echo json_encode(array('status' => 'error', 'message' => 'Impossible de sauvegarder votre avis.'));
                    }
                } catch (Exception $e) {
                    echo json_encode(array('status' => 'error', 'message' => "Impossible d'enregistrer vos données !"));
                }
            } else {
                echo json_encode(array('status' => 'error', 'message' => 'Merci de remplir votre nom, prénom ainsi que votre adresse mail'));
            }
        }
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Impossible d ajouter un avis'));
    }
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Impossible d ajouter un avis'));
}
?>
