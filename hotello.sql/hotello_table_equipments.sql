
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
