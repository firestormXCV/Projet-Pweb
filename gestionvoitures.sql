-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 07 Novembre 2021 à 21:43
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestionvoitures`
--

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `idFacture` int(11) NOT NULL,
  `ide` int(11) NOT NULL,
  `idv` int(11) NOT NULL,
  `etat` tinyint(1) NOT NULL DEFAULT '0',
  `valeur` int(255) NOT NULL,
  `dateD` date NOT NULL,
  `dateF` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `facture`
--

INSERT INTO `facture` (`idFacture`, `ide`, `idv`, `etat`, `valeur`, `dateD`, `dateF`) VALUES
(1, 3, 1, 0, 1080, '2021-11-18', '2021-11-27'),
(2, 1, 2, 0, 180, '2021-11-17', '2021-11-18'),
(3, 1, 3, 0, 2500, '2021-11-26', '2021-12-01');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('CLIENT','LOUEUR') NOT NULL DEFAULT 'CLIENT'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `mdp`, `email`, `role`) VALUES
(1, 'Durant', '7f138a09169b250e9dcb378140907378', 'Durant@gmail.com', 'CLIENT'),
(2, 'Dominique', '7f138a09169b250e9dcb378140907378', 'Dominique@gmail.com', 'CLIENT'),
(3, 'Dubois', '7f138a09169b250e9dcb378140907378', 'Dubois@gmail.com', 'CLIENT'),
(4, 'Isaac', '7f138a09169b250e9dcb378140907378', 'Isaac@gmail.com', 'LOUEUR');

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

CREATE TABLE `voiture` (
  `idVoiture` int(11) NOT NULL,
  `etat` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `modele` varchar(50) NOT NULL,
  `prix` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `voiture`
--

INSERT INTO `voiture` (`idVoiture`, `etat`, `photo`, `modele`, `prix`) VALUES
(1, '3', 'BMW-X5-Blanc.jpg', 'BMW X5 - Blanc', '120'),
(2, '1', 'BMW-Z4-Gris.jpg', 'BMW Z4 - Gris', '180'),
(3, '1', 'McLaren-720-S-Spider-Bleu.jpg', 'McLaren 720 S Spider - Bleu', '500'),
(4, 'enRevision', 'Mercedes-GLA-Gris.jpg', 'Mercedes GLA - Gris', '220'),
(5, 'disponible', 'Porsche-992-Carrera-4S-cabriolet-Bleu.jpg', 'Porsche 992 Carrera 4S cabriolet - Bleu', '320'),
(6, 'disponible', 'BMW-X5-Blanc.jpg', 'BMW X5 - Blanc', '120'),
(7, 'disponible', 'McLaren-720-S-Spider-Bleu.jpg', 'McLaren 720 S Spider - Bleu', '500'),
(8, 'disponible', 'BMW-Z4-Gris.jpg', 'BMW Z4 - Gris', '180'),
(9, 'disponible', 'BMW-Z4-Gris.jpg', 'BMW Z4 - Gris', '180'),
(10, 'enRevision', 'Mercedes-GLA-Gris.jpg', 'Mercedes GLA - Gris', '220'),
(11, 'disponible', 'McLaren-720-S-Spider-Bleu.jpg', 'McLaren 720 S Spider - Bleu', '500');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`idFacture`),
  ADD UNIQUE KEY `ide` (`ide`,`idv`,`dateD`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`idVoiture`),
  ADD UNIQUE KEY `idVoiture` (`idVoiture`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `idFacture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `voiture`
--
ALTER TABLE `voiture`
  MODIFY `idVoiture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
