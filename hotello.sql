-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 16 déc. 2022 à 08:59
-- Version du serveur : 5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hotello`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `carousel`
--

CREATE TABLE `carousel` (
  `id_image` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_cli` int(11) NOT NULL,
  `lastname_cli` varchar(60) NOT NULL,
  `firstname_cli` varchar(60) NOT NULL,
  `mail_cli` varchar(60) NOT NULL,
  `password_cli` varchar(20) NOT NULL,
  `address_cli` varchar(100) NOT NULL,
  `city_cli` varchar(100) NOT NULL,
  `zipcode_cli` varchar(5) NOT NULL,
  `phone_cli` varchar(10) NOT NULL,
  `birthdate_cli` date NOT NULL,
  `status_ci` int(1) NOT NULL,
  `country_ci` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `firstname` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `employees`
--

CREATE TABLE `employees` (
  `id_employees` int(11) NOT NULL,
  `lastname_employees` varchar(60) NOT NULL,
  `firstname_emloyees` varchar(60) NOT NULL,
  `job_employees` varchar(255) NOT NULL,
  `photo_employees` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `employees`
--

INSERT INTO `employees` (`id_employees`, `lastname_employees`, `firstname_emloyees`, `job_employees`, `photo_employees`) VALUES
(1, 'Rousseau', 'Laurent', 'Directeur', ''),
(2, 'Lièvremont', 'Alceste', 'Maître d\'hôtel', ''),
(3, 'Brazier', 'Cécile', 'Employé de ménage', ''),
(4, 'Blanchet', 'Philibert', 'Employé de ménage', '');

-- --------------------------------------------------------

--
-- Structure de la table `equipments`
--

CREATE TABLE `equipments` (
  `id_equip` int(11) NOT NULL,
  `name_equip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `equipments`
--

INSERT INTO `equipments` (`id_equip`, `name_equip`) VALUES
(1, 'Piscine'),
(2, 'Spa multiservice'),
(3, 'Internet haut débit'),
(4, 'Climatisation'),
(5, 'Radio-réveil'),
(6, 'Adaptateurs électriques'),
(7, 'Fer et planche à repasser'),
(8, 'Journaux livrés en chambre, sur demande'),
(10, 'Ordinateurs'),
(11, 'Imprimantes'),
(14, 'Jeux vidéo'),
(15, 'Douches et bains'),
(16, 'Télévision'),
(17, 'Articles de toilette'),
(18, 'Serviettes'),
(19, 'Peignoirs'),
(20, 'Soins personnels'),
(21, 'Stationnement');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id_reservation` int(11) NOT NULL,
  `id_room` int(11) NOT NULL,
  `id_cli` int(11) NOT NULL,
  `date` date NOT NULL,
  `adults` int(2) NOT NULL,
  `children` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `reviews`
--

CREATE TABLE `reviews` (
  `id_reviews` int(11) NOT NULL,
  `id_cli` int(11) NOT NULL,
  `review` text NOT NULL,
  `rating` int(1) NOT NULL,
  `id_room` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `room`
--

CREATE TABLE `room` (
  `id_room` int(11) NOT NULL,
  `title_room` varchar(60) NOT NULL,
  `price_room` varchar(20) NOT NULL,
  `type_chambre` varchar(60) NOT NULL,
  `size` int(2) NOT NULL,
  `description` text NOT NULL,
  `adults` int(2) NOT NULL,
  `children` int(2) NOT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `room`
--

INSERT INTO `room` (`id_room`, `title_room`, `price_room`, `type_chambre`, `size`, `description`, `adults`, `children`, `status`) VALUES
(1, 'Suite de luxe', '2500', 'Suite', 70, 'Très belle suite tout confort de style parisien, 1 lit king size, vue ville', 4, 1, 0),
(2, 'Suite de luxe', '1900', 'Suite', 65, 'Suite de luxe, 1 lit king size ou 2 lits simples, vue sur la ville', 4, 2, 0),
(3, 'Executive suite, vue terrasse', '6500', 'Suite', 95, 'Executive suite, 1 lit king size ou 2 lits simples, avec terrasse, vue cour', 4, 1, 0),
(4, 'Chambre avec 2 lits simples', '380', 'chambre', 19, 'Chambre avec 2 lits simples, vue sur la ville', 2, 1, 0),
(5, 'Chambre avec 1 lit queen size', '380', 'chambre', 19, 'chambre avec 1 lit queen size, vue cour', 2, 1, 0),
(6, 'Chambre, 2 lits simples, vue sur le Sacré Coeur', '470', 'chambre', 19, 'Deux lits simples avec vue sur le Sacré Coeur', 2, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `room_photo`
--

CREATE TABLE `room_photo` (
  `id_photo` int(11) NOT NULL,
  `id_room` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `room_services`
--

CREATE TABLE `room_services` (
  `id_res_services` int(11) NOT NULL,
  `id_room` int(11) NOT NULL,
  `id_services` int(11) NOT NULL,
  `id_cli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id_services` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id_image`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_cli`);

--
-- Index pour la table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id_employees`);

--
-- Index pour la table `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`id_equip`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `id_cli` (`id_cli`),
  ADD KEY `id_room` (`id_room`);

--
-- Index pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id_reviews`),
  ADD KEY `id_cli` (`id_cli`);

--
-- Index pour la table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id_room`);

--
-- Index pour la table `room_photo`
--
ALTER TABLE `room_photo`
  ADD PRIMARY KEY (`id_photo`),
  ADD KEY `id_room` (`id_room`);

--
-- Index pour la table `room_services`
--
ALTER TABLE `room_services`
  ADD PRIMARY KEY (`id_res_services`),
  ADD KEY `id_cli` (`id_cli`),
  ADD KEY `room_services_ibfk_2` (`id_services`),
  ADD KEY `id_room` (`id_room`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id_services`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_cli` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `employees`
--
ALTER TABLE `employees`
  MODIFY `id_employees` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `equipments`
--
ALTER TABLE `equipments`
  MODIFY `id_equip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id_reviews` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `room`
--
ALTER TABLE `room`
  MODIFY `id_room` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `room_photo`
--
ALTER TABLE `room_photo`
  MODIFY `id_photo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `room_services`
--
ALTER TABLE `room_services`
  MODIFY `id_res_services` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id_services` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`id_cli`) REFERENCES `reservation` (`id_cli`) ON UPDATE CASCADE,
  ADD CONSTRAINT `client_ibfk_2` FOREIGN KEY (`id_cli`) REFERENCES `reviews` (`id_cli`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `id_room` FOREIGN KEY (`id_room`) REFERENCES `room` (`id_room`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_cli`) REFERENCES `client` (`id_cli`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`id_cli`) REFERENCES `client` (`id_cli`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `room_photo`
--
ALTER TABLE `room_photo`
  ADD CONSTRAINT `room_photo_ibfk_1` FOREIGN KEY (`id_room`) REFERENCES `room` (`id_room`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `room_services`
--
ALTER TABLE `room_services`
  ADD CONSTRAINT `room_services_ibfk_1` FOREIGN KEY (`id_cli`) REFERENCES `client` (`id_cli`) ON UPDATE CASCADE,
  ADD CONSTRAINT `room_services_ibfk_2` FOREIGN KEY (`id_services`) REFERENCES `services` (`id_services`) ON UPDATE CASCADE,
  ADD CONSTRAINT `room_services_ibfk_3` FOREIGN KEY (`id_room`) REFERENCES `room` (`id_room`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
