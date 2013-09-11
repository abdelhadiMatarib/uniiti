

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `budget` ;
DROP TABLE IF EXISTS `categories` ;
DROP TABLE IF EXISTS `sous_categories` ;
DROP TABLE IF EXISTS `sous_categories2` ;

DROP TABLE IF EXISTS `contributeurs_aiment_enseignes` ;
DROP TABLE IF EXISTS `contributeurs_aiment_pas_enseignes` ;
DROP TABLE IF EXISTS `contributeurs_wish_enseignes` ;
DROP TABLE IF EXISTS `contributeurs_follow_enseignes` ;
DROP TABLE IF EXISTS `contributeurs_aiment_objets` ;
DROP TABLE IF EXISTS `contributeurs_aiment_pas_objets` ;
DROP TABLE IF EXISTS `contributeurs_wish_objets` ;
DROP TABLE IF EXISTS `objets` ;
DROP TABLE IF EXISTS `contributeurs_follow_contributeurs` ;


ALTER TABLE `enseignes` DROP `categorie_enseigne`
, DROP `scategorie_enseigne`
, DROP `sscategorie_enseigne`
, DROP `budget_enseigne`
, DROP `slide1_enseigne`
, DROP `slide2_enseigne`
, DROP `slide3_enseigne`
, DROP `slide4_enseigne`
, DROP `slide5_enseigne`
, DROP `thumnail_enseigne`
, DROP `video_enseigne`
, DROP `fb_enseigne`
, DROP `tw_enseigne`
, DROP `goog_enseigne` ;
-- , DROP `titreservice1_enseigne`
-- , DROP `contenu1service1_enseigne`
-- , DROP `prixcontenu1service1_enseigne`
-- , DROP `affichecontenu1service1_enseigne`
-- , DROP `contenu2service1_enseigne`
-- , DROP `prixcontenu2service1_enseigne`
-- , DROP `affichecontenu2service1_enseigne`
-- , DROP `contenu3service1_enseigne`
-- , DROP `prixcontenu3service1_enseigne`
-- , DROP `affichecontenu3service1_enseigne`
-- , DROP `contenu4service1_enseigne`
-- , DROP `prixcontenu4service1_enseigne`
-- , DROP `affichecontenu4service1_enseigne`
-- , DROP `contenu5service1_enseigne`
-- , DROP `prixcontenu5service1_enseigne`
-- , DROP `affichecontenu5service1_enseigne`
-- , DROP `contenu6service1_enseigne`
-- , DROP `prixcontenu6service1_enseigne`
-- , DROP `affichecontenu6service1_enseigne`
-- , DROP `contenu7service1_enseigne`
-- , DROP `prixcontenu7service1_enseigne`
-- , DROP `affichecontenu7service1_enseigne`
-- , DROP `contenu8service1_enseigne`
-- , DROP `prixcontenu8service1_enseigne`
-- , DROP `affichecontenu8service1_enseigne`
-- , DROP `contenu9service1_enseigne`
-- , DROP `prixcontenu9service1_enseigne`
-- , DROP `affichecontenu9service1_enseigne`
-- , DROP `contenu10service1_enseigne`
-- , DROP `prixcontenu10service1_enseigne`
-- , DROP `affichecontenu10service1_enseigne`
-- , DROP `contenu11service1_enseigne`
-- , DROP `prixcontenu11service1_enseigne`
-- , DROP `affichecontenu11service1_enseigne`
-- , DROP `contenu12service1_enseigne`
-- , DROP `prixcontenu12service1_enseigne`
-- , DROP `affichecontenu12service1_enseigne`
-- , DROP `contenu13service1_enseigne`
-- , DROP `prixcontenu13service1_enseigne1`
-- , DROP `affichecontenu13service1_enseigne1`
-- , DROP `contenu14service1_enseigne`
-- , DROP `prixcontenu14service1_enseigne`
-- , DROP `affichecontenu14service1_enseigne`
-- , DROP `contenu15service1_enseigne`
-- , DROP `prixcontenu15service1_enseigne`
-- , DROP `affichecontenu15service1_enseigne`
-- , DROP `titreservice2_enseigne`
-- , DROP `contenu1service2_enseigne`
-- , DROP `prixcontenu1service2_enseigne`
-- , DROP `affichecontenu1service2_enseigne`
-- , DROP `contenu2service2_enseigne`
-- , DROP `prixcontenu2service2_enseigne`
-- , DROP `affichecontenu2service2_enseigne`
-- , DROP `contenu3service2_enseigne`
-- , DROP `prixcontenu3service2_enseigne`
-- , DROP `affichecontenu3service2_enseigne`
-- , DROP `contenu4service2_enseigne`
-- , DROP `prixcontenu4service2_enseigne`
-- , DROP `affichecontenu4service2_enseigne`
-- , DROP `contenu5service2_enseigne`
-- , DROP `prixcontenu5service2_enseigne`
-- , DROP `affichecontenu5service2_enseigne`
-- , DROP `contenu6service2_enseigne`
-- , DROP `prixcontenu6service2_enseigne`
-- , DROP `affichecontenu6service2_enseigne`
-- , DROP `contenu7service2_enseigne`
-- , DROP `prixcontenu7service2_enseigne`
-- , DROP `affichecontenu7service2_enseigne`
-- , DROP `contenu8service2_enseigne`
-- , DROP `prixcontenu8service2_enseigne`
-- , DROP `affichecontenu8service2_enseigne`
-- , DROP `contenu9service2_enseigne`
-- , DROP `prixcontenu9service2_enseigne`
-- , DROP `affichecontenu9service2_enseigne`
-- , DROP `contenu10service2_enseigne`
-- , DROP `prixcontenu10service2_enseigne`
-- , DROP `affichecontenu10service2_enseigne`
-- , DROP `contenu11service2_enseigne`
-- , DROP `prixcontenu11service2_enseigne`
-- , DROP `affichecontenu11service2_enseigne`
-- , DROP `contenu12service2_enseigne`
-- , DROP `prixcontenu12service2_enseigne`
-- , DROP `affichecontenu12service2_enseigne`
-- , DROP `contenu13service2_enseigne`
-- , DROP `prixcontenu13service2_enseigne`
-- , DROP `affichecontenu13service2_enseigne`
-- , DROP `contenu14service2_enseigne`
-- , DROP `prixcontenu14service2_enseigne`
-- , DROP `affichecontenu14service2_enseigne`
-- , DROP `contenu15service2_enseigne`
-- , DROP `prixcontenu15service2_enseigne`
-- , DROP `affichecontenu15service2_enseigne`
-- , DROP `titreservice3_enseigne`
-- , DROP `contenu1service3_enseigne`
-- , DROP `prixcontenu1service3_enseigne`
-- , DROP `affichecontenu1service3_enseigne`
-- , DROP `contenu2service3_enseigne`
-- , DROP `prixcontenu2service3_enseigne`
-- , DROP `affichecontenu2service3_enseigne`
-- , DROP `contenu3service3_enseigne`
-- , DROP `prixcontenu3service3_enseigne`
-- , DROP `affichecontenu3service3_enseigne`
-- , DROP `contenu4service3_enseigne`
-- , DROP `prixcontenu4service3_enseigne`
-- , DROP `affichecontenu4service3_enseigne`
-- , DROP `contenu5service3_enseigne`
-- , DROP `prixcontenu5service3_enseigne`
-- , DROP `affichecontenu5service3_enseigne`
-- , DROP `contenu6service3_enseigne`
-- , DROP `prixcontenu6service3_enseigne`
-- , DROP `affichecontenu6service3_enseigne`
-- , DROP `contenu7service3_enseigne`
-- , DROP `prixcontenu7service3_enseigne`
-- , DROP `affichecontenu7service3_enseigne`
-- , DROP `contenu8service3_enseigne`
-- , DROP `prixcontenu8service3_enseigne`
-- , DROP `affichecontenu8service3_enseigne`
-- , DROP `contenu9service3_enseigne`
-- , DROP `prixcontenu9service3_enseigne`
-- , DROP `affichecontenu9service3_enseigne`
-- , DROP `contenu10service3_enseigne`
-- , DROP `prixcontenu10service3_enseigne`
-- , DROP `affichecontenu10service3_enseigne`
-- , DROP `contenu11service3_enseigne`
-- , DROP `prixcontenu11service3_enseigne`
-- , DROP `affichecontenu11service3_enseigne`
-- , DROP `contenu12service3_enseigne`
-- , DROP `prixcontenu12service3_enseigne`
-- , DROP `affichecontenu12service3_enseigne`
-- , DROP `contenu13service3_enseigne`
-- , DROP `prixcontenu13service3_enseigne`
-- , DROP `affichecontenu13service3_enseigne`
-- , DROP `contenu14service3_enseigne`
-- , DROP `prixcontenu14service3_enseigne`
-- , DROP `affichecontenu14service3_enseigne`
-- , DROP `contenu15service3_enseigne`
-- , DROP `prixcontenu15service3_enseigne`
-- , DROP `affichecontenu15service3_enseigne`
-- , DROP `titreservice4_enseigne`
-- , DROP `contenu1service4_enseigne`
-- , DROP `prixcontenu1service4_enseigne`
-- , DROP `affichecontenu1service4_enseigne`
-- , DROP `contenu2service4_enseigne`
-- , DROP `prixcontenu2service4_enseigne`
-- , DROP `affichecontenu2service4_enseigne`
-- , DROP `contenu3service4_enseigne`
-- , DROP `prixcontenu3service4_enseigne`
-- , DROP `affichecontenu3service4_enseigne`
-- , DROP `contenu4service4_enseigne`
-- , DROP `prixcontenu4service4_enseigne`
-- , DROP `affichecontenu4service4_enseigne`
-- , DROP `contenu5service4_enseigne`
-- , DROP `prixcontenu5service4_enseigne`
-- , DROP `affichecontenu5service4_enseigne`
-- , DROP `contenu6service4_enseigne`
-- , DROP `prixcontenu6service4_enseigne`
-- , DROP `affichecontenu6service4_enseigne`
-- , DROP `contenu7service4_enseigne`
-- , DROP `prixcontenu7service4_enseigne`
-- , DROP `affichecontenu7service4_enseigne`
-- , DROP `contenu8service4_enseigne`
-- , DROP `prixcontenu8service4_enseigne`
-- , DROP `affichecontenu8service4_enseigne`
-- , DROP `contenu9service4_enseigne`
-- , DROP `prixcontenu9service4_enseigne`
-- , DROP `affichecontenu9service4_enseigne`
-- , DROP `contenu10service4_enseigne`
-- , DROP `prixcontenu10service4_enseigne`
-- , DROP `affichecontenu10service4_enseigne`
-- , DROP `contenu11service4_enseigne`
-- , DROP `prixcontenu11service4_enseigne`
-- , DROP `affichecontenu11service4_enseigne`
-- , DROP `contenu12service4_enseigne`
-- , DROP `prixcontenu12service4_enseigne`
-- , DROP `affichecontenu12service4_enseigne`
-- , DROP `contenu13service4_enseigne`
-- , DROP `prixcontenu13service4_enseigne`
-- , DROP `affichecontenu13service4_enseigne`
-- , DROP `contenu14service4_enseigne`
-- , DROP `prixcontenu14service4_enseigne`
-- , DROP `affichecontenu14service4_enseigne`
-- , DROP `contenu15service4_enseigne`
-- , DROP `prixcontenu15service4_enseigne`
-- , DROP `affichecontenu15service4_enseigne`
-- , DROP `titreservice5_enseigne`
-- , DROP `contenu1service5_enseigne`
-- , DROP `prixcontenu1service5_enseigne`
-- , DROP `affichecontenu1service5_enseigne`
-- , DROP `contenu2service5_enseigne`
-- , DROP `prixcontenu2service5_enseigne`
-- , DROP `affichecontenu2service5_enseigne`
-- , DROP `contenu3service5_enseigne`
-- , DROP `prixcontenu3service5_enseigne`
-- , DROP `affichecontenu3service5_enseigne`
-- , DROP `contenu4service5_enseigne`
-- , DROP `prixcontenu4service5_enseigne`
-- , DROP `affichecontenu4service5_enseigne`
-- , DROP `contenu5service5_enseigne`
-- , DROP `prixcontenu5service5_enseigne`
-- , DROP `affichecontenu5service5_enseigne`
-- , DROP `contenu6service5_enseigne`
-- , DROP `prixcontenu6service5_enseigne`
-- , DROP `affichecontenu6service5_enseigne`
-- , DROP `contenu7service5_enseigne`
-- , DROP `prixcontenu7service5_enseigne`
-- , DROP `affichecontenu7service5_enseigne`
-- , DROP `contenu8service5_enseigne`
-- , DROP `prixcontenu8service5_enseigne`
-- , DROP `affichecontenu8service5_enseigne`
-- , DROP `contenu9service5_enseigne`
-- , DROP `prixcontenu9service5_enseigne`
-- , DROP `affichecontenu9service5_enseigne`
-- , DROP `contenu10service5_enseigne`
-- , DROP `prixcontenu10service5_enseigne`
-- , DROP `affichecontenu10service5_enseigne`
-- , DROP `contenu11service5_enseigne`
-- , DROP `prixcontenu11service5_enseigne`
-- , DROP `affichecontenu11service5_enseigne`
-- , DROP `contenu12service5_enseigne`
-- , DROP `prixcontenu12service5_enseigne`
-- , DROP `affichecontenu12service5_enseigne`
-- , DROP `contenu13service5_enseigne`
-- , DROP `prixcontenu13service5_enseigne`
-- , DROP `affichecontenu13service5_enseigne`
-- , DROP `contenu14service5_enseigne`
-- , DROP `prixcontenu14service5_enseigne`
-- , DROP `affichecontenu14service5_enseigne`
-- , DROP `contenu15service5_enseigne`
-- , DROP `prixcontenu15service5_enseigne`
-- , DROP `affichecontenu15service5_enseigne`
-- , DROP `voiturier_enseigne`
-- , DROP `couverts_enseigne`
-- , DROP `salaries_enseigne`
-- , DROP `reservation_enseigne`
-- , DROP `horairelundimatin_enseigne`
-- , DROP `horairelundimidi_enseigne`
-- , DROP `horairelundiaprem_enseigne`
-- , DROP `horairelundisoir_enseigne`
-- , DROP `horairemardimatin_enseigne`
-- , DROP `horairemardimidi_enseigne`
-- , DROP `horairemardiaprem_enseigne`
-- , DROP `horairemardisoir_enseigne`
-- , DROP `horairemercredimatin_enseigne`
-- , DROP `horairemercredimidi_enseigne`
-- , DROP `horairemercrediaprem_enseigne`
-- , DROP `horairemercredisoir_enseigne`
-- , DROP `horairejeudimatin_enseigne`
-- , DROP `horairejeudimidi_enseigne`
-- , DROP `horairejeudiaprem_enseigne`
-- , DROP `horairejeudisoir_enseigne`
-- , DROP `horairevendredimatin_enseigne`
-- , DROP `horairevendredimidi_enseigne`
-- , DROP `horairevendrediaprem_enseigne`
-- , DROP `horairevendredisoir_enseigne`
-- , DROP `horairesamedimatin_enseigne`
-- , DROP `horairesamedimidi_enseigne`
-- , DROP `horairesamediaprem_enseigne`
-- , DROP `horairesamedisoir_enseigne`
-- , DROP `horairedimanchematin_enseigne`
-- , DROP `horairedimanchemidi_enseigne`
-- , DROP `horairedimancheaprem_enseigne`
-- , DROP `horairedimanchesoir_enseigne`
-- , DROP `metro_enseigne`
-- , DROP `ligne_enseigne`
-- , DROP `parking_enseigne`
-- , DROP `velib_enseigne`
-- , DROP `autolib_enseigne`
-- , DROP `popin_enseigne` ;

