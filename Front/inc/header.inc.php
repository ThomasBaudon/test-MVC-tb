<?php
    require_once('../Models/pdo.php');
    require_once('../Models/User.php');
    require_once('../Models/UserManager.php');

    $userManager = new UserManager($pdo);
    $connected = $userManager->clientConnected();

    if($connected == true){
        $lastname = $_SESSION['client']['lastname'];
        $firstname = $_SESSION['client']['firstname'];
    }

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Hotello - front</title>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap"
        rel="stylesheet"
        />
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        <link rel="stylesheet" href="./assets/css/style.css" />
    </head>
    <body>