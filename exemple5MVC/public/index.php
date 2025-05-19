<?php
# exemple5MVC/public/index.php

/*
 * Contrôleur frontal
 */


// création de la session (ou continuation)
// crée un cookie nommé PHPSESSID côté utilisateur
// crée un fichier texte lié côté serveur
session_start();

// dépendances
require_once "../config-dev.php";

try{
    // instanciation de PDO
    $db = new PDO(DB_DSN,DB_LOGIN,DB_PWD);
    // par défaut, on obtient des tableaux associatifs
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
    // on active l'affichage des erreurs
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(Exception $e){
    die($e->getMessage());
}

// chargement du routeur public
require_once "../controller/PublicController.php";



var_dump($db);
echo '<h3>$_GET</h3>';
var_dump($_GET);
echo '<h3>$_SESSION</h3>';
var_dump($_SESSION);
echo '<h3>$_POST</h3>';
var_dump($_POST);
echo '<h3>$connect</h3>';
var_dump($connect);

// bonne pratique
$db=null;