<?php
    // Récupération des valeurs :
    $disc_id = (isset($_POST['disc_id']) && $_POST['disc_id'] != "") ? $_POST['disc_id'] : Null;
    $titre = (isset($_POST['titre']) && $_POST['titre'] != "") ? $_POST['titre'] : Null;
    
    $artist_id = (isset($_POST['artist_id']) && $_POST['artist_id'] != "") ? $_POST['artist_id'] : Null;
    $annee = (isset($_POST['annee']) && $_POST['annee'] != "") ? $_POST['annee'] : Null;
    $genre = (isset($_POST['genre']) && $_POST['genre'] != "") ? $_POST['genre'] : Null;
    $label = (isset($_POST['label']) && $_POST['label'] != "") ? $_POST['label'] : Null;
    $prix = (isset($_POST['prix']) && $_POST['prix'] != "") ? $_POST['prix'] : Null;
    
    // Récupération du Fichier de la pochette :
    if (isset($_FILES['pochette']) && $_FILES['pochette'] != "") {
        // On met les types autorisés dans un tableau (ici pour une image)
        $aMimeTypes = array("jpeg" => "image/jpeg", 
                                "png" => "image/png",
                            "webp" => "image/webp",
                                "gif" => "image/gif");

        // On extrait le type du fichier via l'extension FILE_INFO 
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimetype = finfo_file($finfo, $_FILES["pochette"]["tmp_name"]);
        finfo_close($finfo);

        if (in_array($mimetype, $aMimeTypes)) {
            /* Le type est parmi ceux autorisés, donc OK, on va pouvoir 
            déplacer et renommer le fichier */
            //$_FILES['pochette']['name'] = strtolower($titre).".".explode("/", $mimetype)[1];
            
            $pochette = strtolower($titre).".".explode("/", $mimetype)[1];
            $pochette = preg_replace('/\s+/', '_', $pochette);

            //var_dump(rename($_FILES['pochette']['name'], strlen($titre)));
            move_uploaded_file($_FILES["pochette"]["tmp_name"], "../assets/img/disc_pictures/$pochette");
        } 
        else {
            // Le type n'est pas autorisé, donc ERREUR
            echo "<script>alert('Type de fichier non autorisé')</script>";
            echo "Type de fichier non autorisé";
            exit;
        }
    }
    else {
        $pochette = Null;
    }
    

    // En cas d'erreur, on renvoie vers le formulaire
        if ($disc_id == Null || $artist_id == Null) {
            header("Location: discs.php");
        }
        elseif ($titre == Null || $annee == Null || $genre == Null || $label == Null || $prix == Null || $pochette == Null) {
            header("Location: disc_form.php?id=".$disc_id);
            exit;
        }

    // Si la vérification des données est ok :
        require "../db.php";
        $db = connexionBase();

    try {
        // Construction de la requête UPDATE sans injection SQL :
        $requete = $db->prepare(
                "UPDATE disc
                SET disc_title   = :titre,
                    disc_year    = :annee,
                    disc_picture = :pochette,
                    disc_label   = :label,
                    disc_genre   = :genre,
                    disc_price   = :prix,
                    artist_id    = :artist_id,
                WHERE disc_id    = :disc_id;
                ");
                
                $requete->bindValue(":disc_id",     $disc_id,     PDO::PARAM_INT);
                $requete->bindValue(":titre",       $titre,       PDO::PARAM_STR);
                $requete->bindValue(":annee",       $annee,       PDO::PARAM_INT);
                $requete->bindValue(":pochette",    $pochette,    PDO::PARAM_STR);
                $requete->bindValue(":label",       $label,       PDO::PARAM_STR);
                $requete->bindValue(":genre",       $genre,       PDO::PARAM_STR);
                $requete->bindValue(":prix",        $prix,        PDO::PARAM_STR);
                $requete->bindValue(":artist_id",   $artist_id,   PDO::PARAM_INT);

        $requete->execute();
        $requete->closeCursor();
    }

    catch (Exception $e) {
        echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
        die("Fin du script (script_disc_modif.php)");
    }

    // Si OK: redirection vers la page artist_detail.php
    header("Location: disc_details.php?id=".$disc_id);
    exit;
?>