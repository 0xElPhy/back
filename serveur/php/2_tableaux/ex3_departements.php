<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableaux Exo 3</title>
</head>
<body>
    <?php
        $departements = array(
            "Hauts-de-france" => array("Aisne", "Nord", "Oise", "Pas-de-Calais", "Somme"),
            "Bretagne" => array("Côtes d'Armor", "Finistère", "Ille-et-Vilaine", "Morbihan"),
            "Grand-Est" => array("Ardennes", "Aube", "Marne", "Haute-Marne", "Meurthe-et-Moselle", "Meuse", "Moselle", "Bas-Rhin", "Haut-Rhin", "Vosges"),
            "Normandie" => array("Calvados", "Eure", "Manche", "Orne", "Seine-Maritime")
        );

        // 1. Affichez la liste des régions (par ordre alphabétique) suivie du nom des départements
        asort($departements);
        echo "1. Affichez la liste des régions (par ordre alphabétique) suivie du nom des départements :<br><br>";

        foreach($departements as $region => $value)
        {
            echo $region." : ";
            foreach($value as $dep) {
                echo $dep.", ";
            }
            echo "<br>";
        }
        echo $dep."<br><br>";
        // -- -- --

        // 2. Affichez la liste des régions suivie du nombre de départements
        asort($departements);
        echo "2. Affichez la liste des régions suivie du nombre de départements :<br><br>";

        foreach($departements as $region => $list_dep) {
            echo $region." : ".count($list_dep)." départements<br>";
        }
        // -- -- --
    ?>
</body>
</html>