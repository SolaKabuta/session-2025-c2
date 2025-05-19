<?php

// Pour crypter le mot de passe des utilisateurs
// de exemple5MVC

if(isset($_POST['pwd'])){
    $pwd = $_POST['pwd'];
    // cryptage par défaut de PHP
    $pwdHash = password_hash($pwd,PASSWORD_DEFAULT );
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hachons nos mots de passes</title>
</head>
<body>
    <h1>Hachons nos mots de passes</h1>
<h2>Avec password_hash()</h2>
<p>Documentation : <a href="https://www.php.net/manual/fr/function.password-hash.php" target="_blank">password_hash()</a> </p>
<form action="" method="post">
    <input type="text" name="pwd" placeholder="Votre mot de passe à hacher">
    <input type="submit" value="hacher">
</form>
    <?php
    if(isset($pwd)):
    ?>
<p>Mot de passe non haché</p>
    <input type="text" value="<?=$pwd?>">
    <p>Mot de passe haché</p>
        <input type="text" size="100" value="<?=$pwdHash?>">
    <h3>Vérification avec password_verify()</h3>
        <p>Documentation : <a href="https://www.php.net/manual/fr/function.password-verify.php" target="_blank">password_verify()</a> </p>
    <?php
    if(password_verify($pwd,$pwdHash)){
        echo "<p>Ils collent ensemble</p>";
    }
    // modification du mot de passe pour que ça ne soit plus juste
    $pwd = $pwd."j";
        if(password_verify($pwd,$pwdHash)){
            echo "<p>Ils collent ensemble</p>";
        }else{
            echo "$pwd n'est plus le bon mot de passe";
        }
    endif;
    ?>
</body>
</html>
