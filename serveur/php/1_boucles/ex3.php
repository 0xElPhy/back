<!DOCTYPE html>
<html lang="fr">
<html>
    <body>
        <?php
            function table($n1, $n2) {
                $table = '<table border="1">';
                
                // Première Ligne de la table
                $table .= '<tr><th></th>';
                for ($k=0; $k <= $n2; $k++) {
                    $table .= '<th>'.$k.'</th>';
                }
                $table .= '</tr>';
                // -- -- --
                
                //Calcul de la table
                // Sélection de la ligne
                for ($i=0; $i <= $n1; $i++) {
                    $table .= '<tr><th>'.$i.'</th>';

                    //Sélection de la colonne
                    for ($j=0; $j <= $n2 ; $j++) {
                        $table .= '<td>'.$i*$j.'</td>';
                    }
                    // -- -- --
                    
                    $table .= '</tr>';
                }
                // -- -- --
                // -- -- --
                
                $table .= '</table>';
                return $table;
            }

            echo table(12, 12);
        ?>
    </body>
</html>

