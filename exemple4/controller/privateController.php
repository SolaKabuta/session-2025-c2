<?php

if(isset($_GET['disconnect'])){
    disconnect();
    header("Location: ./");
    exit();
}

require_once "../view/privateView.php";