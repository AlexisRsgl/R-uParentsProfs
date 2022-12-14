<?php 


require 'configadmin.php';

var_dump($dbh);

$classes = $dbh->query('SELECT * FROM classe');

if (!empty($_POST['nom']) && !empty($_POST['prenom'])){
  $nom=$_POST['nom'];
  $prenom=$_POST['prenom'];
  $ip_add = $_SERVER['REMOTE_ADDR'];
  $classe=$_POST['ID_classe'];






  $inscription = $dbh->prepare('INSERT INTO eleve(Nom,Prenom,AdressIP,ID_classe) value (?,?,?,?) ');
  $inscription->execute([$nom,$prenom,$ip_add,$classe]);
}
  
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <h1>Inscription</h1>

    <form method="post">
  <div class="mb-3">
    <label  class="form-label">Nom</label>
    <input type="text" name="nom" class="form-control">
  </div>
  <div class="mb-3">
    <label  class="form-label">Prenom</label>
    <input type="text" name="prenom" class="form-control">
  </div>

  <select class="form-select" aria-label="Default select example" name="ID_classe">
<?php foreach ($classes as $classe): ?>
    <option value="<?= $classe['ID_classe']?>"><?= $classe['ID_classe']?></option>
    <?php endforeach; ?>
    

</select>

  <button type="submit" class="btn btn-primary">Envoyer</button>
</form>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>

 
</html>