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
header("location: ../timeline.php");
?>
