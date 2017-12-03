-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 03 Décembre 2017 à 22:38
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `morpion`
--

-- --------------------------------------------------------

--
-- Structure de la table `action`
--

CREATE TABLE `action` (
  `act_id` int(11) NOT NULL,
  `act_numero` int(11) DEFAULT NULL,
  `act_type` varchar(25) DEFAULT NULL,
  `act_mrp_cible` int(11) DEFAULT NULL,
  `act_coordonneex` int(11) DEFAULT NULL,
  `act_coordonneey` int(11) DEFAULT NULL,
  `mrp_id` int(11) DEFAULT NULL,
  `prt_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `appartient`
--

CREATE TABLE `appartient` (
  `eqp_id` int(11) NOT NULL,
  `mrp_def_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `contient`
--

CREATE TABLE `contient` (
  `eqp_id` int(11) NOT NULL,
  `mrp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `eqp_id` int(11) NOT NULL,
  `eqp_nom` varchar(25) DEFAULT NULL,
  `eqp_couleur` varchar(25) DEFAULT NULL,
  `eqp_datecrea` date DEFAULT NULL,
  `eqp_format` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `equipe`
--

INSERT INTO `equipe` (`eqp_id`, `eqp_nom`, `eqp_couleur`, `eqp_datecrea`, `eqp_format`) VALUES
(4, 'Test', '#000000', '2017-11-27', 4),
(5, '', '#000000', '2017-11-27', 4),
(6, 'Test', '#000000', '2017-11-27', 4);

-- --------------------------------------------------------

--
-- Structure de la table `morpion`
--

CREATE TABLE `morpion` (
  `mrp_def_id` int(11) NOT NULL,
  `mrp__def_nom` varchar(25) DEFAULT NULL,
  `mrp_def_icone` varchar(25) DEFAULT NULL,
  `mrp_def_hp` int(11) DEFAULT NULL,
  `mrp__def_degat` int(11) DEFAULT NULL,
  `mrp_def_mana` int(11) DEFAULT NULL,
  `mrp_def_class` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `morpion`
--

INSERT INTO `morpion` (`mrp_def_id`, `mrp__def_nom`, `mrp_def_icone`, `mrp_def_hp`, `mrp__def_degat`, `mrp_def_mana`, `mrp_def_class`) VALUES
(6, 'David', 'David.jpg', 10, 0, 0, 'Guerrier'),
(7, 'Jean', 'Jean.jpg', 3, 15, 0, 'Archer'),
(8, 'Baptiste', 'Random.jpg', 10, 3, 5, 'Mage'),
(9, 'Pierre', 'Random.jpg', 18, 0, 0, 'Guerrier'),
(10, 'Antoine', 'Random.jpg', 10, 8, 0, 'Guerrier'),
(11, 'Goliath', 'Random.jpg', 5, 13, 0, 'Guerrier'),
(12, 'André', 'Random.jpg', 3, 8, 6, 'Guerrier'),
(13, 'Jésus', 'Jesus.jpg', 10, 0, 8, 'Mage'),
(14, 'Prométhé', 'Random.jpg', 1, 0, 18, 'Mage'),
(15, 'Clément', 'Random.jpg', 9, 9, 0, 'Archer'),
(16, 'Robin', 'Random.jpg', 3, 15, 0, 'Archer'),
(17, 'Irma', 'Irma.jpg', 5, 2, 11, 'Mage'),
(18, 'Jeanne', 'Random.jpg', 5, 13, 0, 'Archer'),
(19, 'Rambo', 'Random.jpg', 9, 9, 0, 'Archer');

-- --------------------------------------------------------

--
-- Structure de la table `morpion_en_jeu`
--

CREATE TABLE `morpion_en_jeu` (
  `mrp_id` int(11) NOT NULL,
  `mrp_nom` varchar(25) DEFAULT NULL,
  `mrp_coordonneesX` int(11) DEFAULT NULL,
  `mrp_coordonneesY` int(11) DEFAULT NULL,
  `mrp_icone` varchar(25) DEFAULT NULL,
  `mrp_hp` int(11) DEFAULT NULL,
  `mrp_degat` int(11) DEFAULT NULL,
  `mrp_mana` int(11) DEFAULT NULL,
  `mrp_classe` varchar(25) DEFAULT NULL,
  `eqp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `parametre`
--

CREATE TABLE `parametre` (
  `prm_id` int(11) NOT NULL,
  `prm_taille` int(11) DEFAULT NULL,
  `prm_ptinit` int(11) DEFAULT NULL,
  `prm_crit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `partie`
--

CREATE TABLE `partie` (
  `prt_id` int(11) NOT NULL,
  `prt_datedeb` date DEFAULT NULL,
  `prt_dimension` int(11) DEFAULT NULL,
  `prm_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`act_id`),
  ADD KEY `FK_Action_mrp_id` (`mrp_id`),
  ADD KEY `FK_Action_prt_id` (`prt_id`);

--
-- Index pour la table `appartient`
--
ALTER TABLE `appartient`
  ADD PRIMARY KEY (`eqp_id`,`mrp_def_id`),
  ADD KEY `FK_appartient_mrp_def_id` (`mrp_def_id`);

--
-- Index pour la table `contient`
--
ALTER TABLE `contient`
  ADD PRIMARY KEY (`eqp_id`,`mrp_id`),
  ADD KEY `FK_contient_mrp_id` (`mrp_id`);

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`eqp_id`);

--
-- Index pour la table `morpion`
--
ALTER TABLE `morpion`
  ADD PRIMARY KEY (`mrp_def_id`);

--
-- Index pour la table `morpion_en_jeu`
--
ALTER TABLE `morpion_en_jeu`
  ADD PRIMARY KEY (`mrp_id`);

--
-- Index pour la table `parametre`
--
ALTER TABLE `parametre`
  ADD PRIMARY KEY (`prm_id`);

--
-- Index pour la table `partie`
--
ALTER TABLE `partie`
  ADD PRIMARY KEY (`prt_id`),
  ADD KEY `FK_Partie_prm_id` (`prm_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `action`
--
ALTER TABLE `action`
  MODIFY `act_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `appartient`
--
ALTER TABLE `appartient`
  MODIFY `eqp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `contient`
--
ALTER TABLE `contient`
  MODIFY `eqp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `eqp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `morpion`
--
ALTER TABLE `morpion`
  MODIFY `mrp_def_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `morpion_en_jeu`
--
ALTER TABLE `morpion_en_jeu`
  MODIFY `mrp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `parametre`
--
ALTER TABLE `parametre`
  MODIFY `prm_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `partie`
--
ALTER TABLE `partie`
  MODIFY `prt_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `action`
--
ALTER TABLE `action`
  ADD CONSTRAINT `FK_Action_mrp_id` FOREIGN KEY (`mrp_id`) REFERENCES `morpion_en_jeu` (`mrp_id`),
  ADD CONSTRAINT `FK_Action_prt_id` FOREIGN KEY (`prt_id`) REFERENCES `partie` (`prt_id`);

--
-- Contraintes pour la table `appartient`
--
ALTER TABLE `appartient`
  ADD CONSTRAINT `FK_appartient_eqp_id` FOREIGN KEY (`eqp_id`) REFERENCES `equipe` (`eqp_id`),
  ADD CONSTRAINT `FK_appartient_mrp_def_id` FOREIGN KEY (`mrp_def_id`) REFERENCES `morpion` (`mrp_def_id`);

--
-- Contraintes pour la table `contient`
--
ALTER TABLE `contient`
  ADD CONSTRAINT `FK_contient_eqp_id` FOREIGN KEY (`eqp_id`) REFERENCES `equipe` (`eqp_id`),
  ADD CONSTRAINT `FK_contient_mrp_id` FOREIGN KEY (`mrp_id`) REFERENCES `morpion_en_jeu` (`mrp_id`);

--
-- Contraintes pour la table `partie`
--
ALTER TABLE `partie`
  ADD CONSTRAINT `FK_Partie_prm_id` FOREIGN KEY (`prm_id`) REFERENCES `parametre` (`prm_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
