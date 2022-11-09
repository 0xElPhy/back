<?php
    require "../db.php";
    $db = connexionBase();

    $requete = $db -> query("SELECT * FROM disc JOIN artist ON artist.artist_id = disc.artist_id ORDER BY RAND()");
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

    <?php include('../structure/header.php'); ?>
    <?php include('../structure/nav.php'); ?>
 
    <h1>Liste des disques (<?php echo "en cours" ?>)</h1>

    <a href="disc_new.php"><button>Ajouter Disque</button></a>
    <br>
    <br>
    <table border="1">
        <?php foreach ($liste as $disque): ?>

        <?php //var_dump($artist); // Le var_dump() est écrit à titre informatif ?>
        <tr>
            <td>
                <a href="disc_details.php?id=<?= $disque->disc_id ?>">
                    <img src="/back/serveur/php/PDO/assets/img/disc_pictures/<?= $disque->disc_picture ?>"
                    title="<?=$disque->disc_title?>"
                    alt="<?=$disque->disc_picture?>"
                    width="200" height="200">
                </a>
            </td>
            <td><span><b><?= $disque->disc_title ?></b></span>
                <br>
                <span><b><a href="/back/serveur/php/PDO/tab_artists/artist_detail.php?id=<?= $disque->artist_id ?>"><?= $disque->artist_name ?></a></b><span>
                <br>
                <span><b>Label : </b><?= $disque->disc_label ?></span>
                <br>
                <span><b>Year : </b><?= $disque->disc_year ?></span>
                <br>
                <span><b>Genre : </b><?= $disque->disc_genre ?></span>
                <br>
                <br>
                <i>Cliquez sur la pochette<br>pour avoir les détails</i>
                
        </tr>

        <?php endforeach; ?>

    </table>
    <?php include('../structure/footer.php'); ?> 
</body>
</html>