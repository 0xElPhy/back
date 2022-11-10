<?php
//    header('content-type: text/css');
//    ob_start('ob_gzhandler');
//    header('Cache-Control: max-age=31536000, must-revalidate');
?>
<head>
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="style_nav.php"> -->
    <link rel="stylesheet" href="/back/serveur/php/PDO/assets/css/nav.css">
</head>

<nav class="">
    <a class="onglet artistes " href="/back/serveur/php/PDO/tab_artists/artists.php">
        <h2 class="navbar-brand">Artistes</h2>
    </a>

    <a class="onglet disques" href="/back/serveur/php/PDO/tab_discs/discs.php">
        <h2 class="navbar-brand">Disques</h2>
    </a>
</nav>