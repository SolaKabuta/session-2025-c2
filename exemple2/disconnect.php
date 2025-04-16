<?php
# suivi de session
session_start();

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

# redirection sur p1.php
header("Location: p1.php");