
-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id_services` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `price` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id_services`, `icon`, `name`, `description`, `price`) VALUES
(20, 'http://localhost:8888/hotello/photo/1671534676room-service.png', 'Room service', 'Trop bien le service', 10),
(21, 'http://localhost:8888/hotello/photo/1671535303cafe.png', 'Café', 'Miam le café', 3),
(22, 'http://localhost:8888/hotello/photo/1671535324relax.png', 'Massage', 'Massage massant :D', 30),
(23, 'http://localhost:8888/hotello/photo/1671535354service-de-voiturier.png', 'Voiturier', 'Trop bien garée la voiture', 15),
(24, 'http://localhost:8888/hotello/photo/1671535470chef.png', 'Restaurant', 'Le meilleur restaurant du monde', 80),
(25, 'http://localhost:8888/hotello/photo/1671535493signal-wifi.png', 'Wi-fi', 'Wi-fi dans toutes les chambres !', 2),
(26, 'http://localhost:8888/hotello/photo/1671540932hotel-cart.png', 'Bagagistes', 'Vos bagages perdus à jamais', 15),
(27, 'http://localhost:8888/hotello/photo/1671535577piscine.png', 'Piscine & Spa', 'La piscine à 15°C et le Spa à 350°C pour un divertissement hors norme', 350);
