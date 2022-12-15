
<?php
require 'config/configparent.php';

var_dump($dbh);
$professeurs = $dbh->query('SELECT * FROM professeur');

if(isset($_POST['profOk']) && 
   $_POST['profOk'] == 'Yes') 
{
    $groschien = $dbh->query('SELECT ID_eleve WHERE AdressIP = $_SERVER["REMOTE_ADDR"]' );

    var_dump($groschien);

    $inscription = $dbh->prepare('INSERT INTO entretien(Bureau,salle) value (?,?) ');
    $inscription->execute([$bureau,$salle]);;
}
else
{
    echo "test sakljzd";
}

?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Choix des professeurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <header>
  <center><h1>Choisissez les professeurs que vous voulez voir !</h1>
</header>
  <body>
      <form method="post">
  <div class="list_prof">
  <?php foreach ($professeurs as $professeur): ?>
    
    <ul class="list-group">
  <li class="list-group-item">
    <input class="form-check-input me-1" type="checkbox" name="profOk" id="firstCheckbox">
    <label class="form-check-label" for="firstCheckbox"><?= $professeur['Nom']?></label>
  </li>
  <?php endforeach; ?>
</ul>
  </div>
  <button type="sumbit" class="btn btn-primary">Envoyer</button>
    </form>

  </body>
  <footer>

</footer>
</html>