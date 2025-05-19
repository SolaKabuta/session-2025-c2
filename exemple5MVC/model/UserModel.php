<?php
# exemple5MVC/model/UserModel.php


/**
 * Fonction qui permet la tentative de connexion
 * d'un utilisateur
 * @param PDO $con
 * @param string $login
 * @param string $password
 * @return bool
 *
 */
function connectUser(PDO $con, string $login, string $password): bool
{
    // par sécurité (extrême) sur les sessions
    // en cas de tentative de reconnexion, on supprime
    // l'ancienne session (cookie + fichier texte)
    // et on régénère un identifiant
    session_regenerate_id(true);
    // on supprime la copie des datas dans le nouveau fichier
    session_unset();
    // on récupère l'utilisateur via son login
    // le mot de passe doit être vérifié côté PHP
    $sql = "SELECT * FROM `user` u WHERE u.`userlogin` = ?";
    // requête préparée
    $prepare = $con->prepare($sql);

    try{
        // récupération de l'utilisateur via son login
        $prepare->execute([$login]);
        // si on a pas récupéré le login
        if($prepare->rowCount()!==1) return false;

        // récupération des données de l'utilisateur
        $user = $prepare->fetch();

        // bonne pratique
        $prepare->closeCursor();

        // on va vérifier la validité du mot de passe haché
        // avec password_hash() lors de l'insertion dans la DB
        // en utilisant password_verify()
        if(password_verify($password,$user['userpwd'])){
            // mot de passe correct !
            // on remplit la session avec le
            // résultat de la requête
            $_SESSION = $user;
            // on retire de la session le mot de passe
            unset($_SESSION['userpwd']);
            return true;
        // mot de passe incorrecte
        }else{
            return false;
        }


    }catch(Exception $e){
        die($e->getMessage());
    }

}

/**
 * Déconnexion de session
 * @return void
 */
function disconnectUser(): void
{
    # suppression des variables de sessions
    session_unset();

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