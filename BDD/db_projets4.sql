--
-- Structure de la table `personne`
--
CREATE TABLE `personne` (
  `id` int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `dtn` date DEFAULT NULL,
  `sexe` int(1) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
-- --------------------------------------------------------
--
-- Structure de la table `details`
--

CREATE TABLE `details` (
  `id` int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idPersonne` int(5) NOT NULL,
  `taille` decimal DEFAULT NULL,
  `poids` decimal DEFAULT NULL,
  FOREIGN KEY (`idPersonne`) REFERENCES `personne`(`id`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
-- --------------------------------------------------------
--
-- Structure de la table `objectifs`
--

CREATE TABLE `objectifs` (
  `id` int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `objectif` int(2) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
-- --------------------------------------------------------
--
-- Structure de la table `login`
--
CREATE TABLE `login` (
  `id` int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idPersonne` int(5) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mdp` varchar(45) DEFAULT NULL,
  FOREIGN KEY (`idPersonne`) REFERENCES `personne`(`id`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
--
-- Structure de la table `admin`
--
CREATE TABLE `admin` (
  `id` int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `mdp` varchar(45) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
INSERT INTO `admin`
VALUES(DEFAULT, 'admin', 'admin');
--
-- Structure de la table `plat`
--
CREATE TABLE `plat` (
  `id` int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom` decimal DEFAULT NULL,
  `prix` decimal DEFAULT NULL,
  `duree` decimal DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
--
-- Structure de la table `regime`
--
CREATE TABLE `regime` (
  `id` int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom` decimal DEFAULT NULL,
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
--
-- Structure de la table `regimeplat`
--
CREATE TABLE `regime_plat` (
  `id` int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idRegime` int(5) NOT NULL,
  `idPlat` int(5) NOT NULL,
  FOREIGN KEY (`idRegime`) REFERENCES `regime`(`id`),
  FOREIGN KEY (`idPlat`) REFERENCES `sport`(`id`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
--
-- Structure de la table `sport`
--
CREATE TABLE `sport` (
  `id` int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom` decimal DEFAULT NULL,
  `prix` decimal DEFAULT NULL,
  `duree` decimal DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
--
-- Structure de la table `service`
--
CREATE TABLE `service` (
  `id` int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idPersonne` int(5) NOT NULL,
  `idObjectif` int(5) NOT NULL,
  `idRegimePlat` int(5) NOT NULL,
  `idSport` int(5) NOT NULL,
  FOREIGN KEY (`idPersonne`) REFERENCES `personne`(`id`),
  FOREIGN KEY (`idObjectif`) REFERENCES `objectifs`(`id`),
  FOREIGN KEY (`idRegimePlat`) REFERENCES `regime_plat`(`id`),
  FOREIGN KEY (`idSport`) REFERENCES `sport`(`id`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
--
-- Structure de la table `paiement`
--
-- note a moi meme cree la table porteFeuille
CREATE TABLE `paiement` (
  `id` int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idPersonne` int(5) NOT NULL,
  `idService` int(5) NOT NULL,
  FOREIGN KEY (`idPersonne`) REFERENCES `personne`(`id`),
  FOREIGN KEY (`idService`) REFERENCES `service`(`id`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;