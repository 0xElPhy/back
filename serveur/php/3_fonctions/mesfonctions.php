<?php
    //Exercice 1 - Ecrivez une fonction qui permette de générer un lien
    function lien($lien, $titre) {
        echo '<a href='.$lien.'>'.$titre.'</a>';
    }

    //Exercice 2 - Ecrivez une fonction qui calcul la somme des valeurs d'un tableau
    function sumtab() {
        global $tab;
        $resultat = array_sum($tab);
        echo "Somme du tableau : $resultat";
    }

    //Exercice 3 - Créer une fonction qui vérifie le niveau de complexité d'un mot de passe
    function complex_password() {
        global $password;
        $resultat = preg_match('/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8}/', $password);
            // (?=.*\d)    -> Au moins 1 chiffre
            // (?=.*[a-z]) -> Au moins 1 minuscule
            // (?=.*[A-Z]) -> Au moins 1 Majuscule
            // .{8}        -> Au moins 8 caractères 
        
        if ($resultat) {
            echo "Mot de passe complexe";
            return 1;
        }
        else  {
            echo "Mot de passe faible";
            return 0;
        }
    }
?>