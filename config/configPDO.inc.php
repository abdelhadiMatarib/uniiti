<?php
$db_config = array();
$db_config['DRIVER']        = 'mysql';
$db_config['HOST']          = 'localhost';
$db_config['DB_NAME']       = 'captainopinionDB';
$db_config['USER']          = 'root';                               // LOCAL
//$db_config['USER']        = 'captainJohanUser';                   // SERVEUR
$db_config['PASSWORD']      = 'root';                               // LOCAL
//$db_config['PASSWORD']    = 'Darlot111JohannUser';                // SERVEUR
$db_config['OPTIONS']       = array(
                                // Activation des exceptions PDO :
                                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                //PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                                );

try
{
    // Connexion à la base
    $bdd = new PDO($db_config['DRIVER'] .':host='. $db_config['HOST'] .';dbname='. $db_config['DB_NAME'],
                   $db_config['USER'],
                   $db_config['PASSWORD'],
                   $db_config['OPTIONS']
                   );
    
    $bdd->exec("SET NAMES 'utf8'");
}
catch(Exception $e)
{
    echo 'Erreur : ' . $e->getMessage();
    die();
}


?>   
