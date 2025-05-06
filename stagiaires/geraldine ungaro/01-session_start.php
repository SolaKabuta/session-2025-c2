<?php
//démarrage d'une session

/* Création du cookie sur le navigateur de l'utilisateur, 
il ne contient que le PHPSESSID (Identifiant de session)
Un fichier texte est créé côté serveur, om sera en lien avec l'id de session,
c'est là que seront stocké les informations de la session
*/


session_start();
// si la variable n'existe pas (ou vaut 0, etc..)
// identique à if (!isset()) qui vérifie si la variable vaut null ou n'existe pas 

if(empty($_SESSION['inuxTime'])){
    //création du temps en secondes depuis le 01/01/1970
$_SESSION['inuxTime'] = time();
// Création d'un compteur
$_SESSION['countView'] = 1;
}

// variable globale de type $_SESSION
var_dump($_SESSION);


//on veut afficher le temps en secondes depuis que l'on est sur cette page

echo $_SESSION['countView']++;
echo ' vue depuis '.time() - $_SESSION['inuxTime']. " secondes<br>";

//affichage de la variable de l'identifiant de session 

echo session_id();