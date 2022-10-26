<!DOCTYPE html>
<html lang="fr">
<html>
    <body>
        <?php
            // http://127.0.0.1:5500/back/serveur/php/exercices1_boucles/ex1.php
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