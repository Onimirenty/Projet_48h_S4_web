-- Table "personne"
CREATE TABLE IF NOT EXISTS `personne` (
  `id` INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom` VARCHAR(45) DEFAULT NULL,
  `prenom` VARCHAR(45) DEFAULT NULL,
  `dtn` DATE DEFAULT NULL,
  `sexe` INT(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insertion de données dans la table "personne"
INSERT INTO `personne` (`id`, `nom`, `prenom`, `dtn`, `sexe`) VALUES
(1, 'Doe', 'John', '1990-01-01', 1),
(2, 'Smith', 'Jane', '1995-05-10', 0),
(3, 'Johnson', 'Michael', '1985-12-15', 1),
(4, 'Williams', 'Emily', '1998-06-20', 0),
(5, 'Brown', 'David', '1992-03-25', 1);

-- Table "transaction_financiere"
CREATE TABLE IF NOT EXISTS `transaction_financiere` (
  `id` INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idPersonne` INT(5) NOT NULL,
  `montant` DECIMAL(10, 2) NOT NULL,
  `dateTransaction` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`idPersonne`) REFERENCES `personne`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insertion de données dans la table "transaction_financiere"
INSERT INTO `transaction_financiere` (`id`, `idPersonne`, `montant`, `dateTransaction`) VALUES
(1, 1, 100.00, '2023-07-01 10:00:00'),
(2, 2, 50.00, '2023-07-02 11:30:00'),
(3, 3, 200.00, '2023-07-03 15:45:00'),
(4, 4, 75.00, '2023-07-04 09:15:00'),
(5, 5, 120.00, '2023-07-05 13:20:00');

-- Table "service"
CREATE TABLE IF NOT EXISTS `service` (
  `id` INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom` VARCHAR(100) DEFAULT NULL,
  `prix` DECIMAL(10, 2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insertion de données dans la table "service"
INSERT INTO `service` (`id`, `nom`, `prix`) VALUES
(1, 'Service A', 50.00),
(2, 'Service B', 75.00),
(3, 'Service C', 100.00),
(4, 'Service D', 120.00),
(5, 'Service E', 150.00);

-- Table "historique_transaction"
CREATE TABLE IF NOT EXISTS `historique_transaction` (
  `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idTransaction` INT NOT NULL,
  `idService` INT NOT NULL,
  `dateModification` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`idTransaction`) REFERENCES `transaction_financiere`(`id`),
  FOREIGN KEY (`idService`) REFERENCES `service`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insertion de données dans la table "historique_transaction"
INSERT INTO `historique_transaction` (`id`, `idTransaction`, `idService`, `dateModification`) VALUES
(1, 1, 2, '2023-07-01 10:30:00'),
(2, 2, 1, '2023-07-02 12:00:00'),
(3, 3, 4, '2023-07-03 16:00:00'),
(4, 4, 3, '2023-07-04 10:00:00'),
(5, 5, 5, '2023-07-05 14:00:00');

-- Table "banque"
CREATE TABLE IF NOT EXISTS `banque` (
  `id` INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom` VARCHAR(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insertion de données dans la table "banque"
INSERT INTO `banque` (`id`, `nom`) VALUES
(1, 'Banque A'),
(2, 'Banque B'),
(3, 'Banque C'),
(4, 'BanSuite à une limitation de caractères, je ne peux pas inclure la totalité des déclarations de table dans une seule réponse. Veuillez trouver ci-dessous les déclarations des tables restantes :

```sql
-- Table "historique_banque"
CREATE TABLE IF NOT EXISTS `historique_banque` (
  `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idBanque` INT NOT NULL,
  `montant` DECIMAL(10, 2) NOT NULL,
  `dateModification` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`idBanque`) REFERENCES `banque`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insertion de données dans la table "historique_banque"
INSERT INTO `historique_banque` (`id`, `idBanque`, `montant`, `dateModification`) VALUES
(1, 1, 1000.00, '2023-07-01 09:00:00'),
(2, 2, 2000.00, '2023-07-02 10:30:00'),
(3, 3, 1500.00, '2023-07-03 14:45:00'),
(4, 4, 3000.00, '2023-07-04 11:15:00'),
(5, 5, 2500.00, '2023-07-05 13:30:00');

-- Table "wallet"
CREATE TABLE IF NOT EXISTS `wallet` (
  `id` INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idPersonne` INT(5) NOT NULL,
  `solde` DECIMAL(10, 2) NOT NULL DEFAULT 0,
  FOREIGN KEY (`idPersonne`) REFERENCES `personne`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insertion de données dans la table "wallet"
INSERT INTO `wallet` (`id`, `idPersonne`, `solde`) VALUES
(1, 1, 500.00),
(2, 2, 800.00),
(3, 3, 1200.00),
(4, 4, 600.00),
(5, 5, 1000.00);

-- Table "wallet_historique"
CREATE TABLE IF NOT EXISTS `wallet_historique` (
  `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idPersonne` INT NOT NULL,
  `idWallet` INT NOT NULL,
  `ancienSolde` DECIMAL(10, 2) NOT NULL,
  `nouveauSolde` DECIMAL(10, 2) NOT NULL,
  `dateModification` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`idPersonne`) REFERENCES `personne`(`id`),
  FOREIGN KEY (`idWallet`) REFERENCES `wallet`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insertion de données dans la table "wallet_historique"
INSERT INTO `wallet_historique` (`id`, `idPersonne`, `idWallet`, `ancienSolde`, `nouveauSolde`, `dateModification`) VALUES
(1, 1, 1, 500.00, 400.00, '2023-07-01 09:30:00'),
(2, 2, 2, 800.00, 700.00, '2023-07-02 11:00:00'),
(3, 3, 3, 1200.00, 1500.00, '2023-07-03 15:00:00'),
(4, 4, 4, 600.00, 900.00, '2023-07-04 09:30:00'),
(5, 5, 5, 1000.00, 800.00, '2023-07-05 13:00:00');
