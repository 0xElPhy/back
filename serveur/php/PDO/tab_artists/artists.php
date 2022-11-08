<?php
    // on importe le contenu du fichier "db.php"
    require "../db.php";
    // on exécute la méthode de connexion à notre BDD
    $db = connexionBase();
    // on lance une requête pour chercher toutes les fiches d'artistes
    $requete = $db->query("SELECT * FROM artist ORDER BY artist_name ASC");
    // on récupère tous les résultats trouvés dans une variable
    $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
    // on clôt la requête en BDD
    $requete->closeCursor();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO - Liste</title>
</head>
<body>
    <?php include('../structure/header.php'); ?>

    <br>
    <table border=1>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <!-- Ici, on ajoute une colonne pour insérer un lien -->
            <th></th>
        </tr>

        <?php foreach ($tableau as $artist): ?>

        <?php //var_dump($artist); // Le var_dump() est écrit à titre informatif ?>
        <tr>
            <td><?= $artist->artist_id ?></td>
            <td><?= $artist->artist_name ?></td>
            <!-- Ici, on ajoute un lien par artiste pour accéder à sa fiche : -->
            <td><a href="artist_detail.php?id=<?= $artist->artist_id ?>">Détail</a></td>
        </tr>

        <?php endforeach; ?>

    </table>
    
    <br>
    <a href="artist_new.php"><input value="Ajouter artiste" type="button"></a>

    <?php include('../structure/footer.php'); ?>
</body>
</html>