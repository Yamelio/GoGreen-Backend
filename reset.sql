-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 14 jan. 2018 à 19:59
-- Version du serveur :  10.1.26-MariaDB
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `covoit_pa8`
--

-- --------------------------------------------------------

--
-- Structure de la table `blacklist`
--

CREATE TABLE `blacklist` (
  `uid1` int(11) NOT NULL,
  `uid2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `blacklist`
--

INSERT INTO `blacklist` (`uid1`, `uid2`) VALUES
(3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `eid` int(11) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `adresse` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`eid`, `nom`, `adresse`) VALUES
(1, 'COGIP', '14 Boulevard de la Poissonnière, 75009 Paris');

-- --------------------------------------------------------

--
-- Structure de la table `horaire`
--

CREATE TABLE `horaire` (
  `hid` int(11) NOT NULL,
  `jour` varchar(8) NOT NULL,
  `heure` time NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `horaire`
--

INSERT INTO `horaire` (`hid`, `jour`, `heure`, `uid`) VALUES
(1, 'lundi', '08:30:00', 1),
(2, 'lundi', '08:30:00', 3),
(3, 'lundi', '18:00:00', 2);

-- --------------------------------------------------------

--
-- Structure de la table `trajet`
--

CREATE TABLE `trajet` (
  `tid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `hid` int(11) NOT NULL,
  `departureAddress` varchar(256) NOT NULL,
  `arrivalAddress` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `trajet`
--

INSERT INTO `trajet` (`tid`, `uid`, `eid`, `hid`, `departureAddress`, `arrivalAddress`) VALUES
(1, 3, 1, 1, '66 Rue Guy Môquet, 94800 Villejuif', '14 Boulevard de la Poissonnière, 75009 Paris'),
(2, 1, 1, 1, '179 Boulevard Maxime Gorki, 94800 Villejuif', '14 Boulevard de la Poissonnière, 75009 Paris');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `prenom` varchar(32) NOT NULL,
  `adresse` varchar(128) NOT NULL,
  `estConducteur` tinyint(1) NOT NULL DEFAULT '0',
  `entreprise` int(11) NOT NULL,
  `estDispo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`uid`, `nom`, `prenom`, `adresse`, `estConducteur`, `entreprise`, `estDispo`) VALUES
(1, 'Dunom', 'Jean Michel', '179 Boulevard Maxime Gorki, 94800 Villejuif', 1, 1, 1),
(2, 'Lebonnom', 'Patrick', '30 Avenue de la République, 94800 Villejuif', 0, 1, 1),
(3, 'Defamille', 'Hubert', '66 Rue Guy Môquet, 94800 Villejuif', 0, 1, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `blacklist`
--
ALTER TABLE `blacklist`
  ADD PRIMARY KEY (`uid1`,`uid2`),
  ADD KEY `uid1` (`uid1`),
  ADD KEY `uid2` (`uid2`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`eid`);

--
-- Index pour la table `horaire`
--
ALTER TABLE `horaire`
  ADD PRIMARY KEY (`hid`),
  ADD KEY `uid` (`uid`);

--
-- Index pour la table `trajet`
--
ALTER TABLE `trajet`
  ADD PRIMARY KEY (`tid`,`uid`,`eid`,`hid`),
  ADD KEY `uid` (`uid`),
  ADD KEY `cid` (`eid`),
  ADD KEY `hid` (`hid`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `entreprise` (`entreprise`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `horaire`
--
ALTER TABLE `horaire`
  MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `trajet`
--
ALTER TABLE `trajet`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `blacklist`
--
ALTER TABLE `blacklist`
  ADD CONSTRAINT `fk_uid1` FOREIGN KEY (`uid1`) REFERENCES `user` (`uid`),
  ADD CONSTRAINT `fk_uid2` FOREIGN KEY (`uid2`) REFERENCES `user` (`uid`);

--
-- Contraintes pour la table `horaire`
--
ALTER TABLE `horaire`
  ADD CONSTRAINT `fk_uidhoraire` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`);

--
-- Contraintes pour la table `trajet`
--
ALTER TABLE `trajet`
  ADD CONSTRAINT `fk_eid` FOREIGN KEY (`eid`) REFERENCES `entreprise` (`eid`),
  ADD CONSTRAINT `fk_hid` FOREIGN KEY (`hid`) REFERENCES `horaire` (`hid`),
  ADD CONSTRAINT `fk_uid` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_entreprise` FOREIGN KEY (`entreprise`) REFERENCES `entreprise` (`eid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
