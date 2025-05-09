<?php
// lancement de la session
session_start();

// Nous sommes dans une session valide
if(isset($_SESSION['idSession']) && $_SESSION['idSession'] === session_id()){

    // rediction vers l'admin
    header("Location: admin.php");
    exit();
}

// Création d'un login et d'un mot de passe
$login = "Sdary";
$pass = "1234Sdary";

// formulaire envoyé
if(isset($_POST['nom'], $_POST['mdp'])) {

    // Si le login et le mot de passe sont juste
    if($login === $_POST['nom'] && $pass === $_POST['mdp']) {

        // On récupère les valeurs d'un tableau à l'autre
        $_SESSION = $_POST;
        // On ajoute l'identifiant de session
        $_SESSION['idSession'] = session_id();
        // Suppression du mot de passe de la session
        unset ($_SESSION['mdp']);

        // rediction vers l'admin
        header("Location: admin.php");
        exit();

    // Sinon création de l'erreur
    } else {
        $error = "Login et/ou mot de passe incorrect";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
</head>
<body>
<h1>Accueil</h1>
<h2>Accès réservé</h2>
<p>Id de session : <?=session_id()?></p>
<h3>Connexion</h3>
<?php
if(isset($error)):
?>
<h4 style ="color: red"><?=$error?></h4>
<?php
endif;
?>
<form action ="" method = "POST" name="nom">
    <input name="nom" type="text" required><br>
    <input name="mdp" type="password" required><br>
    <input type ="submit" value="se connecter">
</form>

<?php
var_dump($_POST, $_SESSION);
?>

</body>
</html>