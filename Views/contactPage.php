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
$status="";


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
    $status = (isset($detailContact['read_status'])) ? $detailContact['read_status'] : "" ;
    

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
<?php require_once('./inc/header.inc.php'); ?>

<div class="container mt-3 mb-3">
    <div class="row">
        <div class="col-12 justify-content-center">
            <h1 class="text-center">CONTACT PAGE</h1>
        </div>
    </div>
</div>

<!-- TABLE ROOMS -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10 table-responsive">

        <?php echo $success; ?>

            <table class="table table-hover">
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
                <th></th>
            </thead>

            <tbody>
                <?php 
                    $contacts = $contact->getAllContacts();
                    while ($contact = $contacts->fetch(PDO::FETCH_ASSOC)){
                ?>
                    <tr>
                        <td class="align-middle"> <?php echo $contact['id_contact']; ?></td>
                        <td class="align-middle"> <?php echo $contact['lastname']; ?></td>
                        <td class="align-middle"> <?php echo $contact['firstname']; ?></td>
                        <td class="align-middle">
                                <a href="mailto:<?php echo $contact['email']; ?>">
                            <?php echo $contact['email']; ?></a>
                        </td>
                        <td class="align-middle text-truncate" style="max-width: 13rem;"> <?php echo $contact['message']; ?></td>
                        <td class="align-middle"> <?php echo $contact['date']; ?></td>
                        <td class="align-middle"><?php echo $contact['read_status']; ?></td>
                        <td class="align-middle">
                            <a href="<?php echo "?action=update&id_contact=$contact[id_contact]"; ?>" class="btn btn-warning"> Update</a>
                        </td>
                        <td class="align-middle">
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


    
<?php require_once('./inc/footer.inc.php'); ?>