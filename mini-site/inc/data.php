<?php

/*
 * Test if $_GET['id'] is a real customer id
 * if ok => generate array with customer's informations 
 */

if(!empty($_GET['id'])){
    $iId = intval($_GET['id']);
    $sInfos = file_get_contents("http://uniiti.fr/includes/requeteminisite.php?id_enseigne=".$iId);
    $oShopInfos = json_decode($sInfos);
    
    if(empty($oShopInfos)){
        header('location: /');
    }
}else{
    header('location: /');
}

?>
