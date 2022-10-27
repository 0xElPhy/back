<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaires</title>
</head>
    <body>
        <?php
            // http://127.0.0.1:5500/back/serveur/php/1_boucles/ex1.php
            // $killall -9 php
            $i = 0;
            for ($i ; $i<=150 ; $i++) { 
                if ($i%2 != 0) {
                    echo $i." ";
                }
            }
        ?>
    </body>
</html>