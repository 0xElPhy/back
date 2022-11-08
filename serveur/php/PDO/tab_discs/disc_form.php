<?php
    require "../db.php";
    $db = connexionBase();

    // Requête 1 : 
    $requete = $db->prepare(
            "SELECT *
            FROM disc
            JOIN artist ON
            artist.artist_id = disc.artist_id
            WHERE disc_id=?"
            );
    $requete->execute(array($_GET["id"]));
    $myDisc = $requete->fetch(PDO::FETCH_OBJ);
    $requete->closeCursor();

    // Requête 2 : 
    $requete = $db->query("SELECT * FROM artist ORDER BY artist_name ASC");
    $myArtist = $requete->fetchAll(PDO::FETCH_OBJ);
    $requete->closeCursor();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajout</title>
</head>
<body>
    <?php include('../structure/header.php'); ?>
    <h1>Fiche Disque n°<?= $myDisc->disc_id; ?></h1>
    <br>
    <br>

    <form action="script_disc_ajout.php" method="post">
        <input hidden name="disc_id" id="disc_id_for_label" value="<?= $myDisc->disc_id ?>">

        <label for="titre_for_label">Titre</label>
        <input type="text" name="titre" id="titre_for_label" value="<?= $myDisc->disc_title ?>">
        <br><br>
        
        <label for="artiste_id_for_label">Artiste</label>
        <select name="artiste_id" id="artiste_id_for_label">
            <option value="<?=$myDisc->artist_id ?>"><?= $myDisc->artist_name ?></option>
            <?php
                foreach ($myArtist as $artiste)
                {
                    if ($artiste->artist_id == $myDisc->artist_id) {
                        continue;
                    }
                    else {
                        echo "<option value='$artiste->artist_id'> $artiste->artist_name </option>";
                    }
                }
            ?>
        </select>
        <br><br>
        
        <label for="annee_for_label">Année</label>
        <input type="text" name="annee" id="annee_for_label" value="<?= $myDisc->disc_year ?>">
        <br><br>
        
        <label for="genre_for_label">Genre</label>
        <input type="text" name="genre" id="genre_for_label" value="<?= $myDisc->disc_genre ?>">
        <br><br>
        
        <label for="label_for_label">Label</label>
        <input type="text" name="label" id="label_for_label" value="<?= $myDisc->disc_label ?>">
        <br><br>
        
        <label for="prix_for_label">Prix</label>
        <input type="text" name="prix" id="prix_for_label" value="<?= $myDisc->disc_price ?>">
        <br><br>
        
        <label for="pochette_for_label">Pochette</label>
        <input type="file" name="pochette" id="id_for_label" value="$myDisc->disc_picture">
        <br><br>

        <img src="/back/serveur/php/PDO/assets/img/disc_pictures/<?= $myDisc->disc_picture ?>"
            id="img_for_label"
            title="<?= $myDisc->disc_picture ?>"
            alt="img pochette <?= $myDisc->disc_picture ?>"
            width="400" height="400">
        <br><br>

        <input type="reset" value="Annuler">
        <input type="submit" value="Valider">
    
    </form>
    
    <a href="javascript:history.go(-1)"><button type="back">Retour</button></a>
    <?php include('../structure/footer.php'); ?> 
</body>
</html>