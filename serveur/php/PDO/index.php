<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" media="screen" href="/back/serveur/php/PDO/assets/css/pages_content.css">
    <title>Velvet Records</title>
</head>
<body>
    <?php include('./structure/header.php'); ?>
    <?php include('./structure/nav.php'); ?>

    <section class="container">
        <section class="sub_container debut">
            <h1>Accueil</h1>
        </section>

        <section class="sub_container">
            <p>Bienvenue sur le projet "Velvet Records".</p>
            <p>Afin de consulter les pages <i>Artistes</i> et <i>Disques</i>, vous devez télécharger le fichier :
            <a href="/back/serveur/php/PDO/assets/record.sql" download>records.sql</a></p>
            <p> Puis le charger dans une base de données.</p>
        </section>
    </section>
    
    <?php include('./structure/footer.php'); ?>
</body>
</html>