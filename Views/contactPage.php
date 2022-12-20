<?php 

require_once('../Models/Pdo.php');
require_once('../Models/Contact.php');
require_once('../Models/ContactManager.php');

$contact = new ContactManager($pdo);
$success = "";

$id_contact="";
$lastname="";
$firstname="";
$email="";
$message="";
$date="";


/* DELETE CONTACT */
if(isset($_GET['action']) && $_GET['action'] == 'delete'){
    $contact->deleteContact($contact);
    header('location:contactPage.php ');
}



/* UPDATE CONTACT */
if(isset($_GET['action']) && $_GET['action'] == 'update'){

    $idContact = $contact->getContactById();
    $detailContact = $idContact->fetch(PDO::FETCH_ASSOC);


    $id_contact = (isset($detailContact['id_contact'])) ? $detailContact['id_contact'] : "" ;
    $lastname = (isset($detailContact['lastname'])) ? $detailContact['lastname'] : "" ;
    $firstname = (isset($detailContact['firstname'])) ? $detailContact['firstname'] : "" ;
    $email = (isset($detailContact['email'])) ? $detailContact['email'] : "" ;
    $message = (isset($detailContact['message'])) ? $detailContact['message'] : "" ;
    $date = (isset($detailContact['date'])) ? $detailContact['date'] : "" ;
    

    if(!empty($_POST)){
        $contact->updateContact($contact);
    }

}

/* POST CONTACT */
if(!empty($_POST) && !isset($_GET['action']) && !isset($_GET['action']) == 'update'){
    $adContact = new Contact(
        [
        'id_contact' => $_POST['id_contact'],
        'lastname' => $_POST['lastname'],
        'firstname' => $_POST['firstname'],
        'email' => $_POST['email'],
        'message' => $_POST['message'],
        'date' => $_POST['date']
        ]
    );

    $contact->insertContact($adContact);
    $success = '<div class="alert alert-success" role="alert">L\'utilisateur a bien été enregistré</div>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

<!-- TABLE ROOMS -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10 table-responsive">

        <?php echo $success; ?>

            <table class="table">
            <!-- <caption>Liste des chambres</caption> -->
            <thead class="table-light">
                <th scope="col">id</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">eMail</th>
                <th scope="col">Message</th>
                <th scope="col">Date</th>
                <th scope="col">Lu</th>
                <th scope="col">Actions</th>
            </thead>

            <tbody>
                <?php 
                    $contacts = $contact->getAllContacts();
                    while ($contact = $contacts->fetch(PDO::FETCH_ASSOC)){
                ?>
                    <tr>
                        <td> <?php echo $contact['id_contact']; ?></td>
                        <td> <?php echo $contact['lastname']; ?></td>
                        <td> <?php echo $contact['firstname']; ?></td>
                        <td>
                                <a href="mailto:<?php echo $contact['email']; ?>">
                            <?php echo $contact['email']; ?></a>
                        </td>
                        <td> <?php echo $contact['message']; ?></td>
                        <td> <?php echo $contact['date']; ?></td>
                        <td> oui</td>
                        <td>
                            <a href="<?php echo "?action=update&id_contact=$contact[id_contact]"; ?>" class="btn btn-warning"> Update</a>
                        </td>
                        <td>
                        <a href="<?php echo "?action=delete&id_contact=$contact[id_contact]"; ?>" class="btn btn-danger"> delete</a>
                        </td>
                    </tr>                 
                <?php 
                    }
                ?>
            </tbody>

            </table>

        </div>
    </div>
</div>



<!-- FORM CONTACT -->
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-8">


            <form action="" method="POST">
                    
                <div class="mb-3">
                    <label for="lastname" class="form-label">Nom</label>
                    <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Title" value="<?php echo $lastname ?>">
                </div>
                    
                <div class="mb-3">
                    <label for="price_room" class="form-label">Prix</label>
                    <input type="text" id="price_room" name="price_room" class="form-control" placeholder="Prix" value="<?php echo $price_room ?>">
                </div>
                    
                <div class="mb-3">
                    <label for="type_chambre" class="form-label">Type de chambre</label>
                    <input type="text" id="type_chambre" name="type_chambre" class="form-control" placeholder="Type de chambre" value="<?php echo $type_chambre ?>">
                </div>
                    
                <div class="mb-3">
                    <label for="size" class="form-label">Taille de la chambre</label>
                    <input type="text" id="size" name="size" class="form-control" placeholder="Taille de la chambre" value="<?php echo $size ?>">
                </div>
                    
                <div class="mb-3">
                    <label for="description" class="form-label">Description de la chambre</label>
                    <textarea type="text" id="description" name="description" class="form-control" placeholder="Description de la chambre"><?php echo $description ?></textarea>
                </div>
                    
                <div class="mb-3">
                    <label for="adults" class="form-label">Adults de la chambre</label>
                    <input type="text" id="adults" name="adults" class="form-control" placeholder="Adults" value="<?php echo $adults ?>">
                </div>
                    
                <div class="mb-3">
                    <label for="children" class="form-label">Children de la chambre</label>
                    <input type="text" id="children" name="children" class="form-control" placeholder="Children" value="<?php echo $children ?>">
                </div>
                    
                <div class="mb-3">
                    <label for="status" class="form-label">Statut de la chambre</label>
                    <select class="form-select mb-3" aria-label="status" name="status" id="status">
                        <option value="libre" <?php if($status == 'libre'){echo "selected";}?>>Libre</option>
                        <option value="réservée" <?php if($status == 'réservée'){echo "selected";}?>>Réservée</option>
                    </select>
                </div>
                    
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Envoyer">
                </div>

            </form>

        </div>
    </div>
</div> -->


    
</body>
</html>