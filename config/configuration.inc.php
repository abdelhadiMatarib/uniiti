<?php
define ("CHEMIN_LOCAL", "/projects/uniiti");
define ("SITE_URL", "http://127.0.0.1" . CHEMIN_LOCAL);

define ("ROOT_CHEMIN_LOCAL", $_SERVER["DOCUMENT_ROOT"] . CHEMIN_LOCAL);
define ("ROOT_UTILISATEURS_COUV", ROOT_CHEMIN_LOCAL . "/photos/utilisateurs/couvertures/");
define ("SITE_UTILISATEURS_COUV", SITE_URL . "/photos/utilisateurs/couvertures/");
define ("ROOT_UTILISATEURS_AVATARS", ROOT_CHEMIN_LOCAL . "/photos/utilisateurs/avatars/");
define ("SITE_UTILISATEURS_AVATARS", SITE_URL . "/photos/utilisateurs/avatars/");
define ("ROOT_ENSEIGNES_COUV", ROOT_CHEMIN_LOCAL . "/photos/enseignes/couvertures/");
define ("SITE_ENSEIGNES_COUV", SITE_URL . "/photos/enseignes/couvertures/");
define ("ROOT_IMAGES_TMP", ROOT_CHEMIN_LOCAL . "/img/tmp/");
define ("SITE_IMAGES_TMP", SITE_URL. "/img/tmp/");
?>
