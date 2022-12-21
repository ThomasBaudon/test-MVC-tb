
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
  `date` datetime NOT NULL,
  `read_status` enum('non-lu','lu') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id_contact`, `lastname`, `firstname`, `email`, `message`, `date`, `read_status`) VALUES
(1, 'Baudon', 'Thomas', 'thomas@thomasbaudon.fr', 'Vous savez, moi je ne crois pas qu\'il y ait de bonne ou de mauvaise situation. Moi, si je devais résumer ma vie aujourd\'hui avec vous, je dirais que c\'est d\'abord des rencontres. Des gens qui m\'ont tendu la main, peut-être à un moment où je ne pouvais pas, où j\'étais seul chez moi. Et c\'est assez curieux de se dire que les hasards, les rencontres, forgent une destinée... Parce que quand on a le goût de la chose, quand on a le goût de la chose bien faite, le beau geste, parfois on ne trouve pas l\'interlocuteur en face je dirais, le miroir qui vous aide à avancer. Alors ça n\'est pas mon cas, comme je disais là, puisque moi au contraire, j\'ai pu : et je dis merci à la vie, je lui dis merci, je chante la vie, je danse la vie... je ne suis qu\'amour ! Et finalement, quand beaucoup de gens aujourd\'hui me disent « Mais comment fais-tu pour avoir cette humanité ? », et bien je leur réponds très simplement, je leur dis que c\'est ce goût de l\'amour ce goût donc qui m\'a poussé aujourd\'hui à entreprendre une construction mécanique, mais demain qui sait ? Peut-être simplement à me mettre au service de la communauté, à faire le don, le don de soi...', '2022-12-20 14:37:40', 'non-lu'),
(2, 'Dubus', 'Romain', 'romain@dubus.com', 'J’ai dégusté son foie avec des fèves au beurre et un excellent Chianti', '2022-12-20 14:38:40', 'non-lu'),
(3, 'Derocquencourt', 'Cathy', 'cathy@cathy.com', 'Tu vois, le monde se divise en deux catégories: ceux qui ont un pistolet chargé et ceux qui creusent. Toi tu creuses.', '2022-12-20 14:39:01', 'non-lu'),
(4, 'Padieu', 'Bejamin', 'benji@padieu.com', '-_-', '2022-12-20 14:39:43', 'non-lu');
