-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 11 avr. 2022 à 19:55
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `kritek_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `invoice_date` date NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `costumer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `invoice`
--

INSERT INTO `invoice` (`id`, `invoice_date`, `invoice_number`, `costumer_id`) VALUES
(1, '2019-01-01', 77990987, 1),
(2, '2017-01-01', 77990987, 1),
(3, '2017-01-01', 77990987, 1),
(4, '2017-01-01', 77990987, 1),
(5, '2017-01-01', 779087123, 4);

-- --------------------------------------------------------

--
-- Structure de la table `invoice_line`
--

CREATE TABLE `invoice_line` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` double NOT NULL,
  `vat_amount` double NOT NULL,
  `total_with_vat` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `invoice_line`
--

INSERT INTO `invoice_line` (`id`, `invoice_id`, `description`, `quantity`, `amount`, `vat_amount`, `total_with_vat`) VALUES
(1, 1, 'Doliprane', 10, 10, 4, 104),
(2, 1, 'Maoyonnaise', 10, 3000, 2, 30600),
(3, 2, 'Nokia 6', 10, 100, 10, 1100),
(4, 3, 'Nokia 6', 10, 100, 10, 1100),
(5, 4, 'Nokia 6', 10, 100, 10, 1100),
(6, 5, 'Hp  Computer', 6, 700, 4, 4368),
(7, 5, 'usb flash disk', 100, 0.9, 2, 91.8);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `invoice_line`
--
ALTER TABLE `invoice_line`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D3D1D6932989F1FD` (`invoice_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `invoice_line`
--
ALTER TABLE `invoice_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `invoice_line`
--
ALTER TABLE `invoice_line`
  ADD CONSTRAINT `FK_D3D1D6932989F1FD` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
