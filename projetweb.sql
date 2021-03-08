-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 24 avr. 2018 à 22:19
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `idC` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `Sexe` varchar(255) NOT NULL,
  `Pseudo` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  PRIMARY KEY (`idC`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`idC`, `nom`, `prenom`, `Sexe`, `Pseudo`, `Email`) VALUES
(1, 'Hcini', 'Haithem', 'Homme', 'haithem.hcini', 'haithem.hcini@esprit.tn'),
(2, 'Hcini', 'Haithem', 'Homme', 'Hcini', 'haithem.hcini@esprit.tn');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `idCommande` int(11) NOT NULL AUTO_INCREMENT,
  `dateCommande` date NOT NULL,
  `montantCommande` int(11) NOT NULL,
  `etatCommande` varchar(255) NOT NULL,
  `lieuLivraison` varchar(255) NOT NULL,
  `prixLivraison` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  PRIMARY KEY (`idCommande`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`idCommande`, `dateCommande`, `montantCommande`, `etatCommande`, `lieuLivraison`, `prixLivraison`, `idClient`) VALUES
(37, '2018-04-24', 5720, 'en cours', 'Ariana', 5, 2),
(38, '2018-04-24', 5720, 'en cours', 'Ariana', 5, 2);

-- --------------------------------------------------------

--
-- Structure de la table `historiquecommande`
--

