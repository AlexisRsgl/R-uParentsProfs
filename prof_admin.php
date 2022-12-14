<?php 
require 'configadmin.php';

$sexes = $dbh->query('SELECT * FROM etat_civile');
$salles = $dbh->query('SELECT * FROM bureau');

if (!empty($_POST['nomprof']) && ($_POST['ID_etatcivile']) && $_POST['ID_bureau']){
    $nomprof=$_POST['nomprof'];
    $sexe=$_POST['ID_etatcivile'];
    $bureau=$_POST['ID_bureau'];

    $inscription = $dbh->prepare('INSERT INTO professeur(Nom,ID_etatcivile,ID_bureau) value (?,?,?) ');
    $inscription->execute([$nomprof,$sexe,$bureau]);
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css.css">
    <link rel="icon" href="img/admin_logo.png"/>
    <title>Prof BackOffice</title>
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
  <input type="text" class="form-control" aria-label="Text input with checkbox" name="nomprof" placeholder="Nom du professeur">

  <select class="form-select" aria-label="Default select example" name="ID_etatcivile">
  <option>Etat civil</option>
    <?php foreach ($sexes as $sexe): ?>
    <option value="<?= $sexe['ID_etatcivile']?>"><?= $sexe['DesgnationCrt']?></option>
    <?php endforeach; ?>
  </select>
  <select class="form-select" aria-label="Default select example" name="ID_bureau">
    <option>Salle & Bureau</option>
  <?php foreach ($salles as $salle): ?>
    <option value="<?= $salle['ID_bureau']?>">salle <?= $salle['salle']?> & bureau <?= $salle['Bureau']?></option>
    <?php endforeach; ?>
  </select>
<button type="sumbit" class="btn btn-primary">Ajouter</button>
</div>
    </form>
  </body>
  <footer>
    
</footer>
</html>