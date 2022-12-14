<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" media="screen" href="/back/serveur/php/PDO/assets/css/pages_content.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/back/serveur/php/PDO/assets/css/inputs.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/back/serveur/php/PDO/assets/css/buttons.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/back/serveur/php/PDO/assets/css/forms.css">

    <title>Ajouter - Artiste</title>
</head>
<body>
    <?php include('../structure/header.php'); ?>
    <?php include('../structure/nav.php'); ?>

    <section class="container">
        <section class="sub_container debut retour">
            <h1>Ajouter un artiste</h1>
            <a href="javascript:history.go(-1)"><button type="back">Retour</button></a>
        </section>

        <form class="sub_container formulaire" id="artist_form" action="script_artist_ajout.php" method="post" enctype="multipart/form-data">
            <section class="datas">
                <div class="groupe g_nom">
                    <input class="champs nom" name="nom"
                        placeholder="Nom" type="text" required readwrite>
                    <label class="label nom" for="nom">Nom de l'artiste</label>
                </div>

                <div class="groupe g_url">
                    <input class="champs url" name="url"
                        placeholder="Url" type="text" required readwrite>
                    <label class="label url" for="url">Site internet :</label>
                    <small id="url" class="form-url">Url du site non-valide</small>
                </div>

                <div class="groupe g_image">
                    <input class="champs image" type="file" name="image" required readwrite>
                    <label class="label image" for="image">Image Artiste</label>
                </div>
            </section>
        </form>

        <section class="sub_container wrap">
            <button class="valider" type="submit" form="artist_form">Ajouter</button>
        </section>
    </section>
    
    <?php include('../structure/footer.php'); ?>
    <script src="/back/serveur/php/PDO/assets/javascript/form_validation.js"></script>
</body>
</html>