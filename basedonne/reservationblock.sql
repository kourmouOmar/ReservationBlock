-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 17 Juin 2019 à 07:12
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `reservationblock`
--

-- --------------------------------------------------------

--
-- Structure de la table `blockreserve`
--

CREATE TABLE `blockreserve` (
  `id` int(11) NOT NULL,
  `salle_operation` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `heure_depart` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `heure_fin` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `nom_patient` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `maladie` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `intitle_operation` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `blockreserve`
--

INSERT INTO `blockreserve` (`id`, `salle_operation`, `date`, `heure_depart`, `heure_fin`, `nom_patient`, `maladie`, `intitle_operation`, `id_utilisateur`) VALUES
(2, 'salles operation 1', '2019-06-19', '08:00', '10:00', 'test1', 'test2', 'test', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(10) NOT NULL,
  `Nom` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Prenom` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `statut` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `Nom`, `Prenom`, `login`, `password`, `email`, `statut`, `telephone`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'admin@gmail.com', '', '654094990'),
(2, 'administrateur', 'administrateur', 'adminstrateur', 'adminstrateur', 'adminstrateur@gmail.com', 'adminstrateur', '654094990');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `blockreserve`
--
ALTER TABLE `blockreserve`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `blockreserve`
--
ALTER TABLE `blockreserve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
