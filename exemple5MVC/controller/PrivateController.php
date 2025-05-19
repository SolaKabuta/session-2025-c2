<?php
# exemple5MVC/controller/PrivateController.php

// dépendances
require_once "../model/UserModel.php";
require_once "../model/ArticleModel.php";

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
            $iduser = (int) $_SESSION['iduser'];
            if(isset($_POST['articletitle'],$_POST['articletext'])){
                $insert = insertArticle($db,$_POST['articletitle'],$_POST['articletext'],$iduser);

                if($insert===true){
                    header("Location: ./");
                    exit();
                }else{
                    $error = "Echec lors de l'insertion";
                }
            }
            include "../view/admin.view.html.php";
            break;
        default :
            $articles = getAllArticle($db);
            include "../view/homepage.view.html.php";
    }


}else {

    $articles = getAllArticle($db);
// chargement de la page d'accueil
    include "../view/homepage.view.html.php";

}