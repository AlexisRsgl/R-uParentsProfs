<?php 
require 'configadmin.php';

$classes = $dbh->query('SELECT * FROM classe');

if (!empty($_POST['nomeleve']) && ($_POST['prenomeleve']) && $_POST['ID_classe']){
    $nomeleve=$_POST['nomeleve'];
    $prenomeleve=$_POST['prenomeleve'];
    $ip_add = $_SERVER['REMOTE_ADDR'];
    $classe=$_POST['ID_classe'];

    $inscription = $dbh->prepare('INSERT INTO eleve(Nom,Prenom,AdressIP,ID_classe) value (?,?,?,?) ');
    $inscription->execute([$nomeleve,$prenomeleve,$ip_add,$classe]);
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css.css">
    <link rel="icon" href="img/admin_logo.png"/>
    <title>Elève BackOffice</title>
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
    <h3>Création d'un élève</h3>
      <form method="post">
    <div class="mb-3">
        <input type="text" class="form-control" aria-label="Text input with checkbox" name="nomeleve" placeholder="Nom">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" aria-label="Text input with checkbox" name="prenomeleve" placeholder="Prenom">
    <select class="form-select" aria-label="Default select example" name="ID_classe">
    <option>Classe</option>
        <?php foreach ($classes as $classe): ?>
        <option value="<?= $classe['ID_classe']?>"><?= $classe['ID_classe']?></option>
        <?php endforeach; ?>
    </select>
    <button type="sumbit" class="btn btn-primary">Ajouter</button>
    </div>
    </form>
  </body>
  <footer>
    
</footer>
</html>