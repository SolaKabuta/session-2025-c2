<?php
// Lancement de la session
session_start();

if(isset($_SESSION['monId']) && $_SESSION['monId'] === session_id()){
  // si la session est valide
  header("location: admin.php");
  exit();
}

//création d'un login et un mot de passe

$login = "reda";
$pwd = "reda33";


if(isset($_POST['username'], $_POST['password'])){
  // si le login et mot de passe sont bons
  if($login === $_POST['username'] && $pwd === $_POST['password']){
    // on récupère les valeurs d'un tableau
    $_SESSION = $_POST;
    // Ajout de l'id de session
    $_SESSION['monId'] = session_id();
    // suppression du mot de passe de la session
    unset($_SESSION['password']);
    // redirection vers l'admin
    header("location: admin.php");
    exit();

  }else {
    // si le login et/ou mot de passe sont incorrects
    $error = "Login et/ou mot de passe incorrect";
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
  <title>Accueil</title>
</head>
<body>
  <h1>Accueil</h1>
<h2>Accés résérvé</h2>
  <p>Id de session <?= session_id() ?></p>
<h3>Connexion</h3>
  <?php
  if(isset($error)): ?>

    <h4 style="color:red;"><?= $error ?></h4>

  <?php endif ?>

  <form action="" method="post" name="nom">
    <label for="username"><b>Nom d'utilisateur</b></label>
    <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

    <label for="password"><b>Mot de passe</b></label>
    <input type="password" placeholder="Entrer le mot de passe" name="password"  required>

    <input type="submit" id='submit' value='LOGIN' >
  </form>
<?php
  var_dump($_SESSION, $_POST);
?>
</body>
</html>