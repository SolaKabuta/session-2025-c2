<?php
# lancement de session
session_start();

# si on est pas/plus connecté
if(!isset($_SESSION['monid'])&&$_SESSION['monid']!=session_id()){

    # redirection sur l'accueil
    header("Location: ./");
    exit();
}

# si on veut de se déconnecter
if(isset($_GET['disconnect'])){

    # destruction des variables de sessions (réinitialisation du tableau $_SESSION)
    $_SESSION = [];

    # suppression du cookie
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    # Destruction du fichier lié sur le serveur
    session_destroy();

    # redirection sur l'accueil
    header("Location: ./");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Partie privée du site</title>
</head>
<body>
<div style="margin: 30px; max-width: 600px;">
    <h1>Partie privée du site</h1>
    <nav style="display: flex; justify-content: flex-end;"><a href="?disconnect">déconnexion</a></nav>
    <h2>Bienvenue <?=$_SESSION['monnom']?> avec l'dentifiant de session : <?=$_SESSION['monid']?> </h2>
    <p>
        Dans un pays non spécifié, quelque part dans le monde, existe un service secret hautement qualifié et secret. Ils travaillent dans l'ombre, utilisant leur expertise pour protéger leur pays et leur peuple contre toutes les menaces, internes ou externes.<br><br>

        Ce service secret est constitué de personnes ayant des antécédents variés - anciens militaires, informaticiens, linguistes, psychologues - mais tous partagent un dévouement absolu envers leur mission. Ils sont tenus de travailler en secret, en utilisant des techniques sophistiquées pour communiquer et se coordonner sans éveiller les soupçons de personnes non autorisées.<br><br>

        Les missions du service secret peuvent varier considérablement. Ils peuvent être chargés de recueillir des renseignements sur des organisations criminelles ou des gouvernements étrangers hostiles, d'intercepter des communications dangereuses ou de déjouer des complots terroristes. Ils travaillent en étroite collaboration avec d'autres agences de sécurité et de renseignement à travers le monde, partageant des informations critiques pour assurer la sécurité internationale.<br><br>

        Le service secret utilise également des technologies de pointe pour aider à accomplir leur mission. Des drones d'observation sophistiqués, des logiciels de cryptage avancés et des outils de surveillance discrets sont tous utilisés pour collecter des informations critiques tout en minimisant les risques pour les agents sur le terrain.<br><br>

        Malgré leur formation rigoureuse et leur expertise technique, les membres du service secret sont constamment soumis à des situations dangereuses. Les opérations d'infiltration, de récupération et de surveillance peuvent tous comporter des risques mortels. Les membres du service secret sont formés pour gérer ces situations et pour travailler ensemble pour atteindre leurs objectifs.<br><br>

        La culture du secret est profondément ancrée dans ce service secret, et les membres sont tenus de ne jamais divulguer de détails sur leurs opérations à quiconque n'en a pas besoin. Les membres sont souvent appelés à travailler sous couverture, se faisant passer pour des employés d'entreprise, des touristes ou même des travailleurs humanitaires.<br><br>

        Le service secret est sous la supervision d'un gouvernement élu et est tenu de rendre compte de ses activités à un comité de surveillance parlementaire. Les membres sont également tenus de respecter les lois et les normes éthiques, même s'ils travaillent dans des situations où ces règles sont souvent remises en question.<br><br>

        En fin de compte, le service secret existe pour protéger les citoyens de leur pays contre les menaces internes et externes. Leur travail est difficile, dangereux et souvent ingrat, mais ils continuent de travailler dans l'ombre, gardant leur pays en sécurité et leur peuple protégé.
    </p>
</div>
</body>
</html>
