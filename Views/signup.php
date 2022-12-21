<?php

require_once('../Model/User.php');
require_once('../Model/UserManager.php');
require_once('../Model/init.php');

$userManager = new UserManager($pdo);

$lastname = "";
$firstname = "";
$mail = "";
$password = "";
$address = "";
$city = "";
$zipcode = "";
$phone = "";
$birthdate = "";
$country = "";
$success = "";


// INSERT USER
if (!empty($_POST) && !isset($_GET['action']) && !isset($_GET['action']) == 'update') {

    $userNew = new User(
        [
            'lastname' => $_POST['lastname'],
            'firstname' => $_POST['firstname'],
            'mail' => $_POST['mail'],
            'password' => $_POST['password'],
            'address' => $_POST['address'],
            'city' => $_POST['city'],
            'zipcode' => $_POST['zipcode'],
            'phone' => $_POST['phone'],
            'birthdate' => $_POST['birthdate'],
            'country' => $_POST['country'],
        ]
    );
    $userManager->insertUser($userNew);
}


?>

<?php require_once('./inc/header.inc.php'); ?>

<div class="container mt-3 mb-3">
    <div class="row">
        <div class="col-12 justify-content-center">
            <h1 class="text-center">Inscription</h1>
        </div>
    </div>
</div>


<?php echo $success; ?>
<div>
    <form action="" method="POST">
        <label for="lastname" class="form-label">Votre nom :</label>
        <input type="text" name="lastname" id="lastname" class="form-control" value="<?= $lastname ?>">
        <?php if (isset($erreurs) && in_array(User::LASTNAME_INVALIDE, $erreurs))
            echo '<div class="form-text text-danger fw-bold"> Le nom est invalide </div>';
        ?>

        <label for="firstname" class="form-label">Votre prénom :</label>
        <input type="text" name="firstname" id="firstname" class="form-control" value="<?= $firstname ?>">
        <?php if (isset($erreurs) && in_array(User::FIRSTNAME_INVALIDE, $erreurs))
            echo '<div class="form-text text-danger fw-bold"> Le nom est invalide </div>';
        ?>

        <label for="mail" class="form-label">Votre email :</label>
        <input type="email" name="mail" id="mail" class="form-control" value="<?= $mail ?>">
        <?php if (isset($erreurs) && in_array(User::MAIL_INVALIDE, $erreurs))
            echo '<div class="form-text text-danger fw-bold"> Le nom est invalide </div>';
        ?>

        <label for="password" class="form-label">Votre mot de passe :</label>
        <input type="password" name="password" id="password" class="form-control">
        <?php if (isset($erreurs) && in_array(User::PASSWORD_INVALIDE, $erreurs))
            echo '<div class="form-text text-danger fw-bold"> Le nom est invalide </div>';
        ?>

        <label for="address" class="form-label">Votre adresse :</label>
        <input type="text" name="address" id="address" class="form-control" value="<?= $address ?>">
        <?php if (isset($erreurs) && in_array(User::ADDRESS_INVALIDE, $erreurs))
            echo '<div class="form-text text-danger fw-bold"> Le nom est invalide </div>';
        ?>

        <label for="city" class="form-label">Votre ville :</label>
        <input type="text" name="city" id="city" class="form-control" value="<?= $city ?>">
        <?php if (isset($erreurs) && in_array(User::CITY_INVALIDE, $erreurs))
            echo '<div class="form-text text-danger fw-bold"> Le nom est invalide </div>';
        ?>

        <label for="zipcode" class="form-label">Votre code postal:</label>
        <input type="text" name="zipcode" id="zipcode" class="form-control" value="<?= $zipcode ?>">
        <?php if (isset($erreurs) && in_array(User::ZIPCODE_INVALIDE, $erreurs))
            echo '<div class="form-text text-danger fw-bold"> Le nom est invalide </div>';
        ?>

        <label for="phone" class="form-label">Votre numéro de téléphone :</label>
        <input type="text" name="phone" id="phone" class="form-control" value="<?= $phone ?>">
        <?php if (isset($erreurs) && in_array(User::PHONE_INVALIDE, $erreurs))
            echo '<div class="form-text text-danger fw-bold"> Le nom est invalide </div>';
        ?>

        <label for="birthdate" class="form-label">Votre date de naissance :</label>
        <input type="date" name="birthdate" id="birthdate" class="form-control" value="<?= $birthdate ?>">
        <?php if (isset($erreurs) && in_array(User::BIRTHDATE_INVALIDE, $erreurs))
            echo '<div class="form-text text-danger fw-bold"> Le nom est invalide </div>';
        ?>

        <label for="country" class="form-label">Votre pays :</label>
        <input type="text" name="country" id="country" class="form-control" value="<?= $country ?>">
        <?php if (isset($erreurs) && in_array(User::COUNTRY_INVALIDE, $erreurs))
            echo '<div class="form-text text-danger fw-bold"> Le nom est invalide </div>';
        ?>

        <?php if (isset($_GET['action']) && $_GET['action'] == 'update') : ?>
            <input type="submit" value="Valider la modification" class="btn btn-lg btn-info">
        <?php else : ?>
            <input type="submit" value="S'inscrire" class="btn btn-lg btn-info">
        <?php endif ?>

    </form>
</div>
<?php require_once('./inc/footer.inc.php'); ?>