<?php

require_once '../Models/pdo.php';

/* DECONNEXION */
if(isset($_GET['action']) && $_GET['action'] == 'deconnexion'){
    // session_destroy();
    session_unset();
    header('location:../front/index.php');
}
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotello</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Dashboard admin Hotello</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="admin_users.php">Clients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reviewsPage.php">Avis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contactPage.php">Contacts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="roomPage.php">Chambres</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_reservation.php">Réservations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin_services.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="equipmentsPage.php">Equipements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin_carrousel.php">Carrousel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?action=deconnexion">Déconnexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>