-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 30 avr. 2021 à 18:53
-- Version du serveur :  10.4.16-MariaDB
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tecktronik`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `NumCat` varchar(255) NOT NULL,
  `LibCat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`NumCat`, `LibCat`) VALUES
('AMP0', 'Ampli home Cinéma'),
('CH0', 'Chaine Hifi - Mini'),
('CH1', 'Chaine Hifi - Composée'),
('DVD0', 'Lecteur DVD'),
('TV0', 'Téléviseurs LCD'),
('TV1', 'Téléviseurs Plasma');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `num_client` varchar(255) NOT NULL,
  `id_composer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `composer`
--

CREATE TABLE `composer` (
  `id` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `produit` varchar(255) NOT NULL,
  `qtecommandee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `NumProd` varchar(255) NOT NULL,
  `NomProd` varchar(255) NOT NULL,
  `PrixProd` varchar(255) NOT NULL,
  `QteProd` int(11) NOT NULL,
  `SeuilReappro` int(11) NOT NULL,
  `Caracteristiques` varchar(255) NOT NULL,
  `Couleur` varchar(255) NOT NULL,
  `Largeur` decimal(5,1) NOT NULL,
  `Longueur` decimal(5,1) NOT NULL,
  `Profondeur` decimal(5,1) NOT NULL,
  `Poids` decimal(5,1) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`NumProd`, `NomProd`, `PrixProd`, `QteProd`, `SeuilReappro`, `Caracteristiques`, `Couleur`, `Largeur`, `Longueur`, `Profondeur`, `Poids`, `categorie`, `image`) VALUES
('AMP001', 'SONY STR DH520', '169.00', 14, 5, '7x100 Watts', 'Noir', '21.0', '31.2', '22.5', '7.4', 'AMP0', 'SONYSTRDH520.jpg'),
('CH001', 'SONY MHC-Ex 700', '149.00', 14, 10, '2x200 Watts + MP3', 'Noir', '21.0', '31.2', '37.5', '5.4', 'CH0', 'SONYMHC-Ex700.jpg'),
('CH002', 'PHILIPS FWM210', '129.00', 12, 10, '2x70 Watts + MP3', 'Noir', '22.0', '31.3', '25.8', '4.4', 'CH0', 'PHILIPSFWM210.jpg'),
('DVD001', 'BRANDT BDVD 1290', '19.00', 55, 10, 'DVD + DVD-RW', 'Noir', '22.5', '4.5', '22.0', '0.8', 'DVD0', 'BRANDTBDVD1290.jpg'),
('DVD002', 'PHILIPS DVP3850', '29.00', 38, 10, 'DVD + DVD-RW + MP3 + DivX', 'Noir', '36.0', '4.2', '20.9', '1.3', 'DVD0', 'PHILIPSDVP3850.png'),
('TV001', 'BRANDT B1913HD', '145.00', 15, 5, 'Ecran 48 cm, 1366x768 pixels + TNT HD', 'Noir', '34.8', '46.0', '15.5', '4.9', 'TV0', 'BRANDTB1913HD.jpg'),
('TV002', 'Grundig Vision 3', '210.00', 8, 5, 'Ecran 66 cm, 1366x768 pixels + TNT HD', 'Gris', '49.0', '66.5', '17.8', '9.5', 'TV0', 'GRUNDIGVISION3.jpg'),
('TV003', 'Philips 32PFL3017H', '275.00', 7, 4, 'Ecran 81cm, 1920x1080 pixels + TNT HD', 'Noir', '52.6', '77.7', '22.2', '10.3', 'TV0', 'PHILIPS32PFL3017H.jpg'),
('TV004', 'WINDSOR WD4212T', '339.00', 11, 5, 'Ecran 106 cm, 1920x1080 pixels + TNT HD', 'Noir', '68.5', '101.5', '22.0', '19.0', 'TV0', 'WINDSORWD4212T.jpg'),
('TV101', 'SAMSUNG PS43E450', '369.00', 0, 5, 'Ecran 109cm, 1024x768 pixels + TNT HD', 'Noir', '67.5', '101.2', '26.2', '15.4', 'TV1', 'SAMSUNGPS43E450.jpg'),
('TV102', 'LG 42PA4500', '369.00', 4, 5, 'Ecran 107 cm, 1366x768 pixels + TNT HD', 'Gris', '65.5', '98.3', '24.7', '20.4', 'TV1', 'LG42PA4500.jpg'),
('TV103', 'SAMSUNG PS51E490/3D', '569.00', 2, 2, 'Ecran 129 cm, 1024x768 pixels + TNT HD', 'Noir', '76.0', '118.8', '26.2', '20.8', 'TV1', 'SAMSUNGPS51E4903D.jpg'),
('TV104', 'SAMSUNG PS59D530', '749.00', 5, 2, 'Ecran 150 cm, 1920x1080 pixels + TNT HD', 'Noir', '89.5', '137.2', '33.0', '35.8', 'TV1', 'SAMSUNGPS59D530.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`pseudo`, `email`, `password`) VALUES
('Contact', 'contact@demo.fr', '$2y$10$BwiDTHg2spDeI9wbiqYiBu9NUpp.dsVJfDRNUhyzfIu2op496aJHS'),
('JDoe', 'doe@gmail.com', '$2y$10$wjcrU7Q3bwd0mumiGcpk9.iDACRSaYmFL2yd3OfzT.f/60skh3VMy'),
('lepix', 'lepix@orange.fr', '$2y$10$f1FUhwe5hYdsJVMiDLIHv.7.79ecRoUJvN9ZcOFsGFyNGu2NUUeki'),
('sssd', 'sssqqwws@gmail.com', '$2y$10$yThIXtiFYGShKB10QvrM2.f1pmSSjQQEro8uWgUKLVYv/Yb4TMfdu'),
('zaza', 'zaza@gmail.com', '$2y$10$GpAPvFgAwX3AsHdhA4zyrusukFait717zbYp7Pxox5XvYOh.GruIS');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`NumCat`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_cde_composer` (`id_composer`);

--
-- Index pour la table `composer`
--
ALTER TABLE `composer`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`NumProd`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `composer`
--
ALTER TABLE `composer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_cde_composer` FOREIGN KEY (`id_composer`) REFERENCES `composer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
