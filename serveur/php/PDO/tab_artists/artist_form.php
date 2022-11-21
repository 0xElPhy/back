<?php
    // On charge l'enregistrement correspondant à l'ID passé en paramètre :
    require "../db.php";
    $db = connexionBase();
    $requete = $db->prepare("SELECT * FROM artist WHERE artist_id=?");
    $requete->execute(array($_GET["id"]));
    $myArtist = $requete->fetch(PDO::FETCH_OBJ);
    $requete->closeCursor();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" media="screen" href="/back/serveur/php/PDO/assets/css/pages_content.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/back/serveur/php/PDO/assets/css/artists_cards.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/back/serveur/php/PDO/assets/css/inputs.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/back/serveur/php/PDO/assets/css/buttons.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/back/serveur/php/PDO/assets/css/forms.css">
    <title>Modifier - <?= $myArtist->artist_name ?></title>
</head>
<body>
    <?php include('../structure/header.php'); ?>
    <?php include('../structure/nav.php'); ?>

    <section class="container">
        <section class="sub_container debut">
            <h1>Fiche artiste n°<?= $myArtist->artist_id; ?></h1>
            <a href="javascript:history.go(-1)"><button type="back">Retour</button></a>
        </section>

        <form class="sub_container formulaire" id="artist_form" action="script_artist_modif.php" method="post" enctype="multipart/form-data">
            <section class="pochette">
                <div class="card card_artiste"
                        style="background: url('/back/serveur/php/PDO/assets/img/artist_pictures/<?php echo $myArtist->artist_picture ?>');
                                background-repeat: no-repeat;
                                background-size: auto 100%;
                                background-position: center center">
                </div>
            </section>

            <section class="datas">
                <div class="groupe g_id">
                    <input class="champs id" value="<?= $myArtist->artist_id ?>"
                        type="text" name="id" readonly>
                    <label class="label id" for="id">Numéro de l'artiste :</label>
                </div>

                <div class="groupe g_nom">
                    <input class="champs nom" name="nom" value="<?= $myArtist->artist_name ?>"
                        placeholder="Nom" type="text" readwrite>
                    <label class="label nom" for="nom">Nom de l'artiste</label>
                </div>

                <div class="groupe g_url">
                    <input class="champs url" name="url" value="<?= $myArtist->artist_url ?>"
                        placeholder="Url" type="text" readwrite>
                    <label class="label url" for="url">Site internet :</label>
                </div>

                <div class="groupe g_image">
                    <input class="champs image" type="file" name="image" readwrite>
                    <label class="label image" for="image">Image Artiste</label>
                </div>
            </section>
        </form>

        <section class="sub_container wrap">
            <button class="valider" type="submit" form="artist_form">Valider</button>
            <button class="supprimer" type="reset" form="artist_form">Annuler</button>
        </section>
    </section>

    <?php include('../structure/footer.php'); ?>
</body>
</html>