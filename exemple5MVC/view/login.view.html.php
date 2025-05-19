<?php
if(isset($_SESSION['userlogin'])){
    header("Location: ./");
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <title>Exemple 5 | Connexion</title>
</head>
<body>
<nav>
    <a href="./">Accueil</a> |
    <a href="./?p=about">A propos</a> |
    Connexion |
</nav>
<h1>Exemple 5 | Connexion</h1>
<h2>Veuillez vous connecter</h2>
<?php
if(isset($error)):
?>
<h3 class="error"><?=$error?></h3>
<?php
endif;
?>
<form action="" name="connect" method="post">
    <input type="text" name="userlogin" placeholder="Votre login" required><br>
    <input type="password" name="userpwd" placeholder="Votre mot de passe" required><br>
    <input type="submit" value="se connecter">
</form>
</body>
</html>