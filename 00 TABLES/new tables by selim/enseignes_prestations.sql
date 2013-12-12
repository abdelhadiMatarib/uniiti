-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 12 Décembre 2013 à 14:14
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `uniitidatab`
--

-- --------------------------------------------------------

--
-- Structure de la table `enseignes_prestations`
--

CREATE TABLE IF NOT EXISTS `enseignes_prestations` (
  `id_enseignes_prestations` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `enseignes_id_enseigne` int(11) unsigned NOT NULL,
  `id_type_info` int(11) unsigned NOT NULL,
  `prestation` varchar(500) NOT NULL,
  PRIMARY KEY (`id_enseignes_prestations`),
  KEY `fk_enseigne_has_prestation` (`enseignes_id_enseigne`),
  KEY `fk_prestation_has_enseignes_type_infos` (`id_type_info`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=73 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `enseignes_prestations`
--
ALTER TABLE `enseignes_prestations`
  ADD CONSTRAINT `fk_enseigne_has_prestation` FOREIGN KEY (`enseignes_id_enseigne`) REFERENCES `enseignes` (`id_enseigne`),
  ADD CONSTRAINT `fk_prestation_has_enseignes_type_infos` FOREIGN KEY (`id_type_info`) REFERENCES `enseignes_type_infos` (`id_type_info`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
