-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 05 mai 2021 à 20:20
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
-- Base de données : `locationvh`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `mail_client` varchar(50) DEFAULT NULL,
  `nom_client` varchar(50) DEFAULT NULL,
  `prenom_client` varchar(50) DEFAULT NULL,
  `mdp_client` varchar(60) DEFAULT NULL,
  `adresse_client` varchar(255) DEFAULT NULL,
  `num_tel_client` varchar(20) DEFAULT NULL,
  `id_type_client` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `mail_client`, `nom_client`, `prenom_client`, `mdp_client`, `adresse_client`, `num_tel_client`, `id_type_client`) VALUES
(18, 'martinez.mathieu@hotmail.fr', 'Martinez', 'mathieu', '$2y$10$jEiKq/yXGT5jZHkZYMuN8u2zl/1rHDh/CFXvrWeTETnAvKLYKO1DO', '42b rue aristide briand', '0783599122', NULL),
(16, 'martinez.alexis@hotmail.fr', 'Martinez', 'Alexis', '$2y$10$NTaFM3fcuV/tszR22zxGrusHVw4rqTXv4ar5/8u/4cLTPbnVt6yDG', '42b rue aristide briand', '0783599122', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `loue`
--

DROP TABLE IF EXISTS `loue`;
CREATE TABLE IF NOT EXISTS `loue` (
  `id_client` int(11) DEFAULT NULL,
  `immat_vehicule` varchar(20) DEFAULT NULL,
  `date_deb_location` date DEFAULT NULL,
  `date_fin_location` date DEFAULT NULL,
  `montant_total` decimal(10,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `loue`
--

INSERT INTO `loue` (`id_client`, `immat_vehicule`, `date_deb_location`, `date_fin_location`, `montant_total`) VALUES
(16, 'abc ad 54', '2021-05-11', '2021-05-28', '15000.00');

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

DROP TABLE IF EXISTS `marque`;
CREATE TABLE IF NOT EXISTS `marque` (
  `id_marque` int(11) NOT NULL AUTO_INCREMENT,
  `lib_marque` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_marque`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `modele`
--

DROP TABLE IF EXISTS `modele`;
CREATE TABLE IF NOT EXISTS `modele` (
  `id_modele` int(11) NOT NULL AUTO_INCREMENT,
  `lib_modele` varchar(50) DEFAULT NULL,
  `id_type_vehicule` int(11) DEFAULT NULL,
  `id_marque` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_modele`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `type_client`
--

DROP TABLE IF EXISTS `type_client`;
CREATE TABLE IF NOT EXISTS `type_client` (
  `id_type_client` int(11) NOT NULL AUTO_INCREMENT,
  `lib_type_client` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_type_client`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `type_vehicule`
--

DROP TABLE IF EXISTS `type_vehicule`;
CREATE TABLE IF NOT EXISTS `type_vehicule` (
  `id_type_vehicule` int(11) NOT NULL AUTO_INCREMENT,
  `lib_type_vehicule` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_type_vehicule`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

DROP TABLE IF EXISTS `vehicule`;
CREATE TABLE IF NOT EXISTS `vehicule` (
  `immat_vehicule` varchar(20) NOT NULL,
  `photo_vehicule` varchar(255) DEFAULT NULL,
  `prix_vehicule` decimal(10,2) DEFAULT NULL,
  `id_modele` int(11) DEFAULT NULL,
  PRIMARY KEY (`immat_vehicule`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vehicule`
--

INSERT INTO `vehicule` (`immat_vehicule`, `photo_vehicule`, `prix_vehicule`, `id_modele`) VALUES
('abc ad 54', 'https://img2.freepng.fr/20171220/ybw/lamborghini-png-image-5a3aa439ba91b3.76048902151379256976424305.jpg', '20000.00', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
