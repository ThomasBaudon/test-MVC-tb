
-- --------------------------------------------------------

--
-- Structure de la table `reviews`
--

CREATE TABLE `reviews` (
  `id_reviews` int(11) NOT NULL,
  `id_cli` int(11) NOT NULL,
  `review` text NOT NULL,
  `rating` int(1) NOT NULL,
  `id_room` int(11) NOT NULL,
  `moderation` enum('validé','refusé') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reviews`
--

INSERT INTO `reviews` (`id_reviews`, `id_cli`, `review`, `rating`, `id_room`, `moderation`) VALUES
(1, 1, 'c\'est nul !!!', 1, 1, 'validé'),
(4, 1, 'test', 3, 1, 'validé');
