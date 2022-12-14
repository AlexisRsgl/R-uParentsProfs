<?php
$user = 'root';
$pass = 'toor';

try {
    $dbh = new PDO('mysql:host=localhost;dbname=rpz', $user, $pass);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}