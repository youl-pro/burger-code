<?php
/*
    require 'database.php';

    if (!empty($_GET['id'])) {
        $id = checkInput($_GET['id']);
    }

    $nameError = $descriptionError = $priceError = $categoryError = $imageError = $name = $description = $price = $category = $image = "";

    if (!empty($_POST)) {
        $name               = checkInput($_POST['name']);
        $description        = checkInput($_POST['description']);
        $price              = checkInput($_POST['price']);
        $category           = checkInput($_POST['category']); 
        $image              = checkInput($_FILES["image"]["name"]);
        $imagePath          = '../images/'. basename($image);
        $imageExtension     = pathinfo($imagePath,PATHINFO_EXTENSION);
        $isSuccess          = true;
       
        if (empty($name)) {
            $nameError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if (empty($description)) {
            $descriptionError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if (empty($price)) {
            $priceError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }  
        if (empty($category)) {
            $categoryError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if (empty($image)) { // le input file est vide, ce qui signifie que l'image n'a pas ete update
            $isImageUpdated = false;
        } else {
            $isImageUpdated = true;
            $isUploadSuccess =true;
            if ($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif" ) {
                $imageError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif";
                $isUploadSuccess = false;
            }
            if (file_exists($imagePath)) {
                $imageError = "Le fichier existe deja";
                $isUploadSuccess = false;
            }
            if ($_FILES["image"]["size"] > 500000) {
                $imageError = "Le fichier ne doit pas depasser les 500KB";
                $isUploadSuccess = false;
            }
            if ($isUploadSuccess) {
                if (!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) {
                    $imageError = "Il y a eu une erreur lors de l'upload";
                    $isUploadSuccess = false;
                } 
            } 
        }
         
        if (($isSuccess && $isImageUpdated && $isUploadSuccess) || ($isSuccess && !$isImageUpdated)) { 
            $db = Database::connect();
            if ($isImageUpdated) {
                $statement = $db->prepare("UPDATE items  set name = ?, description = ?, price = ?, category = ?, image = ? WHERE id = ?");
                $statement->execute(array($name,$description,$price,$category,$image,$id));
            } else {
                $statement = $db->prepare("UPDATE items  set name = ?, description = ?, price = ?, category = ? WHERE id = ?");
                $statement->execute(array($name,$description,$price,$category,$id));
            }
            Database::disconnect();
            header("Location: index.php");
            
        } else if ($isImageUpdated && !$isUploadSuccess) {
            $db = Database::connect();
            $statement = $db->prepare("SELECT * FROM items where id = ?");
            $statement->execute(array($id));
            $item = $statement->fetch();
            $image          = $item['image'];
            Database::disconnect();
           
        }
    } else {
        $db = Database::connect();
        $statement = $db->prepare("SELECT * FROM items where id = ?");
        $statement->execute(array($id));
        $item = $statement->fetch();
        $name           = $item['name'];
        $description    = $item['description'];
        $price          = $item['price'];
        $category       = $item['category'];
        $image          = $item['image'];
        Database::disconnect();
    }

    function checkInput($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
*/
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Burger Code</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--lien Jquery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!--lien Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Holtwood+One+SC&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Limelight&family=Lobster&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <h1 class="text-logo"><span>🍔</span>Burger Code<span>🍔</span></h1>
        <div class="container admin">
            <div class="row">
                <div class="col-md-6">
                    <h1><strong>Modifier un item</strong></h1>
                    <br>
                    <form class="form" action="<?php echo 'update.php?id='.$id;?>" role="form" method="post" enctype="multipart/form-data">
                        <br>
                        <div>
                            <label class="form-label" for="name">Nom:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?php echo $name;?>" disabled>
                            <span class="help-inline"><?php echo $nameError;?></span>
                        </div>
                        <br>
                        <div>
                            <label class="form-label" for="description">Description:</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?php echo $description;?>" disabled>
                            <span class="help-inline"><?php echo $descriptionError;?></span>
                        </div>
                        <br>
                        <div>
                            <label class="form-label" for="price">Prix: (en €)</label>
                            <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Prix" value="<?php echo $price;?>" disabled>
                            <span class="help-inline"><?php echo $priceError;?></span>
                        </div>
                        <br>
                        <div>
                            <label class="form-label" for="category">Catégorie:</label>
                            <select class="form-control" id="category" name="category" disabled>
                                <?php
                                    $db = Database::connect();
                                    foreach ($db->query('SELECT * FROM categories') as $row) 
                                    {
                                        if($row['id'] == $category)
                                            echo '<option selected="selected" value="'. $row['id'] .'">'. $row['name'] . '</option>';
                                        else
                                            echo '<option value="'. $row['id'] .'">'. $row['name'] . '</option>';
                                    }
                                   // Database::disconnect();
                                ?>
                            </select>
                            <span class="help-inline"><?php echo $categoryError;?></span>
                        </div>
                        <br>
                        <div>
                            <label class="form-label" for="image">Image:</label>
                            <p><?php echo $image;?></p>
                            <label for="image"><strong>Sélectionner une nouvelle image:</strong></label><br>
                            <input type="file" id="image" name="image" disabled> 
                            <span class="help-inline"><?php echo $imageError;?></span>
                        </div>
                        <br>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success" disabled><span class="bi-pencil"></span> Modifier</button>
                            <a class="btn btn-primary" href="index.php"><span class="bi-arrow-left"></span> Retour</a>
                        </div>
                    </form>
                </div>
    <div class="col-md-6 site">
    <div class="img-thumbnail">
      <img src="<?php echo '../images/' .$image; ?>" class="img-fluid" alt="Image de l'item">
  <div class="price"><?php echo number_format((float)$price, 2, '.', '') . ' $'; ?></div>
  <div class="caption">
        <h4><?php echo  $name; ?></h4>
        <p><?php echo $description; ?></p>
        <a href="#" class="btn btn-order" role="button"><span class="bi-cart-fill"></span> Commander</a>
      </div>
    </div>
  </div>



            </div>
        </div>
    </body>
</html>
