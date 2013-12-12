-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 12 Décembre 2013 à 14:13
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
-- Structure de la table `enseigne_clients_campagne_destination`
--

CREATE TABLE IF NOT EXISTS `enseigne_clients_campagne_destination` (
  `id_enseigne_clients_campagne_destination` int(11) NOT NULL AUTO_INCREMENT,
  `enseigne_clients_campagne_id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_enseigne_clients_campagne_destination`),
  KEY `enseigne_clients_campagne_has_many_destination` (`enseigne_clients_campagne_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `enseigne_clients_campagne_destination`
--
ALTER TABLE `enseigne_clients_campagne_destination`
  ADD CONSTRAINT `enseigne_clients_campagne_has_many_destination` FOREIGN KEY (`enseigne_clients_campagne_id`) REFERENCES `enseigne_clients_campagne` (`id_enseigne_clients_campagne`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
