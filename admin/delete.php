<?php
   /* require 'database.php';
 
    if (!empty($_GET['id'])) {
        $id = checkInput($_GET['id']);
    }

    if (!empty($_POST)) {
        $id = checkInput($_POST['id']);
        $db = Database::connect();
        $statement = $db->prepare("DELETE FROM items WHERE id = ?");
        $statement->execute(array($id));
        Database::disconnect();
        header("Location: index.php"); 
    }

    function checkInput($data) {
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
      <form class="form" action="delete.php" role="form" method="post">
                    <br>
                    <input type="hidden" name="id" value="<?php echo $id;?>" disabled/>
                    <p class="alert alert-warning">Etes vous sur de vouloir supprimer ?</p>
                    <div class="form-actions">
                      <!--<button type="submit" class="btn btn-warning">Oui</button>-->
                      <a class="btn btn-secondary" href="index.php">Non</a>
                    </div>
                </form>
        </div>
    </div>
</body>
</html>