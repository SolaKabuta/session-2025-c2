<?php
# suivi de session
session_start();

// si la session n'est pas valide
if (!isset($_SESSION['username']) || $_SESSION['monId'] !== session_id()) {
  header("Location: ./");
  exit();
}

if(isset($_GET['disconnect'])){
  # destruction des variables de sessions (réinitialisation du tableau $_SESSION)
  $_SESSION = [];

  # suppression du cookie
  if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
      $params["path"], $params["domain"],
      $params["secure"], $params["httponly"]
    );
  }

  # Destruction du fichier lié sur le serveur
  session_destroy();

  # redirection sur l'accueil
  header("Location: ./");
  exit();
}

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Admin</title>
</head>
<body>
<h1>Admin page</h1>
<p>Id de la session : <?= session_id() ?></p>
<nav>
  <a href="./">Accueil</a> | <a href="?disconnect">Déconnexion</a>
</nav>

</body>
</html>
