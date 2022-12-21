
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
