<?php

$url = "http://open-api.madebymonsieur.com/velib/closest?lon=".$_POST['lat']."&lat=".$_POST['len']."&accept=application/json&range=600";

echo file_get_contents($url);
?>
