-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Sam 06 Juin 2015 à 09:13
-- Version du serveur: 5.5.8
-- Version de PHP: 5.3.5

--
-- Base de données: `stk`
--
CREATE DATABASE if not exists STK;
USE STK;

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

INSERT INTO `admin` (`mail`, `pass`) VALUES
('valimo_ral@yahoo.fr', 'admin');

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
-- Structure de la table `membres`
--

CREATE TABLE IF NOT EXISTS `membres` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOM` varchar(250) NOT NULL,
  `PRENOM` varchar(250) DEFAULT NULL,
  `DDN` date DEFAULT NULL,
  `INTEGRATION` year(4) DEFAULT NULL,
  `ACTIF` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `membres_bureau`
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
-- Contraintes pour la table `membres_bureau`
--
ALTER TABLE `membres_bureau`
  ADD CONSTRAINT `membres_bureau_ibfk_1` FOREIGN KEY (`ID_MEMBRE`) REFERENCES `membres` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE;
