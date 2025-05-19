<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exemple 5 | À propos de nous</title>
</head>
<body>
<nav>
    <a href="./">Accueil</a> |
    A propos |
    <?php
    if(isset($_SESSION['userlogin'])):
        ?>
        <a href="./?p=admin">Administration</a> |
        <a href="./?p=disconnect">Déconnexion</a> | de votre compte <?=$_SESSION['userlogin'] ?>

    <?php
    else:
        ?>
        <a href="./?p=connect">Connexion</a> |
    <?php
    endif;
    ?>
</nav>
<h1>Exemple 5 | À propos de nous</h1>
<h2>CF2m</h2>
<p>Le centre de formation est ouvert à tous</p>
<p>Le Centre de Formation 2 Mille (CF2m), implanté à Saint-Gilles, propose des formations professionnelles en informatique pour chercheurs et chercheuses d’emploi ainsi que des formations de base et de détermination pour les jeunes de 18 à 29 ans. Il a pour mission de lutter contre toutes les formes d’exclusion sociale et culturelle et contre les discriminations dans l’accès à la formation et à l’emploi.</p>

<p>Le CF2m est donc actif dans le secteur de l’insertion sociale et professionnelle pour chercheurs et chercheuses d’emploi, indemnisé.e.s ou non.</p>

<p>En partenariat avec Bruxelles-Formation et Actiris.</p>
<p>Visant l’insertion professionnelle dans des secteurs porteurs, nos formations sont dispensées en cours du jour en partenariat avec Bruxelles-Formation et Actiris. Elles se clôturent par un stage en entreprise de 6 semaines. Enfin, un accompagnement social et une aide à la recherche d’emploi complètent les services offerts aux chercheurs et chercheuses d’emploi.</p>

<p>Le CF2m, un acteur de l’économie sociale à Bruxelles.</p>
<p>Le Centre de Formation 2 Mille est également actif dans le secteur de l’économie sociale : d’une part dans le réemploi informatique et la dématérialisation de déchets électriques et électroniques, et d’autre part, dans la communication numérique (services graphiques : prépresse, imprimerie et création de sites web).</p>

<p>En outre, le CF2m est doté d’un pôle recherche et développement dans le secteur environnemental pour l’accès aux ressources et à l’entreprenariat social.</p>
</body>
</html>