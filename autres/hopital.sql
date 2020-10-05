-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 05 oct. 2020 à 12:15
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hopital`
--
CREATE DATABASE IF NOT EXISTS `hopital` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `hopital`;

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_naissance` varchar(10) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `adresse` text,
  `mutuelle` varchar(50) DEFAULT NULL,
  `num_sec_soc` varchar(15) DEFAULT NULL,
  `option_chambre` varchar(10) DEFAULT NULL,
  `regime` text,
  `mdp` varchar(50) NOT NULL,
  `role` varchar(7) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fk_patient` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`id`, `nom`, `prenom`, `date_naissance`, `mail`, `adresse`, `mutuelle`, `num_sec_soc`, `option_chambre`, `regime`, `mdp`, `role`) VALUES
(1, 'admin', 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '098f6bcd4621d373cade4e832627b4f6', 'admin'),
(2, 'Kebiche', 'Killian', '27/06/2000', 'k.kebiche@gmail.com', '3 rue des potiers 93300 Aubervilliers', 'test', '152485963258745', 'Wifi et TV', NULL, '098f6bcd4621d373cade4e832627b4f6', 'patient'),
(4, 'FONTAINE', 'Ryan', '2000-11-18', 'ryan-fontaine@hotmail.fr', '261 rue de meaux, Vaujours', 'GRAS SAVOIE', '100432432432434', 'Wifi', '', 'ab4f63f9ac65152575886860dde480a1', 'patient');

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

DROP TABLE IF EXISTS `medecin`;
CREATE TABLE IF NOT EXISTS `medecin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `lieu` varchar(50) NOT NULL,
  `specialite` varchar(50) NOT NULL,
  `identifiant` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fk_medecin` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `medecin`
--

INSERT INTO `medecin` (`id`, `nom`, `lieu`, `specialite`, `identifiant`, `mdp`) VALUES
(1, 'Aggoun', 'Aubervilliers', 'Neurologie', 'Lucario', 'c1078f95440f31e9c88138226b1af484'),
(2, 'Guo', 'Bourget', 'Tabacologie', 'az', 'a9d3b34800d4283ed34b2bbbeb443a77'),
(3, 'Tang', 'Aulnay-sous-bois', 'Gynécologie', 'tang', '87db92494758df7d0f0a4f39162a48f4'),
(4, 'Birba', 'Dugny', 'Cardiologie', 'Dr.CapriSun', 'be6e0613371881bfe15b363bf5d00c20');

-- --------------------------------------------------------

--
-- Structure de la table `minichat`
--

DROP TABLE IF EXISTS `minichat`;
CREATE TABLE IF NOT EXISTS `minichat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `date_message` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `minichat`
--

INSERT INTO `minichat` (`id`, `nom`, `message`, `date_message`) VALUES
(1, 'ryanftne', 'hello', '2020-10-05 14:01:45'),
(2, 'ryanftne', 'comment allez-vous?', '2020-10-05 14:01:53'),
(3, 'ryanftne', 'salut', '2020-10-05 14:02:18'),
(4, 'ryanftne', 'je suis médecin', '2020-10-05 14:03:04');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_patient` varchar(50) NOT NULL,
  `nom_medecin` varchar(50) NOT NULL,
  `rais_consult` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_patient` (`nom_patient`),
  KEY `fk_medecin` (`nom_medecin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_medecin` FOREIGN KEY (`nom_medecin`) REFERENCES `medecin` (`nom`),
  ADD CONSTRAINT `fk_patient` FOREIGN KEY (`nom_patient`) REFERENCES `compte` (`nom`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
