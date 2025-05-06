<?php
    session_start();

    if(empty($_SESSION['idSession']) || $_SESSION['idSession']!== session_id()){
        header("Location: ./");
        exit();
    }
    if(isset($_GET['disconnect'])){
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
</head>
<body>
    <h1>Administration</h1>
    <h2></h2>
    <p> id de session : <?=session_id()?></p>
    <a href="./">Acceuil</a> | <a href="?disconnect"> Déconnection</a>
    <br>
    <?php var_dump($_SESSION)?>

</body>
</html>