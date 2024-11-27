-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 27 nov. 2024 à 11:50
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `vroom_prestige`
--

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

CREATE TABLE `voiture` (
  `IdVoiture` int(11) NOT NULL,
  `Modele` varchar(100) NOT NULL,
  `NbPorte` tinyint(4) DEFAULT NULL,
  `BoiteVitesse` varchar(50) NOT NULL,
  `Annee` int(4) NOT NULL,
  `Couleur` varchar(50) DEFAULT NULL,
  `Photo` varchar(255) DEFAULT NULL,
  `PhotosSupplementaires` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`PhotosSupplementaires`)),
  `Energie` varchar(50) DEFAULT NULL,
  `Puissance` int(11) DEFAULT NULL,
  `PrixLocation` decimal(15,2) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `NbPlaces` int(11) DEFAULT NULL,
  `IdStatut` varchar(50) NOT NULL,
  `IdMarque` int(11) NOT NULL,
  `IdType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`IdVoiture`, `Modele`, `NbPorte`, `BoiteVitesse`, `Annee`, `Couleur`, `Photo`, `PhotosSupplementaires`, `Energie`, `Puissance`, `PrixLocation`, `Description`, `NbPlaces`, `IdStatut`, `IdMarque`, `IdType`) VALUES
(1, 'Model S', 5, 'Automatique', 2023, 'Blanc', 'cars/tesla-model-s.jpg', NULL, 'Électrique', 670, 299.00, 'Tesla Model S Performance - Version longue autonomie', 5, 'STAT001', 1, 2),
(2, 'Model 3', 4, 'Automatique', 2023, 'Rouge', 'cars/tesla-model-3.jpg', NULL, 'Électrique', 450, 199.00, 'Tesla Model 3 Performance', 5, 'STAT001', 1, 2),
(3, 'Model X', 5, 'Automatique', 2023, 'Noir', 'cars/tesla-model-x.jpg', NULL, 'Électrique', 550, 349.00, 'Tesla Model X avec Autopilot', 7, 'STAT001', 1, 1),
(4, 'M4 Competition', 2, 'Automatique', 2023, 'Bleu', 'cars/bmw-m4.jpg', NULL, 'Essence', 510, 299.00, 'BMW M4 Competition - Pure performance', 4, 'STAT001', 2, 3),
(5, 'X5 M', 5, 'Automatique', 2023, 'Noir', 'cars/bmw-x5m.jpg', NULL, 'Essence', 625, 399.00, 'BMW X5 M Competition', 5, 'STAT001', 2, 1),
(6, 'i8', 2, 'Automatique', 2022, 'Blanc', 'cars/bmw-i8.jpg', NULL, 'Hybride', 374, 449.00, 'BMW i8 - Supercar hybride', 2, 'STAT001', 2, 7),
(7, 'RS e-tron GT', 4, 'Automatique', 2023, 'Gris', 'cars/audi-etron-gt.jpg', NULL, 'Électrique', 646, 399.00, 'Audi RS e-tron GT - Performance électrique', 4, 'STAT001', 3, 2),
(8, 'RS6 Avant', 5, 'Automatique', 2023, 'Bleu', 'cars/audi-rs6.jpg', NULL, 'Essence', 600, 379.00, 'Audi RS6 Avant - Break surpuissant', 5, 'STAT001', 3, 5),
(9, 'R8 V10', 2, 'Automatique', 2023, 'Rouge', 'cars/audi-r8.jpg', NULL, 'Essence', 620, 599.00, 'Audi R8 V10 Performance', 2, 'STAT001', 3, 7),
(10, 'AMG GT 63 S', 4, 'Automatique', 2023, 'Noir', 'cars/mercedes-amg-gt.jpg', NULL, 'Essence', 639, 499.00, 'Mercedes-AMG GT 63 S 4MATIC+', 4, 'STAT001', 4, 2),
(11, 'Classe G 63 AMG', 5, 'Automatique', 2023, 'Noir Mat', 'cars/mercedes-g63.jpg', NULL, 'Essence', 585, 549.00, 'Mercedes-AMG G 63 - Icône tout-terrain', 5, 'STAT001', 4, 8),
(12, 'AMG GT Black Series', 2, 'Automatique', 2023, 'Orange', 'cars/mercedes-gt-black.jpg', NULL, 'Essence', 730, 899.00, 'Mercedes-AMG GT Black Series', 2, 'STAT001', 4, 7),
(13, '911 GT3 RS', 2, 'PDK', 2023, 'Vert', 'cars/porsche-gt3rs.jpg', NULL, 'Essence', 525, 699.00, 'Porsche 911 GT3 RS - Performance pure', 2, 'STAT001', 5, 7),
(14, 'Taycan Turbo S', 4, 'Automatique', 2023, 'Blanc', 'cars/porsche-taycan.jpg', NULL, 'Électrique', 761, 599.00, 'Porsche Taycan Turbo S - Performance électrique', 4, 'STAT001', 5, 2),
(15, 'Cayenne Turbo GT', 5, 'Automatique', 2023, 'Noir', 'cars/porsche-cayenne.jpg', NULL, 'Essence', 640, 649.00, 'Porsche Cayenne Turbo GT', 5, 'STAT001', 5, 1),
(16, 'SF90 Stradale', 2, 'Automatique', 2023, 'Rouge', 'cars/ferrari-sf90.jpg', NULL, 'Hybride', 1000, 1299.00, 'Ferrari SF90 Stradale - Hybride surpuissante', 2, 'STAT001', 6, 7),
(17, 'F8 Tributo', 2, 'Automatique', 2023, 'Jaune', 'cars/ferrari-f8.jpg', NULL, 'Essence', 720, 999.00, 'Ferrari F8 Tributo - V8 biturbo', 2, 'STAT001', 6, 7),
(18, '812 Superfast', 2, 'Automatique', 2023, 'Bleu', 'cars/ferrari-812.jpg', NULL, 'Essence', 800, 1099.00, 'Ferrari 812 Superfast - V12 atmosphérique', 2, 'STAT001', 6, 7),
(19, 'Aventador SVJ', 2, 'Automatique', 2023, 'Vert', 'cars/lambo-aventador.jpg', NULL, 'Essence', 770, 1499.00, 'Lamborghini Aventador SVJ', 2, 'STAT001', 7, 7),
(20, 'Huracan STO', 2, 'Automatique', 2023, 'Bleu', 'cars/lambo-huracan.jpg', NULL, 'Essence', 640, 999.00, 'Lamborghini Huracan STO - Version piste', 2, 'STAT001', 7, 7),
(21, 'Urus', 5, 'Automatique', 2023, 'Jaune', 'cars/lambo-urus.jpg', NULL, 'Essence', 650, 799.00, 'Lamborghini Urus - SUV supersportif', 5, 'STAT001', 7, 1),
(22, 'Supra', 2, 'Automatique', 2023, 'Rouge', 'cars/toyota-supra.jpg', NULL, 'Essence', 340, 249.00, 'Toyota GR Supra - Légende sportive', 2, 'STAT001', 8, 3),
(23, 'Land Cruiser', 5, 'Automatique', 2023, 'Noir', 'cars/toyota-landcruiser.jpg', NULL, 'Diesel', 299, 299.00, 'Toyota Land Cruiser - 4x4 légendaire', 7, 'STAT001', 8, 8),
(24, 'GR Yaris', 3, 'Manuelle', 2023, 'Blanc', 'cars/toyota-gryaris.jpg', NULL, 'Essence', 261, 199.00, 'Toyota GR Yaris - Compacte sportive', 4, 'STAT001', 8, 6),
(25, 'Mustang GT', 2, 'Manuelle', 2023, 'Rouge', 'cars/ford-mustang.jpg', NULL, 'Essence', 450, 249.00, 'Ford Mustang GT - Muscle car américaine', 4, 'STAT001', 9, 3),
(26, 'F-150 Raptor', 4, 'Automatique', 2023, 'Bleu', 'cars/ford-raptor.jpg', NULL, 'Essence', 450, 299.00, 'Ford F-150 Raptor - Pick-up haute performance', 5, 'STAT001', 9, 8),
(27, 'GT', 2, 'Automatique', 2023, 'Bleu', 'cars/ford-gt.jpg', NULL, 'Essence', 660, 1299.00, 'Ford GT - Supercar américaine', 2, 'STAT001', 9, 7),
(28, 'Corvette C8', 2, 'Automatique', 2023, 'Rouge', 'cars/chevrolet-corvette.jpg', NULL, 'Essence', 495, 299.00, 'Chevrolet Corvette C8 - Supercar accessible', 2, 'STAT001', 10, 7),
(29, 'Camaro ZL1', 2, 'Manuelle', 2023, 'Noir', 'cars/chevrolet-camaro.jpg', NULL, 'Essence', 650, 279.00, 'Chevrolet Camaro ZL1 - Muscle car extrême', 4, 'STAT001', 10, 3),
(30, 'Tahoe', 5, 'Automatique', 2023, 'Blanc', 'cars/chevrolet-tahoe.jpg', NULL, 'Essence', 420, 299.00, 'Chevrolet Tahoe - SUV full-size', 7, 'STAT001', 10, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`IdVoiture`),
  ADD KEY `IdStatut` (`IdStatut`),
  ADD KEY `IdMarque` (`IdMarque`),
  ADD KEY `IdType` (`IdType`),
  ADD KEY `idx_prix` (`PrixLocation`),
  ADD KEY `idx_annee` (`Annee`),
  ADD KEY `idx_puissance` (`Puissance`),
  ADD KEY `idx_nb_places` (`NbPlaces`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `voiture`
--
ALTER TABLE `voiture`
  MODIFY `IdVoiture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD CONSTRAINT `voiture_ibfk_1` FOREIGN KEY (`IdStatut`) REFERENCES `statut` (`IdStatut`),
  ADD CONSTRAINT `voiture_ibfk_2` FOREIGN KEY (`IdMarque`) REFERENCES `marquevoiture` (`IdMarque`),
  ADD CONSTRAINT `voiture_ibfk_3` FOREIGN KEY (`IdType`) REFERENCES `typevehicule` (`IdType`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
