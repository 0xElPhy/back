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
        if (isset($_POST['annee']) && $_POST['annee'] != "") {
            $annee = $_POST['annee'];
        }
        else {
            $annee = Null;
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
        if (!empty($_FILES['pochette']) && $_FILES['pochette']['error'] == 0) {
            // On met les types autorisés dans un tableau (ici pour une image)
            $aMimeTypes = array("jpeg" => "image/jpeg", 
                                "png"  => "image/png",
                                "gif"  => "image/gif");

            // On extrait le type du fichier via l'extension FILE_INFO 
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mimetype = finfo_file($finfo, $_FILES["pochette"]["tmp_name"]);
            finfo_close($finfo);

            if (in_array($mimetype, $aMimeTypes)) {
                // Le type est parmi ceux autorisés, donc OK, on va pouvoir  déplacer et renommer le fichier
                $pochette = preg_replace('/\s+/', '_',strtolower($titre))
                            .'_'
                            .mt_rand(1000,9999)
                            .'.'
                            .explode('/', $mimetype)[1];

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
        if ($titre == Null || $artist_id == Null || $annee == Null || $genre == Null || $label == Null || $prix == Null || $pochette == Null) {
            header("Location: disc_new.php");
        }

    // Connexion à la BDD
        require "../db.php";
        $db = connexionBase();

        var_dump($_REQUEST);
        var_dump($pochette);

        echo "<br>";

        try {
            // Construction de la requête INSERT sans injection SQL :
            $requete = $db->prepare(
                    "INSERT INTO disc (disc_title, disc_year, disc_picture, disc_label, disc_genre, disc_price, artist_id)
                    VALUES (:titre, :annee, :pochette, :label, :genre, :prix, :artist_id);
                    ");

            // Association des valeurs aux paramètres via bindValue() :
          
            $requete->bindValue(":titre",     $titre, PDO::PARAM_STR);
            $requete->bindValue(":annee",     $annee, PDO::PARAM_INT);
            $requete->bindValue(":pochette",  $pochette, PDO::PARAM_STR);
            $requete->bindValue(":label",     $label, PDO::PARAM_STR);
            $requete->bindValue(":genre",     $genre, PDO::PARAM_STR);
            $requete->bindValue(":prix",      $prix, PDO::PARAM_STR);
            $requete->bindValue(":artist_id", $artist_id, PDO::PARAM_STR);

            // Lancement de la requête :
            $requete->execute();

            // Libération de la requête (utile pour lancer d'autres requêtes par la suite) :
            $requete->closeCursor();
        }

    // Gestion des erreurs
        catch (Exception $e) {
            var_dump($requete->queryString);
            var_dump($requete->errorInfo());
            echo $e->getmessage()."<br>";
            die("Fin du script (script_discs_ajout.php)");
        }

    // Si OK: redirection vers la page discs.php
        header("Location: discs.php");

    // Fermeture du script
        exit;
?>