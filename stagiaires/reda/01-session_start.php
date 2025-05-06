<?php


# démarrage de session
session_start();

# si la variable de session 'ConnectTimeUnix' n'existe pas
# on, l'a créée.
if(!isset($_SESSION['ConnectTimeUnix'])){

  $_SESSION['ConnectTimeUnix'] = time();
  // creation d'un compteur
  $_SESSION['countView'] = 1;


}

var_dump($_SESSION);

# Afficher le temps de connexion en secondes depuis que l'utilisateur est connecté
$ConnectTime = time() - $_SESSION['ConnectTimeUnix'];
echo $_SESSION['countView']++;


echo "<br>  ".$_SESSION['countView']." vues depuis : ".$ConnectTime." secondes  <br>";

# affichage de la session id
echo session_id();