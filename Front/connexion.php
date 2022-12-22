<?php 
    require_once('../Models/pdo.php');
    require_once('../Models/User.php');
    require_once('../Models/UserManager.php');


    $error = '';
    $success ='';

    $userManager = new UserManager($pdo);

    if(isset($_GET['action']) && $_GET['action'] == 'deconnexion'){
        // session_destroy();
        session_unset();
        header('location:index.php');
    }

    if(!empty($_POST['mail'])){
        $reqMail = $userManager->getUserByMail();
        if($reqMail->rowCount() >= 1){
            $client = $reqMail->fetch(PDO::FETCH_ASSOC);
                

                if(password_verify($_POST['password'], $client['password'])){
                    $_SESSION['client']['id_cli']= $client['id_cli'];
                    $_SESSION['client']['firstname']= $client['firstname'];
                    $_SESSION['client']['lastname']= $client['lastname'];
                    $_SESSION['client']['mail']= $client['mail'];
                    $_SESSION['client']['password']= $client['password'];
                    $_SESSION['client']['address']= $client['address'];
                    $_SESSION['client']['city']= $client['city'];
                    $_SESSION['client']['zipcode']= $client['zipcode'];
                    $_SESSION['client']['phone']= $client['phone'];
                    $_SESSION['client']['birthdate']= $client['birthdate'];
                    $_SESSION['client']['country']= $client['country'];

                    var_dump($_SESSION);
                    // header('location:profil.php');
                }else{
                    $error .= '<div class="alert alert-danger">Le mot de passe n\'est pas correct</div>';
                    var_dump($error);
                }
            }else{
                $error .= '<div class="alert alert-danger">L’adresse mail fournie n\'existe pas</div>';
                var_dump($error);
            }
    }

    require_once('./inc/header.inc.php');
    require_once('./inc/top-nav.inc.php');
?>


        <div class="container mt-5 mb-5">
            <div class="row justify-content-center">
                <div class="col-8">
                
                <h1 class="text-center">Connectez-vous</h1>

                <?php echo $error; ?>

                <form action="" method="POST" class="connexion-form">

                <!-- EMAIL -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Votre adresse mail</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <!-- PASSWORD -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <button type="submit" class="btn">Se connecter</button>

                </form>
                
            </div>
        </div>
    </div>
    
    <section class="rdvInscription">
        <p>Si vous n'êtes pas encore inscrit, <a href="inscription.php">vous pouvez le faire ici</a>.
        </p>
    </section>

<?php 
    require_once('./inc/footer.inc.php');

?>