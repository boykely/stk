-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Ven 03 Juillet 2015 à 17:05
-- Version du serveur: 5.5.8
-- Version de PHP: 5.3.5
USE lhxxznsg;

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `stk`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `mail` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`mail`, `pass`) VALUES
('valimo_ral@yahoo.fr', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `IN` decimal(10,0) NOT NULL DEFAULT '0',
  `OUT` decimal(10,0) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `compte`
--


-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `ID_MEMBRE` int(11) NOT NULL,
  `ADRESSE_1` varchar(250) DEFAULT NULL,
  `ADRESSE_2` varchar(250) DEFAULT NULL,
  `TEL_1` varchar(13) DEFAULT NULL,
  `TEl_2` varchar(13) DEFAULT NULL,
  `TEL_3` varchar(13) DEFAULT NULL,
  UNIQUE KEY `ID_MEMBRE` (`ID_MEMBRE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `contacts`
--

INSERT INTO `contacts` (`ID_MEMBRE`, `ADRESSE_1`, `ADRESSE_2`, `TEL_1`, `TEl_2`, `TEL_3`) VALUES
(1, 'VQ 50 Ambavahadimitafo', NULL, '', '0331981326', NULL),
(2, 'Lot VS 84 Antsahondra', NULL, '', '0334217106', NULL),
(3, 'Lot VH 28 A volosarika Ambanidia', NULL, '', '0332405177', NULL),
(4, 'Lot VS 84 antsahondra', NULL, '', '0334136692', NULL),
(5, 'LOT VA 67 AMPAMAHO', NULL, '0329549590', '', '0348075601'),
(6, 'Lot VE 9 bis A Faliarivo Ambanidia', 'Lot 46 C Ampefiloha Antananarivo', '0327658480', '', '0340762022'),
(7, 'Lot VR7A Ankazotokana', NULL, '0325825129', '0334674030', '0340122087'),
(9, 'Lot VQ66 Ambatomasina anjohy', NULL, '0326202438', NULL, NULL),
(10, 'LOT VA 62 Ambavahadimitafo', NULL, NULL, '0330311192', NULL),
(11, 'Lot vu 86 Miandriarivo Ankazomasina', NULL, NULL, NULL, '0343839711'),
(12, 'LOT VF 120 Ter Antsahabe', NULL, NULL, '0332542234', NULL),
(13, 'Lot IIIC 28A Mahamasina - Est', NULL, NULL, '0337545658', NULL),
(14, 'Lot3 G 134 ambatolampy Ambohibao', NULL, NULL, NULL, '0340102799'),
(15, 'Lot ivn Ankanditapaka', NULL, '0320797925', NULL, NULL),
(16, 'Lot vq 54 bis Ambavahadimitafo', NULL, NULL, '0331474563', NULL),
(17, 'Lot3 G 134 ambatolampy Ambohibao', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `cotisations`
--

DROP TABLE IF EXISTS `cotisations`;
CREATE TABLE IF NOT EXISTS `cotisations` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_MEMBRE` int(11) NOT NULL,
  `ANNEE` year(4) NOT NULL,
  `MOIS` varchar(12) NOT NULL DEFAULT '000000000000',
  `TOTAL` double NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_MEMBRE` (`ID_MEMBRE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `cotisations`
--


-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOM` varchar(250) NOT NULL,
  `PRENOM` varchar(250) DEFAULT NULL,
  `DDN` date DEFAULT NULL,
  `INTEGRATION` year(4) DEFAULT NULL,
  `ACTIF` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `index_nom` (`NOM`,`PRENOM`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`ID`, `NOM`, `PRENOM`, `DDN`, `INTEGRATION`, `ACTIF`) VALUES
(1, 'RATOVOSON', 'Antsa', NULL, 2011, 1),
(2, 'RAZAFIMBELO', 'Rojo Sandaniaina', NULL, 2011, 1),
(3, 'RAKOTONDRAMALANDRAONISERA', 'Rabenjamina Iharitiana', NULL, 2011, 1),
(4, 'RAZANABELO', 'Andrianarivony Rojo-Ntsoa', NULL, 2013, 1),
(5, 'RANDRIANATOANDRO', 'Mahera Ny Aina Fandeferana Justinie ', NULL, 2015, 1),
(6, 'RANDRIAMANGAMALALA', 'Herinirina', NULL, 2012, 1),
(7, 'RAKOTO', 'Andriamparany', NULL, 2009, 1),
(9, 'RAKOTOHARIMANANA', 'Njaraniaina', NULL, 2006, 1),
(10, 'RASOARIMALALA', 'Ginette', NULL, 2015, 1),
(11, 'RANDRIAMIARY', 'Narivelo Miora Tahiana', NULL, 2015, 1),
(12, 'ANDRIANARISOA', 'Andotiana Eric', NULL, 2013, 1),
(13, 'RALAMBOMAHAY', 'Andriamparany Valim-bavaka', '1989-12-10', 2013, 1),
(14, 'ANDRIAMALALA', 'Holinirina Valisoa', NULL, 2014, 1),
(15, 'ANDRIATSIHOARANA ', 'Din''alivelomanantsoa', NULL, 2014, 1),
(16, 'RAHELIARISOA', 'Andriamanantsona Lalaina', NULL, NULL, 1),
(17, 'ANDRIAMALALA', 'Kanto Valisoa', NULL, 2014, 1);

-- --------------------------------------------------------

--
-- Structure de la table `membres_bureau`
--

DROP TABLE IF EXISTS `membres_bureau`;
CREATE TABLE IF NOT EXISTS `membres_bureau` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_MEMBRE` int(11) DEFAULT NULL,
  `POSTE` varchar(50) NOT NULL,
  `ANNEE_DEBUT` year(4) DEFAULT NULL,
  `ANNEE_FIN` year(4) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_MEMBRE` (`ID_MEMBRE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `membres_bureau`
--

INSERT INTO `membres_bureau` (`ID`, `ID_MEMBRE`, `POSTE`, `ANNEE_DEBUT`, `ANNEE_FIN`) VALUES
(1, 6, 'Trésorier', 2016, 2020),
(2, 3, 'Premier Vice', 2016, 2020),
(3, 13, 'Deuxième Vice', 2016, 2020);

-- --------------------------------------------------------

--
-- Structure de la table `vola`
--

DROP TABLE IF EXISTS `vola`;
CREATE TABLE IF NOT EXISTS `vola` (
  `DATE` datetime NOT NULL,
  `LABEL` int(11) NOT NULL,
  `TYPE` varchar(10) NOT NULL DEFAULT 'R',
  `MONTANT` decimal(10,0) NOT NULL,
  `DONNEUR` int(11) DEFAULT NULL,
  `RECEVEUR` int(11) DEFAULT NULL,
  KEY `RECEVEUR` (`RECEVEUR`),
  KEY `DONNEUR` (`DONNEUR`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `vola`
--


--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`ID_MEMBRE`) REFERENCES `membres` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `cotisations`
--
ALTER TABLE `cotisations`
  ADD CONSTRAINT `cotisations_ibfk_1` FOREIGN KEY (`ID_MEMBRE`) REFERENCES `membres` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `membres_bureau`
--
ALTER TABLE `membres_bureau`
  ADD CONSTRAINT `membres_bureau_ibfk_1` FOREIGN KEY (`ID_MEMBRE`) REFERENCES `membres` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `vola`
--
ALTER TABLE `vola`
  ADD CONSTRAINT `vola_ibfk_1` FOREIGN KEY (`DONNEUR`) REFERENCES `membres` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `vola_ibfk_2` FOREIGN KEY (`RECEVEUR`) REFERENCES `membres` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE;
