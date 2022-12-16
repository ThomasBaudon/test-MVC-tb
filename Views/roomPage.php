<?php 

require_once('../Models/Pdo.php');
require_once('../Models/Room.php');
require_once('../Models/RoomManager.php');

$room = new RoomManager($pdo);
$success = "";

/* POST ROOM */
if(!empty($_POST)){
    $adRoom = new Room(
        [
        'title_room' => $_POST['title_room'],
        'price_room' => $_POST['price_room'],
        'type_chambre' => $_POST['type_chambre'],
        'size' => $_POST['size'],
        'description' => $_POST['description'],
        'adults' => $_POST['adults'],
        'children' => $_POST['children']
        ]
    );

    $room->insertRoom($adRoom);
    $success = '<div class="alert alert-success" role="alert">L\'utilisateur a bien été enregistré</div>';
};


/* DELETE ROOM */
if(isset($_GET['action']) && $_GET['action'] == 'delete'){
    $room->deleteRoom($room);
    header('location:views/roomPage.php ');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rooms</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-10 table-responsive">

        <?php echo $success; ?>

            <table class="table">
            <!-- <caption>Liste des chambres</caption> -->
            <thead class="table-light">
                <th scope="col">id</th>
                <th scope="col">Titre</th>
                <th scope="col">Prix</th>
                <th scope="col">Type</th>
                <th scope="col">Taille</th>
                <th scope="col">Description</th>
                <th scope="col">Adultes</th>
                <th scope="col">Enfants</th>
                <th scope="col">Actions</th>
            </thead>

            <tbody>
                <?php 
                    $rooms = $room->getAllRooms();
                    while ($room = $rooms->fetch(PDO::FETCH_ASSOC)){
                ?>
                    <tr>
                        <td> <?php echo $room['id_room']; ?></td>
                        <td> <?php echo $room['title_room']; ?></td>
                        <td> <?php echo $room['price_room']; ?> €</td>
                        <td> <?php echo $room['type_chambre']; ?></td>
                        <td> <?php echo $room['size']; ?></td>
                        <td> <?php echo $room['description']; ?></td>
                        <td> <?php echo $room['adults']; ?></td>
                        <td> <?php echo $room['children']; ?></td>
                        <td>
                            
                            <a href="<?php echo "?action=update&id_room=$id_room"; ?>" class="btn btn-warning"> Update</a>
                            <a href="<?php echo "?action=delete&id_room=$room[id_room]"; ?>" class="btn btn-danger"> delete</a>
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

<hr>
<hr>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">


                <form action="" method="POST">
                    
                <div class="mb-3">
                    <label for="title_room" class="form-label">Titre</label>
                    <input type="text" id="title_room" name="title_room" class="form-control" placeholder="Title">
                </div>
                    
                <div class="mb-3">
                    <label for="price_room" class="form-label">Prix</label>
                    <input type="text" id="price_room" name="price_room" class="form-control" placeholder="Prix">
                </div>
                    
                <div class="mb-3">
                    <label for="type_chambre" class="form-label">Type de chambre</label>
                    <input type="text" id="type_chambre" name="type_chambre" class="form-control" placeholder="Type de chambre">
                </div>
                    
                <div class="mb-3">
                    <label for="size" class="form-label">Taille de la chambre</label>
                    <input type="text" id="size" name="size" class="form-control" placeholder="Taille de la chambre">
                </div>
                    
                <div class="mb-3">
                    <label for="description" class="form-label">Description de la chambre</label>
                    <textarea type="text" id="description" name="description" class="form-control" placeholder="Description de la chambre"></textarea>
                </div>
                    
                <div class="mb-3">
                    <label for="adults" class="form-label">Adults de la chambre</label>
                    <input type="number" id="adults" name="adults" class="form-control" placeholder="Adults">
                </div>
                    
                <div class="mb-3">
                    <label for="children" class="form-label">Children de la chambre</label>
                    <input type="number" id="children" name="children" class="form-control" placeholder="Children">
                </div>
                    
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Envoyer">
                </div>

                </form>

        </div>
    </div>
</div>


    
</body>
</html>