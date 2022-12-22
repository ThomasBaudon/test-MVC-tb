<?php 
    require_once('../Models/pdo.php');
    require_once('../Models/User.php');
    require_once('../Models/UserManager.php');


    $success = '';
    $erreurs = '';

    $userManager = new UserManager($pdo);
    $connect = $userManager->clientConnected();

    if(!$connect){
        header('location:connexion.php');
        exit();
    }

    if(isset($_GET['action']) && $_GET['action'] == 'deconnexion'){
        // session_destroy();
        session_unset();
        header('location:index.php');
    }

    $lastname = $_SESSION['client']['lastname'];
    $firstname = $_SESSION['client']['firstname'];
    $mail = $_SESSION['client']['mail'];
    $address = $_SESSION['client']['address'];
    $city = $_SESSION['client']['city'];
    $zipcode = $_SESSION['client']['zipcode'];
    $phone = $_SESSION['client']['phone'];
    $birthdate = $_SESSION['client']['birthdate'];
    $country = $_SESSION['client']['country'];
    $idCli = $_SESSION['client']['id_cli'];


    require_once('./inc/header.inc.php');
    require_once('./inc/top-nav.inc.php');
?>


<h2>Bonjour <?php echo $firstname." ".$lastname ?></h2>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">

        <div class="card mt-3 mb-3">
            <div class="card-header">
                Vos informations :
            </div>
            <div class="card-body">
                <h5 class="card-title">Nom : <?php echo $firstname?></h5>
                <h5 class="card-title">Prénom : <?php echo $lastname ?></h5>
                <h5 class="card-title">eMail : <?php echo $mail ?></h5>
                <h5 class="card-title">Tél. : <?php echo $phone ?></h5>
                <hr>
                <h5 class="card-title">Date de naissance : <?php echo $birthdate ?></h5>
                <hr>
                <h5 class="card-title">Adresse :</h5>
                <p class="card-text"><?php echo $address." ".$zipcode." ".$city ?></p>
                <p class="card-text"><?php echo $country ?></p>
                <hr>
                <a href="?action=update&id_cli=<?php echo $idCli?>" class="btn btn-warning">Modifier vos informations</a>
                <a href="?action=deconnexion" class="btn btn-danger">Se déconnecter</a>
            </div>
        </div>

        </div>
    </div>
</div>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">

        
        </div>
    </div>
</div>


<?php 
    require_once('./inc/footer.inc.php');
?>