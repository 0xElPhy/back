<?php
    // On se connecte à la BDD via notre fichier db.php :
    require "../db.php";
    $db = connexionBase();

    // On récupère l'ID passé en paramètre :
    $id = $_GET["id"];

    // On crée une requête préparée avec condition de recherche :
    $requete = $db->prepare("SELECT * FROM artist WHERE artist_id=?");
    // on ajoute l'ID du disque passé dans l'URL en paramètre et on exécute :
    $requete->execute(array($id));

    // on récupère le 1e (et seul) résultat :
    $myArtist = $requete->fetch(PDO::FETCH_OBJ);
        // on vérifie si la fiche artiste est existante dans la bdd :
        if ($myArtist == FALSE)  {
            $requete->closeCursor();
            exit("Fiche artiste N°<b>$id</b> inexistante ... ".'<a href="/back/serveur/php/PDO/onglets_discs/discs.php">Retour</a>');
        }

    // on clôt la requête en BDD
    $requete->closeCursor();

    $requete = $db->prepare("SELECT * FROM disc JOIN artist ON artist.artist_id = disc.artist_id WHERE artist.artist_id = ? ORDER BY disc_year ASC");
    $requete->execute(array($id));
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
    <title>Détails - <?= $myArtist->artist_name ?></title>
</head>

<body>
    <?php include('../structure/header.php'); ?>
    <?php include('../structure/nav.php'); ?>

    <section class="container">
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
        <a class="Modifier" href="artist_form.php?id=<?= $myArtist->artist_id ?>"><button>Modifier</button></a>
        <a class="supprimer" href="script_artist_delete.php?id=<?= $myArtist->artist_id ?>"><button>Supprimer</button></a>
    </section>
    
    <?php include('../structure/footer.php'); ?>
    <script src="https://unpkg.com/scrollreveal"></script>
</body>
</html>