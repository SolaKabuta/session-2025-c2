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


// chargement d'une vue
include "../view/homepage.view.html.php";

echo '<h3>$_GET</h3>';
var_dump($_GET);
echo '<h3>$_SESSION</h3>';
var_dump($_SESSION);
echo '<h3>$_POST</h3>';
var_dump($_POST);