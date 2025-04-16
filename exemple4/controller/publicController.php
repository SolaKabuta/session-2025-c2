<?php
//echo __FILE__;
# Contrôleur public

// si le formulaire a été envoyé
if(isset($_POST['username'],$_POST['password'])){

    // protection des données utilisateurs
    $username = htmlspecialchars(strip_tags(trim($_POST['username'])),ENT_QUOTES);
    $password = htmlspecialchars(strip_tags(trim($_POST['password'])),ENT_QUOTES);

    // is_connected contient l'état de la connexion
    $is_connect = connectUser($db,$username,$password);

    // si c'est une chaîne de caractère
    if (is_string($is_connect)) {
        $erreur = $is_connect;
    }

    // redirection si connexion ok
    if ($is_connect===true) {
        // redirection sur index.php
        header("Location: ./");
        exit();
    }
    

}

include_once "../view/publicView.php";