-- Exercice

-- Les besoins d'affichage

-- 1 - Quelles sont les commandes du fournisseur n°9120 ?
SELECT numcom AS 'Commandes du fournisseur n°9120'
FROM entcom
WHERE numfou = 9120;

-- 2 - Afficher le code des fournisseurs pour lesquels des commandes ont été passées
SELECT DISTINCT numfou
FROM entcom;

-- 3 - Afficher le nombre de commandes fournisseurs passées, et le nombre de fournisseur concernés
SELECT
COUNT(*) AS 'Nombre de commandes fournisseurs passées',
COUNT(DISTINCT numfou) AS 'Nombre de fournisseur concernés'
FROM entcom;

-- 4 - Extraire les produits ayant un stock inférieur ou égal au stock d'alerte, et dont la quantité annuelle est inférieure à 1000.
SELECT codart, libart, stkphy, stkale, qteann
FROM produit
WHERE stkphy <= stkale AND qteann < 1000;

-- 5 - Quels sont les fournisseurs situés dans les départements 75, 78, 92, 77 ?
SELECT
LEFT(posfou, 2) AS 'Département',
nomfou
FROM fournis
WHERE (posfou LIKE '75%'
    OR posfou LIKE '77%'
    OR posfou LIKE '78%'
    OR posfou LIKE '92%')
ORDER BY 2 ASC;

-- 6 - Quelles sont les commandes passées en mars et en avril ?
SELECT
numcom,
MONTH(datcom) AS Mois 
FROM entcom
WHERE (MONTH(datcom) = 3
    OR MONTH(datcom) = 4);

-- 7 - Quelles sont les commandes du jour qui ont des observations particulières ?
SELECT numcom, datcom
FROM entcom
Where obscom <> '';
-- ATTENTION, on en peut pas utiliser
-- 'WHERE obscmon IS NOT NULL'
-- car le type de data dans la colonne est défini en VARCHAR !!!!!

-- 8 - Lister le total de chaque commande par total décroissant.
SELECT numcom, SUM(qtecde * priuni) AS 'Prix total commande'
FROM ligcom
GROUP BY numcom
ORDER BY 2 DESC

-- 9 - Lister les commandes dont le total est supérieur à 10000€ ; on exclura dans le calcul du total les articles commandés en quantité supérieure ou égale à 1000.
SELECT
numcom,
SUM(qtecde * priuni) AS 'Prix total commande'
FROM ligcom
WHERE qtecde < 1000
GROUP BY numcom
HAVING SUM(qtecde * priuni) > 10000
ORDER BY 2 DESC;

-- 10 - Lister les commandes par nom de fournisseur.
SELECT fournis.nomfou, entcom.numcom
FROM fournis
JOIN entcom ON entcom.numfou = fournis.numfou
ORDER BY fournis.nomfou ASC;

-- 11 - Sortir les produits des commandes ayant le mot "urgent' en observation.
SELECT
entcom.numcom,
fournis.nomfou,
produit.libart,
SUM(ligcom.qtecde * ligcom.priuni) AS 'sous total'
FROM fournis
JOIN entcom ON entcom.numfou = fournis.numfou
JOIN ligcom ON ligcom.numcom = entcom.numcom
JOIN produit ON produit.codart = ligcom.codart
WHERE RIGHT(entcom.obscom, 7) LIKE 'urgente'
GROUP BY produit.libart
ORDER BY 4 DESC;

-- 12 - Coder de 2 manières différentes la requête suivante : Lister le nom des fournisseurs susceptibles de livrer au moins un article.

-- Première façon
SELECT

-- Seconde façon
SELECT

-- 13 - Coder de 2 manières différentes la requête suivante : Lister les commandes dont le fournisseur est celui de la commande n°70210.
-- Première façon
SELECT numcom, datecom
FROM entcom
WHERE numfou = (
	-- Sous-requête : Recupérer le numéro fournisseur de la commande n°70210
	SELECT numfou
	FROM entcom
	WHERE numfou = 70210
);

-- Seconde façon
SELECT numcom, datecom
FROM entcom
WHERE numfou = 120

-- 14 - Dans les articles susceptibles d’être vendus, lister les articles moins chers (basés sur Prix1) que le moins cher des rubans (article dont le premier caractère commence par R).
SELECT libart, prix1
FROM produit

