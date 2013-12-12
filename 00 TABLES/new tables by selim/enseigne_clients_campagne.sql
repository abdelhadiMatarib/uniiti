-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 12 Décembre 2013 à 14:12
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
-- Structure de la table `enseigne_clients_campagne`
--

CREATE TABLE IF NOT EXISTS `enseigne_clients_campagne` (
  `id_enseigne_clients_campagne` int(11) NOT NULL AUTO_INCREMENT,
  `id_enseigne` int(10) unsigned NOT NULL,
  `type` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `base_uniiti` tinyint(1) NOT NULL,
  `base_upload` tinyint(1) NOT NULL,
  `base_partenaires` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_enseigne_clients_campagne`),
  KEY `fk_enseigne_has_many_campagne` (`id_enseigne`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `enseigne_clients_campagne`
--
ALTER TABLE `enseigne_clients_campagne`
  ADD CONSTRAINT `fk_enseigne_has_many_campagne` FOREIGN KEY (`id_enseigne`) REFERENCES `enseignes` (`id_enseigne`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
