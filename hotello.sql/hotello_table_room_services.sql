
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
