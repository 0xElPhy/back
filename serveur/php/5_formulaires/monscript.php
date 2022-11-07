<?php
    echo "Valeurs renseignées dans le formulaire :<br><br>";

    foreach ($_REQUEST as $key=>$value)
    {
        if (empty($value)) {
            $value = "null";
        }
        echo "$key : $value<br>";
    }
?>