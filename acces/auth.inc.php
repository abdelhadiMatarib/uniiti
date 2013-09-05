<?php
//Start session
session_start();
//$_SESSION['SESS_MEMBER_ID'] = 0;

//Check whether the session variable SESS_MEMBER_ID is present or not
if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {

    // header("location: ../access/login_access_denied.php");
    // exit();    

    
}
?>
