<?php
# exemple5MVC/model/UserModel.php

/*
 * Fonction qui permet la tentative de connexion
 * d'un utilisateur
 */
function connectUser(PDO $con, string $login, string $password): bool
{
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

    }catch(Exception $e){
        die($e->getMessage());
    }

    return true;
}