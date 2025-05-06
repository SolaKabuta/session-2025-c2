<?php
// Lancement de la session
session_start();
// si notre session n'est pas valide
// (login et/mot de passe non vérifiés)
if (isset($_SESSION['idSession']) || $_SESSION['idSession'] != session_id()) {
    header("Location: ./");;
    exit();
}

// on veut se déconnecter
if (isset($_GET['disconnect']))
    # on vide la session de ses valeurs
    $_SESSION = [];
# suppression du cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

# Destruction du fichier
session_destroy();

# redirection vers la page d'accueil
header("Location: ./");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administration</title>
</head>
<body>
<main>
    <h1>Admin</h1>
    <p>Id de session : <?= session_id() ?></p>
    <nav>
        <a href="?disconnect">Déconnexion</a>
    </nav>
</main>

</body>
</html>
