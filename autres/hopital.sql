-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 06 déc. 2020 à 16:26
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hopital`
--
CREATE DATABASE IF NOT EXISTS `hopital` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `hopital`;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `role` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `prenom`, `mail`, `mdp`, `role`) VALUES
(1, 'FONTAINE', 'Ryan', 'admin@admin.fr', '098f6bcd4621d373cade4e832627b4f6', 'admin'),
(2, 'test', 'Ahouais', 'test@test.fr', '098f6bcd4621d373cade4e832627b4f6', 'admin'),
(3, 'FONTAIN', 'a', 'aa@aa.fr', '4124bc0a9335c27f086f24ba207a4912', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `mail` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `sujet` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `mail` varchar(50) NOT NULL,
  `mdp` varchar(150) NOT NULL,
  `approuve` varchar(3) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fk_medecin` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `medecin`
--

INSERT INTO `medecin` (`id`, `nom`, `lieu`, `specialite`, `mail`, `mdp`, `approuve`, `image`) VALUES
(1, 'Aggoun', 'Aubervilliers', 'Neurologie', 'lucario@gmail.com', 'c1078f95440f31e9c88138226b1af484', 'oui', 'Akatsuki.jpg'),
(2, 'Guo', 'Bourget', 'Tabacologie', 'az@gmail.com', 'a9d3b34800d4283ed34b2bbbeb443a77', 'oui', 'test.jpg'),
(3, 'Tang', 'Aulnay-sous-bois', 'Gynecologie', 'tang@gmail.fr', '87db92494758df7d0f0a4f39162a48f4', 'oui', 'fruit.jpg'),
(4, 'Birba', 'Dugny', 'Cardiologie', 'Enzo@gmail.fr', '098f6bcd4621d373cade4e832627b4f6', 'oui', 'nami.jpg'),
(5, 'Testtt', 'Testtt', 'Testtt', 'Testtt@Testtt.Testtt', '08ddc922bcd99258d79a7452fd637254', 'non', 'cat.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(50) DEFAULT NULL,
  `content` text,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 COMMENT='La table qui va contenir tous les messages voyons !';

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `author`, `content`, `created_at`) VALUES
(71, 'Enzo', 'hello', '2020-11-30 13:47:39'),
(72, 'Enzo', 'test', '2020-11-30 13:49:09');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `minichat`
--

INSERT INTO `minichat` (`id`, `nom`, `message`, `date_message`) VALUES
(1, 'ryanftne', 'hello', '2020-10-05 14:01:45'),
(2, 'ryanftne', 'comment allez-vous?', '2020-10-05 14:01:53'),
(3, 'ryanftne', 'salut', '2020-10-05 14:02:18'),
(4, 'ryanftne', 'je suis médecin', '2020-10-05 14:03:04'),
(5, 'ryanftne', 'eza', '2020-10-05 14:22:17'),
(6, 'ryanftne', 'abc', '2020-10-05 14:50:56'),
(7, 'eez', 'A', '2020-10-27 16:41:46'),
(8, 'MR Mattei', 'SORTEZ UNE FEUILLE !', '2020-10-27 16:43:36'),
(9, 'Raoult', 'Mettez vos masques', '2020-10-27 17:19:34');

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_naissance` varchar(10) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `adresse` text,
  `mutuelle` varchar(50) DEFAULT NULL,
  `num_sec_soc` varchar(15) NOT NULL,
  `option_chambre` varchar(10) DEFAULT NULL,
  `regime` text,
  `mdp` varchar(150) NOT NULL,
  `role` varchar(7) NOT NULL,
  `confirme` varchar(3) NOT NULL,
  `token` varchar(15) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fk_patient` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`id`, `nom`, `prenom`, `date_naissance`, `mail`, `adresse`, `mutuelle`, `num_sec_soc`, `option_chambre`, `regime`, `mdp`, `role`, `confirme`, `token`, `image`) VALUES
(1, 'Kebiche', 'Killian', '2000-06-27', 'k.kebiche@gmail.com', '3 rue des potiers 93300 Aubervilliers', 'test', '152485963258745', 'Wifi et TV', 'SECU ', '098f6bcd4621d373cade4e832627b4f6', 'patient', 'oui', NULL, 'test.jpg'),
(2, 'yanish', 'bhujun', '2020-09-30', 'yanish.bhujun@gmail.com', '3 rue test', 'GRAS SAVOIE', '212222222222111', 'Wifi', 'e', '164b6da6ab4209c16ff3841306dbec83', 'patient', 'oui', NULL, 'test2.jpg'),
(3, 'Fontaine', 'Ryan', '2000-10-12', 'ryan-fontaine@hotmail.fr', 'QQ', 'QQ', '232112321321312', 'QQ', 'QQ', '098f6bcd4621d373cade4e832627b4f6', 'patient', 'oui', '5fcad4c48037d', 'Akatsuki.png'),
(5, 'a', 'a', '2020-12-12', 'aa@a.fr', 'a', 'a', '864566456456454', 'a', 'a', '147538da338b770b61e592afc92b1ee6', 'patient', 'oui', NULL, 'luffy.jpg'),
(6, 'tt', 'tt', '2000-02-11', 'tt@tt.fr', '', '', '789789789789784', '', '', 'accc9105df5383111407fd5b41255e23', 'patient', 'non', NULL, 'cat.jpg'),
(26, 'sqqs', 'sqqs', '2200-12-12', 'sqqs@sqqs.sqqs', '', '', '013131313131369', '', '', '37d0c38f39e5be59160764972ecc4cee', 'patient', 'oui', NULL, 'fruit.jpg'),
(28, 'Luffy', 'Luffy', '2000-02-23', 'Luffy@Luffy.Luffy', '', '', '595565665565656', '', '', '992ca20459e927b263f089f4f3f82cd5', 'patient', 'oui', NULL, 'nami.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `text`) VALUES
(1, 'Docteur Aggoun'),
(2, 'Docteur Birba'),
(3, 'Docteur Guo'),
(4, 'Docteur Kebiche');

-- --------------------------------------------------------

--
-- Structure de la table `rating_info`
--

DROP TABLE IF EXISTS `rating_info`;
CREATE TABLE IF NOT EXISTS `rating_info` (
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `rating_action` varchar(30) NOT NULL,
  UNIQUE KEY `UC_rating_info` (`user_id`,`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `rating_info`
--

INSERT INTO `rating_info` (`user_id`, `post_id`, `rating_action`) VALUES
(2, 1, 'dislike'),
(2, 2, 'like'),
(2, 3, 'like'),
(2, 4, 'dislike'),
(3, 2, 'dislike'),
(3, 3, 'like'),
(3, 4, 'dislike'),
(18, 1, 'dislike'),
(18, 2, 'like'),
(18, 3, 'like'),
(18, 4, 'dislike');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_patient` varchar(50) NOT NULL,
  `nom_medecin` varchar(50) NOT NULL,
  `date_consult` date NOT NULL,
  `time_consult` time NOT NULL,
  `rais_consult` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_patient` (`nom_patient`),
  KEY `fk_medecin` (`nom_medecin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `nom_patient`, `nom_medecin`, `date_consult`, `time_consult`, `rais_consult`) VALUES
(1, 'Kebiche', 'Aggoun', '2020-12-12', '12:30:00', 'Maux de tete');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_medecin` FOREIGN KEY (`nom_medecin`) REFERENCES `medecin` (`nom`),
  ADD CONSTRAINT `fk_patient` FOREIGN KEY (`nom_patient`) REFERENCES `patient` (`nom`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
