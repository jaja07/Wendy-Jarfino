-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 22 nov. 2023 à 18:46
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mirage`
--

-- --------------------------------------------------------

--
-- Structure de la table `creneau`
--

CREATE TABLE `creneau` (
  `idCreneau` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `idJeux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `creneau`
--

INSERT INTO `creneau` (`idCreneau`, `date`, `idJeux`) VALUES
(1, '2023-11-29', 7);

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `id` int(11) NOT NULL,
  `idCreneau` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jeux`
--

CREATE TABLE `jeux` (
  `idJeux` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `regle` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `jeux`
--

INSERT INTO `jeux` (`idJeux`, `nom`, `description`, `categorie`, `regle`, `image`) VALUES
(7, 'Uno', 'Uno ...', 'Cartes', 'La_rÃ¨gle_du_Uno.pdf', 'Uno.jpg'),
(9, 'Monopoly', 'Le monopoly est un jeu ...', 'Plateau', 'La_rÃ¨gle_du_Monopoly.pdf', 'Monopoly.jpg'),
(10, 'Mancala', 'Mancala est un jeu ...', 'SociÃ©tÃ©', 'La_rÃ¨gle_du_Mancala.pdf', 'Jeu 1.jpg'),
(11, 'Marelle', 'Marelle ...', 'Plateau', 'La_rÃ¨gle_de_la_Marelle.pdf', 'Jeu de marelle.jpg'),
(12, 'Cartes', 'Cartes ....', 'Hasard', 'La_rÃ¨gle_de_la_Marelle.pdf', 'Jeu de cartes.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `jouer`
--

CREATE TABLE `jouer` (
  `idUser` int(11) NOT NULL,
  `idJeux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `nom`, `prenom`, `email`, `password`, `role`) VALUES
(1, 'AH', 'Jojo', 'jojo@gmail.com', '$2y$10$I2BeC5CKm4.JVuxTO03h3.uf3Fx19z50cS2TVWjRj6fvcDtaiUqsK', 2),
(2, 'HOUNGBADJI', 'Jarfino', 'jarfinohoungbadji@gmail.com', '$2y$12$SZZzLhGbS8v6mF.cxvybBef/pcgQSSE2LfPvMLcYRKBB.YlKUjj56', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `creneau`
--
ALTER TABLE `creneau`
  ADD PRIMARY KEY (`idCreneau`),
  ADD UNIQUE KEY `idCreneau` (`idCreneau`) USING BTREE,
  ADD UNIQUE KEY `idJeux` (`idJeux`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCreneau` (`idCreneau`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `jeux`
--
ALTER TABLE `jeux`
  ADD PRIMARY KEY (`idJeux`);

--
-- Index pour la table `jouer`
--
ALTER TABLE `jouer`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `idUser` (`idUser`) USING BTREE,
  ADD UNIQUE KEY `idJeux` (`idJeux`) USING BTREE;

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `creneau`
--
ALTER TABLE `creneau`
  MODIFY `idCreneau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT pour la table `jeux`
--
ALTER TABLE `jeux`
  MODIFY `idJeux` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

  --
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT pour la table `jouer`
--
ALTER TABLE `jouer`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `creneau`
--
ALTER TABLE `creneau`
  ADD CONSTRAINT `creneau_ibfk_1` FOREIGN KEY (`idJeux`) REFERENCES `jeux` (`idJeux`) ON DELETE CASCADE;

--
-- Contraintes pour la table `jouer`
--
ALTER TABLE `jouer`
  ADD CONSTRAINT `jouer_ibfk_1` FOREIGN KEY (`idJeux`) REFERENCES `jeux` (`idJeux`) ON DELETE CASCADE,
  ADD CONSTRAINT `jouer_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
