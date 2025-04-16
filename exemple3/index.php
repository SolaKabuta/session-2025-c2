<?php
# lancement de session
session_start();
# création d'un login de connexion pour accéder
# à l'administration du site
$login ="michael";
$pwd ="4lulu3";

# si on est déjà connecté
if(isset($_SESSION['monid'])&&$_SESSION['monid']==session_id()){

    # redirection sur l'admin
    header("Location: admin.php");
    exit();
}

# si on essaye de se connecter
if(isset($_POST['username'],$_POST['password'])){

    # si le login et mot de passe sont bons
    if($login==$_POST['username']&&$pwd==$_POST['password']){

        # création de la variable de session contenant le phpsessid
        $_SESSION['monid'] = session_id();
        # et d'autres variables si on le souhaite
        $_SESSION['monnom'] = $login;

        # redirection vers l'admin
        header("Location: admin.php");
        exit();

    # sinon création d'une erreur
    }else{
        $erreur = "Login et/ou mot de passe incorrecte";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Site privé</title>
</head>
<body>
<div style="margin: 30px;">
    <h1>Site privé</h1>
    <form action="./" method="POST">
        <h2>Connexion</h2>
        <?php if(isset($erreur)): ?>
        <h3 style="color:red;"><?=$erreur?></h3>
        <?php endif ?>
        <label><b>Nom d'utilisateur</b></label>
        <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

        <label><b>Mot de passe</b></label>
        <input type="password" placeholder="Entrer le mot de passe" name="password" required>
        <input type="submit" id='submit' value='LOGIN' >
</div>
</body>
</html>
