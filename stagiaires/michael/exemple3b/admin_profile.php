<?php
// obligatoire pour lancer/garder la session
session_start();

// si notre session n'est pas valide
// (login et/ou mot de passe non vérifiés)
if(empty($_SESSION['idSession'])|| $_SESSION['idSession']!== session_id()){
    // redirection vers l'accueil
    header("Location: ./");
    exit();
}

// on veut se déconnecter
if(isset($_GET['disconnect'])){
    # on vide la session de ses valeurs ou session_unset()
    $_SESSION = [];
    # suppression du cookie (par le navigateur)
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    # Destruction du fichier lié sur le serveur
    session_destroy();
    // redirection vers l'accueil
    header("Location: ./");
    exit();
}


?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administration | profile</title>
</head>
<body>
<h1>Administration</h1>
<h2>Bienvenue <?=$_SESSION['nom']?></h2>
<p>Id de session : <?=session_id()?></p>
<nav>
    <a href="./">Accueil</a> | <a href="./admin.php">Administration</a> | <a href="?disconnect">Déconnexion</a>
</nav>
<h3>Page de profil</h3>
</body>
</html>