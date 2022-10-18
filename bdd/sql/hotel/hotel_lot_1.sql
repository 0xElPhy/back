-- Lot 1 : SELECT - FROM - WHERE - AND
-- 1 - Afficher la liste des hôtels
SELECT hot_nom, hot_ville
FROM hotel

-- 2 - Afficher la ville de résidence de Mr White
SELECT cli_nom, cli_prenom, cli_adresse
FROM client
WHERE cli_nom LIKE 'white%'

-- 3 - Afficher la liste des stations dont l'altitude < 1000
SELECT sta_nom, sta_altitude
FROM station
WHERE sta_altitude < 1000

-- 4 - Afficher la liste des chambres ayant une capacité > 1
SELECT cha_numero, cha_capacite
FROM chambre
WHERE cha_capacite > 1

-- 5 - Afficher les clients n'habitant pas à Londres
SELECT cli_nom, cli_ville
FROM client
WHERE cli_ville NOT LIKE 'Londres%'

-- 6 - Afficher la liste des hôtels situées sur la ville de Bretou et possédant une catégorie > 3
SELECT hot_nom, hot_ville, hot_categorie
FROM hotel
WHERE hot_ville LIKE 'Bretou%' AND hot_categorie > 3
