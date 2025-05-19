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


echo '<h4>session_id() ou SID</h4>';
var_dump(session_id());
var_dump($db);
echo '<h4>$_GET</h4>';
var_dump($_GET);
echo '<h4>$_SESSION</h4>';
var_dump($_SESSION);
echo '<h3>$_POST</h3>';
var_dump($_POST);
echo '<h4>$connect</h4>';
var_dump($connect);

// bonne pratique
$db=null;