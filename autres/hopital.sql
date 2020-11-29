-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 29 nov. 2020 à 17:48
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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

DROP TABLE IF EXISTS `medecin`;
CREATE TABLE IF NOT EXISTS `medecin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `mail` varchar(150) NOT NULL,
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

INSERT INTO `medecin` (`id`, `nom`, `mail`, `lieu`, `specialite`, `identifiant`, `mdp`, `approuve`) VALUES
(1, 'Aggoun', '', 'Aubervilliers', 'Neurologie', 'Lucario', 'c1078f95440f31e9c88138226b1af484', 1),
(2, 'Guo', '', 'Bourget', 'Tabacologie', 'az', 'a9d3b34800d4283ed34b2bbbeb443a77', 1),
(3, 'Tang', '', 'Aulnay-sous-bois', 'Gynécologie', 'tang', '87db92494758df7d0f0a4f39162a48f4', 1),
(4, 'Birba', '', 'Dugny', 'Cardiologie', 'Dr.CapriSun', 'be6e0613371881bfe15b363bf5d00c20', 1),
(6, 'test', '', 'test', 'test', 'test', '098f6bcd4621d373cade4e832627b4f6', 0),
(7, 'afd', '', 'azfd', 'az', 'az', 'cc8c0a97c2dfcd73caff160b65aa39e2', 0),
(8, 'chacale', '', 'chacal', 'chacal', 'chacal', '39cfe80e92fee0e3618e56df21e69dbb', 1),
(9, 'enfin', '', 'enfin', 'enfin', 'enfin', 'ded2a04774ebf30df7b601b08b09c999', 1),
(10, 'e', '', 'd', 'e', 'd', '8277e0910d750195b448797616e091ad', 1),
(13, 'Hahaa', '', 'Hahaa', 'Haha', 'Haha', '4e4d6c332b6fe62a63afe56171fd3725', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8 COMMENT='La table qui va contenir tous les messages voyons !';

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `author`, `content`, `created_at`) VALUES
(14, 'Tiara Wiza', 'Est odio animi et voluptatem voluptas et et nobis beatae laborum tempora quia aliquid cum aut aperiam exercitationem.', '2017-07-24 16:03:27'),
(15, 'Tiara Wiza', 'Praesentium molestiae ut repudiandae et nihil ut at consectetur aut itaque sit.', '2017-07-24 09:38:48'),
(16, 'Wilford Quitzon', 'Culpa perferendis tenetur corporis deserunt fugit rem nihil aut sunt id fugit ut.', '2017-07-24 08:13:35'),
(17, 'Wilford Quitzon', 'Aspernatur molestiae impedit consequatur aut quia debitis molestiae ratione veniam dolorem molestiae optio debitis neque aut maiores aut quasi atque.', '2017-07-24 10:05:02'),
(18, 'Amelie Ullrich', 'Iusto dolor sunt vel excepturi molestiae et aut voluptatem sint eos quasi.', '2017-07-24 21:00:36'),
(19, 'Amelie Ullrich', 'Provident eos iure accusamus aut deserunt molestiae officiis eligendi quo laboriosam odio non unde rerum neque et ipsum non.', '2017-07-24 06:29:11'),
(20, 'Prof. Einar Beer', 'Rerum nihil expedita sed corrupti consequuntur soluta quisquam qui accusamus animi quasi natus error expedita ratione odit voluptatem iure consequuntur quia non.', '2017-07-24 19:11:28'),
(68, 'c', 'c', '2020-11-29 01:00:12'),
(69, 'eaz', 'eaz', '2020-11-29 01:01:41'),
(70, 'test', 'test', '2020-11-29 01:08:09'),
(65, 't', 't', '2020-11-29 00:58:13'),
(66, 'aeaz', 'ezaze', '2020-11-29 00:58:34'),
(67, 'oho', 'oho', '2020-11-29 00:59:08'),
(47, 'Mr. Chandler Reinger', 'Officiis porro labore consectetur ratione et qui amet asperiores voluptatem dolorem.', '2017-07-24 12:48:06'),
(50, 'Joseph', 'Bonjour à tous !', '2017-07-25 01:23:55'),
(49, 'Lior', 'Mon message trop bien !', '2017-07-25 01:01:28'),
(51, 'Jeanne', 'Salut les amis !', '2017-07-25 01:24:54'),
(52, 'Lior', 'Est-ce que ça marche ?', '2017-07-25 01:41:13'),
(53, 'Lior', 'nouveau test', '2017-07-25 01:42:04'),
(54, 'Lior', 'Nouveau test encore', '2017-07-25 01:42:15'),
(55, 'Lior', 'et encore', '2017-07-25 01:42:16'),
(56, 'Lior', 'et encore !', '2017-07-25 01:42:18'),
(57, 'Joseph', 'Bonjour à tous !', '2017-07-25 01:42:47'),
(58, 'Jeanne', 'Bien salut mon Joseph !', '2017-07-25 01:44:00'),
(59, 'Lior', 'Bonjour à tous !', '2017-07-25 01:44:13'),
(60, 'Jeanne', 'Salut Lior, comment vas-tu ?', '2017-07-25 01:44:19'),
(61, 'test', 'test', '2020-11-28 23:49:04'),
(62, 'test', 'a', '2020-11-28 23:49:10'),
(63, 'a', 'a', '2020-11-29 00:03:37'),
(64, 'ae', 'ez', '2020-11-29 00:32:45');

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
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

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
(9, 'Raoult', 'Mettez vos masques', '2020-10-27 17:19:34'),
(10, 'tr', 'test', '2020-11-28 21:10:20'),
(11, 'Fontaine', 'test', '2020-11-29 00:22:13'),
(53, 'Fonta', 'az', '2020-11-29 00:54:39'),
(52, 'Fonta', 'az', '2020-11-29 00:54:33'),
(66, 'Kebiche', 'ah ouais ?', '2020-11-29 01:37:27'),
(65, 'Kebiche', 'ah ouais ?', '2020-11-29 01:37:06'),
(64, 'Kebiche', 'ah ouais ?', '2020-11-29 01:36:29'),
(63, 'Kebiche', 'ah ouais ?', '2020-11-29 01:36:17'),
(62, 'Kebiche', 'ah ouais ?', '2020-11-29 01:35:57'),
(61, 'Kebiche', 'ah ouais ?', '2020-11-29 01:35:34'),
(60, 'Kebiche', 'ah ouais ?', '2020-11-29 01:35:18'),
(59, 'Kebiche', 'ah ouais ?', '2020-11-29 01:35:06'),
(58, 'Kebiche', 'ah ouais ?', '2020-11-29 01:34:37'),
(57, 'Kebiche', 'ah ouais ?', '2020-11-29 01:34:30'),
(56, 'Kebiche', 'ah ouais ?', '2020-11-29 01:34:10'),
(55, 'Fontaine', 'ah', '2020-11-29 00:57:46'),
(54, 'Fontaine', 'ah', '2020-11-29 00:54:46'),
(51, 'Fonta', 'az', '2020-11-29 00:53:42'),
(50, 'Fonta', 'az', '2020-11-29 00:53:10'),
(49, 'Fonta', 'az', '2020-11-29 00:52:44'),
(48, 'Fonta', 'az', '2020-11-29 00:51:58'),
(47, 'Fonta', 'az', '2020-11-29 00:51:34'),
(46, 'Fonta', 'az', '2020-11-29 00:43:30'),
(45, 'Fontaine', 'hihi', '2020-11-29 00:43:21'),
(67, 'Kebiche', 'ah ouais ?', '2020-11-29 01:37:43'),
(68, 'Kebiche', 'ah ouais ?', '2020-11-29 01:37:46'),
(69, 'Kebiche', 'ah ouais ?', '2020-11-29 01:38:01'),
(70, 'Kebiche', 'ah ouais ?', '2020-11-29 01:38:36'),
(71, 'Kebiche', 'ah ouais ?', '2020-11-29 01:38:44'),
(72, 'Kebiche', 'a', '2020-11-29 01:39:14'),
(73, 'Kebiche', 'a', '2020-11-29 01:39:17'),
(74, 'Kebiche', 'a', '2020-11-29 01:39:43'),
(75, 'Goncalves', 'test', '2020-11-29 01:48:24'),
(76, 'eaz', 'a', '2020-11-29 15:43:58'),
(77, 'Goncalves', 't', '2020-11-29 15:52:46');

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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`id`, `nom`, `prenom`, `date_naissance`, `mail`, `adresse`, `mutuelle`, `num_sec_soc`, `option_chambre`, `regime`, `mdp`, `role`, `confirme`, `token`) VALUES
(2, 'Kebiche', 'Killian', '', 'k.kebiche@gmail.com', '3 rue des potiers 93300 Aubervilliers', 'test', '152485963258745', 'Wifi et TV', 'SECU ', '098f6bcd4621d373cade4e832627b4f6', 'patient', 1, NULL),
(7, 'zaaaz', 'zz', '2001-12-18', 'z@z.fr', 'z', 'z', '100432432432431', 'Wifi', 'z', 'fbade9e36a3f36d3d676c1b808451dd7', 'patient', 0, NULL),
(15, 'bhujun', 'yanish', '2020-09-30', 'yanish.bhujun@gmail.com', '3 rue test', 'GRAS SAVOIE', '212222222222111', 'Wifi', 'e', '164b6da6ab4209c16ff3841306dbec83', 'patient', 0, NULL),
(18, 'Fontaine', 'Ryan', '2000-10-12', 'ryan-fontaine@hotmail.fr', 'QQq', 'QQq', '232112321321312', 'QQq', 'QQq', '098f6bcd4621d373cade4e832627b4f6', 'patient', 1, NULL),
(19, 'Goncalves', 'Nathan', '2000-06-07', 'axel.lea.kingdomhearts@gmail.com', '3 rue des pottiers', 'Hunter', '123232312132323', 'TV', 'CMU', '098f6bcd4621d373cade4e832627b4f6', 'patient', 0, NULL),
(21, 'Ghita', 'Ryan', '1999-11-18', 'ghitaxryanhihihihihihihi@gmail.com', 'testt', 'testtt', '784564565464564', 'Wifi', 'reer', '925cc8d2953eba624b2bfedf91a91613', 'patient', 1, NULL),
(22, 'tentend', 'pas', '2000-12-12', 'ouquoi@gmail.com', 'chacal', 'ca dit', '789789789789444', 'wifi', 'tr', '098f6bcd4621d373cade4e832627b4f6', 'patient', 1, NULL),
(23, 'Brook', 'Fadi', '2000-03-18', 'f.khiate@lprs.fr', 'Alabasta', 'wsh', '797897878989778', 'Wifi', 'tees', '098f6bcd4621d373cade4e832627b4f6', 'patient', 1, NULL),
(24, 'huhu', 'huhu', '2000-12-12', 'huhu@huhu.huhu', 'huhu', 'huhu', '456456412320025', 'wifi', 'huhu', 'f3c2cefc1f3b082a56f52902484ca511', 'patient', 0, NULL),
(29, 'q', 'q', '2000-12-12', 'r.fontaine@lprs.fr', 'q', 'q', '693633333333333', 'q', 'q', '098f6bcd4621d373cade4e832627b4f6', 'patient', 0, NULL);

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
