<?php

//============================================================================================================
//============================================TEST IF USER IS THE OWNER OF THIS SHOP=========================================================
//============================================================================================================
$req = $bdd->prepare('select professionnels_id_pro from enseignes where id_enseigne=:id_enseigne');
$req->execute(array('id_enseigne'=>$iIdEnseigne));
$aEnseigne = $req->fetch();

//if user is not admin
if($_SESSION['droits'] != 8){
    if(empty($aEnseigne) || ($aEnseigne['professionnels_id_pro']!= $_SESSION['SESS_MEMBER_ID'])){
        header('location: /');
    }
}

//if($iIdEnseigne == )
$aResults = array();
//============================================================================================================
//============================================SELECT COUNT EMAIL+TEL =========================================================
//============================================================================================================
$sql = "SELECT (";
    $sql .= "SELECT COUNT(distinct(t1.email_contributeur)) ";
    $sql .= "FROM contributeurs t1 ";
    $sql .= "INNER JOIN contributeurs_donnent_avis t2 ON t1.id_contributeur = t2.contributeurs_id_contributeur ";
    $sql .= "INNER JOIN enseignes_recoient_avis t3 ON t2.avis_id_avis = t3.avis_id_avis ";
    $sql .= "INNER JOIN enseignes t4 ON t3.enseignes_id_enseigne = t4.id_enseigne ";
    $sql .= "WHERE ";
    $sql .= "t4.id_enseigne = :idEnseigne ) as nb_mail ";
        $sql .= ", (";
            $sql .= "SELECT COUNT(distinct(t1.telephone_contributeur)) ";
            $sql .= "FROM contributeurs t1 ";
            $sql .= "INNER JOIN contributeurs_donnent_avis t2 ON t1.id_contributeur = t2.contributeurs_id_contributeur ";
            $sql .= "INNER JOIN enseignes_recoient_avis t3 ON t2.avis_id_avis = t3.avis_id_avis ";
            $sql .= "INNER JOIN enseignes t4 ON t3.enseignes_id_enseigne = t4.id_enseigne ";
            $sql .= "WHERE ";
            $sql .= "t1.telephone_contributeur IS NOT NULL AND ";
            $sql .= "t1.telephone_contributeur !='' AND ";
            $sql .= "t4.id_enseigne = :idEnseigne ) as nb_tel ";

$req = $bdd->prepare($sql);

//$req->execute(array("idEnseigne"=>$_SESSION['SESS_MEMBER_ID']));
$req->execute(array("idEnseigne" => $iIdEnseigne));  //enseigne90

$res = $req->fetch();
$aResults['nb-mail'] = $res['nb_mail'];
$aResults['nb-tel'] = $res['nb_tel'];
//============================================================================================================
//============================================SELECT COUNT EMAIL +TEL FROM PARTNERS=========================================================
//============================================================================================================
//1) get all partners
$sql2 = "SELECT * ";
$sql2 .= "FROM enseignes_reseau_enseignes where (enseignes_id_enseigne1=:idEnseigne or enseignes_id_enseigne2=:idEnseigne) ";
$sql2 .= "AND id_statut=1";
$req2 = $bdd->prepare($sql2);

$req2->execute(array("idEnseigne" => $iIdEnseigne));  //enseigne90
$res2 = $req2->fetchAll();
//2) Foreach partner, get count email
$nbMail = 0;
$nbTel = 0;
if (!empty($res2)) {
    foreach ($res2 as $k => $result) {
        //get count for every enseigne
        //using main request
            $req3 = $bdd->prepare($sql);
            //select the partner shop id
            if ($result['enseignes_id_enseigne1'] != $iIdEnseigne) {
                $req3->execute(array("idEnseigne" => $result['enseignes_id_enseigne1']));
            } else {
                $req3->execute(array("idEnseigne" => $result['enseignes_id_enseigne2']));
            }
            $res3 = $req3->fetch();
            //if we found some emails ans tel
            //we add them to $i
            if(!empty($res3['nb_mail'])){
                $nbMail += $res3['nb_mail'];
            }
            if(!empty($res3['nb_tel'])){
                 $nbTel += $res3['nb_tel'];
            }
    }
}

$aResults['nb-mail-partner'] = $nbMail;
$aResults['nb-tel-partner'] = $nbTel;

//============================================================================================================
//============================================SELECT Uploaded MAIL + TEL=========================================================
//============================================================================================================
$sql4 = "SELECT ( ";
$sql4 .= "SELECT COUNT(DISTINCT(email)) from enseigne_clients where enseignes_id_enseigne=:idEnseigne) as uploaded_email,  ";
$sql4 .= "( SELECT COUNT(DISTINCT(telephone)) from enseigne_clients where enseignes_id_enseigne=:idEnseigne) as uploaded_tel  ";

$req4 = $bdd->prepare($sql4);

$req4->execute(array("idEnseigne" => $iIdEnseigne));  //enseigne90
$res4 = $req4->fetch();

$aResults['nb-mail-uploaded'] = $res4["uploaded_email"];
$aResults['nb-tel-uploaded'] = $res4["uploaded_tel"];

?>
 