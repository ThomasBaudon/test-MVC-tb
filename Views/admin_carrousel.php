<?php

require_once('../Models/Carrousel.php');
require_once('../Models/CarrouselManager.php');
require_once('../Models/pdo.php');

$image = "";

// SHOW ALL IMAGES
$carrouselManager = new CarrouselManager($pdo);
$showCarrousel = $carrouselManager->getAllImages();


// INSERT IMAGES
if (!empty($_POST) && !isset($_GET['action']) && !isset($_GET['action']) == 'update') {

    $newCarrousel = new Carrousel(
        [
            'image' => $_FILES['image'],
        ]
    );
    $carrouselManager->insertCarrousel($newCarrousel);
    header('location:admin_carrousel.php');
}

// UPDATE CARROUSEL
if (isset($_GET['action']) && $_GET['action'] == "update") {

    $inputCarrousel = $carrouselManager->getImageById();
    $actualImage = $inputCarrousel->fetch(PDO::FETCH_ASSOC);

    $image = (isset($actualImage['image'])) ? $actualImage['image'] : '';

    if (!empty($_POST)) {
        $update = $carrouselManager->updateCarrousel();
    }
}

// DELETE CARROUSEL
if (isset($_GET['action']) && $_GET['action'] == "delete") {
    $delete = $carrouselManager->deleteCarrousel();
    header('location:admin_carrousel.php');
}

?>


<?php require_once('./inc/header.inc.php'); ?>

<div class="container mt-3 mb-3">
    <div class="row">
        <div class="col-12 justify-content-center">
            <h1 class="text-center">Gestion du carrousel</h1>
        </div>
    </div>
</div>

<div class="container">

    <table class="table table-striped">
        <tr>
            <th class="text-center">Id image</th>
            <th class="text-center">Image</th>
            <th class="text-center">Update</th>
            <th class="text-center">Delete</th>
        </tr>
        <?php while ($row = $showCarrousel->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td class="text-center"> <?php echo $row["id_image"]; ?></td>
                <td class="text-center"> <?php echo "<img src='$row[image]' width='50px'>"; ?></td>
                <td class="text-center"><a href="<?php echo "?action=update&id_image=$row[id_image]"; ?>" class="btn btn-warning"> Update</a></td>
                <td class="text-center"><a href="<?php echo "?action=delete&id_image=$row[id_image]"; ?>" class="btn btn-danger"> Delete</a></td>
            </tr>
        <?php } ?>
    </table>
</div>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">

            <h1 class="text-center">Ajouter une image</h1>

            <form action="" method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                    <input type="hidden" id="id_image" name="id_image" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" id="image" name="image" class="form-control" value="<?= $image ?>">
                    <?php if (!empty($image)) : ?>
                        <p>Vous pouvez ajouter une nouvelle photo.<br>
                            <!----afficher la photo---->
                            <img src="<?= $image ?>" width="50">
                        </p><br>
                    <?php endif;     ?>
                    <input type="hidden" name="image_actuelle" value="<?= $image  ?>"><br>
                </div>

                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Ajouter l'image">
                </div>

            </form>

        </div>
    </div>
</div>

<?php require_once('./inc/footer.inc.php'); ?>