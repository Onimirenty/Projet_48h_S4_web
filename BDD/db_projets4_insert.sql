
insert INTO personne VALUES (DEFAULT,'Ratsimbazafy','Miantsa','2000-10-01',0),
                            (DEFAULT,'Ratsimbazafy','Miantsa2','2000-10-02',0),
                            (DEFAULT,'Ratsimbazafy','Miantsa3','2000-10-03',0),
                            (DEFAULT,'Ratsimbazafy','Miantsa4','2000-10-04',0),
                            (DEFAULT,'Ratsimbazafy','Miantsa5','2000-10-05',0);

insert INTO admin values  (DEFAULT,'mirentybg3@gmail.com',0000),
                          (DEFAULT,'navalona@gmail.com',1234),
                          (DEFAULT,'tsanta@gmail.com',4321);

insert INTO login values  (DEFAULT,1,'Miantsa@gmail.com',0000),
                          (DEFAULT,2,'Miantsa2@gmail.com',0000),
                          (DEFAULT,3,'Miantsa3@gmail.com',0000),
                          (DEFAULT,4,'Miantsa4@gmail.com',0000),
                          (DEFAULT,5,'Miantsa5@gmail.com',0000);

insert  INTO details values   (DEFAULT,1,193,66),
                              (DEFAULT,2,194,67),
                              (DEFAULT,3,195,68),
                              (DEFAULT,4,196,69),
                              (DEFAULT,5,197,70);
--augmenter son poids
--reduire son pois
--pour le foie
--pour la price musculaire
--pour la purification du sang
--pour la purification des viscere
INSERT INTO objectifs VALUES (DEFAULT,0),
                            (DEFAULT,1);
              

INSERT INTO objectifs VALUES  (DEFAULT,2);
INSERT INTO objectifs VALUES  (DEFAULT,3);
INSERT INTO objectifs VALUES  (DEFAULT,4);
INSERT INTO objectifs VALUES  (DEFAULT,5);


INSERT INTO regime (nom) VALUES ('Grossissante');
INSERT INTO regime (nom) VALUES ('amincissant');
INSERT INTO regime (nom) VALUES ('Regime pour le foie');
INSERT INTO regime (nom) VALUES ('Regime pour la prise de masse musculaire');
INSERT INTO regime (nom) VALUES ('Regime pour la purification du sang');
INSERT INTO regime (nom) VALUES ('Regime pour la purification des visceres');


-- Insertions de plats pour un regime minceur
INSERT INTO plat (nom, prix) VALUES ('Salade de poulet saute', 10000);
INSERT INTO plat (nom, prix) VALUES ('Poisson à la vapeur', 8000);
INSERT INTO plat (nom, prix) VALUES ('legumes sautes', 7000);

-- Insertions de plats pour un regime grossissant
INSERT INTO plat (nom, prix) VALUES ('Omelette aux legumes et fromage', 600);
INSERT INTO plat (nom, prix) VALUES ('Pâtes à la sauce fromage', 10000);
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

-- Categorisation des plats pour un regime pour purifier les viscere

INSERT INTO regime_plat (idRegime, idPlat) VALUES (6,16);
INSERT INTO regime_plat (idRegime, idPlat) VALUES (6,17);
INSERT INTO regime_plat (idRegime, idPlat) VALUES (6,18);


INSERT INTO sport (nom, prix) VALUES ('glander', 0);
INSERT INTO sport (nom, prix) VALUES ('Entraînement cardio', 10 000);
INSERT INTO sport (nom, prix) VALUES ('Entraînement en force', 20000);
INSERT INTO sport (nom, prix) VALUES ('Yoga', 8000);
INSERT INTO sport (nom, prix) VALUES ('Pilates', 12000);
INSERT INTO sport (nom, prix) VALUES ('Natation', 40000);
INSERT INTO sport (nom, prix) VALUES ('Cyclisme', 60000);


-- services pour miantsa qui veut grossir
INSERT INTO service (idPersonne, idRegimePlat, idSport, duree) VALUES (1, 6, 1, 21);
INSERT INTO service (idPersonne, idRegimePlat, idSport, duree) VALUES (1, 7, 1, 21);
INSERT INTO service (idPersonne, idRegimePlat, idSport, duree) VALUES (1, 8, 1, 21);

-- services pour miantsa2 qui veut etre muscler
INSERT INTO service (idPersonne, idRegimePlat, idSport, duree) VALUES (2, 10, 2, 30);
INSERT INTO service (idPersonne, idRegimePlat, idSport, duree) VALUES (2, 11, 3, 30);
INSERT INTO service (idPersonne, idRegimePlat, idSport, duree) VALUES (2, 12, 6, 30);



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
