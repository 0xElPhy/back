-- Lot 2 : JOIN
-- 7 - Afficher la lsite des hôtels avec leur station
SELECT hot_nom, hot_categorie, hot_ville, sta_nom
FROM station
JOIN hotel ON sta_id = hot_sta_id

-- 8 - Afficher la liste des chambres et leur hôtel
SELECT hot_nom, hot_categorie, hot_ville, cha_numero
FROM chambre
JOIN hotel ON cha_hot_id = hot_id

-- 9 - Afficher la liste des chambres de plus d'une place dans des hôtels situés sur la ville de Bretou
SELECT hot_nom, hot_categorie, hot_ville, cha_numero, cha_capacite
FROM hotel
JOIN chambre ON hot_id = cha_hot_id
WHERE cha_capacite > 1 AND hot_ville LIKE 'Bretou%'

-- 10 - Afficher la liste des réservations avec le nom des clients
SELECT cli_nom, hot_nom, res_date
FROM reservation
JOIN client ON res_cli_id = cli_id
JOIN chambre ON res_cha_id = cha_id
JOIN hotel ON cha_hot_id = hot_id

-- 11 - Afficher la liste des chambres avec le nom de l'hôtel et le nom de la station
SELECT sta_nom, hot_nom, cha_numero, cha_capacite
FROM hotel
JOIN station ON hot_sta_id = sta_id
JOIN chambre ON hot_id = cha_hot_id

-- 12 - Afficher les réservations avec le nom du client et le nom de l'hôtel avec 'datediff'
SELECT cli_nom, hot_nom, res_date_debut, DATEDIFF(res_date_fin, res_date_debut) AS 'Durée du séjour'
FROM chambre
JOIN reservation ON cha_id = res_cha_id
JOIN client ON res_cli_id = cli_id
JOIN hotel ON cha_hot_id = hot_id
