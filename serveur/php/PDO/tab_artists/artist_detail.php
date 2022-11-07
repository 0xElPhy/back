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
        <title>PFO - Artistes Détails</title>
    </head>

    <?php include('../structure/header.php'); ?>

    <body>
        <br>
        Artiste N°<?php echo $myArtist->artist_id ?>
        <br>
        Nom de l'artiste : <?= $myArtist->artist_name ?>
        <br>
        Site Internet : <?= $myArtist->artist_url ?>
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
    </body>

    <?php include('../structure/footer.php'); ?>
</html>