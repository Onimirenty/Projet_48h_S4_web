CREATE VIEW v_wallet AS
SELECT w.id,
    w.idPersonne,
    w.solde,
    p.nom,
    p.prenom
FROM wallet w
    INNER JOIN personne p ON w.idPersonne = p.id;

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