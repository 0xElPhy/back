<?php
    require "db.php";

    $db = connexionBase();

    $requete = $db -> query("SELECT * FROM disc JOIN artist ON artist.artist_id = disc.artist_id");
    
    $liste = $requete -> fetchAll(PDO::FETCH_OBJ);
    
    $requete -> closeCursor();
    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Disques</title>
</head>
<body>
    <h1>Liste des disques (<?php echo "en cours" ?>)</h1>

    <a href="disc_form.php">Ajouter</a>

    <table border=1>
        <?php foreach ($liste as $disque): ?>

        <?php //var_dump($artist); // Le var_dump() est écrit à titre informatif ?>
        <tr>
            <td><img src="assets/disc_pictures/<?= $disque->disc_picture ?>" width="200" height="200"></td>
            <td><span><b><?= $disque->disc_title ?></b></span>
                <br>
                <span><b><?= $disque->artist_name ?></b><span>
                <br>
                <span><b>Label : </b><?= $disque->disc_label ?></span>
                <br>
                <span><b>Year : </b><?= $disque->disc_year ?></span>
                <br>
                <span><b>Genre : </b><?= $disque->disc_genre ?></span>
                <br>
                <a href="disc_details.php?id=<?= $disque->disc_id ?>">Détail</a>
            
            </td>
            <td><?= $disque->artist_name ?></td>
            <td>Label : <?= $disque->disc_label ?></td>
            <td>Year : <?= $disque->disc_year ?></td>
            <td>Genre : <?= $disque->disc_genre ?></td>
            <!-- Ici, on ajoute un lien par artiste pour accéder à sa fiche : -->
            <td><a href="disc_details.php?id=<?= $disque->disc_id ?>">Détail</a></td>
        </tr>

        <?php endforeach; ?>

    </table>

</body>
</html>