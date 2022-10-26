<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dates et Heures</title>
</head>
<body>
    <!--
        php.ini : date.timezone = Europe/Paris
     -->

    <h3>Exercice 1 - Trouvez le numéro de semaine de la date suivante du 14/07/2019 :</h3>
    <?php
        $date = "14/07/2019";
        $fdate = DateTime::createFromFormat("d/m/Y", $date);
        $semaine = $fdate -> format("W");
        echo "La date du $date correspond à la semaine numéro : $semaine";
    ?>
    <br>

    <h3>Exercice 2 - Combien reste-t-il de jours avant la fin de votre formation ?</h3>
    <?php
        $dateAjd = time();
        $dateFin = strtotime("2022/12/02");

        $datediff = ($dateFin - $dateAjd) / (60 * 60 * 24);
        echo "Il reste ".round($datediff)." jours avant la fin du MS Intégrateur";

        // $dateAjd = new DateTime();
        // $dateFin = DateTime::createFromFormat("d/m/Y", "02/12/2022");
        // $datediff = $dateAjd -> diff($dateFin);
        // echo $datediff->format('%d jours')."<br>";
    ?>
    <br>

    <h3>Exercice 3 - Comment déterminer si une année est bissextile ?</h3>
    <?php
        $date = new DateTime();
        $date = $date -> format("Y");
        $bissextile = is_int($date/4) && !is_int($date/100) || is_int($date/400);
        
        if ($bissextile) {
            echo "Année bissextile";
        }
        else {
            echo "Année non-bissextile";
        }
    ?>
    <br>

    <h3>Exercice 4 - Montrez que la date du 32/17/2019 est erronée :</h3>
    <?php
        $date =  DateTime::createFromFormat("d/m/Y", "32/17/2019");

        $errors = DateTime::getLastErrors();
        
        if ($errors["error_count"]>0 || $errors["warning_count"]>0) {
            echo "Date éronnée !";
        }
    ?>
    <br>

    <h3>Exercice 5 - Affichez l'heure courante sous cette forme : 11h25</h3>
    <?php
        echo $date = date("H:i");
    ?>
    <br>

    <h3>Exercice 6 - Ajoutez 1 mois à la date courante :</h3>
    <?php
        $date = new DateTime();
        $date = $date -> modify('+1 month');
        echo "Date du jour + 1 mois : ".$date->format("d/m/Y");
    ?>
    <br>

    <h3>Exercice 7 - Que s'est-il passé le 1000200000 ?</h3>
    <?php
        echo "Que s'est-il passé le ".date("d/m/Y", 1000200000)." ?";
    ?>
</body>
</html>