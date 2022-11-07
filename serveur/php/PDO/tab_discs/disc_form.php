<?php
    require "../db.php";
    $db = connexionBase();

    // Requête 1 : 
    $requete = $db->prepare("SELECT * FROM disc JOIN artist ON artist.artist_id = disc.artist_id WHERE disc_id=?");
    $requete->execute(array($_GET["id"]));
    $myDisc = $requete->fetch(PDO::FETCH_OBJ);
    $requete->closeCursor();

    // Requête 2 : 
    $requete = $db->query("SELECT artist_name FROM artist");
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
    <?php include('../structure/footer.php'); ?>
    <h1>Fiche Disque n°<?= $myDisc->disc_id; ?></h1>
    
    <a href="disc_details.php?id=<?= $myDisc->disc_id ?>">Retour à la fiche détails</a>

    <br>
    <br>

    <form action="script_disc_ajout.php" method="post">
        <input hidden name="id" id="id_for_label" value="<?= $myDisc->disc_id ?>">

        <label for="titre_for_label">Titre</label>
        <input type="text" name="titre" id="titre_for_label" value="<?= $myDisc->disc_title ?>">
        <br><br>
        
        <label for="artiste_for_label">Artiste</label>
        <select name="artiste" id="artiste_for_label">
            <option value="<?=$myDisc->artist_name ?>"><?= $myDisc->artist_name ?></option>
            <?php
                foreach ($myArtist as $artiste)
                {
                echo "<option value='$artiste->artist_name'> $artiste->artist_name </option>";
                }
            ?>
        </select>
        <br><br>
        
        <label for="année_for_label">Année</label>
        <input type="text" name="année" id="année_for_label" value="<?= $myDisc->disc_year ?>">
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
        <br>
        <img src="/back/serveur/php/PDO/assets/img/disc_pictures/<?= $myDisc->disc_picture ?>" id="img_for_label" title="<?= $myDisc->disc_picture ?>" alt="img pochette <?= $myDisc->disc_picture ?>" width="400" height="400">
        <br><br>

        <input type="reset" value="Annuler">
        <input type="submit" value="Valider">
    
    </form>
    
    <a href="javascript:history.go(-1)"><button type="back">Retour</button></a>
</body>
</html>