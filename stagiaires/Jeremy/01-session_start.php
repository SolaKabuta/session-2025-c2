<?php
// démarrage d'une seesion
// https://www.php.net/manual/fr/reserved.variables.session.php pour la variable $_SESSION
//et https://www.php.net/manual/fr/function.session-start.php pour le démarrage de session
/*
*Création du cookie sur le navigateur de l'utilisateur
*il ne contient que le PHPSESSID 'identifiantde session)
*un fichier texte est crée c$oté serveur,il sera en lien avec l'id de session
*c'est là que seront stockés les informations de la session
*obligatoire pour lancer/récupérer une session
*/
session_start();

//Si la variable n'èxiste pas (ou vaut 0;''etc...)
//identique a iff(!isset()) quivérifie si la variable vaut null ou n'eiste pas

if(empty($_SESSION['ConnectUnixTime'])){
    //création du temps en secondes depuis 01/01/1970
    $_SESSION['ConnectUnixTime']= time();
    //Création d'un compteur
    $_SESSION['countView'] = 1;
}


//variable global de type $_SESSION
var_dump($_SESSION);

// on peu afficher le temps en secondes depuis qu'on est sur cette page
echo $_SESSION['countView']++;

echo 'vues depuis'. (time() - $_SESSION['ConnectUnixTime']). "secondes<br>";

//affichage de l'indentifiant de session

echo "<p>PHSESSID :".session_id()."</p>";
