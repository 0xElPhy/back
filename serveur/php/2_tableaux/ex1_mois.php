<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableaux Exo 1</title>
</head>
<body>
    <?php
        $mois = array(
            "Janvier" => 31, 
            "Février" => 28, 
            "Mars" => 31, 
            "Avril" => 30, 
            "Mai" => 31, 
            "Juin" => 30,
            "Juillet" => 31,
            "Août" => 31,
            "Septembre" => 30,
            "Octobre" => 31,
            "Novembre" => 30,
            "Décembre" => 31,
            ); 
        
        arsort($mois);
        
        foreach($mois as $cle => $nbjour) 
        { 
        echo "<td>".$cle ." : ".$nbjour."</td><br>"; 
        }
    ?>
</body>
</html>