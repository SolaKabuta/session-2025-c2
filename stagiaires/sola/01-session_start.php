<?php
// démarrage d'une session
// voir https://www.php.net/manual/fr/reserved.variables.session.php pour la variable $_SESSION
// et https://www.php.net/manual/fr/function.session-start.php pour le démarrage de session


/*
 * Création du cookie sur le navigateur de l'utilisateur,
 * Il contient que le PHPSESSID (identifant de session)
 * Un fichier texte est créé côté serveur, il sera un lien ave l'id de session
 * c'est là que seront stocké les informations de session
 * obligatoire pour lancer/récup
 */

session_start();

// si la variable n'existe pas (ou vaut 0, '', null, [], etc..)
// identique à if (isset()) qui vérifie si la variable vaut null ou n'existe pas
if(empty($_SESSION['ConnectUnixTime'])) {
    // Création du temps en secondes depuis 01/01/1970
    $_SESSION['ConnectUnixTime'] = time();
    // création d'un compteur
    $_SESSION['countView'] = 1;
}

// variable globale de type $_SESSION
var_dump($_SESSION);

// on veut afficher le temps en secondes depuis qu'on est sur cette page
echo $_SESSION['countView']++;
echo ' vues depuis ' . time() - $_SESSION['ConnectUnixTime'] . " secondes";

// Affichage de l'identifiant de la session
echo session_id();