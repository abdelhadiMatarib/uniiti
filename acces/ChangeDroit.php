<?php
session_destroy();
session_start();
unset($_SESSION['droits']);
$_SESSION['droits'] = $_GET['droit'];

include_once '../config/configuration.inc.php';
header("location: " . $_SERVER["HTTP_REFERER"]);
?>

