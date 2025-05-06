<?php
// creation du cookie sur le navigateurde l utilisateur 
// il ne contient que le PHPSESSID (identifiant de session)
// un fichier texte est creer cote serveur , il sera en lien avec l'id de session
// c est la qui seront stoke les information du session
session_start();
if(empty($_SESSION['ConectunixTime'])){
// creation du temps en seconde depuis 01/01/1970
$_SESSION['ConectunixTime']=time();
}
// creation du compteur


// variable glogale de type $_SESSION
var_dump($_SESSION);
echo $_SESSION['countView']++;
echo 'vues depuis'. (time() - $_SESSION['ConectunixTime']) . "secondes<br>";

// affichage de l identifiant de session
echo session_id();