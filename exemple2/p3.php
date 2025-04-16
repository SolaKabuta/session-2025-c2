<?php
# démarrage de session
session_start();

# stockage du PHPSESSID (id de session)
$_SESSION['idsession']=session_id();

$_SESSION['logs'][] = date("Y-m-d H:i:s")." | ".$_SERVER['REMOTE_ADDR']." | ".$_SERVER['HTTP_USER_AGENT']." | ".$_SERVER['SCRIPT_NAME'];


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>p3</title>
</head>
<body>
<div style="display:block; max-width: 70%; margin: auto;">

<h1 style="text-align: center">p3</h1>
<nav style="display: flex; justify-content: space-around; ">
    <a href="p1.php">p1</a> <a href="p2.php">p2</a> <a href="p3.php">p3</a> <a href="p4.php">p4</a>
    <a href="disconnect.php">déconnexion</a>
</nav>
    <div style="margin: 30px;">
        <h3>Id de session : <?=$_SESSION['idsession']?></h3>
        <p>
<?php
foreach ($_SESSION['logs'] as $item) {
    echo $item . "<br>";
}
?>
        </p>
    </div>
</div>
</body>
</html>