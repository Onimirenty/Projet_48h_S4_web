--
-- Structure de la table `service`
--

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



Q
mysql> 
mysql> -- Catgorisation des plats pour un rgime pour purifier le sang
mysql> 
mysql> INSERT INTO regime_plat (idRegime, idPlat) VALUES (5,13);
ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails (`db_projets4`.`regime_plat`, CONSTRAINT `regime_plat_ibfk_1` FOREIGN KEY (`idRegime`) REFERENCES `regime` (`id`))
mysql> INSERT INTO regime_plat (idRegime, idPlat) VALUES (5,14);
ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails (`db_projets4`.`regime_plat`, CONSTRAINT `regime_plat_ibfk_1` FOREIGN KEY (`idRegime`) REFERENCES `regime` (`id`))
mysql> INSERT INTO regime_plat (idRegime, idPlat) VALUES (5,15);
ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails (`db_projets4`.`regime_plat`, CONSTRAINT `regime_plat_ibfk_1` FOREIGN KEY (`idRegime`) REFERENCES `regime` (`id`))
mysql> 
mysql> -- Catgorisation des plats pour un rgime pour purifier les viscere
mysql> 
mysql> INSERT INTO regime_plat (idRegime, idPlat) VALUES (6,16);
ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails (`db_projets4`.`regime_plat`, CONSTRAINT `regime_plat_ibfk_1` FOREIGN KEY (`idRegime`) REFERENCES `regime` (`id`))
mysql> INSERT INTO regime_plat (idRegime, idPlat) VALUES (6,17);
ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails (`db_projets4`.`regime_plat`, CONSTRAINT `regime_plat_ibfk_1` FOREIGN KEY (`idRegime`) REFERENCES `regime` (`id`))
mysql> INSERT INTO regime_plat (idRegime, idPlat) VALUES (6,18);
ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails (`db_projets4`.`regime_plat`, CONSTRAINT `regime_plat_ibfk_1` FOREIGN KEY (`idRegime`) REFERENCES `regime` (`id`))
mysql> 
mysql> 
mysql> INSERT INTO sport (nom, prix) VALUES ('glander', 0);
Query OK, 1 row affected (0.20 sec)

mysql> INSERT INTO sport (nom, prix) VALUES ('Entranement cardio', 10 000);
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '000)' at line 1
mysql> INSERT INTO sport (nom, prix) VALUES ('Entranement en force', 20000);
Query OK, 1 row affected (0.19 sec)

mysql> INSERT INTO sport (nom, prix) VALUES ('Yoga', 8000);
Query OK, 1 row affected (0.10 sec)

mysql> INSERT INTO sport (nom, prix) VALUES ('Pilates', 12000);
Query OK, 1 row affected (0.08 sec)

mysql> INSERT INTO sport (nom, prix) VALUES ('Natation', 40000);
Query OK, 1 row affected (0.18 sec)

mysql> INSERT INTO sport (nom, prix) VALUES ('Cyclisme', 60000);
Query OK, 1 row affected (0.10 sec)

mysql> 
mysql> 
mysql> -- services pour miantsa qui veut grossir
mysql> INSERT INTO service (idPersonne, idRegimePlat, idSport, duree) VALUES (1, 6, 1, 21);
Query OK, 1 row affected (0.13 sec)

mysql> INSERT INTO service (idPersonne, idRegimePlat, idSport, duree) VALUES (1, 7, 1, 21);
Query OK, 1 row affected (0.14 sec)

mysql> INSERT INTO service (idPersonne, idRegimePlat, idSport, duree) VALUES (1, 8, 1, 21);
Query OK, 1 row affected (0.15 sec)

mysql> 
mysql> -- services pour miantsa2 qui veut etre muscler
mysql> INSERT INTO service (idPersonne, idRegimePlat, idSport, duree) VALUES (2, 10, 2, 30);
Query OK, 1 row affected (0.10 sec)

mysql> INSERT INTO service (idPersonne, idRegimePlat, idSport, duree) VALUES (2, 11, 3, 30);
Query OK, 1 row affected (0.08 sec)

mysql> INSERT INTO service (idPersonne, idRegimePlat, idSport, duree) VALUES (2, 12, 6, 30);
Query OK, 1 row affected (0.10 sec)

