<?php
# exemple5MVC/controller/PrivateController.php

// dépendances
require_once "../model/UserModel.php";

if(isset($_GET['p'])){
    switch ($_GET['p']){
        // page de déconnexion
        case "disconnect":
            disconnectUser();
            header("Location: ./");
            exit();
        case "about":
            include "../view/about.view.html.php";
            break;
        case "admin":
            include "../view/admin.view.html.php";
            break;
        default :
            include "../view/homepage.view.html.php";
    }


}else {

// chargement de la page d'accueil
    include "../view/homepage.view.html.php";

}