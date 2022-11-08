<?php
    require "../db.php";
    $db = connexionBase();

    $requete = $db->query("SELECT * FROM artist ORDER BY artist_name ASC");
    $myArtist = $requete->fetchAll(PDO::FETCH_OBJ);
    $requete->closeCursor();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Disque</title>
</head>
<body>
    <!-- Chargement du header -->
    <?php include('../structure/header.php'); ?> 

    <h1>Le formulaire d'ajout</h1>

    <form action ="script_disc_ajout.php" method="post" enctype="multipart/form-data">
        <h2>Ajouter un vinyle</h2>

        <label for="titre_for_label">Titre</label><br>
        <input type="text" name="titre" id="titre_for_label" placeholder="Entrez un titre">
        <br><br>

        <label for="artiste_id_for_label">Artiste</label><br>
        <select name="artist_id" id="artiste_id_for_label">
            <option value="0">Sélectionnez un artiste</option>
            <?php
                foreach ($myArtist as $artiste)
                {
                    echo "<option value='$artiste->artist_id'> $artiste->artist_name </option>";
                }
            ?>
        </select>

        <a href="/back/serveur/php/PDO/tab_artists/artist_new.php">Ajouter un artiste</a>
        <br><br>

        <label for="annee_for_label">Année</label><br>
        <input type="text" name="annee" id="annee_for_label" placeholder="Entrez l'année de sortie">
        <br><br>

        <label for="genre_for_label">Genre</label><br>
        <input type="text" name="genre" id="genre_for_label" placeholder="Entrez un genre (Rock, Pop, Rap, Prog, ...)">
        <br><br>

        <label for="label_for_label">Label</label><br>
        <input type="text" name="label" id="label_for_label" placeholder="Entrez le nom du label (Warner, TDE, EMI, pgLang, Universale, ...)">
        <br><br>

        <label for="prix_for_label">Prix</label><br>
        <input type="text" name="prix" id="prix_for_label">
        <br><br>

        <label for="pochette_for_label">Image pochette</label><br>
        <input type="file" name="pochette">
        <br><br><br>

        <input type="reset" value="Annuler">
        <input type="submit" value="Ajouter">
    </form>
    <br>
    <a href="javascript:history.go(-1)"><button>Retour</button></a>
    
    <!-- Chargement du footer -->
    <?php include('../structure/footer.php'); ?>
</body>
</html>