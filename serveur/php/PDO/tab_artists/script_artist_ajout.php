<?php   
    // Récupération du Nom :
    if (isset($_POST['nom']) && $_POST['nom'] != "") {
        $nom = $_POST['nom'];
    }
    else {
        $nom = Null;
    }

    // Récupération de l'URL (même traitement, avec une syntaxe abrégée)
    $url = (isset($_POST['url']) && $_POST['url'] != "") ? $_POST['url'] : Null;

    // Récupération du Fichier de l'image :
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
    if ($nom == Null || $image == Null) {
        header("Location: artist_new.php");
        exit;
    }

    // S'il n'y a pas eu de redirection vers le formulaire (= si la vérification des données est ok) :
    require "../db.php";
    $db = connexionBase();

    try {
        // Construction de la requête INSERT sans injection SQL :
        $requete = $db->prepare("INSERT INTO artist (artist_name, artist_url, artist_picture) VALUES (:nom, :url, :image);");

        // Association des valeurs aux paramètres via bindValue() :
        $requete->bindValue(":nom", $nom, PDO::PARAM_STR);
        $requete->bindValue(":url", $url, PDO::PARAM_STR);
        $requete->bindValue(":image", $image, PDO::PARAM_STR);

        // Lancement de la requête :
        $requete->execute();

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
    header("Location: artists.php");
    
    // Fermeture du script
    exit;
?>