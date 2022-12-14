
<?php 
require 'configadmin.php';

var_dump($dbh);
$sexes = $dbh->query('SELECT * FROM etat_civile');
$salles = $dbh->query('SELECT * FROM bureau');

if (!empty($_POST['nomprof']) ){
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
    <title>PLus prof</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>


  <body>
      <form method="post">
 
 
    <div class="input-group mb-3">
  <div class="input-group-text">
    <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
  </div>
  <input type="text" class="form-control" aria-label="Text input with checkbox" name="nomprof">
</div>
<select class="form-select" aria-label="Default select example" name="ID_etatcivile">
    <?php foreach ($sexes as $sexe): ?>
    <option value="<?= $sexe['ID_etatcivile']?>"><?= $sexe['DesgnationCrt']?></option>
    <?php endforeach; ?>

</select>
<select class="form-select" aria-label="Default select example" name="ID_bureau">
<?php foreach ($salles as $salle): ?>
    <option value="<?= $salle['ID_bureau']?>">salle<?= $salle['salle']?>bureau<?= $salle['Bureau']?></option>
    <?php endforeach; ?>
    

</select>
<button type="sumbit" class="btn btn-primary">Envoyer</button>
    </form>
  </body>
  <footer>
    
</footer>
</html>