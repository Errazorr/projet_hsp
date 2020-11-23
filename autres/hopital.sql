-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 23 nov. 2020 à 15:44
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
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `mdp` varchar(150) NOT NULL,
  `role` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `prenom`, `mail`, `mdp`, `role`) VALUES
(1, 'Fontaine', 'Ryan', 'admin@admin.fr', '098f6bcd4621d373cade4e832627b4f6', 'admin'),
(2, 'test', 'test', 'test@admin.fr', '098f6bcd4621d373cade4e832627b4f6', 'admin');

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
  `approuve` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fk_medecin` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `medecin`
--

INSERT INTO `medecin` (`id`, `nom`, `lieu`, `specialite`, `mail`, `mdp`, `approuve`) VALUES
(1, 'Aggoun', 'Aubervilliers', 'Neurologie', 'lucario@gmail.com', 'c1078f95440f31e9c88138226b1af484', 1),
(2, 'Guo', 'Bourget', 'Tabacologie', 'az@gmail.com', 'a9d3b34800d4283ed34b2bbbeb443a77', 1),
(3, 'Tang', 'Aulnay-sous-bois', 'Gynécologie', 'tang@gmail.fr', '87db92494758df7d0f0a4f39162a48f4', 1),
(4, 'Birba', 'Dugny', 'Cardiologie', 'Enzo@gmail.fr', '098f6bcd4621d373cade4e832627b4f6', 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

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
-- Structure de la table `p3x_chat_message`
--

DROP TABLE IF EXISTS `p3x_chat_message`;
CREATE TABLE IF NOT EXISTS `p3x_chat_message` (
  `id_message` mediumint(7) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_utilisateur` mediumint(7) UNSIGNED NOT NULL,
  `id_utilisateur_prive` mediumint(7) UNSIGNED NOT NULL,
  `message` varchar(250) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_message`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_utilisateur_prive` (`id_utilisateur_prive`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `p3x_chat_message`
--

INSERT INTO `p3x_chat_message` (`id_message`, `id_utilisateur`, `id_utilisateur_prive`, `message`, `date`) VALUES
(1, 1, 0, 'dzjiodsiiddehizezfhi', '2020-11-02 14:06:09'),
(2, 2, 0, 'ezazea', '2020-11-02 14:10:56'),
(3, 1, 0, 'bonjour', '2020-11-02 14:57:35'),
(4, 1, 0, 'test', '2020-11-02 14:57:53'),
(5, 2, 0, 'test 2', '2020-11-02 14:58:24'),
(6, 2, 0, 'mdmmdmmdmdmdsmsdms', '2020-11-02 15:32:41'),
(7, 1, 0, 'pioute', '2020-11-02 16:07:54'),
(8, 2, 1, 'tg', '2020-11-02 16:08:10'),
(9, 2, 0, 'zacveds', '2020-11-02 16:08:14'),
(10, 1, 0, 'bonjour je suis enzo', '2020-11-02 16:19:19'),
(11, 2, 1, 'salut bg', '2020-11-02 16:19:32'),
(12, 1, 0, 'Bonjour', '2020-11-09 15:06:00');

-- --------------------------------------------------------

--
-- Structure de la table `p3x_chat_session`
--

DROP TABLE IF EXISTS `p3x_chat_session`;
CREATE TABLE IF NOT EXISTS `p3x_chat_session` (
  `id_session` mediumint(7) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_utilisateur` mediumint(7) UNSIGNED NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_session`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `p3x_chat_session`
--

INSERT INTO `p3x_chat_session` (`id_session`, `id_utilisateur`, `date`) VALUES
(1, 1, '2020-11-09 16:05:59'),
(2, 2, '2020-11-09 16:11:19');

-- --------------------------------------------------------

--
-- Structure de la table `p3x_chat_utilisateur`
--

DROP TABLE IF EXISTS `p3x_chat_utilisateur`;
CREATE TABLE IF NOT EXISTS `p3x_chat_utilisateur` (
  `id_utilisateur` mediumint(7) UNSIGNED NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `avatar` smallint(4) UNSIGNED NOT NULL,
  `avatar_url` varchar(200) NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `p3x_chat_utilisateur`
--

INSERT INTO `p3x_chat_utilisateur` (`id_utilisateur`, `login`, `pass`, `avatar`, `avatar_url`) VALUES
(1, 'jean', 'e368b9938746fa090d6afd3628355133', 1, ''),
(2, 'sophie', '1066726e7160bd9c987c9968e0cc275a', 2, ''),
(3, 'pierre', '297e430d45e7bf6f65f5dc929d6b072b', 3, ''),
(4, 'marine', '7b1312a1b3e74bb174b3fbbf68ab5a92', 4, '');

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
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
  `mdp` varchar(150) NOT NULL,
  `role` varchar(7) NOT NULL,
  `confirme` int(11) NOT NULL,
  `token` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fk_patient` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`id`, `nom`, `prenom`, `date_naissance`, `mail`, `adresse`, `mutuelle`, `num_sec_soc`, `option_chambre`, `regime`, `mdp`, `role`, `confirme`, `token`) VALUES
(1, 'Kebiche', 'Killian', '2000-06-27', 'k.kebiche@gmail.com', '3 rue des potiers 93300 Aubervilliers', 'test', '152485963258745', 'Wifi et TV', 'SECU ', '098f6bcd4621d373cade4e832627b4f6', 'patient', 0, NULL),
(2, 'yanish', 'bhujun', '2020-09-30', 'yanish.bhujun@gmail.com', '3 rue test', 'GRAS SAVOIE', '212222222222111', 'Wifi', 'e', '164b6da6ab4209c16ff3841306dbec83', 'patient', 0, NULL),
(3, 'Fontaine', 'Ryan', '2000-10-12', 'ryan-fontaine@hotmail.fr', 'QQ', 'QQ', '232112321321312', 'QQ', 'QQ', '098f6bcd4621d373cade4e832627b4f6', 'patient', 0, NULL),
(4, 'Goncalves', 'Nathan', '2000-06-07', 'axel.lea.kingdomhearts@gmail.com', '3 rue des pottiers', 'Hunter', '123232312132323', 'TV', 'CMU', '098f6bcd4621d373cade4e832627b4f6', 'patient', 0, NULL);

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
