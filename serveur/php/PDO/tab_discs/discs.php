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
    <link rel="stylesheet" type="text/css" media="screen" href="/back/serveur/php/PDO/assets/css/pages_content.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/back/serveur/php/PDO/assets/css/discs_cards.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/back/serveur/php/PDO/assets/css/buttons.css">
    <title>Disques</title>
</head>
<body>

    <?php include('../structure/header.php'); ?>
    <?php include('../structure/nav.php'); ?>

    <section class="container">
        <section class="sub_container debut">
            <h1>Notre Discographie</h1>
            <div class="ajouter">
                <span>Nombre de disques répertoriés : <?php echo count($liste) ?></span>
                <a href="disc_new.php"><button>Ajouter un disque</button></a>
            </div>
        </section>
        
        <section class="sub_container allCards">
            <?php foreach ($liste as $disque): ?>
                <div class="card"
                     style="background: url('/back/serveur/php/PDO/assets/img/disc_pictures/<?php echo $disque->disc_picture ?>');
                            background-repeat: no-repeat;
                            background-size: 100% auto;
                            background-position: center top;">
                    <h2><?= $disque->artist_name ?></h2>
                    <h1><?= $disque->disc_title ?></h1>
                    <div class="infos">
                        <span class="label">Label : <?= $disque->disc_label ?></span>
                        <span class="annee">Année : <?= $disque->disc_year ?></span>
                        <span class="genre">Genre : <?= $disque->disc_genre ?></span>
                        <a class="details"href="disc_details.php?id=<?= $disque->disc_id ?>"><button>Détails</button></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
    </section>
    
    <?php include('../structure/footer.php'); ?> 
</body>
</html>