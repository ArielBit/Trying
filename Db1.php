<?php
//Coordonnée du serveur sql
$dbname="db_try";
$host='127.0.0.9';
$username="root";
$password="Ariel&007";
$port=3309;

//Connexion au serveur sql
try{
$connect= new PDO("mysql:host=$host; dbname=$dbname; port=$port; charset=utf8mb4", $username, $password);
$connect-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
}catch(PDOException $e) {
  echo "Erreur lors de l'insertion des données". $e->getMessage();
}
?>
