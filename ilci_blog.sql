-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 11 déc. 2020 à 16:59
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ilci_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(20) NOT NULL,
  `contenu` text NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `auteur` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auteur` (`auteur`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `titre`, `contenu`, `date_creation`, `auteur`) VALUES
(1, 'Informatique', 'Dans ce cas, nous souhaitons augmenter le &quot;cost&quot; par d&eacute;faut pour BC', '2020-12-08 17:42:03', 1),
(2, 'Histoire', 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilis&eacute;e &agrave; titre provisoire pour calibrer une mise en page, le texte d&eacute;finitif venant remplacer le faux-texte d&egrave;s qu\'il est pr&ecirc;t ou que la mise en page est achev&eacute;e. G&eacute;n&eacute;ralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum. ', '2020-12-10 14:46:19', 2),
(3, 'testa', 'ipsum est, en imprimerie, une suite de mots sans signification utilis&eacute;e &agrave; titre provisoire pour calibrer une mise en page, le texte d&eacute;finitif venant rem', '2020-12-10 17:40:41', 2);

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

DROP TABLE IF EXISTS `auteur`;
CREATE TABLE IF NOT EXISTS `auteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `login` varchar(20) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `date_inscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `statut` varchar(10) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`id`, `prenom`, `nom`, `login`, `mdp`, `date_inscription`, `statut`) VALUES
(1, 'Julie', 'Jena pierre', 'afpa', '$2y$10$a6DpRXcpCWNm2uwdwCJJn.6l31meYzsSIw5Qh89nECcFUa3vBjxbW', '2020-12-08 17:40:24', 'user'),
(2, 'Moussa', 'Tata', 'ilci', '$2y$10$aRrZJw/SMG0pgA8p5J.Q2uaKobOG/68qytW3DWOIFGoSpLYcE7qdm', '2020-12-08 17:40:43', 'admin'),
(3, 'Vincent', 'Jean jacques', 'invite', '$2y$10$xt2Hdox/Yx35UiWrAO0S5eGo8DNQNBShhGGuUMTXCAaiBCRSxk1v2', '2020-12-10 16:16:47', 'user');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `article` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_article` (`article`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `pseudo`, `content`, `article`) VALUES
(1, 'toto', 'content commentaire ...', 1),
(2, 'Victor', 'contenu du comm', 1),
(3, 'Julie', 'com', 2),
(17, 'sdfcsdf', 'sdfsdfs', 2),
(18, 'xcvxcv', 'xcvcxv', 1),
(19, 'rtrtrt', 'rtrtrt', 2),
(20, 'zerzer', 'zerz', 2),
(21, 'oooooo', 'oooo', 2),
(22, 'sdf', 'dqsfqs', 2),
(23, 'sdf', 'dqsfqs', 2),
(24, '212121', '121212121', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`auteur`) REFERENCES `auteur` (`id`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`article`) REFERENCES `article` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
