<?php
require 'config/configparent.php';

$professeurs = $dbh->query('SELECT * FROM professeur');

if(isset($_POST['profOk']) && 
   $_POST['profOk'] == 'Yes') 
{
    $groschien = $dbh->query('SELECT ID_eleve WHERE AdressIP = $_SERVER["REMOTE_ADDR"]' );

    $inscription = $dbh->prepare('INSERT INTO entretien(Bureau,salle) value (?,?) ');
    $inscription->execute([$bureau,$salle]);;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/icon_prof_choice.png"/>
    <title>Choix des professeurs</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;500;600;700&family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <header>
    <div class="title_header_profs">
      <h3>Choisissez les professeurs que vous voulez voir !</h3>
    </div>
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
    </ul>
    <?php endforeach; ?>
  </div>
  <div class="mb-3_pp">
    <div class="prof_choice_btn">
      <button type="sumbit" class="btn btn-dark" style="width: 50%">Envoyer</button>
    </div>
  </div>
    </form>
  </body>
  <footer>

</footer>
</html>