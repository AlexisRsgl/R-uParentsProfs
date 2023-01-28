<?php 
require 'configadmin.php';

if (!empty($_POST['classe']) ){
  $classe=$_POST['classe'];

  if(!empty($classe)) {
    $inscription = $dbh->prepare('INSERT INTO classe(ID_classe) value (?) ');
    $inscription->execute([$classe]);
    $classe_add = "La classe a bien été ajoutée";
  }
}


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/admin_logo.png"/>
    <title>Classe BackOffice</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;500;600;700&family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <header>
  <div class="container_header">
    <h1>Administrateur</h1>
  </div>
  </header>
  <body>
    <h3>Création d'une classe</h3>
<form method="post">
<div class="mb-3">
    <input type="text" name="classe" class="form-control" placeholder="Nom de la classe"> 
    <?php
    if(isset($classe_add))
    {
      ?>
      <div class="bg-success p-2 text-dark bg-opacity-25"><?php echo $classe_add; ?></div>
      <?php 
      unset($classe_add);
    }
    ?>
  <button type="submit" class="btn btn-primary">Ajouter</button>
  </div> 
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>