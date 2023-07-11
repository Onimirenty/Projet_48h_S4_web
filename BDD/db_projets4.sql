
CREATE TABLE `personne` (
  `id` int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `dtn` date DEFAULT NULL,
  `sexe` int(1) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;


CREATE TABLE `objectifs` (
  `id` int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `objectif` int(2) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;


CREATE TABLE `details` (
  `id` int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idPersonne` int(5) NOT NULL,
  `idObjectif` int(5) NOT NULL,
  `taille` decimal DEFAULT NULL,
  `poids` decimal DEFAULT NULL,
  FOREIGN KEY (`idPersonne`) REFERENCES `personne`(`id`),
  FOREIGN KEY (`idObjectif`) REFERENCES `objectifs`(`id`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

CREATE TABLE `login` (
  `id` int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idPersonne` int(5) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mdp` varchar(45) DEFAULT NULL,
  FOREIGN KEY (`idPersonne`) REFERENCES `personne`(`id`)  ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

CREATE TABLE `admin` (
  `id` int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `mdp` varchar(45) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
INSERT INTO `admin` VALUES(DEFAULT, 'admin', 'admin');

CREATE TABLE `plat` (
  `id` int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `prix` decimal DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

CREATE TABLE `regime` (
  `id` int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `viande` decimal DEFAULT NULL,
  `poisson` decimal DEFAULT NULL,
  `volaille` decimal DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

CREATE TABLE `regime_plat` (
  `id` int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idRegime` int(5) NOT NULL,
  `idPlat` int(5) NOT NULL,
  FOREIGN KEY (`idRegime`) REFERENCES `regime`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`idPlat`) REFERENCES `plat`(`id`) ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

CREATE TABLE `suggestion_regime` (
  `id` int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idObjectif` int(5) NOT NULL,
  `idRegime` int(5) NOT NULL,
  FOREIGN KEY (`idObjectif`) REFERENCES `objectifs`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`idRegime`) REFERENCES `regime`(`id`) ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

CREATE TABLE `sport` (
  `id` int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `prix` decimal DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

CREATE TABLE `suggestion_sport` (
  `id` int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idObjectif` int(5) NOT NULL,
  `idSport` int(5) NOT NULL,
  FOREIGN KEY (`idObjectif`) REFERENCES `objectifs`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`idSport`) REFERENCES `sport`(`id`) ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

CREATE TABLE `services` (
  `id` int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idPersonne` int(5) NOT NULL,
  `idRegimePlat` int(5) NOT NULL,
  `idSport` int(5) NOT NULL,
  `duree` int(10) NOT NULL,
  FOREIGN KEY (`idPersonne`) REFERENCES `personne`(`id`)  ON DELETE CASCADE,
  FOREIGN KEY (`idRegimePlat`) REFERENCES `regime_plat`(`id`)  ON DELETE CASCADE,
  FOREIGN KEY (`idSport`) REFERENCES `sport`(`id`)  ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

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
  is_valid INT(1) DEFAULT 1
);

CREATE TABLE nombre_essaie_recharge (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  idPersonne INT NOT NULL,
  idRecharge INT NOT NULL,
  nombre_essaie INT NOT NULL,
  FOREIGN KEY (idPersonne) REFERENCES personne(id)  ON DELETE CASCADE,
  FOREIGN KEY (idRecharge) REFERENCES recharge(id)  ON DELETE CASCADE

);

CREATE TABLE IF NOT EXISTS historique_transaction (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  idWallet INT NOT NULL,
  idService INT NOT NULL,
  dateModification TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (idWallet) REFERENCES wallet(id),
  FOREIGN KEY (idService) REFERENCES services(id)
) ;

CREATE TABLE IF NOT EXISTS banque (
  id INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(100) DEFAULT NULL,
  solde decimal(10,2) DEFAULT 0 not NULL
);

  CREATE TABLE IF NOT EXISTS historique_banque (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    idBanque INT NOT NULL,
    nouveauSolde DECIMAL(10, 2) NOT NULL,
    ancienSolde DECIMAL(10, 2) NOT NULL,
    dateModification TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (idBanque) REFERENCES banque(id)
  );

  CREATE VIEW v_wallet AS
SELECT w.id,
    w.idPersonne,
    w.solde,
    p.nom,
    p.prenom
FROM wallet w
    INNER JOIN personne p ON w.idPersonne = p.id;
--
CREATE VIEW v_wallet_login AS
SELECT w.id AS wallet_id,
    w.idPersonne,
    w.solde,
    p.id AS personne_id,
    p.nom,
    p.prenom,
    l.email
FROM wallet AS w
    JOIN personne AS p ON w.idPersonne = p.id
    JOIN login AS l ON p.id = l.idPersonne;
--
CREATE VIEW v_regime_plat AS
SELECT DISTINCT plat.id AS id_plat,
    plat.nom AS nom_plat,
    plat.prix AS prix_plat,
    regime_plat.id AS regime_plat_id,
    regime.id AS id_regime,
    regime.nom AS nom_regime
FROM plat
JOIN regime_plat ON plat.id = regime_plat.idPlat
JOIN regime ON regime_plat.idRegime = regime.id;


insert INTO personne VALUES (DEFAULT,'Ratsimbazafy','Miantsa','2000-10-01',0),
                            (DEFAULT,'Rasolomanana','Navalona','2003-09-02',1),
                            (DEFAULT,'Ratsimbazafy','Mirenty','2003-02-28',0),
                            (DEFAULT,'Andriamalala','Tsanta','2002-01-02',0),
                            (DEFAULT,'Raharinirina','Mihaja','2003-09-16',1);

insert INTO admin values  (DEFAULT,'mirentybg3@gmail.com',0000),
                          (DEFAULT,'navalona@gmail.com',1234),
                          (DEFAULT,'tsanta@gmail.com',4321);

insert INTO login values  (DEFAULT,1,'miantsa@gmail.com',0000),
                          (DEFAULT,2,'celine@gmail.com',0000),
                          (DEFAULT,3,'yvanio3@gmail.com',0000),
                          (DEFAULT,4,'fitia4@gmail.com',0000),
                          (DEFAULT,5,'mihaja5@gmail.com',0000);


INSERT INTO objectifs VALUES (DEFAULT,0),
                            (DEFAULT,1),
                            (DEFAULT,2);

insert  INTO details values   (DEFAULT,1,1,193,66),
                              (DEFAULT,2,1,150,45),
                              (DEFAULT,3,2,168,48),
                              (DEFAULT,4,3,176,64),
                              (DEFAULT,5,2,161,58);


INSERT INTO regime (nom, viande, poisson, volaille) VALUES ('Regime amincissant', 30.0, 20.0, 20.0);
INSERT INTO regime (nom, viande, poisson, volaille) VALUES ('Regime de renforcement musculaire', 40.0, 25.0, 25.0);
INSERT INTO regime (nom, viande, poisson, volaille) VALUES ('Regime pour la prise de masse', 35.0, 25.0, 25.0);
INSERT INTO regime (nom, viande, poisson, volaille) VALUES ('Regime mediterraneen', 10.0, 15.0, 5.0);
INSERT INTO regime (nom, viande, poisson, volaille) VALUES ('Regime vegetarien', 0.0, 0.0, 0.0);


-- Insertions de plats pour un regime minceur
INSERT INTO plat (nom, prix) VALUES ('Salade de poulet saute', 10000);
INSERT INTO plat (nom, prix) VALUES ('Poisson a la vapeur', 8000);
INSERT INTO plat (nom, prix) VALUES ('legumes sautes', 7000);

-- Insertions de plats pour un regime grossissant
INSERT INTO plat (nom, prix) VALUES ('Omelette aux legumes et fromage', 600);
INSERT INTO plat (nom, prix) VALUES ('Pates a la sauce fromage', 10000);
INSERT INTO plat (nom, prix) VALUES ('Hamburger', 8000);

-- Exemple d'insertion de plats pour un regime pour le foie
INSERT INTO plat (nom, prix) VALUES ('Salade de legumes verts avec vinaigrette legere', 1200);
INSERT INTO plat (nom, prix) VALUES ('Saumon grille avec legumes vapeur', 6500);
INSERT INTO plat (nom, prix) VALUES ('Poulet bouilli avec puree de carottes', 4000);

-- Exemple d'insertion de plats pour un regime pour la prise de masse musculaire
INSERT INTO plat (nom, prix) VALUES ('Steak de boeuf avec patates douces', 13000);
INSERT INTO plat (nom, prix) VALUES ('Poulet grille avec riz complet', 10000);
INSERT INTO plat (nom, prix) VALUES ('Omelette aux legumes et fromage avec pain complet', 8000);

-- Exemple d'insertion de plats pour le regime de purification du sang
INSERT INTO plat (nom, prix) VALUES ('Salade de betteraves et de legumes verts', 4000);
INSERT INTO plat (nom, prix) VALUES ('Smoothie vert aux epinards', 3000);
INSERT INTO plat (nom, prix) VALUES ('persil et concombre', 1000);

-- Exemple d'insertion de plats pour le regime de purification des visceres
INSERT INTO plat (nom, prix) VALUES ('Soupe detox aux legumes et lentilles', 5000);
INSERT INTO plat (nom, prix) VALUES ('Salade de chou ', 1000);
INSERT INTO plat (nom, prix) VALUES ('carottes rapees', 1000);


-- Categorisation des plats pour un regime minceur
INSERT INTO regime_plat (idRegime, idPlat) VALUES (1, 1);  -- 1 correspond à l'ID du regime minceur
INSERT INTO regime_plat (idRegime, idPlat) VALUES (1, 2);
INSERT INTO regime_plat (idRegime, idPlat) VALUES (1, 3);


-- Categorisation des plats pour un regime grossissant
INSERT INTO regime_plat (idRegime, idPlat) VALUES (2, 4);  -- 2 correspond à l'ID du regime grossissant
INSERT INTO regime_plat (idRegime, idPlat) VALUES (2, 5);
INSERT INTO regime_plat (idRegime, idPlat) VALUES (2, 6);

-- Categorisation des plats pour un regime pour le foie

INSERT INTO regime_plat (idRegime, idPlat) VALUES (3,7);
INSERT INTO regime_plat (idRegime, idPlat) VALUES (3,8);
INSERT INTO regime_plat (idRegime, idPlat) VALUES (3,9);

-- Categorisation des plats pour un regime pour avoir plus de muscle

INSERT INTO regime_plat (idRegime, idPlat) VALUES (4,10);
INSERT INTO regime_plat (idRegime, idPlat) VALUES (4,11);
INSERT INTO regime_plat (idRegime, idPlat) VALUES (4,12);

-- Categorisation des plats pour un regime pour purifier le sang

INSERT INTO regime_plat (idRegime, idPlat) VALUES (5,13);
INSERT INTO regime_plat (idRegime, idPlat) VALUES (5,14);
INSERT INTO regime_plat (idRegime, idPlat) VALUES (5,15);



INSERT INTO sport (nom, prix) VALUES ('Entrainement en force', 20000);
INSERT INTO sport (nom, prix) VALUES ('Yoga', 8000);
INSERT INTO sport (nom, prix) VALUES ('Natation', 40000);
INSERT INTO sport (nom, prix) VALUES ('Cyclisme', 60000);
INSERT INTO sport (nom, prix) VALUES ('Entrainement cardio', 10000);

INSERT INTO suggestion_regime (idObjectif, idRegime) VALUES (1, 2);
INSERT INTO suggestion_regime (idObjectif, idRegime) VALUES (1, 3);
INSERT INTO suggestion_regime (idObjectif, idRegime) VALUES (3, 1);
INSERT INTO suggestion_regime (idObjectif, idRegime) VALUES (2, 4);
INSERT INTO suggestion_regime (idObjectif, idRegime) VALUES (2, 5);


INSERT INTO suggestion_sport (idObjectif, idSport) VALUES (1, 3);
INSERT INTO suggestion_sport (idObjectif, idSport) VALUES (1, 2);
INSERT INTO suggestion_sport (idObjectif, idSport) VALUES (2, 1);
INSERT INTO suggestion_sport (idObjectif, idSport) VALUES (3, 4);
INSERT INTO suggestion_sport (idObjectif, idSport) VALUES (2, 5);

-- services pour miantsa qui veut grossir
INSERT INTO services (idPersonne, idRegimePlat, idSport, duree) VALUES (1, 6, 1, 21);
INSERT INTO services (idPersonne, idRegimePlat, idSport, duree) VALUES (1, 7, 1, 21);
INSERT INTO services (idPersonne, idRegimePlat, idSport, duree) VALUES (1, 8, 1, 21);

-- services pour miantsa2 qui veut etre muscler
INSERT INTO services (idPersonne, idRegimePlat, idSport, duree) VALUES (2, 10, 2, 30);
INSERT INTO services (idPersonne, idRegimePlat, idSport, duree) VALUES (2, 11, 3, 30);

INSERT INTO wallet (idPersonne, solde) VALUES (1, 10000.00);
INSERT INTO wallet (idPersonne, solde) VALUES (2, 500000.00);
INSERT INTO wallet (idPersonne, solde) VALUES (3, 200000.00);
INSERT INTO wallet (idPersonne, solde) VALUES (4, 0.00);

INSERT INTO wallet_historique (idPersonne, idWallet, ancienSolde, nouveauSolde, dateModification) VALUES (1, 1, 100.00, 80.00, '2023-07-02 09:00:00');
INSERT INTO wallet_historique (idPersonne, idWallet, ancienSolde, nouveauSolde, dateModification) VALUES (2, 2, 50.00, 60.00, '2023-07-02 10:00:00');
INSERT INTO wallet_historique (idPersonne, idWallet, ancienSolde, nouveauSolde, dateModification) VALUES (3, 3, 200.00, 150.00, '2023-07-02 11:00:00');
INSERT INTO wallet_historique (idPersonne, idWallet, ancienSolde, nouveauSolde, dateModification) VALUES (4, 4, 0.00, 10.00, '2023-07-02 12:00:00');

INSERT INTO recharge (code, montant, fin_Date_Validation, is_valid) VALUES (123456, 50.00, '2023-07-05 23:59:59', 0);
INSERT INTO recharge (code, montant, fin_Date_Validation, is_valid) VALUES (789012, 100.00, '2023-07-10 23:59:59', 0);
INSERT INTO recharge (code, montant, fin_Date_Validation, is_valid) VALUES (345678, 200.00, '2023-07-15 23:59:59', 1);
INSERT INTO recharge (code, montant, fin_Date_Validation, is_valid) VALUES (901234, 200.00, '2023-07-20 23:59:59', 1);
INSERT INTO recharge (code, montant, fin_Date_Validation, is_valid) VALUES (111111, 50.00, '2023-07-05 23:59:59', 0);
INSERT INTO recharge (code, montant, fin_Date_Validation, is_valid) VALUES (222222, 100.00, '2023-07-10 23:59:59', 0);
INSERT INTO recharge (code, montant, fin_Date_Validation, is_valid) VALUES (333333, 200.00, '2023-07-15 23:59:59', 1);
INSERT INTO recharge (code, montant, fin_Date_Validation, is_valid) VALUES (444444, 200.00, '2023-07-20 23:59:59', 1);
INSERT INTO recharge (code, montant, fin_Date_Validation, is_valid) VALUES (555555, 50.00, '2023-07-05 23:59:59', 0);
INSERT INTO recharge (code, montant, fin_Date_Validation, is_valid) VALUES (666666, 100.00, '2023-07-10 23:59:59', 0);
INSERT INTO recharge (code, montant, fin_Date_Validation, is_valid) VALUES (777777, 200.00, '2023-07-15 23:59:59', 1);
INSERT INTO recharge (code, montant, fin_Date_Validation, is_valid) VALUES (888888, 200.00, '2023-07-20 23:59:59', 1);
INSERT INTO recharge (code, montant, fin_Date_Validation, is_valid) VALUES (999999, 50.00, '2023-07-05 23:59:59', 0);
INSERT INTO recharge (code, montant, fin_Date_Validation, is_valid) VALUES (101010, 100.00, '2023-07-10 23:59:59', 0);
INSERT INTO recharge (code, montant, fin_Date_Validation, is_valid) VALUES (111222, 200.00, '2023-07-15 23:59:59', 1);
INSERT INTO recharge (code, montant, fin_Date_Validation, is_valid) VALUES (222333, 200.00, '2023-07-20 23:59:59', 1);
