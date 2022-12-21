
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
