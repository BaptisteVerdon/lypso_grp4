-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 14 mars 2024 à 23:18
-- Version du serveur : 8.0.36-0ubuntu0.23.10.1
-- Version de PHP : 8.2.10-2ubuntu1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lypso`
--

-- --------------------------------------------------------

--
-- Structure de la table `dayOff`
--

CREATE TABLE `dayOff` (
  `id` int NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `user_id` int NOT NULL,
  `reason_id` int NOT NULL,
  `status_id` int NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `dayOff`
--

INSERT INTO `dayOff` (`id`, `start`, `end`, `user_id`, `reason_id`, `status_id`) VALUES
(1, '2024-11-16', '2024-12-23', 2, 2, 2),
(2, '2024-05-12', '2024-05-13', 2, 3, 5),
(3, '2024-04-21', '2024-04-28', 2, 5, 3),
(4, '2024-01-08', '2024-01-09', 2, 3, 1),
(12, '2025-12-21', '2025-12-22', 2, 4, 1),
(16, '2025-12-25', '2025-12-26', 2, 1, 4),
(17, '2026-03-02', '2026-03-03', 2, 2, 4),
(18, '2024-07-15', '2024-07-21', 2, 5, 4),
(20, '2024-05-06', '2024-05-10', 4, 2, 5),
(22, '2024-04-01', '2024-04-05', 4, 5, 1),
(28, '2024-02-10', '2024-02-17', 4, 5, 3),
(29, '2024-02-24', '2024-02-25', 4, 5, 3),
(30, '2025-12-09', '2025-12-10', 4, 4, 5),
(31, '2024-02-29', '2024-03-07', 4, 1, 3),
(34, '2024-03-24', '2024-03-31', 4, 2, 2),
(35, '2024-03-10', '2024-03-15', 4, 2, 1),
(36, '2024-03-22', '2024-03-30', 3, 5, 1),
(37, '2024-03-08', '2024-03-13', 6, 3, 5),
(38, '2024-03-17', '2024-03-22', 4, 4, 1),
(40, '2024-03-20', '2024-03-25', 7, 2, 1),
(41, '2024-03-20', '2024-03-25', 6, 4, 1),
(42, '2024-03-18', '2024-03-20', 2, 4, 1),
(43, '2024-03-14', '2024-03-15', 3, 3, 3),
(53, '2024-03-28', '2024-03-31', 6, 5, 1),
(55, '2024-05-06', '2024-05-13', 6, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE `departement` (
  `id` int NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `manager_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`id`, `name`, `manager_id`) VALUES
(1, 'Banque', 3),
(2, 'Assurance', 1);

-- --------------------------------------------------------

--
-- Structure de la table `reason`
--

CREATE TABLE `reason` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `abbreviation` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `reason`
--

INSERT INTO `reason` (`id`, `name`, `abbreviation`) VALUES
(1, 'Congés annuels', 'CP'),
(2, 'Congés sans solde', 'CS'),
(3, 'Congés pour événement familial \r\n', 'CC'),
(4, 'Absence autorisée', 'AA'),
(5, 'Jour de réduction du temps de travail ', 'RTT');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'employee'),
(3, 'manager'),
(4, 'director');

-- --------------------------------------------------------

--
-- Structure de la table `status`
--

CREATE TABLE `status` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'Validé'),
(2, 'Refusé'),
(3, 'En attente'),
(4, 'Annulé'),
(5, 'Demande de suppression');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `departement_id` int DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `role_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `lastname`, `firstname`, `departement_id`, `active`, `role_id`) VALUES
(1, 'admin@admin.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'admini', 'strateur', NULL, 0, 1),
(2, 'nolan@test.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Guignard', 'Nolan', 1, 1, 2),
(3, 'rafael@test.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Boisseau', 'Rafael', 2, 1, 2),
(4, 'baptiste@test.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Verdon', 'Baptiste', NULL, 1, 4),
(6, 'mario@test.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Fernandez', 'Mario', 1, 1, 3),
(7, 'milo@test.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Clenet', 'Milo', 2, 1, 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `dayOff`
--
ALTER TABLE `dayOff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user_id`),
  ADD KEY `reason` (`reason_id`),
  ADD KEY `status` (`status_id`);

--
-- Index pour la table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manager` (`manager_id`);

--
-- Index pour la table `reason`
--
ALTER TABLE `reason`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departement` (`departement_id`),
  ADD KEY `role` (`role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `dayOff`
--
ALTER TABLE `dayOff`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT pour la table `departement`
--
ALTER TABLE `departement`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `reason`
--
ALTER TABLE `reason`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `status`
--
ALTER TABLE `status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `dayOff`
--
ALTER TABLE `dayOff`
  ADD CONSTRAINT `reason` FOREIGN KEY (`reason_id`) REFERENCES `reason` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `status` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `departement`
--
ALTER TABLE `departement`
  ADD CONSTRAINT `manager` FOREIGN KEY (`manager_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `departement` FOREIGN KEY (`departement_id`) REFERENCES `departement` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
