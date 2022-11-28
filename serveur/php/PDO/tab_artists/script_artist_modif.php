<?php
    // Récupération des valeurs :
    $id = (isset($_POST['id']) && $_POST['id'] != "") ? $_POST['id'] : Null;
    $nom = (isset($_POST['nom']) && $_POST['nom'] != "") ? $_POST['nom'] : Null;
    $url = (isset($_POST['url']) && $_POST['url'] != "") ? $_POST['url'] : Null;

    if (!empty($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // On met les types autorisés dans un tableau (ici pour une image)
        $aMimeTypes = array("jpeg" => "image/jpeg",
                            "png"  => "image/png",
                            "gif"  => "image/gif");

        // On extrait le type du fichier via l'extension FILE_INFO 
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimetype = finfo_file($finfo, $_FILES["image"]["tmp_name"]);
        finfo_close($finfo);

        if (in_array($mimetype, $aMimeTypes)) {
            // Le type est parmi ceux autorisés, donc OK, on va pouvoir  déplacer et renommer le fichier
            $image = preg_replace('/\s+/', '_',strtolower($nom))
                        .'_'
                        .mt_rand(1000,9999)
                        .'.'
                        .explode('/', $mimetype)[1];

            move_uploaded_file($_FILES["image"]["tmp_name"], "../assets/img/artist_pictures/$image");
        } 
        else {
            // Le type n'est pas autorisé, donc ERREUR
            header("Location: artist_new.php");
            echo "<script>alert('Type de fichier non autorisé')</script>";
            exit;
        }

    }
    else {
        $image = Null;
    }

    // En cas d'erreur, on renvoie vers le formulaire
    if ($id == Null) {
        header("Location: artists.php");
    }
    elseif ($nom == Null || $url == Null) {
        header("Location: artist_form.php?id=".$id);
        exit;
    }

    // Si la vérification des données est ok :
    require "../db.php";
    $db = connexionBase();

    try {
        // Construction de la requête UPDATE sans injection SQL :
        $requete = $db->prepare("UPDATE artist SET artist_name = :nom, artist_url = :url WHERE artist_id = :id;");
        $requete->bindValue(":id", $id, PDO::PARAM_INT);
        $requete->bindValue(":nom", $nom, PDO::PARAM_STR);
        $requete->bindValue(":url", $url, PDO::PARAM_STR);

        $requete->execute();
        $requete->closeCursor();
    }

    catch (Exception $e) {
        echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
        die("Fin du script (script_artist_modif.php)");
    }

    if ($image !== Null) {
        // Si oui, on récupére le nom de l'ancienne image à supprimer
        $requete = $db->prepare("SELECT artist_picture
                               FROM artist
                               WHERE artist_id = :id;
                             ");
        $requete->bindValue(":id", $id, PDO::PARAM_INT);
        $requete->execute();
        $picture = $requete->fetch(PDO::FETCH_OBJ);
        $requete->closeCursor();

        // On supprime l'ancienne image du dossier "artist_picture"
        unlink("../assets/img/artist_pictures/$picture->artist_picture");

        try {
            $requete = $db->prepare(
                "UPDATE artist
                SET artist_picture = :image
                WHERE artist_id    = :id;
                ");
            $requete->bindValue(":id",     $id,     PDO::PARAM_INT);
            $requete->bindValue(":image",    $image,    PDO::PARAM_STR);
            
            $requete->execute();
            $requete->closeCursor();
        }

        catch (Exception $e) {
            echo $e;
            echo "<br>Erreur update image : " . $requete->errorInfo()[0] . "<br>";
            die("Fin du script (script_artist_modif.php)");
        }
    }

    // Si OK: redirection vers la page artist_detail.php
    header("Location: artists.php");
    exit;
?>