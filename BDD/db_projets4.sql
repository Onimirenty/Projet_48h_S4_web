CREATE TABLE IF NOT EXISTS `ci_sessions` (
        `id` varchar(40) NOT NULL,
        `ip_address` varchar(45) NOT NULL,
        `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
        `data` blob NOT NULL,
        KEY `ci_sessions_timestamp` (`timestamp`)
);
ALTER TABLE ci_sessions ADD PRIMARY KEY (id);

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
  FOREIGN KEY (`idPersonne`) REFERENCES `personne`(`id`)  ON DELETE CASCADE
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
  `nom` varchar(100) DEFAULT NULL,
  `prix` decimal DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
--
-- Structure de la table `regime`
--
CREATE TABLE `regime` (
  `id` int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
--
-- Structure de la table `regimeplat`
--
CREATE TABLE `regime_plat` (
  `id` int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idRegime` int(5) NOT NULL,
  `idPlat` int(5) NOT NULL,
  FOREIGN KEY (`idRegime`) REFERENCES `regime`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`idPlat`) REFERENCES `plat`(`id`) ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
--
-- Structure de la table `sport`
--
CREATE TABLE `sport` (
  `id` int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `prix` decimal DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

CREATE TABLE `service` (
  `id` int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idPersonne` int(5) NOT NULL,
  `idRegimePlat` int(5) NOT NULL,
  `idSport` int(5) NOT NULL,
  `duree` int(10) NOT NULL,
  FOREIGN KEY (`idPersonne`) REFERENCES `personne`(`id`)  ON DELETE CASCADE,
  FOREIGN KEY (`idRegimePlat`) REFERENCES `regime_plat`(`id`)  ON DELETE CASCADE,
  FOREIGN KEY (`idSport`) REFERENCES `sport`(`id`)  ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = latin1;


----on a 10 tables

CREATE TABLE wallet
(
  id INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  idPersonne INT(5) NOT NULL,
  solde DECIMAL(10, 2) NOT NULL DEFAULT 0,
  FOREIGN KEY (idPersonne) REFERENCES personne(id) ON DELETE CASCADE
);


CREATE TABLE wallet_historique (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  idPersonne INT NOT NULL,
  idWallet INT NOT NULL,
  ancienSolde DECIMAL(10, 2) NOT NULL,
  nouveauSolde DECIMAL(10, 2) NOT NULL,
  dateModification TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  
  FOREIGN KEY (idPersonne) REFERENCES personne(id)  ON DELETE CASCADE,
  FOREIGN KEY (idWallet) REFERENCES wallet(id)  ON DELETE CASCADE
);

CREATE TABLE recharge (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  code INT(15) NOT NULL,
  montant DECIMAL(10, 2) NOT NULL,
  fin_date_validation DATETIME DEFAULT CURRENT_TIMESTAMP,
  is_valid INT(1) DEFAULT 1,
  CHECK (montant > 0)
);

----on a 13 tables
CREATE TABLE nombre_essaie_recharge (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  idPersonne INT NOT NULL,
  idRecharge INT NOT NULL,
  nombre_essaie INT NOT NULL,
  FOREIGN KEY (idPersonne) REFERENCES personne(id)  ON DELETE CASCADE,
  FOREIGN KEY (idRecharge) REFERENCES recharge(id)  ON DELETE CASCADE

);