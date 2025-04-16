<?php

// connexion d'un user
function connectUser(mysqli $myDB, string $uname, string $upwd): string|bool {

    // traitement du username pour éviter une injection sql
    // lié à la connexion mysqli (jeux de caractères)
    $uname = mysqli_real_escape_string($myDB,$uname);

    // sql - récupération via le username uniquement
    $sql="SELECT * FROM user WHERE username='$uname';";

    try {
        // exécution de la requête
        $query = mysqli_query($myDB, $sql);
        
    }catch(Exception $e){

        // envoie de texte en cas d'erreur
        return $e->getMessage();
    }
    
    // si on a pas récupéré d'utilisateur, on quitte en envoyant un message
    if(mysqli_num_rows($query)==0) return "Login ou mot de passe incorrecte";

    // conversion de l'utilisateur en tableau associatif
    $recup = mysqli_fetch_assoc($query);

    // vérification du mot de passe tapé = DB (crypté)
    if (password_verify($upwd, $recup['password'])) {

        // création de session avec le contenu de notre requête SQL
        $_SESSION = $recup;
        // suppression du mot de passe et de l'id unique
        unset($_SESSION['password'],$_SESSION['uniqid']);
        // création de notre variable prouvant la validité de la session
        $_SESSION['monId'] = session_id();

        // on envoie vraie si la connexion est une réussite
        return true;

    }else{
        return "Login ou mot de passe incorrecte";
    }
    
    

}

// déconnexion d'un user

function disconnect(){
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
}