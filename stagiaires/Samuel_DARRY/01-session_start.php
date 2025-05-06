<?php

// démarrage de la session
// voir https://www.php.net/manual/en/reserved.variables.session.php poour la variable $_SESSION
// et https://www.php.net/manual/en/function.session-start.php pour la fonction session_start() pour le démarrage de la session


/* 
*  Création du cookie sur le navigateur de l'utilisateur 
*  il ne contient que le PHPSESSID (identifiant de session).
*  Un fichier texte est crée côté serveur, il sera en lien
*  avec l'id de session, c'est là que seront stockées information de la session.
*  Obligatoire pour lancer/récupérer une session
*/
session_start();

// Si la variable n'existe pas (ou vaut 0, '' etc...)
// identique à if(!isset()) qui vérifie si la variable vaut null ou n'existe pas
if(empty($_SESSION['connectUnixTime'])) {

    // Création du temps en seconde depuis le 01/01/1970
    $_SESSION['connectUnixTime'] = time();

    // Création d'un compteur
    $_SESSION['countView'] = 1;
}


// Variable globale de type $_SESSION
var_dump(($_SESSION));

echo "<br>";
// On veut afficher le temps en secondes depuis qu'on est sur cette page
echo $_SESSION['countView']++;
echo ' vues depuis ' . (time() - $_SESSION['connectUnixTime']) . " secondes depuis la connexion<br>";

// Affichage de l'identifiant de session 
echo session_id();
