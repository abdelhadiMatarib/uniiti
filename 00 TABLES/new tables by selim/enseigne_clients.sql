-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 13 Décembre 2013 à 12:26
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
-- Structure de la table `enseigne_clients`
--

CREATE TABLE IF NOT EXISTS `enseigne_clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `enseignes_id_enseigne` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_enseigne_has_many_clients` (`enseignes_id_enseigne`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=212 ;

--
-- Contenu de la table `enseigne_clients`
--

INSERT INTO `enseigne_clients` (`id`, `nom`, `prenom`, `email`, `telephone`, `commentaire`, `enseignes_id_enseigne`) VALUES
(57, 'namera', 'jaydeep', 'india', 'M', '', 90),
(58, 'fefar', 'harshad', 'india', 'm', '', 90),
(59, 'patel', 'jd', 'ind', 'm', '', 90),
(136, 'Ikni-chanliau', 'Anouk', '66anouk@live.fr', '', '', 0),
(137, 'Boubetra', 'Abdelkader', 'abdelkader.boutreba@gmail.com', '', '', 0),
(138, 'Delay', 'Arielle', 'adelay@infonie.fr', '', '', 0),
(139, 'Barbazange', 'Alice', 'alizange@gmail.com', '', '', 0),
(140, 'Pierrot', 'Antoinette', 'antoinette.pierrot@orange.fr', '', '', 0),
(141, 'chamonin', 'christophe', 'c.chamonin@gmail.com', '', '', 0),
(142, 'Camus', 'Aurelie', 'camusaurelie@hotmail.com', '', '', 0),
(143, 'Cargill', 'Gerard', 'cargillge@orange.fr', '', '', 0),
(144, 'Durand', 'Christine', 'christinedurant@gmail.com', '', '', 0),
(145, 'Kressic', 'Carmela', 'ckressik@gmail.com', '', '', 0),
(146, 'Schahraneche', 'Clara', 'clschahraneche@hotmail.com', '', '', 0),
(147, 'Collet', 'Delphine', 'collet.delphine@free.fr', '', '', 0),
(148, 'Rb', 'Delphine', 'delphinerb@hotmail.com', '', '', 0),
(149, 'Dobrota', 'Alexandra', 'dobrota@wanadoo.fr', '', '', 0),
(150, 'Fondria', 'Dominique', 'domino-f@hotmail.fr', '', '', 0),
(151, 'El Goufi', 'Kadija', 'ekhadija63@yahoo.fr', '', '', 0),
(152, 'Tapin', 'Elodie', 'elodietapin@yahoo.fr', '', '', 0),
(153, 'Metthez', 'Elodie', 'emetthez@yahoo.fr', '', '', 0),
(154, 'Berg', 'Florence', 'eugene.berg@wanadoo.fr', '', '', 0),
(155, 'Michel', 'Franck', 'f.michel03@gmail.com', '', '', 0),
(156, 'PLACET', 'Fabienne', 'fabienne.placet@free.fr', '', '', 0),
(157, 'Andre', 'Florence', 'floandre@hotmail.fr', '', '', 0),
(158, 'Graveleau', 'Françoise', 'franckise@orange.fr', '', '', 0),
(159, 'Soltans', 'Fathéa ', 'fsoltani@hotmail.com', '', '', 0),
(160, 'Javaux', 'Gisèle', 'gisele.javau@hotmail.fr', '', '', 0),
(161, 'Bobille', 'Gurvan', 'gurvan.bobille@laposte.net', '', '', 0),
(162, 'Djema', 'Helene', 'helenedjema@inp.fr', '', '', 0),
(163, 'Herrmann', 'Sabine', 'hermann.s@neuf.fr', '', '', 0),
(164, 'Durand', 'Jacqueline', 'jacqueline.durand@numericable.com', '', '', 0),
(165, 'ursino', 'janine', 'janineursino@yahoo.fr', '', '', 0),
(166, 'Blondel', 'Jacqueline', 'jblondel@gmail.com', '', '', 0),
(167, 'Tronquet', 'Jennifer', 'jennifer.tronquet@laposte.net', '', '', 0),
(168, 'Coisnon', 'Jessy', 'jessy722@gmail.com', '', '', 0),
(169, 'Danat', 'Julie', 'julie.sanat@gmail.com', '', '', 0),
(170, 'Leonardi', 'Lilly', 'kristel.lilly@hotmail.fr', '', '', 0),
(171, 'Lesueur', 'Laurence', 'laurenceles32@aol.com', '', '', 0),
(172, 'Freriks', 'Lili', 'lili.freriks@wanadoo.com', '', '', 0),
(173, 'Maizia', 'Malika', 'malikamaizia@yahoo.fr', '', '', 0),
(174, 'Leperq', 'Marie-France', 'marie-france.leperq@hotmail.fr', '', '', 0),
(175, 'Garcia', 'Marie Carmene', 'marie.carmene.garcia@wanadoo.fr', '', '', 0),
(176, 'Reigner', 'Marie-Ange', 'marieanger@gmail.com', '', '', 0),
(177, 'Venant', 'Marie-noëlle', 'marino.guymar@hotmail.fr', '', '', 0),
(178, 'Colbacchini', 'Mario', 'mario.colbacchini@gmail.com', '', '', 0),
(179, 'Martin', 'Amandine', 'mart1amandine@gmail.com', '', '', 0),
(180, 'Haguenauer', 'Martine', 'martine.haguenauer@sfr.fr', '', '', 0),
(181, 'Plessis', 'Martine', 'martineplessis@gmail.com', '', '', 0),
(182, 'Galerne', 'Michel', 'michelgalerne@yahoo.fr', '', '', 0),
(183, 'Auffret', 'Michelle', 'michelleauffret47@orange.fr', '', '', 0),
(184, 'Le Brech', 'Marie Annick ', 'mlebrech@gmail.com', '', '', 0),
(185, 'Le tallec', 'Marie-Laurence', 'mletallec@free.fr', '', '', 0),
(186, 'Lorrain', 'Madeleine', 'mlorrain@gmail.com', '', '', 0),
(187, 'Amouriaux', 'Monique', 'monique.amouriaux@orange.fr', '', '', 0),
(188, 'Ould-Lamara', 'Mounira', 'mzrkine@hotmail.com', '', '', 0),
(189, 'Thevenot', 'Thierry', 'nezdeclown@hotmail.fr', '', '', 0),
(190, 'Le talles ', 'Nolwenn', 'nolwenn.letallec@yahoo.fr', '', '', 0),
(191, 'Mader', 'Alexandre', 'numden2@gmail.com', '', '', 0),
(192, 'Seban', 'Orpha', 'om.seban@free.fr', '', '', 0),
(193, 'Guern', 'Orsola', 'orsolaguern@orange.fr', '', '', 0),
(194, 'Dos santos', 'Pascale', 'pascale.dossantos@orange.fr', '', '', 0),
(195, 'Tisset', 'Pascale', 'pascale.tisset@sfr.fr', '', '', 0),
(196, 'Palas', 'Patricia', 'patriciapalas@aol.com', '', '', 0),
(197, 'Plantin', 'Gordana', 'plantingordana@gmail.com', '', '', 0),
(198, 'Puech', 'Christian', 'puech.christian@club-internet.fr', '', '', 0),
(199, 'Ben khelil', 'saïda', 'satalli@free.fr', '', '', 0),
(200, 'Mauro', 'Serge', 'serge.mauro@hotmail.fr', '', '', 0),
(201, 'Mercadac', 'Severine', 'smercadac@yahoo.fr', '', '', 0),
(202, 'Ronaghi', 'Sylvie', 'sylvie.ronaghi@gmail.com', '', '', 0),
(203, 'Chometon', 'Sylvie', 'sylviechom@numericable.fr', '', '', 0),
(204, 'Sanguy', 'Thérèse', 'therese.sanguy@free.fr', '', '', 0),
(205, 'Gentilhomme', 'Théophile', 'tikiwindy@msn.com', '', '', 0),
(206, 'Spinoux', 'Valerie', 'valerie.spinoux@lagardere-active.com', '', '', 0),
(207, 'Antomarchi', 'Veronique', 'veroanto@gmail.com', '', '', 0),
(208, 'Villette', 'Veronique', 'verovill@gmail.com', '', '', 0),
(209, 'Vin', 'Charlotte', 'vin-charlotte@yahoo.fr', '', '', 0),
(210, 'Xuereb', 'Jacqueline', 'xuerebjacrene@orange.fr', '', '', 0),
(211, 'Trebuchet', 'Yamina', 'yamina@free.fr', '', '', 0);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `enseigne_clients`
--
ALTER TABLE `enseigne_clients`
  ADD CONSTRAINT `fk_enseigne_has_many_clients` FOREIGN KEY (`enseignes_id_enseigne`) REFERENCES `enseignes` (`id_enseigne`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
