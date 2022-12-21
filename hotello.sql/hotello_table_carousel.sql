
-- --------------------------------------------------------

--
-- Structure de la table `carousel`
--

CREATE TABLE `carousel` (
  `id_image` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `carousel`
--

INSERT INTO `carousel` (`id_image`, `image`) VALUES
(6, 'http://localhost:8888/hotello/photo/1671612108courshotel.jpeg'),
(7, 'http://localhost:8888/hotello/photo/1671612113IMG_2212.PNG'),
(8, 'http://localhost:8888/hotello/photo/1671612118IMG_2213.jpg'),
(11, 'http://localhost:8888/hotello/photo/1671612144paeris-2.jpg');
