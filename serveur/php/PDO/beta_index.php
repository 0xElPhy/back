<?php
    // on importe le contenu du fichier "db.php"
    require "db.php";
    // on exécute la méthode de connexion à notre BDD
    $db = connexionBase();


    //fichier artists.php
        // on lance une requête pour chercher toutes les fiches d'artistes
        $requete = $db->query("SELECT * FROM artist ORDER BY artist_name ASC");
        // on récupère tous les résultats trouvés dans une variable
        $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
        // on clôt la requête en BDD
        $requete->closeCursor();

    //fichier artist_details.php


    //fichier discs.php
        $requete = $db -> query("SELECT * FROM disc JOIN artist ON artist.artist_id = disc.artist_id ORDER BY RAND()");
        $liste = $requete -> fetchAll(PDO::FETCH_OBJ);
        $requete -> closeCursor();

    //fichier disc_details.php

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" media="screen" href="/back/serveur/php/PDO/assets/css/header.css">
    <link rel="stylesheet" href="/back/serveur/php/PDO/assets/css/nav.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/back/serveur/php/PDO/assets/css/pages_content.css">
    <title>Velvet Records</title>
</head>
<body>
    <header>
        <a class="accueil" href="/back/serveur/php/PDO/index.php"><h1>Velvet Records<h1></a>
        <a class="beta_index" href="" onclick="openTab('accueil')"><h3>PHP Data Objects (beta_index)<h3></a>
    </header>

    <nav>
        <a class="onglet artistes" href="#artists" onclick="openTab('artistes')">
            <h2>Artistes</h2>
        </a>

        <a class="onglet artistes" href="#discs" onclick="openTab('disques')">
            <h2>Disques</h2>
        </a>
    </nav>

    <section class="container accueil" id="accueil" style="display:none">
        <h3>Accueil</h3>
        <p>Bienvenue sur le projet "Velvet Records".</p>
    </section>

    <section class="container artistes" id="artistes" style="display:none">
        <section class="subcontainer artists">
            <h1>Liste des artistes (<?php echo "en cours" ?>)</h1>
            <a href="artist_new.php"><button>Ajouter Artiste</button></a>

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
        </section>

        <section class="subcontainer artist_details">
            Artiste N°<?php echo $myArtist->artist_id ?>
            <br>
            Nom de l'artiste : <?= $myArtist->artist_name ?>
            <br>
            Site Internet : <a href="<?= $myArtist->artist_url ?>" target="_blank">
                                <?= (isset($myArtist->artist_url)) ? parse_url($myArtist->artist_url)['host'] : ""; ?>
                            </a>
            <br>
            Discographie :
            <?php
                if ($discography) {
                    echo "<ul>";
                    foreach ($discography as $disque)
                    {
                        echo "<li><a href='/back/serveur/php/PDO/tab_discs/disc_details.php?id=$disque->disc_id>'>$disque->disc_title ($disque->disc_year)</a></li>";
                    }
                    echo "</ul>";
                }
                else {
                    echo "Aucune discographie renseignée, <a href='/back/serveur/php/PDO/tab_discs/disc_new.php'>cliquez ici</a> pour ajouter un disque de cet artiste";
                }
            ?>
            <br><br>
            <a href="artist_form.php?id=<?= $myArtist->artist_id ?>"><button>Modifier</button></a>
            <a href="script_artist_delete.php?id=<?= $myArtist->artist_id ?>"><button>Supprimer</button></a>
        </section>
    </section>

    <section class="container disques" id="disques" style="display:none">
        <section class="subcontainer discs">
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
                    </td>
                </tr>

                <?php endforeach; ?>
            </table>
        </section>
    </section>
    
    <?php include('./structure/footer.php'); ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="/back/serveur/php/PDO/assets/javascript/index.js"></script>
</body>
</html>