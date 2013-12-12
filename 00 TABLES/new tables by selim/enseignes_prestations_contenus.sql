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
-- Structure de la table `enseignes_prestations_contenus`
--

CREATE TABLE IF NOT EXISTS `enseignes_prestations_contenus` (
  `id_contenu` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` varchar(500) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `id_prestation` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_contenu`),
  KEY `fk_Prestation_has_Presation_contenu` (`id_prestation`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=89 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `enseignes_prestations_contenus`
--
ALTER TABLE `enseignes_prestations_contenus`
  ADD CONSTRAINT `fk_Prestation_has_Presation_contenu` FOREIGN KEY (`id_prestation`) REFERENCES `enseignes_prestations` (`id_enseignes_prestations`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
