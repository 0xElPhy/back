<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fonctions</title>
</head>
<body>
    <h3>Exercice 1 - Ecrivez une fonction qui permette de générer un lien :</h3>
    <?php
        require('mesfonctions.php'); // appel les fonctions enregistrés
        lien("https://www.reddit.com/", "Reddit Hug"); //affiche le lien avec son titre
    ?>

    <br><br>

    <h3>Exercice 2 - Ecrivez une fonction qui calcul la somme des valeurs d'un tableau :</h3> 
    <?php
        $tab = array(4, 3, 8, 2); // tableau
        sumtab();               // somme des valeurs du tableau
    ?>

    <br><br>

    <h3>Exercice 3 - Créer une fonction qui vérifie le niveau de complexité d'un mot de passe :</h3> 
    <?php
        $password = "TopSecret42"; // mot de passe
        complex_password();        // vérification de la complexité du mot de passe
    ?>

</body>
</html>