
--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id_image`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_cli`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Index pour la table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id_employees`);

--
-- Index pour la table `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`id_equip`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `id_cli` (`id_cli`),
  ADD KEY `id_room` (`id_room`);

--
-- Index pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id_reviews`),
  ADD KEY `id_cli` (`id_cli`),
  ADD KEY `id_chambre` (`id_room`);

--
-- Index pour la table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id_room`);

--
-- Index pour la table `room_photo`
--
ALTER TABLE `room_photo`
  ADD PRIMARY KEY (`id_photo`),
  ADD KEY `id_room` (`id_room`);

--
-- Index pour la table `room_services`
--
ALTER TABLE `room_services`
  ADD PRIMARY KEY (`id_res_services`),
  ADD KEY `id_cli` (`id_cli`),
  ADD KEY `room_services_ibfk_2` (`id_services`),
  ADD KEY `id_room` (`id_room`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id_services`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_cli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `employees`
--
ALTER TABLE `employees`
  MODIFY `id_employees` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `equipments`
--
ALTER TABLE `equipments`
  MODIFY `id_equip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id_reviews` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `room`
--
ALTER TABLE `room`
  MODIFY `id_room` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `room_photo`
--
ALTER TABLE `room_photo`
  MODIFY `id_photo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `room_services`
--
ALTER TABLE `room_services`
  MODIFY `id_res_services` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id_services` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `id_room` FOREIGN KEY (`id_room`) REFERENCES `room` (`id_room`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_cli`) REFERENCES `client` (`id_cli`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `id_chambre` FOREIGN KEY (`id_room`) REFERENCES `room` (`id_room`) ON UPDATE CASCADE,
  ADD CONSTRAINT `id_client` FOREIGN KEY (`id_cli`) REFERENCES `client` (`id_cli`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `room_photo`
--
ALTER TABLE `room_photo`
  ADD CONSTRAINT `room_photo_ibfk_1` FOREIGN KEY (`id_room`) REFERENCES `room` (`id_room`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `room_services`
--
ALTER TABLE `room_services`
  ADD CONSTRAINT `room_services_ibfk_1` FOREIGN KEY (`id_cli`) REFERENCES `client` (`id_cli`) ON UPDATE CASCADE,
  ADD CONSTRAINT `room_services_ibfk_2` FOREIGN KEY (`id_services`) REFERENCES `services` (`id_services`) ON UPDATE CASCADE,
  ADD CONSTRAINT `room_services_ibfk_3` FOREIGN KEY (`id_room`) REFERENCES `room` (`id_room`);
