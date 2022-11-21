<?php
    // on importe le contenu du fichier "db.php"
    require "../db.php";
    // on exécute la méthode de connexion à notre BDD
    $db = connexionBase();
    // on lance une requête pour chercher toutes les fiches d'artistes
    $requete = $db->query("SELECT * FROM artist ORDER BY artist_name ASC");
    // on récupère tous les résultats trouvés dans une variable
    $liste = $requete->fetchAll(PDO::FETCH_OBJ);
    // on clôt la requête en BDD
    $requete->closeCursor();

    $requete = $db->query(" SELECT disc_id, disc_title, disc_year, artist.artist_id
                            FROM artist
                            JOIN disc ON
                            disc.artist_id = artist.artist_id
                            ORDER BY artist.artist_id, disc_year ASC;"
                            );
    $discography = $requete->fetchAll(PDO::FETCH_OBJ);
    $requete->closeCursor();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" media="screen" href="/back/serveur/php/PDO/assets/css/pages_content.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/back/serveur/php/PDO/assets/css/artists_cards.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/back/serveur/php/PDO/assets/css/buttons.css">

    <title>Artistes</title>
</head>
<body>
    <?php include('../structure/header.php'); ?>
    <?php include('../structure/nav.php'); ?>

    <section class="container">
        <section class="sub_container debut">
            <h1>Nos Artistes</h1>
            <div class="ajouter">
                <span>Nombre d'artistes répertoriés : <?php echo count($liste) ?></span>
                <a href="artist_new.php"><button>Ajouter un artiste</button></a>
            </div>
        </section>

        <section class="sub_container allCards">
            <?php foreach ($liste as $artist): ?>
                <div class="card  id_<?= $artist->artist_id ?>"
                     onclick="artist_card_anim(event, <?= $artist->artist_id ?>)"
                     style="background: url('/back/serveur/php/PDO/assets/img/artist_pictures/<?php echo $artist->artist_picture ?>');
                            background-repeat: no-repeat;
                            background-size: auto 100%;
                            background-position: center center">

                    <div class="border">
                        <h2><?= $artist->artist_name ?></h2>
                        <div class="mask"></div>
                        <div class="infos" id="<?= $artist->artist_id ?>">
                            <span class="liste id">
                                Fiche Artiste n° <?= (($artist->artist_id) < 10) ? "0".$artist->artist_id : $artist->artist_id; ?>
                            </span>
                            <a href="artist_detail.php?id=<?= $artist->artist_id ?>">
                                <span class="liste details">Détails</span>
                            </a>
                            <span class="liste discographie">Discographie :</span>
                            <ul class="liste disque">
                                <?php
                                    $artist_id = $artist->artist_id;
                                    $n = 0;
                                    foreach ($discography as $disque)
                                    {
                                        if ($disque->artist_id == $artist_id)
                                        {
                                            $n++;
                                            echo "<li><a href='/back/serveur/php/PDO/tab_discs/disc_details.php?id=$disque->disc_id>'>$disque->disc_title ($disque->disc_year)</a></li>";
                                        }
                                    }
                                    if ($n == 0)
                                    {
                                        echo "<span>
                                                Aucune discographie renseignée.<br>
                                                <a href='/back/serveur/php/PDO/tab_discs/disc_new.php'>
                                                    Cliquez ici
                                                </a>
                                                pour ajouter un disque de cet artiste
                                            </span>";
                                    }
                                ?>
                            </ul>
                            <div class="wrap">
                                <a href="artist_form.php?id=<?= $artist->artist_id ?>"><button class="modifier">Modifier</button></a>
                                <a href="script_artist_delete.php?id=<?= $artist->artist_id ?>"><button class="supprimer">Supprimer</button></a>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
    </section>

    <?php include('../structure/footer.php'); ?>

    <script src="/back/serveur/php/PDO/assets/javascript/scripts.js"></script>
</body>
</html>