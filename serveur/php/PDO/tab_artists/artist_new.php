<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDO - Ajout</title>
</head>
<body>

    <?php include('../structure/header.php'); ?>
    <?php include('../structure/nav.php'); ?>

    <h1>Saisie d'un nouvel artiste</h1>

    <br>
    <br>

    <form action ="script_artist_ajout.php" method="post">

        <label for="nom_for_label">Nom de l'artiste :</label><br>
        <input type="text" name="nom" id="nom_for_label">
        <br><br>

        <label for="url_for_label">Adresse site internet :</label><br>
        <input type="text" name="url" id="url_for_label">
        <br><br>

        <input type="submit" value="Ajouter">

    </form>
    <br>

    <a href="javascript:history.go(-1)"><button>Retour</button></a>
    
    <?php include('../structure/footer.php'); ?>
</body>
</html>