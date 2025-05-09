<?php
    session_start();

    $login = "root";
    $pass = "azerty";
    if(isset($_POST['nom'],$_POST['password'])){
        if($login === $_POST['nom'] && $pass === $_POST['password']){
            $_SESSION = $_POST;
            // ajouter l'identifiant de session
            $_SESSION['idSession'] = session_id(); 
            // suppresiono du mot de passe de la session
            unset($_SESSION['password']);
            header("Location: admin.php");

        }else{
            $error = "le nom d'utilisateur ou le mot de passe est incorrect";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
</head>
<body>
    <h1>Acceueil</h1>
    <h2>Accès réservé</h2>
    <h3>Connexion</h3>
    <p> id de session : <?=session_id()?></p>
    <?php if(isset($error)):?>
        <h3 style="color:red;"><?=$error?></h3>
    <?php endif; ?>
    <form action="" method="POST" style="display: flex; flex-direction: column; width: 300px; margin:auto;">
        <Label for="name">nom</Label>
        <input type="text" name="nom" required>

        <Label for="password">mot de passe</Label>
        <input type="password" name="password" required>
        <button type="submit">Envoyer</button>
    </form>
    <br>
    <?php var_dump($_POST,$_SESSION)?>
</body>
</html>