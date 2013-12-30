<?php
session_start();
header('Content-Type: application/json');
//============================================================================================================
//============================================TEST IF USER IS THE OWNER OF THIS SHOP=========================================================
//============================================================================================================

//if user is not admin
if($_SESSION['droits'] != 8){
      echo json_encode(array('status'=>'error', 'message'=>"vous n'êtes ps un administrateur"));   
}
include_once '../config/configPDO.inc.php';
//print_r($_POST);
//die();
$sSearch = $_POST['search'];
$req = $bdd->prepare('SELECT id_enseigne, nom_enseigne FROM enseignes WHERE nom_enseigne LIKE :search');
$req->execute(array('search' => "%" . $sSearch . "%"));
$aData = $req->fetchAll();
if (!empty($aData)) {
    echo json_encode(array('status'=>'success', 'enseignes'=>$aData));
}else{
    echo json_encode(array('status'=>'error', 'message'=>'aucune enseigne trouvée'));
}
?>
