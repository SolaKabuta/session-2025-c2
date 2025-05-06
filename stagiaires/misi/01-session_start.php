<?php

// creation du cookie sur le navigateur de l'utilisateur
session_start();

if(empty($_SESSION["ConnectUnixTime"])){
    // echo "sa marche";
    $_SESSION["ConnectUnixTime"] = time();
    $_SESSION['countView'] = 1;
}

// variable global de type $_SESSION 
var_dump($_SESSION);

echo "<br> " . $_SESSION['CountView']++ .' vues ';
echo 'depuis ' . ( time() - $_SESSION["ConnectUnixTime"]) . "secondes";
