<?php
# exemple5MVC/controller/PublicController.php

// dépendances
require_once "../model/UserModel.php";

if(isset($_GET['p'])){
    switch ($_GET['p']){
        // page de connexion
        case "connect":
            // si le formulaire est envoyé
            if(isset($_POST["userlogin"],$_POST["userpwd"])){
                // on va tenter la connexion
                $connect = connectUser($db,$_POST["userlogin"],$_POST["userpwd"]);
                // nous sommes bien connectés
                if($connect===true){
                    // redirection vers l'accueil
                    header("Location: ./");
                    exit();
                }else{
                    $error = "Login et/ou mot de passe incorrecte(s)";
                }
            }
            // appel du formulaire
            include "../view/login.view.html.php";
            break;
        case "about":
            include "../view/about.view.html.php";
            break;
        default :
            include "../view/homepage.view.html.php";
    }


}else {

// chargement de la page d'accueil
    include "../view/homepage.view.html.php";

}