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

    $selected = "artists";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" media="screen" href="/back/serveur/php/PDO/assets/css/artists_cards.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/back/serveur/php/PDO/assets/css/pages_content.css">
    <title>PDO - Liste</title>
</head>
<body>
    <?php include('../structure/header.php'); ?>
    <?php include('../structure/nav.php'); ?>

    <section class="container">
        <section class="sub_container titre">
            <h1>Liste des artistes (<?php echo "en cours" ?>)</h1>
            <a href="artist_new.php"><button>Ajouter Artiste</button></a>
        </section>

        <section class="sub_container allCards">
            <?php foreach ($tableau as $artist): ?>
                
                <div class="card id_<?= $artist->artist_id ?>">
                    <div class="picture id_<?= $artist->artist_id ?>" onclick="artist_card_anim(event, <?= $artist->artist_id ?>)">
                                    <!-- onclick="location.href='artist_detail.php?id=</?= $artist->artist_id ?>'" -->
                        <div class="border">
                            <h2><?= $artist->artist_name ?></h2>
                        </div>
                    </div>

                    <div class="infos" id="<?= $artist->artist_id ?>">
                        <i class="liste id">
                            <?= (($artist->artist_id) < 10) ? "0".$artist->artist_id : $artist->artist_id; ?>
                        </i>
                        <a href="artist_detail.php?id=<?= $artist->artist_id ?>">
                            <i class="liste details">Détails</i>
                        </a>
                    </div>
                </div>

            <?php endforeach; ?>
        </section>

       <!-- </?php foreach ($tableau as $artist): ?>
            <div class="subcontainer">
                <div class="card">
                        <h1 class="title">-</h1>
                        <div class="info">
                            <h1>/?= (($artist->artist_id) < 10) ? "0".$artist->artist_id : $artist->artist_id; ?></h1>
                            <h2>/?= $artist->artist_name ?></h2>
                        </div>
                        <a href="artist_detail.php?id=</?= $artist->artist_id ?>">Détail</a>
                </div>
            </div>
        </?php endforeach; ?> -->

        <!-- <table border=1>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                Ici, on ajoute une colonne pour insérer un lien
                <th></th>
            </tr>

            </?php foreach ($tableau as $artist): ?>

             //var_dump($artist); // Le var_dump() est écrit à titre informatif ?>
            <tr>
                <td></?= $artist->artist_id ?></td>
                <td></?= $artist->artist_name ?></td>
                Ici, on ajoute un lien par artiste pour accéder à sa fiche :
                <td><a href="artist_detail.php?id=</?= $artist->artist_id ?>">Détail</a></td>
            </tr>

            </?php endforeach; ?>

        </table> -->
    </section>

    <?php include('../structure/footer.php'); ?>

    <script src="/back/serveur/php/PDO/assets/javascript/scripts.js"></script>
</body>
</html>