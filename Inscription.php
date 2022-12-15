<?php 
require 'configadmin.php';

$classes = $dbh->query('SELECT * FROM classe');

if (!empty($_POST['nom']) && !empty($_POST['prenom'])){
  $nom=$_POST['nom'];
  $prenom=$_POST['prenom'];
  $ip_add = $_SERVER['REMOTE_ADDR'];
  $classe=$_POST['ID_classe'];

  $inscription = $dbh->prepare('INSERT INTO eleve(Nom,Prenom,AdressIP,ID_classe) value (?,?,?,?) ');
  $inscription->execute([$nom,$prenom,$ip_add,$classe]);
  header('Location: prof_choice .php');
  exit();
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/inscription_logo.png"/>
    <title>Inscription</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;500;600;700&family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <header>
  <div class="title_header">
    <h1>Inscription</h1>
  </div>
  </header>
  <body>
    <form method="post">
      <div class="container_form">
        <div class="mb-3_pp">
          <label  class="form-label">Nom</label>
          <input type="text" name="nom" class="form-control" placeholder="Nom">
        </div>
        <div class="mb-3_pp">
          <label  class="form-label">Prenom</label>
          <input type="text" name="prenom" class="form-control" placeholder="Prenom">
        </div>
        <div class="mb-3_pp">
        <select class="form-select" aria-label="Default select example" name="ID_classe">
          <option>Classe</option>
          <?php foreach ($classes as $classe): ?>
          <option value="<?= $classe['ID_classe']?>"><?= $classe['ID_classe']?></option>
          <?php endforeach; ?>
        </select>
        </div>
          <div class="login_btn">
            <button type="submit" class="btn btn-dark">S'inscrire</button>
          </div>
      </div>
    </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>