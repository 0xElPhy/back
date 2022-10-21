-- Evaluation

-- Requêtes de BDD

-- 1 - Liste des clients français
SELECT CompanyName, ContactName, ContactTitle, Phone
FROM customers
WHERE Country LIKE 'France';

-- 2 - Liste des produits vendus par le fournisseur "Exotic Liquids"
SELECT products.ProductName, products.UnitPrice
FROM suppliers
JOIN products ON products.SupplierID = suppliers.SupplierID
WHERE suppliers.CompanyName LIKE 'Exotic Liquids%'
ORDER BY products.UnitPrice DESC;

-- 3 - Nombre de produits mis à disposition par les fournisseurs français (tri par nombre de produits décroissant) :
SELECT suppliers.CompanyName, `order details`.Quantity
FROM suppliers
JOIN products ON products.SupplierID = suppliers.SupplierID
JOIN `order details` ON `order details`.ProductID = products.ProductID
WHERE suppliers.Country LIKE 'France';

-- 3 - Nombre de produits mis à disposition par les fournisseurs français (tri par nombre de produits dé>
SELECT suppliers.CompanyName, COUNT(*) AS 'Nombre de produits'
FROM suppliers
JOIN products ON products.SupplierID = suppliers.SupplierID 
WHERE suppliers.Country LIKE 'France'
GROUP BY suppliers.CompanyName
ORDER BY 2 DESC;

-- 4 - Liste des clients français ayant passé plus de 10 commandes :
SELECT customers.CompanyName, COUNT(*) AS 'Nombre de commandes'
FROM customers
JOIN orders ON orders.CustomerID = customers.CustomerID
WHERE customers.Country LIKE 'France'
GROUP BY customers.CompanyName
HAVING COUNT(*) > 10
ORDER BY 2 DESC;

-- 5 - Liste des clients dont le montant cumulé de toutes les commandes passées est supérieur à 30000 € :
SELECT
customers.CompanyName,
ROUND(SUM(`order details`.UnitPrice * `order details`.Quantity),0) AS 'CA',
customers.Country
FROM customers
JOIN orders ON orders.CustomerID = customers.CustomerID
JOIN `order details` ON `order details`.OrderID = orders.OrderID
GROUP BY customers.CompanyName
HAVING CA > 30000
ORDER BY 2 DESC;

-- 6 - Liste des pays dans lesquels des produits fournis par "Exotic Liquids" ont été livrés :
SELECT DISTINCT orders.ShipCountry
FROM orders
JOIN `order details` ON `order details`.OrderID = orders.OrderID
JOIN products ON products.ProduitID = `order details`.ProductID
JOIN suppliers ON suppliers.SupplierID = products.SupplierID
WHERE suppliers.CompanyName LIKE 'Exotic Liquids%'
ORDER BY 1;

-- 7 - Chiffre d'affaires global sur les ventes de 1997 :
SELECT SUM(`order details`.UnitPrice * `order details`.Quantity) AS 'Montant Ventes de 1997'
FROM orders
JOIN `order details` ON `order details`.OrderID = orders.OrderID
WHERE YEAR(orders.OrderDate) = 1997;

-- 8 - Chiffre d'affaires détaillé par mois, sur les ventes de 1997 :
SELECT
DISTINCT MONTH(orders.OrderDate) AS 'Mois',
SUM(`order details`.UnitPrice * `order details`.Quantity) AS 'Montant Ventes de 1997'
FROM orders
JOIN `order details` ON `order details`.OrderID = orders.OrderID
WHERE YEAR(orders.OrderDate) = 1997
GROUP BY 1;

-- 9 - A quand remonte la dernière commande du client nommé "Du monde entier" ?
SELECT max(orders.OrderDate) AS 'Date de dernière commande'
FROM orders
JOIN customers ON customers.CustomerID = orders.CustomerID
WHERE customers.CompanyName LIKE 'Du monde entier%';

-- 10 - Quel est le délai moyen de livraison en jours ?
SELECT ROUND( AVG( DATEDIFF(ShippedDate, OrderDate)), 0) AS 'Délai moyen de livraison en jours'
FROM orders;
