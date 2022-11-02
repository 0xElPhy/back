<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manipulation de Fichiers</title>
</head>
<body>

    <h3>Exercice 1 - Lecture d'un fichier</h3>
    <?php
        $fichier = file("assets/liens.txt");

        foreach ($fichier as $key => $lien)
        {
            $url = parse_url($lien)['host'];

            if (strlen(parse_url($lien)['path'])>2) {
                 $url .= parse_url($lien)['path'];
            }

            $n = $key + 1;
            echo "Lien n°$n : <a href= '$lien'> $url </a><br>";
        }
    ?>

    <h3>Exercice 2 - Récupération d'un fichier distant</h3>
    <?php
        $fichier = file("assets/customers.csv");
        $i = 1;

        $table = '<table border="1">';
        $table .= '<tr>
                    <th>N° utilisateur</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Ville</th>
                    <th>Etat</th>
                   </tr>';

        foreach($fichier as $upper_key => $data)
        {
            $table .= '<tr><th>'.$i.'</th>';

            foreach(explode(",", $data) as $info)
            {
                $table .= '<td>'.$info.'</td>';
            }

            $table .= '</tr>';
            $i++;
        }

        $table .= "</table>";
        echo $table;
    ?>
</body>
</html>