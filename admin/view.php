<?php
/*
require 'database.php';

if (!empty($_GET['id'])) {
    $id = checkInput($_GET['id']);
} else {
    die('ID non spécifié');
}

$db = Database::connect();
$statement = $db->prepare('SELECT items.id, items.name, items.description,items.image, items.price, categories.name AS category FROM items LEFT JOIN categories ON items.category = categories.id WHERE items.id = ?');
$statement->execute(array($id));
$item = $statement->fetch();
Database::disconnect();

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
  <div class="col-md-6">
    <h1><strong>Voir un item</strong></h1>
    <br>
    <form action="">
      <div class="form-group">
        <label for="">Nom:</label><?php echo '  ' . htmlspecialchars($item['name']); ?>
      </div>
      <br>
      <div class="form-group">
        <label for="">Description:</label><?php echo '  ' . htmlspecialchars($item['description']); ?>
      </div>
        <br>
      <div class="form-group">
        <label for="">Prix:</label> <?php echo number_format($item['price'], 2, '.', '').' '.'$'; ?> 
      </div>
        <br>
      <div class="form-group">
        <label for="">Categorie:</label><?php echo '  ' . htmlspecialchars($item['category']); ?>
      </div>
        <br>
      <div class="form-group">
        <label for="">image:</label><?php echo '  ' . htmlspecialchars($item['image']); ?>
      </div>
        <br>
    </form>
    <div class="form-actions">
      <a href="index.php" class="btn btn-primary"><span class="bi bi-arrow-left sm"></span>Retour</a>
    </div>
  </div>

  <div class="col-md-6 site">
    <div class="img-thumbnail">
      <img src="<?php echo '../images/' . htmlspecialchars($item['image']); ?>" class="img-fluid" alt="Image de l'item">
      <div class="price"><?php echo number_format($item['price'], 2, '.', '').' '.'$'; ?> </div>
      <div class="caption">
        <h4><?php echo htmlspecialchars($item['name']); ?></h4>
        <p><?php echo htmlspecialchars($item['description']); ?></p>
        <a href="#" class="btn btn-order" role="button"><span class="bi-cart-fill"></span> Commander</a>
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>