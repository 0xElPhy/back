<?php
    // Récupération du Titre
        if (isset($_POST['titre']) && $_POST['titre'] != "") {
            $titre = $_POST['titre'];
        }
        else {
            $titre = Null;
        }

    // Récupération de l'id Artiste :
        if (isset($_POST['artist_id']) && $_POST['artist_id'] != "") {
            $artist_id = $_POST['artist_id'];
        }
        else {
            $artist_id = Null;
        }

    // Récupération de l'Année :
        if (isset($_POST['année']) && $_POST['année'] != "") {
            $année = $_POST['année'];
        }
        else {
            $année = Null;
        }

    // Récupération du Genre :
        if (isset($_POST['genre']) && $_POST['genre'] != "") {
            $genre = $_POST['genre'];
        }
        else {
            $genre = Null;
        }

    // Récupération du Label :
        if (isset($_POST['label']) && $_POST['label'] != "") {
            $label = $_POST['label'];
        }
        else {
            $label = Null;
        }

    // Récupération du Prix :
        if (isset($_POST['prix']) && $_POST['prix'] != "") {
            $prix = $_POST['prix'];
        }
        else {
            $prix = Null;
        }
    
    // Récupération du Fichier de la pochette :
        if (isset($_POST['pochette']) && $_POST['pochette'] != "") {
            // On met les types autorisés dans un tableau (ici pour une image)
            $aMimeTypes = array("img/gif", "img/jpeg", "img/pjpeg", "img/png", "img/x-png", "img/tiff");

            // On extrait le type du fichier via l'extension FILE_INFO 
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mimetype = finfo_file($finfo, $_FILES["pochette"]["tmp_name"]);
            finfo_close($finfo);

            if (in_array($mimetype, $aMimeTypes)) {
                /* Le type est parmi ceux autorisés, donc OK, on va pouvoir 
                déplacer et renommer le fichier */
                $pochette = $_POST['pochette'];
                move_uploaded_file($_FILES["pochette"]["tmp_name"], "/back/serveur/php/PDO/assets/img/disc_pictures/$titre.jpg");
            } 
            else {
                // Le type n'est pas autorisé, donc ERREUR
                echo "Type de fichier non autorisé";
                exit;
            }

        }
        else {
            $pochette = Null;
        }

    // En cas d'erreur, on renvoie vers le formulaire
        if ($titre == Null || $artist_id == Null || $année == Null || $genre == Null || $label == Null || $prix == Null || $pochette == Null) {
            //header("Location: disc_new.php");
            echo "Valeurs renseignées dans le formulaire :<br><br>";
            var_dump($_REQUEST);
            foreach ($_REQUEST as $key=>$value)
            {
                if (empty($value)) {
                    $value = "null";
                }
                echo "$key : $value<br>";
            }
            exit;
        }

    // Connexion à la BDD
        require "../db.php";
        $db = connexionBase();

    // 
        try {
            // Construction de la requête INSERT sans injection SQL :
            $requete = $db->prepare(
                    "INSERT INTO disc (disc_title, disc_year, disc_picture, disc_label, disc_genre, disc_price, artist_id)
                    VALUES (:titre, :année, :pochette, :label:, :genre, :prix, :artist_id);
                    ");

            // Association des valeurs aux paramètres via bindValue() :
            $requete->bindValue(":titre", $titre, PDO::PARAM_STR);
            $requete->bindValue(":année", $année, PDO::PARAM_STR);
            $requete->bindValue(":pochette", $pochette, PDO::PARAM_STR);
            $requete->bindValue(":label", $label, PDO::PARAM_STR);
            $requete->bindValue(":genre", $nom, PDO::PARAM_STR);
            $requete->bindValue(":prix", $prix, PDO::PARAM_STR);
            $requete->bindValue(":artist_id", $artist_id, PDO::PARAM_STR);

            // Lancement de la requête :
            //$requete->execute();

            // Libération de la requête (utile pour lancer d'autres requêtes par la suite) :
            $requete->closeCursor();
        }

    // Gestion des erreurs
        catch (Exception $e) {
            var_dump($requete->queryString);
            var_dump($requete->errorInfo());
            echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
            die("Fin du script (script_artist_ajout.php)");
        }

    // Si OK: redirection vers la page artists.php
    //header("Location: discs.php");
        echo "Valeurs renseignées dans le formulaire :<br><br>";

        foreach ($_REQUEST as $key=>$value)
        {
            if (empty($value)) {
                $value = "null";
            }
            echo "$key : $value<br>";
        }

    // Fermeture du script
        exit;
?>