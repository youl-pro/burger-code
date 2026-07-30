<!DOCTYPE html>
<html lang="en">
<head>
    <!--site Statique-->
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
    <h1><strong>Liste des items</strong>
        <a href="insert.php" class="btn btn-success btn-lg"><span class="bi bi-plus-lg"></span>Ajouter</a>
    </h1>

<table class="table table-striped table-bordered">
  <thead class="table-dark">
    <tr>
      <th>Nom</th>
      <th>Description</th>
      <th>Prix</th>
      <th>Catégorie</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
     require 'database.php';
     $db = Database::connect();
    $statement = $db->query('SELECT items.id, items.name, items.description, items.price, categories.name AS category FROM items LEFT JOIN categories ON items.category = categories.id');

  while ($item = $statement->fetch()) {
    echo '<tr>';
    echo '<td>' . ($item['name']) . '</td>';
    echo '<td>' . ($item['description']) . '</td>';
    echo '<td>' . number_format($item['price'], 2, '.', '') . ' €</td>';
    echo '<td>' .($item['category']) . '</td>';
    echo '<td width="300">';
    
    echo '<a href="view.php?id=' . $item['id'] . '" class="btn btn-secondary btn-sm me-1 disabled">';
    echo '<span class="bi bi-eye"></span> Voir</a>';

    echo '<a href="update.php?id=' . $item['id'] . '" class="btn btn-primary btn-sm me-1 disabled">';
    echo '<span class="bi bi-pencil"></span> Modifier</a>';

    echo '<a href="delete.php?id=' . $item['id'] . '" class="btn btn-danger btn-sm disabled">';
    echo '<span class="bi bi-trash"></span> Supprimer</a>';

    echo '</td>';
    echo '</tr>';
}

Database::disconnect();
    
    ?>

  </tbody>
</table>

   </div>
</div>


</body>
</html>