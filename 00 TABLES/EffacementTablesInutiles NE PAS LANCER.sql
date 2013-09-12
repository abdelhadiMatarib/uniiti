

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


-- ATTENTION, ON EFFACE DES TABLES OU DES CHAMPS QUI POURRAIENT ETRE UTILISEES EN PRODUCTION

DROP TABLE IF EXISTS `administrateurs` ;
DROP TABLE IF EXISTS `contributeurs_visualisent_articles` ;
DROP TABLE IF EXISTS `moderateurs_redigent_articles` ;
DROP TABLE IF EXISTS `articles` ;
DROP TABLE IF EXISTS `avis_ont_reactions` ;
DROP TABLE IF EXISTS `contributeurs_ecrient_reactions` ;
DROP TABLE IF EXISTS `reactions` ;
DROP TABLE IF EXISTS `contributeurs_visualisent_enseignes` ;
DROP TABLE IF EXISTS `moderateurs_activent_professionnels` ;
DROP TABLE IF EXISTS `moderateurs_bloquent_contributeurs` ;
DROP TABLE IF EXISTS `types_article` ;

ALTER TABLE `enseignes` DROP FOREIGN KEY `fk_enseignes_types_enseigne1` ;
ALTER TABLE `enseignes` DROP FOREIGN KEY `fk_enseignes_contributeursMDL1` ;

ALTER TABLE `enseignes` DROP `types_enseigne_id_type_enseigne`
, DROP `fax_enseigne`
, DROP `note_moyenne`
, DROP `satisfaction_pourcent`
, DROP `adresse2_enseigne`
, DROP `certification_pro`
, DROP `code_visible`
, DROP `gestion_code`
, DROP `avis_visible`
, DROP `gestion_avis`
, DROP `btn_donner_avis_visible`
, DROP `gestion_donner_avis`
, DROP `contributeurs_id_contributeurMDL` ;

DROP TABLE IF EXISTS `types_enseigne` ;
DROP TABLE IF EXISTS `groupes_enseigne` ;

-- FIN ATTENTION


