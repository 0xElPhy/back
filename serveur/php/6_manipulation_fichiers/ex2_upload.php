<?php
    var_dump($_FILES);
    var_dump($_FILES["fichier"]["error"]);

    if ($_FILES["fichier"]["error"] > 0)
    {
        echo "Erreur ! Ceci n'est pas bon !+"; 
    }
    else
    {
        echo "Pas d'erreur, tout roule !<br><br>";
    }

    // On met les types autorisés dans un tableau (ici pour une image)
    $aMimeTypes = array("application/sql", "img/gif", "img/jpeg", "img/pjpeg", "img/png", "img/x-png", "img/tiff");

    // On extrait le type du fichier via l'extension FILE_INFO 
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimetype = finfo_file($finfo, $_FILES["fichier"]["tmp_name"]);
    finfo_close($finfo);

    if (in_array($mimetype, $aMimeTypes))
    {
        /* Le type est parmi ceux autorisés, donc OK, on va pouvoir 
        déplacer et renommer le fichier */
        echo '<script>alert("Tout roule")</script>';
    } 
    else 
    {
        // Le type n'est pas autorisé, donc ERREUR
        echo '<script>alert("Type de fichier non autorisé")</script>';
        echo "Type de fichier non autorisé";    
        exit;
    }    
    ?>