ALTER TABLE `contributeurs` DROP `date_inscription`
, DROP `slide1_contributeur`
, DROP `slide2_contributeur`
, DROP `slide3_contributeur`
, DROP `slide4_contributeur`
, DROP `slide5_contributeur`
, DROP `profession_contributeur`
, DROP `descriptif_contributeur`
, DROP `categorieage_contributeur` ;

ALTER TABLE `contributeurs` ADD `date_inscription` datetime DEFAULT NULL
, ADD `slide1_contributeur` varchar(45) DEFAULT NULL
, ADD `slide2_contributeur` varchar(45) DEFAULT NULL
, ADD `slide3_contributeur` varchar(45) DEFAULT NULL
, ADD `slide4_contributeur` varchar(45) DEFAULT NULL
, ADD `slide5_contributeur` varchar(45) DEFAULT NULL
, ADD `profession_contributeur` varchar(45) DEFAULT NULL
, ADD `descriptif_contributeur` longtext DEFAULT NULL
, ADD `categorieage_contributeur` varchar(45) DEFAULT NULL ;

ALTER TABLE `enseignes` ADD `categorie_enseigne` int(10) unsigned NOT NULL
, ADD `scategorie_enseigne` int(10) unsigned NOT NULL
, ADD `sscategorie_enseigne` int(10) unsigned NOT NULL
, ADD `budget_enseigne` int(10) unsigned NOT NULL
, ADD `slide1_enseigne` varchar(45) DEFAULT NULL
, ADD `slide2_enseigne` varchar(45) DEFAULT NULL
, ADD `slide3_enseigne` varchar(45) DEFAULT NULL
, ADD `slide4_enseigne` varchar(45) DEFAULT NULL
, ADD `slide5_enseigne` varchar(45) DEFAULT NULL
, ADD `thumnail_enseigne` varchar(45) DEFAULT NULL
, ADD `video_enseigne` varchar(255) DEFAULT NULL
, ADD `fb_enseigne` varchar(255) DEFAULT NULL
, ADD `tw_enseigne` varchar(255) DEFAULT NULL
, ADD `goog_enseigne` varchar(255) DEFAULT NULL ;
-- , ADD `titreservice1_enseigne` longtext DEFAULT NULL
-- , ADD `contenu1service1_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu1service1_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu1service1_enseigne` longtext DEFAULT NULL
-- , ADD `contenu2service1_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu2service1_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu2service1_enseigne` longtext DEFAULT NULL
-- , ADD `contenu3service1_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu3service1_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu3service1_enseigne` longtext DEFAULT NULL
-- , ADD `contenu4service1_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu4service1_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu4service1_enseigne` longtext DEFAULT NULL
-- , ADD `contenu5service1_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu5service1_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu5service1_enseigne` longtext DEFAULT NULL
-- , ADD `contenu6service1_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu6service1_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu6service1_enseigne` longtext DEFAULT NULL
-- , ADD `contenu7service1_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu7service1_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu7service1_enseigne` longtext DEFAULT NULL
-- , ADD `contenu8service1_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu8service1_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu8service1_enseigne` longtext DEFAULT NULL
-- , ADD `contenu9service1_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu9service1_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu9service1_enseigne` longtext DEFAULT NULL
-- , ADD `contenu10service1_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu10service1_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu10service1_enseigne` longtext DEFAULT NULL
-- , ADD `contenu11service1_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu11service1_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu11service1_enseigne` longtext DEFAULT NULL
-- , ADD `contenu12service1_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu12service1_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu12service1_enseigne` longtext DEFAULT NULL
-- , ADD `contenu13service1_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu13service1_enseigne1` longtext DEFAULT NULL
-- , ADD `affichecontenu13service1_enseigne1` longtext DEFAULT NULL
-- , ADD `contenu14service1_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu14service1_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu14service1_enseigne` longtext DEFAULT NULL
-- , ADD `contenu15service1_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu15service1_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu15service1_enseigne` longtext DEFAULT NULL
-- , ADD `titreservice2_enseigne` longtext DEFAULT NULL
-- , ADD `contenu1service2_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu1service2_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu1service2_enseigne` longtext DEFAULT NULL
-- , ADD `contenu2service2_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu2service2_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu2service2_enseigne` longtext DEFAULT NULL
-- , ADD `contenu3service2_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu3service2_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu3service2_enseigne` longtext DEFAULT NULL
-- , ADD `contenu4service2_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu4service2_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu4service2_enseigne` longtext DEFAULT NULL
-- , ADD `contenu5service2_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu5service2_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu5service2_enseigne` longtext DEFAULT NULL
-- , ADD `contenu6service2_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu6service2_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu6service2_enseigne` longtext DEFAULT NULL
-- , ADD `contenu7service2_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu7service2_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu7service2_enseigne` longtext DEFAULT NULL
-- , ADD `contenu8service2_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu8service2_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu8service2_enseigne` longtext DEFAULT NULL
-- , ADD `contenu9service2_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu9service2_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu9service2_enseigne` longtext DEFAULT NULL
-- , ADD `contenu10service2_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu10service2_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu10service2_enseigne` longtext DEFAULT NULL
-- , ADD `contenu11service2_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu11service2_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu11service2_enseigne` longtext DEFAULT NULL
-- , ADD `contenu12service2_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu12service2_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu12service2_enseigne` longtext DEFAULT NULL
-- , ADD `contenu13service2_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu13service2_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu13service2_enseigne` longtext DEFAULT NULL
-- , ADD `contenu14service2_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu14service2_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu14service2_enseigne` longtext DEFAULT NULL
-- , ADD `contenu15service2_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu15service2_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu15service2_enseigne` longtext DEFAULT NULL
-- , ADD `titreservice3_enseigne` longtext DEFAULT NULL
-- , ADD `contenu1service3_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu1service3_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu1service3_enseigne` longtext DEFAULT NULL
-- , ADD `contenu2service3_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu2service3_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu2service3_enseigne` longtext DEFAULT NULL
-- , ADD `contenu3service3_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu3service3_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu3service3_enseigne` longtext DEFAULT NULL
-- , ADD `contenu4service3_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu4service3_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu4service3_enseigne` longtext DEFAULT NULL
-- , ADD `contenu5service3_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu5service3_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu5service3_enseigne` longtext DEFAULT NULL
-- , ADD `contenu6service3_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu6service3_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu6service3_enseigne` longtext DEFAULT NULL
-- , ADD `contenu7service3_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu7service3_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu7service3_enseigne` longtext DEFAULT NULL
-- , ADD `contenu8service3_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu8service3_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu8service3_enseigne` longtext DEFAULT NULL
-- , ADD `contenu9service3_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu9service3_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu9service3_enseigne` longtext DEFAULT NULL
-- , ADD `contenu10service3_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu10service3_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu10service3_enseigne` longtext DEFAULT NULL
-- , ADD `contenu11service3_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu11service3_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu11service3_enseigne` longtext DEFAULT NULL
-- , ADD `contenu12service3_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu12service3_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu12service3_enseigne` longtext DEFAULT NULL
-- , ADD `contenu13service3_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu13service3_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu13service3_enseigne` longtext DEFAULT NULL
-- , ADD `contenu14service3_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu14service3_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu14service3_enseigne` longtext DEFAULT NULL
-- , ADD `contenu15service3_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu15service3_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu15service3_enseigne` longtext DEFAULT NULL
-- , ADD `titreservice4_enseigne` longtext DEFAULT NULL
-- , ADD `contenu1service4_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu1service4_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu1service4_enseigne` longtext DEFAULT NULL
-- , ADD `contenu2service4_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu2service4_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu2service4_enseigne` longtext DEFAULT NULL
-- , ADD `contenu3service4_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu3service4_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu3service4_enseigne` longtext DEFAULT NULL
-- , ADD `contenu4service4_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu4service4_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu4service4_enseigne` longtext DEFAULT NULL
-- , ADD `contenu5service4_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu5service4_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu5service4_enseigne` longtext DEFAULT NULL
-- , ADD `contenu6service4_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu6service4_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu6service4_enseigne` longtext DEFAULT NULL
-- , ADD `contenu7service4_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu7service4_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu7service4_enseigne` longtext DEFAULT NULL
-- , ADD `contenu8service4_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu8service4_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu8service4_enseigne` longtext DEFAULT NULL
-- , ADD `contenu9service4_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu9service4_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu9service4_enseigne` longtext DEFAULT NULL
-- , ADD `contenu10service4_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu10service4_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu10service4_enseigne` longtext DEFAULT NULL
-- , ADD `contenu11service4_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu11service4_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu11service4_enseigne` longtext DEFAULT NULL
-- , ADD `contenu12service4_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu12service4_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu12service4_enseigne` longtext DEFAULT NULL
-- , ADD `contenu13service4_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu13service4_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu13service4_enseigne` longtext DEFAULT NULL
-- , ADD `contenu14service4_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu14service4_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu14service4_enseigne` longtext DEFAULT NULL
-- , ADD `contenu15service4_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu15service4_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu15service4_enseigne` longtext DEFAULT NULL
-- , ADD `titreservice5_enseigne` longtext DEFAULT NULL
-- , ADD `contenu1service5_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu1service5_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu1service5_enseigne` longtext DEFAULT NULL
-- , ADD `contenu2service5_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu2service5_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu2service5_enseigne` longtext DEFAULT NULL
-- , ADD `contenu3service5_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu3service5_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu3service5_enseigne` longtext DEFAULT NULL
-- , ADD `contenu4service5_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu4service5_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu4service5_enseigne` longtext DEFAULT NULL
-- , ADD `contenu5service5_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu5service5_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu5service5_enseigne` longtext DEFAULT NULL
-- , ADD `contenu6service5_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu6service5_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu6service5_enseigne` longtext DEFAULT NULL
-- , ADD `contenu7service5_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu7service5_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu7service5_enseigne` longtext DEFAULT NULL
-- , ADD `contenu8service5_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu8service5_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu8service5_enseigne` longtext DEFAULT NULL
-- , ADD `contenu9service5_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu9service5_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu9service5_enseigne` longtext DEFAULT NULL
-- , ADD `contenu10service5_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu10service5_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu10service5_enseigne` longtext DEFAULT NULL
-- , ADD `contenu11service5_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu11service5_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu11service5_enseigne` longtext DEFAULT NULL
-- , ADD `contenu12service5_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu12service5_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu12service5_enseigne` longtext DEFAULT NULL
-- , ADD `contenu13service5_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu13service5_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu13service5_enseigne` longtext DEFAULT NULL
-- , ADD `contenu14service5_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu14service5_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu14service5_enseigne` longtext DEFAULT NULL
-- , ADD `contenu15service5_enseigne` longtext DEFAULT NULL
-- , ADD `prixcontenu15service5_enseigne` longtext DEFAULT NULL
-- , ADD `affichecontenu15service5_enseigne` longtext DEFAULT NULL
-- , ADD `voiturier_enseigne` longtext DEFAULT NULL
-- , ADD `couverts_enseigne` longtext DEFAULT NULL
-- , ADD `salaries_enseigne` longtext DEFAULT NULL
-- , ADD `reservation_enseigne` longtext DEFAULT NULL
-- , ADD `horairelundimatin_enseigne` longtext DEFAULT NULL
-- , ADD `horairelundimidi_enseigne` longtext DEFAULT NULL
-- , ADD `horairelundiaprem_enseigne` longtext DEFAULT NULL
-- , ADD `horairelundisoir_enseigne` longtext DEFAULT NULL
-- , ADD `horairemardimatin_enseigne` longtext DEFAULT NULL
-- , ADD `horairemardimidi_enseigne` longtext DEFAULT NULL
-- , ADD `horairemardiaprem_enseigne` longtext DEFAULT NULL
-- , ADD `horairemardisoir_enseigne` longtext DEFAULT NULL
-- , ADD `horairemercredimatin_enseigne` longtext DEFAULT NULL
-- , ADD `horairemercredimidi_enseigne` longtext DEFAULT NULL
-- , ADD `horairemercrediaprem_enseigne` longtext DEFAULT NULL
-- , ADD `horairemercredisoir_enseigne` longtext DEFAULT NULL
-- , ADD `horairejeudimatin_enseigne` longtext DEFAULT NULL
-- , ADD `horairejeudimidi_enseigne` longtext DEFAULT NULL
-- , ADD `horairejeudiaprem_enseigne` longtext DEFAULT NULL
-- , ADD `horairejeudisoir_enseigne` longtext DEFAULT NULL
-- , ADD `horairevendredimatin_enseigne` longtext DEFAULT NULL
-- , ADD `horairevendredimidi_enseigne` longtext DEFAULT NULL
-- , ADD `horairevendrediaprem_enseigne` longtext DEFAULT NULL
-- , ADD `horairevendredisoir_enseigne` longtext DEFAULT NULL
-- , ADD `horairesamedimatin_enseigne` longtext DEFAULT NULL
-- , ADD `horairesamedimidi_enseigne` longtext DEFAULT NULL
-- , ADD `horairesamediaprem_enseigne` longtext DEFAULT NULL
-- , ADD `horairesamedisoir_enseigne` longtext DEFAULT NULL
-- , ADD `horairedimanchematin_enseigne` longtext DEFAULT NULL
-- , ADD `horairedimanchemidi_enseigne` longtext DEFAULT NULL
-- , ADD `horairedimancheaprem_enseigne` longtext DEFAULT NULL
-- , ADD `horairedimanchesoir_enseigne` longtext DEFAULT NULL
-- , ADD `metro_enseigne` longtext DEFAULT NULL
-- , ADD `ligne_enseigne` longtext DEFAULT NULL
-- , ADD `parking_enseigne` longtext DEFAULT NULL
-- , ADD `velib_enseigne` longtext DEFAULT NULL
-- , ADD `autolib_enseigne` longtext DEFAULT NULL
-- , ADD `popin_enseigne` longtext DEFAULT NULL ;

UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=1 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=2 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=3 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=4 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=5 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=6 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=7 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=8 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=9 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=10 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=11 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=12 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=13 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=14 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=15 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=16 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=17 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=18 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=19 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=20 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=21 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=22 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=23 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=24 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=25 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=26 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=27 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=28 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=29 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=30 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=31 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=32 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=33 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=34 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=35 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=36 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=37 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=38 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=39 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=40 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=41 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=42 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=43 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=44 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=45 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=46 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=47 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=48 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=49 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=50 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=51 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=52 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=53 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=54 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=55 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=56 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=57 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=58 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=59 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=60 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=61 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=62 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=63 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=64 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=65 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=66 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=67 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=68 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=69 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=70 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=71 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=72 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=73 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=74 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=75 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=76 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=77 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=78 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=79 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=80 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=81 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=82 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=83 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=84 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=85 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=86 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=87 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=88 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=89 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=90 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=91 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=92 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=93 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=94 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=95 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=96 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=97 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=98 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=99 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=100 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=101 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=102 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=103 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=104 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=105 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=106 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=107 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=108 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=109 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=110 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=111 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=112 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=113 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=114 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=115 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=116 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=117 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=118 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=119 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=120 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=121 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=122 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=123 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=124 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=125 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=126 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=127 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=128 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=129 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=130 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=131 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=132 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=133 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=134 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=135 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=136 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=137 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=138 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=139 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=140 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=141 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=142 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=143 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=144 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=145 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=146 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=147 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=148 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=149 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=150 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=151 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=152 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=153 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=154 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=155 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=156 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=157 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=158 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=159 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=160 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=161 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=162 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=163 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=164 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=165 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=166 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=167 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=168 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=169 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=170 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=171 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=172 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=173 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=174 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=175 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=176 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=177 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=178 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=179 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=180 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=181 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=182 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=183 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=184 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=185 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=186 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=187 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=188 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=189 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=190 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=191 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=192 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=193 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=194 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=195 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=196 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=197 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=198 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=199 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=200 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=201 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=202 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=203 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=204 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=205 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=206 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=207 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=208 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=209 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=210 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=211 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=212 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=213 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=214 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=215 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=216 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=217 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=218 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=219 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=220 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=221 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=222 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=223 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=224 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=225 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=226 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=227 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=228 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=229 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=230 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=231 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=232 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=233 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=234 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=235 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=236 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=237 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=238 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=239 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=240 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=241 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=242 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=243 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=244 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=245 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=246 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=247 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=248 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=249 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=250 ;
UPDATE `enseignes` SET sscategorie_enseigne=5 WHERE id_enseigne=251 ;
UPDATE `enseignes` SET sscategorie_enseigne=6 WHERE id_enseigne=252 ;
UPDATE `enseignes` SET sscategorie_enseigne=4 WHERE id_enseigne=253 ;



-- --------------------------------------------------------

--
-- Structure de la table `budget`
--

