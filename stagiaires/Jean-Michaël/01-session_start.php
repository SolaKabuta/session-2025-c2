<?php

    session_start();

    if (!isset($_SESSION['depart'])) {
        $_SESSION['depart'] = time();
    }

    if (!isset($_SESSION['visit'])) {

        $_SESSION['visit'] = 1;

    } else {

        $_SESSION['visit']++;
    }

    var_dump($_SESSION);

    echo $_SESSION['visit']." visites depuis ".(time() - $_SESSION['depart'])." secondes<br><br>";

    echo "Votre id : ".session_id();
