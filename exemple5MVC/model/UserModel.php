<?php
# exemple5MVC/model/UserModel.php

/*
 * Fonction qui permet la tentative de connexion
 * d'un utilisateur
 */
function connectUser(PDO $con, string $login, string $password): bool
{
    // par sécurité (extrême) sur les sessions
    // en cas de tentive de reconnexion, on supprime
    // l'ancienne session (cookie + fichier texte)
    // et on régénère un identifiant
    session_regenerate_id(true);
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