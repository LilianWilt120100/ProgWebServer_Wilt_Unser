-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 14 oct. 2021 à 10:03
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `covid_app`
--

-- --------------------------------------------------------

--
-- Structure de la table `amis`
--

CREATE TABLE `amis` (
  `identifiant1` varchar(50) NOT NULL,
  `identifiant2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE `annonces` (
  `idGroup` int(11) NOT NULL,
  `identifiant` varchar(50) NOT NULL,
  `annonceContent` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `appartient`
--

CREATE TABLE `appartient` (
  `idGroup` int(11) NOT NULL,
  `identifiant` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `groupes`
--

CREATE TABLE `groupes` (
  `idGroup` int(11) NOT NULL,
  `nameGroup` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `idMessage` int(11) NOT NULL,
  `content` varchar(5000) NOT NULL,
  `idGroup` int(11) DEFAULT NULL,
  `identifiant1` varchar(50) DEFAULT NULL,
  `identifiant2` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `identifiant` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `localisation` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `estContamine` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `amis`
--
ALTER TABLE `amis`
  ADD PRIMARY KEY (`identifiant1`,`identifiant2`),
  ADD KEY `identifiant2` (`identifiant2`);

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`idGroup`,`identifiant`),
  ADD KEY `identifiant` (`identifiant`);

--
-- Index pour la table `appartient`
--
ALTER TABLE `appartient`
  ADD PRIMARY KEY (`idGroup`,`identifiant`),
  ADD KEY `identifiant` (`identifiant`);

--
-- Index pour la table `groupes`
--
ALTER TABLE `groupes`
  ADD PRIMARY KEY (`idGroup`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`idMessage`),
  ADD KEY `idGroup` (`idGroup`),
  ADD KEY `identifiant1` (`identifiant1`),
  ADD KEY `identifiant2` (`identifiant2`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`identifiant`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `idMessage` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `amis`
--
ALTER TABLE `amis`
  ADD CONSTRAINT `amis_ibfk_1` FOREIGN KEY (`identifiant1`) REFERENCES `users` (`identifiant`),
  ADD CONSTRAINT `amis_ibfk_2` FOREIGN KEY (`identifiant2`) REFERENCES `users` (`identifiant`);

--
-- Contraintes pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD CONSTRAINT `annonces_ibfk_1` FOREIGN KEY (`identifiant`) REFERENCES `users` (`identifiant`),
  ADD CONSTRAINT `annonces_ibfk_2` FOREIGN KEY (`idGroup`) REFERENCES `groupes` (`idGroup`);

--
-- Contraintes pour la table `appartient`
--
ALTER TABLE `appartient`
  ADD CONSTRAINT `appartient_ibfk_1` FOREIGN KEY (`identifiant`) REFERENCES `users` (`identifiant`),
  ADD CONSTRAINT `appartient_ibfk_2` FOREIGN KEY (`idGroup`) REFERENCES `groupes` (`idGroup`);

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`idGroup`) REFERENCES `groupes` (`idGroup`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`identifiant1`) REFERENCES `users` (`identifiant`),
  ADD CONSTRAINT `messages_ibfk_3` FOREIGN KEY (`identifiant2`) REFERENCES `users` (`identifiant`),
  ADD CONSTRAINT `messages_ibfk_4` FOREIGN KEY (`identifiant1`) REFERENCES `amis` (`identifiant1`),
  ADD CONSTRAINT `messages_ibfk_5` FOREIGN KEY (`identifiant2`) REFERENCES `amis` (`identifiant2`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`identifiant`) REFERENCES `appartient` (`identifiant`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`identifiant`) REFERENCES `amis` (`identifiant1`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`identifiant`) REFERENCES `amis` (`identifiant2`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
