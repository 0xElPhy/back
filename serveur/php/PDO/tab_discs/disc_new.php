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
    <link rel="stylesheet" type="text/css" media="screen" href="/back/serveur/php/PDO/assets/css/pages_content.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/back/serveur/php/PDO/assets/css/inputs.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/back/serveur/php/PDO/assets/css/buttons.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/back/serveur/php/PDO/assets/css/forms.css">
    <title>Ajouter - Vinyle</title>
</head>
<body>
    <!-- Chargement du header -->
    <?php include('../structure/header.php'); ?> 
    <?php include('../structure/nav.php'); ?>

    <section class="container">
        <section class="sub_container debut retour">
            <h1>Ajouter un vinyle</h1>
            <a href="javascript:history.go(-1)"><button type="back">Retour</button></a>
        </section>

        <form class="sub_container formulaire" id="disc_form" action="script_disc_ajout.php" method="post" enctype="multipart/form-data">
            <section class="datas">
                <div class="groupe g_titre">
                    <input class="champs titre" name="titre"
                        placeholder="Titre" type="text" required readwrite>
                    <label class="label titre" for="titre">Titre</label>
                </div>

                <div class="groupe g_artiste">
                    <select class="champs artiste" name="artist_id" required readwrite>
                        <option value="0">Sélectionnez un artiste</option>
                        <?php
                            foreach ($myArtist as $artiste)
                            {
                                echo "<option value='$artiste->artist_id'> $artiste->artist_name </option>";
                            }
                        ?>
                    </select>
                    <label class="label artiste" for="artiste">Artiste</label>
                    <a href="/back/serveur/php/PDO/tab_artists/artist_new.php">Ajouter un artiste</a>
                </div>

                <div class="groupe g_annee">
                    <input class="champs annee" name="annee"
                        placeholder="Année" type="text" required readwrite>
                    <label class="label annee" for="annee">Année</label>
                    <small id="annee" class="form-annee">Année non-valide</small>
                </div>

                <div class="groupe g_genre">
                    <input class="champs genre" name="genre"
                        placeholder="Genre" type="text" required readwrite>
                    <label class="label genre" for="genre">Genre</label>
                </div>

                <div class="groupe g_labelD">
                    <input class="champs labelD" name="label"
                        placeholder="Label" type="text" required readwrite>
                    <label class="label labelD" for="label">Label</label>
                </div>

                <div class="groupe g_prix">
                    <input class="champs prix" name="prix"
                        placeholder="Prix" type="text" required readwrite>
                    <label class="label prix" for="prix">Prix</label>
                    <small id="prix" class="form-prix">Prix non-valide</small>
                </div>

                <div class="groupe g_pochette">
                    <input class="champs pochette" type="file" name="pochette" required readwrite>
                    <label class="label image" for="pochette">Pochette</label>
                </div>
            </section>
        </form>

        <section class="sub_container wrap">
            <button class="valider" type="submit" form="disc_form">Ajouter</button>
        </section>
    </section>
    
    <!-- Chargement du footer -->
    <?php include('../structure/footer.php'); ?>

    <script src="/back/serveur/php/PDO/assets/javascript/form_validation.js"></script>

</body>
</html>