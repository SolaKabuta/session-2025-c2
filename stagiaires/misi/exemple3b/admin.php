<?php
    session_start();

    if(empty($_SESSION['idSession']) || $_SESSION['idSession']!== session_id()){
        header("Location: index.php");
        exit();
    }
    if(isset($_GET['disconnect'])){
        $_SESSION = [];
     
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
</head>
<body>
    <h1>Administration</h1>
    <h2></h2>
    <p> id de session : <?=session_id()?></p>
    <a href="./">Acceuil</a> | <a href="?disconnect" >déconnection</a>

</body>
</html>