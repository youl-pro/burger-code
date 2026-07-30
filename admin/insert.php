<?php 
 /*require 'database.php';
$nameError = $descriptionError = $priceError = $categoryError = $imageError = $name = $description = $price = $category = $image = "";

if(!empty($_POST))
{
   $name                 = checkInput($_POST['name']);
   $description          = checkInput($_POST['description']);
   $price                = checkInput($_POST['price']);
   $category             = checkInput($_POST['category']);
   $image                = checkInput($_FILES['image']['name']);
   $imagePath            = '../images/'. basename($image); // le chemin de l'image.
   $imageExtension       = pathinfo($imagePath, PATHINFO_EXTENSION); // elle nous donne l'extension de l'image.
   $isSuccess            = true;
   $isUploadSuccess      = false;




   if(empty($name))
   {
     $nameError = "Ce  champs ne peut pas être vide";
       $isSuccess = false;
   }
   if(empty($description))
   {
     $descriptionError = "Ce  champs ne peut pas être vide";
       $isSuccess = false;
   }
   if(empty($price))
   {
     $priceError = "Ce  champs ne peut pas être vide";
       $isSuccess = false;
   }
   if(empty($category))
   {
     $categoryError = "Ce  champs ne peut pas être vide";
     $isSuccess = false;
   }
   if(empty($image))
   {
     $imageError = "Ce  champs ne peut pas être vide";
       $isSuccess = false;
   }
   else {
            $isUploadSuccess = true;
            if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif" ) {
                $imageError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif";
                $isUploadSuccess = false;
            }
            if(file_exists($imagePath)) {
                $imageError = "Le fichier existe deja";
                $isUploadSuccess = false;
            }
            if($_FILES["image"]["size"] > 500000) {
                $imageError = "Le fichier ne doit pas depasser les 500KB";
                $isUploadSuccess = false;
            }
            if($isUploadSuccess) {
                if(!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) {
                    $imageError = "Il y a eu une erreur lors de l'upload";
                    $isUploadSuccess = false;
                } 
            } 
        }
        
        if($isSuccess && $isUploadSuccess) {
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO items (name,description,price,category,image) values(?, ?, ?, ?, ?)");
            $statement->execute(array($name,$description,$price,$category,$image));
            Database::disconnect();
            header("Location: index.php");
        }
    }
  










function checkInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}*/
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
  <h1 class="text-logo" ><span>🍔</span>Burger Code<span>🍔</span></h1>
<div class="container admin">
    <div class="row">
   <h1><strong>Ajouter un item</strong></h1>
    <br>
    <form action="insert.php" role="form" method="post" class="form" enctype="multipart/form-data">
      <div class="form-group">
        <label for="name">Nom:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?php echo $name ?>" disabled>
    <span class="help-inline"><?php echo $nameError ?></span>
      </div>
      <br>
       <div class="form-group">
        <label for="description">Description:</label>
        <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?php echo $description ?> " disabled>
    <span class="help-inline"><?php echo $descriptionError ?></span>
      </div>
        <br>
    <div class="form-group">
        <label for="price">Prix:(en $)</label>
        <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Prix" value="<?php echo $price ?> " disabled>
    <span class="help-inline"><?php echo $priceError ?></span>
      </div>
        <br>
    <div class="form-group">
    <label for="category">Catégorie</label>
    <select name="category" id="category" class="form-control" disabled>
        <?php 
       // $db = Database::connect();
        foreach($db->query('SELECT * FROM categories') as $row)
        {
            // Ajout de l'attribut value et de l'état selected
            echo '<option value="' . $row['id'] . '"';
            if ($row['id'] == $category) echo ' selected'; // garder le choix sélectionné
            echo '>' . $row['name'] . '</option>';
        }
        Database::disconnect();
        ?>
    </select>
    <span class="help-inline"><?php echo $categoryError ?></span>
</div>

        <br>
      <div class="form-group">
        <label for="image">Selectionner une image</label>
        <input type="file" id="image" name="image" disabled><br>
    <span class="help-inline"><?php echo $imageError ?></span>
      </div>
        <br>
 
    <div class="form-actions">
      <!--  <button type="submit" class="btn btn-success"> <span class="bi bi-pencil"></span>Ajouter</button>-->
      <a href="index.php" class="btn btn-primary"><span class="bi bi-arrow-left sm"></span>Retour</a>
    </div>
  </div>
</form>
</div>
</div>
</body>
</html>