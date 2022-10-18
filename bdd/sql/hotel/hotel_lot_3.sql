-- LOT 3 : Fonctions d'agrégation
-- 13 - Compter le nombre d'hôtel par station
SELECT sta_nom, COUNT(*) AS 'Nombre d_hôtels'
FROM hotel
JOIN station ON hot_sta_id = sta_id
GROUP BY sta_nom

-- 14 - Compter le nombre de chambres par station
SELECT sta_nom, COUNT(*) AS 'Nombre de chambres'
FROM chambre
JOIN hotel ON cha_hot_id = hot_id
JOIN station ON hot_sta_id = sta_id
GROUP BY sta_nom
ORDER BY 2 DESC

-- 15 - Compter le nombre de chambres par station ayant une capacité > 1
SELECT sta_nom, COUNT(*) AS 'Nombre de chambres avec une capacité > 1'
FROM chambre
JOIN hotel ON cha_hot_id = hot_id
JOIN station ON hot_sta_id = sta_id
WHERE cha_capacite > 1
GROUP BY sta_nom
ORDER BY 2 DESC

-- 16 - Afficher la liste des hôtels pour lesquels M.Squire a effectué une réservation
SELECT DISTINCT
hot_nom AS 'Liste des hôtels où M.Squire a effectué une reservation',
COUNT(*) AS 'Nombre de reservations effectuées'
FROM reservation
JOIN chambre ON res_cha_id = cha_id
JOIN hotel ON cha_hot_id = hot_id
JOIN client ON res_cli_id = cli_id
WHERE cli_nom LIKE 'Squire%'
ORDER BY 2 DESC

-- 17 - Afficher la durée moyenne des réservations par station
SELECT sta_nom, FLOOR(AVG(DATEDIFF(res_date_fin, res_date_debut))) AS 'Durée moyenne des réservations'
FROM reservation
JOIN chambre ON res_cha_id = cha_id
JOIN hotel ON cha_hot_id = hot_id
JOIN station ON hot_sta_id = sta_id
GROUP BY sta_nom
ORDER BY 2 DESC
