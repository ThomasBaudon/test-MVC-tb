
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
  `status` enum('libre','réservée') DEFAULT 'libre'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `room`
--

INSERT INTO `room` (`id_room`, `title_room`, `price_room`, `type_chambre`, `size`, `description`, `adults`, `children`, `status`) VALUES
(1, 'Suite de luxe', '2500', 'Suite', 70, 'Très belle suite tout confort de style parisien, 1 lit king size, vue ville', 4, 1, 'libre'),
(2, 'Suite de luxe', '1900', 'Suite', 65, 'Suite de luxe, 1 lit king size ou 2 lits simples, vue sur la ville', 4, 2, 'libre'),
(4, 'Chambre avec 2 lits simples', '380', 'chambre', 19, 'Chambre avec 2 lits simples, vue sur la ville', 2, 1, 'libre'),
(5, 'Chambre avec 1 lit queen size', '380', 'chambre', 19, 'chambre avec 1 lit queen size, vue cour', 2, 1, 'libre'),
(6, 'Chambre, 2 lits simples, vue sur le Sacré Coeur', '470', 'chambre', 19, 'Deux lits simples avec vue sur le Sacré Coeur', 2, 1, 'libre');