DROP TABLE IF EXISTS `historiquecommande`;
CREATE TABLE IF NOT EXISTS `historiquecommande` (
  `idCommande` int(11) NOT NULL,
  `dateCommande` date NOT NULL,
  `montantCommande` int(11) NOT NULL,
  `etatCommande` varchar(255) NOT NULL,
  `lieuLivraison` varchar(255) NOT NULL,
  `prixLivraison` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  PRIMARY KEY (`idCommande`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `historiquecommande`
--

INSERT INTO `historiquecommande` (`idCommande`, `dateCommande`, `montantCommande`, `etatCommande`, `lieuLivraison`, `prixLivraison`, `idClient`) VALUES
(1, '2018-04-24', 7440, 'Validee', 'Ariana', 5, 2),
(3, '2018-04-24', 0, 'Validee', 'Ariana', 5, 1),
(4, '2018-04-24', 0, 'Validee', 'Ariana', 5, 1),
(5, '2018-04-24', 4040, 'Validee', 'Ariana', 5, 2),
(6, '2018-04-24', 4040, 'Validee', 'Ariana', 5, 2),
(7, '2018-04-24', 4040, 'Validee', 'Ariana', 5, 2),
(8, '2018-04-24', 3770, 'Validee', 'Ghazela', 5, 2),
(9, '2018-04-24', 3770, 'Validee', 'Ghazela', 5, 2),
(10, '2018-04-24', 3770, 'Validee', 'Ghazela', 5, 2),
(2, '2018-04-24', 7440, 'Validee', 'Ariana', 5, 2),
(11, '2018-04-24', 3770, 'Validee', 'Ghazela', 5, 2),
(12, '2018-04-24', 3770, 'Validee', 'El Menzah', 5, 2),
(13, '2018-04-24', 3770, 'Anuulee', 'Ariana', 5, 2),
(14, '2018-04-24', 3770, 'Anuulee', 'Ariana', 5, 2),
(15, '2018-04-24', 3770, 'Anuulee', 'Ariana', 5, 2),
(16, '2018-04-24', 3770, 'Anuulee', 'Ariana', 5, 2),
(17, '2018-04-24', 3770, 'Anuulee', 'Ariana', 5, 2),
(18, '2018-04-24', 3770, 'Anuulee', 'Ariana', 5, 2),
(19, '2018-04-24', 3770, 'Anuulee', 'Ariana', 5, 2),
(20, '2018-04-24', 3770, 'Anuulee', 'Ariana', 5, 2),
(23, '2018-04-24', 3770, 'Anuulee', 'Ariana', 5, 2),
(22, '2018-04-24', 3770, 'Validee', 'Ariana', 5, 2),
(21, '2018-04-24', 3770, 'Validee', 'Ariana', 5, 2),
(24, '2018-04-24', 5720, 'Anuulee', 'Ariana', 5, 2),
(25, '2018-04-24', 5720, 'Anuulee', 'Ariana', 5, 2),
(27, '2018-04-24', 5720, 'Validee', 'Ariana', 5, 2),
(26, '2018-04-24', 5720, 'Anuulee', 'Ariana', 5, 2),
(28, '2018-04-24', 5720, 'Anuulee', 'El Manar', 5, 2),
(29, '2018-04-24', 5720, 'Anuulee', 'El Manar', 5, 2),
(30, '2018-04-24', 5720, 'Anuulee', 'Ghazela', 5, 2),
(31, '2018-04-24', 5720, 'Anuulee', 'Ghazela', 5, 2),
(32, '2018-04-24', 5720, 'Anuulee', 'Ariana', 5, 2),
(33, '2018-04-24', 5720, 'Anuulee', 'Ariana', 5, 2),
(34, '2018-04-24', 5720, 'Anuulee', 'Ariana', 5, 2),
(35, '2018-04-24', 5720, 'Anuulee', 'Ariana', 5, 2),
(36, '2018-04-24', 5720, 'Anuulee', 'Ariana', 5, 2);

-- --------------------------------------------------------

--
-- Structure de la table `lignecommande`
--

DROP TABLE IF EXISTS `lignecommande`;
CREATE TABLE IF NOT EXISTS `lignecommande` (
  `idLC` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `idCommande` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`idLC`),
  KEY `id` (`id`),
  KEY `idCommande` (`idCommande`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lignecommande`
--

INSERT INTO `lignecommande` (`idLC`, `id`, `idCommande`, `idClient`, `prix`, `quantite`, `nom`) VALUES
(4, 1, 2, 2, 120, 1, 'Guitare'),
(5, 2, 2, 2, 560, 7, 'Piano'),
(6, 3, 2, 2, 850, 4, 'Piano'),
(7, 1, 5, 2, 120, 1, 'Guitare'),
(8, 2, 5, 2, 560, 7, 'Piano'),
(9, 1, 6, 2, 120, 1, 'Guitare'),
(10, 2, 6, 2, 560, 7, 'Piano'),
(11, 1, 7, 2, 120, 1, 'Guitare'),
(12, 2, 7, 2, 560, 7, 'Piano'),
(13, 1, 8, 2, 120, 1, 'Guitare'),
(14, 2, 8, 2, 560, 5, 'Piano'),
(15, 3, 8, 2, 850, 1, 'Piano'),
(16, 1, 9, 2, 120, 1, 'Guitare'),
(17, 2, 9, 2, 560, 5, 'Piano'),
(18, 3, 9, 2, 850, 1, 'Piano'),
(19, 1, 10, 2, 120, 1, 'Guitare'),
(20, 2, 10, 2, 560, 5, 'Piano'),
(21, 3, 10, 2, 850, 1, 'Piano'),
(22, 1, 11, 2, 120, 1, 'Guitare'),
(23, 2, 11, 2, 560, 5, 'Piano'),
(24, 3, 11, 2, 850, 1, 'Piano'),
(25, 1, 12, 2, 120, 1, 'Guitare'),
(26, 2, 12, 2, 560, 5, 'Piano'),
(27, 3, 12, 2, 850, 1, 'Piano'),
(49, 1, 21, 2, 120, 1, 'Guitare'),
(50, 2, 21, 2, 560, 5, 'Piano'),
(51, 3, 21, 2, 850, 1, 'Piano'),
(52, 1, 22, 2, 120, 1, 'Guitare'),
(53, 2, 22, 2, 560, 5, 'Piano'),
(54, 3, 22, 2, 850, 1, 'Piano'),
(64, 2, 27, 2, 560, 10, 'Piano'),
(65, 1, 27, 2, 120, 1, 'Guitare'),
(84, 2, 37, 2, 560, 10, 'Piano'),
(85, 1, 37, 2, 120, 1, 'Guitare'),
(86, 2, 38, 2, 560, 10, 'Piano'),
(87, 1, 38, 2, 120, 1, 'Guitare');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `idp` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  PRIMARY KEY (`idp`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`idp`, `id`, `nom`, `prix`, `quantite`, `idClient`) VALUES
(18, 2, 'Piano', 560, 10, 2),
(19, 1, 'Guitare', 120, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `prix`, `quantite`, `categorie`) VALUES
(1, 'Guitare', 120, 20, 'Instrument Corde'),
(2, 'Piano', 560, 10, 'Clavier'),
(3, 'Piano', 850, 2, 'Clavier');

-- --------------------------------------------------------

--
-- Structure de la table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `idw` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  PRIMARY KEY (`idw`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `wishlist`
--

INSERT INTO `wishlist` (`idw`, `id`, `nom`, `prix`, `quantite`, `idClient`) VALUES
(30, 1, 'Guitare', 120, 1, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
