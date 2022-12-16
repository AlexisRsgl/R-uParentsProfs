<?php 
require 'configadmin.php';

if (!empty($_POST['matiere']) ){
  $matiere=$_POST['matiere'];

  $inscription = $dbh->prepare('INSERT INTO matiere(Designation) value (?) ');
  $inscription->execute([$matiere]);
}  
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/admin_logo.png"/>
    <title>Matière BackOffice</title>
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
<form method="post">
<div class="mb-3">
    <input type="text" name="matiere" class="form-control" placeholder="Nom de la matière">   
  <button type="submit" class="btn btn-primary">Ajouter</button>
  </div> 
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>