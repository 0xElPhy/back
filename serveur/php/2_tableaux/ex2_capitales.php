<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableaux Exo 2</title>
</head>
<body>
    <?php
        $capitales = array(
            "Bucarest" => "Roumanie",
            "Bruxelles" => "Belgique",
            "Oslo" => "Norvège",
            "Ottawa" => "Canada",
            "Paris" => "France",
            "Port-au-Prince" => "Haïti",
            "Port-d'Espagne" => "Trinité-et-Tobago",
            "Prague" => "République tchèque",
            "Rabat" => "Maroc",
            "Riga" => "Lettonie",
            "Rome" => "Italie",
            "San José" => "Costa Rica",
            "Santiago" => "Chili",
            "Sofia" => "Bulgarie",
            "Alger" => "Algérie",
            "Amsterdam" => "Pays-Bas",
            "Andorre-la-Vieille" => "Andorre",
            "Asuncion" => "Paraguay",
            "Athènes" => "Grèce",
            "Bagdad" => "Irak",
            "Bamako" => "Mali",
            "Berlin" => "Allemagne",
            "Bogota" => "Colombie",
            "Brasilia" => "Brésil",
            "Bratislava" => "Slovaquie",
            "Varsovie" => "Pologne",
            "Budapest" => "Hongrie",
            "Le Caire" => "Egypte",
            "Canberra" => "Australie",
            "Caracas" => "Venezuela",
            "Jakarta" => "Indonésie",
            "Kiev" => "Ukraine",
            "Kigali" => "Rwanda",
            "Kingston" => "Jamaïque",
            "Lima" => "Pérou",
            "Londres" => "Royaume-Uni",
            "Madrid" => "Espagne",
            "Malé" => "Maldives",
            "Mexico" => "Mexique",
            "Minsk" => "Biélorussie",
            "Moscou" => "Russie",
            "Nairobi" => "Kenya",
            "New Delhi" => "Inde",
            "Stockholm" => "Suède",
            "Téhéran" => "Iran",
            "Tokyo" => "Japon",
            "Tunis" => "Tunisie",
            "Copenhague" => "Danemark",
            "Dakar" => "Sénégal",
            "Damas" => "Syrie",
            "Dublin" => "Irlande",
            "Erevan" => "Arménie",
            "La Havane" => "Cuba",
            "Helsinki" => "Finlande",
            "Islamabad" => "Pakistan",
            "Vienne" => "Autriche",
            "Vilnius" => "Lituanie",
            "Zagreb" => "Croatie"
        );
        
        // 1. Affichez la liste des capitales (par ordre alphabétique) suivie du nom du pays
        ksort($capitales);
        echo "1. Affichez la liste des capitales (par ordre alphabétique) suivie du nom du pays :<br><br>";

        foreach($capitales as $nom => $pays)
        {
            echo $nom." : ".$pays."<br>";
        }
        echo "<br><br>";
        //

        // 2. Affichez la liste des pays (par ordre alphabétique) suivie du nom de la capitale
        asort($capitales);
        echo "2. Affichez la liste des pays (par ordre alphabétique) suivie du nom de la capitale :<br><br>";

        foreach($capitales as $nom => $pays)
        {   
            echo $pays." : ".$nom."<br>";
        }
        echo "<br><br>";
        //

        // 3. Affichez le nombre de pays dans le tableau
        echo "3. Affichez le nombre de pays dans le tableau : ";
        echo "Il y a ".count($capitales)." pays.<br><br>";
        //

        // 4. Supprimer du tableau toutes les capitales commençant par la lettre 'B', puis affichez le contenu du tableau
        ksort($capitales);
        echo "4. Supprimer du tableau toutes les capitales commençant par la lettre 'B', puis affichez le contenu du tableau :<br><br>";

        foreach($capitales as $nom => $pays) {
            $b = substr($nom,0,1) == 'B';
            //var_dump($b);

            if ($b) {
                unset($capitales[$nom]);
            }
            else {
                echo $nom." : ".$pays."<br>";
            }
        }
        //
    ?>
</body>
</html>