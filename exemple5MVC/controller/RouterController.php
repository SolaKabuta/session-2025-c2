<?php

if(isset($_GET['p'])){
    switch ($_GET['p']){
        case "connect":

            include "../view/login.view.html.php";
            break;
        default :
            include "../view/homepage.view.html.php";
    }


}else {

// chargement de la page d'accueil
    include "../view/homepage.view.html.php";

}