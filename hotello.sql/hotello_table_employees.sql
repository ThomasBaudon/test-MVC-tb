
-- --------------------------------------------------------

--
-- Structure de la table `employees`
--

CREATE TABLE `employees` (
  `id_employees` int(11) NOT NULL,
  `lastname_employees` varchar(60) NOT NULL,
  `firstname_emloyees` varchar(60) NOT NULL,
  `job_employees` varchar(255) NOT NULL,
  `photo_employees` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `employees`
--

INSERT INTO `employees` (`id_employees`, `lastname_employees`, `firstname_emloyees`, `job_employees`, `photo_employees`) VALUES
(1, 'Rousseau', 'Laurent', 'Directeur', ''),
(2, 'Lièvremont', 'Alceste', 'Maître d\'hôtel', ''),
(3, 'Brazier', 'Cécile', 'Employé de ménage', ''),
(4, 'Blanchet', 'Philibert', 'Employé de ménage', '');
