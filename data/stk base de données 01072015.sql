-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Mer 01 Juillet 2015 à 19:08
-- Version du serveur: 5.5.8
-- Version de PHP: 5.3.5

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

CREATE TABLE IF NOT EXISTS `admin` (
  `mail` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `admin`
--



-- --------------------------------------------------------

--
-- Structure de la table `compte`
-- Ato no misy vola an-tanana sy ny vola mivoaka
--

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

-- --------------------------------------------------------

--
-- Structure de la table `cotisations`
--

CREATE TABLE IF NOT EXISTS `cotisations` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_MEMBRE` int(11) NOT NULL,
  `ANNEE` year(4) NOT NULL,
  `MOIS` varchar(12) NOT NULL DEFAULT '000000000000',
  `TOTAL` double NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_MEMBRE` (`ID_MEMBRE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cotisations`
--


-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE IF NOT EXISTS `membres` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOM` varchar(250) NOT NULL,
  `PRENOM` varchar(250) DEFAULT NULL,
  `DDN` date DEFAULT NULL,
  `INTEGRATION` year(4) DEFAULT NULL,
  `ACTIF` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `index_nom` (`NOM`,`PRENOM`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Contenu de la table `membres`
--

-- --------------------------------------------------------

--
-- Structure de la table `membres_bureau`
--

CREATE TABLE IF NOT EXISTS `membres_bureau` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_MEMBRE` int(11) DEFAULT NULL,
  `POSTE` varchar(50) NOT NULL,
  `ANNEE_DEBUT` year(4) DEFAULT NULL,
  `ANNEE_FIN` year(4) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_MEMBRE` (`ID_MEMBRE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Contenu de la table `membres_bureau`
--

-- --------------------------------------------------------

--
-- Structure de la table `vola`
-- Ato no misy ireo entrée - sortie rehetra misy TYPE = R => Rakitra / TYPE = A => Asa
--


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
  ADD CONSTRAINT `vola_ibfk_2` FOREIGN KEY (`RECEVEUR`) REFERENCES `membres` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `vola_ibfk_1` FOREIGN KEY (`DONNEUR`) REFERENCES `membres` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE;