CREATE TABLE IF NOT EXISTS `budget` (
  `id_budget` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `budget_enseigne` varchar(45) NOT NULL,
  PRIMARY KEY (`id_budget`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

INSERT INTO `budget` (`id_budget`, `budget_enseigne`) VALUES
(1, 'Bon marché, moins de 7€'),
(2, 'Raisonnable, de 8€ à 20€'),
(3, 'Cher, de 21€ à 40€'),
(4, 'Très cher, plus de 41€') ;

-- --------------------------------------------------------

--
-- Structure de la table `objets`
--

CREATE TABLE IF NOT EXISTS `objets` (
  `id_objet` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slide_objet` varchar(45) DEFAULT NULL,
  `thumbnail_objet` varchar(45) DEFAULT NULL,
  `nom_objet` varchar(45) DEFAULT NULL,
  `descriptif_objet` longtext,
  `ou_objet` varchar(45) DEFAULT NULL,
  `sscategorie_objet` int(10) unsigned NOT NULL,
  `video_objet` varchar(255) DEFAULT NULL,
  `fb_objet` varchar(255) DEFAULT NULL,
  `tw_objet` varchar(255) DEFAULT NULL,  
  `goog_objet` varchar(255) DEFAULT NULL,
  `url_objet` varchar(255) DEFAULT NULL,
  `titredescriptif1_objet` longtext,
  `contenu1descriptif1_objet` longtext,
  `contenu2descriptif1_objet` longtext,
  `contenu3descriptif1_objet` longtext,
  `contenu4descriptif1_objet` longtext,
  `contenu5descriptif1_objet` longtext,
  `titredescriptif2_objet` longtext,
  `contenu1descriptif2_objet` longtext,
  `contenu2descriptif2_objet` longtext,
  `contenu3descriptif2_objet` longtext,
  `contenu4descriptif2_objet` longtext,
  `contenu5descriptif2_objet` longtext,
  `titredescriptif3_objet` longtext,
  `contenu1descriptif3_objet` longtext,
  `contenu2descriptif3_objet` longtext,
  `contenu3descriptif3_objet` longtext,
  `contenu4descriptif3_objet` longtext,
  `contenu5descriptif3_objet` longtext,
  PRIMARY KEY (`id_objet`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id_categorie` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categorie_principale` varchar(50) DEFAULT NULL,
  `couleur` varchar(50) DEFAULT NULL,
  `posx` int(10) DEFAULT NULL,
  `posy` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Structure de la table `sous_categories`
--

CREATE TABLE IF NOT EXISTS `sous_categories` (
  `id_sous_categorie` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_categorie` int(10) unsigned NOT NULL,
  `sous_categorie` varchar(50) DEFAULT NULL,
  `posx` int(10) DEFAULT NULL,
  `posy` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_sous_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=165 ;

-- --------------------------------------------------------

--
-- Structure de la table `sous_categories2`
--

CREATE TABLE IF NOT EXISTS `sous_categories2` (
  `id_sous_categorie2` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_sous_categorie` int(10) unsigned NOT NULL,
  `id_categorie` int(10) unsigned NOT NULL,
  `sous_categorie2` varchar(50) DEFAULT NULL,
  `posx` int(10) DEFAULT NULL,
  `posy` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_sous_categorie2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=665 ;

-- --------------------------------------------------------

--
-- Structure de la table `contributeurs_aiment_enseignes`
--

CREATE TABLE IF NOT EXISTS `contributeurs_aiment_enseignes` (
  `contributeurs_id_contributeur` int(10) unsigned NOT NULL,
  `enseignes_id_enseigne` int(10) unsigned NOT NULL,
   `date_aime` datetime DEFAULT NULL,
  PRIMARY KEY (`contributeurs_id_contributeur`,`enseignes_id_enseigne`),
  KEY `fk_enseignes_has_aime_enseignes1` (`enseignes_id_enseigne`),
  KEY `fk_contributeurs_has_aime_contributeurs1` (`contributeurs_id_contributeur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour la table `contributeurs_aiment_enseignes`
--
ALTER TABLE `contributeurs_aiment_enseignes`
  ADD CONSTRAINT `fk_enseignes_has_aime_enseignes1` FOREIGN KEY (`enseignes_id_enseigne`) REFERENCES `enseignes` (`id_enseigne`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contributeurs_has_aime_contributeurs1` FOREIGN KEY (`contributeurs_id_contributeur`) REFERENCES `contributeurs` (`id_contributeur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

  -- --------------------------------------------------------

--
-- Structure de la table `contributeurs_aiment_pas_enseignes`
--

CREATE TABLE IF NOT EXISTS `contributeurs_aiment_pas_enseignes` (
  `contributeurs_id_contributeur` int(10) unsigned NOT NULL,
  `enseignes_id_enseigne` int(10) unsigned NOT NULL,
  `date_aime_pas` datetime DEFAULT NULL,
  PRIMARY KEY (`contributeurs_id_contributeur`,`enseignes_id_enseigne`),
  KEY `fk_enseignes_has_aime_pas_enseignes1` (`enseignes_id_enseigne`),
  KEY `fk_contributeurs_has_aime_pas_contributeurs1` (`contributeurs_id_contributeur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour la table `contributeurs_aiment_pas_enseignes`
--
ALTER TABLE `contributeurs_aiment_pas_enseignes`
  ADD CONSTRAINT `fk_enseignes_has_aime_pas_enseignes1` FOREIGN KEY (`enseignes_id_enseigne`) REFERENCES `enseignes` (`id_enseigne`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contributeurs_has_aime_pas_contributeurs1` FOREIGN KEY (`contributeurs_id_contributeur`) REFERENCES `contributeurs` (`id_contributeur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- --------------------------------------------------------

--
-- Structure de la table `contributeurs_wish_enseignes`
--

CREATE TABLE IF NOT EXISTS `contributeurs_wish_enseignes` (
  `contributeurs_id_contributeur` int(10) unsigned NOT NULL,
  `enseignes_id_enseigne` int(10) unsigned NOT NULL,
  `date_wish` datetime DEFAULT NULL,
  PRIMARY KEY (`contributeurs_id_contributeur`,`enseignes_id_enseigne`),
  KEY `fk_enseignes_has_wish_enseignes1` (`enseignes_id_enseigne`),
  KEY `fk_contributeurs_has_wish_contributeurs1` (`contributeurs_id_contributeur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour la table `contributeurs_wish_enseignes`
--
ALTER TABLE `contributeurs_wish_enseignes`
  ADD CONSTRAINT `fk_enseignes_has_wish_enseignes1` FOREIGN KEY (`enseignes_id_enseigne`) REFERENCES `enseignes` (`id_enseigne`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contributeurs_has_wish_contributeurs1` FOREIGN KEY (`contributeurs_id_contributeur`) REFERENCES `contributeurs` (`id_contributeur`) ON DELETE NO ACTION ON UPDATE NO ACTION;
 
 -- --------------------------------------------------------

--
-- Structure de la table `contributeurs_follow_enseignes`
--

CREATE TABLE IF NOT EXISTS `contributeurs_follow_enseignes` (
  `contributeurs_id_contributeur` int(10) unsigned NOT NULL,
  `enseignes_id_enseigne` int(10) unsigned NOT NULL,
  `date_follow` datetime DEFAULT NULL,
  PRIMARY KEY (`contributeurs_id_contributeur`,`enseignes_id_enseigne`),
  KEY `fk_contributeurs_has_follow_enseignes1` (`contributeurs_id_contributeur`),
  KEY `fk_enseignes_has_follow_contributeurs1` (`enseignes_id_enseigne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour la table `contributeurs_follow_enseignes`
--
ALTER TABLE `contributeurs_follow_enseignes`
  ADD CONSTRAINT `fk_contributeurs_has_follow_enseignes1` FOREIGN KEY (`contributeurs_id_contributeur`) REFERENCES `contributeurs` (`id_contributeur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_enseignes_has_follow_enseignes1` FOREIGN KEY (`enseignes_id_enseigne`) REFERENCES `enseignes` (`id_enseigne`) ON DELETE NO ACTION ON UPDATE NO ACTION;
 
-- --------------------------------------------------------

--
-- Structure de la table `contributeurs_aiment_objets`
--

CREATE TABLE IF NOT EXISTS `contributeurs_aiment_objets` (
  `contributeurs_id_contributeur` int(10) unsigned NOT NULL,
  `objets_id_objet` int(10) unsigned NOT NULL,
   `date_aime` datetime DEFAULT NULL,
  PRIMARY KEY (`contributeurs_id_contributeur`,`objets_id_objet`),
  KEY `fk_objets_has_aime_objets1` (`objets_id_objet`),
  KEY `fk_contributeurs_has_aime_objet_contributeurs1` (`contributeurs_id_contributeur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour la table `contributeurs_aiment_objets`
--
ALTER TABLE `contributeurs_aiment_objets`
  ADD CONSTRAINT `fk_objets_has_aime_objets1` FOREIGN KEY (`objets_id_objet`) REFERENCES `objets` (`id_objet`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contributeurs_has_aime_objet_contributeurs1` FOREIGN KEY (`contributeurs_id_contributeur`) REFERENCES `contributeurs` (`id_contributeur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

  -- --------------------------------------------------------

--
-- Structure de la table `contributeurs_aiment_pas_objets`
--

CREATE TABLE IF NOT EXISTS `contributeurs_aiment_pas_objets` (
  `contributeurs_id_contributeur` int(10) unsigned NOT NULL,
  `objets_id_objet` int(10) unsigned NOT NULL,
  `date_aime_pas` datetime DEFAULT NULL,
  PRIMARY KEY (`contributeurs_id_contributeur`,`objets_id_objet`),
  KEY `fk_objets_has_aime_pas_objets1` (`objets_id_objet`),
  KEY `fk_contributeurs_has_aime_pas_objet_contributeurs1` (`contributeurs_id_contributeur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour la table `contributeurs_aiment_pas_objets`
--
ALTER TABLE `contributeurs_aiment_pas_objets`
  ADD CONSTRAINT `fk_objets_has_aime_pas_objets1` FOREIGN KEY (`objets_id_objet`) REFERENCES `objets` (`id_objet`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contributeurs_has_aime_pas_objet_contributeurs1` FOREIGN KEY (`contributeurs_id_contributeur`) REFERENCES `contributeurs` (`id_contributeur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- --------------------------------------------------------

--
-- Structure de la table `contributeurs_wish_objets`
--

CREATE TABLE IF NOT EXISTS `contributeurs_wish_objets` (
  `contributeurs_id_contributeur` int(10) unsigned NOT NULL,
  `objets_id_objet` int(10) unsigned NOT NULL,
  `date_wish` datetime DEFAULT NULL,
  PRIMARY KEY (`contributeurs_id_contributeur`,`objets_id_objet`),
  KEY `fk_objets_has_wish_objets1` (`objets_id_objet`),
  KEY `fk_contributeurs_has_wish_objet_contributeurs1` (`contributeurs_id_contributeur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour la table `contributeurs_wish_objets`
--
ALTER TABLE `contributeurs_wish_objets`
  ADD CONSTRAINT `fk_objets_has_wish_objets1` FOREIGN KEY (`objets_id_objet`) REFERENCES `objets` (`id_objet`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contributeurs_has_wish_objet_contributeurs1` FOREIGN KEY (`contributeurs_id_contributeur`) REFERENCES `contributeurs` (`id_contributeur`) ON DELETE NO ACTION ON UPDATE NO ACTION;
 
 
-- --------------------------------------------------------

--
-- Structure de la table `contributeurs_follow_contributeurs`
--

CREATE TABLE IF NOT EXISTS `contributeurs_follow_contributeurs` (
  `contributeurs_id_contributeur` int(10) unsigned NOT NULL,
  `contributeurs_id_contributeurfollow` int(10) unsigned NOT NULL,
  `date_follow` datetime DEFAULT NULL,
  PRIMARY KEY (`contributeurs_id_contributeur`,`contributeurs_id_contributeurfollow`),
  KEY `fk_contributeurs_has_follow_contributeurs1` (`contributeurs_id_contributeur`),
  KEY `fk_contributeurs_has_follow_contributeurs2` (`contributeurs_id_contributeurfollow`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour la table `contributeurs_follow_contributeurs`
--
ALTER TABLE `contributeurs_follow_contributeurs`
  ADD CONSTRAINT `fk_contributeurs_has_follow_contributeurs1` FOREIGN KEY (`contributeurs_id_contributeur`) REFERENCES `contributeurs` (`id_contributeur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contributeurs_has_follow_contributeurs2` FOREIGN KEY (`contributeurs_id_contributeurfollow`) REFERENCES `contributeurs` (`id_contributeur`) ON DELETE NO ACTION ON UPDATE NO ACTION;
 
    
  
  
  -- --------------------------------------------------------

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `categorie_principale`,  `couleur`, `posx`, `posy`) VALUES
(1, 'Cuisine', '#fabe41', NULL, NULL),
(2, 'Beauté et bien être', '#f480bc', NULL, NULL),
(3, 'Culture', '#46ba8f', NULL, NULL),
(4, 'Mode et design', '#8b6c4d', NULL, NULL),
(5, 'Santé', '#de5b30', NULL, NULL),
(6, 'Sorties, voyages et loisirs', '#3068a0', NULL, NULL),
(7, 'Sport', '#4ebde8', NULL, NULL),
(8, 'Services et inclassables', '#a1679a', NULL, NULL) ;

--
-- Contenu de la table `sous_categories`
--

INSERT INTO `sous_categories` (`id_sous_categorie`, `id_categorie`, `sous_categorie`, `posx`, `posy`) VALUES
(1, '1', 'Restaurant cuisine  française', NULL, NULL),
(2, '1', 'Restaurant cuisine Africaine', NULL, NULL),
(3, '1', 'Restaurant cuisine Asiatique', NULL, NULL),
(4, '1', 'Restaurant cuisine des iles', NULL, NULL),
(5, '1', 'Restaurant Cuisine Latino-américaine', NULL, NULL),
(6, '1', 'Restaurant Cuisine Nord-américaine', NULL, NULL),
(7, '1', 'Restaurant cuisine orientale', NULL, NULL),
(8, '1', 'Cuisine slave', NULL, NULL),
(9, '1', 'Cuisine Indienne', NULL, NULL),
(10, '1', 'Cuisine espagnole', NULL, NULL),
(11, '1', 'Cuisine Italienne', NULL, NULL),
(12, '1', 'Cuisine World food', NULL, NULL),
(13, '1', 'Autres cuisines', NULL, NULL),
(14, '1', 'Glaciers et salons de thé', NULL, NULL),
(15, '1', 'Glaces', NULL, NULL),
(16, '1', 'Sandwicheries, cafétérias et restauration rapide', NULL, NULL),
(17, '1', 'Autres restauration', NULL, NULL),
(18, '1', 'Alimentation générale', NULL, NULL),
(19, '1', 'Boucheries et charcuteries', NULL, NULL),
(20, '1', 'Boulangeries et pâtisseries', NULL, NULL),
(21, '1', 'Cavistes', NULL, NULL),
(22, '1', 'Chocolatiers et confiseurs', NULL, NULL),
(23, '1', 'Crèmeries et fromageries', NULL, NULL),
(24, '1', 'Diététique et alimentation bio', NULL, NULL),
(25, '1', 'Epiceries fines', NULL, NULL),
(26, '1', 'Poissonneries', NULL, NULL),
(27, '1', 'Primeurs', NULL, NULL),
(28, '1', 'Surgelés', NULL, NULL),
(29, '1', 'Torréfacteurs et maisons de thé', NULL, NULL),
(30, '1', 'Traiteurs', NULL, NULL),
(31, '1', 'Produits frais', NULL, NULL),
(32, '1', 'Plats', NULL, NULL),
(33, '1', 'Marques', NULL, NULL),
(34, '1', 'Cours de cuisine', NULL, NULL),
(35, '1', 'Autres alimentation', NULL, NULL),
(36, '2', 'Centres de bronzage et solariums', NULL, NULL),
(37, '2', 'Instituts de beauté et spas', NULL, NULL),
(38, '2', 'Hammams et saunas', NULL, NULL),
(39, '2', 'Magasins spécialisés', NULL, NULL),
(40, '2', 'Parfumeries', NULL, NULL),
(41, '2', 'Salons de coiffure', NULL, NULL),
(42, '2', 'Salons de massage', NULL, NULL),
(43, '2', 'Marques', NULL, NULL),
(44, '2', 'Personnalités', NULL, NULL),
(45, '2', 'Autres beaute et bien etre', NULL, NULL),
(46, '3', 'Arts graphiques', NULL, NULL),
(47, '3', 'Beaux-arts', NULL, NULL),
(48, '3', 'Cinéma et vidéo', NULL, NULL),
(49, '3', 'Littératures', NULL, NULL),
(50, '3', 'Musique', NULL, NULL),
(51, '3', 'Photographie', NULL, NULL),
(52, '3', 'Théâtre, opéra et spectacle vivant', NULL, NULL),
(53, '3', 'Général', NULL, NULL),
(54, '3', 'Marques', NULL, NULL),
(55, '3', 'Personnalités', NULL, NULL),
(56, '3', 'Autres culture', NULL, NULL),
(57, '4', 'Ameublement', NULL, NULL),
(58, '4', 'Décoration', NULL, NULL),
(59, '4', 'Electroménager et matériel informatique', NULL, NULL),
(60, '4', 'Autres équipement et articles de maison', NULL, NULL),
(61, '4', 'Jardineries', NULL, NULL),
(62, '4', 'Bijouteries', NULL, NULL),
(63, '4', 'Chausseurs', NULL, NULL),
(64, '4', 'Magasins de prêt-à-porter', NULL, NULL),
(65, '4', 'Habits prets à porter', NULL, NULL),
(66, '4', 'Magasin Haute-Couture', NULL, NULL),
(67, '4', 'Habits Haute-Couture', NULL, NULL),
(68, '4', 'Friperies', NULL, NULL),
(69, '4', 'Solderies', NULL, NULL),
(70, '4', 'Ganteries', NULL, NULL),
(71, '4', 'Chapelleries', NULL, NULL),
(72, '4', 'Maroquineries', NULL, NULL),
(73, '4', 'Colifichets et foulards', NULL, NULL),
(74, '4', 'Montres', NULL, NULL),
(75, '4', 'Parapluies', NULL, NULL),
(76, '4', 'Perruques', NULL, NULL),
(77, '4', 'Marques', NULL, NULL),
(78, '4', 'Personnalités', NULL, NULL),
(79, '4', 'Autres', NULL, NULL),
(80, '5', 'Centres de thalasso', NULL, NULL),
(81, '5', 'Equipement médical', NULL, NULL),
(82, '5', 'Laboratoire médical', NULL, NULL),
(83, '5', 'Maisons médicales', NULL, NULL),
(84, '5', 'Opticiens et acoustique', NULL, NULL),
(85, '5', 'Pharmacies et parapharmacies', NULL, NULL),
(86, '5', 'Soins vétérinaires', NULL, NULL),
(87, '5', 'Marques', NULL, NULL),
(88, '5', 'Personnalités', NULL, NULL),
(89, '5', 'Autres', NULL, NULL),
(90, '6', 'Bars', NULL, NULL),
(91, '6', 'Cabarets', NULL, NULL),
(92, '6', 'Pubs', NULL, NULL),
(93, '6', 'Night clubs', NULL, NULL),
(94, '6', 'Billards', NULL, NULL),
(95, '6', 'Bowlings', NULL, NULL),
(96, '6', 'Déguisements, farces et attrapes', NULL, NULL),
(97, '6', 'Jeux', NULL, NULL),
(98, '6', 'Modélisme', NULL, NULL),
(99, '6', 'Parcs d''attraction', NULL, NULL),
(100, '6', 'Parcs et nature', NULL, NULL),
(101, '6', 'Voyages', NULL, NULL),
(102, '6', 'Animaux', NULL, NULL),
(103, '6', 'Marques', NULL, NULL),
(104, '6', 'Autres sorties, voyages et loisirs', NULL, NULL),
(105, '7', 'Footlball', NULL, NULL),
(106, '7', 'Tennis', NULL, NULL),
(107, '7', 'Rugby', NULL, NULL),
(108, '7', 'F1', NULL, NULL),
(109, '7', 'Auto-Moto', NULL, NULL),
(110, '7', 'Basket', NULL, NULL),
(111, '7', 'Handball', NULL, NULL),
(112, '7', 'Golf', NULL, NULL),
(113, '7', 'Cyclisme', NULL, NULL),
(114, '7', 'Athlétisme', NULL, NULL),
(115, '7', 'Natation', NULL, NULL),
(116, '7', 'Voile', NULL, NULL),
(117, '7', 'Hyppisme', NULL, NULL),
(118, '7', 'Volley Ball', NULL, NULL),
(119, '7', 'Hockey', NULL, NULL),
(120, '7', 'Surf', NULL, NULL),
(121, '7', 'Judo', NULL, NULL),
(122, '7', 'Escrime', NULL, NULL),
(123, '7', 'Ski – Glace', NULL, NULL),
(124, '7', 'Boxe', NULL, NULL),
(125, '7', 'Gym', NULL, NULL),
(126, '7', 'Aviron', NULL, NULL),
(127, '7', 'NFL', NULL, NULL),
(128, '7', 'Tennis de table', NULL, NULL),
(129, '7', 'Equitation', NULL, NULL),
(130, '7', 'Kanoe kayak', NULL, NULL),
(131, '7', 'Haltérophilie', NULL, NULL),
(132, '7', 'Triathlon', NULL, NULL),
(133, '7', 'Lutte gréco romaine', NULL, NULL),
(134, '7', 'Pentathlon moderne', NULL, NULL),
(135, '7', 'Tir', NULL, NULL),
(136, '7', 'Taekwondo', NULL, NULL),
(137, '7', 'Badmington', NULL, NULL),
(138, '7', 'Magasins généralistes', NULL, NULL),
(139, '7', 'Marques', NULL, NULL),
(140, '7', 'Magasins produits diététiques', NULL, NULL),
(141, '7', 'Presse et médias', NULL, NULL),
(142, '7', 'Personnalités', NULL, NULL),
(143, '7', 'Autres', NULL, NULL),
(144, '8', 'Achat d''or', NULL, NULL),
(145, '8', 'Agences immobilières', NULL, NULL),
(146, '8', 'Agences intérimaires', NULL, NULL),
(147, '8', 'Assureurs', NULL, NULL),
(148, '8', 'Banques', NULL, NULL),
(149, '8', 'Bureaux de tabac', NULL, NULL),
(150, '8', 'Cordonneries', NULL, NULL),
(151, '8', 'Concessionnaires', NULL, NULL),
(152, '8', 'Electriciens', NULL, NULL),
(153, '8', 'Grande distribution', NULL, NULL),
(154, '8', 'Laveries', NULL, NULL),
(155, '8', 'Location de véhicules', NULL, NULL),
(156, '8', 'Maisons de la presse', NULL, NULL),
(157, '8', 'Ménage à domicile', NULL, NULL),
(158, '8', 'Plombiers', NULL, NULL),
(159, '8', 'Pressings et nettoyage à sec', NULL, NULL),
(160, '8', 'Réparation TV-Hifi-informatique', NULL, NULL),
(161, '8', 'Serruriers', NULL, NULL),
(162, '8', 'Stations-services', NULL, NULL),
(163, '8', 'Sexshop', NULL, NULL),
(164, '8', 'Clubs privés', NULL, NULL);

--
-- Contenu de la table `sous_categories2`
--

INSERT INTO `sous_categories2` (`id_sous_categorie2`, `id_sous_categorie`, `id_categorie`, `sous_categorie2`, `posx`, `posy`) VALUES
(1, 1, 1, 'Bistrots, brasseries et bars à vin', NULL, NULL),
(2, 1, 1, 'Crêperies', NULL, NULL),
(3, 1, 1, 'Cuisine du sud-ouest', NULL, NULL),
(4, 1, 1, 'Cuisine provencale', NULL, NULL),
(5, 1, 1, 'Cuisine méditérannéenne', NULL, NULL),
(6, 1, 1, 'Cuisine corse', NULL, NULL),
(7, 1, 1, 'Cuisine des régions', NULL, NULL),
(8, 1, 1, 'Cuisine du marché', NULL, NULL),
(9, 1, 1, 'Cuisine fusion', NULL, NULL),
(10, 1, 1, 'Cuisine traditionnelle', NULL, NULL),
(11, 1, 1, 'Gastronomique', NULL, NULL),
(12, 1, 1, 'Méridionale', NULL, NULL),
(13, 1, 1, 'Autres', NULL, NULL),
(14, 2, 1, 'Africaine', NULL, NULL),
(15, 2, 1, 'Autres', NULL, NULL),
(16, 3, 1, 'Chinois', NULL, NULL),
(17, 3, 1, 'Japonais', NULL, NULL),
(18, 3, 1, 'Tahilandais', NULL, NULL),
(19, 3, 1, 'Vietnamien', NULL, NULL),
(20, 3, 1, 'Autres', NULL, NULL),
(21, 4, 1, 'Créole', NULL, NULL),
(22, 4, 1, 'Tahitienne', NULL, NULL),
(23, 4, 1, 'Autres', NULL, NULL),
(24, 5, 1, 'Brésillien', NULL, NULL),
(25, 5, 1, 'Cubain', NULL, NULL),
(26, 5, 1, 'Latino', NULL, NULL),
(27, 5, 1, 'Mexicain', NULL, NULL),
(28, 5, 1, 'Autres', NULL, NULL),
(29, 6, 1, 'Nord-américaine', NULL, NULL),
(30, 6, 1, 'Autres', NULL, NULL),
(31, 7, 1, 'Marocain', NULL, NULL),
(32, 7, 1, 'Libanais', NULL, NULL),
(33, 7, 1, 'Turc', NULL, NULL),
(34, 7, 1, 'Grec', NULL, NULL),
(35, 7, 1, 'Autres', NULL, NULL),
(36, 8, 1, 'Russe', NULL, NULL),
(37, 8, 1, 'Scandinave', NULL, NULL),
(38, 8, 1, 'Autres', NULL, NULL),
(39, 9, 1, NULL, NULL, NULL),
(40, 10, 1, NULL, NULL, NULL),
(41, 11, 1, NULL, NULL, NULL),
(42, 12, 1, NULL, NULL, NULL),
(43, 13, 1, NULL, NULL, NULL),
(44, 14, 1, 'Bars à fruit', NULL, NULL),
(45, 14, 1, 'Glaciers', NULL, NULL),
(46, 14, 1, 'Salons de thé', NULL, NULL),
(47, 15, 1, NULL, NULL, NULL),
(48, 16, 1, 'Commerces', NULL, NULL),
(49, 16, 1, 'Produits', NULL, NULL),
(50, 17, 1, 'Commerces', NULL, NULL),
(51, 17, 1, 'Produits', NULL, NULL),
(52, 18, 1, 'Commerces', NULL, NULL),
(53, 18, 1, 'Produits', NULL, NULL),
(54, 19, 1, 'Boucherie halal', NULL, NULL),
(55, 19, 1, 'Boucherie casher', NULL, NULL),
(56, 19, 1, 'Boucherie traditionnelle', NULL, NULL),
(57, 19, 1, 'Produits', NULL, NULL),
(58, 20, 1, 'Commerces', NULL, NULL),
(59, 20, 1, 'Produits', NULL, NULL),
(60, 21, 1, 'Commerces', NULL, NULL),
(61, 21, 1, 'Produits', NULL, NULL),
(62, 22, 1, 'Commerces', NULL, NULL),
(63, 22, 1, 'Produits', NULL, NULL),
(64, 23, 1, 'Commerces', NULL, NULL),
(65, 23, 1, 'Produits', NULL, NULL),
(66, 24, 1, 'Commerces', NULL, NULL),
(67, 24, 1, 'Produits', NULL, NULL),
(68, 25, 1, 'Commerces', NULL, NULL),
(69, 25, 1, 'Produits', NULL, NULL),
(70, 26, 1, 'Commerces', NULL, NULL),
(71, 26, 1, 'Produits', NULL, NULL),
(72, 27, 1, 'Commerces', NULL, NULL),
(73, 27, 1, 'Produits', NULL, NULL),
(74, 28, 1, 'Commerces', NULL, NULL),
(75, 28, 1, 'Produits', NULL, NULL),
(76, 29, 1, 'Commerces', NULL, NULL),
(77, 29, 1, 'Produits', NULL, NULL),
(78, 30, 1, 'Commerces', NULL, NULL),
(79, 30, 1, 'Produits', NULL, NULL),
(80, 31, 1, NULL, NULL, NULL),
(81, 32, 1, 'Restaurant cuisine  française', NULL, NULL),
(82, 32, 1, 'Restaurant cuisine Africaine', NULL, NULL),
(83, 32, 1, 'Restaurant cuisine Asiatique', NULL, NULL),
(84, 32, 1, 'Restaurant cuisine des iles', NULL, NULL),
(85, 32, 1, 'Restaurnant Cuisine Latino-américaine', NULL, NULL),
(86, 32, 1, 'Restaurant Cuisine Nord-américaine', NULL, NULL),
(87, 32, 1, 'Restaurant cuisine orientale', NULL, NULL),
(88, 32, 1, 'Cuisine slave', NULL, NULL),
(89, 32, 1, 'Cuisine Indienne', NULL, NULL),
(90, 32, 1, 'Cuisine espagnole', NULL, NULL),
(91, 32, 1, 'Cuisine Italienne', NULL, NULL),
(92, 32, 1, 'Cuisine World food', NULL, NULL),
(93, 32, 1, 'Autres cuisines', NULL, NULL),
(94, 33, 1, NULL, NULL, NULL),
(95, 34, 1, NULL, NULL, NULL),
(96, 35, 1, NULL, NULL, NULL),
(97, 36, 2, 'Commerces', NULL, NULL),
(98, 36, 2, 'Produits', NULL, NULL),
(99, 37, 2, 'Commerces', NULL, NULL),
(100, 37, 2, 'Produits', NULL, NULL),
(101, 38, 2, 'Commerces', NULL, NULL),
(102, 38, 2, 'Produits', NULL, NULL),
(103, 39, 2, 'Cosmétiques', NULL, NULL),
(104, 39, 2, 'Soin du cheveu', NULL, NULL),
(105, 40, 2, 'Commerces', NULL, NULL),
(106, 40, 2, 'Produits', NULL, NULL),
(107, 41, 2, 'Enfants', NULL, NULL),
(108, 41, 2, 'Femmes', NULL, NULL),
(109, 41, 2, 'Hommes', NULL, NULL),
(110, 41, 2, 'Mixte', NULL, NULL),
(111, 41, 2, 'Produits', NULL, NULL),
(112, 42, 2, 'Commerces', NULL, NULL),
(113, 42, 2, 'Produits', NULL, NULL),
(114, 43, 2, NULL, NULL, NULL),
(115, 44, 2, NULL, NULL, NULL),
(116, 45, 2, NULL, NULL, NULL),
(117, 46, 3, 'Cours et ateliers', NULL, NULL),
(118, 46, 3, 'Evénements et festivals', NULL, NULL),
(119, 46, 3, 'Magasins spécialisés', NULL, NULL),
(120, 46, 3, 'Papeteries et carteries', NULL, NULL),
(121, 46, 3, 'Produits', NULL, NULL),
(122, 46, 3, 'Manifestations, évenements, festivals', NULL, NULL),
(123, 46, 3, 'Associations, écoles', NULL, NULL),
(124, 46, 3, 'Autres', NULL, NULL),
(125, 47, 3, 'Cours et écoles d''art', NULL, NULL),
(126, 47, 3, 'Galeries d''art', NULL, NULL),
(127, 47, 3, 'Musées et expositions', NULL, NULL),
(128, 47, 3, 'Peinture', NULL, NULL),
(129, 47, 3, 'Sculture', NULL, NULL),
(130, 47, 3, 'Autres beaux-arts', NULL, NULL),
(131, 47, 3, 'Manifestations, évenements, festivals', NULL, NULL),
(132, 47, 3, 'Associations, écoles', NULL, NULL),
(133, 47, 3, 'Autres produiits', NULL, NULL),
(134, 48, 3, 'Cinémas', NULL, NULL),
(135, 48, 3, 'Vidéoclubs', NULL, NULL),
(136, 48, 3, 'Films', NULL, NULL),
(137, 48, 3, 'Séries', NULL, NULL),
(138, 48, 3, 'Clips', NULL, NULL),
(139, 48, 3, 'Vidéo', NULL, NULL),
(140, 48, 3, 'Manifestations, évenements, festivals', NULL, NULL),
(141, 48, 3, 'Associations, écoles', NULL, NULL),
(142, 48, 3, 'Autres', NULL, NULL),
(143, 49, 3, 'Bibliothèques', NULL, NULL),
(144, 49, 3, 'Librairies et bouquinistes', NULL, NULL),
(145, 49, 3, 'Livres', NULL, NULL),
(146, 49, 3, 'Manifestations, évenements, festivals', NULL, NULL),
(147, 49, 3, 'Associations, écoles', NULL, NULL),
(148, 49, 3, 'Autres', NULL, NULL),
(149, 50, 3, 'Cours et écoles de musique', NULL, NULL),
(150, 50, 3, 'Disquaires', NULL, NULL),
(151, 50, 3, 'Evénements et festivals', NULL, NULL),
(152, 50, 3, 'Librairies musicales', NULL, NULL),
(153, 50, 3, 'Luthiers et magasins d''instruments', NULL, NULL),
(154, 50, 3, 'Instruments', NULL, NULL),
(155, 50, 3, 'Salles de concert', NULL, NULL),
(156, 50, 3, 'Cd', NULL, NULL),
(157, 50, 3, 'Chanson', NULL, NULL),
(158, 50, 3, 'Manifestations, évenements, festivals', NULL, NULL),
(159, 50, 3, 'Associations, écoles', NULL, NULL),
(160, 50, 3, 'Concert', NULL, NULL),
(161, 50, 3, 'Autres', NULL, NULL),
(162, 51, 3, 'Cours et ateliers', NULL, NULL),
(163, 51, 3, 'Galeries et expositions', NULL, NULL),
(164, 51, 3, 'Studios photo et magasins spécialisés', NULL, NULL),
(165, 51, 3, 'Photographies', NULL, NULL),
(166, 51, 3, 'Manifestations, évenements, festivals', NULL, NULL),
(167, 51, 3, 'Associations, écoles', NULL, NULL),
(168, 51, 3, 'Matériels photographie', NULL, NULL),
(169, 51, 3, 'Autres', NULL, NULL),
(170, 52, 3, 'Cours et ateliers', NULL, NULL),
(171, 52, 3, 'Cirques', NULL, NULL),
(172, 52, 3, 'Manifestations, évenements, festivals', NULL, NULL),
(173, 52, 3, 'Opéras', NULL, NULL),
(174, 52, 3, 'Théâtres', NULL, NULL),
(175, 52, 3, 'Pièces de théatre', NULL, NULL),
(176, 52, 3, 'Spectacles', NULL, NULL),
(177, 52, 3, 'Associations, écoles', NULL, NULL),
(178, 52, 3, 'Autres', NULL, NULL),
(179, 53, 3, 'Centres culturels', NULL, NULL),
(180, 53, 3, 'Grandes surfaces spécialisées', NULL, NULL),
(181, 54, 3, NULL, NULL, NULL),
(182, 55, 3, NULL, NULL, NULL),
(183, 56, 3, NULL, NULL, NULL),
(184, 57, 4, 'Antiquaires', NULL, NULL),
(185, 57, 4, 'Cuisinistes', NULL, NULL),
(186, 57, 4, 'Grandes surfaces spéclalisées', NULL, NULL),
(187, 57, 4, 'Magasins spécialisés', NULL, NULL),
(188, 57, 4, 'Meubles', NULL, NULL),
(189, 57, 4, 'Manifestations, évenements, festivals', NULL, NULL),
(190, 57, 4, 'Associations, écoles', NULL, NULL),
(191, 57, 4, 'Autres', NULL, NULL),
(192, 58, 4, 'Brocantes', NULL, NULL),
(193, 58, 4, 'Encadrement', NULL, NULL),
(194, 58, 4, 'Fleuristes', NULL, NULL),
(195, 58, 4, 'Luminaires', NULL, NULL),
(196, 58, 4, 'Linges et textiles de maison', NULL, NULL),
(197, 58, 4, 'Magasins spécialisés', NULL, NULL),
(198, 58, 4, 'Fleurs', NULL, NULL),
(199, 58, 4, 'Manifestations, évenements, festivals', NULL, NULL),
(200, 58, 4, 'Associations, écoles', NULL, NULL),
(201, 58, 4, 'Objets décoration', NULL, NULL),
(202, 58, 4, 'Autre', NULL, NULL),
(203, 59, 4, 'Grandes surfaces', NULL, NULL),
(204, 59, 4, 'Magasins spécialisés', NULL, NULL),
(205, 59, 4, 'Gros éléctroménager', NULL, NULL),
(206, 59, 4, 'Hifi, TV, vidéo', NULL, NULL),
(207, 59, 4, 'Manifestations, évenements, festivals', NULL, NULL),
(208, 59, 4, 'Associations, écoles', NULL, NULL),
(209, 59, 4, 'Autres', NULL, NULL),
(210, 60, 4, 'Articles de cuisine', NULL, NULL),
(211, 60, 4, 'Autres magasins spécialisés', NULL, NULL),
(212, 60, 4, 'Articles de maison', NULL, NULL),
(213, 60, 4, 'Autres', NULL, NULL),
(214, 61, 4, 'Fleurs', NULL, NULL),
(215, 61, 4, 'Arbres', NULL, NULL),
(216, 61, 4, 'Matériels de jardin', NULL, NULL),
(217, 61, 4, 'Manifestations, évenements, festivals', NULL, NULL),
(218, 61, 4, 'Associations, écoles', NULL, NULL),
(219, 61, 4, 'Autres', NULL, NULL),
(220, 62, 4, 'Commerces bijoux Fantaisie', NULL, NULL),
(221, 62, 4, 'Commerces bijoux Luxe', NULL, NULL),
(222, 62, 4, 'Bijoux Fantaisie', NULL, NULL),
(223, 62, 4, 'Bijoux Luxe', NULL, NULL),
(224, 62, 4, 'Manifestations, évenements, festivals', NULL, NULL),
(225, 62, 4, 'Associations, écoles', NULL, NULL),
(226, 63, 4, 'Enfants', NULL, NULL),
(227, 63, 4, 'Femmes', NULL, NULL),
(228, 63, 4, 'Hommes', NULL, NULL),
(229, 63, 4, 'Mixte', NULL, NULL),
(230, 63, 4, 'Spécialisés', NULL, NULL),
(231, 63, 4, 'Chaussures', NULL, NULL),
(232, 63, 4, 'Manifestation, évenement festivals', NULL, NULL),
(233, 63, 4, 'Autres', NULL, NULL),
(234, 64, 4, 'Enfants', NULL, NULL),
(235, 64, 4, 'Femmes', NULL, NULL),
(236, 64, 4, 'Futures mamans', NULL, NULL),
(237, 64, 4, 'Hommes', NULL, NULL),
(238, 64, 4, 'Mixte', NULL, NULL),
(239, 64, 4, 'Spécialisés', NULL, NULL),
(240, 65, 4, 'Enfants', NULL, NULL),
(241, 65, 4, 'Femmes', NULL, NULL),
(242, 65, 4, 'Futures mamans', NULL, NULL),
(243, 65, 4, 'Hommes', NULL, NULL),
(244, 65, 4, 'Mixte', NULL, NULL),
(245, 65, 4, 'Autres', NULL, NULL),
(246, 66, 4, 'Femmes', NULL, NULL),
(247, 66, 4, 'Hommes', NULL, NULL),
(248, 66, 4, 'Mariage', NULL, NULL),
(249, 66, 4, 'Mixte', NULL, NULL),
(250, 66, 4, 'Mariage', NULL, NULL),
(251, 67, 4, 'Femmes', NULL, NULL),
(252, 67, 4, 'Hommes', NULL, NULL),
(253, 67, 4, 'Mariage', NULL, NULL),
(254, 67, 4, 'Mixte', NULL, NULL),
(255, 67, 4, 'Mariage', NULL, NULL),
(256, 68, 4, 'Commerces', NULL, NULL),
(257, 68, 4, 'Habits', NULL, NULL),
(258, 69, 4, 'Commerces', NULL, NULL),
(259, 69, 4, 'Habits', NULL, NULL),
(260, 70, 4, 'Commerces', NULL, NULL),
(261, 70, 4, 'Produits', NULL, NULL),
(262, 71, 4, 'Commerces', NULL, NULL),
(263, 71, 4, 'Produits', NULL, NULL),
(264, 72, 4, 'Commerces', NULL, NULL),
(265, 72, 4, 'Produits', NULL, NULL),
(266, 73, 4, 'Commerces', NULL, NULL),
(267, 73, 4, 'Produits', NULL, NULL),
(268, 74, 4, 'Commerces', NULL, NULL),
(269, 74, 4, 'Produits', NULL, NULL),
(270, 75, 4, 'Commerces', NULL, NULL),
(271, 75, 4, 'Produits', NULL, NULL),
(272, 76, 4, 'Commerces', NULL, NULL),
(273, 76, 4, 'Produits', NULL, NULL),
(274, 77, 4, NULL, NULL, NULL),
(275, 78, 4, NULL, NULL, NULL),
(276, 79, 4, NULL, NULL, NULL),
(277, 80, 5, 'Commerces', NULL, NULL),
(278, 80, 5, 'Produits', NULL, NULL),
(279, 80, 5, 'Autres', NULL, NULL),
(280, 81, 5, 'Commerces', NULL, NULL),
(281, 81, 5, 'Produits', NULL, NULL),
(282, 81, 5, 'Autres', NULL, NULL),
(283, 82, 5, 'Commerces', NULL, NULL),
(284, 82, 5, 'Produits', NULL, NULL),
(285, 82, 5, 'Autres', NULL, NULL),
(286, 83, 5, 'Commerces', NULL, NULL),
(287, 83, 5, 'Produits', NULL, NULL),
(288, 83, 5, 'Autres', NULL, NULL),
(289, 84, 5, 'Commerces', NULL, NULL),
(290, 84, 5, 'Produits', NULL, NULL),
(291, 84, 5, 'Autres', NULL, NULL),
(292, 85, 5, 'Commerces', NULL, NULL),
(293, 85, 5, 'Produits', NULL, NULL),
(294, 85, 5, 'Autres', NULL, NULL),
(295, 86, 5, 'Commerces', NULL, NULL),
(296, 86, 5, 'Produits', NULL, NULL),
(297, 86, 5, 'Autres', NULL, NULL),
(298, 87, 5, NULL, NULL, NULL),
(299, 88, 5, NULL, NULL, NULL),
(300, 89, 5, NULL, NULL, NULL),
(301, 90, 6, 'Bars à cocktails', NULL, NULL),
(302, 90, 6, 'Bars à thèmes', NULL, NULL),
(303, 90, 6, 'Bars à vins', NULL, NULL),
(304, 90, 6, 'Bars de jazz', NULL, NULL),
(305, 90, 6, 'Bars karaoké', NULL, NULL),
(306, 90, 6, 'Bars lounge', NULL, NULL),
(307, 90, 6, 'Cocktail', NULL, NULL),
(308, 90, 6, 'Magasins spécialisés', NULL, NULL),
(309, 90, 6, 'Marques', NULL, NULL),
(310, 90, 6, 'Produits', NULL, NULL),
(311, 90, 6, 'Autres', NULL, NULL),
(312, 90, 6, 'Personnalités', NULL, NULL),
(313, 91, 6, 'Salles', NULL, NULL),
(314, 91, 6, 'Spectacles, évenements', NULL, NULL),
(315, 91, 6, 'Personnalités', NULL, NULL),
(316, 91, 6, 'Autres', NULL, NULL),
(317, 92, 6, NULL, NULL, NULL),
(318, 93, 6, 'Généraliste', NULL, NULL),
(319, 93, 6, 'Hip Hop, Rap, R''n''B', NULL, NULL),
(320, 93, 6, 'House', NULL, NULL),
(321, 93, 6, 'Techno Electro', NULL, NULL),
(322, 93, 6, 'Musiques latines', NULL, NULL),
(323, 93, 6, 'Personnalités', NULL, NULL),
(324, 93, 6, 'Autres', NULL, NULL),
(325, 94, 6, NULL, NULL, NULL),
(326, 95, 6, NULL, NULL, NULL),
(327, 96, 6, NULL, NULL, NULL),
(328, 97, 6, 'Magasins de jouets', NULL, NULL),
(329, 97, 6, 'Magasins de jeux enfants et adultes', NULL, NULL),
(330, 97, 6, 'Salles de jeu', NULL, NULL),
(331, 98, 6, 'Commerces', NULL, NULL),
(332, 98, 6, 'Produits', NULL, NULL),
(333, 99, 6, NULL, NULL, NULL),
(334, 100, 6, NULL, NULL, NULL),
(335, 101, 6, 'Agences de voyage', NULL, NULL),
(336, 101, 6, 'Continents', NULL, NULL),
(337, 101, 6, 'Pays', NULL, NULL),
(338, 101, 6, 'Régions', NULL, NULL),
(339, 101, 6, 'Villes', NULL, NULL),
(340, 101, 6, 'Quartier', NULL, NULL),
(341, 101, 6, 'Hotels', NULL, NULL),
(342, 101, 6, 'Maisons d''hotes', NULL, NULL),
(343, 101, 6, 'Compagnies de transport', NULL, NULL),
(344, 101, 6, 'Autres', NULL, NULL),
(345, 102, 6, NULL, NULL, NULL),
(346, 103, 6, NULL, NULL, NULL),
(347, 104, 6, NULL, NULL, NULL),
(348, 105, 7, 'Magasins spécialisés', NULL, NULL),
(349, 105, 7, 'Matériels', NULL, NULL),
(350, 105, 7, 'Equipes', NULL, NULL),
(351, 105, 7, 'Personnalités', NULL, NULL),
(352, 105, 7, 'Evenements', NULL, NULL),
(353, 105, 7, 'Associations sportives', NULL, NULL),
(354, 105, 7, 'Stades, salles', NULL, NULL),
(355, 105, 7, 'Autres', NULL, NULL),
(356, 106, 7, 'Magasins spécialisés', NULL, NULL),
(357, 106, 7, 'Matériels', NULL, NULL),
(358, 106, 7, 'Equipes', NULL, NULL),
(359, 106, 7, 'Personnalités', NULL, NULL),
(360, 106, 7, 'Evenements', NULL, NULL),
(361, 106, 7, 'Associations sportives', NULL, NULL),
(362, 106, 7, 'Stades, salles', NULL, NULL),
(363, 106, 7, 'Autres', NULL, NULL),
(364, 107, 7, 'Magasins spécialisés', NULL, NULL),
(365, 107, 7, 'Matériels', NULL, NULL),
(366, 107, 7, 'Equipes', NULL, NULL),
(367, 107, 7, 'Personnalités', NULL, NULL),
(368, 107, 7, 'Evenements', NULL, NULL),
(369, 107, 7, 'Associations sportives', NULL, NULL),
(370, 107, 7, 'Stades, salles', NULL, NULL),
(371, 107, 7, 'Autres', NULL, NULL),
(372, 108, 7, 'Magasins spécialisés', NULL, NULL),
(373, 108, 7, 'Matériels', NULL, NULL),
(374, 108, 7, 'Equipes', NULL, NULL),
(375, 108, 7, 'Personnalités', NULL, NULL),
(376, 108, 7, 'Evenements', NULL, NULL),
(377, 108, 7, 'Associations sportives', NULL, NULL),
(378, 108, 7, 'Circuits, aires d''entrainements', NULL, NULL),
(379, 108, 7, 'Autres', NULL, NULL),
(380, 109, 7, 'Magasins spécialisés', NULL, NULL),
(381, 109, 7, 'Matériels', NULL, NULL),
(382, 109, 7, 'Equipes', NULL, NULL),
(383, 109, 7, 'Personnalités', NULL, NULL),
(384, 109, 7, 'Evenements', NULL, NULL),
(385, 109, 7, 'Associations sportives', NULL, NULL),
(386, 109, 7, 'Circuits, aires d''entrainements', NULL, NULL),
(387, 109, 7, 'Autres', NULL, NULL),
(388, 110, 7, 'Magasins spécialisés', NULL, NULL),
(389, 110, 7, 'Matériels', NULL, NULL),
(390, 110, 7, 'Equipes', NULL, NULL),
(391, 110, 7, 'Personnalités', NULL, NULL),
(392, 110, 7, 'Evenements', NULL, NULL),
(393, 110, 7, 'Associations sportives', NULL, NULL),
(394, 110, 7, 'Stades, salles', NULL, NULL),
(395, 110, 7, 'Autres', NULL, NULL),
(396, 111, 7, 'Magasins spécialisés', NULL, NULL),
(397, 111, 7, 'Matériels', NULL, NULL),
(398, 111, 7, 'Equipes', NULL, NULL),
(399, 111, 7, 'Personnalités', NULL, NULL),
(400, 111, 7, 'Evenements', NULL, NULL),
(401, 111, 7, 'Associations sportives', NULL, NULL),
(402, 111, 7, 'Stades, salles', NULL, NULL),
(403, 111, 7, 'Autres', NULL, NULL),
(404, 112, 7, 'Magasins spécialisés', NULL, NULL),
(405, 112, 7, 'Matériels', NULL, NULL),
(406, 112, 7, 'Equipes', NULL, NULL),
(407, 112, 7, 'Personnalités', NULL, NULL),
(408, 112, 7, 'Evenements', NULL, NULL),
(409, 112, 7, 'Associations sportives', NULL, NULL),
(410, 112, 7, 'Parcours, indoor', NULL, NULL),
(411, 112, 7, 'Autres', NULL, NULL),
(412, 113, 7, 'Magasins spécialisés', NULL, NULL),
(413, 113, 7, 'Matériels', NULL, NULL),
(414, 113, 7, 'Equipes', NULL, NULL),
(415, 113, 7, 'Personnalités', NULL, NULL),
(416, 113, 7, 'Evenements', NULL, NULL),
(417, 113, 7, 'Associations sportives', NULL, NULL),
(418, 113, 7, 'Stades, salles', NULL, NULL),
(419, 113, 7, 'Autres', NULL, NULL),
(420, 114, 7, 'Magasins spécialisés', NULL, NULL),
(421, 114, 7, 'Matériels', NULL, NULL),
(422, 114, 7, 'Equipes', NULL, NULL),
(423, 114, 7, 'Personnalités', NULL, NULL),
(424, 114, 7, 'Evenements', NULL, NULL),
(425, 114, 7, 'Associations sportives', NULL, NULL),
(426, 114, 7, 'Stades, salles', NULL, NULL),
(427, 114, 7, 'Autres', NULL, NULL),
(428, 115, 7, 'Magasins spécialisés', NULL, NULL),
(429, 115, 7, 'Matériels', NULL, NULL),
(430, 115, 7, 'Equipes', NULL, NULL),
(431, 115, 7, 'Personnalités', NULL, NULL),
(432, 115, 7, 'Evenements', NULL, NULL),
(433, 115, 7, 'Associations sportives', NULL, NULL),
(434, 115, 7, 'Piscines, aires d''entrainements', NULL, NULL),
(435, 115, 7, 'Autres', NULL, NULL),
(436, 116, 7, 'Magasins spécialisés', NULL, NULL),
(437, 116, 7, 'Matériels', NULL, NULL),
(438, 116, 7, 'Equipes', NULL, NULL),
(439, 116, 7, 'Personnalités', NULL, NULL),
(440, 116, 7, 'Evenements', NULL, NULL),
(441, 116, 7, 'Associations sportives', NULL, NULL),
(442, 116, 7, 'Bassins, aires d''entrainements', NULL, NULL),
(443, 116, 7, 'Autres', NULL, NULL),
(444, 117, 7, 'Magasins spécialisés', NULL, NULL),
(445, 117, 7, 'Matériels', NULL, NULL),
(446, 117, 7, 'Equipes', NULL, NULL),
(447, 117, 7, 'Personnalités', NULL, NULL),
(448, 117, 7, 'Evenements', NULL, NULL),
(449, 117, 7, 'Associations sportives', NULL, NULL),
(450, 117, 7, 'Hyppodrome, aires d''entrainements', NULL, NULL),
(451, 117, 7, 'Autres', NULL, NULL),
(452, 118, 7, 'Magasins spécialisés', NULL, NULL),
(453, 118, 7, 'Matériels', NULL, NULL),
(454, 118, 7, 'Equipes', NULL, NULL),
(455, 118, 7, 'Personnalités', NULL, NULL),
(456, 118, 7, 'Evenements', NULL, NULL),
(457, 118, 7, 'Associations sportives', NULL, NULL),
(458, 118, 7, 'Stades, salles', NULL, NULL),
(459, 118, 7, 'Autres', NULL, NULL),
(460, 119, 7, 'Magasins spécialisés', NULL, NULL),
(461, 119, 7, 'Matériels', NULL, NULL),
(462, 119, 7, 'Equipes', NULL, NULL),
(463, 119, 7, 'Personnalités', NULL, NULL),
(464, 119, 7, 'Evenements', NULL, NULL),
(465, 119, 7, 'Associations sportives', NULL, NULL),
(466, 119, 7, 'Stades, salles', NULL, NULL),
(467, 119, 7, 'Autres', NULL, NULL),
(468, 120, 7, 'Magasins spécialisés', NULL, NULL),
(469, 120, 7, 'Matériels', NULL, NULL),
(470, 120, 7, 'Equipes', NULL, NULL),
(471, 120, 7, 'Personnalités', NULL, NULL),
(472, 120, 7, 'Evenements', NULL, NULL),
(473, 120, 7, 'Associations sportives', NULL, NULL),
(474, 120, 7, 'Plages, aires d''entrainements', NULL, NULL),
(475, 120, 7, 'Autres', NULL, NULL),
(476, 121, 7, 'Magasins spécialisés', NULL, NULL),
(477, 121, 7, 'Matériels', NULL, NULL),
(478, 121, 7, 'Equipes', NULL, NULL),
(479, 121, 7, 'Personnalités', NULL, NULL),
(480, 121, 7, 'Evenements', NULL, NULL),
(481, 121, 7, 'Associations sportives', NULL, NULL),
(482, 121, 7, 'Stades, salles', NULL, NULL),
(483, 121, 7, 'Autres', NULL, NULL),
(484, 122, 7, 'Magasins spécialisés', NULL, NULL),
(485, 122, 7, 'Matériels', NULL, NULL),
(486, 122, 7, 'Equipes', NULL, NULL),
(487, 122, 7, 'Personnalités', NULL, NULL),
(488, 122, 7, 'Evenements', NULL, NULL),
(489, 122, 7, 'Associations sportives', NULL, NULL),
(490, 122, 7, 'Stades, salles', NULL, NULL),
(491, 122, 7, 'Autres', NULL, NULL),
(492, 123, 7, 'Magasins spécialisés', NULL, NULL),
(493, 123, 7, 'Matériels', NULL, NULL),
(494, 123, 7, 'Equipes', NULL, NULL),
(495, 123, 7, 'Personnalités', NULL, NULL),
(496, 123, 7, 'Evenements', NULL, NULL),
(497, 123, 7, 'Associations sportives', NULL, NULL),
(498, 123, 7, 'Stations, pistes', NULL, NULL),
(499, 123, 7, 'Autres', NULL, NULL),
(500, 124, 7, 'Magasins spécialisés', NULL, NULL),
(501, 124, 7, 'Matériels', NULL, NULL),
(502, 124, 7, 'Equipes', NULL, NULL),
(503, 124, 7, 'Personnalités', NULL, NULL),
(504, 124, 7, 'Evenements', NULL, NULL),
(505, 124, 7, 'Associations sportives', NULL, NULL),
(506, 124, 7, 'Stades, salles', NULL, NULL),
(507, 124, 7, 'Autres', NULL, NULL),
(508, 125, 7, 'Magasins spécialisés', NULL, NULL),
(509, 125, 7, 'Matériels', NULL, NULL),
(510, 125, 7, 'Equipes', NULL, NULL),
(511, 125, 7, 'Personnalités', NULL, NULL),
(512, 125, 7, 'Evenements', NULL, NULL),
(513, 125, 7, 'Associations sportives', NULL, NULL),
(514, 125, 7, 'Stades, salles', NULL, NULL),
(515, 125, 7, 'Autres', NULL, NULL),
(516, 126, 7, 'Magasins spécialisés', NULL, NULL),
(517, 126, 7, 'Matériels', NULL, NULL),
(518, 126, 7, 'Equipes', NULL, NULL),
(519, 126, 7, 'Personnalités', NULL, NULL),
(520, 126, 7, 'Evenements', NULL, NULL),
(521, 126, 7, 'Associations sportives', NULL, NULL),
(522, 126, 7, 'Bassins, aires d''entrainements', NULL, NULL),
(523, 126, 7, 'Autres', NULL, NULL),
(524, 127, 7, 'Magasins spécialisés', NULL, NULL),
(525, 127, 7, 'Matériels', NULL, NULL),
(526, 127, 7, 'Equipes', NULL, NULL),
(527, 127, 7, 'Personnalités', NULL, NULL),
(528, 127, 7, 'Evenements', NULL, NULL),
(529, 127, 7, 'Associations sportives', NULL, NULL),
(530, 127, 7, 'Stades, salles', NULL, NULL),
(531, 127, 7, 'Autres', NULL, NULL),
(532, 128, 7, 'Magasins spécialisés', NULL, NULL),
(533, 128, 7, 'Matériels', NULL, NULL),
(534, 128, 7, 'Equipes', NULL, NULL),
(535, 128, 7, 'Personnalités', NULL, NULL),
(536, 128, 7, 'Evenements', NULL, NULL),
(537, 128, 7, 'Associations sportives', NULL, NULL),
(538, 128, 7, 'Stades, salles', NULL, NULL),
(539, 128, 7, 'Autres', NULL, NULL),
(540, 129, 7, 'Magasins spécialisés', NULL, NULL),
(541, 129, 7, 'Matériels', NULL, NULL),
(542, 129, 7, 'Equipes', NULL, NULL),
(543, 129, 7, 'Personnalités', NULL, NULL),
(544, 129, 7, 'Evenements', NULL, NULL),
(545, 129, 7, 'Associations sportives', NULL, NULL),
(546, 129, 7, 'Hyppodrome, aires d''entrainements', NULL, NULL),
(547, 129, 7, 'Autres', NULL, NULL),
(548, 130, 7, 'Magasins spécialisés', NULL, NULL),
(549, 130, 7, 'Matériels', NULL, NULL),
(550, 130, 7, 'Equipes', NULL, NULL),
(551, 130, 7, 'Personnalités', NULL, NULL),
(552, 130, 7, 'Evenements', NULL, NULL),
(553, 130, 7, 'Associations sportives', NULL, NULL),
(554, 130, 7, 'Bassins, aires d''entrainements', NULL, NULL),
(555, 130, 7, 'Autres', NULL, NULL),
(556, 131, 7, 'Magasins spécialisés', NULL, NULL),
(557, 131, 7, 'Matériels', NULL, NULL),
(558, 131, 7, 'Equipes', NULL, NULL),
(559, 131, 7, 'Personnalités', NULL, NULL),
(560, 131, 7, 'Evenements', NULL, NULL),
(561, 131, 7, 'Associations sportives', NULL, NULL),
(562, 131, 7, 'Stades, salles', NULL, NULL),
(563, 131, 7, 'Autres', NULL, NULL),
(564, 132, 7, 'Magasins spécialisés', NULL, NULL),
(565, 132, 7, 'Matériels', NULL, NULL),
(566, 132, 7, 'Equipes', NULL, NULL),
(567, 132, 7, 'Personnalités', NULL, NULL),
(568, 132, 7, 'Evenements', NULL, NULL),
(569, 132, 7, 'Associations sportives', NULL, NULL),
(570, 132, 7, 'Stades, salles', NULL, NULL),
(571, 132, 7, 'Autres', NULL, NULL),
(572, 133, 7, 'Magasins spécialisés', NULL, NULL),
(573, 133, 7, 'Matériels', NULL, NULL),
(574, 133, 7, 'Equipes', NULL, NULL),
(575, 133, 7, 'Personnalités', NULL, NULL),
(576, 133, 7, 'Evenements', NULL, NULL),
(577, 133, 7, 'Associations sportives', NULL, NULL),
(578, 133, 7, 'Stades, salles', NULL, NULL),
(579, 133, 7, 'Autres', NULL, NULL),
(580, 134, 7, 'Magasins spécialisés', NULL, NULL),
(581, 134, 7, 'Matériels', NULL, NULL),
(582, 134, 7, 'Equipes', NULL, NULL),
(583, 134, 7, 'Personnalités', NULL, NULL),
(584, 134, 7, 'Evenements', NULL, NULL),
(585, 134, 7, 'Associations sportives', NULL, NULL),
(586, 134, 7, 'Stades, salles', NULL, NULL),
(587, 134, 7, 'Autres', NULL, NULL),
(588, 135, 7, 'Magasins spécialisés', NULL, NULL),
(589, 135, 7, 'Matériels', NULL, NULL),
(590, 135, 7, 'Equipes', NULL, NULL),
(591, 135, 7, 'Personnalités', NULL, NULL),
(592, 135, 7, 'Evenements', NULL, NULL),
(593, 135, 7, 'Associations sportives', NULL, NULL),
(594, 135, 7, 'Stades, salles', NULL, NULL),
(595, 135, 7, 'Autres', NULL, NULL),
(596, 136, 7, 'Magasins spécialisés', NULL, NULL),
(597, 136, 7, 'Matériels', NULL, NULL),
(598, 136, 7, 'Equipes', NULL, NULL),
(599, 136, 7, 'Personnalités', NULL, NULL),
(600, 136, 7, 'Evenements', NULL, NULL),
(601, 136, 7, 'Associations sportives', NULL, NULL),
(602, 136, 7, 'Stades, salles', NULL, NULL),
(603, 136, 7, 'Autres', NULL, NULL),
(604, 137, 7, 'Magasins spécialisés', NULL, NULL),
(605, 137, 7, 'Matériels', NULL, NULL),
(606, 137, 7, 'Equipes', NULL, NULL),
(607, 137, 7, 'Personnalités', NULL, NULL),
(608, 137, 7, 'Evenements', NULL, NULL),
(609, 137, 7, 'Associations sportives', NULL, NULL),
(610, 137, 7, 'Stades, salles', NULL, NULL),
(611, 137, 7, 'Autres', NULL, NULL),
(612, 138, 7, NULL, NULL, NULL),
(613, 139, 7, NULL, NULL, NULL),
(614, 140, 7, NULL, NULL, NULL),
(615, 141, 7, 'Journaux', NULL, NULL),
(616, 141, 7, 'Chaines télévisions', NULL, NULL),
(617, 141, 7, 'Radios', NULL, NULL),
(618, 141, 7, 'Magazines', NULL, NULL),
(619, 142, 7, NULL, NULL, NULL),
(620, 143, 7, NULL, NULL, NULL),
(621, 144, 8, 'Commerces', NULL, NULL),
(622, 144, 8, 'Marques', NULL, NULL),
(623, 145, 8, 'Commerces', NULL, NULL),
(624, 145, 8, 'Marques', NULL, NULL),
(625, 146, 8, 'Commerces', NULL, NULL),
(626, 146, 8, 'Marques', NULL, NULL),
(627, 147, 8, 'Commerces', NULL, NULL),
(628, 147, 8, 'Marques', NULL, NULL),
(629, 148, 8, 'Commerces', NULL, NULL),
(630, 148, 8, 'Marques', NULL, NULL),
(631, 149, 8, 'Commerces', NULL, NULL),
(632, 149, 8, 'Marques', NULL, NULL),
(633, 150, 8, 'Commerces', NULL, NULL),
(634, 150, 8, 'Marques', NULL, NULL),
(635, 151, 8, 'Commerces', NULL, NULL),
(636, 151, 8, 'Marques', NULL, NULL),
(637, 152, 8, 'Commerces', NULL, NULL),
(638, 152, 8, 'Marques', NULL, NULL),
(639, 153, 8, 'Hypermarchés', NULL, NULL),
(640, 153, 8, 'Supermarchés', NULL, NULL),
(641, 153, 8, 'Supérettes', NULL, NULL),
(642, 153, 8, 'Discount', NULL, NULL),
(643, 154, 8, 'Commerces', NULL, NULL),
(644, 154, 8, 'Marques', NULL, NULL),
(645, 155, 8, 'Commerces', NULL, NULL),
(646, 155, 8, 'Marques', NULL, NULL),
(647, 156, 8, 'Commerces', NULL, NULL),
(648, 156, 8, 'Marques', NULL, NULL),
(649, 157, 8, 'Entreprises', NULL, NULL),
(650, 157, 8, 'Marques', NULL, NULL),
(651, 158, 8, 'Entreprises', NULL, NULL),
(652, 158, 8, 'Marques', NULL, NULL),
(653, 159, 8, 'Commerces', NULL, NULL),
(654, 159, 8, 'Marques', NULL, NULL),
(655, 160, 8, 'Commerces', NULL, NULL),
(656, 160, 8, 'Marques', NULL, NULL),
(657, 161, 8, 'Commerces', NULL, NULL),
(658, 161, 8, 'Marques', NULL, NULL),
(659, 162, 8, 'Commerces', NULL, NULL),
(660, 162, 8, 'Marques', NULL, NULL),
(661, 163, 8, 'Commerces', NULL, NULL),
(662, 163, 8, 'Marques', NULL, NULL),
(663, 164, 8, 'Commerces', NULL, NULL),
(664, 164, 8, 'Marques', NULL, NULL);

