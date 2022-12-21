
-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_cli` int(11) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `firstname` varchar(60) NOT NULL,
  `mail` varchar(60) NOT NULL,
  `password` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zipcode` varchar(5) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `birthdate` date NOT NULL,
  `status` int(1) NOT NULL,
  `country` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_cli`, `lastname`, `firstname`, `mail`, `password`, `address`, `city`, `zipcode`, `phone`, `birthdate`, `status`, `country`) VALUES
(1, 'Baudon', 'Thomas', 'tbaudon@yahoo.fr', 'admin', 'ici', 'là', '60190', '0612345566', '1983-05-30', 1, 'France');
