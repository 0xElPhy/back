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
            exit("Fiche disque N°<b>$id</b> inexistante ... ".'<a href="/back/serveur/php/PDO/tab_discs/discs.php">Retour</a>');
        }
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


    <title>Fiche - <?= $myDisc->disc_title ?></title>
</head>
<body>
    <?php include('../structure/header.php'); ?>
    <?php include('../structure/nav.php'); ?>
    
    <section class="container">
        <section class="sub_container debut">
            <h1>Fiche disque n° <?= $myDisc->disc_id ?> - <?= $myDisc->disc_title ?></h1>
            <a href="javascript:history.go(-1)"><button type="back">Retour</button></a>
        </section>

        <form class="sub_container formulaire">
            <section class="datas">
                <div class="groupe g_titre">
                    <input class="champs titre" value="<?= $myDisc->disc_title ?>" 
                        placeholder="Titre" type="text" readonly>
                    <label class="label titre" for="titre">Titre</label>
                </div>
                
                <div class="groupe g_artiste">
                    <input class="champs artiste" value="<?= $myDisc->artist_name ?>" 
                        placeholder="Artiste" type="text" readonly>
                    <label class="label artiste" for="annee">Artiste</label>
                </div>

                <div class="groupe g_annee">
                    <input class="champs annee" value="<?= $myDisc->disc_year ?>" 
                        placeholder="Année" type="text" readonly>
                    <label class="label annee" for="annee">Année</label>
                </div>
                
                <div class="groupe g_genre">
                    <input class="champs genre" value="<?= $myDisc->disc_genre ?>" 
                        placeholder="Genre" type="text" readonly>
                    <label class="label genre" for="genre">Genre</label>
                </div>

                <div class="groupe g_labelD">
                    <input class="champs labelD" value="<?= $myDisc->disc_label ?>" 
                        placeholder="Label" type="text" readonly>
                    <label class="label labelD" for="label">Label</label>
                </div>
                
                <div class="groupe g_prix">
                    <input class="champs prix" value="<?= $myDisc->disc_price ?> €" 
                        placeholder="Prix" type="text" readonly>
                    <label class="label prix" for="prix">Prix</label>
                </div>
            </section>
            <section class="pochette">
                <div class="card card_pochette"
                    style="background: url('/back/serveur/php/PDO/assets/img/disc_pictures/<?php echo $myDisc->disc_picture ?>');
                            background-repeat: no-repeat;
                            background-size: 100% auto;
                            background-position: center top;">
                </div>
            </section>
        </form>

        <section class="sub_container wrap">
            <a href="disc_form.php?id=<?= $myDisc->disc_id ?>"><button class="modifier">Modifier</button></a>
            <a href="javascript:
                if (window.confirm('Êtes-vous sûr de vouloir supprimer ce disque ?'))
                {
                    window.open('script_disc_delete.php?id=<?= $myDisc->disc_id?>', 'Confirmation de la suppression');
                }">
                <button class="supprimer">Supprimer</button>
            </a>
        </section>
    </section>

    <?php include('../structure/footer.php'); ?>
</body>
</html>