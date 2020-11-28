-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 28 nov. 2020 à 16:21
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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `prenom`, `mail`, `mdp`, `role`) VALUES
(1, 'FONTAINE', 'Ryan', 'admin@admin.fr', '098f6bcd4621d373cade4e832627b4f6', 'admin'),
(2, 'test', 'Ahouais', 'test@test.fr', '098f6bcd4621d373cade4e832627b4f6', 'admin'),
(3, 'FONTAIN', 'a', 'aa@aa.fr', '4124bc0a9335c27f086f24ba207a4912', 'admin');

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
  `approuve` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fk_medecin` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `medecin`
--

INSERT INTO `medecin` (`id`, `nom`, `lieu`, `specialite`, `identifiant`, `mdp`, `approuve`) VALUES
(1, 'Aggoun', 'Aubervilliers', 'Neurologie', 'Lucario', 'c1078f95440f31e9c88138226b1af484', 1),
(2, 'Guo', 'Bourget', 'Tabacologie', 'az', 'a9d3b34800d4283ed34b2bbbeb443a77', 1),
(3, 'Tang', 'Aulnay-sous-bois', 'Gynécologie', 'tang', '87db92494758df7d0f0a4f39162a48f4', 1),
(4, 'Birba', 'Dugny', 'Cardiologie', 'Dr.CapriSun', 'be6e0613371881bfe15b363bf5d00c20', 1),
(6, 'test', 'test', 'test', 'test', '098f6bcd4621d373cade4e832627b4f6', 0),
(7, 'afd', 'azfd', 'az', 'az', 'cc8c0a97c2dfcd73caff160b65aa39e2', 0),
(8, 'chacal', 'chacal', 'chacal', 'chacal', '39cfe80e92fee0e3618e56df21e69dbb', 1),
(9, 'enfin', 'enfin', 'enfin', 'enfin', 'ded2a04774ebf30df7b601b08b09c999', 1),
(10, 'eza', 'd', 'ezd', 'd', '8277e0910d750195b448797616e091ad', 1),
(13, 'Hahaa', 'Hahaa', 'Haha', 'Haha', '4e4d6c332b6fe62a63afe56171fd3725', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `p3x_chat_message`
--

INSERT INTO `p3x_chat_message` (`id_message`, `id_utilisateur`, `id_utilisateur_prive`, `message`, `date`) VALUES
(1, 1, 0, 'dzjiodsiiddehizezfhi', '2020-11-02 14:06:09'),
(2, 2, 0, 'ezazea', '2020-11-02 14:10:56'),
(3, 1, 0, 'bonjour', '2020-11-02 14:57:35'),
(4, 1, 0, 'test', '2020-11-02 14:57:53'),
(5, 2, 0, 'test 2', '2020-11-02 14:58:24');

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
(1, 1, '2020-11-02 15:58:16'),
(2, 2, '2020-11-02 16:31:11');

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
-- Structure de la table `passwords`
--

DROP TABLE IF EXISTS `passwords`;
CREATE TABLE IF NOT EXISTS `passwords` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `password` varchar(150) NOT NULL,
  `token` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `passwords`
--

INSERT INTO `passwords` (`user_id`, `email`, `password`, `token`) VALUES
(1, 'ryan-fontaine@hotmail.fr', '$2y$10$u.5Fhb2afJGynPj/o2WTx.tcv/4tzI0.Kx0TkEsoNrorJgIz9Judq', '5fb12603a5861');

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`id`, `nom`, `prenom`, `date_naissance`, `mail`, `adresse`, `mutuelle`, `num_sec_soc`, `option_chambre`, `regime`, `mdp`, `role`, `confirme`, `token`) VALUES
(2, 'Kebiche', 'Killian', '', 'k.kebiche@gmail.com', '3 rue des potiers 93300 Aubervilliers', 'test', '152485963258745', 'Wifi et TV', 'SECU ', '098f6bcd4621d373cade4e832627b4f6', 'patient', 1, NULL),
(7, 'zaaaz', 'zz', '2001-12-18', 'z@z.fr', 'z', 'z', '100432432432431', 'Wifi', 'z', 'fbade9e36a3f36d3d676c1b808451dd7', 'patient', 0, NULL),
(15, 'bhujun', 'yanish', '2020-09-30', 'yanish.bhujun@gmail.com', '3 rue test', 'GRAS SAVOIE', '212222222222111', 'Wifi', 'e', '164b6da6ab4209c16ff3841306dbec83', 'patient', 0, NULL),
(18, 'Fontaine', 'Ryan', '2000-10-12', 'ryan-fontaine@hotmail.fr', 'QQ', 'QQ', '232112321321312', 'QQ', 'QQ', '098f6bcd4621d373cade4e832627b4f6', 'patient', 1, NULL),
(19, 'Goncalves', 'Nathan', '2000-06-07', 'axel.lea.kingdomhearts@gmail.com', '3 rue des pottiers', 'Hunter', '123232312132323', 'TV', 'CMU', '098f6bcd4621d373cade4e832627b4f6', 'patient', 0, NULL),
(21, 'Ghita', 'Ryan', '1999-11-18', 'ghitaxryanhihihihihihihi@gmail.com', 'testt', 'testtt', '784564565464564', 'Wifi', 'reer', '925cc8d2953eba624b2bfedf91a91613', 'patient', 1, NULL),
(22, 'tentend', 'pas', '2000-12-12', 'ouquoi@gmail.com', 'chacal', 'ca dit', '789789789789444', 'wifi', 'tr', '098f6bcd4621d373cade4e832627b4f6', 'patient', 1, NULL),
(23, 'Brook', 'Fadi', '2000-03-18', 'f.khiate@lprs.fr', 'Alabasta', 'wsh', '797897878989778', 'Wifi', 'tees', '098f6bcd4621d373cade4e832627b4f6', 'patient', 1, NULL);

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
(3, 1, 'dislike'),
(3, 2, 'like'),
(3, 3, 'dislike'),
(3, 4, 'like');

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
