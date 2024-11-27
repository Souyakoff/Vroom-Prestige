
-- Requête pour la table Administrateur
-- CREATE
INSERT INTO Administrateur (PrenomAdmin, MailAdmin, MdpAdmin, NomAdmin) 
VALUES (:PrenomAdmin, :MailAdmin, :MdpAdmin, :NomAdmin);

-- READ
SELECT * FROM Administrateur WHERE IdAdmin = :IdAdmin;

-- UPDATE
UPDATE Administrateur 
SET PrenomAdmin = :PrenomAdmin, MailAdmin = :MailAdmin, MdpAdmin = :MdpAdmin, NomAdmin = :NomAdmin
WHERE IdAdmin = :IdAdmin;

-- DELETE
DELETE FROM Administrateur WHERE IdAdmin = :IdAdmin;


-- Requête pour la table Administre
-- CREATE
INSERT INTO Administre (IdVoiture, IdAdmin) 
VALUES (:IdVoiture, :IdAdmin);

-- READ
SELECT * FROM Administre WHERE IdVoiture = :IdVoiture;

-- DELETE
DELETE FROM Administre WHERE IdVoiture = :IdVoiture AND IdAdmin = :IdAdmin;


-- Requête pour la table Client
-- CREATE
INSERT INTO Client (IdClient, NomClient, PrenomClient, MailClient, TelClient, AdresseClient, MdpClient) 
VALUES (:IdClient, :NomClient, :PrenomClient, :MailClient, :TelClient, :AdresseClient, :MdpClient);

-- READ
SELECT * FROM Client WHERE IdClient = :IdClient;

-- UPDATE
UPDATE Client 
SET NomClient = :NomClient, PrenomClient = :PrenomClient, MailClient = :MailClient, 
    TelClient = :TelClient, AdresseClient = :AdresseClient, MdpClient = :MdpClient
WHERE IdClient = :IdClient;

-- DELETE
DELETE FROM Client WHERE IdClient = :IdClient;


-- Requête pour la table Gere
-- CREATE
INSERT INTO Gere (IdAdmin, IdReservation) 
VALUES (:IdAdmin, :IdReservation);

-- READ
SELECT * FROM Gere WHERE IdAdmin = :IdAdmin;

-- DELETE
DELETE FROM Gere WHERE IdAdmin = :IdAdmin AND IdReservation = :IdReservation;


-- Requête pour la table MarqueVoiture
-- CREATE
INSERT INTO MarqueVoiture (NomMarque) 
VALUES (:NomMarque);

-- READ
SELECT * FROM MarqueVoiture WHERE IdMarque = :IdMarque;

-- UPDATE
UPDATE MarqueVoiture 
SET NomMarque = :NomMarque
WHERE IdMarque = :IdMarque;

-- DELETE
DELETE FROM MarqueVoiture WHERE IdMarque = :IdMarque;


-- Requête pour la table Reservation
-- CREATE
INSERT INTO Reservation (IdReservation, DateDebut, DateFin, MontantReservation, IdClient) 
VALUES (:IdReservation, :DateDebut, :DateFin, :MontantReservation, :IdClient);

-- READ
SELECT * FROM Reservation WHERE IdReservation = :IdReservation;

-- UPDATE
UPDATE Reservation 
SET DateDebut = :DateDebut, DateFin = :DateFin, MontantReservation = :MontantReservation, IdClient = :IdClient
WHERE IdReservation = :IdReservation;

-- DELETE
DELETE FROM Reservation WHERE IdReservation = :IdReservation;


-- Requête pour la table Statut
-- CREATE
INSERT INTO Statut (IdStatut, TypeStatut) 
VALUES (:IdStatut, :TypeStatut);

-- READ
SELECT * FROM Statut WHERE IdStatut = :IdStatut;

-- UPDATE
UPDATE Statut 
SET TypeStatut = :TypeStatut
WHERE IdStatut = :IdStatut;

-- DELETE
DELETE FROM Statut WHERE IdStatut = :IdStatut;


-- Requête pour la table Voiture
-- CREATE
INSERT INTO Voiture (NbPorte, BoiteVitesse, Annee, Couleur, Photo, Energie, Puissance, 
                     Kilometrage, PrixAchat, PrixLocation, IdStatut, IdMarque) 
VALUES (:NbPorte, :BoiteVitesse, :Annee, :Couleur, :Photo, :Energie, :Puissance, 
        :Kilometrage, :PrixAchat, :PrixLocation, :IdStatut, :IdMarque);

-- READ
SELECT * FROM Voiture WHERE IdVoiture = :IdVoiture;

-- UPDATE
UPDATE Voiture 
SET NbPorte = :NbPorte, BoiteVitesse = :BoiteVitesse, Annee = :Annee, Couleur = :Couleur, 
    Photo = :Photo, Energie = :Energie, Puissance = :Puissance, Kilometrage = :Kilometrage, 
    PrixAchat = :PrixAchat, PrixLocation = :PrixLocation, IdStatut = :IdStatut, IdMarque = :IdMarque
WHERE IdVoiture = :IdVoiture;

-- DELETE
DELETE FROM Voiture WHERE IdVoiture = :IdVoiture;


-- Requête pour filtrer les voitures par critères (Marque, Statut, etc.)
SELECT v.IdVoiture, v.Couleur, v.Annee, v.PrixLocation, m.NomMarque, s.TypeStatut
FROM Voiture v
JOIN MarqueVoiture m ON v.IdMarque = m.IdMarque
JOIN Statut s ON v.IdStatut = s.IdStatut
WHERE (:NomMarque IS NULL OR m.NomMarque = :NomMarque)
  AND (:TypeStatut IS NULL OR s.TypeStatut = :TypeStatut)
  AND (:Annee IS NULL OR v.Annee = :Annee)
  AND (:Couleur IS NULL OR v.Couleur = :Couleur)
  AND (:PrixMax IS NULL OR v.PrixLocation <= :PrixMax)
  AND (:PrixMin IS NULL OR v.PrixLocation >= :PrixMin)
ORDER BY v.PrixLocation ASC;
