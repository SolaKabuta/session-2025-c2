<?php

# Lancement d'une session
# Prioritaire avant les dépendances
session_start();

# Chargement des dépendances
require_once "../config.php";
# appel du modèle (utilisé dans les 2 sous contrôleurs)
require_once "../model/UserModel.php";

# connexion
try{
    $db= mysqli_connect(DB_HOST,DB_LOGIN,DB_PWD,DB_NAME,DB_PORT);
    mysqli_set_charset($db,DB_CHARSET);
}catch(Exception $e){
    die($e -> getMessage());
}

# router entre connecté et non connecté

// nous sommes connectés !
if(isset($_SESSION['monId'])&&$_SESSION['monId']==session_id()){

    # chargement du contrôleur privé
    require_once "../controller/privateController.php";

// nous ne sommes pas connecté
}else{

    # chargement du contrôleur public
    require_once "../controller/publicController.php";

}

/*
exemple
$mdp = "lulu27";

echo $mdpcrypt = password_hash($mdp, PASSWORD_DEFAULT);

if(password_verify($mdp,$mdpcrypt)){
    echo "c'est le même";
}else{
    echo "ce n'est pas le même";
}
*/