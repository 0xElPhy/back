<?php
    require "../db.php";
    $db = connexionBase();

    // Requête 1 : 
    $requete = $db->prepare(
            "SELECT *
            FROM disc
            JOIN artist ON
            artist.artist_id = disc.artist_id
            WHERE disc_id = ?;"
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
    <link rel="stylesheet" type="text/css" media="screen" href="/back/serveur/php/PDO/assets/css/pages_content.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/back/serveur/php/PDO/assets/css/inputs.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/back/serveur/php/PDO/assets/css/buttons.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/back/serveur/php/PDO/assets/css/disc_details.css">

    <title>Modifier - <?= $myDisc->disc_title ?></title>
</head>
<body>
    <?php include('../structure/header.php'); ?>
    <?php include('../structure/nav.php'); ?>

    <section class="container">
        <section class="sub_container debut">
            <h1>Fiche disque n° <?= $myDisc->disc_id ?> - <?= $myDisc->disc_title ?></h1>
            <a href="javascript:history.go(-1)"><button type="back">Retour</button></a>
        </section>

        <form class="sub_container formulaire" id="disc_form" action="script_disc_modif.php" method="post" enctype="multipart/form-data">
            <input hidden name="disc_id" id="disc_id_for_label" value="<?= $myDisc->disc_id ?>">

            <section class="datas">
                <div class="groupe g_titre">
                    <input class="champs titre" name="titre" value="<?= $myDisc->disc_title ?>" 
                        placeholder="Titre" type="text" readwrite>
                    <label class="label titre" for="titre">Titre</label>
                </div>
                
                <div class="groupe g_artiste">
                    <select class="champs artiste" name="artist_id" readwrite>
                        <option value="<?=$myDisc->artist_id ?>"><?= $myDisc->artist_name ?></option>
                        <?php
                            foreach ($myArtist as $artiste)
                            {
                                if ($artist->artist_id == $myDisc->artist_id) {
                                    continue;
                                }
                                else {
                                    echo "<option value='$artiste->artist_id'> $artiste->artist_name </option>";
                                }
                            }
                        ?>
                    </select>
                    <!-- <input class="champs artiste" value="</?= $myDisc->artist_name ?>" 
                        placeholder="Artiste" type="text" readonly> -->
                    <label class="label artiste" for="artiste">Artiste</label>
                </div>

                <div class="groupe g_annee">
                    <input class="champs annee" name="annee" value="<?= $myDisc->disc_year ?>" 
                        placeholder="Année" type="text" readwrite>
                    <label class="label annee" for="annee">Année</label>
                </div>
                
                <div class="groupe g_genre">
                    <input class="champs genre" name="genre" value="<?= $myDisc->disc_genre ?>" 
                        placeholder="Genre" type="text" readwrite>
                    <label class="label genre" for="genre">Genre</label>
                </div>

                <div class="groupe g_labelD">
                    <input class="champs labelD" name="label" value="<?= $myDisc->disc_label ?>" 
                        placeholder="Label" type="text" readwrite>
                    <label class="label labelD" for="label">Label</label>
                </div>
                
                <div class="groupe g_prix">
                    <input class="champs prix" name="prix" value="<?= $myDisc->disc_price ?>" 
                        placeholder="Prix" type="text" readwrite>
                    <label class="label prix" for="prix">Prix</label>
                </div>
            </section>

            <section class="pochette">
                <div class="card"
                    style="background: url('/back/serveur/php/PDO/assets/img/disc_pictures/<?php echo $myDisc->disc_picture ?>');
                           background-repeat: no-repeat;
                           background-size: 100% auto;
                           background-position: center top;">
                </div>

                <div class="groupe g_pochette">
                    <input class="champs pochette" type="file" name="pochette" readwrite>
                    <label class="label image" for="pochette">Pochette</label>
                </div>
            </section>
        </form>

        <section class="sub_container wrap">
            <button class="valider" type="submit" form="disc_form">Valider</button>
            <button class="supprimer" type="reset" form="disc_form">Annuler</button>
        </section>
    
    <!-- <a href="javascript:history.go(-1)" onclick='window.location.reload(true)'><button type="back">Retour</button></a> -->
    </section>
    
    <?php include('../structure/footer.php'); ?> 
</body>
</html>