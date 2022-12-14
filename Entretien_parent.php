<?php
require 'configparent.php';

var_dump($dbh);
$entretiens = $dbh->query('SELECT * FROM entretien');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css.css">
    <title>Liste entretien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
  <header>
    <div class="header">
  <center><h1>Votre liste d'entretien</h1>
</div>
</header>
  <body>
  <ul class="list-group">
  <li class="list-group-item">
  <?php foreach ($entretiens as $entretien): ?>
    <span>Ordre de passage : </span><?= $entretien["OrdreDePassage"]?>
    <span>Date début : </span><?= $entretien["Debut"]?>
    <span>Date fin : </span><?= $entretien["Fin"]?>
    <span>Professeur : </span><?= $entretien["ID_prof"]?>
    </li>
    </ul>
  <?php endforeach; ?>

  </body>
  <footer>

</footer>
</html>