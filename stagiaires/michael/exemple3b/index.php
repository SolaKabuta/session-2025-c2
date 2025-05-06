<?php
// lancement de la session
session_start();

// nous sommes dans une session valide
if(isset($_SESSION['idSession'])&&$_SESSION['idSession']===session_id()){
    // redirection vers l'administration
    header("Location: admin.php");
    exit();
}

// création d'un login et un mot de passe
$login = "lAdmin";
$pass = "1234admin";

// formulaire envoyé
if (isset($_POST['nom'], $_POST['mdp'])) {

    // si le login et mot de passe sont ok
    if ($login === $_POST['nom'] &&
        $pass === $_POST['mdp']
    ) {
        // on récupère les valeurs d'un tableau à l'autre
        $_SESSION = $_POST;
        // on ajoute l'identifiant de session
        $_SESSION['idSession']=session_id();
        // suppression du mot de passe de la session
        unset($_SESSION['mdp']);

        // redirection vers l'administration
        header("Location: admin.php");
        exit();

        // sinon création de l'erreur
    } else {
        $error = "Login et/ou mot de passe incorrecte";
    }
}
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
</head>
<body>
<h1>Accueil</h1>
<h2>Accès réservé</h2>
<p>Id de session : <?= session_id() ?></p>
<h3>Connexion</h3>
<?php
if (isset($error)):
    ?>
    <h4 style="color: red"><?= $error ?></h4>
<?php
endif;
?>
<form action="" method="post" name="nom">
    <input name="nom" type="text" required><br>
    <input name="mdp" type="password" required><br>
    <input type="submit" value="se connecter">
</form>
<?php
var_dump($_POST, $_SESSION);
?>
</body>
</html>