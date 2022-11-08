<?php
    require "../db.php";
    $db = connexionBase();

    $id = $_GET["id"];

    $requete = $db->prepare(
        "SELECT *
        FROM disc
        JOIN artist ON
        artist.artist_id = disc.artist_id
        WHERE disc_id=?
    ");

    $requete -> execute(array($_GET["id"]));
    $myDisc = $requete->fetch(PDO::FETCH_OBJ);
        if ($myDisc == FALSE)  {
            $requete->closeCursor();
            exit("Fiche disque N°<b>$id</b> inexistante ... ".'<a href="/back/serveur/php/PDO/onglets_discs/discs.php">Retour</a>');
        }
    $requete->closeCursor();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disque Détails</title>
</head>
<body>
    <?php include('../structure/header.php'); ?>

    <h1>Disque Détails</h1>

    <form>
        <label>Titre</label>
        <input value="<?= $myDisc->disc_title ?>" readonly>
        <br><br>
        
        <label>Artiste</label>
        <input value="<?= $myDisc->artist_name ?>" readonly>
        <br><br>
        
        <label>Année</label>
        <input value="<?= $myDisc->disc_year ?>" readonly>
        <br><br>
        
        <label>Genre</label>
        <input value="<?= $myDisc->disc_genre ?>" readonly>
        <br><br>
        
        <label>Label</label>
        <input value="<?= $myDisc->disc_label ?>" readonly>
        <br><br>
        
        <label>Prix</label>
        <input value="<?= $myDisc->disc_price ?>" readonly>
        <br><br>
        
        <label>Pochette</label>
        <br>
        <img src="/back/serveur/php/PDO/assets/img/disc_pictures/<?= $myDisc->disc_picture ?>"
            title="<?= $myDisc->disc_title ?>"
            alt="img pochette <?= $myDisc->disc_picture ?>"
            width="400"
            height="400">
    </form>
    <br>
    
    <a href="javascript:history.go(-1)"><button type="back">Retour</button></a>
    <a href="disc_form.php?id=<?= $myDisc->disc_id ?>"><button>Modifier</button></a>
    <a href="javascript:
        if (window.confirm('Êtes-vous sûr de vouloir supprimer ce disque ?'))
        {
            window.open('script_disc_delete.php?id=<?= $myDisc->disc_id?>', 'Confirmation de la suppression');
        }">
        <button>Supprimer</button>
    </a>

    <?php include('../structure/footer.php'); ?>
</body>
</html>