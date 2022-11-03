<?php
    require "db.php";
    $db = connexionBase();

    $id = $_GET["id"];

    $requete = $db->prepare("SELECT * FROM disc WHERE disc_id=?");
    $requete -> execute(array($_GET["id"]));
    $album = $requete->fetch(PDO::FETCH_OBJ);
        if ($album == FALSE)  {
            $requete->closeCursor();
            exit("Fiche album N°<b>$id</b> inexistante");
        }
    $requete->closeCursor();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disque Détails</title>
</head>
<body>
    <h1>La page détails</h1>

    <form>
        Title
        <br>
        Artiste
        <br>
        Year
        <br>
        Genre
        <br>
        Label
        <br>
        Price
    </form>
</body>
</html>